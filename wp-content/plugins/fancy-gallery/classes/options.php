<?php Namespace WordPress\Plugin\GalleryManager;

abstract class Options {
  const
    page_slug = 'gallery-options', # The options page slug
    options_key = 'gallery_options'; # the field identifier in the options table

  private static
    $arr_option_box; # Meta boxes for the option page

  static function init(){
    # Option boxes
    self::$arr_option_box = Array(
      'main' => Array(),
      'side' => Array()
    );

    add_Action('admin_menu', Array(__CLASS__, 'addOptionsPage'));
  }

  static function addOptionsPage(){
    $handle = add_Options_Page (
      I18n::t('Gallery Options'),
      I18n::t('Galleries'),
      'manage_options',
      self::page_slug,
      Array(__CLASS__, 'printOptionsPage')
    );

    # Add JavaScript to this handle
    add_Action('load-' . $handle, Array(__CLASS__, 'loadOptionsPage'));

    # Add option boxes
    self::addOptionBox(I18n::t('Gallery Management'), Core::$plugin_folder.'/options-page/gallery-management.php');
    self::addOptionBox(I18n::t('Lightbox'), Core::$plugin_folder.'/options-page/lightbox.php');
    self::addOptionBox(I18n::t('Gallery Previews'), Core::$plugin_folder.'/options-page/previews.php', 'main');
    self::addOptionBox(I18n::t('Permissions'), Core::$plugin_folder.'/options-page/permissions.php', 'main');
    self::addOptionBox(I18n::t('Taxonomies'), Core::$plugin_folder.'/options-page/taxonomies.php', 'side');
    self::addOptionBox(I18n::t('Gallery Archive'), Core::$plugin_folder.'/options-page/archive.php', 'side');
  }

  static function getOptionsPageUrl($parameters = Array()){
    $url = add_Query_Arg(Array('page' => self::page_slug), Admin_Url('options-general.php'));
    if (is_Array($parameters) && !empty($parameters)) $url = add_Query_Arg($parameters, $url);
    return $url;
  }

  static function loadOptionsPage(){
    # If the Request was redirected from a "Save Options"-Post
    if (isSet($_REQUEST['options_saved'])){
      Gallery_Taxonomies::updateTaxonomyNames();
      Gallery_Post_Type::updatePostTypeName();
      flush_Rewrite_Rules();
    }

    # If this is a Post request to save the options
    if (self::saveOptions()) WP_Redirect(self::getOptionsPageUrl(Array('options_saved' => 'true')) );

    WP_Enqueue_Style('dashboard');

    WP_Enqueue_Script('gallery-options-page', Core::$base_url.'/options-page/options-page.js', Array('jquery'), Core::version, True);
    WP_Enqueue_Style('gallery-options-page', Core::$base_url.'/options-page/options-page.css');

    # Remove incompatible JS Libs
    WP_Dequeue_Script('post');
  }

  static function printOptionsPage(){
    ?>
    <div class="wrap">
      <h2><?php echo I18n::t('Gallery Settings') ?></h2>

      <?php if (isSet($_GET['options_saved'])): ?>
      <div id="message" class="updated fade">
        <p><strong><?php _e('Settings saved.') ?></strong></p>
      </div>
      <?php endif ?>

      <form method="post" action="">
      <div class="metabox-holder">

        <div class="postbox-container left">
          <?php foreach (self::$arr_option_box['main'] AS $box): ?>
            <div class="postbox">
              <h2 class="hndle"><?php echo $box->title ?></h2>
              <div class="inside"><?php include $box->file ?></div>
            </div>
          <?php endforeach ?>
        </div>

        <div class="postbox-container right">
          <?php foreach (self::$arr_option_box['side'] AS $box): ?>
            <div class="postbox">
              <h2 class="hndle"><?php echo $box->title ?></h2>
              <div class="inside"><?php include $box->file ?></div>
            </div>
          <?php endforeach ?>
        </div>

      </div>

      <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>">
      </p>

      </form>
    </div>
    <?php
  }

  static function addOptionBox($title, $include_file, $column = 'main'){
    # Check the input
    if (!is_File($include_file)) return False;
    if (empty($title)) $title = '&nbsp;';

    # Column (can be 'side' or 'main')
    $column = ($column != 'main') ? 'side' : 'main';

    # Add a new box
    self::$arr_option_box[$column][] = (Object) Array('title' => $title, 'file' => $include_file);
  }

  static function saveOptions(){
    # Check if this is a post request
    if (empty($_POST)) return False;

    # Add Capabilities
    if (isSet($_POST['capabilities']) && is_Array($_POST['capabilities'])){
      foreach ($_POST['capabilities'] as $role_name => $arr_role){
        if (!$role = get_role($role_name)) continue;
        setType($arr_role, 'ARRAY');
        foreach ($arr_role as $capability => $yes_no){
          if ($yes_no == 'yes')
            $role->add_Cap($capability);
          else
            $role->remove_Cap($capability);
        }
      }
      unset($_POST['capabilities']);
    }

    # Clean the Post array
    $options = stripSlashes_Deep($_POST);
    $options = Array_Filter($options, function($value){ return $value == '0' || !empty($value); });

    # Save Options
    delete_Option('WordPress\Plugin\Fancy_Gallery\Options');
    delete_Option('wp_plugin_fancy_gallery_pro');
    delete_Option('wp_plugin_fancy_gallery');
    update_Option(self::options_key, $options);

    return True;
  }

  static function getDefaultOptions(){
    return Array(
      'enable_editor' => False,
      'enable_featured_image' => True,
      'enable_custom_fields' => False,

      'lightbox' => True,
      'continuous' => False,
      'title_description' => True,
      'close_button' => True,
      'indicator_thumbnails' => True,
      'slideshow_button' => True,
      'slideshow_speed' => 3000, # Slideshow speed in milliseconds
      'preload_images' => 3,
      'animation_speed' => 400,
      'stretch_images' => False,
      'script_position' => 'footer',

      'gallery_taxonomy' => Array(),

      'enable_previews' => True,
      'enable_previews_for_custom_excerpts' => False,
      'preview_thumb_size' => 'thumbnail',
      'preview_columns' => 3,
      'preview_image_number' => 3,

      'enable_archive' => True,
    );
  }

  static function get($key = Null, $default = False){
    # Read Options
    $arr_option = Array_Merge(
      self::getDefaultOptions(),
      (Array) get_Option('wp_plugin_fancy_gallery_pro'),
      (Array) get_Option('wp_plugin_fancy_gallery'),
      (Array) get_Option('WordPress\Plugin\Fancy_Gallery\Options'),
      (Array) get_Option(self::options_key)
    );

    # Locate the option
    if (empty($key))
      return $arr_option;
    elseif (isSet($arr_option[$key]))
      return $arr_option[$key];
    else
      return $default;
  }

}

Options::init();

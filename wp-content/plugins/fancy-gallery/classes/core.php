<?php Namespace WordPress\Plugin\GalleryManager;

abstract class Core {
  const
    version = '1.6.17'; # Current release number

  public static
    $base_url, # url to the plugin directory
    $plugin_file, # the main plugin file
    $plugin_folder; # the path to the folder the plugin files contains

  static function init($plugin_file){
    self::$plugin_file = $plugin_file;
    self::$plugin_folder = DirName(self::$plugin_file);
    self::loadBaseURL();

    register_Activation_Hook(self::$plugin_file, Array(__CLASS__, 'installPlugin'));
    add_Filter('post_class', Array(__CLASS__, 'addContentUnitPostClass'));
    add_Filter('body_class', Array(__CLASS__, 'addTaxonomyBodyClass'));
    add_Filter('wp_get_attachment_link', Array(__CLASS__, 'filterAttachmentLink'), 10, 6);
  }

  public static function installPlugin(){
    Gallery_Taxonomies::updateTaxonomyNames();
    Gallery_Post_Type::updatePostTypeName();
    Gallery_Taxonomies::registerTaxonomies();
    Gallery_Post_Type::registerPostType();
    flush_Rewrite_Rules();
  }

  private static function loadBaseURL(){
    $absolute_plugin_folder = RealPath(self::$plugin_folder);

    if (StrPos($absolute_plugin_folder, ABSPATH) === 0)
      self::$base_url = get_Bloginfo('wpurl').'/'.SubStr($absolute_plugin_folder, Strlen(ABSPATH));
    else
      self::$base_url = Plugins_Url(BaseName(self::$plugin_folder));

    self::$base_url = Str_Replace("\\", '/', self::$base_url); # Windows Workaround
  }

  static function addContentUnitPostClass($arr_class){
    setType($arr_class, 'ARRAY');
    $arr_class[] = 'gallery-content-unit';
    return $arr_class;
  }

  static function addTaxonomyBodyClass($arr_class){
    setType($arr_class, 'ARRAY');
    if (Query::isGalleryTaxonomyArchive()) $arr_class[] = 'gallery-taxonomy';
    return $arr_class;
  }

  static function filterAttachmentLink($link, $id, $size, $permalink, $icon, $text){
    if (WP_Attachment_Is_Image($id)){
      $image = get_Post($id);
      $image_title = esc_Attr($image->post_title);
      $image_description = esc_Attr($image->post_content);

      if (StrPos($link, ' title=') === False)
        $link = Str_Replace('<a ', "<a title='{$image_title}' ", $link);

      if (StrPos($link, ' data-description=') === False)
        $link = Str_Replace('<a ', "<a data-description='{$image_description}' ", $link);
    }

    return $link;
  }

}

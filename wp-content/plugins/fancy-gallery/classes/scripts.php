<?php Namespace WordPress\Plugin\GalleryManager;

abstract class Scripts {

  static function init(){
    add_Action('wp_enqueue_scripts', Array(__CLASS__, 'enqueueScripts'));
    add_Action('admin_init', Array(__CLASS__, 'registerAdminScripts'));
  }

  static function enqueueScripts(){
    $arr_options = Options::get();
    unset($arr_options['disable_update_notification'], $arr_options['update_username'], $arr_options['update_password']);
    $arr_options['ajax_url'] = Admin_Url('admin-ajax.php');

    WP_Register_Script('gallery-manager', Core::$base_url . '/assets/js/gallery-manager.js', Array('jquery'), Core::version, Options::get('script_position') != 'header');
    WP_Localize_Script('gallery-manager', 'GalleryManager', $arr_options);

    if (Options::get('lightbox')) WP_Enqueue_Script('gallery-manager');
  }

  static function registerAdminScripts(){
    WP_Register_Script('dynamic-gallery', Core::$base_url . '/assets/js/dynamic-gallery.js', Array('jquery'), Null, True);
    WP_Localize_Script('dynamic-gallery', 'DynamicGallery', Array(
      'warn_remove_image' => I18n::t('Do you want to remove this image from the gallery? It will not be deleted from your media library.')
    ));

    WP_Register_Script('gallery-meta-boxes', Core::$base_url . '/meta-boxes/meta-boxes.js', Array('jquery', 'dynamic-gallery'), Core::version, True);
  }

}

Scripts::init();

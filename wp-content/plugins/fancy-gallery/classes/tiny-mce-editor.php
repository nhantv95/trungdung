<?php Namespace WordPress\Plugin\GalleryManager;

abstract class TinyMCE {

  static function init(){
    add_Filter('mce_external_plugins', Array(__CLASS__, 'addTinyMCEPlugins'));
  }

  static function addTinyMCEPlugins(){
    return Array(
      'wpgallerypatch' => Core::$base_url . '/assets/js/tinymce-gallery-patch.js'
    );
  }

}

TinyMCE::init();

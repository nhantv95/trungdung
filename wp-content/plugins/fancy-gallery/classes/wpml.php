<?php Namespace WordPress\Plugin\GalleryManager;

abstract class WPML {

  static function init(){
    add_Filter('gettext_with_context', Array(__CLASS__, 'Filter_Gettext_with_Context'), 1, 4);
  }

  static function isActive(){
    return defined('ICL_SITEPRESS_VERSION');
  }

  static function Filter_Gettext_with_Context($translation, $text, $context, $domain){
    # If you are using WPML the post type slug MUST NOT be translated! You can translate your slug in WPML
    if (self::isActive() && $context == 'URL slug' && $domain == I18n::getTextDomain())
      return $text;
    else
      return $translation;
  }

}

WPML::init();

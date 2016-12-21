<?php Namespace WordPress\Plugin\GalleryManager;

abstract class I18n {
  const
    textdomain = 'gallery-manager';

  private static
    $loaded = False;

  static function loadTextDomain(){
    $locale = apply_Filters('plugin_locale', get_Locale(), self::textdomain);
    $language_folder = Core::$plugin_folder.'/languages';
    load_TextDomain(self::textdomain, "{$language_folder}/{$locale}.mo");
    load_Plugin_TextDomain(self::textdomain);
    self::$loaded = True;
  }

  static function getTextDomain(){
    return self::textdomain;
  }

  static function t($text, $context = Null){
    # Load text domain
    if (!self::$loaded) self::loadTextDomain();

    # Translate the string $text with context $context
    if (empty($context))
      return translate($text, self::textdomain);
    else
      return translate_With_GetText_Context($text, $context, self::textdomain);
  }

}

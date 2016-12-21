<?php Namespace WordPress\Plugin\GalleryManager;

abstract class Thumbnails {

  static function getSizes($dimensions = False){
    $arr_registered_sizes = self::getRegisteredSizes();
    $arr_default_sizes = self::getDefaultSizes();
    $arr_sizes = Array_Merge($arr_registered_sizes, $arr_default_sizes);

    if ($dimensions){
      $arr_result = Array();
      foreach($arr_sizes as $size => $caption){
        $dimensions = self::getDimensions($size);
        $arr_result[$size] = (Object) Array(
          'name' => $size,
          'caption' => $caption,
          'width' => isSet($dimensions->width) ? $dimensions->width : Null,
          'height' => isSet($dimensions->height) ? $dimensions->height : Null,
          'crop' => isSet($dimensions->crop) ? $dimensions->crop : Null
        );
      }
      $arr_sizes = $arr_result;
    }

    return $arr_sizes;
  }

  static function getDefaultSizes(){
    /* This filter is documented in wp-admin/includes/media.php */
    $default_sizes = apply_Filters('image_size_names_choose', Array(
      'thumbnail' => __('Thumbnail'),
      'medium'    => __('Medium'),
      'large'     => __('Large'),
      'full'      => __('Full Size'),
    ));

    return $default_sizes;
  }

  static function getRegisteredSizes(){
    $arr_registered_sizes = get_Intermediate_Image_Sizes();
    setType($arr_registered_sizes, 'ARRAY');

    $arr_registered_sizes = Array_Flip($arr_registered_sizes);

    foreach ($arr_registered_sizes as $size => &$caption){
      $caption = $size;
      $caption = Str_Replace(Array('_', '-'), ' ', $caption);
      $caption = UCWords($caption);
      $caption = __($caption);
    }

    return $arr_registered_sizes;
  }

  static function getDimensions($size){
    global $_wp_additional_image_sizes;

    if (isSet($_wp_additional_image_sizes[$size]['width']) && isSet($_wp_additional_image_sizes[$size]['height'])){
      $size = (Object) Array(
        'width'  => $_wp_additional_image_sizes[$size]['width'],
        'height' => $_wp_additional_image_sizes[$size]['height'],
        'crop'   => (bool) $_wp_additional_image_sizes[$size]['crop']
      );
    }
    elseif (($width = get_Option("{$size}_size_w")) && ($height = get_Option("{$size}_size_h"))){
      $size = (Object) Array(
        'width' => $width,
        'height' => $height,
        'crop' => (bool) get_Option("{$size}_crop")
      );
    }
    else return (Object) Array();

    return $size;
  }

  static function getDropdown($attributes){
    $defaults = Array(
      'name' => '',
      'class' => '',
      'selected' => False,
      'class' => ''
    );

    $attributes = Array_Merge($defaults, $attributes);
    setType($attributes, 'OBJECT');

    $html = sprintf('<select name="%s" id="%s" class="%s">', $attributes->name, $attributes->id, $attributes->class);

    foreach (self::getSizes(True) as $size){
      $html .= sprintf('<option value="%s" %s>', $size->name, selected($attributes->selected, $size->name, False));
      $html .= $size->caption;
      !empty($size->width) && !empty($size->height) && $html .= sprintf(' (%u x %u px)', $size->width, $size->height);
      $html .= '</option>';
    }

    $html .= '</select>';

    return $html;
  }

}

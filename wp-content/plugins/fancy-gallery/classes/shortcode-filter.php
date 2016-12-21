<?php Namespace WordPress\Plugin\GalleryManager;

abstract class Shortcode_Filter {

  static function init(){
    add_Filter('shortcode_atts_gallery', Array(__CLASS__, 'filterGalleryAttributes'));
  }

  static function filterGalleryAttributes($attributes){
    # the link attribute can be "none" or "file"
    if ($attributes['link'] != 'none') $attributes['link'] = 'file';

    # set the colums and image size if this is the id of a gallery is set
    if (!empty($attributes['id']) && Post::isGallery($attributes['id'])){
      $attributes['columns'] = Gallery_Post_Type::getMeta('columns', Null, $attributes['id']);
      $attributes['size'] = Gallery_Post_Type::getMeta('image_size', Null, $attributes['id']);
    }

    return $attributes;
  }

}

Shortcode_Filter::init();

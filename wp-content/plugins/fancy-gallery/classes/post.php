<?php Namespace WordPress\Plugin\GalleryManager;

abstract class Post {

  static function isGallery($post = Null){
    $post_type = get_Post_Type($post);
    return $post_type == Gallery_Post_Type::post_type_name;
  }

  static function isGalleryImage($attachment = Null){
    $attachment = get_Post($attachment);
    return self::isGallery($attachment->post_parent);
  }

}

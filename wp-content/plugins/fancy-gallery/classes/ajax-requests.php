<?php Namespace WordPress\Plugin\GalleryManager;

abstract class AJAX_Requests {

  static function init(){
    self::registerAJAXHook('get_gallery', 'getGallery');
  }

  static function registerAJAXHook($action, $method){
    add_Action("wp_ajax_{$action}", Array(__CLASS__, $method));
    add_Action("wp_ajax_nopriv_{$action}", Array(__CLASS__, $method));
  }

  static function sendResponse($response){
    Header('Content-Type: application/json');
    echo JSON_Encode($response);
    exit;
  }

  static function getGallery(){
    $gallery_id = trim($_REQUEST['gallery_id']);
    $gallery = new Gallery($gallery_id);
    $arr_images = $gallery->getImages();
    $arr_images = Array_Values($arr_images);

  	if (empty($arr_images)) return False;

    foreach ($arr_images as &$image){
      $image = (Object) Array(
        'title' => isSet($image->post_title) ? $image->post_title : False,
        'description' => isSet($image->post_content) ? $image->post_content : False,
        'href' => $image->url,
        'thumbnail' => isSet($image->thumbnail->url) ? $image->thumbnail->url : False
      );
    }

    # return the images
    self::sendResponse($arr_images);
  }

}

AJAX_Requests::init();

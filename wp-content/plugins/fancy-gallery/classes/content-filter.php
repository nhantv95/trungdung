<?php Namespace WordPress\Plugin\GalleryManager;

abstract class Content_Filter {

  static function init(){
    add_Filter('the_content', Array(__CLASS__, 'addGalleryImagesToContent'), 10);
    add_Filter('the_excerpt', Array(__CLASS__, 'addGalleryImagesToExcerpt'), 10);
    add_Filter('the_content_feed', Array(__CLASS__, 'addGalleryImagesToExcerpt'));
    add_Filter('the_excerpt_rss', Array(__CLASS__, 'addGalleryImagesToExcerpt'));
  }

  static function addGalleryImagesToExcerpt($excerpt){
    if (Post::isGallery() && !Post_Password_Required() && Options::get('enable_previews')){
      if (!has_Excerpt() || (has_Excerpt() && Options::get('enable_previews_for_custom_excerpts'))){
        $gallery = new Gallery(); # Creates a Gallery object from the currenct post
        $excerpt .= $gallery->renderPreview();
      }
    }

    return $excerpt;
  }

  static function addGalleryImagesToContent($content){
    if (Post::isGallery() && !has_Shortcode($content, 'gallery') && !Post_Password_Required() && !doing_Filter('get_the_excerpt')){
      $gallery = new Gallery(); # Creates a Gallery object from the currenct post
      $content .= $gallery->render();
    }

    return $content;
  }

}

Content_Filter::init();

<?php Namespace WordPress\Plugin\GalleryManager;

abstract class Template_Tags_Fallbacks {

  static function init(){
    add_Filter('get_the_categories', Array(__CLASS__, 'Filter_Get_The_Categories'));
    add_Filter('the_category', Array(__CLASS__, 'Filter_The_Category'), 10, 3);
    add_Filter('get_the_tags', Array(__CLASS__, 'Filter_Get_The_Tags'));
    add_Filter('the_tags', Array(__CLASS__, 'Filter_The_Tags'), 10, 5);
  }

  static function Filter_Get_The_Categories($arr_categories){
    global $post;

    if (!is_Admin()){
      $gallery_taxonomy = 'gallery_category';
      $taxonomy_exists = Taxonomy_Exists($gallery_taxonomy);
      $is_gallery = $post->post_type == Gallery_Post_Type::post_type_name;
      $uses_post_categories = is_Object_in_Taxonomy($post->post_type, 'category');
      $uses_gallery_categories = is_Object_in_Taxonomy($post->post_type, $gallery_taxonomy);

      if ($taxonomy_exists && $is_gallery && !$uses_post_categories && $uses_gallery_categories){
        $arr_categories = get_The_Terms($post->ID, $gallery_taxonomy);
        if (is_Array($arr_categories)){
          foreach ($arr_categories As &$category){
            _make_Cat_Compat($category); # Compat mode for very very very old and deprecated themes...
          }
        }
      }
    }

    return $arr_categories;
  }

  static function Filter_The_Category($str_category_list, $separator = Null, $parents = Null){
    global $post;

    if (!is_Admin()){
      $gallery_taxonomy = 'gallery_category';
      $taxonomy_exists = Taxonomy_Exists($gallery_taxonomy);
      $is_gallery = $post->post_type == Gallery_Post_Type::post_type_name;
      $uses_post_categories = is_Object_in_Taxonomy($post->post_type, 'category');
      $uses_gallery_categories = is_Object_in_Taxonomy($post->post_type, $gallery_taxonomy);

      if ($taxonomy_exists && $is_gallery && !$uses_post_categories && $uses_gallery_categories){
        $str_category_list = get_The_Term_List($post->ID, $gallery_taxonomy, Null, $separator, Null);
        if (empty($str_category_list)) $str_category_list = __('Uncategorized');
      }
    }

    return $str_category_list;
  }

  static function Filter_Get_The_Tags($arr_tags){
    global $post;

    if (!is_Admin()){
      $gallery_taxonomy = 'gallery_tag';
      $taxonomy_exists = Taxonomy_Exists($gallery_taxonomy);
      $is_gallery = $post->post_type == Gallery_Post_Type::post_type_name;
      $uses_post_tags = is_Object_in_Taxonomy($post->post_type, 'post_tag');
      $uses_gallery_tags = is_Object_in_Taxonomy($post->post_type, $gallery_taxonomy);

      if ($taxonomy_exists && $is_gallery && !$uses_post_tags && $uses_gallery_tags){
        $arr_tags = get_The_Terms($post->ID, $gallery_taxonomy);
      }
    }

    return $arr_tags;
  }

  static function Filter_The_Tags($str_tag_list, $before, $separator, $after, $post_id){
    $post = get_Post($post_id);

    if (!is_Admin()){
      $gallery_taxonomy = 'gallery_tag';
      $taxonomy_exists = Taxonomy_Exists($gallery_taxonomy);
      $is_gallery = $post->post_type == Gallery_Post_Type::post_type_name;
      $uses_post_tags = is_Object_in_Taxonomy($post->post_type, 'post_tag');
      $uses_gallery_tags = is_Object_in_Taxonomy($post->post_type, $gallery_taxonomy);

      if ($taxonomy_exists && $is_gallery && !$uses_post_tags && $uses_gallery_tags){
        $str_tag_list = get_The_Term_List($post_id, $gallery_taxonomy, $before, $separator, $after);
      }
    }

    return $str_tag_list;
  }

}

Template_Tags_Fallbacks::init();

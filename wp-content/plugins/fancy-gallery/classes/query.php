<?php Namespace WordPress\Plugin\GalleryManager;

use WP_Query;

abstract class Query {

  private static function loadQuery(&$query = Null){
    if (!$query instanceOf WP_Query){
      global $wp_query;
      $query = $wp_query;
    }
  }

  static function isGallerySingle($query = Null, $post){
    self::loadQuery($query);
    return $query->is_Single($post);
  }

  static function isGalleryPostTypeArchive($query = Null){
    self::loadQuery($query);
    return (!$query->is_search && $query->is_Post_Type_Archive(Gallery_Post_Type::post_type_name));
  }

  static function isGalleryTaxonomyArchive($query = Null){
    self::loadQuery($query);
    $gallery_taxonomies = get_Object_Taxonomies(Gallery_Post_Type::post_type_name);
    return !empty($gallery_taxonomies) && $query->is_Tax($gallery_taxonomies);
  }

  static function isGallerySearch($query = Null){
    self::loadQuery($query);
    if ($query->is_search){
      # Check if the search is inside a post type
			if ($query->get('post_type') == Gallery_Post_Type::post_type_name) return True;

      # Check if the search is inside a taxonomy
      $gallery_taxonomies = get_Object_Taxonomies(Gallery_Post_Type::post_type_name);
      if (!empty($gallery_taxonomies) && $query->is_Tax($gallery_taxonomies)) return True;
    }

    return False;
  }

  static function isGlobalSearch($query = Null){
    self::loadQuery($query);
    return ($query->is_search && $query->get('post_type') != Gallery_Post_Type::post_type_name);
  }

}

<?php Namespace WordPress\Plugin\GalleryManager;

abstract class Gallery_Taxonomies {

  static function init(){
    add_Action('init', Array(__CLASS__, 'registerTaxonomies'), 9);
    add_Action('init', Array(__CLASS__, 'addTaxonomyArchiveUrls'), 50);
    add_Filter('nav_menu_meta_box_object', Array(__CLASS__, 'changeTaxonomyMenuLabel'));
  }

  static function getTaxonomies(){
    return Array(
      'gallery-category' => Array(
        'label' => I18n::t('Gallery Categories'),
        'labels' => Array(
          'name' => I18n::t('Categories'),
          'singular_name' => I18n::t('Category'),
          'all_items' => I18n::t('All Categories'),
          'edit_item' => I18n::t('Edit Category'),
          'view_item' => I18n::t('View Category'),
          'update_item' => I18n::t('Update Category'),
          'add_new_item' => I18n::t('Add New Category'),
          'new_item_name' => I18n::t('New Category'),
          'parent_item' => I18n::t('Parent Category'),
          'parent_item_colon' => I18n::t('Parent Category:'),
          'search_items' =>  I18n::t('Search Categories'),
          'popular_items' => I18n::t('Popular Categories'),
          'separate_items_with_commas' => I18n::t('Separate Categories with commas'),
          'add_or_remove_items' => I18n::t('Add or remove Categories'),
          'choose_from_most_used' => I18n::t('Choose from the most used Categories'),
          'not_found' => I18n::t('No Categories found.')
        ),
        'show_admin_column' => True,
        'hierarchical' => False,
        'show_ui' => True,
        'query_var' => True,
        'rewrite' => Array(
          'with_front' => False,
          'slug' => sprintf(I18n::t('%s/category', 'URL slug'), I18n::t('galleries', 'URL slug'))
        ),
      ),

      'gallery-tag' => Array(
        'label' => I18n::t( 'Gallery Tags' ),
        'labels' => Array(
          'name' => I18n::t('Tags'),
          'singular_name' => I18n::t('Tag'),
          'all_items' => I18n::t('All Tags'),
          'edit_item' => I18n::t('Edit Tag'),
          'view_item' => I18n::t('View Tag'),
          'update_item' => I18n::t('Update Tag'),
          'add_new_item' => I18n::t('Add New Tag'),
          'new_item_name' => I18n::t('New Tag'),
          'parent_item' => I18n::t('Parent Tag'),
          'parent_item_colon' => I18n::t('Parent Tag:'),
          'search_items' =>  I18n::t('Search Tags'),
          'popular_items' => I18n::t('Popular Tags'),
          'separate_items_with_commas' => I18n::t('Separate Tags with commas'),
          'add_or_remove_items' => I18n::t('Add or remove Tags'),
          'choose_from_most_used' => I18n::t('Choose from the most used Tags'),
          'not_found' => I18n::t('No Tags found.')
        ),
        'show_admin_column' => True,
        'hierarchical' => False,
        'show_ui' => True,
        'query_var' => True,
        'rewrite' => Array(
          'with_front' => False,
          'slug' => sprintf(I18n::t('%s/tag', 'URL slug'), I18n::t('galleries', 'URL slug'))
        ),
      ),

    );
  }

  static function registerTaxonomies(){
    # Load Taxonomies
    $arr_taxonomies = self::getTaxonomies();
    $arr_taxonomies = apply_Filters('gallery-manager-taxonomies', $arr_taxonomies);

    # Check the enabled taxonomies
    $enabled_taxonomies = Options::get('gallery_taxonomies');
    setType($enabled_taxonomies, 'ARRAY');

    if (empty($enabled_taxonomies)) return False;

    # Register Taxonomies
    foreach ($enabled_taxonomies as $taxonomie => $attributes){
      if (isSet($arr_taxonomies[$taxonomie])){
        register_Taxonomy($taxonomie, Gallery_Post_Type::post_type_name, Array_Merge($arr_taxonomies[$taxonomie], $attributes));
      }
    }
  }

  static function addTaxonomyArchiveUrls(){
    foreach (get_Object_Taxonomies(Gallery_Post_Type::post_type_name) as $taxonomy){
      add_Action($taxonomy.'_edit_form_fields', Array(__CLASS__, 'printTaxonomyArchiveUrls'), 10, 3);
    }
  }

  static function printTaxonomyArchiveUrls($tag, $taxonomy){
    $taxonomy = get_Taxonomy($taxonomy);
    $archive_url = get_Term_Link(get_Term($tag->term_id, $taxonomy->name));
    $archive_feed = get_Term_Feed_Link($tag->term_id, $taxonomy->name);
    ?>
    <tr class="form-field">
      <th scope="row" valign="top"><?php echo I18n::t('Archive Url') ?></th>
      <td>
        <a href="<?php echo $archive_url ?>" target="_blank"><?php echo $archive_url ?></a><br>
        <span class="description"><?php printf(I18n::t('This is the URL to the archive of this %s.'), $taxonomy->labels->singular_name) ?></span>
      </td>
    </tr>
    <tr class="form-field">
      <th scope="row" valign="top"><?php echo I18n::t('Archive Feed') ?></th>
      <td>
        <a href="<?php echo $archive_feed ?>" target="_blank"><?php echo $archive_feed ?></a><br />
        <span class="description"><?php printf(I18n::t('This is the URL to the feed of the archive of this %s.'), $taxonomy->labels->singular_name) ?></span>
      </td>
    </tr>
    <?php
  }

  static function changeTaxonomyMenuLabel($tax){
    if (isSet($tax->object_type) && in_Array(Gallery_Post_Type::post_type_name, $tax->object_type)){
      $gallery_post_type_object = get_Post_Type_Object(Gallery_Post_Type::post_type_name);
      $tax->labels->name = sprintf('%1$s &rarr; %2$s', $gallery_post_type_object->label, $tax->labels->name);
    }
    return $tax;
  }

  static function updateTaxonomyNames(){
    global $wpdb;

    $arr_rename = Array(
      'gallery_category' => 'gallery-category',
      'gallery_tag' => 'gallery-tag',
    );

    foreach ($arr_rename as $rename_from => $rename_to){
      $wpdb->update($wpdb->term_taxonomy, Array('taxonomy' => $rename_to), Array('taxonomy' => $rename_from));
    }
	}

}

Gallery_Taxonomies::init();

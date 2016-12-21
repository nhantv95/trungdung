<?php Namespace WordPress\Plugin\GalleryManager;

use WP_Widget;

class Random_Images_Widget extends WP_Widget {

  function __construct(){
    # Setup the Widget data
    parent::__construct (
      'random-gallery-images',
      I18n::t('Random Images'),
      Array('description' => I18n::t('Displays some random images from your galleries.'))
    );
  }

  static function registerWidget(){
    if (doing_Action('widgets_init'))
      register_Widget(__CLASS__);
    else
      add_Action('widgets_init', Array(__CLASS__, __FUNCTION__));
  }

  function getDefaultOptions(){
    # Default settings
    return Array(
      'title' => I18n::t('Random Images'),
      'number_of_images' => 12,
      'columns' => 3,
      'thumb_size' => 'thumbnail',
    );
  }

  function loadOptions(&$arr_options){
    setType($arr_options, 'ARRAY');
    $arr_options = Array_Filter($arr_options);
    $arr_options = Array_Merge($this->getDefaultOptions(), $arr_options);
    setType($arr_options, 'OBJECT');
  }

  function getRandomGalleries($count){
    $arr_galleries = get_Posts(Array(
      'post_type' => Gallery_Post_Type::post_type_name,
      'posts_per_page' => $count,
      'has_password' => False,
      'orderby' => 'rand'
    ));

    return $arr_galleries;
  }

  function getRandomImages($count){
    $arr_random_galleries = $this->getRandomGalleries($count);
    $arr_random_gallery_ids = Array_Map(function($gallery){ return $gallery->ID; }, $arr_random_galleries);

    $arr_images = get_Posts(Array(
      'post_parent__in' => $arr_random_gallery_ids,
      'post_type' => 'attachment',
      'post_mime_type' => 'image',
      'posts_per_page' => $count,
      'orderby' => 'rand',
    ));

    return $arr_images;
  }

  function Form($options){
    $this->loadOptions($options);
    ?>
    <p>
      <label for="<?php echo $this->get_Field_Id('title') ?>"><?php _e('Title:') ?></label>
      <input type="text" id="<?php echo $this->get_Field_Id('title') ?>" name="<?php echo $this->get_Field_Name('title') ?>" value="<?php echo esc_Attr($options->title) ?>" class="widefat">
      <small><?php echo I18n::t('Leave blank to use the widget default title.') ?></small>
    </p>

    <p>
      <label for="<?php echo $this->get_Field_Id('number_of_images') ?>"><?php echo I18n::t('Number of images:') ?></label>
      <input type="number" id="<?php echo $this->get_Field_Id('number_of_images') ?>" name="<?php echo $this->get_Field_Name('number_of_images')?>" value="<?php echo esc_Attr($options->number_of_images) ?>" min="1" step="1" max="<?php echo PHP_INT_MAX ?>" class="widefat">
    </p>

    <p>
      <label for="<?php echo $this->get_Field_Id('columns') ?>"><?php echo I18n::t('Columns:') ?></label>
      <select name="<?php echo $this->get_Field_Name('columns')?>" id="<?php echo $this->get_Field_Id('columns') ?>" class="widefat">
        <?php for ($columns = 1; $columns < 10; $columns++): ?>
        <option value="<?php echo $columns ?>" <?php selected($options->columns, $columns) ?>><?php echo $columns ?></option>
        <?php endfor ?>
      </select>
    </p>

    <p>
      <label for="<?php echo $this->get_Field_Id('thumb_size') ?>"><?php echo I18n::t('Thumbnail size:') ?></label>
      <?php echo Thumbnails::getDropdown(Array(
        'name' => $this->get_Field_Name('thumb_size'),
        'id' => $this->get_Field_Id('thumb_size'),
        'selected' => $options->thumb_size,
        'class' => 'widefat'
      )) ?>
    </p>

    <?php
  }

  function Widget($widget, $options){
    # Load widget args
    setType($widget, 'OBJECT');

    # Load options
    $this->loadOptions($options);

    # Get random images
    $arr_images = $this->getRandomImages($options->number_of_images);

    if (empty($arr_images))
      return False;
    else {
      $options->image_ids = Array_Map(function(&$image){ return $image->ID; }, $arr_images);
    }

    # generate widget title
    $widget->title = apply_Filters('widget_title', $options->title, (Array) $options, $this->id_base);

    # Add attachment link filter
    add_Filter('wp_get_attachment_link', Array(__CLASS__, 'filterAttachmentLink'), 10, 6);

    # Display Widget
    echo Template::load('random-images-widget', Array(
      'widget' => $widget,
      'options' => $options
    ));

    # Remove attachment link filter
    Remove_Filter('wp_get_attachment_link', Array(__CLASS__, 'filterAttachmentLink'), 10, 6);
  }

  static function filterAttachmentLink($link, $id, $size, $permalink, $icon, $text){
    if (Post::isGalleryImage($id)){
      $image = get_Post($id);
      $gallery = get_Post($image->post_parent);
      $gallery_name = esc_Attr($gallery->post_title);
      $gallery_url = esc_Attr(get_Permalink($gallery->ID));
      $link = Str_Replace('<a ', "<a data-gallery-name='{$gallery_name}' data-gallery-url='{$gallery_url}' ", $link);
    }
    return $link;
  }

}

Random_Images_Widget::registerWidget();

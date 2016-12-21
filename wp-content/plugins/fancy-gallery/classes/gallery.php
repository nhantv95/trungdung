<?php Namespace WordPress\Plugin\GalleryManager;

class Gallery {
  private
    $gallery_id, # the post id of the gallery post
    $attributes = Array();

  function __construct($gallery_id = Null, $attributes = Null){
    $this->setGalleryID($gallery_id);
    $this->setAttributes($attributes);
  }

  function setGalleryID($gallery_id = Null){
    $gallery_id = $gallery_id ? IntVal($gallery_id) : get_The_Id();
    $this->gallery_id = $gallery_id;
  }

  function setAttributes($arr_attributes = Null){
    setType($arr_attributes, 'ARRAY');
    $arr_attributes = Array_Filter($arr_attributes);
    $this->attributes = $arr_attributes;
  }

  function render(){
    $attributes = Array_Merge(Array(
      'id' => $this->gallery_id,
    ), $this->attributes);

    return Gallery_Shortcode($attributes);
  }

  function getImages($parameters = Array()){
    setType($parameters, 'ARRAY');
    $parameters = Array_Merge(Array(
      'post_parent' => $this->gallery_id,
      'post_type' => 'attachment',
      'post_mime_type' => 'image',
      'order' => 'ASC',
      'orderby' => 'menu_order'
    ), $parameters);

    $attachments = get_Children($parameters);

    foreach($attachments as &$attachment){
      $image = WP_Get_Attachment_Image_Src($attachment->ID, 'full');

      if ($image){
        list($url, $width, $height, $is_intermediate) = $image;
      }
      else {
        unset($attachments[$index]);
        continue;
      }

      $attachment->url = $url;
      $attachment->width = $width;
      $attachment->height = $height;
      $attachment->is_intermediate = $is_intermediate;

      list($url, $width, $height, $is_intermediate) = WP_Get_Attachment_Image_Src($attachment->ID, 'thumbnail');
      $attachment->thumbnail = (Object) Array(
        'url' => $url,
        'width' => $width,
        'height' => $height,
        'is_intermediate' => $is_intermediate
      );
    }

    return $attachments;
  }

  function getPreviewImages(){
    $arr_images = $this->getImages(Array(
      'numberposts' => Options::get('preview_image_number'),
      'orderby' => 'rand'
    ));

    return $arr_images;
  }

  function renderPreview(){
    $arr_images = $this->getPreviewImages();
    if (empty($arr_images)) return false;

    $arr_image_ids = Array_Map(function($image){ return $image->ID; }, $arr_images);

    return Gallery_Shortcode(Array(
      'id' => 0,
      'ids' => $arr_image_ids,
      'columns' => Options::get('preview_columns'),
      'size' => Options::get('preview_thumb_size')
    ));
  }

  function setImages($arr_images){
    global $wpdb;

    $image_id_list = join(',', $arr_images);

    # Update parent_id for all attachments which are NOT in the images array
    $stmt = sprintf('
      UPDATE %s
      SET post_parent = NULL, menu_order = 0
      WHERE
        post_parent = "%u" AND
        post_type = "attachment" AND
        post_mime_type LIKE "image/%%" AND
        ID NOT IN (%s)',
        $wpdb->posts, $this->gallery_id, $image_id_list
    );
    $wpdb->query($stmt);

    # Update parent_id for all attachments which ARE in the images array
    $stmt = sprintf('
      UPDATE %s
      SET post_parent = "%u"
      WHERE
        post_type = "attachment" AND
        post_mime_type LIKE "image/%%" AND
        ID IN (%s)',
      $wpdb->posts, $this->gallery_id, $image_id_list
    );
    $wpdb->query($stmt);

    # Update menu_order for all attachments which ARE in the images array
    foreach ($arr_images as $order_index => $attachment_id){
      $wpdb->update(
        $wpdb->posts,
        Array('menu_order' => $order_index),
        Array('ID' => $attachment_id)
      );
    }

  }

}

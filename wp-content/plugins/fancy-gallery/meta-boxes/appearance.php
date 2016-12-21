<?php Namespace WordPress\Plugin\GalleryManager ?>

<table>
  <tr>
    <th><label for="gallery_columns"><?php _e('Columns') ?></label></th>
    <td>
      <select name="gallery[columns]" id="gallery_columns">
        <?php $selected = Gallery_Post_Type::getMeta('columns'); for ($columns = 1; $columns < 10; $columns++): ?>
        <option value="<?php echo $columns ?>" <?php selected($selected, $columns) ?>><?php echo $columns ?></option>
        <?php endfor ?>
      </select>
    </td>
  </tr>
  <tr>
    <th><label for="gallery_image_size"><?php _e( 'Size' ) ?></label></th>
    <td><?php echo Thumbnails::getDropdown(Array(
      'name' => 'gallery[image_size]',
      'id' => 'gallery_image_size',
      'selected' => Gallery_Post_Type::getMeta('image_size')
    )) ?></td>
  </tr>
</table>

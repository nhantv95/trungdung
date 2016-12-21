<?php Namespace WordPress\Plugin\GalleryManager ?>

<label class="screen-reader-text" for="post_author_override"><?php I18n::t('Owner') ?></label>

<?php
global $post;
WP_DropDown_Users(Array(
  'name' => 'post_author_override',
  'selected' => empty($post->ID) ? $user_ID : $post->post_author,
  'include_selected' => True )
);
?>

<small>(<?php echo I18n::t('Changes the owner of this gallery.') ?>)</small>

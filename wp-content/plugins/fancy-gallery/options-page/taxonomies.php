<?php Namespace WordPress\Plugin\GalleryManager ?>

<p><?php echo I18n::t('Please select the taxonomies you want to use to classify your galleries.') ?></p>

<table>
<?php
$active_taxonomies = (Array) Options::get('gallery_taxonomies');
foreach (Gallery_Taxonomies::getTaxonomies() AS $taxonomy => $tax_args): ?>
<tr>
  <td>
    <input type="checkbox" name="gallery_taxonomies[<?php echo $taxonomy ?>][name]" id="gallery_taxonomies_<?php echo $taxonomy ?>" value="<?php echo $taxonomy ?>" <?php checked(isSet($active_taxonomies[$taxonomy])) ?> ><label for="gallery_taxonomies_<?php echo $taxonomy ?>"><?php echo $tax_args['labels']['name'] ?></label>
  </td>
  <td>
    <input type="checkbox" name="gallery_taxonomies[<?php echo $taxonomy ?>][hierarchical]" id="gallery_taxonomies_<?php echo $taxonomy ?>_hierarchical" <?php checked(isSet($active_taxonomies[$taxonomy]['hierarchical'])) ?>><label for="gallery_taxonomies_<?php echo $taxonomy ?>_hierarchical"><?php echo I18n::t('hierarchical') ?></label>
  </td>
</tr>
<?php endforeach;

$disabled_taxonomies = Array(I18n::t('Events'), I18n::t('Places'), I18n::t('Dates'), I18n::t('Persons'), I18n::t('Photographers'));

foreach ($disabled_taxonomies as $taxonomy): ?>
<tr>
  <td><input type="checkbox" <?php disabled(True) ?> ><?php echo $taxonomy ?></td>
  <td><input type="checkbox" <?php disabled(True) ?> ><?php echo I18n::t('hierarchical') ?></td>
</tr>
<?php endforeach ?>
</table>

<p><?php Mocking_Bird::printProNotice('feature') ?></p>

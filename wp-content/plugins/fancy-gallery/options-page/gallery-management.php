<?php Namespace WordPress\Plugin\GalleryManager ?>

<table class="form-table">
<tr>
  <th><label for="enable_editor"><?php echo I18n::t('Text Editor') ?></label></th>
  <td>
		<select name="enable_editor" id="enable_editor">
			<option value="1" <?php selected(Options::get('enable_editor')) ?> ><?php echo I18n::t('On') ?></option>
			<option value="0" <?php selected(!Options::get('enable_editor')) ?> ><?php echo I18n::t('Off') ?></option>
		</select>
		<p class="help"><?php echo I18n::t('Enables or disables text editor for galleries.') ?></p>
	</td>
</tr>

<tr>
  <th><label><?php echo I18n::t('Excerpts') ?></label></th>
  <td>
		<select <?php disabled(True) ?> >
			<option><?php echo I18n::t('Off') ?></option>
		</select><?php Mocking_Bird::printProNotice('unlock') ?>
    <p class="help"><?php echo I18n::t('Enables or disables text excerpts for galleries.') ?></p>
	</td>
</tr>

<tr>
  <th><label><?php echo I18n::t('Revisions') ?></label></th>
  <td>
		<select <?php disabled(True) ?> >
			<option><?php echo I18n::t('Off') ?></option>
		</select><?php Mocking_Bird::printProNotice('unlock') ?>
    <p class="help"><?php echo I18n::t('Enables or disables revisions for galleries.') ?></p>
	</td>
</tr>

<tr>
  <th><label><?php echo I18n::t('Comments') ?></label></th>
  <td>
		<select <?php disabled(True) ?> >
			<option><?php echo I18n::t('Off') ?></option>
		</select><?php Mocking_Bird::printProNotice('unlock') ?>
    <p class="help"><?php echo I18n::t('Enables or disables comments and trackbacks for galleries.') ?></p>
	</td>
</tr>

<tr>
  <th><label for="enable_featured_image"><?php echo I18n::t('Featured Image') ?></label></th>
  <td>
		<select name="enable_featured_image" id="enable_featured_image">
			<option value="1" <?php selected(Options::get('enable_featured_image')) ?> ><?php echo I18n::t('On') ?></option>
			<option value="0" <?php selected(!Options::get('enable_featured_image')) ?> ><?php echo I18n::t('Off') ?></option>
		</select>
    <p class="help"><?php echo I18n::t('Enables or disables the "Featured Image" for galleries.') ?></p>
	</td>
</tr>

<tr>
  <th><label for="enable_custom_fields"><?php echo I18n::t('Custom Fields') ?></label></th>
  <td>
		<select name="enable_custom_fields" id="enable_custom_fields">
			<option value="1" <?php selected(Options::get('enable_custom_fields')) ?> ><?php echo I18n::t('On') ?></option>
			<option value="0" <?php selected(!Options::get('enable_custom_fields')) ?> ><?php echo I18n::t('Off') ?></option>
		</select>
    <p class="help"><?php echo I18n::t('Enables or disables the "Custom Fields" for galleries.') ?></p>
	</td>
</tr>

</table>

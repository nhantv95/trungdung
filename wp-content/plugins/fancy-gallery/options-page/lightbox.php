<?php Namespace WordPress\Plugin\GalleryManager ?>

<table class="form-table">

<tr valign="top">
  <th scope="row"><label for="lightbox"><?php echo I18n::t('Lightbox') ?></label></th>
  <td>
    <select <?php disabled(True) ?> >
      <option><?php echo I18n::t('On') ?></option>
    </select><?php Mocking_Bird::printProNotice('unlock') ?>
    <p class="help"><?php echo I18n::t('Turn this off if you do not want to use the included lightbox.') ?></p>
  </td>
</tr>

<tr valign="top">
  <th scope="row"><label for="continuous"><?php echo I18n::t('Loop mode') ?></label></th>
  <td>
    <select <?php disabled(True) ?> >
      <option><?php echo I18n::t('Off') ?></option>
    </select><?php Mocking_Bird::printProNotice('unlock') ?>
    <p class="help"><?php echo I18n::t('Enables the user to get from the last image to the first one with the "Next &raquo;" button.') ?></p>
  </td>
</tr>

<tr valign="top">
  <th scope="row"><label for="title_description"><?php echo I18n::t('Title &amp; Description') ?></label></th>
  <td>
    <select <?php disabled(True) ?> >
      <option><?php echo I18n::t('On') ?></option>
    </select><?php Mocking_Bird::printProNotice('unlock') ?>
    <p class="help"><?php echo I18n::t('Turn this off if you do not want to display the image title and description in your lightbox.') ?></p>
  </td>
</tr>

<tr valign="top">
  <th scope="row"><label for="close_button"><?php echo I18n::t('Close button') ?></label></th>
  <td>
    <select <?php disabled(True) ?> >
      <option><?php echo I18n::t('On') ?></option>
    </select><?php Mocking_Bird::printProNotice('unlock') ?>
    <p class="help"><?php echo I18n::t('Turn this off if you do not want to display a close button in your lightbox.') ?></p>
  </td>
</tr>

<tr valign="top">
  <th scope="row"><label for="indicator_thumbnails"><?php echo I18n::t('Indicator thumbnails') ?></label></th>
  <td>
    <select <?php disabled(True) ?> >
      <option><?php echo I18n::t('On') ?></option>
    </select><?php Mocking_Bird::printProNotice('unlock') ?>
    <p class="help"><?php echo I18n::t('Turn this off if you do not want to display small preview thumbnails below the lightbox image.') ?></p>
  </td>
</tr>

<tr valign="top">
  <th scope="row"><label for="slideshow_button"><?php echo I18n::t('Slideshow play/pause button') ?></label></th>
  <td>
    <select <?php disabled(True) ?> >
      <option><?php echo I18n::t('On') ?></option>
    </select><?php Mocking_Bird::printProNotice('unlock') ?>
    <p class="help"><?php echo I18n::t('Turn this off if you do not want to provide a slideshow function in the lightbox.') ?></p>
  </td>
</tr>

<tr valign="top">
  <th scope="row"><label for="slideshow_speed"><?php echo I18n::t('Slideshow speed') ?></label></th>
  <td>
    <input type="number" name="slideshow_speed" id="slideshow_speed" value="<?php echo IntVal(Options::get('slideshow_speed')) ?>" min="1" step="1">
    <?php echo I18n::t('ms', 'Abbr. Milliseconds') ?>
    <p class="help"><?php echo I18n::t('The delay between two images in the slideshow.') ?></p>
  </td>
</tr>

<tr valign="top">
  <th scope="row"><label for="preload_images"><?php echo I18n::t('Preload images') ?></label></th>
  <td>
    <input type="number" <?php disabled(True) ?> value="<?php echo IntVal(Options::get('preload_images')) ?>" min="1" step="1"><?php Mocking_Bird::printProNotice('unlock') ?>
    <p class="help"><?php echo I18n::t('The number of images which should be preloaded around the current one.') ?></p>
  </td>
</tr>

<tr valign="top">
  <th scope="row"><label for="animation_speed"><?php echo I18n::t('Animation speed') ?></label></th>
  <td>
    <input type="number" name="animation_speed" id="animation_speed" value="<?php echo IntVal(Options::get('animation_speed')) ?>" min="1" step="1">
    <?php echo I18n::t('ms', 'Abbr. Milliseconds') ?>
    <p class="help"><?php echo I18n::t('The speed of the image change animation.') ?></p>
  </td>
</tr>

<tr valign="top">
  <th scope="row"><label for="stretch_images"><?php echo I18n::t('Stretch images') ?></label></th>
  <td>
    <select name="stretch_images" id="stretch_images">
      <option value="" <?php Selected (Options::get('stretch_images'), '') ?> ><?php echo I18n::t('No stretching') ?></option>
      <option value="contain" <?php Selected (Options::get('stretch_images'), 'contain') ?> ><?php echo I18n::t('Contain') ?></option>
      <option value="cover" <?php Selected (Options::get('stretch_images'), 'cover') ?> ><?php echo I18n::t('Cover') ?></option>
    </select>
    <p class="help"><?php echo I18n::t('"Contain" means to scale the image to the largest size such that both its width and its height can fit the screen.') ?></p>
    <p class="help"><?php echo I18n::t('"Cover" means to scale the image to be as large as possible so that the screen is completely covered by the image. Some parts of the image may be cropped and invisible.') ?></p>
  </td>
</tr>

<tr valign="top">
  <th scope="row"><label for="script_position"><?php echo I18n::t('Script position') ?></label></th>
  <td>
    <select name="script_position" id="script_position">
      <option value="footer" <?php Selected (Options::get('script_position'), 'footer') ?> ><?php echo I18n::t('Footer of the website') ?></option>
      <option value="header" <?php Selected (Options::get('script_position'), 'header') ?> ><?php echo I18n::t('Header of the website') ?></option>
    </select>
    <p class="help"><?php echo I18n::t('Please choose the position of the javascript. "Footer" is recommended. Use "Header" if you have trouble to make the lightbox work.') ?></p>
  </td>
</tr>

</table>

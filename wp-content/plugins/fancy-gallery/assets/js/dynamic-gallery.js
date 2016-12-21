(function($){

  function addImage($dynamic_images, $image_template, image){
    var
      $new_image = $image_template.clone(),
      $img = $new_image.find('img.image'),
      $attachment_id = $new_image.find('.image-attachment-id'),
      thumbnail = image.sizes.thumbnail || image.sizes.medium || image.sizes.full;

    $img.attr({
      'src': thumbnail.url,
      'width': thumbnail.width,
      'height': thumbnail.height
    });
    $attachment_id.val(image.id);
    $new_image.appendTo($dynamic_images).show();

    reindexImages($dynamic_images);

    $dynamic_images.sortable('refresh');
  }

  function removeImage($image){
  }

  function reindexImages($dynamic_images){
    $dynamic_images.find('.image-template').each(function(index, image){
      var
        $image = $(image),
        $index = $image.find('.image-index');

      $index.text(++index);
    });
  }

  function showSelectImageDialog($dynamic_images, $image_template){
    // Create a new media dialog and open it
    var wp_media_dialog = new wp.media({
      title: wp.media.view.l10n.addToGalleryTitle,
      library : { type: 'image' },
      button: { text: wp.media.view.l10n.addToGallery },
      multiple: true
    }).open();

    // When a file was selected, grab the choosen attachments
    wp_media_dialog.on('select', function(){
      var arr_attachment = wp_media_dialog.state().get('selection').toJSON();
      for (index in arr_attachment) addImage($dynamic_images, $image_template, arr_attachment[index]);
    });
  }

  function showEditImageDialog($dynamic_images, $image_template, image){
    var
      $image = $(image).parents('.image-template:first').first();
      attachment_id = $image.find('input.image-attachment-id:first').val(),
      gallery_id = $('input#post_ID').val(),
      attachment = new wp.media.model.Attachment.get(attachment_id),
      frame = wp.media({
        title: wp.media.view.l10n.editGalleryTitle,
        button: { text: wp.media.view.l10n.apply },
        library : { type: 'image', uploadedTo: gallery_id, orderby: 'menuOrder', order: 'ASC' },
        router: false
      }).open();

      frame.$el
        .find('.media-frame-router, .media-toolbar').remove().end()
        .find('.attachments-browser .attachments').css('top', 0).end()
        .find('.ui-sortable').sortable('destroy');

      // Preselect the attachment
      frame.state().get('selection').add(attachment);

      /*
      frame.on('close', function(){
        var
          library = this.get('library'),
          images = library.get('library');

        $dynamic_images.empty();

        images.forEach(function(image, index){
          addImage($dynamic_images, $image_template, image.attributes);
        });
      });
      */
  }

  $('.dynamic-gallery').each(function(index, wrapper){
    var
      $wrapper = $(wrapper),
      $image_template = $wrapper.find('.image-template:first').hide(),
      $add_button = $wrapper.find('.add-image'),
      $dynamic_images = $wrapper.find('.dynamic-images'),
      pre_defined_images = [];

    $dynamic_images.sortable({
      update: function(event, ui){ reindexImages($dynamic_images); }
    });

    $add_button.on('click', function(event){
      showSelectImageDialog($dynamic_images, $image_template);
    });

    $wrapper.on('click', 'button.delete-image', function(event){
      if (confirm(DynamicGallery.warn_remove_image)){
        var $image = $(this).parents('.image-template:first').first();
        $image.fadeOut(500, function(){
          $(this).remove();
          reindexImages($dynamic_images);
          $dynamic_images.sortable('refresh');
        });
      }
    });

    $wrapper.on('click', 'img.image', function(event){
      showEditImageDialog($dynamic_images, $image_template, this);
    });

    // Load predefined images
    $wrapper.find('param').each(function(){
      pre_defined_images.push($(this).data('image-attachment-id'));
    });

    if (pre_defined_images.length){
      var query_args = {
        post__in: pre_defined_images,
        orderby: 'post__in',
        posts_per_page: -1,
        cache_results: false
      };

      wp.media.query(query_args).more().done(function(){
        this.forEach(function(image){
          addImage($dynamic_images, $image_template, image.attributes);
        });
      });
    }

  });

}(jQuery));

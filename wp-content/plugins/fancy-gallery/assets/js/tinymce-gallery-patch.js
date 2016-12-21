/* global tinymce */
tinymce.PluginManager.add('wpgallerypatch', function(editor){
  var $ = jQuery;

  function hideFirstToolbarButton(toolbar){
    toolbar.$el.find('.mce-btn').first().hide();
  }

  function showAllToolbarButtons(toolbar){
    toolbar.$el.find('.mce-btn').show();
  }

  editor.on('wptoolbar', function(event){
    var
      view = event.element,
      $view = $(view),
      type = $view.data('wpview-type'),
      shortcode = decodeURIComponent($view.data('wpview-text')),
      toolbar = event.toolbar;

    if (view && toolbar && type == 'gallery'){
      if (shortcode.indexOf(' id=') > 0)
        hideFirstToolbarButton(toolbar);
      else
        showAllToolbarButtons(toolbar);
    }

  });

});

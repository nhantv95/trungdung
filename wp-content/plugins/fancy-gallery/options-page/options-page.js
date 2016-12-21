(function($){

  $('input[data-toggle]').change(function(event){
    var
      $checkbox = $(this),
      state = $checkbox.prop('checked'),
      toggle_elements = $checkbox.data('toggle'),
      $toggle_elements = $(toggle_elements);

    $toggle_elements.toggle(state);
  }).trigger('change');

}(jQuery));

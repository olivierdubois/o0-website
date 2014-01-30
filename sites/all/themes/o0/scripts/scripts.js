
$ = jQuery;




/**
 * jQuery Knob.
 */
$(function() {
  $(".chart-doughnut").knob();
});




/**
 * Unify width and height of 'field-item' container in grid view.
 * This can be used to align images of different sizes (such as logos, etc.) on
 * the center of the 'field-item' containers.
 */
$(function() {
  function unifyContainer() {
    var widthMax = 0;
    var heightMax = 0;
    $('.field-items').children('.field-item').each(function() {
      var height = $(this).outerHeight();
      // alert(height);
      if ( height > heightMax ) {
        heightMax = height;
      }
      var width = $(this).outerWidth();
      // alert(width);
      if ( width > widthMax ) {
      widthMax = width;
      }
    });
    $('.field-item').css('height', heightMax);
    $('.field-item').css('width', widthMax);
  }
  unifyContainer();
});

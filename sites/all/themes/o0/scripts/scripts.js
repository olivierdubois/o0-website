
$ = jQuery;




/**
 * Unify width and height of 'field-item' container in grid view.
 * This can be used to align images of different sizes (such as logos, etc.) on
 * the center of the 'field-item' containers.
 */
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




/**
 * Define Colorbox image group depending on visible elements and media queries.
 */
function mqColorboxGroup() {
  if ( $(window).innerWidth() > 640 ) {
    $('.field-name-field-project-image.show-for-small a').attr('rel', 'node-field-project-image-disabled');
    $('.field-name-field-project-image.hide-for-small a').attr('rel', 'node-field-project-image');
  }
  if ( $(window).innerWidth() < 640 ) {
    $('.field-name-field-project-image.show-for-small a').attr('rel', 'node-field-project-image');
    $('.field-name-field-project-image.hide-for-small a').attr('rel', 'node-field-project-image-disabled');
  }
}

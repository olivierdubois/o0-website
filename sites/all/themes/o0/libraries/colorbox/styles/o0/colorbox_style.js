(function ($) {

Drupal.behaviors.initColorboxO0Style = {
  attach: function (context, settings) {
    $(document).bind('cbox_open', function () {
      // Hide close button initially.
      $('#cboxClose', context).css('opacity', 0);
      // Hide #cboxContent content initially.
      $('#cboxContent', context).css('opacity', 0);
    });
    $(document).bind('cbox_load', function () {
      // Hide close button. (It doesn't handle the load animation well.)
      $('#cboxClose', context).css('opacity', 0);
    });
    $(document).bind('cbox_complete', function () {
      // Show close button with a delay.
      //$('#cboxClose', context).fadeTo('fast', 0, function () {$(this).css('opacity', 1)});
      // Show #cboxContent content.
      $('#cboxContent', context).css('opacity', 1);
      // Show close button when mouse hover #cboxContent content.
      $('#cboxLoadedContent', context).bind('mouseover', function () {
        $('#cboxClose', context).animate({opacity: 1}, {queue: false, duration: "fast"});
      });
      // Hide close button when mouse hover #cboxOverlay.
      $('#cboxOverlay', context).bind('mouseover', function () {
        $('#cboxClose', context).animate({opacity: 0}, {queue: false, duration: "fast"});
      });
    });
  }
};

})(jQuery);

(function($){

$.drop({ mode:true });
Math.bounds = function(a, b, c) { return Math.max(a, Math.min(b, c)); }

var $easycaptcha = $('#easycaptcha').show();

$easycaptcha.find('.drag_item')
  .each(function() {
      $(this).data({
          origTop: $(this).css('top'),
          origLeft: $(this).css('left'),
      });
  })
  .drag('start', function(e, dd) {
      $(this).addClass('active');

      dd.limit = {
          top: 0,
          left: 0,
          bottom: $easycaptcha.outerHeight() - $(this).outerHeight(),
          right: $easycaptcha.outerWidth() - $(this).outerWidth()
      };

      $('.drag_item').not(this).each(function() {
          $(this).animate({
              top: $(this).data('origTop'),
              left: $(this).data('origLeft')
          });
      });

      $('input[name="easycaptcha"]').val('');
      $easycaptcha.find('.drop_zone').removeClass('valid');
  })
  .drag(function(e, dd) {
      $(this).css({
          top: Math.bounds(dd.limit.top, dd.offsetY - $easycaptcha.offset().top, dd.limit.bottom),
          left: Math.bounds(dd.limit.left, dd.offsetX - $easycaptcha.offset().left, dd.limit.right)
      });
  })
  .drag('end', function() {
      $(this).removeClass('active');
  });

$easycaptcha.find('.drop_zone')
  .drop('start', function() {
      $(this).addClass('active');
  })
  .drop(function(e, dd) {
      $('input[name="easycaptcha"]').val($(dd.drag).data('id'));
      $(this).addClass('valid');
  })
  .drop('end', function() {
      $(this).removeClass('active');
  });

}(jQuery));
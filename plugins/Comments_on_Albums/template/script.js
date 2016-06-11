(function(){
  var session_storage = window.sessionStorage || {};

  var comments=jQuery("#theCategoryPage #comments"),
      comments_button,
      commentsswitcher,
      comments_add,
      comments_top_offset = 0;

  function commentsToggle() {
    if (comments.hasClass("commentshidden")) {
      comments.removeClass("commentshidden").addClass("commentsshown");
      comments_button.addClass("comments_toggle_off").removeClass("comments_toggle_on");;
      session_storage['comments'] = 'visible';
      comments_top_offset = comments_add.offset().top - parseFloat(comments_add.css('marginTop').replace(/auto/, 0));
    }
    else {
      comments.addClass("commentshidden").removeClass("commentsshown");
      comments_button.addClass("comments_toggle_on").removeClass("comments_toggle_off");;
      session_storage['comments'] = 'hidden';
      comments_top_offset = 0;
    }
  }

  jQuery(function(){
    // comments show/hide
    if (comments.length == 1) {
      commentsswitcher=jQuery("#commentsSwitcher");
      comments_button=jQuery("#comments h3");
      comments_add=jQuery('#commentAdd');

      commentsswitcher.html('<div class="switchArrow">&nbsp;</div>');

      if (comments_button.length == 0) {
        jQuery("#addComment").before("<h3>Comments</h3>");
        comments_button=jQuery("#comments h3");
      }

      if ((session_storage['comments'] == 'hidden' || coa_on_top) && !coa_force_open) {
        comments.addClass("commentshidden");
        comments_button.addClass("comments_toggle comments_toggle_on");
      }
      else {
        comments.addClass("commentsshown");
        comments_button.addClass("comments_toggle comments_toggle_off");
      }

      comments_button.click(commentsToggle);
      commentsswitcher.click(commentsToggle);

      jQuery(window).scroll(function (event) {
        if (comments_top_offset==0) return;

        var y = jQuery(this).scrollTop();

        if (y >= comments_top_offset) {
          comments_add.css({
            'position': 'absolute',
            'top': Math.min(y-comments.offset().top+10, comments.height()-comments_add.height())
          });
        }
        else {
          comments_add.css({
            'position': 'static',
            'top': 0
          });
        }
      });

      if (comments_add.is(":visible")) {
        comments_top_offset = comments_add.offset().top - parseFloat(comments_add.css('marginTop').replace(/auto/, 0));
      }
    }
  });
}());
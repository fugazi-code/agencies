(function($) {
  'use strict';
  $(function() {
    $('[data-bs-toggle="offcanvas"]').on("click", function () {
      $('.row-offcanvas').toggleClass('active')
    });
  });
})(jQuery);

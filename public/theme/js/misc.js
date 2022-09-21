(function ($) {
    'use strict';
    $(function () {
        // $('#sidebar .nav').perfectScrollbar();
        // $('.container-scroller').perfectScrollbar( {suppressScrollX: true});
        const ps = new PerfectScrollbar('.container-scroller', {suppressScrollX: true});
        $('[data-bs-toggle="minimize"]').on("click", function () {
            $('body').toggleClass('sidebar-icon-only');
        });
    });

    $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');
})(jQuery);

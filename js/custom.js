(function ($) {
    "use strict";
    // SMOOTHSCROLL
    $(function() {
        $('.nav-link, .custom-btn-link').on('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 49
            }, 1000);
            event.preventDefault();
        });
    }); 
    // HEADER
    $(".navbar").headroom(); 
    // PROJECT CAROUSEL
    $('.owl-carousel').owlCarousel({
        items: 1,
        loop:true,
        margin:10,
        nav:true
    });
})(jQuery);
  
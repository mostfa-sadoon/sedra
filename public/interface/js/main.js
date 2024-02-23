
$(document).ready(function() {
	
function changeActive(e) {
    // Remove o seletor classe de todos item
    $('.screen-slider .owl-stage .owl-item').removeClass('ativo');
    setTimeout(function() {
        // Adiciona o seletor classe nos item da pagina ativa
        $('.screen-slider .owl-stage .active:first').addClass('ativo');
        $('.screen-slider .owl-stage .active:last').addClass('ativo');
    },0);
}
    function screen_slider() {
        var owl = $(".screen-slider");
		owl.on('screen-slider.owl.carousel', changeActive);
        owl.owlCarousel({
		  onChanged: changeActive,
		  onTranslate: changeActive,
            loop: true,
            margin: 30,
            navigation: true,
            items: 5,
            smartSpeed: 1000,
            dots: false,
            nav: true,
            autoplay: true,
            center: true,
            autoplayTimeout: 2000,
            dotsEach: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                767: {
                    items: 3
                },
                992: {
                    items: 5
                },
                1920: {
                    items: 5
                }
            }
        });
		 $( ".owl-prev").html('<span class="arrow-left"></span>');
		 $( ".owl-next").html('<span class="arrow-right"></span>');
    }
    screen_slider();
	
	
function changeActive(e) {
  // Remove o seletor classe de todos item
  $('.screen-slider .owl-stage .owl-item').removeClass('ativo');
  setTimeout(function() {
    // Adiciona o seletor classe nos item da pagina ativa
    $('.screen-slider .owl-stage .active:first').addClass('ativo');
    $('.screen-slider .owl-stage .active:last').addClass('ativo');
  },0);
}
var owl = $('.screen-slider');
	
	
$(".home-slider").owlCarousel({
  loop: true,
  autoplay: true,
  items: 1,
  nav: true,
  autoplayHoverPause: true,
  animateOut: 'slideOutUp',
  animateIn: 'slideInUp'
});

	
	
$("#goto-aboutus").click(function() {
    $('html, body').animate({
        scrollTop: $("#aboutus").offset().top
    }, 2000);
}),
$("#goto-serves").click(function() {
    $('html, body').animate({
        scrollTop: $("#serves").offset().top
    }, 2000);
}),
$("#goto-features").click(function() {
    $('html, body').animate({
        scrollTop: $("#features").offset().top
    }, 2000);
}),
$("#goto-screenshot").click(function() {
    $('html, body').animate({
        scrollTop: $("#screenshot").offset().top
    }, 2000);
}),
$("#footer-aboutus").click(function() {
    $('html, body').animate({
        scrollTop: $("#aboutus").offset().top
    }, 2000);
}),
$("#footer-serves").click(function() {
    $('html, body').animate({
        scrollTop: $("#serves").offset().top
    }, 2000);
}),
$("#footer-features").click(function() {
    $('html, body').animate({
        scrollTop: $("#features").offset().top
    }, 2000);
}),
$("#footer-screenshot").click(function() {
    $('html, body').animate({
        scrollTop: $("#screenshot").offset().top
    }, 2000);
});
	
//in case js in turned off
   $(window).on('load', function () {
        $("#header-scroll").removeClass("h-fixed")
  });

$(window).scroll(function () {
     var sc = $(window).scrollTop()
    if (sc > 1) {
        $("#header-scroll").addClass("h-fixed")
    } else {
        $("#header-scroll").removeClass("h-fixed")
    }
});

//scrollspy
$(window).on('scroll', function () {
   var sections = $('section')
    , nav = $('nav')
    , nav_height = nav.outerHeight()
    , cur_pos = $(this).scrollTop();
  sections.each(function() {
    var top = $(this).offset().top - nav_height,
        bottom = top + $(this).outerHeight();
 
    if (cur_pos >= top && cur_pos <= bottom) {
      nav.find('a').removeClass('active');
      sections.removeClass('active');
 
      $(this).addClass('active');
      nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
    }
  });
});


	new WOW().init();

});



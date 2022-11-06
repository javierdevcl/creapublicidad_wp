$(document).ready(function() {
  $('.owl-categorias').owlCarousel({
    margin: 10,
    nav: false,
    center: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    animateIn: 'fadeIn',
    animateOut: 'fadeOut',
    smartSpeed:450,
    responsive: {
      0: {
        items: 5
      },
      760: {
        items: 7
      }
    }
  })

  $('.owl-slider').owlCarousel({
    loop: true,
    margin: 3,
    nav: false,
    center: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    animateIn: 'fadeIn',
    animateOut: 'fadeOut',
    smartSpeed:450,
    responsive: {
      0: {
        items: 1
      },
      760: {
        items: 1
      }
    }
  })

  $('.owl-productos').owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    center: true,
    dots: false,
    autoplay: true,
    autoplayTimeout: 6000,
    autoplayHoverPause: false,
    responsive: {
      0: {
        items: 2,
        margin: 14,
        center: true,
        loop: true
      },
      480: {
        items: 3,
        loop: true
      },
      767: {
        items: 4,
        margin: 25
      },
      1140: {
        items: 4,
        margin: 40
      },
      1450: {
        items: 4,
        margin: 35
      }
    }
  })

  $('.owl-relacionados').owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    center: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 6000,
    autoplayHoverPause: false,
    responsive: {
      0: {
        items: 1,
        margin: 10,
        center: true,
        loop: true
      },
      480: {
        items: 2,
        margin: 8,
        loop: true
      },
      767: {
        items: 4,
        margin: 8
      },
      1140: {
        items: 4,
        margin: 10
      },
      1450: {
        items: 4,
        margin: 12
      }
    }
  })

  $(this).find('.owl-prev').each(function(index) {
    $(this).attr('aria-label',"Anterior");
  })

  $(this).find('.owl-next').each(function(index) {
    $(this).attr('aria-label',"Siguiente");
  })

});


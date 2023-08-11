if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) {
    window.location = 'microsoft-edge:' + window.location;
    setTimeout(function() {
        window.open('', '_self', '').close();
        window.location =
            'https://support.microsoft.com/en-us/topic/we-recommend-viewing-this-website-in-microsoft-edge-160fa918-d581-4932-9e4e-1075c4713595?ui=en-us&rs=en-us&ad=us';
    }, 0);
}

$(document).ready(function () {
//recent blog slider
$('.recent-blog-slider').slick({
  dots: false,
  arrows: true,
  infinite: false,
  speed: 600,
  infinite: false,
  autoplay: false,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [{
          breakpoint: 1880,
          settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
          }
      },

      {
          breakpoint: 1500,
          settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
          }
      },
      {
          breakpoint: 1210,
          settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
          }
      },
      {
          breakpoint: 1024,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
          }
      },
      {
          breakpoint: 775,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1
          }
      },
      {
          breakpoint: 575,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1
          }
      },
      {
          breakpoint: 378,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1
          }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
  ]
});
$('.leadership-team-slider').slick({
  dots: false,
  arrows: true,
  infinite: false,
  speed: 600,
  infinite: false,
  autoplay: false,
  slidesToShow: 1,
  slidesToScroll: 1,
  responsive: [{
          breakpoint: 1880,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
          }
      },

      {
          breakpoint: 1500,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
          }
      },
      {
          breakpoint: 1210,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
          }
      },
      {
          breakpoint: 1024,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
          }
      },
      {
          breakpoint: 775,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1
          }
      },
      {
          breakpoint: 575,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1
          }
      },
      {
          breakpoint: 378,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1
          }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
  ]
});
$('.join-our-team-slider').slick({
  dots: false,
  arrows: true,
  infinite: true,
  speed: 400,
  loop:true,
  autoplay: true,
  slidesToShow: 6,
  slidesToScroll: 6,
  responsive: [{
          breakpoint: 1880,
          settings: {
              slidesToShow: 6,
              slidesToScroll: 6,
          }
      },

      {
          breakpoint: 1500,
          settings: {
              slidesToShow: 6,
              slidesToScroll: 6,
          }
      },
      {
          breakpoint: 1210,
          settings: {
              slidesToShow: 5,
              slidesToScroll: 5,
          }
      },
      {
          breakpoint: 1024,
          settings: {
              slidesToShow: 4,
              slidesToScroll: 4,
          }
      },
      {
          breakpoint: 775,
          settings: {
              slidesToShow: 4,
              slidesToScroll: 4
          }
      },
      {
          breakpoint: 575,
          settings: {
              slidesToShow: 2,
              slidesToScroll: 2
          }
      },
      {
          breakpoint: 378,
          settings: {
              slidesToShow: 2,
              slidesToScroll: 2
          }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
  ]
});
// Mobile Navigation
if ($('.nav-menu').length) {
    var $mobile_nav = $('.nav-menu').clone().prop({
      class: 'mobile-nav d-lg-none'
    });
    $('body').append($mobile_nav);
    $('body').prepend('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>');
    $('body').append('<div class="mobile-nav-overly"></div>');

    $(document).on('click', '.mobile-nav-toggle', function(e) {
      $('body').toggleClass('mobile-nav-active');
      $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
      $('.mobile-nav-overly').toggle();
    });

    $(document).on('click', '.mobile-nav .drop-down > a', function(e) {
      e.preventDefault();
      $(this).next().slideToggle(300);
      $(this).parent().toggleClass('active');
    });

    $(document).click(function(e) {
      var container = $(".mobile-nav, .mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
          $('.mobile-nav-overly').fadeOut();
        }
      }
    });
  } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
    $(".mobile-nav, .mobile-nav-toggle").hide();
  }

//add class on scrolling
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();

     //>=, not <=
    if (scroll >= 50) {
        //clearHeader, not clearheader - caps H
        $(".fixed-top").addClass("scroll");
    }else{
      $(".fixed-top").removeClass("scroll");
    }
}); //missing );


//accordion function
$(function() {
  $('.acc__title').click(function(j) {

    var dropDown = $(this).closest('.acc__card').find('.acc__panel');
    $(this).closest('.acc').find('.acc__panel').not(dropDown).slideUp();

    if ($(this).hasClass('active')) {
      $(this).removeClass('active');
    } else {
      $(this).closest('.acc').find('.acc__title.active').removeClass('active');
      $(this).addClass('active');
    }

    dropDown.stop(false, true).slideToggle();
    j.preventDefault();
  });
});

$('.toggle-arrow').click(function(){
  $('#jobList').slideToggle();
  $(this).toggleClass('active');
})
});

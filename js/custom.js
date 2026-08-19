(function ($) {
  "use strict";

  $(function () {
    var header = $(".start-style");
    $(window).scroll(function () {
      var scroll = $(window).scrollTop();

      if (scroll < 10) {
        header.removeClass("scroll-on").addClass('start-style');
      }
    });
  });

  $('body').on('mouseenter mouseleave', '.nav-item', function (e) {
    if ($(window).width() > 750) {
      var _d = $(e.target).closest('.nav-item');
      _d.addClass('show');
      setTimeout(function () {
        _d[_d.is(':hover') ? 'addClass' : 'removeClass']('show');
      }, 1);
    }
  });

})(jQuery);

$(document).ready(function() {
  if ($.fn && $.fn.owlCarousel) {
    if ($("#service-slider").length) {
      $("#service-slider").owlCarousel({
        items : 4,
        itemsDesktop:[1299,3],
        itemsDesktopSmall:[991,2],
        itemsMobile : [600,1],
        autoPlay:true,
        nav:true
      });
    }
    if ($("#client-slider22").length) {
      $("#client-slider22").owlCarousel({
        items : 5,
        itemsDesktop:[1299,4],
        itemsDesktopSmall:[991,3],
        itemsMobile : [600,2],
        autoPlay:true,
        nav:true
      });
    }
    if ($("#service-slider2").length) {
      $("#service-slider2").owlCarousel({
        items : 3,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[991,2],
        itemsMobile : [600,1],
        autoPlay:true,
        nav:true
      });
    }
    if ($("#service-slider22").length) {
      $("#service-slider22").owlCarousel({
        items : 3,
        itemsDesktop:[1199,2],
        itemsDesktopSmall:[991,2],
        itemsTablet:[768,2],
        itemsMobile : [600,1],
        autoPlay:true,
        nav:true
      });
    }
    if ($("#blog-slider").length) {
      $("#blog-slider").owlCarousel({
        items : 3,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[991,2],
        itemsMobile : [600,1],
        autoPlay:true,
        nav:true
      });
    }
  }

  // HERO SLIDER
  if (typeof Swiper !== 'undefined' && $('.swiper-container').length > 0) {
    var menu = [];
    jQuery('.swiper-slide').each( function(index){
      var txt = jQuery(this).find('.slide-inner').attr("data-text");
      if (txt) menu.push(txt);
    });
    var interleaveOffset = 0.5;
    var swiperOptions = {
      loop: true,
      speed: 1000,
      parallax: true,
      autoplay: {
        delay: 6500,
        disableOnInteraction: false,
      },
      watchSlidesProgress: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },

      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      on: {
        progress: function() {
          var swiper = this;
          if (!swiper || !swiper.slides) return;
          for (var i = 0; i < swiper.slides.length; i++) {
            var slideProgress = swiper.slides[i].progress;
            var innerOffset = swiper.width * interleaveOffset;
            var innerTranslate = slideProgress * innerOffset;
            var innerEl = swiper.slides[i].querySelector(".slide-inner");
            if (innerEl) {
              innerEl.style.transform = "translate3d(" + innerTranslate + "px, 0, 0)";
            }
          }      
        },

        touchStart: function() {
          var swiper = this;
          if (!swiper || !swiper.slides) return;
          for (var i = 0; i < swiper.slides.length; i++) {
            swiper.slides[i].style.transition = "";
          }
        },

        setTransition: function(speed) {
          var swiper = this;
          if (!swiper || !swiper.slides) return;
          for (var i = 0; i < swiper.slides.length; i++) {
            swiper.slides[i].style.transition = speed + "ms";
            var innerEl = swiper.slides[i].querySelector(".slide-inner");
            if (innerEl) {
              innerEl.style.transition = speed + "ms";
            }
          }
        }
      }
    };

    var swiper = new Swiper(".swiper-container", swiperOptions);
  }

  // DATA BACKGROUND IMAGE
  var sliderBgSetting = $(".slide-bg-image");
  sliderBgSetting.each(function(indx){
    if ($(this).attr("data-background")){
      $(this).css("background-image", "url(" + $(this).data("background") + ")");
    }
  }); 

  // Scroll back to top
  var progressPath = document.querySelector('.progress-wrap path');
  if (progressPath) {
    var pathLength = progressPath.getTotalLength();
    progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
    progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';    
    var updateProgress = function () {
      var scroll = $(window).scrollTop();
      var height = $(document).height() - $(window).height();
      var progress = height > 0 ? pathLength - (scroll * pathLength / height) : pathLength;
      progressPath.style.strokeDashoffset = progress;
    };
    updateProgress();
    $(window).scroll(updateProgress); 
  }

  var offset = 50;
  var duration = 550;
  jQuery(window).on('scroll', function() {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('.progress-wrap').addClass('active-progress');
    } else {
      jQuery('.progress-wrap').removeClass('active-progress');
    }
  });       
  jQuery('.progress-wrap').on('click', function(event) {
    event.preventDefault();
    jQuery('html, body').animate({scrollTop: 0}, duration);
    return false;
  });
});

function closenav() {
  $('#navbarSupportedContent').removeClass('show');
  $('.navbar-toggler').addClass('collapsed');
  $(".navbar-toggler").attr("aria-expanded","false");
} 




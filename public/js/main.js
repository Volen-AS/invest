//function for login form
jQuery(document).ready(function($){

  var $login = $('.login'),
  $loginForm = $('.login_form');

  $login.on('click', function(){
    $loginForm.stop().slideToggle();
  });

  $(document).on('mouseup', function(e) {
    if($loginForm.has(e.target).length === 0){
          $loginForm.slideUp();
      }
  });
});

//function for exit form
jQuery(document).ready(function($){

  var $clickExit = $('.click_exit'),
  $loginExit = $('.login_exit');

  $clickExit.on('click', function(){
    $loginExit.stop().slideToggle();
  });

  $(document).on('mouseup', function(e) {
    if($loginExit.has(e.target).length === 0){
          $loginExit.slideUp();
      }
  });
});


// function for menu
 $(document).ready(function () {

        function hideallDropdowns() {
            $(".dropped .drop-menu-main-sub").hide();
            $(".dropped").removeClass('dropped');
            $(".dropped .drop-menu-main-sub .open-menu").unbind("click");
        }

        function showDropdown(el) {
            var el_li = $(el).parent().addClass('dropped');
            el_li
                .find('.open-menu')
                .click(function () {
                    hideallDropdowns();
                })
                .html($(el).html());

            el_li.find('.drop-menu-main-sub').show();
        }

        $(".drop-down").click(function(){
            showDropdown(this);
        });

        $(document).mouseup(function () {
            hideallDropdowns();
        });
    });


//matchHeight for menu
var $box_about = $('.box-about'),
  $box_news = $('.box-news'),
  $box_finansse = $('.box-finansse'),
  $box_security = $('.box-security'),
  $box_language = $('.box-language'),
  $box_exit = $('.box-exit'),
  $boxRulesZmiabout = $('.box-rules-mh'),
  $boxRulesZmiaboutP = $('.box-rules-mh_p'),
  $box_rules = $('.box-rules-zmiabout'),
  $content_block_chat = $('.content_block_chat'),
  $title_block_chat = $('.title_block_chat'),
  $primery_blocks_chat = $('.primery_blocks_chat'),
  $content_rules_fund = $('.content_rules_fund'),
  $primery_blocks_fund = $('.primery_blocks_fund'),
  $content_block_fund = $('.content_block_fund'),
  $fix_height_smenu = $('.fix_height_smenu'),
  $primery_inform_block_referral_first = $('.primery_inform_block_referral_first');

$($box_about).matchHeight();
$($box_news).matchHeight();
$($box_finansse).matchHeight();
$($box_security).matchHeight();
$($box_language).matchHeight();
$($box_exit).matchHeight();
$($boxRulesZmiabout).matchHeight();
$($box_rules).matchHeight();
$($boxRulesZmiaboutP).matchHeight();
$($primery_blocks_chat).matchHeight();
$($content_block_chat).matchHeight();
$($title_block_chat).matchHeight();
$($primery_blocks_fund).matchHeight();
$($content_block_fund).matchHeight();
$($content_rules_fund).matchHeight();
$($fix_height_smenu).matchHeight();
$($primery_inform_block_referral_first).matchHeight();


//******************************
//******************************
// File Upload
//
$(function(){
    var container = $('.container'), inputFile = $('#file'), img, btn, txt = 'Додати картинку', txtAfter = 'Замінити картинку';

    if(!container.find('#upload').length){
        container.find('.input').append('<input type="button" value="'+txt+'" id="upload">');
        btn = $('#upload');
        container.prepend('<img src="" class="hidden" alt="Uploaded file" id="uploadImg" width="100">');
        img = $('#uploadImg');
    }

    btn.on('click', function(){
        img.animate({opacity: 0}, 300);
        inputFile.click();
    });

    inputFile.on('change', function(e){
        container.find('label').html( inputFile.val() );

        var i = 0;
        for(i; i < e.originalEvent.srcElement.files.length; i++) {
            var file = e.originalEvent.srcElement.files[i],
                reader = new FileReader();

            reader.onloadend = function(){
                img.attr('src', reader.result).animate({opacity: 1}, 700);
            }
            reader.readAsDataURL(file);
            img.removeClass('hidden');
        }

        btn.val( txtAfter );
    });
});

//**************************
//*************************
//function top window
$(function() {

  $(window).scroll(function() {

  if($(this).scrollTop() != 0) {

  $('#toTop').fadeIn();

  } else {

  $('#toTop').fadeOut();

  }

  });

  $('#toTop').click(function() {

  $('body,html').animate({scrollTop:0},1000);

  });

});

//FUNCTION OPEN TABLE AT SIDEBAR
  $(".see_everything").on("click", function(){
  $(".see_all_table_active").toggleClass("see_all_table");
      });

//FUNCTION OPEN REFERRAL in srtucture
 $(".block_referral_first").on("click", function(){
    var structure = $(this).data('refStru');
    $('.transaction_referrals_table').hide();
    $('[data-refStru="' + structure + '"]').show();

  });

//FUNCTION OPEN SUB referralForm
$(".block_referral_referralForm").on("click", function(){
    var refId = $(this).data('refform');
    $('.table_referralForm').hide();
    $('[data-refForm="' + refId + '"]').show();

  });

$(document).mouseup(function (e) {
    var container = $(".table_referralForm");
    if (container.has(e.target).length === 0){
        container.hide();
    }
});



//FUNCTION OPEN transaction affiliated
$(".block_affiliated_structure").on("click", function(){
$(".transaction_affiliated").toggleClass("transaction_affiliated_table_active");
    });
//FUNCTION OPEN inform affiliated
$(".block_affiliated_referralForm").on("click", function(){
$(".table_affiliated_referralForm").toggleClass("table_affiliated_referralForm_active");
    });
//FUNCTION OPEN SUB search 768px
  $(".search_submit_768").on("click", function(){
  $(".in_serch_768").toggleClass("in_serch_768_active");
      });



//hover for transition referral
var hint = $('#hint');
$('div[data-hint]').on({
    mouseenter: function(){
        hint.text($(this).data('hint')).show();
    },
    mouseleave: function(){
        hint.hide();
    },
    mousemove: function(e){
        hint.css({top: e.pageY, left: e.pageX});
    }
});


//************************************
//************************************
//************************************
//FUNCTION SLIDER
(function($) {

  'use strict';

  /**
   * Helpers methods
   */

  function supportCSS3(prop) {
    var prefix = ['-webkit-', '-moz-', ''];
    var root = document.documentElement;

    function camelCase(str) {
      return str.replace(/\-([a-z])/gi, function(match, $1) {
        return $1.toUpperCase();
      });
    }
    for (var i = prefix.length - 1; i >= 0; i--) {
      var css3prop = camelCase(prefix[i] + prop);
      if (css3prop in root.style) {
        return css3prop;
      }
    }
    return false;
  }

  function transitionEnd() {
    var transitions = {
      'transition': 'transitionend',
      'WebkitTransition': 'webkitTransitionEnd',
      'MozTransition': 'mozTransitionEnd'
    };
    var root = document.documentElement;
    for (var name in transitions) {
      if (root.style[name] !== undefined) {
        return transitions[name];
      }
    }
    return false;
  }

  function support3d() {
    if (!window.getComputedStyle) {
      return false;
    }
    var el = document.createElement('div'),
      has3d,
      transform = supportCSS3('transform');

    document.body.insertBefore(el, null);

    el.style[transform] = 'translate3d(1px,1px,1px)';
    has3d = getComputedStyle(el)[transform];

    document.body.removeChild(el);

    return (has3d !== undefined && has3d.length > 0 && has3d !== "none");
  }

  var Touch = {
    hasTouch: !!(("ontouchstart" in window) || window.DocumentTouch && document instanceof DocumentTouch),
    event: function() {
      return {
        start: (this.hasTouch) ? 'touchstart' : 'mousedown',
        move: (this.hasTouch) ? 'touchmove' : 'mousemove',
        end: (this.hasTouch) ? 'touchend' : 'mouseup',
        leave: (this.hasTouch) ? 'touchleave' : 'mouseout'
      };
    }
  };

  function throttle(func, wait, options) {
    var context, args, result;
    var timeout = null;
    var previous = 0;
    if (!options) options = {};
    var later = function() {
      previous = options.leading === false ? 0 : Date.now();
      timeout = null;
      result = func.apply(context, args);
      if (!timeout) context = args = null;
    };
    return function() {
      var now = Date.now();
      if (!previous && options.leading === false) previous = now;
      var remaining = wait - (now - previous);
      context = this;
      args = arguments;
      if (remaining <= 0 || remaining > wait) {
        if (timeout) {
          clearTimeout(timeout);
          timeout = null;
        }
        previous = now;
        result = func.apply(context, args);
        if (!timeout) context = args = null;
      } else if (!timeout && options.trailing !== false) {
        timeout = setTimeout(later, remaining);
      }
      return result;
    };
  }

  var PLUGIN = 'ikSlider';

  var ikSlider = function(el, options) {

    var settings = $.extend({
      touch: true,
      infinite: false,
      autoPlay: true,
      pauseOnHover: true,
      delay: 1500,
      responsive: true,
      controls: true,
      arrows: true,
      caption: true,
      speed: 300,
      cssEase: 'ease-out'
    }, options || {});

    var $container = el;
    var $slider = $container.find('.slider');
    var $arrows = $container.find('.slider__switch');
    var $caption = $slider.find('.slider__caption');
    var $slide = $slider.find('.slider__item');
    var sliderStyle = $slider.get(0).style;
    var slideLen = $slide.length;
    var slideWidth = $container.outerWidth();
    var sliderWidth = slideLen * slideWidth;
    var current = 0;
    var offset = 0;
    var busy = false;
    var touchFlag = false;
    var $controlPanel;
    var $navControl;
    var timer;

    var transformProperty = supportCSS3('transform');
    var transitionProperty = supportCSS3('transition');
    var has3d = support3d();

    function init() {

      // Calculate dimensions
      _dimmensions();

      if (settings.responsive) {
        $(window).on('resize.' + PLUGIN, throttle(_responsive, 50));
      }

      // If caption false, hide caption
      !settings.caption && $caption.attr('disabled', true);

      // Create nav controls
      settings.controls && _controls();

      if (settings.touch) {
        // if the image img tag set attribute graggable false
        $slide.find('img').attr('draggable', false);
        // Binding touch events
        _touchEnable();
      }

      if (settings.autoPlay) {
        _autoPlay();
        if (settings.pauseOnHover) {
          $container.on('mouseenter.' + PLUGIN, function() {
            clearInterval(timer);
          });
          $container.on('mouseleave.' + PLUGIN, _autoPlay);
        }
      }

      if (settings.arrows) {

        // if infinite setting false hide arrows
        !settings.infinite && _stopinfinite('prev');

        $arrows.on('click.' + PLUGIN, function(e) {
          e.preventDefault();
          if (this.getAttribute('data-ikslider-dir') === 'next') {
            show(current + 1);
          } else {
            show(current - 1);
          }
        });
      } else {
        $arrows.attr('disabled', true);
      }
    }

    function _controls() {
      $controlPanel = $('<div/>', {
          'class': 'slider-nav'
        })
        .appendTo($container);

      var links = [];

      for (var i = 0; slideLen > i; i++) {
        var act = (current === i) ? 'is-active' : '';
        links.push('<a class="slider-nav__control ' + act + '" data-ikslider-control="' + i + '"></a>');
      }
      $controlPanel.html(links.join(''));
      $navControl = $controlPanel.find('.slider-nav__control');
      $controlPanel.on('click.' + PLUGIN, '.slider-nav__control', function(e) {
        e.preventDefault();
        if ($(this).hasClass('is-active')) return;
        show(parseInt(this.getAttribute('data-ikslider-control'), 10));
      });
    }

    function _touchEnable() {
      $slider.addClass('has-touch');
      var touchX;
      var touchY;
      var delta;
      var target;

      $slider.on(Touch.event().start + '.' + PLUGIN, function(e) {
        if (touchFlag || busy) return;

        var touch;
        if (e.originalEvent.targetTouches) {
          target = e.originalEvent.targetTouches[0].target;
          touch = e.originalEvent.targetTouches[0];
        } else {
          touch = e.originalEvent;
          e.preventDefault();
        }

        delta = 0;
        touchX = touch.pageX || touch.clientX;
        touchY = touch.pageY || touch.clientY;
        touchFlag = true;

      });
      $slider.on(Touch.event().move + '.' + PLUGIN, function(e) {
        if (!touchFlag) return;

        var touch;
        if (e.originalEvent.targetTouches) {
          if (e.originalEvent.targetTouches.length > 1 || target !== e.originalEvent.targetTouches[0].target) {
            return;
          }
          touch = e.originalEvent.targetTouches[0];
        } else {
          e.preventDefault();
          touch = e.originalEvent;
        }

        var currentX = touch.pageX || touch.clientX;
        var currentY = touch.pageY || touch.clientY;

        if (Math.abs(touchX - currentX) >= Math.abs(touchY - currentY)) {
          delta = touchX - currentX;
          _move(parseInt(offset, 10) - delta);
        }
      });
      $slider.on(Touch.event().end + '.' + PLUGIN, function(e) {
        if (!touchFlag) return;
        var swipeTo = delta < 0 ? current - 1 : current + 1;

        if (Math.abs(delta) < 50 || (!settings.infinite && (swipeTo > slideLen - 1 || swipeTo < 0))) {
          touchFlag = false;
          _move(offset, true);
          return;
        }
        touchFlag = false;
        target = null;
        show(swipeTo);
      });
      $slider.on(Touch.event().leave + '.' + PLUGIN, function() {
        if (touchFlag) {
          _move(offset, true);
          touchFlag = false;
        }
      });
    }

    function show(slide) {
      if (busy) return;
      if (slide === current) return;
      current = (slide > slideLen - 1) ? 0 : slide;
      if (slide < 0) {
        current = slideLen - 1;
      }

      if (!settings.infinite) {

        $arrows.attr('disabled', false);
        if (slide === slideLen - 1) {
          _stopinfinite('next');
        }

        if (current === 0) {
          _stopinfinite('prev');
        }

      }

      offset = -(slideWidth * (current));

      if (settings.controls) {
        $navControl.removeClass('is-active')
          .eq(current)
          .addClass('is-active');
      }
      busy = true;
      _move(offset, true);

      _triggerChange();
    }

    function _move(value, hasAnimate) {

      if (transitionProperty && transformProperty) {

        (hasAnimate) ?
        sliderStyle[transitionProperty] = transformProperty + ' ' + settings.speed + 'ms ' + settings.cssEase: sliderStyle[transitionProperty] = "none";

        (has3d) ?
        sliderStyle[transformProperty] = 'translate3d(' + value + 'px, 0, 0)': sliderStyle[transformProperty] = 'translateX(' + value + 'px)';

        if (hasAnimate) {
          $slider.one(transitionEnd(), function(e) {
            busy = false;
          });
        } else {
          busy = false;
        }
      } else {
        if (hasAnimate) {
          $slider.animate({
            'margin-left': value
          }, settings.speed, 'linear', function() {
            busy = false;
          });
        } else {
          $slider.css('margin-left', value);
          busy = false;
        }

      }
    }

    // Change event trigger
    function _triggerChange() {
      var eventSlide = $.Event('changeSlide.' + PLUGIN, {
        currentSlide: current
      });
      $container.trigger(eventSlide);
    }

    function _autoPlay() {
      if (timer) clearInterval(timer);
      timer = setInterval(function() {
        if (!touchFlag) {
          show(current + 1);
        }
      }, settings.delay);
    }

    function _stopinfinite(direction) {
      $container.find('.slider__switch--' + direction).attr('disabled', true);
    }

    function _dimmensions() {
      slideWidth = $container.outerWidth();
      sliderWidth = slideLen * slideWidth;

      $slide.css('width', slideWidth);
      sliderStyle['width'] = sliderWidth + 'px';
    }

    function _responsive() {

      if (timer) clearInterval(timer);
      _dimmensions();

      offset = -(slideWidth * current);
      _move(offset);

      settings.autoPlay && _autoPlay();

    }

    function destroy() {
      sliderStyle['width'] = '';
      sliderStyle[transformProperty] = '';
      sliderStyle[transitionProperty] = '';
      $slide.css('width', '');
      if (settings.autoPlay) {
        if (timer) clearInterval(timer);
        $container.off('mouseenter.' + PLUGIN);
        $container.off('mouseleave.' + PLUGIN);
      }
      if (settings.arrows) {
        $arrows.off('click.' + PLUGIN);
        $arrows.attr('disabled', false);
      }
      if (settings.controls) {
        $controlPanel.off('click.' + PLUGIN).remove();
      }

      $caption.attr('disabled', false);

      if (settings.touch) {
        $slider
          .removeClass('has-touch')
          .off(Touch.event().start + '.' + PLUGIN)
          .off(Touch.event().move + '.' + PLUGIN)
          .off(Touch.event().end + '.' + PLUGIN)
          .off(Touch.event().leave + '.' + PLUGIN);
        touchFlag = false;
      }
      if (settings.responsive) {
        $(window).off('resize.' + PLUGIN);
      }
      $container.removeData(PLUGIN);
      $container = null;
      $slider = null;
      $arrows = null;
      $caption = null;
      $slide = null;
      $controlPanel = null;
      $navControl = null;
      sliderStyle = null;
      slideLen = null;
      slideWidth = null;
      sliderWidth = null;
      current = null;
      offset = null;
      busy = null;
      timer = null;
      has3d = null;
      busy = false;
      transformProperty = null;
      transitionProperty = null;
    }

    /**
     * @return {methods} [Public slider methods API]
     */
    return {
      init: init,
      show: show,
      destroy: destroy
    };

  };

  $.fn[PLUGIN] = function(opt) {
    var _this = this;
    this.each(function() {
      var $this = $(this);
      var slider = $this.data(PLUGIN);
      var options = typeof opt === 'object' && opt;
      if (!slider && /(destroy|\d+)/.test(opt)) return;
      if (!slider) {
        slider = new ikSlider($this, options);
        $this.data('ikSlider', slider);
        slider.init();
      }
      if (typeof opt === 'string' || typeof opt === 'number' && opt !== 'init') {
        if (typeof opt === 'number') {
          _this = slider.show(opt);
        } else {
          if(slider[opt]) {
            _this = slider[opt]();
          } else {
            throw new Error('Error:: ikSlider has no method: ' + opt);
          }
        }
      }
      return _this;
    });
  };

})(jQuery);


$('.slider-container').ikSlider({
  speed: 500,
  autoPlay: !1
});

$(document).on('click','#close_lot_take_off',function(){
  $('#lot_take_off').css('display', 'none');
});


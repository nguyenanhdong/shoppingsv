/*jslint browser: true*/
/*global $, jQuery, Modernizr, enquire*/
;(function (window, document, $) {
    var $html = $('html'),
      mobileOnly = "screen and (max-width:47.9375em)", // 767px.
      mobileLandscape = "(min-width:30em)", // 480px.
      tablet = "(min-width:48em)"; // 768px.
    // Add  functionality here.
    // Show hidden function.
    var showHiddenFunction = function (btn, flag, clickOutside, hasGrandParent, dropDown, childSelector) {
      var $btn = btn,
          $parent = $btn.parent(),
          $grandParent = $parent.parents('.header'),
          $childSelector = childSelector,
      dropDown = dropDown === true ? true : false;
      clickOutside = clickOutside === false ? false : true;
      hasGrandParent = hasGrandParent === true ? true : false;
      $btn.on('click', function (e) {
        e.preventDefault();
        if (!$parent.hasClass(flag)) {
          $parent.addClass(flag);
  
          if (dropDown === true) {
            $childSelector.slideDown("slow");
          }
  
          if (hasGrandParent === true) {
            $grandParent.addClass(flag);
            $btn.addClass(flag);
          }
        }
        else {
          $parent.removeClass(flag);
          if (dropDown === true) {
            $childSelector.slideUp("slow");
          }
  
          if (hasGrandParent === true) {
            $grandParent.removeClass(flag);
            $btn.removeClass(flag);
          }
        }
      });
      if (clickOutside === true) {
        $(document).on('touchstart click', function (e) {
          if ($parent.has(e.target).length === 0 && $parent.hasClass(flag)) {
            $parent.removeClass(flag);
  
            if (hasGrandParent === true) {
              $grandParent.removeClass(flag);
              $btn.removeClass(flag);
            }
  
            if (dropDown === true) {
              $childSelector.slideUp("slow");
            }
          }
        });
      }
    };
  
    $(document).ready(function() {
      // Menu mobile
      var $menuResponsive = $('.js-toggle-menu'),
          showMainMenuFlag = 'is-show',
          $parent = $menuResponsive.closest('.header__inner'),
          $childMenu = $parent.find('.header__menu');
      showHiddenFunction($menuResponsive, showMainMenuFlag, false, true, true, $childMenu);
  
      // Header scroll
      var classMode = 'sticky',
          $header = $('.js-sticky'),
      stickyFunctional = function () {
        if ($(window).scrollTop() > 0) {
          $header.addClass(classMode);
        } else {
          $header.removeClass(classMode);
        }
      };
      $(window).on('scroll', stickyFunctional).resize();
  
      // Back to top
      $(".back-to-top").click(function() {
        $("html, body").animate({scrollTop: 0}, 1000);
     });
    });
  
  }(this, this.document, this.jQuery));
// Import Vendors
import SwiperCore, {
  Swiper,
  Navigation,
  Pagination,
  Autoplay,
  Thumbs,
} from "swiper/core";

window.Swiper = Swiper;

/* ------------------------------------------------------------------------- *
 * INIT COMPONENTS
 * ------------------------------------------------------------------------- */
jQuery.noConflict();

(function ($) {
  $(function () {
    var rtlPage =
      $("html").attr("dir") == "rtl" || $("html").attr("lang") == "ar"
        ? true
        : false;

    // Header
    (function () {
      var header = $(".header"),
        headerOffset = $(".header").offset();

      $(window).on("scroll", function () {
        if (header.length > 0) {
          if ($(window).scrollTop() >= headerOffset.top + 50) {
            header.addClass("sticking");
          } else {
            header.removeClass("sticking");
          }
        }
      });
    })();

    // Menu
    (function () {
      // Open Menu
      $("[data-toggle='menu']").on("click", function (e) {
        e.preventDefault();
        var dataTarget = $(this).data("target");
        $(dataTarget).fadeIn();
        $(dataTarget).addClass("opened");
        if (rtlPage) {
          $(dataTarget + " .app-menu__offcanvas").animate({ right: 0 }, 400);
        } else {
          $(dataTarget + " .app-menu__offcanvas").animate({ left: 0 }, 400);
        }
      });

      // Close Menu
      $("[data-dismiss='menu']").on("click", function (e) {
        e.preventDefault();
        var getMenu = $(this).parents(".app-menu");
        var menuW = getMenu.find(".app-menu__offcanvas").width();
        if (rtlPage) {
          getMenu.find(".app-menu__offcanvas").animate({ right: -menuW }, 400);
        } else {
          getMenu.find(".app-menu__offcanvas").animate({ left: -menuW }, 400);
        }
        getMenu.fadeOut();
        getMenu.removeClass("opened");
      });

      $(".app-menu").on("click", function (e) {
        e.preventDefault();
        var menuW = $(this).find(".app-menu__offcanvas").width();
        if (rtlPage) {
          $(this).find(".app-menu__offcanvas").animate({ right: -menuW }, 400);
        } else {
          $(this).find(".app-menu__offcanvas").animate({ left: -menuW }, 400);
        }
        $(this).fadeOut();
        $(this).removeClass("opened");
      });

      $(document).keydown(function (e) {
        if (e.keyCode == 27) {
          var menuW = $(".app-menu .app-menu__offcanvas").width();
          $(".app-menu .app-menu__offcanvas").animate({ left: -menuW }, 400);
          $(".app-menu").fadeOut();
          $(".app-menu").removeClass("opened");
        }
      });

      // Stop Propagation Menu Offcanvas
      $(".app-menu .app-menu__offcanvas").on("click", function (e) {
        e.stopPropagation();
      });
    })();

    // Modal
    (function () {
      // Open Modal
      $("[data-toggle='modal']").on("click", function (e) {
        e.preventDefault();
        var dataTarget = $(this).data("target");
        $(dataTarget).fadeIn();
        $(dataTarget).addClass("opened");
        var $videoSrc;
        // $videoSrc = $(this).attr("data-video");
        // $(dataTarget + " iframe").attr(
        //   "src",
        //   $videoSrc + "?autoplay=0&amp;modestbranding=1&amp;showinfo=0"
        // );
      });

      // Close Modal
      $("[data-dismiss='modal']").on("click", function (e) {
        e.preventDefault();
        var getModal = $(this).parents(".modal");
        getModal.fadeOut();
        getModal.removeClass("opened");

        // $(dataTarget + " iframe").attr("src", "");
      });

      $(".modal").on("click", function (e) {
        e.preventDefault();
        $(this).fadeOut();
        $(this).removeClass("opened");

        $(dataTarget + " iframe").attr("src", "");
      });

      $(document).on("keydown", function (e) {
        if (e.keyCode == 27) {
          $(".modal").fadeOut();
          $(".modal").removeClass("opened");

          // $(dataTarget + " iframe").attr("src", "");
        }
      });
      // Stop Propagation Modal Offcanvas
      $(".modal .modal__container").on("click", function (e) {
        e.stopPropagation();
      });
    })();

    // Quantiy Form
    (function () {
      $(".quantiy-form .add").on("click", function () {
        var quantiyForm = $(this).parents(".quantiy-form");
        quantiyForm
          .find("input.qty")
          .attr("value", +quantiyForm.find("input.qty").val() + 1);
      });
      $(".quantiy-form .sub").on("click", function () {
        var quantiyForm = $(this).parents(".quantiy-form");
        if (quantiyForm.find("input.qty").val() > 1) {
          if (quantiyForm.find("input.qty").val() > 1)
            quantiyForm
              .find("input.qty")
              .attr("value", +quantiyForm.find("input.qty").val() - 1);
        }
      });
    })();

    (function () {
      $(".modal-login .tml-login .tml-pwd-wrap .tml-label").append(
        '<a href="#" data-form="lostpassword">Forget password?</a>'
      );
      $("[data-form]").on("click", function (e) {
        e.preventDefault();
        var thisELe = $(this).data("form");
        $(this).parents(".modal__container").find(".auth-form").hide();
        $(this)
          .parents(".modal__container")
          .find("." + thisELe + "-auth-form")
          .show();
      });
    })();
  });
})(jQuery);

window.addEventListener("DOMContentLoaded", function () {
  (function () {
    SwiperCore.use([Navigation, Pagination, Autoplay, Thumbs]);
    // home Slides
    const home = new Swiper(".home-slider .swiper-container", {
      slidesPerView: 1,
      speed: 1200,
      pagination: {
        el: ".home-slider .swiper-pagination",
        clickable: true,
        dynamicBullets: true,
      },
    });

    // gallery Slides
    const gallery = new Swiper(".gallery-carousel .swiper-container", {
      speed: 1200,
      loop: true,
      autoplay: {
        delay: 2000,
      },
      breakpoints: {
        0: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 3,
        },
        992: {
          slidesPerView: 5,
        },
        1200: {
          slidesPerView: 6,
        },
      },
    });
  })();
  // Init home tabs
  (function () {
    function shareLink(selector) {
      var btnOpenShare = document.querySelectorAll(selector);
      var shareData = {
        title: document.title,
        url: window.location.href,
      };
      if (btnOpenShare) {
        btnOpenShare.forEach((ele) => {
          ele.addEventListener("click", (e) => {
            e.preventDefault();
            if (navigator.canShare(shareData)) {
              navigator.share(shareData);
            }
          });
        });
      }
    }
    shareLink('[data-target="share"]');
  })();
});

"use strict";

var mobileMenu2 = {
  burger: '.burger',
  menu: '.header-strip__menu',
  init: function init() {
    var t = this;
    $(t.burger).on('click', function () {
      $(t.menu).slideToggle(250);
      $(t.menu).parent().toggleClass("is-active");
    });
  }
};
var activeClass = {
  btn: '.js-active a',
  init: function init() {
    var t = this;
    $(t.btn).on('click', function (e) {
      e.preventDefault();
      $(t.btn).removeClass('is-active');
      $(this).addClass('is-active');
    });
  }
};
var newsSearche = {
  el: '.js-active-input',
  init: function init() {
    var t = this;
    $(t.el).on('click', function () {
      $(t.el).removeClass('is-active');
      $(t.el).parent().toggleClass("is-active");
    });
  }
};
var header = {
  el: '.js-header',
  init: function init() {
    var t = this;
    $(window).on('scroll', function () {
      t.pageMove();
    });
    t.pageMove();
  },
  pageMove: function pageMove() {
    var dy = window.scrollY;

    if (dy > 100) {
      $(this.el).addClass('is-fixed');
    } else {
      $(this.el).removeClass('is-fixed');
    }
  }
}; // const Header = {
//     mobBtn: '.js-header-mob-btn',
//     header: '.js-header',
//     haederBanner: '.js-header-banner',
//     headerContent: '.js-header-content',
//     init: function () {
//         $(document).on('click', this.mobBtn, this.toggleContent)
//         if ($(this.haederBanner).length) {
//             this.changeHeaderStick()
//             $(window).on('scroll', this.changeHeaderStick)
//         } else {
//             $(Header.header).addClass('is-stick')
//         }
//     },
//     toggleContent: function () {
//         $(Header.headerContent).toggleClass('active')
//     },
//     changeHeaderStick: function () {
//         var header = $(Header.header)
//         if ($(window).scrollTop() > $(Header.haederBanner).outerHeight()) {
//             header.addClass('is-stick')
//         } else {
//             header.removeClass('is-stick')
//         }
//     }
// }

$(function () {
  mobileMenu2.init(); // drop menu burger

  activeClass.init(); // add is-active class

  header.init(); // top scroll header
  //Header.init(); // top scroll header

  newsSearche.init(); // add input searche
});
$(document).ready(function () {
  $('#content').mCustomScrollbar({
    axis: "x",
    theme: "dark-thin",
    autoExpandScrollbar: true,
    advanced: {
      autoExpandHorizontalScroll: true
    }
  });
}); //
// $(document).ready(function(){
//     var userAgent = navigator.userAgent.toLowerCase();
//     var InternetExplorer = false;
//     if((/mozilla/.test(userAgent) && !/firefox/.test(userAgent) && !/chrome/.test(userAgent) && !/safari/.test(userAgent) && !/opera/.test(userAgent)) || /msie/.test(userAgent))
//         InternetExplorer = true;
//     if (InternetExplorer === true){
//         document.location.href = "http://localhost:3000/html/upgrade.html";
//     }
// });
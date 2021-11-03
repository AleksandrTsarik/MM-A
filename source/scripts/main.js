
const mobileMenu2 = {
    burger: '.burger',
    menu: '.header-strip__menu',
    init: function() {
        var t = this;
        $(t.burger).on('click', function() {
            $(t.menu).slideToggle(250);
            $(t.menu).parent().toggleClass("is-active");
        });
    }
}

 const activeClass = {
    btn: '.js-active a',
     init: function() {
         var t = this;
         $(t.btn).on('click', function (e) {
            e.preventDefault()
            $(t.btn).removeClass('is-active');
            $(this).addClass('is-active');
         });

     }
 }

const newsSearche = {
    el: '.js-active-input',
    init: function() {
        var t = this;
        $(t.el).on('click', function() {
            $(t.el).removeClass('is-active');
            $(t.el).parent().toggleClass("is-active");
        })
    }
}

const header = {
    el: '.js-header',
    init: function(){
        var t = this;
        $(window).on('scroll', function(){
            t.pageMove();
        })
        t.pageMove();
    },
    pageMove: function(){
        let dy = window.scrollY;
        if(dy > 100){
            $(this.el).addClass('is-fixed');
        }else{
            $(this.el).removeClass('is-fixed');
        }
    },
}

$(function() {
    mobileMenu2.init(); // drop menu burger
    activeClass.init(); // add is-active class
    header.init(); // top scroll header
    newsSearche.init(); // add input searche
})


$(document).ready(function(){
    $('#content').mCustomScrollbar({
        axis:"x",
        theme:"dark-thin",
        autoExpandScrollbar:true,
        advanced:{autoExpandHorizontalScroll:true}
    });
});

//
// $(document).ready(function(){
//     var userAgent = navigator.userAgent.toLowerCase();
//     var InternetExplorer = false;
//     if((/mozilla/.test(userAgent) && !/firefox/.test(userAgent) && !/chrome/.test(userAgent) && !/safari/.test(userAgent) && !/opera/.test(userAgent)) || /msie/.test(userAgent))
//         InternetExplorer = true;
//     if (InternetExplorer === true){
//         document.location.href = "http://localhost:3000/html/upgrade.html";
//     }
// });

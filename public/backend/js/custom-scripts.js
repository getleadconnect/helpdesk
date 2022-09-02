// Initiate superfish on nav menu
$('.nav-menu').superfish({
    animation: {
        opacity: 'show'
    },
    speed: 400
});
// Mobile Navigation
if ($('#nav-menu-container').length) {
    var $mobile_nav = $('#nav-menu-container').clone().prop({
        id: 'mobile-nav'
    });
    $mobile_nav.find('> ul').attr({
        'class': '',
        'id': ''
    });
    $('body').append($mobile_nav);
    $('body').prepend('<button type="button" id="mobile-nav-toggle"><div class="lnr lnr-menu"> <span></span> <span></span> <span></span></div></button>');
    $('body').append('<div id="mobile-body-overly"></div>');
    $('#mobile-nav').find('.menu-has-children').prepend('<i class="lnr lnr-chevron-down"> </i>');
    $(document).on('click', '.menu-has-children i', function (e) {
        $(this).next().toggleClass('menu-item-active');
        $(this).nextAll('ul').eq(0).slideToggle();
        $(this).toggleClass("lnr-chevron-up lnr-chevron-down");
    });
    $(document).on('click', '#mobile-nav-toggle', function (e) {
        $('body').toggleClass('mobile-nav-active');
        $('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
        $('#mobile-body-overly').toggle();
    });
    $(document).click(function (e) {
        var container = $("#mobile-nav, #mobile-nav-toggle");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            if ($('body').hasClass('mobile-nav-active')) {
                $('body').removeClass('mobile-nav-active');
                $('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
                $('#mobile-body-overly').fadeOut();
            }
        }
    });
} else if ($("#mobile-nav, #mobile-nav-toggle").length) {
    $("#mobile-nav, #mobile-nav-toggle").hide();
}
// Smooth scroll for the menu and links with .scrollto classes
//$('.nav-menu a, #mobile-nav a, .scrollto').on('click', function () {
//    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
//        var target = $(this.hash);
//        if (target.length) {
//            var top_space = 0;
//            if ($('#header').length) {
//                top_space = $('#header').outerHeight();
//                if (!$('#header').hasClass('header-fixed')) {
//                    top_space = top_space;
//                }
//            }
//            $('html, body').animate({
//                scrollTop: target.offset().top - top_space
//            }, 1500, 'easeInOutExpo');
//            if ($(this).parents('.nav-menu').length) {
//                $('.nav-menu .menu-active').removeClass('menu-active');
//                $(this).closest('li').addClass('menu-active');
//            }
//            if ($('body').hasClass('mobile-nav-active')) {
//                $('body').removeClass('mobile-nav-active');
//                $('#mobile-nav-toggle i').toggleClass('lnr-times lnr-bars');
//                $('#mobile-body-overly').fadeOut();
//            }
//            return false;
//        }
//    }
//});
///* slide menu */
//var menuActive = false;
//var menu = $('.menu');
//var burger = $('.burger-container');
//initMenu();
//
//function setHeader() {
//    if ($(window).scrollTop() > 100) {
//        header.addClass('scrolled');
//    } else {
//        header.removeClass('scrolled');
//    }
//}
//
//function initMenu() {
//    if ($('.menu').length) {
//        var menu = $('.menu');
//        if ($('.burger-container').length) {
//            burger.on('click', function () {
//                if (menuActive) {
//                    closeMenu();
//                } else {
//                    openMenu();
//                    $(document).one('click', function cls(e) {
//                        if ($(e.target).hasClass('menu-mm')) {
//                            $(document).one('click', cls);
//                        } else {
//                            closeMenu();
//                        }
//                    });
//                }
//            });
//        }
//    }
//}
//
//function openMenu() {
//    menu.addClass('active');
//    menuActive = true;
//}
//
//function closeMenu() {
//    menu.removeClass('active');
//    menuActive = false;
//}
//var $window = $(window);
//$window.on('load', function () {
//    $('#preloader').fadeOut(1500, function () {
//        $(this).remove();
//    });
//});
//var path = window.location.pathname.split("/").pop();
//if (path == '') {
//    path = 'index.php';
//}
//var target = $('.nav-menu  li a[href="' + path + '"]');
//target.parent().addClass('menu-active');
//$('.menu-has-children li.menu-active').parent().closest('li').addClass('menu-active');
//





















$(document).ready(function () {
    /* seting margin top for wrapper */
    function setMargin() {
        var headerHeight = $(".page-header").height();
        $('.main-wrapper').css('margin-top', headerHeight);
    };
    setMargin();
    $(window).resize(function () {
        setMargin();
    });
    /* aside menu */
    $(".aside-menu a").click(function () {
        let link = $(this);
        let closest_ul = link.closest("ul");
        let parallel_active_links = closest_ul.find(".active")
        let closest_li = link.closest("li");
        let link_status = closest_li.hasClass("active");
        let count = 0;
        closest_ul.find("ul").slideUp(function () {
            if (++count == closest_ul.find("ul").length)
                parallel_active_links.removeClass("active");
        });
        if (!link_status) {
            closest_li.children("ul").slideDown();
            closest_li.addClass("active");
        }
    });
    /* topbar */
    $('li.dropdown > a').on('click', function (event) {
        event.preventDefault()
        $(this).parent().find('ul').first().toggle(300);
        $(this).parent().siblings().find('ul').hide(200);
        $(this).parent().find('ul').mouseleave(function () {
            var thisUI = $(this);
            $('body').click(function () {
                thisUI.hide();
                $('body').unbind('click');
            });
        });
    });
    /* side menu toggle */
      $('#sidebarMenu').on('click', function(e){
    e.preventDefault();
    if (window.matchMedia('(min-width: 1200px)').matches) {
      $('body').toggleClass('hide-sidebar');
    } else  {
      $('body').toggleClass('show-sidebar');
    }
    $('.dataTables_scrollHeadInner').width($(window).width() - 70);
  });
    /* notification panel */
      $('.topbar-mobile-toggle').on('click', function(e){
        e.preventDefault();
      $('.menu-panel').toggleClass('show-panel');
     
  });
});


/* document scope end */


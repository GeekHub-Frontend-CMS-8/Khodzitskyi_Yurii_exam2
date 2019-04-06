/*-------------Nav toggler---------------*/
$(document).ready(function () {
    $('.menu-toggle').click(function () {
        $('.menu').toggleClass('menu__show');
        $('.header').toggleClass('header__background');
    });
});
$(window).scroll(function() {
    if ($(this).scrollTop() > 50 ) {
        $('.scrolltop:hidden').stop(true, true).fadeIn();
    } else {
        $('.scrolltop').stop(true, true).fadeOut();
    }
});
/*-------------Scroll to top btn script---------------*/
$(function(){$(".scroll").click(function(){
    $("html,body").animate({
        scrollTop:$(".thetop").offset().top},"1000");
    return false
})});
/*-----------homepage hero slider-----------*/
$(document).ready(function(){
    $('.homepage__hero-section__slider').slick({
        dots: true,
        arrows: false,
        adaptiveHeight: true,
});
});
/*-----------------masonry---------------*/
$(document).ready(function () {
    $('.grid').imagesLoaded(function () {
        $('.grid').masonry({
            itemSelector: '.grid-item',
            gutter: 10,
        });
    });
});
/*
$(document).ready(function() {
    $('.grid').imagesLoaded(function () {
        $('.grid').isotope({
            /!*    layoutMode: 'fitColumns',*!/
            itemSelector: '.grid-item',
            masonry: {
                columnWidth: 264,
                gutter: 28,
                horizontalOrder: true
            },
        })
    });
});

$(document).ready(function () {
    /!*show all items in portfolio*!/
   $('.portfolio-all').click(function () {
       $('.grid').isotope({ filter: '*' });
       removeAllActiveClasses();
       $(this).toggleClass('active');
   });
    $('.portfolio-webdesign').click(function () {
        $('.grid').isotope({ filter: '.webdesign' });
        removeAllActiveClasses();
        $(this).toggleClass('active');
    });
    $('.portfolio-graphic_design').click(function () {
        $('.grid').isotope({ filter: '.graphic_design' });
        removeAllActiveClasses();
        $(this).toggleClass('active');
    });
    function removeAllActiveClasses() {
        $('.front-page__portfolio-section__buttons-container button').removeClass('active');
    }
});

/!*-----------------ABOUT PAGE TESTEMONIALS SLIDER----------------*!/
$(document).ready(function(){
    $('.about-page__testemonials-section__first-wrapper').slick({
        arrows: false,
        dots : true,
});
});

/!*---------------------SIDEBAR POSTS TOGGLER------------------*!/
$(document).ready(function () {
    /!*show all items in portfolio*!/
    $('.sidebar__posts__buttons__latest').click(function () {
        removeAllActiveClasses();
        $(this).toggleClass('checked');
        $('.sidebar__posts__latest').css("display","block");
        $('.sidebar__posts__comments').css("display","none");
    });
    $('.sidebar__posts__buttons__comments').click(function () {
        removeAllActiveClasses();
        $(this).toggleClass('checked');
        $('.sidebar__posts__comments').css("display","block");
        $('.sidebar__posts__latest').css("display","none");
    });

    function removeAllActiveClasses() {
        $('.sidebar__posts__buttons button').removeClass('checked');
    }

});*/

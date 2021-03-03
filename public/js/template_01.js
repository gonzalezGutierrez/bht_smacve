
var $window = $(window);

$(document).ready(function(){

    let seccion_smacve = $("#seccion_smacve").val();

    $(".btn-seccion").removeClass("current");
    $(seccion_smacve).addClass("current");


    /*-------------------01. Preloader ----------------------------------------*/

    $("#preloader").fadeOut('slow', function() {
        //$(this).remove();
    });

    /*-----------------02. Sticky Header --------------------------------------*/

    $window.on('scroll', function() {
        let scroll = $window.scrollTop();
        if (scroll <= 50) {
            $("header").removeClass("scrollHeader").addClass("fixedHeader");
            $(".navbar-brand span").text("Sociedad Mexicana de Angiología, Cirugía Vascular y Endovascular");
        }
        else {
            $("header").removeClass("fixedHeader").addClass("scrollHeader");
            $(".navbar-brand span").text("SMACVE");
        }
    });

    /*-----------------03. Scroll To Top --------------------------------------*/

    $window.on('scroll', function() {
        if ($(this).scrollTop() > 500) {
            $(".scroll-to-top").fadeIn(400);

        } else {
            $(".scroll-to-top").fadeOut(400);
        }
    });

    $(".scroll-to-top").on('click', function(event) {
        event.preventDefault();
        $("html, body").animate({
            scrollTop: 0
        }, 600);
    });

    /*------------------04. Parallax ------------------------------------------*/

    // sections background image from data background
    var pageSection = $(".parallax,.bg-img");
    pageSection.each(function(indx) {
        if ($(this).attr("data-background")) {
            $(this).css("background-image", "url(" + $(this).data("background") + ")");
        }
    });

    /*-----------------05. Video ----------------------------------------------*/

    $('.story-video').magnificPopup({
        delegate: '.video',
        type: 'iframe'
    });

    /*----------------06. Category Toggle --------------------------------------*/

    var resizeTimer;
    $window.on('resize', function (e) {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function () {
            if ($window.width() > 991) {
                $('.categories .shop-category').show();
            } else {
                $('.categories .shop-category').hide();
            }
        }, 250);
    });

    //Category toggle on mobile devices
    $('.collapse-sm').on('click', function () {
        $('.categories .shop-category').slideToggle();
        if ( $(this).hasClass('current') ) {
            $(this).removeClass('current');
        } else {
            $(this).removeClass('current');
            $(this).addClass('current');
        }
    });

    /*---------------- 07. Resize function --------------------------------------*/

    $window.on('resize', function (event) {
        setTimeout(function() {
            SetResizeContent();
        }, 500);
        event.preventDefault();
    });

    /*--------------- 08. FullScreenHeight function -----------------------------*/

    function fullScreenHeight() {
        var element = $(".full-screen");
        var $minheight = $window.height();
        element.css('min-height', $minheight);
    }

    /*--------------- 09. ScreenFixedHeight function ----------------------------*/

    function ScreenFixedHeight() {
        var $headerHeight = $("header").height();
        var element = $(".screen-height");
        var $screenheight = $window.height() - $headerHeight;
        element.css('height', $screenheight);
    }

    /*-------------- 10. FullScreenHeight and screenHeight with resize function -*/

    function SetResizeContent() {
        fullScreenHeight();
        ScreenFixedHeight();
    }

    SetResizeContent();


    /*------------- 11. Sliders --------------------------------------*/

    $("#posts-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 400000,
        responsiveClass: true,
        autoplayHoverPause: false,
        responsive: {
            0: {
                items: 1,
                margin: 20
            },
            768: {
                items: 2,
                margin: 20,
            },
            992: {
                items: 2,
                margin: 20,
            },
            1200: {
                items: 3,
                margin: 15,
            }
        }
    });

    $("#podcast-widget").owlCarousel({
        items: 1,
        loop:false,
        lazyLoad:true,
        dots: false,
        nav: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        margin: 3,
        autoplay:false,
        smartSpeed:2000
    });

    $("#revista-carousel").owlCarousel({
        loop: true,
        dots: false,
        nav: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        autoplay: true,
        lazyLoad:true,
        autoplayTimeout: 3000,
        responsiveClass: true,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
                margin: 20
            },
            768: {
                items: 2,
                margin: 20,
            },
            992: {
                items: 3,
                margin: 20,
            },
            1200: {
                items: 4,
                margin: 15,
            }
        }
    });

    $("#twitter-widget").owlCarousel({
        items: 1,
        loop:true,
        dots: false,
        margin: 0,
        autoplay:true,
        smartSpeed:2000

    });



    // Testmonials carousel1
    $('#regional-carousel').owlCarousel({
        loop: false,
        responsiveClass: true,
        nav: true,
        dots: false,
        margin: 0,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    // Testmonials carousel1
    $('#testmonials-carousel').owlCarousel({
        loop: false,
        responsiveClass: true,
        nav: true,
        dots: false,
        margin: 0,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    // Testmonials carousel2
    $('#testmonials-style2').owlCarousel({
        loop: true,
        responsiveClass: true,
        nav: true,
        dots: false,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        responsive: {
            0: {
                items: 1,
                margin: 10,
            },
            768: {
                items: 2,
                margin: 15,
            },
            992: {
                items: 2,
                margin: 40,
            }
        }
    });

    // Testmonials carousel3
    $('.testimonial-style3').owlCarousel({
        loop: false,
        responsiveClass: true,
        nav: false,
        dots: true,
        margin: 0,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    // Team owlCarousel
    $('.team .owl-carousel').owlCarousel({
        loop:true,
        margin: 30,
        dots: false,
        nav: false,
        autoplay:true,
        smartSpeed:500,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                margin: 0
            },
            700:{
                items:2,
                margin: 15
            },
            1000:{
                items:4
            }
        }
    });

    // Services carousel
    $('#services-carousel').owlCarousel({
        loop: true,
        responsiveClass: true,
        dots: false,
        nav: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        responsive: {
            0: {
                items: 1,
                margin: 0,
            },
            768: {
                items: 2,
                margin: 0,
            },
            992: {
                items: 3,
                margin: 0,
            }
        }
    });

    // Blog grid carousel
    $('#blog-grid').owlCarousel({
        loop: true,
        dots: false,
        nav: false,
        autoplay: true,
        autoplayTimeout: 2500,
        responsiveClass: true,
        autoplayHoverPause: false,
        responsive: {
            0: {
                items: 1,
                margin: 0,
            },
            768: {
                items: 2,
                margin: 0,
            },
            992: {
                items: 3,
                margin: 0,
            }
        }
    });

    // Carousel Style2
    $('.carousel-style2 .owl-carousel').owlCarousel({
        loop: true,
        dots: false,
        nav: true,
        navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
        autoplay: true,
        autoplayTimeout: 5000,
        responsiveClass: true,
        autoplayHoverPause: false,
        responsive: {
            0: {
                items: 1,
                margin: 0,
            },
            768: {
                items: 2,
                margin: 20,
            },
            992: {
                items: 2,
                margin: 30,
            },
            1200: {
                items: 3,
                margin: 30,
            }
        }
    });

    // Carousel Style3
    $('.carousel-style3 .owl-carousel').owlCarousel({
        loop: true,
        dots: false,
        nav: false,
        autoplay: true,
        autoplayTimeout: 2500,
        responsiveClass: true,
        autoplayHoverPause: false,
        responsive: {
            0: {
                items: 1,
                margin: 0,
            },
            768: {
                items: 2,
                margin: 20,
            },
            992: {
                items: 2,
                margin: 30,
            },
            1200: {
                items: 3,
                margin: 30,
            }
        }
    });

    // Carousel Style4
    $('.carousel-style4 .owl-carousel').owlCarousel({
        loop: true,
        dots: false,
        nav: true,
        navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
        autoplay: true,
        autoplayTimeout: 5000,
        responsiveClass: true,
        autoplayHoverPause: false,
        responsive: {
            0: {
                items: 1,
                margin: 0,
            },
            481: {
                items: 2,
                margin: 5,
            },
            500: {
                items: 2,
                margin: 20,
            },
            992: {
                items: 3,
                margin: 30,
            },
            1200: {
                items: 4,
                margin: 30,
            }
        }
    });

    // Service grids
    $('#service-grids').owlCarousel({
        loop: true,
        dots: false,
        nav: false,
        autoplay: true,
        autoplayTimeout: 2500,
        responsiveClass: true,
        autoplayHoverPause: false,
        responsive: {
            0: {
                items: 1,
                margin: 0,
            },
            768: {
                items: 2,
                margin: 20,
            },
            992: {
                items: 3,
                margin: 30,
            }
        }
    });

    // Home Slider
    $(".home-business-slider").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        smartSpeed: 800,
        nav: true,
        dots: false,
        navText: ['<span class="fas fa-chevron-left"></span>', '<span class="fas fa-chevron-right"></span>'],
        responsive: {
            0: {
                nav: false
            },
            768: {
                nav: true
            }
        }
    });

    // Clients carousel
    $('#clients').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        responsiveClass: true,
        autoplayHoverPause: false,
        responsive: {
            0: {
                items: 2,
                margin: 15
            },
            768: {
                items: 3,
                margin: 30,
            },
            992: {
                items: 4,
                margin: 40,
            },
            1200: {
                items: 5,
                margin: 30,
            }
        }
    });

    // Project single carousel
    $('#project-single').owlCarousel({
        loop: false,
        nav: false,
        responsiveClass: true,
        dots: false,
        responsive: {
            0: {
                items: 1,
                margin: 15,
            },
            600: {
                items: 2,
                margin: 15,
            },
            1000: {
                items: 3,
                margin: 15
            }
        }
    });

    // Sliderfade
    $('.slider-fade .owl-carousel').owlCarousel({
        items: 1,
        loop:true,
        margin: 0,
        autoplay:true,
        smartSpeed:500,
        mouseDrag:false,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut'
    });

    // Default owlCarousel

    $('.owl-carousel').owlCarousel({
        items: 1,
        loop:true,
        dots: false,
        margin: 0,
        autoplay:true,
        smartSpeed:500
    });



    // Slider text animation
    var owl = $('.slider-fade');
    owl.on('changed.owl.carousel', function(event) {
        var item = event.item.index - 2;     // Position of the current item
        $('h3').removeClass('animated fadeInUp');
        $('h1').removeClass('animated fadeInUp');
        $('p').removeClass('animated fadeInUp');
        $('.butn').removeClass('animated fadeInUp');
        $('.owl-item').not('.cloned').eq(item).find('h3').addClass('animated fadeInUp');
        $('.owl-item').not('.cloned').eq(item).find('h1').addClass('animated fadeInUp');
        $('.owl-item').not('.cloned').eq(item).find('p').addClass('animated fadeInUp');
        $('.owl-item').not('.cloned').eq(item).find('.butn').addClass('animated fadeInUp');
    });

    /*---------- 12. Tabs ----------------------------------------------*/

    //Horizontal Tab
    if ($(".horizontaltab").length !== 0) {
        $('.horizontaltab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    }

    // Child Tab
    if ($(".childverticaltab").length !== 0) {
        $('.childverticaltab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true,
            tabidentify: 'ver_1', // The tab groups identifier
            activetab_bg: '#fff', // background color for active tabs in this group
            inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
            active_border_color: '#c1c1c1', // border color for active tabs heads in this group
            active_content_border_color: '#c1c1c1' // border color for active tabs contect in this group so that it matches the tab head border
        });
    }

    //Vertical Tab
    if ($(".verticaltab").length !== 0) {
        $('.verticaltab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo2');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    }

    /*----------- 13. CountUp --------------------------------------*/

    if($(".countup").length !== 0){
        $(".countup").counterUp({
            delay: 25,
            time: 2000
        });
    }


    /*----------- 14. Countdown --------------------------------------*/

    if ($(".countdown").length !== 0) {
       $(".countdown").show().countdown({
           date: "01 Jan 2021 00:01:00", //set your date and time. EX: 15 May 2014 12:00:00
           format: "on"
       });
    }

    /*------------ 15. Datepicker --------------------------------------*/

    if ($(".datepicker").length !== 0) {
        $(".datepicker").datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        })
    }
});


$window.on("load", function() {

    /*-------------- 16. Isotop --------------------------------------*/

    // magnificPopup with slider
    $('.single-img').magnificPopup({
        delegate: '.popimg',
        type: 'image'
    });

    // isotope with magnificPopup
    $(".gallery").magnificPopup({
        delegate: '.popimg',
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    var $gallery = $(".gallery").isotope({
        // options
    });

    // filter items on button click
    $(".filtering").on('click', 'span', function() {
        var filterValue = $(this).attr('data-filter');
        $gallery.isotope({
            filter: filterValue
        });
    });

    $(".filtering").on('click', 'span', function() {
        $(this).addClass('active').siblings().removeClass('active');
    });

    // stellar
    $window.stellar();

});

function show_loading(){
    $("#preloader").fadeIn('slow');

}

function hide_loading(){
    $("#preloader").fadeOut('slow');
}

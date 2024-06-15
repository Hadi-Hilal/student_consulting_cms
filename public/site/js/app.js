(function ($) {
    "use strict";
    /*  Preloader */
    $(window).on('load', function () {
        var preLoder = $(".preloader");
        preLoder.fadeOut(1500);
    });
    /*  Active Class*/
    $('.burger-box').on('click', function () {
        $("#sidebar-navbar,.burger-box").toggleClass('active');
    });
    /*  Fixed Header*/
    $(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
            $(".header-area").addClass("fixed");
        } else {
            $(".header-area").removeClass("fixed");
        }
    });
    /*  Mean Menu */
    $('.header-main-menu').meanmenu({
        meanScreenWidth: "991",
        meanMenuContainer: '.header-navbar',
        meanMenuOpen: "<span></span><span></span><span></span>",
        meanMenuClose: "<span></span><span></span><span></span>",
        siteLogo: " ",
    });
    /* Podcast Slider */
    $('.podcast-slider').slick({
        autoplay: true,
        autoplayspeed: 2000,
        slidesToShow: 3,
        dots: false,
        arrows: true,
        prevArrow: $('.podcast-prev'),
        nextArrow: $('.podcast-next'),
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 765,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    /* Testimonial Slider */
    $('.testimonial-slider').slick({
        autoplay: true,
        autoplayspeed: 2000,
        slidesToShow: 2,
        dots: false,
        arrows: true,
        prevArrow: "<button type='button' class='slick-prev'><img src='assets/images/prev-arrow.svg' alt='title'></button>",
        nextArrow: "<button type='button' class='slick-next'><img src='assets/images/next-arrow.svg' alt='title'></button>",
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    /*  current date show  */
    $('#spanYear').html(new Date().getFullYear());

    /*  Scrolltop  */
    function scrolltop() {
        var wind = $(window);
        wind.on("scroll", function () {
            var scrollTop = wind.scrollTop();
            if (scrollTop >= 500) {
                $(".footer-back").addClass("show");
            } else {
                $(".footer-back").removeClass("show");
            }

        });
        $(".footer-back").on("click", function () {
            var bodyTop = $("html, body");
            bodyTop.animate({scrollTop: 0}, 500, "easeOutCubic");
        });
    }

    scrolltop();
    /* Fitvids Js */
    fitvids('.container');
    /* Aos Js */
    AOS.init({
        offset: 200,
        delay: 50,
        duration: 1000,
        easing: 'ease-in-out',
        debounceDelay: 20,
        throttleDelay: 50,
        once: true,
        mirror: false,
        anchorPlacement: 'top-bottom',
    });

// mediaelement audio
    if ($(document.querySelector("audio")).length > 0) {
        const options = {
            defaultSpeed: "1.00",
            speeds: ["1.25", "1.50", "2.00", "0.75"],
            loop: true,
            skipBackInterval: 15,
            jumpForwardInterval: 15,
            features: [
                "playpause",
                "progress",
                "current",
                "duration",
                "skipback",
                "changespeed",
                "volume",
                "jumpforward"
            ]
        };

        new MediaElementPlayer(document.querySelector("audio"), options);

// Separate the audio controls so I can style them better.
        (() => {
            const elementTop = document.createElement("div");
            const elementBottom = document.createElement("div");
            elementTop.classList.add("mejs-prepended-buttons");
            elementBottom.classList.add("mejs-appended-buttons");

            const controls = document.querySelector(".mejs__controls");
            controls.prepend(elementTop);
            controls.append(elementBottom);

            const controlsChildren = Array.from(controls.childNodes).filter((v) =>
                v.className.startsWith("mejs_")
            );

            controlsChildren.slice(0, 3).forEach((elem) => {
                elementTop.append(elem);
            });

            controlsChildren.slice(3, controlsChildren.length).forEach((elem) => {
                elementBottom.append(elem);
            });
        })();
    }

    /*  Append Poscast  */
    $('.podcast-container').infiniteScroll({
        // options
        path: function () {
            // no value returned after 4th loaded page
            if (this.loadCount < 4) {
                let nextIndex = this.loadCount + 2;
                return `podcast/podcast-${nextIndex}.html`;
            }
        },
        append: '.post',
        button: '.load-more-scoll',
        checkLastPage: false,
        scrollThreshold: false,
        status: '.page-load-status',
        history: false,
    });
    /*  Append Category  */
    $('.category-container').infiniteScroll({
        // options
        path: function () {
            // no value returned after 4th loaded page
            if (this.loadCount < 4) {
                let nextIndex = this.loadCount + 2;
                return `category/category-${nextIndex}.html`;
            }
        },
        append: '.post',
        button: '.load-more-scoll',
        checkLastPage: false,
        scrollThreshold: false,
        status: '.page-load-status',
        history: false,
    });


}(jQuery));

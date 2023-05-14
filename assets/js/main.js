(function ($) {
    "use strict";
    $(document).ready(function () {
        /****************************************
              -------*** JS Table ***-------
                     ----------------
              
              01. PRELOADER JS
              02. BOTTOMtoTOP JS
              03. COURSE SLIDER JS
              04. STICKY HEADER JS
              05. COUNTER-UP JS
              06. AOS ANIMATION JS
              07. MODAL VIDEO JS
              08. PARALLAX JS
              09. VANILLA TILT JS
              10. MOBILE MENU JS
              11. CLIENT SLIDER JS
              12. TESTIMONIAL JS
              
              
        *****************************************/


        /************************************************
             -------*** 01. PRELOADER JS ***-------
                        ----------------
        *************************************************/
        setTimeout(function () {
            $('.preloader').fadeOut();
        }, 30);



        /************************************************
             -------*** 02. BOTTOMtoTOP JS ***-------
                         ----------------
        *************************************************/
        $(window).scroll(function () {
            if ($(this).scrollTop() > 600) {
                $('.btm-to-top').show();
            } else {
                $('.btm-to-top').hide();
            }
        });



        /************************************************
             -------*** 03. COURSE SLIDER JS ***-------
                         ----------------
        *************************************************/
        $('.educa-course-slider').owlCarousel({
            loop: true,
            margin: 25,
            autoplay: true,
            smartSpeed: 3000,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 2
                },
                480: {
                    items: 2
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 6
                },
                1200: {
                    items: 6
                }
            }
        });



        /************************************************
             -------*** 04. STICKY HEADER JS ***-------
                         -----------------
        *************************************************/
        $(window).scroll(function () {
            var sticky = $('.headerclass'),
                scroll = $(window).scrollTop();
            if (scroll < 200) sticky.removeClass('sticky');
            else sticky.addClass('sticky').animate({
                scrollTop: 0
            }, 1000);
        });


        /************************************************
             -------*** 05. COUNTER-UP JS ***-------
                         --------------
        *************************************************/
        $('.counter').counterUp({
            delay: 10,
            time: 3000
        });


        /************************************************
             -------*** 06. AOS ANIMATION JS ***-------
                         -----------------
        *************************************************/
        AOS.init();



        /************************************************
             -------*** 07. MODAL VIDEO JS ***-------
                         -----------------
        *************************************************/
        $(".js-modal-btn").modalVideo();



        /************************************************
             -------*** 08. PARALLAX JS ***-------
                         -------------
        *************************************************/
        $('.classname').parallax({
            imageSrc: 'assets/images/newslater-bg.png'
        });



        /************************************************
             -------*** 09. VANILLA TILT JS ***-------
                         ----------------
        *************************************************/
        VanillaTilt.init(document.querySelectorAll(".mouse-move"), {
            max: 25,
            speed: 400
        });


        /************************************************
             -------*** 10. MOBILE MENU JS ***-------
                         ----------------
        *************************************************/
        $('#mobile-menu').slicknav({
            prependTo: '#mobile-menu-here'
        });






        /************************************************
             -------*** 11. About SLIDER JS ***-------
                        -------------------
        *************************************************/
        $('.educa-about-slider').owlCarousel({
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            loop: true,
            margin: 0,
            autoplay: true,
            autoplayTimeout: 4500,
            autoplayHoverPause: true,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });


        /************************************************
             -------*** 12. CLIENT JS ***-------
                        -------------------
        *************************************************/
        $('.educa-client-slider').owlCarousel({
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            loop: true,
            margin: 15,
            autoplay: true,
            autoplayTimeout: 4500,
            nav: false,
            dots: false,
            center: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 3
                },
                1200: {
                    items: 3
                }
            }
        });


        /************************************************
             -------*** 13. NEWSCROLLER JS ***-------
                        -------------------
        *************************************************/
        $('.newsticker').liScroll({
            travelocity: 0.07
        });

        /************************************************
             -------*** 14. SEARCH MP'S AREA JS ***-------
                        -------------------
        *************************************************/
        $('.bp-mp-area').selectize({});

        /************************************************
             -------*** 15. GALLERY JS ***-------
                        -------------------
        *************************************************/
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
        /************************************************
             -------*** 16. POPUP JS JS ***-------
                        -------------------
        *************************************************/
        $('#calendar-btn').on('click', function () {
            $('.bp-event-calender').toggle('fast');
        });
        $('.close-btn').on('click', function () {
            $('.bp-event-calender').hide('fast');
        });


         /************************************************
             -------*** 17. Active change with hover JS ***-------
                        -------------------
        *************************************************/
        $('.change-active').hover(function(){
            $('.change-active').removeClass('active');
            $(this).addClass('active');
        });



        var myDate = new Date();
            myDate.setDate(myDate.getDate() + 2);
            $("#countdown").countdown(myDate, function (event) {
                $(this).html(
                    event.strftime(
                        '<div class="timer-wrapper"><div class="time">%D</div><span class="text">days</span></div><div class="timer-wrapper"><div class="time">%H</div><span class="text">hrs</span></div><div class="timer-wrapper"><div class="time">%M</div><span class="text">mins</span></div><div class="timer-wrapper"><div class="time">%S</div><span class="text">sec</span></div>'
                    )
                );
            });

    });
}(jQuery));

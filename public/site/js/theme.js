/*
Theme Name: Meipaly
Theme URI: http://layerdrops.com/
Author: Layerdrops
Author URI: http://layerdrops.com/
Description: Meipaly - Fine One Page Parallax HTML5 Responsive Template
Version: 1.0
License:
License URI:
*/
   
/*=======================================================================
 [Table of contents]
=========================================================================
1. Revolution Slider
2. Video PopUp
3. Fun Fact Count
4. Client Slider
5. Team Slider
6. Slider Testimonial
7. Google Map
8. Portflolio Mixing
9. Slider Related Portfolio
10. Search PopUp 
11. Menu PopUp
12. Fixed Header
13. Preloder
14. Bact To Top Button
15. Mobile Menu
16. Active Menu Scroll
17. Contact From Submit
18. Color Preset
*/
(function ($) {
    'use strict';
    
    /*--------------------------------------------------------
    / 1. Revolution Slider
    ----------------------------------------------------------*/
    var revapi = jQuery('#rev_slider_1').show().revolution({
        delay: 7000,
        responsiveLevels: [1400,1200, 1140, 778, 480],
        gridwidth: [1140, 1140, 920, 700, 380],
        sliderLayout: 'fullscreen',
        navigation: {
            arrows: {
                enable: true,
                style: "me_arrows",
                hide_onleave: false,
                left: {
                    container: 'slider',
                    h_align: 'left',
                    v_align: 'center',
                    h_offset: 60,
                    v_offset: 0
                },
                right: {
                    container: 'slider',
                    h_align: 'right',
                    v_align: 'center',
                    h_offset: 60,
                    v_offset: 0
                }
            },
            bullets: {
                enable: false
            }
        }
    });
    
    var revapi = jQuery('#rev_slider_2').show().revolution({
        delay: 7000,
        responsiveLevels: [1200, 1140, 778, 480],
        gridwidth: [1140, 920, 700, 380],
        sliderLayout: 'fullscreen',
        navigation: {
            arrows: {
                enable: true,
                style: "me_arrows",
                hide_onleave: false,
                left: {
                    container: 'slider',
                    h_align: 'left',
                    v_align: 'center',
                    h_offset: 60,
                    v_offset: 0
                },
                right: {
                    container: 'slider',
                    h_align: 'right',
                    v_align: 'center',
                    h_offset: 60,
                    v_offset: 0
                }
            },
            bullets: {
                enable: false
            }
        }
    });
    
    var revapi = jQuery('#rev_slider_3').show().revolution({
        delay: 7000,
        responsiveLevels: [1200, 1140, 778, 480],
        gridwidth: [1140, 920, 700, 380],
        sliderLayout: 'fullscreen',
        navigation: {
            arrows: {
                enable: true,
                style: "me_arrows",
                hide_onleave: false,
                left: {
                    container: 'slider',
                    h_align: 'left',
                    v_align: 'center',
                    h_offset: 60,
                    v_offset: 0
                },
                right: {
                    container: 'slider',
                    h_align: 'right',
                    v_align: 'center',
                    h_offset: 60,
                    v_offset: 0
                }
            },
            bullets: {
                enable: false
            }
        }
    });
    
    
    /*--------------------------------------------------------
    / 2. Video PopUp
    /----------------------------------------------------------*/
    $('.video_popup').magnificPopup({
        type: 'iframe'
    });
    
    /*--------------------------------------------------------
    / 3. Fun Fact Count
    /----------------------------------------------------------*/
    var skl = true;
    $('.singlefunfact').appear();
    $('.singlefunfact').on('appear', function () {
        if (skl)
        {
            $('.timer').each(function () {
                var $this = $(this);
                jQuery({Counter: 0}).animate({Counter: $this.attr('data-counter')}, {
                    duration: 3000,
                    easing: 'swing',
                    step: function () {
                        var num = Math.ceil(this.Counter).toString();
                        if (Number(num) > 999) {
                            while (/(\d+)(\d{3})/.test(num)) {
                                num = num.replace(/(\d+)(\d{3})/, '<span class="countSpan">' + '$1' + '</span>' + '$2');
                            }
                        }
                        $this.html(num);
                    }
                });
            });
            skl = false;
        }
    });
    
    /*------------------------------------------------------------------------------
    / 4. Client Slider
    /------------------------------------------------------------------------------*/
    if ($('.client_slider').length > 0) {
        $('.client_slider').owlCarousel({
            items: 4,
            margin: 30,
            autoplay: true,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                560: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                }
            }
        });
    }

    /*------------------------------------------------------------------------------
    / 5. Team Slider
    /------------------------------------------------------------------------------*/
    if ($('.team_slider').length > 0) {
     $('.team_slider').slick({
       autoplay: true,
       autoplaySpeed: 2000,
       slidesToShow: 3,
       dots: true,
       arrows: false,
       centerMode: true,
       centerPadding: '350px',
       responsive: [
            {
              breakpoint: 1600,
              settings: {
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 4
              }
            },
            {
              breakpoint: 1199,
              settings: {
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 3
              }
            },
            {
              breakpoint: 991,
              settings: {
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 2
              }
            },
            {
              breakpoint: 600,
              settings: {
                centerMode: true,
                centerPadding: '30px',
                slidesToShow: 1
              }
            }
          ]
       });
    }
    
    /*------------------------------------------------------------------------------
    / 6. Slider Testimonial
    /------------------------------------------------------------------------------*/
    if ($('.slider_testimoial').length > 0) {
        $('.slider_testimoial').owlCarousel({
            items: 3,
            autoplay: false,
            nav: false,
            dots: true,
            dotsContainer: '.dots_owl'
        });
    }
     if($('.slider_testimoial').length > 0){
        $('.slider_testimoial li.control_item').on('click', function(){
           var $this = $(this);
           var id = $('a', $this).attr('href');
           $('a[href="' + id + '"]', $this).tab('show');
           $('.slider_testimoial li.control_item').removeClass('active');
           $this.addClass('active');
        });
    }   
    /*--------------------------------------------------------
    / 7. Google Map
    /----------------------------------------------------------*/
    if ($('#gmap').length > 0) {
        var contact_map
        contact_map = new GMaps({
            el: '#gmap',
            lat: 40.728157,
            lng: -74.077644,
            scrollwheel: false,
            zoom: 10,
            zoomControl: false,
            panControl: false,
            streetViewControl: false,
            mapTypeControl: false,
            overviewMapControl: false,
            clickable: false
        });
        contact_map.addMarker({
            lat: 40.728157,
            lng: -74.077644,
            icon: "images/marker.png",
            animation: google.maps.Animation.DROP
        });
        
        var styles = [
            {
                "featureType" : "road",
                "stylers" : [
                    {"color" : "#ffffff"}
                ]
            }, {
                "featureType" : "water",
                "stylers" : [
                    {"color" : "#ededed"}
                ]
            }, {
                "featureType" : "landscape",
                "stylers" : [
                    {"color" : "#f7f7f7"}
                ]
            }, {
                "elementType" : "labels.text.fill",
                "stylers" : [
                    {"color" : "transparent"}
                ]
            }, {
                "featureType" : "poi",
                "stylers" : [
                    {"color" : "#e5e5e5"}
                ]
            }, {
                "elementType" : "labels.text",
                "stylers" : [
                    {"saturation" : 1},
                    {"weight" : 0.1},
                    {"color" : "#818181"}
                ]
            }
        ];
        contact_map.addStyle({
            styledMapName : "Styled Map",
            styles : styles,
            mapTypeId : "map_style"
        });
        contact_map.setStyle("map_style");
    }
    
    if ($('#gmap_2').length > 0) {
        var contact_map
        contact_map = new GMaps({
            el: '#gmap_2',
            lat: 40.728157,
            lng: -74.077644,
            scrollwheel: false,
            zoom: 10,
            zoomControl: false,
            panControl: false,
            streetViewControl: false,
            mapTypeControl: false,
            overviewMapControl: false,
            clickable: false
        });
        contact_map.addMarker({
            lat: 40.728157,
            lng: -74.077644,
            icon: "images/marker.png",
            animation: google.maps.Animation.DROP
        });
        var styles = [
            {
                "featureType" : "road",
                "stylers" : [
                    {"color" : "#ffffff"}
                ]
            }, {
                "featureType" : "water",
                "stylers" : [
                    {"color" : "#ededed"}
                ]
            }, {
                "featureType" : "landscape",
                "stylers" : [
                    {"color" : "#f7f7f7"}
                ]
            }, {
                "elementType" : "labels.text.fill",
                "stylers" : [
                    {"color" : "transparent"}
                ]
            }, {
                "featureType" : "poi",
                "stylers" : [
                    {"color" : "#e5e5e5"}
                ]
            }, {
                "elementType" : "labels.text",
                "stylers" : [
                    {"saturation" : 1},
                    {"weight" : 0.1},
                    {"color" : "#818181"}
                ]
            }
        ];
        contact_map.addStyle({
            styledMapName : "Styled Map",
            styles : styles,
            mapTypeId : "map_style"
        });
        contact_map.setStyle("map_style");
    }
    
    /*--------------------------------------------------------
    / 8. Portflolio Mixing
    /---------------------------------------------------------*/
    $('#Grid').themeWar();
    $('.Grid').themeWar();

    /*-------------------------------------------------------
    / 9. Slider Related Portfolio
    --------------------------------------------------------*/
    if ($('.related_slider').length > 0) {
        $('.related_slider').owlCarousel({
            items: 3,
            autoplay: true,
            margin: 30,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                991: {
                    items: 3
                }
            }
        });
    }
    
    /*--------------------------------------------------------
    / 10. Search PopUp 
    /----------------------------------------------------------*/
   if ($(".searchToggler").length > 0)
   {
      var todg = true;
      $(".searchToggler").on("click", function (e) {
         e.preventDefault();
         if (todg)
         {
            $(".searchFixed").fadeIn("slow");
            todg = false;
         }
         else
         {
            $(".searchFixed").fadeOut("slow");
            todg = true;
         }
      });

      $(document).mouseup(function (e) {
         var container = $(".searchForms");

         if (!container.is(e.target) && container.has(e.target).length === 0)
         {
            $(".searchFixed").fadeOut("slow");
            todg = true;
         }
      });
      $("#sfCloser").on("click", function (e) {
         e.preventDefault();
         $(".searchFixed").fadeOut("slow");
         todg = true;
      });
   }
   $(function () {
      $('.singleShopWrap').themeWar();
   });
    
    /*---------------------------------------------------
    / 11. Menu PopUp 
    /-----------------------------------------------------*/
    $(document).ready(function () {
        $("#close-popup").on('click', function (e) {
            e.preventDefault();
            $("body").removeClass("menu__open show-overlay-nav");
        });
        $(".hamburger").on("click", function () {
            $(this).toggleClass("is_active"), $("body").toggleClass("menu__open");
        }), $(document).keyup(function (e) {
            27 === e.keyCode && $(".menu__open .hamburger").click();
        }), $("#open-overlay-nav").on("click", function () {
            $("body").toggleClass("show-overlay-nav");
        }), $(".dl-menu__wrap").dlmenu({
            animationClasses: {
                classin: "dl-animate-in-3",
                classout: "dl-animate-out-3"
            }
        });
    });

    /*--------------------------------------------------------
    / 12. Fixed Header
    /--------------------------------------------------------*/
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 40)
        {
            $("#header").addClass('fixedHeader animated flipInX');
        } else
        {
            $("#header").removeClass('fixedHeader animated flipInX');
        }
        scroll_topmenu();
    });
    
    /*--------------------------------------------------------
    / 13. Preloder
    /----------------------------------------------------------*/
    $(window).load(function(){
        var preload = $('.preloader');
        if(preload.length > 0){
            preload.delay(800).fadeOut('slow');
        }
    });
    
    /*--------------------------------------------------------
    / 14. Bact To Top Button
    /----------------------------------------------------------*/
    var back = $("#backToTop"),
            body = $("body, html");
    $(window).on('scroll', function () {
        var h = $(window).height() / 2;
        if ($(window).scrollTop() > h)
        {
            back.addClass('showit');
        } else
        {
            back.removeClass('showit');
        }

    });
    body.on("click", "#backToTop", function (e) {
        e.preventDefault();
        body.animate({scrollTop: 0}, 800);
    });
    
    /*--------------------------------------------------------
    / 15. Mobile Menu
    /----------------------------------------------------------*/
    if ($('.mobilemenu').length > 0) {
        $('.mobilemenu').on('click', function () {
            var w = $(window).width();
            $(this).toggleClass('active');
            $('.mainmenu > ul').slideToggle('slow');
    });
    if ($(window).width() < 768)
        {
            $('.mainmenu > ul li.menu-item-has-children > a').on('click', function (e) {
                e.preventDefault();
                $(this).parent().toggleClass('active');
                $(this).parent().children('.sub-menu').slideToggle('slow');
            });
        }
    }
    
    /*--------------------------------------------------------
    / 16. Active Menu Scroll
    /----------------------------------------------------------*/
    $('.mainmenu ul li.scroll > a').on('click', function () {
        $('html, body').animate({scrollTop: $(this.hash).offset().top - 68}, 1000, 'easeOutCubic');
        return false;
    });
    
    $('.dl-menu__wrap ul li.scroll > a').on('click', function () {

        if (!$(this).parent().hasClass('menu-item-has-children'))
        {
            $('html, body').animate({scrollTop: $(this.hash).offset().top - 68}, 1000, 'easeOutCubic', function () {
                $("body").removeClass("menu__open show-overlay-nav");
            });
            return false;
        } else {
            $('html, body').animate({scrollTop: $(this.hash).offset().top - 68}, 1000, 'easeOutCubic');
        }
    });
    
    function scroll_topmenu() {

    var contentTop = [];
    var contentBottom = [];
    var winTop = $(window).scrollTop();
    var rangeTop = 200;
    var rangeBottom = 500;

    $('.mainmenu').find('.scroll > a').each(function () {
        var atr = $(this).attr('href');
        if ($(atr).length > 0)
        {
            contentTop.push($($(this).attr('href')).offset().top);
            contentBottom.push($($(this).attr('href')).offset().top + $($(this).attr('href')).height());
        }
    });

    $.each(contentTop, function (i) {
        if (winTop > contentTop[i] - rangeTop) {
            $('.mainmenu li.scroll').removeClass('active').eq(i).addClass('active');
        }
    });
    }
    
    /*--------------------------------------------------------
    / 17. Contact From Submit
    /----------------------------------------------------------*/
    if ($("#contactForm").length > 0)
    {
        $("#contactForm").on('submit', function(e) {
            e.preventDefault();
            $("#con_submit").html('<span>Processsing...</span>');
            var f_name = $("#f_name").val();
            var l_name = $("#l_name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var message = $("#con_message").val();

            var required = 0;
            $(".required", this).each(function() {
                if ($(this).val() == '')
                {
                    $(this).addClass('reqError');
                    required += 1;
                }
                else
                {
                    if ($(this).hasClass('reqError'))
                    {
                        $(this).removeClass('reqError');
                        if (required > 0)
                        {
                            required -= 1;
                        }
                    }
                }
            });
            if (required === 0)
            {
                $.ajax({
                    type: "POST",
                    url: 'ajax/mail.php',
                    data: {f_name: f_name, l_name: l_name, email: email, phone: phone, message: message},
                    success: function(data)
                    {
                        //alert(data);
                        $("#con_submit").html('<span>Done!</span>');
                        $("#contactForm input, #contactForm textarea").val('');
                        setTimeout(function() {
                            $("#con_submit").html('<span>Send Message</span>');
                        }, 2500);
                    }
                });
            }
            else
            {
                $("#con_submit").html('<span>Failed!</span>');
            }

        });

        $(".required").on('keyup', function() {
            $(this).removeClass('reqError');
        });
    }
    
    /*--------------------------------------------------------
    / 18. Color Preset
    /----------------------------------------------------------*/
    if($(".color_settings").length > 0)
    {
        var switchs = true;
        $(".switch-btn").on('click', function(e){
            e.preventDefault();
            if(switchs)
            {
                $(this).addClass('active');
                $(".color_settings").animate({'left' : '0px'}, 400);
                switchs = false;
            }else
            {
                $(this).removeClass('active');
                $(".color_settings").animate({'left' : '-240px'}, 400);
                switchs = true;
            }
        });
        $(".color_preset button").on('click', function(e){
            e.preventDefault();
            var color = $(this).attr('id');
            $(".color_preset button").removeClass('active');
            $(this).addClass('active');
            $("#colorChange").attr('href', 'css/presets/' + color + '.css');
        });
    };
       
    
})(jQuery);
/*--------------------------------------------------------------
# Bootsnav Start
--------------------------------------------------------------*/
(function ($) {
	"use strict";
    
    var bootsnav = {

        initialize: function() {
            this.hoverDropdown();
        },

        /*--------------------------------------------------------------
        # Change dropdown to hover on dekstop
        --------------------------------------------------------------*/
        hoverDropdown : function() {

            var getNav = $("nav.navbar.bootsnav"),
                getWindow = $(window).width(),
                getHeight = $(window).height(),
                getIn = getNav.find("ul.nav").data("in"),
                getOut = getNav.find("ul.nav").data("out");
            
            if ( getWindow < 991 ) {
                
                // Height of scroll navigation sidebar
                $(".scroller").css("height", "auto");
                
                // Disable mouseenter event
                $("nav.navbar.bootsnav ul.nav").find("li.dropdown").off("mouseenter");
                $("nav.navbar.bootsnav ul.nav").find("li.dropdown").off("mouseleave");
                $("nav.navbar.bootsnav ul.nav").find(".title").off("mouseenter"); 
                $("nav.navbar.bootsnav ul.nav").off("mouseleave");    
                $(".navbar-collapse").removeClass("animated");
                
                // Enable click event
                $("nav.navbar.bootsnav ul.nav").each(function() {

                    $(".dropdown-menu", this).addClass("animated");
                    $(".dropdown-menu", this).removeClass(getOut);
                    
                    // Dropdown Fade Toggle
                    $("a.dropdown-toggle", this).off('click');
                    $("a.dropdown-toggle", this).on('click', function (e) {

                        e.stopPropagation();
                        $(this).closest("li.dropdown").find(".dropdown-menu").first().stop().fadeToggle().toggleClass(getIn);
                        $(this).closest("li.dropdown").first().toggleClass("on");

                        return false;

                    });   
                    
                    // Hidden dropdown action
                    $('li.dropdown', this).each(function () {

                        $(this).find(".dropdown-menu").stop().fadeOut();

                        $(this).on('hidden.bs.dropdown', function () {
                            $(this).find(".dropdown-menu").stop().fadeOut();
                        });

                        return false;

                    });

                }); 
                
                // Hidden dropdown
                var cleanOpen = function() {

                    $('li.dropdown', this).removeClass("on");
                    $(".dropdown-menu", this).stop().fadeOut();
                    $(".dropdown-menu", this).removeClass(getIn);

                }
                
                // Hidden om mouse leave
                $("nav.navbar.bootsnav").on("mouseleave", function() {

                    cleanOpen();

                });
                
                // Enable click atribute navigation
                $("nav.navbar.bootsnav .attr-nav").each(function() { 

                    $(".dropdown-menu", this).removeClass("animated");
                    $("li.dropdown", this).off("mouseenter");
                    $("li.dropdown", this).off("mouseleave");                    
                    $("a.dropdown-toggle", this).off('click');

                    $("a.dropdown-toggle", this).on('click', function (e) {

                        e.stopPropagation();
                        $(this).closest("li.dropdown").find(".dropdown-menu").first().stop().fadeToggle();

                        $(".navbar-toggle").each(function() {

                            $(".fa", this).removeClass("fa-times");
                            $(".fa", this).addClass("fa-bars");
                            $(".navbar-collapse").removeClass("in");
                            $(".navbar-collapse").removeClass("on");

                        });
                    });
                    
                    $(this).on("mouseleave", function() {

                        $(".dropdown-menu", this).stop().fadeOut();
                        $("li.dropdown", this).removeClass("on");
                        return false;

                    });

                });
                
                // Toggle Bars
                $(".navbar-toggle").each(function() {

                    $(this).off("click");

                    $(this).on("click", function() {

                        $(".fa", this).toggleClass("fa-bars");
                        $(".fa", this).toggleClass("fa-times");
                        cleanOpen();

                    });

                });

            } else if ( getWindow > 991 ) {

                // Height of scroll navigation sidebar
                $(".scroller").css("height", getHeight + "px");
                
                // Navbar Sidebar
                if( getNav.hasClass("navbar-sidebar")) {

                    // Hover effect Sidebar Menu
                    $("nav.navbar.bootsnav ul.nav").each(function() { 

                        $("a.dropdown-toggle", this).off('click');

                        $("a.dropdown-toggle", this).on('click', function(e) {
                            e.stopPropagation();
                        }); 

                        $(".dropdown-menu", this).addClass("animated");

                        $("li.dropdown", this).on("mouseenter", function() {

                            $(".dropdown-menu", this).eq(0).removeClass(getOut);
                            $(".dropdown-menu", this).eq(0).stop().fadeIn().addClass(getIn);
                            $(this).addClass("on");
                            return false;

                        });
                        
                        $(this).on("mouseleave", function() {

                            $(".dropdown-menu", this).stop().removeClass(getIn);
                            $(".dropdown-menu", this).stop().addClass(getOut).fadeOut();
                            $("li.dropdown", this).removeClass("on");
                            return false;

                        });
                    });

                } else {

                    // Hover effect Default Menu
                    $("nav.navbar.bootsnav ul.nav").each(function() {

                        $("a.dropdown-toggle", this).off('click');

                        $("a.dropdown-toggle", this).on('click', function(e) {
                            e.stopPropagation();
                        });

                        $(".dropdown-menu", this).addClass("animated");

                        $("li.dropdown", this).on("mouseenter", function() {

                            $(".dropdown-menu", this).eq(0).removeClass(getOut);
                            $(".dropdown-menu", this).eq(0).stop().fadeIn().addClass(getIn);
                            $(this).addClass("on");
                            return false;

                        });

                        $("li.dropdown", this).on("mouseleave", function() {

                            $(".dropdown-menu", this).eq(0).removeClass(getIn);
                            $(".dropdown-menu", this).eq(0).stop().fadeOut().addClass(getOut);
                            $(this).removeClass("on");

                        });

                        $(this).on("mouseleave", function() {

                            $(".dropdown-menu", this).removeClass(getIn);
                            $(".dropdown-menu", this).eq(0).stop().fadeOut().addClass(getOut);
                            $("li.dropdown", this).removeClass("on");
                            return false;

                        });
                    });

                }

            }

        }

    };
    
    // Initialize
    $(document).ready(function() {
        bootsnav.initialize();

        var navDropdown = $('nav.navbar.bootsnav li.dropdown ul.dropdown-menu li.dropdown');
        navDropdown.not(":has(ul)").each(function() {
            $('> a.dropdown-toggle', this).addClass('icon-none');
        });
    });
    
    // Reset on resize
    $(window).on("resize", function() {  

        bootsnav.hoverDropdown();
        
        // Toggle Bars
        $(".navbar-toggle").each(function() {

            $(".fa", this).removeClass("fa-times");
            $(".fa", this).addClass("fa-bars");
            $(this).removeClass("fixed");

        });

        $(".navbar-collapse").removeClass("in");
        $(".navbar-collapse").removeClass("on");
        $(".navbar-collapse").removeClass("bounceIn");

    });
    
}(jQuery));
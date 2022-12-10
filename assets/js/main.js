/*--------------------------------------------------------------
# Main Js Start
--------------------------------------------------------------*/
(function($) {

  /*--------------------------------------------------------------
  # Window Load Functions
  --------------------------------------------------------------*/
  $(window).load(function(){

    /*------------------------------------------------------------
    # Parallax
    ------------------------------------------------------------*/
    $.stellar({
      horizontalScrolling: false,
      scrollProperty: 'scroll',
      positionProperty: 'position',
    });

  }); // $(window).load(function(){

  /*--------------------------------------------------------------
  # Sticky Navigation
  --------------------------------------------------------------*/
  if (obj.admin_bar == true) {

    if ($(document).width() >= '783') {

      $(".navbar-fixed-top").css({'margin-top':'32px'});
      $(".sticky-header").sticky({topSpacing:32});

    } else if ($(document).width() <= '782') {

      $(".navbar-fixed-top").css({'margin-top':'46px'});
      $(".sticky-header").sticky({topSpacing:46});

    }

  } else {

    $(".sticky-header").sticky({topSpacing:0});

  }

  /*--------------------------------------------------------------
  # In Page Smooth Scroll
  --------------------------------------------------------------*/
  $('#site-navigation ul li a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name='+ this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });

  /*--------------------------------------------------------------
  # Back To Top
  --------------------------------------------------------------*/
  $(window).scroll(function() {
    if ($(this).scrollTop() > 300) {
      $('.back-to-top').css({'display':'inline-block'});
    } else {
      $('.back-to-top').css({'display':'none'});
    }
  });

  // Animate the scroll to top
  $('.back-to-top').click(function(event) {
    event.preventDefault();
    $('html, body').animate({scrollTop: 0}, 300);
  });

  /*--------------------------------------------------------------
  # Prevent click on empty links
  --------------------------------------------------------------*/
  $('a[href="#"], a[href="#."], a[href=""]').on('click', function(e){
    e.preventDefault();
  });

})( jQuery );
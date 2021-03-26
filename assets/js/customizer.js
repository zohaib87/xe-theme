/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

  /**
   * General_Options
   */
  wp.customize( 'padding_top', function( value ) {
    value.bind( function( to ) {
      $(".padding-top-bottom").css("padding-top", to+"px");
    } );
  } );
  wp.customize( 'padding_bottom', function( value ) {
    value.bind( function( to ) {
      $(".padding-top-bottom").css("padding-bottom", to+"px");
    } );
  } );

  /**
   * Site_Layout
   */
  wp.customize( 'boxed_layout_bg', function( value ) {
    value.bind( function( to ) {
      $(".bg").css("background-color", to['background-color']);
      $(".bg").css("background-image", "url("+to['background-image']+")");
      $(".bg").css("background-repeat", to['background-repeat']);
      $(".bg").css("background-size", to['background-size']);
      $(".bg").css("background-attachment", to['background-attachment']);
      $(".bg").css("background-position", to['background-position']);
    } );
  } );

  /**
   * Color_Scheme
   */
  wp.customize( 'txt_selection_color', function( value ) {
    value.bind( function( to ) {
      $(":root").get(0).style.setProperty("--selection-color", to);
    } );
  } );
  wp.customize( 'txt_selection_bg_color', function( value ) {
    value.bind( function( to ) {
      $(":root").get(0).style.setProperty("--selection-bg-color", to);
    } );
  } );
  wp.customize( 'bg_color', function( value ) {
    value.bind( function( to ) {
      $(":root").get(0).style.setProperty("--bg-color", to);
    } );
  } );

  /**
   * Top_Bar
   */
  wp.customize( 'top_bar_text_color', function( value ) {
    value.bind( function( to ) {
      $(":root").get(0).style.setProperty("--top-bar-text-color", to);
    } );
  } );
  wp.customize( 'top_bar_bg_color', function( value ) {
    value.bind( function( to ) {
      $(":root").get(0).style.setProperty("--top-bar-bg-color", to);
    } );
  } );
  wp.customize( 'top_bar_phone', function( value ) {
    value.bind( function( to ) {
      $(selectors.phone).html(to);
    } );
  } );
  wp.customize( 'top_bar_email', function( value ) {
    value.bind( function( to ) {
      $(selectors.email).html(to);
    } );
  } );

  /**
   * Header
   */
  wp.customize( 'header_text_one', function( value ) {
    value.bind( function( to ) {
      $("header .text-one").html(to);
    } );
  } );
  wp.customize( 'header_text_two', function( value ) {
    value.bind( function( to ) {
      $("header .text-two").html(to);
    } );
  } );
  
  /**
   * Title_Bar
   */
  wp.customize( 'title_color', function( value ) {
    value.bind( function( to ) {
      $(":root").get(0).style.setProperty("--title-color", to);
    } );
  } );
  wp.customize( 'subtitle_color', function( value ) {
    value.bind( function( to ) {
      $(":root").get(0).style.setProperty("--subtitle-color", to);
    } );
  } );
  wp.customize( 'title_bar_overlay', function( value ) {
    value.bind( function( to ) {
      $(":root").get(0).style.setProperty("--title-bar-overlay", to);
    } );
  } );
  wp.customize( 'title_bar_height', function( value ) {
    value.bind( function( to ) {
      if ($.isNumeric(to)) {
        $(":root").get(0).style.setProperty("--title-bar-height", to+"px");
      } else {
        $(":root").get(0).style.setProperty("--title-bar-height", "auto");
      }
    } );
  } );
  wp.customize( 'title_bar_pt', function( value ) {
    value.bind( function( to ) {
      if ($.isNumeric(to)) {
        $(":root").get(0).style.setProperty("--title-bar-pt", to+"px");
      } else {
        $(":root").get(0).style.setProperty("--title-bar-pt", "auto");
      }
    } );
  } );
  wp.customize( 'title_bar_pb', function( value ) {
    value.bind( function( to ) {
      if ($.isNumeric(to)) {
        $(":root").get(0).style.setProperty("--title-bar-pb", to+"px");
      } else {
        $(":root").get(0).style.setProperty("--title-bar-pb", "auto");
      }
    } );
  } );

  /**
   * Titles
   */
  wp.customize( 'blog_title', function( value ) {
    value.bind( function( to ) {
      $(selectors.blog_title).html(to);
    } );
  } );
  wp.customize( 'search_title', function( value ) {
    value.bind( function( to ) {
      $(selectors.search_title).html(to);
    } );
  } );
  wp.customize( 'error_title', function( value ) {
    value.bind( function( to ) {
      $(selectors.error_title).html(to);
    } );
  } );
  wp.customize( 'shop_title', function( value ) {
    value.bind( function( to ) {
      $(selectors.shop_title).html(to);
    } );
  } );
  
  /**
   * Subtitles
   */
  wp.customize( 'blog_subtitle', function( value ) {
    value.bind( function( to ) {
      $(selectors.blog_subtitle).html(to);
    } );
  } );
  wp.customize( 'search_subtitle', function( value ) {
    value.bind( function( to ) {
      $(selectors.search_subtitle).html(to);
    } );
  } );
  wp.customize( 'error_subtitle', function( value ) {
    value.bind( function( to ) {
      $(selectors.error_subtitle).html(to);
    } );
  } );
  wp.customize( 'shop_subtitle', function( value ) {
    value.bind( function( to ) {
      $(selectors.shop_subtitle).html(to);
    } );
  } );

  /**
   * Footer
   */
  wp.customize( 'footer_bg_color', function( value ) {
    value.bind( function( to ) {
      $(":root").get(0).style.setProperty("--footer-bg-color", to);
    } );
  } );
  wp.customize( 'footer_text_color', function( value ) {
    value.bind( function( to ) {
      $(":root").get(0).style.setProperty("--footer-text-color", to);
    } );
  } );
	
} )( jQuery );

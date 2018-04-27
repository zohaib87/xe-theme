<?php
/**
 * _xe functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _xe
 */

if ( !function_exists('_xe_setup') ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _xe_setup() {

		/**
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _xe, use a find and replace
		 * to change '_xe' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_xe', get_template_directory() . '/languages' );

		/**
		 * Register editor stylesheet for the theme.
		 */
		add_editor_style( array('css/editor-style.css') );

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size('_xe-blog', 1280, 686);
		add_image_size('_xe-post', 1280, 686);
		add_image_size('_xe-recent-posts', 60, 60, true);
		add_image_size('_xe-portfolio-list');
		add_image_size('_xe-portfolio');
		add_image_size('_xe-events-list');
		add_image_size('_xe-events');

		/**
		 * Registering Navigation Menus
		 *
		 * @link https://codex.wordpress.org/Function_Reference/register_nav_menus
		 */
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary Location', '_xe' ),
			'second-menu' => esc_html__( 'Second Location', '_xe' ),
			'third-menu' => esc_html__( 'Third Location', '_xe' ),
			'fourth-menu' => esc_html__( 'Fourth Location', '_xe' ),
			'fifth-menu' => esc_html__( 'Fifth Location', '_xe' ),
			'sixth-menu' => esc_html__( 'Sixth Location', '_xe' ),
		) );

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/**
		 * Enable support for Post Formats.
		 * 
		 * @link https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
		) );

		/**
		 * Enable support for WooCommerce.
		 */
		add_theme_support('woocommerce');

	}

}
add_action( 'after_setup_theme', '_xe_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _xe_content_width() {

	$GLOBALS['content_width'] = apply_filters( '_xe_content_width', 1170 );

}
add_action( 'after_setup_theme', '_xe_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _xe_widgets_init() {

	function _xe_register_sidebar($name, $id) {

		register_sidebar( array(
			'name'          => $name,
			'id'            => $id,
			'description'   => esc_html__( 'Add widgets here.', '_xe' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

	}

	/**
	 * Register Sidebars
	 */
	_xe_register_sidebar( esc_html__( 'Sidebar 1', '_xe' ), 'sidebar-1' );
	_xe_register_sidebar( esc_html__( 'Sidebar 2', '_xe' ), 'sidebar-2' );
	
	/**
	 * Custom Sidebars
	 */
	global $xe_options;

	if ( isset($xe_options['custom_sidebars']) && !empty($xe_options['custom_sidebars']) ) :

		$custom_sidebars =  $xe_options['custom_sidebars'];

		foreach ($custom_sidebars as $key => $value) {
			_xe_register_sidebar( esc_html($value), 'custom-sidebar-' . esc_attr($key) );
		}

	endif;

}
add_action( 'widgets_init', '_xe_widgets_init' );

/**
 * Enqueue scripts and styles for admin panel.
 */
function _xe_admin_scripts() {

	wp_enqueue_style( '_xe-admin', get_template_directory_uri() . '/css/admin.css' );
	wp_enqueue_script( '_xe-admin', get_template_directory_uri() . '/js/admin.js', array(), '20151215', true );

}
add_action( 'admin_enqueue_scripts', '_xe_admin_scripts', 9999 );

/**
 * Enqueue scripts and styles for front end.
 */
function _xe_scripts() {

	global $xe_options, $post;

	$smooth_scroll = ( isset($xe_options['smooth_scroll']) ) ? $xe_options['smooth_scroll'] : false;
	$google_api_key = ( isset($xe_options['google_api_key']) && !empty($xe_options['google_api_key']) ) ? 'key='.$xe_options['google_api_key'] : 'v=3.exp';
	$google_fonts = ( isset($xe_options['google_fonts']) && !empty($xe_options['google_fonts']) ) ? $xe_options['google_fonts'] : 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700';

	/**
	 * Google Fonts
	 */
	wp_enqueue_style( 'google-fonts', esc_url($google_fonts) );
	
	/**
	 * Styles
	 */
	wp_enqueue_style( '_xe-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . "/css/bootstrap.min.css" );
	wp_enqueue_style( 'bootsnav', get_template_directory_uri() . "/css/bootsnav.css" );
	wp_enqueue_style( 'slick', get_template_directory_uri() . "/css/slick.css" );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . "/css/font-awesome.min.css" );
	wp_enqueue_style( 'ionicons', get_template_directory_uri() . "/css/ionicons.min.css" );
	wp_enqueue_style( '_xe-helpers', get_template_directory_uri() . "/css/helpers.min.css" );
	wp_enqueue_style( '_xe-woocommerce', get_template_directory_uri() . "/css/woocommerce.css" );
	wp_enqueue_style( '_xe-main', get_template_directory_uri() . "/css/main.css" );

	/**
	 * Scripts
	 */
	if ( is_404() ) {
		// Do Nothing...
	} elseif ( (is_home() || is_archive() || is_search() || has_shortcode($post->post_content, 'recent_posts') || has_shortcode($post->post_content, 'recent_products') || has_shortcode($post->post_content, 'featured_products') || has_shortcode($post->post_content, 'product_category') | has_shortcode($post->post_content, 'product_categories') || has_shortcode($post->post_content, 'sale_products') || has_shortcode($post->post_content, 'best_selling_products') || has_shortcode($post->post_content, 'top_rated_products') || has_shortcode($post->post_content, 'product_attribute')) && have_posts() ) {
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'masonry-init', get_template_directory_uri() . "/js/masonry-init.js", array('masonry'), '20151215', true );
	}

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . "/js/bootstrap.min.js", array('jquery'), '20151215', true );
	wp_enqueue_script( 'bootsnav', get_template_directory_uri() . "/js/bootsnav.js", array('jquery', 'bootstrap'), '20151215', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . "/js/slick.min.js", array('jquery'), '20151215', true );
	wp_enqueue_script( 'sticky', get_template_directory_uri() . "/js/sticky.min.js", array('jquery'), '20151215', true );
	wp_enqueue_script( 'stellar', get_template_directory_uri() . "/js/stellar.min.js", array('jquery'), '20151215', true );
	wp_enqueue_script( '_xe-main', get_template_directory_uri() . "/js/main.js", array('jquery'), '20151215', true );
	wp_enqueue_script( 'google-map-api', "https://maps.googleapis.com/maps/api/js?" . esc_attr($google_api_key), array(), '20151215', true );
	wp_enqueue_script( 'google-map-init', get_template_directory_uri() . "/js/map.js", array('google-map-api'), '20151215', true );
	wp_enqueue_script( '_xe-custom', get_template_directory_uri() . "/js/custom.js", array(), '20151215', true );

	if ( $smooth_scroll == true ) {
		wp_enqueue_script( 'smooth-scroll', get_template_directory_uri() . "/js/smooth-scroll.js", array('jquery'), '20151215', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', '_xe_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load framework files.
 */
require get_template_directory() . '/inc/framework.php';
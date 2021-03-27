<?php
/**
 * Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _xe
 */

if (!function_exists('_xe_setup')) {

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
		load_theme_textdomain('_xe', get_template_directory() . '/languages');

		/**
		 * Register editor stylesheet for the theme.
		 */
		add_editor_style(array('css/editor-style.css'));

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support('automatic-feed-links');

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');
		add_image_size('_xe-blog', 1280, 686);
		add_image_size('_xe-post', 1280, 686);
		add_image_size('_xe-recent-posts', 60, 60, true);

		/**
		 * Registering Navigation Menus
		 *
		 * @link https://codex.wordpress.org/Function_Reference/register_nav_menus
		 */
		register_nav_menus( array(
			'primary-menu' => esc_html__('Primary Location', '_xe'),
			'second-menu' => esc_html__('Second Location', '_xe'),
			'third-menu' => esc_html__('Third Location', '_xe'),
			'fourth-menu' => esc_html__('Fourth Location', '_xe'),
			'fifth-menu' => esc_html__('Fifth Location', '_xe'),
			'sixth-menu' => esc_html__('Sixth Location', '_xe'),
			'seventh-menu' => esc_html__('Seventh Location', '_xe'),
			'eighth-menu' => esc_html__('Eighth Location', '_xe'),
			'ninth-menu' => esc_html__('Ninth Location', '_xe'),
			'tenth-menu' => esc_html__('Tenth Location', '_xe'),
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
add_action('after_setup_theme', '_xe_setup');

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
  _xe_register_sidebar( esc_html__( 'Sub-Footer Column 1', '_xe' ), 'footer-1' );
  _xe_register_sidebar( esc_html__( 'Sub-Footer Column 2', '_xe' ), 'footer-2' );
  _xe_register_sidebar( esc_html__( 'Sub-Footer Column 3', '_xe' ), 'footer-3' );
  _xe_register_sidebar( esc_html__( 'Sub-Footer Column 4', '_xe' ), 'footer-4' );

	/**
	 * Custom Sidebars
	 */
  $widget_areas = get_theme_mod( 'add_custom_widgets', '' );

	if ( isset($widget_areas) && !empty($widget_areas) ) :;

		foreach ($widget_areas as $widget_area) {

      $key = $widget_area['widget_id'];
      $value = $widget_area['widget_name'];

			_xe_register_sidebar( esc_html($value), esc_attr($key) );

		}

	endif;

}
add_action( 'widgets_init', '_xe_widgets_init' );

/**
 * Enqueue scripts and styles for admin panel.
 */
function _xe_admin_scripts() {

	wp_enqueue_style( '_xe-admin', get_template_directory_uri() . '/assets/css/admin.css' );

	wp_enqueue_script( '_xe-admin', get_template_directory_uri() . '/assets/js/admin.js', array(), '20151215', true );

}
add_action( 'admin_enqueue_scripts', '_xe_admin_scripts', 9999 );

/**
 * Enqueue scripts and styles for front end.
 */
function _xe_scripts() {

  global $xe_opt;
  $min_css = ($xe_opt->min_css == 'on') ? '.min' : '';
  $min_js = ($xe_opt->min_js == 'on') ? '.min' : '';

  /**
   * Google Fonts
   */
  // wp_enqueue_style( '_xe-fonts', '' );

	/**
	 * Styles
	 */
	wp_enqueue_style('_xe-style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.min.css');
	wp_enqueue_style('_xe-main', get_template_directory_uri() . '/assets/css/main'.esc_attr($min_css).'.css', array(), '2021');

	/**
	 * Scripts
	 */
	wp_enqueue_script('bootstrap', get_template_directory_uri() . "/assets/js/bootstrap.bundle.min.js", array('jquery'), '2021', true);
  wp_enqueue_script('stellar', get_template_directory_uri() . "/assets/js/stellar.min.js", array('jquery'), '2021', true);
  wp_enqueue_script('sticky', get_template_directory_uri() . "/assets/js/sticky.min.js", array('jquery'), '2021', true);
	wp_enqueue_script('_xe-main', get_template_directory_uri() . '/assets/js/main'.esc_attr($min_js).'.js', array('jquery'), '2015', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

}
add_action('wp_enqueue_scripts', '_xe_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/controllers/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/controllers/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/models/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/helpers/jetpack.php';

/**
 * Custom nav walker class.
 */
require get_template_directory() . '/helpers/class-wp-bootstrap-navwalker.php';

/**
 * Required plugins activation.
 */
require get_template_directory() . '/helpers/plugins-activator.php';

/**
 * Class that holds helper methods.
 */
require get_template_directory() . '/helpers/class-helpers.php';

/**
 * Class to set CSS Selectors.
 */
require get_template_directory() . '/helpers/class-selectors.php';

/**
 * Class to set default options.
 */
require get_template_directory() . '/helpers/class-defaults.php';

/**
 * Class to get and use Redux and ACF Pro options.
 */
require get_template_directory() . '/controllers/class-theme-options.php';

/**
 * Functions that require Kirki Customizer Framework.
 */
function _xe_theme_options() {

  if ( class_exists('Kirki') ) {
    require get_template_directory() . '/models/theme-options.php';
  }

}
add_action('init', '_xe_theme_options');

/**
 * Functions that require Meta Box.
 */
if ( class_exists('RWMB_Loader') ) {
	require get_template_directory() . '/models/page-options.php';
}

/**
 * Enqueue dynamic styles in theme <head> tags.
 */
require get_template_directory() . '/controllers/class-dynamic-styles.php';

/**
 * Enqueue dynamic scripts in theme footer.
 */
require get_template_directory() . '/controllers/class-dynamic-scripts.php';

/**
 * Require widgets classes.
 */
require get_template_directory() . '/models/widgets/recent-posts.php';
require get_template_directory() . '/models/widgets/categories.php';
require get_template_directory() . '/models/widgets/archives.php';
require get_template_directory() . '/models/widgets/price-filter.php';

/**
 * Register widgets
 */
function _xe_register_custom_widgets() {

  register_widget('Xe_RecentPostsWidget');
  register_widget('Xe_CategoriesWidget');
  register_widget('Xe_ArchivesWidget');
  register_widget('Xe_PriceFilterWidget');

}
add_action('widgets_init', '_xe_register_custom_widgets');

/**
 * One click demo import.
 */
if (class_exists('OCDI_Plugin')) {
	require get_template_directory() . '/helpers/class-demo-content.php';
}

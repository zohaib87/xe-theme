<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @package _xe
 */

namespace Xe_Theme\Includes;

class Setup {

  function __construct() {

    add_action( 'after_setup_theme', [ $this, 'setup' ] );
    add_action( 'after_setup_theme', [ $this, 'content_width' ], 0 );

  }

  public function setup() {

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
    add_image_size( '_xe-blog', 1280, 686 );
    add_image_size( '_xe-post', 1280, 686 );
    add_image_size( '_xe-recent-posts', 60, 60, true );

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
      'seventh-menu' => esc_html__( 'Seventh Location', '_xe' ),
      'eighth-menu' => esc_html__( 'Eighth Location', '_xe' ),
      'ninth-menu' => esc_html__( 'Ninth Location', '_xe' ),
      'tenth-menu' => esc_html__( 'Tenth Location', '_xe' ),
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
    add_theme_support( 'woocommerce' );

  }

  /**
   * Set the content width in pixels, based on the theme's design and stylesheet.
   *
   * Priority 0 to make it available to lower priority callbacks.
   *
   * @global int $content_width
   */
  public function content_width() {

    $GLOBALS['content_width'] = apply_filters( 'content_width', 1170 );

  }

}
new Setup();

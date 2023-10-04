<?php
/**
 * Enqueue scripts and styles for admin panel and front end.
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
 *
 * @package _xe
 */

namespace Xe_Theme\Includes;

class Scripts {

  function __construct() {

    add_action( 'wp_enqueue_scripts', [ $this, 'frontend' ] );
    add_action( 'admin_enqueue_scripts', [ $this, 'backend' ], 9999 );

  }

  /**
   * # Enqueue scripts and styles for front-end.
   */
  public function frontend() {

    global $xe_opt;

    // Version Control for CSS and JS
    $style_css = filemtime(get_template_directory() . '/style.css');
    $main_css = filemtime(get_template_directory() . '/assets/css/main.css');
    $bootstrap_css = filemtime(get_template_directory() . '/assets/css/bootstrap.min.css');
    $fontawesome_css = filemtime(get_template_directory() . '/assets/css/all.min.css');

    $bootstrap_js = filemtime(get_template_directory() . '/assets/js/bootstrap.bundle.min.js');
    $stellar_js = filemtime(get_template_directory() . '/assets/js/stellar.min.js');
    $sticky_js = filemtime(get_template_directory() . '/assets/js/sticky.min.js');
    $main_js = filemtime(get_template_directory() . '/assets/js/main.js');

    /**
     * Google Fonts
     */
    // wp_enqueue_style('google-fonts', '');

    /**
     * # Styles
     */
    wp_enqueue_style('_xe-style', get_template_directory_uri() . '/style.css', array(), esc_attr($style_css));
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), esc_attr($bootstrap_css));
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), esc_attr($fontawesome_css));
    wp_enqueue_style('_xe-main', get_template_directory_uri() . '/assets/css/main.css', array(), esc_attr($main_css));

    /**
     * # Scripts
     */
    wp_enqueue_script('bootstrap', get_template_directory_uri() . "/assets/js/bootstrap.bundle.min.js", array('jquery'), esc_attr($bootstrap_js), true);
    wp_enqueue_script('stellar', get_template_directory_uri() . "/assets/js/stellar.min.js", array('jquery'), esc_attr($stellar_js), true);
    wp_enqueue_script('sticky', get_template_directory_uri() . "/assets/js/sticky.min.js", array('jquery'), esc_attr($sticky_js), true);

    wp_enqueue_script('_xe-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), esc_attr($main_js), true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
      wp_enqueue_script('comment-reply');
    }

  }

  /**
   * # Enqueue scripts and styles for admin panel.
   *
   * @link https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/
   */
  public function backend() {

    // Version Control for admin CSS and JS
    $admin_css = filemtime(get_template_directory() . '/assets/css/admin.css');
    $admin_js = filemtime(get_template_directory() . '/assets/js/admin.js');

    /**
     * # Styles
     */
    wp_enqueue_style('_xe-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), esc_attr($admin_css));

    /**
     * # Scripts
     */
    wp_enqueue_script('_xe-admin', get_template_directory_uri() . '/assets/js/admin.js', array(), esc_attr($admin_js), true);

  }

}
new Scripts();

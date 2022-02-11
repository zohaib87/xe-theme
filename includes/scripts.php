<?php 
/**
 * Enqueue scripts and styles for admin panel and front end.
 *
 * @package _xe
 */

function _xe_scripts() {

  global $xe_opt;
  $min_css = ($xe_opt->min_css == 'on') ? '.min' : '';
  $min_js = ($xe_opt->min_js == 'on') ? '.min' : '';

  /**
   * Google Fonts
   */
  // wp_enqueue_style( 'google-fonts', '' );

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
 * Enqueue scripts and styles for admin panel.
 */
function _xe_admin_scripts() {

  wp_enqueue_style( '_xe-admin', get_template_directory_uri() . '/assets/css/admin.css' );

  wp_enqueue_script( '_xe-admin', get_template_directory_uri() . '/assets/js/admin.js', array(), '20151215', true );

}
add_action( 'admin_enqueue_scripts', '_xe_admin_scripts', 9999 );

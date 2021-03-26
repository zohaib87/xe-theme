<?php
/**
 * _xe Theme Customizer.
 *
 * @package _xe
 */

use Helpers\Xe_Selectors as Se;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function _xe_customize_register( $wp_customize ) {

  $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
  $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

}
add_action( 'customize_register', '_xe_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function _xe_customize_preview_js() {

	wp_enqueue_script( '_xe-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '2015', true );
  wp_localize_script( '_xe-customizer', 'selectors', array(
    'phone' => Se::$top_bar['phone'],
    'email' => Se::$top_bar['email'],
    'blog_title' => Se::$titles['blog'],
    'search_title' => Se::$titles['search'],
    'error_title' => Se::$titles['error'],
    'shop_title' => Se::$titles['shop'],
    'blog_subtitle' => Se::$subtitles['blog'],
    'search_subtitle' => Se::$subtitles['search'],
    'error_subtitle' => Se::$subtitles['error'],
    'shop_subtitle' => Se::$subtitles['shop'],
  ));
	
}
add_action( 'customize_preview_init', '_xe_customize_preview_js' );

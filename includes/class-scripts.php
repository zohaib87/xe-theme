<?php
/**
 * Enqueue scripts and styles for admin panel and front end.
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
 *
 * @package _xe
 */

namespace Xe_Theme\Includes;

use Xe_Theme\Helpers\Helpers;

class Scripts {

  function __construct() {

    add_action( 'wp_enqueue_scripts', [ $this, 'frontend' ] );
    add_action( 'admin_enqueue_scripts', [ $this, 'backend' ], 9999 );

  }

  /**
   * # Enqueue scripts and styles for front-end.
   */
  public function frontend() {

    /**
     * Google Fonts
     */
    // wp_enqueue_style( 'google-fonts', '' );

    /**
     * # Styles
     */
    Helpers::enqueue( 'style', '_xe-style', '/style.css' );
    Helpers::enqueue( 'style', 'bootstrap', '/assets/css/bootstrap.min.css' );
    Helpers::enqueue( 'style', 'fontawesome', '/assets/css/all.min.css' );
    Helpers::enqueue( 'style', '_xe-main', '/assets/css/main.css' );

    /**
     * # Scripts
     */
    Helpers::enqueue( 'script', 'bootstrap', '/assets/js/bootstrap.bundle.min.js', ['jquery'] );
    Helpers::enqueue( 'script', 'stellar', '/assets/js/stellar.min.js', ['jquery'] );
    Helpers::enqueue( 'script', 'sticky', '/assets/js/sticky.min.js', ['jquery'] );
    Helpers::enqueue( 'script', '_xe-main', '/assets/js/main.js', ['jquery'] );

    if ( is_singular() && comments_open() && get_option('thread_comments') ) {

      wp_enqueue_script( 'comment-reply' );

    }

  }

  /**
   * # Enqueue scripts and styles for admin panel.
   *
   * @link https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/
   */
  public function backend() {

    /**
     * # Styles
     */
    Helpers::enqueue( 'style', '_xe-admin', '/assets/css/admin.css' );

    /**
     * # Scripts
     */
    Helpers::enqueue( 'script', '_xe-admin', '/assets/js/admin.js', ['jquery'] );

  }

}
new Scripts();

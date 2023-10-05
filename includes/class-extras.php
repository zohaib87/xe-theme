<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package _xe
 */

namespace Xe_Theme\Includes;

class Extras {

  function __construct() {

    add_filter( 'body_class', [ $this, 'body_classes' ] );
    add_action( 'get_header', [ $this, 'admin_bar_push_down' ] );
    add_filter( 'comment_form_defaults', [ $this, 'comment_textarea_placeholder' ] );
    add_filter( 'comment_form_default_fields', [ $this, 'comment_fields_placeholder' ] );
    add_filter( 'excerpt_length', [ $this, 'custom_excerpt_length' ], 999 );
    add_filter( 'excerpt_more', [ $this, 'excerpt_more' ] );
    add_action( 'admin_menu', [ $this, 'add_menu_pages' ] );
    add_action( 'admin_menu', [ $this, 'remove_menu_pages' ] );

  }

  /**
   * # Adds custom classes to the array of body classes.
   *
   * @link https://developer.wordpress.org/reference/hooks/body_class/
   *
   * @param array $classes : Classes for the body element.
   * @return array
   */
  public function body_classes( $classes ) {

    global $xe_opt;

    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
      $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
      $classes[] = 'hfeed';
    }

    $classes[] = $xe_opt->boxed_layout_class;

    return $classes;

  }

  /**
   * # Remove admin-bar push down.
   */
  public function admin_bar_push_down() {

    remove_action( 'wp_head', '_admin_bar_bump_cb' );

  }

  /**
   * # Comment form's text-area placeholder
   *
   * @link https://developer.wordpress.org/reference/hooks/comment_form_defaults/
   */
  public function comment_textarea_placeholder( $args ) {

    $args['comment_field'] = str_replace( 'textarea', 'textarea placeholder="Comment"', $args['comment_field'] );

    return $args;

  }

  /**
   * # Comment form's fields placeholder
   *
   * @link https://developer.wordpress.org/reference/hooks/comment_form_default_fields/
   */
  public function comment_fields_placeholder( $fields ) {

    foreach( $fields as &$field ) {

      $field = str_replace( 'id="author"', 'id="author" placeholder="Name*"', $field );
      $field = str_replace( 'id="email"', 'id="email" placeholder="Email*"', $field );
      $field = str_replace( 'id="url"', 'id="url" placeholder="Website"', $field );

    }

    return $fields;

  }

  /**
   * # Custom excerpt length
   *
   * @link https://developer.wordpress.org/reference/hooks/excerpt_length/
   */
  public function custom_excerpt_length( $length ) {

    global $xe_opt;

    return $xe_opt->excerpt_length;

  }

  /**
   * # Read more link
   *
   * @link https://developer.wordpress.org/reference/hooks/excerpt_more/
   */
  public function excerpt_more( $more ) {

    $more = '... ';
    $more .= sprintf(
      '<a class="read-more" href="%1$s">%2$s</a>',
      get_permalink( get_the_ID() ),
      esc_html__( '(more)', '_xe' )
    );

    return $more;

  }

  /**
   * # Add menu pages.
   *
   * @link https://developer.wordpress.org/reference/functions/add_menu_page/
   * @link https://developer.wordpress.org/reference/functions/add_submenu_page/
   */
  public function add_menu_pages() {
  }

  /**
   * # Remove menu pages.
   *
   * @link https://developer.wordpress.org/reference/functions/remove_menu_page/
   * @link https://developer.wordpress.org/reference/functions/remove_submenu_page/
   */
  public function remove_menu_pages() {
  }

}
new Extras();

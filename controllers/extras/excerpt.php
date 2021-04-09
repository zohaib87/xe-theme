<?php
/**
 * Functions related to excerpt.
 *
 * @package _xe
 */

/**
 * Custom excerpt length
 */
if (!function_exists('_xe_custom_excerpt_length')) :

  function _xe_custom_excerpt_length($length) {

    global $xe_opt;

    return $xe_opt->excerpt_length;

  }
  add_filter('excerpt_length', '_xe_custom_excerpt_length', 999);

endif;

/**
 * Read more link
 */
if (!function_exists('_xe_excerpt_more')) :

  function _xe_excerpt_more($more) {

    $more = '... ';
    $more .= sprintf( '<a class="read-more" href="%1$s">%2$s</a>', get_permalink( get_the_ID() ), esc_html__( '(more)', '_xe' ) );

    return $more;

  }
  add_filter('excerpt_more', '_xe_excerpt_more');

endif;

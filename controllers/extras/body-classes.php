<?php 
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * 
 * @return array
 *
 * @package _xe
 */

if (!function_exists('_xe_body_classes')) :

  function _xe_body_classes($classes) {

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
  add_filter('body_class', '_xe_body_classes');

endif;
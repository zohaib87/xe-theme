<?php
/**
 * Next/Prev post title and link.
 *
 * @package _xe
 */

if (!function_exists('_xe_post_nav')) :

  function _xe_post_nav() {

    $prev_post = get_previous_post();
    $next_post = get_next_post();

    if ($prev_post) {
       $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
       $prev_link = get_permalink($prev_post->ID);
    } else {
      $prev_title = $prev_link = '';
    }

    if ($next_post) {
       $next_title = strip_tags(str_replace('"', '', ucwords($next_post->post_title)));
       $next_link = get_permalink($next_post->ID);
    } else {
      $next_title = $next_link = '';
    }

    // code goes here...

  }

endif;

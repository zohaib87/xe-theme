<?php
/**
 * Featured video
 *
 * @package _xe
 */

if (!function_exists('_xe_featured_video')) :

  function _xe_featured_video() {

    $post = get_post();
    $content = do_shortcode( apply_filters('the_content', $post->post_content) );
    $video = get_media_embedded_in_content($content);

    if (count($video)) :

      echo '<div class="featured-video">';
      echo $video[0];
      echo '</div><!-- .featured-video -->';

    endif;

  }

endif;
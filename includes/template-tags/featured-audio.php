<?php
/**
 * Featured audio
 *
 * @package _xe
 */

if (!function_exists('_xe_featured_audio')) :

  function _xe_featured_audio() {

    $post = get_post();
    $content = do_shortcode( apply_filters('the_content', $post->post_content) );
    $audio = get_media_embedded_in_content($content);

    if (count($audio)) :

      echo '<div class="featured-audio">';
      echo $audio[0];
      echo '</div><!-- .featured-audio -->';

    endif;

  }

endif;
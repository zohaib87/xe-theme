<?php
/**
 * Featured gallery
 *
 * @package _xe
 */

if (!function_exists('_xe_featured_gallery')) :

  function _xe_featured_gallery() {

    $id = get_the_ID();
    $images = get_post_gallery_images( $id );
    $title_margin = '';
    $count = 0;

    ?><div id="featured-gallery-<?php the_ID(); ?>" class="featured-gallery carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <?php
          foreach ($images as $image) {

            if ($count == 5) break;
            $atcive = ($count == 1) ? 'active' : '';

            echo '<div class="carousel-item '.esc_attr($atcive).'"><img class="img-fluid" src="'.esc_url($image).'" alt=""/></div>';

            $count++;

          }
        ?>
      </div><!-- .carousel-inner -->

      <a class="carousel-control-prev" href="#featured-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#featured-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- .featured-gallery --><?php

  }

endif;
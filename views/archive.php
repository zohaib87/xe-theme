<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _xe
 */

global $xe_opt;

$thumbnail_url = get_the_post_thumbnail_url( null, '_xe-blog' );
$thumbnail_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); 
$date = get_the_date();
$author = array(
  'name' => get_the_author_meta('display_name'),
  'desc' => get_the_author_meta('description'),
);
$comments_count = get_comments_number();
$post_format = get_post_format();

?>

<div class="card">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
      if ($post_format == 'video' || $post_format == 'audio') {

        $post = get_post();
        $content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
        $video = get_media_embedded_in_content($content);

        if (count($video)) :

          echo '<div class="featured-'.esc_attr($post_format).'">';
          echo $video[0];
          echo '</div><!-- .featured-'.esc_attr($post_format).' -->';

        endif;

      } elseif ($post_format == 'gallery') {

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

      } else {             
  			
        if ( has_post_thumbnail() ) :

  				echo '<div class="img-featured">';
  				the_post_thumbnail( '_xe-blog', array('class' => 'img-fluid') );		
  				echo '</div><!-- .img-featured -->';
  				
  			endif;

      }
		?>

		<div class="card-body">
      <header class="entry-header">
        <?php 
          if ( is_sticky() ) { 
            echo '<i class="fas fa-thumbtack sticky-post"></i>'; 
          } 
          the_title( '<h2 class="entry-title card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); 
        ?>
      </header><!-- .entry-header -->

      <div class="entry-meta text-muted mb-2"> 
        <?php _xe_posted_on(); ?>
      </div><!-- .entry-meta -->

      <div class="entry-content">
        <?php the_excerpt(); ?>
      </div><!-- .entry-content -->  
    </div>

	</article><!-- #post-## -->

</div><!-- .col-md-## -->

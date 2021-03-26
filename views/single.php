<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _xe
 */

global $xe_opt;

$thumbnail_url = get_the_post_thumbnail_url( null, '_xe-post' );
$date = get_the_date();
$author = array(
  'name' => get_the_author_meta('display_name'),
  'desc' => get_the_author_meta('description'),
);
$comments_count = get_comments_number();
$post_format = get_post_format();
$contents = get_the_content();
$str_regux = '';

?>

<div class="row">
	<div class="col-md-12">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php 
				if ($post_format == 'gallery') {

					$id = get_the_ID();
          $images = get_post_gallery_images( $id );
          $title_margin = '';
          $count = 0;

          ?><div id="featured-gallery" class="featured-gallery carousel slide" data-ride="carousel">
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

            <a class="carousel-control-prev" href="#featured-gallery" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#featured-gallery" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div><!-- .featured-gallery --><?php

        } else {
		                
					if ( has_post_thumbnail() ) :

						echo '<div class="img-featured">';
						the_post_thumbnail( '_xe-post', array('class' => 'img-fuild') );		
						echo '</div><!-- .img-featured -->';

					endif;

				}
			?>

			<header class="entry-header">
				<?php 
					if ( is_sticky() ) { 
						echo '<i class="fa fa-thumb-tack sticky-post"></i>'; 
					} 
					if ($xe_opt->title_bar['switch'] == 'off') {
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					} 
				?>
			</header><!-- .entry-header -->

			<div class="entry-meta text-muted mt-2 mb-4">
				<?php _xe_posted_on(); ?>
			</div><!-- .entry-meta -->

			<div class="entry-content">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_xe' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<div class="clearfix"></div>

			<footer class="entry-footer">
				<?php
					_xe_entry_footer();
					_xe_about_author();
				?>
			</footer><!-- .entry-footer -->

		</article><!-- #post-## -->

	</div><!-- .col-md-12 -->
</div><!-- .row -->

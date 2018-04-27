<?php
/**
 * Template part for displaying posts.
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
				if ($post_format == 'video') {

					$video = _xe_get_elements_by_tag('embed', $contents);
                    $str_regux = $video[0];

                    if ($video) :

                    	echo '<div class="featured-'.esc_attr($post_format).'">';
                        echo apply_filters('the_content', $video[0]);
                        echo '</div><!-- .featured-'.esc_attr($post_format).' -->';

			            $title_margin = '';

		            else :

						$title_margin = ' margin-top-0';
						
					endif;

		        } elseif ($post_format == 'gallery') {

						$gallery = _xe_get_elements_by_tag('gallery', $contents, 2);
						// $str_regux = $gallery[0];
						
						if ($gallery) :

				        	$id = get_the_ID();
				        	$images = get_post_gallery_images( $id );
				        	$count = 0;

				        	echo '<div class="featured-'.esc_attr($post_format).'">';
				        	echo '<div class="blog-grid-slider slick">'; 
				        	foreach ($images as $image) {
				        		if ($count == 5) break;
				        		echo '<div class="item"><img class="img-responsive" src="'.esc_url($image).'" alt=""/></div>';
				        		$count++;
				        	}
			                echo '</div>';
			                echo '</div><!-- .featured-'.esc_attr($post_format).' -->';

			                $title_margin = '';

			            else :

			            	$title_margin = ' margin-top-0';

			            endif;


		        } else {
		                
					if ( has_post_thumbnail() ) :

						echo '<div class="img-featured">';
						the_post_thumbnail( '_xe-post', array('class' => 'img-responsive') );		
						echo '</div><!-- .img-featured -->';

						$title_margin = '';

					else :

						$title_margin = ' margin-top-0';

					endif;

				}
			?>

			<header class="entry-header">
				<?php 
					if ( is_sticky() ) { 
						echo '<i class="fa fa-thumb-tack sticky-post"></i>'; 
					} 
					if ($xe_opt->title_bar['switch'] != true) {
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					} 
				?>
			</header><!-- .entry-header -->

			<div class="entry-meta">
				<?php _xe_posted_on(); ?>
			</div><!-- .entry-meta -->

			<div class="entry-content">
				<?php
					echo apply_filters( 'the_content', str_replace($str_regux, '', get_the_content())  );

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

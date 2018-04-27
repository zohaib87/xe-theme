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
$date = get_the_date();
$author = array(
    'name' => get_the_author_meta('display_name'),
    'desc' => get_the_author_meta('description'),
);
$comments_count = get_comments_number();
$post_format = get_post_format();

?>

<div class="col-md-<?php echo esc_attr($xe_opt->blog['columns']); ?> col-xs-12 masonry margin-bottom-30">

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

	                $title_margin = '';

	            else :

	            	$title_margin = ' margin-top-0';

	            endif;

	        } elseif ($post_format == 'gallery') {

	        	$id = get_the_ID();
	        	$images = get_post_gallery_images( $id );
	        	$title_margin = '';
	        	$count = 0;

	        	echo '<div class="featured-'.esc_attr($post_format).' slick">';
	        	foreach ($images as $image) {
	        		if ($count == 5) break;
	        		echo '<div class="item"><img class="img-responsive" src="'.esc_url($image).'" alt=""/></div>';
	        		$count++;
	        	}
                echo '</div><!-- .featured-'.esc_attr($post_format).' -->';

	        } else {
	                
				if ( has_post_thumbnail() ) :

					echo '<div class="img-featured">';
					the_post_thumbnail( '_xe-blog', array('class' => 'img-responsive') );		
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
				the_title( '<h2 class="entry-title'.esc_attr($title_margin).'"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); 
			?>
		</header><!-- .entry-header -->

		<div class="entry-meta"> 
			<?php _xe_posted_on(); ?>
		</div><!-- .entry-meta -->

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->

	</article><!-- #post-## -->

</div><!-- .col-md-## -->

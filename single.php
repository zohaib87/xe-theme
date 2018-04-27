<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _xe
 */

global $xe_opt;

if ( is_singular('xe-portfolio') ) {
	$post_format = 'single-portfolio';
} elseif ( is_singular('xe-events') ) {
	$post_format = 'single-events';
} else {
	$post_format = 'single';
}

get_header(); ?>

<div id="content" class="site-content <?php echo esc_attr($xe_opt->container); ?> padding-top-bottom">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', $post_format );

					if ( $xe_opt->comments == true ) {
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					}

					_xe_post_nav();

				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>

</div><!-- #content -->

<?php
get_footer();

<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _xe
 */

global $xe_opt;

if ( is_post_type_archive('xe-portfolio') ) {
	$post_format = 'portfolio-list';
} elseif ( is_post_type_archive('xe-events') ) {
	$post_format = 'events-list';
} else {
	$post_format = '';
}

get_header(); ?>

<div id="content" class="site-content <?php echo esc_attr($xe_opt->container); ?> padding-top-bottom">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php 
				if ( have_posts() ) :

					get_template_part( 'template-parts/start', $post_format );

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', $post_format );

					endwhile;

					get_template_part( 'template-parts/end', $post_format );

					_xe_paging_nav();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; 
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>

</div><!-- #content -->

<?php
get_footer();

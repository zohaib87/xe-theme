<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _xe
 */

global $xe_opt;

$post = get_post();
$sidebar = $xe_opt->sidebar();

if ( $post && preg_match('/vc_row/', $post->post_content) ) {
    
    if ($sidebar['position'] == 'none') {
		$classes = 'vc-active';
	} else {
		$classes = 'vc-active sidebar-active '.$xe_opt->container;
	}

} else {
	$classes = 'page-content '.$xe_opt->container;
}

get_header(); ?>

<div id="content" class="site-content padding-top-bottom <?php echo esc_attr($classes); ?>">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php 
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					if ( $xe_opt->comments == true ) {
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					}

				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>

</div><!-- #content -->

<?php
get_footer();

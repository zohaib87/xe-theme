<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _xe
 */

global $xe_opt;

get_header(); ?>

<div id="content" class="site-content <?php echo esc_attr($xe_opt->container); ?> padding-top-bottom clearfix">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				if ( have_posts() ) {

					echo '<div class="card-columns">';

					/* Start the Loop */
					while ( have_posts() ) {
						the_post();

						get_template_part( 'template-parts/archive', get_post_format() );

          }

					echo '</div><!-- .card-columns -->';

					_xe_paging_nav();

        } else {

					get_template_part( 'template-parts/content', 'none' );

        }
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>

</div><!-- #content -->

<?php
get_footer();

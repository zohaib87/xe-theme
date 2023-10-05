<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _xe
 */

use Xe_Theme\Includes\Template_Tags;

global $xe_opt;

get_header();

?>

<div id="content" class="site-content <?php echo esc_attr($xe_opt->container); ?> padding-top-bottom clearfix">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				while ( have_posts() ) {

          the_post();

					get_template_part( 'template-parts/single', get_post_format() );

					if ( $xe_opt->post_comments == 'on' ) {

            // If comments are open or we have at least one comment, load up the comment template.

            if ( comments_open() || get_comments_number() ) {
							comments_template();
						}

          }

					Template_Tags::post_nav();

				}
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>

</div><!-- #content -->

<?php
get_footer();

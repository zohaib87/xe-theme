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

use Xe_Theme\Helpers\Helpers as Helper;

global $xe_opt;

$sidebar = $xe_opt->sidebar();
$comments_container = false;

if ( Helper::is_elementor_used() || Helper::is_wpbakery_used() ) {

  if ( $sidebar['position'] == 'none' ) {

    $classes = 'builder-active';
    $comments_container = true;

  } else {

    $classes = 'builder-active sidebar-active '.$xe_opt->container;

  }

} else {

  $classes = 'page-content ' . $xe_opt->container;

}

$classes = Helper::classes( [ 'site-content', 'padding-top-bottom', $classes, 'clearfix' ] );

get_header();

?>

<div id="content" class="<?php echo esc_attr($classes); ?>">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'views/content', 'page' );

					if ( $xe_opt->page_comments == 'on' ) {

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {

							if ( $comments_container == true ) echo '<div class="'.esc_attr( $xe_opt->container ).'">';
              comments_template();
              if ( $comments_container == true ) echo '</div>';

            }

					}

				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>

</div><!-- #content -->

<?php
get_footer();

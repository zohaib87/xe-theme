<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package _xe
 */

global $xe_opt;

get_header(); ?>

<div id="content" class="site-content <?php echo esc_attr($xe_opt->container); ?> padding-top-bottom clearfix">

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
			if ( have_posts() ) :

        ?><div class="row">
          <div class="col-md-12">
            <?php if ($xe_opt->title_bar['switch'] == 'off') : ?>
              <p class="lead"><?php esc_html_e( 'Not what you looking for? Maybe try again...', '_xe' ); ?></p>
            <?php endif;
            get_search_form(); ?>
          </div>
        </div><?php

				echo '<div class="card-columns my-4">';

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/archive', 'search' );

					endwhile;

				echo '</div><!-- .card-columns -->';

				_xe_paging_nav();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

</div><!-- #content -->

<?php
get_footer();

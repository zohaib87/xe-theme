<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @var $xe_opt->portfolio['fields'] [< Array of 'title' and 'value' >]
 * @var $xe_opt->portfolio['gallery']
 * @var $xe_opt->portfolio['btn-text']
 * @var $xe_opt->portfolio['btn-link']
 * @var $xe_opt->portfolio['btn-target']
 *
 * @package _xe
 */

global $xe_opt;

$thumbnail_url = get_the_post_thumbnail_url( null, '_xe-portfolio' );
$date = get_the_date();
$author = array(
    'name' => get_the_author_meta('display_name'),
    'desc' => get_the_author_meta('description'),
);
$comments_count = get_comments_number();
$fields = $xe_opt->portfolio['fields'];
$images = $xe_opt->portfolio['gallery'];
$size = 'full';

?>

<div class="row">
	<div class="col-md-12">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="entry-header">
				<?php the_post_thumbnail( '_xe-portfolio', array('class' => 'img-responsive') ); ?>
			</div><!-- .entry-header -->

			<div class="entry-content">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_xe' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php
					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							esc_html__( 'Edit %s', '_xe' ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>
			</footer><!-- .entry-footer -->

		</article><!-- #post-## -->

	</div><!-- .col-md-12 -->
</div><!-- .row -->


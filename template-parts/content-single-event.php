<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _xe
 */

global $xe_opt;

$thumbnail_url = get_the_post_thumbnail_url( null, '_xe-event' );
$permalink = get_permalink();
$date = get_the_date();
$author = array(
    'name' => get_the_author_meta('display_name'),
    'desc' => get_the_author_meta('description'),
);
$comments_count = get_comments_number();

?>

<div class="row">
	<div class="col-md-12">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="entry-header">
				<?php the_post_thumbnail( '_xe-event', array('class' => 'img-responsive') ); ?>
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

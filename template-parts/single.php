<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _xe
 */

use Xe_Theme\Includes\Template_Tags;

global $xe_opt;

$thumbnail_url = get_the_post_thumbnail_url( null, '_xe-post' );
$thumbnail_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
$date = get_the_date();
$author = array(
  'name' => get_the_author_meta('display_name'),
  'desc' => get_the_author_meta('description'),
);
$comments_count = get_comments_number();
$post_format = get_post_format();
$contents = get_the_content();
$str_regux = '';

?>

<div class="row">
	<div class="col-md-12">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php
				if ( $post_format == 'gallery' ) {

					_xe_featured_gallery();

        } else {

					if ( has_post_thumbnail() ) {

						echo '<div class="img-featured">';
						the_post_thumbnail( '_xe-post', array('class' => 'img-fluid') );
						echo '</div><!-- .img-featured -->';

          }

				}
			?>

			<header class="entry-header">
				<?php
					if ( is_sticky() ) {
						echo '<i class="fa fa-thumb-tack sticky-post"></i>';
					}

					if ( $xe_opt->title_bar['switch'] == 'off' ) {
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					}
				?>
			</header><!-- .entry-header -->

			<div class="entry-meta text-muted mt-2 mb-4">
				<?php Template_Tags::posted_on(); ?>
			</div><!-- .entry-meta -->

			<div class="entry-content">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_xe' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<div class="clearfix"></div>

			<footer class="entry-footer">
				<?php
					Template_Tags::entry_footer();
					Template_Tags::about_author();
				?>
			</footer><!-- .entry-footer -->

		</article><!-- #post-## -->

	</div><!-- .col-md-12 -->
</div><!-- .row -->

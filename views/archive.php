<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _xe
 */

global $xe_opt;

$thumbnail_url = get_the_post_thumbnail_url( null, '_xe-blog' );
$thumbnail_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); 
$date = get_the_date();
$author = array(
  'name' => get_the_author_meta('display_name'),
  'desc' => get_the_author_meta('description'),
);
$comments_count = get_comments_number();
$post_format = get_post_format();

?>

<div class="card">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
      if ($post_format == 'video') {

        _xe_featured_video();

      } elseif ($post_format == 'audio') {

        _xe_featured_audio();

      } elseif ($post_format == 'gallery') {

        _xe_featured_gallery();

      } else {             
  			
        if ( has_post_thumbnail() ) :

  				echo '<div class="img-featured">';
  				the_post_thumbnail( '_xe-blog', array('class' => 'img-fluid') );		
  				echo '</div><!-- .img-featured -->';
  				
  			endif;

      }
		?>

		<div class="card-body">
      <header class="entry-header">
        <?php 
          if ( is_sticky() ) { 
            echo '<i class="fas fa-thumbtack sticky-post"></i>'; 
          } 
          the_title( '<h2 class="entry-title card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); 
        ?>
      </header><!-- .entry-header -->

      <div class="entry-meta text-muted mb-2"> 
        <?php _xe_posted_on(); ?>
      </div><!-- .entry-meta -->

      <div class="entry-content">
        <?php the_excerpt(); ?>
      </div><!-- .entry-content -->  
    </div>

	</article><!-- #post-## -->

</div><!-- .col-md-## -->

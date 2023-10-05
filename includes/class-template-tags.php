<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package _xe
 */

namespace Xe_Theme\Includes;

class Template_Tags {

  function __construct() {

    add_action( 'edit_category', [ $this, 'category_transient_flusher' ] );
    add_action( 'save_post', [ $this, 'category_transient_flusher' ] );

  }

  /**
	 * # Prints HTML with meta information for the current post-date/time.
	 */
  public static function posted_on() {

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {

      $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>, <time class="updated" datetime="%3$s">%4$s</time>';

    }

    $time_string = sprintf( $time_string,
      esc_attr( get_the_date( 'c' ) ),
      esc_html( get_the_date() ),
      esc_attr( get_the_modified_date( 'c' ) ),
      esc_html( get_the_modified_date() )
    );

    $posted_on = sprintf(
      esc_html_x( 'Posted on %s', 'post date', '_xe' ),
      '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
    );

    $byline = sprintf(
      esc_html_x( 'by %s', 'post author', '_xe' ),
      '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

  }

  /**
	 * # Prints HTML with meta information for the current author.
	 */
  public static function about_author() {

    $author = array(
      'id' => get_the_author_meta('ID'),
      'name' => get_the_author_meta('display_name'),
      'desc' => get_the_author_meta('description'),
      'img' => get_avatar(
        get_the_author_meta('ID'), // ID or Email
        100, // Size
        '', // Url for an image, defaults to the "Mystery Person."
        false, // alt
        array( // args
          'class' => array('img-fluid'),
        )
      ),
    );

    ?>
      <div class="author-info">
        <ul class="row">
          <li class="col-md-2">
            <?php echo wp_kses_post($author['img']); ?>
          </li>
          <li class="col-md-10">
            <h5>About <?php echo esc_html($author['name']); ?></h5>
            <?php echo wp_kses_post($author['desc']); ?>
          </li>
        </ul>
      </div>
    <?php

  }

  /**
	 * # Prints HTML with meta information for the categories, tags and comments.
	 */
  public static function entry_footer() {

    // Hide category and tag text for pages.
    if ( 'post' === get_post_type() ) {

      /* translators: used between list items, there is a space after the comma */
      $categories_list = get_the_category_list( esc_html__( ', ', '_xe' ) );

      if ( $categories_list && $this->categorized_blog() ) {

        printf( '<span class="cat-links mb-2">' . esc_html__( 'Posted in %1$s', '_xe' ) . '</span>', $categories_list ); // WPCS: XSS OK.

      }

      /* translators: used between list items, there is a space after the comma */
      $tags_list = get_the_tag_list( '', esc_html__( ', ', '_xe' ) );

      if ( $tags_list ) {

        printf( '<span class="tags-links mb-3">' . esc_html__( 'Tagged %1$s', '_xe' ) . '</span>', $tags_list ); // WPCS: XSS OK.

      }

    }

    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

      echo '<span class="comments-link">';
      /* translators: %s: post title */
      comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', '_xe' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
      echo '</span>';

    }

    edit_post_link(
      sprintf(
        /* translators: %s: Name of current post */
        esc_html__( 'Edit %s', '_xe' ),
        the_title( '<span class="screen-reader-text">"', '"</span>', false )
      ),
      '<span class="edit-link">',
      '</span>'
    );

  }

  /**
   * # Returns true if a blog has more than 1 category.
   *
   * @return bool
   */
  public function categorized_blog() {

    if ( false === ( $all_the_cool_cats = get_transient( '_xe_categories' ) ) ) {

      // Create an array of all the categories that are attached to posts.
      $all_the_cool_cats = get_categories( array(
        'fields'     => 'ids',
        'hide_empty' => 1,
        // We only need to know if there is more than one category.
        'number'     => 2,
      ) );

      // Count the number of categories that are attached to the posts.
      $all_the_cool_cats = count( $all_the_cool_cats );

      set_transient( '_xe_categories', $all_the_cool_cats );

    }

    if ( $all_the_cool_cats > 1 ) {

      // This blog has more than 1 category so _xe_categorized_blog should return true.
      return true;

    } else {

      // This blog has only 1 category so _xe_categorized_blog should return false.
      return false;

    }

  }

  /**
   * # Flush out the transients used in categorized_blog.
   */
  public function category_transient_flusher() {

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return;
    }

    // Like, beat it. Dig?
    delete_transient( '_xe_categories' );

  }

  /**
   * # Blog page navigation
   */
  public static function paging_nav() {

    // Don't print empty markup if there's only one page.
    if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
      return;
    }

    $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset( $url_parts[1] ) ) {
      wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
    $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

    // Set up paginated links.
    $links = paginate_links( array(
      'base'     => $pagenum_link,
      'format'   => $format,
      'total'    => $GLOBALS['wp_query']->max_num_pages,
      'current'  => $paged,
      'mid_size' => 2,
      'add_args' => array_map( 'urlencode', $query_args ),
      'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>',
      'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
      'type'      => 'list',
    ) );

    if ( $links ) {

      ?>
      <nav class="navigation paging-navigation mt-2" role="navigation">
        <h1 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', '_xe' ); ?></h1>
        <?php echo $links; ?>
      </nav><!-- .navigation -->
      <?php

    }

  }

  /**
   * # Next/Prev post title and link.
   */
  public static function post_nav() {

    $prev_post = get_previous_post();
    $next_post = get_next_post();

    if ( $prev_post ) {

      $prev_title = strip_tags( str_replace( '"', '', ucwords($prev_post->post_title) ) );
      $prev_link = get_permalink( $prev_post->ID );

    } else {

      $prev_title = $prev_link = '';

    }

    if ( $next_post ) {

      $next_title = strip_tags( str_replace( '"', '', ucwords($next_post->post_title) ) );
      $next_link = get_permalink( $next_post->ID );

    } else {

      $next_title = $next_link = '';

    }

    // code goes here...

  }

  /**
   * # Featured audio
   */
  public static function featured_audio() {

    $post = get_post();
    $content = do_shortcode( apply_filters('the_content', $post->post_content) );
    $audio = get_media_embedded_in_content($content);

    if ( count($audio) ) {

      echo '<div class="featured-audio">';
      echo $audio[0];
      echo '</div><!-- .featured-audio -->';

    }

  }

  /**
   * # Featured gallery
   */
  public static function featured_gallery() {

    $id = get_the_ID();
    $images = get_post_gallery_images( $id );
    $title_margin = '';
    $count = 0;

    ?>
      <div id="featured-gallery-<?php the_ID(); ?>" class="featured-gallery carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <?php
            foreach ( $images as $image ) {

              if ($count == 5) break;
              $atcive = ($count == 1) ? 'active' : '';

              echo '<div class="carousel-item '.esc_attr($atcive).'"><img class="img-fluid" src="'.esc_url($image).'" alt=""/></div>';

              $count++;

            }
          ?>
        </div><!-- .carousel-inner -->

        <a class="carousel-control-prev" href="#featured-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only"><?php echo esc_html__( 'Previous', '_xe' ); ?></span>
        </a>

        <a class="carousel-control-next" href="#featured-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only"><?php echo esc_html__( 'Previous', '_xe' ); ?></span>
        </a>
      </div><!-- .featured-gallery -->
    <?php

  }

  /**
   * # Featured video
   */
  public static function featured_video() {

    $post = get_post();
    $content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
    $video = get_media_embedded_in_content($content);

    if ( count($video) ) {

      echo '<div class="featured-video">';
      echo $video[0];
      echo '</div><!-- .featured-video -->';

    }

  }

}
new Template_Tags();

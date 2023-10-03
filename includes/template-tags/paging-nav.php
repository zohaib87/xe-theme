<?php
/**
 * Custom Page Navigation
 *
 * @package _xe
 */

if (!function_exists('_xe_paging_nav')) :

  function _xe_paging_nav() {

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

    if ( $links ) :

    ?>
    <nav class="navigation paging-navigation mt-2" role="navigation">
      <h1 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', '_xe' ); ?></h1>
      <?php echo $links; ?>
    </nav><!-- .navigation -->
    <?php

    endif;

  }

endif;
<?php
/**
 * Entry footer tag for this theme.
 *
 * @package _xe
 */

if (!function_exists('_xe_entry_footer')) {

  function _xe_entry_footer() {

    // Hide category and tag text for pages.
    if ( 'post' === get_post_type() ) {
      /* translators: used between list items, there is a space after the comma */
      $categories_list = get_the_category_list( esc_html__( ', ', '_xe' ) );
      if ( $categories_list && _xe_categorized_blog() ) {
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

}

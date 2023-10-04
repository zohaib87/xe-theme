<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package _xe
 */

/**
 * # Adds custom classes to the array of body classes.
 *
 * @link https://developer.wordpress.org/reference/hooks/body_class/
 *
 * @param array $classes : Classes for the body element.
 * @return array
 */
if (!function_exists('_xe_body_classes')) {

  function _xe_body_classes($classes) {

    global $xe_opt;

    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
      $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
      $classes[] = 'hfeed';
    }

    $classes[] = $xe_opt->boxed_layout_class;

    return $classes;

  }
  add_filter('body_class', '_xe_body_classes');

}

/**
 * # Remove admin-bar push down.
 */
if (!function_exists('_xe_admin_bar_push_down')) {

  function _xe_admin_bar_push_down() {
    remove_action('wp_head', '_admin_bar_bump_cb');
  }
  add_action('get_header', '_xe_admin_bar_push_down');

}

/**
 * # Comment form's text-area placeholder
 *
 * @link https://developer.wordpress.org/reference/hooks/comment_form_defaults/
 */
if (!function_exists('_xe_comment_textarea_placeholder')) {

  function _xe_comment_textarea_placeholder($args) {

    $args['comment_field'] = str_replace( 'textarea', 'textarea placeholder="Comment"', $args['comment_field'] );

    return $args;

  }
  add_filter('comment_form_defaults', '_xe_comment_textarea_placeholder');

}

/**
 * # Comment form's fields placeholder
 *
 * @link https://developer.wordpress.org/reference/hooks/comment_form_default_fields/
 */
if (!function_exists('_xe_comment_fields_placeholder')) {

  function _xe_comment_fields_placeholder($fields) {

    foreach( $fields as &$field ) {

      $field = str_replace( 'id="author"', 'id="author" placeholder="Name*"', $field );
      $field = str_replace( 'id="email"', 'id="email" placeholder="Email*"', $field );
      $field = str_replace( 'id="url"', 'id="url" placeholder="Website"', $field );

    }

    return $fields;

  }
  add_filter('comment_form_default_fields', '_xe_comment_fields_placeholder');

}

/**
 * # Custom excerpt length
 *
 * @link https://developer.wordpress.org/reference/hooks/excerpt_length/
 */
if (!function_exists('_xe_custom_excerpt_length')) {

  function _xe_custom_excerpt_length($length) {

    global $xe_opt;

    return $xe_opt->excerpt_length;

  }
  add_filter('excerpt_length', '_xe_custom_excerpt_length', 999);

}

/**
 * # Read more link
 *
 * @link https://developer.wordpress.org/reference/hooks/excerpt_more/
 */
if (!function_exists('_xe_excerpt_more')) {

  function _xe_excerpt_more($more) {

    $more = '... ';
    $more .= sprintf(
      '<a class="read-more" href="%1$s">%2$s</a>',
      get_permalink(get_the_ID()),
      esc_html__('(more)', '_xe')
    );

    return $more;

  }
  add_filter('excerpt_more', '_xe_excerpt_more');

}

/**
 * # Add menu pages.
 *
 * @link https://developer.wordpress.org/reference/functions/add_menu_page/
 * @link https://developer.wordpress.org/reference/functions/add_submenu_page/
 */
function _xe_add_menu_pages() {
}
add_action('admin_menu', '_xe_add_menu_pages');

/**
 * # Remove menu pages.
 *
 * @link https://developer.wordpress.org/reference/functions/remove_menu_page/
 * @link https://developer.wordpress.org/reference/functions/remove_submenu_page/
 */
function _xe_remove_menu_pages() {
}
add_action('admin_menu', '_xe_remove_menu_pages');

/**
 * # Search form customization etc.
 */
if (!function_exists('_xe_custom_search_form')) {

  function _xe_custom_search_form($form) {

    $form = '
      <form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
        <div class="search-form">
          <label class="screen-reader-text" for="s">' . esc_html__('Search:', '_xe') . '</label>
          <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search" class="form-control mr-sm-1">
          <input type="submit" id="searchsubmit" value="" class="search-submit">
        </div>
      </form>
    ';

    return $form;

  }
  add_filter('get_search_form', '_xe_custom_search_form', 100);

}

/**
 * # WooCommerce extra functions.
 */
if ( class_exists('WooCommerce') ) {

  /**
   * # Search button text
   */
  function _xe_woo_search_form($form) {

    $form = '
      <form role="search" method="get" class="woocommerce-product-search" action="' . esc_url( home_url( '/'  ) ) . '">
        <div>
          <label class="screen-reader-text" for="woocommerce-product-search-field">' . esc_html__( 'Search for:', '_xe' ) . '</label>
          <input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="' . esc_html__( 'Search products...', '_xe' ) . '" value="' . get_search_query() . '" name="s" />
          <input type="submit" value="" />
          <input type="hidden" name="post_type" value="product" />
        </div>
      </form>
    ';

    return $form;

  }
  add_filter('get_product_search_form' , '_xe_woo_search_form');

  /**
   * # Remove breadcrumbs
   */
  remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

}

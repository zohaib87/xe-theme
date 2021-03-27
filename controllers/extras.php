<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package _xe
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * 
 * @return array
 */
function _xe_body_classes( $classes ) {

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
add_filter( 'body_class', '_xe_body_classes' );


/**
 * Custom excerpt length
 */
function _xe_custom_excerpt_length( $length ) {

  global $xe_opt;

  return $xe_opt->excerpt_length;

}
add_filter( 'excerpt_length', '_xe_custom_excerpt_length', 999 );


/**
 * Read more link
 */
function _xe_excerpt_more($more) {

	$more = '... ';
  $more .= sprintf( '<a class="read-more" href="%1$s">%2$s</a>', get_permalink( get_the_ID() ), __( '(more)', '_xe' ) );

  return $more;

}
add_filter('excerpt_more', '_xe_excerpt_more');

/**
 * Comment form text-area placeholder
 */
function _xe_comment_textarea_placeholder($args) {

  $args['comment_field'] = str_replace( 'textarea', 'textarea placeholder="Comment"', $args['comment_field'] );

  return $args;

}
add_filter('comment_form_defaults', '_xe_comment_textarea_placeholder');

/**
 * Comment form fields placeholder
 */
function _xe_comment_fields_placeholder($fields) {

  foreach( $fields as &$field ) {

    $field = str_replace( 'id="author"', 'id="author" placeholder="Name*"', $field );
    $field = str_replace( 'id="email"', 'id="email" placeholder="Email*"', $field );
    $field = str_replace( 'id="url"', 'id="url" placeholder="Website"', $field );

  }

  return $fields;

}
add_filter('comment_form_default_fields', '_xe_comment_fields_placeholder');

/**
 * Search Form
 */
function _xe_custom_search_form($form) {

  $form = '
  <form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div class="search-form">
      <label class="screen-reader-text" for="s">' . esc_html__('Search:', '_xe') . '</label>
      <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search" class="form-control mr-sm-1">
      <input type="submit" id="searchsubmit" value="" class="search-submit">
    </div>
  </form>';

  return $form;

}
add_filter( 'get_search_form', '_xe_custom_search_form', 100 );

/**
 * WooCommerce
 */
if ( class_exists('WooCommerce') ) {

  /**
   * Search Button Text
   */
  function _xe_woo_search_form( $form ) {
      
    $form = '<form role="search" method="get" class="woocommerce-product-search" action="' . esc_url( home_url( '/'  ) ) . '">
        <div>
          <label class="screen-reader-text" for="woocommerce-product-search-field">' . esc_html__( 'Search for:', '_xe' ) . '</label>
          <input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="' . __( 'Search products...', '_xe' ) . '" value="' . get_search_query() . '" name="s" />
          <input type="submit" value="" />
          <input type="hidden" name="post_type" value="product" />
        </div>
    </form>';
    
    return $form;
      
  }
  add_filter( 'get_product_search_form' , '_xe_woo_search_form' );

  /**
   * Remove breadcrumbs
   */
  remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

}

/**
 * Change posts label
 */
function _xe_change_post_label() {

  global $menu;
  global $submenu;
  $menu[5][0] = 'Blog Posts';

}
add_action( 'admin_menu', '_xe_change_post_label' );

/**
 * Change posts objects
 */
function _xe_change_post_objects() {

  global $wp_post_types;
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'Blog Posts';
  // $labels->singular_name = 'Post';
  // $labels->menu_name = 'Posts';
  // $labels->name_admin_bar = 'Post';
  // $labels->add_new = 'Add New';
  // $labels->add_new_item = 'Add Post';
  // $labels->new_item = 'Post';
  // $labels->edit_item = 'Edit Posts';
  // $labels->view_item = 'View Post';
  // $labels->all_items = 'All Posts';
  // $labels->search_items = 'Search Posts';
  // $labels->not_found = 'No Posts found';
  // $labels->not_found_in_trash = 'No Posts found in Trash';

}
add_action( 'init', '_xe_change_post_objects' );

/**
 * Remove admin-bar push down
 */
function _xe_admin_bar_push_down() {

  remove_action('wp_head', '_admin_bar_bump_cb');

}
add_action('get_header', '_xe_admin_bar_push_down');

/**
 * Dashboard widgets
 */
function _xe_dashboard_widgets() {

  global $wp_meta_boxes;
   
  wp_add_dashboard_widget('theme_support_widget', esc_html__('Theme Support', '_xe'), '_xe_dashboard_help');

}
add_action('wp_dashboard_setup', '_xe_dashboard_widgets');

/**
 * Dashboard widget callbacks
 */
function _xe_dashboard_help() {

  $theme = wp_get_theme();

  ?>
  <p class="theme-support-content">
    Welcome to <b><?php echo esc_html($theme->get('Name')); ?></b>! Need help? Contact us at <a href="mailto:support@xecreators.pk">support@xecreators.pk</a>. For WordPress tutorials visit our <a href="https://www.xecreators.pk/blog/" target="_blank">Blog</a>.
  </p>
  <p class="theme-support-footer">
    <a href="https://www.xecreators.pk" target="_blank">Visit Our Website <span class="screen-reader-text">(opens in a new tab)</span><span aria-hidden="true" class="dashicons dashicons-external"></span></a> |

    <a href="https://www.messenger.com/t/XeCreators" target="_blank">Live Chat <span class="screen-reader-text">(opens in a new tab)</span><span aria-hidden="true" class="dashicons dashicons-external"></span></a> 
  </p>
  <?php

}

/**
 * Remove menu pages.
 */
// function _xe_remove_menu_pages() {
// }
// add_action('admin_menu', '_xe_remove_menu_pages');

/**
 * Add menu pages.
 */
// function _xe_add_menu_pages() {
// }
// add_action('admin_menu', '_xe_add_menu_pages');
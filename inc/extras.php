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
function _xe_excerpt_more( $more ) {

	$more = '... ';
    $more .= sprintf( '<a class="read-more" href="%1$s">%2$s</a>', get_permalink( get_the_ID() ), __( '(more)', '_xe' ) );

    return $more;

}
add_filter( 'excerpt_more', '_xe_excerpt_more' );

/**
 * Search Button Text
 */
function _xe_search_form_text($text) {

    $text = str_replace('value="Search"', 'value=""', $text);
    return $text;

}
add_filter('get_search_form', '_xe_search_form_text');

/**
 * WooCommerce
 */
if ( class_exists('WooCommerce') ) {

    /**
     * Search Button Text
     */
    function xurais_woo_search_form( $form ) {
        
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
    add_filter( 'get_product_search_form' , 'xurais_woo_search_form' );

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
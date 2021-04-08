<?php
/**
 * WooCommerce extra functions.
 *
 * @package _xe
 */

if ( class_exists('WooCommerce') ) {

  /**
   * Search Button Text
   */
  function _xe_woo_search_form($form) {
      
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
  add_filter('get_product_search_form' , '_xe_woo_search_form');

  /**
   * Remove breadcrumbs
   */
  remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

}
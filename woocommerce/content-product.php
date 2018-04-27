<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * Check for Product Functions: woocommerce/includes/abstracts/abstract-wc-product.php
 *
 * @var $product->get_image( $size = 'shop_thumbnail', $attr = array(), $placeholder = true ) [< Escape with wp_kses_post >]
 * @var $product->get_price_html() [< Escape with wp_kses_post >]
 * @var $product->add_to_cart_url()
 * @var $product->add_to_cart_text()
 * @var $product->get_id() [< Used inside "data-product_id" attribute >]
 * @var $product->get_sku() [< Used inside "data-product_sku" attribute >]
 * @var $product->get_type() [< Used inside "data-product-type" attribute >]
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $xe_opt, $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
} ?>

<div class="col-md-<?php echo esc_attr($xe_opt->shop['columns']); ?> col-xs-6 masonry <?php if (!is_product()) echo 'margin-bottom-30'; ?>">

	<article <?php post_class(); ?>>

		<?php
			/**
			 * woocommerce_before_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_open - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item' );

			/**
			 * woocommerce_before_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );

			/**
			 * woocommerce_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );

			/**
			 * woocommerce_after_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );

			/**
			 * woocommerce_after_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
		?>

	</article>

</div><!-- .col-md-## -->
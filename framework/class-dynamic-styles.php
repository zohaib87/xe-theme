<?php 
/**
 * Enqueue dynamic styles in theme <head> tags.
 *
 * @package _xe
 */

class Xe_DynamicStyles {

	function __construct() {

		add_action( 'wp_enqueue_scripts', array($this, 'enqueue_dynamic_styles'), 9999 );

	}

	/**
	 * Primary Color
	 */
	protected function primary_color() {

		global $xe_opt;

		$color = $xe_opt->primary_color;
		$rgb = $xe_opt->hex2rgb($color);
		$dark = $xe_opt->darken($color, 20);
		$light = $xe_opt->darken($color, -20);

		$css = "
		/* Widgets */
		.widget_recent_entries ul li a:hover,
		.widget_recent_comments ul li a:hover,
		.widget_archive ul li a:hover,
		.widget_categories ul li a:hover,
		.widget_meta ul li a:hover,
		.widget_pages ul li a:hover,
		.widget_nav_menu ul li a:hover,
		.widget_product_categories ul li a:hover {
			color: ".esc_attr($color).";
		}
		.xe-categories li a:before,
		.xe-archives li a:before {
		    content: \"\\f0da\";
		    position: absolute;
		    left: 0px;
		    font-size: 14px;
		    color: ".esc_attr($color).";
		    font-family: 'FontAwesome';
		}
		.xe-categories li a:hover,
		.xe-archives li a:hover {
		    color: ".esc_attr($color).";
		}
		.xe-categories li a:hover span {
		    color: #fff;
		    background: ".esc_attr($color).";
		}

		/* Tag Cloud */
		.widget_tag_cloud .tagcloud a:hover,
		.widget_product_tag_cloud .tagcloud a:hover {
			color: #fff;
		    background: ".esc_attr($color).";
		    border: 1px solid ".esc_attr($color).";
		}

		/* CF7 */
		.wpcf7 input[type=\"submit\"] {
			background: ".esc_attr($color).";
		}
		.wpcf7 input[type=\"submit\"]:hover {
			border-color: ".esc_attr($dark).";
			background-color: ".esc_attr($dark).";
		}
		
		/* Submit */
		.woocommerce #respond input#submit,
		.comment-form input[type=submit], 
		.post-password-form input[type=submit] {
			color: #fff;
			background-color: ".esc_attr($color).";
			border: none;
			padding: 12px 50px;
		}
		.woocommerce #respond input#submit:hover,
		.comment-form input[type=submit]:hover, 
		.single-post article input[type=submit]:hover {
			color: #fff;
			background-color: ".esc_attr($dark).";
		}
		
		/* Pagination */
		.paging-navigation ul li a:hover,
		.paging-navigation ul li a:active,
		.paging-navigation ul li span.current {
		  background-color: ".esc_attr($color).";
		}
		
		/* WooCommerce */
		.woocommerce #respond input#submit.alt, 
		.woocommerce a.button.alt, 
		.woocommerce button.button.alt, 
		.woocommerce input.button.alt {
			background-color: ".esc_attr($color).";
		}
		.woocommerce #respond input#submit.alt:hover, 
		.woocommerce a.button.alt:hover, 
		.woocommerce button.button.alt:hover, 
		.woocommerce input.button.alt:hover {
			background-color: ".esc_attr($dark).";
		}
		.woocommerce-form-login input.button,
		.woocommerce .register input.button,
		.woocommerce .woocommerce-MyAccount-content input.button,
		.woocommerce .woocommerce-address-fields input.button,
		.woocommerce button.button {
			color: #fff;
			background-color: ".esc_attr($color).";
		}
		.woocommerce-form-login input.button:hover,
		.woocommerce .register input.button:hover,
		.woocommerce .woocommerce-MyAccount-content input.button:hover,
		.woocommerce .woocommerce-address-fields input.button:hover,
		.woocommerce button.button:hover {
			color: #fff;
			background-color: ".esc_attr($dark).";
		}
		";

		return $css;

	}

	/**
	 * Tool-Bar
	 */
	protected function tool_bar() {

		global $xe_opt;

		$css = '';

		if ( !empty($xe_opt->tool_bar['bg-color']) ) {
			$css .= "
			".wp_strip_all_tags($xe_opt->selectors['tool-bar-bg-color'])." {
				".esc_attr($xe_opt->tool_bar['bg-color'])."
			}
			";
		}

		return $css;

	}

	/**
	 * Header
	 */
	protected function header() {

		global $xe_opt;

		$css = '';

		if ( !empty($xe_opt->header['padding']) ) {
			$css .= "
			@media (min-width: 768px) {
				".wp_strip_all_tags($xe_opt->selectors['header-padding'])." {
					padding-top: ".esc_attr($xe_opt->header['padding'])."px;
					padding-bottom: ".esc_attr($xe_opt->header['padding'])."px;
				}
			}
			";
		}

		if ( !empty($xe_opt->header['bg-color']) ) {
			$css .= "
			".wp_strip_all_tags($xe_opt->selectors['header-bg-color'])." {
				".esc_attr($xe_opt->header['bg-color']).";
			}
			";
		}
		if ( !empty($xe_opt->header['link-color']) ) {
			$css .= "
			".wp_strip_all_tags($xe_opt->selectors['header-link-color'])." {
				".esc_attr($xe_opt->header['link-color']).";
			}
			";
		}
		if ( !empty($xe_opt->header['link-hover-color']) ) {
			$css .= "
			".wp_strip_all_tags($xe_opt->selectors['header-link-hover-color'])." {
				".esc_attr($xe_opt->header['link-hover-color']).";
			}
			";
		}

		if ( !empty($xe_opt->header['dropdown-bg-color']) ) {
			$css .= "
			".wp_strip_all_tags($xe_opt->selectors['header-dropdown-bg-color'])." {
				".esc_attr($xe_opt->header['dropdown-bg-color']).";
			}
			";
		}
		if ( !empty($xe_opt->header['dropdown-link-color']) ) {
			$css .= "
			".wp_strip_all_tags($xe_opt->selectors['header-dropdown-link-color'])." {
				".esc_attr($xe_opt->header['dropdown-link-color']).";
			}
			";
		}
		if ( !empty($xe_opt->header['dropdown-link-hover-color']) ) {
			$css .= "
			".wp_strip_all_tags($xe_opt->selectors['header-dropdown-link-hover-color'])." {
				".esc_attr($xe_opt->header['dropdown-link-hover-color']).";
			}
			";
		}

		if ( !empty($xe_opt->header['squeezed-padding']) ) {
			$css .= "
			@media (min-width: 768px) {
				".wp_strip_all_tags($xe_opt->selectors['squeezed-header-padding'])." {
					padding-top: ".esc_attr($xe_opt->header['squeezed-padding'])."px;
					padding-bottom: ".esc_attr($xe_opt->header['squeezed-padding'])."px;
				}
			}
			";
		}

		return $css;
		
	}

	/**
	 * Title-Bar
	 */
	protected function title_bar() {

		global $xe_opt;

		$styles = $xe_opt->title_bar['bg-color'];
		$styles .= $xe_opt->title_bar['bg-image'];
		$styles .= $xe_opt->title_bar['bg-repeat'];
		$styles .= $xe_opt->title_bar['bg-size'];
		$styles .= $xe_opt->title_bar['bg-attachment'];
		$styles .= $xe_opt->title_bar['bg-position'];
		$css = '';

		if ( !empty($xe_opt->title_bar['height']) ) {
			$css .= "
			".wp_strip_all_tags($xe_opt->selectors['title-bar-height'])." {
				min-height: ".esc_attr($xe_opt->title_bar['height'])."px;
			}
			";
		}

		if ( !empty($styles) ) {
			$css .= "
			".wp_strip_all_tags($xe_opt->selectors['title-bar-bg'])." {
				".esc_attr($styles)."
			}
			";
		}

		if ( !empty($xe_opt->title_bar['bg-overlay']) ) {
			$css .= "
			".wp_strip_all_tags($xe_opt->selectors['title-bar-overlay'])." {
				".esc_attr($xe_opt->title_bar['bg-overlay'])."
			}
			";
		}

		if ( !empty($xe_opt->title_bar['title-color']) ) {
			$css .= "
			".wp_strip_all_tags($xe_opt->selectors['title'])." {
				color: ".esc_attr($xe_opt->title_bar['title-color'])." !important;
			}
			";
		}

		if ( !empty($xe_opt->title_bar['subtitle-color']) ) {
			$css .= "
			".wp_strip_all_tags($xe_opt->selectors['subtitle'])." {
				color: ".esc_attr($xe_opt->title_bar['subtitle-color'])." !important;
			}
			";
		}

		return $css;
		
	}

	/**
	 * Content
	 */
	protected function content() {

		global $xe_opt;

		if ( !empty($xe_opt->bg_color) ) {
			$css = "
			".wp_strip_all_tags($xe_opt->selectors['bg-color'])." {
				".esc_attr($xe_opt->bg_color)."
			}
			";
		} else {
			$css = '';
		}

		return $css;

	}

	/**
	 * Boxed Layout
	 */
	protected function boxed_layout() {

		global $xe_opt;

		if ( isset($xe_opt->site_layout) && $xe_opt->site_layout == 'boxed') {
			$css = "
			.bg {
				background-color: ".esc_attr($xe_opt->bg['color']).";
				background-image: url(".esc_url($xe_opt->bg['image']).");
				background-repeat: ".esc_attr($xe_opt->bg['repeat']).";
				background-size: ".esc_attr($xe_opt->bg['size']).";
				background-attachment: ".esc_attr($xe_opt->bg['attachment']).";
				background-position: ".esc_attr($xe_opt->bg['position']).";
			}
			.boxed {
				background: white;
			}
			@media (min-width: 768px) {
				.boxed {
				    max-width: 750px;
				    margin: ".esc_attr($xe_opt->boxed_layout_margin)."px auto;
				}
			}
			@media (min-width: 992px) {
				.boxed {
				    max-width: 970px;
				    margin: ".esc_attr($xe_opt->boxed_layout_margin)."px auto;
				}
			}
			@media (min-width: 1200px) {
				.boxed {
				    max-width: ".esc_attr($xe_opt->main_grid_width)."px;
				    margin: ".esc_attr($xe_opt->boxed_layout_margin)."px auto;
				}
			}
			";
		} else {
			$css = '';
		}

		return $css;

	}

	/**
	 * Main grid width
	 */
	protected function main_grid_width() {

		global $xe_opt;

		if ($xe_opt->main_grid_width != '1170') {
			$css = "@media (min-width: 1200px) {
				.container {
				    width: ".esc_attr($xe_opt->main_grid_width)."px;
				}
			}";
		} else {
			$css = '';
		}

		return $css;

	}

	/**
	 * Content width
	 */
	protected function content_width() {

		global $xe_opt;
		
		$left_sidebar_width = $xe_opt->left_sidebar_width;
		$right_sidebar_width = $xe_opt->right_sidebar_width;
		$content_width = 100 - ($left_sidebar_width + $right_sidebar_width);
		$left_sidebar_margin = $content_width + $right_sidebar_width;
		$sidebar = $xe_opt->sidebar();

		$left_sidebar = ".content-area {
			float: right;
			margin: 0 0 0 -".esc_attr($left_sidebar_width)."%;
			width: 100%;
		}
		.site-main {
			margin: 0 0 0 ".esc_attr($left_sidebar_width)."%;
		}
		.site-content .widget-area {
			float: left;
			overflow: hidden;
			width: ".esc_attr($left_sidebar_width)."%;
		}
		.site-footer {
			clear: both;
			width: 100%;
		}
		@media (min-width: 992px) {
			.content-area {
				padding-left: 30px;
			}
		}";

		$right_sidebar = ".content-area {
			float: left;
			margin: 0 -".esc_attr($right_sidebar_width)."% 0 0;
			width: 100%;
		}
		.site-main {
			margin: 0 ".esc_attr($right_sidebar_width)."% 0 0;
		}
		.site-content .widget-area {
			float: right;
			overflow: hidden;
			width: ".esc_attr($right_sidebar_width)."%;
		}
		.site-footer {
			clear: both;
			width: 100%;
		}
		@media (min-width: 992px) {
			.content-area {
				padding-right: 30px;
			}
		}";

		$both_sidebars = ".content-area {
			float: left;
			margin: 0 0 0 ".esc_attr($left_sidebar_width)."%;
			width: ".esc_attr($content_width)."%;
		}
		.site-content .widget-area.left {
			float: left;
			margin: 0 0 0 -".esc_attr($left_sidebar_margin)."%;
			overflow: hidden;
			width: ".esc_attr($left_sidebar_width)."%;
		}
		.site-content .widget-area.right {
			float: right;
			overflow: hidden;
			width: ".esc_attr($right_sidebar_width)."%;
		}
		.site-footer {
			clear: both;
			width: 100%;
		}
		@media (min-width: 992px) {
			.content-area {
				padding-left: 30px;
				padding-right: 30px;
			}
		}";

		$media_query = "@media (max-width: 991px) {
			.content-area {
				float: none;
				overflow: hidden;
				width: 100%;
				margin: 0px;
			}
			.site-main {
				margin: 0px;
			}
			.site-content .widget-area.left,
			.site-content .widget-area.right {
				float: none;
				margin: 30px 0 0;
				overflow: hidden;
				width: 100%;
			}
		}";

		if ($sidebar['position'] == 'left') {

			return $left_sidebar . $media_query;

		} elseif ($sidebar['position'] == 'right') {
			
			return $right_sidebar . $media_query;

		} elseif ($sidebar['position'] == 'both') {
			
			return $both_sidebars . $media_query;

		}

	}

	/**
	 * Text selection
	 */
	protected function text_selection() {

		global $xe_opt;

		$color = $xe_opt->txt_selection_color;
		$bg_color = $xe_opt->txt_selection_bg_color;

		$css = "::-moz-selection {
			color: ".esc_attr($color).";
			background-color: ".esc_attr($bg_color).";
		}";
		$css .= "::selection {
			color: ".esc_attr($color).";
			background-color: ".esc_attr($bg_color).";
		}";

		return $css;

	}

	/**
	 * Padding top and bottom
	 */
	protected function padding_top_bottom() {

		global $xe_opt;
		
		$padding_top = $xe_opt->padding_top;
		$padding_bottom = $xe_opt->padding_bottom;

		$css = "
		.padding-top-bottom {
		    padding-top: ".esc_attr($padding_top)."px;
		    padding-bottom: ".esc_attr($padding_bottom)."px;
		}
		";

		return $css;

	}

	/**
	 * Headings font size
	 */
	protected function headings_font() {

		global $xe_opt;

		$h1 = $xe_opt->headings['h1'];
		$h2 = $xe_opt->headings['h2'];
		$h3 = $xe_opt->headings['h3'];
		$h4 = $xe_opt->headings['h4'];
		$h5 = $xe_opt->headings['h5'];
		$h6 = $xe_opt->headings['h6'];
		$css = '';

		if ( !empty($h1) ) {
			$css = "
			h1, .h1 {
				font-size: ".esc_attr($h1)."px;
			}
			";
		}
		if ( !empty($h2) ) {
			$css .= "
			h2, .h2 {
				font-size: ".esc_attr($h2)."px;
			}
			";
		}
		if ( !empty($h3) ) {
			$css .= "
			h3, .h3 {
				font-size: ".esc_attr($h3)."px;
			}
			";
		}
		if ( !empty($h4) ) {
			$css .= "
			h4, .h4 {
				font-size: ".esc_attr($h4)."px;
			}
			";
		}
		if ( !empty($h5) ) {
			$css .= "
			h5, .h5 {
				font-size: ".esc_attr($h5)."px;
			}
			";
		}
		if ( !empty($h6) ) {
			$css .= "
			h6, .h6 {
				font-size: ".esc_attr($h6)."px;
			}
			";
		}

		return $css;

	}

	/**
	 * Footer
	 */
	protected function footer() {

		global $xe_opt;

		$css = '';

		if ( !empty($xe_opt->footer['bg-color']) ) {
			$css .= "
			".wp_strip_all_tags($xe_opt->selectors['footer-bg-color'])." {
				".esc_attr($xe_opt->footer['bg-color'])."
			}
			";
		}
		if ( !empty($xe_opt->footer['border-top-color']) ) {
			$css .= "
			".wp_strip_all_tags($xe_opt->selectors['footer-border-top-color'])." {
				".esc_attr($xe_opt->footer['border-top-color'])."
			}
			";
		}
		if ( !empty($xe_opt->footer['text-color']) ) {
			$css .= "
			".wp_strip_all_tags($xe_opt->selectors['footer-text-color'])." {
				".esc_attr($xe_opt->footer['text-color'])."
			}
			";
		}

		return $css;
		
	}

	/**
	 * Push header down if admin-bar is showing
	 */
	protected function admin_bar() {

		if ( is_admin_bar_showing() ) {

			$css = "@media (min-width: 783px) {
				body {
					padding-top: 32px;
				}
			}
			@media (max-width: 782px) {
				body {
					padding-top: 46px;
				}
			}";

		} else {

			$css = '';

		}

		return $css;

	}

	public function enqueue_dynamic_styles() {

		global $xe_opt;

		$custom_css = $this->text_selection();
		$custom_css .= $this->main_grid_width();
		$custom_css .= $this->content_width();
		$custom_css .= $this->boxed_layout();
		$custom_css .= $this->padding_top_bottom();
		$custom_css .= $this->tool_bar();
		$custom_css .= $this->header();
		$custom_css .= $this->title_bar();
		$custom_css .= $this->content();
		$custom_css .= $this->headings_font();
		$custom_css .= $this->footer();
		$custom_css .= $this->admin_bar();
		$custom_css .= $this->primary_color();

		// Enqueue Styles
		wp_enqueue_style( '_xe-custom', get_template_directory_uri() . '/css/custom.css' );
		if ( !empty($custom_css) ) {
			wp_add_inline_style( '_xe-custom', $xe_opt->minify_css($custom_css) );
		}

	}


}
new Xe_DynamicStyles();
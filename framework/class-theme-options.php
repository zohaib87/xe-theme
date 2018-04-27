<?php 
/**
 * Class to get and use Redux and ACF Pro options.
 *
 * @package _xe
 */

class Xe_ThemeOptions extends Xe_ThemeSettings {

	public $xe_options,

	// General
	$site_layout,
	$boxed_layout_bg, $boxed_layout_class, $bg,
	$container,
	$preloader,
	$current_menu,
	$primary_color,

	// Typography
	$headings,

	// Tool Bar
	$tool_bar,

	// Header
	$header,
	$dropdown,
	$logo,

	// Title-Bar
	$title_bar,

	// Content
	$bg_color,
	$slider,
	$padding_top, $padding_bottom,
	$left_sidebar_width, $right_sidebar_width,
	$acf_sidebar_position, $acf_left_sidebar_selector, $acf_right_sidebar_selector,
	$rdx_sidebar_position, $rdx_left_sidebar_selector, $rdx_right_sidebar_selector,
	
	// Footer
	$footer,

	// Blog, Post, Page, Portfolio, Events, WooCommerce, Search and Error 404
	$blog,
	$comments,
	$excerpt_length,
	$portfolio,
	$event,
	$shop,
	$img_404,

	// Social Profiles
	$social;

	function __construct() {

		$this->xe_options = get_option('xe_options');

		// Assign Redux and ACF Pro values to variables
		add_action( 'wp', array($this, 'init_vars') );

		// Add site favicon
		if ( has_site_icon() ) {
			// do nothing
		} else {
			add_action('wp_head', array($this, 'add_favicon'), 2);
		}

		// Add custom fields to menu
		add_filter('wp_nav_menu_objects', array($this, 'menu_items'), 10, 2);

	}

	public function init_vars() {

		$product = ( function_exists('is_product') && is_product() ) ? true : false;
		$single = ( is_single() || is_page() || is_singular('xe-portfolio') || is_singular('xe-events') || $product ) ? '1' : '0';

		/**
		 * General
		 */
		if ( function_exists('get_field') && $single == true ) {
			$this->site_layout = get_field('site_layout');
			$this->main_grid_width = get_field('main_grid_width');
			$this->left_sidebar_width = get_field('left_sidebar_width');
			$this->right_sidebar_width = get_field('right_sidebar_width');
			$this->boxed_layout_margin = get_field('boxed_layout_margin');
			$this->bg['color'] = get_field('boxed_layout_bg_color');
			$this->bg['repeat'] = get_field('boxed_layout_bg_repeat');
			$this->bg['size'] = get_field('boxed_layout_bg_size');
			$this->bg['attachment'] = get_field('boxed_layout_bg_attachment');
			$this->bg['position'] = get_field('boxed_layout_bg_position');
			$this->bg['image'] = get_field('boxed_layout_bg_image');
			$this->primary_color = get_field('primary_color');
			$this->txt_selection_color = get_field('text_selection_color');
			$this->txt_selection_bg_color = get_field('text_selection_bg_color');
		} else { 
			$this->site_layout = '';
			$this->main_grid_width = '';
			$this->left_sidebar_width = '';
			$this->right_sidebar_width = '';
			$this->boxed_layout_margin = '';
			$this->bg['color'] = '';
			$this->bg['repeat'] = '';
			$this->bg['size'] = '';
			$this->bg['attachment'] = '';
			$this->bg['position'] = '';
			$this->bg['image'] = '';
			$this->primary_color = '';
			$this->txt_selection_color = '';
			$this->txt_selection_bg_color = '';
		}

		if ($this->site_layout == 'default' || $this->site_layout == '') {

			$this->site_layout = ( isset($this->xe_options['site_layout']) && !empty($this->xe_options['site_layout']) ) ? $this->xe_options['site_layout'] : 'wide';

		}

		$this->container = ($this->site_layout == 'full-width') ? 'container-fluid' : 'container';

		$this->boxed_layout_class = ($this->site_layout == 'boxed') ? 'bg' : '';

		if ($this->main_grid_width == 'default' || $this->main_grid_width == '') {

			$this->main_grid_width = ( isset($this->xe_options['main_grid_width']) && !empty($this->xe_options['main_grid_width']) ) ? $this->xe_options['main_grid_width'] : '1170';

		}

		if ($this->left_sidebar_width == 'default' || $this->left_sidebar_width == '') {

			$this->left_sidebar_width = ( isset($this->xe_options['left_sidebar_width']) && !empty($this->xe_options['left_sidebar_width']) ) ? $this->xe_options['left_sidebar_width'] : '30';

		}

		if ($this->right_sidebar_width = 'default' || $this->right_sidebar_width == '') {

			$this->right_sidebar_width = ( isset($this->xe_options['right_sidebar_width']) && !empty($this->xe_options['right_sidebar_width']) ) ? $this->xe_options['right_sidebar_width'] : '30';

		}

		if ($this->boxed_layout_margin == 'default' || $this->boxed_layout_margin == '') {

			$this->boxed_layout_margin = ( isset($this->xe_options['boxed_layout_margin']) && !empty($this->xe_options['boxed_layout_margin']) ) ? $this->xe_options['boxed_layout_margin'] : '50';

		}

		$this->boxed_layout_bg = ( isset($this->xe_options['boxed_layout_bg']) && !empty($this->xe_options['boxed_layout_bg']) ) ? $this->xe_options['boxed_layout_bg'] : null;

		if ($this->bg['color'] == 'default' || $this->bg['color'] == '') {

			$this->bg['color'] = ( isset($this->boxed_layout_bg['background-color']) && !empty($this->boxed_layout_bg['background-color']) ) ? $this->boxed_layout_bg['background-color'] : '#e3e3e3';

		}

		if ($this->bg['image'] == 'default' || $this->bg['image'] == '') {

			$this->bg['image'] = ( isset($this->boxed_layout_bg['background-image']) && !empty($this->boxed_layout_bg['background-image']) ) ? $this->boxed_layout_bg['background-image'] : get_template_directory_uri() . '/img/bg.jpg';

		}

		if ($this->bg['repeat'] == 'default' || $this->bg['repeat'] == '') {

			$this->bg['repeat'] = ( isset($this->boxed_layout_bg['background-repeat']) && !empty($this->boxed_layout_bg['background-repeat']) ) ? $this->boxed_layout_bg['background-repeat'] : 'no-repeat';

		}

		if ($this->bg['size'] == 'default' || $this->bg['size'] == '') {

			$this->bg['size'] = ( isset($this->boxed_layout_bg['background-size']) && !empty($this->boxed_layout_bg['background-size']) ) ? $this->boxed_layout_bg['background-size'] : 'cover';

		}

		if ($this->bg['attachment'] == 'default' || $this->bg['attachment'] == '') {

			$this->bg['attachment'] = ( isset($this->boxed_layout_bg['background-attachment']) && !empty($this->boxed_layout_bg['background-attachment']) ) ? $this->boxed_layout_bg['background-attachment'] : 'fixed';

		}

		if ($this->bg['position'] == 'default' || $this->bg['position'] == '') {

			$this->bg['position'] = ( isset($this->boxed_layout_bg['background-position']) && !empty($this->boxed_layout_bg['background-position']) ) ? $this->boxed_layout_bg['background-position'] : 'center center';

		}

		if ($this->primary_color == 'default' || $this->primary_color == '') {

			$this->primary_color = ( isset($this->xe_options['primary_color']) && !empty($this->xe_options['primary_color']) ) ? $this->xe_options['primary_color'] : $this->defaults['primary-color'];

		}

		if ($this->txt_selection_color == 'default' || $this->txt_selection_color == '') {

			$this->txt_selection_color = ( isset($this->xe_options['text_selection_color']) && !empty($this->xe_options['text_selection_color']) ) ? $this->xe_options['text_selection_color'] : '#fff';

		}

		if ($this->txt_selection_bg_color == 'default' || $this->txt_selection_bg_color == '') {

			$this->txt_selection_bg_color = ( isset($this->xe_options['text_selection_bg_color']) && !empty($this->xe_options['text_selection_bg_color']) ) ? $this->xe_options['text_selection_bg_color'] : '#338fff';

		}

		$this->preloader = ( isset($this->xe_options['preloader']) && !empty($this->xe_options['preloader']) ) ? $this->xe_options['preloader'] : false;

		/**
		 * Typography
		 */
		$this->headings['h1'] = ( isset($this->xe_options['h1_size']) && !empty($this->xe_options['h1_size']) ) ? $this->xe_options['h1_size'] : '';
		$this->headings['h2'] = ( isset($this->xe_options['h2_size']) && !empty($this->xe_options['h2_size']) ) ? $this->xe_options['h2_size'] : '';
		$this->headings['h3'] = ( isset($this->xe_options['h3_size']) && !empty($this->xe_options['h3_size']) ) ? $this->xe_options['h3_size'] : '';
		$this->headings['h4'] = ( isset($this->xe_options['h4_size']) && !empty($this->xe_options['h4_size']) ) ? $this->xe_options['h4_size'] : '';
		$this->headings['h5'] = ( isset($this->xe_options['h5_size']) && !empty($this->xe_options['h5_size']) ) ? $this->xe_options['h5_size'] : '';
		$this->headings['h6'] = ( isset($this->xe_options['h6_size']) && !empty($this->xe_options['h6_size']) ) ? $this->xe_options['h6_size'] : '';

		/**
		 * Tool-Bar
		 */
		if ( function_exists('get_field') && $single == true ) {
			$this->tool_bar['switch'] = get_field('tool_bar');
			$this->tool_bar['bg-color'] = get_field('tool_bar_bg_color');
			$this->tool_bar['menu'] = get_field('tool_bar_menu');
			$this->tool_bar['social-icons'] = get_field('tool_bar_social_icons');
			$this->tool_bar['font-icons'] = get_field('tool_bar_font_icons');

			if ($this->tool_bar['font-icons'] == 'fontawesome') {
				$this->tool_bar['phone-icon'] = get_field('tool_bar_phone_fontawesome');
				$this->tool_bar['email-icon'] = get_field('tool_bar_email_fontawesome');
			} elseif ($this->tool_bar['font-icons'] == 'ionicons') {
				$this->tool_bar['phone-icon'] = get_field('tool_bar_phone_ionicons');
				$this->tool_bar['email-icon'] = get_field('tool_bar_email_ionicons');
			}

			$this->tool_bar['phone'] = get_field('tool_bar_phone');
			$this->tool_bar['email'] = get_field('tool_bar_email');
		} else {
			$this->tool_bar['switch'] = '';
			$this->tool_bar['bg-color'] = '';
			$this->tool_bar['menu'] = '';
			$this->tool_bar['social-icons'] = '';
			$this->tool_bar['font-icons'] = '';
			$this->tool_bar['phone-icon'] = '';
			$this->tool_bar['email-icon'] = '';
			$this->tool_bar['phone'] = '';
			$this->tool_bar['email'] = '';
		}

		$this->tool_bar['bg-color'] = ( !empty($this->tool_bar['bg-color']) ) ? 'background-color:' . $this->tool_bar['bg-color'] . '!important;' : '';

		if ($this->tool_bar['menu'] == 'default' || $this->tool_bar['menu'] == '') {

			$this->tool_bar['menu'] = ( isset($this->xe_options['tool_bar_menu']) && !empty($this->xe_options['tool_bar_menu']) ) ? $this->xe_options['tool_bar_menu'] : 'second-menu';

		}

		if ($this->tool_bar['social-icons'] == 'default' || $this->tool_bar['social-icons'] == '') {

			$this->tool_bar['social-icons'] = ( isset($this->xe_options['tool_bar_social_icons']) && !empty($this->xe_options['tool_bar_social_icons']) ) ? $this->xe_options['tool_bar_social_icons'] : true;

		}

		if ($this->tool_bar['font-icons'] == 'default' || $this->tool_bar['font-icons'] == '') :

			if ( isset($this->xe_options['tool_bar_font_icons']) && $this->xe_options['tool_bar_font_icons'] == 'fontawesome' ) {

				$this->tool_bar['phone-icon'] = ( isset($this->xe_options['tool_bar_phone_fontawesome']) && !empty($this->xe_options['tool_bar_phone_fontawesome']) ) ? 'fa ' . $this->xe_options['tool_bar_phone_fontawesome'] : 'fa fa-phone';

				$this->tool_bar['email-icon'] = ( isset($this->xe_options['tool_bar_email_fontawesome']) && !empty($this->xe_options['tool_bar_email_fontawesome']) ) ? 'fa ' . $this->xe_options['tool_bar_email_fontawesome'] : 'fa fa-envelope-o';

			} elseif ( isset($this->xe_options['tool_bar_font_icons']) && $this->xe_options['tool_bar_font_icons'] == 'ionicons' ) {

				$this->tool_bar['phone-icon'] = ( isset($this->xe_options['tool_bar_phone_ionicons']) && !empty($this->xe_options['tool_bar_phone_ionicons']) ) ? $this->xe_options['tool_bar_phone_ionicons'] : 'ion-android-call';

				$this->tool_bar['email-icon'] = ( isset($this->xe_options['tool_bar_email_ionicons']) && !empty($this->xe_options['tool_bar_email_ionicons']) ) ? $this->xe_options['tool_bar_email_ionicons'] : 'ion-android-mail';

			}

		endif;

		if ($this->tool_bar['phone'] == 'default' || $this->tool_bar['phone'] == '') {

			$this->tool_bar['phone'] = ( isset($this->xe_options['tool_bar_phone']) && !empty($this->xe_options['tool_bar_phone']) ) ? $this->xe_options['tool_bar_phone'] : '+1 123 456 7890';

		}

		if ($this->tool_bar['email'] == 'default' || $this->tool_bar['email'] == '') {

			$this->tool_bar['email'] = ( isset($this->xe_options['tool_bar_email']) && !empty($this->xe_options['tool_bar_email']) ) ? $this->xe_options['tool_bar_email'] : 'info@domain.com';

		}

		/**
		 * Header
		 */
		if ( function_exists('get_field') && $single == true ) {
			$this->header['style'] = get_field('header_style');
			$this->header['padding'] = get_field('header_padding');
			$this->header['location'] = get_field('header_location');
			$this->header['menu'] = get_field('header_menu');
			$this->dropdown['data-in'] = get_field('header_data_in');
			$this->dropdown['data-out'] = get_field('header_data_out');
			$this->header['bg-color'] = get_field('header_bg_color');
			$this->header['link-color'] = get_field('header_link_color');
			$this->header['link-hover-color'] = get_field('header_link_hover_color');
			$this->header['dropdown-bg-color'] = get_field('header_dropdown_bg_color');
			$this->header['dropdown-link-color'] = get_field('header_dropdown_link_color');
			$this->header['dropdown-link-hover-color'] = get_field('header_dropdown_link_hover_color');
			$this->logo['dark'] = get_field('logo');
			$this->logo['light'] = get_field('light_logo');
			$this->logo['dark-retina'] = get_field('retina_logo');
			$this->logo['light-retina'] = get_field('light_retina_logo');
			$this->header['transparent'] = get_field('transparent_header');
			$this->header['sticky'] = get_field('sticky_header');
			$this->header['squeezed'] = get_field('squeezed_header');
			$this->header['squeezed-padding'] = get_field('squeezed_header_padding');
			$this->header['search'] = get_field('search_form');
			$this->header['social-icons'] = get_field('header_social_icons');
		} else {
			$this->header['style'] = '';
			$this->header['padding'] = '';
			$this->header['location'] = '';
			$this->header['menu'] = '';
			$this->dropdown['data-in'] = '';
			$this->dropdown['data-out'] = '';
			$this->logo['dark'] = '';
			$this->logo['light'] = '';
			$this->logo['dark-retina'] = '';
			$this->logo['light-retina'] = '';
			$this->header['transparent'] = '';
			$this->header['sticky'] = '';
			$this->header['squeezed'] = '';
			$this->header['squeezed-padding'] = '';
			$this->header['search'] = '';
			$this->header['social-icons'] = '';
		}

		if ($this->dropdown['data-in'] == 'default' || $this->dropdown['data-in'] == '') {

			$this->dropdown['data-in'] = ( isset($this->xe_options['header_data_in']) && !empty($this->xe_options['header_data_in']) ) ? $this->xe_options['header_data_in'] : 'fadeIn';

		}

		if ($this->dropdown['data-out'] == 'default' || $this->dropdown['data-out'] == '') {

			$this->dropdown['data-out'] = ( isset($this->xe_options['header_data_out']) && !empty($this->xe_options['header_data_out']) ) ? $this->xe_options['header_data_out'] : 'fadeOut';

		}

		if ($this->header['padding'] == 'default' || $this->header['padding'] == '') {

			$this->header['padding'] = ( isset($this->xe_options['header_padding']) && !empty($this->xe_options['header_padding']) ) ? $this->xe_options['header_padding'] : '';

		}

		$this->header['bg-color'] = ( !empty($this->header['bg-color']) ) ? 'background-color:' . $this->header['bg-color'] . ' !important;' : '';

		$this->header['link-color'] = ( !empty($this->header['link-color']) ) ? 'background-color:' . $this->header['link-color'] . ' !important;' : '';
		
		$this->header['link-hover-color'] = ( !empty($this->header['link-hover-color']) ) ? 'background-color:' . $this->header['link-hover-color'] . ' !important;' : '';

		$this->header['dropdown-bg-color'] = ( !empty($this->header['dropdown-bg-color']) ) ? 'background-color:' . $this->header['dropdown-bg-color'] . ' !important;' : '';

		$this->header['dropdown-link-color'] = ( !empty($this->header['dropdown-link-color']) ) ? 'background-color:' . $this->header['dropdown-link-color'] . ' !important;' : '';

		$this->header['dropdown-link-hover-color'] = ( !empty($this->header['dropdown-link-hover-color']) ) ? 'background-color:' . $this->header['dropdown-link-hover-color'] . ' !important;' : '';

		if ($this->logo['dark'] == 'default' || $this->logo['dark'] == '') {

			$this->logo['dark'] = ( isset($this->xe_options['logo']) && !empty($this->xe_options['logo']['url']) ) ? $this->xe_options['logo']['url'] : get_template_directory_uri() . '/img/logo.png';

		}

		if ($this->logo['light'] == 'default' || $this->logo['light'] == '') {

			$this->logo['light'] = ( isset($this->xe_options['light_logo']['url']) && !empty($this->xe_options['light_logo']['url']) ) ? $this->xe_options['light_logo']['url'] : get_template_directory_uri() . '/img/light-logo.png';

		}

		if ($this->logo['dark-retina'] == 'default' || $this->logo['dark-retina'] == '') {

			$this->logo['dark-retina'] = ( isset($this->xe_options['retina_logo']['url']) && !empty($this->xe_options['retina_logo']['url']) ) ? $this->xe_options['retina_logo']['url'] : get_template_directory_uri() . '/img/logo-2x.png';

		}

		if ($this->logo['light-retina'] == 'default' || $this->logo['light-retina'] == '') {

			$this->logo['light-retina'] = ( isset($this->xe_options['light_retina_logo']['url']) && !empty($this->xe_options['light_retina_logo']['url']) ) ? $this->xe_options['light_retina_logo']['url'] : get_template_directory_uri() . '/img/light-logo-2x.png';

		}

		if ($this->header['transparent'] == 'default' || $this->header['transparent'] == '') {

			$this->header['transparent'] = ( isset($this->xe_options['transparent_header']) ) ? $this->xe_options['transparent_header'] : false;

		}

		if ($this->header['sticky'] == 'default' || $this->header['sticky'] == '') {

			$this->header['sticky'] = ( isset($this->xe_options['sticky_header']) && !empty($this->xe_options['sticky_header']) ) ? $this->xe_options['sticky_header'] : false;

		}

		if ($this->header['squeezed'] == 'default' || $this->header['squeezed'] == '') {

			$this->header['squeezed'] = ( isset($this->xe_options['squeezed_header']) && !empty($this->xe_options['squeezed_header']) ) ? $this->xe_options['squeezed_header'] : false;

		}

		if ($this->header['squeezed-padding'] == 'default' || $this->header['squeezed-padding'] == '') {

			$this->header['squeezed-padding'] = ( isset($this->xe_options['squeezed_header_padding']) && !empty($this->xe_options['squeezed_header_padding']) ) ? $this->xe_options['squeezed_header_padding'] : '';

		}

		if ($this->header['search'] == 'default' || $this->header['search'] == '') {

			$this->header['search'] = ( isset($this->xe_options['search_form']) && !empty($this->xe_options['search_form']) ) ? $this->xe_options['search_form'] : false;

		}

		if ($this->header['social-icons'] == 'default' || $this->header['social-icons'] == '') {

			$this->header['social-icons'] = ( isset($this->xe_options['header_social_icons']) && !empty($this->xe_options['header_social_icons']) ) ? $this->xe_options['header_social_icons'] : false;

		}

		/**
		 * Title-Bar
		 */
		if ( function_exists('get_field') && $single == true ) {
			$this->title_bar['switch'] = get_field('title_bar');
			$this->title_bar['subtitle'] = get_field('subtitle');
			$this->title_bar['breadcrumb'] = get_field('breadcrumb');
			$this->title_bar['height'] = get_field('title_bar_height');
			$this->title_bar['title-color'] = get_field('title_color');
			$this->title_bar['subtitle-color'] = get_field('subtitle_color');
			$this->title_bar['bg-color'] = get_field('title_bar_bg_color');
			$this->title_bar['bg-repeat'] = get_field('title_bar_bg_repeat');
			$this->title_bar['bg-size'] = get_field('title_bar_bg_size');
			$this->title_bar['bg-attachment'] = get_field('title_bar_bg_attachment');
			$this->title_bar['bg-position'] = get_field('title_bar_bg_position');
			$this->title_bar['bg-image'] = get_field('title_bar_bg_image');
			$this->title_bar['bg-overlay'] = get_field('title_bar_bg_overlay');
		} else {
			$this->title_bar['switch'] = '';
			$this->title_bar['subtitle'] = '';
			$this->title_bar['breadcrumb'] = '';
			$this->title_bar['height'] = '';
			$this->title_bar['title-color'] = '';
			$this->title_bar['subtitle-color'] = '';
			$this->title_bar['bg-color'] = '';
			$this->title_bar['bg-repeat'] = '';
			$this->title_bar['bg-size'] = '';
			$this->title_bar['bg-attachment'] = '';
			$this->title_bar['bg-position'] = '';
			$this->title_bar['bg-image'] = '';
			$this->title_bar['bg-overlay'] = '';
		}

		$this->title_bar['title-color'] = ( !empty($this->title_bar['title-color']) ) ? $this->title_bar['title-color'] : '';

		$this->title_bar['subtitle-color'] = ( !empty($this->title_bar['subtitle-color']) ) ? $this->title_bar['subtitle-color'] : '';

		$this->title_bar['bg-color'] = ( !empty($this->title_bar['bg-color']) ) ? 'background-color:' . $this->title_bar['bg-color'] . ' !important;' : '';

		$this->title_bar['bg-repeat'] = ( $this->title_bar['bg-repeat'] != 'default' && !empty($this->title_bar['bg-repeat']) ) ? 'background-repeat:' . $this->title_bar['bg-repeat'] . ' !important;' : '';

		$this->title_bar['bg-size'] = ( $this->title_bar['bg-size'] != 'default' && !empty($this->title_bar['bg-size']) ) ? 'background-size:' . $this->title_bar['bg-size'] . ' !important;' : '';

		$this->title_bar['bg-attachment'] = ( $this->title_bar['bg-attachment'] != 'default' && !empty($this->title_bar['bg-attachment']) ) ? 'background-attachment:' . $this->title_bar['bg-attachment'] . ' !important;' : '';

		$this->title_bar['bg-position'] = ( $this->title_bar['bg-position'] != 'default' && !empty($this->title_bar['bg-position']) ) ? 'background-position:' . $this->title_bar['bg-position'] . ' !important;' : '';

		$this->title_bar['bg-image'] = ( $this->title_bar['bg-image'] != 'default' && !empty($this->title_bar['bg-image']) ) ? 'background-image: url(' . $this->title_bar['bg-image'] . ') !important;' : '';

		$this->title_bar['bg-overlay'] = ( !empty($this->title_bar['bg-overlay']) ) ? 'background-color:' . $this->title_bar['bg-overlay'] . ' !important;' : '';

		if ($this->title_bar['breadcrumb'] == 'default' || $this->title_bar['breadcrumb'] == '') {

			$this->title_bar['breadcrumb'] = ( isset($this->xe_options['breadcrumb']) ) ? $this->xe_options['breadcrumb'] : false;

		}

		/**
		 * Content
		 */
		if ( function_exists('get_field') && $single == true ) {
			$this->bg_color = get_field('bg_color');
			$this->slider['selector'] = get_field('slider');
			$this->padding_top = get_field('padding_top');
			$this->padding_bottom = get_field('padding_bottom');
			$this->acf_sidebar_position = get_field('sidebar_position');
			$this->acf_left_sidebar_selector = get_field('left_sidebar_selector');
			$this->acf_right_sidebar_selector = get_field('right_sidebar_selector');
		} else {
			$this->bg_color = '';
			$this->slider['selector'] = 'none';
			$this->padding_top = '';
			$this->padding_bottom = '';
			$this->acf_sidebar_position = '';
			$this->acf_left_sidebar_selector = '';
			$this->acf_right_sidebar_selector = '';
		}

		$this->bg_color = ( !empty($this->bg_color) ) ? 'background:' . $this->bg_color . ' !important;' : 'background: #fff;';

		$this->slider['revslider'] = ( $this->slider['selector'] == 'revslider' ) ? get_field('revslider') : 'none';
		$this->slider['layerslider'] = ( $this->slider['selector'] == 'layerslider' ) ? get_field('layerslider') : 'none';

		/**
		 * Footer
		 */
		if ( function_exists('get_field') && $single == true ) {
			$this->footer['section'] = get_field('footer_section');
			$this->footer['selector'] = get_field('footer_selector');
			$this->footer['bg-color'] = get_field('footer_bg_color');
			$this->footer['border-top-color'] = get_field('footer_border_top_color');
			$this->footer['text-color'] = get_field('footer_text_color');
			$this->footer['logo'] = get_field('footer_logo');
			$this->footer['retina-logo'] = get_field('footer_retina_logo');
			$this->footer['copyright'] = get_field('footer_copyright');
			$this->footer['style'] = get_field('footer_style');
			$this->footer['social-icons'] = get_field('footer_social_icons');
		} else {
			$this->footer['section'] = '';
			$this->footer['selector'] = '';
			$this->footer['bg-color'] = '';
			$this->footer['border-top-color'] = '';
			$this->footer['text-color'] = '';
			$this->footer['logo'] = '';
			$this->footer['retina-logo'] = '';
			$this->footer['copyright'] = '';
			$this->footer['style'] = '';
			$this->footer['social-icons'] = '';
		}

		if ($this->footer['section'] == 'default' || $this->footer['section'] == '') {

			$this->footer['section'] = ( isset($this->xe_options['footer_section']) && !empty($this->xe_options['footer_section']) ) ? $this->xe_options['footer_section'] : false;

			$this->footer['selector'] = ( isset($this->xe_options['footer_selector']) && !empty($this->xe_options['footer_selector']) ) ? $this->xe_options['footer_selector'] : '';

		}

		if ($this->footer['style'] == 'default' || $this->footer['style'] == '') {

			$this->footer['style'] = ( isset($this->xe_options['footer_style']) && !empty($this->xe_options['footer_style']) ) ? $this->xe_options['footer_style'] : '';

		}

		if ($this->footer['social-icons'] == 'default' || $this->footer['social-icons'] == '') {

			$this->footer['social-icons'] = ( isset($this->xe_options['footer_social_icons']) && !empty($this->xe_options['footer_social_icons']) ) ? $this->xe_options['footer_social_icons'] : true;

		}

		if ($this->footer['logo'] == 'default' || $this->footer['logo'] == '') {

			$this->footer['logo'] = ( isset($this->xe_options['footer_logo']) && !empty($this->xe_options['footer_logo']['url']) ) ? $this->xe_options['footer_logo']['url'] : get_template_directory_uri() . '/img/footer-logo.png';

		}

		if ($this->footer['retina-logo'] == 'default' || $this->footer['retina-logo'] == '') {

			$this->footer['retina-logo'] = ( isset($this->xe_options['footer_retina_logo']) && !empty($this->xe_options['footer_retina_logo']['url']) ) ? $this->xe_options['footer_retina_logo']['url'] : get_template_directory_uri() . '/img/footer-logo-2x.png';

		}

		if ($this->footer['copyright'] == 'default' || $this->footer['copyright']  == '') {

			$this->footer['copyright'] = ( isset($this->xe_options['footer_copyright']) && !empty($this->xe_options['footer_copyright']) ) ? $this->xe_options['footer_copyright'] : 'Copyright |Y|. All Rights Reserved.';

		}
		$this->footer['copyright'] = str_replace('|Y|', date('Y'), $this->footer['copyright']);
		$this->footer['copyright'] = str_replace('|y|', date('y'), $this->footer['copyright']);

		$this->footer['bg-color'] = ( !empty($this->footer['bg-color']) ) ? 'background-color:' . $this->footer['bg-color'] . ' !important;' : '';

		$this->footer['border-top-color'] = ( !empty($this->footer['border-top-color']) ) ? 'border-top-color:' . $this->footer['border-top-color'] . ' !important;' : '';

		$this->footer['text-color'] = ( !empty($this->footer['text-color']) ) ? 'color:' . $this->footer['text-color'] . ' !important;' : '';

		/**
		 * Blog
		 */
		$this->blog['title'] = ( isset($this->xe_options['blog_title']) && !empty($this->xe_options['blog_title']) ) ? $this->xe_options['blog_title'] : 'Blog';

		$this->blog['subtitle'] = ( isset($this->xe_options['blog_subtitle']) && !empty($this->xe_options['blog_subtitle']) ) ? $this->xe_options['blog_subtitle'] : 'Welcome To The Amazing Blog!';

		$this->blog['columns'] = ( isset($this->xe_options['blog_columns']) && !empty($this->xe_options['blog_columns']) ) ? $this->xe_options['blog_columns'] : '6';

		$this->excerpt_length = ( isset($this->xe_options['excerpt_length']) && !empty($this->xe_options['excerpt_length']) ) ? $this->xe_options['excerpt_length'] : '30';

		/**
		 * WooCommerce
		 */
		$this->shop['columns'] = ( isset($this->xe_options['shop_columns']) && !empty($this->xe_options['shop_columns']) ) ? $this->xe_options['shop_columns'] : '3';

		/**
		 * Social Profiles
		 */
		$this->social['facebook'] = ( isset($this->xe_options['social_facebook']) && !empty($this->xe_options['social_facebook']) ) ? $this->xe_options['social_facebook'] : '';

		$this->social['twitter'] = ( isset($this->xe_options['social_twitter']) && !empty($this->xe_options['social_twitter']) ) ? $this->xe_options['social_twitter'] : '';

		$this->social['google'] = ( isset($this->xe_options['social_google']) && !empty($this->xe_options['social_google']) ) ? $this->xe_options['social_google'] : '';

		$this->social['github'] = ( isset($this->xe_options['social_github']) && !empty($this->xe_options['social_github']) ) ? $this->xe_options['social_github'] : '';

		$this->social['behance'] = ( isset($this->xe_options['social_behance']) && !empty($this->xe_options['social_behance']) ) ? $this->xe_options['social_behance'] : '';

		$this->social['dribbble'] = ( isset($this->xe_options['social_dribbble']) && !empty($this->xe_options['social_dribbble']) ) ? $this->xe_options['social_dribbble'] : '';

		$this->social['dribbble'] = ( isset($this->xe_options['social_dribbble']) && !empty($this->xe_options['social_dribbble']) ) ? $this->xe_options['social_dribbble'] : '';

		$this->social['pinterest'] = ( isset($this->xe_options['social_pinterest']) && !empty($this->xe_options['social_pinterest']) ) ? $this->xe_options['social_pinterest'] : '';

		$this->social['instagram'] = ( isset($this->xe_options['social_instagram']) && !empty($this->xe_options['social_instagram']) ) ? $this->xe_options['social_instagram'] : '';

		$this->social['linkedin'] = ( isset($this->xe_options['social_linkedin']) && !empty($this->xe_options['social_linkedin']) ) ? $this->xe_options['social_linkedin'] : '';

		$this->social['tumblr'] = ( isset($this->xe_options['social_tumblr']) && !empty($this->xe_options['social_thumblr']) ) ? $this->xe_options['social_thumblr'] : '';

		$this->social['youtube'] = ( isset($this->xe_options['social_youtube']) && !empty($this->xe_options['social_youtube']) ) ? $this->xe_options['social_youtube'] : '';

		$this->social['vimeo'] = ( isset($this->xe_options['social_vimeo']) && !empty($this->xe_options['social_vimeo']) ) ? $this->xe_options['social_vimeo'] : '';


		/**
		 * Blog
		 */
		if ( is_home() ) {

			// Blog > Tool-Bar
			$this->tool_bar['switch'] = ( isset($this->xe_options['blog_tool_bar']) && !empty($this->xe_options['blog_tool_bar']) ) ? $this->xe_options['blog_tool_bar'] : 'default';

			if ($this->tool_bar['switch'] == 'default' || $this->tool_bar['switch'] == '') {

				$this->tool_bar['switch'] = ( isset($this->xe_options['tool_bar_switch']) ) ? $this->xe_options['tool_bar_switch'] : false;

			}

			// Blog > Header
			$this->header['style'] = ( isset($this->xe_options['blog_header_style']) && !empty($this->xe_options['blog_header_style']) ) ? $this->xe_options['blog_header_style'] : 'default';

			if ($this->header['style'] == 'default' || $this->header['menu'] == '') {

				$this->header['style'] = ( isset($this->xe_options['header_style']) && !empty($this->xe_options['header_style']) ) ? $this->xe_options['header_style'] : 'default';

			}	

			$this->header['location'] = ( isset($this->xe_options['blog_header_location']) && !empty($this->xe_options['blog_header_location']) ) ? $this->xe_options['blog_header_location'] : 'default';

			if ($this->header['location'] == 'default' || $this->header['location'] == '') {

				$this->header['location'] = ( isset($this->xe_options['header_location']) && !empty($this->xe_options['header_location']) ) ? $this->xe_options['header_location'] : 'top';

			}
			
			$this->header['menu'] = ( isset($this->xe_options['blog_header_menu']) && !empty($this->xe_options['blog_header_menu']) ) ? $this->xe_options['blog_header_menu'] : 'default';

			// Blog > Title-Bar
			$this->title_bar['switch'] = ( isset($this->xe_options['blog_title_bar']) && !empty($this->xe_options['blog_title_bar']) ) ? $this->xe_options['blog_title_bar'] : true;

			$this->title_bar['title'] = ( isset($this->xe_options['blog_title']) && !empty($this->xe_options['blog_title']) ) ? $this->xe_options['blog_title'] : 'Blog';

			$this->title_bar['subtitle'] = ( isset($this->xe_options['blog_subtitle']) && !empty($this->xe_options['blog_subtitle']) ) ? $this->xe_options['blog_subtitle'] : 'Welcome To Amazing Blog!';

			$this->title_bar['height'] = ( isset($this->xe_options['blog_title_bar_height']) && !empty($this->xe_options['blog_title_bar_height']) ) ? $this->xe_options['blog_title_bar_height'] : '';

			// Blog > Content
			$this->padding_top = ( isset($this->xe_options['blog_padding_top']) && !empty($this->xe_options['blog_padding_top']) ) ? $this->xe_options['blog_padding_top'] : '100';

			$this->padding_bottom = ( isset($this->xe_options['blog_padding_bottom']) && !empty($this->xe_options['blog_padding_bottom']) ) ? $this->xe_options['blog_padding_bottom'] : '100';

			// Blog > Sidebar
			$this->rdx_sidebar_position = ( isset($this->xe_options['blog_sidebar_position']) && !empty($this->xe_options['blog_sidebar_position']) ) ? $this->xe_options['blog_sidebar_position'] : 'right';

			$this->rdx_left_sidebar_selector = ( isset($this->xe_options['blog_left_sidebar_selector']) && !empty($this->xe_options['blog_left_sidebar_selector']) ) ? $this->xe_options['blog_left_sidebar_selector'] : 'sidebar-1';

			$this->rdx_right_sidebar_selector = ( isset($this->xe_options['blog_right_sidebar_selector']) && !empty($this->xe_options['blog_right_sidebar_selector']) ) ? $this->xe_options['blog_right_sidebar_selector'] : 'sidebar-2';

		/**
		 * Single
		 */
		} elseif ( is_single() ) {

			// Single > Portfolio
			if ( is_singular('xe-portfolio') ) {

				// Single > Portfolio > ACF Pro
				if ( function_exists('get_field') ) {
					$this->portfolio['fields'] = get_field('portfolio_fields');
					$this->portfolio['gallery'] = get_field('portfolio_gallery');
					$this->portfolio['btn-text'] = get_field('portfolio_button_text');
					$this->portfolio['btn-link'] = get_field('portfolio_button_link');
					$this->portfolio['btn-target'] = get_field('portfolio_button_target');
				} else {
					$this->portfolio['fields'] = null;
					$this->portfolio['gallery'] = null;
					$this->portfolio['btn-text'] = '';
					$this->portfolio['btn-link'] = '';
					$this->portfolio['btn-target'] = '';
				}

				// Single > Portfolio > Tool-Bar
				if ($this->tool_bar['switch'] == 'default' || $this->tool_bar['switch'] == '') {

					$this->tool_bar['switch'] = ( isset($this->xe_options['tool_bar_switch']) ) ? $this->xe_options['tool_bar_switch'] : false;

				}

				// Single > Portfolio > Header 
				if ($this->header['style'] == 'default' || $this->header['style'] == '') {

					$this->header['style'] = ( isset($this->xe_options['header_style']) && !empty($this->xe_options['header_style']) ) ? $this->xe_options['header_style'] : '';

				}

				if ($this->header['location'] == 'default' || $this->header['location'] == '') {

					$this->header['location'] = ( isset($this->xe_options['header_location']) && !empty($this->xe_options['header_location']) ) ? $this->xe_options['header_location'] : 'top';

				}

				if ($this->header['menu'] == 'default' || $this->header['menu'] == '') {

					$this->header['menu'] = ( isset($this->xe_options['portfolio_header_menu']) && !empty($this->xe_options['portfolio_header_menu']) ) ? $this->xe_options['portfolio_header_menu'] : 'primary-menu';

				}

				// Single > Portfolio > Title-Bar
				if ( $this->title_bar['switch'] == 'default' || $this->title_bar['switch'] == '') {

					$this->title_bar['switch'] = ( isset($this->xe_options['portfolio_title_bar']) ) ? $this->xe_options['portfolio_title_bar'] : true;

				}

				$this->title_bar['title'] = get_the_title();

				if ( $this->title_bar['height'] == 'default' || $this->title_bar['height'] == '') {

					$this->title_bar['height'] = ( isset($this->xe_options['portfolio_title_bar_height']) && !empty($this->xe_options['portfolio_title_bar_height']) ) ? $this->xe_options['portfolio_title_bar_height'] : '';

				}

				// Single > Portfolio > Content
				if ($this->padding_top == '') {

					$this->padding_top = ( isset($this->xe_options['portfolio_padding_top']) && !empty($this->xe_options['portfolio_padding_top']) ) ? $this->xe_options['portfolio_padding_top'] : '100';

				}

				if ($this->padding_bottom == '') {

					$this->padding_bottom = ( isset($this->xe_options['portfolio_padding_bottom']) && !empty($this->xe_options['portfolio_padding_bottom']) ) ? $this->xe_options['portfolio_padding_bottom'] : '100';

				}

				$this->comments = ( isset($this->xe_options['portfolio_comments']) ) ? $this->xe_options['portfolio_comments'] : false;

				// Single > Portfolio > Sidebars
				$this->rdx_sidebar_position = ( isset($this->xe_options['portfolio_sidebar_position']) && !empty($this->xe_options['portfolio_sidebar_position']) ) ? $this->xe_options['portfolio_sidebar_position'] : 'none';

				$this->rdx_left_sidebar_selector = ( isset($this->xe_options['portfolio_left_sidebar_selector']) && !empty($this->xe_options['portfolio_left_sidebar_selector']) ) ? $this->xe_options['portfolio_left_sidebar_selector'] : 'sidebar-1';

				$this->rdx_right_sidebar_selector = ( isset($this->xe_options['portfolio_right_sidebar_selector']) && !empty($this->xe_options['portfolio_right_sidebar_selector']) ) ? $this->xe_options['portfolio_right_sidebar_selector'] : 'sidebar-2';

			// Single > Event
			} elseif ( is_singular('xe-events') ) {

				// Single > Event > ACF Pro
				if ( function_exists('get_field') ) {
					$this->event['start'] = get_field('event_start_date');
					$this->event['end'] = get_field('event_end_date');
					$this->event['speakers'] = get_field('event_speakers');
					$this->event['phone'] = get_field('event_phone');
					$this->event['email'] = get_field('event_email');
					$this->event['btn-url'] = get_field('event_subscribe_url');
					$this->event['btn-text'] = get_field('event_subscribe_button_text');
					$this->event['address'] = get_field('event_address');
					$this->event['map'] = get_field('event_map');
				} else {
					$this->event['start'] = '';
					$this->event['end'] = '';
					$this->event['speakers'] = null;
					$this->event['phone'] = '';
					$this->event['email'] = '';
					$this->event['btn-url'] = '';
					$this->event['btn-text'] = '';
					$this->event['address'] = '';
					$this->event['map'] = null;
				}

				// Single > Event > Tool-Bar
				if ( $this->tool_bar['switch'] == 'default' || $this->tool_bar['switch'] == '') {

					$this->tool_bar['switch'] = ( isset($this->xe_options['tool_bar_switch']) ) ? $this->xe_options['tool_bar_switch'] : false;

				}

				// Single > Event > Header
				if ($this->header['style'] == 'default' || $this->header['style'] == '') {

					$this->header['style'] = ( isset($this->xe_options['header_style']) && !empty($this->xe_options['header_style']) ) ? $this->xe_options['header_style'] : '';

				}

				if ($this->header['location'] == 'default' || $this->header['location'] == '') {

					$this->header['location'] = ( isset($this->xe_options['header_location']) && !empty($this->xe_options['header_location']) ) ? $this->xe_options['header_location'] : 'top';

				}

				if ($this->header['menu'] == 'default' || $this->header['menu'] == '') {

					$this->header['menu'] = ( isset($this->xe_options['event_header_menu']) && !empty($this->xe_options['event_header_menu']) ) ? $this->xe_options['event_header_menu'] : 'primary-menu';

				}

				// Single > Event > Title-Bar
				if ( $this->title_bar['switch'] == 'default' || $this->title_bar['switch'] == '') {

					$this->title_bar['switch'] = ( isset($this->xe_options['event_title_bar']) && !empty($this->xe_options['event_title_bar']) ) ? $this->xe_options['event_title_bar'] : true;

				}

				$this->title_bar['title'] = get_the_title();

				if ( $this->title_bar['height'] == 'default' || $this->title_bar['height'] == '') {

					$this->title_bar['height'] = ( isset($this->xe_options['event_title_bar_height']) && !empty($this->xe_options['event_title_bar_height']) ) ? $this->xe_options['event_title_bar_height'] : '';

				}

				// Single > Event > Content
				if ($this->padding_top == '') {

					$this->padding_top = ( isset($this->xe_options['event_padding_top']) && !empty($this->xe_options['event_padding_top']) ) ? $this->xe_options['event_padding_top'] : '100';

				}

				if ($this->padding_bottom == '') {

					$this->padding_bottom = ( isset($this->xe_options['event_padding_bottom']) && !empty($this->xe_options['event_padding_bottom']) ) ? $this->xe_options['event_padding_bottom'] : '100';

				}

				$this->comments = ( isset($this->xe_options['event_comments']) ) ? $this->xe_options['event_comments'] : false;

				// Single > Event > Sidebars
				$this->rdx_sidebar_position = ( isset($this->xe_options['event_sidebar_position']) && !empty($this->xe_options['event_sidebar_position']) ) ? $this->xe_options['event_sidebar_position'] : 'none';

				$this->rdx_left_sidebar_selector = ( isset($this->xe_options['event_left_sidebar_selector']) && !empty($this->xe_options['event_left_sidebar_selector']) ) ? $this->xe_options['event_left_sidebar_selector'] : 'sidebar-1';

				$this->rdx_right_sidebar_selector = ( isset($this->xe_options['event_right_sidebar_selector']) && !empty($this->xe_options['event_right_sidebar_selector']) ) ? $this->xe_options['event_right_sidebar_selector'] : 'sidebar-2';

			// WooCommerce Product				
			} elseif ( function_exists('is_product') && is_product() ) {

				// Single > Product > Tool-Bar
				if ($this->tool_bar['switch'] == 'default' || $this->tool_bar['switch'] == '') {

					$this->tool_bar['switch'] = ( isset($this->xe_options['tool_bar_switch']) ) ? $this->xe_options['tool_bar_switch'] : false;

				}

				// Single > Product > Header 
				if ($this->header['style'] == 'default' || $this->header['style'] == '') {

					$this->header['style'] = ( isset($this->xe_options['header_style']) && !empty($this->xe_options['header_style']) ) ? $this->xe_options['header_style'] : '';

				}

				if ($this->header['location'] == 'default' || $this->header['location'] == '') {

					$this->header['location'] = ( isset($this->xe_options['header_location']) && !empty($this->xe_options['header_location']) ) ? $this->xe_options['header_location'] : 'top';

				}

				if ($this->header['menu'] == 'default' || $this->header['menu'] == '') {

					$this->header['menu'] = ( isset($this->xe_options['product_header_menu']) && !empty($this->xe_options['product_header_menu']) ) ? $this->xe_options['product_header_menu'] : 'primary-menu';

				}

				// Single > Product > Title-Bar	
				if ( $this->title_bar['switch'] == 'default' || $this->title_bar['switch'] == '') {

					$this->title_bar['switch'] = ( isset($this->xe_options['product_title_bar']) ) ? $this->xe_options['product_title_bar'] : true;

				}

				$this->title_bar['title'] = get_the_title();

				if ( $this->title_bar['height'] == 'default' || $this->title_bar['height'] == '') {

					$this->title_bar['height'] = ( isset($this->xe_options['product_title_bar_height']) && !empty($this->xe_options['product_title_bar_height']) ) ? $this->xe_options['product_title_bar_height'] : '';

				}

				// Single > Product > Content
				if ($this->padding_top == '') {

					$this->padding_top = ( isset($this->xe_options['product_padding_top']) && !empty($this->xe_options['product_padding_top']) ) ? $this->xe_options['product_padding_top'] : '100';

				}

				if ($this->padding_bottom == '') {

					$this->padding_bottom = ( isset($this->xe_options['product_padding_bottom']) && !empty($this->xe_options['product_padding_bottom']) ) ? $this->xe_options['product_padding_bottom'] : '100';

				}

				$this->product['related'] = ( isset($this->xe_options['related_products']) ) ? $this->xe_options['related_products'] : false;

				$this->product['reviews'] = ( isset($this->xe_options['product_comments']) ) ? $this->xe_options['product_reviews'] : false;

				// Single > Product > Sidebars
				$this->rdx_sidebar_position = ( isset($this->xe_options['product_sidebar_position']) && !empty($this->xe_options['product_sidebar_position']) ) ? $this->xe_options['product_sidebar_position'] : 'none';

				$this->rdx_left_sidebar_selector = ( isset($this->xe_options['product_left_sidebar_selector']) && !empty($this->xe_options['product_left_sidebar_selector']) ) ? $this->xe_options['product_left_sidebar_selector'] : 'sidebar-1';

				$this->rdx_right_sidebar_selector = ( isset($this->xe_options['product_right_sidebar_selector']) && !empty($this->xe_options['product_right_sidebar_selector']) ) ? $this->xe_options['product_right_sidebar_selector'] : 'sidebar-2';

			// Single Post
			} else {

				// Single > Post > Tool-Bar
				if ( $this->tool_bar['switch'] == 'default' || $this->tool_bar['switch'] == '') {

					$this->tool_bar['switch'] = ( isset($this->xe_options['tool_bar_switch']) ) ? $this->xe_options['tool_bar_switch'] : false;

				}

				// Single > Post > Header
				if ($this->header['style'] == 'default' || $this->header['style'] == '') {

					$this->header['style'] = ( isset($this->xe_options['header_style']) && !empty($this->xe_options['header_style']) ) ? $this->xe_options['header_style'] : '';

				}

				if ($this->header['location'] == 'default' || $this->header['location'] == '') {

					$this->header['location'] = ( isset($this->xe_options['header_location']) && !empty($this->xe_options['header_location']) ) ? $this->xe_options['header_location'] : 'top';

				}

				if ($this->header['menu'] == 'default' || $this->header['menu'] == '') {

					$this->header['menu'] = ( isset($this->xe_options['post_header_menu']) && !empty($this->xe_options['post_header_menu']) ) ? $this->xe_options['post_header_menu'] : 'primary-menu';

				}

				// Single > Post > Title-Bar
				if ( $this->title_bar['switch'] == 'default' || $this->title_bar['switch'] == '') {

					$this->title_bar['switch'] = ( isset($this->xe_options['post_title_bar']) ) ? $this->xe_options['post_title_bar'] : true;

				}

				$this->title_bar['title'] = get_the_title();

				if ( $this->title_bar['height'] == 'default' || $this->title_bar['height'] == '') {

					$this->title_bar['height'] = ( isset($this->xe_options['post_title_bar_height']) && !empty($this->xe_options['post_title_bar_height']) ) ? $this->xe_options['post_title_bar_height'] : '';

				}

				// Single > Post > Content
				if ($this->padding_top == '') {

					$this->padding_top = ( isset($this->xe_options['post_padding_top']) && !empty($this->xe_options['post_padding_top']) ) ? $this->xe_options['post_padding_top'] : '100';

				}

				if ($this->padding_bottom == '') {

					$this->padding_bottom = ( isset($this->xe_options['post_padding_bottom']) && !empty($this->xe_options['post_padding_bottom']) ) ? $this->xe_options['post_padding_bottom'] : '100';

				}

				$this->comments = ( isset($this->xe_options['post_comments']) ) ? $this->xe_options['post_comments'] : true;

				// Single > Post > Sidebars
				$this->rdx_sidebar_position = ( isset($this->xe_options['post_sidebar_position']) && !empty($this->xe_options['post_sidebar_position']) ) ? $this->xe_options['post_sidebar_position'] : 'right';

				$this->rdx_left_sidebar_selector = ( isset($this->xe_options['post_left_sidebar_selector']) && !empty($this->xe_options['post_left_sidebar_selector']) ) ? $this->xe_options['post_left_sidebar_selector'] : 'sidebar-1';
				
				$this->rdx_right_sidebar_selector = ( isset($this->xe_options['post_right_sidebar_selector']) && !empty($this->xe_options['post_right_sidebar_selector']) ) ? $this->xe_options['post_right_sidebar_selector'] : 'sidebar-2';

			}

		/**
		 * Page
		 */
		} elseif ( is_page() ) {

			// Page > Tool-Bar
			if ( $this->tool_bar['switch'] == 'default' || $this->tool_bar['switch'] == '') {

				$this->tool_bar['switch'] = ( isset($this->xe_options['tool_bar_switch']) ) ? $this->xe_options['tool_bar_switch'] : false;

			}

			// Page > Header			
			if ($this->header['style'] == 'default' || $this->header['style'] == '') {

				$this->header['style'] = ( isset($this->xe_options['header_style']) && !empty($this->xe_options['header_style']) ) ? $this->xe_options['header_style'] : '';

			}

			if ($this->header['location'] == 'default' || $this->header['location'] == '') {

				$this->header['location'] = ( isset($this->xe_options['header_location']) && !empty($this->xe_options['header_location']) ) ? $this->xe_options['header_location'] : 'top';

			}

			if ($this->header['menu'] == 'default' || $this->header['menu'] == '') {

				$this->header['menu'] = ( isset($this->xe_options['page_header_menu']) && !empty($this->xe_options['page_header_menu']) ) ? $this->xe_options['page_header_menu'] : 'primary-menu';

			}

			// Page > Title-Bar	
			if ( $this->title_bar['switch'] == 'default' || $this->title_bar['switch'] == '') {

				$this->title_bar['switch'] = ( isset($this->xe_options['page_title_bar']) ) ? $this->xe_options['page_title_bar'] : true;

			}

			$this->title_bar['title'] = get_the_title();

			if ( $this->title_bar['height'] == 'default' || $this->title_bar['height'] == '') {

				$this->title_bar['height'] = ( isset($this->xe_options['page_title_bar_height']) && !empty($this->xe_options['page_title_bar_height']) ) ? $this->xe_options['page_title_bar_height'] : '';

			}

			// Page > Content
			if ($this->padding_top == '') {

				$this->padding_top = ( isset($this->xe_options['page_padding_top']) && !empty($this->xe_options['page_padding_top']) ) ? $this->xe_options['page_padding_top'] : '100';

			}

			if ($this->padding_bottom == '') {

				$this->padding_bottom = ( isset($this->xe_options['page_padding_bottom']) && !empty($this->xe_options['page_padding_bottom']) ) ? $this->xe_options['page_padding_bottom'] : '100';

			}

			$this->comments = ( isset($this->xe_options['page_comments']) ) ? $this->xe_options['page_comments'] : true;

			// Page > Sidebars
			$this->rdx_sidebar_position = ( isset($this->xe_options['page_sidebar_position']) && !empty($this->xe_options['page_sidebar_position']) ) ? $this->xe_options['page_sidebar_position'] : 'none';

			$this->rdx_left_sidebar_selector = ( isset($this->xe_options['page_left_sidebar_selector']) && !empty($this->xe_options['page_left_sidebar_selector']) ) ? $this->xe_options['page_left_sidebar_selector'] : 'sidebar-1';

			$this->rdx_right_sidebar_selector = ( isset($this->xe_options['page_right_sidebar_selector']) && !empty($this->xe_options['page_right_sidebar_selector']) ) ? $this->xe_options['page_right_sidebar_selector'] : 'sidebar-2';

		/**
		 * Archive
		 */
		} elseif ( is_archive() ) {

			// Archive > Portfolio
			if ( is_post_type_archive('xe-portfolio') ) {

				// Archive > Portfolio > Tool-bar
				$this->tool_bar['switch'] = ( isset($this->xe_options['portfolio_list_tool_bar']) && !empty($this->xe_options['portfolio_list_tool_bar']) ) ? $this->xe_options['portfolio_list_tool_bar'] : 'default';

				if ($this->tool_bar['switch'] == 'default' || $this->tool_bar['switch'] == '') {

					$this->tool_bar['switch'] = ( isset($this->xe_options['tool_bar_switch']) ) ? $this->xe_options['tool_bar_switch'] : false;

				}

				// Archive > Portfolio > Header 
				$this->header['style'] = ( isset($this->xe_options['portfolio_list_header_style']) && !empty($this->xe_options['portfolio_list_header_style']) ) ? $this->xe_options['portfolio_list_header_style'] : 'default';

				if ($this->header['style'] == 'default' || $this->header['style'] == '') {

					$this->header['style'] = ( isset($this->xe_options['header_style']) && !empty($this->xe_options['header_style']) ) ? $this->xe_options['header_style'] : '';

				}

				$this->header['location'] = ( isset($this->xe_options['portfolio_list_header_location']) && !empty($this->xe_options['portfolio_list_header_location']) ) ? $this->xe_options['portfolio_list_header_location'] : 'default';

				if ($this->header['location'] == 'default' || $this->header['location'] == '') {

					$this->header['location'] = ( isset($this->xe_options['header_location']) && !empty($this->xe_options['header_location']) ) ? $this->xe_options['header_location'] : 'top';

				}

				$this->header['menu'] = ( isset($this->xe_options['portfolio_list_header_menu']) && !empty($this->xe_options['portfolio_list_header_menu']) ) ? $this->xe_options['portfolio_list_header_menu'] : 'primary-menu';

				// Archive > Portfolio > Title-Bar
				$this->title_bar['switch'] = ( isset($this->xe_options['portfolio_list_title_bar']) ) ? $this->xe_options['portfolio_list_title_bar'] : true;

				$this->title_bar['title'] = ( isset($this->xe_options['portfolio_list_title']) && !empty($this->xe_options['portfolio_list_title']) ) ? $this->xe_options['portfolio_list_title'] : 'Portfolio';

				$this->title_bar['subtitle'] = ( isset($this->xe_options['portfolio_list_subtitle']) && !empty($this->xe_options['portfolio_list_subtitle']) ) ? $this->xe_options['portfolio_list_subtitle'] : 'Bring Out the Amazing Portfolio!';

				$this->title_bar['height'] = ( isset($this->xe_options['portfolio_list_title_bar_height']) && !empty($this->xe_options['portfolio_list_title_bar_height']) ) ? $this->xe_options['portfolio_list_title_bar_height'] : '';

				// Archive > Portfolio > Content
				$this->portfolio['columns'] = ( isset($this->xe_options['portfolio_list_columns']) && !empty($this->xe_options['portfolio_list_columns']) ) ? $this->xe_options['portfolio_list_columns'] : '4';

				$this->portfolio['style'] = ( isset($this->xe_options['portfolio_list_style']) && !empty($this->xe_options['portfolio_list_style']) ) ? $this->xe_options['portfolio_list_style'] : '1';

				$this->padding_top = ( isset($this->xe_options['postfolio_list_padding_top']) && !empty($this->xe_options['postfolio_list_padding_top']) ) ? $this->xe_options['postfolio_list_padding_top'] : '100';

				$this->padding_bottom = ( isset($this->xe_options['postfolio_list_padding_bottom']) && !empty($this->xe_options['postfolio_list_padding_bottom']) ) ? $this->xe_options['postfolio_list_padding_bottom'] : '100';

				// Archive > Portfolio > Sidebars
				$this->rdx_sidebar_position = ( isset($this->xe_options['portfolio_list_sidebar_position']) && !empty($this->xe_options['portfolio_list_sidebar_position']) ) ? $this->xe_options['portfolio_list_sidebar_position'] : 'none';

				$this->rdx_left_sidebar_selector = ( isset($this->xe_options['portfolio_list_left_sidebar_selector']) && !empty($this->xe_options['portfolio_list_left_sidebar_selector']) ) ? $this->xe_options['portfolio_list_left_sidebar_selector'] : 'sidebar-1';

				$this->rdx_right_sidebar_selector = ( isset($this->xe_options['portfolio_list_right_sidebar_selector']) && !empty($this->xe_options['portfolio_list_right_sidebar_selector']) ) ? $this->xe_options['portfolio_list_right_sidebar_selector'] : 'sidebar-2';

			// Archive > Events
			} elseif ( is_post_type_archive('xe-events') ) {

				// Archive > Events > Tool-Bar
				$this->tool_bar['switch'] = ( isset($this->xe_options['events_list_tool_bar']) && !empty($this->xe_options['events_list_tool_bar']) ) ? $this->xe_options['events_list_tool_bar'] : 'default';

				if ($this->tool_bar['switch'] == 'default' || $this->tool_bar['switch'] == '') {

					$this->tool_bar['switch'] = ( isset($this->xe_options['tool_bar_switch']) ) ? $this->xe_options['tool_bar_switch'] : false;

				}

				// Archive > Events > Header
				$this->header['style'] = ( isset($this->xe_options['events_list_header_style']) && !empty($this->xe_options['events_list_header_style']) ) ? $this->xe_options['events_list_header_style'] : 'default';

				if ($this->header['style'] == 'default' || $this->header['style'] == '') {

					$this->header['style'] = ( isset($this->xe_options['header_style']) && !empty($this->xe_options['header_style']) ) ? $this->xe_options['header_style'] : '';

				}

				$this->header['location'] = ( isset($this->xe_options['events_list_header_location']) && !empty($this->xe_options['events_list_header_location']) ) ? $this->xe_options['events_list_header_location'] : 'default';

				if ($this->header['location'] == 'default' || $this->header['location'] == '') {

					$this->header['location'] = ( isset($this->xe_options['header_location']) && !empty($this->xe_options['header_location']) ) ? $this->xe_options['header_location'] : 'top';

				}

				$this->header['menu'] = ( isset($this->xe_options['events_list_header_menu']) && !empty($this->xe_options['events_list_header_menu']) ) ? $this->xe_options['events_list_header_menu'] : 'primary-menu';

				// Archive > Events > Title-Bar
				$this->title_bar['switch'] = ( isset($this->xe_options['events_list_title_bar']) ) ? $this->xe_options['events_list_title_bar'] : true;

				$this->title_bar['title'] = ( isset($this->xe_options['events_list_title']) && !empty($this->xe_options['events_list_title']) ) ? $this->xe_options['events_list_title'] : 'Events';

				$this->title_bar['subtitle'] = ( isset($this->xe_options['events_list_subtitle']) && !empty($this->xe_options['events_list_subtitle']) ) ? $this->xe_options['events_list_subtitle'] : 'Checkout The Amazing Events!';

				$this->title_bar['height'] = ( isset($this->xe_options['events_list_title_bar_height']) && !empty($this->xe_options['events_list_title_bar_height']) ) ? $this->xe_options['events_list_title_bar_height'] : '';

				// Archive > Events > Content
				$this->padding_top = ( isset($this->xe_options['events_list_padding_top']) && !empty($this->xe_options['events_list_padding_top']) ) ? $this->xe_options['events_list_padding_top'] : '100';

				$this->padding_bottom = ( isset($this->xe_options['events_list_padding_bottom']) && !empty($this->xe_options['events_list_padding_bottom']) ) ? $this->xe_options['events_list_padding_bottom'] : '100';

				// Archive > Events > Sidebars
				$this->rdx_sidebar_position = ( isset($this->xe_options['events_list_sidebar_position']) && !empty($this->xe_options['events_list_sidebar_position']) ) ? $this->xe_options['events_list_sidebar_position'] : 'none';

				$this->rdx_left_sidebar_selector = ( isset($this->xe_options['events_list_left_sidebar_selector']) && !empty($this->xe_options['events_list_left_sidebar_selector']) ) ? $this->xe_options['events_list_left_sidebar_selector'] : 'sidebar-1';

				$this->rdx_right_sidebar_selector = ( isset($this->xe_options['events_list_right_sidebar_selector']) && !empty($this->xe_options['events_list_right_sidebar_selector']) ) ? $this->xe_options['events_list_right_sidebar_selector'] : 'sidebar-2';

			// WooCommerce Shop
			} elseif ( function_exists('is_shop') && is_shop() ) {

				// Archive > Shop > Tool-Bar
				$this->tool_bar['switch'] = ( isset($this->xe_options['shop_tool_bar']) && !empty($this->xe_options['shop_tool_bar']) ) ? $this->xe_options['shop_tool_bar'] : 'default';

				if ($this->tool_bar['switch'] == 'default' || $this->tool_bar['switch'] == '') {

					$this->tool_bar['switch'] = ( isset($this->xe_options['tool_bar_switch']) ) ? $this->xe_options['tool_bar_switch'] : false;

				}

				// Archive > Shop > Header
				$this->header['style'] = ( isset($this->xe_options['shop_header_style']) && !empty($this->xe_options['shop_header_style']) ) ? $this->xe_options['shop_header_style'] : 'default';

				if ($this->header['style'] == 'default' || $this->header['style'] == '') {

					$this->header['style'] = ( isset($this->xe_options['header_style']) && !empty($this->xe_options['header_style']) ) ? $this->xe_options['header_style'] : '';

				}

				$this->header['location'] = ( isset($this->xe_options['shop_header_location']) && !empty($this->xe_options['shop_header_location']) ) ? $this->xe_options['shop_header_location'] : 'default';

				if ($this->header['location'] == 'default' || $this->header['location'] == '') {

					$this->header['location'] = ( isset($this->xe_options['header_location']) && !empty($this->xe_options['header_location']) ) ? $this->xe_options['header_location'] : 'top';

				}

				$this->header['menu'] = ( isset($this->xe_options['shop_header_menu']) && !empty($this->xe_options['shop_header_menu']) ) ? $this->xe_options['shop_header_menu'] : 'primary-menu';

				// Archive > Shop > Title-Bar				
				$this->title_bar['switch'] = ( isset($this->xe_options['shop_title_bar']) ) ? $this->xe_options['shop_title_bar'] : true;

			    $this->title_bar['title'] = ( isset($this->xe_options['shop_title']) && !empty($this->xe_options['shop_title']) ) ? $this->xe_options['shop_title'] : 'Shop';

				$this->title_bar['subtitle'] = ( isset($this->xe_options['shop_subtitle']) && !empty($this->xe_options['shop_subtitle']) ) ? $this->xe_options['shop_subtitle'] : 'Checkout Our Amazing Products!';

				$this->title_bar['height'] = ( isset($this->xe_options['shop_title_bar_height']) && !empty($this->xe_options['shop_title_bar_height']) ) ? $this->xe_options['shop_title_bar_height'] : '';

				// Archive > Shop > Content
				$this->padding_top = ( isset($this->xe_options['shop_padding_top']) && !empty($this->xe_options['shop_padding_top']) ) ? $this->xe_options['shop_padding_top'] : '100';
				$this->padding_bottom = ( isset($this->xe_options['shop_padding_bottom']) && !empty($this->xe_options['shop_padding_bottom']) ) ? $this->xe_options['shop_padding_bottom'] : '100';

				// Archive > Shop > Sidebars				
				$this->rdx_sidebar_position = ( isset($this->xe_options['shop_sidebar_position']) && !empty($this->xe_options['shop_sidebar_position']) ) ? $this->xe_options['shop_sidebar_position'] : 'right';

				$this->rdx_left_sidebar_selector = ( isset($this->xe_options['shop_left_sidebar_selector']) && !empty($this->xe_options['shop_left_sidebar_selector']) ) ? $this->xe_options['shop_left_sidebar_selector'] : 'sidebar-1';

				$this->rdx_right_sidebar_selector = ( isset($this->xe_options['shop_right_sidebar_selector']) && !empty($this->xe_options['shop_right_sidebar_selector']) ) ? $this->xe_options['shop_right_sidebar_selector'] : 'sidebar-2';

			// Archive
			} else {

				// Archive > Tool-Bar
				$this->tool_bar['switch'] = ( isset($this->xe_options['blog_tool_bar']) && !empty($this->xe_options['blog_tool_bar']) ) ? $this->xe_options['blog_tool_bar'] : 'default';

				if ($this->tool_bar['switch'] == 'default' || $this->tool_bar['switch'] == '') {

					$this->tool_bar['switch'] = ( isset($this->xe_options['tool_bar_switch']) ) ? $this->xe_options['tool_bar_switch'] : false;

				}

				// Archive > Header
				$this->header['style'] = ( isset($this->xe_options['blog_header_style']) && !empty($this->xe_options['blog_header_style']) ) ? $this->xe_options['blog_header_style'] : 'default';

				if ($this->header['style'] == 'default' || $this->header['style'] == '') {

					$this->header['style'] = ( isset($this->xe_options['header_style']) && !empty($this->xe_options['header_style']) ) ? $this->xe_options['header_style'] : '';

				}

				$this->header['location'] = ( isset($this->xe_options['blog_header_location']) && !empty($this->xe_options['blog_header_location']) ) ? $this->xe_options['blog_header_location'] : 'default';

				if ($this->header['location'] == 'default' || $this->header['location'] == '') {

					$this->header['location'] = ( isset($this->xe_options['header_location']) && !empty($this->xe_options['header_location']) ) ? $this->xe_options['header_location'] : 'top';

				}

				$this->header['menu'] = ( isset($this->xe_options['blog_header_menu']) && !empty($this->xe_options['blog_header_menu']) ) ? $this->xe_options['blog_header_menu'] : 'primary-menu';

				// Archive > Title-Bar				
				$this->title_bar['switch'] = ( isset($this->xe_options['blog_title_bar']) ) ? $this->xe_options['blog_title_bar'] : true;

				if ( is_category() ) {

					$this->title_bar['title'] = 'Posts in the <em>' . single_cat_title('', false) . '</em> category';

				} elseif ( is_tag() ) {

					$this->title_bar['title'] = 'Posts with the <em>' . single_tag_title('', false) . '</em> tag';

				} elseif ( is_author() ) {

					$this->title_bar['title'] = 'Posts by Author: <span class="vcard">' . ucwords(get_the_author_meta('display_name')) . '</span>';

				} elseif ( is_day() ) {

					$this->title_bar['title'] = 'Posts from <span>' . get_the_date() . '</span>';

				} elseif ( is_month() ) {

					$this->title_bar['title'] = 'Posts from <span>' . get_the_date('F Y') . '</span>';
				} elseif ( is_year() ) {

					$this->title_bar['title'] = 'Posts from <span>' . get_the_date('Y') . '</span>';

				} elseif ( function_exists('is_product_category') && is_product_category() ) {

					$this->title_bar['title'] = 'Products in the <em>' . single_cat_title('', false) . '</em> category';

				} elseif ( function_exists('is_product_tag') && is_product_tag() ) {

					$this->title_bar['title'] = 'Products with the <em>' . single_tag_title('', false) . '</em> tag';

				} else {

				    $this->title_bar['title'] = 'Archives';

				}

				$this->title_bar['height'] = ( isset($this->xe_options['blog_title_bar_height']) && !empty($this->xe_options['blog_title_bar_height']) ) ? $this->xe_options['blog_title_bar_height'] : '';

				// Archive > Content
				$this->padding_top = ( isset($this->xe_options['blog_padding_top']) && !empty($this->xe_options['blog_padding_top']) ) ? $this->xe_options['blog_padding_top'] : '100';
				$this->padding_bottom = ( isset($this->xe_options['blog_padding_bottom']) && !empty($this->xe_options['blog_padding_bottom']) ) ? $this->xe_options['blog_padding_bottom'] : '100';

				// Archive > Sidebars				
				$this->rdx_sidebar_position = ( isset($this->xe_options['blog_sidebar_position']) && !empty($this->xe_options['blog_sidebar_position']) ) ? $this->xe_options['blog_sidebar_position'] : 'right';

				$this->rdx_left_sidebar_selector = ( isset($this->xe_options['blog_left_sidebar_selector']) && !empty($this->xe_options['blog_left_sidebar_selector']) ) ? $this->xe_options['blog_left_sidebar_selector'] : 'sidebar-1';

				$this->rdx_right_sidebar_selector = ( isset($this->xe_options['blog_right_sidebar_selector']) && !empty($this->xe_options['blog_right_sidebar_selector']) ) ? $this->xe_options['blog_right_sidebar_selector'] : 'sidebar-2';

			}

		/**
		 * Search
		 */
		} elseif ( is_search() ) {

			// Search > Tool-Bar
			$this->tool_bar['switch'] = ( isset($this->xe_options['search_tool_bar']) && !empty($this->xe_options['search_tool_bar']) ) ? $this->xe_options['search_tool_bar'] : 'default';

			if ($this->tool_bar['switch'] == 'default' || $this->tool_bar['switch']) {

				$this->tool_bar['switch'] = ( isset($this->xe_options['tool_bar_switch']) ) ? $this->xe_options['tool_bar_switch'] : false;

			}

			// Search > Header
			$this->header['style'] = ( isset($this->xe_options['search_header_style']) && !empty($this->xe_options['search_header_style']) ) ? $this->xe_options['search_header_style'] : 'default';

			if ($this->header['style'] == 'default' || $this->header['style'] == '') {

				$this->header['style'] = ( isset($this->xe_options['header_style']) && !empty($this->xe_options['header_style']) ) ? $this->xe_options['header_style'] : '';

			}

			$this->header['location'] = ( isset($this->xe_options['search_header_location']) && !empty($this->xe_options['search_header_location']) ) ? $this->xe_options['search_header_location'] : 'default';

			if ($this->header['location'] == 'default' || $this->header['location'] == '') {

				$this->header['location'] = ( isset($this->xe_options['header_location']) && !empty($this->xe_options['header_location']) ) ? $this->xe_options['header_location'] : 'top';

			}

			$this->header['menu'] = ( isset($this->xe_options['search_header_menu']) && !empty($this->xe_options['search_header_menu']) ) ? $this->xe_options['search_header_menu'] : 'primary-menu';

			// Search > Title-Bar
			$this->title_bar['switch'] = ( isset($this->xe_options['search_title_bar']) ) ? $this->xe_options['search_title_bar'] : true;

			$this->title_bar['title'] = ( isset($this->xe_options['search_title']) && !empty($this->xe_options['search_title']) ) ? $this->xe_options['search_title'] : 'Search Result';

			$this->title_bar['subtitle'] = ( isset($this->xe_options['search_subtitle']) && !empty($this->xe_options['search_subtitle']) ) ? $this->xe_options['search_subtitle'] : 'Not what you looking for? Maybe try again...';

			$this->title_bar['height'] = ( isset($this->xe_options['search_title_bar_height']) && !empty($this->xe_options['search_title_bar_height']) ) ? $this->xe_options['search_title_bar_height'] : '';

			// Search > Content
			$this->padding_top = ( isset($this->xe_options['search_padding_top']) && !empty($this->xe_options['search_padding_top']) ) ? $this->xe_options['search_padding_top'] : '100';

			$this->padding_bottom = ( isset($this->xe_options['search_padding_bottom']) && !empty($this->xe_options['search_padding_bottom']) ) ? $this->xe_options['search_padding_bottom'] : '100';

		/**
		 * Error 404
		 */
		} elseif ( is_404() ) {

			// Error > Tool-Bar
			$this->tool_bar['switch'] = ( isset($this->xe_options['error_tool_bar']) && !empty($this->xe_options['error_tool_bar']) ) ? $this->xe_options['error_tool_bar'] : 'default';

			if ($this->tool_bar['switch'] == 'default' || $this->tool_bar['switch']) {

				$this->tool_bar['switch'] = ( isset($this->xe_options['tool_bar_switch']) ) ? $this->xe_options['tool_bar_switch'] : false;

			}

			// Error > Header
			$this->header['style'] = ( isset($this->xe_options['error_header_style']) && !empty($this->xe_options['error_header_style']) ) ? $this->xe_options['error_header_style'] : 'default';

			if ($this->header['style'] == 'default' || $this->header['style'] == '') {

				$this->header['style'] = ( isset($this->xe_options['header_style']) && !empty($this->xe_options['header_style']) ) ? $this->xe_options['header_style'] : '';

			}

			$this->header['location'] = ( isset($this->xe_options['error_header_location']) && !empty($this->xe_options['error_header_location']) ) ? $this->xe_options['error_header_location'] : 'default';

			if ($this->header['location'] == 'default' || $this->header['location'] == '') {

				$this->header['location'] = ( isset($this->xe_options['header_location']) && !empty($this->xe_options['header_location']) ) ? $this->xe_options['header_location'] : 'top';

			}

			$this->header['menu'] = ( isset($this->xe_options['error_header_menu']) && !empty($this->xe_options['error_header_menu']) ) ? $this->xe_options['error_header_menu'] : 'primary-menu';

			// Error > Title-Bar
			$this->title_bar['switch'] = ( isset($this->xe_options['error_title_bar']) ) ? $this->xe_options['error_title_bar'] : true;

			$this->title_bar['title'] = ( isset($this->xe_options['error_title']) && !empty($this->xe_options['error_title']) ) ? $this->xe_options['error_title'] : 'Error 404';

			$this->title_bar['subtitle'] = ( isset($this->xe_options['error_subtitle']) && !empty($this->xe_options['error_subtitle']) ) ? $this->xe_options['error_subtitle'] : 'Error 404! Page Not Found.';

			$this->title_bar['height'] = ( isset($this->xe_options['error_title_bar_height']) && !empty($this->xe_options['error_title_bar_height']) ) ? $this->xe_options['error_title_bar_height'] : '';

			// Error > Content
			$this->padding_top = ( isset($this->xe_options['error_padding_top']) && !empty($this->xe_options['error_padding_top']) ) ? $this->xe_options['error_padding_top'] : '100';
			
			$this->padding_bottom = ( isset($this->xe_options['error_padding_bottom']) && !empty($this->xe_options['error_padding_bottom']) ) ? $this->xe_options['error_padding_bottom'] : '100';

			$this->img_404 = ( isset($this->xe_options['error_image']) && !empty($this->xe_options['error_image']['url']) ) ? $this->xe_options['error_image']['url'] : '';

		}

	}

	/**
	 * Get ACF fields value
	 */
	protected function get_acf($acf, $default = '', $single = true) {

		if ( function_exists('get_field') && $single == true ) {
			$output = get_field($acf);
		} else {
			$output = '';
		}

		return $output;
		
	}

	/**
	 * Get Redux fields value
	 */
	protected function get_redux($redux, $default = '') {

		if ( isset($this->xe_options[$redux]) && !empty($this->xe_options[$redux]) ) {
			$output = $this->xe_options[$redux];
		} else {
			$output = '';
		}

		return $output;
		
	}

	/**
	 * Menu Items
	 */
	public function menu_items($items, $args) {

		// var_dump($items);
	
		foreach( $items as &$item ) {
			
			$target = function_exists('get_field') ? get_field('menu_target', $item) : '';
			$target = ( !empty($target) ) ? $target : '_self';
			
			if ( $target ) {
				
				$item->target = $target;
				
			}
			
		}
		
		return $items;
		
	}

	/**
	 * Add Favicon
	 */
	public function add_favicon() {
        
        if ( isset($this->xe_options['favicon']) && !empty($this->xe_options['favicon']['url']) ) {
            echo '<link rel="shortcut icon" href="' . esc_url($this->xe_options['favicon']['url']) . '" />' . "\n";
        } else {
            echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/img/favicon/favicon.png" />' . "\n";
        }

        if ( isset($this->xe_options['iphone_favicon']) && !empty($this->xe_options['iphone_favicon']['url']) ) {
            echo '<link rel="apple-touch-icon" href="' . esc_url($this->xe_options['iphone_favicon']['url']) . '">' . "\n";
        }
        
        if ( isset($this->xe_options['iphone_retina_favicon']) && !empty($this->xe_options['iphone_retina_favicon']['url']) ) {
            echo '<link rel="apple-touch-icon" sizes="114x114" href="' . esc_url($this->xe_options['iphone_retina_favicon']['url']) . '">' . "\n";
        }
        
        if ( isset($this->xe_options['ipad_favicon']) && !empty($this->xe_options['ipad_favicon']['url']) ) {
            echo '<link rel="apple-touch-icon" sizes="72x72" href="' . esc_url($this->xe_options['ipad_favicon']['url']) . '">' . "\n";
        }
        
        if ( isset($this->xe_options['ipad_retina_favicon']) && !empty($this->xe_options['ipad_retina_favicon']['url']) ) {
            echo '<link rel="apple-touch-icon" sizes="144x144" href="' . esc_url($this->xe_options['ipad_retina_favicon']['url']) . '">' . "\n";
        }

    }

    /**
     * Return Sidebar Position and Active Sidebar
     */
    public function sidebar() {

    	$sidebar = array(
			'position' => 'none',
			'left' => '',
			'right' => ''
		);

		if ( $this->acf_sidebar_position == 'left' && is_active_sidebar($this->acf_left_sidebar_selector) ) {

			$sidebar['position'] = 'left';
			$sidebar['left'] = $this->acf_left_sidebar_selector;

		} elseif ( $this->acf_sidebar_position == 'left' && is_active_sidebar($this->rdx_left_sidebar_selector) ) {

			$sidebar['position'] = 'left';
			$sidebar['left'] = $this->rdx_left_sidebar_selector;

		} elseif ( $this->acf_sidebar_position == 'right' && is_active_sidebar($this->acf_right_sidebar_selector) ) {

			$sidebar['position'] = 'right';
			$sidebar['right'] = $this->acf_right_sidebar_selector;

		} elseif ( $this->acf_sidebar_position == 'right' && is_active_sidebar($this->rdx_right_sidebar_selector) ) {

			$sidebar['position'] = 'right';
			$sidebar['right'] = $this->rdx_right_sidebar_selector;

		} elseif ( $this->acf_sidebar_position == 'both' && is_active_sidebar($this->acf_left_sidebar_selector) && is_active_sidebar($this->acf_right_sidebar_selector) ) {

			$sidebar['position'] = 'both';
			$sidebar['left'] = $this->acf_left_sidebar_selector;
			$sidebar['right'] = $this->acf_right_sidebar_selector;

		} elseif ( $this->acf_sidebar_position == 'both' && is_active_sidebar($this->rdx_left_sidebar_selector) && is_active_sidebar($this->rdx_right_sidebar_selector) ) {

			$sidebar['position'] = 'both';
			$sidebar['left'] = $this->rdx_left_sidebar_selector;
			$sidebar['right'] = $this->rdx_right_sidebar_selector;

		} elseif ( $this->acf_sidebar_position == 'both' && is_active_sidebar($this->acf_left_sidebar_selector) ) {

			$sidebar['position'] = 'left';
			$sidebar['left'] = $this->acf_left_sidebar_selector;

		} elseif ( $this->acf_sidebar_position == 'both' && is_active_sidebar($this->rdx_left_sidebar_selector) ) {

			$sidebar['position'] = 'left';
			$sidebar['left'] = $this->rdx_left_sidebar_selector;

		} elseif ( $this->acf_sidebar_position == 'both' && is_active_sidebar($this->acf_right_sidebar_selector) ) {

			$sidebar['position'] = 'right';
			$sidebar['right'] = $this->acf_right_sidebar_selector;

		} elseif ( $this->acf_sidebar_position == 'both' && is_active_sidebar($this->rdx_right_sidebar_selector) ) {

			$sidebar['position'] = 'right';
			$sidebar['right'] = $this->rdx_right_sidebar_selector;

		} elseif ( $this->rdx_sidebar_position == 'left' && is_active_sidebar($this->rdx_left_sidebar_selector) ) {

			$sidebar['position'] = 'left';
			$sidebar['left'] = $this->rdx_left_sidebar_selector;

		} elseif ( $this->rdx_sidebar_position == 'right' && is_active_sidebar($this->rdx_right_sidebar_selector) ) {

			$sidebar['position'] = 'right';
			$sidebar['right'] = $this->rdx_right_sidebar_selector;

		} elseif ( $this->rdx_sidebar_position == 'both' && is_active_sidebar($this->rdx_left_sidebar_selector) && is_active_sidebar($this->rdx_right_sidebar_selector) ) {

			$sidebar['position'] = 'both';
			$sidebar['left'] = $this->rdx_left_sidebar_selector;
			$sidebar['right'] = $this->rdx_right_sidebar_selector;

		} elseif ( $this->rdx_sidebar_position == 'both' && is_active_sidebar($this->rdx_left_sidebar_selector) ) {

			$sidebar['position'] = 'left';
			$sidebar['left'] = $this->rdx_left_sidebar_selector;

		} elseif ( $this->rdx_sidebar_position == 'both' && is_active_sidebar($this->rdx_right_sidebar_selector) ) {

			$sidebar['position'] = 'right';
			$sidebar['right'] = $this->rdx_right_sidebar_selector;

		}

		return $sidebar;

	}

	/**
	 * Footer Section
	 */
    public function footer_section() {

		if ($this->footer['section'] == true && !empty($this->footer['selector']) ) :

			$args = array(
				'page_id' => $this->footer['selector']
			);
			$query = new WP_Query($args);

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) :
					$query->the_post();

					the_content();
					
				endwhile;
			}

			/* Restore original Post Data */
			wp_reset_postdata();

		endif;
		
    }

    /**
	 * Minifying styles 
	 */
    public function minify_css($css) {

		$css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
	    $css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);
	    $css = str_replace(array('{ ', ' {'), '{', $css);
	    $css = str_replace(array('} ', ' }'), '}', $css);
	    $css = str_replace('; ', ';', $css);
	    $css = str_replace(': ', ':', $css);
	    $css = str_replace(', ', ',', $css);
	    $css = str_replace(array('> ', ' >'), '>', $css);
	    $css = str_replace(array('+ ', ' +'), '+', $css);
	    $css = str_replace(array('~ ', ' ~'), '~', $css);
	    $css = str_replace(';}', '}', $css);

	    return $css;

	}

	/**
	 * Hex color to rgb conversion
	 */
    public function hex2rgb($color) {

        if ( $color[0] == '#' ) {
            $color = substr( $color, 1 );
        }
        if ( strlen( $color ) == 6 ) {
            list( $r, $g, $b ) = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
            list( $r, $g, $b ) = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
            return false;
        }

        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        
        return $r.', '.$g.', '.$b;

	}

	/**
	 * Darken or Lighten Color
	 */
	public function darken($color, $dif=20) {

		$color = str_replace('#','', $color);
		$rgb = '';

		if (strlen($color) != 6) {

			// reduce the default amount a little
			$dif = ($dif==20)?$dif/10:$dif;

			for ($x = 0; $x < 3; $x++) {

				$c = hexdec(substr($color,(1*$x),1)) - $dif;
				$c = ($c < 0) ? 0 : dechex($c);
				$rgb .= $c;

			}

		} else {

			for ($x = 0; $x < 3; $x++) {

				$c = hexdec(substr($color, (2*$x),2)) - $dif;
				$c = ($c < 0) ? 0 : dechex($c);
				$rgb .= (strlen($c) < 2) ? '0'.$c : $c;

			}

		}

		return '#'.$rgb;

	}

	/**
	 * Adjusting spacing of classes
	 */
	public function classes( $classes = array() ) {

		$classes = implode(' ', $classes);
		$classes = trim( preg_replace('/\s+/', ' ', $classes) );

		return $classes;

	}

}
global $xe_opt; 
$xe_opt = new Xe_ThemeOptions();
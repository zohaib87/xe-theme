<?php 
/**
 * Class to get and use Theme and Page options.
 *
 * @package _xe
 */

use Helpers\Xe_Defaults as De;

class Xe_ThemeOptions {

  // General
	public $site_layout, $boxed_layout_bg, $boxed_layout_class, $bg, $container,
	$preloader, $current_menu, $primary_color,

	// Top_Bar
	$top_bar,

	// Header
	$header, $dropdown, $logo,

	// Title_Bar
	$title_bar,

	// Content
	$bg_color, $slider, $padding_top, $padding_bottom,
	$left_sidebar_width, $right_sidebar_width,
	$po_sidebar_position, $po_left_sidebar_selector, $po_right_sidebar_selector,
	$to_sidebar_position, $to_left_sidebar_selector, $to_right_sidebar_selector,
	
	// Footer
	$sub_footer, $footer,

	// Blog, Post, Page, Portfolio, Events, WooCommerce, Search and Error 404
	$blog, $comments, $post_comments, $page_comments, $product_reviews, $excerpt_length, $portfolio, $event, $shop, $img_404, $related_posts, $related_products,

	// Social_Profiles
	$social;

	function __construct() {

		// Assign Theme and Page Option values to variables
    add_action( 'wp', array($this, 'init_vars') );

	}

  /**
   * Initialize variables for use.
   */
	public function init_vars() {

    /**
     * Check if its Single Page.
     * @return true or false
     */
    function _xe_signle() {

      $product = ( function_exists('is_product') && is_product() ) ? true : false;
      $single = ( is_single() || is_page() || is_singular() || $product ) ? '1' : '0';

      if ( function_exists('rwmb_meta') && $single == true ) {
        return true;
      } else {
        return false;
      }
      
    }

    /**
     * Check if Single Page overrides Theme Options.
     * @return true or false
     */
    function _xe_override($value, $numeric = false) {

      $option = rwmb_meta($value);

      if ( $numeric == true ) {
        $check = is_numeric($option);
      } else {
        $check = !empty($option) && $option != 'default';
      }

      if ( $check ) {
        return true;
      } else {
        return false;
      }

    }
    
    /**
     * General_Options
     */
    $this->preloader = get_theme_mod( 'preloader', De::$preloader );
    $this->padding_top = get_theme_mod( 'padding_top', De::$padding_top );
    $this->padding_bottom = get_theme_mod( 'padding_bottom', De::$padding_bottom );
    $this->min_css = get_theme_mod( 'min_css', De::$min_css );
    $this->min_js = get_theme_mod( 'min_js', De::$min_js );

    // Page Options for General_Options
    if ( _xe_signle() ) :

      if ( _xe_override('padding_top', true) ) {
        $this->padding_top = rwmb_meta('padding_top');
      }
      if ( _xe_override('padding_bottom', true) ) {
        $this->padding_bottom = rwmb_meta('padding_bottom');
      }

    endif;
    
    /**
     * Site_Layout
     */
    $this->site_layout = get_theme_mod('site_layout', De::$site_layout);
    $this->main_grid_width = get_theme_mod('main_grid_width', De::$main_grid_width);
    $this->boxed_layout_margin = get_theme_mod('boxed_layout_margin', De::$boxed_layout_margin);

    $this->boxed_layout_bg = get_theme_mod('boxed_layout_bg', De::$boxed_layout_bg);
    
    $this->bg['bg-color'] = !empty($this->boxed_layout_bg['background-color']) ? $this->boxed_layout_bg['background-color'] : '';
    $this->bg['bg-repeat'] = !empty($this->boxed_layout_bg['background-repeat']) ? $this->boxed_layout_bg['background-repeat'] : '';
    $this->bg['bg-size'] = !empty($this->boxed_layout_bg['background-size']) ? $this->boxed_layout_bg['background-size'] : '';
    $this->bg['bg-attachment'] = !empty($this->boxed_layout_bg['background-attachment']) ? $this->boxed_layout_bg['background-attachment'] : '';
    $this->bg['bg-position'] = !empty($this->boxed_layout_bg['background-position']) ? $this->boxed_layout_bg['background-position'] : '';
    $this->bg['bg-image'] = !empty($this->boxed_layout_bg['background-image']) ? $this->boxed_layout_bg['background-image'] : '';

    // Setup Classes for Site_Layout
    $this->container = ($this->site_layout == 'full-width') ? 'container-fluid' : 'container';
    $this->boxed_layout_class = ($this->site_layout == 'boxed') ? 'bg' : '';

    /**
     * Color_Scheme
     */
    $this->primary_color = get_theme_mod('primary_color', De::$primary_color);
    $this->txt_selection_color = get_theme_mod('txt_selection_color', De::$txt_selection_color);
    $this->txt_selection_bg_color = get_theme_mod('txt_selection_bg_color', De::$txt_selection_bg_color);
    $this->bg_color = get_theme_mod('bg_color', De::$bg_color);

    /**
     * Top_Bar
     */
    $this->top_bar['switch'] = get_theme_mod('top_bar_switch', De::$top_bar_switch);
    $this->top_bar['menu'] = get_theme_mod('top_bar_menu', De::$top_bar_menu);
    $this->top_bar['social'] = get_theme_mod('top_bar_social', De::$top_bar_social);
    $this->top_bar['text-color'] = get_theme_mod('top_bar_text_color', De::$top_bar_text_color);
    $this->top_bar['bg-color'] = get_theme_mod('top_bar_bg_color', De::$top_bar_bg_color);
    $this->top_bar['phone'] = get_theme_mod( 'top_bar_phone', De::$top_bar_phone );
    $this->top_bar['email'] = get_theme_mod( 'top_bar_email', De::$top_bar_email );

    /**
     * Header
     */
    $this->header['style'] = get_theme_mod('header_style', De::$header_style);
    $this->header['container'] = get_theme_mod('header_container', De::$header_container);
    $this->header['menu'] = get_theme_mod('header_menu', De::$header_menu);
    $this->logo['dark'] = get_theme_mod( 'header_logo', De::$header_logo );
    $this->logo['light'] = get_theme_mod( 'header_light_logo', De::$header_light_logo );
    $this->header['search'] = get_theme_mod('header_search', De::$header_search);
    $this->header['cart'] = get_theme_mod('header_cart', De::$header_cart);
    $this->header['social'] = get_theme_mod('header_social', De::$header_social);

    // Page Options for Header
    if ( _xe_signle() ) :

      if ( _xe_override('header_menu') ) {
        $this->header['menu'] = rwmb_meta('header_menu');
      }

    endif;

    /**
     * Title_Bar
     */
    $this->title_bar['switch'] = get_theme_mod('title_bar_switch', De::$title_bar_switch);
    $this->title_bar['subtitle'] = '';
    $this->title_bar['title-color'] = get_theme_mod('title_color', De::$title_color);
    $this->title_bar['subtitle-color'] = get_theme_mod('subtitle_color', De::$subtitle_color);
    $this->title_bar['breadcrumb'] = get_theme_mod('breadcrumb', De::$breadcrumb);
    $this->title_bar['bg-color'] = get_theme_mod('title_bar_bg_color', De::$title_bar_bg_color);
    $this->title_bar['bg-image'] = get_theme_mod('title_bar_bg_img', De::$title_bar_bg_img);
    $this->title_bar['bg-overlay'] = get_theme_mod('title_bar_overlay', De::$title_bar_overlay);

    // Page Options for Title_Bar
    if ( _xe_signle() ) :

      if ( _xe_override('title_bar_switch') ) {
        $this->title_bar['switch'] = rwmb_meta('title_bar_switch');
      }
      if ( _xe_override('subtitle') ) {
        $this->title_bar['subtitle'] = rwmb_meta('subtitle');
      }

    endif;

    /**
     * Titles & Subtitles
     */
    if ( is_home() ) :

      $this->title_bar['title'] = get_theme_mod( 'blog_title', De::$blog_title );
      $this->title_bar['subtitle'] = get_theme_mod( 'blog_subtitle', De::$blog_subtitle );
       
    elseif ( is_archive() ) :

      if ( function_exists('is_shop') && is_shop() ) {

        $this->title_bar['title'] = get_theme_mod( 'shop_title', De::$shop_title );
        $this->title_bar['subtitle'] = get_theme_mod( 'shop_subtitle', De::$shop_subtitle );
      
      } else {

        if ( is_category() ) :

          $this->title_bar['title'] = 'Posts in the <em>' . single_cat_title('', false) . '</em> category';

        elseif ( is_tag() ) :

          $this->title_bar['title'] = 'Posts with the <em>' . single_tag_title('', false) . '</em> tag';

        elseif ( is_author() ) :

          $this->title_bar['title'] = 'Posts by Author: <span class="vcard">' . ucwords(get_the_author_meta('display_name')) . '</span>';

        elseif ( is_day() ) :

          $this->title_bar['title'] = 'Posts from <span>' . get_the_date() . '</span>';

        elseif ( is_month() ) :

          $this->title_bar['title'] = 'Posts from <span>' . get_the_date('F Y') . '</span>';

        elseif ( is_year() ) :

          $this->title_bar['title'] = 'Posts from <span>' . get_the_date('Y') . '</span>';

        elseif ( function_exists('is_product_category') && is_product_category() ) :

          $this->title_bar['title'] = 'Products in the <em>' . single_cat_title('', false) . '</em> category';

        elseif ( function_exists('is_product_tag') && is_product_tag() ) :

          $this->title_bar['title'] = 'Products with the <em>' . single_tag_title('', false) . '</em> tag';

        else :

          $this->title_bar['title'] = 'Archives';

        endif;

      }

    elseif ( is_search() ) :

      $this->title_bar['title'] = get_theme_mod( 'search_title', De::$search_title );
      $this->title_bar['subtitle'] = get_theme_mod( 'search_subtitle', De::$search_subtitle );

    elseif ( is_404() ) :

      $this->title_bar['title'] = get_theme_mod( 'error_title', De::$error_title );
      $this->title_bar['subtitle'] = get_theme_mod( 'error_subtitle', De::$error_subtitle );

    else :

      $this->title_bar['title'] = get_the_title();

    endif;
    
    /**
     * Sidebars
     */
    $this->left_sidebar_width = get_theme_mod('left_sidebar_width', De::$left_sidebar_width);
    $this->right_sidebar_width = get_theme_mod('right_sidebar_width', De::$right_sidebar_width);
    $this->sidebar_position = get_theme_mod('sidebar_position', De::$sidebar_position);
    $this->left_sidebar_selector = get_theme_mod('left_sidebar_selector', De::$left_sidebar_selector);
    $this->right_sidebar_selector = get_theme_mod('right_sidebar_selector', De::$right_sidebar_selector);

    // Page Options for Sidebar
    if ( _xe_signle() ) :

      if ( _xe_override('left_sidebar_width', true) ) {
        $this->left_sidebar_width = rwmb_meta('left_sidebar_width');
      }
      if ( _xe_override('right_sidebar_width', true) ) {
        $this->right_sidebar_width = rwmb_meta('right_sidebar_width');
      }
      if ( _xe_override('sidebar_position') ) {
        $this->sidebar_position = rwmb_meta('sidebar_position');
      }
      if ( _xe_override('left_sidebar_selector') ) {
        $this->left_sidebar_selector = rwmb_meta('left_sidebar_selector');
      }
      if ( _xe_override('right_sidebar_selector') ) {
        $this->right_sidebar_selector = rwmb_meta('right_sidebar_selector');
      }

    endif;

    /**
     * Footer
     */
    $this->footer['style'] = get_theme_mod('footer_style', De::$footer_style);
    $this->footer['logo'] = get_theme_mod( 'footer_logo', De::$footer_logo );
    $this->footer['bg-color'] = get_theme_mod('footer_bg_color', De::$footer_bg_color);
    $this->footer['text-color'] = get_theme_mod('footer_text_color', De::$footer_text_color);
    $this->footer['copyright'] = get_theme_mod('copyright_info', De::$copyright_info);
    $this->footer['social'] = get_theme_mod('footer_social', De::$footer_social);
    $this->sub_footer = get_theme_mod('sub_footer', De::$sub_footer);

    $this->footer['copyright'] = str_replace('|Y|', date('Y'), $this->footer['copyright']);
    $this->footer['copyright'] = str_replace('|y|', date('y'), $this->footer['copyright']);
    
    /**
     * Social_Profiles
     */
    $this->social['facebook'] = get_theme_mod('social_facebook', De::$social_facebook);
    $this->social['twitter'] = get_theme_mod('social_twitter', De::$social_twitter);
    $this->social['github'] = get_theme_mod('social_github', De::$social_github);
    $this->social['behance'] = get_theme_mod('social_behance', De::$social_behance);
    $this->social['dribbble'] = get_theme_mod('social_dribbble', De::$social_dribbble);
    $this->social['pinterest'] = get_theme_mod('social_pinterest', De::$social_pinterest);
    $this->social['instagram'] = get_theme_mod('social_instagram', De::$social_instagram);
    $this->social['linkedin'] = get_theme_mod('social_linkedin', De::$social_linkedin);
    $this->social['tumblr'] = get_theme_mod('social_tumblr', De::$social_tumblr);
    $this->social['youtube'] = get_theme_mod('social_youtube', De::$social_youtube);
    $this->social['vimeo'] = get_theme_mod('social_vimeo', De::$social_vimeo);
    
    /**
     * Blog
     */
    $this->excerpt_length = get_theme_mod('excerpt_length', De::$excerpt_length);
    
    /**
     * Columns
     */
    $this->blog['columns'] = get_theme_mod('blog_columns', De::$blog_columns);
    $this->shop['columns'] = get_theme_mod('shop_columns', De::$shop_columns);
    
    /**
     * Related_Items
     */
    $this->related_posts = get_theme_mod('related_posts', De::$related_posts);
    $this->related_products = get_theme_mod('related_products', De::$related_products);

    /**
     * Comments
     */
    $this->post_comments = get_theme_mod('post_comments', De::$post_comments);
    $this->page_comments = get_theme_mod('page_comments', De::$page_comments);
    $this->product_reviews = get_theme_mod('product_reviews', De::$product_reviews);

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

		if ( $this->sidebar_position == 'left' && is_active_sidebar($this->left_sidebar_selector) ) {

			$sidebar['position'] = 'left';
			$sidebar['left'] = $this->left_sidebar_selector;

		} elseif ( $this->sidebar_position == 'right' && is_active_sidebar($this->right_sidebar_selector) ) {

			$sidebar['position'] = 'right';
			$sidebar['right'] = $this->right_sidebar_selector;

    } elseif ( $this->sidebar_position == 'both' && is_active_sidebar($this->left_sidebar_selector) && is_active_sidebar($this->right_sidebar_selector) ) {

      $sidebar['position'] = 'both';
      $sidebar['left'] = $this->left_sidebar_selector;
      $sidebar['right'] = $this->right_sidebar_selector;

    } elseif ( $this->sidebar_position == 'both' && is_active_sidebar($this->left_sidebar_selector) ) {

      $sidebar['position'] = 'both';
      $sidebar['left'] = $this->left_sidebar_selector;

    } elseif ( $this->sidebar_position == 'both' && is_active_sidebar($this->right_sidebar_selector) ) {

      $sidebar['position'] = 'both';
      $sidebar['right'] = $this->right_sidebar_selector;

		}

		return $sidebar;

	}

}
global $xe_opt; 
$xe_opt = new Xe_ThemeOptions();

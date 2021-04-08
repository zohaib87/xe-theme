<?php
/**
 * Class for containing default values.
 *
 * @package _xe
 */

namespace Helpers;

if (!class_exists('Xe_Defaults')) :

class Xe_Defaults {

  public static $priority,

  // General_Options
  $preloader, $padding_top, $padding_bottom, $min_css, $min_js,

  // Site_Layout
  $site_layout, $main_grid_width, $boxed_layout_margin, $boxed_layout_bg,

  // Color_Scheme
  $primary_color, $txt_selection_color, $txt_selection_bg_color, $bg_color,

  // Typography
  $h1_size, $h2_size, $h3_size, $h4_size, $h5_size, $h6_size,

  // Top_Bar
  $top_bar_switch, $top_bar_menu, $top_bar_social, $top_bar_text_color, $top_bar_bg_color, $top_bar_phone, $top_bar_email,

  // Header
  $header_style, $header_container, $header_menu, $header_bg, $header_logo, $header_light_logo, $header_search, $header_cart, $header_social,

  // Title_Bar
  $title_bar_switch, $title_color, $subtitle_color, $breadcrumb, $title_bar_parallax, $title_bar_bg_color, $title_bar_bg_img, $title_bar_overlay, $title_bar_height, $title_bar_pt, $title_bar_pb,

  // Titles
  $blog_title, $search_title, $error_title, $shop_title,

  // Subtitles
  $blog_subtitle, $search_subtitle, $error_subtitle, $shop_subtitle,
  
  // Sidebars
  $left_sidebar_width, $right_sidebar_width, $sidebar_position, $left_sidebar_selector, $right_sidebar_selector,

  // Footer
  $footer_style, $footer_section, $footer_selector, $footer_logo, $footer_bg_color, $footer_bg_img, $title_bar_bg_repeat, $title_bar_bg_size, $title_bar_bg_attachment, $title_bar_bg_position, $footer_text_color, $copyright_info, $footer_social, $sub_footer,

  // Social_Profiles
  $social_facebook, $social_twitter, $social_github, $social_behance, $social_dribbble, $social_pinterest, $social_instagram, $social_linkedin, $social_tumblr, $social_youtube, $social_vimeo,

  // Blog
  $blog_style, $excerpt_length,

  // Columns
  $blog_columns, $shop_columns,

  // Related_Items
  $related_posts, $related_products,

  // Comments
  $post_comments, $page_comments, $product_reviews;

  function __construct() {

    // General_Options
    Self::$preloader = 'off';
    Self::$padding_top = '25';
    Self::$padding_bottom = '25';
    Self::$min_css = 'off';
    Self::$min_js = 'off';

    // Site_Layout
    Self::$site_layout = 'wide';
    Self::$main_grid_width = '1170';
    Self::$boxed_layout_margin = 50;
    Self::$boxed_layout_bg = '';

    // Color_Scheme
    Self::$primary_color = '#0073aa';
    Self::$txt_selection_color = '#fff';
    Self::$txt_selection_bg_color = '#0073aa';
    Self::$bg_color = '#fff';

    // Top_Bar
    Self::$top_bar_switch = 'on';
    Self::$top_bar_menu = 'second-menu';
    Self::$top_bar_social = 'on';
    Self::$top_bar_text_color = '#cbcbcb';
    Self::$top_bar_bg_color = 'rgba(26,26,26,.5)';
    Self::$top_bar_phone = esc_html__( '+92 308 5039935', '_xe' );
    Self::$top_bar_email = esc_html__( 'info@xecreators.pk', '_xe' );

    // Header
    Self::$header_style = '';
    Self::$header_container = 'container';
    Self::$header_menu = 'primary-menu';
    Self::$header_bg = get_template_directory_uri() . '/assets/img/header-bg.jpg';
    Self::$header_logo = get_template_directory_uri() . '/assets/img/logo.png';
    Self::$header_light_logo = get_template_directory_uri() . '/assets/img/light-logo.png';
    Self::$header_search = 'on';
    Self::$header_cart = 'on';
    Self::$header_social = 'on';

    // Title_Bar
    Self::$title_bar_switch = 'on';
    Self::$title_color = '#fff';
    Self::$subtitle_color = '#fff';
    Self::$breadcrumb = 'on';
    Self::$title_bar_parallax = 'on';
    Self::$title_bar_bg_color = '#E3E3E3';
    Self::$title_bar_bg_img = get_template_directory_uri() . '/assets/img/title-bar-bg.jpg';
    Self::$title_bar_bg_repeat = 'no-repeat';
    Self::$title_bar_bg_size = 'cover'; 
    Self::$title_bar_bg_attachment = 'scroll'; 
    Self::$title_bar_bg_position = 'center center';
    Self::$title_bar_overlay = 'rgba(0, 0, 0, 0.8)';
    Self::$title_bar_height = 'auto';
    Self::$title_bar_pt = '80';
    Self::$title_bar_pb = '80';

    // Titles
    Self::$blog_title = esc_html__( 'The Blog', '_xe' );
    Self::$search_title = esc_html__( 'Search Results', '_xe' );
    Self::$error_title = esc_html__( 'Error 404', '_xe' );
    Self::$shop_title = esc_html__( 'Shop', '_xe' );

    // Subtitles
    Self::$blog_subtitle = esc_html__( 'Welcome to amazing blog!', '_xe' );
    Self::$search_subtitle = esc_html__( 'Not what you looking for? Maybe try again...', '_xe' );
    Self::$error_subtitle = esc_html__( 'Error 404! Page Not Found.', '_xe' );
    Self::$shop_subtitle = esc_html__( 'Checkout Our Amazing Products!', '_xe' );

    // Sidebars
    Self::$left_sidebar_width = 26;
    Self::$right_sidebar_width = 26;
    Self::$sidebar_position = 'right';
    Self::$left_sidebar_selector = 'sidebar-1';
    Self::$right_sidebar_selector = 'sidebar-2';

    // Footer
    Self::$footer_style = '';
    Self::$footer_section = 'off';
    Self::$footer_selector = '';
    Self::$footer_logo = get_template_directory_uri() . '/assets/img/logo.png';
    Self::$footer_bg_color = '#373737';
    Self::$footer_text_color = '#fff';
    Self::$copyright_info = '© 2018-|y| Xe Framework by <a href="https://www.xecreators.pk/">XeCreators</a>. Proudly powered by <a href="https://wordpress.org/">WordPress</a>';
    Self::$footer_social = 'off';
    Self::$sub_footer = 'off';

    // Social_Profiles
    Self::$social_facebook = '#';
    Self::$social_twitter = '#';
    Self::$social_github = '#';
    Self::$social_behance = '';
    Self::$social_dribbble = '';
    Self::$social_pinterest = '';
    Self::$social_instagram = '';
    Self::$social_linkedin = '';
    Self::$social_tumblr = '';
    Self::$social_youtube = '';
    Self::$social_vimeo = '';

    // Blog
    Self::$blog_style = '';
    Self::$excerpt_length = 40;

    // Columns
    Self::$blog_columns = '2';
    Self::$shop_columns = '4';

    // Related_Items
    Self::$related_posts = 'on';
    Self::$related_products = 'on';

    // Comments
    Self::$post_comments = 'on';
    Self::$page_comments = 'on';
    Self::$product_reviews = 'on';

  }

}
new Xe_Defaults();

endif;

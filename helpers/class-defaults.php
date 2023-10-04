<?php
/**
 * Class for containing default values.
 *
 * @package _xe
 */

namespace Xe_Theme\Helpers;

class Defaults {

  public static $priority,

  // General_Options
  $preloader, $padding_top, $padding_bottom,

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
    self::$preloader = 'off';
    self::$padding_top = '25';
    self::$padding_bottom = '25';

    // Site_Layout
    self::$site_layout = 'wide';
    self::$main_grid_width = '1170';
    self::$boxed_layout_margin = 50;
    self::$boxed_layout_bg = '';

    // Color_Scheme
    self::$primary_color = '#0073aa';
    self::$txt_selection_color = '#fff';
    self::$txt_selection_bg_color = '#0073aa';
    self::$bg_color = '#fff';

    // Top_Bar
    self::$top_bar_switch = 'on';
    self::$top_bar_menu = 'second-menu';
    self::$top_bar_social = 'on';
    self::$top_bar_text_color = '#cbcbcb';
    self::$top_bar_bg_color = 'rgba(26,26,26,.5)';
    self::$top_bar_phone = esc_html__('+92 308 5039935', '_xe');
    self::$top_bar_email = esc_html__('info@xecreators.pk', '_xe');

    // Header
    self::$header_style = '';
    self::$header_container = 'container';
    self::$header_menu = 'primary-menu';
    self::$header_bg = get_template_directory_uri() . '/assets/img/header-bg.jpg';
    self::$header_logo = get_template_directory_uri() . '/assets/img/logo.png';
    self::$header_light_logo = get_template_directory_uri() . '/assets/img/light-logo.png';
    self::$header_search = 'on';
    self::$header_cart = 'on';
    self::$header_social = 'on';

    // Title_Bar
    self::$title_bar_switch = 'on';
    self::$title_color = '#fff';
    self::$subtitle_color = '#fff';
    self::$breadcrumb = 'on';
    self::$title_bar_parallax = 'on';
    self::$title_bar_bg_color = '#E3E3E3';
    self::$title_bar_bg_img = get_template_directory_uri() . '/assets/img/title-bar-bg.jpg';
    self::$title_bar_bg_repeat = 'no-repeat';
    self::$title_bar_bg_size = 'cover';
    self::$title_bar_bg_attachment = 'scroll';
    self::$title_bar_bg_position = 'center center';
    self::$title_bar_overlay = 'rgba(0, 0, 0, 0.8)';
    self::$title_bar_height = 'auto';
    self::$title_bar_pt = '80';
    self::$title_bar_pb = '80';

    // Titles
    self::$blog_title = esc_html__('The Blog', '_xe');
    self::$search_title = esc_html__('Search Results', '_xe');
    self::$error_title = esc_html__('Error 404', '_xe');
    self::$shop_title = esc_html__('Shop', '_xe');

    // Subtitles
    self::$blog_subtitle = esc_html__('Welcome to amazing blog!', '_xe');
    self::$search_subtitle = esc_html__('Not what you looking for? Maybe try again...', '_xe');
    self::$error_subtitle = esc_html__('Page Not Found.', '_xe');
    self::$shop_subtitle = esc_html__('Checkout Our Amazing Products!', '_xe');

    // Sidebars
    self::$left_sidebar_width = 26;
    self::$right_sidebar_width = 26;
    self::$sidebar_position = 'right';
    self::$left_sidebar_selector = 'sidebar-1';
    self::$right_sidebar_selector = 'sidebar-2';

    // Footer
    self::$footer_style = '';
    self::$footer_section = 'off';
    self::$footer_selector = '';
    self::$footer_logo = get_template_directory_uri() . '/assets/img/logo.png';
    self::$footer_bg_color = '#373737';
    self::$footer_text_color = '#fff';
    self::$copyright_info = '© 2018-|y| Xe Framework by <a href="https://www.xecreators.pk/">XeCreators</a>. Proudly powered by <a href="https://wordpress.org/">WordPress</a>';
    self::$footer_social = 'off';
    self::$sub_footer = 'off';

    // Social_Profiles
    self::$social_facebook = '#';
    self::$social_twitter = '#';
    self::$social_github = '#';
    self::$social_behance = '';
    self::$social_dribbble = '';
    self::$social_pinterest = '';
    self::$social_instagram = '';
    self::$social_linkedin = '';
    self::$social_tumblr = '';
    self::$social_youtube = '';
    self::$social_vimeo = '';

    // Blog
    self::$blog_style = '';
    self::$excerpt_length = 40;

    // Columns
    self::$blog_columns = '2';
    self::$shop_columns = '4';

    // Related_Items
    self::$related_posts = 'on';
    self::$related_products = 'on';

    // Comments
    self::$post_comments = 'on';
    self::$page_comments = 'on';
    self::$product_reviews = 'on';

  }

}
new Defaults();

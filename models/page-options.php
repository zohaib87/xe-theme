<?php
/**
 * Meta Box Page Options File
 *
 * @package _xe
 */

use Helpers\Xe_Helpers as Helper;

function _xe_page_options($meta_boxes) {

  require get_template_directory() . '/models/page-options/general.php';
  require get_template_directory() . '/models/page-options/site-layout.php';
  require get_template_directory() . '/models/page-options/color-scheme.php';
  require get_template_directory() . '/models/page-options/top-bar.php';
  require get_template_directory() . '/models/page-options/header.php';
  require get_template_directory() . '/models/page-options/title-bar.php';
  require get_template_directory() . '/models/page-options/sidebars.php';
  require get_template_directory() . '/models/page-options/footer.php';

  $meta_boxes[] = array(
    'title'      => __( 'Page Options', '_xe' ),
    'taxonomies' => 'category',
    'post_types' => 'post, page, product',

    'tabs'      => array(
      'general_tab'   => __( 'General', '_xe' ),
      'site_layout_tab' => __( 'Layout', '_xe' ),
      'color_scheme_tab' => __( 'Color Scheme', '_xe' ),
      'top_bar_tab'  => __( 'Top-Bar', '_xe' ),
      'header_tab'    => __( 'Header', '_xe' ),
      'title_bar_tab' => __( 'Title-Bar', '_xe' ),
      'sidebars_tab'   => __( 'Sidebars', '_xe' ),
      'footer_tab'    => __( 'Footer', '_xe' ),
    ),
    'tab_style' => 'left',

    'fields' => array(

      // General
      Helper::$general['padding_top'],
      Helper::$general['padding_bottom'],

      // Site_Layout
      Helper::$site_layout['site_layout'],
      Helper::$site_layout['main_grid_width'],
      Helper::$site_layout['boxed_layout_margin'],
      Helper::$site_layout['boxed_layout_bg'],

      // Color_Scheme
      Helper::$color_scheme['primary_color'],
      Helper::$color_scheme['txt_selection_color'],
      Helper::$color_scheme['txt_selection_bg_color'],
      Helper::$color_scheme['bg_color'],

      // Top_Bar
      Helper::$top_bar['top_bar_switch'],
      Helper::$top_bar['top_bar_bg_color'],
      Helper::$top_bar['top_bar_menu'],
      Helper::$top_bar['top_bar_social'],
      Helper::$top_bar['top_bar_phone_number'],
      Helper::$top_bar['top_bar_email'],

      // Header Tab
      Helper::$header['header_style'],
      Helper::$header['header_menu'],
      Helper::$header['logo'],
      Helper::$header['light_logo'],
      Helper::$header['search_form'],
      Helper::$header['header_cart'],
      Helper::$header['header_social'],

      // Title_Bar Tab
      Helper::$title_bar['title_bar_switch'],
      Helper::$title_bar['subtitle'],
      Helper::$title_bar['title_color'],
      Helper::$title_bar['subtitle_color'],
      Helper::$title_bar['title_bar_bg'],
      Helper::$title_bar['title_bar_bg_overlay'],
      Helper::$title_bar['breadcrumb'],
      Helper::$title_bar['title_bar_height'],

      // Sidebars Tab
      Helper::$sidebars['sidebar_position'],
      Helper::$sidebars['left_sidebar_selector'],
      Helper::$sidebars['right_sidebar_selector'],
      Helper::$sidebars['left_sidebar_width'],
      Helper::$sidebars['right_sidebar_width'],

      // Footer Tab
      Helper::$footer['footer_style'],
      Helper::$footer['footer_bg_color'],
      Helper::$footer['footer_text_color'],
      Helper::$footer['footer_logo'],
      Helper::$footer['footer_copyright'],
      Helper::$footer['footer_social'],

    ),
  );

  return $meta_boxes;
    
}
add_filter( 'rwmb_meta_boxes', '_xe_page_options' );
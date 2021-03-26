<?php 
/**
 * General Tab of Page Options.
 *
 * @package _xe
 */

use Helpers\Xe_Helpers as Helper;

Helper::$header['header_style'] = array(
  'id' => 'header_style',
  'name' => esc_html__( 'Header Style', '_xe' ),
  'type' => 'select',
  'options' => Helper::files_array('header', true),
  'multiple' => false,
  'select_all_none' => false,
  'std'  => '0',
  'tab'  => 'header_tab',
);

Helper::$header['header_menu'] = array(
  'id' => 'header_menu', 
  'name' => esc_html__( 'Header Menu Location', '_xe' ), 
  'type' => 'select',
  'options' => Helper::menu_locations(true),
  'multiple' => false,
  'select_all_none' => false,
  'std'  => '0',
  'tab'  => 'header_tab',
);

Helper::$header['header_bg'] = array(
  'id' => 'header_bg',
  'name' => esc_html__( 'Background', '_xe' ),
  'type' => 'image_advanced',
  'size' => 'full',
  'force_delete' => false,
  'max_file_uploads' => 1,
  'tab' => 'header_tab'
);

Helper::$header['logo'] = array(
  'id' => 'logo',
  'name' => esc_html__( 'Upload Logo', '_xe' ),
  'type' => 'image_advanced',
  'size' => 'full',
  'force_delete' => false,
  'max_file_uploads' => 1,
  'tab' => 'header_tab'
);

Helper::$header['light_logo'] = array(
  'id' => 'light_logo',
  'name' => esc_html__( 'Upload Light Logo', '_xe' ),
  'type' => 'image_advanced',
  'force_delete' => false,
  'max_file_uploads' => 1,
  'tab' => 'header_tab'
);

// Helper::$header['sticky_header'] = array(
//     'id' => 'sticky_header',
//     'name' => esc_html__( 'Sticky Header', '_xe' ),
//     'desc' => esc_html__( 'Enable to stick header to top while scrolling.', '_xe' ),
//     'type' => 'select',
//     'options' => array(
//         'default' => esc_html__( 'Default', '_xe' ),
//         'on' => esc_html__( 'Enable', '_xe' ),
//         'off' => esc_html__( 'Disable', '_xe' ),
//     ),
//     'multiple' => false,
//     'select_all_none' => false,
//     'std'  => 'default',
//     'tab'  => 'header_tab',
// );

Helper::$header['search_form'] = array(
  'id' => 'search_form',
  'name' => esc_html__( 'Search Form', '_xe' ),
  'type' => 'select',
  'options' => array(
    '0' => esc_html__( 'Default', '_xe' ),
    'on' => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' ),
  ),
  'multiple' => false,
  'select_all_none' => false,
  'std'  => '0',
  'tab'  => 'header_tab',
);

Helper::$header['header_cart'] = array(
  'id' => 'header_cart',
  'name' => esc_html__( 'Shopping Cart', '_xe' ),
  'type' => 'select',
  'options' => array(
    '0' => esc_html__( 'Default', '_xe' ),
    'on' => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' ),
  ),
  'multiple' => false,
  'select_all_none' => false,
  'std'  => '0',
  'tab'  => 'header_tab',
);

Helper::$header['header_social'] = array(
  'id' => 'header_social',
  'name' => esc_html__( 'Social Icons', '_xe' ),
  'type' => 'select',
  'options' => array(
    '0' => esc_html__( 'Default', '_xe' ),
    'on' => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' ),
  ),
  'multiple' => false,
  'select_all_none' => false,
  'std'  => '0',
  'tab'  => 'header_tab',
);

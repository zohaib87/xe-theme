<?php 
/**
 * Top-Bar Tab of Page Options.
 *
 * @package _xe
 */

use Helpers\Xe_Helpers as Helper;

Helper::$top_bar['top_bar_switch'] = array(
  'id' => 'top_bar_switch',
  'name' => esc_html__( 'Top-Bar', '_xe' ),
  'type' => 'select',
  'options' => array(
    '0' => esc_html__( 'Default', '_xe' ),
    'on' => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' ),
  ),
  'multiple' => false,
  'select_all_none' => false,
  'std'  => '0',
  'tab'  => 'top_bar_tab',
);

Helper::$top_bar['top_bar_menu'] = array(
  'id' => 'top_bar_menu',
  'name' => esc_html__( 'Menu Location', '_xe' ),
  'type' => 'select',
  'options' => Helper::menu_locations(true),
  'multiple' => false,
  'select_all_none' => false,
  'std'  => '0',
  'tab'  => 'top_bar_tab',
);

Helper::$top_bar['top_bar_social'] = array(
  'id' => 'top_bar_social',
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
  'tab'  => 'top_bar_tab',
);

Helper::$top_bar['top_bar_bg_color'] = array(
  'id' => 'top_bar_bg_color',
  'name' => esc_html__( 'Background Color', '_xe' ),
  'type' => 'color',
  'alpha_channel' => true,
  'tab' => 'top_bar_tab'
);

Helper::$top_bar['top_bar_phone_number'] = array(
  'id' => 'top_bar_phone_number', 
  'name' => esc_html__( 'Phone Number', '_xe' ),
  'desc' => esc_html__( 'Enter your/company phone number.', '_xe' ), 
  'type' => 'text',
  'tab' => 'top_bar_tab'
);

Helper::$top_bar['top_bar_email'] = array(
  'id' => 'top_bar_email', 
  'name' => esc_html__( 'Email', '_xe' ),
  'desc' => esc_html__( 'Enter your/company email.', '_xe' ), 
  'type' => 'text',
  'tab' => 'top_bar_tab'
);
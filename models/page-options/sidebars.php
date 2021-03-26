<?php 
/**
 * Sidebars Tab of Page Options.
 *
 * @package _xe
 */

use Helpers\Xe_Helpers as Helper;

Helper::$sidebars['sidebar_position'] = array(
  'id' => 'sidebar_position',
  'name' => esc_html__( 'Sidebar Position', '_xe' ),
  'type' => 'select',
  'options' => array(
    '0' => esc_html__( 'Default', '_xe' ),
    'none' => esc_html__( 'No Sidebar', '_xe' ),
    'left' => esc_html__( 'Left Sidebar', '_xe' ),
    'right' => esc_html__( 'Right Sidebar', '_xe' ),
    'both' => esc_html__( 'Left & Right Sidebars', '_xe' ),
  ),
  'multiple' => false,
  'select_all_none' => false,
  'std'  => '0',
  'tab'  => 'sidebars_tab',
);

Helper::$sidebars['left_sidebar_selector'] = array(
  'id' => 'left_sidebar_selector',
  'name' => esc_html__( 'Select Left Sidebar', '_xe' ),
  'type' => 'sidebar',
  'field_type' => 'select',
  'placeholder' => 'Default',
  'tab' => 'sidebars_tab'
);

Helper::$sidebars['right_sidebar_selector'] = array(
  'id' => 'right_sidebar_selector',
  'name' => esc_html__( 'Select Right Sidebar', '_xe' ),
  'type' => 'sidebar',
  'field_type' => 'select',
  'placeholder' => 'Default',
  'tab' => 'sidebars_tab'
);

Helper::$sidebars['left_sidebar_width'] = array(
  'id' => 'left_sidebar_width', 
  'name' => esc_html__( 'Left Sidebar Width', '_xe' ),
  'desc' => esc_html__( 'This option is in percent.', '_xe' ),
  'type' => 'number',
  'append' => '%',
  'tab' => 'sidebars_tab'
);

Helper::$sidebars['right_sidebar_width'] = array(
  'id' => 'right_sidebar_width', 
  'name' => esc_html__( 'Right Sidebar Width', '_xe' ),
  'desc' => esc_html__( 'This option is in percent.', '_xe' ),
  'type' => 'number',
  'append' => '%',
  'tab' => 'sidebars_tab'
);

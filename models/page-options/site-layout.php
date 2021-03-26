<?php 
/**
 * Site Layout Tab of Page Options.
 *
 * @package _xe
 */

use Helpers\Xe_Helpers as Helper;

Helper::$site_layout['site_layout'] = array(
  'id' => 'site_layout',
  'name' => esc_html__( 'Layout', '_xe' ),
  'type' => 'select',
  'options' => array(
    '0' => esc_html__( 'Default', '_xe' ),
    'boxed' => esc_html__( 'Boxed', '_xe' ),
    'wide' => esc_html__( 'Wide', '_xe' ),
    'full-width' => esc_html__( 'Full Width', '_xe' ),
  ),
  'multiple' => false,
  'select_all_none' => false,
  'std'  => '0',
  'tab'  => 'site_layout_tab',
);

Helper::$site_layout['main_grid_width'] = array(
  'id' => 'main_grid_width', 
  'name' => esc_html__( 'Main Grid Width', '_xe' ),
  'type' => 'number',
  'append' => 'px',
  'visible' => array( 
    'site_layout', 'in', array('wide', 'boxed'),
  ),
  'tab' => 'site_layout_tab'
);

Helper::$site_layout['boxed_layout_margin'] = array(
  'id' => 'boxed_layout_margin', 
  'name' => esc_html__( 'Boxed Layout Margin', '_xe' ),
  'desc' => esc_html__( 'Margin of boxed layout from top and bottom.', '_xe' ), 
  'type' => 'number',
  'append' => 'px',
  'visible' => array( 'site_layout', '=', 'boxed' ),
  'tab' => 'site_layout_tab'
);

Helper::$site_layout['boxed_layout_bg'] = array(
  'id'   => 'boxed_layout_bg',
  'name' => esc_html__( 'Boxed Layout Background', '_xe' ),
  'type' => 'background',
  'visible' => array( 'site_layout', '=', 'boxed' ),
  'tab' => 'site_layout_tab'
);

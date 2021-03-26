<?php 
/**
 * General Tab of Page Options.
 *
 * @package _xe
 */

use Helpers\Xe_Helpers as Helper;

// $general = array();

Helper::$general['padding_top'] = array(
  'id' => 'padding_top', 
  'name' => esc_html__( 'Spacing Top', '_xe' ),
  'desc' => esc_html__( 'Spacing after title-bar and before the main content.', '_xe' ),
  'type' => 'number',
  'append' => 'px',
  'tab' => 'general_tab'
);

Helper::$general['padding_bottom'] = array(
  'id' => 'padding_bottom', 
  'name' => esc_html__( 'Spacing Bottom', '_xe' ),
  'desc' => esc_html__( 'Spacing before footer or footer section.', '_xe' ),
  'type' => 'number',
  'append' => 'px',
  'tab' => 'general_tab'
);

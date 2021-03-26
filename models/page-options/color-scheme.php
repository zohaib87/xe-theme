<?php 
/**
 * Color Scheme Tab of Page Options.
 *
 * @package _xe
 */

use Helpers\Xe_Helpers as Helper;

Helper::$color_scheme['primary_color'] = array(
  'id' => 'primary_color',
  'name' => esc_html__( 'Primary Color', '_xe' ),
  'desc' => esc_html__( 'Controls several items like: link hovers, highlights, and more.', '_xe' ),
  'type' => 'color',
  'alpha_channel' => true,
  'tab' => 'color_scheme_tab'
);

Helper::$color_scheme['txt_selection_color'] = array(
  'id' => 'txt_selection_color',
  'name' => esc_html__( 'Text Selection Color', '_xe' ),
  'type' => 'color',
  'alpha_channel' => true,
  'tab' => 'color_scheme_tab'
);

Helper::$color_scheme['txt_selection_bg_color'] = array(
  'id' => 'txt_selection_bg_color',
  'name' => esc_html__( 'Text Selection Background Color', '_xe' ),
  'type' => 'color',
  'alpha_channel' => true,
  'tab' => 'color_scheme_tab'
);

Helper::$color_scheme['bg_color'] = array(
  'id' => 'bg_color',
  'name' => esc_html__( 'Background Color', '_xe' ),
  'type' => 'color',
  'alpha_channel' => true,
  'tab' => 'color_scheme_tab'
);
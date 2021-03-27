<?php 
/**
 * Title-Bar Tab of Page Options.
 *
 * @package _xe
 */

use Helpers\Xe_Helpers as Helper;



Helper::$title_bar['title_color'] = array(
  'id' => 'title_color',
  'name' => esc_html__( 'Title Color', '_xe' ),
  'type' => 'color',
  'alpha_channel' => true,
  'tab' => 'title_bar_tab'
);

Helper::$title_bar['subtitle_color'] = array(
  'id' => 'subtitle_color',
  'name' => esc_html__( 'Subtitle Color', '_xe' ),
  'type' => 'color',
  'alpha_channel' => true,
  'tab' => 'title_bar_tab'
);

Helper::$title_bar['title_bar_bg'] = array(
  'id'   => 'title_bar_bg',
  'name' => esc_html__( 'Background', '_xe' ),
  'type' => 'background',
  'tab' => 'title_bar_tab'
);

Helper::$title_bar['title_bar_bg_overlay'] = array(
  'id' => 'title_bar_bg_overlay',
  'name' => esc_html__( 'Background Image Overlay', '_xe' ),
  'type' => 'color',
  'alpha_channel' => true,
  'tab' => 'title_bar_tab'
);

Helper::$title_bar['breadcrumb'] = array(
  'id' => 'breadcrumb',
  'name' => esc_html__( 'Breadcrumb', '_xe' ),
  'type' => 'select',
  'options' => array(
    '0' => esc_html__( 'Default', '_xe' ),
    'on' => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' ),
  ),
  'multiple' => false,
  'select_all_none' => false,
  'std'  => '0',
  'tab'  => 'title_bar_tab',
);

Helper::$title_bar['title_bar_height'] = array(
  'id' => 'title_bar_height', 
  'name' => esc_html__( 'Title-Bar Height', '_xe' ),
  'type' => 'number',
  'append' => 'px',
  'tab' => 'title_bar_tab'
);

Helper::$title_bar['title_bar_pt'] = array(
  'id' => 'title_bar_pt', 
  'name' => esc_html__( 'Padding Top', '_xe' ),
  'type' => 'number',
  'append' => 'px',
  'tab' => 'title_bar_tab'
);

Helper::$title_bar['title_bar_pb'] = array(
  'id' => 'title_bar_pb', 
  'name' => esc_html__( 'Padding Bottom', '_xe' ),
  'type' => 'number',
  'append' => 'px',
  'tab' => 'title_bar_tab'
);

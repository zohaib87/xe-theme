<?php 
/**
 * Footer Tab of Page Options.
 *
 * @package _xe
 */

use Helpers\Xe_Helpers as Helper;

Helper::$footer['footer_style'] = array(
  'id' => 'footer_style',
  'name' => esc_html__( 'Footer Style', '_xe' ),
  'type' => 'select',
  'options' => Helper::files_array('footer', true),
  'multiple' => false,
  'select_all_none' => false,
  'std'  => '0',
  'tab'  => 'footer_tab',
);

Helper::$footer['footer_bg_color'] = array(
  'id' => 'footer_bg_color',
  'name' => esc_html__( 'Background Color', '_xe' ),
  'type' => 'color',
  'alpha_channel' => true,
  'tab' => 'footer_tab'
);

Helper::$footer['footer_text_color'] = array(
  'id' => 'footer_text_color',
  'name' => esc_html__( 'Text Color', '_xe' ),
  'type' => 'color',
  'alpha_channel' => true,
  'tab' => 'footer_tab'
);

Helper::$footer['footer_logo'] = array(
  'id' => 'footer_logo',
  'name' => esc_html__( 'Upload Logo', '_xe' ),
  'type' => 'image_advanced',
  'force_delete' => false,
  'max_file_uploads' => 1,
  'tab' => 'footer_tab'
);

Helper::$footer['footer_copyright'] = array(
  'id' => 'footer_copyright',
  'name' => esc_html__( 'Copyright Info', '_xe' ),
  'desc' => esc_html__( 'Enter your site copyright information. Type |Y| for 4 digit and |y| for 2 digit year.', '_xe' ),
  'type' => 'wysiwyg',
  'raw' => false,
  'options' => array(
    'textarea_rows' => 4,
    'teeny' => true,
  ),
  'tab' => 'footer_tab'
);

Helper::$footer['footer_social'] = array(
  'id' => 'footer_social',
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
  'tab'  => 'footer_tab',
);

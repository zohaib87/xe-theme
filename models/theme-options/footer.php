<?php
/**
 * Footer Theme Options.
 *
 * @package _xe
 */

use Helpers\Xe_Helpers as Helper;
use Helpers\Xe_Defaults as De;

Kirki::add_section( 'footer', array(
  'title' => esc_html__( 'Footer', '_xe' ),
  'priority' => De::$priority['footer'],
) );

Kirki::add_field( 'xe_options', [
  'type'        => 'select',
  'settings'    => 'footer_style',
  'label'       => esc_html__( 'Footer Style', '_xe' ),
  'section'     => 'footer',
  'default'     => De::$footer_style,
  'multiple'    => 1,
  'choices'     => Helper::files_array('footer'),
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'image',
  'settings'    => 'footer_logo',
  'label'       => esc_html__( 'Logo', '_xe' ),
  'section'     => 'footer',
  'default'     => De::$footer_logo,
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type' => 'color',
  'settings' => 'footer_bg_color',
  'label'  => esc_html__( 'Background Color', '_xe' ),
  'section' => 'footer',
  'default' => De::$footer_bg_color,
  'choices' => [
    'alpha' => true,
  ],
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type' => 'color',
  'settings' => 'footer_text_color',
  'label'  => esc_html__( 'Text Color', '_xe' ),
  'section' => 'footer',
  'default' => De::$footer_text_color,
  'choices' => [
    'alpha' => true,
  ],
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'editor',
  'settings'    => 'copyright_info',
  'label'       => esc_html__( 'Copyright Info', '_xe' ),
  'description' => esc_html__( 'Enter your site copyright information. Type |Y| for 4 digit and |y| for 2 digit year.', '_xe' ),
  'section'     => 'footer',
  'default'     => De::$copyright_info,
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'radio-buttonset',
  'settings'    => 'footer_social',
  'label'       => esc_html__( 'Social Icons', '_xe' ),
  'section'     => 'footer',
  'default'     => De::$footer_social,
  'choices'     => [
    'on'  => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' ),
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'radio-buttonset',
  'settings'    => 'sub_footer',
  'label'       => esc_html__( 'Sub Footer', '_xe' ),
  'description' => esc_html__( 'This does not effect the main footer, its just added right before it.', '_xe' ),
  'section'     => 'footer',
  'default'     => De::$sub_footer,
  'choices'     => [
    'on'  => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' ),
  ],
  'transport' => 'auto',
] );

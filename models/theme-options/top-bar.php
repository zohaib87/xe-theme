<?php
/**
 * Top-Bar Theme Options.
 *
 * @package _xe
 */

use Helpers\Xe_Helpers as Helper;
use Helpers\Xe_Defaults as De;

Kirki::add_section( 'top_bar', array(
  'title' => esc_html__( 'Top-Bar', '_xe' ),
  'priority' => De::$priority['top_bar'],
) );

Kirki::add_field( 'xe_options', [
  'type'        => 'radio-buttonset',
  'settings'    => 'top_bar_switch',
  'label'       => esc_html__( 'Top-Bar', '_xe' ),
  'section'     => 'top_bar',
  'default'     => De::$top_bar_switch,
  'choices'     => [
    'on'  => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' ),
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'select',
  'settings'    => 'top_bar_menu',
  'label'       => esc_html__( 'Menu Location', '_xe' ),
  'section'     => 'top_bar',
  'default'     => De::$top_bar_menu,
  'multiple'    => 1,
  'choices'     => Helper::menu_locations(),
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'radio-buttonset',
  'settings'    => 'top_bar_social',
  'label'       => esc_html__( 'Social Icons', '_xe' ),
  'section'     => 'top_bar',
  'default'     => De::$top_bar_social,
  'choices'     => [
    'on'  => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' ),
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type' => 'color',
  'settings' => 'top_bar_text_color',
  'label'  => esc_html__( 'Text Color', '_xe' ),
  'section' => 'top_bar',
  'default' => De::$top_bar_text_color,
  'choices' => [
    'alpha' => true,
  ],
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type' => 'color',
  'settings' => 'top_bar_bg_color',
  'label'  => esc_html__( 'Background Color', '_xe' ),
  'section' => 'top_bar',
  'default' => De::$top_bar_bg_color,
  'choices' => [
    'alpha' => true,
  ],
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'top_bar_phone',
  'label'    => esc_html__( 'Phone Number', '_xe' ),
  'description' => esc_html__( 'Enter your/company phone number.', '_xe' ),
  'section'  => 'top_bar',
  'default'  => De::$top_bar_phone,
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'top_bar_email',
  'label'    => esc_html__( 'Email', '_xe' ),
  'description' => esc_html__( 'Enter your/company email.', '_xe' ),
  'section'  => 'top_bar',
  'default'  => De::$top_bar_email,
  'transport' => 'postMessage',
] );
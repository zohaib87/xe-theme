<?php
/**
 * Site Layout Theme Options.
 *
 * @package _xe
 */

use Helpers\Xe_Defaults as De;

Kirki::add_section( 'layout', array(
  'title' => esc_html__( 'Site Layout', '_xe' ),
  'priority' => De::$priority['site_layout'],
) );

Kirki::add_field( 'xe_options', [
  'type'        => 'select',
  'settings'    => 'site_layout',
  'label'       => esc_html__( 'Site Layout', '_xe' ),
  'section'     => 'layout',
  'default'     => De::$site_layout,
  'multiple'    => 1,
  'choices'     => [
    'boxed' => esc_html__( 'Boxed', '_xe' ),
    'wide' => esc_html__( 'Wide', '_xe' ),
    'full-width' => esc_html__( 'Full Width', '_xe' ),
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'slider',
  'settings'    => 'main_grid_width',
  'label'       => esc_html__( 'Main Grid Width', '_xe' ),
  'description' => esc_html__( 'You might have to "Hide Controls" to view changes. Depends on your screen size.', '_xe' ),
  'section'     => 'layout',
  'default'     => De::$main_grid_width,
  'choices'     => [
    'min'  => 960,
    'max'  => 1380,
    'step' => 1,
  ],
  'active_callback' => [
    [
      'setting'  => 'site_layout',
      'operator' => '!==',
      'value'    => 'full-width',
    ]
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'slider',
  'settings'    => 'boxed_layout_margin',
  'label'       => esc_html__( 'Boxed Layout Margin', '_xe' ),
  'description' => esc_html__( 'Margin of boxed layout from top and bottom.', '_xe' ),
  'section'     => 'layout',
  'default'     => De::$boxed_layout_margin,
  'choices'     => [
    'min'  => 0,
    'max'  => 100,
    'step' => 1,
  ],
  'active_callback' => [
    [
      'setting'  => 'site_layout',
      'operator' => '===',
      'value'    => 'boxed',
    ]
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'background',
  'settings'    => 'boxed_layout_bg',
  'label'       => esc_html__( 'Boxed Layout Background', '_xe' ),
  'section'     => 'layout',
  'default'     => [
    'background-color'      => '#E3E3E3',
    'background-image'      => '',
    'background-repeat'     => 'repeat',
    'background-position'   => 'center center',
    'background-size'       => 'cover',
    'background-attachment' => 'scroll',
  ],
  'active_callback' => [
    [
      'setting'  => 'site_layout',
      'operator' => '===',
      'value'    => 'boxed',
    ]
  ],
  'transport'   => 'postMessage',
] );
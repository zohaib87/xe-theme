<?php
/**
 * Sidebar Theme Options.
 *
 * @package _xe
 */

use Xe_Theme\Helpers\Helpers as Helper;
use Xe_Theme\Helpers\Defaults as De;

Kirki::add_section( 'sidebars', array(
  'title' => esc_html__( 'Sidebars', '_xe' ),
  'priority' => De::$priority['sidebars'],
) );

Kirki::add_field( 'xe_options', [
  'type'        => 'slider',
  'settings'    => 'left_sidebar_width',
  'label'       => esc_html__( 'Left Sidebar Width', '_xe' ),
  'description' => esc_html__( 'This option is in percent.', '_xe' ),
  'section'     => 'sidebars',
  'default'     => De::$left_sidebar_width,
  'choices'     => [
    'min'  => 0,
    'max'  => 100,
    'step' => 1,
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'slider',
  'settings'    => 'right_sidebar_width',
  'label'       => esc_html__( 'Right Sidebar Width', '_xe' ),
  'description' => esc_html__( 'This option is in percent.', '_xe' ),
  'section'     => 'sidebars',
  'default'     => De::$right_sidebar_width,
  'choices'     => [
    'min'  => 0,
    'max'  => 100,
    'step' => 1,
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'select',
  'settings'    => 'sidebar_position',
  'label'       => esc_html__( 'Sidebar Position', '_xe' ),
  'section'     => 'sidebars',
  'default'     => De::$sidebar_position,
  'multiple'    => 1,
  'choices'     => [
    'none' => esc_html__( 'No Sidebar', '_xe' ),
    'left' => esc_html__( 'Left Sidebar', '_xe' ),
    'right' => esc_html__( 'Right Sidebar', '_xe' ),
    'both' => esc_html__( 'Left & Right Sidebars', '_xe' ),
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'select',
  'settings'    => 'left_sidebar_selector',
  'label'       => esc_html__( 'Select Left Sidebar', '_xe' ),
  'section'     => 'sidebars',
  'default'     => De::$left_sidebar_selector,
  'multiple'    => 1,
  'choices'     => Helper::get_sidebars(),
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'select',
  'settings'    => 'right_sidebar_selector',
  'label'       => esc_html__( 'Select Right Sidebar', '_xe' ),
  'section'     => 'sidebars',
  'default'     => De::$right_sidebar_selector,
  'multiple'    => 1,
  'choices'     => Helper::get_sidebars(),
  'transport' => 'auto',
] );

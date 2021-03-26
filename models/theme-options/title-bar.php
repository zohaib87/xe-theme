<?php
/**
 * Title-Bar Theme Options.
 *
 * @package _xe
 */

use Helpers\Xe_Defaults as De;

Kirki::add_section( 'title_bar', array(
  'title' => esc_html__( 'Title-Bar', '_xe' ),
  'priority' => De::$priority['title_bar'],
) );

Kirki::add_field( 'xe_options', [
  'type'        => 'radio-buttonset',
  'settings'    => 'title_bar_switch',
  'label'       => esc_html__( 'Title-Bar', '_xe' ),
  'section'     => 'title_bar',
  'default'     => De::$title_bar_switch,
  'choices'     => [
    'on'  => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' ),
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type' => 'color',
  'settings' => 'title_color',
  'label'  => esc_html__( 'Title Color', '_xe' ),
  'section' => 'title_bar',
  'default' => De::$title_color,
  'choices' => [
    'alpha' => true,
  ],
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type' => 'color',
  'settings' => 'subtitle_color',
  'label'  => esc_html__( 'Subtitle Color', '_xe' ),
  'section' => 'title_bar',
  'default' => De::$subtitle_color,
  'choices' => [
    'alpha' => true,
  ],
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'radio-buttonset',
  'settings'    => 'breadcrumb',
  'label'       => esc_html__( 'Breadcrumb', '_xe' ),
  'section'     => 'title_bar',
  'default'     => De::$breadcrumb,
  'choices'     => [
    'on'  => esc_html__( 'Enable', '_xe' ),
    'false' => esc_html__( 'Disable', '_xe' ),
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'radio-buttonset',
  'settings'    => 'title_bar_parallax',
  'label'       => esc_html__( 'Background Parallax', '_xe' ),
  'section'     => 'title_bar',
  'default'     => De::$title_bar_parallax,
  'choices'     => [
    'on'  => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' ),
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'background',
  'settings'    => 'title_bar_bg',
  'label'       => esc_html__( 'Background', '_xe' ),
  'section'     => 'title_bar',
  'default'     => [
    'background-color'      => De::$title_bar_bg_color,
    'background-image'      => De::$title_bar_bg_img,
    'background-repeat'     => De::$title_bar_bg_repeat,
    'background-position'   => De::$title_bar_bg_position,
    'background-size'       => De::$title_bar_bg_size,
    'background-attachment' => De::$title_bar_bg_attachment,
  ],
  'transport'   => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type' => 'color',
  'settings' => 'title_bar_overlay',
  'label'  => esc_html__( 'Overlay', '_xe' ),
  'section' => 'title_bar',
  'default' => De::$title_bar_overlay,
  'choices' => [
    'alpha' => true,
  ],
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'title_bar_height',
  'label'    => esc_html__( 'Height', '_xe' ),
  'description' => esc_html__( 'Enter height value in pixels. Do not add "px".', '_xe' ),
  'section'  => 'title_bar',
  'default'  => De::$title_bar_height,
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'title_bar_pt',
  'label'    => esc_html__( 'Padding Top', '_xe' ),
  'description' => esc_html__( 'Enter padding value in pixels. Do not add "px".', '_xe' ),
  'section'  => 'title_bar',
  'default'  => De::$title_bar_pt,
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'title_bar_pb',
  'label'    => esc_html__( 'Padding Bottom', '_xe' ),
  'description' => esc_html__( 'Enter padding value in pixels. Do not add "px".', '_xe' ),
  'section'  => 'title_bar',
  'default'  => De::$title_bar_pb,
  'transport' => 'postMessage',
] );

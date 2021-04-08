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
  'type' => 'color',
  'settings' => 'title_bar_bg_color',
  'label'  => esc_html__( 'Background Color', '_xe' ),
  'section' => 'title_bar',
  'default' => De::$title_bar_bg_color,
  'choices' => [
    'alpha' => true,
  ],
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'image',
  'settings'    => 'title_bar_bg_img',
  'label'       => esc_html__( 'Background Image', '_xe' ),
  'section'     => 'header',
  'default'     => De::$title_bar_bg_img,
  'transport' => 'auto',
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

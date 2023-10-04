<?php
/**
 * Color Scheme Theme Options.
 *
 * @package _xe
 */

use Xe_Theme\Helpers\Defaults as De;

Kirki::add_section( 'color_scheme', array(
  'title' => esc_html__( 'Color Scheme', '_xe' ),
  'priority' => De::$priority['color_scheme'],
) );

Kirki::add_field( 'xe_options', [
  'type' => 'color',
  'settings' => 'primary_color',
  'label'  => esc_html__( 'Primary Color', '_xe' ),
  'description' => esc_html__( 'Controls several items like: link hovers, highlights, and more.', '_xe' ),
  'section' => 'color_scheme',
  'default' => De::$primary_color,
  'choices' => [
    'alpha' => true,
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type' => 'color',
  'settings' => 'txt_selection_color',
  'label'  => esc_html__( 'Text Selection Color', '_xe' ),
  'section' => 'color_scheme',
  'default' => De::$txt_selection_color,
  'choices' => [
    'alpha' => true,
  ],
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type' => 'color',
  'settings' => 'txt_selection_bg_color',
  'label'  => esc_html__( 'Text Selection Background Color', '_xe' ),
  'section' => 'color_scheme',
  'default' => De::$txt_selection_bg_color,
  'choices' => [
    'alpha' => true,
  ],
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type' => 'color',
  'settings' => 'bg_color',
  'label'  => esc_html__( 'Background Color', '_xe' ),
  'section' => 'color_scheme',
  'default' => De::$bg_color,
  'choices' => [
    'alpha' => true,
  ],
  'transport' => 'postMessage',
] );
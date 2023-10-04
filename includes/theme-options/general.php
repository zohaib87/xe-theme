<?php
/**
 * General Theme Options.
 *
 * @package _xe
 */

use Xe_Theme\Helpers\Defaults as De;

Kirki::add_section( 'general', array(
  'title' => esc_html__( 'General Options', '_xe' ),
  'priority' => De::$priority['general'],
) );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'padding_top',
  'label'    => esc_html__( 'Spacing Top', '_xe' ),
  'description' => esc_html__( 'Spacing after title-bar and before the main content. Enter height value in pixels. Do not add "px".', '_xe' ),
  'section'  => 'general',
  'default'  => De::$padding_top,
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'padding_bottom',
  'label'    => esc_html__( 'Spacing Bottom', '_xe' ),
  'description' => esc_html__( 'Spacing before footer or sub-footer. Enter height value in pixels. Do not add "px".
', '_xe' ),
  'section'  => 'general',
  'default'  => De::$padding_bottom,
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'radio-buttonset',
  'settings'    => 'preloader',
  'label'       => esc_html__( 'Preloader', '_xe' ),
  'description' => esc_html__( 'Enabling this option will show preloader until the site has been fully loaded.', '_xe' ),
  'section'     => 'general',
  'default'     => De::$preloader,
  'choices'     => [
    'on'  => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' ),
  ],
  'transport' => 'auto',
] );
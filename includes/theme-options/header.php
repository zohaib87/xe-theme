<?php
/**
 * Header Theme Options.
 *
 * @package _xe
 */

use Xe_Theme\Helpers\Helpers as Helper;
use Xe_Theme\Helpers\Defaults as De;

Kirki::add_section( 'header', array(
  'title' => esc_html__( 'Header', '_xe' ),
  'priority' => De::$priority['header'],
) );

Kirki::add_field( 'xe_options', [
  'type'        => 'select',
  'settings'    => 'header_style',
  'label'       => esc_html__( 'Header Style', '_xe' ),
  'section'     => 'header',
  'default'     => De::$header_style,
  'multiple'    => 1,
  'choices'     => Helper::files_array('header'),
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'select',
  'settings'    => 'header_container',
  'label'       => esc_html__( 'Header Layout', '_xe' ),
  'section'     => 'header',
  'default'     => De::$header_container,
  'multiple'    => 1,
  'choices'     => [
    'container'  => esc_html__( 'Wide', '_xe' ),
    'container-fluid' => esc_html__( 'Full Width', '_xe' ),
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'select',
  'settings'    => 'header_menu',
  'label'       => esc_html__( 'Menu Location', '_xe' ),
  'section'     => 'header',
  'default'     => De::$header_menu,
  'multiple'    => 1,
  'choices'     => Helper::menu_locations(),
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'image',
  'settings'    => 'header_logo',
  'label'       => esc_html__( 'Logo', '_xe' ),
  'section'     => 'header',
  'default'     => De::$header_logo,
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'image',
  'settings'    => 'header_light_logo',
  'label'       => esc_html__( 'Light Logo', '_xe' ),
  'section'     => 'header',
  'default'     => De::$header_light_logo,
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'radio-buttonset',
  'settings'    => 'header_search',
  'label'       => esc_html__( 'Search Form', '_xe' ),
  'section'     => 'header',
  'default'     => De::$header_search,
  'choices'     => [
    'on'  => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' ),
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'radio-buttonset',
  'settings'    => 'header_cart',
  'label'       => esc_html__( 'Shopping Cart', '_xe' ),
  'section'     => 'header',
  'default'     => De::$header_cart,
  'choices'     => [
    'on'  => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' ),
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'radio-buttonset',
  'settings'    => 'header_social',
  'label'       => esc_html__( 'Social Icons', '_xe' ),
  'section'     => 'header',
  'default'     => De::$header_social,
  'choices'     => [
    'on'  => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' ),
  ],
  'transport' => 'auto',
] );

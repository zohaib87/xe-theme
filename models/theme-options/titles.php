<?php
/**
 * Titles Theme Options.
 *
 * @package _xe
 */

use Helpers\Xe_Defaults as De;

Kirki::add_section( 'titles', array(
  'title' => esc_html__( 'Titles', '_xe' ),
  'priority' => De::$priority['titles'],
) );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'blog_title',
  'label'    => esc_html__( 'Blog', '_xe' ),
  'section'  => 'titles',
  'default'  => De::$blog_title,
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'search_title',
  'label'    => esc_html__( 'Search', '_xe' ),
  'section'  => 'titles',
  'default'  => De::$search_title,
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'error_title',
  'label'    => esc_html__( 'Error 404', '_xe' ),
  'section'  => 'titles',
  'default'  => De::$error_title,
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'shop_title',
  'label'    => esc_html__( 'WooCommerce', '_xe' ),
  'section'  => 'titles',
  'default'  => De::$shop_title,
  'transport' => 'postMessage',
] );

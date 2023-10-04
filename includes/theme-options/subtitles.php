<?php
/**
 * Titles Theme Options.
 *
 * @package _xe
 */

use Xe_Theme\Helpers\Defaults as De;

Kirki::add_section( 'subtitles', array(
  'title' => esc_html__( 'Subtitles', '_xe' ),
  'priority' => De::$priority['subtitles'],
) );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'blog_subtitle',
  'label'    => esc_html__( 'Blog', '_xe' ),
  'section'  => 'subtitles',
  'default'  => De::$blog_subtitle,
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'search_subtitle',
  'label'    => esc_html__( 'Search', '_xe' ),
  'section'  => 'subtitles',
  'default'  => De::$search_subtitle,
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'error_subtitle',
  'label'    => esc_html__( 'Error 404', '_xe' ),
  'section'  => 'subtitles',
  'default'  => De::$error_subtitle,
  'transport' => 'postMessage',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'shop_subtitle',
  'label'    => esc_html__( 'WooCommerce', '_xe' ),
  'section'  => 'subtitles',
  'default'  => De::$shop_subtitle,
  'transport' => 'postMessage',
] );

<?php
/**
 * Columns Theme Options.
 *
 * @package _xe
 */

use Xe_Theme\Helpers\Defaults as De;

Kirki::add_section( 'comments', array(
  'title' => esc_html__( 'Comments / Reviews', '_xe' ),
  'priority' => De::$priority['comments'],
) );

Kirki::add_field( 'xe_options', [
  'type'        => 'radio-buttonset',
  'settings'    => 'post_comments',
  'label'       => esc_html__( 'Post Comments', '_xe' ),
  'section'     => 'comments',
  'default'     => De::$post_comments,
  'choices'     => [
    'on'  => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' ),
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'radio-buttonset',
  'settings'    => 'page_comments',
  'label'       => esc_html__( 'Page Comments', '_xe' ),
  'section'     => 'comments',
  'default'     => De::$page_comments,
  'choices'     => [
    'on'  => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' ),
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'radio-buttonset',
  'settings'    => 'product_reviews',
  'label'       => esc_html__( 'Product Reviews', '_xe' ),
  'section'     => 'comments',
  'default'     => De::$product_reviews,
  'choices'     => [
    'on'  => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' ),
  ],
  'transport' => 'auto',
] );
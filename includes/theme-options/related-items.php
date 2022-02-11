<?php
/**
 * Related Items Theme Options.
 *
 * @package _xe
 */

use Helpers\Xe_Defaults as De;

Kirki::add_section( 'related_items', array(
  'title' => esc_html__( 'Related Items', '_xe' ),
  'priority' => De::$priority['related_items'],
) );

Kirki::add_field( 'xe_options', [
  'type'        => 'radio-buttonset',
  'settings'    => 'related_posts',
  'label'       => esc_html__( 'Posts', '_xe' ),
  'description' => esc_html__( 'Enable to show related posts.', '_xe' ),
  'section'     => 'related_items',
  'default'     => De::$related_posts,
  'choices'     => [
    'on'  => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' )
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'radio-buttonset',
  'settings'    => 'related_products',
  'label'       => esc_html__( 'Products', '_xe' ),
  'description' => esc_html__( 'Enable to show related products.', '_xe' ),
  'section'     => 'related_items',
  'default'     => De::$related_products,
  'choices'     => [
    'on'  => esc_html__( 'Enable', '_xe' ),
    'off' => esc_html__( 'Disable', '_xe' )
  ],
  'transport' => 'auto',
] );
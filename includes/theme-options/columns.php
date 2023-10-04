<?php
/**
 * Columns Theme Options.
 *
 * @package _xe
 */

use Xe_Theme\Helpers\Defaults as De;

Kirki::add_section( 'columns', array(
  'title' => esc_html__( 'Columns', '_xe' ),
  'priority' => De::$priority['columns'],
) );

Kirki::add_field( 'xe_options', [
  'type'        => 'select',
  'settings'    => 'blog_columns',
  'label'       => esc_html__( 'Blog Columns', '_xe' ),
  'description' => esc_html__( 'Number of columns on blog archive.', '_xe' ),
  'section'     => 'columns',
  'default'     => De::$blog_columns,
  'multiple'    => 1,
  'choices'     => [
    '1' => esc_html__( '1 Column', '_xe' ),
    '2' => esc_html__( '2 Columns', '_xe' ),
    '3' => esc_html__( '3 Columns', '_xe' ),
    '4' => esc_html__( '4 Columns', '_xe' ),
  ],
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'select',
  'settings'    => 'shop_columns',
  'label'       => esc_html__( 'Product Columns', '_xe' ),
  'description' => esc_html__( 'Number of columns on shop archive.', '_xe' ),
  'section'     => 'columns',
  'default'     => De::$shop_columns,
  'multiple'    => 1,
  'choices'     => [
    '2' => esc_html__( '2 Columns', '_xe' ),
    '3' => esc_html__( '3 Columns', '_xe' ),
    '4' => esc_html__( '4 Columns', '_xe' ),
  ],
  'transport' => 'auto',
] );

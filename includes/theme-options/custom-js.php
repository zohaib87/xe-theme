<?php
/**
 * Additional JS Theme Options.
 *
 * @package _xe
 */

use Helpers\Xe_Defaults as De;

Kirki::add_section( 'custom_js', array(
  'title' => esc_html__( 'Additional JS', '_xe' ),
  'priority' => De::$priority['custom_js'],
) );

Kirki::add_field( 'xe_options', [
  'type'        => 'code',
  'settings'    => 'custom_js_head',
  'label'       => esc_html__( 'Head', '_xe' ),
  'description' => esc_html__( 'It will be placed in <script> tag right before </head> tag.', '_xe' ),
  'section'     => 'custom_js',
  'default'     => '',
  'choices'     => [
    'language' => 'js',
  ],
] );

Kirki::add_field( 'xe_options', [
  'type'        => 'code',
  'settings'    => 'custom_js_footer',
  'label'       => esc_html__( 'Footer', '_xe' ),
  'description' => esc_html__( 'It will be placed in <script> tag in document footer before </body> tag.', '_xe' ),
  'section'     => 'custom_js',
  'default'     => '',
  'choices'     => [
    'language' => 'js',
  ],
] );
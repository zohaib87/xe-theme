<?php
/**
 * Blog Theme Options.
 *
 * @package _xe
 */

use Helpers\Xe_Defaults as De;
use Helpers\Xe_Helpers as Helper;

Kirki::add_section( 'blog', array(
  'title' => esc_html__( 'Blog', '_xe' ),
  'priority' => De::$priority['blog'],
) );

Kirki::add_field( 'xe_options', [
  'type'        => 'slider',
  'settings'    => 'excerpt_length',
  'label'       => esc_html__( 'Excerpt Length', '_xe' ),
  'description' => esc_html__( 'Choose the number of words in the post excerpts for blog archive.', '_xe' ),
  'section'     => 'blog',
  'default'     => De::$excerpt_length,
  'choices'     => [
    'min'  => 0,
    'max'  => 500,
    'step' => 1,
  ],
  'transport' => 'auto',
] );
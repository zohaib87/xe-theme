<?php
/**
 * Widgets Theme Options.
 *
 * @package _xe
 */

use Helpers\Xe_Defaults as De;

Kirki::add_section( 'custom_widgets', array(
  'title' => esc_html__( 'Additional Widget Areas', '_xe' ),
  'priority' => De::$priority['custom_widgets'],
) );

Kirki::add_field( 'xe_options', [
  'type'     => 'repeater',
  'settings' => 'add_custom_widgets',
  'section'  => 'custom_widgets',
  'row_label' => [
    'type'  => 'text',
    'value' => esc_html__( 'Widget Area', '_xe' ),
  ],
  'fields' => [
    'widget_id' => [
      'type' => 'text',
      'label' => esc_html__( 'Unique ID', '_xe' ),
      'description' => esc_html__( 'Spaces not allowed! eg: "contact-page-3"', '_xe' ),
      'default' => '',
    ],
    'widget_name' => [
      'type' => 'text',
      'label' => esc_html__( 'Name', '_xe' ),
      'description' => esc_html__( 'Special characters not allowed! eg: "Contact Page 3"', '_xe' ),
      'default' => '',
    ],
  ],
  'transport' => 'auto',
] );

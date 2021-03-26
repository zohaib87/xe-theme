<?php
/**
 * Social Profiles Theme Options.
 *
 * @package _xe
 */

use Helpers\Xe_Defaults as De;

Kirki::add_section( 'social_profiles', array(
  'title' => esc_html__( 'Social Profiles', '_xe' ),
  'priority' => De::$priority['social_profiles'],
) );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'social_facebook',
  'label'    => esc_html__( 'Facebook', '_xe' ),
  'section'  => 'social_profiles',
  'default'  => De::$social_facebook,
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'social_twitter',
  'label'    => esc_html__( 'Twitter', '_xe' ),
  'section'  => 'social_profiles',
  'default'  => De::$social_twitter,
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'social_github',
  'label'    => esc_html__( 'Github', '_xe' ),
  'section'  => 'social_profiles',
  'default'  => De::$social_github,
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'social_behance',
  'label'    => esc_html__( 'Behance', '_xe' ),
  'section'  => 'social_profiles',
  'default'  => De::$social_behance,
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'social_dribbble',
  'label'    => esc_html__( 'Dribbble', '_xe' ),
  'section'  => 'social_profiles',
  'default'  => De::$social_dribbble,
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'social_pinterest',
  'label'    => esc_html__( 'Pinterest', '_xe' ),
  'section'  => 'social_profiles',
  'default'  => De::$social_pinterest,
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'social_instagram',
  'label'    => esc_html__( 'Instagram', '_xe' ),
  'section'  => 'social_profiles',
  'default'  => De::$social_instagram,
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'social_linkedin',
  'label'    => esc_html__( 'Linkedin', '_xe' ),
  'section'  => 'social_profiles',
  'default'  => De::$social_linkedin,
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'social_tumblr',
  'label'    => esc_html__( 'Tumblr', '_xe' ),
  'section'  => 'social_profiles',
  'default'  => De::$social_tumblr,
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'social_youtube',
  'label'    => esc_html__( 'Youtube', '_xe' ),
  'section'  => 'social_profiles',
  'default'  => De::$social_youtube,
  'transport' => 'auto',
] );

Kirki::add_field( 'xe_options', [
  'type'     => 'text',
  'settings' => 'social_vimeo',
  'label'    => esc_html__( 'Vimeo', '_xe' ),
  'section'  => 'social_profiles',
  'default'  => De::$social_vimeo,
  'transport' => 'auto',
] );

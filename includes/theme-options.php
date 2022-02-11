<?php
/**
 * Kirki Customizer Framework Theme Options File
 *
 * @package _xe
 */

use Helpers\Xe_Helpers as Helper;
use Helpers\Xe_Defaults as De;

Kirki::add_config( 'xe_options', array(
  'capability'    => 'edit_theme_options',
  'option_type'   => 'theme_mod',
) );

// Panels and Sections Priority
De::$priority = array(
  'general' => 40,
  'site_layout' => 43,
  'color_scheme' => 46,
  'top_bar' => 49,
  'header' => 52,
  'title_bar' => 55,
  'titles' => 58,
  'subtitles' => 61,
  'sidebars' => 64,
  'footer' => 67,
  'social_profiles' => 70,
  'blog' => 73,
  'columns' => 76,
  'related_items' => 79,
  'comments' => 82,
  'custom_js' => 201,
);

Helper::auto_load_files(get_template_directory().'/includes/theme-options/*.php');

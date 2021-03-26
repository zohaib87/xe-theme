<?php
/**
 * Kirki Customizer Framework Theme Options File
 *
 * @package _xe
 */

use Helpers\Xe_Defaults as De;

Kirki::add_config( 'xe_options', array(
  'capability'    => 'edit_theme_options',
  'option_type'   => 'theme_mod',
) );

// Panels and Sections Priority
De::$priority = array(
  'general' => 40,
  'site_layout' => 41,
  'color_scheme' => 42,
  'top_bar' => 43,
  'header' => 44,
  'title_bar' => 45,
  'titles' => 46,
  'subtitles' => 47,
  'sidebars' => 48,
  'footer' => 49,
  'social_profiles' => 50,
  'blog' => 51,
  'columns' => 52,
  'related_items' => 53,
  'comments' => 54,
  'custom_widgets' => 111,
  'custom_js' => 201,
);

require get_template_directory() . '/models/theme-options/general.php';
require get_template_directory() . '/models/theme-options/site-layout.php';
require get_template_directory() . '/models/theme-options/color-scheme.php';
require get_template_directory() . '/models/theme-options/top-bar.php';
require get_template_directory() . '/models/theme-options/header.php';
require get_template_directory() . '/models/theme-options/title-bar.php';
require get_template_directory() . '/models/theme-options/titles.php';
require get_template_directory() . '/models/theme-options/subtitles.php';
require get_template_directory() . '/models/theme-options/sidebars.php';
require get_template_directory() . '/models/theme-options/footer.php';
require get_template_directory() . '/models/theme-options/social-profiles.php';
require get_template_directory() . '/models/theme-options/blog.php';
require get_template_directory() . '/models/theme-options/columns.php';
require get_template_directory() . '/models/theme-options/related-items.php';
require get_template_directory() . '/models/theme-options/comments.php';
require get_template_directory() . '/models/theme-options/custom-widgets.php';
require get_template_directory() . '/models/theme-options/custom-js.php';

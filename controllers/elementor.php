<?php
/**
 * Custom elementor widgets for this theme.
 *
 * @package _xe
 */

use Helpers\Xe_Helpers as Helper;

function _xe_load_elementor_widgets() {

  Helper::auto_load_files(get_template_directory() . '/controllers/elementor/*.php');

}
add_action('init', '_xe_load_elementor_widgets');

/**
 * Add custom categories to elementor.
 */
function _xe_add_elementor_categories($elements_manager) {

  return $elements_manager->add_category(
    'custom', [
      'title' => esc_html__('Custom', '_xe'),
      'icon' => 'fa fa-plug',
    ]
  );

}
add_action('elementor/elements/categories_registered', '_xe_add_elementor_categories');

/**
 * Check if elementor is used.
 */
function _xe_elemcheck() {

  global $post;
  return \Elementor\Plugin::$instance->db->is_built_with_elementor($post->ID);

}

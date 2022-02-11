<?php
/**
 * Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _xe
 */

require get_template_directory() . '/includes/setup.php';

/**
 * Register custom widgets
 */
require get_template_directory() . '/includes/widgets.php';

/**
 * Enqueue scripts and styles for admin and front end.
 */
require get_template_directory() . '/includes/scripts.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/helpers/jetpack.php';

/**
 * Custom nav walker class.
 */
require get_template_directory() . '/helpers/class-wp-bootstrap-navwalker.php';

/**
 * Required plugins activation.
 */
require get_template_directory() . '/helpers/plugins-activator.php';

/**
 * Class that holds helper methods.
 */
require get_template_directory() . '/helpers/class-helpers.php';

/**
 * Class to set CSS Selectors.
 */
require get_template_directory() . '/helpers/class-selectors.php';

/**
 * Class to set default options.
 */
require get_template_directory() . '/helpers/class-defaults.php';

/**
 * Class to get and use Kirki and MetaBox.io options.
 */
require get_template_directory() . '/includes/class-theme-options.php';

/**
 * Functions that require Kirki Customizer Framework.
 */
function _xe_theme_options() {

  if ( class_exists('Kirki') ) {
    require get_template_directory() . '/includes/theme-options.php';
  }

}
add_action('init', '_xe_theme_options');

/**
 * Functions that require Meta Box.
 */
if ( class_exists('RWMB_Loader') ) {
	require get_template_directory() . '/includes/page-options.php';
}

/**
 * Enqueue dynamic styles in theme <head> tags.
 */
require get_template_directory() . '/includes/class-dynamic-styles.php';

/**
 * Enqueue dynamic scripts in theme footer.
 */
require get_template_directory() . '/includes/class-dynamic-scripts.php';

/**
 * Custom template tags for this theme.
 */
Helpers\Xe_Helpers::auto_load_files( get_template_directory() . '/includes/template-tags/*.php' );

/**
 * Custom functions that act independently of the theme templates.
 */
Helpers\Xe_Helpers::auto_load_files( get_template_directory() . '/includes/extras/*.php' );

/**
 * One click demo import.
 */
if (class_exists('OCDI_Plugin')) {
	require get_template_directory() . '/helpers/class-demo-content.php';
}

/**
 * Elementor
 */
if (is_plugin_active('elementor/elementor.php')) {
  require get_template_directory() . '/includes/elementor.php';
}

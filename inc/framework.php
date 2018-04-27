<?php 
/**
 * Functions and files that are required or recommended for this theme.
 *
 * @package _xe
 */

/**
 * Custom nav walker class.
 */
require get_template_directory() . '/framework/class-bootstrap-navwalker.php';

/**
 * Required plugins activation.
 */
require get_template_directory() . '/framework/plugins-activator.php';

/**
 * Class to set CSS Selectors and default options etc.
 */
require get_template_directory() . '/framework/class-theme-settings.php';

/**
 * Class to get and use Redux and ACF Pro options.
 */
require get_template_directory() . '/framework/class-theme-options.php';

/**
 * Functions that require Redux Framework.
 */
require get_template_directory() . '/framework/theme-options.php';

/**
 * Enqueue dynamic styles in theme <head> tags.
 */
require get_template_directory() . '/framework/class-dynamic-styles.php';

/**
 * Enqueue dynamic scripts in theme footer.
 */
require get_template_directory() . '/framework/class-dynamic-scripts.php';

/**
 * Require widgets classes.
 */
require get_template_directory() . '/framework/widgets/recent-posts.php';
require get_template_directory() . '/framework/widgets/categories.php';
require get_template_directory() . '/framework/widgets/archives.php';

/**
 * Register widgets
 */
function _xe_register_custom_widgets() {

    register_widget('Xe_RecentPostsWidget');
    register_widget('Xe_CategoriesWidget');
    register_widget('Xe_ArchivesWidget');

}
add_action( 'widgets_init', '_xe_register_custom_widgets' );

/**
 * One click demo import.
 */
require get_template_directory() . '/framework/demo-content.php';
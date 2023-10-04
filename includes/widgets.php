<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @package _xe
 */

use Xe_Theme\Helpers\Helpers as Helper;

function _xe_widgets_init() {

  function _xe_register_sidebar($name, $id) {

    register_sidebar( array(
      'name'          => $name,
      'id'            => $id,
      'description'   => esc_html__( 'Add widgets here.', '_xe' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4 class="widget-title">',
      'after_title'   => '</h4>',
    ) );

  }

  /**
   * Register Sidebars
   */
  _xe_register_sidebar( esc_html__( 'Sidebar 1', '_xe' ), 'sidebar-1' );
  _xe_register_sidebar( esc_html__( 'Sidebar 2', '_xe' ), 'sidebar-2' );
  _xe_register_sidebar( esc_html__( 'Sub-Footer Column 1', '_xe' ), 'footer-1' );
  _xe_register_sidebar( esc_html__( 'Sub-Footer Column 2', '_xe' ), 'footer-2' );
  _xe_register_sidebar( esc_html__( 'Sub-Footer Column 3', '_xe' ), 'footer-3' );
  _xe_register_sidebar( esc_html__( 'Sub-Footer Column 4', '_xe' ), 'footer-4' );

  /**
   * Require widgets classes.
   */
  Helper::auto_load_files(get_template_directory() . '/models/widgets/*.php');

  /**
   * Register custom widgets
   */
  $files = glob(get_template_directory() . '/models/widgets/*.php');

  foreach ($files as $file) {
    if (basename($file) == 'index.php') continue;
    $name = basename($file, '.php');
    $name = str_replace('-', ' ', $name);
    $name = ucwords($name);
    $name = str_replace(' ', '', $name);
    register_widget('Xe_'.esc_attr($name).'Widget');
  }

}
add_action( 'widgets_init', '_xe_widgets_init' );

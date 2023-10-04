<?php
/**
 * Custom elementor widgets for this theme.
 *
 * @package _xe
 */

namespace Xe_Theme\Helpers;

use Xe_Theme\Helpers\Helpers;

class Elementor {

  function __construct() {

    add_action( 'elementor/widgets/register', [ $this, 'widgets' ] );
    add_action( 'elementor/elements/categories_registered', [ $this, 'categories' ] );

  }

  /**
   * # Register custom widgets.
   */
  public function widgets( $widgets_manager ) {

    Helpers::auto_load_files( get_template_directory() . '/includes/elementor/*.php' );

  }

  /**
   * # Add custom categories.
   */
  public function categories( $elements_manager ) {

    return $elements_manager->add_category(
      'custom', [
        'title' => esc_html__( 'Custom', '_xe' ),
        'icon' => 'fa fa-plug',
      ]
    );

  }

}
new Elementor();

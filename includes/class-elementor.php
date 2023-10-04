<?php
/**
 * Custom elementor widgets for this theme.
 *
 * @package _xe
 */

namespace Xe_Theme\Includes;

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

    require get_template_directory() . '/includes/elementor/class-banner.php';
    require get_template_directory() . '/includes/elementor/class-button.php';
    require get_template_directory() . '/includes/elementor/class-call-to-action.php';
    require get_template_directory() . '/includes/elementor/class-counter.php';
    require get_template_directory() . '/includes/elementor/class-heading.php';
    require get_template_directory() . '/includes/elementor/class-icon-box.php';
    require get_template_directory() . '/includes/elementor/class-pricing-table.php';
    require get_template_directory() . '/includes/elementor/class-testimonials.php';

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

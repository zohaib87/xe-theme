<?php
/**
 * Dashboard widgets for admin panel.
 *
 * @link https://developer.wordpress.org/apis/dashboard-widgets/
 *
 * @package _xe
 */

if (!class_exists('Xe_DashboardWidgets')) {

  class Xe_DashboardWidgets {

    function __construct() {

      /**
       * @link https://developer.wordpress.org/reference/functions/wp_dashboard_setup/
       */
      add_action('wp_dashboard_setup', array($this, 'init_widgets'));
    }

    /**
     * # Add Dashboard Widgets
     *
     * @link https://developer.wordpress.org/reference/functions/wp_add_dashboard_widget/
     */
    public function init_widgets() {

      wp_add_dashboard_widget('theme_support_widget', esc_html__('Theme Support', '_xe'), [$this, 'theme_support']);

    }

    /**
     * # Theme support widget for dashboard
     */
    function theme_support() {

      $theme = wp_get_theme();

      ?>
        <p class="theme-support-content">
          Welcome to <b><?php echo esc_html($theme->get('Name')); ?></b>! Need help? Contact us at <a href="mailto:support@xecreators.pk">support@xecreators.pk</a>. For WordPress tutorials visit our <a href="https://www.xecreators.pk/blog/" target="_blank">Blog</a>.
        </p>
        <p class="theme-support-footer">
          <a href="https://www.xecreators.pk" target="_blank">Visit Our Website <span class="screen-reader-text">(opens in a new tab)</span><span aria-hidden="true" class="dashicons dashicons-external"></span></a> |

          <a href="https://www.messenger.com/t/XeCreators" target="_blank">Live Chat <span class="screen-reader-text">(opens in a new tab)</span><span aria-hidden="true" class="dashicons dashicons-external"></span></a>
        </p>
      <?php

    }

  }
  new Xe_DashboardWidgets();

}

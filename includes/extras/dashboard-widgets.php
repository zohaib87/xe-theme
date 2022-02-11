<?php
/**
 * Dashboard widgets for admin panel.
 *
 * @package _xe
 */

/**
 * Dashboard widgets
 */
if (!function_exists('_xe_dashboard_widgets')) :

  function _xe_dashboard_widgets() {

    global $wp_meta_boxes;
     
    wp_add_dashboard_widget('theme_support_widget', esc_html__('Theme Support', '_xe'), '_xe_dashboard_help');

  }
  add_action('wp_dashboard_setup', '_xe_dashboard_widgets');

endif;

/**
 * Dashboard widget callbacks
 */
if (!function_exists('_xe_dashboard_help')) :

  function _xe_dashboard_help() {

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

endif;

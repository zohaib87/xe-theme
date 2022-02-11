<?php
/**
 * Remove admin-bar push down.
 *
 * @package _xe
 */

if (!function_exists('_xe_admin_bar_push_down')) :

  function _xe_admin_bar_push_down() {

    remove_action('wp_head', '_admin_bar_bump_cb');

  }
  add_action('get_header', '_xe_admin_bar_push_down');

endif;
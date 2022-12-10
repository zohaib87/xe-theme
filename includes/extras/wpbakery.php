<?php
/**
 * WPBakery Page Builder functions.
 *
 * @package _xe
 */

/**
 * Check if WPBakery plugin is active and used.
 */
function _xe_bakerycheck() {

  global $post;

  if (in_array('js_composer/js_composer.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    if ($post && preg_match('/vc_row/', $post->post_content)) {
      return true;
    }

  }

}

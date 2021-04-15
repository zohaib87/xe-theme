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

  if (is_plugin_active( 'js_composer/js_composer.php' )) :

    if ($post && preg_match('/vc_row/', $post->post_content)) {
      return true;
    }

  endif;

}

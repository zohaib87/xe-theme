<?php
/**
 * Add or Remove menu pages.
 *
 * @package Xhost
 */

/**
 * Remove menu pages.
 */
function _xe_remove_menu_pages() {
}
add_action('admin_menu', '_xe_remove_menu_pages');

/**
 * Add menu pages.
 */
function _xe_add_menu_pages() {
}
add_action('admin_menu', '_xe_add_menu_pages');

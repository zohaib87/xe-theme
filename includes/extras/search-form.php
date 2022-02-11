<?php 
/**
 * Search form customization etc.
 *
 * @package _xe
 */

if (!function_exists('_xe_custom_search_form')) :

  function _xe_custom_search_form($form) {

    $form = '
    <form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
      <div class="search-form">
        <label class="screen-reader-text" for="s">' . esc_html__('Search:', '_xe') . '</label>
        <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search" class="form-control mr-sm-1">
        <input type="submit" id="searchsubmit" value="" class="search-submit">
      </div>
    </form>';

    return $form;

  }
  add_filter('get_search_form', '_xe_custom_search_form', 100);

endif;

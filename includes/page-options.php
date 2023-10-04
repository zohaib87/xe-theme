<?php
/**
 * Meta Box Page Options File
 *
 * @package _xe
 */

use Xe_Theme\Helpers\Helpers as Helper;

function _xe_page_options( $meta_boxes ) {

  $meta_boxes[] = array(
    'title'      => esc_html__( 'Page Options', '_xe' ),
    'taxonomies' => 'category',
    'post_types' => 'post, page, product',

    'fields' => array(

      /**
       * Subtitle
       */
      array(
        'id' => 'subtitle',
        'name' => esc_html__( 'Subtitle', '_xe' ),
        'type' => 'text',
      ),

      /**
       * Header
       */
      array(
        'id' => 'header_menu',
        'name' => esc_html__( 'Header Menu Location', '_xe' ),
        'type' => 'select',
        'options' => Helper::menu_locations(true),
        'multiple' => false,
        'select_all_none' => false,
        'std'  => '0',
      ),

      /**
       * Title_Bar
       */
      array(
        'id' => 'title_bar_switch',
        'name' => esc_html__( 'Title-Bar', '_xe' ),
        'type' => 'select',
        'options' => array(
          '0' => esc_html__( 'Default', '_xe' ),
          'on' => esc_html__( 'Enable', '_xe' ),
          'off' => esc_html__( 'Disable', '_xe' ),
        ),
        'multiple' => false,
        'select_all_none' => false,
        'std'  => '0',
      ),

      /**
       * General
       */
      array(
        'id' => 'padding_top',
        'name' => esc_html__( 'Spacing Top', '_xe' ),
        'desc' => esc_html__( 'Spacing after title-bar and before the main content.', '_xe' ),
        'type' => 'number',
        'append' => 'px',
      ),
      array(
        'id' => 'padding_bottom',
        'name' => esc_html__( 'Spacing Bottom', '_xe' ),
        'desc' => esc_html__( 'Spacing before footer or sub-footer.', '_xe' ),
        'type' => 'number',
        'append' => 'px',
      ),

      /**
       * Sidebars
       */
      array(
        'id' => 'sidebar_position',
        'name' => esc_html__( 'Sidebar Position', '_xe' ),
        'type' => 'select',
        'options' => array(
          '0' => esc_html__( 'Default', '_xe' ),
          'none' => esc_html__( 'No Sidebar', '_xe' ),
          'left' => esc_html__( 'Left Sidebar', '_xe' ),
          'right' => esc_html__( 'Right Sidebar', '_xe' ),
          'both' => esc_html__( 'Left & Right Sidebars', '_xe' ),
        ),
        'multiple' => false,
        'select_all_none' => false,
        'std'  => '0',
      ),
      array(
        'id' => 'left_sidebar_selector',
        'name' => esc_html__( 'Select Left Sidebar', '_xe' ),
        'type' => 'sidebar',
        'field_type' => 'select',
        'placeholder' => 'Default',
      ),
      array(
        'id' => 'right_sidebar_selector',
        'name' => esc_html__( 'Select Right Sidebar', '_xe' ),
        'type' => 'sidebar',
        'field_type' => 'select',
        'placeholder' => 'Default',
      ),
      array(
        'id' => 'left_sidebar_width',
        'name' => esc_html__( 'Left Sidebar Width', '_xe' ),
        'desc' => esc_html__( 'This option is in percent.', '_xe' ),
        'type' => 'number',
        'append' => '%',
      ),
      array(
        'id' => 'right_sidebar_width',
        'name' => esc_html__( 'Right Sidebar Width', '_xe' ),
        'desc' => esc_html__( 'This option is in percent.', '_xe' ),
        'type' => 'number',
        'append' => '%',
      )

    )
  );

  return $meta_boxes;

}
add_filter( 'rwmb_meta_boxes', '_xe_page_options' );

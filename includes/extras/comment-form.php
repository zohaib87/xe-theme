<?php
/**
 * Comment form fields and text-area placeholders
 *
 * @package _xe
 */

/**
 * Text-area placeholder
 */
if (!function_exists('_xe_comment_textarea_placeholder')) :

  function _xe_comment_textarea_placeholder($args) {

    $args['comment_field'] = str_replace( 'textarea', 'textarea placeholder="Comment"', $args['comment_field'] );

    return $args;

  }
  add_filter('comment_form_defaults', '_xe_comment_textarea_placeholder');

endif;

/**
 * Fields placeholder
 */
if (!function_exists('_xe_comment_fields_placeholder')) :

  function _xe_comment_fields_placeholder($fields) {

    foreach( $fields as &$field ) {

      $field = str_replace( 'id="author"', 'id="author" placeholder="Name*"', $field );
      $field = str_replace( 'id="email"', 'id="email" placeholder="Email*"', $field );
      $field = str_replace( 'id="url"', 'id="url" placeholder="Website"', $field );

    }

    return $fields;

  }
  add_filter('comment_form_default_fields', '_xe_comment_fields_placeholder');

endif;
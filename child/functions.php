<?php

function _xe_child_enqueue_scripts() {

  wp_enqueue_style( '_xe-child-style', get_stylesheet_uri(), ['_xe-style'] );

}
add_action( 'wp_enqueue_scripts', '_xe_child_enqueue_scripts' );

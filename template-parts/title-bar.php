<?php
/**
 * Template part for displaying Title-Bar.
 *
 * @var $xe_opt->title_bar['title'] [< Escape with wp_kses >]
 * @var $xe_opt->title_bar['subtitle'] [< Returns subtitle for current post type >]
 * @var $xe_opt->title_bar['breadcrumb'] [< Returns true or false >]
 * 
 * @package _xe
 */

global $xe_opt; 

$args = array(
	'strong' => array(),
	'em' => array(),
	'b' => array(),
	'br' => array(),
	'span' => array(
		'class' => array(),
	),
); 

?>
<?php
/**
 * Template part for displaying Slider.
 *
 * @var $xe_opt->slider['selector']
 * @var $xe_opt->slider['revslider']
 * @var $xe_opt->slider['layerslider']
 *
 * @package _xe
 */

global $xe_opt; 

if ( $xe_opt->slider['selector'] != 'none' && !empty($xe_opt->slider['selector']) ) : ?>

	<section class="main-slider">
		<?php 
			if ( $xe_opt->slider['revslider'] != 'none' && !empty($xe_opt->slider['revslider']) ) {

				echo $xe_opt->slider['revslider'];

			} elseif ( $xe_opt->slider['layerslider'] != 'none' && !empty($xe_opt->slider['layerslider']) ) {

				echo $xe_opt->slider['layerslider'];

			} 
		?>
	</section>

<?php endif;

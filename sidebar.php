<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _xe
 */

global $xe_opt;

$sidebar = $xe_opt->sidebar();

/**
 * Render Left Sidebar
 */
if ( $sidebar['position'] == 'left' || $sidebar['position'] == 'both' ) : ?>

<aside id="secondary" class="widget-area left" role="complementary">
	<?php dynamic_sidebar($sidebar['left']); ?>
</aside><!-- #secondary --> 

<?php endif;

/**
 * Render Right Sidebar
 */
if ( $sidebar['position'] == 'right' || $sidebar['position'] == 'both' ) : ?>

<aside id="tertiary" class="widget-area right" role="complementary">
	<?php dynamic_sidebar($sidebar['right']); ?>
</aside><!-- #tertiary --> 

<?php endif;
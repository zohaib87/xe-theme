<?php
/**
 * Template part for displaying portfolio list.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @var $xe_opt->portfolio['style']
 * @var $xe_opt->portfolio['columns']
 *
 * @package _xe
 */

global $xe_opt;

$thumbnail_url = get_the_post_thumbnail_url( null, '_xe-portfolio-list' );
$id = get_the_ID();
$cat = get_the_terms($id, 'xe-portfolio-categories');
$name = array();
$slug = array();
$count = count($cat);

for ($i=0; $i < $count; $i++) { 
	$name[] = $cat[$i]->name;
	$slug[] = $cat[$i]->slug;
}

$name = implode(', ', $name);
$slug = implode(' ', $slug);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- content here -->

</article><!-- #post-## -->

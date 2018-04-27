<?php
/**
 * Template part for displaying portfolio list content before loop start.
 *
 * @var $xe_opt->portfolio['vc'] [< Check if it is vc element >]
 * @var $xe_opt->portfolio['classes']
 * @var $xe_opt->portfolio['cat']
 * @var $xe_opt->portfolio['attributes']
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _xe
 */

global $xe_opt; 

if ( isset($xe_opt->portfolio['vc']) ) {
	$classes = $xe_opt->portfolio['classes'];
	$attributes = $xe_opt->portfolio['attributes'];
} else {
	$classes = $attributes = '';
} 

?>

<!-- Code here -->

<?php if ( isset($xe_opt->portfolio['vc']) ) {

	foreach ($xe_opt->portfolio['cat'] as $count => $id) {

    	$cat = get_term( $id, 'xe-portfolio-categories' );
    	if ($cat->count == 0) continue;
    	$name = $cat->name;
    	$slug = $cat->slug;

    	/**
	     * Following variables ready to use after this point.
	     *
	     * @var $name
	     * @var $slug
	     */ 
	    ?>

    	<!-- Code here -->

	<?php }

} else {

	$terms = get_terms( array(
		'taxonomy' => 'xe-portfolio-categories',
		'hide_empty' => true,
	) );
	$count = count($terms);

	foreach ($terms as $key => $term) {

		$slug = $term->slug;
		$name = $term->name; 

		/**
	     * Following variables ready to use after this point.
	     *
	     * @var $name
	     * @var $slug
	     */
		?>

		<!-- Code here -->

	<?php }

} ?>

<!-- Code here -->
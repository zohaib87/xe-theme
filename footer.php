<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _xe
 */

global $xe_opt; 

?>

<footer id="colophon" class="site-footer">
	<?php get_template_part( 'views/footer', $xe_opt->footer['style'] ); ?>
</footer><!-- #colophon -->
	
</div><!-- #page -->

</div><!-- #wrapper -->

<?php wp_footer(); ?>

</body>
</html>

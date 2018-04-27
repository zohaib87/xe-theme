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

	<?php if ($xe_opt->footer['section'] == true) : ?>

	<div id="footer-section">
		<?php $xe_opt->footer_section(); ?>
	</div><!-- #footer-section -->

	<?php endif; ?>

	<div id="footer" class="site-info">
		<div class="text-center <?php echo esc_attr($xe_opt->container); ?>">

			<?php get_template_part( 'template-parts/footer', $xe_opt->footer['style'] ); ?>

		</div>
	</div><!-- #footer -->

</footer><!-- #colophon -->
	
</div><!-- #page -->

</div><!-- #wrapper -->

<?php wp_footer(); ?>

</body>
</html>

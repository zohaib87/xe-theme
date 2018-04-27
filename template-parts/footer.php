<?php
/**
 * Template part for displaying Footer.
 *
 * @var $xe_opt->footer['social-icons'] [< Returns true or false >]
 * @var $xe_opt->footer['copyright'] [< String of copyright info (Use wp_kses_post) >]
 * @var $exact_opt->footer['logo']
 * @var $exact_opt->footer['retina-logo']
 *
 * @package _xe
 */

global $xe_opt; ?>

<span>Proudly powered by</span>
<a href="<?php echo esc_url( __( 'https://wordpress.org/', '_xe' ) ); ?>">
	<?php printf( esc_html__( ' %s', '_xe' ), 'WordPress' ); ?>
</a>

<span class="sep"> | </span>

<span>XeFramework by</span>
<a href="<?php echo esc_url( __( 'http://xecreators.com/', '_xe' ) ); ?>">
	<?php printf( esc_html__( ' %s', '_xe' ), 'XeCreators' ); ?>
</a>
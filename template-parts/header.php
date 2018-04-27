<?php
/**
 * Template part for displaying Header.
 *
 * @var $xe_opt->tool_bar['switch'] [< Returns true or false >]
 * @var $xe_opt->header['menu'] [< Returns menu location >]
 * @var $xe_opt->header['location'] [< Returns "top" or "bottom" >]
 * @var $xe_opt->header['transparent'] [< Returns true or false >]
 * @var $xe_opt->header['squeezed'] [< Returns true or false >]
 * @var $xe_opt->header['sticky'] [< Returns true or false >]
 * @var $xe_opt->logo['dark']
 * @var $xe_opt->logo['light']
 * @var $xe_opt->logo['dark-retina']
 * @var $xe_opt->logo['light-retina']
 * @function $xe_opt->classes() [< Adjusting spacing of classes (Array) >]
 *
 * @package _xe
 */

global $xe_opt;

if ($xe_opt->header['location'] == 'bottom') {
	get_template_part( 'template-parts/slider' );
}  

if ($xe_opt->tool_bar['switch'] == true) {
	get_template_part( 'template-parts/tool-bar' );
}

$data_in = $xe_opt->dropdown['data-in'];
$data_out = $xe_opt->dropdown['data-out'];

$sticky = ($xe_opt->header['sticky'] == true && $xe_opt->site_layout != 'boxed') ? 'sticky-header' : '';
$transparent = ($xe_opt->header['transparent'] == true) ? 'transparent-header' : '';
$squeezed = ($xe_opt->header['squeezed'] == true) ? 'squeeze-header' : '';

$header_classes = $xe_opt->classes( array('site-header', $sticky, $transparent, $squeezed) );
$nav_classes = $xe_opt->classes( array('main-navigation', 'navbar', 'navbar-default', 'bootsnav') ); 

?>

<header id="masthead" class="<?php echo esc_attr($header_classes); ?>" role="banner">

	<nav id="site-navigation" class="<?php echo esc_attr($nav_classes); ?>" role="navigation">
		<div class="<?php echo esc_attr($xe_opt->container); ?>">

			<div class="navbar-header">

				<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span>
				</button>

				<a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand">
					<img src="<?php echo esc_url($xe_opt->logo['dark']); ?>" srcset="<?php echo esc_url($xe_opt->logo['dark']); ?> 1x, <?php echo esc_url($xe_opt->logo['dark-retina']); ?> 2x" class="img-responsive" alt="Logo">
				</a>

			</div>

			<?php 
	            wp_nav_menu( array(
	                'theme_location'    => $xe_opt->header['menu'],
	                'depth'             => 3,
	                'container'         => 'div',
	                'container_class'   => 'collapse navbar-collapse',
					'container_id'      => '',
	                'menu_class'        => 'nav navbar-nav navbar-right',
	                'items_wrap'        => '<ul id="%1$s" class="%2$s" data-in="'.esc_attr($data_in).'" data-out="'.esc_attr($data_out).'">%3$s</ul>',
	                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
	                'walker'            => new WP_Bootstrap_Navwalker(),
	            ) );
	        ?>

		</div><!-- .container -->
	</nav><!-- #site-navigation -->

</header><!-- #masthead -->

<?php 
	if ($xe_opt->header['location'] == 'top') {
		get_template_part( 'template-parts/slider' );
	}  
?>
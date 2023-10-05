<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _xe
 */

global $xe_opt;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php if ( $xe_opt->preloader == 'on' ) { ?>
  <!-- Preloader Here -->
<?php } ?>

<div id="wrapper" class="<?php echo esc_attr($xe_opt->site_layout); ?>"><?php // Closed in footer ?>

<div id="page" class="site"><?php // Closed in footer ?>

<?php
get_template_part( 'views/header', $xe_opt->header['style'] );

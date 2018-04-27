<?php 
/**
 * Class to set CSS Selectors and default options etc.
 *
 * @package _xe
 */

class Xe_ThemeSettings {

	/**
	 * CSS selectors
	 */
	public $selectors = array(

		'body-font' => 'body', 

		'menu-font' => '', 

		'sub-menu-font' => '', 

		'headings-font' => '',

		'widgets-title-font' => '', 

		'bg-color' => '.site', 

		'tool-bar-bg-color' => '#tool-bar', 

		'header-padding' => '', // Media query already applied

		'squeezed-header-padding' => '', // Media query already applied

		'header-bg-color' => '', 

		'header-link-color' => '', 

		'header-link-hover-color' => '', 

		'header-dropdown-bg-color' => '', 

		'header-dropdown-link-color' => '', 

		'header-dropdown-link-hover-color' => '', 

		'title-color' => '#title-bar .title', 

		'subtitle-color' => '#title-bar .subtitle', 

		'title-bar-height' => '#title-bar', 

		'title-bar-bg' => '#title-bar', 

		'title-bar-overlay' => '#title-bar .overlay', 

		'footer-bg-color' => '#footer', 

		'footer-border-top-color' => '#footer', 

		'footer-text-color' => '#footer p', 

	);

	/**
	 * Defaults
	 */
	public $defaults = array(

		'primary-color' => '#00C6D7',
		
	);

}
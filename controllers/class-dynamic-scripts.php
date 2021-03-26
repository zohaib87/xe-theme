<?php 
/**
 * Enqueue dynamic scripts in theme footer.
 *
 * @package _xe
 */

class Xe_DynamicScripts {

	function __construct() {

		add_action( 'wp_footer', array($this, 'localize_variables') );
		add_action( 'wp_head', array($this, 'dynamic_scripts_head'), 9999 );
		add_action( 'wp_footer', array($this, 'dynamic_scripts_footer'), 999 );

	}

	public function localize_variables() { 

		$gtdu = get_template_directory_uri();
		$admin_bar = ( is_admin_bar_showing() ) ? 1 : 0;

		wp_localize_script( '_xe-main', 'obj', array(
	    'gtdu'     => $gtdu,
      'admin_bar' => $admin_bar,
		) );

	}

	public function dynamic_scripts_head() { 

		$custom_js = get_theme_mod('custom_js_head', '');

		if ( !empty($custom_js) ) {
			$scripts = "\n" . "<script type='text/javascript'>" . "\n";
			$scripts .= $custom_js . "\n";
			$scripts .= '</script>';
		} else {
			$scripts = '';
		}

		echo $scripts;

	}

	public function dynamic_scripts_footer() { 

		$custom_js = get_theme_mod('custom_js_footer', '');;

		if ( !empty($custom_js) ) {
			$scripts = "<script type='text/javascript'>" . "\n";
			$scripts .= $custom_js . "\n";
			$scripts .= '</script>';
		} else {
			$scripts = '';
		}

		echo $scripts;

	}

}
new Xe_DynamicScripts();
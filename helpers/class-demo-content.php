<?php
/**
 * One click demo import.
 *
 * @package _xe
 */

namespace Xe_Theme\Helpers;

class Demo_Import {

	function __construct() {

		add_filter( 'pt-ocdi/import_files', array($this, 'ocdi_import_files') );
		add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

		add_action( 'pt-ocdi/after_import', array($this, 'ocdi_after_import') );

	}

	public function ocdi_import_files() {

		function ocdi_array($name, $folder, $screenshot, $notice = '') {

			return array(
				'import_file_name' => $name,
				'local_import_file' => get_template_directory() . '/helpers/demo-content/'.esc_attr($folder).'/demo-content.xml',
				'local_import_widget_file' => get_template_directory() . '/helpers/demo-content/'.esc_attr($folder).'/widgets.wie',
				'local_import_customizer_file' => get_template_directory() . '/helpers/demo-content/'.esc_attr($folder).'/customizer.dat',
				'import_preview_image_url' => get_template_directory_uri() . '/helpers/demo-content/'.esc_attr($folder).'/'.esc_attr($screenshot).'.jpg',
				'import_notice' => $notice,
			);

		}

		$dirs = array_filter( glob( get_template_directory() . '/helpers/demo-content/*'), 'is_dir' );
		$output = array();

		foreach ($dirs as $dir) {

			$name = basename( $dir );
			$name = str_replace( '-', ' ', $name );
			$name = ucwords($name);

			$output[] = ocdi_array( $name, basename($dir), 'screenshot', '' );

		}

		return $output;

	}

	public function ocdi_after_import( $selected_import ) {

		$name = $selected_import['import_file_name'];
		$name = str_replace( ' ', '-', $name );
		$name = strtolower($name);

		$request = wp_remote_get( get_template_directory_uri() . '/helpers/demo-content/' . esc_attr($name) . '/defaults.json' );

		if ( is_wp_error($request) ) {
	    return false;
		}

		$body = wp_remote_retrieve_body($request);
		$data = json_decode($body);

		// Assign menus to their locations.
		foreach ( $data->menus as $the_menu ) {

			$nav_menu = get_term_by( 'name', $the_menu->name, 'nav_menu' );
			$menu_list[$the_menu->location] = $nav_menu->term_id;

		}
		set_theme_mod( 'nav_menu_locations', $menu_list );

		// Assign front page and blog page.
		$front_page_id = get_page_by_title( $data->pages->front );
		$blog_page_id  = get_page_by_title( $data->pages->blog );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );

		$slider_path = get_template_directory() . '/helpers/demo-content/' . esc_attr($name) . '/slider.zip';

		// Import Revolution Slider
		if ( class_exists('RevSlider') && file_exists($slider_path) ) {

			$slider = new RevSlider();
			$slider->importSliderFromPost(true, true, $slider_path);

		}

	}

}
new Demo_Import();

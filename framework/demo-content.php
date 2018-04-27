<?php 
/**
 * One click demo import.
 *
 * @package _xe
 */

if ( !class_exists('OCDI_Plugin') ) { 
	return;
}

function ocdi_import_files() {

	function ocdi_array($name, $folder, $screenshot, $notice = '') {

		return array(
			'import_file_name'             => $name,
			'local_import_file'            => get_template_directory() . '/framework/demo-content/'.esc_attr($folder).'/demo-content.xml',
			'local_import_widget_file'     => get_template_directory() . '/framework/demo-content/'.esc_attr($folder).'/widgets.wie',
			'local_import_redux'           => array(
				array(
					'file_path'   => get_template_directory() . '/framework/demo-content/'.esc_attr($folder).'/theme-options.json',
					'option_name' => 'xe_options',
				),
			),
			'import_preview_image_url'     => get_template_directory_uri() . '/framework/demo-content/'.esc_attr($folder).'/'.esc_attr($screenshot).'.jpg',
			'import_notice'                => $notice,
		);

	}

	return array(

		ocdi_array( esc_html__('Main Demo', '_xe'), 'main-demo', 'screenshot', esc_html__('After you import this demo, you will have to import revolution slider demo content separately.', '_xe') ),

	);

}
add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function ocdi_after_import( $selected_import ) {

	if ( 'Main Demo' === $selected_import['import_file_name'] ) {

		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
		$blog_menu = get_term_by( 'name', 'Blog and Posts', 'nav_menu' );

		set_theme_mod( 'nav_menu_locations', array(
				'primary-menu' => $main_menu->term_id,
				'blog-menu' => $blog_menu->term_id,
			)
		);

		// Assign front page and blog page.
		$front_page_id = get_page_by_title( 'Home' );
		$blog_page_id  = get_page_by_title( 'Blog' );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );

		if ( 'Main Demo' === $selected_import['import_file_name'] ) {
			$file_name = 'slider-1';
		} else {
			$file_name = 'slider-1';
		}

		// Import Revolution Slider
		if ( class_exists('RevSlider') ) {
		
			$slider_array = array(
				get_template_directory() . '/framework/demo-content/revslider/' . esc_attr($file_name) . '.zip'
			);

			$slider = new RevSlider();

			foreach ($slider_array as $filepath) {
				$slider->importSliderFromPost(true, true, $filepath);  
			}

			echo ' Slider demo imported successfully.';
			
		}

	}

}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import' );
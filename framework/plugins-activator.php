<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', '_xe_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * <snip />
 * 
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function _xe_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// Include a plugin bundled with a theme.
	 	array(
	 		'name'               => 'Xe Core', // The plugin name.
	 		'slug'               => 'xe-core', // The plugin slug (typically the folder name).
	 		'source'             => get_template_directory() . '/framework/plugins/xe-core.zip', // The plugin source.
	 		'required'           => true, // If false, the plugin is only 'recommended' instead of required.
	 		'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
	 		'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
	 		'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
	 		'external_url'       => '', // If set, overrides default API URL and points to an external URL.
	 		'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
	 	),
	 	array(
	 		'name'               => 'Advanced Custom Fields Pro', // The plugin name.
	 		'slug'               => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
	 		'source'             => get_template_directory() . '/framework/plugins/advanced-custom-fields-pro.zip', // The plugin source.
	 		'required'           => true, // If false, the plugin is only 'recommended' instead of required.
	 		'version'            => '5.5.12', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
	 		'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
	 		'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
	 		'external_url'       => '', // If set, overrides default API URL and points to an external URL.
	 		'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
	 	),
	 	array(
	 		'name'               => 'Visual Composer', // The plugin name.
	 		'slug'               => 'js_composer', // The plugin slug (typically the folder name).
	 		'source'             => get_template_directory() . '/framework/plugins/js_composer.zip', // The plugin source.
	 		'required'           => true, // If false, the plugin is only 'recommended' instead of required.
	 		'version'            => '5.1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
	 		'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
	 		'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
	 		'external_url'       => '', // If set, overrides default API URL and points to an external URL.
	 		'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
	 	),
	 	array(
	 		'name'               => 'Revolution Slider', // The plugin name.
	 		'slug'               => 'revslider', // The plugin slug (typically the folder name).
	 		'source'             => get_template_directory() . '/framework/plugins/revslider.zip', // The plugin source.
	 		'required'           => false, // If false, the plugin is only 'recommended' instead of required.
	 		'version'            => '5.3.1.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
	 		'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
	 		'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
	 		'external_url'       => '', // If set, overrides default API URL and points to an external URL.
	 		'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
	 	),

		// Include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Redux Framework',
			'slug'      => 'redux-framework',
			'required'  => true,
		),
		array(
			'name'      => 'One Click Demo Import',
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		),
		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),

		// <snip />
		
	); 

	/**
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',       // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'install-plugins',       // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                    // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', '_xe' ),
			'menu_title'                      => __( 'Install Plugins', '_xe' ),
		    // <snip>...</snip>
			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)
		*/
	);

	tgmpa( $plugins, $config );

}
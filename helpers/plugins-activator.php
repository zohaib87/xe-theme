<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/helpers/class-tgm-plugin-activation.php';

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

		// Include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Elementor Website Builder',
			'slug'      => 'elementor',
			'required'  => false,
		),
    array(
      'name'      => 'Kirki Customizer Framework',
      'slug'      => 'kirki',
      'required'  => true,
    ),
		array(
			'name'      => 'Meta Box',
			'slug'      => 'meta-box',
			'required'  => true,
		),
    array(
      'name'      => 'Max Mega Menu',
      'slug'      => 'megamenu',
      'required'  => true,
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
add_action( 'tgmpa_register', '_xe_register_required_plugins' );
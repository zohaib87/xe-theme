<?php
/**
 * Register the required plugins for this theme.
 *
 * @link http://tgmpluginactivation.com/configuration/
 *
 * @package _xe
 */

namespace Xe_Theme\Helpers;

class Plugins_Activator {

  function __construct() {

    require_once get_template_directory() . '/helpers/class-tgm-plugin-activation.php';

    add_action( 'tgmpa_register', [ $this, 'register_required_plugins' ] );

  }

  public function register_required_plugins() {

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
      )

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     */
    $config = array(
      'id'           => 'tgmpa',
      'default_path' => '',
      'menu'         => 'install-plugins',
      'parent_slug'  => 'themes.php',
      'capability'   => 'edit_theme_options',
      'has_notices'  => true,
      'dismissable'  => true,
      'dismiss_msg'  => '',
      'is_automatic' => false,
      'message'      => '',
    );

    tgmpa( $plugins, $config );

  }

}
new Plugins_Activator();

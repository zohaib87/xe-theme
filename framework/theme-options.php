<?php
/**
 * ReduxFramework Theme Options File
 *
 * @package _xe
 */

if ( !class_exists('Redux') ) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "xe_options";

/**
 * ===> SET ARGUMENTS
 */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(

    /**
     * TYPICAL => Change these values as you need/desire
     */
    'opt_name'             => $opt_name, // This is where your data is stored in the database and also becomes your global variable name.

    'display_name'         => $theme->get( 'Name' ), // Name that appears at the top of your panel
    
    'display_version'      => $theme->get( 'Version' ), // Version that appears at the top of your panel
    
    'menu_type'            => 'submenu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)

    'allow_sub_menu'       => true,
    
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__( 'Theme Options', '_xe' ),
    'page_title'           => esc_html__( 'Theme Options', '_xe' ),

    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',

    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,

    // Must be defined to add google fonts to the typography module
    'async_typography'     => false, // Use a asynchronous font on the front end or font string
    
    'disable_google_fonts_link' => true, // Disable this in case you want to create your own google fonts loader
    
    'admin_bar'            => true, // Show the panel pages on the admin bar

    'admin_bar_icon'       => 'dashicons-portfolio', // Choose an icon for the admin bar menu

    'admin_bar_priority'   => 50, // Choose an priority for the admin bar menu
    
    'global_variable'      => '', // Set a different name for your global variable other than the opt_name
    
    'dev_mode'             => false, // Show the time the page took to load, etc
    
    'update_notice'        => true, // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    
    'customizer'           => false, // Enable basic customizer support
    
    //'open_expanded'     => true, // Allow you to start the panel in an expanded way initially.
    
    'hide_expand'          => true, // Hide the panel expand button.
    
    'disable_save_warn'    => false, // Disable the save warning when a user changes a field


    /**
     * OPTIONAL => Give you extra features
     */
    'page_priority'        => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    
    'page_parent'          => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    
    'page_permissions'     => 'manage_options', // Permissions needed to access the options panel.
    
    'menu_icon'            => '', // Specify a custom URL to an icon
    
    'last_tab'             => '', // Force your panel to always open to a specific tab (by id)
    
    'page_icon'            => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
    
    'page_slug'            => 'theme_options', // Page slug used to denote the panel
    
    'save_defaults'        => true, // On load save the defaults to DB before user clicks save or not
    
    'default_show'         => false, // If true, shows the default value next to each field that is not the default value.
    
    'default_mark'         => '', // What to print by the field's title if the value shown is default. Suggested: *
    
    'show_import_export'   => true, // Shows the Import/Export panel when not used as a field.

    /**
     * CAREFUL => These options are for advanced use only
     */
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    
    'output'               => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    
    // 'footer_credit'     => '', // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE => Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

    'use_cdn'              => true, // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    //'compiler'             => true,

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'light',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    )
);

// ADMIN BAR LINKS => Setup custom links in the admin bar menu as external items.
$args['admin_bar_links'][] = array(
    'id'    => 'xe-support',
    'href'  => 'http://xecreators.com',
    'title' => esc_html__( 'Support', '_xe' ),
);

// SOCIAL ICONS => Setup custom links in the footer for quick links in your panel footer icons.
$args['share_icons'][] = array(
    'url'   => 'https://github.com/XeCreators',
    'title' => esc_html__('Visit us on GitHub', '_xe'),
    'icon'  => 'el el-github'
);
$args['share_icons'][] = array(
    'url'   => 'https://facebook.com/XeCreators',
    'title' => esc_html__('Like us on Facebook', '_xe'),
    'icon'  => 'el el-facebook'
);
$args['share_icons'][] = array(
    'url'   => 'https://twitter.com/XeCreators',
    'title' => esc_html__('Follow us on Twitter', '_xe'),
    'icon'  => 'el el-twitter'
);

Redux::setArgs( $opt_name, $args );

/**
 * ===> END ARGUMENTS
 */


/**
 * ===> START SECTIONS
 */

require get_template_directory() . '/framework/theme-options/general.php';
require get_template_directory() . '/framework/theme-options/favicon.php';
require get_template_directory() . '/framework/theme-options/typography.php';
require get_template_directory() . '/framework/theme-options/tool-bar.php';
require get_template_directory() . '/framework/theme-options/header.php';
require get_template_directory() . '/framework/theme-options/footer.php';
require get_template_directory() . '/framework/theme-options/blog.php';
require get_template_directory() . '/framework/theme-options/post.php';
require get_template_directory() . '/framework/theme-options/page.php';
require get_template_directory() . '/framework/theme-options/portfolio-list.php';
require get_template_directory() . '/framework/theme-options/portfolio-single.php';
require get_template_directory() . '/framework/theme-options/events-list.php';
require get_template_directory() . '/framework/theme-options/events-single.php';
require get_template_directory() . '/framework/theme-options/search.php';
require get_template_directory() . '/framework/theme-options/error.php';
require get_template_directory() . '/framework/theme-options/woocommerce-shop.php';
require get_template_directory() . '/framework/theme-options/woocommerce-product.php';
require get_template_directory() . '/framework/theme-options/social-profiles.php';
require get_template_directory() . '/framework/theme-options/custom-code.php';

/**
 * ===> END SECTIONS
 */


/**
 * Remove demo mode.
 */
function redux_remove_demo_mode() {

    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }

}
add_action('init', 'redux_remove_demo_mode');

/**
 * Extensions loader.
 */
if (!function_exists('redux_extension_loader')) {

    function redux_extension_loader($ReduxFramework) {

        $path    = dirname( __FILE__ ) . '/extensions/redux/';
        $folders = scandir( $path, 1 );

        foreach ( $folders as $folder ) {

            if ( $folder === '.' or $folder === '..' or ! is_dir( $path . $folder ) ) {
                continue;
            }

            $extension_class = 'ReduxFramework_Extension_' . $folder;

            if ( ! class_exists( $extension_class ) ) {
                // In case you wanted override your override, hah.
                $class_file = $path . $folder . '/extension_' . $folder . '.php';
                $class_file = apply_filters( 'redux/extension/' . $ReduxFramework->args['opt_name'] . '/' . $folder, $class_file );
                if ( $class_file ) {
                    require_once( $class_file );
                }
            }

            if ( ! isset( $ReduxFramework->extensions[ $folder ] ) ) {
                $ReduxFramework->extensions[ $folder ] = new $extension_class( $ReduxFramework );
            }

        }

    }
    // Modify {$redux_opt_name} to match your opt_name
    add_action("redux/extensions/xe_options/before", 'redux_extension_loader', 0);

}

/**
 * Redux option panel custom styles.
 */
function redux_panel_scripts() {

    wp_enqueue_style( 'redux-custom-css', get_template_directory_uri() . '/css/redux.css', array('redux-admin-css') );

}
add_action('redux/page/xe_options/enqueue', 'redux_panel_scripts');
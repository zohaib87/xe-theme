<?php 
/**
 * General Theme Options.
 *
 * @package _xe
 */

global $xe_opt;

Redux::setSection( 'xe_options', array(

    'id'         => 'opt_general',
    'title'      => esc_html__( 'General Options', '_xe' ),
    'desc'       => esc_html__( '', '_xe' ),
    'icon'       => 'el el-globe',
    'fields'     => array(

        array(
            'id'       => 'site_layout',
            'type'     => 'select',
            'title'    => esc_html__('Site Layout', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'options'  => array(
                'boxed' => 'Boxed',
                'wide' => 'Wide',
                'full-width' => 'Full Width'
            ),
            'default'  => 'wide',
        ),

        array(
            'id'        => 'boxed_layout_margin',
            'type'      => 'slider',
            'required' => array('site_layout','equals','boxed'),
            'title'     => esc_html__('Boxed Layout Margin', '_xe'),
            'subtitle'  => esc_html__('', '_xe'),
            'desc'      => esc_html__('Margin of boxed layout from top and bottom.', '_xe'),
            "default"   => '50',
            "min"       => '0',
            "step"      => '1',
            "max"       => '100',
        ),

        array(         
            'id'       => 'boxed_layout_bg',
            'type'     => 'background',
            'required' => array('site_layout','equals','boxed'),
            'title'    => esc_html__('Boxed Layout Background', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'transparent'  => false,
            'default'  => array(
                'background-color' => '#E3E3E3',
                'background-image' => get_template_directory_uri() . '/img/bg.jpg',
                'background-repeat' => 'no-repeat',
                'background-size' => 'cover',
                'background-attachment' => 'fixed',
                'background-position' => 'center center',
            )
        ),

        array(
            'id'        => 'main_grid_width',
            'type'      => 'slider',
            'required'  => array('site_layout','!=','full-width'),
            'title'     => esc_html__('Main Grid Width', '_xe'),
            'subtitle'  => esc_html__('Default: 1170px', '_xe'),
            "default"   => '1170',
            "min"       => '960',
            "step"      => '1',
            "max"       => '1380',
        ),

        array(
            'id'        => 'left_sidebar_width',
            'type'      => 'slider',
            'title'     => esc_html__('Left Sidebar Width', '_xe'),
            'subtitle'  => esc_html__('', '_xe'),
            'desc'      => esc_html__('This option is in percent.', '_xe'),
            "default"   => '30',
            "min"       => '10',
            "step"      => '1',
            "max"       => '50',
        ),

        array(
            'id'        => 'right_sidebar_width',
            'type'      => 'slider',
            'title'     => esc_html__('Right Sidebar Width', '_xe'),
            'subtitle'  => esc_html__('', '_xe'),
            'desc'      => esc_html__('This option is in percent.', '_xe'),
            "default"   => '30',
            "min"       => '10',
            "step"      => '1',
            "max"       => '50',
        ),

        array(
            'id'       => 'primary_color',
            'type'     => 'color',
            'title'    => esc_html__('Primary Color', '_xe'),
            'desc'     => esc_html__('Controls several items like: link hovers, highlights, and more.', '_xe'), 
            'transparent'  => false,
            'default'  => esc_attr($xe_opt->defaults['primary-color']),
            'validate' => 'color',
        ),

        array(
            'id'       => 'text_selection_color',
            'type'     => 'color',
            'title'    => esc_html__('Text Selection Color', '_xe'),
            'desc'     => esc_html__('', '_xe'), 
            'transparent'  => false,
            'default'  => '#fff',
            'validate' => 'color',
        ),

        array(
            'id'       => 'text_selection_bg_color',
            'type'     => 'color',
            'title'    => esc_html__('Text Selection Background Color', '_xe'),
            'desc'     => esc_html__('', '_xe'), 
            'transparent'  => false,
            'default'  => '#338fff',
            'validate' => 'color',
        ),

        array(
            'id'       => 'breadcrumb',
            'type'     => 'switch',
            'title'    => esc_html__('Breadcrumb', '_xe'),
            'subtitle' => esc_html__('', '_xe'), 
            'desc'     => esc_html__('Breadcrumbs will appear in title-bar.', '_xe'),
            'on' => 'Enable',
            'off' => 'Disable',
            'default'  => false
        ),

        array(
            'id'       => 'preloader',
            'type'     => 'switch',
            'title'    => esc_html__('Preloader', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc' => esc_html__('Enabling this option will show preloader until the site has been fully loaded.', '_xe'), 
            'on' => 'Enable',
            'off' => 'Disable',
            'default'  => false
        ),

        array(
            'id'       => 'smooth_scroll',
            'type'     => 'switch',
            'title'    => esc_html__('Smooth Scroll', '_xe'),
            'subtitle' => esc_html__('', '_xe'), 
            'desc'     => esc_html__('Enable to add easing movement in page scroll.', '_xe'),
            'on' => 'Enable',
            'off' => 'Disable',
            'default'  => false
        ),

        array(
            'id'        => 'google_api_key',
            'type'      => 'text',
            'title'     => esc_html__('Google API Key', '_xe'),
            'subtitle'  => esc_html__('', '_xe'),
            'desc'      => esc_html__('Used to process data from google service like map etc.', '_xe'),
            'default'   => ''
        ),

        array(
            'id'        => 'custom_sidebars',
            'type'      => 'multi_text',
            'title'     => esc_html__('Custom Widget Areas', '_xe'),
            'validate'  => 'no_special_chars',
            'subtitle'  => esc_html__('', '_xe'),
            'desc'      => esc_html__('Special characters not allowed! eg: "Contact Page 3"', '_xe'),
            'show_empty' => false,
            'default'   => array()
        ),

    )
    
) );
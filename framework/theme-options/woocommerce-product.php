<?php if ( !class_exists('WooCommerce') ) return;
/**
 * WooCommerce Product Theme Options.
 *
 * @package _xe
 */

Redux::setSection( 'xe_options', array(

    'id'         => 'opt_product',
    'title'      => esc_html__( 'Single', '_xe' ),
    'desc'       => esc_html__( 'Single Product Page.', '_xe' ),
    'subsection' => true,
    'fields'     => array(

        array(
            'id'       => 'product_header_menu',
            'type'     => 'select',
            'title'    => esc_html__('Header Menu Location', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Set location for header menu.', '_xe'),
            'data'     => 'menu_locations',
            'default'  => 'primary-menu',
        ),

        array( 
            'id'       => 'product_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => array(
                'color' => '', 
                'alpha' => '1.0'
            ),
            'output'   => array( '.single-product '.wp_kses_data($xe_opt->selectors['bg-color']) ),
            'mode'     => 'background',
        ),

        array(
            'id'       => 'product_title_bar',
            'type'     => 'switch',
            'title'    => esc_html__('Title-Bar', '_xe'),
            'subtitle' => esc_html__('', '_xe'), 
            'desc'     => esc_html__('Title-Bar is displayed below header.', '_xe'),
            'on' => 'Enable',
            'off' => 'Disable',
            'default'  => true
        ),

        array(
            'id'       => 'product_title_color',
            'type'     => 'color',
            'title'    => esc_html__('Title Color', '_xe'), 
            'transparent'  => false,
            'default'  => '',
            'validate' => 'color',
            'output'    => array(
                'color' => '.single-product '.wp_kses_data($xe_opt->selectors['title-color'])
            )
        ),

        array(
            'id'       => 'product_subtitle_color',
            'type'     => 'color',
            'title'    => esc_html__('Subtitle Color', '_xe'), 
            'transparent'  => false,
            'default'  => '',
            'validate' => 'color',
            'output'    => array(
                'color' => '.single-product '.wp_kses_data($xe_opt->selectors['subtitle-color'])
            )
        ),

        array(         
            'id'       => 'product_title_bar_bg',
            'type'     => 'background',
            'title'    => esc_html__('Title-Bar Background', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'transparent'  => false,
            'default'  => array(
                'background-color' => '',
            ),
            'output' => array( '.single-product '.wp_kses_data($xe_opt->selectors['title-bar-bg']) )
        ),

        array( 
            'id'       => 'product_title_bar_overlay',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Title-Bar Overlay', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => array(
                'color' => '', 
                'alpha' => '1.0'
            ),
            'output'   => array( '.single-product '.wp_kses_data($xe_opt->selectors['title-bar-overlay']) ),
            'mode'     => 'background',
        ),

        array(
            'id'       => 'product_title_bar_height',
            'type'     => 'text',
            'title'    => esc_html__('Title-Bar Height', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Enter height value in pixels. Do not add "px".', '_xe'),
            'validate' => 'numeric',
            'default'  => ''
        ),

        array(
            'id'       => 'product_padding_top',
            'type'     => 'text',
            'title'    => esc_html__('Spacing Top', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Spacing after title-bar and before the main content. Enter height value in pixels. Do not add "px".', '_xe'),
            'validate' => 'numeric',
            'default'  => '100'
        ),

        array(
            'id'       => 'product_padding_bottom',
            'type'     => 'text',
            'title'    => esc_html__('Spacing Bottom', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Spacing before footer or footer section. Enter height value in pixels. Do not add "px".', '_xe'),
            'validate' => 'numeric',
            'default'  => '100'
        ),

        array(
            'id'       => 'product_sidebar_position',
            'type'     => 'select',
            'title'    => esc_html__('Sidebar Position', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'options'  => array(
                'none' => 'No Sidebar',
                'left' => 'Left Sidebar',
                'right' => 'Right Sidebar',
                'both' => 'Left & Right Sidebars',
            ),
            'default'  => 'none',
        ),

        array(
            'id'       => 'product_left_sidebar_selector',
            'type'     => 'select',
            'title'    => esc_html__('Select Left Sidebar', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'data'     => 'sidebars',
            'default'  => 'sidebar-1',
        ),

        array(
            'id'       => 'product_right_sidebar_selector',
            'type'     => 'select',
            'title'    => esc_html__('Select Right Sidebar', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'data'     => 'sidebars',
            'default'  => 'sidebar-2',
        ),

        array(
            'id'       => 'related_products',
            'type'     => 'switch',
            'title'    => esc_html__('Related products', '_xe'),
            'subtitle' => esc_html__('', '_xe'), 
            'desc'     => esc_html__('Enable to show related products.', '_xe'),
            'on' => 'Enable',
            'off' => 'Disable',
            'default'  => true
        ),

        array(
            'id'       => 'product_reviews',
            'type'     => 'switch',
            'title'    => esc_html__('Reviews', '_xe'),
            'subtitle' => esc_html__('', '_xe'), 
            'desc'     => esc_html__('', '_xe'),
            'on' => 'Enable',
            'off' => 'Disable',
            'default'  => true
        ),
    
    )
    
) );
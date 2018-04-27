<?php 
/**
 * Header Theme Options.
 *
 * @package _xe
 */

Redux::setSection( 'xe_options', array(

    'id'         => 'opt_header',
    'title'      => esc_html__( 'Header', '_xe' ),
    'desc'       => esc_html__( '', '_xe' ),
    'icon'       => 'el el-website',
    'fields'     => array(
        
        array(
            'id'       => 'header_style',
            'type'     => 'image_select',
            'title'    => esc_html__('Header Style', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'options'  => array(
                '' => array(
                    'alt'   => 'Primary Header Style', 
                    'img'   => get_template_directory_uri() . '/img/header/primary_header.png',
                ),
                'second' => array(
                    'alt'   => 'Second Header Style', 
                    'img'   => get_template_directory_uri() . '/img/header/primary_header.png',
                )
            ),
            'default' => ''
        ),

        array(
            'id'       => 'header_data_in',
            'type'     => 'select',
            'title'    => esc_html__('Dropdown Mouse Hover Animation', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'options'  => array(
                'bounce' => 'bounce',
                'flash' => 'flash',
                'pulse' => 'pulse',
                'rubberBand' => 'rubberBand',
                'shake' => 'shake',
                'headShake' => 'headShake',
                'swing' => 'swing',
                'tada' => 'tada',
                'wobble' => 'wobble',
                'jello' => 'jello',
                'bounceIn' => 'bounceIn',
                'bounceInDown' => 'bounceInDown',
                'bounceInLeft' => 'bounceInLeft',
                'bounceInRight' => 'bounceInRight',
                'bounceInUp' => 'bounceInUp',
                'fadeIn' => 'fadeIn',
                'fadeInDown' => 'fadeInDown',
                'fadeInDownBig' => 'fadeInDownBig',
                'fadeInLeft' => 'fadeInLeft',
                'fadeInLeftBig' => 'fadeInLeftBig',
                'fadeInRight' => 'fadeInRight',
                'fadeInRightBig' => 'fadeInRightBig',
                'fadeInUp' => 'fadeInUp',
                'fadeInUpBig' => 'fadeInUpBig',
                'flip' => 'flip',
                'flipInX' => 'flipInX',
                'flipInY' => 'flipInY',
                'lightSpeedIn' => 'lightSpeedIn',
                'rotateIn' => 'rotateIn',
                'rotateInDownLeft' => 'rotateInDownLeft',
                'rotateInDownRight' => 'rotateInDownRight',
                'rotateInUpLeft' => 'rotateInUpLeft',
                'rotateInUpRight' => 'rotateInUpRight',
                'jackInTheBox' => 'jackInTheBox',
                'rollIn' => 'rollIn',
                'zoomIn' => 'zoomIn',
                'zoomInDown' => 'zoomInDown',
                'zoomInLeft' => 'zoomInLeft',
                'zoomInRight' => 'zoomInRight',
                'zoomInUp' => 'zoomInUp',
                'slideInDown' => 'slideInDown',
                'slideInLeft' => 'slideInLeft',
                'slideInRight' => 'slideInRight',
                'slideInUp' => 'slideInUp',
            ),
            'default'  => 'fadeIn',
        ),

        array(
            'id'       => 'header_data_out',
            'type'     => 'select',
            'title'    => esc_html__('Dropdown Mouse Leave Animation', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'options'  => array(
                'bounceOut' => 'bounceOut',
                'bounceOutDown' => 'bounceOutDown',
                'bounceOutLeft' => 'bounceOutLeft',
                'bounceOutRight' => 'bounceOutRight',
                'bounceOutUp' => 'bounceOutUp',
                'fadeOut' => 'fadeOut',
                'fadeOutDown' => 'fadeOutDown',
                'fadeOutDownBig' => 'fadeOutDownBig',
                'fadeOutLeft' => 'fadeOutLeft',
                'fadeOutLeftBig' => 'fadeOutLeftBig',
                'fadeOutRight' => 'fadeOutRight',
                'fadeOutRightBig' => 'fadeOutRightBig',
                'fadeOutUp' => 'fadeOutUp',
                'fadeOutUpBig' => 'fadeOutUpBig',
                'flipOutX' => 'flipOutX',
                'flipOutY' => 'flipOutY',
                'lightSpeedOut' => 'lightSpeedOut',
                'rotateOut' => 'rotateOut',
                'rotateOutDownLeft' => 'rotateOutDownLeft',
                'rotateOutDownRight' => 'rotateOutDownRight',
                'rotateOutUpLeft' => 'rotateOutUpLeft',
                'rotateOutUpRight' => 'rotateOutUpRight',
                'hinge' => 'hinge',
                'rollOut' => 'rollOut',
                'zoomOut' => 'zoomOut',
                'zoomOutDown' => 'zoomOutDown',
                'zoomOutLeft' => 'zoomOutLeft',
                'zoomOutRight' => 'zoomOutRight',
                'zoomOutUp' => 'zoomOutUp',
                'slideOutDown' => 'slideOutDown',
                'slideOutLeft' => 'slideOutLeft',
                'slideOutRight' => 'slideOutRight',
                'slideOutUp' => 'slideOutUp',
            ),
            'default'  => 'fadeOut',
        ),

        array(
            'id'       => 'header_padding',
            'type'     => 'text',
            'title'    => esc_html__('Header Padding', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Padding for header from its top & bottom. Enter height value in pixels. Do not add "px".', '_xe'),
            'validate' => 'numeric',
            'default'  => ''
        ),

        array(
            'id'       => 'header_location',
            'type'     => 'select',
            'title'    => esc_html__('Header Location', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'options'  => array(
                'top' => 'Top',
                'bottom' => 'Bottom',
            ),
            'default'  => 'top',
        ),

        array( 
            'id'       => 'header_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => array(
                'color' => '', 
                'alpha' => '1.0'
            ),
            'output'   => array(
                'background' => wp_kses_data($xe_opt->selectors['header-bg-color'])
            ),
        ),
        array( 
            'id'       => 'header_link_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Link Color', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => array(
                'color' => '', 
                'alpha' => '1.0'
            ),
            'output'   => array(
                'color' => wp_kses_data($xe_opt->selectors['header-link-color'])
            ),
        ),
        array( 
            'id'       => 'header_link_hover_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Link Hover Color', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => array(
                'color' => '', 
                'alpha' => '1.0'
            ),
            'output'   => array(
                'color' => wp_kses_data($xe_opt->selectors['header-link-hover-color'])
            ),
        ),
        
        array( 
            'id'       => 'header_dropdown_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Dropdown Background Color', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => array(
                'color' => '', 
                'alpha' => '1.0'
            ),
            'output'   => array(
                'background'=> wp_kses_data($xe_opt->selectors['header-dropdown-bg-color'])
            ),
        ),
        array( 
            'id'       => 'header_dropdown_link_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Dropdown Link Color', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => array(
                'color' => '', 
                'alpha' => '1.0'
            ),
            'output'   => array(
                'color' => wp_kses_data($xe_opt->selectors['header-dropdown-link-color'])
            ),
        ),
        array( 
            'id'       => 'header_dropdown_link_hover_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Dropdown Link Hover Color', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => array(
                'color' => '', 
                'alpha' => '1.0'
            ),
            'output'   => array(
                'color' => wp_kses_data($xe_opt->selectors['header-dropdown-link-hover-color'])
            ),
        ),

        array(
            'id'       => 'logo',
            'type'     => 'media', 
            'url'      => true,
            'title'    => esc_html__('Upload Logo', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'subtitle' => esc_html__('Size Must be: ', '_xe'),
            'default'  => array(
                'url' => get_template_directory_uri() . '/img/logo.png'
            ),
        ),

        array(
            'id'       => 'retina_logo',
            'type'     => 'media', 
            'url'      => true,
            'title'    => esc_html__('Upload Retina Logo', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Size should be exactly 2x of the logo you have uploaded in above option.', '_xe'),
            'default'  => array(
                'url' => get_template_directory_uri() . '/img/logo-2x.png'
            ),
        ),

        array(
            'id'       => 'light_logo',
            'type'     => 'media', 
            'url'      => true,
            'title'    => esc_html__('Upload Light Logo', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'subtitle' => esc_html__('Size Must be: ', '_xe'),
            'default'  => array(
                'url' => get_template_directory_uri() . '/img/light-logo.png'
            ),
        ),

        array(
            'id'       => 'light_retina_logo',
            'type'     => 'media', 
            'url'      => true,
            'title'    => esc_html__('Upload Light Retina Logo', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Size should be exactly 2x of the logo you have uploaded in above option.', '_xe'),
            'default'  => array(
                'url' => get_template_directory_uri() . '/img/light-logo-2x.png'
            ),
        ),

        array(
            'id'       => 'transparent_header',
            'type'     => 'switch',
            'title'    => esc_html__('Transparent Header', '_xe'),
            'subtitle' => esc_html__('', '_xe'), 
            'desc'     => esc_html__('Works better only if header location is top.', '_xe'),
            'on' => 'Enable',
            'off' => 'Disable',
            'default'  => false
        ),

        array(
            'id'       => 'sticky_header',
            'type'     => 'switch',
            'title'    => esc_html__('Sticky Header', '_xe'),
            'subtitle' => esc_html__('', '_xe'), 
            'desc'     => esc_html__('Enable to stick header to top while scrolling.', '_xe'),
            'on' => 'Enable',
            'off' => 'Disable',
            'default'  => false
        ),

        array(
            'id'       => 'squeezed_header',
            'type'     => 'switch',
            'title'    => esc_html__('Squeezed Header', '_xe'),
            'subtitle' => esc_html__('', '_xe'), 
            'desc'     => esc_html__('Enable to squeeze header on scroll.', '_xe'),
            'on' => 'Enable',
            'off' => 'Disable',
            'default'  => false
        ),

        array(
            'id'       => 'squeezed_header_padding',
            'type'     => 'text',
            'title'    => esc_html__('Squeezed Header Padding', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Padding for squeezed header from its top & bottom. Enter height value in pixels. Do not add "px".', '_xe'),
            'validate' => 'numeric',
            'default'  => ''
        ),

        array(
            'id'       => 'search_form',
            'type'     => 'switch',
            'title'    => esc_html__('Search Form', '_xe'),
            'subtitle' => esc_html__('', '_xe'), 
            'desc'     => esc_html__('', '_xe'),
            'on' => 'Enable',
            'off' => 'Disable',
            'default'  => false
        ),

        array(
            'id'       => 'header_social_icons',
            'type'     => 'switch',
            'title'    => esc_html__('Social Icons', 'exact'),
            'subtitle' => esc_html__('', 'exact'), 
            'desc'     => esc_html__('Enable to display social icons in site header.', 'exact'),
            'on' => 'Enable',
            'off' => 'Disable',
            'default'  => true
        ),

    )
    
) );
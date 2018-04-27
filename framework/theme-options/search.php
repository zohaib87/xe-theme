<?php 
/**
 * Search Theme Options.
 *
 * @package _xe
 */

Redux::setSection( 'xe_options', array(

    'id'         => 'opt_search',
    'title'      => esc_html__( 'Search', '_xe' ),
    'desc'       => esc_html__( '', '_xe' ),
    'icon'       => 'el el-search',
    'fields'     => array( 

        array(
            'id'       => 'search_tool_bar',
            'type'     => 'select',
            'title'    => esc_html__('Tool Bar', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Default will refer to ', '_xe') . '<a href="javascript:void(0);" id="4_section_group_li_a" class="redux-group-tab-link-a" data-key="4" data-rel="4"><span class="group_title">' . esc_html__('Tool-Bar Options', '_xe') . '</span></a>',
            'options'  => array(
                'default' => 'Default',
                'true' => 'Enable',
                'false' => 'Disable',
            ),
            'default'  => 'default',
        ),

        array(
            'id'       => 'search_header_style',
            'type'     => 'select',
            'title'    => esc_html__('Header Style', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Default will refer to ', '_xe') . '<a href="javascript:void(0);" id="5_section_group_li_a" class="redux-group-tab-link-a" data-key="5" data-rel="5"><span class="group_title">' . esc_html__('Header Options', '_xe') . '</span></a>',
            'options'  => array(
                'default' => 'Default',
                '' => 'Primary Header Style',
                'second' => 'Second Header Style',
            ),
            'default'  => 'default',
        ),

        array(
            'id'       => 'search_header_location',
            'type'     => 'select',
            'title'    => esc_html__('Header Location', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Default will refer to ', '_xe') . '<a href="javascript:void(0);" id="5_section_group_li_a" class="redux-group-tab-link-a" data-key="5" data-rel="5"><span class="group_title">' . esc_html__('Header Options', '_xe') . '</span></a>',
            'options'  => array(
                'default' => 'Default',
                'top' => 'Top',
                'bottom' => 'Bottom',
            ),
            'default'  => 'default',
        ),

        array(
            'id'       => 'search_header_menu',
            'type'     => 'select',
            'title'    => esc_html__('Header Menu Location', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Set location for header menu.', '_xe'),
            'data'     => 'menu_locations',
            'default'  => 'primary-menu',
        ),

        array( 
            'id'       => 'search_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => array(
                'color' => '', 
                'alpha' => '1.0'
            ),
            'output'   => array( '.search-results '.wp_kses_data($xe_opt->selectors['bg-color']) ),
            'mode'     => 'background',
        ),

        array(
            'id'       => 'search_title_bar',
            'type'     => 'switch',
            'title'    => esc_html__('Title-Bar', '_xe'),
            'subtitle' => esc_html__('', '_xe'), 
            'desc'     => esc_html__('Title-Bar is displayed below header.', '_xe'),
            'on' => 'Enable',
            'off' => 'Disable',
            'default'  => true
        ),

        array(
            'id'       => 'search_title',
            'type'     => 'text',
            'title'    => esc_html__('Title', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => 'Search Result'
        ),

        array(
            'id'       => 'search_subtitle',
            'type'     => 'text',
            'title'    => esc_html__('Subtitle', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => 'Not what you looking for? Maybe try again...'
        ),

        array(
            'id'       => 'search_title_color',
            'type'     => 'color',
            'title'    => esc_html__('Title Color', '_xe'), 
            'transparent'  => false,
            'default'  => '',
            'validate' => 'color',
            'output'    => array(
                'color' => '.search-results '.wp_kses_data($xe_opt->selectors['title-color'])
            )
        ),

        array(
            'id'       => 'search_subtitle_color',
            'type'     => 'color',
            'title'    => esc_html__('Subtitle Color', '_xe'),
            'transparent'  => false, 
            'default'  => '',
            'validate' => 'color',
            'output'    => array(
                'color' => '.search-results '.wp_kses_data($xe_opt->selectors['subtitle-color'])
            )
        ),

        array(         
            'id'       => 'search_title_bar_bg',
            'type'     => 'background',
            'title'    => esc_html__('Title-Bar Background', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'transparent'  => false,
            'default'  => array(
                'background-color' => '',
            ),
            'output'   => array( '.search-results '.wp_kses_data($xe_opt->selectors['title-bar-bg']) )
        ),

        array( 
            'id'       => 'search_title_bar_overlay',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Title-Bar Overlay', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => array(
                'color' => '', 
                'alpha' => '1.0'
            ),
            'output'   => array( '.search-results '.wp_kses_data($xe_opt->selectors['title-bar-overlay']) ),
            'mode'     => 'background',
        ),

        array(
            'id'       => 'search_title_bar_height',
            'type'     => 'text',
            'title'    => esc_html__('Title-Bar Height', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Enter height value in pixels. Do not add "px".', '_xe'),
            'validate' => 'numeric',
            'default'  => ''
        ),

        array(
            'id'       => 'search_padding_top',
            'type'     => 'text',
            'title'    => esc_html__('Spacing Top', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Spacing after title-bar and before the main content. Enter height value in pixels. Do not add "px".', '_xe'),
            'validate' => 'numeric',
            'default'  => '100'
        ),

        array(
            'id'       => 'search_padding_bottom',
            'type'     => 'text',
            'title'    => esc_html__('Spacing Bottom', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Spacing before footer or footer section. Enter height value in pixels. Do not add "px".', '_xe'),
            'validate' => 'numeric',
            'default'  => '100'
        ),

    )
    
) );
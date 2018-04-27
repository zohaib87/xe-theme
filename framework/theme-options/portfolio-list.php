<?php 
/**
 * Portfolio Archive Theme Options.
 *
 * @package _xe
 */

Redux::setSection( 'xe_options', array(

    'id'         => 'opt_portfolio',
    'title'      => esc_html__( 'Portfolio', '_xe' ),
    'desc'       => esc_html__( '', '_xe' ),
    'icon'       => 'el el-briefcase'

) );


Redux::setSection( 'xe_options', array(

    'id'         => 'opt_portfolio_list',
    'title'      => esc_html__( 'Archive', '_xe' ),
    'desc'       => esc_html__( 'Portfolio Archive Page.', '_xe' ),
    'subsection' => true,
    'fields'     => array(

        array(
            'id'       => 'portfolio_list_tool_bar',
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
            'id'       => 'portfolio_list_header_style',
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
            'id'       => 'portfolio_list_header_location',
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
            'id'       => 'portfolio_list_header_menu',
            'type'     => 'select',
            'title'    => esc_html__('Header Menu Location', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Set location for header menu.', '_xe'),
            'data'     => 'menu_locations',
            'default'  => 'primary-menu',
        ),

        array( 
            'id'       => 'portfolio_list_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => array(
                'color' => '', 
                'alpha' => '1.0'
            ),
            'output'   => array( '.archive.post-type-archive-xe-portfolio '.wp_kses_data($xe_opt->selectors['bg-color']) ),
            'mode'     => 'background',
        ),

        array(
            'id'       => 'portfolio_list_columns',
            'type'     => 'select',
            'title'    => esc_html__('Portfolio Columns', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'options'  => array(
                '2' => '2 Columns',
                '3' => '3 Columns',
                '4' => '4 Columns',
            ),
            'default'  => '4',
        ),

        array(
            'id'       => 'portfolio_list_style',
            'type'     => 'select',
            'title'    => esc_html__('Portfolio Style', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'options'  => array(
                '1' => 'Portfolio Style 1',
                '2' => 'Portfolio Style 2',
                '3' => 'Portfolio Style 3',
            ),
            'default'  => '1',
        ),

        array(
            'id'       => 'portfolio_list_title_bar',
            'type'     => 'switch',
            'title'    => esc_html__('Title-Bar', '_xe'),
            'subtitle' => esc_html__('', '_xe'), 
            'desc'     => esc_html__('Title-Bar is displayed below header.', '_xe'),
            'on' => 'Enable',
            'off' => 'Disable',
            'default'  => true
        ),

        array(
            'id'       => 'portfolio_list_title',
            'type'     => 'text',
            'title'    => esc_html__('Title', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => 'Portfolio'
        ),

        array(
            'id'       => 'portfolio_list_subtitle',
            'type'     => 'text',
            'title'    => esc_html__('Subtitle', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => 'Bring Out the Amazing Portfolio!'
        ),

        array(
            'id'       => 'portfolio_list_title_color',
            'type'     => 'color',
            'title'    => esc_html__('Title Color', '_xe'), 
            'transparent'  => false,
            'default'  => '',
            'validate' => 'color',
            'output'    => array(
                'color' => '.archive.post-type-archive-xe-portfolio '.wp_kses_data($xe_opt->selectors['title-color'])
            )
        ),

        array(
            'id'       => 'portfolio_list_subtitle_color',
            'type'     => 'color',
            'title'    => esc_html__('Subtitle Color', '_xe'), 
            'transparent'  => false,
            'default'  => '',
            'validate' => 'color',
            'output'    => array(
                'color' => '.archive.post-type-archive-xe-portfolio '.wp_kses_data($xe_opt->selectors['subtitle-color'])
            )
        ),

        array(         
            'id'       => 'portfolio_list_title_bar_bg',
            'type'     => 'background',
            'title'    => esc_html__('Title-Bar Background', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'transparent'  => false,
            'default'  => array(
                'background-color' => '',
            ),
            'output'   => array( '.archive.post-type-archive-xe-portfolio '.wp_kses_data($xe_opt->selectors['title-bar-bg']) )
        ),

        array( 
            'id'       => 'portfolio_list_title_bar_overlay',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Title-Bar Overlay', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => array(
                'color' => '', 
                'alpha' => '1.0'
            ),
            'output'   => array( '.archive.post-type-archive-xe-portfolio '.wp_kses_data($xe_opt->selectors['title-bar-overlay']) ),
            'mode'     => 'background',
        ),

        array(
            'id'       => 'portfolio_list_title_bar_height',
            'type'     => 'text',
            'title'    => esc_html__('Title-Bar Height', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Enter height value in pixels. Do not add "px".', '_xe'),
            'validate' => 'numeric',
            'default'  => ''
        ),

        array(
            'id'       => 'portfolio_list_padding_top',
            'type'     => 'text',
            'title'    => esc_html__('Spacing Top', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Spacing after title-bar and before the main content. Enter height value in pixels. Do not add "px".', '_xe'),
            'validate' => 'numeric',
            'default'  => '100'
        ),

        array(
            'id'       => 'portfolio_list_padding_bottom',
            'type'     => 'text',
            'title'    => esc_html__('Spacing Bottom', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Spacing before footer or footer section. Enter height value in pixels. Do not add "px".', '_xe'),
            'validate' => 'numeric',
            'default'  => '100'
        ),

        array(
            'id'       => 'portfolio_list_sidebar_position',
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
            'id'       => 'portfolio_list_left_sidebar_selector',
            'type'     => 'select',
            'title'    => esc_html__('Select Left Sidebar', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'data'     => 'sidebars',
            'default'  => 'sidebar-1',
        ),

        array(
            'id'       => 'portfolio_list_right_sidebar_selector',
            'type'     => 'select',
            'title'    => esc_html__('Select Right Sidebar', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'data'     => 'sidebars',
            'default'  => 'sidebar-2',
        ),

        array(
            'id'       => 'portfolio_list_slug',
            'type'     => 'text',
            'title'    => esc_html__('Portfolio Slug', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => 'portfolio'
        ),

        array(
            'id'       => 'portfolio_list_category_slug',
            'type'     => 'text',
            'title'    => esc_html__('Category Slug', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => 'portfolio-category'
        ),
    
    )
    
) );
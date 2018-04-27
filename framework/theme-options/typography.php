<?php 
/**
 * Typography Theme Options.
 *
 * @package _xe
 */

Redux::setSection( 'xe_options', array(

    'id'         => 'opt_typography',
    'title'      => esc_html__( 'Typography', '_xe' ),
    'desc'       => esc_html__( 'Select only the font you have added url for, in the first field. Selecting others will simply not work.', '_xe' ),
    'icon'       => 'el el-fontsize',
    'fields'     => array(

        array(
            'id'        => 'google_fonts',
            'type'      => 'text',
            'title'     => esc_html__('Google Fonts URL', '_xe'),
            'subtitle'  => esc_html__('', '_xe'),
            'desc'      => '<a href="'.esc_url('https://fonts.google.com/').'" target="_blank">'.esc_html__('Click Here', '_xe').'</a>'.esc_html__(' to choose font and get its url.', '_xe'),
            'placeholder' => 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700',
            'default'   => ''
        ),

        array(
            'id'             => 'body_font',
            'type'           => 'typography', 
            'title'          => esc_html__('Body Font', '_xe'),
            'subtitle'       => esc_html__('', '_xe'),
            'google'         => true, 
            'font-backup'    => true,
            'font-style'     => true,
            'font-weight'    => true,
            'line-height'    => true,
            'letter-spacing' => true,
            'text-align'     => false,
            'color'          => true,
            'units'          =>'px',
            'default' => array(
                'font-weight'   => '', // 400
                'font-family'   => '', // Open Sans
                'font-backup'   => '', // sans-serif
                'google'        => true,
                'font-size'     => '', // 14px
            ),
            'fonts' => array(
                'sans-serif' => 'sans-serif',
            ),
            // 'ext-font-css' => get_template_directory_uri() . '/fonts/montserrat-fonts.css',
            'preview' => array(
                'text' => 'The quick brown fox jumps over the lazy dog.',
                'always_display' => true,
            ),
            'output' => array( wp_strip_all_tags($xe_opt->selectors['body-font']) )
        ),

        array(
            'id'             => 'menu_font',
            'type'           => 'typography', 
            'title'          => esc_html__('Main Menu Font', '_xe'),
            'subtitle'       => esc_html__('', '_xe'),
            'google'         => true, 
            'font-backup'    => true,
            'font-size'      => true,
            'font-style'     => true,
            'font-weight'    => true,
            'line-height'    => false,
            'letter-spacing' => false,
            'text-align'     => false,
            'color'          => false,
            'units'          =>'px',
            'default' => array(
                'font-weight'   => '', 
                'font-family'   => '',
                'font-backup'   => '',
                'google'        => true,
                'font-size'     => '',
            ),
            'fonts' => array(
                'sans-serif' => 'sans-serif',
            ),
            // 'ext-font-css' => get_template_directory_uri() . '/fonts/montserrat-fonts.css',
            'preview' => array(
                'text' => 'The quick brown fox jumps over the lazy dog.',
                'always_display' => true,
            ),
            'output' => array( wp_strip_all_tags($xe_opt->selectors['menu-font']) )
        ),

        array(
            'id'             => 'sub_menu_font',
            'type'           => 'typography', 
            'title'          => esc_html__('Sub-Menu Font', '_xe'),
            'subtitle'       => esc_html__('', '_xe'),
            'google'         => true, 
            'font-backup'    => true,
            'font-size'      => true,
            'font-style'     => true,
            'font-weight'    => true,
            'line-height'    => false,
            'letter-spacing' => false,
            'text-align'     => false,
            'color'          => false,
            'units'          =>'px',
            'default' => array(
                'font-weight'   => '', 
                'font-family'   => '',
                'font-backup'   => '',
                'google'        => true,
                'font-size'     => '',
            ),
            'fonts' => array(
                'sans-serif' => 'sans-serif',
            ),
            // 'ext-font-css' => get_template_directory_uri() . '/fonts/montserrat-fonts.css',
            'preview' => array(
                'text' => 'The quick brown fox jumps over the lazy dog.',
                'always_display' => true,
            ),
            'output' => array( wp_strip_all_tags($xe_opt->selectors['sub-menu-font']) )
        ),

        array(
            'id'             => 'headings_font',
            'type'           => 'typography', 
            'title'          => esc_html__('Headings Font', '_xe'),
            'subtitle'       => esc_html__('', '_xe'),
            'google'         => true, 
            'font-backup'    => true,
            'font-size'      => false,
            'font-style'     => true,
            'font-weight'    => true,
            'text-align'     => false,
            'line-height'    => false,
            'text-transform' => true,
            'color'          => false,
            'units'          =>'px',
            'default' => array(  
                'font-weight'    => '',
                'font-family'    => '', 
                'font-backup'    => '',
                'text-transform' => '',
                'google'         => true,
            ),
            'fonts' => array(
                'sans-serif' => 'sans-serif',
            ),
            // 'ext-font-css' => get_template_directory_uri() . '/fonts/montserrat-fonts.css',
            'preview' => array(
                'text' => 'The quick brown fox jumps over the lazy dog.',
                'always_display' => true,
            ),
            'output' => array( wp_strip_all_tags($xe_opt->selectors['headings-font']) )
        ),

        array(
            'id'             => 'widgets_title_font',
            'type'           => 'typography', 
            'title'          => esc_html__('Widgets Title Font', '_xe'),
            'subtitle'       => esc_html__('', '_xe'),
            'google'         => true, 
            'font-backup'    => true,
            'font-size'      => false,
            'font-style'     => true,
            'font-weight'    => true,
            'text-align'     => false,
            'line-height'    => false,
            'text-transform' => true,
            'color'          => false,
            'units'          =>'px',
            'default' => array(  
                'font-weight'    => '',
                'font-family'    => '', 
                'font-backup'    => '',
                'text-transform' => '',
                'google'         => true,
            ),
            'fonts' => array(
                'sans-serif' => 'sans-serif',
            ),
            // 'ext-font-css' => get_template_directory_uri() . '/fonts/montserrat-fonts.css',
            'preview' => array(
                'text' => 'The quick brown fox jumps over the lazy dog.',
                'always_display' => true,
            ),
            'output' => array( wp_strip_all_tags($xe_opt->selectors['widgets-title-font']) )
        ),

        array(
            'id'       => 'h1_size',
            'type'     => 'text',
            'title'    => esc_html__('H1 Heading Size', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Enter height value in pixels. Do not add "px".', '_xe'),
            'placeholder' => '36',
            'validate' => 'numeric',
            'default'  => ''
        ),

        array(
            'id'       => 'h2_size',
            'type'     => 'text',
            'title'    => esc_html__('H2 Heading Size', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Enter height value in pixels. Do not add "px".', '_xe'),
            'placeholder' => '30',
            'validate' => 'numeric',
            'default'  => ''
        ),

        array(
            'id'       => 'h3_size',
            'type'     => 'text',
            'title'    => esc_html__('H3 Heading Size', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Enter height value in pixels. Do not add "px".', '_xe'),
            'placeholder' => '24',
            'validate' => 'numeric',
            'default'  => ''
        ),

        array(
            'id'       => 'h4_size',
            'type'     => 'text',
            'title'    => esc_html__('H4 Heading Size', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Enter height value in pixels. Do not add "px".', '_xe'),
            'placeholder' => '18',
            'validate' => 'numeric',
            'default'  => ''
        ),

        array(
            'id'       => 'h5_size',
            'type'     => 'text',
            'title'    => esc_html__('H5 Heading Size', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Enter height value in pixels. Do not add "px".', '_xe'),
            'placeholder' => '14',
            'validate' => 'numeric',
            'default'  => ''
        ),

        array(
            'id'       => 'h6_size',
            'type'     => 'text',
            'title'    => esc_html__('H6 Heading Size', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Enter height value in pixels. Do not add "px".', '_xe'),
            'placeholder' => '12',
            'validate' => 'numeric',
            'default'  => ''
        ),

    )
    
) );
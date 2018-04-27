<?php 
/**
 * Footer Theme Options.
 *
 * @package _xe
 */

Redux::setSection( 'xe_options', array(

    'id'         => 'opt_footer',
    'title'      => esc_html__( 'Footer', '_xe' ),
    'desc'       => esc_html__( '', '_xe' ),
    'icon'       => 'el el-photo',
    'fields'     => array(

        array(
            'id'       => 'footer_section',
            'type'     => 'switch',
            'title'    => esc_html__('Footer Section', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc' => esc_html__('This does not effect the main footer, its just added right before it.', '_xe'), 
            'on' => 'Enable',
            'off' => 'Disable',
            'default'  => false
        ),

        array(
            'id'       => 'footer_selector',
            'type'     => 'select',
            'required' => array('footer_section','equals','1'),
            'title'    => esc_html__('Select Section', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'data'  => 'pages',
            'args'  => array(
                'posts_per_page' => -1,
            ),
            'default'  => '',
        ),

        array(
            'id'       => 'footer_style',
            'type'     => 'image_select',
            'title'    => esc_html__('Footer Style', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'options'  => array(
                '' => array(
                    'alt'   => 'Primary Footer Style', 
                    'img'   => get_template_directory_uri() . '/img/footer/primary_footer.png',
                ),
                'second' => array(
                    'alt'   => 'Second Footer Style', 
                    'img'   => get_template_directory_uri() . '/img/footer/primary_footer.png',
                ),
                'third' => array(
                    'alt'   => 'Third Footer Style', 
                    'img'   => get_template_directory_uri() . '/img/footer/primary_footer.png',
                )
            ),
            'default' => ''
        ),

        array( 
            'id'       => 'footer_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => array(
                'color' => '', 
                'alpha' => '1.0'
            ),
            'output'   => array( wp_kses_data($xe_opt->selectors['footer-bg-color']) ),
            'mode'     => 'background',
        ),

        array( 
            'id'       => 'footer_border_top_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Border Top Color', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => array(
                'color' => '', 
                'alpha' => '1.0'
            ),
            'output'   => array( wp_kses_data($xe_opt->selectors['footer-border-top-color']) ),
            'mode'     => 'border-top-color',
        ),

        array( 
            'id'       => 'footer_text_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Text Color', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => array(
                'color' => '', 
                'alpha' => '1.0'
            ),
            'output'   => array( wp_kses_data($xe_opt->selectors['footer-text-color']) ),
            'mode'     => 'color',
        ),

        array(
            'id'       => 'footer_logo',
            'type'     => 'media', 
            'url'      => true,
            'title'    => esc_html__('Upload Logo', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'subtitle' => esc_html__('Size Must be: ', '_xe'),
            'default'  => array(
                'url' => get_template_directory_uri() . '/img/footer-logo.png'
            ),
        ),

        array(
            'id'       => 'footer_retina_logo',
            'type'     => 'media', 
            'url'      => true,
            'title'    => esc_html__('Upload Retina Logo', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Size should be exactly 2x of the logo you have uploaded in above option.', '_xe'),
            'default'  => array(
                'url' => get_template_directory_uri() . '/img/footer-logo-2x.png'
            ),
        ),

        array(
            'id'        =>'footer_copyright',
            'type'      => 'editor',
            'title'     => esc_html__('Copyright Info', '_xe'), 
            'subtitle'  => esc_html__('', '_xe'),
            'desc'      => esc_html__('Enter your site copyright information. Type ', '_xe') . '<b>|Y|</b> ' . esc_html__('for 4 digit and ', '_xe') . '<b>|y|</b> ' . esc_html__('for 2 digit year.', '_xe'),
        ),

        array(
            'id'       => 'footer_social_icons',
            'type'     => 'switch',
            'title'    => esc_html__('Social Icons', '_xe'),
            'subtitle' => esc_html__('', '_xe'), 
            'desc'     => esc_html__('Enable to display social icons in site footer.', '_xe'),
            'on' => 'Enable',
            'off' => 'Disable',
            'default'  => true
        ),
    
    )
    
) );
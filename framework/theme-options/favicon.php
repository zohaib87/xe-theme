<?php 
/**
 * Favicon Theme Options.
 *
 * @package _xe
 */

Redux::setSection( 'xe_options', array(

    'id'         => 'opt_favicon',
    'title'      => esc_html__( 'Favicon', '_xe' ),
    'desc'       => esc_html__( '', '_xe' ),
    'icon'       => 'el el-redux',
    'fields'     => array(

        array(
            'id'       => 'favicon',
            'type'     => 'media', 
            'url'      => true,
            'title'    => esc_html__('Upload Favicon', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'subtitle' => esc_html__('Size Must be: 32x32px', '_xe'),
            'default'  => array(
                'url' => get_template_directory_uri() . '/img/favicon/favicon.png'
            ),
        ),

        array(
            'id'       => 'iphone_favicon',
            'type'     => 'media', 
            'url'      => true,
            'title'    => esc_html__('Upload iPhone Favicon', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'subtitle' => esc_html__('Size Must be: 57x57px', '_xe'),
            'default'  => array(
                'url' => get_template_directory_uri() . '/img/favicon/apple-touch-icon.png'
            ),
        ),

        array(
            'id'       => 'iphone_retina_favicon',
            'type'     => 'media', 
            'url'      => true,
            'title'    => esc_html__('Upload iPhone Retina Favicon', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'subtitle' => esc_html__('Size Must be: 114x114px', '_xe'),
            'default'  => array(
                'url' => get_template_directory_uri() . '/img/favicon/apple-touch-icon-114x114.png'
            ),
        ),

        array(
            'id'       => 'ipad_favicon',
            'type'     => 'media', 
            'url'      => true,
            'title'    => esc_html__('Upload iPad Favicon', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'subtitle' => esc_html__('Size Must be: 72x72px', '_xe'),
            'default'  => array(
                'url' => get_template_directory_uri() . '/img/favicon/apple-touch-icon-72x72.png'
            ),
        ),

        array(
            'id'       => 'ipad_retina_favicon',
            'type'     => 'media', 
            'url'      => true,
            'title'    => esc_html__('Upload iPad Retina Favicon', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'subtitle' => esc_html__('Size Must be: 144x144px', '_xe'),
            'default'  => array(
                'url' => get_template_directory_uri() . '/img/favicon/apple-touch-icon-144x144.png'
            ),
        ),

    )
    
) );
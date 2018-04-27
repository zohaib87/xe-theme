<?php
/**
 * Social Profiles Theme Options.
 *
 * @package _xe
 */

Redux::setSection( 'xe_options', array(

    'id'         => 'opt_social_profiles',
    'title'      => esc_html__( 'Social Profiles', '_xe' ),
    'desc'       => esc_html__( '', '_xe' ),
    'icon'       => 'el el-torso',
    'fields'     => array(
        
        array(
            'id'       => 'social_facebook',
            'type'     => 'text',
            'title'    => esc_html__('Facebook', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => '#'
        ),

        array(
            'id'       => 'social_twitter',
            'type'     => 'text',
            'title'    => esc_html__('Twitter', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => '#'
        ),

        array(
            'id'       => 'social_google',
            'type'     => 'text',
            'title'    => esc_html__('Google+', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => '#'
        ),

        array(
            'id'       => 'social_github',
            'type'     => 'text',
            'title'    => esc_html__('Github', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => '#'
        ),

        array(
            'id'       => 'social_behance',
            'type'     => 'text',
            'title'    => esc_html__('Behance', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => ''
        ),

        array(
            'id'       => 'social_dribbble',
            'type'     => 'text',
            'title'    => esc_html__('Dribbble', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => ''
        ),

        array(
            'id'       => 'social_pinterest',
            'type'     => 'text',
            'title'    => esc_html__('Pinterest', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => ''
        ),

        array(
            'id'       => 'social_instagram',
            'type'     => 'text',
            'title'    => esc_html__('Instagram', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => ''
        ),

        array(
            'id'       => 'social_linkedin',
            'type'     => 'text',
            'title'    => esc_html__('Linkedin', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => ''
        ),

        array(
            'id'       => 'social_tumblr',
            'type'     => 'text',
            'title'    => esc_html__('Tumblr', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => ''
        ),

        array(
            'id'       => 'social_youtube',
            'type'     => 'text',
            'title'    => esc_html__('Youtube', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => ''
        ),

        array(
            'id'       => 'social_vimeo',
            'type'     => 'text',
            'title'    => esc_html__('Vimeo', '_xe'),
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'default'  => ''
        ),

    )
    
) );

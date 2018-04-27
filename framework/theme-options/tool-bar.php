<?php 
/**
 * Tool-Bar Theme Options.
 *
 * @package _xe
 */

Redux::setSection( 'xe_options', array(

    'id'         => 'opt_tool_bar',
    'title'      => esc_html__( 'Tool-Bar', '_xe' ),
    'desc'       => esc_html__( '', '_xe' ),
    'icon'       => 'el el-view-mode',
    'fields'     => array(

        array(
            'id'       => 'tool_bar_switch',
            'type'     => 'switch',
            'title'    => esc_html__('Tool-Bar', '_xe'),
            'subtitle' => esc_html__('', '_xe'), 
            'desc'     => esc_html__('Enable to display the top bar on site.', '_xe'),
            'on' => 'Enable',
            'off' => 'Disable',
            'default'  => false
        ),

        array(
            'id'       => 'tool_bar_bg_color',
            'type'     => 'color',
            'title'    => esc_html__('Background Color', '_xe'), 
            'transparent' => false,
            'default'  => '',
            'validate' => 'color',
            'output'   => array(
                'background' => wp_kses_data($xe_opt->selectors['tool-bar-bg-color']),
            )
        ),

        array(
            'id'       => 'tool_bar_menu',
            'type'     => 'select',
            'title'    => esc_html__('Menu Location', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('Set location for tool bar menu.', '_xe'),
            'data'	   => 'menu_locations',
            'default'  => 'second-menu',
        ),

        array(
            'id'       => 'tool_bar_social_icons',
            'type'     => 'switch',
            'title'    => esc_html__('Social Icons', '_xe'),
            'subtitle' => esc_html__('', '_xe'), 
            'desc'     => esc_html__('Enable to display social icons in tool-bar.', '_xe'),
            'on' => 'Enable',
            'off' => 'Disable',
            'default'  => true
        ),

        array(
            'id'       => 'tool_bar_font_icons',
            'type'     => 'select',
            'title'    => esc_html__('Icon Library', '_xe'), 
            'subtitle' => esc_html__('', '_xe'),
            'desc'     => esc_html__('', '_xe'),
            'options'  => array(
                'fontawesome' => 'Fontawesome',
                'ionicons' => 'Ionicons',
            ),
            'default'  => 'fontawesome',
        ),

        array(
           'id'       => 'tool_bar_phone_fontawesome',
           'type'     => 'text',
               'required' => array('tool_bar_font_icons','equals','fontawesome'),
           'title'    => esc_html__('Phone Number Icon', '_xe'),
           'subtitle' => esc_html__('', '_xe'),
           'desc'     => '<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">'.esc_html__('Click Here', '_xe').'</a>'.esc_html__(' to choose icon and get its class name.', '_xe'),
           'default'  => 'fa-phone'
        ),
        array(
           'id'       => 'tool_bar_phone_ionicons',
           'type'     => 'text',
           'required' => array('tool_bar_font_icons','equals','ionicons'),
           'title'    => esc_html__('Phone Number Icon', '_xe'),
           'subtitle' => esc_html__('', '_xe'),
           'desc'     => '<a href="'.esc_url('http://ionicons.com/').'" target="_blank">'.esc_html__('Click Here', '_xe').'</a>'.esc_html__(' to choose icon and get its class name.', '_xe'),
           'default'  => 'ion-android-call'
        ),

        array(
           'id'       => 'tool_bar_phone',
           'type'     => 'text',
           'title'    => esc_html__('Phone Number', '_xe'),
           'subtitle' => esc_html__('', '_xe'),
           'desc'     => esc_html__('Enter your company phone number.', '_xe'),
           'default'  => '+1 123 456 7890'
        ),

        array(
           'id'       => 'tool_bar_email_fontawesome',
           'type'     => 'text',
               'required' => array('tool_bar_font_icons','equals','fontawesome'),
           'title'    => esc_html__('Email Icon', '_xe'),
           'subtitle' => esc_html__('', '_xe'),
           'desc'     => '<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">'.esc_html__('Click Here', '_xe').'</a>'.esc_html__(' to choose icon and get its class name.', '_xe'),
           'default'  => 'fa-envelope-o'
        ),
        array(
           'id'       => 'tool_bar_email_ionicons',
           'type'     => 'text',
           'required' => array('tool_bar_font_icons','equals','ionicons'),
           'title'    => esc_html__('Email Icon', '_xe'),
           'subtitle' => esc_html__('', '_xe'),
           'desc'     => '<a href="'.esc_url('http://ionicons.com').'" target="_blank">'.esc_html__('Click Here', '_xe').'</a>'.esc_html__(' to choose icon and get its class name.', '_xe'),
           'default'  => 'ion-android-mail'
        ),

        array(
           'id'       => 'tool_bar_email',
           'type'     => 'text',
           'title'    => esc_html__('Email', '_xe'),
           'subtitle' => esc_html__('', '_xe'),
           'desc'     => esc_html__('Enter your company email.', '_xe'),
           'default'  => 'info@domain.com'
        ),
    
    )
    
) );
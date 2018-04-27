<?php
/**
 * Custom Code Theme Options.
 *
 * @package _xe
 */

Redux::setSection( 'xe_options', array(

    'id'         => 'opt_custom_code',
    'title'      => esc_html__( 'Custom Code', '_xe' ),
    'desc'       => esc_html__( '', '_xe' ),
    'icon'       => 'el el-edit',
    'fields'     => array(

        array(
            'id'       => 'custom_js_head',
            'type'     => 'ace_editor',
            'title'    => esc_html__('JavaScript / jQuery (Head)', '_xe'),
            'subtitle' => esc_html__('It will be placed in <script> tag right before </head> tag.', '_xe'),
            'mode'     => 'javascript',
            'theme'    => 'chrome',
            'desc'     => esc_html__('', '_xe'),
            'options'  => array('minLines' => 20, 'maxLines' => 30),
            'default'  => ""
        ),

        array(
            'id'       => 'custom_js_footer',
            'type'     => 'ace_editor',
            'title'    => esc_html__('JavaScript / jQuery (Footer)', '_xe'),
            'subtitle' => esc_html__('It will be placed in <script> tag in document footer before </body> tag.', '_xe'),
            'mode'     => 'javascript',
            'theme'    => 'chrome',
            'desc'     => esc_html__('For larger modifications use custom.js file in theme\'s js folder or consider using a child theme.', '_xe'),
            'options'  => array('minLines' => 20, 'maxLines' => 30),
            'default'  => "(function($) {\n\n})( jQuery );"
        ),

    )

) );

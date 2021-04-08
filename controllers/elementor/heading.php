<?php
/**
 * Heading elementor widget.
 *
 * @package _xe
 */

if (!class_exists('Xe_Heading')) :

class Xe_Heading extends \Elementor\Widget_Base {

  public function get_name() {
    return 'heading';
  }

  public function get_title() {
    return esc_html__( 'Heading', '_xe' );
  }

  public function get_icon() {
    return 'fas fa-heading';
  }

  public function get_categories() {
    return ['custom'];
  }

  protected function register_controls() {

    $this->start_controls_section(
      'content_section', [
        'label' => esc_html__( 'Content', '_xe' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    // Controls
    $this->add_control(
      'heading', [
        'label' => esc_html__('Heading', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => esc_html__('Our Services', '_xe'),
      ]
    );
    $this->add_control(
      'sub_heading', [
        'label' => esc_html__('Sub Heading', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => esc_html__('Providing our clients with high-quality website hosting for the lowest price is our top priority.', '_xe'),
      ]
    );

    $this->end_controls_section();

    /**
     * Style Section
     */
    $this->start_controls_section(
      'style_section', [
        'label' => esc_html__( 'Style', '_xe' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    // Controls
    $this->add_control(
      'heading_color', [
        'label' => esc_html__( 'Heading Color', '_xe' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'scheme' => [
          'type' => \Elementor\Scheme_Color::get_type(),
          'value' => \Elementor\Scheme_Color::COLOR_1,
        ],
        'default' => '#000',
      ]
    );
    $this->add_control(
      'sub_heading_color', [
        'label' => esc_html__( 'Sub Heading Color', '_xe' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'scheme' => [
          'type' => \Elementor\Scheme_Color::get_type(),
          'value' => \Elementor\Scheme_Color::COLOR_1,
        ],
        'default' => '#000',
      ]
    );

    $this->end_controls_section();

  }

  protected function render() {

    $settings = $this->get_settings_for_display();

    $heading = $settings['heading'];
    $sub_heading = $settings['sub_heading'];
    $heading_color = $settings['heading_color'];
    $sub_heading_color = $settings['sub_heading_color'];

    $args = [
      'br' => array()
    ];

    ?>
    <div class="sec-title centered">
      <h2 style="color: <?php echo esc_attr($heading_color); ?>;">
        <?php echo wp_kses($heading, $args); ?>
      </h2>
      <div class="text" style="color: <?php echo esc_attr($sub_heading_color); ?>;"><?php echo esc_html($sub_heading); ?></div>
    </div>
    <?php

  }

  protected function _content_template() {}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Xe_Heading() );

endif;
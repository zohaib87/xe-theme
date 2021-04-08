<?php
/**
 * Button elementor widget.
 *
 * @package _xe
 */

if (!class_exists('Xe_Button')) :

class Xe_Button extends \Elementor\Widget_Base {

  public function get_name() {
    return 'button';
  }

  public function get_title() {
    return esc_html__( 'Button', '_xe' );
  }

  public function get_icon() {
    return 'fas fa-mouse-pointer';
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
      'btn_text', [
        'label' => esc_html__('Text', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => esc_html__('View Plans', '_xe'),
      ]
    );
    $this->add_control(
      'btn_link', [
        'label' => esc_html__('Link', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => '#.',
      ]
    );

    $this->end_controls_section();

  }

  protected function render() {

    $settings = $this->get_settings_for_display();

    $btn_text = $settings['btn_text'];
    $btn_link = $settings['btn_link'];

    ?>
    <a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-style-three"><?php echo esc_html($btn_text); ?> <i class="fas fa-chevron-right"></i></a>
    <?php

  }

  protected function _content_template() {}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Xe_Button() );

endif;
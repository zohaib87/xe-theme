<?php
/**
 * Counter elementor widget.
 *
 * @package _xe
 */

namespace Xe_Theme\Includes\Elementor;

class Counter extends \Elementor\Widget_Base {

  public function get_name() {
    return 'counter';
  }

  public function get_title() {
    return esc_html__( 'Counter', '_xe' );
  }

  public function get_icon() {
    return 'fas fa-stopwatch-20';
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
      'title', [
        'label' => esc_html__('Title', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => esc_html__('Domains', '_xe'),
      ]
    );
    $this->add_control(
      'count', [
        'label' => esc_html__('Count', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => '52',
      ]
    );
    $this->add_control(
      'suffix', [
        'label' => esc_html__('Suffix', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => 'K',
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
      'color', [
        'label' => esc_html__( 'Color', '_xe' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'scheme' => [
          'type' => \Elementor\Core\Schemes\Color::get_type(),
          'value' => \Elementor\Core\Schemes\Color::COLOR_1,
        ],
        'default' => '#000',
      ]
    );

    $this->end_controls_section();

  }

  protected function render() {

    $settings = $this->get_settings_for_display();

    $title = $settings['title'];
    $count = $settings['count'];
    $suffix = $settings['suffix'];
    $color = $settings['color'];

    $args = [
      'br' => array()
    ];

    ?>
    <div class="fact-counter">
      <div class="column counter-column">
        <div class="column-outer">
          <div class="inner">
            <div class="count-outer count-box counted" style="color: <?php echo esc_attr($color); ?>;">
              <span class="count-text" data-speed="2000" data-stop="<?php echo esc_attr($count); ?>" style="color: <?php echo esc_attr($color); ?>;"><?php echo esc_html($count); ?></span><?php echo esc_html($suffix); ?>
            </div>
            <h4 class="counter-title" style="color: <?php echo esc_attr($color); ?>;"><?php echo esc_html($title); ?></h4>
          </div>
        </div>
      </div>
    </div>
    <?php

  }

  protected function _content_template() {}

}
\Elementor\Plugin::instance()->widgets_manager->register( new Counter() );

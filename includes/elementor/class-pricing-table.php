<?php
/**
 * Pricing Table elementor widget.
 *
 * @package _xe
 */

namespace Xe_Theme\Includes\Elementor;

class Pricing_Table extends \Elementor\Widget_Base {

  public function get_name() {
    return 'pricing_table';
  }

  public function get_title() {
    return esc_html__( 'Pricing Table', '_xe' );
  }

  public function get_icon() {
    return 'fas fa-barcode';
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
        'default' => esc_html__('Web Hosting', '_xe'),
      ]
    );
    $this->add_control(
      'price', [
        'label' => esc_html__('Price', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => esc_html__('$35', '_xe'),
      ]
    );
    $this->add_control(
      'cents', [
        'label' => esc_html__('Cents', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => esc_html__('00', '_xe'),
      ]
    );
    $this->add_control(
      'suffix', [
        'label' => esc_html__('Suffix', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => esc_html__('Per Month', '_xe'),
      ]
    );
    $this->add_control(
      'btn_text', [
        'label' => esc_html__('Button Text', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => esc_html__('Order Now', '_xe'),
      ]
    );
    $this->add_control(
      'btn_link', [
        'label' => esc_html__('Button Link', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => '#.',
      ]
    );

    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
      'feature', [
        'label' => esc_html__('Feature', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => esc_html__('1 Website', '_xe'),
      ]
    );
    $this->add_control(
      'list', [
        'label' => esc_html__( 'Repeater List', '_xe' ),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'feature' => esc_html__( '1 Website', '_xe' ),
          ]
        ],
        'title_field' => '{{{ feature }}}',
      ]
    );

    $this->end_controls_section();

  }

  protected function render() {

    $settings = $this->get_settings_for_display();

    $title = $settings['title'];
    $price = $settings['price'];
    $cents = !empty($settings['cents']) ? '<sub>.'.$settings['cents'].'</sub>' : '';
    $suffix = $settings['suffix'];
    $btn_text = $settings['btn_text'];
    $btn_link = $settings['btn_link'];
    $list = $settings['list'];

    $args = [
      'sub' => array()
    ];

    ?>
    <div class="price-block">
      <div class="inner-box">
        <div class="title"><?php echo esc_html($title); ?></div>
        <div class="upper-box">
          <div class="price">
            <?php echo wp_kses($price . $cents, $args); ?>
            <span><?php echo esc_html($suffix); ?></span>
          </div>
        </div>
        <div class="lower-box">
          <ul>
            <?php foreach ($list as $item) { ?>
              <li><?php echo esc_html($item['feature']); ?></li>
            <?php } ?>
          </ul>
          <a href="<?php echo esc_url($btn_link); ?>" class="theme-btn subscribe-btn"><?php echo esc_html($btn_text); ?> <i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </div>
    <?php

  }

  protected function _content_template() {}

}
\Elementor\Plugin::instance()->widgets_manager->register( new Pricing_Table() );

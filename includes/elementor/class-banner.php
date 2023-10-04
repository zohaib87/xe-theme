<?php
/**
 * Main slider primary style elementor widget.
 *
 * @package _xe
 */

namespace Xe_Theme\Includes\Elementor;

class Banner extends \Elementor\Widget_Base {

  public function get_name() {
    return 'banner_one';
  }

  public function get_title() {
    return esc_html__( 'Banner A', '_xe' );
  }

  public function get_icon() {
    return 'fas fa-chalkboard';
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
      'image', [
        'label' => esc_html__( 'Choose Image', '_xe' ),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => ['']
      ]
    );
    $this->add_control(
      'heading', [
        'label' => esc_html__('Heading', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => '<strong>'.esc_html('High-quality', '_xe').'</strong>'.esc_html__(' hosting services at low price', '_xe'),
      ]
    );
    $this->add_control(
      'btn_text', [
        'label' => esc_html__('Button Text', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => esc_html__('Contact Us', '_xe'),
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
    $this->add_control(
      'container', [
        'label' => esc_html__( 'Container', '_xe' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'container',
        'options' => [
          'container'  => esc_html__( 'Normal', '_xe' ),
          'container-fluid' => esc_html__( 'Fluid', '_xe' ),
        ],
      ]
    );

    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
      'icon', [
        'label' => esc_html__('Icon', '_xe'),
        'description' => '<a href="'.esc_url( 'https://fontawesome.com/icons?d=gallery&p=2&m=free' ).'" target="_blank">'.esc_html__( 'Click Here', '_xe' ).'</a>'.esc_html__( ' to choose icon and get its HTML.', '_xe' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => '<i class="fas fa-cloud"></i>',
      ]
    );
    $repeater->add_control(
      'text', [
        'label' => esc_html__('Feature', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => esc_html__('Best Cloud Hosting', '_xe'),
      ]
    );
    $this->add_control(
      'list', [
        'label' => esc_html__( 'Repeater List', '_xe' ),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'text' => esc_html__( 'Best Cloud Hosting', '_xe' ),
          ]
        ],
        'title_field' => '{{{ text }}}',
      ]
    );

    $this->end_controls_section();

  }

  protected function render() {

    $settings = $this->get_settings_for_display();

    $image = $settings['image'];
    $image = $image['url'];
    $heading = $settings['heading'];
    $btn_text = $settings['btn_text'];
    $btn_link = $settings['btn_link'];
    $container = $settings['container'];
    $list = $settings['list'];

    $style_attr = !empty($image) ? 'style="background:url('.$image.') right top no-repeat;"' : '';

    $args = [
      'br' => array(),
      'strong' => array(),
      'i' => [
        'class' => array()
      ]
    ];

    ?>
    <section class="main-banner">
      <div class="outer-container clearfix">
        <!--Curve Box-->
        <div class="curve-box" <?php echo wp_kses_post($style_attr); ?>></div>

        <div class="<?php echo esc_attr($container); ?> clearfix">
          <!--Content Column-->
          <div class="content-box">
            <div class="inner">
              <h2 class="wow fadeInLeft"><?php echo wp_kses($heading, $args); ?></h2>
              <ul class="features-list">
                <?php foreach ($list as $item) : ?>
                  <li class="wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="500ms">
                    <?php echo wp_kses($item['icon'] . ' ' . $item['text'], $args); ?>
                  </li>
                <?php endforeach; ?>
              </ul>
              <div class="btns-box wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="500ms">
                <a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-style-two"><?php echo esc_html($btn_text); ?> <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php

  }

  protected function _content_template() {}

}
\Elementor\Plugin::instance()->widgets_manager->register( new Banner() );

<?php
/**
 * Call to action elementor widget.
 *
 * @package _xe
 */

if (!class_exists('Xe_CallToAction')) :

class Xe_CallToAction extends \Elementor\Widget_Base {

  public function get_name() {
    return 'call_to_action';
  }

  public function get_title() {
    return esc_html__( 'Call To Action', '_xe' );
  }

  public function get_icon() {
    return 'fas fa-location-arrow';
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
      'primary_text', [
        'label' => esc_html__('Primary Text', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => esc_html__('Start your Hosting Today!', '_xe')
      ]
    );
    $this->add_control(
      'second_text', [
        'label' => esc_html__('Secondary Text', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => esc_html__('Starting at only ', '_xe') . '<span>' . esc_html__('$50', '_xe') . '</span>' . esc_html__(' per month', '_xe')
      ]
    );
    $this->add_control(
      'btn_text', [
        'label' => esc_html__('Button Text', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => esc_html__('GET STARTED', '_xe')
      ]
    );
    $this->add_control(
      'btn_url', [
        'label' => esc_html__('Button URL', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'url',
        'default' => '#.',
      ]
    );
    $this->add_control(
      'style', [
        'label' => esc_html__( 'Style', '_xe' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'primary',
        'options' => [
          'primary'  => esc_html__( 'Primary Style', '_xe' ),
          'second' => esc_html__( 'Second Style', '_xe' ),
        ],
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
      'text_color', [
        'label' => esc_html__( 'Text Color', '_xe' ),
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

    $primary_text = $settings['primary_text'];
    $second_text = $settings['second_text'];
    $btn_text = $settings['btn_text'];
    $btn_url = $settings['btn_url'];
    $style = $settings['style'];
    $text_color = $settings['text_color'];

    $args = array(
      'strong' => array(),
      'em' => array(),
      'b' => array(),
      'span' => array(),
    );

    if ($style == 'primary') : ?>
      <section class="call-to-action-section">
        <div class="row clearfix">
          <div class="column col-md-5 col-sm-12">
            <h2 style="color: <?php echo esc_attr($text_color); ?>;"><?php echo esc_html($primary_text); ?></h2>
          </div>
          <div class="price-column col-md-7 col-sm-12">
            <h3 style="color: <?php echo esc_attr($text_color); ?>;"><?php echo wp_kses($second_text, $args); ?></h3>
            <a href="<?php echo esc_url($btn_url); ?>" class="theme-btn btn-style-one"><?php echo esc_html($btn_text); ?> <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </section>
    <?php else : ?>
      <section class="call-to-action-section-two">
        <div class="row clearfix">
          <div class="content-column col-md-9 col-sm-12">
            <div class="inner-column">
              <h2 style="color: <?php echo esc_attr($text_color); ?>;"><?php echo esc_html($primary_text); ?></h2>
              <div class="text" style="color: <?php echo esc_attr($text_color); ?>;"><?php echo wp_kses($second_text, $args); ?> </div>
            </div>
          </div>
          <div class="button-column col-md-3 col-sm-12">
            <div class="inner-column">
              <a href="<?php echo esc_url($btn_url); ?>" class="theme-btn btn-style-three"><?php echo esc_html($btn_text); ?> <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
      </section>
    <?php endif;

  }

  protected function _content_template() {}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Xe_CallToAction() );

endif;
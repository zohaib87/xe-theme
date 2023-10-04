<?php
/**
 * Icon Box elementor widget.
 *
 * @package _xe
 */

if (!class_exists('Xe_IconBox')) :

class Xe_IconBox extends \Elementor\Widget_Base {

  public function get_name() {
    return 'icon_box';
  }

  public function get_title() {
    return esc_html__( 'Icon Box', '_xe' );
  }

  public function get_icon() {
    return 'fas fa-info';
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
      'icon', [
        'label' => esc_html__('Icon', '_xe'),
        'description' => '<a href="'.esc_url( 'https://fontawesome.com/icons?d=gallery&p=2&m=free' ).'" target="_blank">'.esc_html__( 'Click Here', '_xe' ).'</a>'.esc_html__( ' to choose icon and get its HTML.', '_xe' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => '<i class="fas fa-server"></i>',
        'placeholder' => '<i class="fas fa-server"></i>',
      ]
    );
    $this->add_control(
      'heading', [
        'label' => esc_html__('Heading', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => esc_html__('Shared Hosting', '_xe'),
      ]
    );
    $this->add_control(
      'sub_heading', [
        'label' => esc_html__('Sub Heading', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => esc_html__('Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '_xe'),
      ]
    );
    $this->add_control(
      'btn_text', [
        'label' => esc_html__('Button Text', '_xe'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => esc_html__('Read Me', '_xe'),
      ]
    );
    $this->add_control(
      'link', [
        'label' => esc_html__('Link', '_xe'),
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
          'third' => esc_html__( 'Third Style', '_xe' ),
        ],
      ]
    );

    $this->end_controls_section();

  }

  protected function render() {

    $settings = $this->get_settings_for_display();

    $icon = $settings['icon'];
    $heading = $settings['heading'];
    $sub_heading = $settings['sub_heading'];
    $btn_text = $settings['btn_text'];
    $link = $settings['link'];
    $style = $settings['style'];

    $args = [
      'i' => [
        'class' => array()
      ]
    ];

    if ($style == 'third') : ?>
      <div class="services-section-two">
        <div class="service-block">
          <div class="inner-box">
            <div class="icon-box">
              <?php echo wp_kses($icon, $args); ?>
            </div>
            <div class="lower-content">
              <h3><a href="#."><?php echo esc_html($heading); ?></a></h3>
              <div class="text"><?php echo esc_html($sub_heading); ?></div>
            </div>
          </div>
        </div>
      </div>
    <?php else : ?>
      <div class="service-block">
        <div class="inner-box">
          <div class="icon-box">
            <?php echo wp_kses($icon, $args); ?>
          </div>
          <div class="lower-content">
            <h3><a href="#."><?php echo esc_html($heading); ?></a></h3>
            <div class="text"><?php echo esc_html($sub_heading); ?></div>
            <?php if ($style == 'primary') : ?>
              <div class="link-box">
                <a href="<?php echo esc_url($link); ?>" class="theme-btn btn-style-three"><?php echo esc_html($btn_text); ?> <i class="fas fa-long-arrow-alt-right"></i></a>
              </div>
          <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endif;

  }

  protected function _content_template() {}

}
\Elementor\Plugin::instance()->widgets_manager->register( new Xe_IconBox() );

endif;
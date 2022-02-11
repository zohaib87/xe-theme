<?php
/**
 * Testimonials elementor widget.
 *
 * @package _xe
 */

if (!class_exists('Xe_Testimonials')) :

class Xe_Testimonials extends \Elementor\Widget_Base {

  public function get_name() {
    return 'testimonials';
  }

  public function get_title() {
    return esc_html__( 'Testimonials', 'xhost' );
  }

  public function get_icon() {
    return 'far fa-comment-alt';
  }

  public function get_categories() {
    return ['custom'];
  }

  protected function register_controls() {

    $this->start_controls_section(
      'content_section', [
        'label' => esc_html__( 'Content', 'xhost' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $repeater = new \Elementor\Repeater();

    // Repeater Controls
    $repeater->add_control(
      'image', [
        'label' => esc_html__( 'Choose Image', 'xhost' ),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ]
      ]
    );
    $repeater->add_control(
      'name', [
        'label' => esc_html__('Name', 'xhost'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'text',
        'default' => esc_html__('John Doe', 'xhost'),
      ]
    );
    $repeater->add_control(
      'comment', [
        'label' => esc_html__('Testimonial', 'xhost'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'rows' => 10,
        'default' => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'xhost'),
      ]
    );

    $this->add_control(
      'list', [
        'label' => esc_html__( 'Repeater List', 'xhost' ),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'name' => esc_html__( 'John Doe', 'xhost' ),
          ]
        ],
        'title_field' => '{{{ name }}}',
      ]
    );

    $this->end_controls_section();

  }

  protected function render() {

    $settings = $this->get_settings_for_display();

    $list = $settings['list'];

    ?>
    <div class="testimonial-carousel owl-carousel owl-theme">
      <?php foreach ($list as $item) { ?>
        <div class="testimonial-block">
          <div class="inner-box">
            <div class="image-box">
              <div class="thumb">
                <img src="<?php echo esc_url($item['image']['url']); ?>" alt="">
              </div>
            </div>
            <div class="info-box">
              <h5 class="name"><?php echo esc_html($item['name']); ?></h5>
              <i class="fas fa-quote-left"></i>
              <div class="text"><?php echo esc_html($item['comment']); ?> </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div><!-- .testimonial-carousel -->
    
    <?php if (is_admin()) { ?>
      <script type='text/javascript'>
        if (jQuery('.testimonial-carousel').length) {
          jQuery('.testimonial-carousel').owlCarousel({
            loop:false,
            margin:40,
            dots:true,
            nav:false,
            smartSpeed: 700,
            autoplay: true,
            navText: [ '<span class=\"fa fa-long-arrow-left\"></span> prev', 'next<span class=\"fa fa-long-arrow-right\"></span>' ],
            responsive:{
              0:{
                items:1
              },
              600:{
                items:1
              },
              768:{
                items:1
              },
              1024:{
                items:2
              },
              1200:{
                items:2
              }
            }
          });       
        }
      </script>
    <?php }

  }

  protected function _content_template() {}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Xe_Testimonials() );

endif;
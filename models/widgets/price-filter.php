<?php 
/**
 * Price filter widget.
 *
 * @package _xe
 */

class Xe_PriceFilterWidget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {

      parent::__construct(
        'xe-price-filter', // Base ID
        esc_html__( 'Price Filter (Custom)', '_xe' ), // Name
        array( 'description' => esc_html__( 'Ajax Price Filter.', '_xe' ), ) // Args
      );

    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {

        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        ?>
        <p>
          <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
        </p>
        <div id="slider-range"></div>
        <?php

        echo $args['after_widget'];

    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {

        $title = !empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Filter By Price', '_xe' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_attr_e( 'Title:', '_xe' ); ?></label> 
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php 

    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {

        $instance = array();
        $instance['title'] = ( !empty($new_instance['title']) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;

    }

}
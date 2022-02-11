<?php 
/**
 * Archives widget.
 *
 * @package _xe
 */

class Xe_ArchivesWidget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		parent::__construct(
			'xe-archives', // Base ID
			esc_html__( 'Archives (Custom)', '_xe' ), // Name
			array( 'description' => esc_html__( 'A monthly archive of your site\'s Posts.', '_xe' ), ) // Args
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

		if ( !empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		$arc_args = array(
			'post_type'=>'post',
			'limit'    => $instance['number'],
			'format'  => 'html', 
		    'orderby' => 'name',
		    'order'   => 'ASC'
		);

		?><ul class="xe-archives"><?php

		wp_get_archives($arc_args);

		?></ul><?php

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

		$title = !empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Archives', '_xe' );
		$number = !empty( $instance['number'] ) ? $instance['number'] : esc_html__( '5', '_xe' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', '_xe' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_attr_e( 'Number of Categories:', '_xe' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>">
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
		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['number'] = ( !empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';

		return $instance;

	}

}
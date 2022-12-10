<?php 
/**
 * Recent Posts widget.
 *
 * @package _xe
 */

class Xe_RecentPostsWidget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		parent::__construct(
			'xe-recent-posts', // Base ID
			esc_html__( 'Recent Posts (Custom)', '_xe' ), // Name
			array( 'description' => esc_html__( 'Your site\'s most recent Posts.', '_xe' ), ) // Args
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

		$query_args = array(
			'post_type'	=> 'post',
			'posts_per_page' => $instance['number'],
			'orderby' 	=> 'date',
			'order' 	=> 'DESC',
		);
		$query = new WP_Query($query_args);

		if ( $query->have_posts() ) :

			?><ul class="xe-recent-posts"><?php

			while ( $query->have_posts() ) :
				$query->the_post();

				?><li class="media">
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="media-left"> 
							<a href="<?php the_permalink(); ?>"> 
								<?php the_post_thumbnail( '_xe-recent-posts', array('class' => 'media-object') ); ?>
							</a> 
						</div>
					<?php } ?>
					<div class="media-body"> 
						<a class="media-heading" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
						<span><?php echo get_the_date(); ?></span> 
					</div>
				</li><?php

			endwhile;

			?></ul><?php

		endif;

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

		$title = !empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Recent Posts', '_xe' );
		$number = !empty( $instance['number'] ) ? $instance['number'] : esc_html__( '5', '_xe' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', '_xe' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_attr_e( 'Number of Posts:', '_xe' ); ?></label> 
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
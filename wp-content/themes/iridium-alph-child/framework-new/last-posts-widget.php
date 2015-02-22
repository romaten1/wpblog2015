<?php
/*Plugin Name: Last Posts Widget
Description:
Version: 0.1
Author: VRV
Author URI:
License: GPLv2
*/
add_action( 'widgets_init', create_function( '', 'register_widget( "vrv_last_posts_widget" );' ) );


class vrv_last_posts_widget extends WP_Widget {

	function __construct() {
		$args = [
			'description' => __( 'vrv_last_posts_widget', 'alpha' ),
		];
		parent::__construct(
			'vrv_last_posts_widget', // Base ID
			__( 'vrv_last_posts_widget', 'alpha' ), // Name
			$args // Args
		);

	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget
		extract( $args );
		extract( $instance );

		$posts = new WP_Query(array ( 'posts_per_page' => 5,'orderby' => 'title', 'order' => 'DESC' ));
		echo $before_widget . $before_title;
		echo $title;
		echo $after_title;
		while($posts->have_posts()) {
			$posts->the_post();

			the_excerpt();

		}
		echo $after_widget;
	}

	public function form( $instance ) {
		// outputs the options form on admin
		$title = $instance['title'];
		$count  = $instance['count'];
		// markup for form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>">count</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'counte' ); ?>"
			       name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo esc_attr( $count ); ?>">
		</p>

	<?php

	}
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$new_instance['title'] = !empty($new_instance['title']) ?  strip_tags( $new_instance['title'] ) : '';
		$new_instance['count'] = !empty($new_instance['count']) ?  strip_tags( $new_instance['count'] ) : '';
		return $new_instance;
	}

}
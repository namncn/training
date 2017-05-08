<?php
/**
 * Widget API: Training_Text_Widget class
 *
 * @package Training
 * @subpackage Widgets
 * @since 1.0.0
 */

/**
 * Core class used to implement a text widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Training_Text_Widget extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname' => 'training_text_widget',
			'description' => esc_html__( 'Create text widget.', 'training' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'training-text-widget', esc_html__( 'TN: Text Widget', 'training' ), $widget_ops );
		// $this->alt_option_name = 'widget_recent_entries';
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$text = ! empty( $instance['text'] ) ? esc_html( $instance['text'] ) : '';
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Content:' ); ?></label>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea( $instance['text'] ); ?></textarea></p>

	<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['text'] = wp_kses_post( $new_instance['text'] );

		return $instance;
	}

	public function widget( $args, $instance ) {
		$defaults = array(
			'title' => esc_html__( 'Text Widget', 'training' ),
			'text' => 'asdasds',
		);

		$instance = wp_parse_args( $instance, $defaults );

		var_dump( $instance );

		$title = ( ! empty ( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Text Widget', 'traning' );

		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$text = isset( $instance['text'] ) ? $instance['text'] : '';

		echo $args['before_widget'];

			echo $args['before_title'] . $title . $args['after_title'];

			echo '<div class="text">' . $text . '</div>';

		echo $args['after_widget'];
	}
}

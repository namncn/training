<?php
/**
 * Register widgets class.
 */

require get_theme_file_path( 'inc/widgets/class-training-text-widget.php' );

function training_register_widgets() {
	register_widget( 'Training_Text_Widget' );
}
add_action( 'widgets_init', 'training_register_widgets' );

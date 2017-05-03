<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Training
 * @subpackage Training
 * @since 1.0
 */

/**
 * Flush out the transients used in twentyseventeen_categorized_blog.
 */
function training_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'twentyseventeen_categories' );
}
add_action( 'edit_category', 'training_category_transient_flusher' );
add_action( 'save_post',     'training_category_transient_flusher' );

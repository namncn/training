<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Training
 * @subpackage Training
 * @since 1.0.0
 * @version 1.0.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( is_active_sidebar( 'home-section' ) ) {
			dynamic_sidebar( 'home-section' );
		} ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Training
 * @subpackage Trainging
 * @since  1.0.0
 * @version 1.0.0
 */

get_header();

	if ( have_posts() ) :
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content' );

		endwhile;

		the_posts_pagination( array(
			'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Trang trước', 'training' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Trang sau', 'training' ) . '</span>',
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Trang', 'training' ) . ' </span>',
		) );
	endif;

get_sidebar();
get_footer();

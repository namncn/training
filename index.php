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

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			$args = array(
				'post_type'                 => 'book', // Thể loại bài viết được hiển thị.
				'posts_per_page'        => 10, // Hiển thị bao nhiêu bài viết.
				'ignore_sticky_posts' => true, // Loại bỏ bài viết được dính.
			);

			$training_query = new WP_Query( $args );

			if ( $training_query->have_posts() ) :
				while ( $training_query->have_posts() ) : $training_query->the_post();

					the_title( '<div><a href="' . get_the_permalink() . '">', '</a></div>' );

				endwhile;

				wp_reset_postdata();

			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

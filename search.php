<?php
/**
 * The template for displaying archive pages
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

			<header class="page-header">
				<?php if ( have_posts() ) : ?>
					<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'training' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php else : ?>
					<h1 class="page-title"><?php _e( 'Nothing Found', 'training' ); ?></h1>
				<?php endif; ?>
			</header>

			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content' );

				endwhile;

				the_posts_pagination( array(
					'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Trang trước', 'training' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Trang sau', 'training' ) . '</span>',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Trang', 'training' ) . ' </span>',
				) );

			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

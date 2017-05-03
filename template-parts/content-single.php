<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Training
 * @subpackage Training
 * @since 1.0.0
 * @version 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() || get_the_title() ) : ?>
	<header class="entry-header">

		<?php the_post_thumbnail( 'medium' ); ?>

		<?php the_title( '<h1 class="entry-title"><a href="' . get_the_permalink() . '">', '</a></h1>' ); ?>

	</header>
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<div class="entry-footer">
		<?php the_time( 'm/d/Y' ); ?>
	</div>

</article>

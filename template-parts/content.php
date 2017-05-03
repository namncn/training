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

	<header class="entry-header">
		<?php the_post_thumbnail( 'thumbnail' ); ?>
	</header>

	<div class="entry-content">

		<?php the_title( '<h2 class="entry-title"><a href="' . get_the_permalink() . '">', '</a></h2>' ); ?>

		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>

	</div>

	<div class="entry-footer">
		<?php the_time( 'm/d/Y' ); ?>
	</div>

</article>

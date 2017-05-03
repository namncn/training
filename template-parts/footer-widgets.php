<?php
/**
 * Displays footer widgets if assigned
 *
 * @package Training
 * @subpackage Training
 * @since 1.0.0
 * @version 1.0.0
 */

if ( ! is_active_sidebar( 'footer' ) && ! is_active_sidebar( 'footer-2' ) && ! is_active_sidebar( 'footer-3' ) && ! is_active_sidebar( 'footer-4' ) ) {
	return;
}

?>

<?php if ( is_active_sidebar( 'footer' ) ) : ?>
<div class="footer-widgets footer-1">
	<?php dynamic_sidebar( 'footer' ); ?>
</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
<div class="footer-widgets footer-2">
	<?php dynamic_sidebar( 'footer-2' ); ?>
</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
<div class="footer-widgets footer-3">
	<?php dynamic_sidebar( 'footer-3' ); ?>
</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
<div class="footer-widgets footer-4">
	<?php dynamic_sidebar( 'footer-4' ); ?>
</div>
<?php endif; ?>

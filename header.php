<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Training
 * @subpackage Training
 * @since 1.0.0
 * @version 1.0.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'training' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<?php if ( is_front_page() ) : ?>
		<h1 class="site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Twenty <span>by HTML5 UP</span></a>
		</h1>
		<?php else : ?>
		<div class="site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Twenty <span>by HTML5 UP</span></a>
		</div>
		<?php endif; ?>

		<nav id="site-navigation" class="main-navigation">
			<?php wp_nav_menu( array(
				'theme_location'  => 'primary',
				'container_class' => 'menu-primary-container',
				'container_id'    => 'primary-menu',
				'menu_class' => 'menu clearfix',
			) ); ?>
		</nav>
	</header><!-- #masthead -->

	<div class="site-content">

		<section id="banner">
			<div class="inner">
				<header><h2>TWENTY</h2></header>

				<p>This is <strong>Twenty</strong>, a free<br>responsive template<br>by <a href="http://html5up.net">HTML5 UP</a>.</p>

				<footer class="buttons_vertical">
					<a href="#content" class="button fit scrolly">Tell me more</a>
				</footer>
			</div>
		</section>

		<div id="content" class="container sidebar-left">
			<div class="row">

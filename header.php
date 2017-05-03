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

		<div class="site-branding">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<?php the_custom_logo(); ?>
					</div>

					<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
						<?php esc_html_e( 'Nội dung bên phải Header', 'training' ); ?>
					</div>
				</div>
			</div>
		</div>

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
		<div id="content" class="container sidebar-left">
			<div class="row">

<?php
/**
 * Training functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Trainging
 * @subpackage Trainging
 * @since 1.0.0
 * @version 1.0.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function training_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/training
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'training' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'training' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'    => esc_html__( 'Primary Menu', 'training' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );
}
add_action( 'after_setup_theme', 'training_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function training_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Thanh bên', 'training' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'training' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebars( 4, array(
		'name'          => esc_html__( 'Chân trang %d', 'training' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'training' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'training_widgets_init' );

/**
 * Register custom fonts.
 */
function training_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'training' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Roboto:300,400,500,700|Open Sans:400,600,700|Roboto:300,400,500,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,vietnamese' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Training 1.0.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function training_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'training-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'training_resource_hints', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function training_scripts() {
	wp_enqueue_style( 'training-style', get_stylesheet_uri() );

	wp_enqueue_style( 'google-fonts', training_fonts_url() );

	wp_enqueue_style( 'fontawesome', get_theme_file_uri( 'assets/css/font-awesome.min.css' ), array(), '4.7.0' );

	wp_enqueue_style( 'bootstrap', get_theme_file_uri( 'assets/css/bootstrap.min.css' ), array(), '3.3.7' );

	wp_enqueue_style( 'training-main', get_theme_file_uri( 'assets/css/main.css' ), array(), '1.0.0' );

	wp_enqueue_script( 'training-script', get_theme_file_uri( 'assets/js/main.js' ), array( 'jquery' ), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'training_scripts' );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Trainging 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function training_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'training_front_page_template' );

/**
 * Additional features to allow styling of the templates.
 */
require get_theme_file_path( 'inc/template-functions.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

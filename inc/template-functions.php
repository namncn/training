<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package Training
 * @subpackage Training
 * @since 1.0.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function training_body_classes( $classes ) {
	// Add class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add class if we're viewing the Customizer for easier styling of theme options.
	if ( is_customize_preview() ) {
		$classes[] = 'training-customizer';
	}

	// Add class on front page.
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'training-front-page';
	}

	// Add a class if there is a custom header.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	// Add class if sidebar is used.
	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) {
		$classes[] = 'has-sidebar';
	}

	// Add class if the site title and tagline is hidden.
	if ( 'blank' === get_header_textcolor() ) {
		$classes[] = 'title-tagline-hidden';
	}

	return $classes;
}
add_filter( 'body_class', 'training_body_classes' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Training 1.0
 */
function training_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'training_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function training_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'training_pingback_header' );

function training_excerpt_lenght( $lenght ) {
	return 30;
}
add_filter( 'excerpt_length', 'training_excerpt_lenght' );

function training_excerpt_more() {
	return ' <a href="' . get_the_permalink() . '" class="readmore">' . esc_html__( 'Đọc thêm &raquo;', 'training' ) . '</a>';
}
add_filter( 'excerpt_more', 'training_excerpt_more' );

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function training_register_book() {

	$labels = array(
		'name'                => esc_html__( 'Books', 'training' ),
		'singular_name'       => esc_html__( 'Book', 'training' ),
		'add_new'             => _x( 'Thêm mới Book', 'training', 'training' ),
		'add_new_item'        => esc_html__( 'Thêm mới Book', 'training' ),
		'edit_item'           => esc_html__( 'Chỉnh sửa Book', 'training' ),
		'new_item'            => esc_html__( 'Thêm Book', 'training' ),
		'view_item'           => esc_html__( 'Xem Book', 'training' ),
		'search_items'        => esc_html__( 'Tìm kiếm Books', 'training' ),
		'not_found'           => esc_html__( 'Không tìm thấy book', 'training' ),
		'not_found_in_trash'  => esc_html__( 'Không tìm thấy book trong bộ nhớ tạm', 'training' ),
		'parent_item_colon'   => esc_html__( 'Parent Book:', 'training' ),
		'menu_name'           => esc_html__( 'Books', 'training' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => true,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
		'menu_icon'           => 'dashicons-book',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'editor', 'author', 'thumbnail',
			'excerpt','custom-fields', 'trackbacks', 'comments',
			'revisions', 'page-attributes', 'post-formats'
			)
	);

	register_post_type( 'book', $args );
}
add_action( 'init', 'training_register_book' );

/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */
function training_taxonomies_kinhdoanh() {

	$labels = array(
		'name'                  => _x( 'Kinh doanh', 'Taxonomy Kinh doanh', 'text-domain' ),
		'singular_name'         => _x( 'Kinh doanh', 'Taxonomy Kinh doanh', 'text-domain' ),
		'search_items'          => __( 'Search Kinh doanh', 'text-domain' ),
		'popular_items'         => __( 'Popular Kinh doanh', 'text-domain' ),
		'all_items'             => __( 'All Kinh doanh', 'text-domain' ),
		'parent_item'           => __( 'Parent Kinh doanh', 'text-domain' ),
		'parent_item_colon'     => __( 'Parent Kinh doanh', 'text-domain' ),
		'edit_item'             => __( 'Edit Kinh doanh', 'text-domain' ),
		'update_item'           => __( 'Update Kinh doanh', 'text-domain' ),
		'add_new_item'          => __( 'Add New Kinh doanh', 'text-domain' ),
		'new_item_name'         => __( 'New Kinh doanh Name', 'text-domain' ),
		'add_or_remove_items'   => __( 'Add or remove Kinh doanh', 'text-domain' ),
		'choose_from_most_used' => __( 'Choose from most used text-domain', 'text-domain' ),
		'menu_name'             => __( 'Kinh doanh', 'text-domain' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => false,
		'hierarchical'      => false,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'kinhdoanh', array( 'book' ), $args );
}

add_action( 'init', 'training_taxonomies_kinhdoanh' );

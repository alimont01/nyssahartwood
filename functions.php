<?php
/**
 * Theme functions.
 *
 * @package nyssa_hartwood_theme
 */

/**
 * Set up theme supports.
 */
function nyssa_hartwood_theme_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_image_size( 'square', 700, 700,  array( 'center', 'center' ) );
}
add_action( 'after_setup_theme', 'nyssa_hartwood_theme_setup' );

function nyssa_hartwood_theme_enqueue_assets() {
	$theme_uri = get_template_directory_uri();
	$theme_dir = get_template_directory();

	$main_style_deps  = array( 'nyssa_hartwood_theme-fonts' );
	$main_script_deps = array();

	wp_enqueue_style(
		'nyssa_hartwood_theme-fonts',
		'https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=DM+Serif+Display:ital@0;1&display=swap',
		array(),
		null
	);

	if ( file_exists( $theme_dir . '/assets/css/bootstrap.min.css' ) ) {
		wp_enqueue_style(
			'nyssa_hartwood_theme-bootstrap',
			$theme_uri . '/assets/css/bootstrap.min.css',
			array(),
			'5.3.8'
		);
		$main_style_deps[] = 'nyssa_hartwood_theme-bootstrap';
	}

	wp_enqueue_style(
		'nyssa_hartwood_theme-main',
		$theme_uri . '/assets/css/main.css',
		$main_style_deps,
		'1.0.0'
	);

	if ( file_exists( $theme_dir . '/assets/js/bootstrap.bundle.min.js' ) ) {
		wp_enqueue_script(
			'nyssa_hartwood_theme-bootstrap',
			$theme_uri . '/assets/js/bootstrap.bundle.min.js',
			array(),
			'5.3.8',
			true
		);
		$main_script_deps[] = 'nyssa_hartwood_theme-bootstrap';
	}

	$main_script_deps[] = 'jquery';

	if ( class_exists( 'WooCommerce' ) ) {
		$main_script_deps[] = 'wc-cart-fragments';
	}

	wp_enqueue_script(
		'nyssa_hartwood_theme-main',
		$theme_uri . '/assets/js/main.js',
		$main_script_deps,
		'1.0.0',
		true
	);
	wp_localize_script(
		'nyssa_hartwood_theme-main',
		'nyssaCart',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		)
	);

	wp_enqueue_style(
		'bootstrap-icons',
		'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css'
	);
}
add_action( 'wp_enqueue_scripts', 'nyssa_hartwood_theme_enqueue_assets' );

/**
 * Add preconnect hints for Google Fonts.
 */
function nyssa_hartwood_theme_font_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' !== $relation_type ) {
		return $urls;
	}

	$urls[] = 'https://fonts.googleapis.com';
	$urls[] = array(
		'href'        => 'https://fonts.gstatic.com',
		'crossorigin' => 'anonymous',
	);

	return $urls;
}
add_filter( 'wp_resource_hints', 'nyssa_hartwood_theme_font_resource_hints', 10, 2 );

/**
 * WP Menus
 */
function mytheme_setup() {
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'mytheme' ),
		'footer'  => __( 'Footer Menu', 'mytheme' ),
	) );
}
add_action( 'after_setup_theme', 'mytheme_setup' );

/**
 * Hide ACF admin menu outside local environments.
 */
function nyssa_hartwood_theme_hide_acf_admin_menu() {
	if ( 'local' === wp_get_environment_type() ) {
		return;
	}

	remove_menu_page( 'edit.php?post_type=acf-field-group' );
}
add_action( 'admin_menu', 'nyssa_hartwood_theme_hide_acf_admin_menu', 999 );

/**
 * Register Recipes custom post type and Recipe Categories taxonomy.
 */
function ali_register_recipes_cpt() {

	$labels = array(
		'name'                  => __( 'Recipes', 'nyssa_hartwood_theme' ),
		'singular_name'         => __( 'Recipe', 'nyssa_hartwood_theme' ),
		'menu_name'             => __( 'Recipes', 'nyssa_hartwood_theme' ),
		'name_admin_bar'        => __( 'Recipe', 'nyssa_hartwood_theme' ),
		'add_new'               => __( 'Add New', 'nyssa_hartwood_theme' ),
		'add_new_item'          => __( 'Add New Recipe', 'nyssa_hartwood_theme' ),
		'new_item'              => __( 'New Recipe', 'nyssa_hartwood_theme' ),
		'edit_item'             => __( 'Edit Recipe', 'nyssa_hartwood_theme' ),
		'view_item'             => __( 'View Recipe', 'nyssa_hartwood_theme' ),
		'all_items'             => __( 'All Recipes', 'nyssa_hartwood_theme' ),
		'search_items'          => __( 'Search Recipes', 'nyssa_hartwood_theme' ),
		'not_found'             => __( 'No recipes found.', 'nyssa_hartwood_theme' ),
		'not_found_in_trash'    => __( 'No recipes found in Trash.', 'nyssa_hartwood_theme' ),
		'archives'              => __( 'Recipe Archives', 'nyssa_hartwood_theme' ),
		'featured_image'        => __( 'Recipe Image', 'nyssa_hartwood_theme' ),
		'set_featured_image'    => __( 'Set recipe image', 'nyssa_hartwood_theme' ),
		'remove_featured_image' => __( 'Remove recipe image', 'nyssa_hartwood_theme' ),
		'use_featured_image'    => __( 'Use as recipe image', 'nyssa_hartwood_theme' ),
	);

	$args = array(
		'labels'       => $labels,
		'public'       => true,
		'has_archive'  => 'all-recipes',
		'menu_icon'    => 'dashicons-carrot',
		'rewrite'      => array(
			'slug'       => 'recipes',
			'with_front' => false,
		),
		'show_in_rest' => true,
		'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
		'taxonomies'   => array( 'recipe_category' ),
	);

	register_post_type( 'recipe', $args );

	$taxonomy_labels = array(
		'name'              => __( 'Recipe Categories', 'nyssa_hartwood_theme' ),
		'singular_name'     => __( 'Recipe Category', 'nyssa_hartwood_theme' ),
		'search_items'      => __( 'Search Recipe Categories', 'nyssa_hartwood_theme' ),
		'all_items'         => __( 'All Recipe Categories', 'nyssa_hartwood_theme' ),
		'parent_item'       => __( 'Parent Recipe Category', 'nyssa_hartwood_theme' ),
		'parent_item_colon' => __( 'Parent Recipe Category:', 'nyssa_hartwood_theme' ),
		'edit_item'         => __( 'Edit Recipe Category', 'nyssa_hartwood_theme' ),
		'update_item'       => __( 'Update Recipe Category', 'nyssa_hartwood_theme' ),
		'add_new_item'      => __( 'Add New Recipe Category', 'nyssa_hartwood_theme' ),
		'new_item_name'     => __( 'New Recipe Category Name', 'nyssa_hartwood_theme' ),
		'menu_name'         => __( 'Recipe Categories', 'nyssa_hartwood_theme' ),
	);

	register_taxonomy(
		'recipe_category',
		array( 'recipe' ),
		array(
			'labels'            => $taxonomy_labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'       => 'recipe-category',
				'with_front' => false,
			),
		)
	);
}
add_action( 'init', 'ali_register_recipes_cpt' );

/**
 * Disable comments everywhere in WordPress admin and front end.
 */
function ali_disable_comments_everywhere() {

	// Remove comment support from all post types
	$post_types = get_post_types();
	foreach ( $post_types as $post_type ) {
		if ( post_type_supports( $post_type, 'comments' ) ) {
			remove_post_type_support( $post_type, 'comments' );
			remove_post_type_support( $post_type, 'trackbacks' );
		}
	}

	// Close comments and pings on the front end
	add_filter( 'comments_open', '__return_false', 20, 2 );
	add_filter( 'pings_open', '__return_false', 20, 2 );

	// Hide existing comments
	add_filter( 'comments_array', '__return_empty_array', 10, 2 );
}
add_action( 'init', 'ali_disable_comments_everywhere' );

/**
 * Remove Comments menu from admin
 */
function ali_remove_comments_menu() {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'ali_remove_comments_menu' );

/**
 * Remove comments from admin bar
 */
function ali_remove_comments_admin_bar( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'comments' );
}
add_action( 'admin_bar_menu', 'ali_remove_comments_admin_bar', 999 );

/**
 * Redirect any direct access to the comments page
 */
function ali_disable_comments_admin_redirect() {
	global $pagenow;

	if ( $pagenow === 'edit-comments.php' ) {
		wp_redirect( admin_url() );
		exit;
	}
}
add_action( 'admin_init', 'ali_disable_comments_admin_redirect' );

/**
 * Remove woo css styles from the shop and single product 
 */
function nyssa_disable_woocommerce_styles() {
	if ( is_product() || is_shop() || is_product_category() || is_product_tag() ) {
		wp_dequeue_style( 'woocommerce-general' );
		wp_dequeue_style( 'woocommerce-layout' );
		wp_dequeue_style( 'woocommerce-smallscreen' );
	}
}
add_action( 'wp_enqueue_scripts', 'nyssa_disable_woocommerce_styles', 99 );

/**
 * Update 'description' title
 */
function nyssa_change_product_description_heading( $heading ) {
	return 'More about this book';
}
add_filter( 'woocommerce_product_description_heading', 'nyssa_change_product_description_heading' );


/**
 * Remove product meta on single product pages.
 */
function nyssa_remove_single_product_meta() {
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
}
add_action( 'wp', 'nyssa_remove_single_product_meta' );

/**
 * Hide product category and tag admin menus.
 */
function nyssa_hide_product_taxonomy_menus() {
	remove_submenu_page( 'edit.php?post_type=product', 'edit-tags.php?taxonomy=product_cat&post_type=product' );
	remove_submenu_page( 'edit.php?post_type=product', 'edit-tags.php?taxonomy=product_tag&post_type=product' );
	remove_submenu_page( 'edit.php?post_type=product', 'edit-tags.php?taxonomy=product_brand&post_type=product' );
}
add_action( 'admin_menu', 'nyssa_hide_product_taxonomy_menus', 999 );

/**
 * Hide taxonomy boxes on the product edit screen.
 */
function nyssa_hide_product_taxonomy_metaboxes() {
	remove_meta_box( 'product_catdiv', 'product', 'side' );
	remove_meta_box( 'tagsdiv-product_tag', 'product', 'side' );
	remove_meta_box( 'product_branddiv', 'product', 'side' );
}
add_action( 'admin_menu', 'nyssa_hide_product_taxonomy_metaboxes', 99 );

/**
 * Add numbers to bag/cart
 */
function nyssa_cart_count_fragment( $fragments ) {
	ob_start();

	$count = WC()->cart->get_cart_contents_count();
	?>
	<span class="cart-count"><?php echo esc_html( $count ); ?></span>
	<?php

	$fragments['.cart-count'] = ob_get_clean();

	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'nyssa_cart_count_fragment' );

function nyssa_get_cart_count() {
	wp_send_json_success( array(
		'count' => WC()->cart ? WC()->cart->get_cart_contents_count() : 0,
	) );
}
add_action( 'wp_ajax_nyssa_get_cart_count', 'nyssa_get_cart_count' );
add_action( 'wp_ajax_nopriv_nyssa_get_cart_count', 'nyssa_get_cart_count' );

/**
 * ACF options pages
 */
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Site options',
		'menu_title'	=> 'Site options',
		'menu_slug' 	=> 'site-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}
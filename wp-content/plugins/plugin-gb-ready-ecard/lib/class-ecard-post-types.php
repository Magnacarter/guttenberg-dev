<?php
/**
 * Define our custom post types
 * @package PETA\Plugin_GB_Ready_eCard\lib
 *
 */
namespace PETA\Plugin_GB_Ready_eCard;

new Ecard_Post_Types();

/**
 * Class Ecard_Post_Types
 */
class Ecard_Post_Types {

	public function __construct() {
		add_action( 'init', array( $this, 'peta_post_types' ) );
	}

	public function peta_post_types() {
		$labels = array(
			'name' => _x( 'Gift', 'post type general name' ),
			'singular_name' => _x( 'Gift', 'post type singular name' ),
			'add_new' => _x( 'Add Gift', 'Test' ),
			'add_new_item' => __( 'Add Gift' ),
			'edit_item' => __( 'Edit Gift' ),
			'new_item' => __( 'New Gift' ),
			'all_items' => __( 'All Gifts' ),
			'view_item' => __( 'View Gift' ),
			'search_items' => __( 'Search Gift' ),
			'not_found' =>  __( 'No Gift found' ),
			'not_found_in_trash' => __( 'No Gifts found in Trash' ),
			'parent_item_colon' => '',
			'menu_name' => 'Gifts'
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array( 'with_front' => false, 'slug' => 'gift' ), // 'with_front' => false - removes the 'blog' prefix
			'taxonomies' => array( 'category' ),
			// 'capability_type' can be 'post' or 'page'
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_position' => 25,
			// 'supports' array can include any/all of the following: 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'revisions', 'page-attributes', 'post-formats'
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author', 'revisions', 'page-attributes', 'custom-fields' ),
			'menu_icon' => 'dashicons-products',
		);

		// always use a singular post type name (ie 'sample' not 'samples'
		register_post_type( 'gift', $args );

		$labels = array(
			'name' => _x( 'E-card', 'post type general name' ),
			'singular_name' => _x( 'E-card', 'post type singular name' ),
			'add_new' => _x( 'Add E-card', 'Test' ),
			'add_new_item' => __( 'Add E-card' ),
			'edit_item' => __( 'Edit E-card' ),
			'new_item' => __( 'New E-card' ),
			'all_items' => __( 'All E-cards' ),
			'view_item' => __( 'View E-card' ),
			'search_items' => __( 'Search E-card' ),
			'not_found' =>  __( 'No E-card found' ),
			'not_found_in_trash' => __( 'No E-cards found in Trash' ),
			'parent_item_colon' => '',
			'menu_name' => 'E-Cards'
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array( 'with_front' => false, 'slug' => 'ecard' ), // 'with_front' => false - removes the 'blog' prefix
			'taxonomies' => array( 'category' ),
			// 'capability_type' can be 'post' or 'page'
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_position' => 25,
			'show_in_rest' => true, // This setting allows cpts to show Guttenberg blocks
			// 'supports' array can include any/all of the following: 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'revisions', 'page-attributes', 'post-formats'
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author', 'revisions' ),
			'menu_icon' => 'dashicons-email',
		);

		// always use a singular post type name (ie 'sample' not 'samples'
		register_post_type( 'ecard', $args );
	}
}

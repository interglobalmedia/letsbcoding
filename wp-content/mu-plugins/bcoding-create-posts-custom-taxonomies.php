<?php
/**
 * Plugin Name: BCoding Create Posts Custom Taxonomies
 * Plugin Author: Maria D. Campbell
 * Text Domain: bcoding-create-posts-custom-taxonomies
 *
 * Create custom taxonomies for post types
 *
 * @author Maria D. Campbell interglobalmedia@interglobalmedianetwork.com
 * @copyright  Copyright (c) 2021 Maria D. Campbell
 *
 * @package WordPress
 * @subpackage LetsBcoding
 * @link https://www.interglobalmedianetwork.com
 * @since LetsBCoding 2.0.0
 * @return void
 */

?>

<?php
/**
 * Document Function
 * Register custom taxonomies for post types
 */
function bcoding_create_posts_custom_taxonomies() {
	/*
	Register taxonomy for post custom taxonomy genre
	*/

	/*
	Add new taxonomy, hierarchical (like categories)
	*/
	$genre_labels = array(
		// phpcs:disable WordPress.WP.I18n.TextDomainMismatch
		'name'                       => _x( 'Genres', 'taxonomy general name', 'bcoding-create-posts-custom-taxonomies' ),
		'singular_name'              => _x( 'Genre', 'taxonomy singular name', 'bcoding-create-posts-custom-taxonomies' ),
		'search_items'               => __( 'Search Genres', 'bcoding-create-posts-custom-taxonomies' ),
		'popular_items'              => __( 'Popular Genres', 'bcoding-create-posts-custom-taxonomies' ),
		'all_items'                  => __( 'All Genres', 'bcoding-create-posts-custom-taxonomies' ),
		'parent_item'                => __( 'Parent Genre', 'bcoding-create-posts-custom-taxonomies' ),
		'parent_item_colon'          => __( 'Parent Genre:', 'bcoding-create-posts-custom-taxonomies' ),
		'edit_item'                  => __( 'Edit Genre', 'bcoding-create-posts-custom-taxonomies' ),
		'update_item'                => __( 'Update Genre', 'bcoding-create-posts-custom-taxonomies' ),
		'add_new_item'               => __( 'Add New Genre', 'bcoding-create-posts-custom-taxonomies' ),
		'new_item_name'              => __( 'New Genre Name', 'bcoding-create-posts-custom-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate genres with commas', 'bcoding-create-posts-custom-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove genres', 'bcoding-create-posts-custom-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used genres', 'bcoding-create-posts-custom-taxonomies' ),
		'menu_name'                  => __( 'Genres', 'bcoding-create-posts-custom-taxonomies' ),
	);
	$genre_args   = array(
		'hierarchical'          => true,
		'labels'                => $genre_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'genre',
		),
	);
	register_taxonomy(
		'genre', // taxonomy !
		array( 'post' ), // post type !
		$genre_args
	);

	/*
	Register taxonomy for post custom taxonomy label
	*/

	/*
	Add new taxonomy, nonhierarchical (like tags)
	*/
	$label_labels = array(
		'name'                       => _x( 'Labels', 'taxonomy general name', 'bcoding-create-posts-custom-taxonomies' ),
		'singular_name'              => _x( 'Label', 'taxonomy singular name', 'bcoding-create-posts-custom-taxonomies' ),
		'search_items'               => __( 'Search Labels', 'bcoding-create-posts-custom-taxonomies' ),
		'popular_items'              => __( 'Popular Labels', 'bcoding-create-posts-custom-taxonomies' ),
		'all_items'                  => __( 'All Labels', 'bcoding-create-posts-custom-taxonomies' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Label', 'bcoding-create-posts-custom-taxonomies' ),
		'update_item'                => __( 'Update Label', 'bcoding-create-posts-custom-taxonomies' ),
		'add_new_item'               => __( 'Add New Label', 'bcoding-create-posts-custom-taxonomies' ),
		'new_item_name'              => __( 'New Label Name', 'bcoding-create-posts-custom-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate labels with commas', 'bcoding-create-posts-custom-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove labels', 'bcoding-create-posts-custom-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used labels', 'bcoding-create-posts-custom-taxonomies' ),
		'menu_name'                  => __( 'Labels', 'bcoding-create-posts-custom-taxonomies' ),
	);
	$label_args   = array(
		'hierarchical'          => false,
		'labels'                => $label_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'label',
		),
	);
	register_taxonomy(
		'label', // taxonomy !
		array( 'post' ), // post type !
		$label_args
	);
}
add_action( 'init', 'bcoding_create_posts_custom_taxonomies', 0 );


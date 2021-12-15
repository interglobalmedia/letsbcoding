<?php
/**
 * Document function
 * Function used to register custom post types
 *
 * @author Maria D. Campbell interglobalmedia@interglobalmedianetwork.com
 * @copyright  Copyright (c) 2021 Maria D. Campbell
 *
 * @package WordPress
 * @subpackage LetsBCoding
 * @link https://www.interglobalmedianetwork.com
 * @since LetsBCoding 2.0.0
 * @return void
 */

?>

<?php
/**
 * Function for registering custom post types
 */
function bcoding_post_types() {
	// campus post type !
	register_post_type(
		'campus',
		array(
			'capability_type' => 'campus',
			'map_meta_cap'    => true,
			'show_in_rest'    => true,
			'supports'        => array(
				'title',
				'editor',
				'excerpt',
			),
			'rewrite'         => array( 'slug' => 'campuses' ),
			'has_archive'     => true,
			'public'          => true,
			'labels'          => array(
				'name'          => 'Campuses',
				'add_new_item'  => 'Add New Campus',
				'edit_item'     => 'Edit Campus',
				'all_items'     => 'All Campuses',
				'singular_name' => 'Campus',
			),
			'menu_icon'       => 'dashicons-location-alt',
		)
	);

	// event post type !
	register_post_type(
		'event',
		array(
			'capability_type' => 'event',
			'map_meta_cap'    => true,
			'show_in_rest'    => true,
			'supports'        => array(
				'title',
				'editor',
				'excerpt',
			),
			'rewrite'         => array( 'slug' => 'events' ),
			'has_archive'     => true,
			'public'          => true,
			'labels'          => array(
				'name'          => 'Events',
				'add_new_item'  => 'Add New Event',
				'edit_item'     => 'Edit Event',
				'all_items'     => 'All Events',
				'singular_name' => 'Event',
			),
			'menu_icon'       => 'dashicons-calendar',
		)
	);

	// program post type !
	register_post_type(
		'program',
		array(
			'show_in_rest' => true,
			'supports'     => array(
				'title',
				'editor',
			),
			'rewrite'      => array( 'slug' => 'programs' ),
			'has_archive'  => true,
			'public'       => true,
			'hierarchical' => true,
			'taxonomies'   => array(
				'subjects',
				'themes',
				'locations',
			),
			'labels'       => array(
				'name'          => 'Programs',
				'add_new_item'  => 'Add New Program',
				'edit_item'     => 'Edit Program',
				'all_items'     => 'All Programs',
				'singular_name' => 'Program',
			),
			'menu_icon'    => 'dashicons-awards',
		)
	);

	// course post type !
	register_post_type(
		'course',
		array(
			'show_in_rest' => true,
			'supports'     => array(
				'title',
				'editor',
			),
			'rewrite'      => array( 'slug' => 'courses' ),
			'has_archive'  => true,
			'public'       => true,
			'hierarchical' => true,
			'labels'       => array(
				'name'          => 'Courses',
				'add_new_item'  => 'Add New Course',
				'edit_item'     => 'Edit Course',
				'all_items'     => 'All Courses',
				'singular_name' => 'Course',
			),
			'menu_icon'    => 'dashicons-awards',
		)
	);

	// professor post type !
	register_post_type(
		'professor',
		array(
			'show_in_rest' => true,
			'supports'     => array(
				'title',
				'editor',
				'thumbnail',
			),
			'has_archive'  => true,
			'public'       => true,
			'labels'       => array(
				'name'          => 'Professors',
				'add_new_item'  => 'Add New Professor',
				'edit_item'     => 'Edit Professor',
				'all_items'     => 'All Professors',
				'singular_name' => 'Professor',
			),
			'menu_icon'    => 'dashicons-awards',
		)
	);

	// student post type !
	register_post_type(
		'student',
		array(
			'show_in_rest' => true,
			'supports'     => array(
				'title',
				'editor',
				'thumbnail',
			),
			'has_archive'  => true,
			'public'       => true,
			'labels'       => array(
				'name'          => 'Students',
				'add_new_item'  => 'Add New Student',
				'edit_item'     => 'Edit Student',
				'all_items'     => 'All Students',
				'singular_name' => 'Student',
			),
			'menu_icon'    => 'dashicons-awards',
		)
	);

	// slide post type !
	register_post_type(
		'slide',
		array(
			'supports'  => array(
				'title',
				'thumbnail',
			),
			'public'    => true,
			'labels'    => array(
				'name'          => 'Slides',
				'add_new_item'  => 'Add New Slide',
				'edit_item'     => 'Edit Slide',
				'all_items'     => 'All Slides',
				'singular_name' => 'Slide',
			),
			'menu_icon' => 'dashicons-awards',
		)
	);

	// note post type !
	register_post_type(
		'note',
		array(
			'capability_type' => 'note',
			'map_meta_cap'    => true,
			'show_in_rest'    => true,
			'supports'        => array(
				'title',
				'editor',
			),
			'public'          => false,
			'show_ui'         => true,
			'labels'          => array(
				'name'          => 'Notes',
				'add_new_item'  => 'Add New Note',
				'edit_item'     => 'Edit Note',
				'all_items'     => 'All Notes',
				'singular_name' => 'Note',
			),
			'menu_icon'       => 'dashicons-welcome-write-blog',
		)
	);

	// (professor) like post type !
	register_post_type(
		'like',
		array(
			'supports'  => array(
				'title',
			),
			'public'    => false,
			'show_ui'   => true,
			'labels'    => array(
				'name'          => 'Likes',
				'add_new_item'  => 'Add New Like',
				'edit_item'     => 'Edit Like',
				'all_items'     => 'All Likes',
				'singular_name' => 'Like',
			),
			'menu_icon' => 'dashicons-heart',
		)
	);

	// (student) like post type !
	register_post_type(
		'studentlike',
		array(
			'supports'  => array(
				'title',
			),
			'public'    => false,
			'show_ui'   => true,
			'labels'    => array(
				'name'          => 'StudentLikes',
				'add_new_item'  => 'Add New StudentLike',
				'edit_item'     => 'Edit StudentLike',
				'all_items'     => 'All StudentLikes',
				'singular_name' => 'StudentLike',
			),
			'menu_icon' => 'dashicons-heart',
		)
	);
}

add_action( 'init', 'bcoding_post_types' );



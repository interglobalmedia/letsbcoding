<?php
/**
 * Plugin Name: BCoding Create Nonhierarchical Taxonomies
 * Plugin Author: Maria D. Campbell
 * Text Domain: bcoding-create-nonhierarchical-taxonomies
 *
 * Create nonhierarchical taxonomies for custom post types
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

/**
 * Document function
 * Register nonhierarchical taxonomies for custom post types
 */
function bcoding_create_nonhierarchical_taxonomies() {
	/*
	Register taxonomy for custom post topic tag
	*/
	// Add new taxonomy, NOT hierarchical (like tags) !
	$campus_themes_labels = array(
		// phpcs:disable WordPress.WP.I18n.TextDomainMismatch
		'name'                       => _x( 'Campus Themes', 'taxonomy general name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'singular_name'              => _x( 'Campus Theme', 'taxonomy singular name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'search_items'               => __( 'Search Campus Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Campus Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'all_items'                  => __( 'All Campus Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Campus Theme', 'bcoding-create-nonhierarchical-taxonomies' ),
		'update_item'                => __( 'Update Campus Theme', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Campus Theme', 'bcoding-create-nonhierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Campus Theme Name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate campus themes with commas', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove campus themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used campus themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'menu_name'                  => __( 'Campus Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
	);
	$campus_themes_args   = array(
		'hierarchical'          => false,
		'labels'                => $campus_themes_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'campus-theme',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Campus Theme',
			'slug'        => 'bcoding-campus-theme',
			'description' => 'The default campus theme taxonomy applied to campus posts when no campus theme taxonomy has been added.',
		),
	);
	register_taxonomy(
		'campus_themes', // taxonomy !
		array( 'campus' ), // post type !
		$campus_themes_args
	);

	$course_themes_labels = array(
		'name'                       => _x( 'Course Themes', 'taxonomy general name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'singular_name'              => _x( 'Course Theme', 'taxonomy singular name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'search_items'               => __( 'Search Course Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Course Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'all_items'                  => __( 'All Course Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Course Theme', 'bcoding-create-nonhierarchical-taxonomies' ),
		'update_item'                => __( 'Update Course Theme', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Course Theme', 'bcoding-create-nonhierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Course Theme Name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate course themes with commas', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove course themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used course themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'menu_name'                  => __( 'Course Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
	);
	$course_themes_args   = array(
		'hierarchical'          => false,
		'labels'                => $course_themes_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'course-theme',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Course Theme',
			'slug'        => 'bcoding-course-theme',
			'description' => 'The default course theme taxonomy applied to course posts when no course theme taxonomy has been added.',
		),
	);
	register_taxonomy(
		'course_themes', // taxonomy !
		array( 'course' ), // post type !
		$course_themes_args
	);

	$event_themes_labels = array(
		'name'                       => _x( 'Event Themes', 'taxonomy general name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'singular_name'              => _x( 'Event Theme', 'taxonomy singular name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'search_items'               => __( 'Search Event Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Event Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'all_items'                  => __( 'All Event Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Event Theme', 'bcoding-create-nonhierarchical-taxonomies' ),
		'update_item'                => __( 'Update Event Theme', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Event Theme', 'bcoding-create-nonhierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Event Theme Name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate event themes with commas', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove event themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used event themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'menu_name'                  => __( 'Event Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
	);
	$event_themes_args   = array(
		'hierarchical'          => false,
		'labels'                => $event_themes_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'event-theme',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Event Theme',
			'slug'        => 'bcoding-event-theme',
			'description' => 'The default event theme taxonomy applied to event posts when no event theme taxonomy has been added.',
		),
	);
	register_taxonomy(
		'event_themes', // taxonomy !
		array( 'event' ), // post type !
		$event_themes_args
	);

	$professor_collaborations_labels = array(
		'name'                       => _x( 'Professor Collaborations', 'taxonomy general name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'singular_name'              => _x( 'Professor Collaboration', 'taxonomy singular name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'search_items'               => __( 'Search Professor Collaborations', 'bcoding-create-nonhierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Professor Collaborations', 'bcoding-create-nonhierarchical-taxonomies' ),
		'all_items'                  => __( 'All Professor Collaborations', 'bcoding-create-nonhierarchical-taxonomies' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Professor Collaboration', 'bcoding-create-nonhierarchical-taxonomies' ),
		'update_item'                => __( 'Update Professor Collaboration', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Professor Collaboration', 'bcoding-create-nonhierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Professor Collabration Name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate professor collaborations with commas', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove professor collaborations', 'bcoding-create-nonhierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used professor collaborations', 'bcoding-create-nonhierarchical-taxonomies' ),
		'menu_name'                  => __( 'Professor Collaborations', 'bcoding-create-nonhierarchical-taxonomies' ),
	);
	$professor_collaborations_args   = array(
		'hierarchical'          => false,
		'labels'                => $professor_collaborations_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'professor-collaboration',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Professor Collaboration',
			'slug'        => 'bcoding-professor-collaboration',
			'description' => 'The default professor collaboration taxonomy applied to professor posts when no professor collaboration taxonomy has been added.',
		),
	);
	register_taxonomy(
		'professor_collaborations', // taxonomy !
		array( 'professor' ), // post type !
		$professor_collaborations_args
	);

	$professor_themes_labels = array(
		'name'                       => _x( 'Professor Themes', 'taxonomy general name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'singular_name'              => _x( 'Professor Theme', 'taxonomy singular name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'search_items'               => __( 'Search Professor Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Professor Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'all_items'                  => __( 'All Professor Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Professor Theme', 'bcoding-create-nonhierarchical-taxonomies' ),
		'update_item'                => __( 'Update Professor Theme', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Professor Theme', 'bcoding-create-nonhierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Professor Theme Name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate professor themes with commas', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove professor themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used professor themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'menu_name'                  => __( 'Professor Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
	);
	$professor_themes_args   = array(
		'hierarchical'          => false,
		'labels'                => $professor_themes_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'professor-theme',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Professor Theme',
			'slug'        => 'bcoding-professor-theme',
			'description' => 'The default professor theme taxonomy applied to professor posts when no professor theme taxonomy has been added.',
		),
	);
	register_taxonomy(
		'professor_themes', // taxonomy !
		array( 'professor' ), // post type !
		$professor_themes_args
	);

	$professor_workflows_labels = array(
		'name'                       => _x( 'Professor Workflows', 'taxonomy general name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'singular_name'              => _x( 'Professor Workflow', 'taxonomy singular name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'search_items'               => __( 'Search Professor Workflows', 'bcoding-create-nonhierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Professor Workflows', 'bcoding-create-nonhierarchical-taxonomies' ),
		'all_items'                  => __( 'All Professor Workflows', 'bcoding-create-nonhierarchical-taxonomies' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Professor Workflow', 'bcoding-create-nonhierarchical-taxonomies' ),
		'update_item'                => __( 'Update Professor Workflow', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Professor Workflow', 'bcoding-create-nonhierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Professor Workflow Name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate professor workflows with commas', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove professor workflows', 'bcoding-create-nonhierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used professor workflows', 'bcoding-create-nonhierarchical-taxonomies' ),
		'menu_name'                  => __( 'Professor Workflows', 'bcoding-create-nonhierarchical-taxonomies' ),
	);
	$professor_workflows_args   = array(
		'hierarchical'          => false,
		'labels'                => $professor_workflows_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'professor-workflow',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Professor Workflow',
			'slug'        => 'bcoding-professor-workflow',
			'description' => 'The default professor workflow taxonomy applied to professor posts when no professor workflow taxonomy has been added.',
		),
	);
	register_taxonomy(
		'professor_workflows', // taxonomy !
		array( 'professor' ), // post type !
		$professor_workflows_args
	);

	$program_themes_labels = array(
		'name'                       => _x( 'Program Themes', 'taxonomy general name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'singular_name'              => _x( 'Program Theme', 'taxonomy singular name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'search_items'               => __( 'Search Program Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Program Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'all_items'                  => __( 'All Program Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Program Theme', 'bcoding-create-nonhierarchical-taxonomies' ),
		'update_item'                => __( 'Update Program Theme', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Program Theme', 'bcoding-create-nonhierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Program Theme Name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate program themes with commas', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove program themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used program themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'menu_name'                  => __( 'Program Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
	);
	$program_themes_args   = array(
		'hierarchical'          => false,
		'labels'                => $program_themes_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'program-theme',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Program Theme',
			'slug'        => 'bcoding-program-theme',
			'description' => 'The default program theme taxonomy applied to program posts when no program theme taxonomy has been added.',
		),
	);
	register_taxonomy(
		'program_themes', // taxonomy !
		array( 'program' ), // post type !
		$program_themes_args
	);

	$student_collaborations_labels = array(
		'name'                       => _x( 'Student Collaborations', 'taxonomy general name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'singular_name'              => _x( 'Student Collaboration', 'taxonomy singular name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'search_items'               => __( 'Search Student Collaborations', 'bcoding-create-nonhierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Student Collaborations', 'bcoding-create-nonhierarchical-taxonomies' ),
		'all_items'                  => __( 'All Student Collaborations', 'bcoding-create-nonhierarchical-taxonomies' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Student Collaboration', 'bcoding-create-nonhierarchical-taxonomies' ),
		'update_item'                => __( 'Update Student Collaboration', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Student Collaboration', 'bcoding-create-nonhierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Student Collabration Name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate student collaborations with commas', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove student collaborations', 'bcoding-create-nonhierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used student collaborations', 'bcoding-create-nonhierarchical-taxonomies' ),
		'menu_name'                  => __( 'Student Collaborations', 'bcoding-create-nonhierarchical-taxonomies' ),
	);
	$student_collaborations_args   = array(
		'hierarchical'          => false,
		'labels'                => $student_collaborations_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'student-collaboration',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Student Collaboration',
			'slug'        => 'bcoding-student-collaboration',
			'description' => 'The default student collaboration taxonomy applied to student posts when no student collaboration taxonomy has been added.',
		),
	);
	register_taxonomy(
		'student_collaborations', // taxonomy !
		array( 'student' ), // post type !
		$student_collaborations_args
	);

	$student_themes_labels = array(
		'name'                       => _x( 'Student Themes', 'taxonomy general name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'singular_name'              => _x( 'Student Theme', 'taxonomy singular name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'search_items'               => __( 'Search Student Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Student Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'all_items'                  => __( 'All Student Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Student Theme', 'bcoding-create-nonhierarchical-taxonomies' ),
		'update_item'                => __( 'Update Student Theme', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Student Theme', 'bcoding-create-nonhierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Student Theme Name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate student themes with commas', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove student themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used student themes', 'bcoding-create-nonhierarchical-taxonomies' ),
		'menu_name'                  => __( 'Student Themes', 'bcoding-create-nonhierarchical-taxonomies' ),
	);
	$student_themes_args   = array(
		'hierarchical'          => false,
		'labels'                => $student_themes_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'student-theme',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Student Theme',
			'slug'        => 'bcoding-student-theme',
			'description' => 'The default student theme taxonomy applied to student posts when no student theme taxonomy has been added.',
		),
	);
	register_taxonomy(
		'student_themes', // taxonomy !
		array( 'student' ), // post type !
		$student_themes_args
	);

	$student_workflows_labels = array(
		'name'                       => _x( 'Student Workflows', 'taxonomy general name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'singular_name'              => _x( 'Student Workflow', 'taxonomy singular name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'search_items'               => __( 'Search Student Workflows', 'bcoding-create-nonhierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Student Workflows', 'bcoding-create-nonhierarchical-taxonomies' ),
		'all_items'                  => __( 'All Student Workflows', 'bcoding-create-nonhierarchical-taxonomies' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Student Workflow', 'bcoding-create-nonhierarchical-taxonomies' ),
		'update_item'                => __( 'Update Student Workflow', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Student Workflow', 'bcoding-create-nonhierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Student Workflow Name', 'bcoding-create-nonhierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate student workflows with commas', 'bcoding-create-nonhierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove student workflows', 'bcoding-create-nonhierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used student workflows', 'bcoding-create-nonhierarchical-taxonomies' ),
		'menu_name'                  => __( 'Student Workflows', 'bcoding-create-nonhierarchical-taxonomies' ),
	);
	$student_workflows_args   = array(
		'hierarchical'          => false,
		'labels'                => $student_workflows_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'student-workflow',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Student Workflow',
			'slug'        => 'bcoding-student-workflow',
			'description' => 'The default student workflow taxonomy applied to student posts when no student workflow taxonomy has been added.',
		),
	);
	register_taxonomy(
		'student_workflows', // taxonomy !
		array( 'student' ), // post type !
		$student_workflows_args
	);
}
add_action( 'init', 'bcoding_create_nonhierarchical_taxonomies', 0 );



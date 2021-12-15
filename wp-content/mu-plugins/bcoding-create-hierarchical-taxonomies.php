<?php
/**
 * Plugin Name: BCoding Create Hierarchical Taxonomies
 * Plugin Author: Maria D. Campbell
 * Text Domain: bcoding-create-hierarchical-taxonomies
 *
 * Description: Create hierarchical taxonomies for custom post types
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
 * Register hierarchical taxonomies for custom post types
 */
function bcoding_create_hierarchical_taxonomies() {
	/*
	Register taxonomy for custom post subject
	*/
	// Add new taxonomy, hierarchical (like categories) !
	$campus_location_labels = array(
		// phpcs:disable WordPress.WP.I18n.TextDomainMismatch
		'name'                       => _x( 'Campus Locations', 'taxonomy general name', 'bcoding-create-hierarchical-taxonomies' ),
		'singular_name'              => _x( 'Campus Location', 'taxonomy singular name', 'bcoding-create-hierarchical-taxonomies' ),
		'search_items'               => __( 'Search Campus Locations', 'bcoding-create-hierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Campus Locations', 'bcoding-create-hierarchical-taxonomies' ),
		'all_items'                  => __( 'All Campus Locations', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item'                => __( 'Parent Campus Location', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item_colon'          => __( 'Parent Campus Location:', 'bcoding-create-hierarchical-taxonomies' ),
		'edit_item'                  => __( 'Edit Campus Location', 'bcoding-create-hierarchical-taxonomies' ),
		'update_item'                => __( 'Update Campus Location', 'bcoding-create-hierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Campus Location', 'bcoding-create-hierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Campus Location Name', 'bcoding-create-hierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate campus locations with commas', 'bcoding-create-hierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove campus locations', 'bcoding-create-hierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used campus locations', 'bcoding-create-hierarchical-taxonomies' ),
		'menu_name'                  => __( 'Campus Locations', 'bcoding-create-hierarchical-taxonomies' ),
	);
	$campus_location_args   = array(
		'hierarchical'          => true,
		'labels'                => $campus_location_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'campus-location',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Campus Location',
			'slug'        => 'bcoding-campus-location',
			'description' => 'The default campus location taxonomy applied to campus posts when no campus location taxonomy has been added.',
		),
	);
	register_taxonomy(
		'campus_locations', // taxonomy !
		array( 'campus' ), // post type !
		$campus_location_args
	);

	$campus_subject_labels = array(
		'name'                       => _x( 'Campus Subjects', 'taxonomy general name', 'bcoding-create-hierarchical-taxonomies' ),
		'singular_name'              => _x( 'Campus Subject', 'taxonomy singular name', 'bcoding-create-hierarchical-taxonomies' ),
		'search_items'               => __( 'Search Campus Subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Campus Subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'all_items'                  => __( 'All Campus Subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item'                => __( 'Parent Campus Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item_colon'          => __( 'Parent Campus Subject:', 'bcoding-create-hierarchical-taxonomies' ),
		'edit_item'                  => __( 'Edit Campus Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'update_item'                => __( 'Update Campus Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Campus Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Campus Subject Name', 'bcoding-create-hierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate campus subjects with commas', 'bcoding-create-hierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove campus subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used campus subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'menu_name'                  => __( 'Campus Subjects', 'bcoding-create-hierarchical-taxonomies' ),
	);

	$campus_subject_args = array(
		'hierarchical'          => true,
		'labels'                => $campus_subject_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'campus-subject',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Campus Subject',
			'slug'        => 'bcoding-campus-subject',
			'description' => 'The default campus subject taxonomy applied to campus posts when no campus subject taxonomy has been added.',
		),
	);

	register_taxonomy(
		'campus_subjects', // taxonomy !
		array( 'campus' ), // post type !
		$campus_subject_args
	);

	$course_location_labels = array(
		'name'                       => _x( 'Course Locations', 'taxonomy general name', 'bcoding-create-hierarchical-taxonomies' ),
		'singular_name'              => _x( 'Course Location', 'taxonomy singular name', 'bcoding-create-hierarchical-taxonomies' ),
		'search_items'               => __( 'Search Course Locations', 'bcoding-create-hierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Course Locations', 'bcoding-create-hierarchical-taxonomies' ),
		'all_items'                  => __( 'All Course Locations', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item'                => __( 'Parent Course Location', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item_colon'          => __( 'Parent Course Location:', 'bcoding-create-hierarchical-taxonomies' ),
		'edit_item'                  => __( 'Edit Course Location', 'bcoding-create-hierarchical-taxonomies' ),
		'update_item'                => __( 'Update Course Location', 'bcoding-create-hierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Course Location', 'bcoding-create-hierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Course Location Name', 'bcoding-create-hierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate course locations with commas', 'bcoding-create-hierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove course locations', 'bcoding-create-hierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used course locations', 'bcoding-create-hierarchical-taxonomies' ),
		'menu_name'                  => __( 'Course Locations', 'bcoding-create-hierarchical-taxonomies' ),
	);
	$course_location_args   = array(
		'hierarchical'          => true,
		'labels'                => $course_location_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'course-location',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Course Location',
			'slug'        => 'bcoding-course-location',
			'description' => 'The default course location taxonomy applied to course posts when no course location taxonomy has been added.',
		),
	);
	register_taxonomy(
		'course_locations', // taxonomy !
		array( 'course' ), // post type !
		$course_location_args
	);

	$course_subject_labels = array(
		'name'                       => _x( 'Course Subjects', 'taxonomy general name', 'bcoding-create-hierarchical-taxonomies' ),
		'singular_name'              => _x( 'Course Subject', 'taxonomy singular name', 'bcoding-create-hierarchical-taxonomies' ),
		'search_items'               => __( 'Search Course Subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Course Subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'all_items'                  => __( 'All Course Subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item'                => __( 'Parent Course Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item_colon'          => __( 'Parent Course Subject:', 'bcoding-create-hierarchical-taxonomies' ),
		'edit_item'                  => __( 'Edit Course Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'update_item'                => __( 'Update Course Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Course Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Course Subject Name', 'bcoding-create-hierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate course subjects with commas', 'bcoding-create-hierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove course subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used course subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'menu_name'                  => __( 'Course Subjects', 'bcoding-create-hierarchical-taxonomies' ),
	);

	$course_subject_args = array(
		'hierarchical'          => true,
		'labels'                => $course_subject_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'course-subject',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Course Subject',
			'slug'        => 'bcoding-course-subject',
			'description' => 'The default course subject taxonomy applied to course posts when no course subject taxonomy has been added.',
		),
	);

	register_taxonomy(
		'course_subjects', // taxonomy !
		array( 'course' ), // post type !
		$course_subject_args
	);

	$event_location_labels = array(
		'name'                       => _x( 'Event Locations', 'taxonomy general name', 'bcoding-create-hierarchical-taxonomies' ),
		'singular_name'              => _x( 'Event Location', 'taxonomy singular name', 'bcoding-create-hierarchical-taxonomies' ),
		'search_items'               => __( 'Search Event Locations', 'bcoding-create-hierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Event Locations', 'bcoding-create-hierarchical-taxonomies' ),
		'all_items'                  => __( 'All Event Locations', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item'                => __( 'Parent Event Location', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item_colon'          => __( 'Parent Event Location:', 'bcoding-create-hierarchical-taxonomies' ),
		'edit_item'                  => __( 'Edit Event Location', 'bcoding-create-hierarchical-taxonomies' ),
		'update_item'                => __( 'Update Event Location', 'bcoding-create-hierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Event Location', 'bcoding-create-hierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Event Location Name', 'bcoding-create-hierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate event locations with commas', 'bcoding-create-hierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove event locations', 'bcoding-create-hierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used event locations', 'bcoding-create-hierarchical-taxonomies' ),
		'menu_name'                  => __( 'Event Locations', 'bcoding-create-hierarchical-taxonomies' ),
	);
	$event_location_args   = array(
		'hierarchical'          => true,
		'labels'                => $event_location_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'event-location',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Event Location',
			'slug'        => 'bcoding-event-location',
			'description' => 'The default event location taxonomy applied to event posts when no event location taxonomy has been added.',
		),
	);
	register_taxonomy(
		'event_locations', // taxonomy !
		array( 'event' ), // post type !
		$event_location_args
	);

	$event_subject_labels = array(
		'name'                       => _x( 'Event Subjects', 'taxonomy general name', 'bcoding-create-hierarchical-taxonomies' ),
		'singular_name'              => _x( 'Event Subject', 'taxonomy singular name', 'bcoding-create-hierarchical-taxonomies' ),
		'search_items'               => __( 'Search Event Subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Event Subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'all_items'                  => __( 'All Event Subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item'                => __( 'Parent Event Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item_colon'          => __( 'Parent Event Subject:', 'bcoding-create-hierarchical-taxonomies' ),
		'edit_item'                  => __( 'Edit Event Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'update_item'                => __( 'Update Event Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Event Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Event Subject Name', 'bcoding-create-hierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate event subjects with commas', 'bcoding-create-hierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove event subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used event subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'menu_name'                  => __( 'Event Subjects', 'bcoding-create-hierarchical-taxonomies' ),
	);

	$event_subject_args = array(
		'hierarchical'          => true,
		'labels'                => $event_subject_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'event-subject',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Event Subject',
			'slug'        => 'bcoding-event-subject',
			'description' => 'The default event subject taxonomy applied to event posts when no event subject taxonomy has been added.',
		),
	);

	register_taxonomy(
		'event_subjects', // taxonomy !
		array( 'event' ), // post type !
		$event_subject_args
	);

	$professor_location_labels = array(
		'name'                       => _x( 'Professor Locations', 'taxonomy general name', 'bcoding-create-hierarchical-taxonomies' ),
		'singular_name'              => _x( 'Professor Location', 'taxonomy singular name', 'bcoding-create-hierarchical-taxonomies' ),
		'search_items'               => __( 'Search Professor Locations', 'bcoding-create-hierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Professor Locations', 'bcoding-create-hierarchical-taxonomies' ),
		'all_items'                  => __( 'All Professor Locations', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item'                => __( 'Parent Professor Location', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item_colon'          => __( 'Parent Professor Location:', 'bcoding-create-hierarchical-taxonomies' ),
		'edit_item'                  => __( 'Edit Professor Location', 'bcoding-create-hierarchical-taxonomies' ),
		'update_item'                => __( 'Update Professor Location', 'bcoding-create-hierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Profesor Location', 'bcoding-create-hierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Professor Location Name', 'bcoding-create-hierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate professor locations with commas', 'bcoding-create-hierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove professor locations', 'bcoding-create-hierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used professor locations', 'bcoding-create-hierarchical-taxonomies' ),
		'menu_name'                  => __( 'Professor Locations', 'bcoding-create-hierarchical-taxonomies' ),
	);
	$professor_location_args   = array(
		'hierarchical'          => true,
		'labels'                => $professor_location_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'professor-location',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Professor Location',
			'slug'        => 'bcoding-professor-location',
			'description' => 'The default professor location taxonomy applied to professor posts when no professor location taxonomy has been added.',
		),
	);
	register_taxonomy(
		'professor_locations', // taxonomy !
		array( 'professor' ), // post type !
		$professor_location_args
	);

	$professor_subject_labels = array(
		'name'                       => _x( 'Professor Subjects', 'taxonomy general name', 'bcoding-create-hierarchical-taxonomies' ),
		'singular_name'              => _x( 'Professor Subject', 'taxonomy singular name', 'bcoding-create-hierarchical-taxonomies' ),
		'search_items'               => __( 'Search Professor Subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Professor Subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'all_items'                  => __( 'All Professor Subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item'                => __( 'Parent Professor Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item_colon'          => __( 'Parent Professor Subject:', 'bcoding-create-hierarchical-taxonomies' ),
		'edit_item'                  => __( 'Edit Professor Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'update_item'                => __( 'Update Professor Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Professor Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Professor Subject Name', 'bcoding-create-hierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate professor subjects with commas', 'bcoding-create-hierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove professor subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used professor subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'menu_name'                  => __( 'Professor Subjects', 'bcoding-create-hierarchical-taxonomies' ),
	);

	$professor_subject_args = array(
		'hierarchical'          => true,
		'labels'                => $professor_subject_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'professor-subject',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Professor Subject',
			'slug'        => 'bcoding-professor-subject',
			'description' => 'The default professor subject taxonomy applied to professor posts when no professor subject taxonomy has been added.',
		),
	);

	register_taxonomy(
		'professor_subjects', // taxonomy !
		array( 'professor' ), // post type !
		$professor_subject_args
	);

	$program_location_labels = array(
		'name'                       => _x( 'Program Locations', 'taxonomy general name', 'bcoding-create-hierarchical-taxonomies' ),
		'singular_name'              => _x( 'Program Location', 'taxonomy singular name', 'bcoding-create-hierarchical-taxonomies' ),
		'search_items'               => __( 'Search Program Locations', 'bcoding-create-hierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Program Locations', 'bcoding-create-hierarchical-taxonomies' ),
		'all_items'                  => __( 'All Program Locations', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item'                => __( 'Parent Program Location', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item_colon'          => __( 'Parent Program Location:', 'bcoding-create-hierarchical-taxonomies' ),
		'edit_item'                  => __( 'Edit Program Location', 'bcoding-create-hierarchical-taxonomies' ),
		'update_item'                => __( 'Update Program Location', 'bcoding-create-hierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Program Location', 'bcoding-create-hierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Program Location Name', 'bcoding-create-hierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate program locations with commas', 'bcoding-create-hierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove program locations', 'bcoding-create-hierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used program locations', 'bcoding-create-hierarchical-taxonomies' ),
		'menu_name'                  => __( 'Program Locations', 'bcoding-create-hierarchical-taxonomies' ),
	);
	$program_location_args   = array(
		'hierarchical'          => true,
		'labels'                => $program_location_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'program-location',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Program Location',
			'slug'        => 'bcoding-program-location',
			'description' => 'The default program location taxonomy applied to program posts when no program location taxonomy has been added.',
		),
	);
	register_taxonomy(
		'program_locations', // taxonomy !
		array( 'program' ), // post type !
		$program_location_args
	);

	$program_subject_labels = array(
		'name'                       => _x( 'Program Subjects', 'taxonomy general name', 'bcoding-create-hierarchical-taxonomies' ),
		'singular_name'              => _x( 'Program Subject', 'taxonomy singular name', 'bcoding-create-hierarchical-taxonomies' ),
		'search_items'               => __( 'Search Program Subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Program Subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'all_items'                  => __( 'All Program Subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item'                => __( 'Parent Program Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item_colon'          => __( 'Parent Program Subject:', 'bcoding-create-hierarchical-taxonomies' ),
		'edit_item'                  => __( 'Edit Program Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'update_item'                => __( 'Update Program Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Program Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Program Subject Name', 'bcoding-create-hierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate program subjects with commas', 'bcoding-create-hierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove program subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used program subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'menu_name'                  => __( 'Program Subjects', 'bcoding-create-hierarchical-taxonomies' ),
	);

	$program_subject_args = array(
		'hierarchical'          => true,
		'labels'                => $program_subject_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'program-subject',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Program Subject',
			'slug'        => 'bcoding-program-subject',
			'description' => 'The default program subject taxonomy applied to program posts when no program subject taxonomy has been added.',
		),
	);

	register_taxonomy(
		'program_subjects', // taxonomy !
		array( 'program' ), // post type !
		$program_subject_args
	);

	$student_subject_labels = array(
		'name'                       => _x( 'Student Subjects', 'taxonomy general name', 'bcoding-create-hierarchical-taxonomies' ),
		'singular_name'              => _x( 'Student Subject', 'taxonomy singular name', 'bcoding-create-hierarchical-taxonomies' ),
		'search_items'               => __( 'Search Student Subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'popular_items'              => __( 'Popular Student Subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'all_items'                  => __( 'All Student Subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item'                => __( 'Parent Student Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'parent_item_colon'          => __( 'Parent Student Subject:', 'bcoding-create-hierarchical-taxonomies' ),
		'edit_item'                  => __( 'Edit Student Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'update_item'                => __( 'Update Student Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'add_new_item'               => __( 'Add New Student Subject', 'bcoding-create-hierarchical-taxonomies' ),
		'new_item_name'              => __( 'New Student Subject Name', 'bcoding-create-hierarchical-taxonomies' ),
		'separate_items_with_commas' => __( 'Separate student subjects with commas', 'bcoding-create-hierarchical-taxonomies' ),
		'add_or_remove_items'        => __( 'Add or remove student subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'choose_from_most_used'      => __( 'Choose from the most used student subjects', 'bcoding-create-hierarchical-taxonomies' ),
		'menu_name'                  => __( 'Student Subjects', 'bcoding-create-hierarchical-taxonomies' ),
	);

	$student_subject_args = array(
		'hierarchical'          => true,
		'labels'                => $student_subject_labels,
		'show_ui'               => true,
		'show_in_rest'          => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_updatepost_term_count',
		'query_var'             => true,
		'rewrite'               => array(
			'slug' => 'student-subject',
		),
		'default_term'          => array(
			'name'        => 'LetsBCoding Student Subject',
			'slug'        => 'bcoding-student-subject',
			'description' => 'The default student subject taxonomy applied to student posts when no student subject taxonomy has been added.',
		),
	);

	register_taxonomy(
		'student_subjects', // taxonomy !
		array( 'student' ), // post type !
		$student_subject_args
	);
}

add_action( 'init', 'bcoding_create_hierarchical_taxonomies', 0 );

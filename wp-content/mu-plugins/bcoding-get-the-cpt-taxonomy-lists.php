<?php
/**
 * Document functions
 * Helper functions used in cpt breadcrumb functions for getting custom post taxonomy lists
 *
 * @author Maria D. Campbell interglobalmedia@interglobalmedianetwork.com
 * @copyright  Copyright (c) 2021 Maria D. Campbell
 *
 * @package WordPress
 * @subpackage LetsBcoding
 * @link https://www.interglobalmedianetwork.com
 * @since LetsBCoding 2.0.0
 */

/**
 * Get campus_locations custom taxonomy list
 **/
function bcoding_get_the_campus_location_list() {
	// get campus_locations by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'campus_locations' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		//phpcs:disable Generic.Strings.UnnecessaryStringConcat.Found
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_campus_location_list', 'bcoding_get_the_campus_location_list' );

/**
 * Get campus_subjects custom taxonomy list
 **/
function bcoding_get_the_campus_subject_list() {
	// get campus_subjects by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'campus_subjects' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_campus_subject_list', 'bcoding_get_the_campus_subject_list' );

/**
 * Get campus_themes custom taxonomy list
 **/
function bcoding_get_the_campus_theme_list() {
	// get campus_themes by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'campus_themes' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_campus_theme_list', 'bcoding_get_the_campus_theme_list' );

/**
 * Get course_locations custom taxonomy list
 **/
function bcoding_get_the_course_location_list() {
	// get course_locations by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'course_locations' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_course_location_list', 'bcoding_get_the_course_location_list' );

/**
 * Get course_subjects custom taxonomy list
 **/
function bcoding_get_the_course_subject_list() {
	// get course_subjects by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'course_subjects' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_course_subject_list', 'bcoding_get_the_course_subject_list' );

/**
 * Get course_themes custom taxonomy list
 **/
function bcoding_get_the_course_theme_list() {
	// get course_themes by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'course_themes' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_course_theme_list', 'bcoding_get_the_course_theme_list' );

/**
 * Get event_locations custom taxonomy list
 **/
function bcoding_get_the_event_location_list() {
	// get event_locations by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'event_locations' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_event_location_list', 'bcoding_get_the_event_location_list' );

/**
 * Get event_subjects custom taxonomy list
 **/
function bcoding_get_the_event_subject_list() {
	// get event_subjects by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'event_subjects' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_event_subject_list', 'bcoding_get_the_event_subject_list' );

/**
 * Get event_themes custom taxonomy list
 **/
function bcoding_get_the_event_theme_list() {
	// get event_subjects by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'event_themes' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_event_theme_list', 'bcoding_get_the_event_theme_list' );

/**
 * Get professor_collaborations custom taxonomy list
 **/
function bcoding_get_the_professor_collaboration_list() {
	// get professor_collaborations by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'professor_collaborations' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_professor_collaboration_list', 'bcoding_get_the_professor_collaboration_list' );

/**
 * Get professor_locations custom taxonomy list
 **/
function bcoding_get_the_professor_location_list() {
	// get professor_locations by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'professor_locations' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_professor_location_list', 'bcoding_get_the_professor_location_list' );

/**
 * Get professor_subjects custom taxonomy list
 **/
function bcoding_get_the_professor_subject_list() {
	// get professor_subjects by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'professor_subjects' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_professor_subject_list', 'bcoding_get_the_professor_subject_list' );

/**
 * Get professor_themes custom taxonomy list
 **/
function bcoding_get_the_professor_theme_list() {
	// get professor_themes by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'professor_themes' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_professor_theme_list', 'bcoding_get_the_professor_theme_list' );

/**
 * Get professor_workflows custom taxonomy list
 **/
function bcoding_get_the_professor_workflow_list() {
	// get professor_workflows by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'professor_workflows' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_professor_workflow_list', 'bcoding_get_the_professor_workflow_list' );

/**
 * Get program_locations custom taxonomy list
 **/
function bcoding_get_the_program_location_list() {
	// get program_locations by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'program_locations' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_program_location_list', 'bcoding_get_the_program_location_list' );

/**
 * Get program_subjects custom taxonomy list
 **/
function bcoding_get_the_program_subject_list() {
	// get program_subjects by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'program_subjects' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_program_subject_list', 'bcoding_get_the_program_subject_list' );

/**
 * Get program_themes custom taxonomy list
 **/
function bcoding_get_the_program_theme_list() {
	// get program_themes by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'program_themes' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_program_theme_list', 'bcoding_get_the_program_theme_list' );

/**
 * Get student_collaborations custom taxonomy list
 **/
function bcoding_get_the_student_collaboration_list() {
	// get student_collaborations by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'student_collaborations' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_student_collaboration_list', 'bcoding_get_the_student_collaboration_list' );

/**
 * Get student_subjects custom taxonomy list
 **/
function bcoding_get_the_student_subject_list() {
	// get student_subjects by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'student_subjects' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_student_subject_list', 'bcoding_get_the_student_subject_list' );

/**
 * Get student_themes custom taxonomy list
 **/
function bcoding_get_the_student_theme_list() {
	// get student_themes by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'student_themes' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_student_theme_list', 'bcoding_get_the_student_theme_list' );

/**
 * Get student_workflows custom taxonomy list
 **/
function bcoding_get_the_student_workflow_list() {
	// get student_workflows by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'student_workflows' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}

add_filter( 'add_student_workflow_list', 'bcoding_get_the_student_workflow_list' );



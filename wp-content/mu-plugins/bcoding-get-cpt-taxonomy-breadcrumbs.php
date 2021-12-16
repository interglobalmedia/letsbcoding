<?php
/**
 * Document functions
 * Create breadcrumbs for custom post type taxonomies
 *
 * @author Maria D. Campbell interglobalmedia@interglobalmedianetwork.com
 * @copyright  Copyright (c) 2021 Maria D. Campbell
 *
 * @package WordPress
 * @subpackage LetsBcoding
 * @link https://www.interglobalmedianetwork.com
 * @since LetsBCoding 2.0.0
 * @link https://www.interglobalmedianetwork.com
 */

/**
 * Create Breadcrumb functionality for campus_locations
 */
function bcoding_get_campus_location_breadcrumb() {
	if ( has_term( 'campus', 'campus_locations' ) || is_single() ) {
		echo '<a class="campus-locations" href="' . esc_url( site_url( '/campus-location' ) ) . '" rel="nofollow">Campus Locations</a>';
		echo wp_kses_post( '&nbsp;&nbsp;&#187;&nbsp;&nbsp;' );
		bcoding_get_the_campus_location_list();
		if ( is_single() ) {
			echo wp_kses_post( '&nbsp;&nbsp;&#187;&nbsp;&nbsp;' );
		}
	} elseif ( is_page() ) {
		echo esc_html( get_the_title() );
		echo wp_kses_post( '&nbsp;&nbsp;&#187;&nbsp;&nbsp;' );
	} elseif ( is_search() ) {
		echo wp_kses_post( '&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
		echo wp_kses_post( '"<em>' );
		echo esc_html( get_search_query( false ) );
		echo wp_kses_post( '</em>"' );
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_campus_locations_breadcrumb', 'bcoding_get_campus_location_breadcrumb' );

/**
 * Create Breadcrumb functionality for campus_subjects
 */
function bcoding_get_campus_subject_breadcrumb() {
	if ( has_term( 'campus', 'campus_subjects' ) || is_single() ) {
		echo '<a class="campus-subjects" href="' . esc_url( site_url( '/campus-subject' ) ) . '" rel="nofollow">Campus Subjects</a>';
		echo wp_kses_post( '&nbsp;&nbsp;&#187;&nbsp;&nbsp;' );
		bcoding_get_the_campus_subject_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		}
	} elseif ( is_page() ) {
		echo esc_html( get_the_title() );
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
	} elseif ( is_search() ) {
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
		echo wp_kses_post( '"<em>' );
		echo esc_html( get_search_query( false ) );
		echo wp_kses_post( '</em>"' );
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_campus_subject_breadcrumb', 'bcoding_get_campus_subject_breadcrumb' );

/** Create Breadcrumb functionality for campus_themes */
function bcoding_get_campus_theme_breadcrumb() {
	if ( has_term( 'campus', 'campus_themes' ) || is_single() ) {
		echo '<a class="campus-themes" href="' . esc_url( site_url( '/campus-theme' ) ) . '" rel="nofollow">Campus Themes</a>';
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		bcoding_get_the_campus_theme_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
			echo esc_html( get_the_title() );
		}
	} elseif ( is_page() ) {
		echo esc_html( get_the_title() );
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
	} elseif ( is_search() ) {
		echo wp_kses_post( '&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
		echo wp_kses_post( '"<em>' );
		echo esc_html( get_search_query( false ) );
		echo wp_kses_post( '</em>"' );
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_campus_theme_breadcrumb', 'bcoding_get_campus_theme_breadcrumb' );

/** Create Breadcrumb functionality for course_locations */
function bcoding_get_course_location_breadcrumb() {
	if ( has_term( 'course', 'course_locations' ) || is_single() ) {
		echo '<a class="course-locations" href="' . esc_url( site_url( '/course-location' ) ) . '" rel="nofollow">Course Locations</a>';
		echo wp_kses_post( '&nbsp;&nbsp;&#187;&nbsp;&nbsp;' );
		bcoding_get_the_course_location_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		}
	} elseif ( is_page() ) {
		echo esc_html( get_the_title() );
		echo wp_kses_post( '&nbsp;&nbsp;&#187;&nbsp;&nbsp;' );
	} elseif ( is_search() ) {
		echo wp_kses_post( '&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
		echo wp_kses_post( '"<em>' );
		echo esc_html( get_search_query( false ) );
		echo wp_kses_post( '</em>"' );
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_course_location_breadcrumb', 'bcoding_get_course_location_breadcrumb' );

/** Create Breadcrumb functionality for course_subjects */
function bcoding_get_course_subject_breadcrumb() {
	if ( has_term( 'course', 'course_subjects' ) || is_single() ) {
		echo '<a class="course-subjects" href="' . esc_url( site_url( '/course-subject' ) ) . '" rel="nofollow">Course Subjects</a>';
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		bcoding_get_the_course_subject_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		}
	} elseif ( is_page() ) {
		echo esc_html( get_the_title() );
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
	} elseif ( is_search() ) {
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
		echo wp_kses_post( '"<em>' );
		echo esc_html( get_search_query( false ) );
		echo wp_kses_post( '</em>"' );
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_course_subject_breadcrumb', 'bcoding_get_course_subject_breadcrumb' );

/** Create Breadcrumb functionality for course_themes */
function bcoding_get_course_theme_breadcrumb() {
	if ( has_term( 'course', 'course_themes' ) || is_single() ) {
		echo '<a class="course-themes" href="' . esc_url( site_url( '/course-theme' ) ) . '" rel="nofollow">Course Themes</a>';
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		bcoding_get_the_course_theme_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
			echo esc_html( get_the_title() );
		}
	} elseif ( is_page() ) {
		echo esc_html( get_the_title() );
		echo wp_kses_post( 'n&nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
	} elseif ( is_search() ) {
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
		echo wp_kses_post( '"<em>' );
		echo esc_html( get_search_query( false ) );
		echo wp_kses_post( '</em>"' );
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_course_theme_breadcrumb', 'bcoding_get_course_theme_breadcrumb' );

/** Create Breadcrumb functionality for event_locations */
function bcoding_get_event_location_breadcrumb() {
	if ( has_term( 'event', 'event_locations' ) || is_single() ) {
		echo '<a class="event-locations" href="' . esc_url( site_url( '/event-location' ) ) . '" rel="nofollow">Event Locations</a>';
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		bcoding_get_the_event_location_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		}
	} elseif ( is_page() ) {
		echo esc_html( get_the_title() );
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
	} elseif ( is_search() ) {
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
		echo wp_kses_post( '"<em>' );
		echo esc_html( get_search_query( false ) );
		echo wp_kses_post( '</em>"' );
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_event_location_breadcrumb', 'bcoding_get_event_location_breadcrumb' );

/** Create Breadcrumb functionality for event_subjects */
function bcoding_get_event_subject_breadcrumb() {
	if ( has_term( 'event', 'event_subjects' ) || is_single() ) {
		echo '<a class="event-subjects" href="' . esc_url( site_url( '/event-subject' ) ) . '" rel="nofollow">Event Subjects</a>';
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		bcoding_get_the_event_subject_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		}
	} elseif ( is_page() ) {
		echo esc_html( get_the_title() );
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
	} elseif ( is_search() ) {
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
		echo wp_kses_post( '"<em>' );
		echo esc_html( get_search_query( false ) );
		echo wp_kses_post( '</em>"' );
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_event_subject_breadcrumb', 'bcoding_get_event_subject_breadcrumb' );

/** Create Breadcrumb functionality for event_themes */
function bcoding_get_event_theme_breadcrumb() {
	if ( has_term( 'event', 'event_themes' ) || is_single() ) {
		echo '<a class="event-themes" href="' . esc_url( site_url( '/event-theme' ) ) . '" rel="nofollow">Event Themes</a>';
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		bcoding_get_the_event_theme_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
			echo esc_html( get_the_title() );
		}
	} elseif ( is_page() ) {
		echo esc_html( get_the_title() );
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
	} elseif ( is_search() ) {
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
		echo wp_kses_post( '"<em>' );
		echo esc_html( get_search_query( false ) );
		echo wp_kses_post( '</em>"' );
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_event_theme_breadcrumb', 'bcoding_get_event_theme_breadcrumb' );

/** Create Breadcrumb functionality for professor_collaborations */
function bcoding_get_professor_collaboration_breadcrumb() {
	if ( has_term( 'professor', 'professor_collaborations' ) || is_single() ) {
		echo '<a class="professor-collaborations" href="' . esc_url( site_url( '/professor-collaboration' ) ) . '" rel="nofollow">Professor Collaborations</a>';
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		bcoding_get_the_professor_collaboration_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		}
	} elseif ( is_page() ) {
		echo esc_html( get_the_title() );
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
	} elseif ( is_search() ) {
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
		echo wp_kses_post( '"<em>' );
		echo esc_html( get_search_query( false ) );
		echo wp_kses_post( '</em>"' );
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_professor_collaboration_breadcrumb', 'bcoding_get_professor_collaboration_breadcrumb' );

/** Create Breadcrumb functionality for professor_locations */
function bcoding_get_professor_location_breadcrumb() {
	if ( has_term( 'professor', 'professor_locations' ) || is_single() ) {
		echo '<a class="professor-locations" href="' . esc_url( site_url( '/professor-location' ) ) . '" rel="nofollow">Professor Locations</a>';
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		bcoding_get_the_professor_location_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		}
	} elseif ( is_page() ) {
		echo esc_html( get_the_title() );
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
	} elseif ( is_search() ) {
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
		echo wp_kses_post( '"<em>' );
		echo esc_html( get_search_query( false ) );
		echo wp_kses_post( '</em>"' );
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_professor_location_breadcrumb', 'bcoding_get_professor_location_breadcrumb' );

/** Create Breadcrumb functionality for professor_subjects */
function bcoding_get_professor_subject_breadcrumb() {
	if ( has_term( 'professor', 'professor_subjects' ) || is_single() ) {
		echo '<a class="professor-subjects" href="' . esc_url( site_url( '/professor-subject' ) ) . '" rel="nofollow">Professor Subjects</a>';
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		bcoding_get_the_professor_subject_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		}
	} elseif ( is_page() ) {
		echo esc_html( get_the_title() );
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
	} elseif ( is_search() ) {
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
		echo wp_kses_post( '"<em>' );
		echo esc_html( get_search_query( false ) );
		echo wp_kses_post( '</em>"' );
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_professor_subject_breadcrumb', 'bcoding_get_professor_subject_breadcrumb' );

/** Create Breadcrumb functionality for professor_themes */
function bcoding_get_professor_theme_breadcrumb() {
	if ( has_term( 'professor', 'professor_themes' ) || is_single() ) {
		echo '<a class="professor-themes" href="' . esc_url( site_url( '/professor-theme' ) ) . '" rel="nofollow">Professor Themes</a>';
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		bcoding_get_the_professor_theme_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		}
	} elseif ( is_page() ) {
		echo esc_html( get_the_title() );
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
	} elseif ( is_search() ) {
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
		echo wp_kses_post( '"<em>' );
		echo esc_html( get_search_query( false ) );
		echo wp_kses_post( '</em>"' );
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_professor_theme_breadcrumb', 'bcoding_get_professor_theme_breadcrumb' );

/** Create Breadcrumb functionality for professor_workflows */
function bcoding_get_professor_workflow_breadcrumb() {
	if ( has_term( 'professor', 'professor_workflows' ) || is_single() ) {
		echo '<a class="professor-workflows" href="' . esc_url( site_url( '/professor-workflow' ) ) . '" rel="nofollow">Professor Workflows</a>';
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		bcoding_get_the_professor_workflow_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
			echo esc_html( get_the_title() );
		}
	} elseif ( is_page() ) {
		echo esc_html( get_the_title() );
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
	} elseif ( is_search() ) {
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
		echo wp_kses_post( '"<em>' );
		echo esc_html( get_search_query( false ) );
		echo wp_kses_post( '</em>"' );
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_professor_workflow_breadcrumb', 'bcoding_get_professor_workflow_breadcrumb' );

/** Create Breadcrumb functionality for program_locations */
function bcoding_get_program_location_breadcrumb() {
	if ( has_term( 'program', 'program_locations' ) || is_single() ) {
		echo '<a class="program-locations" href="' . esc_url( site_url( '/program-location' ) ) . '" rel="nofollow">Program Locations</a>';
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		bcoding_get_the_program_location_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		} elseif ( is_page() ) {
			echo esc_html( get_the_title() );
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		} elseif ( is_search() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
			echo wp_kses_post( '"<em>' );
			echo esc_html( get_search_query( false ) );
			echo wp_kses_post( '</em>"' );
		}
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_program_location_breadcrumb', 'bcoding_get_program_location_breadcrumb' );

/** Create Breadcrumb functionality for program_subjects */
function bcoding_get_program_subject_breadcrumb() {
	if ( has_term( 'program', 'program_subjects' ) || is_single() ) {
		echo '<a class="program-subjects" href="' . esc_url( site_url( '/program-subject' ) ) . '" rel="nofollow">Program Subjects</a>';
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		bcoding_get_the_program_subject_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		} elseif ( is_page() ) {
			echo esc_html( get_the_title() );
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		} elseif ( is_search() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
			echo wp_kses_post( '"<em>' );
			echo esc_html( get_search_query( false ) );
			echo wp_kses_post( '</em>"' );
		}
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_program_subject_breadcrumb', 'bcoding_get_program_subject_breadcrumb' );

/** Create Breadcrumb functionality for program_themes */
function bcoding_get_program_theme_breadcrumb() {
	if ( has_term( 'program', 'program_themes' ) || is_single() ) {
		echo '<a class="program-themes" href="' . esc_url( site_url( '/program-theme' ) ) . '" rel="nofollow">Program Themes</a>';
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		bcoding_get_the_program_theme_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
			echo esc_html( get_the_title() );
		}
	} elseif ( is_page() ) {
		echo esc_html( get_the_title() );
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
	} elseif ( is_search() ) {
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
		echo wp_kses_post( '"<em>' );
		echo esc_html( get_search_query( false ) );
		echo wp_kses_post( '</em>"' );
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_program_theme_breadcrumb', 'bcoding_get_program_theme_breadcrumb' );

/** Create Breadcrumb functionality for student_collaborations */
function bcoding_get_student_collaboration_breadcrumb() {
	if ( has_term( 'student', 'student_collaborations' ) || is_single() ) {
		echo '<a class="student-collaborations" href="' . esc_url( site_url( '/student-collaboration' ) ) . '" rel="nofollow">Student Collaborations</a>';
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		bcoding_get_the_student_collaboration_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		}
	} elseif ( is_page() ) {
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		echo esc_html( get_the_title() );
	} elseif ( is_search() ) {
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
		echo wp_kses_post( '"<em>' );
		echo esc_html( get_search_query( false ) );
		echo wp_kses_post( '</em>"' );
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_student_collaboration_breadcrumb', 'bcoding_get_student_collaboration_breadcrumb' );

/** Create Breadcrumb functionality for student_subjects */
function bcoding_get_student_subject_breadcrumb() {
	if ( has_term( 'student', 'student_subjects' ) || is_single() ) {
		echo '<a class="student-subjects" href="' . esc_url( site_url( '/student-subject' ) ) . '" rel="nofollow">Student Subjects</a>';
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		bcoding_get_the_student_subject_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		}
	} elseif ( is_page() ) {
		echo esc_html( get_the_title() );
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
	} elseif ( is_search() ) {
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
		echo wp_kses_post( '"<em>' );
		echo esc_html( get_search_query( false ) );
		echo wp_kses_post( '</em>"' );
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_student_subject_breadcrumb', 'bcoding_get_student_subject_breadcrumb' );

/** Create Breadcrumb functionality for student_themes */
function bcoding_get_student_theme_breadcrumb() {
	if ( has_term( 'student', 'student_themes' ) || is_single() ) {
		echo '<a class="student-themes" href="' . esc_url( site_url( '/student-theme' ) ) . '" rel="nofollow">Student Themes</a>';
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		bcoding_get_the_student_theme_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		}
	} elseif ( is_page() ) {
		echo esc_html( get_the_title() );
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
	} elseif ( is_search() ) {
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
		echo wp_kses_post( '"<em>' );
		echo esc_html( get_search_query( false ) );
		echo wp_kses_post( '</em>"' );
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_student_theme_breadcrumb', 'bcoding_get_student_theme_breadcrumb' );

/** Create Breadcrumb functionality for student_workflows */
function bcoding_get_student_workflow_breadcrumb() {
	if ( has_term( 'student', 'student_workflows' ) || is_single() ) {
		echo '<a class="student-workflows" href="' . esc_url( site_url( '/student-workflow' ) ) . '" rel="nofollow">Student Workflows</a>';
		echo wp_kses_post( '&nbsp;&nbsp;&#187;&nbsp;&nbsp;' );
		bcoding_get_the_student_workflow_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
			echo esc_html( get_the_title() );
		}
	} elseif ( is_page() ) {
		echo esc_html( get_the_title() );
		echo wp_kses_post( '&nbsp;&nbsp;&#187;&nbsp;&nbsp;' );
	} elseif ( is_search() ) {
		echo wp_kses_post( '&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ' );
		echo wp_kses_post( '"<em>' );
		echo esc_html( get_search_query( false ) );
		echo wp_kses_post( '</em>"' );
	} else {
		echo esc_html( '' );
	}
}

add_filter( 'add_student_workflow_breadcrumb', 'bcoding_get_student_workflow_breadcrumb' );

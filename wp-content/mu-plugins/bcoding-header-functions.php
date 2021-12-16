<?php
/**
 * Document functions
 * Helper functions used in the main header for conditionally highlighting header navigation links
 *
 * @author Maria D. Campbell interglobalmedia@interglobalmedianetwork.com
 * @copyright  Copyright (c) 2021 Maria D. Campbell
 *
 * @package WordPress
 * @subpackage LetsBCoding
 * @link https://www.interglobalmedianetwork.com
 * @since LetsBCoding 2.0.0
 */

/**
 * Function for conditionally highlighting about us navigation link
 */
function bcoding_set_current_menu_item_about_us_page() {
	if ( is_page( 11, 'about-us', 'About Us' ) || wp_get_post_parent_id( 0 ) === 11 ) {
			echo 'class="current-menu-item"';
	} else {
		echo '';
	}
}
/**
 * Function for conditionally highlighting programs sub-navigation link
 */
function bcoding_set_current_menu_item_program() {
	if ( get_post_type() === 'program' || is_page( 'program-location' ) || is_page( 'program-subject' ) || is_page( 'program-theme' ) ) {
		echo 'class="current-menu-item"';
	} else {
		echo '';
	}
}
/**
 * Function for conditionally highlighting courses sub-navigation link
 */
function bcoding_set_current_menu_item_course() {
	if ( get_post_type() === 'course' || is_page( 'course-location' ) || is_page( 'course-subject' ) || is_page( 'course-theme' ) ) {
		echo 'class="current-menu-item"';
	} else {
		echo '';
	}
}
/**
 * Function for conditionally highlighting professors sub-navigation link
 */
function bcoding_set_current_menu_item_professor() {
	if ( get_post_type() === 'professor' ) {
		echo 'class="current-menu-item"';
	} else {
		echo '';
	}
}
/**
 * Function for conditionally highlighting students sub-navigation link
 */
function bcoding_set_current_menu_item_student() {
	if ( get_post_type() === 'student' ) {
		echo 'class="current-menu-item"';
	} else {
		echo '';
	}
}
/**
 * Function for conditionally highlighting events navigation link
 */
function bcoding_set_current_menu_item_event() {
	if ( get_post_type() === 'event' || is_page( 'past-events' ) || is_page( 'event-location' ) || is_page( 'event-subject' ) || is_page( 'event-theme' ) ) {
		echo 'class="current-menu-item"';
	} else {
		echo '';
	}
}
/**
 * Function for conditionally highlighting campuses navigation link
 */
function bcoding_set_current_menu_item_campus() {
	if ( get_post_type() === 'campus' ) {
		echo 'class="current-menu-item"';
	} else {
		echo '';
	}
}
/**
 * Function for conditionally highlighting blog navigation link
 */
function bcoding_set_current_menu_item_blog() {
	if ( get_post_type() === 'post' || wp_get_post_parent_id( 0 ) === 37 || is_page( 'categories' ) || is_page( 'tags' ) ) {
		echo 'class="current-menu-item"';
	} else {
		echo '';
	}
}

add_filter( 'add_current_menu_item_class', 'bcoding_set_current_menu_item_about_us_page' );



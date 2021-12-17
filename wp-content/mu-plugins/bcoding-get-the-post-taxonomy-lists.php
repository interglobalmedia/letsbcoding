<?php
/**
 * Document functions
 * Helper functions used in post taxonomy breadcrumb functions for getting post taxonomy lists
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
 * Get post category taxonomy list
 **/
function bcoding_get_the_cat_list() {
	// get categories by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'category' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		// phpcs:disable Generic.Strings.UnnecessaryStringConcat.Found
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}
add_filter( 'add_cat_list', 'bcoding_get_the_cat_list' );

/**
 * Get post tag taxonomy list
 **/
function bcoding_get_the_tag_list() {
	// get tags by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'post_tag' );

	foreach ( $terms as $term ) {
		// The $term is an object, so we don't need to specify the $taxonomy. !
		$term_link = get_term_link( $term );
		// If there was an error, continue to the next term. !
		if ( is_wp_error( $term_link ) ) {
			continue;
		}
		// phpcs:disable Generic.Strings.UnnecessaryStringConcat.Found
		echo wp_kses_post( '' . '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>' );
	}
}
add_filter( 'add_tag_list', 'bcoding_get_the_tag_list' );

/**
 * Get student_workflows custom taxonomy list
 **/
function bcoding_get_the_post_genre_list() {
	// get student_workflows by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'genre' );

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

add_filter( 'add_post_genre_list', 'bcoding_get_the_post_genre_list' );

/**
 * Get student_workflows custom taxonomy list
 **/
function bcoding_get_the_post_label_list() {
	// get student_workflows by post ID !
	$post_ID = get_the_ID();
	// here, you can add any custom tag !
	$terms = get_the_terms( $post_ID, 'label' );

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

add_filter( 'add_post_label_list', 'bcoding_get_the_post_label_list' );



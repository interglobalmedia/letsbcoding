<?php
/**
 * Document functions
 * Create breadcrumbs for post type taxonomies
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
 * Create Breadcrumb functionality for categories
 **/
function bcoding_get_cat_breadcrumb() {
	global $post;
	if ( is_category() || is_single() ) {
		echo '<a class="post-cats" href="' . esc_url( site_url( '/categories' ) ) . '" rel="nofollow">Categories</a>';
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		bcoding_get_the_cat_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
			echo esc_html( get_the_title() );
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

add_action( 'add_cat_breadcrumb', 'bcoding_get_cat_breadcrumb' );

/**
 * Create Breadcrumb functionality for tags
 **/
function bcoding_get_tag_breadcrumb() {
	if ( is_tag() || is_single() ) {
		echo '<a class="post-tags" href="' . esc_url( site_url( '/tags' ) ) . '" rel="nofollow">Tags</a>';
		echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
		bcoding_get_the_tag_list();
		if ( is_single() ) {
			echo wp_kses_post( ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ' );
			echo esc_html( get_the_title() );
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

add_filter( 'add_tag_breadcrumb', 'bcoding_get_tag_breadcrumb' );



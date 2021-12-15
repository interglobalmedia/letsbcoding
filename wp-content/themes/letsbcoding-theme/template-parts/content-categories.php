<?php
/**
 * Template part for displaying all category links in page-categories.php in the LetsBCoding Theme.
 *
 * @author Maria D. Campbell interglobalmedia@interglobalmedianetwork.com
 * @copyright  Copyright (c) 2021 Maria D. Campbell
 *
 * @package WordPress
 * @subpackage LetsBcoding
 * @link https://www.interglobalmedianetwork.com
 * @since LetsBCoding 2.0.0
 */

?>
<?php
	$categories = get_categories(
		array(
			'child_of'            => 0,
			'current_category'    => 0,
			'depth'               => 0,
			'echo'                => 0,
			'exclude'             => '',
			'exclude_tree'        => '',
			'feed'                => '',
			'feed_image'          => '',
			'feed_type'           => '',
			'hide_empty'          => 0,
			'hide_title_if_empty' => false,
			'hierarchical'        => true,
			'order'               => '',
			'orderby'             => 'hierarchical',
			'separator'           => '<br />',
			'show_count'          => 0,
			'show_option_all'     => '',
			'show_option_none'    => __( 'No categories', 'my-plugin' ),
			'style'               => 'list',
			'taxonomy'            => 'category',
			'title_li'            => __( 'Categories', 'my-plugin' ),
			'use_desc_for_title'  => 1,
		)
	);

	wp_list_categories( $categories );


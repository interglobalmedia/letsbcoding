<?php
/**
 * Template part for displaying tag cloud in page-tags.php in the LetsBCoding Theme.
 *
 * @author Maria D. Campbell interglobalmedia@interglobalmedianetwork.com
 * @copyright Copyright (c) 2021 Maria D. Campbell
 *
 * @package WordPress
 * @subpackage LetsBCoding
 * @link https://www.interglobalmedianetwork.com
 * @since LetsBCoding 2.0.0
 */

?>

<ul class="tag-cloud">
		<li class="tag">
		<?php
			$tags = get_tags(
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
					'show_count'          => 1,
					'show_option_all'     => '',
					'show_option_none'    => __( 'No categories', 'my-plugin' ),
					'style'               => 'list',
					'taxonomy'            => 'category',
					'title_li'            => __( 'Categories', 'my-plugin' ),
					'use_desc_for_title'  => 1,
				),
				wp_tag_cloud(
					array(
						'smallest' => 12, // size of least used tag !
						'largest'  => 32, // size of most used tag !
						'unit'     => 'px', // unit for sizing the tags !
						'number'   => 45, // displays all tags !
						'orderby'  => 'name', // order tags alphabetically !
						'order'    => 'ASC', // order tags by ascending order !
						'taxonomy' => 'post_tag', // you can even make tags for custom taxonomies !
					)
				)
			);
			?>
		</li>
	</ul>

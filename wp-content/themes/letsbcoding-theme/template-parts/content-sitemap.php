<?php
/**
 * Template part for displaying sitemap content in the LetsBCoding Theme in page-sitemap.php.
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

<div class="sitemap-authors-div">
<h3>Authors</h3>
	<ul class="sitemap-authors-list">
	<?php
	wp_list_authors(
		array(
			'exclude_admin' => false,
			'show_fullname' => true,
		)
	);
	?>
	</ul>
</div>
<div class="sitemap-pages-div">
<h3>Pages</h3>
	<ul class="sitemap-pages-list">
	<?php
	// Add pages you'd like to exclude in the exclude here !
	wp_list_pages(
		array(
			'exclude'  => '843, 854, 868, 1035, 1339', // enter the ID or comma-separated list of page IDs to exclude !
			'title_li' => '',
		)
	);
	?>
	</ul>
</div>

<div class="sitemap-posts-div">
<h3>Posts</h3>
	<ul class="sitemap-posts-list">
	<?php
	$bcoding_posts_array = get_posts( $bcoding_posts_by_slug );
	echo '<ul>';
	foreach ( $bcoding_posts_array as $bcoding_post ) {
		echo '<li><a href="' . esc_attr( get_permalink( $bcoding_post ) ) . '">' . esc_html( get_the_title( $bcoding_post ) ) . '</a></li>';
	}
	echo '</ul>';
	echo '</li>';
	?>
	</ul>
</div>

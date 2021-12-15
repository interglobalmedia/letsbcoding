<?php
/**
 * Default WordPress Search page template for the LetsBCoding Theme.
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

<?php
get_header();
page_banner(
	array(
		'title'    => 'Search results',
		'subtitle' => 'You searched for &ldquo;' . esc_html( get_search_query( false ) ) . '&rdquo;',
	)
);
?>

<div class="container container--narrow page-section">
<?php

	get_search_form();

	$search_h3_class_headline_search_results = '<h3 class="headline headline--small-plus">No results match that search.</h3>';

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		get_template_part( 'template-parts/content', get_post_type() );
	}
	echo wp_kses_post( paginate_links() );
} else {
	echo wp_kses(
		$search_h3_class_headline_search_results,
		array(
			'h3' => array(
				'class' => array(),
			),
		)
	);
}

?>
</div>

<?php get_footer(); ?>

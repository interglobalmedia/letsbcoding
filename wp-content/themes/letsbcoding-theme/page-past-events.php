<?php
/**
 * Past events page template for the LetsBCoding Theme.
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
		'title'    => 'Past Events',
		'subtitle' => 'Archive of our past events',
	)
);
?>

<div class="container container--narrow page-section">
<?php
	//phpcs:disable WordPress.DateTime.RestrictedFunctions.date_date
	$today       = date( 'Ymd' );
	$past_events = new WP_Query(
		array(
			'paged'      => get_query_var( 'paged', 1 ),
			'post_type'  => 'event',
			//phpcs:disable WordPress.DB.SlowDBQuery.slow_db_query_meta_key
			'meta_key'   => 'event_date',
			'orderby'    => 'meta_value_num',
			'order'      => 'ASC',
			// phpcs:disable WordPress.DB.SlowDBQuery.slow_db_query_meta_query
			'meta_query' => array(
				array(
					'key'     => 'event_date',
					'compare' => '<=',
					'value'   => $today,
					'type'    => 'numeric',
				),
			),
		)
	);

	while ( $past_events->have_posts() ) {
		$past_events->the_post();
		get_template_part( 'template-parts/content', 'event' );
	}
	echo wp_kses_post(
		paginate_links(
			array(
				'total' => $past_events->max_num_pages,
			)
		)
	);
	?>
</div>

<?php get_footer(); ?>

<?php
/**
 * Taxonomy page template for the professor custom post type professor_locations custom taxonomy for the LetsBCoding Theme.
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
		'title'    => 'All Professor Locations',
		'subtitle' => 'A location cloud of all professor locations',
	)
);
?>

	<div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
			<p><a class="metabox__blog-home-link" href="<?php echo esc_url( site_url( '/professors' ) ); ?>"><i class="fa fa-home" aria-hidden="true"></i> Professors Home</a>
		</div>
		<ul class="location-tag-cloud">
			<?php

			// Get the taxonomy's terms !
			$prof_location_terms = get_terms(
				array(
					'taxonomy'   => 'professor_locations',
					'hide_empty' => false,
				)
			);

			// Check if any term exists !
			if ( ! empty( $prof_location_terms ) && is_array( $prof_location_terms ) ) {
				// Run a loop and print them all !
				foreach ( $prof_location_terms as $prof_location_term ) {
					?>
					<li class="location-tag">
					<a href="<?php echo esc_url( get_term_link( $prof_location_term ) ); ?>">
						<?php echo esc_html( $prof_location_term->name ); ?>
					</a></li>
					<?php
				}
			}
			?>
		</ul>
	</div>

<?php get_footer(); ?>

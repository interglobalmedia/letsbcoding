<?php
/**
 * Taxonomy page template for the event custom post type event_subjects custom taxonomy for the LetsBCoding Theme.
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
		'title'    => 'All Event Subjects',
		'subtitle' => 'A subject cloud of all event subjects',
	)
);
?>

	<div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
			<p><a class="metabox__blog-home-link" href="<?php echo esc_url( site_url( '/events' ) ); ?>"><i class="fa fa-home" aria-hidden="true"></i> Events Home</a>
		</div>
		<ul class="subject-tag-cloud">
			<?php

			// Get the taxonomy's terms !
			$event_subject_terms = get_terms(
				array(
					'taxonomy'   => 'event_subjects',
					'hide_empty' => false,
				)
			);

			// Check if any term exists !
			if ( ! empty( $event_subject_terms ) && is_array( $event_subject_terms ) ) {
				// Run a loop and print them all !
				foreach ( $event_subject_terms as $event_subject_term ) {
					?>
					<li class="subject-tag">
					<a href="<?php echo esc_url( get_term_link( $event_subject_term ) ); ?>">
						<?php echo esc_html( $event_subject_term->name ); ?>
					</a></li>
					<?php
				}
			}
			?>
		</ul>
	</div>

<?php get_footer(); ?>

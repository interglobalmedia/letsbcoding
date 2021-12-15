<?php
/**
 * Taxonomy page template for the campus custom post type campus_subject custom taxonomy for the LetsBCoding Theme.
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
		'title'    => 'All Campus Subjects',
		'subtitle' => 'A subject cloud of all campus subjects',
	)
);
?>

	<div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
			<p><a class="metabox__blog-home-link" href="<?php echo esc_url( site_url( '/campuses' ) ); ?>"><i class="fa fa-home" aria-hidden="true"></i> Campuses Home</a>
		</div>
		<ul class="subject-tag-cloud">
			<?php

			// Get the taxonomy's terms !
			$campus_subject_terms = get_terms(
				array(
					'taxonomy'   => 'campus_subjects',
					'hide_empty' => false,
				)
			);

			// Check if any term exists !
			if ( ! empty( $campus_subject_terms ) && is_array( $campus_subject_terms ) ) {
				// Run a loop and print them all !
				foreach ( $campus_subject_terms as $campus_subject_term ) {
					?>
					<li class="subject-tag">
					<a href="<?php echo esc_url( get_term_link( $campus_subject_term ) ); ?>">
						<?php echo esc_html( $campus_subject_term->name ); ?>
					</a></li>
					<?php
				}
			}
			?>
		</ul>
	</div>

<?php get_footer(); ?>

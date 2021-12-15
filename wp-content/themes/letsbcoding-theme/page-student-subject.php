<?php
/**
 * Taxonomy page template for the student custom post type student_subjects custom taxonomy for the LetsBCoding Theme.
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
		'title'    => 'All Student Subjects',
		'subtitle' => 'A subject cloud of all student subjects',
	)
);
?>

	<div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
			<p><a class="metabox__blog-home-link" href="<?php echo esc_url( site_url( '/students' ) ); ?>"><i class="fa fa-home" aria-hidden="true"></i> Students Home</a>
		</div>
		<ul class="subject-tag-cloud">
			<?php

			// Get the taxonomy's terms !
			$student_subject_terms = get_terms(
				array(
					'taxonomy'   => 'student_subjects',
					'hide_empty' => false,
				)
			);

			// Check if any term exists !
			if ( ! empty( $student_subject_terms ) && is_array( $student_subject_terms ) ) {
				// Run a loop and print them all !
				foreach ( $student_subject_terms as $student_subject_term ) {
					?>
					<li class="subject-tag">
					<a href="<?php echo esc_url( get_term_link( $student_subject_term ) ); ?>">
						<?php echo esc_html( $student_subject_term->name ); ?>
					</a></li>
					<?php
				}
			}
			?>
		</ul>
	</div>

<?php get_footer(); ?>

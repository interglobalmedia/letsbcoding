<?php
/**
 * Taxonomy page template for the student custom post type student_collaborations custom taxonomy for the LetsBCoding Theme.
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
		'title'    => 'All Student Collaborations',
		'subtitle' => 'A collaboration cloud of all student collaborations',
	)
);
?>

	<div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
			<p><a class="metabox__blog-home-link" href="<?php echo esc_url( site_url( '/students' ) ); ?>"><i class="fa fa-home" aria-hidden="true"></i> Students Home</a>
		</div>
		<ul class="collaboration-tag-cloud">
			<?php

			// Get the taxonomy's terms !
			$student_collaboration_terms = get_terms(
				array(
					'taxonomy'   => 'student_collaborations',
					'hide_empty' => false,
				)
			);

			// Check if any term exists !
			if ( ! empty( $student_collaboration_terms ) && is_array( $student_collaboration_terms ) ) {
				// Run a loop and print them all !
				foreach ( $student_collaboration_terms as $student_collaboration_term ) {
					?>
					<li class="collaboration-tag">
					<a href="<?php echo esc_url( get_term_link( $student_collaboration_term ) ); ?>">
						<?php echo esc_html( $student_collaboration_term->name ); ?>
					</a></li>
					<?php
				}
			}
			?>
		</ul>
	</div>

<?php get_footer(); ?>

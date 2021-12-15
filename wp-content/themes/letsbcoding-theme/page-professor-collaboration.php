<?php
/**
 * Taxonomy page template for the professor custom post type professor_collaborations custom taxonomy for the LetsBCoding Theme.
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
		'title'    => 'All Professor Collaborations',
		'subtitle' => 'A collaboration cloud of all professor collaborations',
	)
);
?>

	<div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
			<p><a class="metabox__blog-home-link" href="<?php echo esc_url( site_url( '/professors' ) ); ?>"><i class="fa fa-home" aria-hidden="true"></i> Professors Home</a>
		</div>
		<ul class="collaboration-tag-cloud">
			<?php

			// Get the taxonomy's terms !
			$prof_collaboration_terms = get_terms(
				array(
					'taxonomy'   => 'professor_collaborations',
					'hide_empty' => false,
				)
			);

			// Check if any term exists !
			if ( ! empty( $prof_collaboration_terms ) && is_array( $prof_colaboration_terms ) ) {
				// Run a loop and print them all !
				foreach ( $prof_collaboration_terms as $prof_collaboration_term ) {
					?>
					<li class="collaboration-tag">
					<a href="<?php echo esc_url( get_term_link( $prof_collaboration_term ) ); ?>">
						<?php echo esc_html( $prof_collaboration_term->name ); ?>
					</a></li>
					<?php
				}
			}
			?>
		</ul>
	</div>

<?php get_footer(); ?>

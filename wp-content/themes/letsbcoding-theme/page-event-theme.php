<?php
/**
 * Taxonomy page template for the event custom post type event_themes custom taxonomy for the LetsBCoding Theme.
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
		'title'    => 'All Event Themes',
		'subtitle' => 'A theme cloud of all event themes',
	)
);
?>

	<div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
			<p><a class="metabox__blog-home-link" href="<?php echo esc_url( site_url( '/events' ) ); ?>"><i class="fa fa-home" aria-hidden="true"></i> Events Home</a>
		</div>
		<ul class="theme-tag-cloud">
			<?php

			// Get the taxonomy's terms !
			$event_theme_terms = get_terms(
				array(
					'taxonomy'   => 'event_themes',
					'hide_empty' => false,
				)
			);

			// Check if any term exists !
			if ( ! empty( $event_theme_terms ) && is_array( $event_theme_terms ) ) {
				// Run a loop and print them all !
				foreach ( $event_theme_terms as $event_theme_term ) {
					?>
					<li class="theme-tag">
					<a href="<?php echo esc_url( get_term_link( $event_theme_term ) ); ?>">
						<?php echo esc_html( $event_theme_term->name ); ?>
					</a></li>
					<?php
				}
			}
			?>
		</ul>
	</div>

<?php get_footer(); ?>

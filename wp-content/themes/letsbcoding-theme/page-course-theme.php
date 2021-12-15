<?php
/**
 * Taxonomy page template for the course custom post type course_themes custom taxonomy for the LetsBCoding Theme.
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
		'title'    => 'All Course Themes',
		'subtitle' => 'A theme cloud of all course themes',
	)
);
?>

<div class="container container--narrow page-section">
	<div class="metabox metabox--position-up metabox--with-home-link">
		<p><a class="metabox__blog-home-link" href="<?php echo esc_url( site_url( '/courses' ) ); ?>"><i class="fa fa-home" aria-hidden="true"></i> Courses Home</a>
	</div>
	<ul class="theme-tag-cloud">
		<?php

		// Get the taxonomy's terms !
		$course_theme_terms = get_terms(
			array(
				'taxonomy'   => 'course_themes',
				'hide_empty' => false,
			)
		);

		// Check if any term exists !
		if ( ! empty( $course_theme_terms ) && is_array( $course_theme_terms ) ) {
			// Run a loop and print them all !
			foreach ( $course_theme_terms as $course_theme_term ) {
				?>
			<li class="theme-tag">
				<a href="<?php echo esc_url( get_term_link( $course_theme_term ) ); ?>">
					<?php echo esc_html( $course_theme_term->name ); ?>
				</a></li>
				<?php
			}
		}
		?>
	</ul>
</div>

<?php get_footer(); ?>

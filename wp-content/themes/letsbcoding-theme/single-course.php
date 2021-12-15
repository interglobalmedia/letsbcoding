<?php
/**
 * Single course template for course custom post type for the LetsBCoding Theme.
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
while ( have_posts() ) {
	the_post();
	page_banner();

	?>

<div class="container container--narrow page-section">

	<div class="metabox metabox--position-up metabox--with-home-link">
		<div class="course-metabox-wrapper"><a class="metabox__courses-home-link" href="<?php echo esc_url( get_post_type_archive_link( 'course' ) ); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Courses</a><div class="metabox__course__main"><?php echo esc_html( get_the_title() ); ?> in <strong class="in-program">
		<?php
			$related_programs = get_field( 'related_programs' );

		if ( $related_programs ) {
			foreach ( $related_programs as $related_program ) {
				?>
			<a href="<?php echo esc_url( get_the_permalink( $related_program ) ); ?>"><?php echo esc_html( get_the_title( $related_program ) ); ?></a>
				<?php
			}
		}
		?>
		</strong></div></div>
	</div>
	<div class="generic-content">
		<div class="breadcrumb-wrapper">
			<span class="course-subject-breadcrumb"><?php bcoding_get_course_location_breadcrumb(); ?></span>
			<span class="course-subject-breadcrumb"><?php bcoding_get_course_subject_breadcrumb(); ?></span>
			<span class="course-theme-breadcrumb"><?php bcoding_get_course_theme_breadcrumb(); ?></span>
		</div>
		<?php
			echo wp_kses_post( apply_filters( 'the_content', get_the_content() ) );
		?>
	</div>
</div>

<?php }

get_footer();

?>

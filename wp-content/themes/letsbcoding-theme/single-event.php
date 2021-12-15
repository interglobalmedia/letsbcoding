<?php
/**
 * Single event template for event custom post type for the LetsBCoding Theme.
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
			<p><a class="metabox__blog-home-link" href="<?php echo esc_url( get_post_type_archive_link( 'event' ) ); ?>"><i class="fa fa-home" aria-hidden="true"></i> Events Home</a> <span class="metabox__main"><?php echo esc_html( get_the_title() ); ?></span></p>
		</div>

		<div class="generic-content">
			<div class="breadcrumb-wrapper">
				<span class="event-location-breadcrumb"><?php bcoding_get_event_location_breadcrumb(); ?></span>
				<span class="event-subject-breadcrumb"><?php bcoding_get_event_subject_breadcrumb(); ?></span>
				<span class="event-theme-breadcrumb"><?php bcoding_get_event_theme_breadcrumb(); ?></span>
			</div>
			<?php
			echo wp_kses_post( apply_filters( 'the_content', get_the_content() ) );
			?>

			<?php

			$related_programs = get_field( 'related_programs' );

			$single_event_hr_class_section_break     = '<hr class="section-break">';
			$single_program_h3_class_headline_events = '<h3 class="headline headline--medium">Related Program(s)</h3>';

			$single_event_ul_class_link_list = '<ul class="link-list min-list">';
			$single_event_ul_closing_tag     = '</ul>';

			if ( $related_programs ) {
				echo wp_kses(
					$single_event_hr_class_section_break,
					array(
						'hr' => array(
							'class' => array(),
						),
					)
				);
				echo wp_kses(
					$single_program_h3_class_headline_events,
					array(
						'h3' => array(
							'class' => array(),
						),
					)
				);
				echo wp_kses(
					$single_event_ul_class_link_list,
					array(
						'ul' => array(
							'class' => array(),
						),
					)
				);
				foreach ( $related_programs as $related_program ) {
					?>
					<li><a href="<?php echo esc_url( get_the_permalink( $related_program ) ); ?>"><?php echo esc_html( get_the_title( $related_program ) ); ?></a></li>
					<?php
				}
				echo wp_kses(
					$single_event_ul_closing_tag,
					array(
						'ul' => array(),
					)
				);
			}
			?>

		</div>
	</div>
<?php }

get_footer();

?>

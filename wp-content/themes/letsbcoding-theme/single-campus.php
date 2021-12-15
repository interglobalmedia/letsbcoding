<?php
/**
 * Single campus template for campus custom post type for the LetsBCoding Theme.
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
			<p><a class="metabox__blog-home-link" href="<?php echo esc_url( get_post_type_archive_link( 'campus' ) ); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Campuses</a> <span class="metabox__main"><?php echo esc_html( get_the_title() ); ?></span></p>
		</div>

		<div class="generic-content">
			<div class="breadcrumb-wrapper">
				<span class="campus-subject-breadcrumb"><?php bcoding_get_campus_location_breadcrumb(); ?></span>
				<span class="campus-subject-breadcrumb"><?php bcoding_get_campus_subject_breadcrumb(); ?></span>
				<span class="campus-theme-breadcrumb"><?php bcoding_get_campus_theme_breadcrumb(); ?></span>
			</div>
			<?php
			echo wp_kses_post( apply_filters( 'the_content', get_the_content() ) );
			?>
		</div>

		<?php
			$map_location = get_field( 'map_location' );
		?>

		<div class="acf-map">
			<div class="marker" data-lat="<?php echo esc_attr( $map_location['lat'] ); ?>" data-lng="<?php echo esc_attr( $map_location['lng'] ); ?>">
			<h3><?php echo esc_html( get_the_title() ); ?></h3>
			<?php echo esc_html( $map_location['address'] ); ?>
			</div>
		</div>
	<?php
		$related_programs = new WP_Query(
			array(
				'posts_per_page' => -1,
				'post_type'      => 'program',
				'orderby'        => 'title',
				'order'          => 'ASC',
				// phpcs:disable WordPress.DB.SlowDBQuery.slow_db_query_meta_query
				'meta_query'     => array(
					array(
						'key'     => 'related_campus',
						'compare' => 'LIKE',
						'value'   => '"' . get_the_ID() . '"',
					),
				),
			)
		);

		$single_campus_class_program_container_div = '<div class="program-container program-container--narrow>';
		$single_campus_div_closing_tag             = '</div>';

		$single_campus_hr_class_section_break = '<hr class="section-break">';

		$single_campus_h3_class_headline_programs = '<h3 class="headline headline--medium">Programs Available At This Campus</h3>';

		$single_campus_ul_class_link_list = '<ul class="min-list link-list">';
		$single_campus_ul_closing_tag     = '</ul>';

	if ( $related_programs->have_posts() ) {
		echo wp_kses(
			$single_campus_class_program_container_div,
			array(
				'div' => array(
					'class' => array(),
				),
			)
		);
		echo wp_kses(
			$single_campus_hr_class_section_break,
			array(
				'hr' => array(
					'class' => array(),
				),
			)
		);


		echo wp_kses(
			$single_campus_h3_class_headline_programs,
			array(
				'h3' => array(
					'class' => array(),
				),
			)
		);

		echo wp_kses(
			$single_campus_ul_class_link_list,
			array(
				'ul' => array(
					'class' => array(),
				),
			)
		);

		while ( $related_programs->have_posts() ) {
			$related_programs->the_post();
			?>
				<li>
					<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
				</li>
				<?php
		}

		echo wp_kses(
			$single_campus_ul_closing_tag,
			array(
				'ul' => array(),
			)
		);

		echo wp_kses(
			$single_campus_div_closing_tag,
			array(
				'div' => array(),
			)
		);
	}

	wp_reset_postdata();

	?>

	</div>

</div>

<?php }

get_footer();

?>

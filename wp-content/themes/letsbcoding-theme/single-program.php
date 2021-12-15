<?php
/**
 * Single program template for program custom post type for the LetsBCoding Theme.
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
			<div class="program-metabox-wrapper"><a class="metabox__programs-home-link" href="<?php echo esc_url( get_post_type_archive_link( 'program' ) ); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Programs</a> <div class="metabox__program__main"><?php echo esc_html( get_the_title() ); ?>
			</div>
		</div>
	</div>
	<div class="generic-content">
		<div class="breadcrumb-wrapper">
			<span class="program-location-breadcrumb">
			<?php bcoding_get_program_location_breadcrumb(); ?></span>
			<span class="program-subject-breadcrumb"><?php bcoding_get_program_subject_breadcrumb(); ?></span>
			<span class="program-theme-breadcrumb"><?php bcoding_get_program_theme_breadcrumb(); ?></span>
		</div>
		<?php
			echo wp_kses_post( apply_filters( 'the_content', get_the_content() ) );
		?>
	</div>

	<?php
	$related_courses                              = new WP_Query(
		array(
			'posts_per_page' => -1,
			'post_type'      => 'course',
			'orderby'        => 'title',
			'order'          => 'ASC',
			// phpcs:disable WordPress.DB.SlowDBQuery.slow_db_query_meta_query
			'meta_query'     => array(
				array(
					'key'     => 'related_programs',
					'compare' => 'LIKE',
					'value'   => '"' . get_the_ID() . '"',
				),
			),
		)
	);
		$single_program_hr_class_section_break    = '<hr class="section-break">';
		$single_program_h3_class_headline_courses = '<h3 class="headline headline--medium"> Available Courses:</h3>';

		$single_program_h3_class_headline_profs = '<h3 class="headline headline--medium">' . esc_html( get_the_title() ) . ' Professors</h3>';
		$single_program_ul_class_prof_cards     = '<ul class="professor-cards">';

		$single_program_h3_class_headline_students = '<h3 class="headline headline--medium">' . esc_html( get_the_title() ) . ' Featured Students</h3>';

		$single_program_h3_class_headline_events = '<h3 class="headline headline--medium">Upcoming ' . esc_html( get_the_title() ) . ' Events</h3>';

		$single_program_h3_class_headline_campuses = '<h3 class="headline headline--medium">' . esc_html( get_the_title() ) . ' is Available at These Campuses:</h3>';

		$single_program_ul_class_link_list = '<ul class="min-list link-list">';
		$single_program_ul_closing_tag     = '</ul>';

	echo wp_kses(
		$single_program_hr_class_section_break,
		array(
			'hr' => array(
				'class' => array(),
			),
		)
	);
	echo wp_kses(
		$single_program_h3_class_headline_courses,
		array(
			'h3' => array(
				'class' => array(),
			),
		)
	);

	echo wp_kses_post( '<ul class="min-list link-list">' );

	while ( $related_courses->have_posts() ) {
		$related_courses->the_post();
		?>
		<li>
			<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
		</li>
		<?php
	}

	echo wp_kses_post( '</ul>' );

	wp_reset_postdata();

	$related_professors = new WP_Query(
		array(
			'posts_per_page' => -1,
			'post_type'      => 'professor',
			'orderby'        => 'title',
			'order'          => 'ASC',
			'meta_query'     => array(
				array(
					'key'     => 'related_programs',
					'compare' => 'LIKE',
					'value'   => '"' . get_the_ID() . '"',
				),
			),
		)
	);

	if ( $related_professors->have_posts() ) {
		echo wp_kses(
			$single_program_hr_class_section_break,
			array(
				'hr' => array(
					'class' => array(),
				),
			)
		);

		echo wp_kses(
			$single_program_h3_class_headline_profs,
			array(
				'h3' => array(
					'class' => array(),
				),
			)
		);

		echo wp_kses(
			$single_program_ul_class_prof_cards,
			array(
				'ul' => array(
					'class' => array(),
				),
			)
		);

		while ( $related_professors->have_posts() ) {
			$related_professors->the_post();
			?>
		<li class="professor-card__list-item">
			<a class="professor-card" href="<?php echo esc_url( get_the_permalink() ); ?>">
				<img class="professor-card__image" src="
				<?php
					global $post;
					echo esc_url( get_the_post_thumbnail_url( $post->ID, 'professorLandscape' ) );
				?>
				">
				<span class="professor-card__name"><?php echo esc_html( get_the_title() ); ?></span>
			</a>
		</li>
			<?php
		}
		echo wp_kses(
			$single_program_ul_closing_tag,
			array(
				'ul' => array(),
			)
		);
	}

	wp_reset_postdata();

	$related_students = new WP_Query(
		array(
			'posts_per_page' => -1,
			'post_type'      => 'student',
			'orderby'        => 'title',
			'order'          => 'ASC',
			'meta_query'     => array(
				array(
					'key'     => 'related_programs',
					'compare' => 'LIKE',
					'value'   => '"' . get_the_ID() . '"',
				),
			),
		)
	);

	if ( $related_students->have_posts() ) {
		echo wp_kses(
			$single_program_hr_class_section_break,
			array(
				'hr' => array(
					'class' => array(),
				),
			)
		);

		echo wp_kses(
			$single_program_h3_class_headline_students,
			array(
				'h3' => array(
					'class' => array(),
				),
			)
		);

		echo wp_kses(
			$single_program_ul_class_prof_cards,
			array(
				'ul' => array(
					'class' => array(),
				),
			)
		);

		while ( $related_students->have_posts() ) {
			$related_students->the_post();
			?>
		<li class="professor-card__list-item">
			<a class="professor-card" href="<?php echo esc_url( get_the_permalink() ); ?>">
				<img class="professor-card__image" src="
				<?php
					global $post;
					echo esc_url( get_the_post_thumbnail_url( $post->ID, 'studentLandscape' ) )
				?>
				">
				<span class="professor-card__name"><?php echo esc_html( get_the_title() ); ?></span>
			</a>
		</li>
			<?php
		}
		echo wp_kses(
			$single_program_ul_closing_tag,
			array(
				'ul' => array(),
			)
		);
	}

	wp_reset_postdata();
	// phpcs:disable WordPress.DateTime.RestrictedFunctions.date_date
	$today            = date( 'Ymd' );
	$home_page_events = new WP_Query(
		array(
			'posts_per_page' => 2,
			'post_type'      => 'event',
			// phpcs:disable WordPress.DB.SlowDBQuery.slow_db_query_meta_key
			'meta_key'       => 'event_date',
			'orderby'        => 'meta_value_num',
			'order'          => 'ASC',
			'meta_query'     => array(
				array(
					'key'     => 'event_date',
					'compare' => '>=',
					'value'   => $today,
					'type'    => 'numeric',
				),
				array(
					'key'     => 'related_programs',
					'compare' => 'LIKE',
					'value'   => '"' . get_the_ID() . '"',
				),
			),
		)
	);

	if ( $home_page_events->have_posts() ) {
		echo wp_kses(
			$single_program_hr_class_section_break,
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

		while ( $home_page_events->have_posts() ) {
			$home_page_events->the_post();
			get_template_part( 'template-parts/content', 'event' );
		}
	}

	wp_reset_postdata();

	$related_campuses = get_field( 'related_campus' );

	if ( $related_campuses ) {
		echo wp_kses(
			$single_program_hr_class_section_break,
			array(
				'hr' => array(
					'class' => array(),
				),
			)
		);
		echo wp_kses(
			$single_program_h3_class_headline_campuses,
			array(
				'h3' => array(
					'class' => array(),
				),
			)
		);

		echo wp_kses(
			$single_program_ul_class_link_list,
			array(
				'ul' => array(
					'class' => array(),
				),
			)
		);
		foreach ( $related_campuses as $related_campus ) {
			?>

			<li>
				<a href="<?php echo esc_url( get_the_permalink( $related_campus ) ); ?>"><?php echo esc_html( get_the_title( $related_campus ) ); ?>
				</a>
			</li> 
			<?php
		}
		echo wp_kses(
			$single_program_ul_closing_tag,
			array(
				'ul' => array(),
			)
		);
	}
	?>

	</div>
<?php }

get_footer();

?>

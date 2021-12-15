<?php
/**
 * Document functions
 *
 * Register rest routes for search
 *
 * @author Maria D. Campbell interglobalmedia@interglobalmedianetwork.com
 * @copyright  Copyright (c) 2021 Maria D. Campbell
 *
 * @package WordPress
 * @subpackage LetsBcoding
 * @link https://www.interglobalmedianetwork.com
 * @since LetsBCoding 2.0.0
 * @return void
 */

?>

<?php

add_action( 'rest_api_init', 'bcoding_register_search' );

/**
 * Function Doc Comment
 *
 * Function for registering rest route for search
 */
function bcoding_register_search() {
	register_rest_route(
		'bcoding/v1',
		'search',
		array(
			'methods'  => 'GET',
			'callback' => 'bcoding_search_results',
		)
	);
}

/**
 * Function Doc Comment
 *
 * Function for registering rest route for search results
 */

/**
 * Function Doc Comment
 *
 * Function for creating a like
 *
 * @param array $data stores array of search data terms.
 * @return array $data
 */
function bcoding_search_results( $data ) {
	$main_results = new WP_Query(
		array(
			'post_type' => array( 'post', 'page', 'professor', 'student', 'program', 'campus', 'event', 'course' ),
			's'         => sanitize_text_field( $data['term'] ),
		)
	);

	$results = array(
		'generalResults' => array(),
		'professors'     => array(),
		'students'       => array(),
		'programs'       => array(),
		'campuses'       => array(),
		'events'         => array(),
		'courses'        => array(),
	);

	while ( $main_results->have_posts() ) {
		$main_results->the_post();

		if ( get_post_type() === 'post' || get_post_type() === 'page' ) {
			array_push(
				$results['generalResults'],
				array(
					'title'      => get_the_title(),
					'permalink'  => get_the_permalink(),
					'postType'   => get_post_type(),
					'authorName' => get_the_author(),
				)
			);
		}

		if ( get_post_type() === 'professor' ) {
			array_push(
				$results['professors'],
				array(
					'title'     => get_the_title(),
					'permalink' => get_the_permalink(),
					'image'     => get_the_post_thumbnail_url( 0, 'professorLandscape' ),
				)
			);
		}

		if ( get_post_type() === 'student' ) {
			array_push(
				$results['students'],
				array(
					'title'     => get_the_title(),
					'permalink' => get_the_permalink(),
					'image'     => get_the_post_thumbnail_url( 0, 'studentLandscape' ),
				)
			);
		}

		if ( get_post_type() === 'course' ) {
			array_push(
				$results['courses'],
				array(
					'title'     => get_the_title(),
					'permalink' => get_the_permalink(),
				)
			);
		}

		if ( get_post_type() === 'program' ) {
			$related_campuses = get_field( 'related_campus' );

			if ( $related_campuses ) {
				foreach ( $related_campuses as $related_campus ) {
					array_push(
						$results['campuses'],
						array(
							'title'     => get_the_title( $related_campus ),
							'permalink' => get_the_permalink( $related_campus ),
						)
					);
				}
			}

			array_push(
				$results['programs'],
				array(
					'title'     => get_the_title(),
					'permalink' => get_the_permalink(),
					'id'        => get_the_id(),
				)
			);
		}

		if ( get_post_type() === 'campus' ) {
			array_push(
				$results['campuses'],
				array(
					'title'     => get_the_title(),
					'permalink' => get_the_permalink(),
				)
			);
		}

		if ( get_post_type() === 'event' ) {
			$event_date  = new DateTime( get_field( 'event_date', false, false ) );
			$description = null;
			if ( has_excerpt() ) {
				$description = get_the_excerpt();
			} else {
				$description = wp_trim_words( get_the_content(), 18 );
			}
			array_push(
				$results['events'],
				array(
					'title'       => get_the_title(),
					'permalink'   => get_the_permalink(),
					'month'       => $event_date->format( 'M' ),
					'day'         => $event_date->format( 'd' ),
					'description' => $description,
				)
			);
		}
	}

	if ( $results['programs'] ) {
		$programs_meta_query = array( 'relation' => 'OR' );

		foreach ( $results['programs'] as $program_result ) {
			array_push(
				$programs_meta_query,
				array(
					'key'     => 'related_programs',
					'compare' => 'LIKE',
					'value'   => '"' . $program_result['id'] . '"',
				)
			);
		}

		$program_relationship_query = new WP_Query(
			array(
				'post_type'  => array( 'professor', 'event', 'course' ),
				//phpcs:disable WordPress.DB.SlowDBQuery.slow_db_query_meta_query
				'meta_query' => $programs_meta_query,
			)
		);

		while ( $program_relationship_query->have_posts() ) {
			$program_relationship_query->the_post();

			if ( get_post_type() === 'event' ) {
				$event_date  = new DateTime( get_field( 'event_date', false, false ) );
				$description = null;
				if ( has_excerpt() ) {
					$description = get_the_excerpt();
				} else {
					$description = wp_trim_words( get_the_content(), 18 );
				}
				array_push(
					$results['events'],
					array(
						'title'       => get_the_title(),
						'permalink'   => get_the_permalink(),
						'month'       => $event_date->format( 'M' ),
						'day'         => $event_date->format( 'd' ),
						'description' => $description,
					)
				);

				if ( get_post_type() === 'professor' ) {
					array_push(
						$results['professors'],
						array(
							'title'     => get_the_title(),
							'permalink' => get_the_permalink(),
							'image'     => get_the_post_thumbnail_url( 0, 'professorLandscape' ),
						)
					);
				}
				if ( get_post_type() === 'course' ) {
					array_push(
						$results['courses'],
						array(
							'title'     => get_the_title(),
							'permalink' => get_the_permalink(),
						)
					);
				}
			}
		}

		$results['professors'] = array_values( array_unique( $results['professors'], SORT_REGULAR ) );

		$results['students'] = array_values( array_unique( $results['students'], SORT_REGULAR ) );

		$results['courses'] = array_values( array_unique( $results['courses'], SORT_REGULAR ) );

		$results['events']   = array_values( array_unique( $results['events'], SORT_REGULAR ) );
		$results['campuses'] = array_values( array_unique( $results['campuses'], SORT_REGULAR ) );
	}

	return $results;
}


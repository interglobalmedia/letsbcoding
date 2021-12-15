<?php
/**
 * Document functions
 *
 * Create rest routes for creation and deletion of student likes
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

/**
 * Function Doc Comment
 *
 * Function for creating rest routes for student likes
 */
function bcoding_student_like_routes() {
	register_rest_route(
		'bcoding/v1',
		'manageStudentLike',
		array(
			'methods'  => 'POST',
			'callback' => 'create_student_like',
		)
	);
	register_rest_route(
		'bcoding/v1',
		'manageStudentLike',
		array(
			'methods'  => 'DELETE',
			'callback' => 'delete_student_like',
		)
	);
}

/**
 * Function Doc Comment
 *
 * Function for creating a like
 *
 * @param array $data stores array of int student likes.
 * @return array $data
 */
function create_student_like( $data ) {
	if ( is_user_logged_in() ) {
		$student = sanitize_text_field( $data['studentId'] );

		$exist_student_query = new WP_Query(
			array(
				'author'     => get_current_user_id(),
				'post_type'  => 'studentlike',
				// phpcs:disable WordPress.DB.SlowDBQuery.slow_db_query_meta_query
				'meta_query' => array(
					array(
						'key'     => 'liked_student_id',
						'compare' => '=',
						'value'   => $student,
					),
				),
			)
		);

		// phpcs:disable WordPress.PHP.StrictComparisons.LooseComparison
		if ( 0 == $exist_student_query->found_posts && 'student' == get_post_type( $student ) ) {
			// create new like post !
			return wp_insert_post(
				array(
					'post_type'   => 'studentlike',
					'post_status' => 'publish',
					'post_title'  => get_post_field( 'post_title', $student ) . ' like made by ' . get_the_author_meta( 'nickname', get_current_user_id() ),
					'meta_input'  => array(
						'liked_student_id' => $student,
					),
				)
			);
		} else {
			die( 'Invalid student id.' );
		}
	} else {
		die( 'Only logged in users can create a like!' );
	}
}

/**
 * Function Doc Comment
 *
 * Function for deleting a like
 *
 * @param array $data stores array of int student likes.
 * @return array $data
 */
function delete_student_like( $data ) {
	$student_like_id = sanitize_text_field( $data['studentlike'] );
	if ( get_current_user_id() == get_post_field( 'post_author', $student_like_id ) && get_post_type( $student_like_id ) == 'studentlike' ) {
		wp_delete_post( $student_like_id, true );
		return 'Like successfully deleted.';
	} else {
		die( 'You do not have permission to delete this like!' );
	}
}

add_action( 'rest_api_init', 'bcoding_student_like_routes' );



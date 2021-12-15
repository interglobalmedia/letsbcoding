<?php
/**
 * Document functions
 *
 * Create rest routes for creation and deletion of professor likes
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
 * Function for creating rest routes for professor likes
 */
function bcoding_like_routes() {
	register_rest_route(
		'bcoding/v1',
		'manageLike',
		array(
			'methods'  => 'POST',
			'callback' => 'create_like',
		)
	);
	register_rest_route(
		'bcoding/v1',
		'manageLike',
		array(
			'methods'  => 'DELETE',
			'callback' => 'delete_like',
		)
	);
}

/**
 * Function Doc Comment
 *
 * Function for creating a like
 *
 * @param array $data stores array of int professor likes.
 * @return array $data
 */
function create_like( $data ) {
	if ( is_user_logged_in() ) {
		$professor = sanitize_text_field( $data['professorId'] );

		$exist_query = new WP_Query(
			array(
				'author'     => get_current_user_id(),
				'post_type'  => 'like',
				// phpcs:disable WordPress.DB.SlowDBQuery.slow_db_query_meta_query
				'meta_query' => array(
					array(
						'key'     => 'liked_professor_id',
						'compare' => '=',
						'value'   => $professor,
					),
				),
			)
		);
		// phpcs:disable WordPress.PHP.StrictComparisons.LooseComparison
		if ( 0 == $exist_query->found_posts && 'professor' == get_post_type( $professor ) ) {
			// create new like post !
			return wp_insert_post(
				array(
					'post_type'   => 'like',
					'post_status' => 'publish',
					'post_title'  => get_post_field( 'post_title', $professor ) . ' like made by ' . get_the_author_meta( 'nickname', get_current_user_id() ),
					'meta_input'  => array(
						'liked_professor_id' => $professor,
					),
				)
			);
		} else {
			die( 'Invalid professor id.' );
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
 * @param array $data stores array of int professor likes.
 * @return array $data
 */
function delete_like( $data ) {
	$like_id = sanitize_text_field( $data['like'] );
	// phpcs:disable WordPress.PHP.StrictComparisons.LooseComparison
	if ( get_current_user_id() == get_post_field( 'post_author', $like_id ) && get_post_type( $like_id ) == 'like' ) {
		wp_delete_post( $like_id, true );
		return 'Like successfully deleted.';
	} else {
		die( 'You do not have permission to delete this like!' );
	}
}

add_action( 'rest_api_init', 'bcoding_like_routes' );



<?php

function bcodingStudentLikeRoutes() {
    register_rest_route('bcoding/v1', 'manageStudentLike', array(
        'methods' => 'POST',
        'callback' => 'createStudentLike'
    ));
    register_rest_route('bcoding/v1', 'manageStudentLike', array(
        'methods' => 'DELETE',
        'callback' => 'deleteStudentLike'
    ));
}

function createStudentLike($studentData) {
    if (is_user_logged_in()) {
        $student = sanitize_text_field($studentData['studentId']);

        $existStudentQuery = new WP_Query(array(
            'author' => get_current_user_id(),
            'post_type' => 'studentlike',
            'meta_query' => array(
            array(
                'key' => 'liked_student_id',
                'compare' => '=',
                'value' => $student
            )
            )
        ));

        if ($existStudentQuery->found_posts == 0 AND get_post_type($student) == 'student') {
            // create new like post
            return wp_insert_post(array(
                'post_type' => 'studentlike',
                'post_status' => 'publish',
                'post_title' => get_post_field('post_title', $student) . ' like made by ' .get_the_author_meta( 'nickname', get_current_user_id() ),
                'meta_input' => array(
                    'liked_student_id' => $student
                )
            ));
        } else {
            die('Invalid student id.');
        }
    } else {
        die('Only logged in users can create a like!');
    }
}

function deleteStudentLike($studentData) {
    $studentLikeId = sanitize_text_field($studentData['studentlike']);
    if (get_current_user_id() == get_post_field('post_author', $studentLikeId) AND get_post_type($studentLikeId) == 'studentlike') {
        wp_delete_post($studentLikeId, true);
        return 'Like successfully deleted.';
    } else {
        die('You do not have permission to delete this like!');
    }
}

add_action('rest_api_init', 'bcodingStudentLikeRoutes');

?>
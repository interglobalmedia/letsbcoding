<?php 

function bcodingLikeRoutes() {
    register_rest_route('bcoding/v1', 'manageLike', array(
        'methods' => 'POST',
        'callback' => 'createLike'
    ));
    register_rest_route('bcoding/v1', 'manageLike', array(
        'methods' => 'DELETE',
        'callback' => 'deleteLike'
    ));
}

function createLike($data) {
    $professor = sanitize_text_field($data['professorId']);
    wp_insert_post(array(
        'post_type' => 'like',
        'post_status' => 'publish',
        'post_title' => '2nd PHP Test',
        'meta_input' => array(
            'liked_professor_id' => $professor
        )
    ));
}

function deleteLike() {
    return 'Thanks for trying to delete a like!';
}

add_action('rest_api_init', 'bcodingLikeRoutes');

?>
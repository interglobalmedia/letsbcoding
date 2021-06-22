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

function createLike() {
    return 'Thanks for trying to create a like!';
}

function deleteLike() {
    return 'Thanks for trying to delete a like!';
}

add_action('rest_api_init', 'bcodingLikeRoutes');

?>
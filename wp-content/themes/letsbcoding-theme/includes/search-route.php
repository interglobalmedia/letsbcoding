<?php

add_action('rest_api_init', 'bcodingRegisterRearch');

function bcodingRegisterRearch() {
    register_rest_route('bcoding/v1', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'bcodingSearchResults'
    ));
}

function bcodingSearchResults($data) {
    $mainResults = new WP_Query(array(
        'post_type' => array('post', 'page', 'professor', 'program', 'campus', 'event'),
        's' => sanitize_text_field($data['term'])
    ));

    $results = array(
        'generalResults' => array(),
        'professors' => array(),
        'programs' => array(),
        'campuses' => array(),
        'events' => array()
    );

    while($mainResults->have_posts()) {
        $mainResults->the_post();

        if (get_post_type() === 'post' OR get_post_type() === 'page') {
            array_push($results['professors'], array(
                'title' => get_the_title(),
                'link' => get_the_permalink()
            ));
        }

        if (get_post_type() === 'professor') {
            array_push($results['generalResults'], array(
                'title' => get_the_title(),
                'link' => get_the_permalink()
            ));
        }

        if (get_post_type() === 'program') {
            array_push($results['programs'], array(
                'title' => get_the_title(),
                'link' => get_the_permalink()
            ));
        }

        if (get_post_type() === 'campus') {
            array_push($results['campuses'], array(
                'title' => get_the_title(),
                'link' => get_the_permalink()
            ));
        }

        if (get_post_type() === 'event') {
            array_push($results['events'], array(
                'title' => get_the_title(),
                'link' => get_the_permalink()
            ));
        }
        
    }
    return $results;
}


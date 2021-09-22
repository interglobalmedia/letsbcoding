<?php

add_action('rest_api_init', 'bcodingRegisterRearch');

function bcodingRegisterRearch() {
    register_rest_route('bcoding/v1', 'search', array(
        'methods' => 'GET',
        'callback' => 'bcodingSearchResults'
    ));
}

function bcodingSearchResults($data) {
    $mainResults = new WP_Query(array(
        'post_type' => array('post', 'page', 'professor', 'student', 'program', 'campus', 'event'),
        's' => sanitize_text_field($data['term'])
    ));

    $results = array(
        'generalResults' => array(),
        'professors' => array(),
        'students' => array(),
        'programs' => array(),
        'campuses' => array(),
        'events' => array()
    );

    while($mainResults->have_posts()) {
        $mainResults->the_post();

        if (get_post_type() === 'post' OR get_post_type() === 'page') {
            array_push($results['generalResults'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'postType' => get_post_type(),
                'authorName' => get_the_author()
            ));
        }

        if (get_post_type() === 'professor') {
            array_push($results['professors'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'image' => get_the_post_thumbnail_url(0, 'professorLandscape')
            ));
        }

        if (get_post_type() === 'student') {
            array_push($results['students'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'image' => get_the_post_thumbnail_url(0, 'studentLandscape')
            ));
        }

        if (get_post_type() === 'program') {
            $relatedCampuses = get_field('related_campus');

            if ($relatedCampuses) {
                foreach($relatedCampuses as $relatedCampus) {
                    array_push($results['campuses'], array(
                        'title' => get_the_title($relatedCampus),
                        'permalink' => get_the_permalink($relatedCampus)
                    ));
                }
            }

            array_push($results['programs'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'id' => get_the_id()
            ));
        }

        if (get_post_type() === 'campus') {
            
            array_push($results['campuses'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink()
            ));
        }

        if (get_post_type() === 'event') {
            $eventDate = new DateTime(get_field('event_date', false, false));
            $description = null;
            if (has_excerpt()) {
                $description = get_the_excerpt();
            } else {
                $description = wp_trim_words(get_the_content(), 18);
            }
            array_push($results['events'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'month' => $eventDate->format('M'),
                'day' => $eventDate->format('d'),
                'description' => $description
            ));
        }
        
    }

    if ($results['programs']) {
        $programsMetaQuery = array('relation' => 'OR');
    
        foreach($results['programs'] as $programResult) {
            array_push($programsMetaQuery, array(
                'key' => 'related_programs',
                'compare' => 'LIKE',
                'value' => '"' . $programResult['id'] . '"'
            ));
        }

        $programRelationshipQuery = new WP_Query(array(
            'post_type' => array('professor', 'event'),
            'meta_query' => $programsMetaQuery
        ));

        while ($programRelationshipQuery->have_posts()) {
            $programRelationshipQuery->the_post();

            if (get_post_type() === 'event') {
            $eventDate = new DateTime(get_field('event_date', false, false));
            $description = null;
            if (has_excerpt()) {
                $description = get_the_excerpt();
            } else {
                $description = wp_trim_words(get_the_content(), 18);
            }
            array_push($results['events'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'month' => $eventDate->format('M'),
                'day' => $eventDate->format('d'),
                'description' => $description
            ));

            if (get_post_type() === 'professor') {
                array_push($results['professors'], array(
                    'title' => get_the_title(),
                    'permalink' => get_the_permalink(),
                    'image' => get_the_post_thumbnail_url(0, 'professorLandscape')
                ));
            }
        }
            
        }

        $results['professors'] = array_values(array_unique($results['professors'], SORT_REGULAR));

        $results['students'] = array_values(array_unique($results['students'], SORT_REGULAR));

        $results['events'] = array_values(array_unique($results['events'], SORT_REGULAR));
        $results['campuses'] = array_values(array_unique($results['campuses'], SORT_REGULAR));
    }

    return $results;
}


<?php

function bcoding_create_nonhierarchical_taxonomies() {
    /* register taxonomy for custom post topic tag */
    // Add new taxonomy, NOT hierarchical (like tags)
    $topics_labels = array(
        'name' => _x( 'Topics', 'taxonomy general name' ),
        'singular_name' => _x( 'Topic', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Topics' ),
        'popular_items' => __( 'Popular Topics' ),
        'all_items' => __( 'All Topics' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Topic' ), 
        'update_item' => __( 'Update Topic' ),
        'add_new_item' => __( 'Add New Topic' ),
        'new_item_name' => __( 'New Topic Name' ),
        'separate_items_with_commas' => __( 'Separate topics with commas' ),
        'add_or_remove_items' => __( 'Add or remove topics' ),
        'choose_from_most_used' => __( 'Choose from the most used topics' ),
        'menu_name' => __( 'Topics' ),
    );
    $topics_args = array(
        'hierarchical' => false,
        'labels' => $topics_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'topic'
        ),
    );
    register_taxonomy(
        'topics', // taxonomy
        array('program', 'professor', 'student', 'event', 'campus'), // post type
        $topics_args
    );
    $collaborations_labels = array(
        'name' => _x( 'Caollaborations', 'taxonomy general name' ),
        'singular_name' => _x( 'Collaboration', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Collaborations' ),
        'popular_items' => __( 'Popular Collaborations' ),
        'all_items' => __( 'All Collaborations' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Collaborations' ), 
        'update_item' => __( 'Update Collaborations' ),
        'add_new_item' => __( 'Add New Collaboration' ),
        'new_item_name' => __( 'New Collabration Name' ),
        'separate_items_with_commas' => __( 'Separate collaborations with commas' ),
        'add_or_remove_items' => __( 'Add or remove collaborations' ),
        'choose_from_most_used' => __( 'Choose from the most used collaborations' ),
        'menu_name' => __( 'Collaborations' ),
    );
    $collaborations_args = array(
        'hierarchical' => false,
        'labels' => $collaborations_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'collaboration'
        ),
    );
    register_taxonomy(
        'collaborations', // taxonomy
        array('professor', 'student'), // post type
        $collaborations_args
    );

    $workflows_labels = array(
        'name' => _x( 'Workflows', 'taxonomy general name' ),
        'singular_name' => _x( 'Workflow', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Workflows' ),
        'popular_items' => __( 'Popular Workflows' ),
        'all_items' => __( 'All Workflows' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Workflows' ), 
        'update_item' => __( 'Update Workflows' ),
        'add_new_item' => __( 'Add New Workflows' ),
        'new_item_name' => __( 'New Workflow Name' ),
        'separate_items_with_commas' => __( 'Separate workflows with commas' ),
        'add_or_remove_items' => __( 'Add or remove workflows' ),
        'choose_from_most_used' => __( 'Choose from the most used workflows' ),
        'menu_name' => __( 'Workflows' ),
    );
    $workflows_args = array(
        'hierarchical' => false,
        'labels' => $workflows_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'workflow'
        ),
    );
    register_taxonomy(
        'workflows', // taxonomy
        array('professor', 'student'), // post type
        $workflows_args
    );
}
add_action( 'init', 'bcoding_create_nonhierarchical_taxonomies', 0);

?>
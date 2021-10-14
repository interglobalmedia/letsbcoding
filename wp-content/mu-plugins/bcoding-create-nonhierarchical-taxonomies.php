<?php

function bcoding_create_nonhierarchical_taxonomies() {
    /* register taxonomy for custom post topic tag */
    // Add new taxonomy, NOT hierarchical (like tags)
    $themes_labels = array(
        'name' => _x( 'Themes', 'taxonomy general name' ),
        'singular_name' => _x( 'Theme', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Themes' ),
        'popular_items' => __( 'Popular Themes' ),
        'all_items' => __( 'All Themes' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Theme' ), 
        'update_item' => __( 'Update Theme' ),
        'add_new_item' => __( 'Add New Theme' ),
        'new_item_name' => __( 'New Theme Name' ),
        'separate_items_with_commas' => __( 'Separate themes with commas' ),
        'add_or_remove_items' => __( 'Add or remove themes' ),
        'choose_from_most_used' => __( 'Choose from the most used themes' ),
        'menu_name' => __( 'Themes' ),
    );
    $themes_args = array(
        'hierarchical' => false,
        'labels' => $themes_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'theme'
        ),
    );
    register_taxonomy(
        'themes', // taxonomy
        array('program', 'professor', 'student', 'event', 'campus'), // post type
        $themes_args
    );
    $collaborations_labels = array(
        'name' => _x( 'Collaborations', 'taxonomy general name' ),
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
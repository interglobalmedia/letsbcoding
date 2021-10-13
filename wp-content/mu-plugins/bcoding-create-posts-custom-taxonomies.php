<?php 
function bcoding_create_posts_custom_taxonomies() {
    /* register taxonomy for post custom taxonomy genre */
    // Add new taxonomy, hierarchical (like categories)
    $genre_labels = array(
        'name' => _x( 'Genres', 'taxonomy general name' ),
        'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Genres' ),
        'popular_items' => __( 'Popular Genres' ),
        'all_items' => __( 'All Genres' ),
        'parent_item' => __( 'Parent Genre' ),
        'parent_item_colon' => __( 'Parent Genre:' ),
        'edit_item' => __( 'Edit Genre' ), 
        'update_item' => __( 'Update Genre' ),
        'add_new_item' => __( 'Add New Genre' ),
        'new_item_name' => __( 'New Genre Name' ),
        'separate_items_with_commas' => __( 'Separate genres with commas' ),
        'add_or_remove_items' => __( 'Add or remove genres' ),
        'choose_from_most_used' => __( 'Choose from the most used genres' ),
        'menu_name' => __( 'Genres' ),
    );
    $genre_args = array(
        'hierarchical' => true,
        'labels' => $genre_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'genre'
        ),
    );
    register_taxonomy(
        'genre', // taxonomy
        array('post'),// post type
        $genre_args
    );

    /* register taxonomy for post custom taxonomy label */
    // Add new taxonomy, nonhierarchical (like tags)
    $label_labels = array(
        'name' => _x( 'Labels', 'taxonomy general name' ),
        'singular_name' => _x( 'Label', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Labels' ),
        'popular_items' => __( 'Popular Labels' ),
        'all_items' => __( 'All Labels' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Label' ), 
        'update_item' => __( 'Update Label' ),
        'add_new_item' => __( 'Add New Label' ),
        'new_item_name' => __( 'New Label Name' ),
        'separate_items_with_commas' => __( 'Separate labels with commas' ),
        'add_or_remove_items' => __( 'Add or remove labels' ),
        'choose_from_most_used' => __( 'Choose from the most used labels' ),
        'menu_name' => __( 'Labels' ),
    );
    $label_args = array(
        'hierarchical' => false,
        'labels' => $label_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'label'
        ),
    );
    register_taxonomy(
        'label', // taxonomy
        array('post'),// post type
        $label_args
    );
}
add_action('init', 'bcoding_create_posts_custom_taxonomies', 0);
?>
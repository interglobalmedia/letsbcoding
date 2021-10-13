<?php 
function bcoding_create_hierarchical_taxonomies() {
    /* register taxonomy for custom post course */
    // Add new taxonomy, nonhierarchical (like tags)
    $course_labels = array(
        'name' => _x( 'Courses', 'taxonomy general name' ),
        'singular_name' => _x( 'Course', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Courses' ),
        'popular_items' => __( 'Popular Courses' ),
        'all_items' => __( 'All Courses' ),
        'parent_item' => __( 'Parent Course' ),
        'parent_item_colon' => __( 'Parent Course:' ),
        'edit_item' => __( 'Edit Course' ), 
        'update_item' => __( 'Update Course' ),
        'add_new_item' => __( 'Add New Course' ),
        'new_item_name' => __( 'New Course Name' ),
        'separate_items_with_commas' => __( 'Separate course with commas' ),
        'add_or_remove_items' => __( 'Add or remove courses' ),
        'choose_from_most_used' => __( 'Choose from the most used courses' ),
        'menu_name' => __( 'Courses' ),
    );
    $course_args = array(
        'hierarchical' => true,
        'labels' => $course_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'course'
        ),
    );
    register_taxonomy(
        'course', // taxonomy
        array('student', 'program', 'professor'),// post type
        $course_args
    );

    /* register taxonomy for custom post subject */
    // Add new taxonomy, hierarchical (like categories)
    $subject_labels = array(
        'name' => _x( 'Subjects', 'taxonomy general name' ),
        'singular_name' => _x( 'Subject', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Subjects' ),
        'popular_items' => __( 'Popular Subjects' ),
        'all_items' => __( 'All Subects' ),
        'parent_item' => __( 'Parent Subject' ),
        'parent_item_colon' => __( 'Parent Subject:' ),
        'edit_item' => __( 'Edit Subject' ), 
        'update_item' => __( 'Update SUbject' ),
        'add_new_item' => __( 'Add New Subject' ),
        'new_item_name' => __( 'New Subject Name' ),
        'separate_items_with_commas' => __( 'Separate subjects with commas' ),
        'add_or_remove_items' => __( 'Add or remove subjects' ),
        'choose_from_most_used' => __( 'Choose from the most used subjects' ),
        'menu_name' => __( 'Subjects' ),
    );

    $subject_args =  array(
        'hierarchical' => true,
        'labels' => $subject_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'subject'
        ),
    );

    register_taxonomy(
        'subjects', // taxonomy
        array('program', 'professor', 'student', 'event', 'campus'), // post type
       $subject_args
    );

    $location_labels = array(
        'name' => _x( 'Locations', 'taxonomy general name' ),
        'singular_name' => _x( 'Location', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Locations' ),
        'popular_items' => __( 'Popular Locations' ),
        'all_items' => __( 'All Locations' ),
        'parent_item' => __( 'Parent Location' ),
        'parent_item_colon' => __( 'Parent Location:' ),
        'edit_item' => __( 'Edit Location' ), 
        'update_item' => __( 'Update Location' ),
        'add_new_item' => __( 'Add New Location' ),
        'new_item_name' => __( 'New Location Name' ),
        'separate_items_with_commas' => __( 'Separate location with commas' ),
        'add_or_remove_items' => __( 'Add or remove locations' ),
        'choose_from_most_used' => __( 'Choose from the most used locations' ),
        'menu_name' => __( 'Locations' ),
    );
    $location_args = array(
        'hierarchical' => true,
        'labels' => $location_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'location'
        ),
    );
    register_taxonomy(
        'location', // taxonomy
        array('campus', 'program', 'event', 'professor'), // post type
        $location_args
    );
}

add_action('init', 'bcoding_create_hierarchical_taxonomies', 0);
?>
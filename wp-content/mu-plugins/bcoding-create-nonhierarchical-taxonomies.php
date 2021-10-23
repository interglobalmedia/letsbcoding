<?php

function bcoding_create_nonhierarchical_taxonomies() {
    /* register taxonomy for custom post topic tag */
    // Add new taxonomy, NOT hierarchical (like tags)
    $program_themes_labels = array(
        'name' => _x( 'Program Themes', 'taxonomy general name' ),
        'singular_name' => _x( 'Program Theme', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Program Themes' ),
        'popular_items' => __( 'Popular Program Themes' ),
        'all_items' => __( 'All Program Themes' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Program Theme' ), 
        'update_item' => __( 'Update Program Theme' ),
        'add_new_item' => __( 'Add New Program Theme' ),
        'new_item_name' => __( 'New Program Theme Name' ),
        'separate_items_with_commas' => __( 'Separate program themes with commas' ),
        'add_or_remove_items' => __( 'Add or remove program themes' ),
        'choose_from_most_used' => __( 'Choose from the most used program themes' ),
        'menu_name' => __( 'Program Themes' ),
    );
    $program_themes_args = array(
        'hierarchical' => false,
        'labels' => $program_themes_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'program-theme'
        ),
    );
    register_taxonomy(
        'program_themes', // taxonomy
        array('program'), // post type
        $program_themes_args
    );

    $professor_themes_labels = array(
        'name' => _x( 'Professor Themes', 'taxonomy general name' ),
        'singular_name' => _x( 'Professor Theme', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Professor Themes' ),
        'popular_items' => __( 'Popular Professor Themes' ),
        'all_items' => __( 'All Professor Themes' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Professor Theme' ), 
        'update_item' => __( 'Update Professor Theme' ),
        'add_new_item' => __( 'Add New Professor Theme' ),
        'new_item_name' => __( 'New Professor Theme Name' ),
        'separate_items_with_commas' => __( 'Separate professor themes with commas' ),
        'add_or_remove_items' => __( 'Add or remove professor themes' ),
        'choose_from_most_used' => __( 'Choose from the most used professor themes' ),
        'menu_name' => __( 'Professor Themes' ),
    );
    $professor_themes_args = array(
        'hierarchical' => false,
        'labels' => $professor_themes_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'professor-theme'
        ),
    );
    register_taxonomy(
        'professor_themes', // taxonomy
        array('professor'), // post type
        $professor_themes_args
    );

    $student_themes_labels = array(
        'name' => _x( 'Student Themes', 'taxonomy general name' ),
        'singular_name' => _x( 'Student Theme', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Student Themes' ),
        'popular_items' => __( 'Popular Student Themes' ),
        'all_items' => __( 'All Student Themes' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Student Theme' ), 
        'update_item' => __( 'Update Student Theme' ),
        'add_new_item' => __( 'Add New Student Theme' ),
        'new_item_name' => __( 'New Student Theme Name' ),
        'separate_items_with_commas' => __( 'Separate student themes with commas' ),
        'add_or_remove_items' => __( 'Add or remove student themes' ),
        'choose_from_most_used' => __( 'Choose from the most used student themes' ),
        'menu_name' => __( 'Student Themes' ),
    );
    $student_themes_args = array(
        'hierarchical' => false,
        'labels' => $student_themes_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'student-theme'
        ),
    );
    register_taxonomy(
        'student_themes', // taxonomy
        array('student'), // post type
        $student_themes_args
    );

    $event_themes_labels = array(
        'name' => _x( 'Event Themes', 'taxonomy general name' ),
        'singular_name' => _x( 'Event Theme', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Event Themes' ),
        'popular_items' => __( 'Popular Event Themes' ),
        'all_items' => __( 'All Event Themes' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Event Theme' ), 
        'update_item' => __( 'Update Event Theme' ),
        'add_new_item' => __( 'Add New Event Theme' ),
        'new_item_name' => __( 'New Event Theme Name' ),
        'separate_items_with_commas' => __( 'Separate event themes with commas' ),
        'add_or_remove_items' => __( 'Add or remove event themes' ),
        'choose_from_most_used' => __( 'Choose from the most used event themes' ),
        'menu_name' => __( 'Event Themes' ),
    );
    $event_themes_args = array(
        'hierarchical' => false,
        'labels' => $event_themes_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'event-theme'
        ),
    );
    register_taxonomy(
        'event_themes', // taxonomy
        array('event'), // post type
        $event_themes_args
    );

    $campus_themes_labels = array(
        'name' => _x( 'Campus Themes', 'taxonomy general name' ),
        'singular_name' => _x( 'Campus Theme', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Campus Themes' ),
        'popular_items' => __( 'Popular Campus Themes' ),
        'all_items' => __( 'All Campus Themes' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Campus Theme' ), 
        'update_item' => __( 'Update Campus Theme' ),
        'add_new_item' => __( 'Add New Campus Theme' ),
        'new_item_name' => __( 'New Campus Theme Name' ),
        'separate_items_with_commas' => __( 'Separate campus themes with commas' ),
        'add_or_remove_items' => __( 'Add or remove campus themes' ),
        'choose_from_most_used' => __( 'Choose from the most used campus themes' ),
        'menu_name' => __( 'Campus Themes' ),
    );
    $campus_themes_args = array(
        'hierarchical' => false,
        'labels' => $campus_themes_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'campus-theme'
        ),
    );
    register_taxonomy(
        'campus_themes', // taxonomy
        array('campus'), // post type
        $campus_themes_args
    );

    $course_themes_labels = array(
        'name' => _x( 'Course Themes', 'taxonomy general name' ),
        'singular_name' => _x( 'Course Theme', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Course Themes' ),
        'popular_items' => __( 'Popular Course Themes' ),
        'all_items' => __( 'All Course Themes' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Course Theme' ), 
        'update_item' => __( 'Update Course Theme' ),
        'add_new_item' => __( 'Add New Course Theme' ),
        'new_item_name' => __( 'New Course Theme Name' ),
        'separate_items_with_commas' => __( 'Separate course themes with commas' ),
        'add_or_remove_items' => __( 'Add or remove course themes' ),
        'choose_from_most_used' => __( 'Choose from the most used course themes' ),
        'menu_name' => __( 'Course Themes' ),
    );
    $course_themes_args = array(
        'hierarchical' => false,
        'labels' => $course_themes_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'course-theme'
        ),
    );
    register_taxonomy(
        'course_themes', // taxonomy
        array('course'), // post type
        $course_themes_args
    );

    $professor_collaborations_labels = array(
        'name' => _x( 'Professor Collaborations', 'taxonomy general name' ),
        'singular_name' => _x( 'Professor Collaboration', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Professor Collaborations' ),
        'popular_items' => __( 'Popular Professor Collaborations' ),
        'all_items' => __( 'All Professor Collaborations' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Professor Collaboration' ), 
        'update_item' => __( 'Update Professor Collaboration' ),
        'add_new_item' => __( 'Add New Professor Collaboration' ),
        'new_item_name' => __( 'New Professor Collabration Name' ),
        'separate_items_with_commas' => __( 'Separate professor collaborations with commas' ),
        'add_or_remove_items' => __( 'Add or remove professor collaborations' ),
        'choose_from_most_used' => __( 'Choose from the most used professor collaborations' ),
        'menu_name' => __( 'Professor Collaborations' ),
    );
    $professor_collaborations_args = array(
        'hierarchical' => false,
        'labels' => $professor_collaborations_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'professor-collaboration'
        ),
    );
    register_taxonomy(
        'professor_collaborations', // taxonomy
        array('professor'), // post type
        $professor_collaborations_args
    );

    $student_collaborations_labels = array(
        'name' => _x( 'Student Collaborations', 'taxonomy general name' ),
        'singular_name' => _x( 'Student Collaboration', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Student Collaborations' ),
        'popular_items' => __( 'Popular Student Collaborations' ),
        'all_items' => __( 'All Student Collaborations' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Student Collaboration' ), 
        'update_item' => __( 'Update Student Collaboration' ),
        'add_new_item' => __( 'Add New Student Collaboration' ),
        'new_item_name' => __( 'New Student Collabration Name' ),
        'separate_items_with_commas' => __( 'Separate student collaborations with commas' ),
        'add_or_remove_items' => __( 'Add or remove student collaborations' ),
        'choose_from_most_used' => __( 'Choose from the most used student collaborations' ),
        'menu_name' => __( 'Student Collaborations' ),
    );
    $student_collaborations_args = array(
        'hierarchical' => false,
        'labels' => $student_collaborations_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'student-collaboration'
        ),
    );
    register_taxonomy(
        'student_collaborations', // taxonomy
        array('student'), // post type
        $student_collaborations_args
    );

    $professor_workflows_labels = array(
        'name' => _x( 'Professor Workflows', 'taxonomy general name' ),
        'singular_name' => _x( 'Professor Workflow', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Professor Workflows' ),
        'popular_items' => __( 'Popular Professor Workflows' ),
        'all_items' => __( 'All Professor Workflows' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Professor Workflow' ), 
        'update_item' => __( 'Update Professor Workflow' ),
        'add_new_item' => __( 'Add New Professor Workflow' ),
        'new_item_name' => __( 'New Professor Workflow Name' ),
        'separate_items_with_commas' => __( 'Separate professor workflows with commas' ),
        'add_or_remove_items' => __( 'Add or remove professor workflows' ),
        'choose_from_most_used' => __( 'Choose from the most used professor workflows' ),
        'menu_name' => __( 'Professor Workflows' ),
    );
    $professor_workflows_args = array(
        'hierarchical' => false,
        'labels' => $professor_workflows_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'professor-workflow'
        ),
    );
    register_taxonomy(
        'professor_workflows', // taxonomy
        array('professor'), // post type
        $professor_workflows_args
    );

    $student_workflows_labels = array(
        'name' => _x( 'Student Workflows', 'taxonomy general name' ),
        'singular_name' => _x( 'Student Workflow', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Student Workflows' ),
        'popular_items' => __( 'Popular Student Workflows' ),
        'all_items' => __( 'All Student Workflows' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Student Workflow' ), 
        'update_item' => __( 'Update Student Workflow' ),
        'add_new_item' => __( 'Add New Student Workflow' ),
        'new_item_name' => __( 'New Student Workflow Name' ),
        'separate_items_with_commas' => __( 'Separate student workflows with commas' ),
        'add_or_remove_items' => __( 'Add or remove student workflows' ),
        'choose_from_most_used' => __( 'Choose from the most used student workflows' ),
        'menu_name' => __( 'Student Workflows' ),
    );
    $student_workflows_args = array(
        'hierarchical' => false,
        'labels' => $student_workflows_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'student-workflow'
        ),
    );
    register_taxonomy(
        'student_workflows', // taxonomy
        array('student'), // post type
        $student_workflows_args
    );

}
add_action( 'init', 'bcoding_create_nonhierarchical_taxonomies', 0);

?>
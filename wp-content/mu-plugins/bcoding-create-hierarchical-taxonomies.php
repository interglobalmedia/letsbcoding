<?php 
function bcoding_create_hierarchical_taxonomies() {
    /* register taxonomy for custom post subject */
    // Add new taxonomy, hierarchical (like categories)
    
    $program_subject_labels = array(
        'name' => _x( 'Program Subjects', 'taxonomy general name' ),
        'singular_name' => _x( 'Program Subject', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Program Subjects' ),
        'popular_items' => __( 'Popular Program Subjects' ),
        'all_items' => __( 'All Program Subjects' ),
        'parent_item' => __( 'Parent Program Subject' ),
        'parent_item_colon' => __( 'Parent Program Subject:' ),
        'edit_item' => __( 'Edit Program Subject' ), 
        'update_item' => __( 'Update Program Subject' ),
        'add_new_item' => __( 'Add New Program Subject' ),
        'new_item_name' => __( 'New Program Subject Name' ),
        'separate_items_with_commas' => __( 'Separate program subjects with commas' ),
        'add_or_remove_items' => __( 'Add or remove program subjects' ),
        'choose_from_most_used' => __( 'Choose from the most used program subjects' ),
        'menu_name' => __( 'Program Subjects' ),
    );

    $program_subject_args =  array(
        'hierarchical' => true,
        'labels' => $program_subject_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'program-subject'
        ),
    );

    register_taxonomy(
        'program_subjects', // taxonomy
        array('program'), // post type
       $program_subject_args
    );

    $professor_subject_labels = array(
        'name' => _x( 'Professor Subjects', 'taxonomy general name' ),
        'singular_name' => _x( 'Professor Subject', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Professor Subjects' ),
        'popular_items' => __( 'Popular Professor Subjects' ),
        'all_items' => __( 'All Professor Subects' ),
        'parent_item' => __( 'Parent Professor Subject' ),
        'parent_item_colon' => __( 'Parent Professor Subject:' ),
        'edit_item' => __( 'Edit Professor Subject' ), 
        'update_item' => __( 'Update Professor Subject' ),
        'add_new_item' => __( 'Add New Professor Subject' ),
        'new_item_name' => __( 'New Professor Subject Name' ),
        'separate_items_with_commas' => __( 'Separate professor subjects with commas' ),
        'add_or_remove_items' => __( 'Add or remove professor subjects' ),
        'choose_from_most_used' => __( 'Choose from the most used professor subjects' ),
        'menu_name' => __( 'Professor Subjects' ),
    );

    $professor_subject_args =  array(
        'hierarchical' => true,
        'labels' => $professor_subject_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'professor-subject'
        ),
    );

    register_taxonomy(
        'professor_subjects', // taxonomy
        array('professor'), // post type
       $professor_subject_args
    );

    $course_subject_labels = array(
        'name' => _x( 'Course Subjects', 'taxonomy general name' ),
        'singular_name' => _x( 'Course Subject', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Course Subjects' ),
        'popular_items' => __( 'Popular Course Subjects' ),
        'all_items' => __( 'All Course Subjects' ),
        'parent_item' => __( 'Parent Course Subject' ),
        'parent_item_colon' => __( 'Parent Course Subject:' ),
        'edit_item' => __( 'Edit Course Subject' ), 
        'update_item' => __( 'Update Course Subject' ),
        'add_new_item' => __( 'Add New Course Subject' ),
        'new_item_name' => __( 'New Course Subject Name' ),
        'separate_items_with_commas' => __( 'Separate course subjects with commas' ),
        'add_or_remove_items' => __( 'Add or remove course subjects' ),
        'choose_from_most_used' => __( 'Choose from the most used course subjects' ),
        'menu_name' => __( 'Course Subjects' ),
    );

    $course_subject_args =  array(
        'hierarchical' => true,
        'labels' => $course_subject_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'course-subject'
        ),
    );

    register_taxonomy(
        'course_subjects', // taxonomy
        array('course'), // post type
       $course_subject_args
    );

    $student_subject_labels = array(
        'name' => _x( 'Student Subjects', 'taxonomy general name' ),
        'singular_name' => _x( 'Student Subject', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Student Subjects' ),
        'popular_items' => __( 'Popular Student Subjects' ),
        'all_items' => __( 'All Student Subjects' ),
        'parent_item' => __( 'Parent Student Subject' ),
        'parent_item_colon' => __( 'Parent Student Subject:' ),
        'edit_item' => __( 'Edit Student Subject' ), 
        'update_item' => __( 'Update Student Subject' ),
        'add_new_item' => __( 'Add New Student Subject' ),
        'new_item_name' => __( 'New Student Subject Name' ),
        'separate_items_with_commas' => __( 'Separate student subjects with commas' ),
        'add_or_remove_items' => __( 'Add or remove student subjects' ),
        'choose_from_most_used' => __( 'Choose from the most used student subjects' ),
        'menu_name' => __( 'Student Subjects' ),
    );

    $student_subject_args =  array(
        'hierarchical' => true,
        'labels' => $student_subject_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'student-subject'
        ),
    );

    register_taxonomy(
        'student_subjects', // taxonomy
        array('student'), // post type
       $student_subject_args
    );

    $event_subject_labels = array(
        'name' => _x( 'Event Subjects', 'taxonomy general name' ),
        'singular_name' => _x( 'Event Subject', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Event Subjects' ),
        'popular_items' => __( 'Popular Event Subjects' ),
        'all_items' => __( 'All Event Subjects' ),
        'parent_item' => __( 'Parent Event Subject' ),
        'parent_item_colon' => __( 'Parent Event Subject:' ),
        'edit_item' => __( 'Edit Event Subject' ), 
        'update_item' => __( 'Update Event Subject' ),
        'add_new_item' => __( 'Add New Event Subject' ),
        'new_item_name' => __( 'New Event Subject Name' ),
        'separate_items_with_commas' => __( 'Separate event subjects with commas' ),
        'add_or_remove_items' => __( 'Add or remove event subjects' ),
        'choose_from_most_used' => __( 'Choose from the most used event subjects' ),
        'menu_name' => __( 'Event Subjects' ),
    );

    $event_subject_args =  array(
        'hierarchical' => true,
        'labels' => $event_subject_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'event-subject'
        ),
    );

    register_taxonomy(
        'event_subjects', // taxonomy
        array('event'), // post type
       $event_subject_args
    );

    $campus_subject_labels = array(
        'name' => _x( 'Campus Subjects', 'taxonomy general name' ),
        'singular_name' => _x( 'Campus Subject', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Campus Subjects' ),
        'popular_items' => __( 'Popular Campus Subjects' ),
        'all_items' => __( 'All Campus Subjects' ),
        'parent_item' => __( 'Parent Campus Subject' ),
        'parent_item_colon' => __( 'Parent Campus Subject:' ),
        'edit_item' => __( 'Edit Campus Subject' ), 
        'update_item' => __( 'Update Campus Subject' ),
        'add_new_item' => __( 'Add New Campus Subject' ),
        'new_item_name' => __( 'New Campus Subject Name' ),
        'separate_items_with_commas' => __( 'Separate campus subjects with commas' ),
        'add_or_remove_items' => __( 'Add or remove campus subjects' ),
        'choose_from_most_used' => __( 'Choose from the most used campus subjects' ),
        'menu_name' => __( 'Campus Subjects' ),
    );

    $campus_subject_args =  array(
        'hierarchical' => true,
        'labels' => $campus_subject_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'campus-subject'
        ),
    );

    register_taxonomy(
        'campus_subjects', // taxonomy
        array('campus'), // post type
       $campus_subject_args
    );

    $campus_location_labels = array(
        'name' => _x( 'Campus Locations', 'taxonomy general name' ),
        'singular_name' => _x( 'Campus Location', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Campus Locations' ),
        'popular_items' => __( 'Popular Campus Locations' ),
        'all_items' => __( 'All Campus Locations' ),
        'parent_item' => __( 'Parent Campus Location' ),
        'parent_item_colon' => __( 'Parent Campus Location:' ),
        'edit_item' => __( 'Edit Campus Location' ), 
        'update_item' => __( 'Update Campus Location' ),
        'add_new_item' => __( 'Add New Campus Location' ),
        'new_item_name' => __( 'New Campus Location Name' ),
        'separate_items_with_commas' => __( 'Separate campus locations with commas' ),
        'add_or_remove_items' => __( 'Add or remove campus locations' ),
        'choose_from_most_used' => __( 'Choose from the most used campus locations' ),
        'menu_name' => __( 'Campus Locations' ),
    );
    $campus_location_args = array(
        'hierarchical' => true,
        'labels' => $campus_location_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'campus-location'
        ),
    );
    register_taxonomy(
        'campus_locations', // taxonomy
        array('campus'), // post type
        $campus_location_args
    );

    $program_location_labels = array(
        'name' => _x( 'Program Locations', 'taxonomy general name' ),
        'singular_name' => _x( 'Program Location', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Program Locations' ),
        'popular_items' => __( 'Popular Program Locations' ),
        'all_items' => __( 'All Program Locations' ),
        'parent_item' => __( 'Parent Program Location' ),
        'parent_item_colon' => __( 'Parent Program Location:' ),
        'edit_item' => __( 'Edit Program Location' ), 
        'update_item' => __( 'Update Program Location' ),
        'add_new_item' => __( 'Add New Program Location' ),
        'new_item_name' => __( 'New Program Location Name' ),
        'separate_items_with_commas' => __( 'Separate program locations with commas' ),
        'add_or_remove_items' => __( 'Add or remove program locations' ),
        'choose_from_most_used' => __( 'Choose from the most used program locations' ),
        'menu_name' => __( 'Program Locations' ),
    );
    $program_location_args = array(
        'hierarchical' => true,
        'labels' => $program_location_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'program-location'
        ),
    );
    register_taxonomy(
        'program_locations', // taxonomy
        array('program'), // post type
        $program_location_args
    );

    $event_location_labels = array(
        'name' => _x( 'Event Locations', 'taxonomy general name' ),
        'singular_name' => _x( 'Event Location', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Event Locations' ),
        'popular_items' => __( 'Popular Event Locations' ),
        'all_items' => __( 'All Event Locations' ),
        'parent_item' => __( 'Parent Event Location' ),
        'parent_item_colon' => __( 'Parent Event Location:' ),
        'edit_item' => __( 'Edit Event Location' ), 
        'update_item' => __( 'Update Event Location' ),
        'add_new_item' => __( 'Add New Event Location' ),
        'new_item_name' => __( 'New Event Location Name' ),
        'separate_items_with_commas' => __( 'Separate event locations with commas' ),
        'add_or_remove_items' => __( 'Add or remove event locations' ),
        'choose_from_most_used' => __( 'Choose from the most used event locations' ),
        'menu_name' => __( 'Event Locations' ),
    );
    $event_location_args = array(
        'hierarchical' => true,
        'labels' => $event_location_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'event-location'
        ),
    );
    register_taxonomy(
        'event_locations', // taxonomy
        array('event'), // post type
        $event_location_args
    );

    $professor_location_labels = array(
        'name' => _x( 'Professor Locations', 'taxonomy general name' ),
        'singular_name' => _x( 'Professor Location', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Professor Locations' ),
        'popular_items' => __( 'Popular Professor Locations' ),
        'all_items' => __( 'All Professor Locations' ),
        'parent_item' => __( 'Parent Professor Location' ),
        'parent_item_colon' => __( 'Parent Professor Location:' ),
        'edit_item' => __( 'Edit Professor Location' ), 
        'update_item' => __( 'Update Professor Location' ),
        'add_new_item' => __( 'Add New Profesor Location' ),
        'new_item_name' => __( 'New Professor Location Name' ),
        'separate_items_with_commas' => __( 'Separate professor locations with commas' ),
        'add_or_remove_items' => __( 'Add or remove professor locations' ),
        'choose_from_most_used' => __( 'Choose from the most used professor locations' ),
        'menu_name' => __( 'Professor Locations' ),
    );
    $professor_location_args = array(
        'hierarchical' => true,
        'labels' => $professor_location_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'professor-location'
        ),
    );
    register_taxonomy(
        'professor_locations', // taxonomy
        array('professor'), // post type
        $professor_location_args
    );

    $course_location_labels = array(
        'name' => _x( 'Course Locations', 'taxonomy general name' ),
        'singular_name' => _x( 'Course Location', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Course Locations' ),
        'popular_items' => __( 'Popular Course Locations' ),
        'all_items' => __( 'All Course Locations' ),
        'parent_item' => __( 'Parent Course Location' ),
        'parent_item_colon' => __( 'Parent Course Location:' ),
        'edit_item' => __( 'Edit Course Location' ), 
        'update_item' => __( 'Update Course Location' ),
        'add_new_item' => __( 'Add New Course Location' ),
        'new_item_name' => __( 'New Course Location Name' ),
        'separate_items_with_commas' => __( 'Separate course locations with commas' ),
        'add_or_remove_items' => __( 'Add or remove course locations' ),
        'choose_from_most_used' => __( 'Choose from the most used course locations' ),
        'menu_name' => __( 'Course Locations' ),
    );
    $course_location_args = array(
        'hierarchical' => true,
        'labels' => $course_location_labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_updatepost_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'course-location'
        ),
    );
    register_taxonomy(
        'course_locations', // taxonomy
        array('course'), // post type
        $course_location_args
    );
}

add_action('init', 'bcoding_create_hierarchical_taxonomies', 0);
?>
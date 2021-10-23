<?php 
/* Create Breadcrumb functionality for event_subjects */
function bcoding_get_event_subject_breadcrumb() {
    global $post;
    $terms = get_the_terms( $post->ID, 'event_subjects' );
    if ($terms != null) {
        echo '<span class="subject-taxonomy">Event Subjects</span>';
        foreach($terms as $term) {
            $term_name = $term->name;
            if ($term || is_single()) {
                echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
                echo '<a href="'.get_term_link($term).'" rel="nofollow">'.$term_name.'</a>';
            } elseif (is_page()) {
                echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
                echo the_title();
            } elseif (is_search()) {
                echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
                echo '"<em>';
                echo the_search_query();
                echo '</em>"';
            }
        }
        if (is_single()) {
            echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp;";
            the_title();
        }
    } else {
        echo "";
    }
}

add_filter( 'add_event_subject_breadcrumb', 'bcoding_get_event_subject_breadcrumb');
?>
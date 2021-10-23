<?php 
/* Create Breadcrumb functionality for campus_themes */
function bcoding_get_campus_theme_breadcrumb() {
    global $post;
    $terms = get_the_terms( $post->ID, 'campus_themes' );
    if ($terms != null) {
        echo '<span class="theme-taxonomy">Campus Themes</span>';
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
            echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
            the_title();
        }
    } else {
        echo "";
    }
}

add_filter( 'add_campus_theme_breadcrumb', 'bcoding_get_campus_theme_breadcrumb');
?>
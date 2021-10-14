<?php 
/* Create Breadcrumb functionality for topics */
function bcoding_get_theme_breadcrumb() {
    global $post;
    $terms = get_the_terms( $post->ID, 'themes' );
    if ($terms != null) {
        echo '<a href="'.site_url('/themes').'" rel="nofollow">Themes</a>';
        foreach($terms as $term) {
            $term_name = $term->name;
            if ($term || is_single()) {
                echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
                echo '<a href="'.get_term_link($term).'" rel="nofollow">'.$term_name.'</a>';
                if (is_single()) {
                    echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                    the_title();
                }
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
    } else {
        echo "";
    }
}

add_filter( 'add_topic_breadcrumb', 'bcoding_get_theme_breadcrumb');
?>
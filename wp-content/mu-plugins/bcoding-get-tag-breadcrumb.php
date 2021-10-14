<?php 
/* Create Breadcrumb functionality for tags */
function bcoding_get_tag_breadcrumb() {
    if (is_tag() || is_single()) {
        echo '<a href="'.site_url('/tags').'" rel="nofollow">Tags</a>';
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo get_the_tag_list('',' • ','');
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
    else {
        echo "";
    }
}

add_filter( 'add_tag_breadcrumb', 'bcoding_get_tag_breadcrumb');
?>
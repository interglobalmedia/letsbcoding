<?php 
/* Create Breadcrumb functionality for categories */
function bcoding_get_cat_breadcrumb() {
    if (is_category() || is_single()) {
        echo '<a href="'.site_url('/categories').'" rel="nofollow">Categories</a>';
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
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

add_action( 'add_cat_breadcrumb', 'bcoding_get_cat_breadcrumb');
?>
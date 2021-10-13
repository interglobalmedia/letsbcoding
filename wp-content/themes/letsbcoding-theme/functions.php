<?php

require get_theme_file_path('/includes/search-route.php');
require get_theme_file_path('/includes/like-route.php');
require get_theme_file_path('/includes/studentlike-route.php');

function bcoding_custom_rest() {
    register_rest_field('post', 'authorName', array(
        'get_callback' => function() {return get_the_author();}
    ));
    register_rest_field('note', 'userNoteCount', array(
        'get_callback' => function() {return count_user_posts(get_current_user_id(), 'note');}
    ));
}

add_action('rest_api_init', 'bcoding_custom_rest');

function pageBanner($args = NULL) {
    // fallback title if there is none
    if (!$args['title']) {
        $args['title'] = get_the_title();
    }

    if (!$args['subtitle']) {
        $args['subtitle'] = get_field('page_banner_subtitle', false, false);
    }

    if (!$args['photo']) {
        if (get_field('page_banner_background_image') AND !is_archive() AND !is_home() ) {
            $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
        } else {
            $args['photo'] = get_theme_file_uri('/images/drew-farwell-6pQiSb5qnEo-unsplash.jpg');
        }
    }
    ?>
    <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
      <div class="page-banner__intro">
        <p><?php echo $args['subtitle']; ?></p>
      </div>
    </div>  
  </div>
<?php }

function bcoding_files() {
    wp_enqueue_script('main-bcoding-js', get_theme_file_uri('/build/index.js'), NULL, '1.0', true);
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('leaflet-map-css', '//unpkg.com/leaflet@1.7.1/dist/leaflet.css');
    wp_enqueue_script('leaflet-map-js', '//unpkg.com/leaflet@1.7.1/dist/leaflet.js', NULL, '1.0', true);
    wp_enqueue_style('bcoding_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('bcoding_extra_styles', get_theme_file_uri('/build/index.css'));
    $mapbox_access_token = MAPBOX_ACCESS_TOKEN;
    if (strstr($_SERVER['SERVER_NAME'], 'letsbcoding.local')) {
        wp_localize_script('main-bcoding-js', 'php_vars', array(
        'mapbox_access_token' => $_ENV['MAPBOX_ACCESS_TOKEN'])
    );
    } else {
        wp_localize_script('main-bcoding-js', 'php_vars', array(
            'mapbox_access_token' => $mapbox_access_token)
        );
    }
    wp_localize_script('main-bcoding-js', 'bcodingData', array(
        'root_url' => get_site_url(),
        'nonce' => wp_create_nonce( 'wp_rest')
    ));
}

add_action('wp_enqueue_scripts', 'bcoding_files');

function bcoding_features() {
    // register_nav_menu('headerMenuLocation', 'Header Menu Location');
    // register_nav_menu('footerLocationExplore', 'Footer Explore Menu Location');
    // register_nav_menu('footerLocationLearn', 'Footer Learn Menu Location');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('professorLandscape', 400, 260, true);
    add_image_size('professorPortrait', 480, 650, true);
    add_image_size('studentLandscape', 400, 260, true);
    add_image_size('studentPortrait', 480, 650, true);
    add_image_size('pageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'bcoding_features');

function bcoding_adjust_queries($query) {
    if (!is_admin()AND is_post_type_archive('campus') AND $query->is_main_query()) {
        $query->set('posts_per_page', -1);
    }
    if (!is_admin()AND is_post_type_archive('program') AND $query->is_main_query()) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', -1);
    }
    if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
        $today = date('Ymd');
        $query-> set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
          array(
            'key' => 'event_date',
            'compare' => '>=',
            'value' => $today,
            'type' => 'numeric'
          )
        ));
    }
}

add_action('pre_get_posts', 'bcoding_adjust_queries');

/* Add categories to Pages */
function add_categories_to_pages() {
    register_taxonomy_for_object_type('category', 'page');
}

add_action('init', 'add_categories_to_pages');

/* Add tags to Pages */
function add_tags_to_pages() {
    register_taxonomy_for_object_type('post_tag', 'page');
}

add_action('init', 'add_tags_to_pages');

/* Add default tag on publish */
function set_archive_tag_on_publish($post_id,$post) {
  if ($post->post_type == 'post'
    && $post->post_status == 'publish') {
      wp_set_post_tags( $post_id, 'LetsBCoding', true );
    }
  }
add_action('save_post','set_archive_tag_on_publish',10,2);

/* Create shortcode for listing all categories on a page */
/* this function outputs your category list where you
use the [my_cat_list] shortcode. */
function my_list_categories_shortcode() {
    $args = array( 'echo'=>false );
    return wp_list_categories( $args ); 
}

/* This creates the [my_cat_list] shortcode and calls the my_list_categories_shortcode() function. */
add_shortcode( 'my_cat_list', 'my_list_categories_shortcode' );

/* show  custom post types on tag pages */
function wpse28145_add_custom_types( $query ) {
    if( is_tag() && $query->is_main_query() ) {

        // this gets all post types:
        // $post_types = get_post_types();

        // alternately, you can add just specific post types using this line instead of the above:
        $post_types = array( 'post', 'student', 'program', 'campus', 'event', 'professor', 'event' );

        $query->set( 'post_type', $post_types );
    }
}
add_filter( 'pre_get_posts', 'wpse28145_add_custom_types' );

function redirectSubsHome() {
    $currentUser = wp_get_current_user();
    // roles is an array that contains all the different roles that have been assigned to a user
    if (count($currentUser->roles) === 1 AND $currentUser->roles[0] === 'subscriber') {
        wp_redirect(site_url('/'));
        exit;
    }
}

/* So we can manipulate the generated HTML code for our tag cloud */
function set_wp_generate_tag_cloud($content, $tags, $args) { 
    $count=0;
    $output=preg_replace_callback('(</a\s*>)', 
    function($match) use ($tags, &$count) {
        return "<span class=\"tagcount\">(". $tags[$count++]-> count .")</span></a>";  
    }
    , $content);
    
    return $output;
}

add_filter('wp_generate_tag_cloud','set_wp_generate_tag_cloud', 10, 3);  

// redirect subscriber account out of admin and onto home page
add_action('admin_init', 'redirectSubsHome');

function subsNoAdminBar() {
    $currentUser = wp_get_current_user();
    // roles is an array that contains all the different roles that have been assigned to a user
    if (count($currentUser->roles) === 1 AND $currentUser->roles[0] === 'subscriber') {
        show_admin_bar(false);
    }
}

// hide admin bar from subscriber account
add_action('wp_loaded', 'subsNoAdminBar');

function customHeaderUrl() {
    return esc_url(site_url('/'));
}

// customize login page/screen
add_filter('login_headerurl', 'customHeaderUrl');

function customLoginCSS() {
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('bcoding_main-styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('bcoding_extra_styles', get_theme_file_uri('/build/index.css'));
}

add_action('login_enqueue_scripts', 'customLoginCSS');

function customLoginTitle() {
    return get_bloginfo('name');
}

add_filter('login_headertitle', 'customLoginTitle');

function makeNotePrivate($data, $postarr) {
    if ($data['post_type'] === 'note') {
        if (count_user_posts(get_current_user_id(), 'note') > 2 AND !$postarr['ID'] AND ! in_array( 'administrator', wp_get_current_user()->roles, true)) {
            die('You have reached your note limit!');
        }
        $data['post_content'] = sanitize_textarea_field($data['post_content']);
        $data['post_title'] = sanitize_text_field($data['post_title']);
    }

    if ($data['post_type'] === 'note' AND $data['post_status'] !== 'trash') {
        $data['post_status'] = 'private';
    }
    
    return $data;
}

// force note posts to be private
add_filter('wp_insert_post_data', 'makeNotePrivate', 10, 2);

function filesToIgnore($exclude_filters) {
    $exclude_filters[] = 'themes/letsbcoding-theme/node_modules';
    return $exclude_filters;
}

add_filter('ai1wm_exclude_content_from_export', 'filesToIgnore');

// Remove tools in admin dashboard
function TRIM_ADMIN_MENU() {
    global $current_user;
    if(!current_user_can('administrator')) {
        remove_menu_page( 'tools.php' ); // No tools for <= editors
    }
}
add_action('admin_init', 'TRIM_ADMIN_MENU');

// remove dashboard, WP logo, site name, and comments, and search links from admin-bar
function letsbcoding_admin_bar_render() {
    global $wp_admin_bar;
    if ( is_admin() && ! current_user_can( 'administrator' ) && ! wp_doing_ajax() ) {
        $wp_admin_bar->remove_menu('dashboard');
        $wp_admin_bar->remove_menu('wp-logo');
        $wp_admin_bar->remove_menu('site-name');
        $wp_admin_bar->remove_menu('comments');
        $wp_admin_bar->remove_menu('search');
    }
}

add_action('wp_before_admin_bar_render', 'letsbcoding_admin_bar_render');

?>
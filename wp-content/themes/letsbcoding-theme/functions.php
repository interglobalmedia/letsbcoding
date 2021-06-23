<?php

require get_theme_file_path('/includes/search-route.php');
require get_theme_file_path('/includes/like-route.php');

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
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('leaflet-map-css', '//unpkg.com/leaflet@1.7.1/dist/leaflet.css');
    wp_enqueue_script('leaflet-map-js', '//unpkg.com/leaflet@1.7.1/dist/leaflet.js', NULL, '1.0', true);

    if (strstr($_SERVER['SERVER_NAME'], 'letsbcoding.local')) {
        wp_enqueue_script('main-bcoding-js', 'http://localhost:3000/bundled.js', NULL, '1.0', true);
        wp_localize_script('main-bcoding-js', 'php_vars', array(
            'mapbox_access_token' => $_ENV["MAPBOX_ACCESS_TOKEN"])
        );
    } else {
        wp_enqueue_script('main-vendors-js', get_theme_file_uri('/bundled-assets/undefined'), NULL, '1.0', true);
        wp_enqueue_script('main-bcoding-js', get_theme_file_uri('/bundled-assets/scripts.079e19c15ea28450b098.js'), NULL, '1.0', true);
        wp_enqueue_style('main-styles', get_theme_file_uri('/bundled-assets/styles.079e19c15ea28450b098.css'));
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

function redirectSubsHome() {
    $currentUser = wp_get_current_user();
    // roles is an array that contains all the different roles that have been assigned to a user
    if (count($currentUser->roles) === 1 AND $currentUser->roles[0] === 'subscriber') {
        wp_redirect(site_url('/'));
        exit;
    }
}

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
    wp_enqueue_style('main-styles', get_theme_file_uri('/bundled-assets/styles.079e19c15ea28450b098.css'));
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

?>

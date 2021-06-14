<?php

require get_theme_file_path('/includes/search-route.php');

function bcoding_custom_rest() {
    register_rest_field('post', 'authorName', array(
        'get_callback' => function() {return get_the_author();}
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
        wp_localize_script('main-bcoding-js', 'php_vars', array('mapbox_access_token' => $_ENV["MAPBOX_ACCESS_TOKEN"]));
    } else {
        wp_enqueue_script('main-vendors-js', get_theme_file_uri('/bundled-assets/undefined'), NULL, '1.0', true);
        wp_enqueue_script('main-bcoding-js', get_theme_file_uri('/bundled-assets/scripts.3f2cfa642933318a84a0.js'), NULL, '1.0', true);
        wp_enqueue_style('main-styles', get_theme_file_uri('/bundled-assets/styles.3f2cfa642933318a84a0.css'));
    }
    wp_localize_script('main-bcoding-js', 'bcodingData', array(
        'root_url' => get_site_url()
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

?>

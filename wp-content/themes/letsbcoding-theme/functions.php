<?php
/**
 * Functions and definitions
 *
 * Main functions file for letsBCoding theme
 *
 * @author Maria D. Campbell interglobalmedia@interglobalmedianetwork.com
 * @copyright Copyright (c) 2021 Maria D. Campbell
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link https://www.interglobalmedianetwork.com
 *
 * @package WordPress
 * @subpackage LetsBCoding
 * @since LetsBCoding 1.0.0
 */

/**
 * Require necessary files
 */
require get_theme_file_path( '/includes/search-route.php' );
require get_theme_file_path( '/includes/like-route.php' );
require get_theme_file_path( '/includes/studentlike-route.php' );

/**
 * Register custom rest api post author name and user note count fields
 */
function bcoding_custom_rest() {
	register_rest_field(
		'post',
		'authorName',
		array(
			'get_callback' => function() {
				return get_the_author();},
		)
	);
	register_rest_field(
		'note',
		'userNoteCount',
		array(
			'get_callback' => function() {
				return count_user_posts( get_current_user_id(), 'note' );},
		)
	);
}

add_action( 'rest_api_init', 'bcoding_custom_rest' );

/**
 * Function Document Comment
 *
 * Function for LetsBCoding theme page banner image title and subtitle
 */

/**
 * Parameter Document Comment
 *
 * @param array $args holds title(s) of the page(s) parameters and their values displayed in the page banner background image.
 * @return void
 */
function page_banner( $args = null ) {
	/**
	 * Fallback title if there is none
	 */

	if ( ! $args['title'] ) {
		$args['title'] = get_the_title();
	}
	/**
	 * Fallback subtitle if there is none
	 */
	if ( ! $args['subtitle'] ) {
		$args['subtitle'] = get_field( 'page_banner_subtitle', false, false );
	}
	/**
	 * Fallback background image if there is none on archive pages or home page
	 */
	if ( ! $args['photo'] ) {
		if ( get_field( 'page_banner_background_image' ) && ! is_archive() && ! is_home() ) {
			$args['photo'] = get_field( 'page_banner_background_image' )['sizes']['pageBanner'];
		} else {
			$args['photo'] = get_theme_file_uri( '/images/drew-farwell-6pQiSb5qnEo-unsplash.jpg' );
		}
	}
	?>
	<div class="page-banner">
		<div class="page-banner__bg-image" style="background-image: url(<?php echo esc_url( $args['photo'] ); ?>);"></div>
		<div class="page-banner__content container container--narrow">
			<h1 class="page-banner__title"><?php echo wp_kses_post( $args['title'] ); ?></h1>
			<div class="page-banner__intro">
				<p><?php echo wp_kses_post( $args['subtitle'] ); ?></p>
			</div>
		</div>  
	</div>
<?php }

/**
 * Loads JavaScript, CSS, Custom Google Fonts, Font Awesome icons, leaflet library,  and extra custom theme style files the theme depends on
 */
function bcoding_files() {
	wp_enqueue_script( 'main-bcoding-js', get_theme_file_uri( '/build/index.js' ), null, '1.0', true );
	// phpcs:disable WordPress.WP.EnqueuedResourceParameters.MissingVersion
	wp_enqueue_style( 'custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i' );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'leaflet-map-css', '//unpkg.com/leaflet@1.7.1/dist/leaflet.css' );
	wp_enqueue_script( 'leaflet-map-js', '//unpkg.com/leaflet@1.7.1/dist/leaflet.js', null, '1.0', true );
	wp_enqueue_style( 'bcoding_main_styles', get_theme_file_uri( '/build/style-index.css' ) );
	wp_enqueue_style( 'bcoding_extra_styles', get_theme_file_uri( '/build/index.css' ) );
	$mapbox_access_token = MAPBOX_ACCESS_TOKEN;
	global $_SERVER;
	$server_name = $_SERVER;
	if ( wp_unslash( isset( $server_name['SERVER_NAME'] ) ) && esc_url_raw( wp_unslash( strstr( $server_name['SERVER_NAME'], 'letsbcoding.local' ) ) ) ) {
		wp_localize_script(
			'main-bcoding-js',
			'php_vars',
			array(
				'mapbox_access_token' => $_ENV['MAPBOX_ACCESS_TOKEN'],
			)
		);
	} else {
		wp_localize_script(
			'main-bcoding-js',
			'php_vars',
			array(
				'mapbox_access_token' => $mapbox_access_token,
			)
		);
	}
	wp_localize_script(
		'main-bcoding-js',
		'bcodingData',
		array(
			'root_url' => get_site_url(),
			'nonce'    => wp_create_nonce( 'wp_rest' ),
		)
	);
}

add_action( 'wp_enqueue_scripts', 'bcoding_files' );

/**
 * Adds support for various WordPress features
 */
function bcoding_features() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'professorLandscape', 400, 260, true );
	add_image_size( 'professorPortrait', 480, 650, true );
	add_image_size( 'studentLandscape', 400, 260, true );
	add_image_size( 'studentPortrait', 480, 650, true );
	add_image_size( 'pageBanner', 1500, 350, true );
}

add_action( 'after_setup_theme', 'bcoding_features' );

/**
 * Function bcoding_adjust_queries Document Comment
 *
 * Adjust selected cpts to be part of the WP main query.
 */

/**
 * Parameter Document Comment
 *
 * @param string $query stores a search query string.
 * @return void
 */
function bcoding_adjust_queries( $query ) {
	if ( ! is_admin() && is_post_type_archive( 'campus' ) && $query->is_main_query() ) {
		$query->set( 'posts_per_page', -1 );
	}
	if ( ! is_admin() && is_post_type_archive( 'program' ) && $query->is_main_query() ) {
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
		$query->set( 'posts_per_page', -1 );
	}
	if ( ! is_admin() && is_post_type_archive( 'event' ) && $query->is_main_query() ) {
		//phpcs:disable WordPress.DateTime.RestrictedFunctions.date_date
		$today = date( 'Ymd' );
		$query->set( 'meta_key', 'event_date' );
		$query->set( 'orderby', 'meta_value_num' );
		$query->set( 'order', 'ASC' );
		$query->set(
			'meta_query',
			array(
				array(
					'key'     => 'event_date',
					'compare' => '>=',
					'value'   => $today,
					'type'    => 'numeric',
				),
			)
		);
	}
}

add_action( 'pre_get_posts', 'bcoding_adjust_queries' );

/**
 * Function set_archive_taxonomy_on_publish Document Comment
 */

/**
 * Parameter Document Comment
 *
 * @param int    $post_id stores int post id.
 * @param object $post stores an object post.
 * @return void
 */
function set_archive_taxonomy_on_publish( $post_id, $post ) {
	// phpcs:disable WordPress.PHP.StrictComparisons.LooseComparison
	if ( 'post' == $post->post_type
	&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, $category_id, true );
	}
	if ( 'campus' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Campus Location', true );
	}
	if ( 'campus' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Campus Subject', true );
	}
	if ( 'campus' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Campus Theme', true );
	}
	if ( 'course' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Course Location', true );
	}
	if ( 'course' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Course Subject', true );
	}
	if ( 'course' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Course Theme', true );
	}
	if ( 'event' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Event Location', true );
	}
	if ( 'event' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Event Subject', true );
	}
	if ( 'event' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Event Theme', true );
	}
	if ( 'professor' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Professor Collaboration', true );
	}
	if ( 'professor' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Professor Location', true );
	}
	if ( 'professor' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Professor Subject', true );
	}
	if ( 'professor' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Professor Theme', true );
	}
	if ( 'professor' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Professor Workflow', true );
	}
	if ( 'program' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Program Location', true );
	}
	if ( 'program' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Program Subject', true );
	}
	if ( 'program' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Program Theme', true );
	}
	if ( 'student' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Student Collaboration', true );
	}
	if ( 'student' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Student Subject', true );
	}
	if ( 'student' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Student Theme', true );
	}
	if ( 'student' == $post->post_type
		&& 'publish' == $post->post_status ) {
		wp_set_post_tags( $post_id, 'LetsBCoding Student Workflow', true );
	}
}
add_action( 'save_post', 'set_archive_taxonomy_on_publish', 10, 2 );

/**
 * Create shortcode for listing all categories on a page
 */
/**
 * This function outputs your category list where you
 * Use the [my_cat_list] shortcode.
 */
function my_list_categories_shortcode() {
	$args = array( 'echo' => false );
	return wp_list_categories( $args );
}

/**
 * This creates the [my_cat_list] shortcode and calls the my_list_categories_shortcode() function.
 */
add_shortcode( 'my_cat_list', 'my_list_categories_shortcode' );

/**
 * Function to show custom post types on tag archive pages
 */

/**
 * Parameter Document Comment
 *
 * @param string $query stores search query string.
 * @return void
 */
function wpse28145_add_custom_types( $query ) {
	if ( is_tag() && $query->is_main_query() ) {

		// This gets all post types: !
		// $post_types = get_post_types(); !

		/**
		 * Alternately, you can add just specific post types using this line instead of the above:
		 */
		$post_types = array( 'post', 'campus', 'event', 'program', 'course', 'professor', 'student' );

		$query->set( 'post_type', $post_types );
	}
}
add_filter( 'pre_get_posts', 'wpse28145_add_custom_types' );

/**
 * Function for redirecting subscribers to the home page so they are not redirected to the admin dashboard
 */
function redirect_subs_home() {
	$current_user = wp_get_current_user();
	/**
	 * Roles is an array that contains all the different roles that have been assigned to a user
	 */
	if ( 1 === count( $current_user->roles ) && 'subscriber' === $current_user->roles[0] ) {
		wp_safe_redirect( ( esc_url( site_url( '/' ) ) ) );
		exit;
	}
}

/**
 * Redirect subscriber account out of admin and onto home page
 */
add_action( 'admin_init', 'redirect_subs_home' );

/**
 * Function so we can manipulate the generated HTML code for our tag cloud
 */

/**
 * Parameter Document Comment
 *
 * @param string       $content stores a string containing the generated HTML of the tag cloud.
 * @param object array $tags stores an array of tags data (which is also an array containing various information about the tag).
 * @param object array $args stores an array of parameters for a tag cloud.
 * @return [function] $output
 */
function set_wp_generate_tag_cloud( $content, $tags, $args ) {
	$count  = 0;
	$output = preg_replace_callback(
		'(</a\s*>)',
		function( $match ) use ( $tags, &$count ) {
			return '<span class="tagcount">(' . $tags[ $count++ ]->count . ')</span></a>';
		},
		$content
	);

	return $output;
}

add_filter( 'wp_generate_tag_cloud', 'set_wp_generate_tag_cloud', 10, 3 );

/**
 * Function for hiding the admin bar from users with subscriber role
 */
function subs_no_admin_bar() {
	$current_user = wp_get_current_user();
	/**
	 * Roles is an array that contains all the different roles that have been assigned to a user
	 */
	if ( 1 === count( $current_user->roles ) && 'subscriber' === $current_user->roles[0] ) {
		show_admin_bar( false );
	}
}

/**
 *Hide admin bar from subscriber account
 */
add_action( 'wp_loaded', 'subs_no_admin_bar' );
/**
 * Function for customizing login go to home page instead of wp-admin dashboard
 */
function custom_header_url() {
	return esc_url( site_url( '/' ) );
}

/**
 * Customize login using login_headerurl filter for page/screen function custom_header_url function
 */
add_filter( 'login_headerurl', 'custom_header_url' );

/**
 * Function for customizing css of the default WordPress login page
 */
function custom_login_css() {
	wp_enqueue_style( 'custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i' );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'bcoding_main-styles', get_theme_file_uri( '/build/style-index.css' ) );
	wp_enqueue_style( 'bcoding_extra_styles', get_theme_file_uri( '/build/index.css' ) );
}

add_action( 'login_enqueue_scripts', 'custom_login_css' );

/**
 * Function for customizing title of the default WordPress login page
 */
function custom_login_title() {
	return get_bloginfo( 'name' );
}

add_filter( 'login_headertitle', 'custom_login_title' );

/**
 * Function to force note posts to be private and to restrict the number of notes permissible per user based on user role
 */

/**
 * Parameter Document Comment
 *
 * @param object $data stores the note custom post type object.
 * @param array  $postarr stores an array of note posts.
 * @return function $output
 */
function make_note_private( $data, $postarr ) {
	if ( 'note' === $data['post_type'] ) {
		if ( count_user_posts( get_current_user_id(), 'note' ) > 2 && ! $postarr['ID'] && ! in_array( 'administrator', wp_get_current_user()->roles, true ) ) {
			die( 'You have reached your note limit!' );
		}
		$data['post_content'] = sanitize_textarea_field( $data['post_content'] );
		$data['post_title']   = sanitize_text_field( $data['post_title'] );
	}

	if ( 'note' === $data['post_type'] && 'trash' !== $data['post_status'] ) {
		$data['post_status'] = 'private';
	}

	return $data;
}

/**
 * Force note posts to be private using wp_insert_post_data filter on wp_insert_post_data function
 */
add_filter( 'wp_insert_post_data', 'make_note_private', 10, 2 );

/**
 * Function for ignoring files so not exported
 */

/**
 * Parameter Document Comment
 *
 * @param array $exclude_filters stores an array of string files to ignore on export.
 * @return $exclude_filters
 */
function files_to_ignore( $exclude_filters ) {
	$exclude_filters[] = 'themes/letsbcoding-theme/node_modules';
	return $exclude_filters;
}

add_filter( 'ai1wm_exclude_content_from_export', 'files_to_ignore' );

/**
 * Function for removing tools in admin dashboard
 */
function trim_admin_menu() {
	global $current_user;
	if ( ! current_user_can( 'administrator' ) ) {
		remove_menu_page( 'tools.php' ); // No tools for <= editors !
	}
}
add_action( 'admin_init', 'trim_admin_menu' );

/**
 * Remove dashboard, WP logo, site name, and comments, and search links from admin-bar
 */
function letsbcoding_admin_bar_render() {
	global $wp_admin_bar;
	if ( is_admin() && ! current_user_can( 'administrator' ) && ! wp_doing_ajax() ) {
		$wp_admin_bar->remove_menu( 'dashboard' );
		$wp_admin_bar->remove_menu( 'wp-logo' );
		$wp_admin_bar->remove_menu( 'site-name' );
		$wp_admin_bar->remove_menu( 'comments' );
		$wp_admin_bar->remove_menu( 'search' );
	}
}

add_action( 'wp_before_admin_bar_render', 'letsbcoding_admin_bar_render' );

?>

<?php
/**
 * Plugin Name: Featured Professor Block Type
 * Description: Features or highlights a professor within a blog post
 * Version: 1.0
 * Author: Maria D. Campbell
 * Author URI: https:www.interglobalmedianetwork.com
 * Text Domain: featured-professor
 * Domain Path: /languages
 *
 * @package WordPress
 * @link https://www.interglobalmedianetwork.com
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly !
}

require_once plugin_dir_path( __FILE__ ) . 'includes/generateProfessorHTML.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/relatedPostsHTML.php';

/**
 * FeaturedProfessor Class Doc Comment
 *
 * @category Class
 * @package  WordPress
 * @author   Maria D. Campbell
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.interglobalmedianetwork.com/
 */
class FeaturedProfessor {
	/**
	 * Function __construct() to register and load plugin assets after WordPress has been loaded and allows core WordPress functions to keep track of what has been added
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'on_init' ) );
		add_action( 'rest_api_init', array( $this, 'prof_html' ) );
		add_filter( 'the_content', array( $this, 'add_related_posts' ) );
	}
	/**
	 * Function add_related_posts
	 *
	 * @param [type] $content is the original post content of the featured professor.
	 * @return [$content]
	 */
	public function add_related_posts( $content ) {
		if ( is_singular( 'professor' ) && in_the_loop() && is_main_query() ) {
			return $content . relatedPostsHTML( get_the_id() );
		}
		return $content;
	}
	/**
	 * Function Document Comment
	 *
	 * Function prof_html registers the rest route for the featured professor
	 *
	 * @return void
	 */
	public function prof_html() {
		register_rest_route(
			'featuredProfessor/v1',
			'getHTML',
			array(
				'methods'  => WP_REST_SERVER::READABLE,
				'callback' => array( $this, 'get_prof_html' ),
			)
		);
	}
	/**
	 * Function Document Comment
	 * Function get_prof_html returns the html for the selected professor
	 *
	 * @param [object] $data contains information about the professor.
	 * @return [function] generateProfessorHTML
	 */
	public function get_prof_html( $data ) {
		return generateProfessorHTML( $data['profId'] );
	}
	/**
	 * Function Document Comment
	 *
	 * Function on_init loads the plugin text domain, registers the plugin meta,allows for it to appear in the rest api, by id, more than one featured professor can be embedded in a post, and it registers the associated script, style, translation, and plugin block type
	 *
	 * @return void
	 */
	public function on_init() {
		load_plugin_textdomain( 'featured-professor', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		register_meta(
			'post',
			'featured_professor',
			array(
				'show_in_rest' => true,
				'type'         => 'number',
				'single'       => false,
			)
		);
		// phpcs:disable WordPress.WP.EnqueuedResourceParameters.NotInFooter
		// phpcs:disable WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_register_script( 'featuredProfessorScript', plugin_dir_url( __FILE__ ) . 'build/index.js', array( 'wp-blocks', 'wp-i18n', 'wp-editor' ) );
		wp_register_style( 'featuredProfessorStyle', plugin_dir_url( __FILE__ ) . 'build/index.css' );

		wp_set_script_translations( 'featuredProfessorScript', 'featured-professor', plugin_dir_path( __FILE__ ) . '/languages' );

		register_block_type(
			'featuredprofplugin/featured-professor',
			array(
				'render_callback' => array( $this, 'render_callback' ),
				'editor_script'   => 'featuredProfessorScript',
				'editor_style'    => 'featuredProfessorStyle',
			)
		);
	}
	/**
	 * Function Document Comment
	 * Function render_callback
	 *
	 * @param [object] $attributes permits us to dynamically access data from the database and hand it off to our client-side JavaScript.
	 * @return [function] generateProfessorHTML
	 */
	public function render_callback( $attributes ) {
		if ( $attributes['profId'] ) {
			wp_enqueue_style( 'featuredProfessorStyle' );
			return generateProfessorHTML( $attributes['profId'] );
		} else {
			return null;
		}
	}
}

$featured_professor = new FeaturedProfessor();

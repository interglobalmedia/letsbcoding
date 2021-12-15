<?php
/**
 * Plugin Name: Are You Paying Attention Quiz
 * Description: Provide your readers with a multiple choice question.
 * Version: 1.0
 * Text Domain: are-you-paying-attention
 * Author: Maria D. Campbell
 * Author URI: https://www.interglobalmedianetwork.com
 *
 * @package WordPress
 * @link https://www.interglobalmedianetwork.com
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly !
}

/**
 * AreYouPayingAttention Class Doc Comment
 *
 * @category Class
 * @package  WordPress
 * @author   Maria D. Campbell
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.interglobalmedianetwork.com/
 */
class AreYouPayingAttention {
	/**
	 * Function Document Comment
	 * Function __construct() to load admin_assets function after WordPress has been loaded and allows core WordPress functions to keep track of what has been added
	 */
	public function __construct() {
		add_action(
			'init',
			array(
				$this,
				'admin_assets',
			)
		);
	}
	/**
	 * Function Document Comment
	 * admin_assets() registers build/index.css and build/index.js for plugin backend
	 */
	public function admin_assets() {
		// phpcs:disable WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_register_style( 'aypaQuizEditCSS', plugin_dir_url( __FILE__ ) . 'build/index.css' );
		// phpcs:disable WordPress.WP.EnqueuedResourceParameters.MissingVersion
		// phpcs:disable WordPress.WP.EnqueuedResourceParameters.NotInFooter
		wp_register_script(
			'aypaNewBlockType',
			plugin_dir_url( __FILE__ ) . 'build/index.js',
			array(
				'wp-blocks',
				'wp-element',
				'wp-editor',
			)
		);
		register_block_type(
			'aypaplugin/are-you-paying-attention',
			array(
				'editor_script'   => 'aypaNewBlockType',
				'editor_style'    => 'aypaQuizEditCSS',
				'render_callback' => array(
					$this,
					'aypa_html',
				),
			)
		);
	}
	/**
	 * Function Document Comment
	 * aypa_html() enqueues build/frontend.js and build/frontend.css files for plugin front end
	 */
	/**
	 * Function aypa_html()
	 *
	 * @param [object] $attributes permits us to dynamically access data from the database and hand it off to our client-side JavaScript.
	 * @return [ob_get_clean()]
	 */
	public function aypa_html( $attributes ) {
		if ( ! is_admin() ) {
		// phpcs:disable WordPress.WP.EnqueuedResourceParameters.MissingVersion
			wp_enqueue_script(
				'aypaAttentionFrontend',
				plugin_dir_url( __FILE__ ) . 'build/frontend.js',
				array(
					'wp-element',
				)
			);
			// phpcs:disable WordPress.WP.EnqueuedResourceParameters.MissingVersion
			wp_enqueue_style( 'aypaAttentionFrontendCSS', plugin_dir_url( __FILE__ ) . 'build/frontend.css' );
		}
		ob_start(); ?>
		<div class="paying-attention-update-me">
		<!-- wp_json_encode() transforms t4attributes JS object from JS to JSON -->
		<pre style="display: none;"><?php echo wp_json_encode( $attributes ); ?></pre>
		</div>
		<?php
		return ob_get_clean();
	}
}

$are_you_paying_attention = new AreYouPayingAttention();

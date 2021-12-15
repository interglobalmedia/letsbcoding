<?php
/**
 * Plugin Name: Word Filter
 * Description: Replaces a list of words.
 * Version: 1.0
 * Author: Maria D. Campbell
 * Author URI: https://letsbcoding.com
 *
 * @package WordPress
 * @link https://www.interglobalmedianetwork.com
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly !
}
/**
 * WordFilterPlugin class Doc Comment
 *
 * @category Class
 * @package  WordPress
 * @author   Maria D. Campbell
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.interglobalmedianetwork.com/
 */
class WordFilterPlugin {
	/**
	 * Function __construct() to register and load plugin admin menu, plugin settings, and plugin filter logic in admin area after WordPress has been loaded and allows core WordPress functions to keep track of what has been added
	 */
	public function __construct() {
		add_action(
			'admin_menu',
			array(
				$this,
				'word_filter_menu',
			)
		);
		add_action(
			'admin_init',
			array(
				$this,
				'word_filter_settings',
			)
		);

		if ( get_option( 'plugin_words_to_filter' ) ) {
			add_filter(
				'the_content',
				array(
					$this,
					'filter_logic',
				)
			);
		}
	}
	/**
	 * Function word_filter_settings creates word filter plugin settings
	 *
	 * @return void
	 */
	public function word_filter_settings() {
		add_settings_section( 'replacement-text-section', null, null, 'word-filter-options' );
		register_setting( 'replacementFields', 'replacementText' );
		add_settings_field(
			'replacement-text',
			'filtered-text',
			array(
				$this,
				'replacement_field_html',
			),
			'word-filter-options',
			'replacement-text-section'
		);
	}
	/**
	 * Function replacement_field_html creates word filter replacement text
	 *
	 * @return void
	 */
	public function replacement_field_html() { ?>
		<input type="text" name="replacementText" value="<?php echo esc_attr( get_option( 'replacementText', '***' ) ); ?>">
		<p class="description">Leave blank to simply remove the filtered words.</p>
		<?php
	}
	/**
	 * Function filter_logic filters the words that need to be replaced
	 *
	 * @param [string] $content is the post content that contains the filtered words that need to be replaced.
	 * @return [$content]
	 */
	public function filter_logic( $content ) {
		$filtered_words         = explode( ',', get_option( 'plugin_words_to_filter' ) );
		$filtered_words_trimmed = array_map( 'trim', $filtered_words );
		return str_ireplace( $filtered_words_trimmed, esc_html( get_option( 'replacementText', '***' ) ), $content );
	}
	/**
	 * Function word_filter_menu in admin dashboard
	 *
	 * @return void
	 */
	public function word_filter_menu() {
		$main_page_hook = add_menu_page(
			'Words To Filter',
			'Word Filter',
			'manage_options',
			'wordfilter',
			array(
				$this,
				'word_filter_page',
			),
			'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMCAyMEMxNS41MjI5IDIwIDIwIDE1LjUyMjkgMjAgMTBDMjAgNC40NzcxNCAxNS41MjI5IDAgMTAgMEM0LjQ3NzE0IDAgMCA0LjQ3NzE0IDAgMTBDMCAxNS41MjI5IDQuNDc3MTQgMjAgMTAgMjBaTTExLjk5IDcuNDQ2NjZMMTAuMDc4MSAxLjU2MjVMOC4xNjYyNiA3LjQ0NjY2SDEuOTc5MjhMNi45ODQ2NSAxMS4wODMzTDUuMDcyNzUgMTYuOTY3NEwxMC4wNzgxIDEzLjMzMDhMMTUuMDgzNSAxNi45Njc0TDEzLjE3MTYgMTEuMDgzM0wxOC4xNzcgNy40NDY2NkgxMS45OVoiIGZpbGw9IiNGRkRGOEQiLz4KPC9zdmc+Cg==',
			100
		);
		add_submenu_page(
			'wordfilter',
			'Words To Filter',
			'Words List',
			'manage_options',
			'wordfilter',
			array(
				$this,
				'word_filter_page',
			)
		);
		add_submenu_page(
			'wordfilter',
			'Word Filter Options',
			'Options',
			'manage_options',
			'word-filter-options',
			array(
				$this,
				'options_sub_page',
			)
		);
		add_action(
			"load-{$main_page_hook}",
			array(
				$this,
				'main_page_assets',
			)
		);
	}
	/**
	 * Function main_page_assets to load plugin admin css
	 *
	 * @return void
	 */
	public function main_page_assets() {
		// phpcs:disable WordPress.WP.EnqueuedResourceParameters.MissingVersion
		wp_enqueue_style( 'filterAdminCSS', plugin_dir_url( __FILE__ ) . 'styles.css' );
	}
	/**
	 * Function handle_form loads and saves data input in the form to and from the database
	 *
	 * @return void
	 */
	public function handle_form() {
		if ( isset( $_POST['formNonce'] ) && isset( $_POST['plugin_words_to_filter'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['formNonce'] ) ), 'saveFilterWords' ) && current_user_can( 'manage_options' ) ) {
			update_option( 'plugin_words_to_filter', sanitize_text_field( wp_unslash( $_POST['plugin_words_to_filter'] ) ) );
			?>
			<div class="updated">
				<p>Your filtered words have been saved.</p>
			</div>
		<?php } else { ?>
			<div class="error">
				<p>Sorry, you do not have permission to perform that action.</p>
			</div>
			<?php
		}
	}
	/**
	 * Function word_filter_page creates the html for the Word Filter page under the Word List sub-menu item of the plugin in the admin dashboard
	 *
	 * @return void
	 */
	public function word_filter_page() {
		?>
		<div class="wrap">
			<h1>Word Filter</h1>
			<?php
			if ( isset( $_POST['formNonce'] ) && isset( $_POST['justsubmitted'] ) && 'true' === $_POST['justsubmitted'] && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['formNonce'] ) ) ) ) {
				$this->handle_form();}
			?>
			<form method="POST">
				<input type="hidden" name="justsubmitted" value="true">
				<?php wp_nonce_field( 'saveFilterWords', 'formNonce' ); ?>
				<label for="plugin_words_to_filter">Enter a <strong>comma-separated</strong> list of words to filter from your site's content</label>
				<div class="word-filter__flex-container">
					<textarea name="plugin_words_to_filter" id="plugin_words_to_filter" placeholder="bad, mean, awful, horrible"><?php echo esc_textarea( get_option( 'plugin_words_to_filter' ) ); ?></textarea>
				</div>
				<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
			</form>
		</div>
		<?php
	}
	/**
	 * Function options_sub_page creates the html for the Word Filter Opations page under the Options sub-menu item of the plugin in the admin dashboardj
	 *
	 * @return void
	 */
	public function options_sub_page() {
		?>
		<div class="wrap">
			<h1>Word Filter Options</h1>
			<form action="options.php" method="POST">
			<?php
				settings_errors();
				settings_fields( 'replacementFields' );
				do_settings_sections( 'word-filter-options' );
				submit_button();
			?>
			</form>
		</div>
		<?php
	}
}

$word_filter_plugin = new WordFilterPlugin();

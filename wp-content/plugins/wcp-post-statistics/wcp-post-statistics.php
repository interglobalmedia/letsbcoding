<?php
/**
 * Plugin Name: WCP Post Statistics
 * Description: Counts the number of words and characters in a post and estimates its reading time.
 * Version: 1.0
 * Author: Maria D. Campbell
 * Author URI: https://www.interglobalmedianetwork.com
 * Text Domain: wcp-post-statistics
 * Domain Path: /languages
 *
 * @package WordPress
 * @link https://www.interglobalmedianetwork.com
 */

/**
 * WordCountAndTimePlugin Class Doc Comment
 *
 * @category Class
 * @package  WordPress
 * @author   Maria D. Campbell
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.interglobalmedianetwork.com/
 */
class WordCountAndTimePlugin {
	/**
	 * Function __construct() to register and load plugin admin page to the admin menu, settings page, plugin options, and languages in admin after WordPress has been loaded and allows core WordPress functions to keep track of what has been added
	 */
	public function __construct() {
		add_action(
			'admin_menu',
			array(
				$this,
				'admin_page',
			)
		);
		add_action(
			'admin_init',
			array(
				$this,
				'settings',
			)
		);
		add_filter(
			'the_content',
			array(
				$this,
				'if_wrap',
			)
		);
		add_action(
			'init',
			array(
				$this,
				'languages',
			)
		);
	}
	/**
	 * Function language loads the plugin textdomain and therefore its translated strings
	 *
	 * @return void
	 */
	public function languages() {
		load_plugin_textdomain( 'wcp-post-statistics', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
	/**
	 * Function if_wrap executes if it s the main WP query and if we are on s single post if one of the wcp checkboxes has been checked on the back end thereby creating the html for the word count, character count, or read time otherwise only the post content itself is returned
	 *
	 * @param [string] $content is the original post content being counted.
	 * @return [$content]
	 */
	public function if_wrap( $content ) {
		if ( is_main_query() && is_single() &&
		(
			get_option( 'wcp_wordcount', '1' ) ||
			get_option( 'wcp_charcount', '1' ) ||
			get_option( 'wcp_readtime', '1' ) ) ) {
			return $this->create_html( $content );
		}

		return $content;
	}
	/**
	 * Function create_html
	 *
	 * @param [string] $content the original post content being counted.
	 * @return [$content]
	 */
	public function create_html( $content ) {
		$html = '<h3>' . esc_html( get_option( 'wcp_headline', 'Post Statistics' ) ) . '</h3><p>';

		// get word count once because both wordcount and readtime will need it !
		if ( get_option( 'wcp_wordcount', '1' ) || get_option( 'wcp_readtime', '1' ) ) {
			$word_count = str_word_count( wp_strip_all_tags( $content ) );
		}

		if ( get_option( 'wcp_wordcount', '1' ) ) {
			// phpcs:disable WordPress.WP.I18n.TextDomainMismatch
			$html .= esc_html__( 'This post has', 'wcp-post-statistics' ) . ' ' . $word_count . ' ' . esc_html__( 'words', 'wcp-post-statistics' ) . '.<br>';
		}

		if ( get_option( 'wcp_charcount', '1' ) ) {
			$html .= esc_html__( 'This post has', 'wcp-post-statistics' ) . ' ' . strlen( wp_strip_all_tags( $content ) ) . ' ' . esc_html__( 'characters.', 'wcp-post-statistics' ) . '<br>';
		}

		if ( get_option( 'wcp_readtime', '1' ) ) {
			$html .= esc_html__(
				'This post reading time is approximately',
				'wcp-post-statistics'
			)
			// phpcs:disable WordPress.WP.I18n.NonSingularStringLiteralText
			. ' ' . round( $word_count / 225 ) . ' ' . esc_html__( 'minute(s)', 'wcp-post-statistics' ) . '<br>';
		}

		$html .= '</p>';

		if ( get_option( 'wcp_location', '0' ) === '0' ) {
			return $html . $content;
		}

		return $content . $html;
	}
	/**
	 * Function settings
	 *
	 * @return void
	 */
	public function settings() {
		add_settings_section( 'wcp_first_section', null, null, 'word-count-settings-page' );
		// for wcp_location !
		add_settings_field(
			'wcp_location',
			'Display Location',
			array(
				$this,
				'location_html',

			),
			'word-count-settings-page',
			'wcp_first_section'
		);
		register_setting(
			'wordcountplugin',
			'wcp_location',
			array(
				'sanitize_callback' => array(
					$this,
					'sanitize-location',
				),
				'default'           => '0',
			)
		);
		// for wcp_headline !
		add_settings_field(
			'wcp_headline',
			'Headline Text',
			array(
				$this,
				'headline_html',

			),
			'word-count-settings-page',
			'wcp_first_section'
		);
		register_setting(
			'wordcountplugin',
			'wcp_headline',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => 'Post Statistics',
			)
		);

		// for wcp_wordcount !
		add_settings_field(
			'wcp_wordcount',
			'Word Count',
			array(
				$this,
				'checkbox_html',

			),
			'word-count-settings-page',
			'wcp_first_section',
			array(
				'theName' => 'wcp_wordcount',
			)
		);
		register_setting(
			'wordcountplugin',
			'wcp_wordcount',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => '1',
			)
		);

		// for wcp_charcount !
		add_settings_field(
			'wcp_charcount',
			'Character Count',
			array(
				$this,
				'checkbox_html',

			),
			'word-count-settings-page',
			'wcp_first_section',
			array(
				'theName' => 'wcp_charcount',
			)
		);
		register_setting(
			'wordcountplugin',
			'wcp_charcount',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => '1',
			)
		);

		// for wcp_readtime !
		add_settings_field(
			'wcp_readtime',
			'Read Time',
			array(
				$this,
				'checkbox_html',

			),
			'word-count-settings-page',
			'wcp_first_section',
			array(
				'theName' => 'wcp_readtime',
			)
		);
		register_setting(
			'wordcountplugin',
			'wcp_readtime',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => '1',
			)
		);
	}
	/**
	 * Function settings if teh value of '0' or '1' is not selected representing the location of the post statistics for a post, then the message 'Display location must be either beginning or end of post.', otherwise the selected location input is returned.
	 *
	 * @param [string] $input represents the input/option to select for the post statistics location in the single post.
	 * @return [$input]
	 */
	public function sanitize_location( $input ) {
		if ( '0' !== $input && '1' !== $input ) {
			add_settings_error( 'wcp_location', 'wcp_location_error', 'Display location must be either beginning or end of post.' );
			return get_option( 'wcp_location' );
		}
		return $input;
	}
	/**
	 * Function checkbox_html
	 *
	 * @param [object] $args along with the property name 'theName' represents the value of the name attribute. There is more than one input. One input represents the word count, one the character count, and one the read time of the single post.
	 * @return void
	 */
	public function checkbox_html( $args ) { ?>
		<input type="checkbox" name="<?php echo esc_attr( $args['theName'] ); ?>" value="1" <?php checked( get_option( $args['theName'] ), '1' ); ?>>
		<?php
	}
	/**
	 * Function headline_html creates the headline for the plugin's admin page
	 *
	 * @return void
	 */
	public function headline_html() {
		?>
		<input type="text" name="wcp_headline" value="<?php echo esc_attr( get_option( 'wcp_headline' ) ); ?>">
		<?php
	}
	/**
	 * Function location_html is the html for the select element where the option elements reside that represent the location options for the post statistics. Before the post content or after the post content.
	 *
	 * @return void
	 */
	public function location_html() {
		?>
		<select name="wcp_location">
			<option value="0" <?php selected( get_option( 'wcp_location' ), '0' ); ?>>Beginning of post</option>
			<option value="1" <?php selected( get_option( 'wcp_location' ), '1' ); ?>>End of post</option>
		</select>
		<?php
	}
	/**
	 * Function admin_page renders the html for the admin-page
	 *
	 * @return void
	 */
	public function admin_page() {
		add_options_page(
			'Word Count Settings',
			__( 'Word Count', 'wcp-post-statistics' ),
			'manage_options',
			'word-count-settings-page',
			array(
				$this,
				'our_html',
			)
		);
	}
	/**
	 * Function our_html creates the html itself for the plugin's admin page
	 *
	 * @return void
	 */
	public function our_html() {
		?>
		<div class="wrap">
			<h1>Word Count Settings</h1>
			<form action="options.php" method="POST">
			<?php
				settings_fields( 'wordcountplugin' );
				do_settings_sections( 'word-count-settings-page' );
				submit_button();
			?>
			</form>
		</div>
		<?php
	}
}

$word_count_and_time_plugin = new WordCountAndTimePlugin();

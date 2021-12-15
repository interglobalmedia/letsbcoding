<?php
/**
 * Plugin Name: Pet Adoption (Custom DB Table)
 * Description: Pet Name and Features Generator
 * Version: 1.0
 * Author: Maria D. Campbell
 * Author URI: https://www.interglobalmedianetwork.com
 * Text Domain: pets-custom-database-table
 *
 * @package WordPress
 * @link https://www.interglobalmedianetwork.com
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly !
}
require_once plugin_dir_path( __FILE__ ) . 'includes/generatePet.php';

/**
 * PetAdoptionTablePlugin Class Doc Comment
 *
 * @category Class
 * @package  WordPress
 * @author   Maria D. Campbell
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.interglobalmedianetwork.com/
 */
class PetAdoptionTablePlugin {
	/**
	 * Function __construct  to get the plugin database table and character collate and functions and template after WordPress has been loaded and allows core WordPress functions to keep track of what has been added
	 */
	public function __construct() {
		global $wpdb;
		$this->charset   = $wpdb->get_charset_collate();
		$this->tablename = $wpdb->prefix . 'pets';

		add_action( 'activate_pets-custom-database-table/pets-custom-database-table.php', array( $this, 'on_activate' ) );
		add_action( 'admin_post_createpet', array( $this, 'create_pet' ) );
		add_action( 'admin_post_nopriv_createpet', array( $this, 'create_pet' ) );
		add_action( 'admin_post_deletepet', array( $this, 'delete_pet' ) );
		add_action( 'admin_post_nopriv_deletetepet', array( $this, 'delete_pet' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_assets' ) );
		add_filter( 'template_include', array( $this, 'load_template' ), 99 );
	}
	/**
	 * Function delete_pet deletes/removes a pet from the custom database table
	 *
	 * @return void
	 */
	public function delete_pet() {
		wp_nonce_field( basename( __FILE__ ), $nonce_key );
		if ( empty( sanitize_text_field( wp_unslash( $_POST[ $nonce_key ] ) ) ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ $nonce_key ] ) ), basename( __FILE__ ) ) ) {
			return;
		}
		if ( isset( $_POST['idtodelete'] ) && current_user_can( 'administrator' ) ) {
			$id = sanitize_text_field( wp_unslash( $_POST['idtodelete'] ) );
			global $wpdb;
			wp_cache_delete(
				$wpdb->delete(
					$this->tablename,
					array(
						'id' => $id,
					)
				)
			);// db call ok.
				wp_safe_redirect( site_url( '/pet-adoption' ) );
		} else {
			wp_safe_redirect( site_url() );
		}
		exit;
	}
	/**
	 * Function create_pet creates/adds a pet to the custom database table
	 *
	 * @return void
	 */
	public function create_pet() {
		wp_nonce_field( basename( __FILE__ ), $nonce_key );
		if ( empty( sanitize_text_field( wp_unslash( $_POST[ $nonce_key ] ) ) ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ $nonce_key ] ) ), basename( __FILE__ ) ) ) {
			return;
		}
		if ( isset( $_POST['newpetname'] ) && isset( $_POST['newspecies'] ) && isset( $_POST['newpetweight'] ) && isset( $_POST['newbirthyear'] ) && isset( $_POST['newfavhobby'] ) && isset( $_POST['newfavcolor'] ) && isset( $_POST['newfavfood'] ) && current_user_can( 'administrator' ) ) {
			$pet              = array();
			$pet['petname']   = sanitize_text_field( wp_unslash( $_POST['newpetname'] ) );
			$pet['species']   = sanitize_text_field( wp_unslash( $_POST['newspecies'] ) );
			$pet['petweight'] = sanitize_text_field( wp_unslash( $_POST['newpetweight'] ) );
			$pet['birthyear'] = sanitize_text_field( wp_unslash( $_POST['newbirthyear'] ) );
			$pet['favhobby']  = sanitize_text_field( wp_unslash( $_POST['newfavhobby'] ) );
			$pet['favcolor']  = sanitize_text_field( wp_unslash( $_POST['newfavcolor'] ) );
			$pet['favfood']   = sanitize_text_field( wp_unslash( $_POST['newfavfood'] ) );
			global $wpdb;
			$wpdb->wp_prepare( insert( $this->tablename, $pet ) );
			wp_safe_redirect( site_url( '/pet-adoption' ) );
		} else {
			wp_safe_redirect( site_url() );
		}
		exit;
	}
	/**
	 * Function on_activate creates the database table or upgrades it if it already exists. Instead of executing an SQL query directly, we'll use the dbDelta function in wp-admin/includes/upgrade.php (we'll have to load this file, as it is not loaded by default). The dbDelta function examines the current table structure, compares it to the desired table structure, and either adds or modifies the table as necessary. upgrade.php is a file that defines the dbDelta() function, which can be used to upgrade a MySQL table if it allready exists. This mechanism comes in handy when upgrading a plugin to a version that uses different MySQL tables without loss of data. This code will only run when the plugin is activated..
	 *
	 * @return void
	 */
	public function on_activate() {
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta(
			"CREATE TABLE $this->tablename (
          id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
          birthyear smallint(5) NOT NULL DEFAULT 0,
          petweight smallint(5) NOT NULL DEFAULT 0,
          favfood varchar(60) NOT NULL DEFAULT '',
          favhobby varchar(60) NOT NULL DEFAULT '',
          favcolor varchar(60) NOT NULL DEFAULT '',
          petname varchar(60) NOT NULL DEFAULT '',
          species varchar(60) NOT NULL DEFAULT '',
          PRIMARY KEY  (id)
          ) $this->charset;"
		);
	}
	/**
	 * Function on_admin_refresh generates pets and their features based on the generate_pet function inside generatePet.php when we refresh the wp admin dashboard.
	 *
	 * @return void
	 */
	public function on_admin_refresh() {
		global $wpdb;
		$wpdb->wp_prepare( insert( $this->tablename, generate_pet() ) );
	}
	/**
	 * Function load_assets loads the pet-adoption.css file for the Pet Adoption plugin.
	 *
	 * @return void
	 */
	public function load_assets() {
		if ( is_page( 'pet-adoption' ) ) {
			// phpcs:disable WordPress.WP.EnqueuedResourceParameters.MissingVersion
			wp_enqueue_style( 'petadoptioncss', plugin_dir_url( __FILE__ ) . 'pet-adoption.css' );
		}
	}
	/**
	 * Function
	 *
	 * @param [string] $template load_template loads the Pet Adoption template file and returns it. So if the active page is called 'pet-adoption' and that is its relative url, then load_template is called.
	 * @return [$template]
	 */
	public function load_template( $template ) {
		if ( is_page( 'pet-adoption' ) ) {
			return plugin_dir_path( __FILE__ ) . 'includes/template-pets.php';
		}
		return $template;
	}
	/**
	 * Function populate_fast automatically populates teh custom database table with pre-created pets and their features using the generate_pet function.
	 *
	 * @return void
	 */
	public function populate_fast() {
		$query        = "INSERT INTO $this->tablename (`species`, `birthyear`, `petweight`, `favfood`, `favhobby`, `favcolor`, `petname`) VALUES ";
		$numberofpets = 200;
		for ( $i = 0; $i < $numberofpets; $i++ ) {
			$pet    = generate_pet();
			$query .= "('{$pet['species']}', {$pet['birthyear']}, {$pet['petweight']}, '{$pet['favfood']}', '{$pet['favhobby']}', '{$pet['favcolor']}', '{$pet['petname']}')";
			if ( $i != $numberofpets - 1 ) {
				$query .= ', ';
			}
		}

		/**
		 * Never use query directly like this without using $wpdb->prepare in the
		 * real world. I'm only using it this way here because the values I'm
		 * inserting are coming from my my innocent pet generator function so I
		 * know they are not malicious, and I simply want this example script
		 * to execute as quickly as possible and not use too much memory.
		*/

		global $wpdb;
		$wpdb->wp_prepare( query( $query ) );
	}
}

$pet_adoption_table_plugin = new PetAdoptionTablePlugin();

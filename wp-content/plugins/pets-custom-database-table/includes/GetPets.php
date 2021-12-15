<?php
/**
 * Plugin Name: Pet Adoption (Custom DB Table)
 * Description: Pet name and features generator to and from a custom database table
 * Version: 1.0
 * Author: Maria D. Campbell
 * Author URI: https://www.interglobalmedianetwork.com
 *
 * @package  WordPress
 * @author   Maria D. Campbell
 * @link     http://www.interglobalmedianetwork.com/
 */

?>

<?php
/**
 * Class GetPets get pets from custom database table called pets
 */
class GetPets {
	/**
	 * Function __construct to set up custom database table after WordPress has been loaded and allows core WordPress functions to keep track of what has been added
	 */
	public function __construct() {
		global $wpdb;
		$tablename = $wpdb->prefix . 'pets';

		$this->args = $this->get_args();

		$this->placeholders = $this->create_placeholders();

		$query       = "SELECT * FROM $tablename ";
		$count_query = "SELECT COUNT(*) FROM $tablename ";

		$query       .= $this->create_where_text();
		$count_query .= $this->create_where_text();
		// phpcs:disable WordPress.DB.DirectDatabaseQuery.DirectQuery
		// phpcs:disable WordPress.DB.DirectDatabaseQuery.NoCaching
		// phpcs:disable WordPress.DB.PreparedSQL.NotPrepared
		$this->count = $wpdb->get_var( $wpdb->prepare( $count_query, $this->placeholders ) );
		$this->pets  = $wpdb->get_results( $wpdb->prepare( $query, $this->placeholders ) );
	}
	/**
	 * Function get_args function responsible for creating a property on teh GetPets class/object that stores and sanitizes all of the incoming URL args
	 *
	 * @return [array_filter]
	 */
	public function get_args() {
		if ( current_user_can( 'administrator' ) ) {
			// phpcs:disable WordPress.Security.NonceVerification.Recommended
			$temp_array = array(
				'favcolor'  => sanitize_text_field( wp_unslash( ! empty( $_GET['favcolor'] ) ) ),
				'species'   => sanitize_text_field( wp_unslash( ! empty( $_GET['species'] ) ) ),
				'minyear'   => sanitize_text_field( wp_unslash( ! empty( $_GET['minyear'] ) ) ),
				'maxyear'   => sanitize_text_field( wp_unslash( ! empty( $_GET['maxyear'] ) ) ),
				'minweight' => sanitize_text_field( wp_unslash( ! empty( $_GET['minweight'] ) ) ),
				'maxweight' => sanitize_text_field( wp_unslash( ! empty( $_GET['maxweight'] ) ) ),
				'favhobby'  => sanitize_text_field( wp_unslash( ! empty( $_GET['favhobby'] ) ) ),
				'favfood'   => sanitize_text_field( wp_unslash( ! empty( $_GET['favfood'] ) ) ),
			);
			return array_filter(
				$temp_array,
				function( $x ) {
					return $x;
				}
			);
		}
	}
	/**
	 * Function create_placeholders which is responsible for building a placeholders array which stores and sanitizes all of the incoming URL args.
	 *
	 * @return [this->$arg]
	 */
	public function create_placeholders() {
		return array_map(
			function( $x ) {
				return $x;
			},
			$this->args
		);
	}
	/**
	 * Function create_where_text whose sole responsiblity is to cerate a string with the value of 'where species equals this’.
	 *
	 * @return [$where_query]
	 */
	public function create_where_text() {
		$where_query = '';

		if ( count( $this->args ) ) {
			$where_query = 'WHERE ';
		}

		$current_position = 0;
		foreach ( $this->args as $index => $item ) {
			$where_query .= $this->specific_query( $index );
			if ( count( $this->args ) - 1 !== $current_position ) {
				$where_query .= ' AND ';
			}
			$current_position++;
		}

		return $where_query;
	}
	/**
	 * Function specific_query whose responsibility it is to make getting SQL column names more flexible and easier to list them all out (specifically because of columns like minyear and maxyear, which don’t correspond one-to-one with an exact SQL column name like something like species would)
	 *
	 * @param [number] $index indicates the number of the pet property column name.
	 * @return [$index]
	 */
	public function specific_query( $index ) {
		switch ( $index ) {
			case 'minweight':
				return 'petweight >= %d';
			case 'maxweight':
				return 'petweight <= %d';
			case 'minyear':
				return 'birthyear >= %d';
			case 'maxyear':
				return 'birthyear <= %d';
			default:
				return $index . ' = %s';
		}
	}
}

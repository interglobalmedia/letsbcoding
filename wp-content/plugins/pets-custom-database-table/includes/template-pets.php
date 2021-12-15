<?php
/**
 * Plugin Name: Pet Adoption (Custom DB Table)
 * Description: Template part for displaying pets content in the Pet Adoption (Custom DB Table)
 * Version: 1.0
 * Author: Maria D. Campbell
 * Author URI: https://vwww.letsbcoding.com
 * Text Domain: pets-custom-database-table
 *
 * @package WordPress
 * @link https://www.interglobalmedianetwork.com
 */

?>

<?php

require_once plugin_dir_path( __FILE__ ) . 'GetPets.php';
$get_pets = new GetPets();

get_header();

?>

<div class="page-banner">
	<div class="page-banner__bg-image" style="background-image: url(<?php echo esc_url( get_theme_file_uri( '/images/ocean.jpg' ) ); ?>);"></div>
	<div class="page-banner__content container container--narrow">
		<h1 class="page-banner__title">Pet Adoption</h1>
		<div class="page-banner__intro">
			<p>Providing forever homes one search at a time.</p>
		</div>
	</div>  
</div>

<div class="container container--narrow page-section">
	<p class="table-results">This page took <strong><?php echo esc_html( timer_stop() ); ?></strong> seconds to prepare. Found <strong><?php echo number_format( $get_pets->count ); ?></strong> results (showing all <?php echo count( $get_pets->pets ); ?> results).</p>
	<div class="table-wrapper">
		<table class="pet-adoption-table">
			<thead>
				<tr>
					<th class="table-search"><input type="text" name="table-search" placeholder="search name"></th>
					<th class="table-search"><input type="text" name="table-search" placeholder="search species"></th>
					<th class="table-search"><input type="text" name="table-search" placeholder="search weight"></th>
					<th class="table-search"><input type="text" name="table-search" placeholder="search birth year"></th>
					<th class="table-search"><input type="text" name="table-search" placeholder="search favorite hobby"></th>
					<th class="table-search"><input type="text" name="table-search" placeholder="search favorite color"></th>
					<th class="table-search"><input type="text" name="table-search" placeholder="search favorite food"></th>
					<th></th>
				</tr>
				<tr>
					<th>Pet Name</th>
					<th>Species</th>
					<th>Weight</th>
					<th>Birth Year</th>
					<th>Favorite Hobby</th>
					<th>Favorite Color</th>
					<th>Favorite Food</th>
		<?php
		if ( current_user_can( 'administrator' ) ) {
			?>
					<th>Delete</th>
		<?php } ?>
				</tr>
			</thead>
		<?php
		foreach ( $get_pets->pets as $pet ) {
			?>
			<tbody>
				<tr>
					<td><?php echo esc_html( $pet->petname ); ?></td>
					<td><?php echo esc_html( $pet->species ); ?></td>
					<td><?php echo esc_html( $pet->petweight ); ?></td>
					<td><?php echo esc_html( $pet->birthyear ); ?></td>
					<td><?php echo esc_html( $pet->favhobby ); ?></td>
					<td><?php echo esc_html( $pet->favcolor ); ?></td>
					<td><?php echo esc_html( $pet->favfood ); ?></td>
				<?php
				if ( current_user_can( 'administrator' ) ) {
					?>
					<td class="delete-pet">
						<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST">
							<input type="hidden" name="action" value="deletepet">
							<input type="hidden" name="idtodelete" value="<?php echo esc_attr( $pet->id ); ?>">
							<button class="delete-pet-button">X</button>
						</form>
					</td>
					<?php
				}
				?>
				</tr>
			</tbody>
			<?php } ?>
		</table>
	</div>
</div>
	<?php

	if ( current_user_can( 'administrator' ) ) {
		?>
	<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="create-pet-form" method="POST">
	<h2>Create a new pet</h2>
		<p>Enter the name and details for a new pet below.</p>
		<input type="hidden" name="action" value="createpet">
		<fieldset><label>Pet Name:</label> <input type="text" name="newpetname" placeholder="name ..." required></fieldset>
		<fieldset><label>Species:</label> <input type="text" name="newspecies" placeholder="species ..." required></fieldset>
		<fieldset><label>Pet Weight:</label> <input type="text" name="newpetweight" placeholder="pet weight ..." required></fieldset>
		<fieldset><label>Birth Year:</label> <input type="text" name="newbirthyear" placeholder="birth year ..." required></fieldset>
		<fieldset><label>Favorite Hobby:</label> <input type="text" name="newfavhobby" placeholder="favorite hobby ..." required></fieldset>
		<fieldset><label>Favorite Color:</label> <input type="text" name="newfavcolor" placeholder="favorite color ..." required></fieldset>
		<fieldset><label>Favorite Food:</label> <input type="text" name="newfavfood" placeholder="favorite food ..." required></fieldset>
		<button class="add-pet">Add Pet</button>
	</form>
		<?php
	}

	?>

</div>

<?php get_footer(); ?>

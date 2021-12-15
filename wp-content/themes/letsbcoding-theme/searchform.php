<?php
/**
 * Default WordPress Search page search form template for the LetsBCoding Theme.
 *
 * @author Maria D. Campbell interglobalmedia@interglobalmedianetwork.com
 * @copyright Copyright (c) 2021 Maria D. Campbell
 *
 * @package WordPress
 * @subpackage LetsBCoding
 * @link https://www.interglobalmedianetwork.com
 * @since LetsBCoding 2.0.0
 */

?>

<form class="search-form" method="get" action="<?php echo esc_url( site_url( '/' ) ); ?>">
	<label class="headline headline--medium" for="s">Perform a New Search:</label>
	<div class="search-form-row">
		<input class="s" id="s" type="search" name="s" placeholder="Search for ...">
		<button class="search-submit" type="submit">Submit</button>
	</div>
</form>

<?php
/**
 * Template part for displaying professor content in the LetsBCoding Theme in the default WordPress search using search.php.
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

<h3 class="headline headline--medium">Professor</h3>
<div class="post-item">
	<li class="professor-card__list-item">
		<a class="professor-card" href="<?php echo esc_url( get_the_permalink() ); ?>">
		<img class="professor-card__image" src="<?php echo esc_url( get_the_post_thumbnail_url( 'professorLandscape' ) ); ?>">
		<span class="professor-card__name"><?php esc_html( get_the_title() ); ?></span>
		</a>
	</li>
</div>

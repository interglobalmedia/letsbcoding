<?php
/**
 * Template part for displaying campus content in the LetsBCoding Theme default WordPress Search using search.php.
 *
 * @author Maria D. Campbell interglobalmedia@interglobalmedianetwork.com
 * @copyright  Copyright (c) 2021 Maria D. Campbell
 *
 * @package WordPress
 * @subpackage LetsBcoding
 * @since LetsBCoding 1.0.0
 */

?>
<div class="post-item">
	<h2><a class="headline headline--medium headline--post-title" href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h2>

	<div class="generic-content">
		<p><?php echo wp_kses_post( get_the_excerpt() ); ?></p>
		<p><a class="btn btn--blue" href="<?php echo esc_url( get_the_permalink() ); ?>">View campus &raquo;</a></p>
	</div>

</div>

<?php
/**
 * Template part for displaying page content in the LetsBCoding Theme in the default Wordpress search using search.php.
 *
 * @author Maria D. Campbell interglobalmedia@interglobalmedianetwork.com
 * @copyright Copyright (c) 2021 Maria D. Campbell
 *
 * @package WordPress
 * @subpackage LetsBcoding
 * @link https://www.interglobalmedianetwork.com
 * @since LetsBCoding 2.0.0
 */

?>

<div class="post-item">
	<h2><a class="headline headline--medium headline--post-title" href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h2>
	<div class="metabox">
		<p>Posted by 
		<?php
		the_author_posts_link();
		?>
			on <?php echo esc_html( get_the_time( 'n.j.y' ) ); ?> in <?php echo wp_kses_post( get_the_category_list( ', ' ) ); ?></p>
	</div>

	<div class="generic-content">
		<p><?php echo esc_html( get_the_excerpt() ); ?></p>
		<p><a class="btn btn--blue" href="<?php echo esc_url( get_the_permalink() ); ?>">Continue reading &raquo;</a></p>
	</div>

</div>

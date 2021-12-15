<?php
/**
 * Template part for displaying tag content in the LetsBCoding Theme in tag.php.
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

<div class="post-item">
	<h2><a class="headline headline--medium headline--post-title" href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h2>
	<div class="metabox">
		<p>
		<?php
		$u_time              = get_the_time( 'U' );
			$u_modified_time = get_the_modified_time( 'U' );
		if ( $u_modified_time >= $u_time + 86400 ) {
			echo esc_html( 'Last updated by ' );
			the_author_posts_link();
			echo esc_html( ' on ' );
			echo esc_html( get_the_modified_time( 'n.j.y' ) );
		} else {
			echo esc_html( 'Posted by ' );
			the_author_posts_link();
			echo esc_html( ' on ' );
			echo esc_html( get_the_time( 'n.j.y' ) );
			echo esc_html( ' in ' );
		}
		?>
		</p>
	</div>

	<div class="generic-content">
		<p><?php echo esc_html( get_the_excerpt() ); ?></p>
		<p><a class="btn btn--blue" href="<?php echo esc_url( get_the_permalink() ); ?>">Continue reading &raquo;</a></p>
	</div>

</div>

<?php
/**
 * Template part for displaying course content in archive-course.php in the LetsBCoding Theme and in the default WordPress search using search.php.
 *
 * @author Maria D. Campbell interglobalmedia@interglobalmedianetwork.com
 * @copyright  Copyright (c) 2021 Maria D. Campbell
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
		<p>Posted by <?php the_author_posts_link(); ?> on <?php echo esc_html( get_the_time( 'n.j.y' ) ); ?> in 
													<?php
													$related_programs = get_field( 'related_programs' );

													if ( $related_programs ) {
														foreach ( $related_programs as $program ) {
															?>
	<a href="<?php echo esc_url( get_the_permalink( $program ) ); ?>"><?php echo esc_html( get_the_title( $program ) ); ?></a>
															<?php
														}
													}
													?>
		</p>
	</div>

	<div class="generic-content">
		<p><?php echo wp_kses_post( get_the_excerpt() ); ?></p>
		<p><a class="btn btn--blue" href="<?php echo esc_url( get_the_permalink() ); ?>">Continue reading &raquo;</a></p>
	</div>

</div>

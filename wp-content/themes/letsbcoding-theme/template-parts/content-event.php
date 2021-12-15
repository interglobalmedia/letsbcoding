<?php
/**
 * Template part for displaying event content in archive-event.php in the LetsBCoding Theme default WordPress search using search.php.
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

<div class="event-summary">
	<a class="event-summary__date event-summary__date--blue t-center" href="<?php echo esc_url( get_the_permalink() ); ?>">
	<span class="event-summary__month">
	<?php
		$event_date = new DateTime( get_field( 'event_date', false, false ) );
		echo esc_html( $event_date->format( 'M' ) )
	?>
		</span>
	<span class="event-summary__day">
	<?php
		echo esc_html( $event_date->format( 'd' ) )
	?>
		</span>
	</a>
	<div class="event-summary__content">
	<h5 class="event-summary__title headline headline--tiny"><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h5>
	<p>
	<?php
	if ( has_excerpt() ) {
		echo esc_html( get_the_excerpt() );
	} else {
		echo esc_html( wp_trim_words( get_the_content(), 18 ) );
	}
	?>
		<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="nu gray">Read more</a></p>
	</div>
</div>

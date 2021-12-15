<?php
/**
 * Template for events content in the LetsBCoding Theme.
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

<?php

get_header();
page_banner(
	array(
		'title'    => 'All Events',
		'subtitle' => 'Check out our upcoming events!',
	)
);
?>

<div class="container container--narrow page-section">
<?php
while ( have_posts() ) {
	the_post();
	get_template_part( 'template-parts/content', 'event' );
}
	echo wp_kses_post( paginate_links() );
?>

<hr class="section-break">
<p>Looking for a recap of past events? <a href="<?php echo esc_url( site_url( '/past-events' ) ); ?>">Check out our past events archive</a>.</p>
</div>

<?php get_footer(); ?>

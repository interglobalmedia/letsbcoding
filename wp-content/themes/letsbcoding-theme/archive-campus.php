<?php
/**
 * Template for campuses content in the LetsBCoding Theme.
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
		'title'    => 'Our Campuses',
		'subtitle' => 'We have several conveniently located campuses.',
	)
);
?>

<div class="container container--narrow page-section">

	<div class="acf-map">

	<?php
	while ( have_posts() ) {
		the_post();
		$map_location = get_field( 'map_location' );
		?>
		<div class="marker" data-lat="<?php echo esc_attr( $map_location['lat'] ); ?>" data-lng="<?php echo esc_attr( $map_location['lng'] ); ?>">
		<h3><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
		<?php echo esc_html( $map_location['address'] ); ?>
		</div>
	<?php } ?>
	</div>

</div>

<?php get_footer();

?>

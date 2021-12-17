<?php
/**
 * Tags page template for post type tag for the LetsBCoding Theme.
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
		'title'    => 'All Tags',
		'subtitle' => 'A tag cloud of all site tags.',
	)
);
?>

<div class="container container--narrow page-section">
	<div class="metabox metabox--position-up metabox--with-home-link">
		<p><a class="metabox__blog-home-link" href="<?php echo esc_url( site_url( '/blog' ) ); ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a>
	</div>
	<?php
		get_template_part( 'template-parts/content', 'tagcloud' );
	?>
</div>

<?php get_footer(); ?>

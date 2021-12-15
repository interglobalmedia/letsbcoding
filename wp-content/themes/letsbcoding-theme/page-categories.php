<?php
/**
 * Categories page template for post categories for the LetsBCoding Theme.
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
		'title'    => 'All Categories',
		'subtitle' => 'A list of all post categories.',
	)
);
?>

<div class="container container--narrow page-section">
	<div class="metabox metabox--position-up metabox--with-home-link">
		<p><a class="metabox__blog-home-link" href="<?php echo esc_url( site_url( '/blog' ) ); ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a>
	</div>
	<?php
		get_template_part( 'template-parts/content', 'categories' );
	?>
	<div>
	</div>
</div>

<?php get_footer(); ?>

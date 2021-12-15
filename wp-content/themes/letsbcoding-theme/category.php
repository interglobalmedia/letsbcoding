<?php
/**
 * Category template for the LetsBCoding Theme.
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
		'title'    => get_the_archive_title(),
		'subtitle' => get_the_archive_description(),
	)
);
?>

<div class="container container--narrow page-section">
	<div class="metabox metabox--position-up metabox--with-home-link">
		<p><a class="metabox__blog-home-link" href="<?php echo esc_url( site_url( '/categories' ) ); ?>"><i class="fa fa-home" aria-hidden="true"></i> Categories Home</a>
	</div>
	<?php
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', 'category' );
	}
		echo wp_kses_post( paginate_links() );
	?>
</div>

<?php get_footer(); ?>

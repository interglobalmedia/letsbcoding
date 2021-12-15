<?php
/**
 * Blog page
 *
 * Blog page file for the LetsBCoding Theme.
 *
 * @package    WordPress
 * @subpackage LetsBCoding
 * @author     Maria D. Campbell interglobalmedia@interglobalmedianetwork.com
 * @copyright  Copyright (c) 2021 Maria D. Campbell
 * @link       https://www.interglobalmedianetwork.com
 * @since      2.0.0
 */

?>

<?php
get_header();
page_banner(
	array(
		'title'    => 'Welcome to our blog!',
		'subtitle' => 'Keep up with our latest news.',
	)
);
?>

<div class="container container--narrow page-section">
	<div class="metabox metabox--position-up metabox--with-home-link">
		<p><a class="metabox__blog-home-link" href="<?php echo esc_url( site_url( '/' ) ); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
	</div>
<?php
while ( have_posts() ) {
	the_post();
	get_template_part( 'template-parts/content', 'post' );
}
	echo wp_kses_post( paginate_links() );
?>
</div>

<?php get_footer(); ?>

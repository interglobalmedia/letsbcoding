<?php
/**
 * Students page template student custom post type for the LetsBCoding Theme.
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
		'title'    => 'Featured Students',
		'subtitle' => 'A list of featured students at LetsBCoding',
	)
);
?>

	<div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
			<p><a class="metabox__blog-home-link" href="<?php echo esc_url( site_url( '/courses' ) ); ?>"><i class="fa fa-home" aria-hidden="true"></i> Courses Home</a></p>
		</div>
		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', 'students' );
		}
		echo wp_kses_post( paginate_links() );
		?>
	</div>

<?php get_footer(); ?>

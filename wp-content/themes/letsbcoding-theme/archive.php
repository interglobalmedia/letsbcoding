<?php
/**
 * Archive template for the LetsBCoding Theme.
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
<?php
while ( have_posts() ) {
	the_post();
	?>
		<div class="post-item">
			<h2><a class="headline headline--medium headline--post-title" href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h2>

			<div class="metabox">
				<p>Posted by 
				<?php
				the_author_posts_link();
				?>

				on <?php echo esc_html( get_the_time( 'n.j.y' ) ); ?></p>
			</div>

			<div class="generic-content">
				<p><?php echo esc_html( get_the_excerpt() ); ?></p>
				<p><a class="btn btn--blue" href="<?php echo esc_url( get_the_permalink() ); ?>">Continue reading &raquo;</a></p>
			</div>

		</div>
	<?php
}
	echo wp_kses_post( paginate_links() );
?>
</div>

<?php get_footer(); ?>

<?php
/**
 * Template for programs content in the LetsBCoding Theme.
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
		'title'    => 'All Programs',
		'subtitle' => 'There is something for everyone. Have a look around.',
	)
);
?>

<div class="container container--narrow page-section">
	<div class="metabox metabox--position-up metabox--with-home-link">
		<p><a class="metabox__blog-home-link" 
		href="
		<?php
		echo esc_url( site_url( '/courses' ) );
		?>
		"><i class="fa fa-home" aria-hidden="true"></i> Courses Home</a>
	</div>
	<ul class="program-list total-list">

	<?php
	while ( have_posts() ) {
		the_post();
		?>
			<li><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></li>
		<?php
	}
		echo wp_kses_post( paginate_links() );
	?>

	</ul>

</div>

<?php get_footer(); ?>

<?php
/**
 * Template for students content in the LetsBCoding Theme.
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
		'title'    => 'Students',
		'subtitle' => 'A list of posts about featured students at LetsBCoding',
	)
);
?>

<div class="container container--narrow page-section">
	<div class="metabox metabox--position-up metabox--with-home-link">
		<p><a class="metabox__blog-home-link" 
		href="
		<?php
		echo esc_url( site_url( '/programs' ) );
		?>
		"><i class="fa fa-home" aria-hidden="true"></i> Programs Home</a>
	</div>
	<?php
	while ( have_posts() ) {
		the_post();
		?>
		<div class="post-item">
			<h2><a class="headline headline--medium headline--post-title" href="
			<?php
			echo esc_url( get_the_permalink() );
			?>
			">
			<?php echo esc_html( get_the_title() ); ?></a></h2>

			<div class="metabox">
				<p>
				<?php
				$u_time          = get_the_time( 'U' );
				$u_modified_time = get_the_modified_time( 'U' );
				if ( $u_modified_time >= $u_time + 86400 ) {
					echo esc_html( 'Last updated by ' );
					the_author_posts_link();
					echo esc_html( ' on ' );
					echo esc_html( get_the_modified_time( 'n.j.y' ) );
				} else {
					echo esc_html( 'Posted by ' );
					the_author_posts_link();
					echo esc_html( ' on ' );
					echo esc_html( get_the_time( 'n.j.y' ) );
				}
				?>
				</p>
			</div>

			<div class="generic-content">
				<p><?php echo wp_kses_post( get_the_excerpt() ); ?></p>
				<p><a class="btn btn--blue" 
				href="<?php echo esc_url( get_the_permalink() ); ?>">Continue reading &raquo;</a></p>
			</div>

		</div>
		<?php
	}
		echo wp_kses_post( paginate_links() );
	?>
</div>

<?php get_footer(); ?>

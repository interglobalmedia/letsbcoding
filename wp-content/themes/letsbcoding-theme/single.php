<?php
/**
 * Single page template for the LetsBCoding Theme.
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
while ( have_posts() ) {
	the_post();
	page_banner();
	?>

	<div class="container container--narrow page-section">

		<div class="metabox metabox--position-up metabox--with-home-link">
			<p>
				<a class="metabox__blog-home-link" href="<?php echo esc_url( site_url( '/blog' ) ); ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a> 
				<div class="metabox__blog__main">Posted by <?php the_author_posts_link(); ?> 
				on <?php echo esc_html( get_the_time( 'n.j.y' ) ); ?>
				</div>
			</p>
			<p>
				<strong class="last-modified">
		<?php
			$u_time          = get_the_time( 'U' );
			$u_modified_time = get_the_modified_time( 'U' );
		if ( $u_modified_time >= $u_time + 86400 ) {
			echo esc_html( 'Last modified' );
			echo esc_html( ' on ' );
			echo esc_html( get_the_modified_time( 'n.j.y' ) );
			echo esc_html( ' at ' );
			echo esc_html( get_the_modified_time() );
		}
		?>

				</strong>
			</p>
		</div>
		<div class="breadcrumb-wrapper">
			<span class="post-cat-breadcrumb"><?php bcoding_get_cat_breadcrumb(); ?></span>
			<span class="post-tag-breadcrumb"><?php bcoding_get_tag_breadcrumb(); ?></span>
			<span class="post-genre-breadcrumb"><?php bcoding_get_post_genre_breadcrumb(); ?></span>
			<span class="post-label-breadcrumb"><?php bcoding_get_post_label_breadcrumb(); ?></span>
		</div>
		<div class="generic-content">
			<?php
			echo wp_kses_post( apply_filters( 'the_content', get_the_content() ) );
			?>
		</div>
	</div>
<?php }

get_footer();

?>

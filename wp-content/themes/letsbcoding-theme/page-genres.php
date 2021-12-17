<?php
/**
 * Taxonomy page template for the post genre custom taxonomy for the LetsBCoding Theme.
 *
 * @author Maria D. Campbell interglobalmedia@interglobalmedianetwork.com
 * @copyright Copyright (c) 2021 Maria D. Campbell
 *
 * @package WordPress
 * @subpackage LetsBCoding
 * @link https://www.interglobalmedianetwork.com
 * @since LetsBCoding 2.0.0
 */

get_header();
page_banner(
	array(
		'title'    => 'Post Genres',
		'subtitle' => 'A Genre Cloud for all Post Genres on the LetsBCoding Blog.',
	)
);
?>

<div class="container container--narrow page-section">
		<div class="metabox metabox--position-up metabox--with-home-link">
			<p><a class="metabox__blog-home-link" href="<?php echo esc_url( site_url( '/blog' ) ); ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a>
		</div>
		<ul class="post-genre-cloud">
			<?php

			// Get the taxonomy's terms !
			$post_genre_terms = get_terms(
				array(
					'taxonomy'   => 'genre',
					'hide_empty' => false,
				)
			);

			// Check if any term exists !
			if ( ! empty( $post_genre_terms ) && is_array( $post_genre_terms ) ) {
				// Run a loop and print them all !
				foreach ( $post_genre_terms as $post_genre_term ) {
					?>
					<li class="post-genre-taxonomy">
					<a href="<?php echo esc_url( get_term_link( $post_genre_term ) ); ?>">
						<?php echo esc_html( $post_genre_term->name ); ?>
					</a></li>
					<?php
				}
			}
			?>
		</ul>
	</div>

<?php get_footer(); ?>

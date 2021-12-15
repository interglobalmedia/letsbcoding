<?php
/**
 * Sitemap page template for the LetsBCoding Theme.
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
	page_banner(
		array(
			'title'    => 'Sitemap',
			'subtitle' => 'A model of the site content designed to help navigate the site.',
		)
	);
	?>

	<div class="container container--narrow page-section">
			<?php
			$the_parent = wp_get_post_parent_id( get_the_ID() );
			$test_array = get_pages(
				array(
					'child_of' => get_the_ID(),
				)
			);

			if ( $the_parent || $test_array ) {
				?>
		<div class="page-links">
			<h2 class="page-links__title"><a href="<?php echo esc_url( get_the_permalink( $the_parent ) ); ?>"><?php echo esc_html( get_the_title( $the_parent ) ); ?></a></h2>
			<ul class="min-list">
				<?php

				if ( $the_parent ) {
					$find_children_of = $the_parent;
				} else {
					$find_children_of = get_the_ID();
				}

				wp_list_pages(
					array(
						'title_li'    => null,
						'child_of'    => $find_children_of,
						'sort_column' => 'menu_order',
					)
				);
				?>
			</ul>
		</div>
		<?php } ?>
		<div class="generic-content">
			<div class="sitemap-content">
		<?php
			get_template_part( 'template-parts/content', 'sitemap' );
		?>
			</div>
		</div>
	</div>

<?php }

get_footer();

?>

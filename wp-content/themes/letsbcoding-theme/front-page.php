<?php
/**
 * Front page template for the LetsBCoding Theme.
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
?>

<div class="page-banner">
	<div class="page-banner__bg-image" style="background-image: url(<?php echo esc_url( get_theme_file_uri( '/images/library-hero.jpg' ) ); ?>);"></div>
	<div class="page-banner__content container t-center c-white">
		<h1 class="headline headline--large">Welcome!</h1>
		<h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
		<h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>program</strong> you&rsquo;re interested in?</h3>
		<a href="<?php echo esc_url( get_post_type_archive_link( 'program' ) ); ?>" class="btn btn--large btn--blue">Find Your Program</a>
	</div>
</div>

<div class="full-width-split group">
	<div class="full-width-split__one">
		<div class="full-width-split__inner">
			<h2 class="headline headline--small-plus t-center">Upcoming Events</h2>

			<?php
				// phpcs:disable WordPress.DateTime.RestrictedFunctions.date_date
				$today            = date( 'Ymd' );
				$home_page_events = new WP_Query(
					array(
						'posts_per_page' => 2,
						'post_type'      => 'event',
						// phpcs:disable WordPress.DB.SlowDBQuery.slow_db_query_meta_key
						'meta_key'       => 'event_date',
						'orderby'        => 'meta_value_num',
						'order'          => 'ASC',
						// phpcs:disable WordPress.DB.SlowDBQuery.slow_db_query_meta_query
						'meta_query'     => array(
							array(
								'key'     => 'event_date',
								'compare' => '>=',
								'value'   => $today,
								'type'    => 'numeric',
							),
						),
					)
				);

				while ( $home_page_events->have_posts() ) {
					$home_page_events->the_post();
					get_template_part( 'template-parts/content', 'event' );
				}
				wp_reset_postdata();
				?>

				<p class="t-center no-margin"><a href="<?php echo esc_url( get_post_type_archive_link( 'event' ) ); ?>" class="btn btn--blue">View All Events</a></p>
			</div>
		</div>
		<div class="full-width-split__two">
			<div class="full-width-split__inner">
				<h2 class="headline headline--small-plus t-center">From Our Blogs</h2>
				<?php
					$home_page_posts = new WP_Query(
						array(
							'posts_per_page' => 2,
						)
					);
					while ( $home_page_posts->have_posts() ) {
						$home_page_posts->the_post();
						?>
				<div class="event-summary">
					<a class="event-summary__date event-summary__date--beige t-center" href="<?php echo esc_url( get_the_permalink() ); ?>">
					<span class="event-summary__month"><?php echo esc_html( get_the_time( 'M' ) ); ?></span>
					<span class="event-summary__day"><?php echo esc_html( get_the_time( 'd' ) ); ?></span>
					</a>
					<div class="event-summary__content">
						<h5 class="event-summary__title headline headline--tiny"><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h5>
						<p>
						<?php
						if ( has_excerpt() ) {
							echo esc_html( get_the_excerpt() );
						} else {
							echo esc_html( wp_trim_words( get_the_content(), 18 ) );
						}
						?>
						<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="nu gray">Read more</a>
						</p>
					</div>
				</div>
						<?php
					}
					wp_reset_postdata();
					?>

				<p class="t-center no-margin"><a href="<?php echo esc_url( site_url( '/blog' ) ); ?>" class="btn btn--yellow">View All Blog Posts</a></p>
			</div>
		</div>
	</div>
<div class="hero-slider">
	<div data-glide-el="track" class="glide__track">
		<div class="glide__slides">
		<?php
		$slider_posts = new WP_Query(
			array(
				'posts_per_page' => -1,
				'post_type'      => 'slide',
			)
		);
		while ( $slider_posts->have_posts() ) {
			$slider_posts->the_post();
			?>
		<div class="hero-slider__slide" style="background-image: url(
			<?php
				$slide_image = get_field( 'slide_photograph' );
				echo esc_url( $slide_image['sizes']['pageBanner'] );
			?>
		);">
			<div class="hero-slider__interior container">
				<div class="hero-slider__overlay">
					<h2 class="headline headline--medium t-center"><?php echo esc_html( get_field( 'slide_title' ) ); ?></h2>
					<p class="t-center no-overflow"><?php echo esc_html( get_field( 'slide_subtitle' ) ); ?></p>
					<p class="t-center no-margin"><a href="<?php echo esc_url( get_field( 'slide_link_value' ) ); ?>" class="btn btn--blue"><?php echo esc_html( get_field( 'slide_link_text' ) ); ?></a></p>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
		<div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
	</div>
</div>

<?php get_footer();

?>

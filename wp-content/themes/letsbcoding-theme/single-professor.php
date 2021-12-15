<?php
/**
 * Single professor template for professor custom post type for the LetsBCoding Theme.
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
		<div class="generic-content">
			<div class="row group">
				<div class="one-third">
					<?php the_post_thumbnail( 'professorPortrait' ); ?>
				</div>

				<div class="two-thirds">
				<?php

				$like_count = new WP_Query(
					array(
						'post_type'  => 'like',
						// phpcs:disable WordPress.DB.SlowDBQuery.slow_db_query_meta_query
						'meta_query' => array(
							array(
								'key'     => 'liked_professor_id',
								'compare' => '=',
								'value'   => get_the_ID(),
							),
						),
					)
				);

				$exist_status = 'no';

				if ( is_user_logged_in() ) {
					$exist_query = new WP_Query(
						array(
							'author'     => get_current_user_id(),
							'post_type'  => 'like',
							'meta_query' => array(
								array(
									'key'     => 'liked_professor_id',
									'compare' => '=',
									'value'   => get_the_ID(),
								),
							),
						)
					);

					if ( $exist_query->found_posts ) {
						$exist_status = 'yes';
					}
				}
				?>
				<span class="like-box" data-like="<?php echo esc_attr( $exist_query->posts[0]->ID ); ?>" data-professor="<?php echo esc_attr( get_the_ID() ); ?>" data-exists="<?php echo esc_attr( $exist_status ); ?>">
					<i class="fa fa-heart-o" aria-hidden="true"></i>
					<i class="fa fa-heart" aria-hidden="true"></i>
					<span class="like-count"><?php echo esc_html( $like_count->found_posts ); ?></span>
				</span>
				<?php
				echo wp_kses_post( apply_filters( 'the_content', get_the_content() ) );
				?>
				<?php

				$related_programs = get_field( 'related_programs' );

				$single_prof_hr_class_section_break     = '<hr class="section-break">';
				$single_prof_h3_class_headline_subjects = '<h3 class="headline headline--medium">Subject(s) Taught</h3>';

				$single_prof_ul_class_link_list = '<ul class="min-list link-list">';
				$single_prof_ul_closing_tag     = '</ul>';

				if ( $related_programs ) {
					echo wp_kses(
						$single_prof_hr_class_section_break,
						array(
							'hr' => array(
								'class' => array(),
							),
						)
					);
					echo wp_kses(
						$single_prof_h3_class_headline_subjects,
						array(
							'h3' => array(
								'class' => array(),
							),
						)
					);
					echo wp_kses(
						$single_prof_ul_class_link_list,
						array(
							'ul' => array(
								'class' => array(),
							),
						)
					);
					foreach ( $related_programs as $related_program ) {
						?>
					<li><a href="<?php echo esc_url( get_the_permalink( $related_program ) ); ?>"><?php echo esc_html( get_the_title( $related_program ) ); ?></a></li>
						<?php
					}
					echo wp_kses(
						$single_prof_ul_closing_tag,
						array(
							'ul' => array(),
						)
					);
				}
				?>
				<div class="breadcrumb-wrapper">
					<span class="professor-collaboration-breadcrumb"><?php bcoding_get_professor_collaboration_breadcrumb(); ?></span>
					<span class="professor-location-breadcrumb"><?php bcoding_get_professor_location_breadcrumb(); ?></span>
					<span class="professor-subject-breadcrumb"><?php bcoding_get_professor_subject_breadcrumb(); ?></span>
					<span class="professor-theme-breadcrumb"><?php bcoding_get_professor_theme_breadcrumb(); ?></span>
					<span class="professor-workflow-breadcrumb"><?php bcoding_get_professor_workflow_breadcrumb(); ?></span>
				</div>
			</div>
		</div>
	</div>
<?php }

get_footer();

?>

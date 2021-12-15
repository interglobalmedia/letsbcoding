<?php
/**
 * Single student template for student custom post type for the LetsBCoding Theme.
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
				<?php the_post_thumbnail( 'studentPortrait' ); ?>
				</div>

				<div class="two-thirds">
				<?php

				$like_student_count = new WP_Query(
					array(
						'post_type'  => 'studentlike',
						// phpcs:disable WordPress.DB.SlowDBQuery.slow_db_query_meta_query
						'meta_query' => array(
							array(
								'key'     => 'liked_student_id',
								'compare' => '=',
								'value'   => get_the_ID(),
							),
						),
					)
				);

				$exist_student_status = 'no';

				if ( is_user_logged_in() ) {
					$exist_student_query = new WP_Query(
						array(
							'author'     => get_current_user_id(),
							'post_type'  => 'studentlike',
							'meta_query' => array(
								array(
									'key'     => 'liked_student_id',
									'compare' => '=',
									'value'   => get_the_ID(),
								),
							),
						)
					);

					if ( $exist_student_query->found_posts ) {
						$exist_student_status = 'yes';
					}
				}
				?>
					<span class="student-like-box" data-student-like="<?php echo esc_attr( $exist_student_query->posts[0]->ID ); ?>" data-student="<?php echo esc_attr( get_the_ID() ); ?>" data-student-exists="<?php echo esc_attr( $exist_student_status ); ?>">
						<i class="fa fa-heart-o" aria-hidden="true"></i>
						<i class="fa fa-heart" aria-hidden="true"></i>
						<span class="student-like-count"><?php echo esc_html( $like_student_count->found_posts ); ?></span>
					</span>
					<?php
						echo wp_kses_post( apply_filters( 'the_content', get_the_content() ) );
					?>
					<?php
					$related_programs = get_field( 'related_programs' );

					if ( $related_programs ) {
						$single_student_hr_class_section_break = '<hr class="section-break">';
						$single_student_h3_class_headline      = '<h3 class="headline headline--medium">Subject(s) Studied</h3>';
						$single_student_ul_class_link_list     = '<ul class="link-list min-list">';
						$single_student_ul_closing_tag         = '</ul>';
						echo wp_kses(
							$single_student_hr_class_section_break,
							array(
								'hr' => array(
									'class' => array(),
								),
							)
						);
						echo wp_kses(
							$single_student_h3_class_headline,
							array(
								'h3' => array(
									'class' => array(),
								),
							)
						);
						echo wp_kses(
							$single_student_ul_class_link_list,
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
							$single_student_ul_closing_tag,
							array(
								'ul' => array(),
							)
						);
					}
					?>
					<div class="breadcrumb-wrapper">
						<span class="student-collaboration-breadcrumb"><?php bcoding_get_student_collaboration_breadcrumb(); ?></span>
						<span class="student-subject-breadcrumb"><?php bcoding_get_student_subject_breadcrumb(); ?></span>
						<span class="student-theme-breadcrumb"><?php bcoding_get_student_theme_breadcrumb(); ?></span>
						<span class="student-workflow-breadcrumb"><?php bcoding_get_student_workflow_breadcrumb(); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }

get_footer();

?>

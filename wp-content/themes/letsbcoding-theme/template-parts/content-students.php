<?php
/**
 * Template part for displaying all student links and thumbnails in page-students.php in the LetsBCoding Theme.
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

$all_students = new WP_Query(
	array(
		'posts_per_page' => -1,
		'post_type'      => 'student',
		'orderby'        => 'title',
		'order'          => 'ASC',
	)
);

$all_students_h3_class_headline_profs =
'<h3 class="headline headline--medium headline--all-professors">' . esc_html( 'Featured ' . get_the_title() ) .
'</h3>';
$all_students_ul_class_prof_cards     = '<ul class="professor-cards professor-cards__all-professors">';
$all_students_ul_closing_tag          = '</ul>';

echo wp_kses(
	$all_students_h3_class_headline_profs,
	array(
		'h3' => array(
			'class' => array(),
		),
	)
);

echo wp_kses(
	$all_students_ul_class_prof_cards,
	array(
		'ul' => array(
			'class' => array(),
		),
	)
);

while ( $all_students->have_posts() ) {
	$all_students->the_post();
	?>
	<li class="professor-card__list-item">
		<a class="professor-card" href="<?php echo esc_url( get_the_permalink() ); ?>">
			<img class="professor-card__image" src="
			<?php
			global $post;
			echo esc_attr( get_the_post_thumbnail_url( $post->ID, 'studentLandscape' ) );
			?>
			">
			<span class="professor-card__name"><?php echo esc_html( get_the_title() ); ?></span>
		</a>
	</li>
	<?php }

echo wp_kses(
	$all_students_ul_closing_tag,
	array(
		'ul' => array(),
	)
);

?>

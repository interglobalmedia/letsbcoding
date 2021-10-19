<?php get_header(); 
	pageBanner(array(
		'title' => 'Courses',
		'subtitle' => 'All Courses Being Offered at LetsBCoding'
	));
?>

<div class="container container--narrow page-section">
<?php 
	while (have_posts()) {
		the_post();
		get_template_part('template-parts/content', 'course');
	}
	echo paginate_links();
?>
</div>

<?php get_footer(); ?>
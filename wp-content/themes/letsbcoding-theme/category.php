<?php get_header(); 
	pageBanner(array(
		'title' => get_the_archive_title(),
		'subtitle' => get_the_archive_description()
	));
?>

<div class="container container--narrow page-section">
	<div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo site_url('/categories');  ?>"><i class="fa fa-home" aria-hidden="true"></i> Categories Home</a>
    </div>
	<?php 
		while (have_posts()) {
			the_post();
			get_template_part('template-parts/content', 'category');
		}
		echo paginate_links();
	?>
</div>

<?php get_footer(); ?>
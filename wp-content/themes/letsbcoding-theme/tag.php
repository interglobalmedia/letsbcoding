<?php get_header(); 
	pageBanner(array(
		'title' => get_the_archive_title(),
		'subtitle' => get_the_archive_description()
	));
?>

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo site_url('/tags');  ?>"><i class="fa fa-home" aria-hidden="true"></i> All Tags</a>
    </div>
    <?php 
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/content', 'tag');
       }
        echo paginate_links();
    ?>
</div>

<?php get_footer(); ?>
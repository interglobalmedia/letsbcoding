<?php get_header(); 
	pageBanner(array(
		'title' => 'Welcome to our blog!',
		'subtitle' => 'Keep up with our latest news.'
	));
?>

<div class="container container--narrow page-section">
<?php 
	while (have_posts()) {
		the_post(); ?>
		<div class="post-item">
			<h2><a class="headline headline--medium headline--post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="metabox">
				<p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?></p>
			</div>

			<div class="generic-content">
				<?php the_excerpt(); ?>
				<div class="metabox__categories">
					<p class="categories"><span class="categories-text">categories: in</span> <span class="categories-seperator"><?php echo get_the_category_list(', '); ?></span></p>
				</div>
				<div class="metabox__tags">
					<p class="tags"><span class="tags-text">tags: in</span> <span class="tags-seperator"><?php echo get_the_tag_list('',', ',''); ?></span></p>
				</div>
				<p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue reading &raquo;</a></p>
			</div>

		</div>
	<?php }
	echo paginate_links();
?>
</div>

<?php get_footer(); ?>
<?php get_header(); 
	pageBanner(array(
		'title' => 'Courses',
		'subtitle' => 'All Courses Being Offered at LetsBCoding'
	));
?>

<div class="container container--narrow page-section">
<?php 
	while (have_posts()) {
		the_post(); ?>
		<div class="post-item">
			<h2><a class="headline headline--medium headline--post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="metabox">
				<p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in <?php
        $relatedPrograms = get_field('related_programs');

        if ($relatedPrograms) {
            foreach($relatedPrograms as $program) { ?>
            <a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a>
            <?php }
        }
      ?></p>
			</div>

			<div class="generic-content">
				<?php the_excerpt(); ?>
				<p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue reading &raquo;</a></p>
			</div>

		</div>
	<?php }
	echo paginate_links();
?>
</div>

<?php get_footer(); ?>
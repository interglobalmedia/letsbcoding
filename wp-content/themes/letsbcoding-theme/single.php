<?php

get_header();
while(have_posts()) {
	the_post(); 
    pageBanner();
  ?>
	
  <div class="container container--narrow page-section">

	<div class="metabox metabox--position-up metabox--with-home-link">
		<p><a class="metabox__blog-home-link" href="<?php echo site_url('/blog');  ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a> <span class="metabox__main">Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> </span></p>
	</div>
	<div class="metabox-single-wrapper">
	<div class="metabox__categories--single">
		<p class="categories"><span class="categories-text">categories: in</span> <span class="categories-seperator"><?php echo get_the_category_list(', '); ?></span></p>
	</div>
	<div class="metabox__tags--single">
		<p class="tags"><span class="tags-text">tags: in</span> <span class="tags-seperator"><?php echo get_the_tag_list('',', ',''); ?></span></p>
	</div>
  </div>
	<div class="generic-content">
		<?php the_content(); ?>
	</div>
  </div>
<?php }

get_footer();

?>
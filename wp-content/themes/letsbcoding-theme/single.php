<?php

get_header();
while(have_posts()) {
	the_post(); 
    pageBanner();
  ?>
	
  <div class="container container--narrow page-section">

	<div class="metabox metabox--position-up metabox--with-home-link">
		<p><a class="metabox__blog-home-link" href="<?php echo site_url('/blog');  ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a> <span class="metabox__main">Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?></span></p>
		<p><strong class="last-modified"><?php 
			$u_time = get_the_time('U'); 
			$u_modified_time = get_the_modified_time('U'); 
			if ($u_modified_time >= $u_time + 86400) {  
			echo "<p>Last modified ";
			echo " on ";
			the_modified_time('n.j.y');
			echo " at "; 
			the_modified_time(); 
			echo "</p> "; }  
		?> 
		</strong></p>
	</div>
	<div class="breadcrumb-wrapper">
		<div class="breadcrumb-cat"><?php get_cat_breadcrumb(); ?></div>
		<div class="breadcrumb-tag"><?php get_tag_breadcrumb(); ?></div>
	</div>
	<div class="generic-content">
		<?php the_content(); ?>
	</div>
  </div>
<?php }

get_footer();

?>
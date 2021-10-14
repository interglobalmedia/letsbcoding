<?php get_header(); 
	pageBanner(array(
		'title' => get_the_archive_title(),
		'subtitle' => get_the_archive_description()
	));
?>

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo site_url('/blog');  ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a>
    </div>
    <?php 
        while (have_posts()) {
            the_post(); ?>
            <div class="post-item">
                <h2><a class="headline headline--medium headline--post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="metabox">
                    <p><?php $u_time = get_the_time('U');
						$u_modified_time = get_the_modified_time('U');
						if ($u_modified_time >= $u_time + 86400) {
							echo "Last updated ";
                            echo " by ";
							the_author_posts_link();
                            echo " on ";
							the_modified_time('n.j.y'); 
						}
						else {
							echo "Posted by ";  
							the_author_posts_link();
							echo " on ";
							the_time('n.j.y');
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
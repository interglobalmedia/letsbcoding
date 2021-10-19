<?php get_header(); 
	pageBanner(array(
		'title' => get_the_archive_title(),
		'subtitle' => get_the_archive_description()
	));
?>

<div class="container container--narrow page-section">
<?php 
	while (have_posts()) {
		the_post(); ?>
		<div class="post-item">
        <h2><a class="headline headline--medium headline--post-title" href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
            <div class="metabox">
                <p><?php $u_time = get_the_time('U');
                    $u_modified_time = get_the_modified_time('U');
                    if ($u_modified_time >= $u_time + 86400) {
                        echo "Last updated ";
                        echo " by ";
                        esc_url(the_author_posts_link());
                        echo " on ";
                        the_modified_time('n.j.y'); 
                    }
                    else {
                        echo "Posted by ";  
                        esc_url(the_author_posts_link());
                        echo " on ";
                        the_time('n.j.y');
                    } 
                ?></p>
            </div>
        <div class="generic-content">
            <?php the_excerpt(); ?>
            <p><a class="btn btn--blue" href="<?php esc_url(the_permalink()); ?>">Continue reading &raquo;</a></p>
        </div>
    </div>
	<?php }
	echo paginate_links(); ?>
</div>

<?php get_footer(); ?>
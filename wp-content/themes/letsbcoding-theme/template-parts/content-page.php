<div class="post-item">
    <h2><a class="headline headline--medium headline--post-title" href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
    <div class="metabox">
        <p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in <?php echo get_the_category_list(', '); ?></p>
    </div>

    <div class="generic-content">
        <?php the_excerpt(); ?>
        <p><a class="btn btn--blue" href="<?php esc_url(the_permalink()); ?>">Continue reading &raquo;</a></p>
    </div>

</div>
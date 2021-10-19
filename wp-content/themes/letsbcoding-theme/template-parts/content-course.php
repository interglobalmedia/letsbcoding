<div class="post-item">
    <h2><a class="headline headline--medium headline--post-title" href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
    <div class="metabox">
        <p>Posted by <?php esc_url(the_author_posts_link()); ?> on <?php the_time('n.j.y'); ?> in <?php
$relatedPrograms = get_field('related_programs');

if ($relatedPrograms) {
    foreach($relatedPrograms as $program) { ?>
    <a href="<?php echo esc_url(get_the_permalink($program)); ?>"><?php echo get_the_title($program); ?></a>
    <?php }
}
?></p>
    </div>

    <div class="generic-content">
        <?php the_excerpt(); ?>
        <p><a class="btn btn--blue" href="<?php esc_url(the_permalink()); ?>">Continue reading &raquo;</a></p>
    </div>

</div>
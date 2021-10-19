<div class="post-item">
    <h2><a class="headline headline--medium headline--post-title" href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>

    <div class="generic-content">
        <?php the_excerpt(); ?>
        <p><a class="btn btn--blue" href="<?php esc_url(the_permalink()); ?>">View campus &raquo;</a></p>
    </div>

</div>
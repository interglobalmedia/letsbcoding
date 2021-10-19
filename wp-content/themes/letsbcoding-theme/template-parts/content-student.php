<div class="post-item">
    <li class="professor-card__list-item">
        <a class="professor-card" href="<?php esc_url(the_permalink()); ?>">
        <img class="professor-card__image" src="<?php esc_url(the_post_thumbnail_url('studentLandscape')); ?>">
        <span class="professor-card__name"><?php the_title(); ?></span>
        </a>
    </li>
</div>
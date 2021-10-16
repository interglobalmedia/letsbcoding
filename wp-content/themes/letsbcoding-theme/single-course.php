<?php

get_header();
while (have_posts()) {
  the_post();
  pageBanner();

?>

<div class="container container--narrow page-section">

    <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('course'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Courses</a> <span class="metabox__main"><?php the_title(); ?></span> <p><strong class="in-program">in <?php
        $relatedPrograms = get_field('related_programs');

        if ($relatedPrograms) {
            foreach($relatedPrograms as $program) { ?>
            <a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a>
            <?php }
        }
      ?></strong></p></p>
    </div>
    <div class="generic-content">
      <div class="breadcrumb-wrapper">
        <p class="breadcrumb"><?php bcoding_get_subject_breadcrumb(); ?></p>
        <p class="breadcrumb"><?php bcoding_get_theme_breadcrumb(); ?></p>
      </div>
      <?php the_content(); ?>
    </div>
</div>

<?php }

get_footer();

?>
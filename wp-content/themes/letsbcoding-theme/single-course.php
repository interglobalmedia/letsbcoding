<?php

get_header();
while (have_posts()) {
  the_post();
  pageBanner();

?>

<div class="container container--narrow page-section">

    <div class="metabox metabox--position-up metabox--with-home-link">
      <div class="course-metabox-wrapper"><a class="metabox__courses-home-link" href="<?php echo get_post_type_archive_link('course'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Courses</a><div class="metabox__course__main"><?php the_title(); ?> in <strong class="in-program"><?php
        $relatedPrograms = get_field('related_programs');

        if ($relatedPrograms) {
            foreach($relatedPrograms as $program) { ?>
            <a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a>
            <?php }
        }
      ?></strong></div></div>
    </div>
    <div class="generic-content">
      <div class="breadcrumb-wrapper">
        <p class="breadcrumb"><?php bcoding_get_course_subject_breadcrumb(); ?></p>
        <p class="breadcrumb"><?php bcoding_get_course_theme_breadcrumb(); ?></p>
      </div>
      <?php the_content(); ?>
    </div>
</div>

<?php }

get_footer();

?>
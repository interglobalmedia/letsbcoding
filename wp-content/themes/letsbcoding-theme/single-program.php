<?php

get_header();
while (have_posts()) {
  the_post();
  pageBanner();
?>

  <div class="container container--narrow page-section">

    <div class="metabox metabox--position-up metabox--with-home-link">
      <div class="program-metabox-wrapper"><a class="metabox__programs-home-link" href="<?php echo get_post_type_archive_link('program'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Programs</a> <div class="metabox__program__main"><?php the_title(); ?></div></div>
    </div>
    <div class="generic-content">
      <div class="breadcrumb-wrapper">
        <p class="breadcrumb"><?php bcoding_get_program_subject_breadcrumb(); ?></p>
        <p class="breadcrumb"><?php bcoding_get_program_theme_breadcrumb(); ?></p>
      </div>
      <?php the_content(); ?>
    </div>

    <?php
      $relatedCourses = new WP_Query(array(
      'posts_per_page' => -1,
      'post_type' => 'course',
      'orderby' => 'title',
      'order' => 'ASC',
      'meta_query' => array(
        array(
          'key' => 'related_programs',
          'compare' => 'LIKE',
          'value' => '"' . get_the_ID() . '"'
        ),
      )
    ));

      echo '<hr class="section-break">';
      echo '<h2 class="headline headline--medium"> Available Courses:</h2>';

      echo '<ul class="min-list link-list">';

      while ($relatedCourses->have_posts()) { 
        $relatedCourses->the_post(); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </a>
        </li>
      <?php }
      echo '</ul>';

    wp_reset_postdata();

      $relatedProfessors = new WP_Query(array(
      'posts_per_page' => -1,
      'post_type' => 'professor',
      'orderby' => 'title',
      'order' => 'ASC',
      'meta_query' => array(
        array(
          'key' => 'related_programs',
          'compare' => 'LIKE',
          'value' => '"' . get_the_ID() . '"'
        ),
      )
    ));

    if ($relatedProfessors->have_posts()) {
      echo '<hr class="section-break">';

      echo '<h2 class="headline headline--medium">' . get_the_title() . ' Professors</h2>';

      echo '<ul class="professor-cards">';

      while ($relatedProfessors->have_posts()) {
        $relatedProfessors->the_post(); ?>
        <li class="professor-card__list-item">
          <a class="professor-card" href="<?php the_permalink(); ?>">
            <img class="professor-card__image" src="<?php the_post_thumbnail_url('professorLandscape'); ?>">
            <span class="professor-card__name"><?php the_title(); ?></span>
          </a>
        </li>
      <?php }
      echo '</ul>';
    }

    wp_reset_postdata();
    
    $relatedStudents = new WP_Query(array(
      'posts_per_page' => -1,
      'post_type' => 'student',
      'orderby' => 'title',
      'order' => 'ASC',
      'meta_query' => array(
        array(
          'key' => 'related_programs',
          'compare' => 'LIKE',
          'value' => '"' . get_the_ID() . '"'
        ),
      )
    ));
    
    if ($relatedStudents->have_posts()) {
      echo '<hr class="section-break">';

      echo '<h2 class="headline headline--medium">' . get_the_title() . ' Featured Students</h2>';

      echo '<ul class="professor-cards">';

      while ($relatedStudents->have_posts()) {
        $relatedStudents->the_post(); ?>
        <li class="professor-card__list-item">
          <a class="professor-card" href="<?php the_permalink(); ?>">
            <img class="professor-card__image" src="<?php the_post_thumbnail_url('studentLandscape'); ?>">
            <span class="professor-card__name"><?php the_title(); ?></span>
          </a>
        </li>
      <?php }
      echo '</ul>';
    }

    wp_reset_postdata();

    $today = date('Ymd');
    $homepageEvents = new WP_Query(array(
      'posts_per_page' => 2,
      'post_type' => 'event',
      'meta_key' => 'event_date',
      'orderby' => 'meta_value_num',
      'order' => 'ASC',
      'meta_query' => array(
        array(
          'key' => 'event_date',
          'compare' => '>=',
          'value' => $today,
          'type' => 'numeric'
        ),
        array(
          'key' => 'related_programs',
          'compare' => 'LIKE',
          'value' => '"' . get_the_ID() . '"'
        ),
      )
    ));

    if ($homepageEvents->have_posts()) {
      echo '<hr class="section-break">';

      echo '<h2 class="headline headline--medium">Upcoming ' . get_the_title() . ' Events</h2>';

      while ($homepageEvents->have_posts()) {
        $homepageEvents->the_post();
        get_template_part('template-parts/content', 'event');
      }
    }

    wp_reset_postdata();

    $relatedCampuses = get_field('related_campus');
    
    if ($relatedCampuses) {
      echo '<hr class="section-break">';
      echo '<h2 class="headline headline--medium">' . get_the_title() . ' is Available at These Campuses:</h2>';

      echo '<ul class="min-list link-list">';
          foreach($relatedCampuses as $campus) {
            ?> 
            <li>
              <a href="<?php echo get_the_permalink($campus); ?>"><?php echo get_the_title($campus); ?>
              </a>
            </li> <?php
          }
          echo '</ul>';
    }
      ?>

  </div>
<?php }

get_footer();

?>
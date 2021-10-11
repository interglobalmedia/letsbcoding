<?php

get_header();
while(have_posts()) {
	the_post(); 
  pageBanner();
  ?>
	
  <div class="container container--narrow page-section">
    <div class="generic-content">
      <div class="row group">
        <div class="one-third">
            <?php the_post_thumbnail('studentPortrait'); ?>
        </div>

        <div class="two-thirds">
          <?php 
          
            $likeStudentCount = new WP_Query(array(
              'post_type' => 'studentlike',
              'meta_query' => array(
                array(
                  'key' => 'liked_student_id',
                  'compare' => '=',
                  'value' => get_the_ID()
                )
              )
            ));

            $existStudentStatus = 'no';
            
            if (is_user_logged_in()) {
              $existStudentQuery = new WP_Query(array(
                'author' => get_current_user_id(),
                'post_type' => 'studentlike',
                'meta_query' => array(
                  array(
                    'key' => 'liked_student_id',
                    'compare' => '=',
                    'value' => get_the_ID()
                  )
                )
              ));

              if ($existStudentQuery->found_posts) {
                $existStudentStatus = 'yes';
              }

            }
          ?>
              <span class="student-like-box" data-student-like="<?php echo $existStudentQuery->posts[0]->ID; ?>" data-student="<?php the_ID(); ?>" data-student-exists="<?php echo $existStudentStatus; ?>">
                <i class="fa fa-heart-o" aria-hidden="true"></i>
                <i class="fa fa-heart" aria-hidden="true"></i>
                <span class="student-like-count"><?php echo $likeStudentCount->found_posts; ?></span>
              </span>
              <?php the_content(); ?>
              <?php
              $relatedPrograms = get_field('related_programs');

              if ($relatedPrograms) {
                echo '<hr class="section-break">';
                echo '<h3 class="headline headline--medium">Subject(s) Studied</h3>';
                echo '<ul class="link-list min-list">';
                foreach($relatedPrograms as $program) { ?>
                  <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
                <?php }
                echo '</ul>';
              }
              ?>
              <div class="breadcrumb-wrapper">
                <div class="breadcrumb-cat"><?php get_cat_breadcrumb(); ?></div>
                <div class="breadcrumb-tag"><?php get_tag_breadcrumb(); ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
<?php }

get_footer();

?>

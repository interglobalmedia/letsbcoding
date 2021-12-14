<?php

$allProfessors = new WP_Query(array(
    'posts_per_page' => -1,
    'post_type' => 'professor',
    'orderby' => 'title',
    'order' => 'ASC',
    'meta_query' => array(
        array(
            'key' => 'professor_id',
            'compare' => '=',
            'value' => '"' . get_the_ID() . '"'
        ),
    )
));

    $all_professors_hr_class_section_break = '<hr class="section-break">';
    $all_professors_h3_class_headline_profs = '<h3 class="headline headline--medium headline--all-professors">' . esc_html(get_the_title()) . '</h3>';
    $all_professors_ul_class_prof_cards = '<ul class="professor-cards professor-cards__all-professors">';
    $all_professors_ul_closing_tag = '</ul>';

echo wp_kses($all_professors_hr_class_section_break, array('hr' => array('class' => array()
        )
    ));
echo wp_kses($all_professors_h3_class_headline_profs, array('h3' => array(
            'class' => array()
        )
    ));

echo wp_kses($all_professors_ul_class_prof_cards, array('ul' => array(
            'class' => array()
        )
    ));

while ($allProfessors->have_posts()) {
        $allProfessors->the_post(); ?>
<!--        <div class="post-item">-->
            <li class="professor-card__list-item">
                <a class="professor-card" href="<?php echo esc_url(get_the_permalink()); ?>">
                    <img class="professor-card__image" src="<?php echo esc_attr(get_the_post_thumbnail_url($the_query->ID, 'professorLandscape')); ?>">
                    <span class="professor-card__name"><?php echo esc_html(get_the_title()); ?></span>
                </a>
            </li>
            <?php
            ?>
<!--        </div>-->
    <?php }

echo wp_kses($all_professors_ul_closing_tag, array(
    'ul' => array()
));

?>
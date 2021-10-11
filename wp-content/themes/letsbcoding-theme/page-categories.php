<?php get_header(); 
  pageBanner(array(
    'title' => 'All Categories',
    'subtitle' => 'A list of all site categories'
  ));
?>

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo site_url('/blog');  ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a>
    </div>
    <?php 
        $categories = get_categories(array(
            'child_of'            => 0,
            'current_category'    => 0,
            'depth'               => 0,
            'echo'                => 0,
            'exclude'             => '',
            'exclude_tree'        => '',
            'feed'                => '',
            'feed_image'          => '',
            'feed_type'           => '',
            'hide_empty'          => 0,
            'hide_title_if_empty' => false,
            'hierarchical'        => true,
            'order'               => '',
            'orderby'             => 'hierarchical',
            'separator'           => '<br />',
            'show_count'          => 0,
            'show_option_all'     => '',
            'show_option_none'    => __( 'No categories' ),
            'style'               => 'list',
            'taxonomy'            => 'category',
            'title_li'            => __( 'Categories' ),
            'use_desc_for_title'  => 1,
        ));
        wp_list_categories($args);
    ?>
</div>

<?php get_footer(); ?>

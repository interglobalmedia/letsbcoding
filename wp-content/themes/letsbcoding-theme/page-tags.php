<?php get_header(); 
  pageBanner(array(
    'title' => 'All Tags',
    'subtitle' => 'A tag cloud of all site tags'
  ));
?>

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo site_url('/blog');  ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a>
    </div>
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo site_url('/blog');  ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a>
    </div>
    <ul class="tag-cloud">
        <li class="tag">
        <?php 
            $tags = get_tags(array(
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
                'show_count'          => 1,
                'show_option_all'     => '',
                'show_option_none'    => __( 'No categories' ),
                'style'               => 'list',
                'taxonomy'            => 'category',
                'title_li'            => __( 'Categories' ),
                'use_desc_for_title'  => 1,
            ),
            wp_tag_cloud( array(
                'smallest' => 12, // size of least used tag
                'largest'  => 32, // size of most used tag
                'unit'     => 'px', // unit for sizing the tags
                'number'   => 45, // displays all tags
                'orderby'  => 'name', // order tags alphabetically
                'order'    => 'ASC', // order tags by ascending order
                'taxonomy' => 'post_tag' // you can even make tags for custom taxonomies
            ) ));
        ?>
        </li>
    </ul>
</div>

<?php get_footer(); ?>
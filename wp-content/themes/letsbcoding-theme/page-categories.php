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
      get_template_part('template-parts/content', 'categories');
    ?>
</div>

<?php get_footer(); ?>

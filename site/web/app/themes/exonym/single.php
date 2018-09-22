<?php
  get_header();
  get_template_part('views/wrap', 'start');
  if(have_posts()): while(have_posts()): the_post();
?>
<article class="blog-single">
  <header class="blog-single-header">
    <h1><?php the_title(); ?></h1>
    <div class="blog-single-feature" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'thumbnail-medium'); ?>);"><?php the_post_thumbnail(); ?></div>
  </header>
  <section class="blog-single-content">
    <?php
      the_content();
      if(has_post_format('gallery')) get_template_part('views/format', 'gallery');
      if(has_post_format('aside')) get_template_part('views/format', 'list');
      if(has_post_format('link')) get_template_part('views/format', 'link');
    ?>
  </section>
</article>
<?php
  endwhile; endif;
  get_template_part('views/wrap', 'end');
  get_footer();
?>

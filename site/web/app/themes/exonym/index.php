<?php
  get_header();
  get_template_part('views/wrap', 'start');
  $articlesPage = get_option('page_for_posts');
?>
<header class="blog-header" style="background-image: url(<?php echo get_field('header_image', $articlesPage)['sizes']['jumbo']; ?>);">
  <h1>Articles by <?php ex_brand(); ?></h1>
</header>
<?php if(have_posts()): ?>
<section class="blog-body wrap">
  <?php
    $blogFirstArgs = array(
      'posts_per_page'         => '1',
    );
    $blogFirst = new WP_Query($blogFirstArgs);
    if($blogFirst->have_posts() ):
  ?>
  <article class="blog-article blog-first">
    <?php while($blogFirst->have_posts()): $blogFirst->the_post(); ?>
      <a href="<?php the_permalink(); ?>" class="blog-article-image" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'medium'); ?>);"><?php the_post_thumbnail('medium'); ?></a>
      <div class="blog-article-desc">
        <h2><?php the_title(); ?></h2>
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="blog-article-link">Read More</a>
      </div>
    <?php endwhile; ?>
  </article>
  <?php endif; wp_reset_postdata(); ?>
  <?php echo do_shortcode('[ajax_load_more post_type="post" posts_per_page="3" orderby="menu_order" offset="1" transition_container="false" button_loading_label="Loading Articles..."]'); ?>
</section>
<?php endif; ?>
<?
  get_template_part('views/wrap', 'end');
  get_footer();
?>

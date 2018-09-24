<?php
  $collectionsQueryArgs = array(
    'post_type'              => array('collection'),
    'posts_per_page'         => '-1',
  );
  $collectionsQuery = new WP_Query($collectionsQueryArgs);
  if($collectionsQuery->have_posts()):
?>
<section class="collection-more animate-on-enter">
  <h2>Collections</h2>
  <nav>
    <?php
      while($collectionsQuery->have_posts()):
      $collectionsQuery->the_post();
      $image = get_field('gallery')[0];
    ?>
      <a href="<?php the_permalink(); ?>">
        <?php if(!empty($image)): ?>
          <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
        <?php endif; ?>
        <span><?php the_title(); ?></span>
        <i><?php the_field('subheadline'); ?></i>
      </a>
    <?php endwhile; ?>
  </nav>
</section>
<?php endif; wp_reset_postdata(); ?>

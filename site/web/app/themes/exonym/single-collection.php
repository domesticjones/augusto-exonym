<?php
  get_header();
  get_template_part('views/wrap', 'start');
  if(have_posts()): while(have_posts()): the_post();
  $headerImage = get_field('header_image');
  $subHead = get_field('subheadline');
  $postID = get_the_id();
  if(!empty($headerImage)):
?>
  <header class="header-collection" style="background-image: url(<?php echo $headerImage['sizes']['jumbo']; ?>)">
    <span><?php echo $headerImage['title']; ?></span>
  </header>
<?php endif; ?>
  <h1 class="animate-on-enter">
    <span><?php the_title(); ?></span>
    <?php if(!empty($subHead)): ?>
      <i><?php echo $subHead; ?></i>
    <?php endif; ?>
  </h1>
  <div class="wrap intro-content"><?php the_field('description'); ?></div>
<?php
  get_template_part('views/module', 'gallery');
  $collectionsQueryArgs = array(
    'post_type'              => array('collection'),
    'posts_per_page'         => '-1',
  );
  $collectionsQuery = new WP_Query($collectionsQueryArgs);
  if($collectionsQuery->have_posts()):
?>
  <section class="collection-more">
    <h2>Collections</h2>
    <nav>
      <?php
        while($collectionsQuery->have_posts()):
        $collectionsQuery->the_post();
        $thisID = get_the_id();
      ?>
        <a href="<?php the_permalink(); if($postID === $thisID) { echo '" class="is-current'; } ?>">
          <span><?php the_title(); ?></span>
          <i><?php the_field('subheadline'); ?></i>
        </a>
      <?php endwhile; ?>
    </nav>
  </section>
<?php endif; wp_reset_postdata(); ?>
<?php
  endwhile; endif;
  get_template_part('views/wrap', 'end');
  get_footer();
?>

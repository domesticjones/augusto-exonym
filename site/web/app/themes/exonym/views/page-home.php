<?php
  /* Template Name: Home */
  get_header();
  get_template_part('views/wrap', 'start');
  if(have_posts()): while(have_posts()): the_post();
    get_template_part('views/module', 'slideshow');
    $heading = get_field('intro_heading');
    echo '<h1 class="animate-on-enter"><span>' . $heading['header'] . '</span><i>' . $heading['sub_header'] . '</i></h1>';
    echo '<div class="wrap intro-content">' . get_field('intro_content') . '</div>';
    get_template_part('views/module', 'columns');
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
    <?php endif; wp_reset_postdata();
  endwhile; endif;
  get_template_part('views/wrap', 'end');
  get_footer();
?>

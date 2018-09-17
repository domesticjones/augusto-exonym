<section class="module-columns animate-on-enter">
  <div class="wrap">
    <?php the_field('columns_heading'); ?>
    <?php if(have_rows('columns')): ?>
      <ul class="module-columns-row">
        <?php while(have_rows('columns')): the_row(); ?>
          <li>
            <h2><?php the_sub_field('header'); ?></h2>
            <div class="module-columns-content">
              <?php the_sub_field('description'); ?>
            </div>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php endif; ?>
  </div>
</section>

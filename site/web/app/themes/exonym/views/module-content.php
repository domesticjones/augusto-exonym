<?php if(!empty(get_field('content_block'))): ?>
  <section class="module-content">
    <div class="wrap">
      <?php the_field('content_block'); ?>
    </div>
  </section>
<?php endif; ?>

<?php
  /* Template Name: Contact */
  get_header();
  get_template_part('views/wrap', 'start');
  if(have_posts()): while(have_posts()): the_post();
?>
<section class="contact-wrap wrap">
  <div class="contact-left" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_id(), 'medium'); ?>)"></div>
  <div class="contact-right">
    <h1 class="animate-on-enter"><span><?php ex_brand('legal'); ?></span><i>Boise<br />Idaho</i></h1>
    <div class="contact-info">
      <div class="contact-description"><?php the_content(); ?></div>
      <div class="contact-details">
        <?php
          ex_contact('phone');
          ex_contact('email');
        ?>
        <div class="contact-address">
          <?php ex_contact('address'); ?>
          (<a href="https://www.google.com/maps/place/<?php ex_contact('address'); ?>" target="_blank">open map</a>)
        </div>
        <?php if(have_rows('hours', 'options')): ?>
          <ul class="contact-hours">
            <?php while(have_rows('hours', 'options')): the_row(); ?>
              <li><?php the_sub_field('days'); ?> &vert; <?php the_sub_field('hours'); ?></li>
            <?php endwhile; ?>
          </ul>
        <?php
          endif;
          echo do_shortcode('[contact-form-7 id="5" title="Contact Page Form"]');
        ?>
      </div>
    </div>
  </div>
</section>
<?php
  endwhile; endif;
  get_template_part('views/wrap', 'end');
  get_footer();
?>

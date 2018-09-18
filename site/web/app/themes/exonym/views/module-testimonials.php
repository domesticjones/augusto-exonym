<?php if(have_rows('testimonials')): ?>
  <section class="module-testimonials">
    <div class="module-testimonials-wrap">
      <?php while(have_rows('testimonials')): the_row(); ?>
        <div class="module-testimonial">
          <blockquote>
            <q>&ldquo;<?php the_sub_field('testimonial'); ?>&rdquo;</q>
            <?php
              $client = get_sub_field('client');
              $name = $client['name'];
              $business = $client['business'];
              $location = $client['location'];
              if(!empty($client)):
            ?>
              <cite>
                <?php
                  if(!empty($name)) { echo '<h2>' . $name . '</h2>'; }
                  if(!empty($business)) { echo '<h3>' . $business . '</h3>'; }
                  if(!empty($location)) { echo '<h4>' . $location . '</h4>'; }
                ?>
              </cite>
            <?php endif; ?>
          </blockquote>
        </div>
      <?php endwhile; ?>
    </div>
  </section>
<?php endif; ?>

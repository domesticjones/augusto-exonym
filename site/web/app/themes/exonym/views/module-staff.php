<?php
  if(have_rows('staff')):
?>
  <section class="module-staff">
    <ul class="module-staff-list">
      <?php while(have_rows('staff')): the_row(); ?>
        <li class="staff-single">
          <?php
            $photo = get_sub_field('photo');
            $info = get_sub_field('info');
          ?>
          <div class="staff-photo">
            <?php if(!empty($photo)): ?>
              <img src="<?php echo $photo['sizes']['medium']; ?>" alt="Photograph of <?php echo $info['name']; ?>" />
            <?php endif; ?>
          </div>
          <div class="staff-content">
            <?php if(!empty($info['name'])) { echo '<h2 class="staff-name">' . $info['name'] . '</h2>'; } ?>
            <?php if(!empty($info['position'])) { echo '<h3 class="staff-position">' . $info['position'] . '</h3>'; } ?>
            <?php if(!empty($info['bio'])) { echo '<div class="staff-bio">' . $info['bio'] . '</div>'; } ?>
          </div>
        </li>
      <?php endwhile; ?>
    </ul>
  </section>
<?php endif; ?>

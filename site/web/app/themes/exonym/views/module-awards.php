<?php if(have_rows('achievements')): ?>
<section class="module-awards">
  <ul class="module-awards-list">
    <?php
      while(have_rows('achievements')): the_row();
      $image = get_sub_field('logo');
      $org = get_sub_field('orginization');
      $orgName = $org['name'];
      $orgPosition = $org['position'];
      $years = get_sub_field('years');
      $yearStart = $years['start'];
      $yearEnd = $years['end'];
    ?>
      <li>
        <?php if(!empty($image)): ?>
          <img src="<?php echo $image['sizes']['small']; ?>" alt="<?php echo $image['alt']; ?>" />
        <?php endif; ?>
        <?php if(!empty($orgName)) { echo '<h2>' . $orgName . '</h2>'; } ?>
        <?php if(!empty($yearStart)): ?>
          <h3>
            <?php echo $yearStart; ?>
            <?php if(!empty($yearEnd)) { echo ' - ' . $yearEnd; } ?>
          </h3>
        <?php endif; ?>
        <?php if(!empty($orgPosition)) { echo '<h4>' . $orgPosition . '</h4>'; } ?>
      </li>
    <?php endwhile; ?>
  </ul>
</section>
<?php endif; ?>

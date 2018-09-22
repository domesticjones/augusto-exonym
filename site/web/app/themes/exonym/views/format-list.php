<?php
  $settings = get_field('list_settings');
  $type = $settings['list_type'];
  $typeNumbered = $settings['number_type'];
  $rowCount = count(get_field('list'));
  $number = 0;
  if(have_rows('list')):
?>
<ul class="format-list">
  <?php while(have_rows('list')): the_row(); ?>
    <?php
      if($typeNumbered == 'normal') {
        $number++;
        $numberReturn = $number;
      } else {
        $numberReturn = $rowCount - $number;
        $number++;
      }
      $numberReturn = '<span>' . $numberReturn . ' - </span>';
      if($type == 'unnumbered') { $numberReturn = ''; }
    ?>
    <li>
      <h2><?php echo $numberReturn; the_sub_field('title'); ?></h2>
      <?php the_sub_field('content'); ?>
    </li>
  <?php endwhile; ?>
</ul>
<?php endif; ?>

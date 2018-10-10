<?php
  $slideshow = get_field('header_slides');
  if(!empty($slideshow)):
?>
  <header class="module-slideshow">
    <div class="module-slideshow-wrap">
      <?php foreach($slideshow as $slide): ?>
        <div class="module-slideshow-slide" style="background-image: url(<?php echo $slide['sizes']['jumbo']; ?>)">
          <span class="module-slideshow-description">
            <?php echo $slide['title'] . ' - ' . $slide['description']; ?>
          </span>
        </div>
      <?php endforeach; ?>
    </div>
    <?php
      if(is_page_template('views/page-about.php')):
        get_template_part('views/module', 'testimonials');
      endif;
    ?>
  </header>
<?php endif; ?>

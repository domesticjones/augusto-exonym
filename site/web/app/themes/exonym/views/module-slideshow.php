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
  <?php if(is_front_page()): ?>
    <img src="<?php ex_logo('primary', 'light'); ?>" alt="Logo for <?php ex_brand('legal'); ?>" class="slideshow-logo animate-on-enter animate-on-exit" />
  <?php endif; ?>
</header>
<?php endif; ?>

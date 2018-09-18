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
      <div class="slideshow-logo-wrap animate-on-enter animate-on-leave">
        <img src="<?php ex_logo('primary', 'light'); ?>" alt="Logo for <?php ex_brand('legal'); ?>" class="slideshow-logo" />
      </div>
    <?php
      elseif(is_page_template('views/page-about.php')):
        get_template_part('views/module', 'testimonials');
      endif; ?>
  </header>
<?php endif; ?>

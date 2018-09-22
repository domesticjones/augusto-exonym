<?php
  $options = get_field('gallery_options');
  $gallery = get_field('gallery');
  if(!empty($gallery)):
?>
<ul class="format-gallery format-gallery-action-<?php echo $options['action']; ?> format-gallery-image-<?php echo $options['image_size']; ?>">
  <?php foreach($gallery as $image): ?>
    <li data-image="<?php echo $image['sizes']['large']; ?>">
      <?php if($options['action'] == 'new') { echo '<a href="' . $image['url'] . '" target="_blank">'; } ?>
      <img src="<?php echo $image['sizes']['thumbnail-medium']; ?>" />
      <?php if($options['action'] == 'new') { echo '</a>'; } ?>
      <?php if($options['captions']): ?>
        <div class="format-gallery-caption">
          <?php
            echo '<strong class="gallery-title">' . $image['title'] . '</strong>';
            if(!empty($image['caption'])) { echo ', <span class="gallery-caption">' . $image['caption'] . '</span>'; }
          ?>
        </div>
      <?php endif; ?>
    </li>
  <?php endforeach; ?>
</ul>
<section id="module-gallery-overlay">
  <div id="module-gallery-overlay-image">
    <div id="module-gallery-overlay-image-inner"></div>
  </div>
  <div id="module-gallery-overlay-info">
    <h1>Name of Rug</h1>
    <h2>Caption for Rug</h2>
    <h3>Article: <strong><?php the_title(); ?></strong></h3>
    <button id="overlay-close">
      <span>Close Overlay</span>
    </button>
  </div>
  <?php if($gallery): ?>
    <div class="module-gallery-overlay-slider">
      <div id="module-gallery-overlay-thumbs">
        <?php foreach($gallery as $thumb): ?>
          <div>
            <img src="<?php echo $thumb['sizes']['small']; ?>" alt="<?php echo $thumb['alt']; ?>" class="overlay-thumb" />
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>
</section>
<?php endif; ?>

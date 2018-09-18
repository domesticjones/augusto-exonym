<?php
  $gallery = get_field('gallery');
  if($gallery):
?>
<section class="module-gallery">
  <div class="wrap">
    <ul id="module-gallery-items">
      <?php foreach($gallery as $image): ?>
        <li style="background-image: url(<?php echo $image['sizes']['small']; ?>)" data-image="<?php echo $image['sizes']['large']; ?>">
          <span class="gallery-title"><?php echo $image['title']; ?></span>
          <span class="gallery-caption"><?php echo $image['caption']; ?></span>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
<section id="module-gallery-overlay">
  <div id="module-gallery-overlay-image">
    <div id="module-gallery-overlay-image-inner"></div>
  </div>
  <div id="module-gallery-overlay-info">
    <h1>Name of Rug</h1>
    <h2>Caption for Rug</h2>
    <h3>Collection: <strong><?php the_title(); ?></strong></h3>
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

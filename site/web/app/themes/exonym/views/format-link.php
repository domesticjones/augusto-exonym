<?php
  $link = get_field('link');
  $type = $link['type'];
  $file = $link['file'];
  $url = $link['url'];
  $linkHref = '#';
  $linkTarget = '_self';
  $linkText = '';
  $linkCaption = '';
  if($type == 'file' && !empty($file)) {
    $linkHref = $file['url'];
    $linkTarget = '_blank';
    $linkText = $file['title'];
    $linkCaption = $file['caption'] . '<br /><small>(' . human_filesize($file['filesize']) . ' ' . $file['subtype'] . ')</small>';
  } elseif($type == 'url' && !empty($url)) {
    $linkHref = $url['url'];
    $linkTarget = $url['target'];
    $linkText = $url['title'];
    $linkCaption = parse_url($linkHref)['host'];

  }
?>
<a href="<?php echo $linkHref; ?>" target="<?php echo $linkTarget; ?>" class="format-link">
  <h3><?php echo $linkText; ?> &rarr;</h3>
  <h4><?php echo $linkCaption; ?></h4>
</a>

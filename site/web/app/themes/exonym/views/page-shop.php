<?php
  /* Template Name: Shop */
  get_header();
  echo '<div id="ecwid_product_browser_scroller"></div>';
  get_template_part('views/wrap', 'start');
  if(have_posts()): while(have_posts()): the_post();
    get_template_part('views/module', 'slideshow');
    the_content();
  endwhile; endif;
  get_template_part('views/wrap', 'end');
  get_footer();
?>

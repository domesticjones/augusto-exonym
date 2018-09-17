<?php
  /* Template Name: About */
  get_header();
  get_template_part('views/wrap', 'start');
  if(have_posts()): while(have_posts()): the_post();
    get_template_part('views/module', 'slideshow');
  endwhile; endif;
  get_template_part('views/wrap', 'end');
  get_footer();
?>

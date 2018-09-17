<?php
  /* Template Name: Home */
  get_header();
  get_template_part('views/wrap', 'start');
  if(have_posts()): while(have_posts()): the_post();
    the_content();
  endwhile; endif;
  get_template_part('views/wrap', 'end');
  get_footer();
?>

<?php
  /* Template Name: Legal */
  get_header();
  get_template_part('views/wrap', 'start');
  if(have_posts()): while(have_posts()): the_post();
    echo '<h1 class="animate-on-enter"><span>' . get_the_title() . '</span><i>Updated<br />' . the_modified_date('M. n, Y', '', '', false) . '</i></h1>';
    echo '<div class="wrap">' . apply_filters('the_content', get_the_content()) . '</div>';
  endwhile; endif;
  get_template_part('views/wrap', 'end');
  get_footer();
?>

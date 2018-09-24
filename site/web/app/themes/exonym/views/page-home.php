<?php
  /* Template Name: Home */
  get_header();
  get_template_part('views/wrap', 'start');
  if(have_posts()): while(have_posts()): the_post();
    get_template_part('views/module', 'slideshow');
    $heading = get_field('intro_heading');
    echo '<h1 class="animate-on-enter"><span>' . $heading['header'] . '</span><i>' . $heading['sub_header'] . '</i></h1>';
    echo '<div class="wrap intro-content">' . get_field('intro_content') . '</div>';
    get_template_part('views/module', 'columns');
    get_template_part('views/module', 'collections');
  endwhile; endif;
  get_template_part('views/wrap', 'end');
  get_footer();
?>

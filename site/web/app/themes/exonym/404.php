<?php
  get_header();
  get_template_part('views/wrap', 'start');
  $urlRequest = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $articlesPage = get_option('page_for_posts');
?>
<header class="blog-header" style="background-image: url(<?php echo get_field('header_image', $articlesPage)['sizes']['jumbo']; ?>);">
  <h1>Articles by <?php ex_brand(); ?></h1>
</header>
<h1 class="animate-on-enter">
  <span>Page Not Found</span>
  <i>404<br />Error</i>
</h1>
<div class="wrap intro-content">
  The page <em><u><?php echo $urlRequest; ?></u></em> could not be found.
</div>
<?php
  get_template_part('views/wrap', 'end');
  get_footer();
?>

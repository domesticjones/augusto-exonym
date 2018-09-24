<?php
  /* ==============
     DEFAULT FOOTER
     ============== */
  $ig_access_token = '3297965403.1677ed0.ea1a910d9ea74f02a71f98b9f917eb51';
  $ig_count = 5;
  $ig_json_link = 'https://api.instagram.com/v1/users/self/media/recent/?';
  $ig_json_link.= 'access_token=' . $ig_access_token . '&count=' . $ig_count;
  $ig_json = @file_get_contents($ig_json_link);
  $ig_obj = json_decode($ig_json, true, 512, JSON_BIGINT_AS_STRING);
  $user = $ig_obj['data'][0]['user']['username'];
  if($ig_json):
?>
    <footer id="footer-instagram">
      <ul class="animate-on-enter">
        <li>
          <a href="https://instagram.com/<?php echo $user; ?>" target="_blank" class="ig-user">
            <span><?php echo esc_html('@' . $user); ?></span>
            <img src="<?php echo asset_path('images/social-instagram.svg'); ?>" alt="Follow <?php ex_brand(); ?> on Instagram" />
          </a>
        </li>
        <?php foreach ($ig_obj['data'] as $ig_post):
          $image = $ig_post['images']['standard_resolution']['url'];
          $likes = $ig_post['likes']['count'];
          $comments = $ig_post['comments']['count'];
          $link = $ig_post['link'];
        ?>
          <li class="ig-image" style="background-image: url(<?php echo esc_attr($image); ?>)">
            <a href="<?php echo $link; ?>" target="_blank" class="ig-link"><span>View image on Instagram</span></a>
            <div class="ig-overlay">
              <span class="ig-likes">
                <?php echo $likes; ?>
              </span>
              <span class="ig-comments">
                <?php echo $comments; ?>
              </span>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </footer>
  <?php endif; ?>
    <footer id="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
      <div class="wrap">
        <div class="footer-left">
          <h2>Contact</h2>
          <?php
            ex_contact('phone');
            ex_contact('email');
          ?>
          <div class="address-footer"><?php ex_contact('address'); ?> (<a href="https://www.google.com/maps/place/<?php ex_contact('address'); ?>" target="_blank">map</a>)</div>
          <?php if(have_rows('hours', 'options')):
            $hoursFirst = true;
            echo '<ul class="hours-footer">';
              while(have_rows('hours', 'options') && $hoursFirst): the_row();
                echo '<li>' . get_sub_field('days') . ' &vert; ' . get_sub_field('hours') . '</li>';
                $hoursFirst = false;
              endwhile;
              echo '</ul>';
            endif;
          ?>
        </div>
        <div class="footer-right">
          <h2>Stay Connected</h2>
          <form id="form-mailchimp" method="GET" action="https://augustofinerugs.us13.list-manage.com/subscribe/post-json?u=26d0104ea990b4d673adb8585&id=2856f6771c&c=?">
            <p id="form-mailchimp-message">Updates on news, events, and products.</p>
            <div class="form-mailchimp-fields">
              <input type="email" name="EMAIL" placeholder="Enter Your Email Address" required>
              <button type="submit">
                <span>Sign Up</span>
              </button>
            </div>
          </form>
          <p class="copyright">&copy; <?php echo date('Y') . ' '; ex_brand('legal'); ?></p>
          <nav class="nav-footer" role="navigation">
            <?php wp_nav_menu(array(
              'container' => 'ul',                    // enter '' to remove nav container
              'container_class' => 'footer-links cf',	// class of container (should you choose to use it)
              'menu' => __('Footer', 'exonym'),	      // nav name
              'menu_class' => 'nav footer-nav cf',    // adding custom nav class
              'theme_location' => 'footer-menu',		  // where it's located in the theme
              'before' => '',							            // before the menu
              'after' => '',							            // after the menu
              'link_before' => '',					          // before each link
              'link_after' => '',						          // after each link
              'depth' => 1,							              // limit the depth of the nav
              'fallback_cb' => ''						          // fallback function
            )); ?>
          </nav>
        </div>
      </div>
    </footer>
  </div>
  <?php wp_footer(); ?>
</body>
</html>

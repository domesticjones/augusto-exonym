<?php
/*
============================================
  [[[ Post Support & Pagination Settings ]]]
============================================
*/

// Author & date/time meta
function ex_post_meta($timePre = 'Posted', $authorPre = 'by') {
 printf(__($timePre, 'exonym').' %1$s %2$s',
   /* the time the post was published */
   '<time class="entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
   /* the author of the post */
   '<span class="entry-byline">' . __($authorPre, 'exonym') . '</span> <span class="entry-author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
 );
}

// Filesize Displays
function human_filesize($bytes, $decimals = 2) {
  $size = array('b','kb','mb','gb', 'tb','pb','eb','zb','yb');
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}

// Post Formats
add_theme_support('post-formats', array('gallery', 'aside', 'link'));
function ex_rename_post_formats($safe_text) {
  if($safe_text == 'Aside') return 'List';
  return $safe_text;
}
add_filter('esc_html', 'ex_rename_post_formats');

// Require Featured Image on Blog Article
function ex_post_check_thumbnail($post_id) {
  if(get_post_type($post_id) != 'post') return;
  if(!has_post_thumbnail($post_id)) {
    set_transient('has_post_thumbnail', 'no');
    remove_action('save_post', 'ex_post_check_thumbnail');
    wp_update_post(array('ID' => $post_id, 'post_status' => 'draft'));
    add_action('save_post', 'ex_post_check_thumbnail');
  } else {
    delete_transient('has_post_thumbnail');
  }
}
function ex_post_thumbnail_error() {
  if(get_transient('has_post_thumbnail') == 'no') {
    echo "<div id='message' class='error'><p><strong>You must select Featured Image. Your Article is saved but it can not be published.</strong></p></div>";
    delete_transient('has_post_thumbnail');
  }
}
add_action('save_post', 'ex_post_check_thumbnail');
add_action('admin_notices', 'ex_post_thumbnail_error');

// List out categories
function ex_categories($catPre = 'Filed under') {
 printf(__($catPre, 'exonym' ) . ': %1$s' , get_the_category_list(', '));
}

// List out tags
function ex_tags($tagsPre = 'Tags:') {
 the_tags(__($tagsPre, 'exonym' ) . '</span> ', ', ', '');
}

// List comment counts
function ex_comment_count(
  $noComms = '<span>No</span> Comments',
  $oneComm = '<span>One</span> Comment',
  $manyComms = '<span>%</span> Comments'
) {
	comments_number(__($noComms, 'exonym'), __($oneComm, 'exonym'), __($manyComms, 'exonym'));
}

// Post pagination
function ex_post_pagination(
  $pagesPre = 'Pages:',
  $pageNext = 'Next page',
  $pagePrev = 'Previous page'
) {
	$post_pagination_options = array(
		'before'           => '<nav class="nav-post">' . ($pagesPre),
		'after'            => '</nav>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => ($pageNext),
		'previouspagelink' => ($pagePrev),
		'pagelink'         => '%',
		'echo'             => 1
	);
	wp_link_pages($post_pagination_options);
}

// Integrate wp_page_navi
function ex_page_navi() {
 global $wp_query;
 $bignum = 999999999;
 if ($wp_query->max_num_pages <= 1)
   return;
 echo '<nav class="nav-pagination">';
 echo paginate_links(array(
   'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
   'format'       => '',
   'current'      => max( 1, get_query_var('paged') ),
   'total'        => $wp_query->max_num_pages,
   'prev_text'    => '&lt;',
   'next_text'    => '&gt;',
   'type'         => 'list',
   'end_size'     => 3,
   'mid_size'     => 3
 ) );
 echo '</nav>';
}

// Format for the Blog Navigation
function ex_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
	$next     = get_adjacent_post(false, '', false);

	if (!$next && ! $previous) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links">
			<?php
				previous_post_link('<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'exonym' ) );
				next_post_link('<div class="nav-next">%link</div>', _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link', 'exonym' ) );
			?>
		</div>
	</nav>
	<?php
}

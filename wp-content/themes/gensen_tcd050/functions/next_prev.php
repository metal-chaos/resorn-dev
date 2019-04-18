<?php

function next_prev_post_link() {

  $prev_post = get_adjacent_post(false, '', true);
  $next_post = get_adjacent_post(false, '', false);

  if ($prev_post) {
    echo "<div class='prev_post'><a href='" . get_permalink($prev_post->ID) . "' title='" . esc_attr(get_the_title($prev_post->ID)) . "' data-mobile-title='" . esc_attr__('Prev post', 'tcd-w') . "'><span class='title'>" . esc_html(get_the_title($prev_post->ID)) . "</span></a></div>\n";
  }

  if ($next_post) {
    echo "<div class='next_post'><a href='" . get_permalink($next_post->ID) . "' title='" . esc_attr(get_the_title($next_post->ID)) . "' data-mobile-title='" . esc_attr__('Next post', 'tcd-w') . "'><span class='title'>" . esc_html(get_the_title($next_post->ID)) . "</span></a></div>\n";
  }

}

function next_prev_post_link_image() {

  $prev_post = get_adjacent_post(false, '', true);
  $next_post = get_adjacent_post(false, '', false);

  if ($prev_post && !is_mobile()) {
    $image = null;
    $image_id = get_post_thumbnail_id($prev_post->ID);
    if ($image_id) {
      $image = wp_get_attachment_image_src($image_id, 'size1');
    }
    if (!empty($image[0])) {
      $image_src = $image[0];
    } else {
      $image_src = get_template_directory_uri().'/img/common/no_image1.gif';
    }
    echo "<div class='prev_post has_image'><a href='" . get_permalink($prev_post->ID) . "' title='" . esc_attr(get_the_title($prev_post->ID)) . "' data-mobile-title='" . esc_attr__('Prev post', 'tcd-w') . "'><span class='title'>" . esc_html(get_the_title($prev_post->ID)) . "</span><span class='image'><img src='" . esc_attr($image_src) . "' alt=''></span></a></div>\n";
  } elseif ($prev_post) {
    echo "<div class='prev_post'><a href='" . get_permalink($prev_post->ID) . "' title='" . esc_attr(get_the_title($prev_post->ID)) . "' data-mobile-title='" . esc_attr__('Prev post', 'tcd-w') . "'><span class='title'>" . esc_html(get_the_title($prev_post->ID)) . "</span></a></div>\n";
  }

  if ($next_post && !is_mobile()) {
    $image = null;
    $image_id = get_post_thumbnail_id($next_post->ID);
    if ($image_id) {
      $image = wp_get_attachment_image_src($image_id, 'size1');
    }
    if (!empty($image[0])) {
      $image_src = $image[0];
    } else {
      $image_src = get_template_directory_uri().'/img/common/no_image1.gif';
    }
    echo "<div class='next_post has_image'><a href='" . get_permalink($next_post->ID) . "' title='" . esc_attr(get_the_title($next_post->ID)) . "' data-mobile-title='" . esc_attr__('Next post', 'tcd-w') . "'><span class='title'>" . esc_html(get_the_title($next_post->ID)) . "</span><span class='image'><img src='" . esc_attr($image_src) . "' alt=''></span></a></div>\n";
  } elseif ($next_post) {
    echo "<div class='next_post'><a href='" . get_permalink($next_post->ID) . "' title='" . esc_attr(get_the_title($next_post->ID)) . "' data-mobile-title='" . esc_attr__('Next post', 'tcd-w') . "'><span class='title'>" . esc_html(get_the_title($next_post->ID)) . "</span></a></div>\n";
  }

}


// add class to posts_nav_link()
add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
    return 'class="next"';
}
function posts_link_attributes_2() {
    return 'class="prev"';
}


?>
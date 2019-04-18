<?php

// 画像スライダー
$introduce_slider = array();
if ($dp_options['show_thumbnail_introduce']) {
  for ($i = 1; $i <= 5; $i++) {
    $slider_image = get_post_meta($post->ID, 'slider_image'.$i, true);
    if ($slider_image) {
      $image = wp_get_attachment_image_src($slider_image, 'post-thumbnail');
      if (!empty($image[0])) {
        $introduce_slider['slider'][$i] = $image[0];
      }
    }
  }
  if (!empty($introduce_slider['slider'])) {
    $introduce_slider['slider_time'] = get_post_meta($post->ID, 'slider_time', true);
  }
}

get_header();
$dp_options = get_desing_plus_option();
?>

<?php get_template_part('breadcrumb'); ?>

<div id="main_col" class="clearfix">

 <div id="left_col">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div id="article">

<?php if ($dp_options['show_shoulder_copy_introduce'] && get_post_meta($post->ID, 'shoulder_copy', true)) { ?>
   <div class="introduce_shoulder_copy">
    <?php echo esc_html(trim(get_post_meta($post->ID, 'shoulder_copy', true))); ?>
   </div>
<?php } ?>

<?php if ($introduce_slider && $page == '1') { ?>
   <div id="introduce_slider">
<?php
        $is_first_slide = true;
        foreach ($introduce_slider['slider'] as $i => $slider) :
          if ($is_first_slide) {
            $is_first_slide = false;
            $img_src = 'src';
          } else {
            $img_src = 'data-lazy';
          }
          $slider_caption = get_post_meta($post->ID, 'slider_caption'.$i, true);

          echo '   <div class="item item'.$i.'">'."\n";
          echo '    <img '.$img_src.'="'.esc_attr($slider).'" alt="" />'."\n";
          if ($slider_caption) {
            echo '    <div class="caption">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($slider_caption)).'</div>'."\n";
          }
          echo '   </div>'."\n";
        endforeach;
?>
   </div><!-- END #introduce_slider -->

<?php } else if ($dp_options['show_thumbnail_introduce'] && has_post_thumbnail() && $page == '1') { ?>
   <div id="post_image">
    <?php the_post_thumbnail('post-thumbnail'); ?>
   </div>
<?php } ?>

<?php
        if ($dp_options['show_introduce_categories']) {
          $metas = array();
          foreach(explode('-', $dp_options['show_introduce_categories']) as $cat) {
            if (!empty($dp_options['use_introduce_category'.$cat])) {
              $terms = get_the_terms($post->ID, $dp_options['introduce_category'.$cat.'_slug']);
              if ($terms && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                  $metas['introduce_category'.$cat][] = '<a href="'.get_term_link($term).'" title="'.esc_attr($term->name).'" class="cat-'.esc_attr($dp_options['introduce_category'.$cat.'_slug']).'">'.esc_html($term->name).'</a>';
                }
                $metas['introduce_category'.$cat] = '<li class="cat">'.implode('', $metas['introduce_category'.$cat]).'</li>';
              }
            }
          }
          if ($metas) {
?>
    <ul id="post_meta_top" class="meta clearfix"><?php echo implode('', $metas); ?></ul>
<?php
          }
        }
?>

   <h2 id="post_title" class="rich_font"><?php the_title(); ?></h2>

<?php if ($dp_options['show_date_introduce']) { ?>
    <div id="post_date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.d'); ?></time></div>
<?php } ?>

<?php if ($dp_options['show_sns_top_introduce']) { ?>
   <div class="single_share" id="single_share_top">
    <?php get_template_part('sns-btn-top'); ?>
   </div>
<?php } ?>

   <div class="post_content clearfix">
    <?php the_content(__('Read more', 'tcd-w')); ?>
    <?php custom_wp_link_pages(); ?>
   </div>

<?php if ($dp_options['show_sns_btm_introduce']) { ?>
   <div class="single_share" id="single_share_bottom">
    <?php get_template_part('sns-btn-btm'); ?>
   </div>
<?php } ?>

<?php if ($dp_options['show_tag_introduce'] && $dp_options['use_introduce_tag'] && get_the_terms($post->ID, $dp_options['introduce_tag_slug'])) { ?>
   <ul id="post_meta_bottom" class="clearfix">
    <?php echo get_the_term_list($post->ID, $dp_options['introduce_tag_slug'], '<li class="post_tag">',', ','</li>'); ?>
   </ul>
<?php } ?>

<?php if ($dp_options['show_next_post_introduce']) : ?>
   <div id="previous_next_post_image" class="clearfix">
    <?php next_prev_post_link_image(); ?>
   </div>
<?php endif; ?>

<?php
      if ($dp_options['show_archive_banner_introduce']) :
        if ($dp_options['introduce_archive_image']) {
          $archive_image = wp_get_attachment_image_src($dp_options['introduce_archive_image'], 'size4');
        }
        if (!empty($archive_image[0]) && $dp_options['introduce_archive_catch']) {
?>
   <div class="introduce_archive_banner_link introduce_archive_banner_link-2col">
    <a href="<?php echo get_post_type_archive_link($dp_options['introduce_slug']); ?>">
     <span class="catch rich_font"><?php echo str_replace(array("\r\n", "\r", "\n"), '<br>', esc_html($dp_options['introduce_archive_catch'])); ?></span>
     <span class="image"><img src="<?php echo esc_attr($archive_image[0]); ?>" alt=""></span>
    </a>
   </div>
<?php
        } elseif (!empty($archive_image[0])) {
?>
   <div class="introduce_archive_banner_link introduce_archive_banner_link-image">
    <a href="<?php echo get_post_type_archive_link($dp_options['introduce_slug']); ?>">
     <span class="image"><img src="<?php echo esc_attr($archive_image[0]); ?>" alt=""></span>
    </a>
   </div>
<?php
        } elseif ($dp_options['introduce_archive_catch']) {
?>
   <div class="introduce_archive_banner_link introduce_archive_banner_link-text">
    <a href="<?php echo get_post_type_archive_link($dp_options['introduce_slug']); ?>">
     <span class="catch rich_font"><?php echo str_replace(array("\r\n", "\r", "\n"), '<br>', esc_html($dp_options['introduce_archive_catch'])); ?></span>
    </a>
   </div>
<?php
        }
      endif;
?>

  </div><!-- END #article -->

<?php endwhile; endif; ?>

<?php
      // related post
      if ($dp_options['show_related_introduce']) :
        $args = array('post_type' => $dp_options['introduce_slug'], 'post__not_in' => array($post->ID), 'posts_per_page' => $dp_options['related_post_num'], 'orderby' => 'rand');

        for($i = 1; $i <= 3; $i++) {
          if (!empty($dp_options['use_introduce_category'.$i])) {
            $terms = get_the_terms($post->ID, $dp_options['introduce_category'.$i.'_slug']);
            if ($terms && !is_wp_error($terms)) {
              $tax_query_terms = array();
              foreach($terms as $term) {
                $tax_query_terms[] = $term->term_id;
              }
              $args['tax_query'][] = array('taxonomy' => $dp_options['introduce_category'.$i.'_slug'], 'field' => 'term_id', 'terms' => $tax_query_terms, 'operator' => 'IN');
            }
          }
        }

        if (!empty($args['tax_query'])) {
          if (count($args['tax_query']) > 1) {
            $args['tax_query']['relation'] = 'OR';
          }
          $my_query = new WP_Query($args);
          if ($my_query->have_posts()) {
?>
  <div id="related_post">
   <h3 class="headline rich_font"><?php echo esc_html( $dp_options['related_introduce_headline'] ); ?></h3>
    <ol class="clearfix">
<?php       while ($my_query->have_posts()) { $my_query->the_post(); ?>
     <li>
     <a href="<?php the_permalink() ?>">
      <div class="image">
      <?php if (has_post_thumbnail()) { the_post_thumbnail('size2'); } else { echo '<img src="'.get_template_directory_uri().'/img/common/no_image2.gif" alt="" title="" />'; } ?>
      </div>
      <h4 class="title js-ellipsis"><?php the_title(); ?></h4>
     </a>
    </li>
<?php       } wp_reset_postdata(); ?>
   </ol>
  </div>
<?php
          }
        }
      endif;
?>

 </div><!-- END #left_col -->

<?php get_sidebar(); ?>

</div><!-- END #main_col -->

<?php get_footer(); ?>

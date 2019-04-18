<?php
    get_header();
    $dp_options = get_desing_plus_option();

    $catch = '';
    $catch_bg = '#49240d';
    $catch_bg_opacity = '0.7';
    $archive_text = array();

    // 紹介カテゴリーで紹介アーカイブ表示の場合
    // functions.php custom_post_type_template_include()の処理でこのファイルが読み込まれる
    if (is_tax()) {
      $term = get_queried_object();
      if (!empty($term->term_id)) {
        $term_meta = get_option('taxonomy_'.$term->term_id);
        if (!empty($term_meta['image'])) {
          $image = wp_get_attachment_image_src($term_meta['image'], 'full');
        }
        if (!empty($term_meta['catch'])) {
          $catch = trim($term_meta['catch']);
        }
        if (!empty($term_meta['catch_bg'])) {
          $catch_bg = $term_meta['catch_bg'];
        }
        if (!empty($term_meta['catch_bg_opacity'])) {
          $catch_bg_opacity = $term_meta['catch_bg_opacity'];
        }
        if (!empty($term_meta['archive_text']) && is_array($term_meta['archive_text'])) {
          foreach($term_meta['archive_text'] as $key => $value) {
            if (!empty($value['headline']) || !empty($value['desc'])) {
              $archive_text[] = $value;
            }
          }
        }
      }

    // 紹介アーカイブの場合
    } else {
      if ($dp_options['introduce_archive_image']) {
        $image = wp_get_attachment_image_src($dp_options['introduce_archive_image'], 'full');
      }
      $catch = trim($dp_options['introduce_archive_catch']);
      $catch_bg = $dp_options['introduce_archive_image_catch_bg'];
      $catch_bg_opacity = $dp_options['introduce_archive_image_catch_bg_opacity'];
      if ($dp_options['introduce_archive_text'] && is_array($dp_options['introduce_archive_text'])) {
        foreach($dp_options['introduce_archive_text'] as $key => $value) {
          if (!empty($value['headline']) || !empty($value['desc'])) {
            $archive_text[] = $value;
          }
        }
      }
    }
?>

<?php if ($dp_options['show_breadcrumb_introduce_archive']) get_template_part('breadcrumb'); ?>

<?php if (!empty($image[0])) { ?>
<div id="header_image">
 <img src="<?php echo esc_attr($image[0]); ?>" alt="" />
<?php   if ($dp_options['introduce_archive_catch']) { ?>
 <div class="caption_bar rich_font" style="background:rgba(<?php echo esc_attr(implode(',', hex2rgb($catch_bg))); ?>,<?php echo esc_attr($catch_bg_opacity); ?>);">
  <?php echo str_replace(array("\r\n", "\r", "\n"), ' ', esc_html($catch)); ?>
 </div>
<?php   } ?>
</div>
<?php } ?>

<div id="main_col">

<?php if (count($archive_text)) { ?>
 <div id="introduce_header" class="post_content">
<?php
        if (count($archive_text) == 1) {
          foreach($archive_text as $value) {
            if (!empty($value['headline'])) {
?>
  <h2 class="headline"><?php echo str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($value['headline'])); ?></h2>
<?php
            }
            if (!empty($value['desc'])) {
?>
  <p><?php echo str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($value['desc'])); ?></p>
<?php
            }
          }
        } else {
          if (count($archive_text) == 2 || count($archive_text) == 2) {
            $col_class = 'post_col post_col-2';
          } else {
            $col_class = 'post_col post_col-3';
          }
?>
  <div class="post_row">
<?php
          foreach($archive_text as $value) {
?>
   <div class="<?php echo esc_attr($col_class); ?>">
<?php
            if (!empty($value['headline'])) {
?>
   <h2 class="headline"><?php echo str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($value['headline'])); ?></h2>
<?php
            }
            if (!empty($value['desc'])) {
?>
   <p><?php echo str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($value['desc'])); ?></p>
<?php
            }
?>
   </div>
<?php
          }
?>
  </div>
<?php
        }
?>
 </div>
<?php } ?>

<?php if ( have_posts() ) : ?>
 <div id="introduce_list">
  <div class="introduce_list_row clearfix">
<?php
		$i = 0;
		$row = 0;
		while ( have_posts() ) :
			the_post();

			if ($i > 0 && $i % 3 == 0) {
				$row++;
?>
  </div>
  <div class="introduce_list_row clearfix">
<?php
			}

			$col_class = '';
			if ($row % 2 == 0) {
				if ($i % 3 == 0) {
					$col_class = ' show_info';
				}
			} else {
				if ($i % 3 == 2) {
					$col_class = ' show_info';
				}
			}
?>
   <div class="introduce_list_col article inview-fadein<?php echo esc_attr($col_class); ?>">
    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="clearfix">
     <div class="image">
      <?php if (has_post_thumbnail()) { the_post_thumbnail('size3'); } else { ?><img src="<?php echo get_template_directory_uri(); ?>/img/common/no_image3.gif" title="" alt="" /><?php } ?>
     </div>
     <div class="info">
      <?php
        if ($dp_options['show_introduce_categories']) {
          $metas = array();
          foreach(explode('-', $dp_options['show_introduce_categories']) as $cat) {
            if (!empty($dp_options['use_introduce_category'.$cat])) {
              $terms = get_the_terms($post->ID, $dp_options['introduce_category'.$cat.'_slug']);
              if ($terms && !is_wp_error($terms)) {
                $term = array_shift($terms);
                $metas[] = '<li class="cat"><span class="cat-'.esc_attr($dp_options['introduce_category'.$cat.'_slug']).'" data-href="'.get_term_link($term).'" title="'.esc_attr($term->name).'">'.esc_html($term->name).'</span></li>';
              }
            }
          }
          if ($metas) {
            echo '<ul class="meta clearfix">'.implode('', $metas).'</ul>';
          }
        }
      ?>
      <h3 class="title"><?php trim_title(32); ?></h3>
      <p class="excerpt"><?php new_excerpt(148); ?></p>
      <p class="more"><?php _e('Read more', 'tcd-w'); ?></p>
     </div>
    </a>
   </div>
<?php $i++; endwhile; ?>

  </div>
 </div><!-- END #introduce_list -->

<?php if ((!$paged || $paged == 1) && show_posts_nav()) { ?>
 <div id="load_post" class="inview-fadein"><?php next_posts_link( __( 'read more', 'tcd-w' ) ); ?></div>
<?php } ?>

<?php else: ?>
 <p class="no_post"><?php _e('There is no registered post.', 'tcd-w'); ?></p>
<?php endif; ?>

</div><!-- END #main_col -->

<?php get_footer(); ?>

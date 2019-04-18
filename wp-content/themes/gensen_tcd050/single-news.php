<?php
     get_header();
     $dp_options = get_desing_plus_option();
?>

<?php get_template_part('breadcrumb'); ?>

<div id="main_col" class="clearfix">

 <div id="left_col">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div id="article">
   <div class="article_inner">

    <h2 id="post_title" class="rich_font"><?php the_title(); ?></h2>

<?php if ($dp_options['show_date_news']){ ?>
    <div id="post_date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.d'); ?></time></div>
<?php } ?>

<?php if ($dp_options['show_thumbnail_news'] && has_post_thumbnail() && $page == '1') { ?>
    <div id="post_image">
     <?php the_post_thumbnail('post-thumbnail'); ?>
    </div>
<?php } ?>

<?php if ($dp_options['show_sns_top_news']) { ?>
    <div class="single_share clearfix" id="single_share_top">
     <?php get_template_part('sns-btn-top'); ?>
    </div>
<?php } ?>

    <div class="post_content clearfix">
     <?php the_content(__('Read more', 'tcd-w')); ?>
     <?php custom_wp_link_pages(); ?>
    </div>

<?php if ($dp_options['show_sns_btm_news']) { ?>
    <div class="single_share clearfix" id="single_share_bottom">
     <?php get_template_part('sns-btn-btm'); ?>
    </div>
<?php } ?>

   </div>

<?php if ($dp_options['show_next_post_news']) : ?>
   <div id="previous_next_post" class="clearfix">
    <?php next_prev_post_link(); ?>
   </div>
<?php endif; ?>

  </div><!-- END #article -->

<?php endwhile; endif; ?>

<?php
      // recent post
      if ($dp_options['show_recent_news']) {
        $args = array('post__not_in' => array($post->ID), 'post_type' => $dp_options['news_slug'], 'posts_per_page' => $dp_options['recent_news_num']);
        $my_query = new WP_Query($args);
        if ($my_query->have_posts()) {
 ?>
 <div id="recent_news">
  <h3 class="headline rich_font"><?php echo esc_html($dp_options['recent_news_headline']); ?></h3>
  <ol<?php if ($dp_options['show_date_news']) echo ' class="show_date"'; ?>>
<?php     while ($my_query->have_posts()) { $my_query->the_post(); ?>
   <li class="clearfix">
    <a href="<?php the_permalink() ?>">
     <h3 class="title"><?php the_title(); ?></h3>
     <?php if ($dp_options['show_date_news']){ ?><p class="date"><?php the_time('Y.m.d'); ?></p><?php } ?>
    </a>
   </li>
   <?php  } wp_reset_postdata(); ?>
  </ol>
  <div class="archive_link">
   <a href="<?php echo get_post_type_archive_link($dp_options['news_slug']); ?>"><?php echo esc_html($dp_options['recent_news_link_text']); ?></a>
  </div>
 </div>
<?php
        }
      }
?>

 </div><!-- END #left_col -->

<?php get_sidebar(); ?>

</div><!-- END #main_col -->

<?php get_footer(); ?>

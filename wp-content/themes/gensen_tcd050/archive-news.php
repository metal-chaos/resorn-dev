<?php
    get_header();
    $dp_options = get_desing_plus_option();
?>

<?php get_template_part('breadcrumb'); ?>

<div id="main_col" class="clearfix">

 <div id="left_col">

<?php if ( have_posts() ) : ?>
  <div id="recent_news">
   <h2 class="headline rich_font"><?php echo esc_html($dp_options['news_label']); ?></h2>
   <ol<?php if ($dp_options['show_date_news']) echo ' class="show_date"'; ?>>
<?php while ( have_posts() ) : the_post(); ?>
    <li class="clearfix">
     <a href="<?php the_permalink() ?>">
      <h3 class="title"><?php the_title(); ?></h3>
      <?php if ($dp_options['show_date_news']){ ?><p class="date"><?php the_time('Y.m.d'); ?></p><?php } ?>
     </a>
    </li>
<?php endwhile; ?>
   </ol>
  </div><!-- END #recent_news -->
<?php else: ?>
  <p class="no_post"><?php _e('There is no registered post.', 'tcd-w'); ?></p>
<?php endif; ?>

<?php get_template_part('navigation'); ?>

 </div><!-- END #left_col -->

<?php get_sidebar(); ?>

</div><!-- END #main_col -->

<?php get_footer(); ?>

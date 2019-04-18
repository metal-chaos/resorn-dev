<?php
global $post, $dp_options, $custom_search_vars;
if ( ! $dp_options ) $dp_options = get_desing_plus_option();
$queried_object = get_queried_object();
?>
<div id="breadcrumb">
 <ul class="inner clearfix">

  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb" class="home"><a itemprop="url" href="<?php echo esc_url(home_url('/')); ?>"><span itemprop="title"><?php _e('Home', 'tcd-w'); ?></span></a></li>

<?php if (is_search() || !empty( $custom_search_vars )) { ?>
  <li class="last"><?php echo esc_html( $dp_options['search_results_headline'] ? $dp_options['search_results_headline'] : __( 'Search Results', 'tcd-w' ) ); ?></li>

<?php } elseif (is_post_type_archive($dp_options['news_slug'])) { ?>
  <li class="last"><?php echo esc_html($dp_options['news_breadcrumb_label']); ?></li>

<?php } elseif (is_post_type_archive($dp_options['introduce_slug'])) { ?>
  <li class="last"><?php echo esc_html($dp_options['introduce_breadcrumb_label']); ?></li>

<?php } elseif (is_category()) { ?>
<?php
        if (!empty($queried_object->term_id)) {
          $ancestors = get_ancestors($queried_object->term_id, 'category');
          if ($ancestors) {
            foreach(array_reverse($ancestors) as $term) {
              $term = get_term_by('id', $term, 'category');
              if (!empty($term->term_id)) {
                echo '  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="'.get_term_link($term, 'category').'"><span itemprop="title">'.esc_html($term->name).'</span></a></li>'."\n";
              }
            }
          }
        }
?>
  <li class="last"><?php echo single_cat_title('', false); ?></li>

<?php } elseif (is_tax($dp_options['introduce_tag_slug'])) { ?>
  <li class="last"><?php echo single_tag_title('', false); ?></li>

<?php } elseif (is_tag()) { ?>
  <li class="last"><?php echo single_tag_title('', false); ?></li>

<?php } elseif (is_tax()) { ?>
<?php
        if (!empty($queried_object->term_id)) {
          $ancestors = get_ancestors($queried_object->term_id, $queried_object->taxonomy, 'taxonomy');
          if ($ancestors) {
            foreach(array_reverse($ancestors) as $term) {
              $term = get_term_by('id', $term, $queried_object->taxonomy);
              if (!empty($term->term_id)) {
                echo '  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="'.get_term_link($term).'"><span itemprop="title">'.esc_html($term->name).'</span></a></li>'."\n";
              }
            }
          }
        }
?>
  <li class="last"><?php echo single_cat_title('', false); ?></li>

<?php } elseif (is_day()) { ?>
  <li class="last"><?php echo get_the_time(__('F jS, Y', 'tcd-w')); ?></li>

<?php } elseif (is_month()) { ?>
  <li class="last"><?php echo get_the_time(__('F, Y', 'tcd-w')); ?></li>

<?php } elseif (is_year()) { ?>
  <li class="last"><?php echo get_the_time(__('Y', 'tcd-w')); ?></li>

<?php } elseif (is_author()) { ?>
  <li class="last"><?php echo $queried_object->display_name; ?></li>

<?php } elseif (is_home()) { ?>
  <li class="last"><?php echo esc_html($dp_options['blog_breadcrumb_label']); ?></li>

<?php } elseif (is_404()) { ?>
  <li class="last"><?php _e("Sorry, but you are looking for something that isn't here.","tcd-w"); ?></li>

<?php } elseif (is_singular($dp_options['news_slug'])) { ?>
  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="<?php echo get_post_type_archive_link($dp_options['news_slug']); ?>"><span itemprop="title"><?php echo esc_html($dp_options['news_breadcrumb_label']); ?></span></a></li>
  <li class="last"><?php the_title(); ?></li>

<?php } elseif (is_singular($dp_options['introduce_slug'])) { ?>
  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="<?php echo get_post_type_archive_link($dp_options['introduce_slug']); ?>"><span itemprop="title"><?php echo esc_html($dp_options['introduce_breadcrumb_label']); ?></span></a></li>
  <li class="last"><?php the_title(); ?></li>

<?php
      } elseif (is_single()) {
        if (get_post_type_archive_link('post') != get_bloginfo( 'url' )) {
          echo '  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="'.get_post_type_archive_link('post').'">'.esc_html($dp_options['blog_breadcrumb_label']).'</a></li>'."\n";
        } else {
          echo '  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">'.esc_html($dp_options['blog_breadcrumb_label']).'</li>'."\n";
        }

        if ($dp_options['show_categories']) {
          foreach(explode('-', $dp_options['show_categories']) as $cat) {
            if ($cat == 1) {
              $terms = get_the_terms(get_the_ID(), 'category');
              foreach ($terms as $term) { 
                echo '  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="'.get_term_link($term).'"><span itemprop="title">'.esc_html($term->name).'</span></a></li>'."\n";
              }
              //echo get_the_term_list(get_the_ID(), 'category', '  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">', ', ', '</li>'."\n");
            } elseif (!empty($dp_options['use_category'.$cat])) {
              $terms = get_the_terms(get_the_ID(), $dp_options['category'.$cat.'_slug']);
              if($terms){
                foreach ($terms as $term) { 
                  echo '  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="'.get_term_link($term).'"><span itemprop="title">'.esc_html($term->name).'</span></a></li>'."\n";
                }
              }
              //echo get_the_term_list(get_the_ID(), $dp_options['category'.$cat.'_slug'], '  <li>', ', ', '</li>'."\n");
            }
          }
        } else {
          $terms = get_the_terms(get_the_ID(), 'category');
          foreach ($terms as $term) { 
            echo '  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="'.get_term_link($term).'"><span itemprop="title">'.esc_html($term->name).'</span></a></li>'."\n";
          }
          //echo get_the_term_list(get_the_ID(), 'category', '  <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">', ', ', '</li>'."\n");
        }
?>
  <li class="last"><?php the_title(); ?></li>

<?php } elseif (is_page()) { ?>
  <li class="last"><?php the_title(); ?></li>

<?php } ?>
 </ul>
</div>

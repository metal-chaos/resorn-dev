<?php
    get_header();
    $dp_options = get_desing_plus_option();

    // タグフィルター用ターム配列
  $tags = false;
  if ($custom_search_vars) {
      if ($dp_options['show_search_results_tag_filter']) {
          if ($dp_options['searcn_post_type'] == 'post') {
              $tags = get_terms('post_tag', array());
          } elseif ($dp_options['searcn_post_type'] == 'introduce') {
              $tags = get_terms($dp_options['introduce_tag_slug'], array());
          }
          if (!$tags || is_wp_error($tags)) {
              $tags = false;
          }
      }
  }

  // sort
  if (!empty($_REQUEST['sort']) && in_array($_REQUEST['sort'], array('r_score_desc', 'r_score_asc', 'int_salary_desc', 'int_salary_asc', 'date_asc', 'date_desc', 'views'))) {
      $sort = $_REQUEST['sort'];
  } else {
      $sort = 'r_score_desc';
  }
  $sort_base_url = remove_query_arg('sort');
  $sort_base_url = preg_replace('#/page/\d+#', '', $sort_base_url);
?>

<?php get_template_part('breadcrumb'); ?>

<div class="archive_header">
  <div class="inner">

    <?php if (is_category()) {
    ?>
    <h2 id="archive_headline" class="headline rich_font"><?php echo single_cat_title('', false); ?>のリゾートバイト求人
    </h2>
    <?php
} elseif (is_tag() || is_tax($dp_options['introduce_tag_slug'])) {
        ?>
    <h2 id="archive_headline" class="headline rich_font"><?php echo single_tag_title('', false); ?>のリゾートバイト求人
    </h2>
    <?php
    } elseif (is_search()) {
        ?>
    <?php if (have_posts()) : ?>
    <h2 id="archive_headline" class="headline rich_font"><?php printf(__('Search results for %s', 'tcd-w'), get_search_query()); ?>
    </h2>
    <?php else: ?>
    <h2 id="archive_headline" class="headline rich_font"><?php _e('Search results', 'tcd-w'); ?>
    </h2>
    <?php endif; ?>

    <?php
    } elseif (is_day()) {
        ?>
    <h2 id="archive_headline" class="headline rich_font"><?php printf(__('Archive for &#8216; %s &#8217;', 'tcd-w'), get_the_time(__('F jS, Y', 'tcd-w'))); ?>
    </h2>

    <?php
    } elseif (is_month()) {
        ?>
    <h2 id="archive_headline" class="headline rich_font"><?php printf(__('Archive for &#8216; %s &#8217;', 'tcd-w'), get_the_time(__('F, Y', 'tcd-w'))); ?>aaa
    </h2>

    <?php
    } elseif (is_year()) {
        ?>
    <h2 id="archive_headline" class="headline rich_font"><?php printf(__('Archive for &#8216; %s &#8217;', 'tcd-w'), get_the_time(__('Y', 'tcd-w'))); ?>
    </h2>

    <?php
    } elseif (is_author()) {
        ?>
    <?php global $wp_query;
        $curauth = $wp_query->get_queried_object(); //get the author info?>
    <h2 id="archive_headline" class="headline rich_font"><?php printf(__('Archive for the &#8216; %s &#8217;', 'tcd-w'), $curauth->display_name); ?>
    </h2>

    <?php
    } elseif (is_home()) {
        ?>
    <h2 id="archive_headline" class="headline rich_font"><?php echo esc_html($dp_options['blog_archive_headline']); ?>
    </h2>
    <?php if ($dp_options['blog_archive_desc']) {
            ?>
    <p id="archive_desc"><?php echo str_replace(array("\r\n", "\r", "\n"), '<br>', esc_html($dp_options['blog_archive_desc'])); ?>
    </p>
    <?php
        } ?>

    <?php
    } ?>
  </div>
</div>
<div id="main_col" class="clearfix">
  <div id="left_col" class="custom_search_results">

    <?php if (have_posts()) : ?>
    <dl class="archive_sort clearfix">
      <dt><?php _e('Sort condition', 'tcd-w'); ?>
      </dt>
      <dd><a
          href="<?php echo esc_attr(add_query_arg('sort', 'r_score_desc', $sort_base_url)); ?>"
          <?php if ($sort == 'r_score_desc') {
        echo ' class="active"';
    } ?>>RESORNスコアが高い順</a>
      </dd>
      <dd><a
          href="<?php echo esc_attr(add_query_arg('sort', 'r_score_asc', $sort_base_url)); ?>"
          <?php if ($sort == 'r_score_asc') {
        echo ' class="active"';
    } ?>>RESORNスコアが低い順</a>
      </dd>
      <dd><a
          href="<?php echo esc_attr(add_query_arg('sort', 'int_salary_desc', $sort_base_url)); ?>"
          <?php if ($sort == 'int_salary_desc') {
    echo ' class="active"';
} ?>>給与が高い順</a>
      </dd>
      <dd><a
          href="<?php echo esc_attr(add_query_arg('sort', 'int_salary_asc', $sort_base_url)); ?>"
          <?php if ($sort == 'int_salary_asc') {
    echo ' class="active"';
} ?>>給与が低い順</a>
      </dd>
      <dd><a
          href="<?php echo esc_attr(add_query_arg('sort', 'date_desc', $sort_base_url)); ?>"
          <?php if ($sort == 'date_desc') {
        echo ' class="active"';
    } ?>><?php _e('Newest first', 'tcd-w'); ?></a>
      </dd>
      <dd><a
          href="<?php echo esc_attr(add_query_arg('sort', 'date_asc', $sort_base_url)); ?>"
          <?php if ($sort == 'date_asc') {
        echo ' class="active"';
    } ?>><?php _e('Oldest first', 'tcd-w'); ?></a>
      </dd>
      <dd><a
          href="<?php echo esc_attr(add_query_arg('sort', 'views', $sort_base_url)); ?>"
          <?php if ($sort == 'views') {
        echo ' class="active"';
    } ?>><?php _e('Large number of views', 'tcd-w'); ?></a>
      </dd>
    </dl>

    <?php get_template_part('navigation2'); ?>

    <ol id="post_list2">

      <?php   while (have_posts()) : the_post(); ?>
      <li class="article">
        <a href="<?php the_permalink() ?>"
          title="<?php the_title_attribute(); ?>" class="clearfix">
          <div class="r_score" id=score<?php echo resorn_score(); ?>
            >
            <div class="r_score_title">RESORNスコア</div>
            <div class="r_score_text"
              id="score<?php echo esc_html($post->resorn_score_field); ?>">
              <i
                class="s-rating s-rating-<?php echo esc_html(change_resorn_score_format($post->resorn_score_field)); ?>">
                <span class="s-text">（星5のうち星<span class="s-text-int"><?php echo esc_html($post->resorn_score_field); ?></span>）</span>
              </i>
            </div>
            <!-- <div class="image">
      <?php /*
      if ( has_post_thumbnail() ) {
          the_post_thumbnail();
      } else {
        if ( is_mobile() ) {
          echo '<img src="' . get_template_directory_uri() . '/img/common/no_image1.gif" title="" alt="" />';
        } else {
          echo '<img src="' . get_template_directory_uri() . '/img/common/no_image2.gif" title="" alt="" />';
        }
      } */?>-->
          </div>
          <div class="info">
            <?php
        $metas = array();
        if ($post->post_type == 'post') {
            if ($dp_options['show_categories']) {
                foreach (explode('-', $dp_options['show_categories']) as $cat) {
                    if ($cat == 1) {
                        $terms = get_the_terms($post->ID, 'category');
                        if ($terms && !is_wp_error($terms)) {
                            foreach ($terms as $term) {
                                $metas['category'][] = '<span class="cat-category" data-href="'.get_term_link($term).'" title="'.esc_attr($term->name).'">'.esc_html($term->name).'</span>';
                            }
                            $metas['category'] = '<li class="cat">'.implode('', $metas['category']).'</li>';
                        }
                    } elseif (!empty($dp_options['use_category'.$cat])) {
                        $terms = get_the_terms($post->ID, $dp_options['category'.$cat.'_slug']);
                        if ($terms && !is_wp_error($terms)) {
                            foreach ($terms as $term) {
                                $metas['category'.$cat][] = '<span class="cat-'.esc_attr($dp_options['category'.$cat.'_slug']).'" data-href="'.get_term_link($term).'" title="'.esc_attr($term->name).'">'.esc_html($term->name).'</span>';
                            }
                            $metas['category'.$cat] = '<li class="cat">'.implode('', $metas['category'.$cat]).'</li>';
                        }
                    }
                }
            }
        } elseif ($post->post_type == $dp_options['introduce_slug']) {
            if ($dp_options['show_introduce_categories']) {
                foreach (explode('-', $dp_options['show_introduce_categories']) as $cat) {
                    if (!empty($dp_options['use_introduce_category'.$cat])) {
                        $terms = get_the_terms($post->ID, $dp_options['introduce_category'.$cat.'_slug']);
                        if ($terms && !is_wp_error($terms)) {
                            $term = array_shift($terms);
                            $metas[] = '<li class="cat"><span class="cat-'.esc_attr($dp_options['introduce_category'.$cat.'_slug']).'" data-href="'.get_term_link($term).'" title="'.esc_attr($term->name).'">'.esc_html($term->name).'</span></li>';
                        }
                    }
                }
            }
        }

        if ($metas) {
            echo '    <ul class="meta clearfix">'.implode('', $metas).'</ul>'."\n";
        }
?>
            <h3 class="title"><?php trim_title(38); ?>
            </h3>
            <?php
        if (is_mobile()) {
            if (has_post_thumbnail()) {
                echo '<div class="image">';
                the_post_thumbnail();
                echo '</div>';
            }
        }
     ?>

            <table class="recruit_list">
              <tr>
                <th>会社</th>
                <td><img class="recruit_list_company"
                    src="<?php echo do_shortcode('[company_image]'); ?>">
                </td>
              </tr>
              <tr class="pc-hidden">
                <th>評価</th>
                <td><i
                    class="s-rating s-rating-<?php echo esc_html(change_resorn_score_format($post->resorn_score_field)); ?> s-offers-sp">
                      <span class="s-text">（星5のうち星<span class="s-text-int"><?php echo esc_html($post->resorn_score_field); ?></span>）</span>
                  </i>
                </td>
              </tr>
              <tr>
                <th>職種</th>
                <td><?php echo esc_html($post->occupation_field); ?>
                </td>
              </tr>
              <tr>
                <th>給与</th>
                <td><?php echo wp_strip_all_tags(salary_fi()); ?>
                </td>
              </tr>
            </table>
            <div class="navigation2_icons">
              <img
                class="<?php echo esc_html($post->icon_dormitory_field); ?>"
                src="https://resorn.net/wp-content/uploads/2018/02/new-koshitsuryo-1.png">
              <img
                class="<?php echo esc_html($post->icon_highIncome_field); ?>"
                src="https://resorn.net/wp-content/uploads/2018/02/new-koshunyu-1.png">
              <img
                class="<?php echo esc_html($post->icon_campaign_field); ?>"
                src="https://resorn.net/wp-content/uploads/2018/02/new-campaign-1.png">
              <img
                class="<?php echo esc_html($post->icon_meal_field); ?>"
                src="https://resorn.net/wp-content/uploads/2018/02/new-shokuji-1.png">
              <img
                class="<?php echo esc_html($post->icon_transportationFee_field); ?>"
                src="https://resorn.net/wp-content/uploads/2018/02/new-carloan-1.png">
              <img
                class="<?php echo esc_html($post->icon_wifi_field); ?>"
                src="https://resorn.net/wp-content/uploads/2018/02/new-wifi-1.png">
              <img
                class="<?php echo esc_html($post->icon_spa_field); ?>"
                src="https://resorn.net/wp-content/uploads/2018/02/new-spa-1.png">
            </div>
            <div class="recruit_list_btn">詳しい内容を見る</div>
          </div>
        </a>
      </li>
      <?php   endwhile; ?>

    </ol><!-- END #post_list -->
    <?php else: ?>
    <p class="no_post"><?php _e('There is no registered post.', 'tcd-w'); ?>
    </p>
    <?php endif; ?>

    <?php get_template_part('navigation2'); ?>

    <?php
$queried_object = get_queried_object();
  if (get_template_part('tags-article/article', $queried_object->slug) ==true) {
      get_template_part('tags-article/article', $queried_object->slug);
  } ?>

  </div><!-- END #left_col -->

  <?php get_sidebar(); ?>

</div><!-- END #main_col -->

<?php get_footer();

<?php
    // カスタム検索用グローバル変数
    global $custom_search_vars;
    $upload_dir = wp_upload_dir();
    $sort_info = sort_info();

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
    <!-- カテゴリかタグが表示されているなら -->
    <?php
    if (is_category() || is_tax()) {
        $queried_object = get_queried_object(); ?>
    <h2 class="headline rich_font"><?php echo esc_html($queried_object->name); ?>のリゾートバイト求人</h2>
    <?php

        if (get_template_part(read_category_template()) == true) {
          get_template_part(read_category_template());
        }
    ?>
    <?php
        if ($queried_object->description) {
            ?>
    <p class="desc"><?php echo str_replace(array("\r\n", "\r", "\n"), '<br>', esc_html($queried_object->description)); ?>
    </p>
    <?php
        }
    } elseif ($dp_options['search_results_headline']) {
        ?>
    <!-- 「検索するボタン」を押したあとに表示されるページ -->
    <h2 class="headline rich_font">リゾートバイト<?php echo esc_html($dp_options['search_results_headline']); ?>
    </h2>
    <?php
    } else {
        ?>
    <h2 class="headline rich_font"><?php _e('Search Results', 'tcd-w'); ?>
    </h2>
    <?php
    }
?>
  </div>
</div>

<div id="main_col" class="clearfix">

  <div id="left_col" class="custom_search_results">
    <?php
    $thisCat = get_category($cat); //現在表示しているカテゴリー情報を取得
 
    $args = array(
    'parent' => $cat //現在のカテゴリーの直近子カテゴリーを取得
    );
    $catChildren = get_categories($args); //上記の条件でカテゴリー情報を取得
    if ($catChildren) { //子カテゴリーがある場合、子カテゴリーを表示する
      echo '<h3 class="areas_head">エリアをさらに細かく絞る<i class="far fa-caret-square-down"></i></h3>';
        echo '<ul class="category_areas">';
        foreach ($catChildren as $catChild) {
            echo '<li class="category_area"><a href="'. get_category_link($catChild->term_id). '" title="' .$catChild -> name. 'のリゾートバイト求人">'. $catChild -> name. '</a></li>';
        }
        echo '</ul>';
    }
?>

    <?php
    if (have_posts() || !empty($_REQUEST['filter_tag'])) {
        // タグ絞り込み検索表示
        if ($tags) {
            ?>
    <form action="?" method="get" class="archive_filter">
      <?php
            foreach (array('post_type', 'page_id', 'cat', 'p', 'sort', 'search_keywords', 'search_keywords_operator', 'search_cat1', 'search_cat2') as $get_key) {
                if (!empty($_REQUEST[$get_key])) {
                    ?>
      <input type="hidden" name="<?php echo esc_attr($get_key); ?>"
        value="<?php echo esc_attr(stripslashes($_REQUEST[$get_key])); ?>">
      <?php
                }
            } ?>
      <div class="archive_filter_headline rich_font"><span class="tag_headline"><?php _e('Refine Search', 'tcd-w'); ?></span><i
          class="far fa-caret-square-down"></i></div>
      <div class="archive_filter01 archive_filter_tag clearfix">
        <?php
            foreach ($tags as $tag) {
                $checked = '';
                if (!empty($_REQUEST['filter_tag']) && in_array($tag->term_id, $_REQUEST['filter_tag'])) {
                    $checked = ' checked="checked"';
                } else {
                    $checked = '';
                }
                echo '   <label><input type="checkbox" name="filter_tag[]" value="'.esc_attr($tag->term_id).'"'.$checked.'><span class="tag_text">'.esc_html($tag->name).'</span></label>'."\n";
            } ?>
      </div>
      <div class="button">
        <input type="submit"
          value="<?php _e('Search for', 'tcd-w'); ?>">
      </div>
    </form>
    <?php
        }
    }
?>

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

    <!-- SP用のソートセレクトボックス -->
    <div class="select-bx">
      <p>並び順：</p>
      <div class="select-name">
        <form name="sort_form">
          <select name="sort" onchange="dropsort()">
            <?php foreach ($sort_info as $sort_query => $sort_name ) : ?>
            <option
              value="<?php echo esc_attr(add_query_arg('sort', $sort_query, $sort_base_url)); ?>"
              <?php if ($sort == $sort_query) {echo 'selected';} ?>><?php echo $sort_name; ?>
            </option>
            <?php endforeach; ?>
          </select>
        </form>
        <i class="far fa-caret-square-down"></i>
      </div>
    </div>

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
            <!-- <?php
            /* if ( has_post_thumbnail() ) {
                    echo '<div class="image">';
          the_post_thumbnail();
            } else {
                if ( is_mobile() ) {
                    //echo '<img src="' . get_template_directory_uri() . '/img/common/no_image1.gif" title="" alt="" />';
          echo '<div class="r_score" id=score'. resorn_score(). '>';
          echo '<div class="r_score_title">RESORNスコア</div>';
          echo '<div class="r_score_text' . resorn_score() . '">' . resorn_score() . '</div>';
                } else {
                    // echo '<img src="' . get_template_directory_uri() . '/img/common/no_image2.gif" title="" alt="" />';
          echo '<div class="r_score" id=score'. resorn_score(). '>';
          echo '<div class="r_score_title">RESORNスコア</div>';
          echo '<div class="r_score_text' . resorn_score() . '">' . resorn_score() . '</div>';
                }
            }  */?> -->
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
            <!-- <div class="r_score_sp" id=score<?php echo resorn_score(); ?>
            >
            <div class="r_score_title_sp">RESORNスコア</div>
            <div class="r_score_text_sp">
            </div>
          </div> -->
          <table class="recruit_list">
            <tr>
              <th>会社</th>
              <td><img class="recruit_list_company"
                  src="<?php echo do_shortcode('[company_image]'); ?>"
                  alt="<?php echo return_company_alt(); ?>">
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
              src="<?php echo welfare_path('icon_dormitory_field', $post->icon_dormitory_field); ?>"
              alt="<?php echo welfare_alt('icon_dormitory_field', $post->icon_dormitory_field); ?>">
            <img
              class="<?php echo esc_html($post->icon_highIncome_field); ?>"
              src="<?php echo welfare_path('icon_highIncome_field', $post->icon_highIncome_field); ?>"
              alt="<?php echo welfare_alt('icon_highIncome_field', $post->icon_highIncome_field); ?>">
            <img
              class="<?php echo esc_html($post->icon_campaign_field); ?>"
              src="<?php echo welfare_path('icon_campaign_field', $post->icon_campaign_field); ?>"
              alt="<?php echo welfare_alt('icon_campaign_field', $post->icon_campaign_field); ?>">
            <img
              class="<?php echo esc_html($post->icon_meal_field); ?>"
              src="<?php echo welfare_path('icon_meal_field', $post->icon_meal_field); ?>"
              alt="<?php echo welfare_alt('icon_meal_field', $post->icon_meal_field); ?>">
            <img
              class="<?php echo esc_html($post->icon_transportationFee_field); ?>"
              src="<?php echo welfare_path('icon_transportationFee_field', $post->icon_transportationFee_field); ?>"
              alt="<?php echo welfare_alt('icon_transportationFee_field', $post->icon_transportationFee_field); ?>">
            <img
              class="<?php echo esc_html($post->icon_wifi_field); ?>"
              src="<?php echo welfare_path('icon_wifi_field', $post->icon_wifi_field); ?>"
              alt="<?php echo welfare_alt('icon_wifi_field', $post->icon_wifi_field); ?>">
            <img
              class="<?php echo esc_html($post->icon_spa_field); ?>"
              src="<?php echo welfare_path('icon_spa_field', $post->icon_spa_field); ?>"
              alt="<?php echo welfare_alt('icon_spa_field', $post->icon_spa_field); ?>">
          </div>
          <div class="recruit_list_btn">詳しい内容を見る</div>
  </div>
  </a>
  </li>
  <?php   endwhile; ?>

  </ol><!-- END #post_list2 -->

  <?php get_template_part('navigation2'); ?>

  <?php else: ?>
  <p class="no_post"><?php _e('There is no registered post.', 'tcd-w'); ?>
  </p>
  <?php endif; ?>

</div><!-- END #left_col -->

<?php get_sidebar(); ?>

</div><!-- END #main_col -->

<?php get_footer();

<?php
    $dp_options = get_desing_plus_option();
    $top_of_salary = top_of_salary();

    global $header_slider;
    $header_slider = array();

    // 画像スライダー
    if ($dp_options['header_content_type'] == 'type1') {
        for ($i = 1; $i <= 5; $i++) {
            if (!is_mobile()) {
                $image = wp_get_attachment_image_src($dp_options['slider_image'.$i], 'full');
            } else {
                $image = wp_get_attachment_image_src($dp_options['slider_image_mobile'.$i], 'full');
            }
            if (!empty($image[0])) {
                $header_slider['header_content_type'] = 'type1';
                $header_slider['slider'][$i]['image'] = $image;
            }
        }

        // 動画
    } elseif ($dp_options['header_content_type'] == 'type2') {
        if ($dp_options['slider_video']) {
            $header_slider['header_content_type'] = 'type2';
            $header_slider['slider_video'] = wp_get_attachment_url($dp_options['slider_video']);
            $image = wp_get_attachment_image_src($dp_options['slider_video_image'], 'full');
            if (!empty($image[0])) {
                $header_slider['slider_video_image'] = $image;
            }
        }

        // youtube
    } elseif ($dp_options['header_content_type'] == 'type3') {
        if ($dp_options['slider_youtube_url']) {
            $header_slider['header_content_type'] = 'type3';
            $header_slider['slider_youtube_url'] = $dp_options['slider_youtube_url'];
            $image = wp_get_attachment_image_src($dp_options['slider_youtube_image'], 'full');
            if (!empty($image[0])) {
                $header_slider['slider_youtube_image'] = $image;
            }
        }
    }

    get_header();
?>

<?php
    // 画像スライダー
    if (!empty($header_slider['slider'])) :
?>
<div id="header_slider">
    <?php
      $is_first_slide = true;
      foreach ($header_slider['slider'] as $i => $slider) :
        if ($dp_options['slider_url'.$i] && ($dp_options['use_slider_caption'.$i] == 0 || ($dp_options['use_slider_caption'.$i] == 1 && $dp_options['show_slider_button'.$i] == 0))) {
            $wrap_anchor = true;
        } else {
            $wrap_anchor = false;
        }
?>
    <div class="item item<?php echo esc_attr($i); ?>">
        <?php   if ($wrap_anchor) {
    ?>
        <a href="<?php echo esc_attr($dp_options['slider_url'.$i]); ?>"
            <?php if ($dp_options['slider_target'.$i]) {
        echo ' target="_blank"';
    } ?>>
            <?php
} ?>
            <?php   if ($dp_options['use_slider_caption'.$i] == 1) {
        ?>
            <div class="two-culumns">
                <div class="caption">
                    <?php
          if ($dp_options['slider_headline'.$i]) {
              echo '<p class="headline rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_headline'.$i])).'</p>';
          }
        if ($dp_options['slider_caption'.$i]) {
            echo '<p class="catchphrase rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_caption'.$i])).'</p>';
        }
        if ($dp_options['show_slider_button'.$i] == 1 && $dp_options['slider_button'.$i] && $dp_options['slider_url'.$i]) {
            echo '<a class="button" href="'.esc_attr($dp_options['slider_url'.$i]).'"'.($dp_options['slider_target'.$i] ? ' target="_blank"' : '').'>'.esc_html($dp_options['slider_button'.$i]).'</a>';
        } elseif ($dp_options['show_slider_button'.$i] == 1 && $dp_options['slider_button'.$i]) {
            echo '<div class="button">'.esc_html($dp_options['slider_button'.$i]).'</div>';
        } ?>
                    <div class="top-information-cols">
                        <div class="col-3">
                            <div class="heading">掲載件数</div>
                            <p><?php echo number_of_all_job_offers(); ?>件
                            </p>
                        </div>
                        <div class="col-3">
                            <div class="heading">平均時給</div>
                            <p><?php echo average_salary_all_job_offers(); ?>円
                            </p>
                        </div>
                        <div class="col-3">
                            <div class="heading">最高時給</div>
                            <p><?php echo $top_of_salary['salary']; ?>円
                            </p>
                        </div>
                    </div>
                </div><!-- END .caption -->
                <div id="index_header_search">
                    <div class="inner">
                        <?php get_template_part('custom_search_form_for_front_page'); ?>
                    </div>
                </div>
            </div>
            <?php
    } ?>
            <?php   if ($is_first_slide) {
        $is_first_slide = false; ?>
            <img src="<?php echo esc_attr($slider['image'][0]); ?>"
                alt="" />
            <?php
    } else {
        ?>
            <img data-lazy="<?php echo esc_attr($slider['image'][0]); ?>"
                alt="" />
            <?php
    } ?>
            <?php   if ($wrap_anchor) {
        ?>
        </a>
        <?php
    } ?>
    </div><!-- END .item -->
    <?php
      endforeach;
?>
</div><!-- END #header_slider -->
<?php
    // 動画
    elseif (!empty($header_slider['slider_video'])) :
      if (!wp_is_mobile()) : // if is pc
?>
<div id="header_slider" class="slider_video">
    <div class="slider_video_wrapper">
        <div id="slider_video" class="slider_video_container slider_video"></div>
    </div>
    <?php   if ($dp_options['use_slider_video_caption'] == 1) {
    ?>
    <div class="caption">
        <?php
          if ($dp_options['slider_video_headline']) {
              echo '<p class="headline rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_video_headline'])).'</p>';
          }
    if ($dp_options['slider_video_caption']) {
        echo '<p class="catchphrase rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_video_caption'])).'</p>';
    }
    if ($dp_options['show_slider_video_button'] == 1 && $dp_options['slider_video_button'] && $dp_options['slider_video_button_url']) {
        echo '<a class="button" href="'.esc_attr($dp_options['slider_video_button_url']).'"'.($dp_options['slider_video_button_target'] ? ' target="_blank"' : '').'>'.esc_html($dp_options['slider_video_button']).'</a>';
    } elseif ($dp_options['show_slider_video_button'] == 1 && $dp_options['slider_video_button']) {
        echo '<div class="button">'.esc_html($dp_options['slider_video_button']).'</div>';
    } ?>
    </div><!-- END .caption -->
    <?php
} ?>
</div><!-- END #header_slider -->
<?php elseif (!empty($header_slider['slider_video_image'][0])) : // if is mobile device?>
<div id="header_slider" class="slider_video_mobile">
    <div class="item">
        <img src="<?php echo esc_attr($header_slider['slider_video_image'][0]); ?>"
            alt="" title="" />
        <?php   if ($dp_options['use_slider_video_caption'] == 1) {
        ?>
        <div class="caption">
            <?php
          if ($dp_options['slider_video_headline']) {
              echo '<p class="headline rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_video_headline'])).'</p>';
          }
        if ($dp_options['slider_video_caption']) {
            echo '<p class="catchphrase rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_video_caption'])).'</p>';
        }
        if ($dp_options['show_slider_video_button'] == 1 && $dp_options['slider_video_button'] && $dp_options['slider_video_button_url']) {
            echo '<a class="button" href="'.esc_attr($dp_options['slider_video_button_url']).'"'.($dp_options['slider_video_button_target'] ? ' target="_blank"' : '').'>'.esc_html($dp_options['slider_video_button']).'</a>';
        } elseif ($dp_options['show_slider_video_button'] == 1 && $dp_options['slider_video_button']) {
            echo '<div class="button">'.esc_html($dp_options['slider_video_button']).'</div>';
        } ?>
        </div><!-- END .caption -->
        <?php
    } ?>
    </div><!-- END .item -->
</div><!-- END #header_slider -->
<?php
      endif;

    // youtube
    elseif (!empty($header_slider['slider_youtube_url'])) :
      if (!wp_is_mobile()) : // if is pc
?>
<div id="header_slider" class="slider_video">
    <div class="slider_video_wrapper">
        <div id="slider_video" class="slider_video_container slider_youtube"></div>
        <div id="slider_youtube" class="player youtube_video_player"
            data-property="{videoURL:'<?php echo esc_attr($header_slider['slider_youtube_url']); ?>',containment:'#slider_video',showControls:false,startAt:0,mute:true,autoPlay:true,loop:true,opacity:1,ratio:'16/9'}">
        </div>
    </div>
    <?php   if ($dp_options['use_slider_youtube_caption'] == 1) {
    ?>
    <div class="caption">
        <?php
          if ($dp_options['slider_youtube_headline']) {
              echo '<p class="headline rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_youtube_headline'])).'</p>';
          }
    if ($dp_options['slider_youtube_caption']) {
        echo '<p class="catchphrase rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_youtube_caption'])).'</p>';
    }
    if ($dp_options['show_slider_youtube_button'] == 1 && $dp_options['slider_youtube_button'] && $dp_options['slider_youtube_button_url']) {
        echo '<a class="button" href="'.esc_attr($dp_options['slider_youtube_button_url']).'"'.($dp_options['slider_youtube_button_target'] ? ' target="_blank"' : '').'>'.esc_html($dp_options['slider_youtube_button']).'</a>';
    } elseif ($dp_options['show_slider_youtube_button'] == 1 && $dp_options['slider_youtube_button']) {
        echo '<div class="button">'.esc_html($dp_options['slider_youtube_button']).'</div>';
    } ?>
    </div><!-- END .caption -->
    <?php
} ?>
    <div id="index_header_search">
        <div class="inner">
            <?php get_template_part('custom_search_form'); ?>
        </div>
    </div>
</div><!-- END #header_slider -->
<?php elseif (!empty($header_slider['slider_youtube_image'][0])) : // if is mobile device?>
<div id="header_slider" class="slider_video_mobile">
    <div class="item">
        <img src="<?php echo esc_attr($header_slider['slider_youtube_image'][0]); ?>"
            alt="" title="" />
        <?php   if ($dp_options['use_slider_youtube_caption'] == 1) {
        ?>
        <div class="caption">
            <?php
          if ($dp_options['slider_youtube_headline']) {
              echo '<p class="headline rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_youtube_headline'])).'</p>';
          }
        if ($dp_options['slider_youtube_caption']) {
            echo '<p class="catchphrase rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_youtube_caption'])).'</p>';
        }
        if ($dp_options['show_slider_youtube_button'] == 1 && $dp_options['slider_youtube_button'] && $dp_options['slider_youtube_button_url']) {
            echo '<a class="button" href="'.esc_attr($dp_options['slider_youtube_button_url']).'"'.($dp_options['slider_youtube_button_target'] ? ' target="_blank"' : '').'>'.esc_html($dp_options['slider_youtube_button']).'</a>';
        } elseif ($dp_options['show_slider_youtube_button'] == 1 && $dp_options['slider_youtube_button']) {
            echo '<div class="button">'.esc_html($dp_options['slider_youtube_button']).'</div>';
        } ?>
        </div><!-- END .caption -->
        <?php
    } ?>
    </div><!-- END .item -->
</div><!-- END #header_slider -->
<?php
      endif;
    endif;
?>

<?php
    if (is_show_custom_search_form(true)) :
?>
<?php
    endif;
?>

<?php
    if ($dp_options['show_index_news']) :
      $args = array('post_type' => $dp_options['news_slug'], 'ignore_sticky_posts' => 1, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => $dp_options['index_news_num']);
      $post_list = get_posts($args);
      if ($post_list) :
?>
<div id="index_news">
    <div class="inner">
        <div class="newsticker">
            <ol class="newsticker-list">
                <?php     foreach ($post_list as $post) : setup_postdata($post); ?>
                <li class="newsticker-item">
                    <a href="<?php echo the_permalink(); ?>"><span><?php if ($dp_options['show_index_news_date']) : ?><time
                                class="entry-date updated"
                                datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.d'); ?></time><?php endif; ?><?php trim_title(50); ?></span></a>
                </li>
                <?php   endforeach; wp_reset_postdata(); ?>
            </ol>
            <?php   if ($dp_options['show_index_news_archive_link'] && $dp_options['index_news_archive_link_text']) : ?>
            <div class="archive_link">
                <a
                    href="<?php echo get_post_type_archive_link($dp_options['news_slug']); ?>"><?php echo esc_html($dp_options['index_news_archive_link_text']); ?></a>
            </div>
            <?php   endif; ?>
        </div>
    </div>
</div>
<?php
      endif;
    endif;
    if ($dp_options['show_index_news_mobile']) :
      $args = array('post_type' => $dp_options['news_slug'], 'ignore_sticky_posts' => 1, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => $dp_options['index_news_num_mobile']);
      $post_list = get_posts($args);
      if ($post_list) :
?>
<div id="index_news_mobile">
    <div class="inner">
        <ol>
            <?php     foreach ($post_list as $post) : setup_postdata($post); ?>
            <li>
                <a href="<?php echo the_permalink(); ?>"><span><?php if ($dp_options['show_index_news_date_mobile']) : ?><time
                            class="entry-date updated"
                            datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.d'); ?></time><?php endif; ?><?php trim_title(50); ?></span></a>
            </li>
            <?php   endforeach; wp_reset_postdata(); ?>
        </ol>
        <?php   if ($dp_options['show_index_news_archive_link_mobile'] && $dp_options['index_news_archive_link_text_mobile']) : ?>
        <div class="archive_link">
            <a
                href="<?php echo get_post_type_archive_link($dp_options['news_slug']); ?>"><?php echo esc_html($dp_options['index_news_archive_link_text_mobile']); ?></a>
        </div>
        <?php   endif; ?>
    </div>
</div>
<?php
      endif;
    endif;
?>

<div id="main_col">

    <?php
    // コンテンツビルダー
    if (! empty($dp_options['contents_builder'])) :
        foreach ($dp_options['contents_builder'] as $key => $content) :
            $cb_index = 'cb_' . $key;
            if (empty($content['cb_content_select'])) {
                continue;
            }
            if (isset($content['cb_display']) && ! $content['cb_display']) {
                continue;
            }

            // 紹介コンテンツ
            if ($content['cb_content_select'] == 'introduce') :
                $args = array('post_type' => $dp_options['introduce_slug'], 'posts_per_page' => '-1', 'ignore_sticky_posts' => 1, 'orderby' => 'date', 'order' => 'DESC', 'meta_key' => 'show_front_page', 'meta_value' => '1');
                if ($content['cb_order'] == 'random') :
                    $args['orderby'] = 'rand';
                endif;

                $cb_posts = new WP_Query($args);
                if ($cb_posts->have_posts()) :
?>

    <div id="cb_<?php echo esc_attr($key); ?>"
        class="cb_content cb_content-<?php echo esc_attr($content['cb_content_select']); ?> inview-fadein">
        <div class="inner">
            <?php
                    if ($content['cb_headline']) :
                        echo '   <h2 class="cb_headline rich_font">' . str_replace(array( "\r\n", "\r", "\n" ), '<br>', esc_html($content['cb_headline'])) . "</h2>\n";
                    endif;
                    if ($content['cb_desc']) :
                        echo '   <p class="cb_desc">' . str_replace(array( "\r\n", "\r", "\n" ), '<br>', esc_html($content['cb_desc'])) . "</p>\n";
                    endif;
?>
            <div id="introduce_list">
                <div class="introduce_list_row inview-fadein clearfix">
                    <?php
                    $i = 0;
                    $row = 0;
                    while ($cb_posts->have_posts()) :
                        $cb_posts->the_post();

                        if ($i > 0 && $i % 3 == 0) :
                            $row++;
?>
                </div>
                <div class="introduce_list_row inview-fadein clearfix">
                    <?php
                        endif;

                        $col_class = '';
                        if ($row % 2 == 0) :
                            if ($i % 3 == 0) :
                                $col_class = ' show_info';
                            endif;
                        else :
                            if ($i % 3 == 2) :
                                $col_class = ' show_info';
                            endif;
                        endif;
?>
                    <div
                        class="article introduce_list_col<?php echo esc_attr($col_class); ?>">
                        <a href="<?php the_permalink() ?>"
                            title="<?php the_title_attribute(); ?>"
                            class="clearfix">
                            <div class="image">
                                <?php if (has_post_thumbnail()) {
    the_post_thumbnail('size3');
} else {
    ?><img src="<?php echo get_template_directory_uri(); ?>/img/common/no_image3.gif"
                                    title="" alt="" /><?php
} ?>
                            </div>
                            <div class="info">
                                <?php
          if ($dp_options['show_introduce_categories']) {
              $metas = array();
              foreach (explode('-', $dp_options['show_introduce_categories']) as $cat) {
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
                                <h3 class="title"><?php if (is_mobile()) {
            echo wp_trim_words(get_the_title(), 25, '...');
        } else {
            trim_title(32);
        } ?>
                                </h3>
                                <p class="excerpt"><?php new_excerpt(148); ?>
                                </p>
                                <p class="more"><?php _e('Read more', 'tcd-w'); ?>
                                </p>
                            </div>
                        </a>
                    </div>
                    <?php
                        $i++;
                    endwhile;
                    wp_reset_postdata();
?>
                </div>
            </div>
        </div>
    </div>

    <?php
                endif;

            //カルーセルスライダー
            elseif ($content['cb_content_select'] == 'carousel') :
                $args = array('post_type' => 'post', 'posts_per_page' => $content['cb_post_num'], 'ignore_sticky_posts' => 1, 'orderby' => 'date', 'order' => 'DESC');

                if ($content['cb_post_type'] == 'introduce') :
                    $args['post_type'] = $dp_options['introduce_slug'];
                    // タクソノミーターム
                    if ($content['cb_introduce_term']) :
                        $term = get_term($content['cb_introduce_term']);
                        if ($term && !is_wp_error($term)) :
                            $args['tax_query'][] = array('taxonomy' => $term->taxonomy, 'field' => 'term_id', 'terms' => array($term->term_id), 'operator' => 'IN');
                        endif;
                    endif;
                else :
                    if ($content['cb_list_type'] == 'recommend_post' || $content['cb_list_type'] == 'recommend_post2') :
                        $args['orderby'] = 'rand';
                        $args['meta_key'] = $content['cb_list_type'];
                        $args['meta_value'] = 'on';
                    endif;
                endif;

                $cb_posts = new WP_Query($args);
                if ($cb_posts->have_posts()) :
?>

    <div id="cb_<?php echo esc_attr($key); ?>"
        class="cb_content cb_content-<?php echo esc_attr($content['cb_content_select']); ?> inview-fadein"
        style="background-color:<?php echo esc_attr($content['cb_background_color']); ?>">
        <div class="inner">
            <?php
                    if ($content['cb_headline']) :
                        echo '   <h2 class="cb_headline rich_font">' . str_replace(array( "\r\n", "\r", "\n" ), '<br>', esc_html($content['cb_headline'])) . "</h2>\n";
                    endif;
                    if ($content['cb_desc']) :
                        echo '   <p class="cb_desc">' . str_replace(array( "\r\n", "\r", "\n" ), '<br>', esc_html($content['cb_desc'])) . "</p>\n";
                    endif;
?>
            <div class="carousel">
                <?php

                    while ($cb_posts->have_posts()) :
                        $cb_posts->the_post();
?>
                <div class="article item">
                    <a href="<?php the_permalink() ?>"
                        title="<?php the_title_attribute(); ?>">
                        <div class="image">
                            <?php if (has_post_thumbnail()) {
    the_post_thumbnail('size2');
} else {
    ?><img src="<?php echo get_template_directory_uri(); ?>/img/common/no_image2.gif"
                                title="" alt="" /><?php
} ?>
                            <h3 class="title"><?php trim_title(34); ?>
                            </h3>
                        </div>
                        <p class="excerpt"><?php new_excerpt(90); ?>
                        </p>
                    </a>
                </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
?>
            </div>
        </div>
    </div>

    <?php
                endif;

            // カテゴリーリスト
            elseif ($content['cb_content_select'] == 'category_list') :
                if ($content['cb_categories'] && is_array($content['cb_categories'])) :
                    $terms = array();
                    foreach ($content['cb_categories'] as $term_id) :
                        $term = get_term($term_id);
                        if ($term && !is_wp_error($term)) :
                            $terms[] = $term;
                        endif;
                    endforeach;
                    if ($terms) :
?>

    <div id="cb_<?php echo esc_attr($key); ?>"
        class="cb_content cb_content-<?php echo esc_attr($content['cb_content_select']); ?> inview-fadein">
        <div class="inner">
            <?php
                        if ($content['cb_headline']) :
                            echo '   <h2 class="cb_headline rich_font">' . str_replace(array( "\r\n", "\r", "\n" ), '<br>', esc_html($content['cb_headline'])) . "</h2>\n";
                        endif;
                        if ($content['cb_desc']) :
                            echo '   <p class="cb_desc">' . str_replace(array( "\r\n", "\r", "\n" ), '<br>', esc_html($content['cb_desc'])) . "</p>\n";
                        endif;

                        echo '   <ul class="clearfix">';
                        foreach ($terms as $term) {
                            // カテゴリー画像
                            $image = null;
                            $term_meta = get_option('taxonomy_' . $term->term_id);
                            if (!empty($term_meta['image'])) :
                                $image = wp_get_attachment_image_src($term_meta['image'], 'size3');
                            endif;

                            if (!empty($image[0])) :
                                echo '    <li class="has_image">';
                            echo '<a href="' . get_term_link($term) . '">';
                            echo '<div class="image"><img src="' . esc_attr($image[0]) . '" alt=""></div>'; else :
                                echo '    <li>';
                            echo '<a href="' . get_term_link($term) . '">';
                            endif;

                            # カテゴリーリストのリストの文言
                            echo '<div class="info"><h3>' . esc_html($term->name) . '</h3>';
                            echo '<div class="info-texts">';
                            echo '<div class="info-text">平均時給：<span class="info-score">' . average_salary($term->term_id) . '円</span></div>';
                            echo '<div class="info-text">平均スコア：<span class="info-score">' . average_resorn_score($term->term_id) . '</span> <span class="star">★</span></div>';
                            echo '</div>';
                            if ($term->description) :
                echo str_replace(array( "\r\n", "\r", "\n" ), '<br>', esc_html($term->description));
                            endif;
                            echo "</div></a></li>\n";
                        }
                        echo "</ul>\n";
?>
        </div>
    </div>
    <!-- 本日のRESORN（リゾーン） -->
    <?php require_once "front-page/todays-resorn.php"; ?>

    <!-- RESORNスコアTOP5求人 -->
    <?php require_once "front-page/top5-of-resorn-score.php"; ?>

    <!-- 3つの特徴 -->
    <?php require_once "front-page/three-features.php"; ?>

    <?php
                    endif;
                endif;

            // 最新ブログ記事一覧
            elseif ($content['cb_content_select'] == 'blog_list') :
                $args = array('post_type' => 'post', 'posts_per_page' => $content['cb_post_num'], 'ignore_sticky_posts' => 1, 'orderby' => 'date', 'order' => 'DESC');
                $cb_posts = new WP_Query($args);
                if ($cb_posts->have_posts()) :
?>

    <div id="cb_<?php echo esc_attr($key); ?>"
        class="cb_content cb_content-<?php echo esc_attr($content['cb_content_select']); ?> inview-fadein">
        <div class="inner">
            <?php
                    if ($content['cb_headline']) :
                        echo '   <h2 class="cb_headline rich_font">' . str_replace(array( "\r\n", "\r", "\n" ), '<br>', esc_html($content['cb_headline'])) . "</h2>\n";
                    endif;
                    if ($content['cb_desc']) :
                        echo '   <p class="cb_desc">' . str_replace(array( "\r\n", "\r", "\n" ), '<br>', esc_html($content['cb_desc'])) . "</p>\n";
                    endif;
?>
            <ol id="post_list" class="inview-fadein clearfix">
                <?php
                    while ($cb_posts->have_posts()) :
                        $cb_posts->the_post();
?>
                <li class="article">
                    <a href="<?php the_permalink() ?>"
                        title="<?php the_title_attribute(); ?>">
                        <div class="image">
                            <?php if (has_post_thumbnail()) {
    the_post_thumbnail('size2');
} else {
    ?><img src="<?php echo get_template_directory_uri(); ?>/img/common/no_image2.gif"
                                title="" alt="" /><?php
} ?>
                        </div> -->
                        <h3 class="title js-ellipsis"><?php the_title(); ?>
                        </h3>
                        <div class="r_score" id=score<?php echo resorn_score(); ?> >
                            <div class="r_score_title">RESORNスコア</div>
                            <div class="r_score_text"
                                id="score<?php echo resorn_score(); ?>">
                                <?php echo resorn_score(); ?>
                            </div>
                        </div>
                        <?php
        $metas = array();
        if ($dp_options['show_categories']) {
            foreach (explode('-', $dp_options['show_categories']) as $cat) {
                if ($cat == 1) {
                    $terms = get_the_terms($post->ID, 'category');
                    if ($terms && !is_wp_error($terms)) {
                        $term = array_shift($terms);
                        $metas[] = '<li class="cat"><span class="cat-category" data-href="'.get_term_link($term).'" title="'.esc_attr($term->name).'">'.esc_html($term->name).'</span></li>';
                    }
                } elseif (!empty($dp_options['use_category'.$cat])) {
                    $terms = get_the_terms($post->ID, $dp_options['category'.$cat.'_slug']);
                    if ($terms && !is_wp_error($terms)) {
                        $term = array_shift($terms);
                        $metas[] = '<li class="cat"><span class="cat-'.esc_attr($dp_options['category'.$cat.'_slug']).'" data-href="'.get_term_link($term).'" title="'.esc_attr($term->name).'">'.esc_html($term->name).'</span></li>';
                    }
                }
            }
        }
        if ($dp_options['show_date']) {
            $metas[] = '<li class="date"><time class="entry-date updated" datetime="'.get_the_modified_time('c').'">'.get_the_time('Y.m.d').'</time></li>';
        }

        if ($metas) {
            echo '<ul class="meta clearfix">'.implode('', $metas).'</ul>';
        }
?>
                    </a>
                </li>
                <?php
                    endwhile;
                    wp_reset_postdata();
?>
            </ol>
            <?php
                    if ($content['cb_show_archive_link'] && $content['cb_archive_link_text'] && get_post_type_archive_link('post') != get_bloginfo('url')) :
?>
            <div class="archive_link">
                <a
                    href="<?php echo get_post_type_archive_link('post'); ?>"><?php echo esc_html($content['cb_archive_link_text']); ?></a>
            </div>
            <?php
                    endif;
?>
        </div>
    </div>

    <?php
                endif;

            //フリースペース
            elseif ($content['cb_content_select'] == 'wysiwyg') :
                $cb_wysiwyg_editor = apply_filters('the_content', $content['cb_wysiwyg_editor']);
                if ($cb_wysiwyg_editor) :
?>

    <div id="cb_<?php echo esc_attr($key); ?>"
        class="cb_content cb_content-<?php echo esc_attr($content['cb_content_select']); ?>">
        <div class="inner">
            <div class="post_content clearfix">
                <?php echo $cb_wysiwyg_editor; ?>
            </div>
        </div>
    </div>

    <?php
                endif;
            endif;

        endforeach;
    endif;
?>

</div><!-- END #main_col -->

<?php get_footer();

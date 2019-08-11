<?php
get_field('icon_dormitory_field');
$cat = get_the_category();
$cat = $cat[0];
$upload_dir = wp_upload_dir();
?>

<h3 class="midashi">リゾートバイト求人のメリット</h3>
<div class="post_icons">
    <div class="post_icon"><img
            class="<?php the_field('icon_dormitory_field'); ?>"
            src="<?php  echo $upload_dir['baseurl']; ?>/2018/02/new-koshitsuryo-1.png">個室寮付き</div>
    <div class="post_icon"><img
            class="<?php the_field('icon_highIncome_field'); ?>"
            src="<?php  echo $upload_dir['baseurl']; ?>/2018/02/new-koshunyu-1.png">高収入</div>
    <div class="post_icon"><img
            class="<?php the_field('icon_campaign_field'); ?>"
            src="<?php  echo $upload_dir['baseurl']; ?>/2018/02/new-campaign-1.png">キャンペーン</div>
    <div class="post_icon"><img
            class="<?php the_field('icon_meal_field'); ?>"
            src="<?php  echo $upload_dir['baseurl']; ?>/2018/02/new-shokuji-1.png">無料の食事付き</div>
    <div class="post_icon"><img
            class="<?php the_field('icon_transportationFee_field'); ?>"
            src="<?php  echo $upload_dir['baseurl']; ?>/2018/02/new-carloan-1.png">交通費支給</div>
    <div class="post_icon"><img
            class="<?php the_field('icon_wifi_field'); ?>"
            src="<?php  echo $upload_dir['baseurl']; ?>/2018/02/new-wifi-1.png">WiFi付き</div>
    <div class="post_icon"><img
            class="<?php the_field('icon_spa_field'); ?>"
            src="<?php  echo $upload_dir['baseurl']; ?>/2018/02/new-spa-1.png">温泉入浴可</div>
</div>

<h3 class="midashi">リゾートバイト求人の特徴・詳細</h3>
<table class="table_under_border">
    <tr>
        <th>会社</th>
        <td><a href="<?php echo return_company_link();?>"><img src="<?php echo company_image_get(); ?>" class="table_company" alt="<?php echo return_company_alt(); ?>"></td>
    </tr>
    <tr>
        <th>評価</th>
        <td class="r_score">
            <i class="s-rating s-rating-<?php echo esc_html(change_resorn_score_format($post->resorn_score_field)); ?> s-article">
                <span class="s-text">（星5のうち星<span class="s-text-int"><?php echo esc_html($post->resorn_score_field); ?></span>）</span>
            </i>
        </td>
    </tr>
    <tr>
        <th>職種</th>
        <td><?php the_field('occupation_field'); ?></td>
    </tr>
    <tr>
        <th>給与</th>
        <td><?php the_field('salary_field'); ?></td>
    </tr>
    <tr>
        <th>期間</th>
        <td><?php the_field('term_field'); ?></td>
    </tr>
    <tr>
        <th>時間</th>
        <td><?php the_field('time_field'); ?></td>
    </tr>
    <tr>
        <th>福利厚生</th>
        <td><?php the_field('treatment_field'); ?></td>
    </tr>
    <tr>
        <th>仕事内容</th>
        <td><?php the_field('jobDescription_field'); ?></td>
    </tr>
</table>

<div class="flex_for_ab_button">
    <div>
        <a href="<?php echo get_category_link($cat->term_id);?>" class="blue_button rounded sz_l" id=""><?php echo $cat->name;?>の求人一覧を見る <i
                class="fas fa-chevron-circle-right"></i></a>
    </div>
    <div>
        <a href="<?php the_field('affiliatelink_field'); ?>" class="q_button rounded sz_l" id="cv_click" target="_blank"
            rel="nofollow">詳しい求人を見る <i class="fas fa-chevron-circle-right"></i></a>
    </div>
</div>
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
        src="<?php echo welfare_path('icon_dormitory_field', $post->icon_dormitory_field); ?>"
        alt="<?php echo welfare_alt('icon_dormitory_field', $post->icon_dormitory_field); ?>">個室寮付き
    </div>
    <div class="post_icon"><img
        class="<?php the_field('icon_highIncome_field'); ?>"
        src="<?php echo welfare_path('icon_highIncome_field', $post->icon_highIncome_field); ?>"
        alt="<?php echo welfare_alt('icon_highIncome_field', $post->icon_highIncome_field); ?>">高収入
    </div>
    <div class="post_icon"><img
        class="<?php the_field('icon_campaign_field'); ?>"
        src="<?php echo welfare_path('icon_campaign_field', $post->icon_campaign_field); ?>"
        alt="<?php echo welfare_alt('icon_campaign_field', $post->icon_campaign_field); ?>">キャンペーン
    </div>
    <div class="post_icon"><img
        class="<?php the_field('icon_meal_field'); ?>"
        src="<?php echo welfare_path('icon_meal_field', $post->icon_meal_field); ?>"
        alt="<?php echo welfare_alt('icon_meal_field', $post->icon_meal_field); ?>">無料の食事付き</div>
    <div class="post_icon"><img
        class="<?php the_field('icon_transportationFee_field'); ?>"
        src="<?php echo welfare_path('icon_transportationFee_field', $post->icon_transportationFee_field); ?>"
        alt="<?php echo welfare_alt('icon_transportationFee_field', $post->icon_transportationFee_field); ?>">交通費支給
    </div>
    <div class="post_icon"><img
        class="<?php the_field('icon_wifi_field'); ?>"
        src="<?php echo welfare_path('icon_wifi_field', $post->icon_wifi_field); ?>"
        alt="<?php echo welfare_alt('icon_wifi_field', $post->icon_wifi_field); ?>">WiFi付き
    </div>
    <div class="post_icon"><img
        class="<?php the_field('icon_spa_field'); ?>"
        src="<?php echo welfare_path('icon_spa_field', $post->icon_spa_field); ?>"
        alt="<?php echo welfare_alt('icon_spa_field', $post->icon_spa_field); ?>">温泉入浴可
    </div>
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
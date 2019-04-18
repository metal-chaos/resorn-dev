<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * オプション初期値
 * @var array
 */
global $dp_default_options;
$dp_default_options = array(
//basic
	'pickedcolor1' => '#b69e84',
	'pickedcolor2' => '#92785f',
	'content_link_color' => '#b69e84',
	'favicon' => '',
	'font_type' => 'type1',
	'headline_font_type' => 'type3',
	'hover_type' => 'type1',
	'hover1_zoom' => '1.2',
	'hover2_direct' => 'type1',
	'hover2_opacity' => '0.5',
	'hover2_bgcolor' => '#b69e84',
	'hover3_opacity' => '0.5',
	'hover3_bgcolor' => '#b69e84',
	'responsive' => 'yes',
	'use_emoji' => 1,
	'css_code' => '',
	'use_ogp' => 0,
	'fb_admin_id' => '',
	'ogp_image' => '',
	'use_twitter_card' => 0,
	'twitter_account_name' => '',
	'column_float' => 0,
	'use_load_icon' => '',
	'load_time' => '3000',
	'load_icon' => 'type1',
	'header_image_404' => '',
	'header_txt_404' => '',
	'header_sub_txt_404' => '',
	'header_txt_size_404' => 38,
	'header_sub_txt_size_404' => 16,
	'header_txt_size_404_mobile' => 28,
	'header_sub_txt_size_404_mobile' => 14,
	'header_txt_color_404' => '#ffffff',
	'dropshadow_404_h' => 2,
	'dropshadow_404_v' => 2,
	'dropshadow_404_b' => 2,
	'dropshadow_404_c' => '#888888',
//logo
	'logo_font_size' => 36,
	'logo_font_size_fix' => 36,
	'logo_font_size_mobile' => 26,
	'logo_font_size_mobile_fix' => 26,
	'logo_font_size_footer' => 36,
	'logo_font_size_footer_mobile' => 26,
	'header_logo_image' => false,
	'header_logo_image_fix' => false,
	'header_logo_image_mobile' => false,
	'header_logo_image_mobile_fix' => false,
	'footer_logo_image' => false,
	'header_logo_retina' => '',
	'header_logo_retina_fix' => '',
	'header_logo_retina_mobile' => '',
	'header_logo_retina_mobile_fix' => '',
	'footer_logo_retina' => '',
// index header slider
	'header_content_type' => 'type1',
	'slider_image1' => false,
	'slider_image2' => false,
	'slider_image3' => false,
	'slider_image4' => false,
	'slider_image5' => false,
	'slider_image_mobile1' => false,
	'slider_image_mobile2' => false,
	'slider_image_mobile3' => false,
	'slider_image_mobile4' => false,
	'slider_image_mobile5' => false,
	'slider_url1' => '',
	'slider_url2' => '',
	'slider_url3' => '',
	'slider_url4' => '',
	'slider_url5' => '',
	'slider_target1' => '',
	'slider_target2' => '',
	'slider_target3' => '',
	'slider_target4' => '',
	'slider_target5' => '',
	'use_slider_caption1' => '',
	'use_slider_caption2' => '',
	'use_slider_caption3' => '',
	'use_slider_caption4' => '',
	'use_slider_caption5' => '',
	'slider_headline1' => '',
	'slider_headline2' => '',
	'slider_headline3' => '',
	'slider_headline4' => '',
	'slider_headline5' => '',
	'slider_headline_font_size1' => '47',
	'slider_headline_font_size2' => '47',
	'slider_headline_font_size3' => '47',
	'slider_headline_font_size4' => '47',
	'slider_headline_font_size5' => '47',
	'slider_headline_font_size_mobile1' => '24',
	'slider_headline_font_size_mobile2' => '24',
	'slider_headline_font_size_mobile3' => '24',
	'slider_headline_font_size_mobile4' => '24',
	'slider_headline_font_size_mobile5' => '24',
	'slider_headline_color1' => '#ffffff',
	'slider_headline_color2' => '#ffffff',
	'slider_headline_color3' => '#ffffff',
	'slider_headline_color4' => '#ffffff',
	'slider_headline_color5' => '#ffffff',
	'slider_headline_shadow_a1' => 0,
	'slider_headline_shadow_b1' => 0,
	'slider_headline_shadow_c1' => 4,
	'slider_headline_shadow_a2' => 0,
	'slider_headline_shadow_b2' => 0,
	'slider_headline_shadow_c2' => 4,
	'slider_headline_shadow_a3' => 0,
	'slider_headline_shadow_b3' => 0,
	'slider_headline_shadow_c3' => 4,
	'slider_headline_shadow_a4' => 0,
	'slider_headline_shadow_b4' => 0,
	'slider_headline_shadow_c4' => 4,
	'slider_headline_shadow_a5' => 0,
	'slider_headline_shadow_b5' => 0,
	'slider_headline_shadow_c5' => 4,
	'slider_headline_shadow_color1' => '#000000',
	'slider_headline_shadow_color2' => '#000000',
	'slider_headline_shadow_color3' => '#000000',
	'slider_headline_shadow_color4' => '#000000',
	'slider_headline_shadow_color5' => '#000000',
	'slider_caption1' => '',
	'slider_caption2' => '',
	'slider_caption3' => '',
	'slider_caption4' => '',
	'slider_caption5' => '',
	'slider_caption_font_size1' => '14',
	'slider_caption_font_size2' => '14',
	'slider_caption_font_size3' => '14',
	'slider_caption_font_size4' => '14',
	'slider_caption_font_size5' => '14',
	'slider_caption_font_size_mobile1' => '12',
	'slider_caption_font_size_mobile2' => '12',
	'slider_caption_font_size_mobile3' => '12',
	'slider_caption_font_size_mobile4' => '12',
	'slider_caption_font_size_mobile5' => '12',
	'slider_caption_color1' => '#ffffff',
	'slider_caption_color2' => '#ffffff',
	'slider_caption_color3' => '#ffffff',
	'slider_caption_color4' => '#ffffff',
	'slider_caption_color5' => '#ffffff',
	'slider_caption_shadow_a1' => 0,
	'slider_caption_shadow_b1' => 0,
	'slider_caption_shadow_c1' => 4,
	'slider_caption_shadow_a2' => 0,
	'slider_caption_shadow_b2' => 0,
	'slider_caption_shadow_c2' => 4,
	'slider_caption_shadow_a3' => 0,
	'slider_caption_shadow_b3' => 0,
	'slider_caption_shadow_c3' => 4,
	'slider_caption_shadow_a4' => 0,
	'slider_caption_shadow_b4' => 0,
	'slider_caption_shadow_c4' => 4,
	'slider_caption_shadow_a5' => 0,
	'slider_caption_shadow_b5' => 0,
	'slider_caption_shadow_c5' => 4,
	'slider_caption_shadow_color1' => '#000000',
	'slider_caption_shadow_color2' => '#000000',
	'slider_caption_shadow_color3' => '#000000',
	'slider_caption_shadow_color4' => '#000000',
	'slider_caption_shadow_color5' => '#000000',
	'show_slider_button1' => '',
	'show_slider_button2' => '',
	'show_slider_button3' => '',
	'show_slider_button4' => '',
	'show_slider_button5' => '',
	'slider_button1' => '',
	'slider_button2' => '',
	'slider_button3' => '',
	'slider_button4' => '',
	'slider_button5' => '',
	'slider_button_color1' => '#ffffff',
	'slider_button_color2' => '#ffffff',
	'slider_button_color3' => '#ffffff',
 	'slider_button_color4' => '#ffffff',
 	'slider_button_color5' => '#ffffff',
	'slider_button_bg_color1' => '#b69e84',
	'slider_button_bg_color2' => '#b69e84',
	'slider_button_bg_color3' => '#b69e84',
	'slider_button_bg_color4' => '#b69e84',
	'slider_button_bg_color5' => '#b69e84',
	'slider_button_border_color1' => '#ffffff',
	'slider_button_border_color2' => '#ffffff',
	'slider_button_border_color3' => '#ffffff',
	'slider_button_border_color4' => '#ffffff',
	'slider_button_border_color5' => '#ffffff',
	'slider_button_color_hover1' => '#ffffff',
	'slider_button_color_hover2' => '#ffffff',
	'slider_button_color_hover3' => '#ffffff',
	'slider_button_color_hover4' => '#ffffff',
	'slider_button_color_hover5' => '#ffffff',
	'slider_button_bg_color_hover1' => '#92785f',
	'slider_button_bg_color_hover2' => '#92785f',
	'slider_button_bg_color_hover3' => '#92785f',
	'slider_button_bg_color_hover4' => '#92785f',
	'slider_button_bg_color_hover5' => '#92785f',
	'slider_button_border_color_hover1' => '#ffffff',
	'slider_button_border_color_hover2' => '#ffffff',
	'slider_button_border_color_hover3' => '#ffffff',
	'slider_button_border_color_hover4' => '#ffffff',
	'slider_button_border_color_hover5' => '#ffffff',
	'slider_video' => '',
	'slider_video_image' => '',
	'use_slider_video_caption' => '',
	'slider_video_headline' => '',
	'slider_video_headline_font_size' => '47',
	'slider_video_headline_font_size_mobile' => '24',
	'slider_video_headline_color' => '#ffffff',
	'slider_video_headline_shadow_a' => 0,
	'slider_video_headline_shadow_b' => 0,
	'slider_video_headline_shadow_c' => 4,
	'slider_video_headline_shadow_color' => '#000000',
	'slider_video_caption' => '',
	'slider_video_caption_font_size' => '14',
	'slider_video_caption_font_size_mobile' => '12',
	'slider_video_caption_color' => '#ffffff',
	'slider_video_caption_shadow_a' => 0,
	'slider_video_caption_shadow_b' => 0,
	'slider_video_caption_shadow_c' => 4,
	'slider_video_caption_shadow_color' => '#000000',
	'show_slider_video_button' => '',
	'slider_video_button' => '',
	'slider_video_button_url' => '',
	'slider_video_button_target' => '',
	'slider_video_button_color' => '#ffffff',
	'slider_video_button_bg_color' => '#b69e84',
	'slider_video_button_border_color' => '#ffffff',
	'slider_video_button_color_hover' => '#ffffff',
	'slider_video_button_bg_color_hover' => '#92785f',
	'slider_video_button_border_color_hover' => '#ffffff',
	'slider_youtube_url' => '',
	'slider_youtube_image' => '',
	'use_slider_youtube_caption' => '',
	'slider_youtube_headline' => '',
	'slider_youtube_headline_font_size' => '47',
	'slider_youtube_headline_font_size_mobile' => '24',
	'slider_youtube_headline_color' => '#ffffff',
	'slider_youtube_headline_shadow_a' => 0,
	'slider_youtube_headline_shadow_b' => 0,
	'slider_youtube_headline_shadow_c' => 4,
	'slider_youtube_headline_shadow_color' => '#000000',
	'slider_youtube_caption' => '',
	'slider_youtube_caption_font_size' => '14',
	'slider_youtube_caption_font_size_mobile' => '12',
	'slider_youtube_caption_color' => '#ffffff',
	'slider_youtube_caption_shadow_a' => 0,
	'slider_youtube_caption_shadow_b' => 0,
	'slider_youtube_caption_shadow_c' => 4,
	'slider_youtube_caption_shadow_color' => '#000000',
	'show_slider_youtube_button' => '',
	'slider_youtube_button' => '',
	'slider_youtube_button_url' => '',
	'slider_youtube_button_target' => '',
	'slider_youtube_button_color' => '#ffffff',
	'slider_youtube_button_bg_color' => '#b69e84',
	'slider_youtube_button_border_color' => '#ffffff',
	'slider_youtube_button_color_hover' => '#ffffff',
	'slider_youtube_button_bg_color_hover' => '#92785f',
	'slider_youtube_button_border_color_hover' => '#ffffff',
	'slider_time' => '7000',
// index news
	'show_index_news' => 0,
	'show_index_news_date' => 0,
	'index_news_num' => 5,
	'show_index_news_archive_link' => 0,
	'index_news_archive_link_text' => __('News archive', 'tcd-w'),
	'show_index_news_mobile' => 0,
	'show_index_news_date_mobile' => 0,
	'index_news_num_mobile' => 5,
	'show_index_news_archive_link_mobile' => 0,
	'index_news_archive_link_text_mobile' => __('News archive', 'tcd-w'),
// コンテンツビルダー
	'contents_builder' => array(),
// blog content
	'blog_breadcrumb_label' => __('Blog', 'tcd-w'),
	'category_label' => __('Category', 'tcd-w'),
	'category_color' => '#999999',
	'use_category2' => 0,
	'category2_label' => __('Category', 'tcd-w') . '2',
	'category2_slug' => 'category2',
	'category2_color' => '#000000',
	'use_category3' => 0,
	'category3_label' => __('Category', 'tcd-w') . '3',
	'category3_slug' => 'category3',
	'category3_color' => '#b69e84',
	'blog_archive_headline' => __('Blog', 'tcd-w'),
	'blog_archive_headline_font_size' => '42',
	'blog_archive_headline_font_size_mobile' => '20',
	'blog_archive_desc' => '',
	'blog_archive_desc_font_size' => '14',
	'blog_archive_desc_font_size_mobile' => '14',
// post page
	'title_font_size' => '30',
	'content_font_size' => '14',
	'title_font_size_mobile' => '16',
	'content_font_size_mobile' => '14',
	'show_categories' => '1-2',
	'show_date' => 1,
	'show_tag' => 1,
	'show_comment' => 1,
	'show_author' => 1,
	'show_trackback' => 1,
	'show_related_post' => 1,
	'show_next_post' => 1,
	'show_thumbnail' => 1,
	'show_modified_date' => 1,
	'related_post_headline' => __('Related posts', 'tcd-w'),
	'related_post_num' => 6,
// share button
	'show_sns_top' => 1,
	'show_sns_btm' => 1,
	'sns_type_top' => 'type2',
	'sns_type_btm' => 'type2',
	'show_twitter_top' => 1,
	'show_fblike_top' => 1,
	'show_fbshare_top' => 1,
	'show_google_top' => 1,
	'show_hatena_top' => 1,
	'show_pocket_top' => 1,
	'show_feedly_top' => 1,
	'show_rss_top' => 1,
	'show_pinterest_top' => 1,
	'show_twitter_btm' => 1,
	'show_fblike_btm' => 1,
	'show_fbshare_btm' => 1,
	'show_google_btm' => 1,
	'show_hatena_btm' => 1,
	'show_pocket_btm' => 1,
	'show_feedly_btm' => 1,
	'show_rss_btm' => 1,
	'show_pinterest_btm' => 1,
	'twitter_info' => '',
// post page banner
	'single_ad_code1' => '',
	'single_ad_image1' => false,
	'single_ad_url1' => '',
	'single_ad_code2' => '',
	'single_ad_image2' => false,
	'single_ad_url2' => '',
	'single_ad_code3' => '',
	'single_ad_image3' => false,
	'single_ad_url3' => '',
	'single_ad_code4' => '',
	'single_ad_image4' => false,
	'single_ad_url4' => '',
	'single_ad_code5' => '',
	'single_ad_image5' => false,
	'single_ad_url5' => '',
	'single_ad_code6' => '',
	'single_ad_image6' => false,
	'single_ad_url6' => '',
	'single_mobile_ad_code1' => '',
	'single_mobile_ad_image1' => false,
	'single_mobile_ad_url1' => '',
	'single_mobile_ad_code2' => '',
	'single_mobile_ad_image2' => false,
	'single_mobile_ad_url2' => '',
// introduce content
	'introduce_label' => __('Introduce' , 'tcd-w'),
	'introduce_breadcrumb_label' => __('Introduce', 'tcd-w'),
	'introduce_slug' => 'introduce',
	'use_introduce_category1' => 0,
	'use_introduce_category1_introduce_archive' => 0,
	'introduce_category1_label' => __('Category', 'tcd-w') . '4',
	'introduce_category1_slug' => 'category4',
	'introduce_category1_color' => '#999999',
	'use_introduce_category2' => 0,
	'use_introduce_category2_introduce_archive' => 0,
	'introduce_category2_label' => __('Category', 'tcd-w') . '5',
	'introduce_category2_slug' => 'category5',
	'introduce_category2_color' => '#000000',
	'use_introduce_category3' => 0,
	'use_introduce_category3_introduce_archive' => 0,
	'introduce_category3_label' => __('Category', 'tcd-w') . '6',
	'introduce_category3_slug' => 'category6',
	'introduce_category3_color' => '#49240d',
	'use_introduce_tag' => 1,
	'introduce_tag_label' => __('Tag', 'tcd-w'),
	'introduce_tag_slug' => 'introduce_tag',
	'introduce_archive_catch' => '',
	'introduce_archive_image' => false,
	'introduce_archive_image_catch_bg' => '#49240d',
	'introduce_archive_image_catch_bg_opacity' => '0.7',
	'introduce_archive_text' => array(),
	'show_breadcrumb_introduce_archive' => 1,
	'use_infinitescroll_introduce' => 1,
	'archive_introduce_num' => 12,
	'show_introduce_categories' => '1-2',
	'show_shoulder_copy_introduce' => 1,
	'show_thumbnail_introduce' => 1,
	'show_date_introduce' => 1,
	'show_tag_introduce' => 1,
	'show_sns_top_introduce' => 1,
	'show_sns_btm_introduce' => 1,
	'show_next_post_introduce' => 1,
	'show_archive_banner_introduce' => 1,
	'show_related_introduce' => 1,
	'related_introduce_headline' => __('Related posts', 'tcd-w'),
	'related_introduce_num' => 9,
// news content
	'news_label' => __('News' , 'tcd-w'),
	'news_breadcrumb_label' => __('News', 'tcd-w'),
	'news_slug' => 'news',
	'news_archive_headline' => __('News' , 'tcd-w'),
	'show_next_post_news' => 1,
	'show_sns_top_news' => 1,
	'show_sns_btm_news' => 1,
	'show_date_news' => 1,
	'show_thumbnail_news' => 1,
	'show_recent_news' => 1,
	'recent_news_headline' => __('Recent news', 'tcd-w'),
	'recent_news_num' => 5,
	'recent_news_link_text' => __('News archive', 'tcd-w'),
// search
	'searcn_post_type' => 'post',
	'searcn_keywords_target' => array('title'),
	'show_search_form_keywords' => 1,
	'search_form_keywords_placeholder' => __('Keyword', 'tcd-w'),
	'show_search_form_category1' => 'category',
	'search_form_category1_placeholder' => __('Select from %category_label%', 'tcd-w'),
	'show_search_form_category2' => 'category2',
	'search_form_category2_placeholder' => __('Select from %category_label%', 'tcd-w'),
	'show_search_form_category3' => 'category3',
	'search_form_category3_placeholder' => __('Select from %category_label%', 'tcd-w'),
	'show_search_form_keywords_introduce' => 1,
	'search_form_keywords_placeholder_introduce' => __('Keyword', 'tcd-w'),
	'show_search_form_category1_introduce' => 'introduce_category1',
	'search_form_category1_placeholder_introduce' => __('Select from %category_label%', 'tcd-w'),
	'show_search_form_category2_introduce' => 'introduce_category2',
	'search_form_category2_placeholder_introduce' => __('Select from %category_label%', 'tcd-w'),
	'show_search_form_category3_introduce' => 'introduce_category3',
	'search_form_category3_placeholder_introduce' => __('Select from %category_label%', 'tcd-w'),
	'search_form_button_text' => __('Search', 'tcd-w'),
	'search_form_button_bg_color' => '#000000',
	'search_form_button_bg_opacity' => '0',
	'search_form_button_bg_color_hover' => '#92785f',
	'search_form_button_bg_opacity_hover' => '1.0',
	'search_bar_bg_color' => '#222222',
	'index_search_bar_bg_opacity' => '0.6',
	'show_search_bar_subpage' => 1,
	'search_results_headline' => __('Search Results', 'tcd-w'),
	'show_search_results_tag_filter' => 1,
// header
	'header_fix' => 'type1',
	'mobile_header_fix' => 'type1',
	'header_text_color' => '#ffffff',
	'header_bg_color' => '#000000',
	'index_header_bg_opacity' => '0',
	'header_fix_text_color' => '#ffffff',
	'header_fix_bg_color' => '#000000',
	'header_fix_bg_opacity' => '0.8',
// footer
	'footer_bg_color1' => '#F7F7F7',
	'footer_bg_color2' => '#222222',
	'footer_nav_type1' => 'type1',
	'footer_nav_category1' => 'category',
	'footer_nav_type2' => 'type1',
	'footer_nav_category2' => 'category2',
	'twitter_url' => '',
	'facebook_url' => '',
	'insta_url' => '',
	'show_rss' => 1,
	'footer_widget_type' => 'type2',
	'footer_ad_code' => '',
	'footer_ad_image' => false,
	'footer_ad_url' => '',
	'footer_ad_code_mobile' => '',
	'footer_ad_image_mobile' => false,
	'footer_ad_url_mobile' => '',
	'footer_menu1' => '',
	'footer_menu2' => '',
	'footer_banner_title1' => '',
	'footer_banner_url1' => '',
	'footer_banner_target_blank1' => '',
	'footer_banner_image1' => false,
	'footer_banner_shadow_a1' => 0,
	'footer_banner_shadow_b1' => 0,
	'footer_banner_shadow_c1' => 0,
	'footer_banner_shadow_color1' => '#000000',
	'footer_banner_title2' => '',
	'footer_banner_url2' => '',
	'footer_banner_target_blank2' => '',
	'footer_banner_image2' => false,
	'footer_banner_shadow_a2' => 0,
	'footer_banner_shadow_b2' => 0,
	'footer_banner_shadow_c2' => 0,
	'footer_banner_shadow_color2' => '#000000',
// フッターの固定メニュー
	'footer_bar_display' => 'type3',
	'footer_bar_tp' => 0.8,
	'footer_bar_bg' => '#ffffff',
	'footer_bar_border' => '#dddddd',
	'footer_bar_color' => '#000000',
	'footer_bar_btns' => array(
		array(
			'type' => 'type1',
			'label' => '',
			'url' => '',
			'number' => '',
			'target' => 0,
			'icon' => 'file-text'
		)
	),
// ページ保護
	'pw_label' => '',
	'pw_align' => 'type1',
	'pw_name1' => '',
	'pw_name2' => '',
	'pw_name3' => '',
	'pw_name4' => '',
	'pw_name5' => '',
	'pw_btn_display1' => '',
	'pw_btn_display2' => '',
	'pw_btn_display3' => '',
	'pw_btn_display4' => '',
	'pw_btn_display5' => '',
	'pw_btn_label1' => '',
	'pw_btn_label2' => '',
	'pw_btn_label3' => '',
	'pw_btn_label4' => '',
	'pw_btn_label5' => '',
	'pw_btn_url1' => '',
	'pw_btn_url2' => '',
	'pw_btn_url3' => '',
	'pw_btn_url4' => '',
	'pw_btn_url5' => '',
	'pw_btn_target1' => 0,
	'pw_btn_target2' => 0,
	'pw_btn_target3' => 0,
	'pw_btn_target4' => 0,
	'pw_btn_target5' => 0,
	'pw_editor1' => '',
	'pw_editor2' => '',
	'pw_editor3' => '',
	'pw_editor4' => '',
	'pw_editor5' => ''
);

/**
 * Design Plusのオプションを返す
 * @global array $dp_default_options
 * @return array
 */
function get_desing_plus_option(){
  global $dp_default_options;
  return shortcode_atts($dp_default_options, get_option('dp_options', array()));
}


// 登録
function theme_options_init(){
 register_setting( 'design_plus_options', 'dp_options', 'theme_options_validate' );
}


// ロード
function theme_options_add_page() {
 add_theme_page( __( 'Theme Options', 'tcd-w' ), __( 'TCD Theme Options', 'tcd-w' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

// hover effect
global $hover_type_options;
$hover_type_options = array(
 'type1' => array('value' => 'type1','label' => __( 'Zoom', 'tcd-w' )),
 'type2' => array('value' => 'type2','label' => __( 'Slide', 'tcd-w' )),
 'type3' => array('value' => 'type3','label' => __( 'Fade', 'tcd-w' ))
);
global $hover2_direct_options;
$hover2_direct_options = array(
 'type1' => array('value' => 'type1','label' => __( 'Left to Right', 'tcd-w' )),
 'type2' => array('value' => 'type2','label' => __( 'Right to Left', 'tcd-w' ))
);


//フォントタイプ
global $font_type_options;
$font_type_options = array(
 'type1' => array('value' => 'type1','label' => __( 'Meiryo', 'tcd-w' )),
 'type2' => array('value' => 'type2','label' => __( 'YuGothic', 'tcd-w' )),
 'type3' => array('value' => 'type3','label' => __( 'YuMincho', 'tcd-w' ))
);
global $headline_font_type_options;
$headline_font_type_options = array(
 'type1' => array('value' => 'type1','label' => __( 'Meiryo', 'tcd-w' )),
 'type2' => array('value' => 'type2','label' => __( 'YuGothic', 'tcd-w' )),
 'type3' => array('value' => 'type3','label' => __( 'YuMincho', 'tcd-w' ))
);


// 記事数
global $post_num_options;
$post_num_options = array(
 '1' => array('value' => '1','label' => '1'),
 '2' => array('value' => '2','label' => '2'),
 '3' => array('value' => '3','label' => '3'),
 '4' => array('value' => '4','label' => '4'),
 '5' => array('value' => '5','label' => '5'),
 '6' => array('value' => '6','label' => '6'),
 '7' => array('value' => '7','label' => '7'),
 '8' => array('value' => '8','label' => '8'),
 '9' => array('value' => '9','label' => '9'),
 '10' => array('value' => '10','label' => '10'),
);


// 記事数 3区切り
global $post_num3_options;
$post_num3_options = array(
 '3' => array('value' => '3','label' => '3'),
 '6' => array('value' => '6','label' => '6'),
 '9' => array('value' => '9','label' => '9'),
 '12' => array('value' => '12','label' => '12'),
 '15' => array('value' => '15','label' => '15')
);

// ヘッダーの固定設定
global $header_fix_options;
$header_fix_options = array(
 'type1' => array('value' => 'type1','label' => __( 'Normal header', 'tcd-w' )),
 'type2' => array('value' => 'type2','label' => __( 'Fix at top after page scroll', 'tcd-w' )),
);


// ソーシャルボタンの設定
// 記事上ボタンタイプ
global $sns_type_top_options;
$sns_type_top_options = array(
'type1' => array( 'value' => 'type1', 'label' => __( 'style1', 'tcd-w' )),
'type2' => array( 'value' => 'type2', 'label' => __( 'style2', 'tcd-w' )),
'type3' => array( 'value' => 'type3', 'label' => __( 'style3', 'tcd-w' )),
'type4' => array( 'value' => 'type4', 'label' => __( 'style4', 'tcd-w' )),
'type5' => array( 'value' => 'type5', 'label' => __( 'style5', 'tcd-w' ))
);
// 記事下ボタンタイプ
global $sns_type_btm_options;
$sns_type_btm_options = array(
'type1' => array( 'value' => 'type1', 'label' => __( 'style1', 'tcd-w' )),
'type2' => array( 'value' => 'type2', 'label' => __( 'style2', 'tcd-w' )),
'type3' => array( 'value' => 'type3', 'label' => __( 'style3', 'tcd-w' )),
'type4' => array( 'value' => 'type4', 'label' => __( 'style4', 'tcd-w' )),
'type5' => array( 'value' => 'type5', 'label' => __( 'style5', 'tcd-w' ))
);


// レスポンシブの設定
global $responsive_options;
$responsive_options = array(
 'yes' => array('value' => 'yes','label' => __( 'Use responsive design', 'tcd-w' )),
 'no' => array('value' => 'no','label' => __( 'Do not use responsive design', 'tcd-w' ))
);


// ローディングアイコンの最大表示時間の設定
global $load_time_options;
$load_time_options = array(
 '3000' => array('value' => '3000','label' => __( '3 second', 'tcd-w' )),
 '4000' => array('value' => '4000','label' => __( '4 second', 'tcd-w' )),
 '5000' => array('value' => '5000','label' => __( '5 second', 'tcd-w' )),
 '6000' => array('value' => '6000','label' => __( '6 second', 'tcd-w' )),
 '7000' => array('value' => '7000','label' => __( '7 second', 'tcd-w' )),
 '8000' => array('value' => '8000','label' => __( '8 second', 'tcd-w' )),
 '9000' => array('value' => '9000','label' => __( '9 second', 'tcd-w' )),
 '10000' => array('value' => '10000','label' => __( '10 second', 'tcd-w' )),
);


// ローディングアイコンの種類の設定
global $load_icon_type;
$load_icon_type = array(
 'type1' => array('value' => 'type1','label' => __( 'Circle', 'tcd-w' )),
 'type2' => array('value' => 'type2','label' => __( 'Square', 'tcd-w' )),
 'type3' => array('value' => 'type3','label' => __( 'Dot', 'tcd-w' ))
);


// ヘッダーコンテンツの設定
global $header_content_type_options;
$header_content_type_options = array(
 'type1' => array('value' => 'type1', 'label' => __( 'Image slider', 'tcd-w' )),
 'type2' => array('value' => 'type2', 'label' => __( 'Video background', 'tcd-w' ) ),
 'type3' => array('value' => 'type3', 'label' => __( 'Youtube background', 'tcd-w' ) )
);


// スライダーのタイミングの設定
global $slider_time_options;
$slider_time_options = array(
 '5000' => array('value' => '5000','label' => __( '5 second', 'tcd-w' )),
 '6000' => array('value' => '6000','label' => __( '6 second', 'tcd-w' )),
 '7000' => array('value' => '7000','label' => __( '7 second', 'tcd-w' )),
 '8000' => array('value' => '8000','label' => __( '8 second', 'tcd-w' )),
 '9000' => array('value' => '9000','label' => __( '9 second', 'tcd-w' )),
 '10000' => array('value' => '10000','label' => __( '10 second', 'tcd-w' )),
);

// フッターカテゴリー メニュー表示タイプ
global $footer_nav_type_options;
$footer_nav_type_options = array(
 'none' => array('value' => 'none', 'label' => __( 'Hide', 'tcd-w' )),
 'type1' => array('value' => 'type1', 'label' => __( 'One level display', 'tcd-w' )),
 'type2' => array('value' => 'type2', 'label' => __( 'Two level display', 'tcd-w' ))
);

// フッターウィジェット
global $footer_widget_options;
$footer_widget_options = array(
 'type1' => array('value' => 'type1', 'label' => __( 'Display footer widget', 'tcd-w' )),
 'type2' => array('value' => 'type2', 'label' => __( 'Display footer content (Add + menux2 + bannerx2)', 'tcd-w' ))
);

// フッターの固定メニュー 表示タイプ
global $footer_bar_display_options;
$footer_bar_display_options = array(
 'type1' => array('value' => 'type1', 'label' => __( 'Fade In', 'tcd-w' )),
 'type2' => array('value' => 'type2', 'label' => __( 'Slide In', 'tcd-w' )),
 'type3' => array('value' => 'type3', 'label' => __( 'Hide', 'tcd-w' ))
);

// フッターの固定メニュー ボタンのタイプ
global $footer_bar_button_options;
$footer_bar_button_options = array(
 'type1' => array('value' => 'type1', 'label' => __( 'Default', 'tcd-w' )),
 'type2' => array('value' => 'type2', 'label' => __( 'Share', 'tcd-w' )),
 'type3' => array('value' => 'type3', 'label' => __( 'Telephone', 'tcd-w' ))
);

// フッターの固定メニューのアイコン
global $footer_bar_icon_options;
$footer_bar_icon_options = array(
 'file-text' => array('value' => 'file-text', 'label' => __( 'Document', 'tcd-w' )),
 'share-alt' => array('value' => 'share-alt', 'label' => __( 'Share', 'tcd-w' )),
 'phone' => array('value' => 'phone', 'label' => __( 'Telephone', 'tcd-w' )),
 'envelope' => array('value' => 'envelope', 'label' => __( 'Envelope', 'tcd-w' )),
 'tag' => array('value' => 'tag', 'label' => __( 'Tag', 'tcd-w' )),
 'pencil' => array('value' => 'pencil', 'label' => __( 'Pencil', 'tcd-w' ))
);

// 保護ページalign
global $pw_align_options;
$pw_align_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Align left', 'tcd-w' ) ),
  'type2' => array('value' => 'type2','label' => __( 'Align center', 'tcd-w' ) )
);


// テーマオプション画面の作成
function theme_options_do_page() {
 global $dp_default_options, $load_time_options, $load_icon_type, $hover_type_options, $hover2_direct_options, $font_type_options, $headline_font_type_options, $responsive_options, $header_content_type_options, $slider_time_options, $post_num3_options, $post_num_options, $header_fix_options, $sns_type_top_options, $sns_type_btm_options, $dp_upload_error, $footer_nav_type_options, $footer_widget_options, $footer_bar_icon_options, $footer_bar_button_options, $footer_bar_display_options, $pw_align_options;
    $dp_options = get_desing_plus_option();

 if ( ! isset( $_REQUEST['settings-updated'] ) )
  $_REQUEST['settings-updated'] = false;

?>

<div class="wrap">

 <?php screen_icon(); echo "<h2>" . __( 'TCD Theme Options', 'tcd-w' ) . "</h2>"; ?>

 <?php // 更新時のメッセージ
       if ( false !== $_REQUEST['settings-updated'] ) :
 ?>
 <div class="updated fade"><p><strong><?php _e('Updated', 'tcd-w'); ?></strong></p></div>
 <?php endif; ?>

 <div id="my_theme_option" class="cf">

  <div id="my_theme_left">
   <ul id="theme_tab" class="cf">
    <li><a href="#tab-content1"><?php _e('Basic', 'tcd-w'); ?></a></li>
    <li><a href="#tab-content2"><?php _e('Logo', 'tcd-w'); ?></a></li>
    <li><a href="#tab-content3"><?php _e('Index', 'tcd-w'); ?></a></li>
    <li><a href="#tab-content4"><?php _e('Blog', 'tcd-w'); ?></a></li>
    <li><a href="#tab-content5"><?php _e('Introduce', 'tcd-w'); ?></a></li>
    <li><a href="#tab-content6"><?php _e('News', 'tcd-w'); ?></a></li>
    <li><a href="#tab-content7"><?php _e('Search', 'tcd-w'); ?></a></li>
    <li><a href="#tab-content8"><?php _e('Header', 'tcd-w'); ?></a></li>
    <li><a href="#tab-content9"><?php _e('Footer', 'tcd-w'); ?></a></li>
    <li><a href="#tab-content10"><?php _e('Password protected pages', 'tcd-w'); ?></a></li>
   </ul>
  </div>

  <div id="my_theme_right">

  <form method="post" action="options.php" enctype="multipart/form-data">

  <?php settings_fields( 'design_plus_options' ); ?>

  <div id="tab-panel">

  <!-- #tab-content1 基本設定　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
  <div id="tab-content1">

   <?php // サイトカラー ?>
   <div id="color_pattern">
    <div class="theme_option_field cf">
     <h3 class="theme_option_headline"><?php _e('Color setting', 'tcd-w'); ?></h3>
     <h4 class="theme_option_headline2"><?php _e('Primary color setting', 'tcd-w'); ?></h4>
     <input type="text" id="pickedcolor1" name="dp_options[pickedcolor1]" value="<?php echo esc_attr( $dp_options['pickedcolor1'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['pickedcolor1']); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Secondary color setting', 'tcd-w'); ?></h4>
     <input type="text" id="pickedcolor2" name="dp_options[pickedcolor2]" value="<?php echo esc_attr( $dp_options['pickedcolor2'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['pickedcolor2']); ?>" />
     <h4 class="theme_option_headline2"><?php _e('Link text color in the article', 'tcd-w'); ?></h4>
     <input type="text" id="content_link_color" name="dp_options[content_link_color]" value="<?php echo esc_attr( $dp_options['content_link_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['content_link_color']); ?>" />
     <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
    </div>
   </div>

   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e( 'Favicon setup', 'tcd-w' ); ?></h3>
    <p><?php _e( 'Setting for the favicon displayed at browser address bar or tab.', 'tcd-w' ); ?></p>
    <h4><?php _e( 'Favicon file', 'tcd-w' ); ?><?php _e( ' (Recommended size: width:16px, height:16px)', 'tcd-w' ); ?></h4>
    <p><?php _e( 'You can use .ico, .png or .gif file, and we recommed you to use .ico file.', 'tcd-w' ); ?></p>
    <div class="image_box cf">
     <div class="cf cf_media_field hide-if-no-js">
      <input type="hidden" value="<?php echo esc_attr( $dp_options['favicon'] ); ?>" id="favicon" name="dp_options[favicon]" class="cf_media_id">
      <div class="preview_field"><?php if ( $dp_options['favicon'] ) { echo wp_get_attachment_image( $dp_options['favicon'], 'medium'); } ?></div>
       <div class="button_area">
        <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
       <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $dp_options['favicon'] ) { echo 'hidden'; } ?>">
      </div>
     </div>
    </div>
    <input type="submit" class="button-ml" value="<?php _e( 'Save Changes', 'tcd-w' ); ?>">
   </div>

   <?php // フォントの種類 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Font type', 'tcd-w'); ?></h3>
    <p><?php _e('Please set the font type of all text except for headline.', 'tcd-w'); ?></p>
    <fieldset class="cf select_type2">
     <?php
           foreach ( $font_type_options as $option ) {
             if ( $dp_options['font_type'] == $option['value'] ) {
               $checked = "checked=\"checked\"";
             } else {
               $checked = '';
             }
     ?>
     <label class="description">
      <input type="radio" name="dp_options[font_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
      <?php echo $option['label']; ?>
     </label>
     <?php } ?>
    </fieldset>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // フォントの種類 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Font type of headline', 'tcd-w'); ?></h3>
    <fieldset class="cf select_type2">
     <?php
           foreach ( $headline_font_type_options as $option ) {
             if ( $dp_options['headline_font_type'] == $option['value'] ) {
               $checked = "checked=\"checked\"";
             } else {
               $checked = '';
             }
     ?>
     <label class="description">
      <input type="radio" name="dp_options[headline_font_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
      <?php echo $option['label']; ?>
     </label>
     <?php } ?>
    </fieldset>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

  <?php // hover effect ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Hover effect', 'tcd-w'); ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Hover effect type', 'tcd-w'); ?></h4>
    <p><?php _e('Please set the hover effect for thumbnail images.', 'tcd-w'); ?></p>
    <fieldset class="cf select_type2">
     <?php
           foreach ( $hover_type_options as $option ) {
             if ( $dp_options['hover_type'] == $option['value'] ) {
               $checked = "checked=\"checked\"";
             } else {
               $checked = '';
             }
      ?>
     <input style="display:inline; margin: 5px 5px 5px 0;" type="radio" id="tab-<?php echo $option['value']; ?>" name="dp_options[hover_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
     <label style="display:inline;" class="description" for="tab-<?php echo $option['value']; ?>"><?php echo $option['label']; ?></label><br>
     <?php } ?>

     <div class="tab-box">
      <div id="tabView1">
        <h4 class="theme_option_headline2"><?php _e('Settings for Zoom effect', 'tcd-w'); ?></h4>
        <p><?php _e('Please set the rate of magnification.', 'tcd-w'); ?></p>
        <input id="dp_options[hover1_zoom]" class="hankaku" style="width:45px;" type="text" name="dp_options[hover1_zoom]" value="<?php echo esc_attr( $dp_options['hover1_zoom'] ); ?>" />
        <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
      </div>
      <div id="tabView2">
        <h4 class="theme_option_headline2"><?php _e('Settings for Slide effect', 'tcd-w'); ?></h4>
        <p><?php _e('Please set the direction of slide.', 'tcd-w'); ?></p>
        <fieldset class="cf select_type2">
         <?php
               foreach ( $hover2_direct_options as $option ) {
                 if ( $dp_options['hover2_direct'] == $option['value'] ) {
                   $checked = "checked=\"checked\"";
                 } else {
                   $checked = '';
                 }
         ?>
         <label class="description" style="display:inline-block;margin-right:15px;">
          <input type="radio" name="dp_options[hover2_direct]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
          <?php echo $option['label']; ?>
         </label>
         <?php } ?>
        </fieldset>
        <p><?php _e('Please set the opacity. (0 - 1.0, e.g. 0.7)', 'tcd-w'); ?></p>
        <input id="dp_options[hover2_opacity]" class="hankaku" style="width:45px;" type="text" name="dp_options[hover2_opacity]" value="<?php echo esc_attr( $dp_options['hover2_opacity'] ); ?>" />
        <p><?php _e('Please set the background color.', 'tcd-w'); ?></p>
        <input type="text" id="hover2_bgcolor" name="dp_options[hover2_bgcolor]" value="<?php echo esc_attr( $dp_options['hover2_bgcolor'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['hover2_bgcolor']); ?>" />
        <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
      </div>
      <div id="tabView3">
        <h4 class="theme_option_headline2"><?php _e('Settings for Fade effect', 'tcd-w'); ?></h4>
        <p><?php _e('Please set the opacity. (0 - 1.0, e.g. 0.7)', 'tcd-w'); ?></p>
        <input id="dp_options[hover3_opacity]" class="hankaku" style="width:45px;" type="text" name="dp_options[hover3_opacity]" value="<?php echo esc_attr( $dp_options['hover3_opacity'] ); ?>" />
        <p><?php _e('Please set the background color.', 'tcd-w'); ?></p>
        <input type="text" id="hover3_bgcolor" name="dp_options[hover3_bgcolor]" value="<?php echo esc_attr( $dp_options['hover3_bgcolor'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['hover3_bgcolor']); ?>" />
        <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
      </div>
     </div>
    </fieldset>
   </div>

   <?php // Use OGP tag ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Facebook OGP setting', 'tcd-w'); ?></h3>
    <div class="theme_option_input">
     <p><label><input id="dp_options[use_ogp]" name="dp_options[use_ogp]" type="checkbox" value="1" <?php checked( '1', $dp_options['use_ogp'] ); ?> /> <?php _e('Use OGP', 'tcd-w'); ?></label></p>
     <p><?php _e('Your fb:admins ID', 'tcd-w'); ?> <input id="dp_options[fb_admin_id]" class="regular-text" type="text" name="dp_options[fb_admin_id]" value="<?php echo esc_attr( $dp_options['fb_admin_id'] ); ?>" /></p>
     <p><?php _e('<a href="http://design-plus1.com/tcd-w/2016/07/facebook-3.html" target="_blank">Information about Facebook OGP and fb:admins ID</a>', 'tcd-w'); ?></p>
    </div>
    <h4 class="theme_option_headline2"><?php _e( 'OGP image', 'tcd-w' ); ?></h4>
    <p><?php _e( 'This image is displayed for OGP if the page does not have a thumbnail.', 'tcd-w' ); ?></p>
    <p><?php _e( 'Recommend image size. Width:1200px, Height:630px', 'tcd-w' ); ?></p>
    <div class="image_box cf">
     <div class="cf cf_media_field hide-if-no-js">
      <input type="hidden" value="<?php echo esc_attr( $dp_options['ogp_image'] ); ?>" id="ogp_image" name="dp_options[ogp_image]" class="cf_media_id">
      <div class="preview_field"><?php if ( $dp_options['ogp_image'] ) { echo wp_get_attachment_image( $dp_options['ogp_image'], 'medium'); } ?></div>
       <div class="button_area">
        <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
       <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $dp_options['ogp_image'] ) { echo 'hidden'; } ?>">
      </div>
     </div>
    </div>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // Use twitter card ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Twitter Cards setting', 'tcd-w'); ?></h3>
    <div class="theme_option_input">
     <p><label><input id="dp_options[use_twitter_card]" name="dp_options[use_twitter_card]" type="checkbox" value="1" <?php checked( '1', $dp_options['use_twitter_card'] ); ?> /> <?php _e('Use Twitter Cards', 'tcd-w'); ?></label></p>
     <p><?php _e('Your Twitter account name (exclude @ mark)', 'tcd-w'); ?> <input id="dp_options[twitter_account_name]" class="regular-text" type="text" name="dp_options[twitter_account_name]" value="<?php echo esc_attr( $dp_options['twitter_account_name'] ); ?>" /></p>
     <p><a href="http://design-plus1.com/tcd-w/2016/11/twitter-cards.html" target="_blank"><?php _e( 'Information about Twitter Cards.', 'tcd-w' ); ?></a></p>
    </div>
     <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // 絵文字の設定 ?>
   <div class="theme_option_field cf">
       <h3 class="theme_option_headline"><?php _e('Emoji setup', 'tcd-w'); ?></h3>
       <p><?php _e('We recommend to checkoff this option if you dont use any Emoji in your post content.', 'tcd-w'); ?></p>
       <p><label><input id="dp_options[use_emoji]" name="dp_options[use_emoji]" type="checkbox" value="1" <?php checked( '1', $dp_options['use_emoji'] ); ?> /> <?php _e('Use emoji', 'tcd-w'); ?></label></p>
   <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // レスポンシブ設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Responsive design setting', 'tcd-w'); ?></h3>
    <fieldset class="cf select_type2">
     <?php
           foreach ( $responsive_options as $option ) {
             if ( $dp_options['responsive'] == $option['value'] ) {
               $checked = "checked=\"checked\"";
             } else {
               $checked = '';
             }
     ?>
     <label class="description">
      <input type="radio" name="dp_options[responsive]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
      <?php echo $option['label']; ?>
     </label>
     <?php } ?>
    </fieldset>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // sidebar ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Sidebar', 'tcd-w'); ?></h3>
    <p><?php _e('This theme will display the sidebar to right column, but put the check bellow if you want to display to left.', 'tcd-w'); ?></p>
    <p><label><input id="dp_options[column_float]" name="dp_options[column_float]" type="checkbox" value="1" <?php checked( '1', $dp_options['column_float'] ); ?> /> <?php _e('Display the sidebar to left column', 'tcd-w'); ?></label></p>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // ローディング画面の設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Loading screen setting', 'tcd-w'); ?></h3>
    <p><label><input id="dp_options[use_load_icon]" name="dp_options[use_load_icon]" type="checkbox" value="1" <?php checked( '1', $dp_options['use_load_icon'] ); ?> /> <?php _e('Use load icon.', 'tcd-w'); ?></label></p>
    <h4 class="theme_option_headline2"><?php _e('Type of loader', 'tcd-w'); ?></h4>
    <select  id="load_icon_type" name="dp_options[load_icon]">
     <?php
          foreach ( $load_icon_type as $option ) :
            if ( $dp_options['load_icon'] == $option['value']) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
            echo '<option value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $option['label'] . '</option>' ."\n";
          endforeach;
     ?>
    </select>
    <h4 class="theme_option_headline2"><?php _e('Maximum display time', 'tcd-w'); ?></h4>
    <p><?php _e('Please set the maximum display time of the loading screen.<br />Even if all the content is not loaded, loading screen will disappear automatically after a lapse of time you have set at follwing.', 'tcd-w'); ?></p>
    <select name="dp_options[load_time]">
     <?php
          foreach ( $load_time_options as $option ) :
            if ( $dp_options['load_time'] == $option['value']) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
            echo '<option value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $option['label'] . '</option>' ."\n";
          endforeach;
     ?>
    </select>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // ユーザーCSS用の自由記入欄 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Free input area for user definition CSS.', 'tcd-w'); ?></h3>
    <p><?php _e('Code example:<br /><strong>.example { font-size:12px; }</strong>', 'tcd-w'); ?></p>
    <textarea id="dp_options[css_code]" class="large-text" cols="50" rows="10" name="dp_options[css_code]"><?php echo esc_textarea( $dp_options['css_code'] ); ?></textarea>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // 404 ページ ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e( 'Settings for 404 page', 'tcd-w' ); ?></h3>
    <h4 class="theme_option_headline2"><?php _e( 'Header image', 'tcd-w' ); ?></h4>
    <p><?php _e( 'Recommend image size. Width:1450px, Height:700px', 'tcd-w' ); ?></p>
    <div class="image_box cf">
     <div class="cf cf_media_field hide-if-no-js header_image_404">
      <input type="hidden" value="<?php echo esc_attr( $dp_options['header_image_404'] ); ?>" id="header_image_404" name="dp_options[header_image_404]" class="cf_media_id">
      <div class="preview_field"><?php if ( $dp_options['header_image_404'] ) { echo wp_get_attachment_image( $dp_options['header_image_404'], 'medium' ); } ?></div>
      <div class="button_area">
       <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
       <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $dp_options['header_image_404'] ) { echo 'hidden'; } ?>">
      </div>
     </div>
    </div>
    <h4 class="theme_option_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
    <textarea id="dp_options[header_txt_404]" class="large-text" cols="50" rows="2" name="dp_options[header_txt_404]"><?php echo esc_textarea( $dp_options['header_txt_404'] ); ?></textarea>
    <h4 class="theme_option_headline2"><?php _e( 'Font size of headline', 'tcd-w' ); ?></h4>
    <p><input id="dp_options[header_txt_size_404]" class="font_size hankaku" type="text" name="dp_options[header_txt_size_404]" value="<?php echo esc_attr( $dp_options['header_txt_size_404'] ); ?>"><span>px</span></p>
    <h4 class="theme_option_headline2"><?php _e( 'Font size of headline for mobile device', 'tcd-w' ); ?></h4>
    <p><input id="dp_options[header_txt_size_404_mobile]" class="font_size hankaku" type="text" name="dp_options[header_txt_size_404_mobile]" value="<?php echo esc_attr( $dp_options['header_txt_size_404_mobile'] ); ?>"><span>px</span></p>
    <h4 class="theme_option_headline2"><?php _e( 'Font color of headline', 'tcd-w' ); ?></h4>
    <input type="text" id="header_txt_color_404" name="dp_options[header_txt_color_404]" value="<?php esc_attr_e( $dp_options['header_txt_color_404'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['header_txt_color_404']); ?>" />
    <h4 class="theme_option_headline2"><?php _e( 'Dropshadow of headline', 'tcd-w' ); ?></h4>
    <p><?php _e( 'Enter "0" if you don\'t want to use dropshadow.', 'tcd-w' ); ?></p>
    <ul class="headline_option">
     <li><label><?php _e( 'Dropshadow position (left)', 'tcd-w'); ?></label><input id="dp_options[dropshadow_404_h]" class="font_size hankaku" type="text" name="dp_options[dropshadow_404_h]" value="<?php echo esc_attr( $dp_options['dropshadow_404_h'] ); ?>"><span>px</span></li>
     <li><label><?php _e( 'Dropshadow position (top)', 'tcd-w'); ?></label><input id="dp_options[dropshadow_404_v]" class="font_size hankaku" type="text" name="dp_options[dropshadow_404_v]" value="<?php echo esc_attr( $dp_options['dropshadow_404_v'] ); ?>"><span>px</span></li>
     <li><label><?php _e( 'Dropshadow size', 'tcd-w' ); ?></label><input id="dp_options[dropshadow_404_b]" class="font_size hankaku" type="text" name="dp_options[dropshadow_404_b]" value="<?php echo esc_attr( $dp_options['dropshadow_404_b'] ); ?>"><span>px</span></li>
     <li><label><?php _e( 'Dropshadow color', 'tcd-w' ); ?></label><input type="text" id="dropshadow_404_c" name="dp_options[dropshadow_404_c]" value="<?php echo esc_attr( $dp_options['dropshadow_404_c'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['dropshadow_404_c']); ?>" />
    </ul>
    <h4 class="theme_option_headline2"><?php _e( 'Sub title', 'tcd-w' ); ?></h4>
    <textarea id="dp_options[header_sub_txt_404]" class="large-text" cols="50" rows="2" name="dp_options[header_sub_txt_404]"><?php echo esc_textarea( $dp_options['header_sub_txt_404'] ); ?></textarea>
    <h4 class="theme_option_headline2"><?php _e( 'Font size of sub title', 'tcd-w' ); ?></h4>
    <p><input id="dp_options[header_sub_txt_size_404]" class="font_size hankaku" type="text" name="dp_options[header_sub_txt_size_404]" value="<?php echo esc_attr( $dp_options['header_sub_txt_size_404'] ); ?>"><span>px</span></p>
    <h4 class="theme_option_headline2"><?php _e( 'Font size of sub title for mobile device', 'tcd-w' ); ?></h4>
    <p><input id="dp_options[header_sub_txt_size_404_mobile]" class="font_size hankaku" type="text" name="dp_options[header_sub_txt_size_404_mobile]" value="<?php echo esc_attr( $dp_options['header_sub_txt_size_404_mobile'] ); ?>"><span>px</span></p>
    <input type="submit" class="button-ml" value="<?php _e( 'Save Changes', 'tcd-w' ); ?>">
   </div>

  </div><!-- END #tab-content1 -->




  <!-- #tab-content2 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
  <div id="tab-content2">

   <?php // ヘッダーのロゴ ----------------------------------------------------- ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Header logo', 'tcd-w'); ?></h3>
    <div<?php if(!empty($dp_options['header_logo_image'])) { echo ' style="display:none;"'; }; ?>>
    <h4 class="theme_option_headline2"><?php _e('Font size for text logo', 'tcd-w'); ?></h4>
    <input id="dp_options[logo_font_size]" class="font_size hankaku" type="text" name="dp_options[logo_font_size]" value="<?php echo esc_attr( $dp_options['logo_font_size'] ); ?>" /><span>px</span>
    </div>
    <h4 class="theme_option_headline2"><?php _e('Image for logo', 'tcd-w'); ?></h4>
    <p><?php _e('If the image is not registered, text will be displayed instead.','tcd-w'); ?></p>
    <p><?php _e('Recommended size, Width:125px Height:30px (maximum height:60px)', 'tcd-w'); ?></p>
    <div class="image_box cf">
     <div class="cf cf_media_field hide-if-no-js header_logo_image">
      <input type="hidden" value="<?php echo esc_attr( $dp_options['header_logo_image'] ); ?>" id="header_logo_image" name="dp_options[header_logo_image]" class="cf_media_id">
      <div class="preview_field"><?php if($dp_options['header_logo_image']){ echo wp_get_attachment_image($dp_options['header_logo_image'], 'full'); }; ?></div>
      <div class="buttton_area">
       <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
       <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['header_logo_image']){ echo 'hidden'; }; ?>">
      </div>
     </div>
    </div>
    <h5 class="theme_option_headline3"><?php _e('If you upload a logo image for retina display, please check the following check boxes','tcd-w'); ?></h5>
    <p><label><input id="dp_options[header_logo_retina]" name="dp_options[header_logo_retina]" type="checkbox" value="1" <?php checked( '1', $dp_options['header_logo_retina'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w'); ?></label></p>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // ヘッダーのロゴ（固定ヘッダー用） ----------------------------------------------------- ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Header logo for fixed header', 'tcd-w'); ?></h3>
    <div<?php if(!empty($dp_options['header_logo_image_fix'])) { echo ' style="display:none;"'; }; ?>>
    <h4 class="theme_option_headline2"><?php _e('Font size for text logo', 'tcd-w'); ?></h4>
    <input id="dp_options[logo_font_size_fix]" class="font_size hankaku" type="text" name="dp_options[logo_font_size_fix]" value="<?php esc_attr_e( $dp_options['logo_font_size_fix'] ); ?>" /><span>px</span>
    </div>
    <h4 class="theme_option_headline2"><?php _e('Image for logo', 'tcd-w'); ?></h4>
    <p><?php _e('If the image is not registered, text will be displayed instead.','tcd-w'); ?></p>
    <p><?php _e('Recommended size, Width:125px Height:30px (maximum height:60px), and we recommend you to use the background transparent PNG image.', 'tcd-w'); ?></p>
    <div class="image_box cf">
     <div class="cf cf_media_field hide-if-no-js header_logo_image_fix">
      <input type="hidden" value="<?php echo esc_attr( $dp_options['header_logo_image_fix'] ); ?>" id="header_logo_image_fix" name="dp_options[header_logo_image_fix]" class="cf_media_id">
      <div class="preview_field"><?php if($dp_options['header_logo_image_fix']){ echo wp_get_attachment_image($dp_options['header_logo_image_fix'], 'full'); }; ?></div>
      <div class="buttton_area">
       <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
       <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['header_logo_image_fix']){ echo 'hidden'; }; ?>">
      </div>
     </div>
    </div>
    <h5 class="theme_option_headline3"><?php _e('If you upload a logo image for retina display, please check the following check boxes','tcd-w'); ?></h5>
    <p><label><input id="dp_options[header_logo_retina_fix]" name="dp_options[header_logo_retina_fix]" type="checkbox" value="1" <?php checked( '1', $dp_options['header_logo_retina_fix'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w'); ?></label></p>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // ヘッダーのロゴ（モバイル用） ----------------------------------------------------- ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Header logo for mobile device', 'tcd-w'); ?></h3>
    <div<?php if(!empty($dp_options['header_logo_image_mobile'])) { echo ' style="display:none;"'; }; ?>>
    <h4 class="theme_option_headline2"><?php _e('Font size for text logo', 'tcd-w'); ?></h4>
    <input id="dp_options[logo_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[logo_font_size_mobile]" value="<?php echo esc_attr( $dp_options['logo_font_size_mobile'] ); ?>" /><span>px</span>
    </div>
    <h4 class="theme_option_headline2"><?php _e('Image for logo', 'tcd-w'); ?></h4>
    <p><?php _e('If the image is not registered, text will be displayed instead.','tcd-w'); ?></p>
    <p><?php _e('Recommended size, Width:125px Height:30px (maximum height:50px)', 'tcd-w'); ?></p>
    <div class="image_box cf">
     <div class="cf cf_media_field hide-if-no-js header_logo_image_mobile">
      <input type="hidden" value="<?php echo esc_attr( $dp_options['header_logo_image_mobile'] ); ?>" id="header_logo_image_mobile" name="dp_options[header_logo_image_mobile]" class="cf_media_id">
      <div class="preview_field"><?php if($dp_options['header_logo_image_mobile']){ echo wp_get_attachment_image($dp_options['header_logo_image_mobile'], 'full'); }; ?></div>
      <div class="buttton_area">
       <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
       <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['header_logo_image_mobile']){ echo 'hidden'; }; ?>">
      </div>
     </div>
    </div>
    <h5 class="theme_option_headline3"><?php _e('If you upload a logo image for retina display, please check the following check boxes','tcd-w'); ?></h5>
    <p><label><input id="dp_options[header_logo_retina_mobile]" name="dp_options[header_logo_retina_mobile]" type="checkbox" value="1" <?php checked( '1', $dp_options['header_logo_retina_mobile'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w'); ?></label></p>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // ヘッダーのロゴ（モバイル固定ヘッダー用） ----------------------------------------------------- ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Header logo for fixed header for mobile device', 'tcd-w'); ?></h3>
    <div<?php if(!empty($dp_options['header_logo_image_mobile_fix'])) { echo ' style="display:none;"'; }; ?>>
    <h4 class="theme_option_headline2"><?php _e('Font size for text logo', 'tcd-w'); ?></h4>
    <input id="dp_options[logo_font_size_mobile_fix]" class="font_size hankaku" type="text" name="dp_options[logo_font_size_mobile_fix]" value="<?php echo esc_attr( $dp_options['logo_font_size_mobile_fix'] ); ?>" /><span>px</span>
    </div>
    <h4 class="theme_option_headline2"><?php _e('Image for logo', 'tcd-w'); ?></h4>
    <p><?php _e('If the image is not registered, text will be displayed instead.','tcd-w'); ?></p>
    <p><?php _e('Recommended size, Width:125px Height:30px (maximum height:50px)', 'tcd-w'); ?></p>
    <div class="image_box cf">
     <div class="cf cf_media_field hide-if-no-js header_logo_image_mobile">
      <input type="hidden" value="<?php echo esc_attr( $dp_options['header_logo_image_mobile_fix'] ); ?>" id="header_logo_image_mobile_fix" name="dp_options[header_logo_image_mobile_fix]" class="cf_media_id">
      <div class="preview_field"><?php if($dp_options['header_logo_image_mobile_fix']){ echo wp_get_attachment_image($dp_options['header_logo_image_mobile_fix'], 'full'); }; ?></div>
      <div class="buttton_area">
       <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
       <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['header_logo_image_mobile_fix']){ echo 'hidden'; }; ?>">
      </div>
     </div>
    </div>
    <h5 class="theme_option_headline3"><?php _e('If you upload a logo image for retina display, please check the following check boxes','tcd-w'); ?></h5>
    <p><label><input id="dp_options[header_logo_retina_mobile_fix]" name="dp_options[header_logo_retina_mobile_fix]" type="checkbox" value="1" <?php checked( '1', $dp_options['header_logo_retina_mobile_fix'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w'); ?></label></p>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // フッターのロゴ ----------------------------------------------------- ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Footer logo', 'tcd-w'); ?></h3>
    <div<?php if(!empty($dp_options['footer_logo_image'])) { echo ' style="display:none;"'; }; ?>>
    <h4 class="theme_option_headline2"><?php _e('Font size for text logo', 'tcd-w'); ?></h4>
    <input id="dp_options[logo_font_size_footer]" class="font_size hankaku" type="text" name="dp_options[logo_font_size_footer]" value="<?php echo esc_attr( $dp_options['logo_font_size_footer'] ); ?>" /><span>px</span>
    <h4 class="theme_option_headline2"><?php _e('Font size for text logo for mobile device', 'tcd-w'); ?></h4>
    <input id="dp_options[logo_font_size_footer_mobile]" class="font_size hankaku" type="text" name="dp_options[logo_font_size_footer_mobile]" value="<?php echo esc_attr( $dp_options['logo_font_size_footer_mobile'] ); ?>" /><span>px</span>
    </div>
    <h4 class="theme_option_headline2"><?php _e('Image for logo', 'tcd-w'); ?></h4>
    <p><?php _e('If the image is not registered, text will be displayed instead.','tcd-w'); ?></p>
    <p><?php _e('Recommended size, Width:125px Height:30px, and we recommend you to use the background transparent PNG image.', 'tcd-w'); ?></p>
    <div class="image_box cf">
     <div class="cf cf_media_field hide-if-no-js footer_logo_image">
      <input type="hidden" value="<?php echo esc_attr( $dp_options['footer_logo_image'] ); ?>" id="footer_logo_image" name="dp_options[footer_logo_image]" class="cf_media_id">
      <div class="preview_field"><?php if($dp_options['footer_logo_image']){ echo wp_get_attachment_image($dp_options['footer_logo_image'], 'full'); }; ?></div>
      <div class="buttton_area">
       <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
       <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['footer_logo_image']){ echo 'hidden'; }; ?>">
      </div>
     </div>
    </div>
    <h5 class="theme_option_headline3"><?php _e('If you upload a logo image for retina display, please check the following check boxes','tcd-w'); ?></h5>
    <p><label><input id="dp_options[footer_logo_retina]" name="dp_options[footer_logo_retina]" type="checkbox" value="1" <?php checked( '1', $dp_options['footer_logo_retina'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w'); ?></label></p>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

  </div><!-- END #tab-content2 -->




  <!-- #tab-content3 トップページ　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
  <div id="tab-content3">

   <?php // ヘッダースライダー -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Header content setting', 'tcd-w'); ?></h3>
    <h4 class="theme_option_headline2"><?php _e( 'Header content type', 'tcd-w' ); ?></h4>
    <fieldset class="cf select_type2 header_content_type">
     <?php
           foreach ( $header_content_type_options as $option ) {
             if ( $dp_options['header_content_type'] == $option['value'] ) {
               $checked = "checked=\"checked\"";
             } else {
               $checked = '';
             }
     ?>
     <label><input type="radio" name="dp_options[header_content_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> /><?php echo $option['label']; ?></label>
     <?php } ?>
    </fieldset>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <div class="theme_option_field cf header_content_type1" style="<?php if($dp_options['header_content_type'] == 'type1') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <h3 class="theme_option_headline"><?php _e('Image slider setting', 'tcd-w'); ?></h3>
    <p><?php _e('You can register 5 images.', 'tcd-w'); ?></p>
    <?php for($i = 1; $i <= 5; $i++): ?>
    <div class="sub_box cf">
     <h3 class="theme_option_subbox_headline"><?php printf(__('Slider%s setting', 'tcd-w'),$i); ?></h3>
     <div class="sub_box_content">
      <h4 class="theme_option_headline2"><?php _e('Slider image', 'tcd-w'); ?></h4>
      <p><?php _e('Recommend image size. Width:1450px, Height:700px', 'tcd-w'); ?></p>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js slider_image<?php echo $i; ?>">
        <input type="hidden" value="<?php echo esc_attr( $dp_options['slider_image'.$i] ); ?>" id="slider_image<?php echo $i; ?>" name="dp_options[slider_image<?php echo $i; ?>]" class="cf_media_id">
        <div class="preview_field"><?php if($dp_options['slider_image'.$i]){ echo wp_get_attachment_image($dp_options['slider_image'.$i], 'medium'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['slider_image'.$i]){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>

      <h4 class="theme_option_headline2"><?php _e('Slider image for mobile', 'tcd-w'); ?></h4>
      <p><?php _e('Recommend image size. Width:1450, Height:700px', 'tcd-w'); ?></p>
      <p><?php _e('Notice: This image is cropped on smartphones.', 'tcd-w'); ?></p>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js slider_image_mobile<?php echo $i; ?>">
        <input type="hidden" value="<?php echo esc_attr( $dp_options['slider_image_mobile'.$i] ); ?>" id="slider_image_mobile<?php echo $i; ?>" name="dp_options[slider_image_mobile<?php echo $i; ?>]" class="cf_media_id">
        <div class="preview_field"><?php if($dp_options['slider_image_mobile'.$i]){ echo wp_get_attachment_image($dp_options['slider_image_mobile'.$i], 'medium'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['slider_image_mobile'.$i]){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>

      <h4 class="theme_option_headline2"><?php _e('Link URL', 'tcd-w'); ?></h4>
      <p><?php _e('Leave this field blank if you don\'t want to use link at image.', 'tcd-w'); ?></p>
      <input id="dp_options[slider_url<?php echo $i; ?>]" class="regular-text" type="text" name="dp_options[slider_url<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_url'.$i] ); ?>" />
      <p><label><input id="dp_options[slider_target<?php echo $i; ?>]" name="dp_options[slider_target<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( '1', $dp_options['slider_target'.$i] ); ?> /> <?php _e('Open link in new window', 'tcd-w'); ?></label></p>

      <h4 class="theme_option_headline2"><?php _e('Caption setting', 'tcd-w'); ?></h4>
      <p class="use_slider_caption"><label><input id="dp_options[use_slider_caption<?php echo $i; ?>]" name="dp_options[use_slider_caption<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( '1', $dp_options['use_slider_caption'.$i] ); ?> /> <?php _e('Display caption.', 'tcd-w'); ?></label></p>
      <div class="slider_caption_setting"<?php if( $dp_options['use_slider_caption'.$i] == 1 ) { echo ' style="display:block;"'; }; ?>>
       <h4 class="theme_option_headline2"><?php _e('Headline', 'tcd-w'); ?></h4>
       <textarea id="dp_options[slider_headline<?php echo $i; ?>]" class="large-text" cols="50" rows="2" name="dp_options[slider_headline<?php echo $i; ?>]"><?php echo esc_textarea( $dp_options['slider_headline'.$i] ); ?></textarea>
       <ul class="headline_option">
        <li><label><?php _e('Font size', 'tcd-w'); ?></label><input id="dp_options[slider_headline_font_size<?php echo $i; ?>]" class="font_size hankaku" type="text" name="dp_options[slider_headline_font_size<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_headline_font_size'.$i] ); ?>" /><span>px</span></li>
        <li><label><?php _e('Font size for mobile', 'tcd-w'); ?></label><input id="dp_options[slider_headline_font_size_mobile<?php echo $i; ?>]" class="font_size hankaku" type="text" name="dp_options[slider_headline_font_size_mobile<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_headline_font_size_mobile'.$i] ); ?>" /><span>px</span></li>
        <li><label><?php _e('Font color', 'tcd-w'); ?></label><input type="text" id="slider_headline_color<?php echo $i; ?>" name="dp_options[slider_headline_color<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_headline_color'.$i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_headline_color'.$i]); ?>" /></li>
        <li><label><?php _e('Dropshadow position (left)', 'tcd-w'); ?></label><input id="dp_options[slider_headline_shadow_a<?php echo $i; ?>]" class="font_size hankaku" type="text" name="dp_options[slider_headline_shadow_a<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_headline_shadow_a'.$i] ); ?>" /><span>px</span></li>
        <li><label><?php _e('Dropshadow position (top)', 'tcd-w'); ?></label><input id="dp_options[slider_headline_shadow_b<?php echo $i; ?>]" class="font_size hankaku" type="text" name="dp_options[slider_headline_shadow_b<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_headline_shadow_b'.$i] ); ?>" /><span>px</span></li>
        <li><label><?php _e('Dropshadow size', 'tcd-w'); ?></label><input id="dp_options[slider_headline_shadow_c<?php echo $i; ?>]" class="font_size hankaku" type="text" name="dp_options[slider_headline_shadow_c<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_headline_shadow_c'.$i] ); ?>" /><span>px</span></li>
        <li><label><?php _e('Dropshadow color', 'tcd-w'); ?></label><input type="text" id="slider_headline_shadow_color<?php echo $i; ?>" name="dp_options[slider_headline_shadow_color<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_headline_shadow_color'.$i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_headline_shadow_color'.$i]); ?>" /></li>
       </ul>
       <h4 class="theme_option_headline2"><?php _e('Catchphrase', 'tcd-w'); ?></h4>
       <textarea id="dp_options[slider_caption<?php echo $i; ?>]" class="large-text" cols="50" rows="2" name="dp_options[slider_caption<?php echo $i; ?>]"><?php echo esc_textarea( $dp_options['slider_caption'.$i] ); ?></textarea>
       <ul class="headline_option">
        <li><label><?php _e('Font size', 'tcd-w'); ?></label><input id="dp_options[slider_caption_font_size<?php echo $i; ?>]" class="font_size hankaku" type="text" name="dp_options[slider_caption_font_size<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_caption_font_size'.$i] ); ?>" /><span>px</span></li>
        <li><label><?php _e('Font size for mobile', 'tcd-w'); ?></label><input id="dp_options[slider_caption_font_size_mobile<?php echo $i; ?>]" class="font_size hankaku" type="text" name="dp_options[slider_caption_font_size_mobile<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_caption_font_size_mobile'.$i] ); ?>" /><span>px</span></li>
        <li><label><?php _e('Font color', 'tcd-w'); ?></label><input type="text" id="slider_caption_color<?php echo $i; ?>" name="dp_options[slider_caption_color<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_caption_color'.$i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_caption_color'.$i]); ?>" /></li>
        <li><label><?php _e('Dropshadow position (left)', 'tcd-w'); ?></label><input id="dp_options[slider_caption_shadow_a<?php echo $i; ?>]" class="font_size hankaku" type="text" name="dp_options[slider_caption_shadow_a<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_caption_shadow_a'.$i] ); ?>" /><span>px</span></li>
        <li><label><?php _e('Dropshadow position (top)', 'tcd-w'); ?></label><input id="dp_options[slider_caption_shadow_b<?php echo $i; ?>]" class="font_size hankaku" type="text" name="dp_options[slider_caption_shadow_b<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_caption_shadow_b'.$i] ); ?>" /><span>px</span></li>
        <li><label><?php _e('Dropshadow size', 'tcd-w'); ?></label><input id="dp_options[slider_caption_shadow_c<?php echo $i; ?>]" class="font_size hankaku" type="text" name="dp_options[slider_caption_shadow_c<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_caption_shadow_c'.$i] ); ?>" /><span>px</span></li>
        <li><label><?php _e('Dropshadow color', 'tcd-w'); ?></label><input type="text" id="slider_caption_shadow_color<?php echo $i; ?>" name="dp_options[slider_caption_shadow_color<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_caption_shadow_color'.$i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_caption_shadow_color'.$i]); ?>" /></li>
       </ul>
       <h4 class="theme_option_headline2"><?php _e('Button setting', 'tcd-w'); ?></h4>
       <p class="show_slider_button"><label><input id="dp_options[show_slider_button<?php echo $i; ?>]" name="dp_options[show_slider_button<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_slider_button'.$i] ); ?> /> <?php _e('Display button.', 'tcd-w'); ?></label></p>
       <div class="slider_button_setting"<?php if( $dp_options['show_slider_button'.$i] == 1 ) { echo ' style="display:block;"'; }; ?>>
        <h4 class="theme_option_headline2"><?php _e('Label of button', 'tcd-w'); ?></h4>
        <input id="dp_options[slider_button<?php echo $i; ?>]" class="regular-text" type="text" name="dp_options[slider_button<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_button'.$i] ); ?>" />
        <h4 class="theme_option_headline2"><?php _e('Color setting', 'tcd-w'); ?></h4>
        <ul class="headline_option">
         <li><label><?php _e('Font color', 'tcd-w'); ?></label><input type="text" id="slider_button_color<?php echo $i; ?>" name="dp_options[slider_button_color<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_button_color'.$i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_button_color'.$i]); ?>" /></li>
         <li><label><?php _e('Background color', 'tcd-w'); ?></label><input type="text" id="slider_button_bg_color<?php echo $i; ?>" name="dp_options[slider_button_bg_color<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_button_bg_color'.$i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_button_bg_color'.$i]); ?>" /></li>
         <li><label><?php _e('Border color', 'tcd-w'); ?></label><input type="text" id="slider_button_border_color<?php echo $i; ?>" name="dp_options[slider_button_border_color<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_button_border_color'.$i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_button_border_color'.$i]); ?>" /></li>
         <li><label><?php _e('Font hover color', 'tcd-w'); ?></label><input type="text" id="slider_button_color_hover<?php echo $i; ?>" name="dp_options[slider_button_color_hover<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_button_color_hover'.$i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_button_color_hover'.$i]); ?>" /></li>
         <li><label><?php _e('Background hover color', 'tcd-w'); ?></label><input type="text" id="slider_button_bg_color_hover<?php echo $i; ?>" name="dp_options[slider_button_bg_color_hover<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_button_bg_color_hover'.$i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_button_bg_color_hover'.$i]); ?>" /></li>
         <li><label><?php _e('Border hover color', 'tcd-w'); ?></label><input type="text" id="slider_button_border_color_hover<?php echo $i; ?>" name="dp_options[slider_button_border_color_hover<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['slider_button_border_color_hover'.$i] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_button_border_color_hover'.$i]); ?>" /></li>
        </ul>
       </div>
      </div>

      <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
     </div><!-- END .sub_box_content -->
    </div><!-- END .sub_box -->
    <?php endfor; ?>

    <h4 class="theme_option_headline2"><?php _e('Slider speed setting', 'tcd-w'); ?></h4>
    <select name="dp_options[slider_time]">
     <?php
          foreach ( $slider_time_options as $option ) :
            if ( $dp_options['slider_time'] == $option['value']) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
            echo '<option value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $option['label'] . '</option>' ."\n";
          endforeach;
     ?>
    </select>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div><!-- END .header_content_type1 -->

   <div class="theme_option_field cf header_content_type2" style="<?php if($dp_options['header_content_type'] == 'type2') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <h3 class="theme_option_headline"><?php _e('Video background setting', 'tcd-w'); ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Video file', 'tcd-w'); ?></h4>
    <div class="image_box cf">
     <div class="cf cf_video_field hide-if-no-js slider_video">
      <input type="hidden" value="<?php echo esc_attr( $dp_options['slider_video'] ); ?>" id="slider_video" name="dp_options[slider_video]" class="cf_media_id">
      <div class="preview_field"><?php if($dp_options['slider_video'] && wp_get_attachment_url($dp_options['slider_video'])){ echo '<p class="media_url">'.wp_get_attachment_url($dp_options['slider_video']).'</p>'; } ?></div>
      <div class="buttton_area">
       <input type="button" value="<?php _e('Select Video', 'tcd-w'); ?>" class="cfvf-select-video button">
       <input type="button" value="<?php _e('Remove Video', 'tcd-w'); ?>" class="cfvf-delete-video button <?php if(!$dp_options['slider_video']){ echo 'hidden'; }; ?>">
      </div>
     </div>
    </div>
    <h4 class="theme_option_headline2"><?php _e('Substitute image', 'tcd-w'); ?></h4>
    <p><?php _e( 'This image will be displayed instead of video in smartphone.<br /> Also this image will be displayed in the browser which video is not supported.', 'tcd-w' ); ?></p>
    <p><?php _e('Recommend image size. Width:1450px, Height:700px', 'tcd-w'); ?></p>
    <div class="image_box cf">
     <div class="cf cf_media_field hide-if-no-js slider_video_image">
      <input type="hidden" value="<?php echo esc_attr( $dp_options['slider_video_image'] ); ?>" id="slider_video_image" name="dp_options[slider_video_image]" class="cf_media_id">
      <div class="preview_field"><?php if($dp_options['slider_video_image']){ echo wp_get_attachment_image($dp_options['slider_video_image'], 'medium'); }; ?></div>
      <div class="buttton_area">
       <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
       <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['slider_video_image']){ echo 'hidden'; }; ?>">
      </div>
     </div>
    </div>
    <h4 class="theme_option_headline2"><?php _e('Caption setting', 'tcd-w'); ?></h4>
    <p class="use_slider_caption"><label><input id="dp_options[use_slider_video_caption]" name="dp_options[use_slider_video_caption]" type="checkbox" value="1" <?php checked( '1', $dp_options['use_slider_video_caption'] ); ?> /> <?php _e('Display caption.', 'tcd-w'); ?></label></p>
    <div class="slider_caption_setting"<?php if( $dp_options['use_slider_video_caption'] == 1 ) { echo ' style="display:block;"'; }; ?>>
     <h4 class="theme_option_headline2"><?php _e('Headline', 'tcd-w'); ?></h4>
     <textarea id="dp_options[slider_video_headline]" class="large-text" cols="50" rows="2" name="dp_options[slider_video_headline]"><?php echo esc_textarea( $dp_options['slider_video_headline'] ); ?></textarea>
     <ul class="headline_option">
      <li><label><?php _e('Font size', 'tcd-w'); ?></label><input id="dp_options[slider_video_headline_font_size]" class="font_size hankaku" type="text" name="dp_options[slider_video_headline_font_size]" value="<?php echo esc_attr( $dp_options['slider_video_headline_font_size'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Font size for mobile', 'tcd-w'); ?></label><input id="dp_options[slider_video_headline_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[slider_video_headline_font_size_mobile]" value="<?php echo esc_attr( $dp_options['slider_video_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Font color', 'tcd-w'); ?></label><input type="text" id="slider_video_headline_color" name="dp_options[slider_video_headline_color]" value="<?php echo esc_attr( $dp_options['slider_video_headline_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_video_headline_color']); ?>" /></li>
      <li><label><?php _e('Dropshadow position (left)', 'tcd-w'); ?></label><input id="dp_options[slider_video_headline_shadow_a]" class="font_size hankaku" type="text" name="dp_options[slider_video_headline_shadow_a]" value="<?php echo esc_attr( $dp_options['slider_video_headline_shadow_a'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Dropshadow position (top)', 'tcd-w'); ?></label><input id="dp_options[slider_video_headline_shadow_b]" class="font_size hankaku" type="text" name="dp_options[slider_video_headline_shadow_b]" value="<?php echo esc_attr( $dp_options['slider_video_headline_shadow_b'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Dropshadow size', 'tcd-w'); ?></label><input id="dp_options[slider_video_headline_shadow_c]" class="font_size hankaku" type="text" name="dp_options[slider_video_headline_shadow_c]" value="<?php echo esc_attr( $dp_options['slider_video_headline_shadow_c'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Dropshadow color', 'tcd-w'); ?></label><input type="text" id="slider_video_headline_shadow_color" name="dp_options[slider_video_headline_shadow_color]" value="<?php echo esc_attr( $dp_options['slider_video_headline_shadow_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_video_headline_shadow_color']); ?>" /></li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Catchphrase', 'tcd-w'); ?></h4>
     <textarea id="dp_options[slider_video_caption]" class="large-text" cols="50" rows="2" name="dp_options[slider_video_caption]"><?php echo esc_textarea( $dp_options['slider_video_caption'] ); ?></textarea>
     <ul class="headline_option">
      <li><label><?php _e('Font size', 'tcd-w'); ?></label><input id="dp_options[slider_video_caption_font_size]" class="font_size hankaku" type="text" name="dp_options[slider_video_caption_font_size]" value="<?php echo esc_attr( $dp_options['slider_video_caption_font_size'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Font size for mobile', 'tcd-w'); ?></label><input id="dp_options[slider_video_caption_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[slider_video_caption_font_size_mobile]" value="<?php echo esc_attr( $dp_options['slider_video_caption_font_size_mobile'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Font color', 'tcd-w'); ?></label><input type="text" id="slider_video_caption_color" name="dp_options[slider_video_caption_color]" value="<?php echo esc_attr( $dp_options['slider_video_caption_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_video_caption_color']); ?>" /></li>
      <li><label><?php _e('Dropshadow position (left)', 'tcd-w'); ?></label><input id="dp_options[slider_video_caption_shadow_a]" class="font_size hankaku" type="text" name="dp_options[slider_video_caption_shadow_a]" value="<?php echo esc_attr( $dp_options['slider_video_caption_shadow_a'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Dropshadow position (top)', 'tcd-w'); ?></label><input id="dp_options[slider_video_caption_shadow_b]" class="font_size hankaku" type="text" name="dp_options[slider_video_caption_shadow_b]" value="<?php echo esc_attr( $dp_options['slider_video_caption_shadow_b'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Dropshadow size', 'tcd-w'); ?></label><input id="dp_options[slider_video_caption_shadow_c]" class="font_size hankaku" type="text" name="dp_options[slider_video_caption_shadow_c]" value="<?php echo esc_attr( $dp_options['slider_video_caption_shadow_c'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Dropshadow color', 'tcd-w'); ?></label><input type="text" id="slider_video_caption_shadow_color" name="dp_options[slider_video_caption_shadow_color]" value="<?php echo esc_attr( $dp_options['slider_video_caption_shadow_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_video_caption_shadow_color']); ?>" /></li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Button setting', 'tcd-w'); ?></h4>
     <p class="show_slider_button"><label><input id="dp_options[show_slider_video_button]" name="dp_options[show_slider_video_button]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_slider_video_button'] ); ?> /> <?php _e('Display button.', 'tcd-w'); ?></label></p>
     <div class="slider_button_setting"<?php if( $dp_options['show_slider_video_button'] == 1 ) { echo ' style="display:block;"'; }; ?>>
      <h4 class="theme_option_headline2"><?php _e('Label of button', 'tcd-w'); ?></h4>
      <input id="dp_options[slider_video_button]" class="regular-text" type="text" name="dp_options[slider_video_button]" value="<?php echo esc_attr( $dp_options['slider_video_button'] ); ?>" />
      <h4 class="theme_option_headline2"><?php _e('Link URL', 'tcd-w'); ?></h4>
      <input id="dp_options[slider_video_button_url]" class="regular-text" type="text" name="dp_options[slider_video_button_url]" value="<?php echo esc_attr( $dp_options['slider_video_button_url'] ); ?>" />
      <p><label><input id="dp_options[slider_video_button_target]" name="dp_options[slider_video_button_target]" type="checkbox" value="1" <?php checked( '1', $dp_options['slider_video_button_target'] ); ?> /> <?php _e('Open link in new window', 'tcd-w'); ?></label></p>
      <h4 class="theme_option_headline2"><?php _e('Color setting', 'tcd-w'); ?></h4>
      <ul class="headline_option">
       <li><label><?php _e('Font color', 'tcd-w'); ?></label><input type="text" id="slider_video_button_color" name="dp_options[slider_video_button_color]" value="<?php echo esc_attr( $dp_options['slider_video_button_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_video_button_color']); ?>" /></li>
       <li><label><?php _e('Background color', 'tcd-w'); ?></label><input type="text" id="slider_video_button_bg_color" name="dp_options[slider_video_button_bg_color]" value="<?php echo esc_attr( $dp_options['slider_video_button_bg_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_video_button_bg_color']); ?>" /></li>
       <li><label><?php _e('Border color', 'tcd-w'); ?></label><input type="text" id="slider_video_button_border_color" name="dp_options[slider_video_button_border_color]" value="<?php echo esc_attr( $dp_options['slider_video_button_border_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_video_button_border_color']); ?>" /></li>
       <li><label><?php _e('Font hover color', 'tcd-w'); ?></label><input type="text" id="slider_video_button_color_hover" name="dp_options[slider_video_button_color_hover]" value="<?php echo esc_attr( $dp_options['slider_video_button_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_video_button_color_hover']); ?>" /></li>
       <li><label><?php _e('Background hover color', 'tcd-w'); ?></label><input type="text" id="slider_video_button_bg_color_hover" name="dp_options[slider_video_button_bg_color_hover]" value="<?php echo esc_attr( $dp_options['slider_video_button_bg_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_video_button_bg_color_hover']); ?>" /></li>
       <li><label><?php _e('Border hover color', 'tcd-w'); ?></label><input type="text" id="slider_video_button_border_color_hover" name="dp_options[slider_video_button_border_color_hover]" value="<?php echo esc_attr( $dp_options['slider_video_button_border_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_video_button_border_color_hover']); ?>" /></li>
      </ul>
     </div>
    </div>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div><!-- END .header_content_type2 -->

   <div class="theme_option_field cf header_content_type3" style="<?php if($dp_options['header_content_type'] == 'type3') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
    <h3 class="theme_option_headline"><?php _e('Youtube background setting', 'tcd-w'); ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Youtube url', 'tcd-w'); ?></h4>
    <p><input id="dp_options[slider_youtube_url]" type="text" name="dp_options[slider_youtube_url]" value="<?php echo esc_attr( $dp_options['slider_youtube_url'] ); ?>" class="large-text" /></p>
    <h4 class="theme_option_headline2"><?php _e('Substitute image', 'tcd-w'); ?></h4>
    <p><?php _e( 'This image will be displayed instead of Youtube video in smartphone.', 'tcd-w' ); ?></p>
    <p><?php _e('Recommend image size. Width:1450px, Height:700px', 'tcd-w'); ?></p>
    <div class="image_box cf">
     <div class="cf cf_media_field hide-if-no-js slider_youtube_image">
      <input type="hidden" value="<?php echo esc_attr( $dp_options['slider_youtube_image'] ); ?>" id="slider_youtube_image" name="dp_options[slider_youtube_image]" class="cf_media_id">
      <div class="preview_field"><?php if($dp_options['slider_youtube_image']){ echo wp_get_attachment_image($dp_options['slider_youtube_image'], 'medium'); }; ?></div>
      <div class="buttton_area">
       <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
       <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['slider_youtube_image']){ echo 'hidden'; }; ?>">
      </div>
     </div>
    </div>
    <h4 class="theme_option_headline2"><?php _e('Caption setting', 'tcd-w'); ?></h4>
    <p class="use_slider_caption"><label><input id="dp_options[use_slider_youtube_caption]" name="dp_options[use_slider_youtube_caption]" type="checkbox" value="1" <?php checked( '1', $dp_options['use_slider_youtube_caption'] ); ?> /> <?php _e('Display caption.', 'tcd-w'); ?></label></p>
    <div class="slider_caption_setting"<?php if( $dp_options['use_slider_youtube_caption'] == 1 ) { echo ' style="display:block;"'; }; ?>>
     <h4 class="theme_option_headline2"><?php _e('Headline', 'tcd-w'); ?></h4>
     <textarea id="dp_options[slider_youtube_headline]" class="large-text" cols="50" rows="2" name="dp_options[slider_youtube_headline]"><?php echo esc_textarea( $dp_options['slider_youtube_headline'] ); ?></textarea>
     <ul class="headline_option">
      <li><label><?php _e('Font size', 'tcd-w'); ?></label><input id="dp_options[slider_youtube_headline_font_size]" class="font_size hankaku" type="text" name="dp_options[slider_youtube_headline_font_size]" value="<?php echo esc_attr( $dp_options['slider_youtube_headline_font_size'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Font size for mobile', 'tcd-w'); ?></label><input id="dp_options[slider_youtube_headline_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[slider_youtube_headline_font_size_mobile]" value="<?php echo esc_attr( $dp_options['slider_youtube_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Font color', 'tcd-w'); ?></label><input type="text" id="slider_youtube_headline_color" name="dp_options[slider_youtube_headline_color]" value="<?php echo esc_attr( $dp_options['slider_youtube_headline_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_youtube_headline_color']); ?>" /></li>
      <li><label><?php _e('Dropshadow position (left)', 'tcd-w'); ?></label><input id="dp_options[slider_youtube_headline_shadow_a]" class="font_size hankaku" type="text" name="dp_options[slider_youtube_headline_shadow_a]" value="<?php echo esc_attr( $dp_options['slider_youtube_headline_shadow_a'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Dropshadow position (top)', 'tcd-w'); ?></label><input id="dp_options[slider_youtube_headline_shadow_b]" class="font_size hankaku" type="text" name="dp_options[slider_youtube_headline_shadow_b]" value="<?php echo esc_attr( $dp_options['slider_youtube_headline_shadow_b'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Dropshadow size', 'tcd-w'); ?></label><input id="dp_options[slider_youtube_headline_shadow_c]" class="font_size hankaku" type="text" name="dp_options[slider_youtube_headline_shadow_c]" value="<?php echo esc_attr( $dp_options['slider_youtube_headline_shadow_c'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Dropshadow color', 'tcd-w'); ?></label><input type="text" id="slider_youtube_headline_shadow_color" name="dp_options[slider_youtube_headline_shadow_color]" value="<?php echo esc_attr( $dp_options['slider_youtube_headline_shadow_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_youtube_headline_shadow_color']); ?>" /></li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Catchphrase', 'tcd-w'); ?></h4>
     <textarea id="dp_options[slider_youtube_caption]" class="large-text" cols="50" rows="2" name="dp_options[slider_youtube_caption]"><?php echo esc_textarea( $dp_options['slider_youtube_caption'] ); ?></textarea>
     <ul class="headline_option">
      <li><label><?php _e('Font size', 'tcd-w'); ?></label><input id="dp_options[slider_youtube_caption_font_size]" class="font_size hankaku" type="text" name="dp_options[slider_youtube_caption_font_size]" value="<?php echo esc_attr( $dp_options['slider_youtube_caption_font_size'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Font size for mobile', 'tcd-w'); ?></label><input id="dp_options[slider_youtube_caption_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[slider_youtube_caption_font_size_mobile]" value="<?php echo esc_attr( $dp_options['slider_youtube_caption_font_size_mobile'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Font color', 'tcd-w'); ?></label><input type="text" id="slider_youtube_caption_color" name="dp_options[slider_youtube_caption_color]" value="<?php echo esc_attr( $dp_options['slider_youtube_caption_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_youtube_caption_color']); ?>" /></li>
      <li><label><?php _e('Dropshadow position (left)', 'tcd-w'); ?></label><input id="dp_options[slider_youtube_caption_shadow_a]" class="font_size hankaku" type="text" name="dp_options[slider_youtube_caption_shadow_a]" value="<?php echo esc_attr( $dp_options['slider_youtube_caption_shadow_a'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Dropshadow position (top)', 'tcd-w'); ?></label><input id="dp_options[slider_youtube_caption_shadow_b]" class="font_size hankaku" type="text" name="dp_options[slider_youtube_caption_shadow_b]" value="<?php echo esc_attr( $dp_options['slider_youtube_caption_shadow_b'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Dropshadow size', 'tcd-w'); ?></label><input id="dp_options[slider_youtube_caption_shadow_c]" class="font_size hankaku" type="text" name="dp_options[slider_youtube_caption_shadow_c]" value="<?php echo esc_attr( $dp_options['slider_youtube_caption_shadow_c'] ); ?>" /><span>px</span></li>
      <li><label><?php _e('Dropshadow color', 'tcd-w'); ?></label><input type="text" id="slider_youtube_caption_shadow_color" name="dp_options[slider_youtube_caption_shadow_color]" value="<?php echo esc_attr( $dp_options['slider_youtube_caption_shadow_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_youtube_caption_shadow_color']); ?>" /></li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Button setting', 'tcd-w'); ?></h4>
     <p class="show_slider_button"><label><input id="dp_options[show_slider_youtube_button]" name="dp_options[show_slider_youtube_button]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_slider_youtube_button'] ); ?> /> <?php _e('Display button.', 'tcd-w'); ?></label></p>
     <div class="slider_button_setting"<?php if( $dp_options['show_slider_youtube_button'] == 1 ) { echo ' style="display:block;"'; }; ?>>
      <h4 class="theme_option_headline2"><?php _e('Label of button', 'tcd-w'); ?></h4>
      <input id="dp_options[slider_youtube_button]" class="regular-text" type="text" name="dp_options[slider_youtube_button]" value="<?php echo esc_attr( $dp_options['slider_youtube_button'] ); ?>" />
      <h4 class="theme_option_headline2"><?php _e('Link URL', 'tcd-w'); ?></h4>
      <input id="dp_options[slider_youtube_button_url]" class="regular-text" type="text" name="dp_options[slider_youtube_button_url]" value="<?php echo esc_attr( $dp_options['slider_youtube_button_url'] ); ?>" />
      <p><label><input id="dp_options[slider_youtube_button_target]" name="dp_options[slider_youtube_button_target]" type="checkbox" value="1" <?php checked( '1', $dp_options['slider_youtube_button_target'] ); ?> /> <?php _e('Open link in new window', 'tcd-w'); ?></label></p>
      <h4 class="theme_option_headline2"><?php _e('Color setting', 'tcd-w'); ?></h4>
      <ul class="headline_option">
       <li><label><?php _e('Font color', 'tcd-w'); ?></label><input type="text" id="slider_youtube_button_color" name="dp_options[slider_youtube_button_color]" value="<?php echo esc_attr( $dp_options['slider_youtube_button_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_youtube_button_color']); ?>" /></li>
       <li><label><?php _e('Background color', 'tcd-w'); ?></label><input type="text" id="slider_youtube_button_bg_color" name="dp_options[slider_youtube_button_bg_color]" value="<?php echo esc_attr( $dp_options['slider_youtube_button_bg_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_youtube_button_bg_color']); ?>" /></li>
       <li><label><?php _e('Border color', 'tcd-w'); ?></label><input type="text" id="slider_youtube_button_border_color" name="dp_options[slider_youtube_button_border_color]" value="<?php echo esc_attr( $dp_options['slider_youtube_button_border_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_youtube_button_border_color']); ?>" /></li>
       <li><label><?php _e('Font hover color', 'tcd-w'); ?></label><input type="text" id="slider_youtube_button_color_hover" name="dp_options[slider_youtube_button_color_hover]" value="<?php echo esc_attr( $dp_options['slider_youtube_button_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_youtube_button_color_hover']); ?>" /></li>
       <li><label><?php _e('Background hover color', 'tcd-w'); ?></label><input type="text" id="slider_youtube_button_bg_color_hover" name="dp_options[slider_youtube_button_bg_color_hover]" value="<?php echo esc_attr( $dp_options['slider_youtube_button_bg_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_youtube_button_bg_color_hover']); ?>" /></li>
       <li><label><?php _e('Border hover color', 'tcd-w'); ?></label><input type="text" id="slider_youtube_button_border_color_hover" name="dp_options[slider_youtube_button_border_color_hover]" value="<?php echo esc_attr( $dp_options['slider_youtube_button_border_color_hover'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['slider_youtube_button_border_color_hover']); ?>" /></li>
      </ul>
     </div>
    </div>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div><!-- END .header_content_type3 -->

   <?php // お知らせ・ニュースティッカー ----------------------------------------------------- ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('News content (News ticker)', 'tcd-w'); ?></h3>
    <p><label><input id="dp_options[show_index_news]" name="dp_options[show_index_news]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_index_news'] ); ?> /> <?php _e('Display this content at top page', 'tcd-w'); ?></label></p>
    <h4 class="theme_option_headline2"><?php _e('News date', 'tcd-w'); ?></h4>
    <p><label><input id="dp_options[show_index_news_date]" name="dp_options[show_index_news_date]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_index_news_date'] ); ?> /> <?php _e('Display date', 'tcd-w'); ?></label></p>
    <h4 class="theme_option_headline2"><?php _e('Post number', 'tcd-w'); ?></h4>
    <select name="dp_options[index_news_num]">
     <?php
       foreach ( $post_num_options as $option ) :
         if ( $dp_options['index_news_num'] == $option['value'] ) {
           $selected = 'selected="selected"';
         } else {
           $selected = '';
         }
         echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $option['label'] . '</option>' ."\n";
       endforeach;
     ?>
    </select>
    <h4 class="theme_option_headline2"><?php _e('Link for news archive page', 'tcd-w'); ?></h4>
    <p><label><input id="dp_options[show_index_news_archive_link]" name="dp_options[show_index_news_archive_link]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_index_news_archive_link'] ); ?> /> <?php _e('Display link for news archive page', 'tcd-w'); ?></label></p>
    <h5 class="theme_option_headline3"><?php _e('Label for this Link', 'tcd-w'); ?></h5>
    <input id="dp_options[index_news_archive_link_text]" class="regular-text" type="text" name="dp_options[index_news_archive_link_text]" value="<?php echo esc_attr( $dp_options['index_news_archive_link_text'] ); ?>" />
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // モバイルお知らせ ----------------------------------------------------- ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('News content for mobile', 'tcd-w'); ?></h3>
    <p><label><input id="dp_options[show_index_news_mobile]" name="dp_options[show_index_news_mobile]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_index_news_mobile'] ); ?> /> <?php _e('Display this content at top page', 'tcd-w'); ?></label></p>
    <h4 class="theme_option_headline2"><?php _e('News date', 'tcd-w'); ?></h4>
    <p><label><input id="dp_options[show_index_news_date_mobile]" name="dp_options[show_index_news_date_mobile]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_index_news_date_mobile'] ); ?> /> <?php _e('Display date', 'tcd-w'); ?></label></p>
    <h4 class="theme_option_headline2"><?php _e('Post number', 'tcd-w'); ?></h4>
    <select name="dp_options[index_news_num_mobile]">
     <?php
       foreach ( $post_num_options as $option ) :
         if ( $dp_options['index_news_num_mobile'] == $option['value'] ) {
           $selected = 'selected="selected"';
         } else {
           $selected = '';
         }
         echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $option['label'] . '</option>' ."\n";
       endforeach;
     ?>
    </select>
    <h4 class="theme_option_headline2"><?php _e('Link for news archive page', 'tcd-w'); ?></h4>
    <p><label><input id="dp_options[show_index_news_archive_link_mobile]" name="dp_options[show_index_news_archive_link_mobile]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_index_news_archive_link_mobile'] ); ?> /> <?php _e('Display link for news archive page', 'tcd-w'); ?></label></p>
    <h5 class="theme_option_headline3"><?php _e('Label for this Link', 'tcd-w'); ?></h5>
    <input id="dp_options[index_news_archive_link_text_mobile]" class="regular-text" type="text" name="dp_options[index_news_archive_link_text_mobile]" value="<?php echo esc_attr( $dp_options['index_news_archive_link_text_mobile'] ); ?>" />
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // コンテンツビルダー ----------------------------------------------------- ?>
   <?php cb_inputs(); ?>

  </div><!-- END #tab-content3 -->




  <!-- #tab-content4 ブログコンテンツ　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
  <div id="tab-content4">

   <?php // ブログの設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Blog setting', 'tcd-w'); ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Breadcrumb label', 'tcd-w'); ?></h4>
    <input id="dp_options[blog_breadcrumb_label]" class="regular-text" type="text" name="dp_options[blog_breadcrumb_label]" value="<?php echo esc_attr( $dp_options['blog_breadcrumb_label'] ); ?>" />
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // カテゴリーの設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Category setting', 'tcd-w'); ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Category setting', 'tcd-w'); ?></h4>
    <ul>
     <li>
      <span class="label"><?php printf(__('%s label', 'tcd-w'), __('Category', 'tcd-w')); ?></span>
      <input type="text" id="dp_options[category_label]" name="dp_options[category_label]" value="<?php echo esc_attr( $dp_options['category_label'] ); ?>" />
     </li>
     <li>
      <span class="label"><?php printf(__('%s color', 'tcd-w'), __('Category', 'tcd-w')); ?></span>
      <input type="text" id="category_color" name="dp_options[category_color]" value="<?php echo esc_attr( $dp_options['category_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['category_color']); ?>" />
     </li>
    </ul>
    <h4 class="theme_option_headline2"><?php printf(__('%s setting', 'tcd-w'), __('Category', 'tcd-w').'2'); ?></h4>
    <ul>
     <li><label><input id="dp_options[use_category2]" name="dp_options[use_category2]" type="checkbox" value="1" <?php checked( '1', $dp_options['use_category2'] ); ?> /> <?php printf(__('use %s', 'tcd-w'), __('Category', 'tcd-w').'2'); ?></label></li>
     <li>
      <span class="label"><?php printf(__('%s label', 'tcd-w'), __('Category', 'tcd-w').'2'); ?></span>
      <input type="text" id="dp_options[category2_label]" name="dp_options[category2_label]" value="<?php echo esc_attr( $dp_options['category2_label'] ); ?>" />
     </li>
     <li>
      <span class="label"><?php printf(__('%s slug', 'tcd-w'), __('Category', 'tcd-w').'2'); ?></span>
      <input type="text" id="dp_options[category2_slug]" name="dp_options[category2_slug]" value="<?php echo esc_attr( $dp_options['category2_slug'] ); ?>" />
     </li>
     <li>
      <span class="label"><?php printf(__('%s color', 'tcd-w'), __('Category', 'tcd-w').'2'); ?></span>
      <input type="text" id="category2_color" name="dp_options[category2_color]" value="<?php echo esc_attr( $dp_options['category2_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['category2_color']); ?>" />
     </li>
    </ul>
    <h4 class="theme_option_headline2"><?php printf(__('%s setting', 'tcd-w'), __('Category', 'tcd-w').'3'); ?></h4>
    <ul>
     <li><label><input id="dp_options[use_category3]" name="dp_options[use_category3]" type="checkbox" value="1" <?php checked( '1', $dp_options['use_category3'] ); ?> /> <?php printf(__('use %s', 'tcd-w'), __('Category', 'tcd-w').'3'); ?></label></li>
     <li>
      <span class="label"><?php printf(__('%s label', 'tcd-w'), __('Category', 'tcd-w').'3'); ?></span>
      <input type="text" id="dp_options[category3_label]" name="dp_options[category3_label]" value="<?php echo esc_attr( $dp_options['category3_label'] ); ?>" />
     </li>
     <li>
      <span class="label"><?php printf(__('%s slug', 'tcd-w'), __('Category', 'tcd-w').'3'); ?></span>
      <input type="text" id="dp_options[category3_slug]" name="dp_options[category3_slug]" value="<?php echo esc_attr( $dp_options['category3_slug'] ); ?>" />
     </li>
     <li>
      <span class="label"><?php printf(__('%s color', 'tcd-w'), __('Category', 'tcd-w').'3'); ?></span>
      <input type="text" id="category3_color" name="dp_options[category3_color]" value="<?php echo esc_attr( $dp_options['category3_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['category3_color']); ?>" />
     </li>
    </ul>
    <p><strong><?php _e('Existing categories will not be visible if you change the slug.', 'tcd-w'); ?></strong></p>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // アーカイブページの設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Archive page setting', 'tcd-w'); ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Archive page headline', 'tcd-w'); ?></h4>
    <input id="dp_options[blog_archive_headline]" class="regular-text" type="text" name="dp_options[blog_archive_headline]" value="<?php echo esc_attr( $dp_options['blog_archive_headline'] ); ?>" />
    <ul class="headline_option">
     <li><label><?php _e( 'Font size', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[blog_archive_headline_font_size]" value="<?php echo esc_attr( $dp_options['blog_archive_headline_font_size'] ); ?>" /><span>px</span></li>
     <li><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[blog_archive_headline_font_size_mobile]" value="<?php echo esc_attr( $dp_options['blog_archive_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
    </ul>
    <h4 class="theme_option_headline2"><?php _e('Archive page description', 'tcd-w'); ?></h4>
    <textarea id="dp_options[blog_archive_desc]" class="large-text" cols="50" rows="3" name="dp_options[blog_archive_desc]"><?php echo esc_textarea( $dp_options['blog_archive_desc'] ); ?></textarea>
    <ul class="headline_option">
     <li><label><?php _e( 'Font size', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[blog_archive_desc_font_size]" value="<?php echo esc_attr( $dp_options['blog_archive_desc_font_size'] ); ?>" /><span>px</span></li>
     <li><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[blog_archive_desc_font_size_mobile]" value="<?php echo esc_attr( $dp_options['blog_archive_desc_font_size_mobile'] ); ?>" /><span>px</span></li>
    </ul>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // フォントサイズ ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Font size for post page', 'tcd-w'); ?></h3>
    <p><?php _e('Settings for font size of text in post page', 'tcd-w'); ?></p>
    <h4 class="theme_option_headline2"><?php _e('Font size of post title', 'tcd-w'); ?></h4>
    <input id="dp_options[title_font_size]" class="font_size hankaku" type="text" name="dp_options[title_font_size]" value="<?php echo esc_attr( $dp_options['title_font_size'] ); ?>" /><span>px</span>
    <h4 class="theme_option_headline2"><?php _e('Font size of post contents', 'tcd-w'); ?></h4>
    <input id="dp_options[content_font_size]" class="font_size hankaku" type="text" name="dp_options[content_font_size]" value="<?php echo esc_attr( $dp_options['content_font_size'] ); ?>" /><span>px</span>
    <h4 class="theme_option_headline2"><?php _e('Font size of post title for mobie', 'tcd-w'); ?></h4>
    <input id="dp_options[title_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[title_font_size_mobile]" value="<?php echo esc_attr( $dp_options['title_font_size_mobile'] ); ?>" /><span>px</span>
    <h4 class="theme_option_headline2"><?php _e('Font size of post contents for mobile', 'tcd-w'); ?></h4>
    <input id="dp_options[content_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[content_font_size_mobile]" value="<?php echo esc_attr( $dp_options['content_font_size_mobile'] ); ?>" /><span>px</span>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // 投稿者名・タグ・コメント ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Display setting', 'tcd-w'); ?></h3>
    <p><?php _e('Settings for miscs', 'tcd-w'); ?></p>
    <h4 class="theme_option_headline2"><?php _e('Settings for front page, archive page and post page', 'tcd-w'); ?></h4>
    <ul>
     <li>
      <span class="label"><?php _e('Display categories', 'tcd-w'); ?></span>
      <select name="dp_options[show_categories]">
       <option value=""><?php _e('Not display', 'tcd-w'); ?></option>
       <?php
         $categories_options = array(
           '1' => $dp_options['category_label'],
           '1-2' => array( $dp_options['category_label'], $dp_options['category2_label'] ),
           '1-2-3' => array( $dp_options['category_label'], $dp_options['category2_label'], $dp_options['category3_label'] ),
           '1-3' => array( $dp_options['category_label'], $dp_options['category3_label'] ),
           '1-3-2' => array( $dp_options['category_label'], $dp_options['category3_label'], $dp_options['category2_label'] ),
           '2' => $dp_options['category2_label'],
           '2-1' => array( $dp_options['category2_label'], $dp_options['category_label'] ),
           '2-1-3' => array( $dp_options['category2_label'], $dp_options['category_label'], __('Category', 'tcd-w').'3' ),
           '2-3' => array( $dp_options['category2_label'], __('Category', 'tcd-w').'3' ),
           '2-3-1' => array( $dp_options['category2_label'], $dp_options['category3_label'], $dp_options['category_label'] ),
           '3' => __('Category', 'tcd-w').'3',
           '3-1' => array( $dp_options['category3_label'], __('Category', 'tcd-w').'1' ),
           '3-1-2' => array( $dp_options['category3_label'], $dp_options['category_label'], $dp_options['category2_label'] ),
           '3-2' => array( $dp_options['category3_label'], $dp_options['category2_label'] ),
           '3-2-1' => array( $dp_options['category3_label'], $dp_options['category2_label'], $dp_options['category_label'] )
         );
         foreach ( $categories_options as $key => $value ) :
           if ( $dp_options['show_categories'] == $key ) {
             $selected = 'selected="selected"';
           } else {
             $selected = '';
           }
           echo '<option value="' . esc_attr( $key ) . '" ' . $selected . '>' . esc_html( implode( ', ', (array) $value ) ) . '</option>' ."\n";
         endforeach;
       ?>
      </select>
     </li>
     <li><label><input id="dp_options[show_date]" name="dp_options[show_date]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_date'] ); ?> /> <?php _e('Display date', 'tcd-w'); ?></label></li>
    </ul>
    <h4 class="theme_option_headline2"><?php _e('Settings for post page', 'tcd-w'); ?></h4>
    <ul>
     <li><label><input id="dp_options[show_tag]" name="dp_options[show_tag]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_tag'] ); ?> /> <?php _e('Display tags', 'tcd-w'); ?></label></li>
     <li><label><input id="dp_options[show_author]" name="dp_options[show_author]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_author'] ); ?> /> <?php _e('Display author', 'tcd-w'); ?></label></li>
     <li><label><input id="dp_options[show_thumbnail]" name="dp_options[show_thumbnail]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_thumbnail'] ); ?> /> <?php _e('Display thumbnail', 'tcd-w'); ?></label></li>
     <li><label><input id="dp_options[show_next_post]" name="dp_options[show_next_post]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_next_post'] ); ?> /> <?php _e('Display next previous post link', 'tcd-w'); ?></label></li>
     <li><label><input id="dp_options[show_comment]" name="dp_options[show_comment]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_comment'] ); ?> /> <?php _e('Display comment', 'tcd-w'); ?></label></li>
     <li><label><input id="dp_options[show_trackback]" name="dp_options[show_trackback]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_trackback'] ); ?> /> <?php _e('Display trackbacks', 'tcd-w'); ?></label></li>
     <li><label><input id="dp_options[show_modified_date]" name="dp_options[show_modified_date]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_modified_date'] ); ?> /> <?php _e('Display last modified date', 'tcd-w'); ?></label></li>
    </ul>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // 関連記事の設定  ------------------------------------------------------------------ ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Related posts setting', 'tcd-w'); ?></h3>
    <p><?php _e('Related posts will be displayed at the bottom of post page.','tcd-w'); ?></p>
    <p><label><input id="dp_options[show_related_post]" name="dp_options[show_related_post]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_related_post'] ); ?> /> <?php _e('Display related post', 'tcd-w'); ?></label></p>
    <h4 class="theme_option_headline2"><?php _e('Headline of related posts', 'tcd-w'); ?></h4>
    <input id="dp_options[related_post_headline]" class="regular-text" type="text" name="dp_options[related_post_headline]" value="<?php echo esc_attr( $dp_options['related_post_headline'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Number of related posts', 'tcd-w'); ?></h4>
    <select name="dp_options[related_post_num]">
     <?php
       foreach ( $post_num3_options as $option ) :
         if ( $dp_options['related_post_num'] == $option['value'] ) {
           $selected = 'selected="selected"';
         } else {
           $selected = '';
         }
         echo '<option value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $option['label'] . '</option>' ."\n";
       endforeach;
     ?>
    </select>
   </div>

   <?php // NEWソーシャルボタン  ------------------------------------------------------------------ ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Social button Setup', 'tcd-w'); ?></h3>
    <p><?php _e('Settings for social buttons displayed at post page', 'tcd-w'); ?></p>
    <div class="theme_option_input">
     <h4 class="theme_option_headline2"><?php _e('Set of articles top buttons', 'tcd-w'); ?></h4>
     <label><input id="dp_options[show_sns_top]" name="dp_options[show_sns_top]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_sns_top'] ); ?> /> <?php _e('Buttons to the article top', 'tcd-w'); ?></label>
     <h4 class="theme_option_headline2"><?php _e('Type of button on article top', 'tcd-w'); ?></h4>
     <fieldset class="cf">
      <ul class="cf">
       <?php
         foreach ( $sns_type_top_options as $option ) {
           if ( $dp_options['sns_type_top'] == $option['value'] ) {
             $checked = "checked=\"checked\"";
           } else {
             $checked = '';
           }
       ?>
       <li>
        <label>
         <input type="radio" name="dp_options[sns_type_top]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
         <?php echo $option['label']; ?>
        </label>
       </li>
       <?php
         }
       ?>
      </ul>
     </fieldset>
     <h4 class="theme_option_headline2"><?php _e('Select the social button to show on article top', 'tcd-w'); ?></h4>
     <ul>
      <li><label><input id="dp_options[show_twitter_top]" name="dp_options[show_twitter_top]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_twitter_top'] ); ?> /> <?php _e('Display twitter button', 'tcd-w'); ?></label></li>
      <li><label><input id="dp_options[show_fblike_top]" name="dp_options[show_fblike_top]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_fblike_top'] ); ?> /> <?php _e('Display facebook like button -Button type 5 (Default button) only', 'tcd-w'); ?></label></li>
      <li><label><input id="dp_options[show_fbshare_top]" name="dp_options[show_fbshare_top]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_fbshare_top'] ); ?> /> <?php _e('Display facebook share button', 'tcd-w'); ?></label></li>
      <li><label><input id="dp_options[show_google_top]" name="dp_options[show_google_top]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_google_top'] ); ?> /> <?php _e('Display google+ button', 'tcd-w'); ?></label></li>
      <li><label><input id="dp_options[show_hatena_top]" name="dp_options[show_hatena_top]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_hatena_top'] ); ?> /> <?php _e('Display hatena button', 'tcd-w'); ?></label></li>
      <li><label><input id="dp_options[show_pocket_top]" name="dp_options[show_pocket_top]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_pocket_top'] ); ?> /> <?php _e('Display pocket button', 'tcd-w'); ?></label></li>
      <li><label><input id="dp_options[show_feedly_top]" name="dp_options[show_feedly_top]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_feedly_top'] ); ?> /> <?php _e('Display feedly button', 'tcd-w'); ?></label></li>
      <li><label><input id="dp_options[show_rss_top]" name="dp_options[show_rss_top]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_rss_top'] ); ?> /> <?php _e('Display rss button', 'tcd-w'); ?></label></li>
      <li><label><input id="dp_options[show_pinterest_top]" name="dp_options[show_pinterest_top]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_pinterest_top'] ); ?> /> <?php _e('Display pinterest button', 'tcd-w'); ?></label></li>
     </ul>

     <hr />

     <h4 class="theme_option_headline2"><?php _e('Set of articles bottom buttons', 'tcd-w'); ?></h4>
     <label><input id="dp_options[show_sns_btm]" name="dp_options[show_sns_btm]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_sns_btm'] ); ?> /> <?php _e('Buttons to the article bottom', 'tcd-w'); ?></label>
     <h4 class="theme_option_headline2"><?php _e('Type of button on article bottom', 'tcd-w'); ?></h4>
     <fieldset class="cf">
      <ul class="cf">
       <?php
         foreach ( $sns_type_btm_options as $option ) {
           if ( $dp_options['sns_type_btm'] == $option['value'] ) {
            $checked = "checked=\"checked\"";
           } else {
            $checked = '';
           }
       ?>
       <li>
        <label>
         <input type="radio" name="dp_options[sns_type_btm]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
         <?php echo $option['label']; ?>
        </label>
       </li>
       <?php
         }
       ?>
      </ul>
     </fieldset>

     <h4 class="theme_option_headline2"><?php _e('Select the social button to show on article bottom', 'tcd-w'); ?></h4>
     <ul>
      <li><label><input id="dp_options[show_twitter_btm]" name="dp_options[show_twitter_btm]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_twitter_btm'] ); ?> /> <?php _e('Display twitter button', 'tcd-w'); ?></label></li>
      <li><label><input id="dp_options[show_fblike_btm]" name="dp_options[show_fblike_btm]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_fblike_btm'] ); ?> /> <?php _e('Display facebook like button-Button type 5 (Default button) only', 'tcd-w'); ?></label></li>
      <li><label><input id="dp_options[show_fbshare_btm]" name="dp_options[show_fbshare_btm]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_fbshare_btm'] ); ?> /> <?php _e('Display facebook share button', 'tcd-w'); ?></label></li>
      <li><label><input id="dp_options[show_google_btm]" name="dp_options[show_google_btm]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_google_btm'] ); ?> /> <?php _e('Display google+ button', 'tcd-w'); ?></label></li>
      <li><label><input id="dp_options[show_hatena_btm]" name="dp_options[show_hatena_btm]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_hatena_btm'] ); ?> /> <?php _e('Display hatena button', 'tcd-w'); ?></label></li>
      <li><label><input id="dp_options[show_pocket_btm]" name="dp_options[show_pocket_btm]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_pocket_btm'] ); ?> /> <?php _e('Display pocket button', 'tcd-w'); ?></label></li>
      <li><label><input id="dp_options[show_feedly_btm]" name="dp_options[show_feedly_btm]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_feedly_btm'] ); ?> /> <?php _e('Display feedly button', 'tcd-w'); ?></label></li>
      <li><label><input id="dp_options[show_rss_btm]" name="dp_options[show_rss_btm]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_rss_btm'] ); ?> /> <?php _e('Display rss button', 'tcd-w'); ?></label></li>
      <li><label><input id="dp_options[show_pinterest_btm]" name="dp_options[show_pinterest_btm]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_pinterest_btm'] ); ?> /> <?php _e('Display pinterest button', 'tcd-w'); ?></label></li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Setting for the twitter button', 'tcd-w'); ?></h4>
     <label style="margin-top:20px;"><?php _e('Set of twitter account. (ex.designplus)', 'tcd-w'); ?></label>
     <input style="display:block; margin:.6em 0 1em;" id="dp_options[twitter_info]" class="regular-text" type="text" name="dp_options[twitter_info]" value="<?php echo esc_attr( $dp_options['twitter_info'] ); ?>" />
    </div>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

  <?php // 広告の登録1 -------------------------------------------------------------------------------------------- ?>
  <div class="theme_option_field cf">
   <h3 class="theme_option_headline"><?php _e('Single page banner setup', 'tcd-w'); ?>1</h3>
   <p><?php _e('This banner will be displayed next to the title of the page.', 'tcd-w'); ?></p>
   <div class="sub_box cf">
    <h3 class="theme_option_subbox_headline"><?php _e('Left banner', 'tcd-w'); ?></h3>
    <div class="sub_box_content">
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w'); ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w'); ?></p>
      <textarea id="dp_options[single_ad_code5]" class="large-text" cols="50" rows="10" name="dp_options[single_ad_code5]"><?php echo esc_textarea( $dp_options['single_ad_code5'] ); ?></textarea>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w'); ?></p>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); _e('Recommend size. Width:300px Height:250px', 'tcd-w'); ?></h4>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js single_ad_image5">
        <input type="hidden" value="<?php echo esc_attr( $dp_options['single_ad_image5'] ); ?>" id="single_ad_image5" name="dp_options[single_ad_image5]" class="cf_media_id">
        <div class="preview_field"><?php if($dp_options['single_ad_image5']){ echo wp_get_attachment_image($dp_options['single_ad_image5'], 'medium'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['single_ad_image5']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
     </div>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w'); ?></h4>
      <input id="dp_options[single_ad_url5]" class="large-text" type="text" name="dp_options[single_ad_url5]" value="<?php echo esc_attr( $dp_options['single_ad_url5'] ); ?>" />
      <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
     </div>
    </div><!-- END .sub_box_content -->
   </div><!-- END .sub_box -->
   <div class="sub_box cf">
    <h3 class="theme_option_subbox_headline"><?php _e('Right banner', 'tcd-w'); ?></h3>
    <div class="sub_box_content">
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w'); ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w'); ?></p>
      <textarea id="dp_options[single_ad_code6]" class="large-text" cols="50" rows="10" name="dp_options[single_ad_code6]"><?php echo esc_textarea( $dp_options['single_ad_code6'] ); ?></textarea>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w'); ?></p>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); _e('Recommend size. Width:300px Height:250px', 'tcd-w'); ?></h4>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js single_ad_image6">
        <input type="hidden" value="<?php echo esc_attr( $dp_options['single_ad_image6'] ); ?>" id="single_ad_image6" name="dp_options[single_ad_image6]" class="cf_media_id">
        <div class="preview_field"><?php if($dp_options['single_ad_image6']){ echo wp_get_attachment_image($dp_options['single_ad_image6'], 'medium'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['single_ad_image6']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
     </div>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w'); ?></h4>
      <input id="dp_options[single_ad_url6]" class="large-text" type="text" name="dp_options[single_ad_url6]" value="<?php echo esc_attr( $dp_options['single_ad_url6'] ); ?>" />
      <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
     </div>
    </div><!-- END .sub_box_content -->
   </div><!-- END .sub_box -->
  </div><!-- END .theme_option_field -->

  <?php // 広告の登録2 -------------------------------------------------------------------------------------------- ?>
  <div class="theme_option_field cf">
   <h3 class="theme_option_headline"><?php _e('Single page banner setup', 'tcd-w'); ?>2</h3>
   <p><?php _e('This banner will be displayed under contents.', 'tcd-w'); ?></p>
   <div class="sub_box cf">
    <h3 class="theme_option_subbox_headline"><?php _e('Left banner', 'tcd-w'); ?></h3>
    <div class="sub_box_content">
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w'); ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w'); ?></p>
      <textarea id="dp_options[single_ad_code1]" class="large-text" cols="50" rows="10" name="dp_options[single_ad_code1]"><?php echo esc_textarea( $dp_options['single_ad_code1'] ); ?></textarea>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w'); ?></p>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); _e('Recommend size. Width:300px Height:250px', 'tcd-w'); ?></h4>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js single_ad_image1">
        <input type="hidden" value="<?php echo esc_attr( $dp_options['single_ad_image1'] ); ?>" id="single_ad_image" name="dp_options[single_ad_image1]" class="cf_media_id">
        <div class="preview_field"><?php if($dp_options['single_ad_image1']){ echo wp_get_attachment_image($dp_options['single_ad_image1'], 'medium'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['single_ad_image1']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
     </div>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w'); ?></h4>
      <input id="dp_options[single_ad_url1]" class="large-text" type="text" name="dp_options[single_ad_url1]" value="<?php echo esc_attr( $dp_options['single_ad_url1'] ); ?>" />
      <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
     </div>
    </div><!-- END .sub_box_content -->
   </div><!-- END .sub_box -->
   <div class="sub_box cf">
    <h3 class="theme_option_subbox_headline"><?php _e('Right banner', 'tcd-w'); ?></h3>
    <div class="sub_box_content">
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w'); ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w'); ?></p>
      <textarea id="dp_options[single_ad_code2]" class="large-text" cols="50" rows="10" name="dp_options[single_ad_code2]"><?php echo esc_textarea( $dp_options['single_ad_code2'] ); ?></textarea>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w'); ?></p>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); _e('Recommend size. Width:300px Height:250px', 'tcd-w'); ?></h4>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js single_ad_image2">
        <input type="hidden" value="<?php echo esc_attr( $dp_options['single_ad_image2'] ); ?>" id="single_ad_image2" name="dp_options[single_ad_image2]" class="cf_media_id">
        <div class="preview_field"><?php if($dp_options['single_ad_image2']){ echo wp_get_attachment_image($dp_options['single_ad_image2'], 'medium'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['single_ad_image2']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
     </div>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w'); ?></h4>
      <input id="dp_options[single_ad_url2]" class="large-text" type="text" name="dp_options[single_ad_url2]" value="<?php echo esc_attr( $dp_options['single_ad_url2'] ); ?>" />
      <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
     </div>
    </div><!-- END .sub_box_content -->
   </div><!-- END .sub_box -->
  </div><!-- END .theme_option_field -->

  <?php // 広告の登録3 -------------------------------------------------------------------------------------------- ?>
  <div class="theme_option_field cf">
   <h3 class="theme_option_headline"><?php _e('Single page banner setup', 'tcd-w'); ?>3</h3>
   <p><?php _e('Please copy and paste the short code inside the content to show this banner.', 'tcd-w'); ?></p>
   <p><?php _e('Short code', 'tcd-w'); ?> : <input type="text" readonly="readonly" value="[s_ad]" /></p>
   <div class="sub_box cf">
    <h3 class="theme_option_subbox_headline"><?php _e('Left banner', 'tcd-w'); ?></h3>
    <div class="sub_box_content">
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w'); ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w'); ?></p>
      <textarea id="dp_options[single_ad_code3]" class="large-text" cols="50" rows="10" name="dp_options[single_ad_code3]"><?php echo esc_textarea( $dp_options['single_ad_code3'] ); ?></textarea>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w'); ?></p>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); _e('Recommend size. Width:300px Height:250px', 'tcd-w'); ?></h4>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js single_ad_image3">
        <input type="hidden" value="<?php echo esc_attr( $dp_options['single_ad_image3'] ); ?>" id="single_ad_image3" name="dp_options[single_ad_image3]" class="cf_media_id">
        <div class="preview_field"><?php if($dp_options['single_ad_image3']){ echo wp_get_attachment_image($dp_options['single_ad_image3'], 'medium'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['single_ad_image3']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
     </div>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w'); ?></h4>
      <input id="dp_options[single_ad_url3]" class="large-text" type="text" name="dp_options[single_ad_url3]" value="<?php echo esc_attr( $dp_options['single_ad_url3'] ); ?>" />
      <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
     </div>
    </div><!-- END .sub_box_content -->
   </div><!-- END .sub_box -->
   <div class="sub_box cf">
    <h3 class="theme_option_subbox_headline"><?php _e('Right banner', 'tcd-w'); ?></h3>
    <div class="sub_box_content">
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w'); ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w'); ?></p>
      <textarea id="dp_options[single_ad_code4]" class="large-text" cols="50" rows="10" name="dp_options[single_ad_code4]"><?php echo esc_textarea( $dp_options['single_ad_code4'] ); ?></textarea>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w'); ?></p>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); _e('Recommend size. Width:300px Height:250px', 'tcd-w'); ?></h4>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js single_ad_image4">
        <input type="hidden" value="<?php echo esc_attr( $dp_options['single_ad_image4'] ); ?>" id="single_ad_image4" name="dp_options[single_ad_image4]" class="cf_media_id">
        <div class="preview_field"><?php if($dp_options['single_ad_image4']){ echo wp_get_attachment_image($dp_options['single_ad_image4'], 'medium'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['single_ad_image4']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
     </div>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w'); ?></h4>
      <input id="dp_options[single_ad_url4]" class="large-text" type="text" name="dp_options[single_ad_url4]" value="<?php echo esc_attr( $dp_options['single_ad_url4'] ); ?>" />
      <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
     </div>
    </div><!-- END .sub_box_content -->
   </div><!-- END .sub_box -->
  </div><!-- END .theme_option_field -->

  <?php // スマホ専用広告の登録 -------------------------------------------------------------------------------------------- ?>
  <div class="theme_option_field cf">
   <h3 class="theme_option_headline"><?php _e('Mobile device banner setup', 'tcd-w'); ?></h3>
   <p><?php _e('This banner will be displayed on mobile device.', 'tcd-w'); ?></p>
   <div class="sub_box cf">
    <h3 class="theme_option_subbox_headline"><?php _e('Top banner', 'tcd-w'); ?></h3>
    <div class="sub_box_content">
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w'); ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w'); ?></p>
      <textarea id="dp_options[single_mobile_ad_code1]" class="large-text" cols="50" rows="10" name="dp_options[single_mobile_ad_code1]"><?php echo esc_textarea( $dp_options['single_mobile_ad_code1'] ); ?></textarea>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w'); ?></p>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); ?></h4>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js single_mobile_ad_image1">
        <input type="hidden" value="<?php echo esc_attr( $dp_options['single_mobile_ad_image1'] ); ?>" id="single_mobile_ad_image" name="dp_options[single_mobile_ad_image1]" class="cf_media_id">
        <div class="preview_field"><?php if($dp_options['single_mobile_ad_image1']){ echo wp_get_attachment_image($dp_options['single_mobile_ad_image1'], 'medium'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['single_mobile_ad_image1']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
     </div>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w'); ?></h4>
      <input id="dp_options[single_mobile_ad_url1]" class="regular-text" type="text" name="dp_options[single_mobile_ad_url1]" value="<?php echo esc_attr( $dp_options['single_mobile_ad_url1'] ); ?>" />
      <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
     </div>
    </div><!-- END .sub_box_content -->
   </div><!-- END .sub_box -->
   <div class="sub_box cf">
    <h3 class="theme_option_subbox_headline"><?php _e('Bottom banner', 'tcd-w'); ?></h3>
    <div class="sub_box_content">
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w'); ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w'); ?></p>
      <textarea id="dp_options[single_mobile_ad_code2]" class="large-text" cols="50" rows="10" name="dp_options[single_mobile_ad_code2]"><?php echo esc_textarea( $dp_options['single_mobile_ad_code2'] ); ?></textarea>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w'); ?></p>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); ?></h4>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js single_mobile_ad_image2">
        <input type="hidden" value="<?php echo esc_attr( $dp_options['single_mobile_ad_image2'] ); ?>" id="single_mobile_ad_image2" name="dp_options[single_mobile_ad_image2]" class="cf_media_id">
        <div class="preview_field"><?php if($dp_options['single_mobile_ad_image2']){ echo wp_get_attachment_image($dp_options['single_mobile_ad_image2'], 'medium'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['single_mobile_ad_image2']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
     </div>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w'); ?></h4>
      <input id="dp_options[single_mobile_ad_url2]" class="regular-text" type="text" name="dp_options[single_mobile_ad_url2]" value="<?php echo esc_attr( $dp_options['single_mobile_ad_url2'] ); ?>" />
      <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
     </div>
    </div><!-- END .sub_box_content -->
   </div><!-- END .sub_box -->
  </div><!-- END .theme_option_field -->

  </div><!-- END #tab-content4 -->




  <!-- #tab-content5 紹介　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
  <div id="tab-content5">

   <?php // 紹介の設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Introduce setting', 'tcd-w'); ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Label', 'tcd-w'); ?></h4>
    <input id="dp_options[introduce_label]" class="regular-text" type="text" name="dp_options[introduce_label]" value="<?php echo esc_attr( $dp_options['introduce_label'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Breadcrumb label', 'tcd-w'); ?></h4>
    <input id="dp_options[introduce_breadcrumb_label]" class="regular-text" type="text" name="dp_options[introduce_breadcrumb_label]" value="<?php echo esc_attr( $dp_options['introduce_breadcrumb_label'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Slug', 'tcd-w'); ?></h4>
    <input id="dp_options[introduce_slug]" class="regular-text" type="text" name="dp_options[introduce_slug]" value="<?php echo esc_attr( $dp_options['introduce_slug'] ); ?>" class="hankaku" />
    <p><strong><?php _e('Existing posts will not be visible if you change the slug.', 'tcd-w'); ?></strong></p>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // 紹介カテゴリーの設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php printf(__('%s setting', 'tcd-w'), __('Introduce category', 'tcd-w')); ?></h3>
    <h4 class="theme_option_headline2"><?php printf(__('%s setting', 'tcd-w'), __('Introduce category', 'tcd-w').'1'); ?></h4>
    <ul>
     <li><label><input id="dp_options[use_introduce_category1]" name="dp_options[use_introduce_category1]" type="checkbox" value="1" <?php checked( '1', $dp_options['use_introduce_category1'] ); ?> /> <?php printf(__('use %s', 'tcd-w'), __('Introduce category', 'tcd-w').'1'); ?></label></li>
     <li><label><input id="dp_options[use_introduce_category1_introduce_archive]" name="dp_options[use_introduce_category1_introduce_archive]" type="checkbox" value="1" <?php checked( '1', $dp_options['use_introduce_category1_introduce_archive'] ); ?> /> <?php _e('Create a designed special page', 'tcd-w'); ?></label></li>
     <li>
      <span class="label"><?php printf(__('%s label', 'tcd-w'), __('Introduce category', 'tcd-w').'1'); ?></span>
      <input type="text" id="dp_options[introduce_category1_label]" name="dp_options[introduce_category1_label]" value="<?php echo esc_attr( $dp_options['introduce_category1_label'] ); ?>" />
     </li>
     <li>
      <span class="label"><?php printf(__('%s slug', 'tcd-w'), __('Introduce category', 'tcd-w').'1'); ?></span>
      <input type="text" id="dp_options[introduce_category1_slug]" name="dp_options[introduce_category1_slug]" value="<?php echo esc_attr( $dp_options['introduce_category1_slug'] ); ?>" />
     </li>
     <li>
      <span class="label"><?php printf(__('%s color', 'tcd-w'), __('Introduce category', 'tcd-w').'1'); ?></span>
      <input type="text" id="introduce_category1_color" name="dp_options[introduce_category1_color]" value="<?php echo esc_attr( $dp_options['introduce_category1_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['introduce_category1_color']); ?>" />
     </li>
    </ul>
    <h4 class="theme_option_headline2"><?php printf(__('%s setting', 'tcd-w'), __('Introduce category', 'tcd-w').'2'); ?></h4>
    <ul>
     <li><label><input id="dp_options[use_introduce_category2]" name="dp_options[use_introduce_category2]" type="checkbox" value="1" <?php checked( '1', $dp_options['use_introduce_category2'] ); ?> /> <?php printf(__('use %s', 'tcd-w'), __('Introduce category', 'tcd-w').'2'); ?></label></li>
     <li><label><input id="dp_options[use_introduce_category2_introduce_archive]" name="dp_options[use_introduce_category2_introduce_archive]" type="checkbox" value="1" <?php checked( '1', $dp_options['use_introduce_category2_introduce_archive'] ); ?> /> <?php _e('Create a designed special page', 'tcd-w'); ?></label></li>
     <li>
      <span class="label"><?php printf(__('%s label', 'tcd-w'), __('Introduce category', 'tcd-w').'2'); ?></span>
      <input type="text" id="dp_options[introduce_category2_label]" name="dp_options[introduce_category2_label]" value="<?php echo esc_attr( $dp_options['introduce_category2_label'] ); ?>" />
     </li>
     <li>
      <span class="label"><?php printf(__('%s slug', 'tcd-w'), __('Introduce category', 'tcd-w').'2'); ?></span>
      <input type="text" id="dp_options[introduce_category2_slug]" name="dp_options[introduce_category2_slug]" value="<?php echo esc_attr( $dp_options['introduce_category2_slug'] ); ?>" />
     </li>
     <li>
      <span class="label"><?php printf(__('%s color', 'tcd-w'), __('Introduce category', 'tcd-w').'2'); ?></span>
      <input type="text" id="introduce_category2_color" name="dp_options[introduce_category2_color]" value="<?php echo esc_attr( $dp_options['introduce_category2_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['introduce_category2_color']); ?>" />
     </li>
    </ul>
    <h4 class="theme_option_headline2"><?php printf(__('%s setting', 'tcd-w'), __('Introduce category', 'tcd-w').'3'); ?></h4>
    <ul>
     <li><label><input id="dp_options[use_introduce_category3]" name="dp_options[use_introduce_category3]" type="checkbox" value="1" <?php checked( '1', $dp_options['use_introduce_category3'] ); ?> /> <?php printf(__('use %s', 'tcd-w'), __('Introduce category', 'tcd-w').'3'); ?></label></li>
     <li><label><input id="dp_options[use_introduce_category3_introduce_archive]" name="dp_options[use_introduce_category3_introduce_archive]" type="checkbox" value="1" <?php checked( '1', $dp_options['use_introduce_category3_introduce_archive'] ); ?> /> <?php _e('Create a designed special page', 'tcd-w'); ?></label></li>
     <li>
      <span class="label"><?php printf(__('%s label', 'tcd-w'), __('Introduce category', 'tcd-w').'3'); ?></span>
      <input type="text" id="dp_options[introduce_category3_label]" name="dp_options[introduce_category3_label]" value="<?php echo esc_attr( $dp_options['introduce_category3_label'] ); ?>" />
     </li>
     <li>
      <span class="label"><?php printf(__('%s slug', 'tcd-w'), __('Introduce category', 'tcd-w').'3'); ?></span>
      <input type="text" id="dp_options[introduce_category3_slug]" name="dp_options[introduce_category3_slug]" value="<?php echo esc_attr( $dp_options['introduce_category3_slug'] ); ?>" />
     </li>
     <li>
      <span class="label"><?php printf(__('%s color', 'tcd-w'), __('Introduce category', 'tcd-w').'3'); ?></span>
      <input type="text" id="introduce_category3_color" name="dp_options[introduce_category3_color]" value="<?php echo esc_attr( $dp_options['introduce_category3_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['introduce_category3_color']); ?>" />
     </li>
    </ul>

    <h4 class="theme_option_headline2"><?php printf(__('%s setting', 'tcd-w'), __('Introduce tag', 'tcd-w')); ?></h4>
    <ul>
     <li><label><input id="dp_options[use_introduce_tag]" name="dp_options[use_introduce_tag]" type="checkbox" value="1" <?php checked( '1', $dp_options['use_introduce_tag'] ); ?> /> <?php printf(__('use %s', 'tcd-w'), __('Introduce tag', 'tcd-w')); ?></label></li>
     <li>
      <span class="label"><?php printf(__('%s label', 'tcd-w'), __('Introduce tag', 'tcd-w')); ?></span>
      <input type="text" id="dp_options[introduce_tag_label]" name="dp_options[introduce_tag_label]" value="<?php echo esc_attr( $dp_options['introduce_tag_label'] ); ?>" />
     </li>
     <li>
      <span class="label"><?php printf(__('%s slug', 'tcd-w'), __('Introduce tag', 'tcd-w')); ?></span>
      <input type="text" id="dp_options[introduce_tag_slug]" name="dp_options[introduce_tag_slug]" value="<?php echo esc_attr( $dp_options['introduce_tag_slug'] ); ?>" />
     </li>
    </ul>
    <p><strong><?php _e('Existing categories will not be visible if you change the slug.', 'tcd-w'); ?></strong></p>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // アーカイブページの設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Archive page setting', 'tcd-w'); ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Archive page image', 'tcd-w'); ?></h4>
    <p><?php _e('Recommended size, Width:1450px Height:440px.', 'tcd-w'); ?></p>
    <div class="image_box cf">
     <div class="cf cf_media_field hide-if-no-js introduce_archive_image">
      <input type="hidden" value="<?php echo esc_attr( $dp_options['introduce_archive_image'] ); ?>" id="introduce_archive_image" name="dp_options[introduce_archive_image]" class="cf_media_id">
      <div class="preview_field"><?php if($dp_options['introduce_archive_image']){ echo wp_get_attachment_image($dp_options['introduce_archive_image'], 'medium'); }; ?></div>
      <div class="buttton_area">
       <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
       <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['introduce_archive_image']){ echo 'hidden'; }; ?>">
      </div>
     </div>
    </div>
    <h4 class="theme_option_headline2"><?php _e('Catchcopy', 'tcd-w'); ?></h4>
    <textarea id="dp_options[introduce_archive_catch]" class="large-text" cols="50" rows="2" name="dp_options[introduce_archive_catch]"><?php echo esc_textarea( $dp_options['introduce_archive_catch'] ); ?></textarea>
    <p><?php _e('Please set the background color.', 'tcd-w'); ?></p>
    <input type="text" id="introduce_archive_image_catch_bg" name="dp_options[introduce_archive_image_catch_bg]" value="<?php echo esc_attr( $dp_options['introduce_archive_image_catch_bg'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['introduce_archive_image_catch_bg']); ?>" />
    <p><?php _e('Please set the opacity. (0 - 1.0, e.g. 0.7)', 'tcd-w'); ?></p>
    <input id="dp_options[introduce_archive_image_catch_bg_opacity]" class="font_size hankaku" type="text" name="dp_options[introduce_archive_image_catch_bg_opacity]" value="<?php echo esc_attr( $dp_options['introduce_archive_image_catch_bg_opacity'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Archive page text', 'tcd-w'); ?></h4>
    <p><?php _e( 'Please click "Add new item" and set display contents. You can change the order by dragging the added items.', 'tcd-w' ); ?></p>
    <div class="repeater-wrapper">
     <div class="repeater sortable" data-delete-confirm="<?php _e( 'Delete?', 'tcd-w' ); ?>">
<?php
    if ( $dp_options['introduce_archive_text'] ) :
      foreach ( $dp_options['introduce_archive_text'] as $key => $value ) :
        $value = array_merge(array('headline' => '', 'desc' => ''), (array) $value);
?>
      <div class="sub_box repeater-item repeater-item-<?php echo esc_attr( $key ); ?>">
       <input type="hidden" name="dp_options[introduce_archive_text][indexes][]" value="<?php echo esc_attr( $key ); ?>">
       <h4 class="theme_option_subbox_headline"><?php echo esc_attr( $value['headline'] ); ?></h4>
       <div class="sub_box_content">
        <table class="table-repeater">
         <tr>
          <th><label for="dp_options[introduce_archive_text][<?php echo esc_attr( $key ); ?>][headline]"><?php _e( 'Headline', 'tcd-w' ); ?></label></th>
          <td><textarea id="dp_options[introduce_archive_text][<?php echo esc_attr( $key ); ?>][headline]" name="dp_options[introduce_archive_text][<?php echo esc_attr( $key ); ?>][headline]" cols="50" rows="2" class="large-text repeater-label"><?php echo esc_textarea( $value['headline'] ); ?></textarea></td>
         </tr>
         <tr>
          <th><label for="dp_options[introduce_archive_text][<?php echo esc_attr( $key ); ?>][desc]"><?php _e( 'Description', 'tcd-w' ); ?></label></th>
          <td><textarea id="dp_options[introduce_archive_text][<?php echo esc_attr( $key ); ?>][desc]" name="dp_options[introduce_archive_text][<?php echo esc_attr( $key ); ?>][desc]" cols="50" rows="4" class="large-text"><?php echo esc_textarea( $value['desc'] ); ?></textarea></td>
         </tr>
        </table>
        <p class="delete-row right-align"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a></p>
       </div>
      </div>
<?php
      endforeach;
    endif;

    $key = 'addindex';
    $value = array('headline' => '', 'desc' => '');
    ob_start();
?>
      <div class="sub_box repeater-item repeater-item-<?php echo $key; ?>">
       <input type="hidden" name="dp_options[introduce_archive_text][indexes][]" value="<?php echo esc_attr( $key ); ?>">
       <h4 class="theme_option_subbox_headline"><?php _e( 'New item', 'tcd-w' ); ?></h4>
       <div class="sub_box_content">
        <table class="table-repeater">
         <tr>
          <th><label for="dp_options[introduce_archive_text][<?php echo esc_attr( $key ); ?>][headline]"><?php _e( 'Headline', 'tcd-w' ); ?></label></th>
          <td><textarea id="dp_options[introduce_archive_text][<?php echo esc_attr( $key ); ?>][headline]" name="dp_options[introduce_archive_text][<?php echo esc_attr( $key ); ?>][headline]" cols="50" rows="2" class="large-text repeater-label"><?php echo esc_textarea( $value['headline'] ); ?></textarea></td>
         </tr>
         <tr>
          <th><label for="dp_options[introduce_archive_text][<?php echo esc_attr( $key ); ?>][desc]"><?php _e( 'Description', 'tcd-w' ); ?></label></th>
          <td><textarea id="dp_options[introduce_archive_text][<?php echo esc_attr( $key ); ?>][desc]" name="dp_options[introduce_archive_text][<?php echo esc_attr( $key ); ?>][desc]" cols="50" rows="4" class="large-text"><?php echo esc_textarea( $value['desc'] ); ?></textarea></td>
         </tr>
        </table>
        <p class="delete-row right-align"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a></p>
       </div>
      </div>
<?php
    $clone = ob_get_clean();
?>
     </div>
     <a href="#" class="button button-secondary button-add-row" data-clone="<?php echo esc_attr( $clone ); ?>"><?php _e( 'Add item', 'tcd-w' ); ?></a>
    </div>
    <h4 class="theme_option_headline2"><?php _e('Breadcrumb', 'tcd-w'); ?></h4>
    <p><label><input id="dp_options[show_breadcrumb_introduce_archive]" name="dp_options[show_breadcrumb_introduce_archive]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_breadcrumb_introduce_archive'] ); ?> /> <?php _e('Display breadcrumb', 'tcd-w'); ?></label></p>
    <h4 class="theme_option_headline2"><?php _e('Post number', 'tcd-w'); ?></h4>
    <select name="dp_options[archive_introduce_num]">
     <?php
       foreach ( $post_num3_options as $option ) :
         if ( $dp_options['archive_introduce_num'] == $option['value'] ) {
           $selected = 'selected="selected"';
         } else {
           $selected = '';
         }
         echo '<option value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $option['label'] . '</option>' ."\n";
       endforeach;
     ?>
    </select>
    <h4 class="theme_option_headline2"><?php _e('Infinite scroll setting', 'tcd-w'); ?></h4>
    <p><label><input id="dp_options[use_infinitescroll_introduce]" name="dp_options[use_infinitescroll_introduce]" type="checkbox" value="1" <?php checked( '1', $dp_options['use_infinitescroll_introduce'] ); ?> /> <?php _e('Use infinite scroll', 'tcd-w'); ?></label></p>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // 項目の表示設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Display setting', 'tcd-w'); ?></h3>
    <p><?php _e('Settings for miscs', 'tcd-w'); ?></p>
    <h4 class="theme_option_headline2"><?php _e('Settings for front page, archive page and post page', 'tcd-w'); ?></h4>
    <ul>
     <li>
      <span class="label"><?php _e('Display introduce categories', 'tcd-w'); ?></span>
      <select name="dp_options[show_introduce_categories]">
       <option value=""><?php _e('Not display', 'tcd-w'); ?></option>
       <?php
         $categories_options = array(
           '1' => $dp_options['introduce_category1_label'],
           '1-2' => array( $dp_options['introduce_category1_label'], $dp_options['introduce_category2_label'] ),
           '1-2-3' => array( $dp_options['introduce_category1_label'], $dp_options['introduce_category2_label'], $dp_options['introduce_category3_label'] ),
           '1-3' => array( $dp_options['introduce_category1_label'], $dp_options['introduce_category3_label'] ),
           '1-3-2' => array( $dp_options['introduce_category1_label'], $dp_options['introduce_category3_label'], $dp_options['introduce_category2_label'] ),
           '2' => $dp_options['introduce_category2_label'],
           '2-1' => array( $dp_options['introduce_category2_label'], $dp_options['introduce_category1_label'] ),
           '2-1-3' => array( $dp_options['introduce_category2_label'], $dp_options['introduce_category1_label'], __('Category', 'tcd-w').'3' ),
           '2-3' => array( $dp_options['introduce_category2_label'], __('Category', 'tcd-w').'3' ),
           '2-3-1' => array( $dp_options['introduce_category2_label'], $dp_options['introduce_category3_label'], $dp_options['introduce_category1_label'] ),
           '3' => __('Category', 'tcd-w').'3',
           '3-1' => array( $dp_options['introduce_category3_label'], __('Category', 'tcd-w').'1' ),
           '3-1-2' => array( $dp_options['introduce_category3_label'], $dp_options['introduce_category1_label'], $dp_options['introduce_category2_label'] ),
           '3-2' => array( $dp_options['introduce_category3_label'], $dp_options['introduce_category2_label'] ),
           '3-2-1' => array( $dp_options['introduce_category3_label'], $dp_options['introduce_category2_label'], $dp_options['introduce_category1_label'] )
         );
         foreach ( $categories_options as $key => $value ) :
           if ( $dp_options['show_introduce_categories'] == $key ) {
             $selected = 'selected="selected"';
           } else {
             $selected = '';
           }
           echo '<option value="' . esc_attr( $key ) . '" ' . $selected . '>' . esc_html( implode( ', ', (array) $value ) ) . '</option>' ."\n";
         endforeach;
       ?>
      </select>
     </li>
    </ul>
    <h4 class="theme_option_headline2"><?php _e('Settings for post page', 'tcd-w'); ?></h4>
    <ul>
     <li><label><input id="dp_options[show_shoulder_copy_introduce]" name="dp_options[show_shoulder_copy_introduce]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_shoulder_copy_introduce'] ); ?> /> <?php _e('Display shoulder copy', 'tcd-w'); ?></label></li>
     <li><label><input id="dp_options[show_thumbnail_introduce]" name="dp_options[show_thumbnail_introduce]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_thumbnail_introduce'] ); ?> /> <?php _e('Display thumbnail/slider', 'tcd-w'); ?></label></li>
     <li><label><input id="dp_options[show_date_introduce]" name="dp_options[show_date_introduce]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_date_introduce'] ); ?> /> <?php _e('Display date', 'tcd-w'); ?></label></li>
     <li><label><input id="dp_options[show_tag_introduce]" name="dp_options[show_tag_introduce]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_tag_introduce'] ); ?> /> <?php _e('Display tags', 'tcd-w'); ?></label></li>
     <li><label><input id="dp_options[show_sns_top_introduce]" name="dp_options[show_sns_top_introduce]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_sns_top_introduce'] ); ?> /> <?php _e('Display share button under post title', 'tcd-w'); ?></label></li>
     <li><label><input id="dp_options[show_sns_btm_introduce]" name="dp_options[show_sns_btm_introduce]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_sns_btm_introduce'] ); ?> /> <?php _e('Display share button under post content', 'tcd-w'); ?></label></li>
     <li><label><input id="dp_options[show_next_post_introduce]" name="dp_options[show_next_post_introduce]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_next_post_introduce'] ); ?> /> <?php _e('Display next previous post link', 'tcd-w'); ?></label></li>
     <li><label><input id="dp_options[show_archive_banner_introduce]" name="dp_options[show_archive_banner_introduce]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_archive_banner_introduce'] ); ?> /> <?php _e('Display archive banner', 'tcd-w'); ?></label></li>
    </ul>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // 関連記事の設定 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Related introduce setting', 'tcd-w'); ?></h3>
    <p><?php _e('Recent introduce will be displayed at the bottom of introduce post page.','tcd-w'); ?></p>
    <p><label><input id="dp_options[show_related_introduce]" name="dp_options[show_related_introduce]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_related_introduce'] ); ?> /> <?php _e('Display related introduce', 'tcd-w'); ?></label></p>
    <h4 class="theme_option_headline2"><?php _e('Headline for related introduce', 'tcd-w'); ?></h4>
    <input id="dp_options[related_introduce_headline]" class="regular-text" type="text" name="dp_options[related_introduce_headline]" value="<?php echo esc_attr( $dp_options['related_introduce_headline'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Post number', 'tcd-w'); ?></h4>
    <select name="dp_options[related_introduce_num]">
     <?php
       foreach ( $post_num3_options as $option ) :
         if ( $dp_options['related_introduce_num'] == $option['value'] ) {
           $selected = 'selected="selected"';
         } else {
           $selected = '';
         }
         echo '<option value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $option['label'] . '</option>' ."\n";
       endforeach;
     ?>
    </select>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

  </div><!-- END #tab-content5 -->




  <!-- #tab-content6 お知らせコンテンツ　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
  <div id="tab-content6">

   <?php // お知らせの設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('News setting', 'tcd-w'); ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Label', 'tcd-w'); ?></h4>
    <input id="dp_options[news_label]" class="regular-text" type="text" name="dp_options[news_label]" value="<?php echo esc_attr( $dp_options['news_label'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Breadcrumb label', 'tcd-w'); ?></h4>
    <input id="dp_options[news_breadcrumb_label]" class="regular-text" type="text" name="dp_options[news_breadcrumb_label]" value="<?php echo esc_attr( $dp_options['news_breadcrumb_label'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Slug', 'tcd-w'); ?></h4>
    <input id="dp_options[news_slug]" class="regular-text" type="text" name="dp_options[news_slug]" value="<?php echo esc_attr( $dp_options['news_slug'] ); ?>" class="hankaku" />
    <p><strong><?php _e('Existing posts will not be visible if you change the slug.', 'tcd-w'); ?></strong></p>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // アーカイブページの設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Archive page setting', 'tcd-w'); ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Archive page headline', 'tcd-w'); ?></h4>
    <input id="dp_options[news_archive_headline]" class="regular-text" type="text" name="dp_options[news_archive_headline]" value="<?php echo esc_attr( $dp_options['news_archive_headline'] ); ?>" />
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // 項目の表示設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Display setting', 'tcd-w'); ?></h3>
    <p><?php _e('Settings for miscs', 'tcd-w'); ?></p>
    <h4 class="theme_option_headline2"><?php _e('Settings for front page, archive page and post page', 'tcd-w'); ?></h4>
    <ul>
     <li><label><input id="dp_options[show_date_news]" name="dp_options[show_date_news]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_date_news'] ); ?> /> <?php _e('Display date', 'tcd-w'); ?></label></li>
    </ul>
    <h4 class="theme_option_headline2"><?php _e('Settings for post page', 'tcd-w'); ?></h4>
    <ul>
     <li><label><input id="dp_options[show_thumbnail_news]" name="dp_options[show_thumbnail_news]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_thumbnail_news'] ); ?> /> <?php _e('Display thumbnail', 'tcd-w'); ?></label></li>
     <li><label><input id="dp_options[show_sns_top_news]" name="dp_options[show_sns_top_news]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_sns_top_news'] ); ?> /> <?php _e('Display share button under post title', 'tcd-w'); ?></label></li>
     <li><label><input id="dp_options[show_sns_btm_news]" name="dp_options[show_sns_btm_news]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_sns_btm_news'] ); ?> /> <?php _e('Display share button under post content', 'tcd-w'); ?></label></li>
     <li><label><input id="dp_options[show_next_post_news]" name="dp_options[show_next_post_news]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_next_post_news'] ); ?> /> <?php _e('Display next previous post link', 'tcd-w'); ?></label></li>
    </ul>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // 最新のお知らせの設定 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Recent news setting', 'tcd-w'); ?></h3>
    <p><?php _e('Recent news will be displayed at the bottom of news post page.','tcd-w'); ?></p>
    <p><label><input id="dp_options[show_recent_news]" name="dp_options[show_recent_news]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_recent_news'] ); ?> /> <?php _e('Display reccent news list', 'tcd-w'); ?></label></p>
    <h4 class="theme_option_headline2"><?php _e('Headline for Recent news', 'tcd-w'); ?></h4>
    <input id="dp_options[recent_news_headline]" class="regular-text" type="text" name="dp_options[recent_news_headline]" value="<?php echo esc_attr( $dp_options['recent_news_headline'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Archive link text', 'tcd-w'); ?></h4>
    <input id="dp_options[recent_news_link_text]" class="regular-text" type="text" name="dp_options[recent_news_link_text]" value="<?php echo esc_attr( $dp_options['recent_news_link_text'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Post number', 'tcd-w'); ?></h4>
    <select name="dp_options[recent_news_num]">
     <?php
       foreach ( $post_num_options as $option ) :
         if ( $dp_options['recent_news_num'] == $option['value'] ) {
           $selected = 'selected="selected"';
         } else {
           $selected = '';
         }
         echo '<option value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $option['label'] . '</option>' ."\n";
       endforeach;
     ?>
    </select>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

  </div><!-- END #tab-content6 -->




  <!-- #tab-content7 検索　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
  <div id="tab-content7">

   <?php // 検索設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Search settings', 'tcd-w'); ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Post type to search for', 'tcd-w'); ?></h4>
    <fieldset class="cf select_type2 searcn_post_type-radios">
     <?php
         $post_type_options = array(
            'post' => $dp_options['blog_breadcrumb_label'],
            'introduce' => $dp_options['introduce_label']
         );
         foreach ( $post_type_options as $key => $value ) :
             if ( $dp_options['searcn_post_type'] == $key ) {
               $checked = "checked=\"checked\"";
             } else {
               $checked = '';
             }
     ?>
     <label class="description">
      <input type="radio" name="dp_options[searcn_post_type]" value="<?php echo esc_attr( $key ); ?>" <?php echo $checked; ?> />
      <?php echo esc_html( $value ); ?>
     </label>
     <?php endforeach; ?>
    </fieldset>
    <h4 class="theme_option_headline2"><?php _e('Keyword search target', 'tcd-w'); ?></h4>
    <ul>
     <li><label><input type="checkbox" name="dp_options[searcn_keywords_target][]" value="title" <?php if (in_array('title', $dp_options['searcn_keywords_target'])) echo 'checked="checked"'; ?> /> <?php _e('Title', 'tcd-w'); ?></label></li>
     <li><label><input type="checkbox" name="dp_options[searcn_keywords_target][]" value="content" <?php if (in_array('content', $dp_options['searcn_keywords_target'])) echo 'checked="checked"'; ?> /> <?php _e('Content', 'tcd-w'); ?></label></li>
     <li><label><input type="checkbox" name="dp_options[searcn_keywords_target][]" value="tag" <?php if (in_array('tag', $dp_options['searcn_keywords_target'])) echo 'checked="checked"'; ?> /> <?php _e('Tag', 'tcd-w'); ?></label></li>
    </ul>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // 検索フォーム設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Search form setting', 'tcd-w'); ?></h3>
    <div class="searcn_post_type-post" <?php if ($dp_options['searcn_post_type'] != 'post') echo 'style="display:none;"'; ?>>
     <h4 class="theme_option_headline2"><?php _e('Keyword search setting', 'tcd-w'); ?></h4>
     <ul>
      <li><label><input type="checkbox" id="dp_options[show_search_form_keywords]" name="dp_options[show_search_form_keywords]" value="1" <?php checked( '1', $dp_options['show_search_form_keywords'] ); ?> /> <?php _e('Display keywords input', 'tcd-w'); ?></label></li>
      <li>
       <span class="label"><?php _e('Placeholder', 'tcd-w'); ?>1</span>
       <input type="text" class="regular-text" name="dp_options[search_form_keywords_placeholder]" value="<?php echo esc_attr( $dp_options['search_form_keywords_placeholder'] ); ?>" />
      </li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Category drop down search setting', 'tcd-w'); ?>1</h4>
     <ul>
      <li>
       <span class="label"><?php _e('Category', 'tcd-w'); ?></span>
       <select name="dp_options[show_search_form_category1]">
        <option value=""><?php _e('Not display', 'tcd-w'); ?></option>
        <?php
          $categories_options = array(
            'category' => $dp_options['category_label'],
            'category2' => $dp_options['category2_label'],
            'category3' => $dp_options['category3_label']
          );
          foreach ( $categories_options as $key => $value ) :
            if ( $dp_options['show_search_form_category1'] == $key ) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
            echo '<option value="' . esc_attr( $key ) . '" ' . $selected . '>' . esc_html( implode( ', ', (array) $value ) ) . '</option>' ."\n";
          endforeach;
        ?>
       </select>
      </li>
      <li>
       <span class="label"><?php _e('Placeholder', 'tcd-w'); ?></span>
       <input type="text" class="regular-text" name="dp_options[search_form_category1_placeholder]" value="<?php echo esc_attr( $dp_options['search_form_category1_placeholder'] ); ?>" />
      </li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Category drop down search setting', 'tcd-w'); ?>2</h4>
     <ul>
      <li>
       <span class="label"><?php _e('Category', 'tcd-w'); ?></span>
       <select name="dp_options[show_search_form_category2]">
        <option value=""><?php _e('Not display', 'tcd-w'); ?></option>
        <?php
          foreach ( $categories_options as $key => $value ) :
            if ( $dp_options['show_search_form_category2'] == $key ) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
            echo '<option value="' . esc_attr( $key ) . '" ' . $selected . '>' . esc_html( implode( ', ', (array) $value ) ) . '</option>' ."\n";
          endforeach;
        ?>
       </select>
      </li>
      <li>
       <span class="label"><?php _e('Placeholder', 'tcd-w'); ?></span>
       <input type="text" class="regular-text" name="dp_options[search_form_category2_placeholder]" value="<?php echo esc_attr( $dp_options['search_form_category2_placeholder'] ); ?>" />
      </li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Category drop down search setting', 'tcd-w'); ?>3</h4>
     <ul>
      <li>
       <span class="label"><?php _e('Category', 'tcd-w'); ?></span>
       <select name="dp_options[show_search_form_category3]">
        <option value=""><?php _e('Not display', 'tcd-w'); ?></option>
        <?php
          foreach ( $categories_options as $key => $value ) :
            if ( $dp_options['show_search_form_category3'] == $key ) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
            echo '<option value="' . esc_attr( $key ) . '" ' . $selected . '>' . esc_html( implode( ', ', (array) $value ) ) . '</option>' ."\n";
          endforeach;
        ?>
       </select>
      </li>
      <li>
       <span class="label"><?php _e('Placeholder', 'tcd-w'); ?></span>
       <input type="text" class="regular-text" name="dp_options[search_form_category3_placeholder]" value="<?php echo esc_attr( $dp_options['search_form_category3_placeholder'] ); ?>" />
      </li>
     </ul>
    </div>
    <div class="searcn_post_type-introduce" <?php if ($dp_options['searcn_post_type'] != 'introduce') echo 'style="display:none;"'; ?>>
     <h4 class="theme_option_headline2"><?php _e('Keyword search setting', 'tcd-w'); ?></h4>
     <ul>
      <li><label><input type="checkbox" id="dp_options[show_search_form_keywords_introduce]" name="dp_options[show_search_form_keywords_introduce]" value="1" <?php checked( '1', $dp_options['show_search_form_keywords_introduce'] ); ?> /> <?php _e('Display keywords input', 'tcd-w'); ?></label></li>
      <li>
       <span class="label"><?php _e('Placeholder', 'tcd-w'); ?></span>
       <input type="text" class="regular-text" name="dp_options[search_form_keywords_placeholder_introduce]" value="<?php echo esc_attr( $dp_options['search_form_keywords_placeholder_introduce'] ); ?>" />
      </li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Category drop down search setting', 'tcd-w'); ?>1</h4>
     <ul>
      <li>
       <span class="label"><?php _e('Introduce category', 'tcd-w'); ?></span>
       <select name="dp_options[show_search_form_category1_introduce]">
        <option value=""><?php _e('Not display', 'tcd-w'); ?></option>
        <?php
          $categories_options = array(
            'introduce_category1' => $dp_options['introduce_category1_label'],
            'introduce_category2' => $dp_options['introduce_category2_label'],
            'introduce_category3' => $dp_options['introduce_category3_label']
          );
          foreach ( $categories_options as $key => $value ) :
            if ( $dp_options['show_search_form_category1_introduce'] == $key ) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
            echo '<option value="' . esc_attr( $key ) . '" ' . $selected . '>' . esc_html( implode( ', ', (array) $value ) ) . '</option>' ."\n";
          endforeach;
        ?>
       </select>
      </li>
      <li>
       <span class="label"><?php _e('Placeholder', 'tcd-w'); ?></span>
       <input type="text" class="regular-text" name="dp_options[search_form_category1_placeholder_introduce]" value="<?php echo esc_attr( $dp_options['search_form_category1_placeholder_introduce'] ); ?>" />
      </li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Category drop down search setting', 'tcd-w'); ?>2</h4>
     <ul>
      <li>
       <span class="label"><?php _e('Introduce category', 'tcd-w'); ?></span>
       <select name="dp_options[show_search_form_category2_introduce]">
        <option value=""><?php _e('Not display', 'tcd-w'); ?></option>
        <?php
          foreach ( $categories_options as $key => $value ) :
            if ( $dp_options['show_search_form_category2_introduce'] == $key ) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
            echo '<option value="' . esc_attr( $key ) . '" ' . $selected . '>' . esc_html( implode( ', ', (array) $value ) ) . '</option>' ."\n";
          endforeach;
        ?>
       </select>
      </li>
      <li>
       <span class="label"><?php _e('Placeholder', 'tcd-w'); ?></span>
       <input type="text" class="regular-text" name="dp_options[search_form_category2_placeholder_introduce]" value="<?php echo esc_attr( $dp_options['search_form_category2_placeholder_introduce'] ); ?>" />
      </li>
     </ul>
     <h4 class="theme_option_headline2"><?php _e('Category drop down search setting', 'tcd-w'); ?>3</h4>
     <ul>
      <li>
       <span class="label"><?php _e('Introduce category', 'tcd-w'); ?></span>
       <select name="dp_options[show_search_form_category3_introduce]">
        <option value=""><?php _e('Not display', 'tcd-w'); ?></option>
        <?php
          foreach ( $categories_options as $key => $value ) :
            if ( $dp_options['show_search_form_category3_introduce'] == $key ) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
            echo '<option value="' . esc_attr( $key ) . '" ' . $selected . '>' . esc_html( implode( ', ', (array) $value ) ) . '</option>' ."\n";
          endforeach;
        ?>
       </select>
      </li>
      <li>
       <span class="label"><?php _e('Placeholder', 'tcd-w'); ?></span>
       <input type="text" class="regular-text" name="dp_options[search_form_category3_placeholder_introduce]" value="<?php echo esc_attr( $dp_options['search_form_category3_placeholder_introduce'] ); ?>" />
      </li>
     </ul>
    </div>
    <h4 class="theme_option_headline2"><?php _e('Search Button setting', 'tcd-w'); ?></h4>
    <ul>
     <li>
      <span class="label"><?php _e('Button text', 'tcd-w'); ?></span>
      <input type="text" class="regular-text" name="dp_options[search_form_button_text]" value="<?php echo esc_attr( $dp_options['search_form_button_text'] ); ?>" />
     </li>
     <li>
      <span class="label"><?php _e('Background color', 'tcd-w'); ?></span>
      <input type="text" class="c-color-picker" name="dp_options[search_form_button_bg_color]" value="<?php echo esc_attr( $dp_options['search_form_button_bg_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['search_form_button_bg_color'] ); ?>" />
     </li>
     <li>
      <span class="label"><?php _e('Opacity of background', 'tcd-w'); ?></span>
      <input type="text" class="font_size hankaku" name="dp_options[search_form_button_bg_opacity]" value="<?php echo esc_attr( $dp_options['search_form_button_bg_opacity'] ); ?>" />
     </li>
     <li><?php _e('Please enter the number 0 - 1.0. (e.g. 0)', 'tcd-w'); ?></li>
     <li>
      <span class="label"><?php _e('Background hover color', 'tcd-w'); ?></span>
      <input type="text" class="c-color-picker" name="dp_options[search_form_button_bg_color_hover]" value="<?php echo esc_attr( $dp_options['search_form_button_bg_color_hover'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['search_form_button_bg_color_hover'] ); ?>" />
     </li>
     <li>
      <span class="label"><?php _e('Opacity of background hover', 'tcd-w'); ?></span>
      <input type="text" class="font_size hankaku" name="dp_options[search_form_button_bg_opacity_hover]" value="<?php echo esc_attr( $dp_options['search_form_button_bg_opacity_hover'] ); ?>" />
     </li>
     <li><?php _e('Please enter the number 0 - 1.0. (e.g. 1.0)', 'tcd-w'); ?></li>
    </ul>
    <h4 class="theme_option_headline2"><?php _e('Background color', 'tcd-w'); ?></h4>
    <input type="text" class="c-color-picker" name="dp_options[search_bar_bg_color]" value="<?php echo esc_attr( $dp_options['search_bar_bg_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['search_bar_bg_color'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e( 'Opacity of background over header content', 'tcd-w' ); ?></h4>
    <p><?php _e('When you set the header content display setting on the top page, you can set the search bar background transparency displayed on the header content.<br>Please enter the number 0 - 1.0. (e.g. 0.6)', 'tcd-w'); ?></p>
    <input type="text" class="font_size hankaku" name="dp_options[index_search_bar_bg_opacity]" value="<?php echo esc_attr( $dp_options['index_search_bar_bg_opacity'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Display bar other than the top page', 'tcd-w'); ?></h4>
    <label><input name="dp_options[show_search_bar_subpage]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_search_bar_subpage'] ); ?> /> <?php _e('Display the search bar outside the top page', 'tcd-w'); ?></label>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // 検索結果ページ設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Setting the search result page', 'tcd-w'); ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Headline', 'tcd-w'); ?></h4>
    <input type="text" class="regular-text" name="dp_options[search_results_headline]" value="<?php echo esc_attr( $dp_options['search_results_headline'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Refine search', 'tcd-w'); ?></h4>
    <p><label><input type="checkbox" id="dp_options[show_search_results_tag_filter]" name="dp_options[show_search_results_tag_filter]" value="1" <?php checked( '1', $dp_options['show_search_results_tag_filter'] ); ?> /> <?php _e('Use Refine search by tag', 'tcd-w'); ?></label><p>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

  </div><!-- END #tab-content7 -->





  <!-- #tab-content8 ヘッダー　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
  <div id="tab-content8">

   <?php // ヘッダーの固定設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Header position', 'tcd-w'); ?></h3>
    <fieldset class="cf select_type2">
     <?php
           foreach ( $header_fix_options as $option ) {
             if ( $dp_options['header_fix'] == $option['value'] ) {
               $checked = "checked=\"checked\"";
             } else {
               $checked = '';
             }
      ?>
     <label class="description">
      <input type="radio" name="dp_options[header_fix]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
      <?php echo $option['label']; ?>
     </label>
     <?php } ?>
    </fieldset>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // スマホヘッダーの固定設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Header position for mobile device', 'tcd-w'); ?></h3>
    <fieldset class="cf select_type2">
     <?php
           foreach ( $header_fix_options as $option ) {
             if ( $dp_options['mobile_header_fix'] == $option['value'] ) {
               $checked = "checked=\"checked\"";
             } else {
               $checked = '';
             }
     ?>
     <label class="description">
      <input type="radio" name="dp_options[mobile_header_fix]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
      <?php echo $option['label']; ?>
     </label>
     <?php } ?>
    </fieldset>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // Color設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Color of header', 'tcd-w'); ?></h3>
    <h4 class="theme_option_headline2"><?php _e( 'Text color', 'tcd-w' ); ?></h4>
    <input type="text" class="c-color-picker" name="dp_options[header_text_color]" value="<?php echo esc_attr( $dp_options['header_text_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['header_text_color'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Background color', 'tcd-w'); ?></h4>
    <input type="text" class="c-color-picker" name="dp_options[header_bg_color]" value="<?php echo esc_attr( $dp_options['header_bg_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['header_bg_color'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e( 'Opacity of background over header content', 'tcd-w' ); ?></h4>
    <p><?php _e('If you set the header content display setting on the top page, you can set the header bar background transparency displayed on the header content.<br>Please enter the number 0 - 1.0. (e.g. 0)', 'tcd-w'); ?></p>
    <input type="text"class="font_size hankaku" name="dp_options[index_header_bg_opacity]" value="<?php echo esc_attr( $dp_options['index_header_bg_opacity'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e( 'Text color for fixed header', 'tcd-w' ); ?></h4>
    <input type="text" class="c-color-picker" name="dp_options[header_fix_text_color]" value="<?php echo esc_attr( $dp_options['header_fix_text_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['header_fix_text_color'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Background color for fixed header', 'tcd-w'); ?></h4>
    <input type="text" class="c-color-picker" name="dp_options[header_fix_bg_color]" value="<?php echo esc_attr( $dp_options['header_fix_bg_color'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['header_fix_bg_color'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Opacity of background for fixed header', 'tcd-w'); ?></h4>
    <p><?php _e('Please set it only when fixed header display is set. Please enter the number 0 - 1.0. (e.g. 0.8)', 'tcd-w'); ?></p>
    <input type="text" class="font_size hankaku" name="dp_options[header_fix_bg_opacity]" value="<?php echo esc_attr( $dp_options['header_fix_bg_opacity'] ); ?>" />
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

  </div><!-- END #tab-content8 -->




  <!-- #tab-content9 フッター　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
  <div id="tab-content9">

   <?php // カテゴリーメニュー ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Category menu display setting', 'tcd-w'); ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Background color', 'tcd-w'); ?></h4>
    <input type="text" class="c-color-picker" name="dp_options[footer_bg_color1]" value="<?php echo esc_attr( $dp_options['footer_bg_color1'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['footer_bg_color1'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Display setting of Menu1', 'tcd-w'); ?></h4>
    <fieldset class="cf select_type2">
     <?php
           foreach ( $footer_nav_type_options as $option ) {
             if ( $dp_options['footer_nav_type1'] == $option['value'] ) {
               $checked = "checked=\"checked\"";
             } else {
               $checked = '';
             }
     ?>
     <label class="description">
      <input type="radio" name="dp_options[footer_nav_type1]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
      <?php echo $option['label']; ?>
     </label>
     <?php } ?>
    </fieldset>
    <h4 class="theme_option_headline2"><?php _e('Category to be displayed on menu1', 'tcd-w'); ?></h4>
    <fieldset class="cf select_type2">
     <?php
         $categories_options = array(
            'category' => $dp_options['category_label'],
            'category2' => $dp_options['category2_label'],
            'category3' => $dp_options['category3_label'],
            'introduce_category1' => $dp_options['introduce_category1_label'],
            'introduce_category2' => $dp_options['introduce_category2_label'],
            'introduce_category3' => $dp_options['introduce_category3_label']
         );
         foreach ( $categories_options as $key => $value ) :
             if ( $dp_options['footer_nav_category1'] == $key ) {
               $checked = "checked=\"checked\"";
             } else {
               $checked = '';
             }
     ?>
     <label class="description">
      <input type="radio" name="dp_options[footer_nav_category1]" value="<?php echo esc_attr( $key ); ?>" <?php echo $checked; ?> />
      <?php echo esc_html( $value ); ?>
     </label>
     <?php endforeach; ?>
    </fieldset>
    <h4 class="theme_option_headline2"><?php _e('Display setting of Menu2', 'tcd-w'); ?></h4>
    <fieldset class="cf select_type2">
     <?php
           foreach ( $footer_nav_type_options as $option ) {
             if ( $dp_options['footer_nav_type2'] == $option['value'] ) {
               $checked = "checked=\"checked\"";
             } else {
               $checked = '';
             }
     ?>
     <label class="description">
      <input type="radio" name="dp_options[footer_nav_type2]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
      <?php echo $option['label']; ?>
     </label>
     <?php } ?>
    </fieldset>
    <h4 class="theme_option_headline2"><?php _e('Category to be displayed on menu2', 'tcd-w'); ?></h4>
    <fieldset class="cf select_type2">
     <?php
         $categories_options = array(
            'category' => $dp_options['category_label'],
            'category2' => $dp_options['category2_label'],
            'category3' => $dp_options['category3_label'],
            'introduce_category1' => $dp_options['introduce_category1_label'],
            'introduce_category2' => $dp_options['introduce_category2_label'],
            'introduce_category3' => $dp_options['introduce_category3_label']
         );
         foreach ( $categories_options as $key => $value ) :
             if ( $dp_options['footer_nav_category2'] == $key ) {
               $checked = "checked=\"checked\"";
             } else {
               $checked = '';
             }
     ?>
     <label class="description">
      <input type="radio" name="dp_options[footer_nav_category2]" value="<?php echo esc_attr( $key ); ?>" <?php echo $checked; ?> />
      <?php echo esc_html( $value ); ?>
     </label>
     <?php endforeach; ?>
    </fieldset>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // footer widget ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Setting footer area contents', 'tcd-w'); ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Background color', 'tcd-w'); ?></h4>
    <input type="text" class="c-color-picker" name="dp_options[footer_bg_color2]" value="<?php echo esc_attr( $dp_options['footer_bg_color2'] ); ?>" data-default-color="<?php echo esc_attr( $dp_default_options['footer_bg_color2'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Setting for contents', 'tcd-w'); ?></h4>
    <fieldset class="cf select_type2 footer_widget_type-radios">
     <?php
           foreach ( $footer_widget_options as $option ) {
             if ( $dp_options['footer_widget_type'] == $option['value'] ) {
               $checked = "checked=\"checked\"";
             } else {
               $checked = '';
             }
     ?>
     <label class="description">
      <input type="radio" name="dp_options[footer_widget_type]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
      <?php echo $option['label']; ?>
     </label>
     <?php } ?>
    </fieldset>

    <div class="footer_widget_type-type1" style="<?php if ($dp_options['footer_widget_type'] == 'type1') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
     <p><?php printf(__('Please set footer widget from <a href="%s"> widget setting </a>.', 'tcd-w'), admin_url('widgets.php')); ?></p>
    </div>

    <div class="footer_widget_type-type2" style="margin-top:20px;<?php if ($dp_options['footer_widget_type'] == 'type2') { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
     <div class="sub_box cf">
      <h3 class="theme_option_subbox_headline"><?php _e('Footer AdSense', 'tcd-w'); ?></h3>
      <div class="sub_box_content">
       <div class="theme_option_content">
        <h4 class="theme_option_headline2"><?php _e('AdSense code', 'tcd-w'); ?></h4>
        <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w'); ?></p>
        <textarea id="dp_options[footer_ad_code]" class="large-text" cols="50" rows="10" name="dp_options[footer_ad_code]"><?php echo esc_textarea( $dp_options['footer_ad_code'] ); ?></textarea>
       </div>
       <p><?php _e('If you are not using google adsense, you can register your image and url individually.', 'tcd-w'); ?></p>
       <div class="theme_option_content">
        <h4 class="theme_option_headline2"><?php _e('AdSense image.', 'tcd-w'); _e('Recommend size. Width:300px Height:250px', 'tcd-w'); ?></h4>
        <div class="image_box cf">
         <div class="cf cf_media_field hide-if-no-js footer_ad_image">
          <input type="hidden" value="<?php echo esc_attr( $dp_options['footer_ad_image'] ); ?>" id="footer_ad_image" name="dp_options[footer_ad_image]" class="cf_media_id">
          <div class="preview_field"><?php if($dp_options['footer_ad_image']){ echo wp_get_attachment_image($dp_options['footer_ad_image'], 'medium'); }; ?></div>
          <div class="buttton_area">
           <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
           <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['footer_ad_image']){ echo 'hidden'; }; ?>">
          </div>
         </div>
        </div>
       </div>
       <div class="theme_option_content">
        <h4 class="theme_option_headline2"><?php _e('AdSense url', 'tcd-w'); ?></h4>
        <input id="dp_options[footer_ad_url]" class="large-text" type="text" name="dp_options[footer_ad_url]" value="<?php echo esc_attr( $dp_options['footer_ad_url'] ); ?>" />
        <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
       </div>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <div class="sub_box cf">
      <h3 class="theme_option_subbox_headline"><?php _e('Footer AdSense for mobile', 'tcd-w'); ?></h3>
      <div class="sub_box_content">
       <div class="theme_option_content">
        <h4 class="theme_option_headline2"><?php _e('AdSense code', 'tcd-w'); ?></h4>
        <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w'); ?></p>
        <textarea id="dp_options[footer_ad_code_mobile]" class="large-text" cols="50" rows="10" name="dp_options[footer_ad_code_mobile]"><?php echo esc_textarea( $dp_options['footer_ad_code_mobile'] ); ?></textarea>
       </div>
       <p><?php _e('If you are not using google adsense, you can register your image and url individually.', 'tcd-w'); ?></p>
       <div class="theme_option_content">
        <h4 class="theme_option_headline2"><?php _e('AdSense image.', 'tcd-w'); _e('Recommend size. Width:300px Height:250px', 'tcd-w'); ?></h4>
        <div class="image_box cf">
         <div class="cf cf_media_field hide-if-no-js footer_ad_image_mobile">
          <input type="hidden" value="<?php echo esc_attr( $dp_options['footer_ad_image_mobile'] ); ?>" id="footer_ad_image_mobile" name="dp_options[footer_ad_image_mobile]" class="cf_media_id">
          <div class="preview_field"><?php if($dp_options['footer_ad_image_mobile']){ echo wp_get_attachment_image($dp_options['footer_ad_image_mobile'], 'medium'); }; ?></div>
          <div class="buttton_area">
           <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
           <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['footer_ad_image_mobile']){ echo 'hidden'; }; ?>">
          </div>
         </div>
        </div>
       </div>
       <div class="theme_option_content">
        <h4 class="theme_option_headline2"><?php _e('AdSense url', 'tcd-w'); ?></h4>
        <input id="dp_options[footer_ad_url_mobile]" class="large-text" type="text" name="dp_options[footer_ad_url_mobile]" value="<?php echo esc_attr( $dp_options['footer_ad_url_mobile'] ); ?>" />
        <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
       </div>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <div class="sub_box cf">
      <h3 class="theme_option_subbox_headline"><?php _e('Footer menu1', 'tcd-w'); ?></h3>
      <div class="sub_box_content">
       <div class="theme_option_content">
        <h4 class="theme_option_headline2"><?php _e('Select menu', 'tcd-w'); ?></h4>
        <select id="dp_options[footer_menu1]" name="dp_options[footer_menu1]">
         <option value=""><?php printf( '&mdash; %s &mdash;', __( 'Select a Menu' ) ); ?></option>
         <?php
           $nav_menus = wp_get_nav_menus();
           if ($nav_menus) {
             foreach($nav_menus as $menu) {
               if ($dp_options['footer_menu1'] == $menu->term_id) {
                 $selected = "selected=\"selected\"";
               } else {
                 $selected = '';
               }
               echo '<option value="'.esc_attr($menu->term_id).'" '.$selected.'>'.wp_html_excerpt( $menu->name, 40, '&hellip;' ).'</option>';
             }
           }
         ?>
        </select>
        <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
       </div>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <div class="sub_box cf">
      <h3 class="theme_option_subbox_headline"><?php _e('Footer menu2', 'tcd-w'); ?></h3>
      <div class="sub_box_content">
       <div class="theme_option_content">
        <h4 class="theme_option_headline2"><?php _e('Select menu', 'tcd-w'); ?></h4>
        <select id="dp_options[footer_menu2]" name="dp_options[footer_menu2]">
         <option value=""><?php printf( '&mdash; %s &mdash;', __( 'Select a Menu' ) ); ?></option>
         <?php
           if ($nav_menus) {
             foreach($nav_menus as $menu) {
               if ($dp_options['footer_menu2'] == $menu->term_id) {
                 $selected = "selected=\"selected\"";
               } else {
                 $selected = '';
               }
               echo '<option value="'.esc_attr($menu->term_id).'" '.$selected.'>'.wp_html_excerpt( $menu->name, 40, '&hellip;' ).'</option>';
             }
           }
         ?>
        </select>
        <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
       </div>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <div class="sub_box cf">
      <h3 class="theme_option_subbox_headline"><?php _e('Footer image banner', 'tcd-w'); ?>1</h3>
      <div class="sub_box_content">
       <div class="theme_option_content">
        <h4 class="theme_option_headline2"><?php _e('Banner title', 'tcd-w'); ?></h4>
        <input id="dp_options[footer_banner_title1]" class="large-text" type="text" name="dp_options[footer_banner_title1]" value="<?php echo esc_attr( $dp_options['footer_banner_title1'] ); ?>" />
       </div>
       <div class="theme_option_content">
        <h4 class="theme_option_headline2"><?php _e('Banner url', 'tcd-w'); ?></h4>
        <input id="dp_options[footer_banner_url1]" class="large-text" type="text" name="dp_options[footer_banner_url1]" value="<?php echo esc_attr( $dp_options['footer_banner_url1'] ); ?>" />
        <p><label><input id="dp_options[footer_banner_target_blank1]" name="dp_options[footer_banner_target_blank1]" type="checkbox" value="1" <?php checked( '1', $dp_options['footer_banner_target_blank1'] ); ?> /> <?php _e('Open link in new window', 'tcd-w'); ?></label></p>
       </div>
       <div class="theme_option_content">
        <h4 class="theme_option_headline2"><?php _e('Banner image.', 'tcd-w'); _e('Recommend size. Width:368px Height:110px', 'tcd-w'); ?></h4>
        <div class="image_box cf">
         <div class="cf cf_media_field hide-if-no-js footer_banner_image1">
          <input type="hidden" value="<?php echo esc_attr( $dp_options['footer_banner_image1'] ); ?>" id="footer_banner_image1" name="dp_options[footer_banner_image1]" class="cf_media_id">
          <div class="preview_field"><?php if($dp_options['footer_banner_image1']){ echo wp_get_attachment_image($dp_options['footer_banner_image1'], 'medium'); }; ?></div>
          <div class="buttton_area">
           <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
           <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['footer_banner_image1']){ echo 'hidden'; }; ?>">
          </div>
         </div>
        </div>
        <h4 class="theme_option_headline2"><?php _e('Doropshadow setting', 'tcd-w'); ?></h4>
        <ul>
         <li><label><?php _e('Dropshadow position (left)', 'tcd-w'); ?></label><input id="dp_options[footer_banner_shadow_a1]" class="font_size hankaku" type="text" name="dp_options[footer_banner_shadow_a1]" value="<?php echo esc_attr( $dp_options['footer_banner_shadow_a1'] ); ?>" /><span>px</span></li>
         <li><label><?php _e('Dropshadow position (top)', 'tcd-w'); ?></label><input id="dp_options[footer_banner_shadow_b1]" class="font_size hankaku" type="text" name="dp_options[footer_banner_shadow_b1]" value="<?php echo esc_attr( $dp_options['footer_banner_shadow_b1'] ); ?>" /><span>px</span></li>
         <li><label><?php _e('Dropshadow size', 'tcd-w'); ?></label><input id="dp_options[footer_banner_shadow_c1]" class="font_size hankaku" type="text" name="dp_options[footer_banner_shadow_c1]" value="<?php echo esc_attr( $dp_options['footer_banner_shadow_c1'] ); ?>" /><span>px</span></li>
         <li><label><?php _e('Dropshadow color', 'tcd-w'); ?></label><input type="text" id="footer_banner_shadow_color1" name="dp_options[footer_banner_shadow_color1]" value="<?php echo esc_attr( $dp_options['footer_banner_shadow_color1'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['footer_banner_shadow_color1']); ?>" /></li>
        </ul>
        <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
       </div>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <div class="sub_box cf">
      <h3 class="theme_option_subbox_headline"><?php _e('Footer image banner', 'tcd-w'); ?>2</h3>
      <div class="sub_box_content">
       <div class="theme_option_content">
        <h4 class="theme_option_headline2"><?php _e('Banner title', 'tcd-w'); ?></h4>
        <input id="dp_options[footer_banner_title2]" class="large-text" type="text" name="dp_options[footer_banner_title2]" value="<?php echo esc_attr( $dp_options['footer_banner_title2'] ); ?>" />
       </div>
       <div class="theme_option_content">
        <h4 class="theme_option_headline2"><?php _e('Banner url', 'tcd-w'); ?></h4>
        <input id="dp_options[footer_banner_url2]" class="large-text" type="text" name="dp_options[footer_banner_url2]" value="<?php echo esc_attr( $dp_options['footer_banner_url2'] ); ?>" />
        <p><label><input id="dp_options[footer_banner_target_blank2]" name="dp_options[footer_banner_target_blank2]" type="checkbox" value="1" <?php checked( '1', $dp_options['footer_banner_target_blank2'] ); ?> /> <?php _e('Open link in new window', 'tcd-w'); ?></label></p>
       </div>
       <div class="theme_option_content">
        <h4 class="theme_option_headline2"><?php _e('Banner image.', 'tcd-w'); _e('Recommend size. Width:368px Height:110px', 'tcd-w'); ?></h4>
        <div class="image_box cf">
         <div class="cf cf_media_field hide-if-no-js footer_banner_image2">
          <input type="hidden" value="<?php echo esc_attr( $dp_options['footer_banner_image2'] ); ?>" id="footer_banner_image2" name="dp_options[footer_banner_image2]" class="cf_media_id">
          <div class="preview_field"><?php if($dp_options['footer_banner_image2']){ echo wp_get_attachment_image($dp_options['footer_banner_image2'], 'medium'); }; ?></div>
          <div class="buttton_area">
           <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
           <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$dp_options['footer_banner_image2']){ echo 'hidden'; }; ?>">
          </div>
         </div>
        </div>
        <h4 class="theme_option_headline2"><?php _e('Doropshadow setting', 'tcd-w'); ?></h4>
        <ul>
         <li><label><?php _e('Dropshadow position (left)', 'tcd-w'); ?></label><input id="dp_options[footer_banner_shadow_a2]" class="font_size hankaku" type="text" name="dp_options[footer_banner_shadow_a2]" value="<?php echo esc_attr( $dp_options['footer_banner_shadow_a2'] ); ?>" /><span>px</span></li>
         <li><label><?php _e('Dropshadow position (top)', 'tcd-w'); ?></label><input id="dp_options[footer_banner_shadow_b2]" class="font_size hankaku" type="text" name="dp_options[footer_banner_shadow_b2]" value="<?php echo esc_attr( $dp_options['footer_banner_shadow_b2'] ); ?>" /><span>px</span></li>
         <li><label><?php _e('Dropshadow size', 'tcd-w'); ?></label><input id="dp_options[footer_banner_shadow_c2]" class="font_size hankaku" type="text" name="dp_options[footer_banner_shadow_c2]" value="<?php echo esc_attr( $dp_options['footer_banner_shadow_c2'] ); ?>" /><span>px</span></li>
         <li><label><?php _e('Dropshadow color', 'tcd-w'); ?></label><input type="text" id="footer_banner_shadow_color1" name="dp_options[footer_banner_shadow_color2]" value="<?php echo esc_attr( $dp_options['footer_banner_shadow_color2'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['footer_banner_shadow_color2']); ?>" /></li>
        </ul>
        <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
       </div>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
    </div>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // SNSボタン ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('SNS button setting', 'tcd-w'); ?></h3>
    <p><?php _e('Enter url of your twitter, facebook and instagram page. If it is blank SNS button will not be shown.', 'tcd-w'); ?></p>
    <ul>
     <li>
      <label style="display:inline-block; min-width:140px;"><?php _e('your twitter URL', 'tcd-w'); ?></label>
      <input id="dp_options[twitter_url]" class="regular-text" type="text" name="dp_options[twitter_url]" value="<?php echo esc_attr( $dp_options['twitter_url'] ); ?>" />
     </li>
     <li>
      <label style="display:inline-block; min-width:140px;"><?php _e('your facebook URL', 'tcd-w'); ?></label>
      <input id="dp_options[facebook_url]" class="regular-text" type="text" name="dp_options[facebook_url]" value="<?php echo esc_attr( $dp_options['facebook_url'] ); ?>" />
     </li>
     <li>
      <label style="display:inline-block; min-width:140px;"><?php _e('your instagram URL', 'tcd-w'); ?></label>
      <input id="dp_options[insta_url]" class="regular-text" type="text" name="dp_options[insta_url]" value="<?php echo esc_attr( $dp_options['insta_url'] ); ?>" />
     </li>
    </ul>
    <hr />
    <p><label><input id="dp_options[show_rss]" name="dp_options[show_rss]" type="checkbox" value="1" <?php checked( '1', $dp_options['show_rss'] ); ?> /> <?php _e('Display RSS button', 'tcd-w'); ?></label></p>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // フッターバーの設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e( 'Setting of the footer bar for smart phone', 'tcd-w' ); ?></h3>
    <p><?php _e( 'Please set the footer bar which is displayed with smart phone.', 'tcd-w' ); ?>

    <h4 class="theme_option_headline2"><?php _e('Display type of the footer bar', 'tcd-w'); ?></h4>
    <fieldset class="cf select_type2">
     <?php
           foreach ( $footer_bar_display_options as $option ) {
             if ( $dp_options['footer_bar_display'] == $option['value'] ) {
               $checked = "checked=\"checked\"";
             } else {
               $checked = '';
             }
     ?>
     <label class="description">
      <input type="radio" name="dp_options[footer_bar_display]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
      <?php echo $option['label']; ?>
     </label>
     <?php } ?>
    </fieldset>

    <h4 class="theme_option_headline2"><?php _e('Settings for the appearance of the footer bar', 'tcd-w'); ?></h4>
    <p>
     <?php _e('Background color', 'tcd-w'); ?>
     <input type="text" id="footer_bar_bg" name="dp_options[footer_bar_bg]" value="<?php echo esc_attr( $dp_options['footer_bar_bg'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['footer_bar_bg']); ?>" />
    </p>
    <p>
     <?php _e('Border color', 'tcd-w'); ?>
     <input type="text" id="footer_bar_border" name="dp_options[footer_bar_border]" value="<?php echo esc_attr( $dp_options['footer_bar_border'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['footer_bar_border']); ?>" />
    </p>
    <p>
     <?php _e('Font color', 'tcd-w'); ?>
     <input type="text" id="footer_bar_color" name="dp_options[footer_bar_color]" value="<?php echo esc_attr( $dp_options['footer_bar_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($dp_default_options['footer_bar_color']); ?>" />
    </p>
    <p>
     <?php _e('Opacity of background', 'tcd-w'); ?>
     <input id="dp_options[footer_bar_tp]" class="font_size hankaku" type="text" name="dp_options[footer_bar_tp]" value="<?php echo esc_attr( $dp_options['footer_bar_tp'] ); ?>" /><br>
     <?php _e('Please enter the number 0 - 1.0. (e.g. 0.8)', 'tcd-w'); ?>
    </p>

    <h4 class="theme_option_headline2"><?php _e('Settings for the contents of the footer bar', 'tcd-w'); ?></h4>
    <p><?php _e( 'You can display the button with icon in footer bar. (We recommend you to set max 4 buttons.)', 'tcd-w' ); ?><br><?php _e( 'You can select button types below.', 'tcd-w' ); ?></p>
    <table class="table-border">
     <tr>
      <th><?php _e( 'Default', 'tcd-w' ); ?></th>
      <td><?php _e( 'You can set link URL.', 'tcd-w' ); ?></td>
     </tr>
     <tr>
      <th><?php _e( 'Share', 'tcd-w' ); ?></th>
      <td><?php _e( 'Share buttons are displayed if you tap this button.', 'tcd-w' ); ?></td>
     </tr>
     <tr>
      <th><?php _e( 'Telephone', 'tcd-w' ); ?></th>
      <td><?php _e( 'You can call this number.', 'tcd-w' ); ?></td>
     </tr>
    </table>
    <p><?php _e( 'Click "Add item", and set the button for footer bar. You can drag the item to change their order.', 'tcd-w' ); ?></p>
    <div class="repeater-wrapper">
     <div class="repeater sortable" data-delete-confirm="<?php _e( 'Delete?', 'tcd-w' ); ?>">
<?php
    if ( $dp_options['footer_bar_btns'] ) :
      foreach ( $dp_options['footer_bar_btns'] as $key => $value ) :
?>
      <div class="sub_box repeater-item repeater-item-<?php echo esc_attr( $key ); ?>">
       <h4 class="theme_option_subbox_headline"><?php echo esc_attr( $value['label'] ); ?></h4>
       <div class="sub_box_content">
        <p class="footer-bar-target" style="<?php if ( $value['type'] !== 'type1' ) { echo 'display: none;'; } ?>"><label><input name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][target]" type="checkbox" value="1" <?php checked( $value['target'], 1 ); ?>><?php _e( 'Open with new window', 'tcd-w' ); ?></label></p>
        <table class="table-repeater">
         <tr class="footer-bar-type">
          <th><label><?php _e( 'Button type', 'tcd-w' ); ?></label></th>
          <td>

           <select name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][type]">
            <?php foreach( $footer_bar_button_options as $option ) : ?>
            <option value="<?php echo esc_attr( $option['value'] ); ?>" <?php selected( $value['type'], $option['value'] ); ?>><?php esc_html_e( $option['label'], 'tcd-w' ); ?></option>
            <?php endforeach; ?>
           </select>
          </td>
         </tr>
         <tr>
          <th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_label]"><?php _e( 'Button label', 'tcd-w' ); ?></label></th>
          <td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_label]" class="regular-text repeater-label" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][label]" value="<?php echo esc_attr( $value['label'] ); ?>"></td>
         </tr>
         <tr class="footer-bar-url" style="<?php if ( $value['type'] !== 'type1' ) { echo 'display: none;'; } ?>">
          <th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_url]"><?php _e( 'Link URL', 'tcd-w' ); ?></label></th>
          <td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_url]" class="regular-text" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][url]" value="<?php echo esc_attr( $value['url'] ); ?>"></td>
         </tr>
         <tr class="footer-bar-number" style="<?php if ( $value['type'] !== 'type3' ) { echo 'display: none;'; } ?>">
          <th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_number]"><?php _e( 'Phone number', 'tcd-w' ); ?></label></th>
          <td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_number]" class="regular-text" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][number]" value="<?php echo esc_attr( $value['number'] ); ?>"></td>
         </tr>
         <tr>
          <th><?php _e( 'Button icon', 'tcd-w' ); ?></th>
          <td>
           <?php foreach( $footer_bar_icon_options as $option ) : ?>
           <p><label><input type="radio" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][icon]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $value['icon'] ); ?>><span class="icon icon-<?php echo esc_attr( $option['value'] ); ?>"></span><?php esc_html_e( $option['label'], 'tcd-w' ); ?></label></p>
           <?php endforeach; ?>
          </td>
         </tr>
        </table>
        <p class="delete-row right-align"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a></p>
       </div>
      </div>
<?php
      endforeach;
    endif;

    $key = 'addindex';
    ob_start();
?>
      <div class="sub_box repeater-item repeater-item-<?php echo $key; ?>">
       <h4 class="theme_option_subbox_headline"><?php _e( 'New item', 'tcd-w' ); ?></h4>
       <div class="sub_box_content">
        <p class="footer-bar-target"><label><input name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][target]" type="checkbox" value="1"><?php _e( 'Open with new window', 'tcd-w' ); ?></label></p>
        <table class="table-repeater">
         <tr class="footer-bar-type">
          <th><label><?php _e( 'Button type', 'tcd-w' ); ?></label></th>
          <td>
           <select name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][type]">
            <?php foreach( $footer_bar_button_options as $option ) : ?>
            <option value="<?php echo esc_attr( $option['value'] ); ?>"><?php esc_html_e( $option['label'], 'tcd-w' ); ?></option>
            <?php endforeach; ?>
           </select>
          </td>
         </tr>
         <tr>
          <th><label for="dp_options[repeater_footer_bar_btn<?php echo esc_attr( $key ); ?>_label]"><?php _e( 'Button label', 'tcd-w' ); ?></label></th>
          <td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_label]" class="regular-text repeater-label" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][label]" value=""></td>
         </tr>
         <tr class="footer-bar-url">
          <th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_url]"><?php _e( 'Link URL', 'tcd-w' ); ?></label></th>
          <td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_url]" class="regular-text" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][url]" value=""></td>
         </tr>
         <tr class="footer-bar-number" style="display: none;">
          <th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_number]"><?php _e( 'Phone number', 'tcd-w' ); ?></label></th>
          <td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_number]" class="regular-text" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][number]" value=""></td>
         </tr>
         <tr>
          <th><?php _e( 'Button icon', 'tcd-w' ); ?></th>
          <td>
           <?php foreach( $footer_bar_icon_options as $option ) : ?>
           <p><label><input type="radio" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][icon]" value="<?php echo esc_attr( $option['value'] ); ?>"<?php if ( 'file-text' == $option['value'] ) { echo ' checked="checked"'; } ?>><span class="icon icon-<?php echo esc_attr( $option['value'] ); ?>"></span><?php esc_html_e( $option['label'], 'tcd-w' ); ?></label></p>
           <?php endforeach; ?>
          </td>
         </tr>
        </table>
        <p class="delete-row right-align"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a></p>
       </div>
      </div>
<?php
    $clone = ob_get_clean();
?>
     </div>
     <a href="#" class="button button-secondary button-add-row" data-clone="<?php echo esc_attr( $clone ); ?>"><?php _e( 'Add item', 'tcd-w' ); ?></a>
    </div>
    <input type="submit" class="button-ml" value="<?php _e( 'Save Changes', 'tcd-w' ); ?>">
   </div><!-- END .theme_option_field -->

  </div><!-- END #tab-content9 -->




  <!-- #tab-content10 ページ保護　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
  <div id="tab-content10">

   <?php // 保護ページの設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e( 'Password protected pages settings', 'tcd-w' ); ?></h3>
    <h4 class="theme_option_headline2"><?php _e( 'Password field and button align settings', 'tcd-w' ); ?></h4>
    <fieldset class="cf select_type2">
     <?php foreach ( $pw_align_options as $option ) : ?>
     <label class="description"><input type="radio" name="dp_options[pw_align]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $option['value'], $dp_options['pw_align'] ); ?>><?php _e( $option['label'], 'tcd-w' ); ?></label>
     <?php endforeach; ?>
    </fieldset>
    <h4 class="theme_option_headline2"><?php _e( 'Password field settings', 'tcd-w' ); ?></h4>
    <p><label><?php _e( 'Label', 'tcd-w' ); ?> <input type="text" name="dp_options[pw_label]" value="<?php echo esc_attr( $dp_options['pw_label'] ); ?>"></label></p>
    <h4 class="theme_option_headline2"><?php _e( 'Contents to encourage member registration', 'tcd-w' ); ?></h4>
    <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
    <div class="sub_box">
     <h5 class="theme_option_subbox_headline"><?php echo __( 'Content', 'tcd-w' ) . $i; ?><span><?php if ( $dp_options['pw_name' . $i] ) { echo ' : ' . esc_html( $dp_options['pw_name' . $i] ); } ?></span></h5>
     <div class="sub_box_content">
      <p><label><?php _e( 'Name of contents', 'tcd-w' ); ?> <input type="text" class="theme_option_subbox_headline_label regular-text" name="dp_options[pw_name<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['pw_name' . $i] ); ?>"></label></p>
      <p><?php _e( '"Name of contents" is used in edit post page.', 'tcd-w' ); ?></p>
      <h6 class="theme_option_headline2"><?php _e( 'Button settings', 'tcd-w' ); ?></h6>
      <p><label><input type="checkbox" name="dp_options[pw_btn_display<?php echo $i; ?>]" value="1" <?php checked( 1, $dp_options['pw_btn_display' . $i] ); ?>> <?php _e( 'Display button', 'tcd-w' ); ?></label></p>
      <p><label><?php _e( 'Label', 'tcd-w' ); ?> <input type="text" class="regular-text" name="dp_options[pw_btn_label<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['pw_btn_label' . $i] ); ?>"></label></p>
      <p><label>URL <input type="text" class="regular-text" name="dp_options[pw_btn_url<?php echo $i; ?>]" value="<?php echo esc_attr( $dp_options['pw_btn_url' . $i] ); ?>"></label></p>
      <p><label><input name="dp_options[pw_btn_target<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( 1, $dp_options['pw_btn_target' . $i] ); ?>> <?php _e( 'Open link in new window', 'tcd-w' ); ?></label></p>
      <h6 class="theme_option_headline2"><?php _e( 'Sentences to encourage member registration', 'tcd-w' ); ?></h6>
      <p><?php _e( '"Sentences to encourage member registration" is displayed under excerpts.', 'tcd-w' ); ?></p>
      <?php wp_editor( $dp_options['pw_editor' . $i], 'pw_editor' . $i, array ( 'textarea_name' => 'dp_options[pw_editor' . $i . ']' ) ); ?>
     </div>
    </div>
    <?php endfor; ?>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>">
   </div><!-- END .theme_option_field -->

  </div><!-- END #tab-content10 -->


  </div><!-- END #tab-panel -->

  </form>

  </div><!-- END #my_theme_right -->

 </div><!-- END #my_theme_option -->

</div><!-- END #wrap -->

<?php

 }


/**
 * チェック ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
 */
function theme_options_validate( $input ) {

	global $dp_default_options, $load_time_options, $load_icon_type, $hover_type_options, $hover2_direct_options, $font_type_options, $headline_font_type_options, $responsive_options, $header_content_type_options, $slider_time_options, $post_num3_options, $post_num_options, $header_fix_options, $sns_type_top_options, $sns_type_btm_options, $dp_upload_error, $footer_nav_type_options, $footer_widget_options, $footer_bar_icon_options, $footer_bar_button_options, $footer_bar_display_options, $pw_align_options;

	// 色の設定
	$input['pickedcolor1'] = wp_filter_nohtml_kses( $input['pickedcolor1'] );
	$input['pickedcolor2'] = wp_filter_nohtml_kses( $input['pickedcolor2'] );
	$input['content_link_color'] = wp_filter_nohtml_kses( $input['content_link_color'] );

	// ファビコン
	$input['favicon'] = wp_filter_nohtml_kses( $input['favicon'] );

	// フォントの種類
	if ( ! isset( $input['font_type'] ) || ! array_key_exists( $input['font_type'], $font_type_options ) )
		$input['font_type'] = $dp_default_options['font_type'];
	if ( ! isset( $input['headline_font_type'] ) || ! array_key_exists( $input['headline_font_type'], $headline_font_type_options ) )
		$input['headline_font_type'] = $dp_default_options['headline_font_type'];

	// hover effect
	if ( ! isset( $input['hover_type'] ) || ! array_key_exists( $input['hover_type'], $hover_type_options ) )
		$input['hover_type'] = $dp_default_options['hover_type'];

	// hover1
	$input['hover1_zoom'] = wp_filter_nohtml_kses( $input['hover1_zoom'] );
	// hover2
	if ( ! isset( $input['hover2_direct'] ) || ! array_key_exists( $input['hover2_direct'], $hover2_direct_options ) )
		$input['hover2_direct'] = $dp_default_options['hover2_direct'];
	$input['hover2_opacity'] = wp_filter_nohtml_kses( $input['hover2_opacity'] );
	$input['hover2_bgcolor'] = wp_filter_nohtml_kses( $input['hover2_bgcolor'] );
	// hover3
	$input['hover3_opacity'] = wp_filter_nohtml_kses( $input['hover3_opacity'] );
	$input['hover3_bgcolor'] = wp_filter_nohtml_kses( $input['hover3_bgcolor'] );

	// OGPタグ関連
	$input['use_ogp'] = ! empty( $input['use_ogp'] ) ? 1 : 0;
	$input['fb_admin_id'] = wp_filter_nohtml_kses( $input['fb_admin_id'] );
	$input['ogp_image'] = wp_filter_nohtml_kses( $input['ogp_image'] );
	$input['use_twitter_card'] = ! empty( $input['use_twitter_card'] ) ? 1 : 0;
	$input['twitter_account_name'] = wp_filter_nohtml_kses( $input['twitter_account_name'] );

	// オリジナルスタイルの設定
	$input['css_code'] = $input['css_code'];

	// レスポンシブの設定
	if ( ! isset( $input['responsive'] ) || ! array_key_exists( $input['responsive'], $responsive_options ) )
		$input['responsive'] = $dp_default_options['responsive'];

	// sidebarの設定
	$input['column_float'] = ! empty( $input['column_float'] ) ? 1 : 0;

	// 絵文字の設定
	$input['use_emoji'] = ! empty( $input['use_emoji'] ) ? 1 : 0;

	// ロードアイコンの設定
	$input['use_load_icon'] = ! empty( $input['use_load_icon'] ) ? 1 : 0;
	if ( ! isset( $input['load_time'] ) || ! array_key_exists( $input['load_time'], $load_time_options ) )
		$input['load_time'] = $dp_default_options['load_time'];
	if ( ! isset( $input['load_icon'] ) || ! array_key_exists( $input['load_icon'], $load_icon_type ) )
		$input['load_icon'] = $dp_default_options['load_icon'];

	// 404 ページ
	$input['header_image_404'] = wp_filter_nohtml_kses( $input['header_image_404'] );
	$input['header_txt_404'] = wp_filter_nohtml_kses( $input['header_txt_404'] );
	$input['header_sub_txt_404'] = wp_filter_nohtml_kses( $input['header_sub_txt_404'] );
	$input['header_txt_size_404'] = wp_filter_nohtml_kses( $input['header_txt_size_404'] );
	$input['header_sub_txt_size_404'] = wp_filter_nohtml_kses( $input['header_sub_txt_size_404'] );
	$input['header_txt_size_404_mobile'] = wp_filter_nohtml_kses( $input['header_txt_size_404_mobile'] );
	$input['header_sub_txt_size_404_mobile'] = wp_filter_nohtml_kses( $input['header_sub_txt_size_404_mobile'] );
	$input['header_txt_color_404'] = wp_filter_nohtml_kses( $input['header_txt_color_404'] );
	$input['dropshadow_404_h'] = wp_filter_nohtml_kses( $input['dropshadow_404_h'] );
	$input['dropshadow_404_v'] = wp_filter_nohtml_kses( $input['dropshadow_404_v'] );
	$input['dropshadow_404_b'] = wp_filter_nohtml_kses( $input['dropshadow_404_b'] );
	$input['dropshadow_404_c'] = wp_filter_nohtml_kses( $input['dropshadow_404_c'] );

	// ロゴ
	$input['logo_font_size'] = wp_filter_nohtml_kses( $input['logo_font_size'] );
	$input['logo_font_size_fix'] = wp_filter_nohtml_kses( $input['logo_font_size_fix'] );
	$input['logo_font_size_mobile'] = wp_filter_nohtml_kses( $input['logo_font_size_mobile'] );
	$input['logo_font_size_mobile_fix'] = wp_filter_nohtml_kses( $input['logo_font_size_mobile_fix'] );
	$input['logo_font_size_footer'] = wp_filter_nohtml_kses( $input['logo_font_size_footer'] );
	$input['logo_font_size_footer_mobile'] = wp_filter_nohtml_kses( $input['logo_font_size_footer_mobile'] );
	$input['header_logo_image'] = wp_filter_nohtml_kses( $input['header_logo_image'] );
	$input['header_logo_image_fix'] = wp_filter_nohtml_kses( $input['header_logo_image_fix'] );
	$input['header_logo_image_mobile'] = wp_filter_nohtml_kses( $input['header_logo_image_mobile'] );
	$input['header_logo_image_mobile_fix'] = wp_filter_nohtml_kses( $input['header_logo_image_mobile_fix'] );
	$input['footer_logo_image'] = wp_filter_nohtml_kses( $input['footer_logo_image'] );
	$input['header_logo_retina'] = ! empty( $input['header_logo_retina'] ) ? 1 : 0;
	$input['header_logo_retina_fix'] = ! empty( $input['header_logo_retina_fix'] ) ? 1 : 0;
	$input['header_logo_retina_mobile'] = ! empty( $input['header_logo_retina_mobile'] ) ? 1 : 0;
	$input['header_logo_retina_mobile_fix'] = ! empty( $input['header_logo_retina_mobile_fix'] ) ? 1 : 0;
	$input['footer_logo_retina'] = ! empty( $input['footer_logo_retina'] ) ? 1 : 0;

	// トップページ スライダー
	if ( ! isset( $input['header_content_type'] ) || ! array_key_exists($input['header_content_type'], $header_content_type_options))
		$input['header_content_type'] = $dp_default_options['header_content_type'];
	for ($i = 1; $i <= 5; $i++) {
		$input['slider_image'.$i] = wp_filter_nohtml_kses( $input['slider_image'.$i] );
		$input['slider_image_mobile'.$i] = wp_filter_nohtml_kses( $input['slider_image_mobile'.$i] );
		$input['slider_url'.$i] = wp_filter_nohtml_kses( $input['slider_url'.$i] );
		$input['slider_target'.$i] = ! empty( $input['slider_target'.$i] ) ? 1 : 0;
		$input['use_slider_caption'.$i] = ! empty( $input['use_slider_caption'.$i] ) ? 1 : 0;
		$input['slider_headline'.$i] = wp_filter_nohtml_kses( $input['slider_headline'.$i] );
		$input['slider_headline_font_size'.$i] = wp_filter_nohtml_kses( $input['slider_headline_font_size'.$i] );
		$input['slider_headline_font_size_mobile'.$i] = wp_filter_nohtml_kses( $input['slider_headline_font_size_mobile'.$i] );
		$input['slider_headline_color'.$i] = wp_filter_nohtml_kses( $input['slider_headline_color'.$i] );
		$input['slider_headline_shadow_a'.$i] = wp_filter_nohtml_kses( $input['slider_headline_shadow_a'.$i] );
		$input['slider_headline_shadow_b'.$i] = wp_filter_nohtml_kses( $input['slider_headline_shadow_b'.$i] );
		$input['slider_headline_shadow_c'.$i] = wp_filter_nohtml_kses( $input['slider_headline_shadow_c'.$i] );
		$input['slider_headline_shadow_color'.$i] = wp_filter_nohtml_kses( $input['slider_headline_shadow_color'.$i] );
		$input['slider_caption'.$i] = wp_filter_nohtml_kses( $input['slider_caption'.$i] );
		$input['slider_caption_font_size'.$i] = wp_filter_nohtml_kses( $input['slider_caption_font_size'.$i] );
		$input['slider_caption_font_size_mobile'.$i] = wp_filter_nohtml_kses( $input['slider_caption_font_size_mobile'.$i] );
		$input['slider_caption_color'.$i] = wp_filter_nohtml_kses( $input['slider_caption_color'.$i] );
		$input['slider_caption_shadow_a'.$i] = wp_filter_nohtml_kses( $input['slider_caption_shadow_a'.$i] );
		$input['slider_caption_shadow_b'.$i] = wp_filter_nohtml_kses( $input['slider_caption_shadow_b'.$i] );
		$input['slider_caption_shadow_c'.$i] = wp_filter_nohtml_kses( $input['slider_caption_shadow_c'.$i] );
		$input['slider_caption_shadow_color'.$i] = wp_filter_nohtml_kses( $input['slider_caption_shadow_color'.$i] );
		$input['show_slider_button'.$i] = ! empty( $input['show_slider_button'.$i] ) ? 1 : 0;
		$input['slider_button'.$i] = wp_filter_nohtml_kses( $input['slider_button'.$i] );
		$input['slider_button_color'.$i] = wp_filter_nohtml_kses( $input['slider_button_color'.$i] );
		$input['slider_button_bg_color'.$i] = wp_filter_nohtml_kses( $input['slider_button_bg_color'.$i] );
		$input['slider_button_border_color'.$i] = wp_filter_nohtml_kses( $input['slider_button_border_color'.$i] );
		$input['slider_button_color_hover'.$i] = wp_filter_nohtml_kses( $input['slider_button_color_hover'.$i] );
		$input['slider_button_bg_color_hover'.$i] = wp_filter_nohtml_kses( $input['slider_button_bg_color_hover'.$i] );
		$input['slider_button_border_color_hover'.$i] = wp_filter_nohtml_kses( $input['slider_button_border_color_hover'.$i] );
	}
	$input['slider_video'] = wp_filter_nohtml_kses( $input['slider_video'] );
	$input['slider_video_image'] = wp_filter_nohtml_kses( $input['slider_video_image'] );
	$input['slider_youtube_url'] = wp_filter_nohtml_kses( $input['slider_youtube_url'] );
	$input['slider_youtube_image'] = wp_filter_nohtml_kses( $input['slider_youtube_image'] );
	foreach(array('slider_video', 'slider_youtube') as $v) {
		$input['use_'.$v.'_caption'] = ! empty( $input['use_'.$v.'_caption'] ) ? 1 : 0;
		$input[$v.'_headline'] = wp_filter_nohtml_kses( $input[$v.'_headline'] );
		$input[$v.'_headline_font_size'] = wp_filter_nohtml_kses( $input[$v.'_headline_font_size'] );
		$input[$v.'_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input[$v.'_headline_font_size_mobile'] );
		$input[$v.'_headline_color'] = wp_filter_nohtml_kses( $input[$v.'_headline_color'] );
		$input[$v.'_headline_shadow_a'] = wp_filter_nohtml_kses( $input[$v.'_headline_shadow_a'] );
		$input[$v.'_headline_shadow_b'] = wp_filter_nohtml_kses( $input[$v.'_headline_shadow_b'] );
		$input[$v.'_headline_shadow_c'] = wp_filter_nohtml_kses( $input[$v.'_headline_shadow_c'] );
		$input[$v.'_headline_shadow_color'] = wp_filter_nohtml_kses( $input[$v.'_headline_shadow_color'] );
		$input[$v.'_caption'] = wp_filter_nohtml_kses( $input[$v.'_caption'] );
		$input[$v.'_caption_font_size'] = wp_filter_nohtml_kses( $input[$v.'_caption_font_size'] );
		$input[$v.'_caption_font_size_mobile'] = wp_filter_nohtml_kses( $input[$v.'_caption_font_size_mobile'] );
		$input[$v.'_caption_color'] = wp_filter_nohtml_kses( $input[$v.'_caption_color'] );
		$input[$v.'_caption_shadow_a'] = wp_filter_nohtml_kses( $input[$v.'_caption_shadow_a'] );
		$input[$v.'_caption_shadow_b'] = wp_filter_nohtml_kses( $input[$v.'_caption_shadow_b'] );
		$input[$v.'_caption_shadow_c'] = wp_filter_nohtml_kses( $input[$v.'_caption_shadow_c'] );
		$input[$v.'_caption_shadow_color'] = wp_filter_nohtml_kses( $input[$v.'_caption_shadow_color'] );
		$input['show_'.$v.'_button'] = ! empty( $input['show_'.$v.'_button'] ) ? 1 : 0;
		$input[$v.'_button'] = wp_filter_nohtml_kses( $input[$v.'_button'] );
		$input[$v.'_button_url'] = wp_filter_nohtml_kses( $input[$v.'_button_url'] );
		$input[$v.'_button_target'] = !empty( $input[$v.'_button_target'] ) ? 1 : 0;
		$input[$v.'_button_color'] = wp_filter_nohtml_kses( $input[$v.'_button_color'] );
		$input[$v.'_button_bg_color'] = wp_filter_nohtml_kses( $input[$v.'_button_bg_color'] );
		$input[$v.'_button_border_color'] = wp_filter_nohtml_kses( $input[$v.'_button_border_color'] );
		$input[$v.'_button_color_hover'] = wp_filter_nohtml_kses( $input[$v.'_button_color_hover'] );
		$input[$v.'_button_bg_color_hover'] = wp_filter_nohtml_kses( $input[$v.'_button_bg_color_hover'] );
		$input[$v.'_button_border_color_hover'] = wp_filter_nohtml_kses( $input[$v.'_button_border_color_hover'] );
	}
	if ( ! isset( $input['slider_time'] ) || ! array_key_exists( $input['slider_time'], $slider_time_options ) )
		$input['slider_time'] = $dp_default_options['slider_time'];

	// トップページ ニュースティッカー
	$input['show_index_news'] = ! empty( $input['show_index_news'] ) ? 1 : 0;
	$input['show_index_news_date'] = ! empty( $input['show_index_news_date'] ) ? 1 : 0;
	$input['index_news_num'] = intval( $input['index_news_num'] );
	$input['show_index_news_archive_link'] = ! empty( $input['show_index_news_archive_link'] ) ? 1 : 0;
	$input['index_news_archive_link_text'] = wp_filter_nohtml_kses( $input['index_news_archive_link_text'] );
	$input['show_index_news_mobile'] = ! empty( $input['show_index_news_mobile'] ) ? 1 : 0;
	$input['show_index_news_date_mobile'] = ! empty( $input['show_index_news_date_mobile'] ) ? 1 : 0;
	$input['index_news_num_mobile'] = intval( $input['index_news_num_mobile'] );
	$input['show_index_news_archive_link_mobile'] = ! empty( $input['show_index_news_archive_link_mobile'] ) ? 1 : 0;
	$input['index_news_archive_link_text_mobile'] = wp_filter_nohtml_kses( $input['index_news_archive_link_text_mobile'] );

	// カテゴリーの設定
	if ( ! $input['category_label'] ) $input['category_label'] = $dp_default_options['category_label'];
	$input['category_label'] = wp_filter_nohtml_kses( $input['category_label'] );
	$input['category_color'] = wp_filter_nohtml_kses( $input['category_color'] );
	$input['use_category2'] = ! empty( $input['use_category2'] ) ? 1 : 0;
	if ( ! $input['category2_label'] ) $input['category2_label'] = $dp_default_options['category2_label'];
	$input['category2_label'] = wp_filter_nohtml_kses( $input['category2_label'] );
	if ( isset( $input['category2_slug'] ) ) $input['category2_slug'] = trim( $input['category2_slug'] );
	if ( ! $input['category2_slug'] ) $input['category2_slug'] = $dp_default_options['category2_slug'];
	$input['category2_slug'] = sanitize_title( $input['category2_slug'] );
	$input['category2_color'] = wp_filter_nohtml_kses( $input['category2_color'] );
	$input['use_category3'] = ! empty( $input['use_category3'] ) ? 1 : 0;
	if ( ! $input['category3_label'] ) $input['category3_label'] = $dp_default_options['category3_label'];
	$input['category3_label'] = wp_filter_nohtml_kses( $input['category3_label'] );
	if ( isset( $input['category3_slug'] ) ) $input['category3_slug'] = trim( $input['category3_slug'] );
	if ( ! $input['category3_slug'] ) $input['category3_slug'] = $dp_default_options['category3_slug'];
	$input['category3_slug'] = sanitize_title( $input['category3_slug'] );
	$input['category3_color'] = wp_filter_nohtml_kses( $input['category3_color'] );

	// ブログアーカイブページの設定
	$input['blog_archive_headline'] = wp_filter_nohtml_kses( $input['blog_archive_headline'] );
	$input['blog_archive_headline_font_size'] = wp_filter_nohtml_kses( $input['blog_archive_headline_font_size'] );
	$input['blog_archive_headline_font_size_mobile'] = wp_filter_nohtml_kses( $input['blog_archive_headline_font_size_mobile'] );
	$input['blog_archive_desc'] = wp_filter_nohtml_kses( $input['blog_archive_desc'] );
	$input['blog_archive_desc_font_size'] = wp_filter_nohtml_kses( $input['blog_archive_desc_font_size'] );
	$input['blog_archive_desc_font_size_mobile'] = wp_filter_nohtml_kses( $input['blog_archive_desc_font_size_mobile'] );

	// ブログ記事ページのフォントサイズ
	$input['title_font_size'] = wp_filter_nohtml_kses( $input['title_font_size'] );
	$input['content_font_size'] = wp_filter_nohtml_kses( $input['content_font_size'] );
	$input['title_font_size_mobile'] = wp_filter_nohtml_kses( $input['title_font_size_mobile'] );
	$input['content_font_size_mobile'] = wp_filter_nohtml_kses( $input['content_font_size_mobile'] );

	// ブログ記事ページの表示設定
	$input['blog_breadcrumb_label'] = wp_filter_nohtml_kses( $input['blog_breadcrumb_label'] );
	$input['show_date'] = ! empty( $input['show_date'] ) ? 1 : 0;
	$input['show_tag'] = ! empty( $input['show_tag'] ) ? 1 : 0;
	$input['show_comment'] = ! empty( $input['show_comment'] ) ? 1 : 0;
	$input['show_trackback'] = ! empty( $input['show_trackback'] ) ? 1 : 0;
	$input['show_related_post'] = ! empty( $input['show_related_post'] ) ? 1 : 0;
	$input['show_next_post'] = ! empty( $input['show_next_post'] ) ? 1 : 0;
	$input['show_thumbnail'] = ! empty( $input['show_thumbnail'] ) ? 1 : 0;
	$input['show_author'] = ! empty( $input['show_author'] ) ? 1 : 0;
	$input['show_modified_date'] = ! empty( $input['show_modified_date'] ) ? 1 : 0;
	$input['related_post_headline'] = wp_filter_nohtml_kses( $input['related_post_headline'] );
	$input['related_post_num'] = intval( $input['related_post_num'] );

	// ソーシャルボタンの表示設定
	if ( ! isset( $input['sns_type_top'] ) || ! array_key_exists( $input['sns_type_top'], $sns_type_top_options ) )
		$input['sns_type_top'] = $dp_default_options['sns_type_top'];
	$input['show_sns_top'] = ! empty( $input['show_sns_top'] ) ? 1 : 0;
	$input['show_twitter_top'] = ! empty( $input['show_twitter_top'] ) ? 1 : 0;
	$input['show_fblike_top'] = ! empty( $input['show_fblike_top'] ) ? 1 : 0;
	$input['show_fbshare_top'] = ! empty( $input['show_fbshare_top'] ) ? 1 : 0;
	$input['show_google_top'] = ! empty( $input['show_google_top'] ) ? 1 : 0;
	$input['show_hatena_top'] = ! empty( $input['show_hatena_top'] ) ? 1 : 0;
	$input['show_pocket_top'] = ! empty( $input['show_pocket_top'] ) ? 1 : 0;
	$input['show_feedly_top'] = ! empty( $input['show_feedly_top'] ) ? 1 : 0;
	$input['show_rss_top'] = ! empty( $input['show_rss_top'] ) ? 1 : 0;
	$input['show_pinterest_top'] = ! empty( $input['show_pinterest_top'] ) ? 1 : 0;

	if ( ! isset( $input['sns_type_btm'] ) || ! array_key_exists( $input['sns_type_btm'], $sns_type_btm_options ) )
		$input['sns_type_btm'] = $dp_default_options['sns_type_btm'];
	$input['show_sns_btm'] = ! empty( $input['show_sns_btm'] ) ? 1 : 0;
	$input['show_twitter_btm'] = ! empty( $input['show_twitter_btm'] ) ? 1 : 0;
	$input['show_fblike_btm'] = ! empty( $input['show_fblike_btm'] ) ? 1 : 0;
	$input['show_fbshare_btm'] = ! empty( $input['show_fbshare_btm'] ) ? 1 : 0;
	$input['show_google_btm'] = ! empty( $input['show_google_btm'] ) ? 1 : 0;
	$input['show_hatena_btm'] = ! empty( $input['show_hatena_btm'] ) ? 1 : 0;
	$input['show_pocket_btm'] = ! empty( $input['show_pocket_btm'] ) ? 1 : 0;
	$input['show_feedly_btm'] = ! empty( $input['show_feedly_btm'] ) ? 1 : 0;
	$input['show_rss_btm'] = ! empty( $input['show_rss_btm'] ) ? 1 : 0;
	$input['show_pinterest_btm'] = ! empty( $input['show_pinterest_btm'] ) ? 1 : 0;
	$input['twitter_info'] = wp_filter_nohtml_kses( $input['twitter_info'] );

	// ブログ記事ページのバナー広告
	$input['single_ad_code1'] = $input['single_ad_code1'];
	$input['single_ad_image1'] = wp_filter_nohtml_kses( $input['single_ad_image1'] );
	$input['single_ad_url1'] = wp_filter_nohtml_kses( $input['single_ad_url1'] );
	$input['single_ad_code2'] = $input['single_ad_code2'];
	$input['single_ad_image2'] = wp_filter_nohtml_kses( $input['single_ad_image2'] );
	$input['single_ad_url2'] = wp_filter_nohtml_kses( $input['single_ad_url2'] );
	$input['single_ad_code3'] = $input['single_ad_code3'];
	$input['single_ad_image3'] = wp_filter_nohtml_kses( $input['single_ad_image3'] );
	$input['single_ad_url3'] = wp_filter_nohtml_kses( $input['single_ad_url3'] );
	$input['single_ad_code4'] = $input['single_ad_code4'];
	$input['single_ad_image4'] = wp_filter_nohtml_kses( $input['single_ad_image4'] );
	$input['single_ad_url4'] = wp_filter_nohtml_kses( $input['single_ad_url4'] );
	$input['single_ad_code5'] = $input['single_ad_code5'];
	$input['single_ad_image5'] = wp_filter_nohtml_kses( $input['single_ad_image5'] );
	$input['single_ad_url5'] = wp_filter_nohtml_kses( $input['single_ad_url5'] );
	$input['single_ad_code6'] = $input['single_ad_code6'];
	$input['single_ad_image6'] = wp_filter_nohtml_kses( $input['single_ad_image6'] );
	$input['single_ad_url6'] = wp_filter_nohtml_kses( $input['single_ad_url6'] );
	$input['single_mobile_ad_code1'] = $input['single_mobile_ad_code1'];
	$input['single_mobile_ad_image1'] = wp_filter_nohtml_kses( $input['single_mobile_ad_image1'] );
	$input['single_mobile_ad_url1'] = wp_filter_nohtml_kses( $input['single_mobile_ad_url1'] );
	$input['single_mobile_ad_code2'] = $input['single_mobile_ad_code2'];
	$input['single_mobile_ad_image2'] = wp_filter_nohtml_kses( $input['single_mobile_ad_image2'] );
	$input['single_mobile_ad_url2'] = wp_filter_nohtml_kses( $input['single_mobile_ad_url2'] );

	// 紹介の設定
	if ( ! $input['introduce_label'] ) $input['introduce_label'] = $dp_default_options['introduce_label'];
	$input['introduce_label'] = wp_filter_nohtml_kses( $input['introduce_label'] );
	if ( ! $input['introduce_breadcrumb_label'] ) $input['introduce_breadcrumb_label'] = $dp_default_options['introduce_breadcrumb_label'];
	$input['introduce_breadcrumb_label'] = wp_filter_nohtml_kses( $input['introduce_breadcrumb_label'] );
	if ( isset( $input['introduce_slug'] ) ) $input['introduce_slug'] = trim( $input['introduce_slug'] );
	if ( ! $input['introduce_slug'] ) $input['introduce_slug'] = $dp_default_options['introduce_slug'];
	$input['introduce_slug'] = sanitize_title( $input['introduce_slug'] );
	$input['use_introduce_category1'] = ! empty( $input['use_introduce_category1'] ) ? 1 : 0;
	$input['use_introduce_category1_introduce_archive'] = ! empty( $input['use_introduce_category1_introduce_archive'] ) ? 1 : 0;
	if ( ! $input['introduce_category1_label'] ) $input['introduce_category1_label'] = $dp_default_options['introduce_category1_label'];
	$input['introduce_category1_label'] = wp_filter_nohtml_kses( $input['introduce_category1_label'] );
	if ( isset( $input['introduce_category1_slug'] ) ) $input['introduce_category1_slug'] = trim( $input['introduce_category1_slug'] );
	if ( ! $input['introduce_category1_slug'] ) $input['introduce_category1_slug'] = $dp_default_options['introduce_category1_slug'];
	$input['introduce_category1_slug'] = sanitize_title( $input['introduce_category1_slug'] );
	$input['introduce_category1_color'] = wp_filter_nohtml_kses( $input['introduce_category1_color'] );
	$input['use_introduce_category2'] = ! empty( $input['use_introduce_category2'] ) ? 1 : 0;
	$input['use_introduce_category2_introduce_archive'] = ! empty( $input['use_introduce_category2_introduce_archive'] ) ? 1 : 0;
	if ( ! $input['introduce_category2_label'] ) $input['introduce_category2_label'] = $dp_default_options['introduce_category2_label'];
	$input['introduce_category2_label'] = wp_filter_nohtml_kses( $input['introduce_category2_label'] );
	if ( isset( $input['introduce_category2_slug'] ) ) $input['introduce_category2_slug'] = trim( $input['introduce_category2_slug'] );
	if ( ! $input['introduce_category2_slug'] ) $input['introduce_category2_slug'] = $dp_default_options['introduce_category2_slug'];
	$input['introduce_category2_slug'] = sanitize_title( $input['introduce_category2_slug'] );
	$input['introduce_category2_color'] = wp_filter_nohtml_kses( $input['introduce_category2_color'] );
	$input['use_introduce_category3'] = ! empty( $input['use_introduce_category3'] ) ? 1 : 0;
	$input['use_introduce_category3_introduce_archive'] = ! empty( $input['use_introduce_category3_introduce_archive'] ) ? 1 : 0;
	if ( ! $input['introduce_category3_label'] ) $input['introduce_category3_label'] = $dp_default_options['introduce_category3_label'];
	$input['introduce_category3_label'] = wp_filter_nohtml_kses( $input['introduce_category3_label'] );
	if ( isset( $input['introduce_category3_slug'] ) ) $input['introduce_category3_slug'] = trim( $input['introduce_category3_slug'] );
	if ( ! $input['introduce_category3_slug'] ) $input['introduce_category3_slug'] = $dp_default_options['introduce_category3_slug'];
	$input['introduce_category3_slug'] = sanitize_title( $input['introduce_category3_slug'] );
	$input['introduce_category3_color'] = wp_filter_nohtml_kses( $input['introduce_category3_color'] );
	$input['use_introduce_tag'] = ! empty( $input['use_introduce_tag'] ) ? 1 : 0;
	if ( ! $input['introduce_tag_label'] ) $input['introduce_tag_label'] = $dp_default_options['introduce_tag_label'];
	$input['introduce_tag_label'] = wp_filter_nohtml_kses( $input['introduce_tag_label'] );
	if ( isset( $input['introduce_tag_slug'] ) ) $input['introduce_tag_slug'] = trim( $input['introduce_tag_slug'] );
	if ( ! $input['introduce_tag_slug'] ) $input['introduce_tag_slug'] = $dp_default_options['introduce_tag_slug'];
	$input['introduce_tag_slug'] = sanitize_title( $input['introduce_tag_slug'] );
	$input['introduce_archive_catch'] = wp_filter_nohtml_kses( $input['introduce_archive_catch'] );
	$input['introduce_archive_image'] = wp_filter_nohtml_kses( $input['introduce_archive_image'] );
	$input['introduce_archive_image_catch_bg'] = wp_filter_nohtml_kses( $input['introduce_archive_image_catch_bg'] );
	$input['introduce_archive_image_catch_bg_opacity'] = wp_filter_nohtml_kses( $input['introduce_archive_image_catch_bg_opacity'] );
	$input['show_breadcrumb_introduce_archive'] = ! empty( $input['show_breadcrumb_introduce_archive'] ) ? 1 : 0;
	$input['archive_introduce_num'] = intval( $input['archive_introduce_num'] );
	$input['use_infinitescroll_introduce'] = ! empty( $input['use_infinitescroll_introduce'] ) ? 1 : 0;
	$input['show_shoulder_copy_introduce'] = ! empty( $input['show_shoulder_copy_introduce'] ) ? 1 : 0;
	$input['show_thumbnail_introduce'] = ! empty( $input['show_thumbnail_introduce'] ) ? 1 : 0;
	$input['show_date_introduce'] = ! empty( $input['show_date_introduce'] ) ? 1 : 0;
	$input['show_tag_introduce'] = ! empty( $input['show_tag_introduce'] ) ? 1 : 0;
	$input['show_sns_top_introduce'] = ! empty( $input['show_sns_top_introduce'] ) ? 1 : 0;
	$input['show_sns_btm_introduce'] = ! empty( $input['show_sns_btm_introduce'] ) ? 1 : 0;
	$input['show_next_post_introduce'] = ! empty( $input['show_next_post_introduce'] ) ? 1 : 0;
	$input['show_archive_banner_introduce'] = ! empty( $input['show_archive_banner_introduce'] ) ? 1 : 0;
	$input['show_related_introduce'] = ! empty( $input['show_related_introduce'] ) ? 1 : 0;
	$input['related_introduce_headline'] = wp_filter_nohtml_kses( $input['related_introduce_headline'] );
	$input['related_introduce_num'] = intval( $input['related_introduce_num'] );

	$introduce_archive_text = array();
	if ( isset( $input['introduce_archive_text']['indexes'] ) ) {
		foreach( $input['introduce_archive_text']['indexes'] as $key ) {
			$value = array();
			if ( isset( $input['introduce_archive_text'][$key]['headline'] ) ) {
				$value['headline'] = wp_filter_nohtml_kses( trim( $input['introduce_archive_text'][$key]['headline'] ) );
			} else {
				$value['headline'] = '';
			}
			if ( isset( $input['introduce_archive_text'][$key]['desc'] ) ) {
				$value['desc'] = wp_filter_nohtml_kses( trim( $input['introduce_archive_text'][$key]['desc'] ) );
			} else {
				$value['desc'] = '';
			}
			$introduce_archive_text[] = $value;
		}
	}
	$input['introduce_archive_text'] = $introduce_archive_text;

	// お知らせの設定
	if ( ! $input['news_label'] ) $input['news_label'] = $dp_default_options['news_label'];
	$input['news_label'] = wp_filter_nohtml_kses( $input['news_label'] );
	if ( ! $input['news_breadcrumb_label'] ) $input['news_breadcrumb_label'] = $dp_default_options['news_breadcrumb_label'];
	$input['news_breadcrumb_label'] = wp_filter_nohtml_kses( $input['news_breadcrumb_label'] );
	if ( isset( $input['news_slug'] ) ) $input['news_slug'] = trim( $input['news_slug'] );
	if ( ! $input['news_slug'] ) $input['news_slug'] = $dp_default_options['news_slug'];
	$input['news_slug'] = sanitize_title( $input['news_slug'] );
	$input['news_archive_headline'] = wp_filter_nohtml_kses( $input['news_archive_headline'] );
	$input['show_sns_top_news'] = ! empty( $input['show_sns_top_news'] ) ? 1 : 0;
	$input['show_sns_btm_news'] = ! empty( $input['show_sns_btm_news'] ) ? 1 : 0;
	$input['show_next_post_news'] = ! empty( $input['show_next_post_news'] ) ? 1 : 0;
	$input['show_date_news'] = ! empty( $input['show_date_news'] ) ? 1 : 0;
	$input['show_thumbnail_news'] = ! empty( $input['show_thumbnail_news'] ) ? 1 : 0;
	$input['show_recent_news'] = ! empty( $input['show_recent_news'] ) ? 1 : 0;
	$input['recent_news_headline'] = wp_filter_nohtml_kses( $input['recent_news_headline'] );
	$input['recent_news_num'] = intval( $input['recent_news_num'] );
	$input['recent_news_link_text'] = wp_filter_nohtml_kses( $input['recent_news_link_text'] );

	// 検索の設定
	if ( ! isset( $input['searcn_post_type'] ) || ! in_array( $input['searcn_post_type'], array( 'post', 'introduce' ) ) )
		$input['searcn_post_type'] = $dp_default_options['searcn_post_type'];
	if ( ! isset( $input['searcn_keywords_target'] ) || ! is_array( $input['searcn_keywords_target'] ) )
		$input['searcn_keywords_target'] = array();
	$input['show_search_form_keywords'] = ! empty( $input['show_search_form_keywords'] ) ? 1 : 0;
	$input['search_form_keywords_placeholder'] = wp_filter_nohtml_kses( $input['search_form_keywords_placeholder'] );
	if ( ! isset( $input['show_search_form_category1'] ) || ! in_array( $input['show_search_form_category1'], array( 'category', 'category2', 'category3' ) ) )
		$input['show_search_form_category1'] = '';
	$input['search_form_category1_placeholder'] = wp_filter_nohtml_kses( $input['search_form_category1_placeholder'] );
	if ( ! isset( $input['show_search_form_category2'] ) || ! in_array( $input['show_search_form_category2'], array( 'category', 'category2', 'category3' ) ) )
		$input['show_search_form_category2'] = '';
	$input['search_form_category2_placeholder'] = wp_filter_nohtml_kses( $input['search_form_category2_placeholder'] );
	if ( ! isset( $input['show_search_form_category3'] ) || ! in_array( $input['show_search_form_category3'], array( 'category', 'category2', 'category3' ) ) )
		$input['show_search_form_category3'] = '';
	$input['search_form_category3_placeholder'] = wp_filter_nohtml_kses( $input['search_form_category3_placeholder'] );
	$input['show_search_form_keywords_introduce'] = ! empty( $input['show_search_form_keywords_introduce'] ) ? 1 : 0;
	$input['search_form_keywords_placeholder_introduce'] = wp_filter_nohtml_kses( $input['search_form_keywords_placeholder_introduce'] );
	if ( ! isset( $input['show_search_form_category1_introduce'] ) || ! in_array( $input['show_search_form_category1_introduce'], array( 'introduce_category1', 'introduce_category2', 'introduce_category3' ) ) )
		$input['show_search_form_category1_introduce'] = '';
	$input['search_form_category1_placeholder_introduce'] = wp_filter_nohtml_kses( $input['search_form_category1_placeholder_introduce'] );
	if ( ! isset( $input['show_search_form_category2_introduce'] ) || ! in_array( $input['show_search_form_category2_introduce'], array( 'introduce_category1', 'introduce_category2', 'introduce_category3' ) ) )
		$input['show_search_form_category2_introduce'] = '';
	$input['search_form_category2_placeholder_introduce'] = wp_filter_nohtml_kses( $input['search_form_category2_placeholder_introduce'] );
	if ( ! isset( $input['show_search_form_category3_introduce'] ) || ! in_array( $input['show_search_form_category3_introduce'], array( 'introduce_category1', 'introduce_category2', 'introduce_category3' ) ) )
		$input['show_search_form_category3_introduce'] = '';
	$input['search_form_category3_placeholder_introduce'] = wp_filter_nohtml_kses( $input['search_form_category3_placeholder_introduce'] );
	$input['search_form_button_text'] = wp_filter_nohtml_kses( $input['search_form_button_text'] );
	$input['search_form_button_bg_color'] = wp_filter_nohtml_kses( $input['search_form_button_bg_color'] );
	$input['search_form_button_bg_opacity'] = wp_filter_nohtml_kses( $input['search_form_button_bg_opacity'] );
	$input['search_form_button_bg_color_hover'] = wp_filter_nohtml_kses( $input['search_form_button_bg_color_hover'] );
	$input['search_form_button_bg_opacity_hover'] = wp_filter_nohtml_kses( $input['search_form_button_bg_opacity_hover'] );
	$input['search_bar_bg_color'] = wp_filter_nohtml_kses( $input['search_bar_bg_color'] );
	$input['search_bar_bg_color'] = wp_filter_nohtml_kses( $input['search_bar_bg_color'] );
	$input['index_search_bar_bg_opacity'] = wp_filter_nohtml_kses( $input['index_search_bar_bg_opacity'] );
	$input['show_search_bar_subpage'] = ! empty( $input['show_search_bar_subpage'] ) ? 1 : 0;
	$input['search_results_headline'] = wp_filter_nohtml_kses( $input['search_results_headline'] );
	$input['show_search_results_tag_filter'] = ! empty( $input['show_search_results_tag_filter'] ) ? 1 : 0;

	// ヘッダーの設定
	$input['header_fix'] = wp_filter_nohtml_kses( $input['header_fix'] );
	$input['mobile_header_fix'] = wp_filter_nohtml_kses( $input['mobile_header_fix'] );
	$input['header_text_color'] = wp_filter_nohtml_kses( $input['header_text_color'] );
	$input['header_bg_color'] = wp_filter_nohtml_kses( $input['header_bg_color'] );
	$input['index_header_bg_opacity'] = wp_filter_nohtml_kses( $input['index_header_bg_opacity'] );
	$input['header_fix_text_color'] = wp_filter_nohtml_kses( $input['header_fix_text_color'] );
	$input['header_fix_bg_color'] = wp_filter_nohtml_kses( $input['header_fix_bg_color'] );
	$input['header_fix_bg_opacity'] = wp_filter_nohtml_kses( $input['header_fix_bg_opacity'] );

	// フッターの設定
	$input['footer_bg_color1'] = wp_filter_nohtml_kses( $input['footer_bg_color1'] );
	$input['footer_bg_color2'] = wp_filter_nohtml_kses( $input['footer_bg_color2'] );
	if ( ! isset( $input['footer_nav_type1'] ) || ! array_key_exists( $input['footer_nav_type1'], $footer_nav_type_options ) )
		$input['footer_nav_type1'] = $dp_default_options['footer_nav_type1'];
	$input['footer_nav_category1'] = wp_filter_nohtml_kses( $input['footer_nav_category1'] );
	if ( ! isset( $input['footer_nav_type2'] ) || ! array_key_exists( $input['footer_nav_type2'], $footer_nav_type_options ) )
		$input['footer_nav_type2'] = $dp_default_options['footer_nav_type2'];
	$input['footer_nav_category2'] = wp_filter_nohtml_kses( $input['footer_nav_category2'] );
	$input['twitter_url'] = wp_filter_nohtml_kses( $input['twitter_url'] );
	$input['facebook_url'] = wp_filter_nohtml_kses( $input['facebook_url'] );
	$input['insta_url'] = wp_filter_nohtml_kses( $input['insta_url'] );
	$input['show_rss'] = ! empty( $input['show_rss'] ) ? 1 : 0;

	// フッターウィジェット
	if ( ! isset( $input['footer_widget_type'] ) || ! array_key_exists( $input['footer_widget_type'], $footer_widget_options ) )
		$input['footer_widget_type'] = $dp_default_options['footer_widget_type'];
	$input['footer_ad_code'] = $input['footer_ad_code'];
	$input['footer_ad_image'] = wp_filter_nohtml_kses( $input['footer_ad_image'] );
	$input['footer_ad_url'] = wp_filter_nohtml_kses( $input['footer_ad_url'] );
	$input['footer_ad_code_mobile'] = $input['footer_ad_code_mobile'];
	$input['footer_ad_image_mobile'] = wp_filter_nohtml_kses( $input['footer_ad_image_mobile'] );
	$input['footer_ad_url_mobile'] = wp_filter_nohtml_kses( $input['footer_ad_url_mobile'] );
	$input['footer_menu1'] = wp_filter_nohtml_kses( $input['footer_menu1'] );
	$input['footer_menu2'] = wp_filter_nohtml_kses( $input['footer_menu2'] );
	$input['footer_banner_title1'] = wp_filter_nohtml_kses( $input['footer_banner_title1'] );
	$input['footer_banner_url1'] = wp_filter_nohtml_kses( $input['footer_banner_url1'] );
	$input['footer_banner_target_blank1'] = ! empty( $input['footer_banner_target_blank1'] ) ? 1 : 0;
	$input['footer_banner_image1'] = wp_filter_nohtml_kses( $input['footer_banner_image1'] );
	$input['footer_banner_shadow_a1'] = wp_filter_nohtml_kses( $input['footer_banner_shadow_a1'] );
	$input['footer_banner_shadow_b1'] = wp_filter_nohtml_kses( $input['footer_banner_shadow_b1'] );
	$input['footer_banner_shadow_c1'] = wp_filter_nohtml_kses( $input['footer_banner_shadow_c1'] );
	$input['footer_banner_shadow_color1'] = wp_filter_nohtml_kses( $input['footer_banner_shadow_color1'] );
	$input['footer_banner_title2'] = wp_filter_nohtml_kses( $input['footer_banner_title2'] );
	$input['footer_banner_url2'] = wp_filter_nohtml_kses( $input['footer_banner_url2'] );
	$input['footer_banner_target_blank2'] = ! empty( $input['footer_banner_target_blank2'] ) ? 1 : 0;
	$input['footer_banner_image2'] = wp_filter_nohtml_kses( $input['footer_banner_image2'] );
	$input['footer_banner_shadow_a2'] = wp_filter_nohtml_kses( $input['footer_banner_shadow_a2'] );
	$input['footer_banner_shadow_b2'] = wp_filter_nohtml_kses( $input['footer_banner_shadow_b2'] );
	$input['footer_banner_shadow_c2'] = wp_filter_nohtml_kses( $input['footer_banner_shadow_c2'] );
	$input['footer_banner_shadow_color2'] = wp_filter_nohtml_kses( $input['footer_banner_shadow_color2'] );

	// スマホ用固定フッターバーの設定
	if ( ! isset( $input['footer_bar_display'] ) || ! array_key_exists( $input['footer_bar_display'], $footer_bar_display_options ) )
		$input['footer_bar_display'] = $dp_default_options['footer_bar_display'];
	$input['footer_bar_bg'] = wp_filter_nohtml_kses( $input['footer_bar_bg'] );
	$input['footer_bar_border'] = wp_filter_nohtml_kses( $input['footer_bar_border'] );
	$input['footer_bar_color'] = wp_filter_nohtml_kses( $input['footer_bar_color'] );
	$input['footer_bar_tp'] = wp_filter_nohtml_kses( $input['footer_bar_tp'] );

	$footer_bar_btns = array();
	if ( isset( $input['repeater_footer_bar_btns'] ) ) :
		foreach ( (array) $input['repeater_footer_bar_btns'] as $key => $value ) {
			$footer_bar_btns[] = array(
				'type' => ( isset( $input['repeater_footer_bar_btns'][$key]['type'] ) && array_key_exists( $input['repeater_footer_bar_btns'][$key]['type'], $footer_bar_button_options ) ) ? $input['repeater_footer_bar_btns'][$key]['type'] : 'type1',
				'label' => isset( $input['repeater_footer_bar_btns'][$key]['label'] ) ? wp_filter_nohtml_kses( $input['repeater_footer_bar_btns'][$key]['label'] ) : '',
				'url' => isset( $input['repeater_footer_bar_btns'][$key]['url'] ) ? wp_filter_nohtml_kses( $input['repeater_footer_bar_btns'][$key]['url'] ) : '',
				'number' => isset( $input['repeater_footer_bar_btns'][$key]['number'] ) ? wp_filter_nohtml_kses( $input['repeater_footer_bar_btns'][$key]['number'] ) : '',
				'target' => ! empty( $input['repeater_footer_bar_btns'][$key]['target'] ) ? 1 : 0,
				'icon' => ( isset( $input['repeater_footer_bar_btns'][$key]['icon'] ) && array_key_exists( $input['repeater_footer_bar_btns'][$key]['icon'], $footer_bar_icon_options ) ) ? $input['repeater_footer_bar_btns'][$key]['icon'] : 'file-text'
			);
		}
	endif;
	$input['footer_bar_btns'] = $footer_bar_btns;

	// 保護ページ
	$input['pw_label'] = wp_filter_nohtml_kses( $input['pw_label'] );
	if ( ! isset( $input['pw_align'] ) || ! array_key_exists( $input['pw_align'], $pw_align_options ) ) $input['pw_align'] = $dp_default_options['pw_align'];
	for ( $i = 1; $i <= 5; $i++ ) {
		$input['pw_name' . $i] = wp_filter_nohtml_kses( $input['pw_name' . $i] );
		$input['pw_btn_display' . $i] = ! empty( $input['pw_btn_display' . $i] ) ? 1 : 0;
		$input['pw_btn_label' . $i] = wp_filter_nohtml_kses( $input['pw_btn_label' . $i] );
		$input['pw_btn_url' . $i] = wp_filter_nohtml_kses( $input['pw_btn_url' . $i] );
		$input['pw_btn_display' . $i] = ! empty( $input['pw_btn_display' . $i] ) ? 1 : 0;
		$input['pw_editor' . $i] = $input['pw_editor' . $i];
	}

	// コンテンツビルダー
	$input = cb_validate($input);

	// スラッグ変更時
	$dp_options = get_desing_plus_option();
	foreach( array( 'category2_slug', 'category3_slug', 'introduce_slug', 'introduce_category1_slug', 'introduce_category2_slug', 'introduce_category3_slug', 'introduce_tag_slug' ) as $key ) {
		if ( $dp_options[$key] !== $input[$key] ) {
			flush_rewrite_rules();
			break;
		}
	}

	return $input;
}


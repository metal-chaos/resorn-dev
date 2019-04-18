<?php

global $dp_options;
if ( ! $dp_options ) $dp_options = get_desing_plus_option();

// ブログ記事 ----------------------------------------------------------
function manage_posts_columns($columns) {
  $columns['recommend_post'] = __('Recommend post', 'tcd-w');
  $columns['new_post_thumb'] = __('Featured Image', 'tcd-w');
  $columns['view_count'] = __('View count', 'tcd-w');
  return $columns;
}
function add_column($column_name, $post_id) {
  switch($column_name){
    case 'new_post_thumb':
      $post_thumbnail_id = get_post_thumbnail_id($post_id);
      if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
        if (!empty($post_thumbnail_img[0])) {
          echo '<img width="70" src="' . $post_thumbnail_img[0] . '" />';
        }
      }
      break;
    case 'recommend_post':
      if (get_post_meta($post_id, 'recommend_post', true)) {
        _e('Recommend post1<br />', 'tcd-w');
      }
      if (get_post_meta($post_id, 'recommend_post2', true)) {
        _e('Recommend post2', 'tcd-w');
      }
      break;
    case 'view_count':
      echo intval(get_post_meta($post_id, '_view_count', true));
      break;
  }
}
add_filter( 'manage_post_posts_columns', 'manage_posts_columns' );
add_action( 'manage_post_posts_custom_column', 'add_column', 10, 2 );


// 固定ページ ----------------------------------------------------------
function manage_posts_columns_for_page($columns) {
  $columns['view_count'] = __('View count', 'tcd-w');
  return $columns;
}
add_filter( 'manage_page_posts_columns', 'manage_posts_columns_for_page' );
add_action( 'manage_page_posts_custom_column', 'add_column', 10, 2 );


// お知らせ -----------------------------------------------------------
function add_thumbnail_column_for_news($columns){
  $columns['new_post_thumb'] = __('Featured Image', 'tcd-w');
  $columns['view_count'] = __('View count', 'tcd-w');
  return $columns;
}
function display_thumbnail_column_for_news($column_name, $post_id){
  switch($column_name){
    case 'new_post_thumb':
      $post_thumbnail_id = get_post_thumbnail_id($post_id);
      if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
        if (!empty($post_thumbnail_img[0])) {
          echo '<img width="70" src="' . $post_thumbnail_img[0] . '" />';
        }
      }
      break;
    case 'view_count':
      echo intval(get_post_meta($post_id, '_view_count', true));
      break;
  }
}
add_filter('manage_'.$dp_options['news_slug'].'_posts_columns', 'add_thumbnail_column_for_news', 5);
add_action('manage_'.$dp_options['news_slug'].'_posts_custom_column', 'display_thumbnail_column_for_news', 5, 2);


// 紹介 -----------------------------------------------------------
function add_thumbnail_column_for_introduce($columns){
  $columns['show_front_page'] = __('Display on the front page', 'tcd-w');
  $columns['new_post_thumb'] = __('Featured Image', 'tcd-w');
  $columns['view_count'] = __('View count', 'tcd-w');
  return $columns;
}
function display_thumbnail_column_for_introduce($column_name, $post_id){
  switch($column_name){
    case 'new_post_thumb':
      $post_thumbnail_id = get_post_thumbnail_id($post_id);
      if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
        if (!empty($post_thumbnail_img[0])) {
          echo '<img width="70" src="' . $post_thumbnail_img[0] . '" />';
        }
      }
      break;
    case 'show_front_page':
      if (get_post_meta($post_id, 'show_front_page', true)) {
        _e('Display on the front page', 'tcd-w');
      }
      break;
    case 'view_count':
      echo intval(get_post_meta($post_id, '_view_count', true));
      break;
  }
}
add_filter('manage_'.$dp_options['introduce_slug'].'_posts_columns', 'add_thumbnail_column_for_introduce', 5);
add_action('manage_'.$dp_options['introduce_slug'].'_posts_custom_column', 'display_thumbnail_column_for_introduce', 5, 2);


// ソートカラム
function manage_sortable_columns( $sortable_columns ) {
  $sortable_columns['view_count'] = 'view_count';
  return $sortable_columns;
}
add_filter('manage_edit-post_sortable_columns', 'manage_sortable_columns');
add_filter('manage_edit-page_sortable_columns', 'manage_sortable_columns');
add_filter('manage_edit-'.$dp_options['news_slug'].'_sortable_columns', 'manage_sortable_columns');
add_filter('manage_edit-'.$dp_options['introduce_slug'].'_sortable_columns', 'manage_sortable_columns');


// ソート変更
function manage_sortable_columns_query($wp_query) {
	// 管理画面のメインクエリー以外は終了
	if (! is_admin() ||  ! $wp_query->is_main_query()) return;

	// 閲覧数ソート
	if (isset($_REQUEST['orderby']) && $_REQUEST['orderby'] === 'view_count') {
		$wp_query->set('orderby', 'meta_value_num');
		$wp_query->set('meta_key', '_view_count');
	}
}
add_action('parse_query', 'manage_sortable_columns_query', 20);


// デフォルト非表示カラム
// 表示カラムを変更した場合はユーザーメタに保存されるためここは無視される
function default_hidden_columns_filter($hidden, $screen) {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_desing_plus_option();

	// 投稿一覧
	if ($screen->id == 'edit-post') {
		// カテゴリー2～3
		for ( $i = 2; $i <= 3; $i++ ) {
			if ($dp_options['use_category'.$i]) {
				$hidden[] = 'taxonomy-'.$dp_options['category'.$i.'_slug'];
			}
		}

	// 紹介一覧
	} elseif ($screen->id == 'edit-'.$dp_options['introduce_slug']) {
		// 紹介カテゴリー1～3
		for ( $i = 1; $i <= 3; $i++ ) {
			if ($dp_options['use_introduce_category'.$i]) {
				$hidden[] = 'taxonomy-'.$dp_options['introduce_category'.$i.'_slug'];
			}
		}
		// 紹介タグ
		if ($dp_options['use_introduce_tag']) {
			$hidden[] = 'taxonomy-'.$dp_options['introduce_tag_slug'];
		}
	}

	// 作成者
	$hidden[] = 'author';

	// 閲覧数
	$hidden[] = 'view_count';

	return array_unique($hidden);
}
add_action('default_hidden_columns', 'default_hidden_columns_filter', 10, 2);

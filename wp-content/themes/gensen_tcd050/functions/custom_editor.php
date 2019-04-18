<?php
// Hooks your functions into the correct filters
function my_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'my_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'my_register_mce_button' );
	}
}
add_action('admin_head', 'my_add_mce_button');

// Declare script for new button
function my_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['my_mce_button'] = get_template_directory_uri() .'/admin/js/mce-button.js?ver=2.1.0';
	return $plugin_array;
}

// Register new button in the editor
function my_register_mce_button( $buttons ) {
	array_push( $buttons, 'my_mce_button' );
	return $buttons;
}


function appthemes_add_quicktags() {
  if (wp_script_is('quicktags')){
?>
<script type="text/javascript">
  QTags.addButton('ytube', 'Youtube動画', '<div class="ytube">ここにYoutubeのコードを入力してください</div>' + '\n' + '\n', '');
  QTags.addButton('relatedcardlink', '関連記事カードリンク', '[clink url="ここに表示させたい記事URL"]' + '\n' + '\n', '');
  QTags.addButton('post_col-2', 'レイアウト2c', '<div class="post_row"><div class="post_col post_col-2">ここに左カラムに表示させたい任意のテキストや画像タグを入力します。</div><div class="post_col post_col-2">ここに右カラムに表示させたい任意のテキストや画像タグを入力します。</div></div>' + '\n' + '\n', '');
  QTags.addButton('post_col-3', 'レイアウト3c', '<div class="post_row"><div class="post_col post_col-3">ここに左カラムに表示させたい任意のテキストや画像タグを入力します。</div><div class="post_col post_col-3">ここに中央カラムに表示させたい任意のテキストや画像タグを入力します。</div><div class="post_col post_col-3">ここに右カラムに表示させたい任意のテキストや画像タグを入力してください。</div></div>' + '\n' + '\n', '');
  QTags.addButton('style3a', 'H3見出しa', '<h3 class="style3a">H3見出しa</h3>' + '\n' + '\n', '');
  QTags.addButton('style3b', 'H3見出しb', '<h3 class="style3b">H3見出しb</h3>' + '\n' + '\n', '');
  QTags.addButton('style4a', 'H4見出しa', '<h4 class="style4a">H4見出しa</h4>' + '\n' + '\n', '');
  QTags.addButton('style4b', 'H4見出しb', '<h4 class="style4b">H4見出しb</h4>' + '\n' + '\n', '');
  QTags.addButton('style5a', 'H5見出しa', '<h5 class="style5a">H5見出しa</h5>' + '\n' + '\n', '');
  QTags.addButton('style5b', 'H5見出しb', '<h5 class="style5b">H5見出しb</h5>' + '\n' + '\n', '');
  QTags.addButton('well', '囲み枠a', '<p class="well">囲み枠a</p>' + '\n' + '\n', '');
  QTags.addButton('well2', '囲み枠b', '<p class="well2">囲み枠b</p>' + '\n' + '\n', '');
  QTags.addButton('well3', '囲み枠c', '<p class="well3">囲み枠c</p>' + '\n' + '\n', '');
  QTags.addButton('q_button', 'フラットボタン', '<a href="#" class="q_button">フラットボタン</a>' + '\n' + '\n', '');
  QTags.addButton('q_button_l', 'フラットボタン-L', '<a href="#" class="q_button sz_l">フラットボタン-L</a>' + '\n' + '\n', '');
  QTags.addButton('q_button_s', 'フラットボタン-S', '<a href="#" class="q_button sz_s">フラットボタン-S</a>' + '\n' + '\n', '');
  QTags.addButton('q_button_blue', 'フラットボタン-blue', '<a href="#" class="q_button bt_blue">フラットボタン-blue</a>' + '\n' + '\n', '');
  QTags.addButton('q_button_green', 'フラットボタン-green', '<a href="#" class="q_button bt_green">フラットボタン-green</a>' + '\n' + '\n', '');
  QTags.addButton('q_button_red', 'フラットボタン-red', '<a href="#" class="q_button bt_red">フラットボタン-red</a>' + '\n' + '\n', '');
  QTags.addButton('q_button_yellow', 'フラットボタン-yellow', '<a href="#" class="q_button bt_yellow">フラットボタン-yellow</a>' + '\n' + '\n', '');
  QTags.addButton('q_button_rounded', '角丸ボタン', '<a href="#" class="q_button rounded">角丸ボタン</a>' + '\n' + '\n', '');
  QTags.addButton('q_button_rounded_l', '角丸ボタン-L', '<a href="#" class="q_button rounded sz_l">角丸ボタン-L</a>' + '\n' + '\n', '');
  QTags.addButton('q_button_rounded_s', '角丸ボタン-S', '<a href="#" class="q_button rounded sz_s">角丸ボタン-S</a>' + '\n' + '\n', '');
  QTags.addButton('q_button_pill', 'ラウンドボタン', '<a href="#" class="q_button pill">ラウンドボタン</a>' + '\n' + '\n', '');
  QTags.addButton('q_button_pill_l', 'ラウンドボタン-L', '<a href="#" class="q_button pill sz_l">ラウンドボタン-L</a>' + '\n' + '\n', '');
  QTags.addButton('q_button_pill_s', 'ラウンドボタン-S', '<a href="#" class="q_button pill sz_s">ラウンドボタン-S</a>' + '\n' + '\n', '');
  QTags.addButton('single_banner', '広告', '[s_ad]' + '\n' + '\n', '');
</script>
<?php
  }
}
add_action( 'admin_print_footer_scripts', 'appthemes_add_quicktags' );


?>
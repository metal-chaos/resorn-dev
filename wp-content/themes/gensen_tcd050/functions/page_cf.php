<?php

function tcd_page_meta_box() {
  add_meta_box(
    'page_meta_box1',//ID of meta box
    __('Page setting', 'tcd-w'),//label
    'show_tcd_page_meta_box',//callback function
    'page',// post type
    'normal',// context
    'high'// priority
  );
}
add_action('add_meta_boxes', 'tcd_page_meta_box', 11);

function show_tcd_page_meta_box() {
  global $post;

  // タイトル表示設定
  $display_title = array(
    'name' => __('Display title', 'tcd-w'),
    'id' => 'display_title',
    'type' => 'radio',
    'std' => 'show',
    'options' => array(
      array('name' => __('Display title', 'tcd-w'), 'value' => 'show'),
      array('name' => __('No title', 'tcd-w'), 'value' => 'hide')
    )
  );
  $display_title_meta = get_post_meta($post->ID, 'display_side_content', true);

  // サイドコンテンツの設定
  $display_side_content = array(
    'name' => __('Side content', 'tcd-w'),
    'id' => 'display_side_content',
    'type' => 'radio',
    'std' => 'show',
    'options' => array(
      array('name' => __('Display side content', 'tcd-w'), 'value' => 'show'),
      array('name' => __('No side content', 'tcd-w'), 'value' => 'hide')
    )
  );
  $display_side_content_meta = get_post_meta($post->ID, 'display_side_content', true);

  echo '<input type="hidden" name="custom_fields_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

  echo '<dl class="ml_custom_fields">';

  // タイトル表示設定
  echo '<dt class="label"><label for="' , $display_title['id'] , '">' , $display_title['name'] , '</label></dt>';
  echo '<dd class="content"><ul class="radio template side_content cf">';
  foreach ($display_title['options'] as $display_title_option) {
    echo '<li><label', ((empty($display_title_meta) && $display_title_option['value'] == $display_title['std']) || $display_title_meta == $display_title_option['value']) ? ' class="active"' : '' ,'><input type="radio" id ="side_content', $display_title_option['value'], '" name="', $display_title['id'], '" value="', $display_title_option['value'], '"', ((empty($display_title_meta) && $display_title_option['value'] == $display_title['std']) || $display_title_meta == $display_title_option['value']) ? ' checked="checked"' : '', ' />', $display_title_option['name'] , '</label></li>';
  }
  echo '</ul></dd>';

  // サイドコンテンツの選択
  echo '<dt class="label"><label for="' , $display_side_content['id'] , '">' , $display_side_content['name'] , '</label></dt>';
  echo '<dd class="content"><ul class="radio template side_content cf">';
  foreach ($display_side_content['options'] as $display_side_content_option) {
    echo '<li><label', ((empty($display_side_content_meta) && $display_side_content_option['value'] == $display_side_content['std']) || $display_side_content_meta == $display_side_content_option['value']) ? ' class="active"' : '' ,'><input type="radio" id ="side_content', $display_side_content_option['value'], '" name="', $display_side_content['id'], '" value="', $display_side_content_option['value'], '"', ((empty($display_side_content_meta) && $display_side_content_option['value'] == $display_side_content['std']) || $display_side_content_meta == $display_side_content_option['value']) ? ' checked="checked"' : '', ' />', $display_side_content_option['name'] , '</label></li>';
  }
  echo '</ul></dd>';

  echo '</dl>'."\n";
}

function save_custom_fields_meta_box( $post_id ) {

  // verify nonce
  if (!isset($_POST['custom_fields_meta_box_nonce']) || !wp_verify_nonce($_POST['custom_fields_meta_box_nonce'], basename(__FILE__))) {
    return $post_id;
  }

  // check autosave
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $post_id;
  }

  // check permissions
  if ('page' == $_POST['post_type']) {
    if (!current_user_can('edit_page', $post_id)) {
      return $post_id;
    }
  } elseif (!current_user_can('edit_post', $post_id)) {
      return $post_id;
  }

  // save or delete
  $cf_keys = array('display_title', 'display_side_content');
  foreach ($cf_keys as $cf_key) {
    $old = get_post_meta($post_id, $cf_key, true);

    if (isset($_POST[$cf_key])) {
      $new = $_POST[$cf_key];
    } else {
      $new = '';
    }

    if ($new && $new != $old) {
      update_post_meta($post_id, $cf_key, $new);
    } elseif ('' == $new && $old) {
      delete_post_meta($post_id, $cf_key, $old);
    }
  }

}
add_action('save_post', 'save_custom_fields_meta_box');


/* フォーム用 画像フィールド出力 */
function mlcf_media_form($cf_key, $label) {
	global $post;
	if (empty($cf_key)) return false;
	if (empty($label)) $label = $cf_key;

	$media_id = get_post_meta($post->ID, $cf_key, true);
?>
  <div class="cf cf_media_field hide-if-no-js <?php echo esc_attr($cf_key); ?>">
    <input type="hidden" class="cf_media_id" name="<?php echo esc_attr($cf_key); ?>" id="<?php echo esc_attr($cf_key); ?>" value="<?php echo esc_attr($media_id); ?>" />
    <div class="preview_field"><?php if ($media_id) the_mlcf_image($post->ID, $cf_key); ?></div>
    <div class="buttton_area">
     <input type="button" class="cfmf-select-img button" value="<?php _e('Select Image', 'tcd-w'); ?>" />
     <input type="button" class="cfmf-delete-img button<?php if (!$media_id) echo ' hidden'; ?>" value="<?php _e('Remove Image', 'tcd-w'); ?>" />
    </div>
  </div>
<?php
}




/* 画像フィールドで選択された画像をimgタグで出力 */
function the_mlcf_image($post_id, $cf_key, $image_size = 'medium') {
	echo get_mlcf_image($post_id, $cf_key, $image_size);
}

/* 画像フィールドで選択された画像をimgタグで返す */
function get_mlcf_image($post_id, $cf_key, $image_size = 'medium') {
	global $post;
	if (empty($cf_key)) return false;
	if (empty($post_id)) $post_id = $post->ID;

	$media_id = get_post_meta($post_id, $cf_key, true);
	if ($media_id) {
		return wp_get_attachment_image($media_id, $image_size, $image_size);
	}

	return false;
}

/* 画像フィールドで選択された画像urlを返す */
function get_mlcf_image_url($post_id, $cf_key, $image_size = 'medium') {
	global $post;
	if (empty($cf_key)) return false;
	if (empty($post_id)) $post_id = $post->ID;

	$media_id = get_post_meta($post_id, $cf_key, true);
	if ($media_id) {
		$img = wp_get_attachment_image_src($media_id, $image_size);
		if (!empty($img[0])) {
			return $img[0];
		}
	}

	return false;
}

/* 画像フィールドで選択されたメディアのURLを出力 */
function the_mlcf_media_url($post_id, $cf_key) {
	echo get_mlcf_media_url($post_id, $cf_key);
}

/* 画像フィールドで選択されたメディアのURLを返す */
function get_mlcf_media_url($post_id, $cf_key) {
	global $post;
	if (empty($cf_key)) return false;
	if (empty($post_id)) $post_id = $post->ID;

	$media_id = get_post_meta($post_id, $cf_key, true);
	if ($media_id) {
		return wp_get_attachment_url($media_id);
	}

	return false;
}



<?php

function page_meta_box() {
  add_meta_box(
    'page_meta_box2',//ID of meta box
    __('Page header image setting', 'tcd-w'),//label
    'show_page_meta_box',//callback function
    'page',// post type
    'normal',// context
    'high'// priority
  );
}
add_action('add_meta_boxes', 'page_meta_box');

function show_page_meta_box() {
  global $post;

  //キャッチフレーズ
  $headline = array( 'name' => __('Catchphrase', 'tcd-w'), 'desc' => '', 'id' => 'page_headline', 'type' => 'input', 'std' => '' );
  $headline_meta = esc_textarea(get_post_meta($post->ID, 'page_headline', true));

  //フォントサイズ
  $font_size = array( 'name' => __('Font size', 'tcd-w'), 'desc' => '', 'id' => 'page_headline_font_size', 'type' => 'input', 'std' => '32' );
  $font_size_meta = esc_html(get_post_meta($post->ID, 'page_headline_font_size', true));

  //フォントの色
  $font_color = array( 'name' => __('Font color', 'tcd-w'), 'desc' => '', 'id' => 'page_headline_color', 'type' => 'input', 'std' => '#ffffff' );
  $font_color_meta = esc_html(get_post_meta($post->ID, 'page_headline_color', true));

  //ドロップシャドウ
  $shadow1 = array( 'name' => __('Dropshadow position (left)', 'tcd-w'), 'desc' =>  __('If you want enter 0, please leave the field blank.', 'tcd-w'), 'id' => 'page_headline_shadow1', 'type' => 'input', 'std' => '0' );
  $shadow1_meta = esc_html(get_post_meta($post->ID, 'page_headline_shadow1', true));
  $shadow2 = array( 'name' => __('Dropshadow position (top)', 'tcd-w'), 'desc' => __('If you want enter 0, please leave the field blank.', 'tcd-w'), 'id' => 'page_headline_shadow2', 'type' => 'input', 'std' => '0' );
  $shadow2_meta = esc_html(get_post_meta($post->ID, 'page_headline_shadow2', true));
  $shadow3 = array( 'name' => __('Dropshadow size', 'tcd-w'), 'desc' => __('If you want enter 0, please leave the field blank.', 'tcd-w'), 'id' => 'page_headline_shadow3', 'type' => 'input', 'std' => '0' );
  $shadow3_meta = esc_html(get_post_meta($post->ID, 'page_headline_shadow3', true));
  $shadow4 = array( 'name' => __('Dropshadow color', 'tcd-w'), 'desc' => '', 'id' => 'page_headline_shadow4', 'type' => 'input', 'std' => '#333333' );
  $shadow4_meta = esc_html(get_post_meta($post->ID, 'page_headline_shadow4', true));

  echo '<input type="hidden" name="page_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

  echo '<dl class="ml_custom_fields">';

  //画像
  echo '<dt class="label"><label>' , __('Image', 'tcd-w') ,'</label></dt>';
  echo '<dd class="content"><p class="desc">' , __('Register image for page header.<br />Recommend image size. Width:1450px, Height:440px', 'tcd-w') , '</p>';
    mlcf_media_form('page_image', __('Image', 'tcd-w'));
  echo '</dd>';

  //キャッチフレーズ
  echo '<dt class="label"><label for="' , $headline['id'] , '">' , $headline['name'] , '</label></dt>';
  echo '<dd class="content"><textarea name="', $headline['id'], '" id="', $headline['id'], '" rows="2" style="width:100%">', $headline_meta ? $headline_meta : $headline['std'], '</textarea></dd>';

  //フォントサイズ
  echo '<dt class="label"><label for="' , $font_size['id'] , '">' , $font_size['name'] , '</label></dt>';
  echo '<dd class="content"><input type="text" name="', $font_size['id'], '" id="', $font_size['id'], '" value="', $font_size_meta ? $font_size_meta : $font_size['std'], '" size="30" class="font_size hankaku" />px</dd>';

  //フォントの色
  echo '<dt class="label"><label for="' , $font_color['id'] , '">' , $font_color['name'] , '</label></dt>';
  echo '<dd class="content"><input type="text" name="', $font_color['id'], '" id="', $font_color['id'], '" value="', $font_color_meta ? $font_color_meta : $font_color['std'], '" size="30" class="c-color-picker" data-default-color="#ffffff" /></dd>';

  //ドロップシャドウ
  echo '<dt class="label"><label for="' , $shadow1['id'] , '">' , $shadow1['name'] , '</label></dt>';
  echo '<dd class="content"><p class="desc">' , $shadow1['desc'] , '</p><input type="text" name="', $shadow1['id'], '" id="', $shadow1['id'], '" value="', $shadow1_meta ? $shadow1_meta : $shadow1['std'], '" size="30" class="font_size hankaku" />px</dd>';
  echo '<dt class="label"><label for="' , $shadow2['id'] , '">' , $shadow2['name'] , '</label></dt>';
  echo '<dd class="content"><p class="desc">' , $shadow2['desc'] , '</p><input type="text" name="', $shadow2['id'], '" id="', $shadow2['id'], '" value="', $shadow2_meta ? $shadow2_meta : $shadow2['std'], '" size="30" class="font_size hankaku" />px</dd>';
  echo '<dt class="label"><label for="' , $shadow3['id'] , '">' , $shadow3['name'] , '</label></dt>';
  echo '<dd class="content"><p class="desc">' , $shadow3['desc'] , '</p><input type="text" name="', $shadow3['id'], '" id="', $shadow3['id'], '" value="', $shadow3_meta ? $shadow3_meta : $shadow3['std'], '" size="30" class="font_size hankaku" />px</dd>';
  echo '<dt class="label"><label for="' , $shadow4['id'] , '">' , $shadow4['name'] , '</label></dt>';
  echo '<dd class="content"><input type="text" name="', $shadow4['id'], '" id="', $shadow4['id'], '" value="', $shadow4_meta ? $shadow4_meta : $shadow4['std'], '" size="30" class="c-color-picker" data-default-color="#333333" /></dd>';

  echo '</dl>';

}

function save_page_meta_box( $post_id ) {

  // verify nonce
  if (!isset($_POST['page_meta_box_nonce']) || !wp_verify_nonce($_POST['page_meta_box_nonce'], basename(__FILE__))) {
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
  $cf_keys = array('page_headline','page_headline_font_size','page_headline_color','page_headline_shadow1','page_headline_shadow2','page_headline_shadow3','page_headline_shadow4','page_image');
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
add_action('save_post', 'save_page_meta_box');




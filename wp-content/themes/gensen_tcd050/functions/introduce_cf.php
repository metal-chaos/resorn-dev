<?php

function tcd_introduce_meta_box() {
  global $dp_options;
  if ( ! $dp_options ) $dp_options = get_desing_plus_option();
  add_meta_box(
    'introduce_meta_box', // ID of meta box
    __( 'Introduce page setting', 'tcd-w' ), // label
    'show_tcd_introduce_meta_box', // callback function
    $dp_options['introduce_slug'], // post type
    'normal',// context
    'high'// priority
  );
}
add_action('add_meta_boxes', 'tcd_introduce_meta_box');

function show_tcd_introduce_meta_box() {
  global $post, $slider_time_options;

  echo '<input type="hidden" name="introduce_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
?>
<dl class="ml_custom_fields">
  <dt class="label"><label for="shoulder_copy"><?php _e( 'Shoulder copy', 'tcd-w' ); ?></label></dt>
  <dd class="content">
    <input type="text" id="shoulder_copy" name="shoulder_copy" value="<?php echo esc_attr(get_post_meta($post->ID, 'shoulder_copy', true)); ?>" class="large-text" />
  </dd>
  <dt class="label"><label for="shoulder_copy"><?php _e( 'Introduce Image slider', 'tcd-w' ); ?></label></dt>
  <dd class="content">
  <p><?php _e('Display image slider instead of eye catch image.', 'tcd-w'); ?></p>
<?php
  for ($i = 1; $i <= 5; $i++) :
    $slider_image = get_post_meta($post->ID, 'slider_image'.$i, true);
    $slider_caption = get_post_meta($post->ID, 'slider_caption'.$i, true);
?>
    <div class="sub_box cf">
     <h3 class="theme_option_subbox_headline"><?php printf(__('Slider%s setting', 'tcd-w'), $i); ?></h3>
     <div class="sub_box_content">
      <h4 class="theme_option_headline2"><?php _e('Slider image', 'tcd-w'); ?></h4>
      <p><?php _e('Recommend image size. Width:860px, Height:550px', 'tcd-w'); ?></p>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js slider_image<?php echo $i; ?>">
        <input type="hidden" value="<?php echo esc_attr( $slider_image ); ?>" id="slider_image<?php echo $i; ?>" name="slider_image<?php echo $i; ?>" class="cf_media_id">
        <div class="preview_field"><?php if ($slider_image){ echo wp_get_attachment_image($slider_image, 'medium'); } ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if (!$slider_image){ echo 'hidden'; } ?>">
        </div>
       </div>
      </div>
      <h4 class="theme_option_headline2"><?php _e('Image caption', 'tcd-w'); ?></h4>
      <textarea name="slider_caption<?php echo $i; ?>" row="2" class="large-text"><?php echo esc_textarea( $slider_caption ); ?></textarea>
     </div>
    </div>
<?php
  endfor;
?>
  </dd>
  <dt class="label"><label for="slider_time"><?php _e( 'Slider speed setting', 'tcd-w' ); ?></label></dt>
  <dd class="content">
<?php
  $slider_time = get_post_meta($post->ID, 'slider_time', true);
  if (!$slider_time) $slider_time = '7000';
?>
    <select id="slider_time" name="slider_time">
<?php
  foreach ( $slider_time_options as $option ) :
    if ( $slider_time == $option['value']) {
      $selected = 'selected="selected"';
    } else {
      $selected = '';
    }
    echo '<option value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $option['label'] . '</option>' ."\n";
  endforeach;
?>
    </select>
  </dd>
</dl>
<?php
}

function save_introduce_meta_box( $post_id ) {

  // verify nonce
  if (!isset($_POST['introduce_meta_box_nonce']) || !wp_verify_nonce($_POST['introduce_meta_box_nonce'], basename(__FILE__))) {
    return $post_id;
  }

  // check autosave
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $post_id;
  }

  // check permissions
  if (!current_user_can('edit_post', $post_id)) {
      return $post_id;
  }

  // save or delete
  $cf_keys = array('shoulder_copy', 'slider_time');
  for ($i = 1; $i <= 5; $i++) {
    $cf_keys[] = 'slider_image'.$i;
    $cf_keys[] = 'slider_caption'.$i;
  }
  foreach ($cf_keys as $cf_key) {
    $old = get_post_meta($post_id, $cf_key, true);

    if (isset($_POST[$cf_key])) {
      $new = $_POST[$cf_key];
    } else {
      $new = '';
    }

    if ($cf_key == 'slider_time') {
      $new = absint($new);
    }

    if ($new && $new != $old) {
      update_post_meta($post_id, $cf_key, $new);
    } elseif ('' == $new && $old) {
      delete_post_meta($post_id, $cf_key, $old);
    }
  }
}
add_action('save_post_introduce', 'save_introduce_meta_box');


<?php

function add_view_count_meta_box() {
  global $dp_options;
  if ( ! $dp_options ) $dp_options = get_desing_plus_option();
  add_meta_box(
    'view_count',//ID of meta box
    __('View count', 'tcd-w'),//label
    'show_view_count_meta_box',//callback function
    array('post', 'page', $dp_options['news_slug'], $dp_options['introduce_slug']),// post type
    'side',// context
    'default'// priority
  );
}
add_action('add_meta_boxes', 'add_view_count_meta_box');


function show_view_count_meta_box() {
  global $post;
?>
<input type="hidden" name="view_count_meta_box_nonce" value="<?php echo wp_create_nonce( basename( __FILE__ ) ); ?>" />
<p>
	<input type="number" name="_view_count" value="<?php echo intval( get_post_meta( $post->ID, '_view_count', true ) ); ?>" class="large-text" readonly="readonly" />
	<label><input type="checkbox" name="edit_view_count" value="1" /><?php _e( 'Edit view count', 'tcd-w' ); ?></label>
</p>
<script>
jQuery(document).ready(function($){
  $(':checkbox[name="edit_view_count"]').change(function(){
    if (this.checked) {
      $(this).closest('.inside').find('input[name="_view_count"]').removeAttr('readonly');
    } else {
      $(this).closest('.inside').find('input[name="_view_count"]').attr('readonly', 'readonly');
    }
  });
});
</script>
<?php
}


function save_view_count_meta_box( $post_id ) {

  // verify nonce
  if (!isset($_POST['view_count_meta_box_nonce']) || !wp_verify_nonce($_POST['view_count_meta_box_nonce'], basename(__FILE__))) {
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

  // save
  if (!empty($_POST['edit_view_count']) && isset($_POST['_view_count'])) {
    update_post_meta($post_id, '_view_count', intval($_POST['_view_count']));
  } elseif (get_post_meta($post_id, '_view_count', true) === '') {
    update_post_meta($post_id, '_view_count', 0);
  }

  return $post_id;
}
add_action('save_post', 'save_view_count_meta_box');


// 閲覧数カウントアップ
function view_count_up() {
  if (is_admin()) return;

  if (is_singular() || is_home()) {
    // 念のためリセット
    wp_reset_query();
    wp_reset_postdata();

    if (is_home()) {
      $queried_object = get_queried_object();
      if (!empty($queried_object->post_type) && $queried_object->post_type == 'page') {
        $post_id = $queried_object->ID;
      }
    } else {
      $post_id = get_the_ID();
    }

    if (!empty($post_id)) {
      update_post_meta($post_id, '_view_count', intval(get_post_meta($post_id, '_view_count', true)) + 1);
    }
  }
}
add_action('shutdown', 'view_count_up');


<?php

function add_css_to_post_custom_css_input() {
    global $post;
    echo '<input type="hidden" name="custom_css_noncename" id="custom_css_noncename" value="'.wp_create_nonce('custom-css').'" />';
    echo '<p>' . __('You don\'t need to enter &lt;style&gt; tag.', 'tcd-w') . '</p>';
    echo '<textarea name="custom_css" id="custom_css" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_css',true).'</textarea>';
}

function add_css_to_post_custom_css_hooks() {
    add_meta_box('custom_css', __('Custom CSS for this post', 'tcd-w'), 'add_css_to_post_custom_css_input', 'post', 'normal', 'low');
    add_meta_box('custom_css', __('Custom CSS for this page', 'tcd-w'), 'add_css_to_post_custom_css_input', 'page', 'normal', 'low');
}

function add_css_to_post_save_custom_css($post_id) {
    if (!isset($_POST['custom_css_noncename']) || !wp_verify_nonce($_POST['custom_css_noncename'], 'custom-css')) {
	return $post_id;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
	return $post_id;
    }
    $custom_css = $_POST['custom_css'];
    update_post_meta($post_id, '_custom_css', $custom_css);
}

function add_css_to_post_insert_custom_css() {
    if (is_page() || is_single()) {
	while (have_posts()) {
	    the_post();
	    echo '<style type="text/css">'.get_post_meta(get_the_ID(), '_custom_css', true).'</style>';
	}
	rewind_posts();
    }
}

function add_css_to_post_init() {
    add_action('admin_menu', 'add_css_to_post_custom_css_hooks');
    add_action('save_post', 'add_css_to_post_save_custom_css');
    add_action('wp_head','add_css_to_post_insert_custom_css');
}

add_action('init', 'add_css_to_post_init');

?>
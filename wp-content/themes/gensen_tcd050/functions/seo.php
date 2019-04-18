<?php

function seo_meta_box() {
  global $dp_options;
  if ( ! $dp_options ) $dp_options = get_desing_plus_option();
  add_meta_box(
    'add_seo_option',//ID of meta box
    __('Meta title and description', 'tcd-w'),//label
    'show_seo_meta_box',//callback function
    array('post', 'page', $dp_options['news_slug'], $dp_options['introduce_slug']),// post type
    'normal',// context
    'low'// priority
  );
}
add_action('add_meta_boxes', 'seo_meta_box');


function show_seo_meta_box() {
  global $post;

  //SEOタイトル
  $seo_title = array( 'name' => __('Meta title', 'tcd-w'), 'desc' => __('Enter meta title here.', 'tcd-w'), 'id' => 'tcd-w_meta_title', 'type' => 'input', 'std' => '' );
  $seo_title_meta = esc_html(get_post_meta($post->ID, 'tcd-w_meta_title', true));

  //SEOディスクリプション
  $seo_desc = array( 'name' => __('Meta description', 'tcd-w'), 'desc' => __('Enter meta description here.', 'tcd-w'), 'id' => 'tcd-w_meta_description', 'type' => 'textarea', 'std' => '' );
  $seo_desc_meta = esc_html(get_post_meta($post->ID, 'tcd-w_meta_description', true));

  echo '<input type="hidden" name="seo_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
?>
<script type="text/javascript">
jQuery(document).ready(function($){
  countField("#tcd-w_meta_description");
});
 
function countField(target) {
  jQuery(target).after("<span class=\"word_counter\" style='display:block; margin:0 15px 0 0; font-weight:bold;'></span>");
  jQuery(target).bind({
    keyup: function() {
      setCounter();
    },
    change: function() {
      setCounter();
    }
  });
  setCounter();
  function setCounter(){
    jQuery("span.word_counter").text("<?php _e('word count:', 'tcd-w'); ?>"+jQuery(target).val().length);
  };
}
</script>
<?php
  echo '<dl class="ml_custom_fields">';

  //SEOタイトル
  echo '<dt class="label"><label for="' , $seo_title['id'] , '">' , $seo_title['name'] , '</label></dt>';
  echo '<dd class="content"><p class="desc">' , $seo_title['desc'] , '</p>';
  echo '<input type="text" name="', $seo_title['id'], '" id="', $seo_title['id'], '" value="', $seo_title_meta ? $seo_title_meta : $seo_title['std'], '" size="30" style="width:100%" />';

  //SEOディスクリプション
  echo '<dt class="label"><label for="' , $seo_desc['id'] , '">' , $seo_desc['name'] , '</label></dt>';
  echo '<dd class="content"><p class="desc">' , $seo_desc['desc'] , '</p>';
  echo '<textarea name="', $seo_desc['id'], '" id="', $seo_desc['id'], '" cols="60" rows="2" style="width:97%">', $seo_desc_meta ? $seo_desc_meta : $seo_desc['std'], '</textarea>';

  echo '</dl>';

}


function save_seo_meta_box( $post_id ) {

  // verify nonce
  if (!isset($_POST['seo_meta_box_nonce']) || !wp_verify_nonce($_POST['seo_meta_box_nonce'], basename(__FILE__))) {
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
  $cf_keys = array('tcd-w_meta_title','tcd-w_meta_description');
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
add_action('save_post', 'save_seo_meta_box');


// titleタグの出力 --------------------------------------------------------------------------------
function seo_title($title, $sep) {

  global $post, $page, $paged, $dp_options, $custom_search_vars;
  if ( ! $dp_options ) $dp_options = get_desing_plus_option();
  $site_name = get_bloginfo( 'name', 'display' );

  if ( is_singular() && get_post_meta( $post->ID, 'tcd-w_meta_title', true ) ) {
    return esc_html( get_post_meta( $post->ID, 'tcd-w_meta_title', true ) );

  } elseif (is_feed()) {
    return $title;

  } elseif( !empty( $custom_search_vars ) ) {

    if ( $dp_options['search_results_headline'] )
      $title = $dp_options['search_results_headline'];
    else
      $title = __( 'Search Results', 'tcd-w' );

    if ( $paged >= 2 )
      $title .= " $sep " . sprintf( __( 'Page %s', 'tcd-w' ), $paged );

    return "$title $sep $site_name";

  } elseif ( is_home() && !is_front_page() ) {

    $headline = esc_html( $dp_options['blog_archive_headline'] );

    if ( $paged >= 2 )
      $headline .= " $sep " . sprintf( __( 'Page %s', 'tcd-w' ), $paged );

    return "$headline $sep $site_name";

  } elseif ( is_post_type_archive( $dp_options['news_slug'] ) ) {

    $headline = esc_html( $dp_options['news_label'] );

    if ( $paged >= 2 )
      $headline .= " $sep " . sprintf( __( 'Page %s', 'tcd-w' ), $paged );

    return "$headline $sep $site_name";

  } elseif ( is_post_type_archive( $dp_options['introduce_slug'] ) ) {

    $headline = esc_html( $dp_options['introduce_label'] );

    if ( $paged >= 2 )
      $headline .= " $sep " . sprintf( __( 'Page %s', 'tcd-w' ), $paged );

    return "$headline $sep $site_name";

  } elseif (is_tax()) {

    $title = sprintf( __( 'Post list for %s', 'tcd-w' ), single_cat_title( '', false ) );

    if ( $paged >= 2 )
      $title .= " $sep " . sprintf( __( 'Page %s', 'tcd-w' ), $paged );

    return "$title $sep $site_name";

  } elseif (is_category()) {

    $title = sprintf( __( 'Post list for %s', 'tcd-w' ), single_cat_title( '', false ) );

    if ( $paged >= 2 )
      $title .= " $sep " . sprintf( __( 'Page %s', 'tcd-w' ), $paged );

    return "$title $sep $site_name";

  } elseif( is_tag() ) {

    $title = sprintf( __( 'Search results for %s', 'tcd-w' ), single_tag_title( '', false ) );

    if ( $paged >= 2 )
      $title .= " $sep " . sprintf( __( 'Page %s', 'tcd-w' ), $paged );

    return "$title $sep $site_name";

  } elseif( is_search()) {

    $title = sprintf( __( 'Post list for %s', 'tcd-w' ), get_search_query() );

    if ( $paged >= 2 )
      $title .= " $sep " . sprintf( __( 'Page %s', 'tcd-w' ), $paged );

    return "$title $sep $site_name";

  } elseif ( is_day() ) {

    $title = sprintf( __( 'Archive for %s', 'tcd-w' ), get_the_time( __( 'F jS, Y', 'tcd-w' ) ) );

    if ( $paged >= 2 )
      $title .= " $sep " . sprintf( __( 'Page %s', 'tcd-w' ), $paged );

    return "$title $sep $site_name";

  } elseif ( is_month() ) {

    $title = sprintf( __( 'Archive for %s', 'tcd-w' ), get_the_time( __( 'F, Y', 'tcd-w' ) ) );

    if ( $paged >= 2 )
      $title .= " $sep " . sprintf( __( 'Page %s', 'tcd-w' ), $paged );

    return "$title $sep $site_name";

  } elseif ( is_year() ) {

    $title = sprintf( __( 'Archive for %s', 'tcd-w' ), get_the_time( __( 'Y', 'tcd-w' ) ) );

    if ( $paged >= 2 )
      $title .= " $sep " . sprintf( __( 'Page %s', 'tcd-w' ), $paged );

    return "$title $sep $site_name";

  } elseif ( is_author() ) {

    global $wp_query;
    $curauth = $wp_query->get_queried_object();
    $title = sprintf( __( 'Archive for %s', 'tcd-w' ), $curauth->display_name );

    if ( $paged >= 2 )
      $title .= " $sep " . sprintf( __( 'Page %s', 'tcd-w' ), $paged );

    return "$title $sep $site_name";

  } else {

    $title .= get_bloginfo( 'name', 'display' );

    if ( $paged >= 2 || $page >= 2 )
      $title .= " $sep " . sprintf( __( 'Page %s', 'tcd-w' ), max( $paged, $page ) );

    if ( is_front_page() && get_bloginfo( 'description', 'display' ) )
      $title .= " $sep " . get_bloginfo( 'description', 'display' );

    return $title;

  }
}
add_filter( 'wp_title', 'seo_title', 10, 2 );



// meta descriptionタグの出力 --------------------------------------------------------------------------------
function seo_description() {

 global $post;

 //カスタムフィールドがある場合
 if(is_single()&&get_post_meta($post->ID,'tcd-w_meta_description',true) or is_page()&&get_post_meta($post->ID,'tcd-w_meta_description',true)){
  $trim_content = post_custom('tcd-w_meta_description');
  $trim_content = str_replace(array("\r\n", "\r", "\n"), "", $trim_content);
  $trim_content = htmlspecialchars($trim_content);
  echo $trim_content;


 //抜粋記事が登録されている場合は出力
 } elseif(is_single()&&has_excerpt() or is_page()&&has_excerpt()) { 
  $trim_content = get_the_excerpt();
  $trim_content = str_replace(array("\r\n", "\r", "\n"), "", $trim_content);
  echo $trim_content;


 //上記が無い場合は本文から120文字を抜粋
 } elseif(is_single() or is_page()) {

   $base_content = $post->post_content;
   $base_content = preg_replace('!<style.*?>.*?</style.*?>!is', '', $base_content);
   $base_content = preg_replace('!<script.*?>.*?</script.*?>!is', '', $base_content);
   $base_content = preg_replace('/\[.+\]/','', $base_content);
   $base_content = strip_tags($base_content);
   $trim_content = mb_substr($base_content, 0, 120 ,"utf-8");
   $trim_content = str_replace(']]>', ']]&gt;', $trim_content);
   $trim_content = str_replace(array("\r\n", "\r", "\n"), "", $trim_content);
   $trim_content = htmlspecialchars($trim_content);

   if(preg_match("/。/", $trim_content)) { //指定した文字数内にある、最後の「。」以降をカットして表示
     mb_regex_encoding("UTF-8"); 
     $trim_content = mb_ereg_replace('。[^。]*$', '。', $trim_content);
     echo $trim_content;
   }else{ //指定した文字数内に「。」が無い場合は、指定した文字数の文章を表示し、末尾に「…」を表示
     echo $trim_content . '...';
   };

 } elseif (is_day()) {

    printf(__('Archive for %s', 'tcd-w'), get_the_time(__('F jS, Y', 'tcd-w')));

 } elseif(is_month()) {

    printf(__('Archive for %s', 'tcd-w'), get_the_time(__('F, Y', 'tcd-w')));

 } elseif(is_year()) {

    printf(__('Archive for %s', 'tcd-w'), get_the_time(__('Y', 'tcd-w')));

 } elseif (is_author()) {

    global $wp_query;
    $curauth = $wp_query->get_queried_object();
    printf(__('Archive for %s', 'tcd-w'), $curauth->display_name);

 } elseif (is_search()) {

    printf(__('Post list for %s', 'tcd-w'), get_search_query());

 } elseif (is_category()) {

  $cat_id = get_query_var('cat');
  $cat_data = get_option("cat_$cat_id");
  if(category_description()) {
    $category_desc = strip_tags(category_description());
    $category_desc = str_replace(array("\r\n", "\r", "\n"), "", $category_desc);
    echo esc_html($category_desc);
  } else {
    return;
  };

 } else {

    echo get_bloginfo('description');

 };

};


?>
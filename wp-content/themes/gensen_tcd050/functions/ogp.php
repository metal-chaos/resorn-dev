<?php
function og_image($n) {
	global $post, $dp_options;
	if ( ! $dp_options ) $dp_options = get_desing_plus_option();

	$myArray = array();
	if ( is_single() && has_post_thumbnail()) {
		$post_thumbnail_id = get_post_thumbnail_id($post->ID);
		$image = wp_get_attachment_image_src( $post_thumbnail_id, 'full');
		list($myArray[0], $myArray[1], $myArray[2]) = $image;
		echo esc_attr($myArray[$n]);
	} else {
		if($dp_options['ogp_image']){
			$image = wp_get_attachment_image_src( $dp_options['ogp_image'], 'full');
			list($myArray[0], $myArray[1], $myArray[2]) = $image;
			echo esc_attr($myArray[$n]);
		}else{
			$myArray[0] = get_bloginfo('template_url') . '/img/common/no_image2.gif';
			$myArray[1] = 380;
			$myArray[2] = 230;
			echo esc_attr($myArray[$n]);
		}
	};
}
function twitter_image() {
	global $post, $dp_options;
	if ( ! $dp_options ) $dp_options = get_desing_plus_option();
	if ( is_single() && has_post_thumbnail()) {
		$post_thumbnail_id = get_post_thumbnail_id($post->ID);
		# 「size2」を「full」に変更
		$image = wp_get_attachment_image_src( $post_thumbnail_id, 'full');
		list($src, $width, $height) = $image;
		echo esc_attr($src);
	} else {
		if($dp_options['ogp_image']){
			$image = wp_get_attachment_image_src( $dp_options['ogp_image'], 'full');
			list($src, $width, $height) = $image;
			echo esc_attr($src);
		}else{
			echo get_bloginfo('template_url') . '/img/common/no_image2.gif';
		}
	};
}
?>
<?php
function ogp() {
  global $post, $dp_options;
  if ( ! $dp_options ) $dp_options = get_desing_plus_option();
?>
<?php if(is_singular()) { ?>
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http' ) . ':/' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>">
<?php if(is_front_page()){ ?>
<meta property="og:title" content="<?php echo get_bloginfo('name'); ?>" />
<?php }else{ ?>
<meta property="og:title" content="<?php the_title(); ?>" />
<?php }; ?>
<meta property="og:description" content="<?php seo_description(); ?>" />
<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
<meta property="og:image" content='<?php og_image(0); ?>'>
<meta property="og:image:secure_url" content="<?php og_image(0); ?>" />
<meta property="og:image:width" content="<?php og_image(1); ?>" />
<meta property="og:image:height" content="<?php og_image(2); ?>" />
<?php if($dp_options['fb_admin_id']) { ?>
<meta property="fb:admins" content="<?php echo $dp_options['fb_admin_id']; ?>" />
<?php }; ?>
<?php if($dp_options['use_twitter_card']) { ?>
<meta name="twitter:card" content="summary" />
<?php if($dp_options['twitter_account_name']) { ?>
<meta name="twitter:site" content="@<?php echo $dp_options['twitter_account_name']; ?>" />
<?php }; ?>
<?php if($dp_options['twitter_account_name']) { ?>
<meta name="twitter:creator" content="@<?php echo $dp_options['twitter_account_name']; ?>" />
<?php }; ?>
<meta name="twitter:title" content="<?php the_title(); ?>" />
<meta name="twitter:description" content="<?php seo_description(); ?>" />
<meta name="twitter:image:src" content='<?php twitter_image(); ?>' />
<?php }; ?>
<?php }else{ ?>
<meta property="og:type" content="blog" />
<meta property="og:url" content="<?php echo ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http' ) . ':/' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>">
<?php if(is_home()){ ?>
<meta property="og:title" content="<?php echo get_bloginfo('name'); ?>" />
<?php }else{ ?>
<meta property="og:title" content="<?php the_title(); ?>" />
<?php }; ?>
<meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />
<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
<meta property="og:image" content='<?php og_image(0); ?>'>
<meta property="og:image:secure_url" content="<?php og_image(0); ?>" />
<meta property="og:image:width" content="<?php og_image(1); ?>" />
<meta property="og:image:height" content="<?php og_image(2); ?>" />
<?php if($dp_options['fb_admin_id']) { ?>
<meta property="fb:admins" content="<?php echo $dp_options['fb_admin_id']; ?>" />
<?php }; ?>
<?php if($dp_options['use_twitter_card']) { ?>
<meta name="twitter:card" content="summary" />
<?php if($dp_options['twitter_account_name']) { ?>
<meta name="twitter:site" content="@<?php echo $dp_options['twitter_account_name']; ?>" />
<?php }; ?>
<?php if($dp_options['twitter_account_name']) { ?>
<meta name="twitter:creator" content="@<?php echo $dp_options['twitter_account_name']; ?>" />
<?php }; ?>
<meta name="twitter:title" content="<?php echo get_bloginfo('name'); ?>" />
<meta name="twitter:description" content="<?php echo get_bloginfo('description'); ?>" />
<?php }; ?>
<?php }; ?>
<?php }; ?>

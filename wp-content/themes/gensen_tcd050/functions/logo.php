<?php

//ヘッダーロゴ　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function header_logo(){
  global $dp_options;
  if ( ! $dp_options ) $dp_options = get_desing_plus_option();

  $logo_image = wp_get_attachment_image_src( $dp_options['header_logo_image'], 'full' );
  $logo_image_mobile = wp_get_attachment_image_src( $dp_options['header_logo_image_mobile'], 'full' );
  $title = esc_attr(get_bloginfo('name'));
  $desc = esc_attr(get_bloginfo('description'));
  if ( is_front_page()) {
    $desc_tag = $desc ? '<span class="desc">'.$desc.'</span>' : '';
  } else {
    $desc_tag = $desc ? '<span class="desc des_black">'.$desc.'</span>' : '';
  }
  $url = home_url();

  if(!is_mobile() || is_no_responsive()) { //if is pc
    if(!empty($logo_image)){
      if($dp_options['header_logo_retina'] == 1) {
        $img_attr = ' height="'.floor($logo_image[2] / 2).'" class="logo_retina"';
      } else {
        $img_attr = '';
      }
?>
<div id="logo_image">
 <h1 class="logo">
  <a href="<?php echo $url; ?>/" title="<?php echo $title; ?>" data-label="<?php echo $title; ?>"><img src="<?php echo $logo_image[0]; ?>?<?php echo time(); ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>"<?php echo $img_attr; ?> /><?php echo $desc_tag; ?></a>
 </h1>
</div>
<?php
    } else {
?>
<div id="logo_text">
 <h1 class="logo"><a href="<?php echo $url; ?>/"><span class="rich_font"><?php echo $title; ?></span><?php echo $desc_tag; ?></a></h1>
</div>
<?php
    };
  } else { //if is mobile device
    if(!empty($logo_image_mobile)){
      if($dp_options['header_logo_retina_mobile'] == 1) {
        $img_attr = ' height="'.floor($logo_image_mobile[2] / 2).'" class="logo_retina"';
      } else {
        $img_attr = '';
      }
?>
<div id="logo_image">
 <h1 class="logo">
  <a href="<?php echo $url; ?>/" title="<?php echo $title; ?>"><img src="<?php echo $logo_image_mobile[0]; ?>?<?php echo time(); ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>"<?php echo $img_attr; ?> /></a>
 </h1>
</div>
<?php
    } else {
?>
<div id="logo_text">
 <h1 class="logo"><a href="<?php echo $url; ?>/"><span class="rich_font"><?php echo $title; ?></span><?php echo $desc_tag; ?></a></h1>
</div>
<?php
    };
  };

}


//ヘッダーロゴ（固定ヘッダー用）　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function header_logo_fix(){
  global $dp_options;
  if ( ! $dp_options ) $dp_options = get_desing_plus_option();

  $logo_image = wp_get_attachment_image_src( $dp_options['header_logo_image_fix'], 'full' );
  $logo_image_mobile = wp_get_attachment_image_src( $dp_options['header_logo_image_mobile_fix'], 'full' );
  $title = esc_attr(get_bloginfo('name'));
  $url = home_url();
  if(!is_mobile() || is_no_responsive()) { //if is pc
    if(!empty($logo_image)){
      if($dp_options['header_logo_retina_fix'] == 1) {
        $img_attr = ' height="'.floor($logo_image[2] / 2).'" class="logo_retina"';
      } else {
        $img_attr = '';
      }
?>
<div id="logo_image_fixed">
 <p class="logo rich_font"><a href="<?php echo $url; ?>/" title="<?php echo $title; ?>"><img src="<?php echo $logo_image[0]; ?>?<?php echo time(); ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>"<?php echo $img_attr; ?> /></a></p>
</div>
<?php
    } else {
?>
<div id="logo_text_fixed">
 <p class="logo rich_font"><a href="<?php echo $url; ?>/" title="<?php echo $title; ?>"><?php echo $title; ?></a></p>
</div>
<?php
    };
  } else { //if is mobile device
    if(!empty($logo_image_mobile)){
      if($dp_options['header_logo_retina_mobile_fix'] == 1) {
        $img_attr = ' height="'.floor($logo_image_mobile[2] / 2).'" class="logo_retina"';
      } else {
        $img_attr = '';
      }
?>
<div id="logo_image_fixed">
 <p class="logo rich_font"><a href="<?php echo $url; ?>/" title="<?php echo $title; ?>"><img src="<?php echo $logo_image_mobile[0]; ?>?<?php echo time(); ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>"<?php echo $img_attr; ?> /></a></p>
</div>
<?php
    } else {
?>
<div id="logo_text_fixed">
 <p class="logo rich_font"><a href="<?php echo $url; ?>/" title="<?php echo $title; ?>"><?php echo $title; ?></a></p>
</div>
<?php
    };
  };

}


//フッターロゴ　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function footer_logo(){
  global $dp_options;
  if ( ! $dp_options ) $dp_options = get_desing_plus_option();

  $logo_image = wp_get_attachment_image_src( $dp_options['footer_logo_image'], 'full' );
  $title = esc_attr(get_bloginfo('name'));
  $url = home_url();

    if(!empty($logo_image)){
      if($dp_options['footer_logo_retina'] == 1) {
        $img_attr = ' height="'.floor($logo_image[2] / 2).'" class="logo_retina"';
      } else {
        $img_attr = '';
      }
?>
<div class="logo_area">
 <p class="logo rich_font"><a href="<?php echo $url; ?>/" title="<?php echo $title; ?>"><img src="<?php echo $logo_image[0]; ?>?<?php echo time(); ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>"<?php echo $img_attr; ?> /></a></p>
</div>
<?php
    } else {
?>
<div class="logo_area ">
 <p class="logo logo_text rich_font"><a href="<?php echo $url; ?>/"><?php echo $title; ?></a></p>
</div>
<?php
    };

}

?>
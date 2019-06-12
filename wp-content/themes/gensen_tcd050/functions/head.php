<?php
function tcd_head() {
  global $dp_options, $header_slider;
  if ( ! $dp_options ) $dp_options = get_desing_plus_option();
?>

<link rel="stylesheet"
  href="<?php echo get_template_directory_uri(); ?>/css/design-plus.css?ver=<?php echo version_num(); ?>">
<link rel="stylesheet"
  href="<?php echo get_template_directory_uri(); ?>/css/sns-botton.css?ver=<?php echo version_num(); ?>">
<?php if( !is_no_responsive() ) { ?>
<link rel="stylesheet"
  href="<?php echo get_template_directory_uri(); ?>/css/responsive.css?ver=<?php echo version_num(); ?>">
<link rel="stylesheet"
  href="<?php echo get_template_directory_uri(); ?>/css/footer-bar.css?ver=<?php echo version_num(); ?>">
<?php } ?>

<script
  src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js?ver=<?php echo version_num(); ?>">
</script>
<script
  src="<?php echo get_template_directory_uri(); ?>/js/jquery.textOverflowEllipsis.js?ver=<?php echo version_num(); ?>">
</script>
<script
  src="<?php echo get_template_directory_uri(); ?>/js/jscript.js?ver=<?php echo version_num(); ?>">
</script>
<script
  src="<?php echo get_template_directory_uri(); ?>/js/comment.js?ver=<?php echo version_num(); ?>">
</script>
<script
  src="<?php echo get_template_directory_uri(); ?>/js/recruit_lists.js?ver=<?php echo version_num(); ?>">
</script>
<script
  src="<?php echo get_template_directory_uri(); ?>/js/sort.js?ver=<?php echo version_num(); ?>">
</script>
<script
  src="<?php echo get_template_directory_uri(); ?>/js/mixpanel.js?ver=<?php echo version_num(); ?>">
</script>
<?php if($dp_options['header_fix'] == 'type2' || $dp_options['mobile_header_fix'] == 'type2') { ?>
<script
  src="<?php echo get_template_directory_uri(); ?>/js/header_fix.js?ver=<?php echo version_num(); ?>">
</script>
<?php } ?>
<script
  src="<?php echo get_template_directory_uri(); ?>/js/jquery.chosen.min.js?ver=<?php echo version_num(); ?>">
</script>
<link rel="stylesheet"
  href="<?php echo get_template_directory_uri(); ?>/css/jquery.chosen.css?ver=<?php echo version_num(); ?>">

<style type="text/css">
  <?php
     if (strtoupper(get_locale()) == 'JA') {
       if($dp_options['font_type'] == 'type1') {
?>
  body,
  input,
  textarea,
  select {
    font-family: Arial, "ヒラギノ角ゴ ProN W3", "Hiragino Kaku Gothic ProN", "メイリオ", Meiryo, sans-serif;
  }

  <?php  } elseif($dp_options['font_type'] == 'type2') { ?>
  body,
  input,
  textarea,
  select {
    font-family: 'Orbitron', 'M PLUS 1p', "Segoe UI", Verdana, "游ゴシック", YuGothic, "Hiragino Kaku Gothic ProN", Meiryo, sans-serif;
  }

  <?php  } else { ?>
  body,
  input,
  textarea,
  select {
    font-family: "Times New Roman", "游明朝", "Yu Mincho", "游明朝体", "YuMincho", "ヒラギノ明朝 Pro W3", "Hiragino Mincho Pro", "HiraMinProN-W3", "HGS明朝E", "ＭＳ Ｐ明朝", "MS PMincho", serif;
  }

  <?php
       }
       if($dp_options['headline_font_type'] == 'type1') {
?>
  .rich_font {
    font-family: Arial, "ヒラギノ角ゴ ProN W3", "Hiragino Kaku Gothic ProN", "メイリオ", Meiryo, sans-serif;
    font-weight: normal;
  }

  <?php  } elseif($dp_options['headline_font_type'] == 'type2') { ?>
  .rich_font {
    font-family: 'Orbitron', 'M PLUS 1p', "Hiragino Sans", "ヒラギノ角ゴ ProN", "Hiragino Kaku Gothic ProN", "游ゴシック", YuGothic, "メイリオ", Meiryo, sans-serif;
    font-weight: 500;
  }

  <?php  } else { ?>
  .rich_font {
    font-family: "Times New Roman", "游明朝", "Yu Mincho", "游明朝体", "YuMincho", "ヒラギノ明朝 Pro W3", "Hiragino Mincho Pro", "HiraMinProN-W3", "HGS明朝E", "ＭＳ Ｐ明朝", "MS PMincho", serif;
    font-weight: 500;
  }

  <?php
       }
     }
?>

  #header_logo #logo_text .logo {
    font-size:
      <?php echo esc_html($dp_options['logo_font_size']); ?>
      px;
  }

  #header_logo_fix #logo_text_fixed .logo {
    font-size:
      <?php echo esc_html($dp_options['logo_font_size_fix']); ?>
      px;
  }

  #footer_logo .logo_text {
    font-size:
      <?php echo esc_html($dp_options['logo_font_size_footer']); ?>
      px;
  }

  #post_title {
    font-size:
      <?php echo esc_html($dp_options['title_font_size']); ?>
      px;
  }

  .post_content {
    font-size:
      <?php echo esc_html($dp_options['content_font_size']); ?>
      px;
  }

  #archive_headline {
    font-size:
      <?php echo esc_html($dp_options['blog_archive_headline_font_size']); ?>
      px;
  }

  #archive_desc {
    font-size:
      <?php echo esc_html($dp_options['blog_archive_desc_font_size']); ?>
      px;
  }

  <?php if (!is_no_responsive()) { ?>
  @media screen and (max-width:991px) {
    #header_logo #logo_text .logo {
      font-size:
        <?php echo esc_html($dp_options['logo_font_size_mobile']); ?>
        px;
    }

    #header_logo_fix #logo_text_fixed .logo {
      font-size:
        <?php echo esc_html($dp_options['logo_font_size_mobile_fix']); ?>
        px;
    }

    #footer_logo .logo_text {
      font-size:
        <?php echo esc_html($dp_options['logo_font_size_footer_mobile']); ?>
        px;
    }

    #post_title {
      font-size:
        <?php echo esc_html($dp_options['title_font_size_mobile']); ?>
        px;
    }

    .post_content {
      font-size:
        <?php echo esc_html($dp_options['content_font_size_mobile']); ?>
        px;
    }

    #archive_headline {
      font-size:
        <?php echo esc_html($dp_options['blog_archive_headline_font_size_mobile']); ?>
        px;
    }

    #archive_desc {
      font-size:
        <?php echo esc_html($dp_options['blog_archive_desc_font_size_mobile']); ?>
        px;
    }
  }

  <?php } ?>

  <?php if($dp_options['column_float']){ ?>
  #left_col {
    float: right;
  }

  #side_col {
    float: left;
  }

  <?php } ?>

  <?php
      // ローディングアイコン
      if($dp_options['use_load_icon']){
        $hex_color1 = implode(',', hex2rgb($dp_options['pickedcolor1']));
        $hex_color2 = implode(',', hex2rgb($dp_options['pickedcolor2']));
?>
  #site_wrap {
    display: none;
  }

  #site_loader_overlay {
    background: #fff;
    opacity: 1;
    position: fixed;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    width: 100vw;
    height: 100vh;
    z-index: 99999;
  }

  <?php   if($dp_options['load_icon'] == 'type2'){ ?>
  #site_loader_animation {
    margin: -22px 0 0 -22px;
    width: 44px;
    height: 44px;
    position: fixed;
    top: 50%;
    left: 50%;
  }

  #site_loader_animation:before {
    position: absolute;
    bottom: 0;
    left: 0;
    display: block;
    width: 12px;
    height: 12px;
    content: '';
    box-shadow: 16px 0 0 rgba(
        <?php echo $hex_color1; ?>
        , 1), 32px 0 0 rgba(
        <?php echo $hex_color1; ?>
        , 1), 0 -16px 0 rgba(
        <?php echo $hex_color1; ?>
        , 1), 16px -16px 0 rgba(
        <?php echo $hex_color1; ?>
        , 1), 32px -16px 0 rgba(
        <?php echo $hex_color1; ?>
        , 1), 0 -32px rgba(
        <?php echo $hex_color1; ?>
        , 1), 16px -32px rgba(
        <?php echo $hex_color1; ?>
        , 1), 32px -32px rgba(
        <?php echo $hex_color2; ?>
        , 0);
    animation: loading-square-loader 5.4s linear forwards infinite;
  }

  #site_loader_animation:after {
    position: absolute;
    bottom: 10px;
    left: 0;
    display: block;
    width: 12px;
    height: 12px;
    background-color: rgba(
        <?php echo $hex_color2; ?>
        , 1);
    opacity: 0;
    content: '';
    animation: loading-square-base 5.4s linear forwards infinite;
  }

  @-webkit-keyframes loading-square-base {
    0% {
      bottom: 10px;
      opacity: 0;
    }

    5%,
    50% {
      bottom: 0;
      opacity: 1;
    }

    55%,
    100% {
      bottom: -10px;
      opacity: 0;
    }
  }

  @keyframes loading-square-base {
    0% {
      bottom: 10px;
      opacity: 0;
    }

    5%,
    50% {
      bottom: 0;
      opacity: 1;
    }

    55%,
    100% {
      bottom: -10px;
      opacity: 0;
    }
  }

  @-webkit-keyframes loading-square-loader {
    0% {
      box-shadow: 16px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -32px rgba(242, 205, 123, 0);
    }

    5% {
      box-shadow: 16px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -32px rgba(242, 205, 123, 0);
    }

    10% {
      box-shadow: 16px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -32px rgba(242, 205, 123, 0);
    }

    15% {
      box-shadow: 16px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -24px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -32px rgba(242, 205, 123, 0);
    }

    20% {
      box-shadow: 16px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -24px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -32px rgba(242, 205, 123, 0);
    }

    25% {
      box-shadow: 16px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -24px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -32px rgba(242, 205, 123, 0);
    }

    30% {
      box-shadow: 16px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -50px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -32px rgba(242, 205, 123, 0);
    }

    35% {
      box-shadow: 16px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -50px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -32px rgba(242, 205, 123, 0);
    }

    40% {
      box-shadow: 16px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -50px rgba(242, 205, 123, 0);
    }

    45%,
    55% {
      box-shadow: 16px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -32px rgba(
          <?php echo $hex_color2; ?>
          , 1);
    }

    60% {
      box-shadow: 16px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -32px rgba(
          <?php echo $hex_color2; ?>
          , 1);
    }

    65% {
      box-shadow: 16px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -32px rgba(
          <?php echo $hex_color2; ?>
          , 1);
    }

    70% {
      box-shadow: 16px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -32px rgba(
          <?php echo $hex_color2; ?>
          , 1);
    }

    75% {
      box-shadow: 16px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -32px rgba(
          <?php echo $hex_color2; ?>
          , 1);
    }

    80% {
      box-shadow: 16px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -32px rgba(
          <?php echo $hex_color2; ?>
          , 1);
    }

    85% {
      box-shadow: 16px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -24px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -32px rgba(
          <?php echo $hex_color2; ?>
          , 1);
    }

    90% {
      box-shadow: 16px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -24px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -24px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -32px rgba(
          <?php echo $hex_color2; ?>
          , 1);
    }

    95%,
    100% {
      box-shadow: 16px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -24px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -24px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -24px rgba(
          <?php echo $hex_color2; ?>
          , 0);
    }
  }

  @keyframes loading-square-loader {
    0% {
      box-shadow: 16px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -32px rgba(242, 205, 123, 0);
    }

    5% {
      box-shadow: 16px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -32px rgba(242, 205, 123, 0);
    }

    10% {
      box-shadow: 16px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -32px rgba(242, 205, 123, 0);
    }

    15% {
      box-shadow: 16px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -24px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -32px rgba(242, 205, 123, 0);
    }

    20% {
      box-shadow: 16px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -24px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -32px rgba(242, 205, 123, 0);
    }

    25% {
      box-shadow: 16px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -24px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -32px rgba(242, 205, 123, 0);
    }

    30% {
      box-shadow: 16px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -50px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -32px rgba(242, 205, 123, 0);
    }

    35% {
      box-shadow: 16px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -50px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -32px rgba(242, 205, 123, 0);
    }

    40% {
      box-shadow: 16px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -50px rgba(242, 205, 123, 0);
    }

    45%,
    55% {
      box-shadow: 16px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -32px rgba(
          <?php echo $hex_color2; ?>
          , 1);
    }

    60% {
      box-shadow: 16px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 0 rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -32px rgba(
          <?php echo $hex_color2; ?>
          , 1);
    }

    65% {
      box-shadow: 16px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -32px rgba(
          <?php echo $hex_color2; ?>
          , 1);
    }

    70% {
      box-shadow: 16px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -32px rgba(
          <?php echo $hex_color2; ?>
          , 1);
    }

    75% {
      box-shadow: 16px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -16px rgba(
          <?php echo $hex_color1; ?>
          , 1), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -32px rgba(
          <?php echo $hex_color2; ?>
          , 1);
    }

    80% {
      box-shadow: 16px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -32px rgba(
          <?php echo $hex_color2; ?>
          , 1);
    }

    85% {
      box-shadow: 16px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -24px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -32px rgba(
          <?php echo $hex_color1; ?>
          , 1), 32px -32px rgba(
          <?php echo $hex_color2; ?>
          , 1);
    }

    90% {
      box-shadow: 16px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -24px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -24px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -32px rgba(
          <?php echo $hex_color2; ?>
          , 1);
    }

    95%,
    100% {
      box-shadow: 16px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px 8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -8px rgba(
          <?php echo $hex_color1; ?>
          , 0), 0 -24px rgba(
          <?php echo $hex_color1; ?>
          , 0), 16px -24px rgba(
          <?php echo $hex_color1; ?>
          , 0), 32px -24px rgba(
          <?php echo $hex_color2; ?>
          , 0);
    }
  }

  <?php   } elseif($dp_options['load_icon'] == 'type3'){ ?>
  #site_loader_animation {
    width: 100%;
    min-width: 160px;
    font-size: 16px;
    text-align: center;
    position: fixed;
    top: 50%;
    left: 0;
    opacity: 0;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    filter: alpha(opacity=0);
    -webkit-animation: loading-dots-fadein .5s linear forwards;
    -moz-animation: loading-dots-fadein .5s linear forwards;
    -o-animation: loading-dots-fadein .5s linear forwards;
    -ms-animation: loading-dots-fadein .5s linear forwards;
    animation: loading-dots-fadein .5s linear forwards;
  }

  #site_loader_animation i {
    width: .5em;
    height: .5em;
    display: inline-block;
    vertical-align: middle;
    background: #e0e0e0;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    margin: 0 .25em;
    background:
      <?php echo $dp_options['pickedcolor1']; ?>
    ;
    -webkit-animation: loading-dots-middle-dots .5s linear infinite;
    -moz-animation: loading-dots-middle-dots .5s linear infinite;
    -ms-animation: loading-dots-middle-dots .5s linear infinite;
    -o-animation: loading-dots-middle-dots .5s linear infinite;
    animation: loading-dots-middle-dots .5s linear infinite;
  }

  #site_loader_animation i:first-child {
    -webkit-animation: loading-dots-first-dot .5s infinite;
    -moz-animation: loading-dots-first-dot .5s linear infinite;
    -ms-animation: loading-dots-first-dot .5s linear infinite;
    -o-animation: loading-dots-first-dot .5s linear infinite;
    animation: loading-dots-first-dot .5s linear infinite;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    opacity: 0;
    filter: alpha(opacity=0);
    -webkit-transform: translate(-1em);
    -moz-transform: translate(-1em);
    -ms-transform: translate(-1em);
    -o-transform: translate(-1em);
    transform: translate(-1em);
  }

  #site_loader_animation i:last-child {
    -webkit-animation: loading-dots-last-dot .5s linear infinite;
    -moz-animation: loading-dots-last-dot .5s linear infinite;
    -ms-animation: loading-dots-last-dot .5s linear infinite;
    -o-animation: loading-dots-last-dot .5s linear infinite;
    animation: loading-dots-last-dot .5s linear infinite;
  }

  @-webkit-keyframes loading-dots-fadein {
    100% {
      opacity: 1;
      -ms-filter: none;
      filter: none
    }
  }

  @-moz-keyframes loading-dots-fadein {
    100% {
      opacity: 1;
      -ms-filter: none;
      filter: none
    }
  }

  @-o-keyframes loading-dots-fadein {
    100% {
      opacity: 1;
      -ms-filter: none;
      filter: none
    }
  }

  @keyframes loading-dots-fadein {
    100% {
      opacity: 1;
      -ms-filter: none;
      filter: none
    }
  }

  @-webkit-keyframes loading-dots-first-dot {
    100% {
      -webkit-transform: translate(1em);
      -moz-transform: translate(1em);
      -o-transform: translate(1em);
      -ms-transform: translate(1em);
      transform: translate(1em);
      opacity: 1;
      -ms-filter: none;
      filter: none
    }
  }

  @-moz-keyframes loading-dots-first-dot {
    100% {
      -webkit-transform: translate(1em);
      -moz-transform: translate(1em);
      -o-transform: translate(1em);
      -ms-transform: translate(1em);
      transform: translate(1em);
      opacity: 1;
      -ms-filter: none;
      filter: none
    }
  }

  @-o-keyframes loading-dots-first-dot {
    100% {
      -webkit-transform: translate(1em);
      -moz-transform: translate(1em);
      -o-transform: translate(1em);
      -ms-transform: translate(1em);
      transform: translate(1em);
      opacity: 1;
      -ms-filter: none;
      filter: none
    }
  }

  @keyframes loading-dots-first-dot {
    100% {
      -webkit-transform: translate(1em);
      -moz-transform: translate(1em);
      -o-transform: translate(1em);
      -ms-transform: translate(1em);
      transform: translate(1em);
      opacity: 1;
      -ms-filter: none;
      filter: none
    }
  }

  @-webkit-keyframes loading-dots-middle-dots {
    100% {
      -webkit-transform: translate(1em);
      -moz-transform: translate(1em);
      -o-transform: translate(1em);
      -ms-transform: translate(1em);
      transform: translate(1em)
    }
  }

  @-moz-keyframes loading-dots-middle-dots {
    100% {
      -webkit-transform: translate(1em);
      -moz-transform: translate(1em);
      -o-transform: translate(1em);
      -ms-transform: translate(1em);
      transform: translate(1em)
    }
  }

  @-o-keyframes loading-dots-middle-dots {
    100% {
      -webkit-transform: translate(1em);
      -moz-transform: translate(1em);
      -o-transform: translate(1em);
      -ms-transform: translate(1em);
      transform: translate(1em)
    }
  }

  @keyframes loading-dots-middle-dots {
    100% {
      -webkit-transform: translate(1em);
      -moz-transform: translate(1em);
      -o-transform: translate(1em);
      -ms-transform: translate(1em);
      transform: translate(1em)
    }
  }

  @-webkit-keyframes loading-dots-last-dot {
    100% {
      -webkit-transform: translate(2em);
      -moz-transform: translate(2em);
      -o-transform: translate(2em);
      -ms-transform: translate(2em);
      transform: translate(2em);
      opacity: 0;
      -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
      filter: alpha(opacity=0)
    }
  }

  @-moz-keyframes loading-dots-last-dot {
    100% {
      -webkit-transform: translate(2em);
      -moz-transform: translate(2em);
      -o-transform: translate(2em);
      -ms-transform: translate(2em);
      transform: translate(2em);
      opacity: 0;
      -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
      filter: alpha(opacity=0)
    }
  }

  @-o-keyframes loading-dots-last-dot {
    100% {
      -webkit-transform: translate(2em);
      -moz-transform: translate(2em);
      -o-transform: translate(2em);
      -ms-transform: translate(2em);
      transform: translate(2em);
      opacity: 0;
      -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
      filter: alpha(opacity=0)
    }
  }

  @keyframes loading-dots-last-dot {
    100% {
      -webkit-transform: translate(2em);
      -moz-transform: translate(2em);
      -o-transform: translate(2em);
      -ms-transform: translate(2em);
      transform: translate(2em);
      opacity: 0;
      -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
      filter: alpha(opacity=0)
    }
  }

  <?php   } else { ?>

  /* type1 */
  #site_loader_animation {
    margin: -25.5px 0 0 -25.5px;
    width: 48px;
    height: 48px;
    font-size: 10px;
    text-indent: -9999em;
    position: fixed;
    top: 50%;
    left: 50%;
    border: 3px solid rgba(
        <?php echo $hex_color1; ?>
        , 0.2);
    border-top-color:
      <?php echo $dp_options['pickedcolor1']; ?>
    ;
    border-radius: 50%;
    -webkit-animation: loading-circle 1.1s infinite linear;
    animation: loading-circle 1.1s infinite linear;
  }

  @-webkit-keyframes loading-circle {
    0% {
      -webkit-transform: rotate(0deg);
      transform: rotate(0deg);
    }

    100% {
      -webkit-transform: rotate(360deg);
      transform: rotate(360deg);
    }
  }

  @keyframes loading-circle {
    0% {
      -webkit-transform: rotate(0deg);
      transform: rotate(0deg);
    }

    100% {
      -webkit-transform: rotate(360deg);
      transform: rotate(360deg);
    }
  }

  <?php   } ?>
  <?php } ?>


  <?php if($dp_options['hover_type']=="type1"){ ?>
  .image {
    overflow: hidden;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transition-duration: .35s;
    -moz-transition-duration: .35s;
    -ms-transition-duration: .35s;
    -o-transition-duration: .35s;
    transition-duration: .35s;
  }

  .image img {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transform: scale(1);
    -webkit-transition-property: opacity, scale, -webkit-transform, transform;
    -webkit-transition-duration: .35s;
    -moz-transform: scale(1);
    -moz-transition-property: opacity, scale, -moz-transform, transform;
    -moz-transition-duration: .35s;
    -ms-transform: scale(1);
    -ms-transition-property: opacity, scale, -ms-transform, transform;
    -ms-transition-duration: .35s;
    -o-transform: scale(1);
    -o-transition-property: opacity, scale, -o-transform, transform;
    -o-transition-duration: .35s;
    transform: scale(1);
    transition-property: opacity, scale, transform;
    transition-duration: .35s;
  }

  .image:hover img,
  a:hover .image img {
    -webkit-transform: scale(
        <?php echo $dp_options['hover1_zoom']; ?>
      );
    -moz-transform: scale(
        <?php echo $dp_options['hover1_zoom']; ?>
      );
    -ms-transform: scale(
        <?php echo $dp_options['hover1_zoom']; ?>
      );
    -o-transform: scale(
        <?php echo $dp_options['hover1_zoom']; ?>
      );
    transform: scale(
        <?php echo $dp_options['hover1_zoom']; ?>
      );
  }

  .introduce_list_col a:hover .image img {
    -webkit-transform: scale(
        <?php echo $dp_options['hover1_zoom']; ?>
      ) translate3d(
        <?php $introduce_list_col_offset = floor((1 / $dp_options['hover1_zoom']) / 2 * 10000) / -100; echo $introduce_list_col_offset; ?>
        %, 0, 0);
    -moz-transform: scale(
        <?php echo $dp_options['hover1_zoom']; ?>
      ) translate3d(
        <?php echo $introduce_list_col_offset; ?>
        %, 0, 0);
    -ms-transform: scale(
        <?php echo $dp_options['hover1_zoom']; ?>
      ) translate3d(
        <?php echo $introduce_list_col_offset; ?>
        %, 0, 0);
    -o-transform: scale(
        <?php echo $dp_options['hover1_zoom']; ?>
      ) translate3d(
        <?php echo $introduce_list_col_offset; ?>
        %, 0, 0);
    transform: scale(
        <?php echo $dp_options['hover1_zoom']; ?>
      ) translate3d(
        <?php echo $introduce_list_col_offset; ?>
        %, 0, 0);
  }

  <?php }elseif($dp_options['hover_type']=="type2"){ ?>
  <?php
        if ($dp_options['hover2_direct'] == 'type2') {
          $hover2_direct1 = 8;
          $hover2_direct2 = -8;
        } else {
          $hover2_direct1 = -8;
          $hover2_direct2 = 8;
        }
?>
  .image {
    overflow: hidden;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transition-property: background;
    -webkit-transition-duration: .35s;
    -moz-transition-property: background;
    -moz-transition-duration: .35s;
    -ms-transition-property: background;
    -ms-transition-duration: .35s;
    -o-transition-property: background;
    -o-transition-duration: .35s;
    transition-property: background;
    transition-duration: .35s;
  }

  .image img {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transform: scale(1.2) translate3d(
        <?php echo $hover2_direct1; ?>
        px, 0, 0);
    -webkit-transition-property: opacity, -webkit-transform, transform;
    -webkit-transition-duration: .35s;
    -moz-transform: scale(1.2) translate3d(
        <?php echo $hover2_direct1; ?>
        px, 0, 0);
    -moz-transition-property: opacity, -moz-transform, transform;
    -moz-transition-duration: .35s;
    -ms-transform: scale(1.2) translate3d(
        <?php echo $hover2_direct1; ?>
        px, 0, 0);
    -ms-transition-property: opacity, -ms-transform, transform;
    -ms-transition-duration: .35s;
    -o-transform: scale(1.2) translate3d(
        <?php echo $hover2_direct1; ?>
        px, 0, 0);
    -o-transition-property: opacity, -o-transform, transform;
    -o-transition-duration: .35s;
    transform: scale(1.2) translate3d(
        <?php echo $hover2_direct1; ?>
        px, 0, 0);
    transition-property: opacity, transform;
    transition-duration: .35s;
  }

  .introduce_list_col .image img {
    <?php   if ($dp_options['hover2_direct'] == 'type2') { // translateX部分は1.2倍後の割合となるため-41.66%が中心となる 1/1.2*-50 ?>
    -webkit-transform: scale(1.2) translate3d(-39.66%, 0, 0);
    -moz-transform: scale(1.2) translate3d(-39.66%, 0, 0);
    -ms-transform: scale(1.2) translate3d(-39.66%, 0, 0);
    -o-transform: scale(1.2) translate3d(-39.66%, 0, 0);
    transform: scale(1.2) translate3d(-39.66%, 0, 0);
    <?php   } else { ?>
    -webkit-transform: scale(1.2) translate3d(-43.66%, 0, 0);
    -moz-transform: scale(1.2) translate3d(-43.66%, 0, 0);
    -ms-transform: scale(1.2) translate3d(-43.66%, 0, 0);
    -o-transform: scale(1.2) translate3d(-43.66%, 0, 0);
    transform: scale(1.2) translate3d(-43.66%, 0, 0);
    <?php   } ?>
  }

  .image:hover,
  a:hover .image {
    background:
      <?php echo $dp_options['hover2_bgcolor']; ?>
    ;
  }

  .image:hover img,
  a:hover .image img {
    opacity:
      <?php echo $dp_options['hover2_opacity']; ?>
    ;
    -webkit-transform: scale(1.2) translate3d(
        <?php echo $hover2_direct2; ?>
        px, 0, 0);
    -moz-transform: scale(1.2) translate3d(
        <?php echo $hover2_direct2; ?>
        px, 0, 0);
    -ms-transform: scale(1.2) translate3d(
        <?php echo $hover2_direct2; ?>
        px, 0, 0);
    -o-transform: scale(1.2) translate3d(
        <?php echo $hover2_direct2; ?>
        px, 0, 0);
    transform: scale(1.2) translate3d(
        <?php echo $hover2_direct2; ?>
        px, 0, 0);
  }

  .introduce_list_col a:hover .image img {
    <?php   if ($dp_options['hover2_direct'] == 'type2') { ?>
    -webkit-transform: scale(1.2) translate3d(-43.66%, 0, 0);
    -moz-transform: scale(1.2) translate3d(-43.66%, 0, 0);
    -ms-transform: scale(1.2) translate3d(-43.66%, 0, 0);
    -o-transform: scale(1.2) translate3d(-43.66%, 0, 0);
    transform: scale(1.2) translate3d(-43.66%, 0, 0);
    <?php   } else { ?>
    -webkit-transform: scale(1.2) translate3d(-39.66%, 0, 0);
    -moz-transform: scale(1.2) translate3d(-39.66%, 0, 0);
    -ms-transform: scale(1.2) translate3d(-39.66%, 0, 0);
    -o-transform: scale(1.2) translate3d(-39.66%, 0, 0);
    transform: scale(1.2) translate3d(-39.66%, 0, 0);
    <?php   } ?>
  }

  <?php }elseif($dp_options['hover_type']=="type3"){ ?>
  .image {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transition-property: background;
    -webkit-transition-duration: .75s;
    -moz-transition-property: background;
    -moz-transition-duration: .75s;
    -ms-transition-property: background;
    -ms-transition-duration: .75s;
    -o-transition-property: background;
    -o-transition-duration: .75s;
    transition-property: background;
    transition-duration: .75s;
  }

  .image img {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transition-property: opacity;
    -webkit-transition-duration: .5s;
    -moz-transition-property: opacity;
    -moz-transition-duration: .5s;
    -ms-transition-property: opacity;
    -ms-transition-duration: .5s;
    -o-transition-property: opacity;
    -o-transition-duration: .5s;
    transition-property: opacity;
    transition-duration: .5s;
    opacity: 1;
  }

  .image:hover,
  a:hover .image {
    background:
      <?php echo $dp_options['hover3_bgcolor']; ?>
    ;
    -webkit-transition-duration: .25s;
    -moz-transition-duration: .25s;
    -ms-transition-duration: .25s;
    -o-transition-duration: .25s;
    transition-duration: .25s;
  }

  .image:hover img,
  a:hover .image img {
    opacity:
      <?php echo $dp_options['hover3_opacity']; ?>
    ;
  }

  <?php } ?>

  .archive_filter .button input:hover,
  .archive_sort dt,
  #post_pagination p,
  #post_pagination a:hover,
  #return_top a,
  .c-pw__btn,
  #comment_header ul li a:hover,
  #comment_header ul li.comment_switch_active a,
  #comment_header #comment_closed p,
  #introduce_slider .slick-dots li button:hover,
  #introduce_slider .slick-dots li.slick-active button {
    background-color:
      <?php echo esc_html($dp_options['pickedcolor1']); ?>
    ;
  }

  #comment_header ul li.comment_switch_active a,
  #comment_header #comment_closed p,
  #guest_info input:focus,
  #comment_textarea textarea:focus {
    border-color:
      <?php echo esc_html($dp_options['pickedcolor1']); ?>
    ;
  }

  #comment_header ul li.comment_switch_active a:after,
  #comment_header #comment_closed p:after {
    border-color:
      <?php echo esc_html($dp_options['pickedcolor1']); ?>
      transparent transparent transparent;
  }

  .header_search_inputs .chosen-results li[data-option-array-index="0"] {
    background-color:
      <?php echo esc_html($dp_options['pickedcolor1']); ?>
       !important;
    border-color:
      <?php echo esc_html($dp_options['pickedcolor1']); ?>
    ;
  }

  a:hover,
  #bread_crumb li a:hover,
  #bread_crumb li.home a:hover:before,
  #bread_crumb li.last,
  #archive_headline,
  .archive_header .headline,
  .archive_filter_headline,
  #related_post .headline,
  #introduce_header .headline,
  .introduce_list_col .info .title,
  .introduce_archive_banner_link a:hover,
  #recent_news .headline,
  #recent_news li a:hover,
  #comment_headline,
  .side_headline,
  ul.banner_list li a:hover .caption,
  .footer_headline,
  .footer_widget a:hover,
  #index_news .entry-date,
  #index_news_mobile .entry-date,
  .cb_content-carousel a:hover .image .title {
    color:
      <?php echo esc_html($dp_options['pickedcolor1']); ?>
    ;
  }

  #index_news_mobile .archive_link a:hover,
  .cb_content-blog_list .archive_link a:hover,
  #load_post a:hover,
  #submit_comment:hover,
  .c-pw__btn:hover {
    background-color:
      <?php echo esc_html($dp_options['pickedcolor2']); ?>
    ;
  }

  #header_search select:focus,
  .header_search_inputs .chosen-with-drop .chosen-single span,
  #footer_contents a:hover,
  #footer_nav a:hover,
  #footer_social_link li:hover:before,
  #header_slider .slick-arrow:hover,
  .cb_content-carousel .slick-arrow:hover {
    color:
      <?php echo esc_html($dp_options['pickedcolor2']); ?>
    ;
  }

  .post_content a {
    color:
      <?php echo esc_html($dp_options['content_link_color']); ?>
    ;
  }

  #header_search,
  #index_header_search {
    background-color:
      <?php echo esc_html($dp_options['search_bar_bg_color']); ?>
    ;
  }

  #footer_nav {
    background-color:
      <?php echo esc_html($dp_options['footer_bg_color1']); ?>
    ;
  }

  #footer_contents {
    background-color:
      <?php echo esc_html($dp_options['footer_bg_color2']); ?>
    ;
  }

  #header_search_submit {
    background-color: rgba(
        <?php echo implode(',', hex2rgb($dp_options['search_form_button_bg_color'])); ?>
        ,
        <?php echo esc_html($dp_options['search_form_button_bg_opacity']); ?>
      );
  }

  #header_search_submit:hover {
    background-color: rgba(
        <?php echo implode(',', hex2rgb($dp_options['search_form_button_bg_color_hover'])); ?>
        ,
        <?php echo esc_html($dp_options['search_form_button_bg_opacity_hover']); ?>
      );
  }

  .cat-category {
    background-color:
      <?php echo esc_html($dp_options['category_color']); ?>
       !important;
  }

  <?php if ($dp_options['use_category2']) { ?>
  .cat-

  <?php echo esc_html($dp_options['category2_slug']); ?>
    {
    background-color:
      <?php echo esc_html($dp_options['category2_color']); ?>
       !important;
  }

  <?php }
      if ($dp_options['use_category3']) { ?>
  .cat-

  <?php echo esc_html($dp_options['category3_slug']); ?>
    {
    background-color:
      <?php echo esc_html($dp_options['category3_color']); ?>
       !important;
  }

  <?php }
      if ($dp_options['use_introduce_category1']) { ?>
  .cat-

  <?php echo esc_html($dp_options['introduce_category1_slug']); ?>
    {
    background-color:
      <?php echo esc_html($dp_options['introduce_category1_color']); ?>
       !important;
  }

  <?php }
      if ($dp_options['use_introduce_category2']) { ?>
  .cat-

  <?php echo esc_html($dp_options['introduce_category2_slug']); ?>
    {
    background-color:
      <?php echo esc_html($dp_options['introduce_category2_color']); ?>
       !important;
  }

  <?php }
      if ($dp_options['use_introduce_category3']) { ?>
  .cat-

  <?php echo esc_html($dp_options['introduce_category3_slug']); ?>
    {
    background-color:
      <?php echo esc_html($dp_options['introduce_category3_color']); ?>
       !important;
  }

  <?php } ?>

  @media only screen and (min-width:992px) {
    #global_menu ul ul a {
      background-color:
        <?php echo esc_html($dp_options['pickedcolor1']); ?>
      ;
    }

    #global_menu ul ul a:hover,
    #global_menu ul ul .current-menu-item>a {
      background-color:
        <?php echo esc_html($dp_options['pickedcolor2']); ?>
      ;
    }

    #header_top {
      background-color:
        <?php echo esc_html($dp_options['header_bg_color']); ?>
      ;
    }

    .has_header_content #header_top {
      background-color: rgba(
          <?php echo implode(',', hex2rgb($dp_options['header_bg_color'])); ?>
          ,
          <?php echo esc_html($dp_options['index_header_bg_opacity']); ?>
        );
    }

    .fix_top.header_fix #header_top {
      background-color: rgba(
          <?php echo implode(',', hex2rgb($dp_options['header_fix_bg_color'])); ?>
          ,
          <?php echo esc_html($dp_options['header_fix_bg_opacity']); ?>
        );
    }

    #header_logo a,
    #global_menu>ul>li>a {
      color:
        <?php echo esc_html($dp_options['header_text_color']); ?>
      ;
    }

    #header_logo_fix a,
    .fix_top.header_fix #global_menu>ul>li>a {
      color:
        <?php echo esc_html($dp_options['header_fix_text_color']); ?>
      ;
    }

    .has_header_content #index_header_search {
      background-color: rgba(
          <?php echo implode(',', hex2rgb($dp_options['search_bar_bg_color'])); ?>
          ,
          <?php echo esc_html($dp_options['index_search_bar_bg_opacity']); ?>
        );
    }
  }

  <?php if (!is_no_responsive()) { ?>
  @media screen and (max-width:991px) {
    #global_menu {
      background-color:
        <?php echo esc_html($dp_options['pickedcolor1']); ?>
      ;
    }

    #global_menu a:hover,
    #global_menu .current-menu-item>a {
      background-color:
        <?php echo esc_html($dp_options['pickedcolor2']); ?>
      ;
    }

    #header_top {
      background-color:
        <?php echo esc_html($dp_options['header_bg_color']); ?>
      ;
    }

    #header_top a,
    #header_top a:before {
      color:
        <?php echo esc_html($dp_options['header_text_color']); ?>
         !important;
    }

    .mobile_fix_top.header_fix #header_top {
      background-color: rgba(
          <?php echo implode(',', hex2rgb($dp_options['header_fix_bg_color'])); ?>
          ,
          <?php echo esc_html($dp_options['header_fix_bg_opacity']); ?>
        );
    }

    .mobile_fix_top.header_fix #header_top a,
    .mobile_fix_top.header_fix #header_top a:before {
      color:
        <?php echo esc_html($dp_options['header_fix_text_color']); ?>
         !important;
    }

    .archive_sort dt {
      color:
        <?php echo esc_html($dp_options['pickedcolor1']); ?>
      ;
    }

    .post-type-archive-news #recent_news .show_date li .date {
      color:
        <?php echo esc_html($dp_options['pickedcolor1']); ?>
      ;
    }
  }

  <?php } ?>

  <?php
      if (is_front_page()) {
        if (!empty($header_slider['slider'])) {
          foreach ($header_slider['slider'] as $i => $slider) {
            if ($dp_options['use_slider_caption'.$i]) {
              $font_size = $dp_options['slider_headline_font_size'.$i];
              $font_color = $dp_options['slider_headline_color'.$i];
              $shadow1 = $dp_options['slider_headline_shadow_a'.$i];
              $shadow2 = $dp_options['slider_headline_shadow_b'.$i];
              $shadow3 = $dp_options['slider_headline_shadow_c'.$i];
              $shadow4 = $dp_options['slider_headline_shadow_color'.$i];
              echo "#header_slider .item{$i} .caption .headline { font-size:{$font_size}px; text-shadow:{$shadow1}px {$shadow2}px {$shadow3}px {$shadow4}; color:{$font_color} }\n";

              $font_size = $dp_options['slider_caption_font_size'.$i];
              $font_color = $dp_options['slider_caption_color'.$i];
              $shadow1 = $dp_options['slider_caption_shadow_a'.$i];
              $shadow2 = $dp_options['slider_caption_shadow_b'.$i];
              $shadow3 = $dp_options['slider_caption_shadow_c'.$i];
              $shadow4 = $dp_options['slider_caption_shadow_color'.$i];
              echo "#header_slider .item{$i} .caption .catchphrase { font-size:{$font_size}px; text-shadow:{$shadow1}px {$shadow2}px {$shadow3}px {$shadow4}; color:{$font_color} }\n";

              if ($dp_options['show_slider_button'.$i] == 1) {
                $text_color = $dp_options['slider_button_color'.$i];
                $text_color_hover = $dp_options['slider_button_color_hover'.$i];
                $bg_color = $dp_options['slider_button_bg_color'.$i];
                $bg_color_hover = $dp_options['slider_button_bg_color_hover'.$i];
                $border_color = $dp_options['slider_button_border_color'.$i];
                $border_color_hover = $dp_options['slider_button_border_color_hover'.$i];

                echo "#header_slider .item{$i} .button { background-color:{$bg_color}; color:{$text_color}; border-color:{$border_color}; }\n";
                echo "#header_slider .item{$i} .button:hover { background-color:{$bg_color_hover}; color:{$text_color_hover}; border-color:{$border_color_hover}; }\n";
                echo "#header_slider .item{$i} .button:after { color:{$text_color}; }\n";
                echo "#header_slider .item{$i} .button:hover:after { color:{$text_color_hover}; }\n";
              }

              if (!is_no_responsive()) {
                echo "@media screen and (max-width:991px) {\n";
                echo "  #header_slider .item{$i} .caption .headline { font-size:".$dp_options['slider_headline_font_size_mobile'.$i]."px; }\n";
                echo "  #header_slider .item{$i} .caption .catchphrase { font-size:".$dp_options['slider_caption_font_size_mobile'.$i]."px; }\n";
                echo "}\n";
              }
            }
          }
        } elseif (!empty($header_slider['slider_video']) && $dp_options['use_slider_video_caption']) {
          $font_size = $dp_options['slider_video_headline_font_size'];
          $font_color = $dp_options['slider_video_headline_color'];
          $shadow1 = $dp_options['slider_video_headline_shadow_a'];
          $shadow2 = $dp_options['slider_video_headline_shadow_b'];
          $shadow3 = $dp_options['slider_video_headline_shadow_c'];
          $shadow4 = $dp_options['slider_video_headline_shadow_color'];
          echo "#header_slider .caption .headline { font-size:{$font_size}px; text-shadow:{$shadow1}px {$shadow2}px {$shadow3}px {$shadow4}; color:{$font_color} }\n";

          $font_size = $dp_options['slider_video_caption_font_size'];
          $font_color = $dp_options['slider_video_caption_color'];
          $shadow1 = $dp_options['slider_video_caption_shadow_a'];
          $shadow2 = $dp_options['slider_video_caption_shadow_b'];
          $shadow3 = $dp_options['slider_video_caption_shadow_c'];
          $shadow4 = $dp_options['slider_video_caption_shadow_color'];
          echo "#header_slider .caption .catchphrase { font-size:{$font_size}px; text-shadow:{$shadow1}px {$shadow2}px {$shadow3}px {$shadow4}; color:{$font_color} }\n";

          if ($dp_options['show_slider_video_button'] == 1) {
            $text_color = $dp_options['slider_video_button_color'];
            $text_color_hover = $dp_options['slider_video_button_color_hover'];
            $bg_color = $dp_options['slider_video_button_bg_color'];
            $bg_color_hover = $dp_options['slider_video_button_bg_color_hover'];
            $border_color = $dp_options['slider_video_button_border_color'];
            $border_color_hover = $dp_options['slider_video_button_border_color_hover'];

            echo "#header_slider .caption .button { background-color:{$bg_color}; color:{$text_color}; border-color:{$border_color}; }\n";
            echo "#header_slider .caption .button:hover { background-color:{$bg_color_hover}; color:{$text_color_hover}; border-color:{$border_color_hover}; }\n";
            echo "#header_slider .caption .button:after { color:{$text_color}; }\n";
            echo "#header_slider .caption .button:hover:after { color:{$text_color_hover}; }\n";
          }

          if (!is_no_responsive()) {
            echo "@media screen and (max-width:991px) {\n";
            echo "  #header_slider .caption .headline { font-size:".$dp_options['slider_video_headline_font_size_mobile']."px; }\n";
            echo "  #header_slider .caption .catchphrase { font-size:".$dp_options['slider_video_caption_font_size_mobile']."px; }\n";
            echo "}\n";
          }
        } elseif (!empty($header_slider['slider_youtube_url']) && $dp_options['use_slider_youtube_caption']) {
          $font_size = $dp_options['slider_youtube_headline_font_size'];
          $font_color = $dp_options['slider_youtube_headline_color'];
          $shadow1 = $dp_options['slider_youtube_headline_shadow_a'];
          $shadow2 = $dp_options['slider_youtube_headline_shadow_b'];
          $shadow3 = $dp_options['slider_youtube_headline_shadow_c'];
          $shadow4 = $dp_options['slider_youtube_headline_shadow_color'];
          echo "#header_slider .caption .headline { font-size:{$font_size}px; text-shadow:{$shadow1}px {$shadow2}px {$shadow3}px {$shadow4}; color:{$font_color} }\n";

          $font_size = $dp_options['slider_youtube_caption_font_size'];
          $font_color = $dp_options['slider_youtube_caption_color'];
          $shadow1 = $dp_options['slider_youtube_caption_shadow_a'];
          $shadow2 = $dp_options['slider_youtube_caption_shadow_b'];
          $shadow3 = $dp_options['slider_youtube_caption_shadow_c'];
          $shadow4 = $dp_options['slider_youtube_caption_shadow_color'];
          echo "#header_slider .caption .catchphrase { font-size:{$font_size}px; text-shadow:{$shadow1}px {$shadow2}px {$shadow3}px {$shadow4}; color:{$font_color} }\n";

          if ($dp_options['show_slider_youtube_button'] == 1) {
            $text_color = $dp_options['slider_youtube_button_color'];
            $text_color_hover = $dp_options['slider_youtube_button_color_hover'];
            $bg_color = $dp_options['slider_youtube_button_bg_color'];
            $bg_color_hover = $dp_options['slider_youtube_button_bg_color_hover'];
            $border_color = $dp_options['slider_youtube_button_border_color'];
            $border_color_hover = $dp_options['slider_youtube_button_border_color_hover'];

            echo "#header_slider .caption .button { background-color:{$bg_color}; color:{$text_color}; border-color:{$border_color}; }\n";
            echo "#header_slider .caption .button:hover { background-color:{$bg_color_hover}; color:{$text_color_hover}; border-color:{$border_color_hover}; }\n";
            echo "#header_slider .caption .button:after { color:{$text_color}; }\n";
            echo "#header_slider .caption .button:hover:after { color:{$text_color_hover}; }\n";
          }

          if (!is_no_responsive()) {
            echo "@media screen and (max-width:991px) {\n";
            echo "  #header_slider .caption .headline { font-size:".$dp_options['slider_youtube_headline_font_size_mobile']."px; }\n";
            echo "  #header_slider .caption .catchphrase { font-size:".$dp_options['slider_youtube_caption_font_size_mobile']."px; }\n";
            echo "}\n";
          }
        }

        if ( ! empty( $dp_options['contents_builder'] ) ) {
          foreach ( $dp_options['contents_builder'] as $key => $content ) {
            if ( empty( $content['cb_content_select'] ) ) continue;
            if ( isset( $content['cb_display'] ) && ! $content['cb_display'] ) continue;

            $cb_headline_styles = array();
            if ( isset( $content['cb_headline_color'] ) ) {
              $cb_headline_styles[] = 'color:' . $content['cb_headline_color'] . ';';
            }
            if ( isset( $content['cb_headline_font_size'] ) ) {
              $cb_headline_styles[] = 'font-size:' . $content['cb_headline_font_size'] . 'px;';
            }

            if ( $cb_headline_styles ) {
              echo "#cb_{$key} .cb_headline { " . implode( $cb_headline_styles ) . " }\n";
            }

            if ( isset( $content['cb_categories_txtcolor'] ) ) {
              echo "#cb_{$key}.cb_content-category_list ul li .info { color:" . esc_attr($content['cb_categories_txtcolor']) . "; }\n";
            }
            if ( isset( $content['cb_categories_bgcolor'] ) ) {
              echo "#cb_{$key}.cb_content-category_list ul li a { background:" . esc_attr($content['cb_categories_bgcolor']) . "; }\n";
            }
            if ( isset( $content['cb_categories_hvcolor'] ) ) {
              echo "#cb_{$key}.cb_content-category_list ul li a:hover { background:" . esc_attr($content['cb_categories_hvcolor']) . "; }\n";
            }

            $cb_desc_styles = array();
            if ( isset( $content['cb_desc_color'] ) ) {
              $cb_desc_styles[] = 'color:' . $content['cb_desc_color'] . ';';
            }
            if ( isset( $content['cb_desc_font_size'] ) ) {
              $cb_desc_styles[] = 'font-size:' . $content['cb_desc_font_size'] . 'px;';
            }

            if ( $cb_desc_styles ) {
              echo "#cb_{$key} .cb_desc { " . implode( $cb_desc_styles ) . " }\n";
            }
          }

          if (!is_no_responsive()) {
            echo "@media screen and (max-width:991px) {\n";

            foreach ( $dp_options['contents_builder'] as $key => $content ) {
              if ( empty( $content['cb_content_select'] ) ) continue;
              if ( isset( $content['cb_display'] ) && ! $content['cb_display'] ) continue;

              if ( isset( $content['cb_headline_font_size_mobile'] ) ) {
                echo "  #cb_{$key} .cb_headline { font-size:" . $content['cb_headline_font_size_mobile'] . "px; }\n";
              }

              if ( isset( $content['cb_desc_font_size_mobile'] ) ) {
                echo "  #cb_{$key} .cb_desc { font-size:" . $content['cb_desc_font_size_mobile'] . "px; }\n";
              }
            }

            echo "}\n";
          }
        }
?>
  <?php } ?>

  <?php if($dp_options['css_code']) { echo $dp_options['css_code']; } ?>

  <?php if(is_mobile()):
  if($dp_options['footer_bar_display'] == 'type1' || $dp_options['footer_bar_display'] == 'type2'):
?>
  .dp-footer-bar {
    background:
      <?php echo 'rgba('.implode(',', hex2rgb($dp_options['footer_bar_bg'])).', '.esc_html($dp_options['footer_bar_tp']).');'; ?>
      border-top: solid 1px
      <?php echo esc_html($dp_options['footer_bar_border']); ?>
    ;
    color:
      <?php echo esc_html($dp_options['footer_bar_color']); ?>
    ;
    display: flex;
    flex-wrap: wrap;
  }

  .dp-footer-bar a {
    color:
      <?php echo esc_html($dp_options['footer_bar_color']); ?>
    ;
  }

  .dp-footer-bar-item+.dp-footer-bar-item {
    border-left: solid 1px
      <?php echo esc_html($dp_options['footer_bar_border']); ?>
    ;
  }

  <?php endif; endif; ?>
</style>

<?php if (is_front_page()) { ?>
<link rel="stylesheet"
  href="<?php echo get_template_directory_uri(); ?>/css/slick.css?ver=<?php echo version_num(); ?>">
<script
  src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js?ver=<?php echo version_num(); ?>">
</script>
<?php   if ($dp_options['show_index_news'] == 1) { ?>
<script
  src="<?php echo get_template_directory_uri(); ?>/js/jquery.newsticker.js?ver=<?php echo version_num(); ?>">
</script>
<?php   } ?>
<?php   if (!empty($header_slider['slider_video']) && !wp_is_mobile()) { ?>
<link rel="stylesheet"
  href="<?php echo get_template_directory_uri(); ?>/css/vegas.min.css?ver=<?php echo version_num(); ?>">
<script
  src="<?php echo get_template_directory_uri(); ?>/js/vegas.min.js?ver=<?php echo version_num(); ?>">
</script>
<?php   } ?>
<?php   if (!empty($header_slider['slider_youtube_url']) && !wp_is_mobile()) { ?>
<link rel="stylesheet"
  href="<?php echo get_template_directory_uri(); ?>/css/jquery.mb.YTPlayer.min.css?ver=<?php echo version_num(); ?>">
<script
  src="<?php echo get_template_directory_uri(); ?>/js/jquery.mb.YTPlayer.min.js?ver=<?php echo version_num(); ?>">
</script>
<?php   } ?>
<?php } elseif (is_post_type_archive($dp_options['introduce_label'])) { ?>
<script
  src="<?php echo get_template_directory_uri(); ?>/js/imagesloaded.pkgd.min.js?ver=<?php echo version_num(); ?>">
</script>
<script
  src="<?php echo get_template_directory_uri(); ?>/js/jquery.infinitescroll.min.js?ver=<?php echo version_num(); ?>">
</script>
<?php } elseif (is_home() || is_search() || is_archive()) { ?>
<script
  src="<?php echo get_template_directory_uri(); ?>/js/imagesloaded.pkgd.min.js?ver=<?php echo version_num(); ?>">
</script>
<?php } elseif (is_singular($dp_options['introduce_slug']) && !empty($GLOBALS['introduce_slider'])) { ?>
<link rel="stylesheet"
  href="<?php echo get_template_directory_uri(); ?>/css/slick.css?ver=<?php echo version_num(); ?>">
<script
  src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js?ver=<?php echo version_num(); ?>">
</script>
<?php } ?>
<?php
}
add_action("wp_head", "tcd_head");

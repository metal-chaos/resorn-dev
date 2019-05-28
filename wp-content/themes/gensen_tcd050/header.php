<?php
global $dp_options;
if (! $dp_options) $dp_options = get_desing_plus_option();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php if($dp_options['use_ogp']) { ?>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
  <?php } else { ?>

  <head>
    <?php } ?>
    <meta
      charset="<?php bloginfo('charset'); ?>">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width">
    <title><?php wp_title('|', true, 'right'); ?>
    </title>
    <meta name="description" content="<?php seo_description(); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
      integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p:400,700|Orbitron:400,700&amp;subset=japanese"
      rel="stylesheet">
    <?php if ($dp_options['use_ogp']) { ogp(); }; ?>
    <link rel="pingback"
      href="<?php bloginfo('pingback_url'); ?>">
    <?php if ($favicon = wp_get_attachment_image_src($dp_options['favicon'], 'full')) : ?>
    <link rel="shortcut icon"
      href="<?php echo esc_attr($favicon[0]); ?>">
    <?php endif; ?>
    <?php wp_enqueue_style('style', get_stylesheet_uri(), false, version_num(), 'all'); wp_enqueue_script( 'jquery' ); if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>

    <!-- Google Tag Manager -->
    <script>
      (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
          'gtm.start': new Date().getTime(),
          event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
          j = d.createElement(s),
          dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
      })(window, document, 'script', 'dataLayer', 'GTM-PGDW96T');
    </script>
    <!-- End Google Tag Manager -->

  </head>

<body id="body" <?php body_class(); ?>>

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PGDW96T" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <?php if ($dp_options['use_load_icon']) { ?>
  <div id="site_loader_overlay">
    <div id="site_loader_animation">
      <?php   if ($dp_options['load_icon'] == 'type3') { ?>
      <i></i><i></i><i></i><i></i>
      <?php   } ?>
    </div>
  </div>
  <div id="site_wrap">
    <?php } ?>

    <div id="header">
      <div id="header_top">
        <div class="inner clearfix">
          <div id="header_logo">
            <?php header_logo(); ?>
          </div>
          <div id="header_logo_fix">
            <?php header_logo_fix(); ?>
          </div>
          <?php if ($dp_options['show_search_bar_subpage'] && !is_front_page() && is_show_custom_search_form()) { ?>
          <a href="#" class="search_button"><span><?php _e('Search', 'tcd-w'); ?></span></a>
          <?php } ?>
          <?php if (has_nav_menu('global-menu')) { ?>
          <a href="#" class="menu_button"><span><?php _e('menu', 'tcd-w'); ?></span></a>
          <div id="global_menu">
            <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'global-menu' , 'container' => '' ) ); ?>
          </div>
          <?php } ?>
        </div>
      </div>
      <?php if ($dp_options['show_search_bar_subpage'] && (!is_front_page() || $GLOBALS['custom_search_vars']) && is_show_custom_search_form()) { ?>
      <div id="header_search">
        <div class="inner">
          <?php get_template_part('custom_search_form'); ?>
        </div>
      </div>
      <?php } ?>
    </div><!-- END #header -->

    <div id="main_contents" class="clearfix">
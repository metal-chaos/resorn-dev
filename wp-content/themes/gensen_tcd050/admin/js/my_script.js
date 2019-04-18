jQuery(document).ready(function($){

  // theme option tab
  $('#my_theme_option').cookieTab({
   tabMenuElm: '#theme_tab',
   tabPanelElm: '#tab-panel'
  });

  // WordPress Color Picker
  $('.c-color-picker').wpColorPicker();

  // アコーディオンの開閉
  $(document).on('click', '.sub_box .theme_option_subbox_headline', function(){
    $(this).parents('.sub_box').toggleClass('active');
    return false;
  });

  // header content type
  $(".header_content_type :radio").change(function(){
    if ($(this).val() == 'type1') {
      $('.header_content_type2, .header_content_type3').hide();
      $('.header_content_type1').show();
    } else if ($(this).val() == 'type2') {
      $('.header_content_type1, .header_content_type3').hide();
      $('.header_content_type2').show();
    } else if ($(this).val() == 'type3') {
      $('.header_content_type1, .header_content_type2').hide();
      $('.header_content_type3').show();
    }
  });

  // slider caption
  $(".use_slider_caption input:checkbox").click(function(event) {
   if ($(this).is(":checked")) {
    $(this).parents('.use_slider_caption').next().show();
   } else {
    $(this).parents('.use_slider_caption').next().hide();
   }
  });

  // slider button
  $(".show_slider_button input:checkbox").click(function(event) {
   if ($(this).is(":checked")) {
    $(this).parents('.show_slider_button').next().show();
   } else {
    $(this).parents('.show_slider_button').next().hide();
   }
  });

  // search post type
  $(".searcn_post_type-radios :radio").change(function(){
    if ($(this).val() == 'post') {
      $('.searcn_post_type-introduce').hide();
      $('.searcn_post_type-post').show();
    } else if ($(this).val() == 'introduce') {
      $('.searcn_post_type-post').hide();
      $('.searcn_post_type-introduce').show();
    } else {
      $('.searcn_post_type-post, .searcn_post_type-introduce').hide();
    }
  });

  // footer widget type
  $(".footer_widget_type-radios :radio").change(function(){
    if ($(this).val() == 'type1') {
      $('.footer_widget_type-type2').hide();
      $('.footer_widget_type-type1').show();
    } else if ($(this).val() == 'type2') {
      $('.footer_widget_type-type1').hide();
      $('.footer_widget_type-type2').show();
    } else {
      $('.footer_widget_type-type1, .footer_widget_type-type2').hide();
    }
  });

  // 並び替え
  $(".repeater.sortable").sortable({
    placeholder: "sortable-placeholder",
    helper: "clone",
    forceHelperSize: true,
    forcePlaceholderSize: true,
    distance: 10
  });

  // 新しいアイテムを追加する
  $(".repeater-wrapper").each(function() {
    var next_index = $(this).find(".repeater-item").last().index();
    $(this).find(".button-add-row").click(function() {
      var clone = $(this).attr("data-clone");
      var $parent = $(this).closest(".repeater-wrapper");
      if (clone && $parent.size()) {
        next_index++;
        clone = clone.replace(/addindex/g, next_index);
        $parent.find(".repeater").append(clone.replace(/addindex/g, next_index));
      }
      return false;
    });
  });

  // アイテムを削除する
  $(".repeater").on("click", ".button-delete-row", function() {
    var del = true;
    var confirm_message = $(this).closest(".repeater").attr("data-delete-confirm");
    if (confirm_message) {
      del = confirm(confirm_message);
    }
    if (del) {
      $(this).closest(".repeater-item").remove();
    }
    return false;
  });

  // ボタンのタイプによって、表示フィールドを切り替える
  $(".repeater").each(function() {
    $(this).on("change", ".footer-bar-type select", function() {
      var sub_box = $(this).parents(".sub_box");
      var target = sub_box.find(".footer-bar-target");
      var url = sub_box.find(".footer-bar-url");
      var number = sub_box.find(".footer-bar-number");
      switch ($(this).val()) {
        case "type1" :
          target.show();
          url.show();
          number.hide();
          break;
        case "type2" :
          target.hide();
          url.hide();
          number.hide();
          break;
        case "type3" :
          target.hide();
          url.hide();
          number.show();
        break;
      }
    });
  });

  // リピーター ボタン名
  $(document).on('change keyup', '.repeater .repeater-label', function(){
    $(this).closest('.repeater-item').find('.theme_option_subbox_headline').text($(this).val());
  });

});
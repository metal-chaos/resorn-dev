jQuery(document).ready(function($) {
  if($('body').hasClass('widgets-php')) {

    $(document).on('click', '.ml_ad_widget_headline', function(){
      $(this).toggleClass('active');
      $(this).next('.ml_ad_widget_box').toggleClass('open');
    });

    $(document).on('click', '.tcd_toggle_widget_headline', function(){
      $(this).toggleClass('active');
      $(this).next('.tcd_toggle_widget_box').toggleClass('open');
    });

    // ウィジェットリピーターソータブル
    var widtget_repeater_sortable = function(){
      $('.widget-liquid-right .widget_repeater').not('.ui-sortable').sortable({
        forceHelperSize: true,
        forcePlaceholderSize: true,
        distance: 3
      });
    };
    widtget_repeater_sortable();

    // ウィジェットリピーター行追加
    var next_index = 10000;
    $('.widget-liquid-right').on('click', '.widget_repeater_wrapper .button-add-row', function(){
      var clone = $(this).attr('data-clone');
      var $repeater_container = $(this).closest('.widget_repeater_wrapper').find('.widget_repeater');
      if (clone && $repeater_container.length) {
        next_index++;
        clone = clone.replace(/repeater_addindex/g, next_index);
        $repeater_container.append(clone.replace(/repeater_addindex/g, next_index));
        widtget_repeater_sortable();
      }
      return false;
    });

    // ウィジェットリピーター行削除
    $('.widget-liquid-right').on('click', '.widget_repeater .widget_repeater_row .button-delete-row', function(){
      var del = true;
      var confirm_message = $(this).closest('.widget_repeater').attr('data-delete-confirm');
      if (confirm_message) {
        del = confirm(confirm_message);
      }
      if (del) {
        $(this).closest('.widget_repeater_row').remove();
      }
      return false;
    });

    // ウィジェットリピーターラベル
    $('.widget-liquid-right').on('change keyup', '.widget_repeater_row input.relation_repeater_label', function(){
      $(this).closest('.widget_repeater_row').find('.repeater_label').text($(this).val());
    });

    // アイコンラジオ
    $(document).on('change', '.input-radio-icons :radio', function(){
      $(this).closest('.input-radio-icons').find('label.active').removeClass('active');
      $(this).closest('.input-radio-icons').find(':radio:checked').closest('label').addClass('active');
    });
    $('.widget-liquid-right .input-radio-icons :radio:checked').trigger('change');

    // ランキング数変更
    $(document).on('change', '.tcdw_ranking_list_widget-inputs select.rank_num', function(){
      $(this).closest('form').find('.widget-control-save').trigger('click');
    });

  }
});
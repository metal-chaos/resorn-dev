jQuery(document).ready(function($){

  $('a').bind('focus',function(){if(this.blur)this.blur();});

  // header search select
  $('.header_search_inputs select').chosen({width:'100%', disable_search:true});
  $('.header_search_inputs select').on('chosen:showing_dropdown', function(event, obj){
    obj.chosen.dropdown.stop().css({opacity:0, height:'auto', clip:'auto'})
    var h = obj.chosen.dropdown.outerHeight();
    obj.chosen.dropdown.css({height:0}).animate({opacity:1, height:h}, 300);
  });
  $('.header_search_inputs select').on('chosen:hiding_dropdown', function(event, obj){
    obj.chosen.dropdown.stop().animate({opacity:0, height:0}, 300, function(){ obj.chosen.dropdown.find('.chosen-results').html(''); });
  });

  // header search and/or
  $('.header_search_keywords ul.search_keywords_operator').show();
  $('.header_search_keywords ul.search_keywords_operator li').click(function(){
    $(this).blur();
    var operator = $(this).text();
    if (operator != 'and' && operator != 'or') return;
    $(this).siblings('li').removeClass('active');
    $(this).addClass('active');
    $(this).closest('.header_search_keywords').find('input[name=search_keywords_operator]').val(operator);
  });

  // click return top
  $('#return_top a').click(function() {
    $('html,body').animate({scrollTop : 0}, 1000, 'easeOutExpo');
    return false;
  });

  // show return top button
  var topBtn = $('#return_top');
  $(window).scroll(function () {
    var scrTop = $(this).scrollTop();
    if (scrTop > 100) {
      topBtn.stop().fadeIn('slow');
    } else {
      topBtn.stop().fadeOut();
    }
  });

  // mobile toggle global nav
  $('.menu_button').on('click', function(){
    if($('#header_search').is(':visible')) {
      $('#header_search').hide();
    }
    if($(this).hasClass('active')) {
      $(this).removeClass('active');
      $('#header').removeClass('active');
      $('#global_menu').hide();
      return false;
    } else {
      $(this).addClass('active');
      $('#header').addClass('active');
      $('#global_menu').show();
      return false;
    }
  });

  // mobile global nav toggle children
  $('#global_menu li > ul').parent().prepend('<span class="child_menu_button"><span class="icon"></span></span>');
  $('#global_menu .child_menu_button').on('click', function() {
    if($(this).parent().hasClass('open')) {
      $(this).parent().removeClass('open');
      $(this).siblings('.sub-menu').slideUp(300);
      return false;
    } else {
      $(this).parent().addClass('open');
      $(this).siblings('.sub-menu').slideDown(300);
      return false;
    }
  });

  // mobile toggle header search
  $('#header_top .search_button').on('click', function(){
    if($('.menu_button').hasClass('active')) {
      $('.menu_button').removeClass('active');
      $('#global_menu').hide();
    }
    if($('#header_search').is(':visible')) {
      $('#header').removeClass('active');
      $('#header_search').hide();
    } else {
      $('#header').addClass('active');
      $('#header_search').show();
    }
    return false;
  });

  // blog archive category hover
  $('a span[data-href]').hover(
    function() {
      var $a = $(this).closest('a');
      $a.attr('data-href', $a.attr('href'));
      if ($(this).attr('data-href')) {
        $a.attr('href', $(this).attr('data-href'));
      }
    },
    function() {
      var $a = $(this).closest('a');
      $a.attr('href', $a.attr('data-href'));
    }
  );

  init_introduce_list_col();
  $(window).resize(init_introduce_list_col);

  // introduce archive hover
  $('.introduce_list_row .introduce_list_col').hover(
    function() {
      if ($(this).hasClass('show_info') || $('body').width() <= 767) return;
      var $row = $(this).closest('.introduce_list_row');
      $row.find('.introduce_list_col.show_info').removeClass('show_info');
      $(this).addClass('show_info');
    },
    function() {}
  );

  // category widget
  $('.collapse_category_list li').hover(
    function(){
      $('>ul:not(:animated)',this).slideDown('fast');
      $(this).addClass('active');
    },
    function(){
       $('>ul',this).slideUp('fast');
       $(this).removeClass('active');
    }
  );

  // comment tab
  $('#trackback_switch').click(function(){
    $('#comment_switch').removeClass('comment_switch_active');
    $(this).addClass('comment_switch_active');
    $('#comment_area').animate({opacity: 'hide'}, 0);
    $('#trackback_area').animate({opacity: 'show'}, 1000);
    return false;
  });
  $('#comment_switch').click(function(){
    $('#trackback_switch').removeClass('comment_switch_active');
    $(this).addClass('comment_switch_active');
    $('#trackback_area').animate({opacity: 'hide'}, 0);
    $('#comment_area').animate({opacity: 'show'}, 1000);
    return false;
  });

});

// introduce archive col set width and height
function init_introduce_list_col(){
  var $cols = jQuery('.introduce_list_row .introduce_list_col');

  // remove added css
  $cols.find('a, .image, .image img, .info').removeAttr('style');

  // box size
  if (jQuery('body').width() > 767) {
    var w1 = $cols.not('.show_info').width();
    var w2 = $cols.filter('.show_info').width();
    $cols.find('.image').width(w1).height(w1);
    $cols.find('.image img').height(w1);
    $cols.find('.info').width(w1).height(w1).css('display', 'block');
    $cols.find('a').height(w1).width(w2);
  }

  // text max height
  $cols.each(function(){
    jQuery(this).find('.title, .excerpt').removeAttr('style');
    var remain_height = jQuery(this).height() - jQuery(this).find('.meta').outerHeight(true) - jQuery(this).find('.more').outerHeight(true);
    var $title = jQuery(this).find('.title');
    var $excerpt = jQuery(this).find('.excerpt');

    if ($title.innerHeight() > remain_height) {
      $excerpt.hide();
      var title_font_size = parseFloat($title.css('fontSize'));
      var title_line_height = parseFloat($title.css('lineHeight'));
      for (var i=2; i<=10; i++) {
        if (i * title_line_height  > remain_height || i == 10) {
          $title.css({
            maxHeight: (i-1) * title_line_height + 'px',
            overflow: 'hidden',
          });
          break;
        }
      }
    } else {
      remain_height -= $title.outerHeight(true);
      var excerpt_font_size = parseFloat($excerpt.css('fontSize'));
      var excerpt_line_height = parseFloat($excerpt.css('lineHeight'));
      var excerpt_line_height_offset = 0;
      if (excerpt_line_height > excerpt_font_size) {
        excerpt_line_height_offset = (excerpt_line_height - excerpt_font_size) / 2;
      }

      for (var i=1; i<=10; i++) {
        if (i * excerpt_line_height - excerpt_line_height_offset > remain_height || i == 10) {
          $excerpt.css({
            maxHeight: (i-1) * excerpt_line_height + 'px',
            overflow: 'hidden',
          });
          break;
        }
      }
    }
  });
};


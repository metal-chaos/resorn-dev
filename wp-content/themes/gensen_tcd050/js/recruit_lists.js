jQuery(document).ready(function($){
  var $shibori_tag = $('.archive_filter_tag');
  var $shibori_btn = $('.archive_filter .button');
  var $headline_icon = $('.archive_filter_headline i');
  $('.archive_filter_headline').on('click', function(){
    $shibori_tag.toggle(400);
    $shibori_btn.toggle(400);
    if ($headline_icon.hasClass('far')){
      $headline_icon.removeClass('far', 400).addClass('fas', 400)
    } else {
      $headline_icon.removeClass('fas', 400).addClass('far', 400)
    }
  });
  var $cate_areas = $('.category_areas');
  var $areas_icon = $('.areas_head i');
  $('.areas_head').on('click', function(){
    $cate_areas.toggle(400);
    if ($areas_icon.hasClass('far')){
      $areas_icon.removeClass('far', 400).addClass('fas', 400)
    } else {
      $areas_icon.removeClass('fas', 400).addClass('far', 400)
    }
  });
});
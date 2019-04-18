jQuery(document).ready(function($){

  $(window).scroll(function(){

    if ($(this).scrollTop() > $("#header").height() + 100) {
      $("body").addClass("header_fix");
    } else {
      $("body").removeClass("header_fix");
    }

  });

});
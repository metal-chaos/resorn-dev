jQuery(document).ready(function($){

	/**
	 * スマホ用固定フッターバー
	 */
	if ($(".dp-footer-bar-share").length) {
		$(".dp-footer-bar-share, #modal-overlay").on("click", function() {
			$("#modal-content, #modal-overlay").toggleClass("hide");
			return false;
		});	
		$("#modal-overlay, #modal-content").on("touchmove", function(e) {
			e.preventDefault();
		});
	}
	if ($(".dp-footer-bar").length) {
		var footerBar = $(".dp-footer-bar");
		var footerBarHeight = footerBar.height() || 55;
		footerBar.hide();
		$('body').css('paddingBottom', footerBarHeight);
		$('#return_top').css('bottom', footerBarHeight);
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				footerBar.stop().slideDown('fast');
			} else {
				footerBar.stop().slideUp('fast');
			}
		});
	}
});

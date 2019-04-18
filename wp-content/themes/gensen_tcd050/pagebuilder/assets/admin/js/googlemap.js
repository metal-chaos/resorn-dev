jQuery(document).ready(function($){

	// Google Mapの選択
	$(document).on('change', '.pb-widget-googlemap .form-field-map_type :radio', function(){
		if (this.checked) {
			var $cl = $(this).closest('.pb-content');
			if (this.value == 'type2') {
				$cl.find('.form-field-map_code1').hide();
				$cl.find('.form-field-map_code2').show();
			} else {
				$cl.find('.form-field-map_code2').hide();
				$cl.find('.form-field-map_code1').show();
			}
		}
	});
	$('.pb-widget-googlemap .form-field-map_type :radio:checked').trigger('change');

	// Google Map オーバーレイ
	$(document).on('change', '.pb-widget-googlemap .form-field-show_overlay :checkbox', function(){
		if (this.checked) {
			$(this).closest('.pb-content').find('.form-field-overlay').show();
		} else {
			$(this).closest('.pb-content').find('.form-field-overlay').hide();
		}
	});
	$('.pb-widget-googlemap .form-field-show_overlay :checkbox').trigger('change');

});

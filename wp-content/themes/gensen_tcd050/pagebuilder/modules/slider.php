<?php

/**
 * 画像サイズ登録
 */
add_image_size('page_builder_slider_small', 300, 300, true);
//add_image_size('page_builder_slider_large', 1200, 0, false);

/**
 * ページビルダーウィジェット登録
 */
add_page_builder_widget(array(
	'id' => 'pb-widget-slider',
	'form' => 'form_page_builder_widget_slider',
	'form_rightbar' => 'form_rightbar_page_builder_widget_slider',
	'save' => 'save_page_builder_repeater',
	'display' => 'display_page_builder_widget_slider',
	'title' => __('Slider', 'tcd-w'),
	'description' => __('You can display gallery slider.', 'tcd-w'),
	'additional_class' => 'pb-repeater-widget',
	'priority' => 21
));

/**
 * フォーム
 */
function form_page_builder_widget_slider($values = array()) {
	// デフォルト値
	$default_values = apply_filters('page_builder_widget_slider_default_values', array(
		'widget_index' => '',
		'repeater' => array()
	), 'form');

	// デフォルト値に入力値をマージ
	$values = array_merge($default_values, (array) $values);

	// リピーター行の並び
	$repeater_indexes = array();
	if (!empty($values['repeater_index']) && is_array($values['repeater_index'])) {
		$repeater_indexes = $values['repeater_index'];

		// リピーター行データが無ければ削除
		foreach($repeater_indexes as $key => $repeater_index) {
			if (empty($values['repeater'][$repeater_index])) {
				unset($repeater_indexes[$key]);
			}
		}
	} elseif (!empty($values['repeater']) && is_array($values['repeater'])) {
		$repeater_indexes = array_keys($values['repeater']);
	}

	// リピーター行 最大インデックス
	$repeater_index_max = 0;
	if ($repeater_indexes) {
		$repeater_indexes = array_map('intval', $repeater_indexes);
		$repeater_index_max = max($repeater_indexes);
	}

	echo '<div class="pb_repeater_wrap" data-rows="'.$repeater_index_max.'">'."\n";
	echo '	<div class="pb_repeater_sortable">'."\n";

	// リピーター行あり
	if ($repeater_indexes) {
		// リピーター行ループ
		foreach($repeater_indexes as $repeater_index) {
			// リピーター行データあり
			if (!empty($values['repeater'][$repeater_index])) {
				// リピーター行出力
				form_page_builder_widget_slider_repeater_row(
					array(
						'widget_index' => $values['widget_index'],
						'repeater_index' => $repeater_index
					),
					$values['repeater'][$repeater_index]
				);
			}
		}
	}

	echo '	</div>'."\n"; // .pb_repeater_sortable

	// 項目の追加ボタン
	echo '<div class="form-field">';
	echo '<a href="#" class="pb_add_repeater button-primary">'.__('Add item', 'tcd-w').'</a>';
	echo '</div>'."\n";

	// 追加ボタン時に差し込むHTML
	echo '<div class="add_pb_repeater_clone hidden" style="display:none">'."\n";

	// 行出力
	form_page_builder_widget_slider_repeater_row(
		array(
			'widget_index' => $values['widget_index'],
			'repeater_index' => 'pb_repeater_add_index'
		)
	);

	echo '</div>'."\n"; // .add_pb_repeater_clone

	echo '</div>'."\n"; // .pb_repeater_wrap
}

/**
 * リピーター行出力
 */
function form_page_builder_widget_slider_repeater_row($values = array(), $row_values = array()) {
	// デフォルト値に入力値をマージ
	$values = array_merge(
		array(
			'widget_index' => '',
			'repeater_index' => ''
		),
		(array) $values
	);

	// 行デフォルト値
	$default_row_values = apply_filters('page_builder_widget_slider_default_row_values', array(
		'repeater_label' => '',
		'image' => '',
		'link' => '',
		'target_blank' => ''
	));

	// 行デフォルト値に行の値をマージ
	$row_values = array_merge(
		$default_row_values,
		(array) $row_values
	);

	// リピーター表示名
	if (!$row_values['repeater_label']) {
		$row_values['repeater_label'] = __('Image', 'tcd-w').' '.$values['repeater_index'];
	}
?>

<div id="pb_slider-<?php echo esc_attr($values['widget_index'].'-'.$values['repeater_index']); ?>" class="pb_repeater pb_repeater-<?php echo esc_attr($values['repeater_index']); ?>">
	<input type="hidden" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][repeater_index][]" value="<?php echo esc_attr($values['repeater_index']); ?>" />
	<ul class="pb_repeater_button pb_repeater_cf">
		<li><span class="pb_repeater_move"><?php _e('Move', 'tcd-w'); ?></span></li>
		<li><span class="pb_repeater_delete" data-confirm="<?php _e('Are you sure you want to delete this item?', 'tcd-w'); ?>"><?php _e('Delete', 'tcd-w'); ?></span></li>
	</ul>
	<div class="pb_repeater_content">
		<h3 class="pb_repeater_headline"><span class="index_label"><?php echo esc_html($row_values['repeater_label']); ?></span><a href="#"><?php _e('Open', 'tcd-w'); ?></a></h3>
		<div class="pb_repeater_field">
			<div class="form-field">
				<h4><?php _e('Image', 'tcd-w'); ?></h4>
				<?php
					$input_name = 'pagebuilder[widget]['.$values['widget_index'].'][repeater]['.$values['repeater_index'].'][image]';
					$media_id = $row_values['image'];
					pb_media_form($input_name, $media_id);
				?>
			</div>

			<div class="form-field">
				<h4><?php _e('Link URL for image', 'tcd-w'); ?></h4>
				<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][repeater][<?php echo esc_attr($values['repeater_index']); ?>][link]" value="<?php echo esc_attr($row_values['link']); ?>" />
			</div>

			<div class="form-field">
				<h4><?php _e('Link target', 'tcd-w'); ?></h4>
				<input type="hidden" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][target_blank]" value="0" />
				<label><input type="checkbox" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][repeater][<?php echo esc_attr($values['repeater_index']); ?>][target_blank]" value="1"<?php if ($row_values['target_blank']) echo ' checked="checked"'; ?> /> <?php _e('Use target blank for this link', 'tcd-w') ?></label>
			</div>
		</div>
	</div>
</div>

<?php
}

/**
 * フォーム 右サイドバー
 */
function form_rightbar_page_builder_widget_slider($values = array()) {
	// デフォルト値
	$default_values = apply_filters('page_builder_widget_slider_default_values', array(
		'widget_index' => '',
		'margin_bottom' => 30,
		'margin_bottom_mobile' => 30
	), 'form_rightbar');

	// デフォルト値に入力値をマージ
	$values = array_merge($default_values, (array) $values);
?>

<h3><?php _e('Margin setting', 'tcd-w'); ?></h3>
<div class="form-field">
	<label><?php _e('Margin bottom', 'tcd-w'); ?></label>
	<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][margin_bottom]" value="<?php echo esc_attr($values['margin_bottom']); ?>" class="pb-input-narrow hankaku" /> px
	<p class="pb-description"><?php _e('Space below the content.<br />Default is 30px.', 'tcd-w'); ?></p>
</div>
<div class="form-field">
	<label><?php _e('Margin bottom for mobile', 'tcd-w'); ?></label>
	<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][margin_bottom_mobile]" value="<?php echo esc_attr($values['margin_bottom_mobile']); ?>" class="pb-input-narrow hankaku" /> px
	<p class="pb-description"><?php _e('Space below the content.<br />Default is 30px.', 'tcd-w'); ?></p>
</div>

<?php
}

/**
 * フロント出力
 */
function display_page_builder_widget_slider($values = array(), $widget_index = null) {
	// リピーター行の並び
	if (!empty($values['repeater_index']) && is_array($values['repeater_index'])) {
		$repeater_indexes = $values['repeater_index'];

		// リピーター行ループし、行データが無ければ削除
		foreach($repeater_indexes as $key => $repeater_index) {
			if (empty($values['repeater'][$repeater_index])) {
				unset($repeater_indexes[$key]);
			}
		}
	} elseif (!empty($values['repeater']) && is_array($values['repeater'])) {
		$repeater_indexes = array_keys($values['repeater']);
	}

	// リピーター行がなければ終了
	if (empty($repeater_indexes)) return;
?>
<div class="pb_slider_wrap">

  <div class="pb_slider">
<?php
	$is_first = true;
	foreach($repeater_indexes as $repeater_index) {
		$repeater_values = $values['repeater'][$repeater_index];

		$image = null;
		if (!empty($repeater_values['image'])) {
			$image = wp_get_attachment_image_src($repeater_values['image'], apply_filters('page_builder_slider_large_image_size', 'full'));
		}
		if (empty($image[0])) continue;

		echo '   <div class="pb_slider_item">';
		if (!empty($repeater_values['link'])) {
			echo '<a href="'.esc_attr($repeater_values['link']).'"';
			if (!empty($repeater_values['target_blank'])) {
				echo ' target="_blank"';
			}
			echo '>';
		}

		if ($is_first) {
			$is_first = false;
			echo '<img src="'.esc_attr($image[0]).'" alt="" />';
		} else {
			echo '<img data-lazy="'.esc_attr($image[0]).'" alt="" />';
		}

		if (!empty($repeater_values['link'])) {
			echo '</a>';
		}
		echo '</div>'."\n";
	}
?>
  </div>

  <div class="pb_slider_nav">
<?php
	foreach($repeater_indexes as $repeater_index) {
		$repeater_values = $values['repeater'][$repeater_index];

		$image = null;
		if (!empty($repeater_values['image'])) {
			$image = wp_get_attachment_image_src($repeater_values['image'], apply_filters('page_builder_slider_small_image_size', 'page_builder_slider_small'));
		}
		if (!empty($image[0])) {
			echo '   <div class="pb_slider_nav_item">';
			echo '<img src="'.esc_attr($image[0]).'" alt="" />';
			echo '</div>'."\n";
		}
	}
?>
  </div>

</div>
<?php
}

/**
 * フロント用js・css
 */
function page_builder_widget_slider_sctipts() {
	page_builder_slick_enqueue_script();
}

function page_builder_widget_slider_styles() {
	page_builder_slick_enqueue_style();
	wp_enqueue_style('page_builder-slider', get_template_directory_uri().'/pagebuilder/assets/css/slider.css', false, PAGE_BUILDER_VERSION);
}

function page_builder_widget_slider_sctipts_styles() {
	if (is_singular() && is_page_builder() && page_builder_has_widget('pb-widget-slider')) {
		add_action('wp_enqueue_scripts', 'page_builder_widget_slider_sctipts', 11);
		add_action('wp_enqueue_scripts', 'page_builder_widget_slider_styles', 11);
		add_action('wp_head', 'pb_slider_script_header');
	}
}
add_action('wp', 'page_builder_widget_slider_sctipts_styles');

function pb_slider_script_header() {
?>
<script type="text/javascript">
jQuery(document).ready(function($){
  if (typeof $.fn.slick == 'undefined') return;

  $('.pb_slider').slick({
    infinite: false,
    dots: false,
    arrows: true,
    prevArrow: '<button type="button" class="slick-prev">&#xe90f;</button>',
    nextArrow: '<button type="button" class="slick-next">&#xe910;</button>',
    slidesToShow: 1,
    slidesToScroll: 1,
    adaptiveHeight: true,
    autoplay: true,
    fade: true,
    lazyLoad: 'progressive',
    speed: 1000,
    autoplaySpeed: <?php echo apply_filters('page_builder_slider_autoplay_speed', 10000); ?>,
    asNavFor: '.pb_slider_nav'
  });

  $('.pb_slider_nav').slick({
    focusOnSelect: true,
    infinite: false,
    dots: false,
    arrows: false,
    slidesToShow: 7,
    slidesToScroll: 1,
    autoplay: false,
    asNavFor: '.pb_slider'
  });

  setTimeout(function(){
    $('.pb_slider, .pb_slider_nav').slick('setPosition');
  }, 300);
  $(window).on('load', function(){
    $('.pb_slider, .pb_slider_nav').slick('setPosition');
  });
  $('.pb_slider img').on('load', function(){
    setTimeout(function(){
      $('.pb_slider, .pb_slider_nav').slick('setPosition');
    }, 50);
  });
});
</script>
<?php
}


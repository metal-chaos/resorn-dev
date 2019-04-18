<?php

/**
 * ページビルダーウィジェット登録
 */
add_page_builder_widget(array(
	'id' => 'pb-widget-catchcopy',
	'form' => 'form_page_builder_widget_catchcopy',
	'form_rightbar' => 'form_rightbar_page_builder_widget_catchcopy',
	'display' => 'display_page_builder_widget_catchcopy',
	'title' => __('Catchphrase', 'tcd-w'),
	'priority' => 11
));

/**
 * フォーム
 */
function form_page_builder_widget_catchcopy($values = array()) {
	// デフォルト値
	$default_values = apply_filters('page_builder_widget_catchcopy_default_values', array(
		'widget_index' => '',
		'catchcopy' => '',
		'font_size' => '20',
		'font_size_mobile' => '20',
		'font_color' => '#333333',
		'font_family' => 'type1',
		'text_align' => 'left'
	), 'form');

	// デフォルト値に入力値をマージ
	$values = array_merge($default_values, (array) $values);

	// 旧カラーピッカー対策
	if (preg_match('/^[0-9a-f]{6}$/i', $values['font_color'])) {
		$values['font_color'] = '#'.strtolower($values['font_color']);
	}
?>

<div class="form-field">
	<h4><?php _e('Catchphrase', 'tcd-w'); ?></h4>
	<textarea name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][catchcopy]" rows="4"><?php echo esc_textarea($values['catchcopy']); ?></textarea>
</div>

<div class="form-field">
	<h4><?php _e('Font size', 'tcd-w'); ?></h4>
	<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][font_size]" value="<?php echo esc_attr($values['font_size']); ?>" class="pb-input-narrow hankaku" /> px
</div>

<div class="form-field">
	<h4><?php _e('Font size for mobile', 'tcd-w'); ?></h4>
	<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][font_size_mobile]" value="<?php echo esc_attr($values['font_size_mobile']); ?>" class="pb-input-narrow hankaku" /> px
</div>

<div class="form-field">
	<h4><?php _e('Font color', 'tcd-w'); ?></h4>
	<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][font_color]" value="<?php echo esc_attr($values['font_color']); ?>" class="pb-input-narrow pb-wp-color-picker" data-default-color="<?php echo esc_attr($default_values['font_color']); ?>" />
</div>

<div class="form-field">
	<h4><?php _e('Font family', 'tcd-w'); ?></h4>
	<select name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][font_family]">
		<?php
			$select_options = array(
				'type1' => __('Meiryo', 'tcd-w'),
				'type2' => __('YuGothic', 'tcd-w'),
				'type3' => __('YuMincho', 'tcd-w'),
			);
			foreach($select_options as $key => $value) {
				$attr = '';
				if ($values['font_family'] == $key) {
					$attr .= ' selected="selected"';
				}
				echo '<option value="'.esc_attr($key).'"'.$attr.'>'.esc_html($value).'</option>';
			}
		?>
	</select>
</div>

<div class="form-field form-field-radio">
	<h4><?php _e('Text align', 'tcd-w'); ?></h4>
	<?php
		$radio_options = array(
			'left' => __('Align left', 'tcd-w'),
			'center' => __('Align center', 'tcd-w'),
			'right' => __('Align right', 'tcd-w')
		);
		$radio_html = array();
		foreach($radio_options as $key => $value) {
			$attr = '';
			if ($values['text_align'] == $key) {
				$attr .= ' checked="checked"';
			}
			$radio_html[] = '<label><input type="radio" name="pagebuilder[widget]['.esc_attr($values['widget_index']).'][text_align]" value="'.esc_attr($key).'"'.$attr.' />'.esc_html($value).'</label>';
		}
		echo implode("<br>\n\t", $radio_html);
	?>
</div>

<?php
}

/**
 * フォーム 右サイドバー
 */
function form_rightbar_page_builder_widget_catchcopy($values = array()) {
	// デフォルト値
	$default_values = apply_filters('page_builder_widget_catchcopy_default_values', array(
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
function display_page_builder_widget_catchcopy($values = array()) {
	if (empty($values['catchcopy'])) return;

	$class = 'pb_catchcopy';
	$style = '';

	if (!empty($values['font_size'])) {
		$style .= 'font-size:'.$values['font_size'].'px;';
	}
	if (!empty($values['font_color'])) {
		// 旧カラーピッカー対策
		if (preg_match('/^[0-9a-f]{6}$/i', $values['font_color'])) {
			$values['font_color'] = '#'.$values['font_color'];
		}
		$style .= ' color:'.$values['font_color'].';';
	}
	if (!empty($values['text_align'])) {
		$style .= ' text-align:'.$values['text_align'].';';
	}
	if (!empty($values['font_family'])) {
		$class .= ' pb_font_family_'.$values['font_family'];
	}

	echo '<h4 class="'.$class.'" style="'.trim($style).'">'.str_replace(array("\r\n", "\r", "\n"), '<br>', esc_html($values['catchcopy'])).'</h4>';
}

/**
 * フロント用css
 */
function page_builder_widget_catchcopy_sctipts_styles() {
	if (is_singular() && is_page_builder() && page_builder_has_widget('pb-widget-catchcopy')) {
		add_action('page_builder_css', 'page_builder_widget_catchcopy_css');
	}
}
add_action('wp', 'page_builder_widget_catchcopy_sctipts_styles');

function page_builder_widget_catchcopy_css() {
	// 現記事で使用しているcatchcopyコンテンツデータを取得
	$post_widgets = get_page_builder_post_widgets(get_the_ID(), 'pb-widget-catchcopy');
	if ($post_widgets) {

		$css_mobile = '';

		foreach($post_widgets as $post_widget) {
			$widget_index = $post_widget['widget_index'];
			$values = $post_widget['widget_value'];

			$css_mobile .= '  '.$post_widget['css_class'].' .pb_catchcopy { font-size: '.esc_attr($values['font_size_mobile']).'px !important; }'."\n";
		}

		echo "@media only screen and (max-width: 767px) {\n";
		echo $css_mobile;
		echo "}\n";

	}
}

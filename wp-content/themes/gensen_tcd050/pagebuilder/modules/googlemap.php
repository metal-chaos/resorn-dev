<?php

/**
 * ページビルダーウィジェット登録
 */
add_page_builder_widget(array(
	'id' => 'pb-widget-googlemap',
	'form' => 'form_page_builder_widget_googlemap',
	'form_rightbar' => 'form_rightbar_page_builder_widget_googlemap',
	'display' => 'display_page_builder_widget_googlemap',
	'title' => __('Google Map', 'tcd-w'),
	'priority' => 21
));

/**
 * 管理画面用js
 */
function page_builder_widget_googlemap_admin_scripts() {
	wp_enqueue_script('page_builder-googlemap-admin', get_template_directory_uri().'/pagebuilder/assets/admin/js/googlemap.js', array('jquery'), PAGE_BUILDER_VERSION, true);
}
add_action('page_builder_admin_scripts', 'page_builder_widget_googlemap_admin_scripts', 12);

/**
 * フォーム デフォルト値
 */
function get_page_builder_widget_googlemap_default_values() {
	$primary_color = page_builder_get_primary_color('#000000');

	$default_values = array(
		'widget_index' => '',
		'margin_bottom' => 30,
		'margin_bottom_mobile' => 30,
		'map_type' => 'type1',
		'map_code1' => '',
		'map_code2' => '',
		'show_overlay' => 0,
		'overlay_layout' => 'type1',
		'overlay_map_layout' => 'type1',
		'overlay_bg_color' => $primary_color,
		'overlay_bg_opacity' => '0.5',
		'overlay_headline' => '',
		'overlay_headline_font_size' => '40',
		'overlay_headline_font_size_mobile' => '20',
		'overlay_headline_font_color' => '#ffffff',
		'overlay_headline_font_family' => 'type1',
		'overlay_headline_text_align' => 'left',
		'overlay_content' => '',
		'overlay_content_font_size' => '14',
		'overlay_content_font_size_mobile' => '14',
		'overlay_content_font_color' => '#ffffff',
		'overlay_content_font_family' => 'type1',
		'overlay_content_text_align' => 'left',
		'show_overlay_button' => 0,
		'overlay_button' => '',
		'overlay_button_url' => '',
		'overlay_button_target_blank' => 0,
		'overlay_button_font_color' => '#ffffff',
		'overlay_button_bg_color' => $primary_color,
		'overlay_button_bg_opacity' => 0,
		'overlay_button_border_color' => '#ffffff',
		'overlay_button_font_color_hover' => '#ffffff',
		'overlay_button_bg_color_hover' => $primary_color,
		'overlay_button_bg_opacity_hover' => 0,
		'overlay_button_border_color_hover' => '#ffffff'
	);

	return apply_filters('get_page_builder_widget_googlemap_default_values', $default_values);
}

/**
 * フォーム
 */
function form_page_builder_widget_googlemap($values = array()) {
	// デフォルト値
	$default_values = apply_filters('page_builder_widget_googlemap_default_values', get_page_builder_widget_googlemap_default_values(), 'form');

	// デフォルト値に入力値をマージ
	$values = array_merge($default_values, (array) $values);

	// font family 選択肢
	$font_family_options = array(
		'type1' => __('Meiryo', 'tcd-w'),
		'type2' => __('YuGothic', 'tcd-w'),
		'type3' => __('YuMincho', 'tcd-w'),
	);

	// font family 選択肢
	$text_align_options = array(
		'left' => __('Align left', 'tcd-w'),
		'center' => __('Align center', 'tcd-w'),
		'right' => __('Align right', 'tcd-w')
	);
?>

<div class="form-field form-field-radio form-field-map_type">
    <h4><?php _e('Google Maps type', 'tcd-w'); ?></h4>
	<?php
		$radio_options = array(
			'type1' => __('Use Google map iframe code', 'tcd-w'),
			'type2' => __('Use TCD Google Maps plugin', 'tcd-w')
		);
		$radio_html = array();
		foreach($radio_options as $key => $value) {
			$attr = '';
			if ($values['map_type'] == $key) {
				$attr .= ' checked="checked"';
			}
			$radio_html[] = '<label><input type="radio" name="pagebuilder[widget]['.esc_attr($values['widget_index']).'][map_type]" value="'.esc_attr($key).'"'.$attr.' />'.esc_html($value).'</label>';
		}
		echo implode("<br>\n\t", $radio_html);
	?>
</div>

<div class="form-field form-field-map_code1">
	<h4><?php _e('Google map iframe code', 'tcd-w'); ?></h4>
	<textarea name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][map_code1]" rows="4"><?php echo esc_textarea($values['map_code1']); ?></textarea>
</div>

<div class="form-field form-field-map_code2">
	<h4><?php _e('Use TCD Google Maps plugin', 'tcd-w'); ?></h4>
	<textarea name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][map_code2]" rows="4"><?php echo esc_textarea($values['map_code2']); ?></textarea>
</div>

<div class="form-field form-field-show_overlay">
	<h4><?php _e('Overlay text setting', 'tcd-w'); ?></h4>
    <p class="pb-description"><?php _e('You can display the background color and text overlaid on the map.', 'tcd-w'); ?></p>
	<input type="hidden" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][show_overlay]" value="0" />
	<label><input type="checkbox" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][show_overlay]" value="1"<?php if ($values['show_overlay']) echo ' checked="checked"'; ?> /><?php _e('Display overlay text', 'tcd-w'); ?></label>
</div>

<div class="form-field form-field-radio form-field-overlay hidden">
    <h4><?php _e('Overlay text layout', 'tcd-w'); ?></h4>
	<?php
		$radio_options = array(
		'type1' => __('Type1 (display text contents on the left side)', 'tcd-w'),
		'type2' => __('Type2 (display text contents on the right side)', 'tcd-w')
		);
		$radio_html = array();
		foreach($radio_options as $key => $value) {
			$attr = '';
			if ($values['overlay_layout'] == $key) {
				$attr .= ' checked="checked"';
			}
			$radio_html[] = '<label><input type="radio" name="pagebuilder[widget]['.esc_attr($values['widget_index']).'][overlay_layout]" value="'.esc_attr($key).'"'.$attr.' />'.esc_html($value).'</label>';
		}
		echo implode("<br>\n\t", $radio_html);
	?>
</div>

<div class="form-field form-field-radio form-field-overlay hidden">
    <h4><?php _e('Google map layout', 'tcd-w'); ?></h4>
	<?php
		$radio_options = array(
			'type1' => __('Full width', 'tcd-w'),
			'type2' => __('Half width', 'tcd-w')
		);
		$radio_html = array();
		foreach($radio_options as $key => $value) {
			$attr = '';
			if ($values['overlay_map_layout'] == $key) {
				$attr .= ' checked="checked"';
			}
			$radio_html[] = '<label><input type="radio" name="pagebuilder[widget]['.esc_attr($values['widget_index']).'][overlay_map_layout]" value="'.esc_attr($key).'"'.$attr.' />'.esc_html($value).'</label>';
		}
		echo implode("<br>\n\t", $radio_html);
	?>
</div>

<div class="form-field form-field-overlay hidden">
	<h4><?php _e('Overlay background color', 'tcd-w'); ?></h4>
	<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_bg_color]" value="<?php echo esc_attr($values['overlay_bg_color']); ?>" class="pb-wp-color-picker" data-default-color="<?php echo esc_attr($default_values['overlay_bg_color']); ?>" />
	<table>
		<tr>
			<td><?php _e('Transparency', 'tcd-w'); ?></td>
			<td>
				<input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_bg_opacity]" value="<?php echo esc_attr($values['overlay_bg_opacity']); ?>" class="pb-input-narrow hankaku" />
				<span class="pb-description" style="margin-left: 5px;"><?php _e('Please enter the number 0 - 1.0. (e.g. 0.5)', 'tcd-w'); ?></span>
			</td>
		</tr>
	</table>
</div>

<div class="form-field form-field-overlay hidden">
	<h4><?php _e('Headline', 'tcd-w'); ?></h4>
	<textarea name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_headline]" rows="2"><?php echo esc_textarea($values['overlay_headline']); ?></textarea>
	<table style="margin-top:5px;">
		<tr>
			<td><?php _e('Font size', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_headline_font_size]" value="<?php echo esc_attr($values['overlay_headline_font_size']); ?>" class="pb-input-narrow hankaku" /> px</td>
		</tr>
		<tr>
			<td><?php _e('Font size for mobile', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_headline_font_size_mobile]" value="<?php echo esc_attr($values['overlay_headline_font_size_mobile']); ?>" class="pb-input-narrow hankaku" /> px</td>
		</tr>
		<tr>
			<td><?php _e('Font color', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_headline_font_color]" value="<?php echo esc_attr($values['overlay_headline_font_color']); ?>" class="pb-wp-color-picker" data-default-color="<?php echo esc_attr($default_values['overlay_headline_font_color']); ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('Font family', 'tcd-w'); ?></td>
			<td>
				<select name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_headline_font_family]">
					<?php
						foreach($font_family_options as $key => $value) {
							$attr = '';
							if ($values['overlay_headline_font_family'] == $key) {
								$attr .= ' selected="selected"';
							}
							echo '<option value="'.esc_attr($key).'"'.$attr.'>'.esc_html($value).'</option>';
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php _e('Text align', 'tcd-w'); ?></td>
			<td>
				<select name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_headline_text_align]">
					<?php
						foreach($text_align_options as $key => $value) {
							$attr = '';
							if ($values['overlay_headline_text_align'] == $key) {
								$attr .= ' selected="selected"';
							}
							echo '<option value="'.esc_attr($key).'"'.$attr.'>'.esc_html($value).'</option>';
						}
					?>
				</select>
			</td>
		</tr>
	</table>
</div>

<div class="form-field form-field-overlay hidden">
	<h4><?php _e('Description', 'tcd-w'); ?></h4>
	<textarea name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_content]" rows="4"><?php echo esc_textarea($values['overlay_content']); ?></textarea>
	<table style="margin-top:5px;">
		<tr>
			<td><?php _e('Font size', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_content_font_size]" value="<?php echo esc_attr($values['overlay_content_font_size']); ?>" class="pb-input-narrow hankaku" /> px</td>
		</tr>
		<tr>
			<td><?php _e('Font size for mobile', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_content_font_size_mobile]" value="<?php echo esc_attr($values['overlay_content_font_size_mobile']); ?>" class="pb-input-narrow hankaku" /> px</td>
		</tr>
		<tr>
			<td><?php _e('Font color', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_content_font_color]" value="<?php echo esc_attr($values['overlay_content_font_color']); ?>" class="pb-wp-color-picker" data-default-color="<?php echo esc_attr($default_values['overlay_content_font_color']); ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('Font family', 'tcd-w'); ?></td>
			<td>
				<select name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_content_font_family]">
					<?php
						foreach($font_family_options as $key => $value) {
							$attr = '';
							if ($values['overlay_content_font_family'] == $key) {
								$attr .= ' selected="selected"';
							}
							echo '<option value="'.esc_attr($key).'"'.$attr.'>'.esc_html($value).'</option>';
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php _e('Text align', 'tcd-w'); ?></td>
			<td>
				<select name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_content_text_align]">
					<?php
						foreach($text_align_options as $key => $value) {
							$attr = '';
							if ($values['overlay_content_text_align'] == $key) {
								$attr .= ' selected="selected"';
							}
							echo '<option value="'.esc_attr($key).'"'.$attr.'>'.esc_html($value).'</option>';
						}
					?>
				</select>
			</td>
		</tr>
	</table>
</div>

<div class="form-field form-field-overlay hidden">
	<h4><?php _e('Button Settings', 'tcd-w'); ?></h4>
	<p><label><input type="checkbox" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][show_overlay_button]" value="1" <?php checked(1, $values['show_overlay_button']); ?>> <?php _e( 'Display button', 'tcd-w' ); ?></label></p>
	<table style="width:100%;">
		<tr>
			<td><?php _e('Button text', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_button]" value="<?php echo esc_attr($values['overlay_button']); ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('Link URL', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_button_url]" value="<?php echo esc_attr($values['overlay_button_url']); ?>" /></td>
		</tr>
		<tr>
			<td></td>
			<td><p style="margin:5px 0;"><label><input type="checkbox" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_button_target_blank]" value="1"<?php if ($values['overlay_button_target_blank']) echo ' checked="checked"'; ?> /><?php _e('Open link in new window', 'tcd-w'); ?></label></p></td>
		</tr>
		<tr>
			<td><?php _e('Font color', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_button_font_color]" value="<?php echo esc_attr($values['overlay_button_font_color']); ?>" class="pb-wp-color-picker" data-default-color="<?php echo esc_attr($default_values['overlay_button_font_color']); ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('Background color', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_button_bg_color]" value="<?php echo esc_attr($values['overlay_button_bg_color']); ?>" class="pb-wp-color-picker" data-default-color="<?php echo esc_attr($default_values['overlay_button_bg_color']); ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('Background color transparency', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_button_bg_opacity]" value="<?php echo esc_attr($values['overlay_button_bg_opacity']); ?>" class="pb-input-narrow hankaku" /></td>
		</tr>
		<tr>
			<td><?php _e('Border color', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_button_border_color]" value="<?php echo esc_attr($values['overlay_button_border_color']); ?>" class="pb-wp-color-picker" data-default-color="<?php echo esc_attr($default_values['overlay_button_border_color']); ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('Font color (hover)', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_button_font_color_hover]" value="<?php echo esc_attr($values['overlay_button_font_color_hover']); ?>" class="pb-wp-color-picker" data-default-color="<?php echo esc_attr($default_values['overlay_button_font_color_hover']); ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('Background color (hover)', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_button_bg_color_hover]" value="<?php echo esc_attr($values['overlay_button_bg_color_hover']); ?>" class="pb-wp-color-picker" data-default-color="<?php echo esc_attr($default_values['overlay_button_bg_color_hover']); ?>" /></td>
		</tr>
		<tr>
			<td><?php _e('Background color transparency (hover)', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_button_bg_opacity_hover]" value="<?php echo esc_attr($values['overlay_button_bg_opacity_hover']); ?>" class="pb-input-narrow hankaku" /></td>
		</tr>
		<tr>
			<td><?php _e('Border color (hover)', 'tcd-w'); ?></td>
			<td><input type="text" name="pagebuilder[widget][<?php echo esc_attr($values['widget_index']); ?>][overlay_button_border_color_hover]" value="<?php echo esc_attr($values['overlay_button_border_color_hover']); ?>" class="pb-wp-color-picker" data-default-color="<?php echo esc_attr($default_values['overlay_button_border_color_hover']); ?>" /></td>
		</tr>
	</table>
</div>
<?php
}

/**
 * フォーム 右サイドバー
 */
function form_rightbar_page_builder_widget_googlemap($values = array()) {
	// デフォルト値
	$default_values = apply_filters('page_builder_widget_googlemap_default_values', array(
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
function display_page_builder_widget_googlemap($values = array()) {
	// デフォルト値
	$default_values = apply_filters('page_builder_widget_googlemap_default_values', get_page_builder_widget_googlemap_default_values(), 'form');

	// デフォルト値に入力値をマージ
	$values = array_merge($default_values, (array) $values);

	// Map html
	if (empty($values['map_type'])) {
	} elseif ($values['map_type'] == 'type1') {
		$map_html = $values['map_code1'];
	} elseif ($values['map_type'] == 'type2') {
		$map_html = do_shortcode($values['map_code2']);
	}
	if (empty($map_html)) return;

	// オーバーレイなし
	if (empty($values['show_overlay'])) {
		echo $map_html;

	// オーバーレイあり
	} else {
		$overlay_contents = array();
		$overlay_class = '';
		$map_class = '';

		if ($values['overlay_headline']) {
			$overlay_contents['headline'] = '<h3 class="pb_googlemap_headline pb_font_family_'.esc_attr($values['overlay_headline_font_family']).'">'.str_replace(array("\r\n", "\r", "\n"), '<br>', esc_html($values['overlay_headline'])).'</h3>';
		}

		if ($values['overlay_content']) {
			$overlay_contents['content'] = '<div class="pb_googlemap_content pb_font_family_'.esc_attr($values['overlay_content_font_family']).'">'.str_replace(array("\r\n", "\r", "\n"), '<br>', esc_html($values['overlay_content'])).'</div>';
		}

		if ($values['show_overlay_button'] && $values['overlay_button']) {
			if ($values['overlay_button_url']) {
				$overlay_contents['overlay_button'] = '<a class="pb_googlemap_button" href="'.esc_attr($values['overlay_button_url']).'"';
				if ($values['overlay_button_target_blank']) {
					$overlay_contents['overlay_button'] .= ' target="_blank"';
				}
				$overlay_contents['overlay_button'] .= '>'.esc_html($values['overlay_button']).'</a>';
			} else {
				$overlay_contents['overlay_button'] .= '<div class="pb_googlemap_button">'.esc_html($values['overlay_button']).'</div>';
			}
		}

		// overlay layout
		if ($values['overlay_layout'] == 'type2') {
			$overlay_class = ' pb_googlemap-overlay_layout-'.esc_attr($values['overlay_layout']);
		} else {
			$overlay_class = ' pb_googlemap-overlay_layout-type1';
		}

		// googlemap layout type2
		if ($values['overlay_map_layout'] == 'type2') {
			$overlay_class .= ' pb_googlemap-map_layout-type2';
			$map_class = $overlay_class;
		}
?>
<div class="pb_googlemap_overlay<?php echo $overlay_class; ?>">
<?php
	if ($overlay_contents) {
		echo "\t\t".implode("\n\t\t", $overlay_contents);
	}
?>
</div>
<div class="pb_googlemap_map<?php echo $map_class; ?>">
<?php
		echo $map_html."\n";
?>
</div>
<?php
	}
}

/**
 * フロント用css
 */
function page_builder_widget_googlemap_styles() {
	wp_enqueue_style('page_builder-googlemap', get_template_directory_uri().'/pagebuilder/assets/css/googlemap.css', false, PAGE_BUILDER_VERSION);
}

function page_builder_widget_googlemap_sctipts_styles() {
	if (is_singular() && is_page_builder() && page_builder_has_widget('pb-widget-googlemap')) {
		add_action('wp_enqueue_scripts', 'page_builder_widget_googlemap_styles', 11);
		add_action('page_builder_css', 'page_builder_widget_googlemap_css');
	}
}
add_action('wp', 'page_builder_widget_googlemap_sctipts_styles');

function page_builder_widget_googlemap_css() {
	// 現記事で使用しているgoolemapコンテンツデータを取得
	$post_widgets = get_page_builder_post_widgets(get_the_ID(), 'pb-widget-googlemap');
	if ($post_widgets) {
		foreach($post_widgets as $post_widget) {
			$values = $post_widget['widget_value'];

			// オーバーレイあり
			if (!empty($values['show_overlay'])) {
				echo $post_widget['css_class'].' .pb_googlemap_overlay { background-color: rgba('.esc_attr(implode(',', page_builder_hex2rgb($values['overlay_bg_color'])).','.$values['overlay_bg_opacity']).'); }'."\n";
				echo $post_widget['css_class'].' .pb_googlemap_headline { color: '.esc_attr($values['overlay_headline_font_color']).'; font-size: '.esc_attr($values['overlay_headline_font_size']).'px; text-align: '.esc_attr($values['overlay_headline_text_align']).'; }'."\n";
				echo $post_widget['css_class'].' .pb_googlemap_content { color: '.esc_attr($values['overlay_content_font_color']).'; font-size: '.esc_attr($values['overlay_content_font_size']).'px; text-align: '.esc_attr($values['overlay_content_text_align']).'; }'."\n";
				echo $post_widget['css_class'].' .pb_googlemap_button { background-color: rgba('.esc_attr(implode(',', page_builder_hex2rgb($values['overlay_button_bg_color'])).','.$values['overlay_button_bg_opacity']).'); border-color: '.esc_attr($values['overlay_button_border_color']).'; color: '.esc_attr($values['overlay_button_font_color']).'; }'."\n";
				echo $post_widget['css_class'].' a.pb_googlemap_button:hover { background-color: rgba('.esc_attr(implode(',', page_builder_hex2rgb($values['overlay_button_bg_color_hover'])).','.$values['overlay_button_bg_opacity_hover']).'); border-color: '.esc_attr($values['overlay_button_border_color_hover']).'; color: '.esc_attr($values['overlay_button_font_color_hover']).'; }'."\n";

				echo "@media only screen and (max-width: 767px) {\n";
				echo '  '.$post_widget['css_class'].' .pb_googlemap_headline { font-size: '.esc_attr($values['overlay_headline_font_size_mobile']).'px; }'."\n";
				echo '  '.$post_widget['css_class'].' .pb_googlemap_content { font-size: '.esc_attr($values['overlay_content_font_size_mobile']).'px; }'."\n";
				echo "}\n";
			}
		}
	}
}

<?php

/**
 * ページビルダーバージョン
 */
define('PAGE_BUILDER_VERSION', '1.1.4');


/**
 * ページビルダーを適用する投稿タイプ
 */
/*
フィルターサンプル
function custom_page_builder_post_types($post_types) {
	// 固定の場合
	return array('post', 'page', 'work', 'news');

	// 任意の投稿タイプを除外する場合
	if ($key = array_search('news', $post_types)) {
		unset($post_types[$key]);
	}
	return $post_types;
}
add_filter('get_page_builder_post_types', 'custom_page_builder_post_types');
*/
function get_page_builder_post_types() {
	static $page_builder_post_types;

	if (!is_array($page_builder_post_types)) {
		$page_builder_post_types = array();

		foreach(get_post_types(array('public' => true), 'names') as $post_type) {
			if (post_type_supports($post_type, 'editor')) {
				$page_builder_post_types[] = $post_type;
			}
		}
	}

	return apply_filters('get_page_builder_post_types', $page_builder_post_types);
}

/**
 * 管理画面でページビルダー出力対象か
 */
function is_admin_page_builder($recalc = false) {
	static $is_admin_page_builder;
	if (!is_null($is_admin_page_builder) && !$recalc) {
		return $is_admin_page_builder;
	}

	$is_admin_page_builder = false;

	global $pagenow, $typenow, $page_builder_widgets;
	if (in_array($pagenow, array('post.php', 'post-new.php')) && in_array($typenow, get_page_builder_post_types()) && $page_builder_widgets) {
		$is_admin_page_builder = true;
	}

	return $is_admin_page_builder;
}

/**
 * 管理画面用js・css
 */
function page_builder_admin_scripts() {
	if (is_admin_page_builder()) {
		wp_enqueue_script('page_builder-admin', get_template_directory_uri().'/pagebuilder/assets/admin/js/admin.js', array('jquery', 'jquery-ui-resizable', 'jquery-ui-sortable', 'jquery-ui-draggable', 'wp-color-picker'), PAGE_BUILDER_VERSION, true);

		do_action('page_builder_admin_scripts');
	}
}
add_action('admin_print_scripts', 'page_builder_admin_scripts', 11);
function page_builder_admin_styles() {
	if (is_admin_page_builder()) {
		wp_enqueue_style('page_builder-admin', get_template_directory_uri().'/pagebuilder/assets/admin/css/admin.css', array('wp-color-picker'), PAGE_BUILDER_VERSION);

		do_action('page_builder_admin_styles');
	}
}
add_action('admin_print_styles', 'page_builder_admin_styles', 11);


/**
 * メタボックス追加
 */
function add_page_builder_metaboxes() {
	foreach(get_page_builder_post_types() as $post_type){
		add_meta_box(
			'page_builder-metabox',
			__('Page Builder', 'tcd-w'),
			'show_page_builder_metabox',
			$post_type,
			'advanced',
			'high'
		);
	}
}
add_action('add_meta_boxes', 'add_page_builder_metaboxes');

/**
 * メタボックス表示
 */
function show_page_builder_metabox() {
	global $post;

	// ウィジェット取得
	$widgets = get_page_builder_widgets();

	// ページビルダーフラグ
	$use_page_builder = get_post_meta($post->ID, 'use_page_builder', true);

	// ページビルダーデータ
	$data = get_post_meta($post->ID, 'page_builder', true);
	if (empty($data)) $data = array();

	// 行インデックス最大値
	$row_index_max = 0;
	if (!empty($data['row']['indexes'])) {
		if (is_string($data['row']['indexes'])) {
			$data['row']['indexes'] = explode(',', $data['row']['indexes']);
		}

		$indexes = array_merge($data['row']['indexes'], array_keys($data['row']));
		$indexes = array_map('intval', $indexes);
		$row_index_max = max($indexes);
	}

	// ウィジェットインデックス最大値
	$widget_index_max = 0;
	if (!empty($data['widget']) && is_array($data['widget'])) {
		$indexes = array_keys($data['widget']);
		$indexes = array_map('intval', $indexes);
		$widget_index_max = max($indexes);
	}

	// ウィジェット取得
	$widgets = get_page_builder_widgets();

	// nonce
	echo '<input type="hidden" name="page_builder_metabox_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
	echo "\n";

	// page builder flag
	echo '<input type="hidden" name="use_page_builder" value="'.(boolean) $use_page_builder.'" />';
	echo "\n";

	// toolbar
	echo '<div class="pb-toolbar">';
	echo '<span class="pb-tool-button pb-switch-to-standard">'. __('Revert to Editor', 'tcd-w'). '</span>';
	echo '<span class="pb-tool-button pb-add-widget" data-require-row-message="'. __('Please click Add row button to start page builder.', 'tcd-w').'"><span class="dashicons dashicons-plus"></span> '. __('Add content', 'tcd-w') . '</span>';
	echo '<span class="pb-tool-button pb-add-row"><span class="dashicons dashicons-grid-view"></span> '. __('Add row', 'tcd-w'). '</span>';
	echo '</div>';
	echo "\n";

	// rows
	echo '<div class="pb-rows-container" data-rows="'.$row_index_max.'" data-widgets="'.$widget_index_max.'" data-require-row-message="'. __('Please click Add row button to start page builder.', 'tcd-w').'">';

	// 行ループ
	if (!empty($data['row']['indexes'])) {
		foreach($data['row']['indexes'] as $row_index) {
			if (!empty($data['row'][$row_index])) {
				render_page_builder_row(
					array(
						'id' => 'row-'.$row_index,
						'index' => $row_index
					),
					$data['row'][$row_index],
					$data
				);
			}
		}
	}

	echo '</div>';
	echo "\n";


	// 行の追加モーダル
	render_page_builder_edit_row_modal(array(
		'index' => 'rowindex',
		'id' => 'pb-add-row-modal',
		'title' => __('Add row', 'tcd-w'),
		'primary_button_label' => __('Add', 'tcd-w'),
		'attribute' => 'data-edit-title="'.esc_attr__('Row setting', 'tcd-w').'" data-edit-button="'.esc_attr__('Done', 'tcd-w').'"'
	));

	// ウィジェットの追加モーダル
	render_page_builder_add_widget_modal();

	echo '<div class="pb-clone hidden" style="display:none;">';

	// 行の追加時のクローン用
	render_page_builder_row(array('id' => 'clonerow', 'index' => 'rowindex'));

	// カラムクローン用
	render_page_builder_cell(array('id' => 'clonecell'));

	// ウィジェットクローン用
	if ($widgets) {
		foreach($widgets as $widget) {
			render_page_builder_widget(
				array(
					'id' => $widget['id'],
					'title' => $widget['title'],
					'widget_index' => 'widgetindex-'.$widget['id'],
					'attribute' => '',
				),
				$widget,
				array()
			);
		}
	}

	echo '</div>';
	echo "\n";
}

/**
 * 行出力
 */
function render_page_builder_row($args = array(), $row = array(), $data = array()) {
	$args = array_merge(
		array(
			'id' => '',
			'index' => 'rowindex'
		),
		(array) $args
	);
?>
<div id="<?php echo esc_attr($args['id']); ?>" class="pb-row-container">
	<input type="hidden" name="pagebuilder[row][indexes][]" value="<?php echo esc_attr($args['index']); ?>" class="pb-row-index" />
	<div class="pb-row-toolbar">
		<span class="pb-tool-button pb-row-edit"><?php _e('Edit row', 'tcd-w'); ?></span>
		<span class="pb-tool-button pb-row-delete" data-confirm="<?php _e("Do you want to delete this row?\nIf you delete this row, registered contents will also be deleted.", 'tcd-w'); ?>"><?php _e('Delete row', 'tcd-w'); ?></span>
		<span class="pb-tool-button pb-row-move"><span class="dashicons dashicons-leftright"></span></span>
	</div>
	<div class="pb-cells">
<?php
	// セルループ
	if (!empty($row['cells_width'])) {
		if (is_string($row['cells_width'])) {
			$row['cells_width'] = explode(',', $row['cells_width']);
		}

		$cell_index = 0;
		foreach($row['cells_width'] as $cells_width) {
			$cell_index++;

			$widget_indexes = array();
			if (!empty($data['cell'][$args['index'].'-'.$cell_index])) {
				$widget_indexes = $data['cell'][$args['index'].'-'.$cell_index];
			}

			render_page_builder_cell(array(
				'id' => 'cell-'.$args['index'].'-'.$cell_index,
				'index' => $cell_index,
				'width' => $cells_width * 100 . '%',
				'widget_indexes' => $widget_indexes,
			), $data);
		}
	}
?>
	</div>
<?php
	// 行編集モーダル
	if ($row) {
		render_page_builder_edit_row_modal(array_merge(
			array(
				'id' => 'row-modal-'.$args['index'],
				'index' => $args['index']
			),
			$row
		));
	}
?>
</div>
<?php
}

/**
 * セル出力
 */
function render_page_builder_cell($args = array(), $data = array()) {
	$args = array_merge(
		array(
			'id' => '',
			'index' => '',
			'width' => '100%',
			'widget_indexes' => array(),
		),
		(array) $args
	);

	if (!is_array($args['widget_indexes'])) {
		$args['widget_indexes'] = explode(',', $args['widget_indexes']);
	}
	$args['widget_indexes'] = array_filter($args['widget_indexes'], 'strlen');


	echo '<div id="'.esc_attr($args['id']).'" class="cell" style="width:'.esc_attr($args['width']).'">';
	echo '<div class="resize-handle"></div>';
	echo '<div class="cell-wrapper widgets-container">';

	// ウィジェットループ
	if ($args['widget_indexes']) {
		foreach($args['widget_indexes'] as $widget_index) {
			if (!empty($data['widget'][$widget_index]['widget_id'])) {
				$widget_id = $data['widget'][$widget_index]['widget_id'];
				$widget = get_page_builder_widget($widget_id);
				$widget_value = $data['widget'][$widget_index];

				if (!empty($widget['title'])) {
					render_page_builder_widget(
						array(
							'id' => 'widget-'.$widget_index,
							'widget_index' => $widget_index,
							'title' => $widget['title'],
							'attribute' => ''
						),
						$widget,
						$widget_value
					);
				}
			}
		}
	}

	echo '</div>';

	// セル内のウィジェット並び
	if ($args['widget_indexes']) {
		echo '<input type="hidden" name="pagebuilder[cell]['.esc_attr($args['index']).']" value="'.esc_attr(implode(',', $args['widget_indexes'])).'" class="widget_indexes" />';
	}

	echo '</div>';
	echo "\n";
}

/**
 * ウィジェット出力
 */
function render_page_builder_widget($args = array(), $widget = array(), $values = array()) {
	$args = array_merge(
		array(
			'id' => '',
			'widget_index' => '',
			'title' => '',
			'attribute' => ''
		),
		(array) $args
	);

	// wp_editor()で-が使えないため_に置換
	$args['widget_index'] = str_replace('-', '_', $args['widget_index']);

	$class = 'pb-widget';
	if (!empty($widget['id'])) {
		$class .= ' '.$widget['id'];
	}
	if (!empty($widget['additional_class'])) {
		if (is_array($widget['additional_class'])) {
			$widget['additional_class'] = implode(' ', $widget['additional_class']);
		}
		$class .= ' '.$widget['additional_class'];
	}
	echo '<div class="'.esc_attr($class).'"';
	if ($args['id']) {
		echo ' id="'.esc_attr($args['id']).'"';
	}
	echo ' data-widget-index="'.esc_attr($args['widget_index']).'"';
	if ($widget) {
		echo ' data-widget-id="'.esc_attr($widget['id']).'"';
	}
	if ($args['attribute']) {
		echo ' '.$args['attribute'];
	}
	echo '>';
	echo '<div class="pb-widget-wrapper">';
	echo '<h4 class="widget-title">'.esc_html($args['title']).'<span class="widget-overview"></span></h4>';
	echo '<div class="actions">';
	echo '<a class="pb-widget-clone">'. __('Clone', 'tcd-w').'</a>';
	echo '<a class="widget-delete" data-confirm="'. __('Do you want to delete this content?', 'tcd-w').'">'. __('Delete', 'tcd-w').'</a>';
	echo '</div>';
	echo '</div>';

	// ウィジェット編集モーダル
	if ($widget) {
		render_page_builder_edit_widget_modal(array(
				'id' => $widget['id'].'-'.$args['widget_index'],
				'widget_id' => $widget['id'],
				'widget_index' => $args['widget_index'],
				'title' => $widget['title'],
				'form' => $widget['form'],
				'form_rightbar' => $widget['form_rightbar']
			),
			$values
		);
	}

	echo '</div>';
	echo "\n";
}

/**
 * 行追加・編集モーダル用出力
 */
function render_page_builder_edit_row_modal($args = array()) {
	// デフォルト値
	$defaults = apply_filters('page_builder_row_default_values', array(
		'id' => 'pb-add-row-modal',
		'index' => 'rowindex',
		'title' => __('Row setting', 'tcd-w'),
		'primary_button_label' => __('Done', 'tcd-w'),
		'cells' => 1,
		'cells_width' => '1',
		'margin_bottom' => 30,
		'margin_bottom_mobile' => 30,
		'gutter' => 30,
		'gutter_mobile' => 30,
		'background_color' => '#ffffff',
		'row_width' => '',
		'mobile_cells' => 'clear',
		'nextpage' => 0,
		'attribute' => '',
	));

	// デフォルト値に入力値をマージ
	$args = array_merge($defaults, (array) $args);

	if (is_array($args['cells_width'])) {
		$args['cells_width'] = implode(',', $args['cells_width']);
	}

	// 旧カラーピッカー対策
	if (preg_match('/^[0-9a-f]{6}$/i', $args['background_color'])) {
		$args['background_color'] = '#'.strtolower($args['background_color']);
	}
?>
<div id="<?php echo esc_attr($args['id']); ?>" class="pb-modal pb-has-right-sidebar pb-modal-row-edit" <?php if ($args['attribute']) echo $args['attribute']; ?>>
	<div class="pb-overlay"></div>
	<div class="pb-title-bar">
		<h3 class="pb-title"><?php echo esc_html($args['title']); ?></h3>
		<a class="pb-close"><span class="pb-dialog-icon"></span></a>
	</div>

	<div class="pb-toolbar">
		<div class="pb-status"></div>
		<div class="pb-buttons">
			<div class="action-buttons">
				<a class="pb-delete" data-confirm="<?php _e("Do you want to delete this row?\nIf you delete this row, registered contents will also be deleted.", 'tcd-w'); ?>"><?php _e('Delete', 'tcd-w'); ?></a>
			</div>

			<input type="button" class="pb-apply button-primary" value="<?php echo esc_attr($args['primary_button_label']); ?>" />
		</div>
	</div>

	<div class="pb-content">
		<div class="row-set-form">
			<strong><?php _e('Number of column', 'tcd-w'); ?></strong>
			<select name="pagebuilder[row][<?php echo esc_attr($args['index']); ?>][cells]" class="cells">
				<?php
					$select_options = array(
						1 => 1,
						2 => 2,
						3 => 3,
						4 => 4,
						5 => 5,
						6 => 6
					);
					foreach($select_options as $key => $value) {
						$attr = '';
						if ($args['cells'] == $key) {
							$attr .= ' selected="selected"';
						}
						echo '<option value="'.esc_attr($key).'"'.$attr.'>'.esc_html($value).'</option>';
					}
				?>
			</select>
			<input type="hidden" name="pagebuilder[row][<?php echo esc_attr($args['index']); ?>][cells_width]" class="cells_width" value="<?php echo esc_attr($args['cells_width']); ?>" />
		</div>

		<div class="row-preview">
		</div>
	</div>

	<div class="pb-sidebar pb-right-sidebar">
		<h3><?php _e('Layout setting', 'tcd-w'); ?></h3>

		<div class="form-field">
			<label><?php _e('Margin bottom of the row', 'tcd-w'); ?></label>
			<input type="text" name="pagebuilder[row][<?php echo esc_attr($args['index']); ?>][margin_bottom]" value="<?php echo esc_attr($args['margin_bottom']); ?>" class="pb-input-narrow hankaku" /> px
			<p class="pb-description"><?php _e('Space below the row.<br />Default is 30px.', 'tcd-w'); ?></p>
		</div>

		<div class="form-field">
			<label><?php _e('Margin bottom of the row for mobile', 'tcd-w'); ?></label>
			<input type="text" name="pagebuilder[row][<?php echo esc_attr($args['index']); ?>][margin_bottom_mobile]" value="<?php echo esc_attr($args['margin_bottom_mobile']); ?>" class="pb-input-narrow hankaku" /> px
			<p class="pb-description"><?php _e('Space below the row.<br />Default is 30px.', 'tcd-w'); ?></p>
		</div>

		<div class="form-field hide-if-one-column">
			<label><?php _e('Gutter', 'tcd-w'); ?></label>
			<input type="text" name="pagebuilder[row][<?php echo esc_attr($args['index']); ?>][gutter]" value="<?php echo esc_attr($args['gutter']); ?>" class="pb-input-narrow hankaku" /> px
			<p class="pb-description"><?php _e('Amount of space between columns.<br />Default is 30px.', 'tcd-w'); ?></p>
		</div>

		<div class="form-field hide-if-one-column">
			<label><?php _e('Gutter  for mobile', 'tcd-w'); ?></label>
			<input type="text" name="pagebuilder[row][<?php echo esc_attr($args['index']); ?>][gutter_mobile]" value="<?php echo esc_attr($args['gutter_mobile']); ?>" class="pb-input-narrow hankaku" /> px
			<p class="pb-description"><?php _e('Amount of space between columns.<br />Default is 30px.', 'tcd-w'); ?></p>
		</div>

		<div class="form-field">
			<label><?php _e('Background color', 'tcd-w'); ?></label>
			<input type="text" name="pagebuilder[row][<?php echo esc_attr($args['index']); ?>][background_color]" value="<?php echo esc_attr($args['background_color']); ?>" class="pb-input-narrow pb-wp-color-picker" data-default-color="<?php echo esc_attr($defaults['background_color']); ?>" />
		</div>

		<div class="form-field">
			<label><?php _e('Row width', 'tcd-w'); ?></label>
			<input type="text" name="pagebuilder[row][<?php echo esc_attr($args['index']); ?>][row_width]" value="<?php echo esc_attr($args['row_width']); ?>" class="pb-input-narrow hankaku" /> px
			<p class="pb-description"><?php _e('Please register the <strong>px</strong> of width if you want to change the width of this row.<br /><br />If you registered the width, the row will be center aligned.', 'tcd-w'); ?></p>
		</div>

		<div class="form-field hide-if-one-column">
			<label><?php _e('Layout of column at mobile device.', 'tcd-w'); ?></label>
			<select name="pagebuilder[row][<?php echo esc_attr($args['index']); ?>][mobile_cells]">
				<?php
					$select_options = array(
						'clear' => __('Display vertically', 'tcd-w'),
						'float' => __('Keep in horizontal', 'tcd-w')
					);
					foreach($select_options as $key => $value) {
						$attr = '';
						if ($args['mobile_cells'] == $key) {
							$attr .= ' selected="selected"';
						}
						echo '<option value="'.esc_attr($key).'"'.$attr.'>'.esc_html($value).'</option>';
					}
				?>
			</select>
		</div>

		<div class="form-field form-field-checkbox">
			<label><?php _e('Splitting contents', 'tcd-w'); ?></label>
			<input type="hidden" name="pagebuilder[row][<?php echo esc_attr($args['index']); ?>][nextpage]" value="0" />
			<label class="checkbox"><input type="checkbox" name="pagebuilder[row][<?php echo esc_attr($args['index']); ?>][nextpage]" value="1" <?php if ($args['nextpage'] == 1) echo 'checked="checked"'; ?> /> <?php _e('Display this row at next page.', 'tcd-w'); ?></label>
		</div>
	</div>
</div>
<?php
}

/**
 * ウィジェット追加モーダル用出力
 */
function render_page_builder_add_widget_modal() {
	$widgets = get_page_builder_widgets();
?>
<div id="pb-add-widget-modal" class="pb-modal pb-modal-add-widget">
	<div class="pb-overlay"></div>
	<div class="pb-title-bar">
		<h3 class="pb-title"><?php _e('Select the content', 'tcd-w'); ?></h3>
		<a class="pb-close"><span class="pb-dialog-icon"></span></a>
	</div>

	<div class="pb-toolbar">
		<div class="pb-status"></div>
		<div class="pb-buttons">
		</div>
	</div>

	<div class="pb-content">
		<div class="pb-select-widget">
<?php
	if ($widgets) {
		foreach($widgets as $widget) {
			$class = $widget['id'];
			if (!empty($widget['additional_class'])) {
				if (is_array($widget['additional_class'])) {
					$widget['additional_class'] = implode(' ', $widget['additional_class']);
				}
				$class .= ' '.$widget['additional_class'];
			}

			echo '			';
			echo '<a href="#'.esc_attr($widget['id']).'" class="'.esc_attr($class).'">';
			echo '<span class="pb-icon dashicons dashicons-admin-generic"></span>';
			echo '<h3>'.esc_html($widget['title']).'</h3>';
			if (!empty($widget['description']))
			echo '<span class="pb-description">'.esc_html($widget['description']).'</span>';
			echo '</a>';
			echo "\n";
		}
	}
?>
		</div>
	</div>
</div>
<?php
}

/**
 * ウィジェット追加・編集モーダル用出力
 */
function render_page_builder_edit_widget_modal($args = array(), $values = array()) {
	$args = array_merge(
		array(
			'id' => '',
			'widget_id' => '',
			'widget_index' => 'widgetindex',
			'title' => '',
			'title_after' => __(' setting', 'tcd-w'),
			'form' => '',
			'form_rightbar' => '',
			'class' => 'pb-modal-edit-widget',
			'primary_button_label' => __('Done', 'tcd-w'),
			'attribute' => '',
			'values' => array()
		),
		(array) $args
	);

	if (is_array($args['class'])) {
		$args['class'] = implode(' ', $args['class']);
	}

	if ($args['widget_id']) {
		$args['class'] .= ' '.$args['widget_id'];
	}

	// 右サイドバーを表示するか
	$has_rightbar = false;
	if ($args['form_rightbar'] && function_exists($args['form_rightbar'])) {
		$args['class'] .= ' pb-has-right-sidebar';
		$has_rightbar = true;
	}

	// valuesにwidget_index代入
	$values['widget_index'] = $args['widget_index'];

?>

<div id="<?php echo esc_attr($args['id']); ?>" class="pb-modal <?php echo esc_attr($args['class']); ?>" <?php if ($args['attribute']) echo $args['attribute']; ?> data-title="<?php echo esc_attr($args['title']); ?>" data-widget-id="<?php echo esc_attr($args['widget_id']); ?>">
	<div class="pb-overlay"></div>
	<div class="pb-title-bar">
		<h3 class="pb-title"><?php echo esc_html($args['title'].$args['title_after']); ?></h3>
		<a class="pb-close"><span class="pb-dialog-icon"></span></a>
	</div>

	<div class="pb-toolbar">
		<div class="pb-status"></div>
		<div class="pb-buttons">
			<div class="action-buttons">
				<a class="pb-delete" data-confirm="<?php _e('Do you want to delete this content?', 'tcd-w'); ?>"><?php _e('Delete', 'tcd-w'); ?></a>
				<a class="pb-widget-clone"><?php _e('Clone', 'tcd-w'); ?></a>
			</div>

			<input type="button" class="pb-apply button-primary" value="<?php echo esc_attr($args['primary_button_label']); ?>" />
		</div>
	</div>

	<div class="pb-content">
		<?php
			if ($args['form'] && function_exists($args['form'])) {
				call_user_func($args['form'], $values);
			}
		?>
	</div>

<?php if ($has_rightbar) { ?>
	<div class="pb-sidebar pb-right-sidebar">
		<?php call_user_func($args['form_rightbar'], $values); ?>
	</div>
<?php } ?>

	<input type="hidden" name="pagebuilder[widget][<?php echo esc_attr($args['widget_index']); ?>][widget_id]" value="<?php echo esc_attr($args['widget_id']); ?>" />
</div>

<?php
}


/**
 * メタボックス保存
 */
function save_page_builder_metabox($post_id) {
	// verify nonce
	if (!isset($_POST['page_builder_metabox_nonce']) || !wp_verify_nonce($_POST['page_builder_metabox_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check post_type
	if (empty($_POST['post_type']) || !in_array($_POST['post_type'], get_page_builder_post_types())) {
		return $post_id;
	}

	// check permissions
	if ($_POST['post_type'] == 'page') {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}

	// ページビルダーフラグ
	if (isset($_POST['use_page_builder'])) {
		update_post_meta($post_id, 'use_page_builder', $_POST['use_page_builder']);
	}

	// ページビルダーデータ
	if (isset($_POST['pagebuilder'])) {
		$data = $_POST['pagebuilder'];

		// 行クローン用を削除
		if (isset($data['row']['rowindex'])) {
			unset($data['row']['rowindex']);
		}
		if (isset($data['row']['indexes'])) {
			$key = array_search('rowindex', $data['row']['indexes']);
			if ($key !== false) {
				unset($data['row']['indexes'][$key]);
			}
		}

		// 行のセル幅のカンマ区切りを配列に変換
		if (!empty($data['row']) && is_array($data['row'])) {
			foreach($data['row'] as $key => $value) {
				if ($key == 'indexes' || !is_numeric($key)) continue;

				if (!empty($value['cells_width'])) {
					if (is_string($value['cells_width'])) {
						$value['cells_width'] = explode(',', $value['cells_width']);
					} else {
						$value['cells_width'] = (array) $value['cells_width'];
					}
					$value['cells_width'] = array_filter($value['cells_width'], 'strlen');
					$data['row'][$key] = $value;
				}
			}
		}

		// セルのウィジェットIDのカンマ区切りを配列に変換
		if (!empty($data['cell']) && is_array($data['cell'])) {
			foreach($data['cell'] as $key => $value) {
				if (is_string($value)) {
					$value = explode(',', $value);
				} else {
					$value = (array) $value;
				}
				$data['cell'][$key] = array_filter($value, 'strlen');
			}
		}

		// ウィジェット
		if (!empty($data['widget']) && is_array($data['widget'])) {

			foreach($data['widget'] as $key => $value) {
				// クローン用は削除
				if (strpos($key, 'widgetindex') !== false) {
					unset($data['widget'][$key]);
					continue;
				}

				// ウィジェットIDが無ければ次へ
				if (empty($value['widget_id'])) continue;
				$widget_id = $value['widget_id'];

				// ウィジェットIDでウィジェット取得
				$widget = get_page_builder_widget($widget_id);

				// ウィジェット保存関数
				if (!empty($widget['save']) && function_exists($widget['save'])) {
					$value = call_user_func($widget['save'], $value, $key, $widget);
				}

				// ウィジェットフィルター
				$value = apply_filters('save_pagebuilder-'.$widget_id, $value, $key);

				$data['widget'][$key] = $value;
			}

		}

		// 全体フィルター適用
		$data = apply_filters('save_pagebuilder', $data);

		// メタ保存
		update_post_meta($post_id, 'page_builder', $data);
	}
}
add_action('save_post', 'save_page_builder_metabox');


/**
 * フロント用 ページビルダー対象か
 */
function is_page_builder($post_id = null) {
	if (!$post_id) $post_id = get_the_ID();
	if (!$post_id) return false;

	$post = get_post($post_id);

	// パスワード保護
	if (post_password_required($post)) {
		return false;
	}

	// ページビルダー対象
	if (!empty($post->post_type) && in_array($post->post_type, get_page_builder_post_types())) {
		return true;
	}

	return false;
}

/**
 * フロント用 ページビルダーHTML
 */
function render_page_builder_content($post_id = null, $echo = false) {
	if (!$post_id) $post_id = get_the_ID();
	if (!$post_id) return false;

	// ページビルダーフラグ
	if (!get_post_meta($post_id, 'use_page_builder', true)) return false;

	// ページ分割用グローバル変数
	global $page, $numpages, $multipage, $more;

	// ページ分割用グローバル変数初期化
	$page = 1;
	$numpages = 1;
	$multipage = 0;

	// 出力変数
	$output = '';
	$sep = ' ';

	// ページビルダーデータ
	$data = get_post_meta($post_id, 'page_builder', true);
	if (empty($data)) $data = array();

	// 行ループ
	if (!empty($data['row']['indexes'])) {

		// 表示行番号 $row_indexとは異なるので注意
		$row_num = 0;

		foreach($data['row']['indexes'] as $row_index) {
			// セル幅データが無ければ次の行へ
			if (empty($data['row'][$row_index]['cells_width'])) continue;

			$cells_width = $data['row'][$row_index]['cells_width'];
			if (is_string($cells_width)) {
				$cells_width = explode(',', $cells_width);
				$cells_width = array_filter($cells_width, 'strlen');
			}
			if (empty($cells_width)) continue;

			$row_num++;

			// ページ分割 1行目の場合は無視
			if (!empty($data['row'][$row_index]['nextpage']) && $row_num > 1) {
				$output .= '<!--pbnextpage-->'."\n";

				// マルチページフラグ デフォルト:0
				$multipage = 1;

				// 全ページ数 デフォルト:1
				$numpages++;

				// 続きを読むフラグ デフォルト:0
				$more = 1;
			}

			// 行div
			$output .= str_repeat($sep, 1).'<div class="tcd-pb-row row'.$row_num.' clearfix">'."\n";
			// カラム番号
			$cell_index = 0;

			// カラムループ
			foreach($cells_width as $cell_width) {
				$cell_index++;

				// カラムdiv
				$output .= str_repeat($sep, 2).'<div class="tcd-pb-col col'.$cell_index.'">'."\n";

				// カラム内のウィジェットインデックスデータ
				if (!empty($data['cell'][$row_index.'-'.$cell_index])) {
					$widget_indexes = $data['cell'][$row_index.'-'.$cell_index];

					// ウィジェット番号 $widget_indexとは異なるので注意
					$widget_num = 0;

					// カラム内のウィジェットループ
					foreach($widget_indexes as $widget_index) {
						// ウィジェットIDが無ければ次へ
						if (empty($data['widget'][$widget_index]['widget_id'])) continue;

						$widget_num++;
						$widget_id = $data['widget'][$widget_index]['widget_id'];
						$widget = get_page_builder_widget($widget_id);
						$widget_value = $data['widget'][$widget_index];

						if (!empty($widget['title'])) {
							// ウィジェットの出力関数
							if (!empty($widget['display']) && function_exists($widget['display'])) {
								// ウィジェットdiv
								$output .= str_repeat($sep, 3).'<div class="tcd-pb-widget widget'.$widget_num.' '.$widget_id.'">'."\n";
								// バッファリング
								ob_start();
								call_user_func($widget['display'], $widget_value, $widget_index, $widget);
								$output .= ob_get_clean();

								$output .= str_repeat($sep, 3).'</div>'."\n"; // .tcd-pb-widget
							}
						}
					}
				} else {
					// ウィジェットなし
					$output .= str_repeat($sep, 3).'&nbsp;'."\n";
				}

				$output .= str_repeat($sep, 2).'</div>'."\n"; // .tcd-pb-col
			}

			$output .= str_repeat($sep, 1).'</div>'."\n"; // .tcd-pb-row
		}
	}

	// ページ分割処理
	if ($multipage && $numpages > 1) {
		// リクエストページ番号
		$request_page = (int) get_query_var('page');
		if ($request_page < 1) {
			$request_page = 1;
		}

		$pages = explode('<!--pbnextpage-->', $output);

		// 正常なページ番号
		if (count($pages) >= $request_page) {
			$output = trim($pages[$request_page - 1]);

			// 表示するページ番号 デフォルト:1
			$page = $request_page;

		// 無効なページ番号の場合は1ページ目を表示
		} else {
			$output = trim($pages[0]);
			$page = 1;
		}
	}

	// 全体div
	if ($output) {
		$output = '<div id="tcd-pb-wrap">'."\n".$output.'</div>'."\n";
	}

	if ($echo) {
		echo $output;
	} else {
		return $output;
	}
}

/**
 * フロント用 ページ分割 ページ番号上書き処理
 */
function page_builder_nextpage_override($post_id = null) {
	if (!$post_id) $post_id = get_the_ID();
	if (!$post_id) return false;

	// ページビルダーフラグ
	if (!get_post_meta($post_id, 'use_page_builder', true)) return false;

	// ページ分割用グローバル変数
	global $page, $numpages, $multipage, $more;

	// ページ分割用グローバル変数初期化
	$page = 1;
	$numpages = 1;
	$multipage = 0;

	// ページビルダーデータ
	$data = get_post_meta($post_id, 'page_builder', true);
	if (empty($data)) $data = array();

	// 行ループ
	if (!empty($data['row']['indexes'])) {

		// 表示行番号 $row_indexとは異なるので注意
		$row_num = 0;

		foreach($data['row']['indexes'] as $row_index) {
			// セル幅データが無ければ次の行へ
			if (empty($data['row'][$row_index]['cells_width'])) continue;

			$cells_width = $data['row'][$row_index]['cells_width'];
			if (is_string($cells_width)) {
				$cells_width = explode(',', $cells_width);
				$cells_width = array_filter($cells_width, 'strlen');
			}
			if (empty($cells_width)) continue;

			$row_num++;

			// ページ分割 1行目の場合は無視
			if (!empty($data['row'][$row_index]['nextpage']) && $row_num > 1) {
				// マルチページフラグ デフォルト:0
				$multipage = 1;

				// 全ページ数 デフォルト:1
				if (!$numpages) {
					$numpages = 2;
				} else {
					$numpages++;
				}

				// 続きを読むフラグ デフォルト:0
				$more = 1;
			}
		}
	}

	// ページ分割処理
	if ($multipage && $numpages > 1) {
		// リクエストページ番号
		global $wp_query;
		$request_page = (int) get_query_var('page');
		if ($request_page < 1) {
			$request_page = 1;
		}

		// 正常なページ番号
		if ($numpages >= $request_page) {
			// 表示するページ番号 デフォルト:1
			$page = $request_page;

		// 無効なページ番号の場合は1ページ目を表示
		} else {
			$page = 1;
		}
	}
}

/**
 * フロント用 wpフィルター
 * タイトルタグにページ分割時のページ時番号を表示させる必要があるためwpアクションで先にHTML生成
 */
function page_builder_filter_wp($content) {
	if (is_singular() && is_page_builder()) {
		global $pagebuilder_content;
		$pagebuilder_content = render_page_builder_content();

		if ($pagebuilder_content) {
			add_action('the_post', 'page_builder_action_the_post', 10, 2);
			add_filter('the_content', 'page_builder_filter_the_content', 8);
		}
	}
}
add_filter('wp', 'page_builder_filter_wp', 9);

/**
 * フロント用 the_postアクション
 */
function page_builder_action_the_post($post, $wp_query) {
	// ページ分割用 ページ番号上書き処理
	page_builder_nextpage_override($post->ID);
}

/**
 * フロント用 the_contentフィルター
 */
function page_builder_filter_the_content($content) {
	global $pagebuilder_content;

	if ($pagebuilder_content) {
		// ページ分割用 ページ番号上書き処理
		page_builder_nextpage_override();

		// wpautopを外してthe_contentの最後に戻す
		if (has_filter('the_content', 'wpautop')) {
			remove_filter('the_content', 'wpautop');
			add_filter('the_content', 'page_builder_filter_the_content_after', 999);
		}

		return $pagebuilder_content;
	}

	return $content;
}
function page_builder_filter_the_content_after($content) {
	add_filter('the_content', 'wpautop');
	return $content;
}

/**
 * フロント用 動的css
 */
function page_builder_css_wp_head() {
	if (!is_singular() || !is_page_builder()) return;

	$post_id = get_the_ID();

	// ページビルダーフラグ
	if (!get_post_meta($post_id, 'use_page_builder', true)) return;

	// ページビルダーデータ
	$data = get_post_meta($post_id, 'page_builder', true);
	if (empty($data)) return;

	// 行データなし
	if (empty($data['row']['indexes'])) return;

?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/pagebuilder/assets/css/pagebuilder.css?ver=<?php echo PAGE_BUILDER_VERSION; ?>">
<style type="text/css">
<?php
	// 表示行番号 $row_indexとは異なるので注意
	$row_num = 0;

	// 行ループ
	foreach($data['row']['indexes'] as $row_index) {
		// セル幅データが無ければ次の行へ
		if (empty($data['row'][$row_index]['cells_width'])) continue;

		$cells_width = $data['row'][$row_index]['cells_width'];
		if (is_string($cells_width)) {
			$cells_width = explode(',', $cells_width);
			$cells_width = array_filter($cells_width, 'strlen');
		}
		if (empty($cells_width)) continue;

		$row = $data['row'][$row_index];
		$row_num++;

		$css = array();
		$css_responsive = array();
		$row_background_color = '';
		$mobile_media_query = apply_filters('page_builder_mobile_media_query', 767);

		if (!empty($row['margin_bottom'])) {
			$row['margin_bottom'] = intval($row['margin_bottom']);
		}
		if (!empty($row['margin_bottom_mobile'])) {
			$row['margin_bottom_mobile'] = intval($row['margin_bottom_mobile']);
		}
		if (!empty($row['gutter'])) {
			$row['gutter'] = abs(intval($row['gutter']));
			$row['gutter_harf'] = floor($row['gutter'] * 50) / 100; // 小数点2桁切り捨て
		} else {
			$row['gutter'] = 0;
			$row['gutter_harf'] = 0;
		}
		if (!empty($row['gutter_mobile'])) {
			$row['gutter_mobile'] = abs(intval($row['gutter_mobile']));
			$row['gutter_mobile_harf'] = floor($row['gutter_mobile'] * 50) / 100; // 小数点2桁切り捨て
		} else {
			$row['gutter_mobile'] = 0;
			$row['gutter_mobile_harf'] = 0;
		}
		if (!empty($row['background_color'])) {
			// 旧カラーピッカー対策
			if (preg_match('/^[0-9a-f]{6}$/i', $row['background_color'])) {
				$row['background_color'] = '#'.$row['background_color'];
			}
			$row_background_color = 'background-color:'.$row['background_color'].'; ';
		}
		if (!empty($row['row_width'])) {
			$row['row_width'] = abs(intval($row['row_width']));
		}

		// 行css
		// 行幅指定あり 1カラム
		if (!empty($row['row_width']) && count($cells_width) == 1) {
			$css[0][] = '.tcd-pb-row.row'.$row_num.' { max-width:'.$row['row_width'].'px; margin-left:auto; margin-right:auto; margin-bottom:'.$row['margin_bottom'].'px; '.$row_background_color.'}';
			$css_responsive[$mobile_media_query][] = '.tcd-pb-row.row'.$row_num.' { width:initial; margin-bottom:'.$row['margin_bottom_mobile'].'px; }';

		// 行幅指定あり 2カラム～
		} elseif (!empty($row['row_width'])) {
			$css[0][] = '.tcd-pb-row.row'.$row_num.' { max-width:'.$row['row_width'].'px; margin-left:auto; margin-right:auto; margin-bottom:'.$row['margin_bottom'].'px; '.$row_background_color.'}';
			$css_responsive[$mobile_media_query][] = '.tcd-pb-row.row'.$row_num.' { width:initial; margin-left:-'.$row['gutter_mobile_harf'].'px; margin-right:-'.$row['gutter_mobile_harf'].'px; margin-bottom:'.$row['margin_bottom_mobile'].'px; '.$row_background_color.'}';

		// 行幅指定なし 1カラム
		} elseif (count($cells_width) == 1) {
			$css[0][] = '.tcd-pb-row.row'.$row_num.' { margin-bottom:'.$row['margin_bottom'].'px; '.$row_background_color.'}';
			$css_responsive[$mobile_media_query][] = '.tcd-pb-row.row'.$row_num.' { margin-bottom:'.$row['margin_bottom_mobile'].'px; }';

		// 行幅指定なし 2カラム～
		} else {
			$css[0][] = '.tcd-pb-row.row'.$row_num.' { margin-left:-'.$row['gutter_harf'].'px; margin-right:-'.$row['gutter_harf'].'px; margin-bottom:'.$row['margin_bottom'].'px; '.$row_background_color.'}';
			$css_responsive[$mobile_media_query][] = '.tcd-pb-row.row'.$row_num.' { margin-left:-'.$row['gutter_mobile_harf'].'px; margin-right:-'.$row['gutter_mobile_harf'].'px; margin-bottom:'.$row['margin_bottom_mobile'].'px; }';
		}

		// カラム番号
		$cell_index = 0;

		// カラムループ
		foreach($cells_width as $cell_width) {
			$cell_index++;

			// $cell_widthは1分率なのでパーセント化 小数点4桁切り捨て
			$cell_width = floor($cell_width * 100 * 10000) / 10000;

			// カラムcss
			// 1カラム
			if (count($cells_width) == 1) {
				$css[0][] = '.tcd-pb-row.row'.$row_num.' .tcd-pb-col.col'.$cell_index.' { width:100%; }';

			// 2カラム～
			} else {
				$css[0][] = '.tcd-pb-row.row'.$row_num.' .tcd-pb-col.col'.$cell_index.' { width:'.$cell_width.'%; padding-left:'.$row['gutter_harf'].'px; padding-right:'.$row['gutter_harf'].'px; }';

				$css_responsive[$mobile_media_query][] = '.tcd-pb-row.row'.$row_num.' .tcd-pb-col.col'.$cell_index.' { padding-left:'.$row['gutter_mobile_harf'].'px; padding-right:'.$row['gutter_mobile_harf'].'px; }';

				// スマートフォンで横並び解除
				if (!empty($row['mobile_cells']) && $row['mobile_cells'] == 'clear') {
					// 最終カラム
					if (count($cells_width) <= $cell_index) {
						$css_responsive[$mobile_media_query][] = '.tcd-pb-row.row'.$row_num.' .tcd-pb-col.col'.$cell_index.' { width:100%; float:none; }';
					} else {
						$css_responsive[$mobile_media_query][] = '.tcd-pb-row.row'.$row_num.' .tcd-pb-col.col'.$cell_index.' { width:100%; float:none; margin-bottom:'.$row['gutter_mobile'].'px; }';
					}
				}
			}

			// カラム内のウィジェットインデックスデータ
			if (!empty($data['cell'][$row_index.'-'.$cell_index])) {
				$widget_indexes = $data['cell'][$row_index.'-'.$cell_index];

				// ウィジェット番号 $widget_indexとは異なるので注意
				$widget_num = 0;

				// カラム内のウィジェットループ
				foreach($widget_indexes as $widget_index) {
					// ウィジェットIDが無ければ次へ
					if (empty($data['widget'][$widget_index]['widget_id'])) continue;

					$widget_num++;

					if (isset($data['widget'][$widget_index]['margin_bottom'])) {
						$css[10][] = '.tcd-pb-row.row'.$row_num.' .tcd-pb-col.col'.$cell_index.' .tcd-pb-widget.widget'.$widget_num.' { margin-bottom:'.$data['widget'][$widget_index]['margin_bottom'].'px; }';
					}
					if (isset($data['widget'][$widget_index]['margin_bottom_mobile'])) {
						$css_responsive[$mobile_media_query][] = '.tcd-pb-row.row'.$row_num.' .tcd-pb-col.col'.$cell_index.' .tcd-pb-widget.widget'.$widget_num.' { margin-bottom:'.$data['widget'][$widget_index]['margin_bottom_mobile'].'px; }';
					}
				}
			}
		}

		// css出力
		if ($css) {
			foreach($css as $key => $value) {
				if (is_array($value)) {
					echo implode("\n", array_filter($value, 'trim'))."\n";
				} elseif (is_string($value)) {
					echo trim($value)."\n";
				}
			}
		}

		// レスポンシブcss出力
		if ($css_responsive) {
			foreach($css_responsive as $key => $value) {
				if (is_int($key)) {
					echo "@media only screen and (max-width:{$key}px) {\n";
				} else {
					echo "@media only screen and ({$key}) {\n";
				}

				if (is_array($value)) {
					echo '  '.implode("\n  ", array_filter($value, 'trim'))."\n";
				} elseif (is_string($value)) {
					echo '  '.trim($value)."\n";
				}

				echo "}\n";
			}
		}
	}

	// 追加css出力アクション
	do_action('page_builder_css');
?>
</style>

<?php
	// 追加出力アクション
	do_action('page_builder_wp_head');
}
add_filter('wp_head', 'page_builder_css_wp_head', 11);



/************************************************************
 * ここから下、ウィジェットモジュール関連
 ************************************************************/

global $page_builder_widgets;

/**
 * ウィジェットモジュール登録
 */
function add_page_builder_widget($args = array()) {
	global $page_builder_widgets;
	if (!is_array($page_builder_widgets)) {
		$page_builder_widgets = array();
	}

	if (empty($args['id']) || empty($args['title'])) {
		return false;
	}

	$page_builder_widgets[] = $args;
	return true;
}

/**
 * ウィジェットモジュール削除
 */
function remove_page_builder_widget($widget_id) {
	global $page_builder_widgets;
	if (!is_array($page_builder_widgets)) {
		$page_builder_widgets = array();
		return false;
	}

	if ($page_builder_widgets) {
		foreach($page_builder_widgets as $key => $page_builder_widget) {
			if (isset($page_builder_widget['id']) && $page_builder_widget['id'] === $widget_id) {
				unset($page_builder_widgets[$key]);
				return true;
			}
		}
	}

	return false;
}

/**
 * ウィジェットモジュール取得
 * priorityでソートされた配列が返る
 */
function get_page_builder_widgets() {
	global $page_builder_widgets;
	if (!is_array($page_builder_widgets)) {
		$page_builder_widgets = array();
	}

	$pb_widgets = array();
	$pb_widgets_priority = array();
	$pb_widgets_other = array();

	if ($page_builder_widgets) {
		foreach($page_builder_widgets as $page_builder_widget) {
			if (isset($page_builder_widget['priority'])) {
				$pb_widgets_priority[$page_builder_widget['priority']][] = $page_builder_widget;
			} else {
				$pb_widgets_other[] = $page_builder_widget;
			}
		}

		if ($pb_widgets_priority) {
			ksort($pb_widgets_priority);
			foreach($pb_widgets_priority as $key => $value) {
				$pb_widgets = array_merge($pb_widgets, $value);
			}
		}

		if ($pb_widgets_other) {
			$pb_widgets = array_merge($pb_widgets, $pb_widgets_other);
		}
	}

	return apply_filters('get_page_builder_widgets', $pb_widgets);
}

/**
 * ウィジェットIDからウィジェットモジュール取得
 */
function get_page_builder_widget($widget_id) {
	global $page_builder_widgets;
	if (!is_array($page_builder_widgets)) {
		$page_builder_widgets = array();
	}

	if ($widget_id && $page_builder_widgets) {
		foreach($page_builder_widgets as $page_builder_widget) {
			if (isset($page_builder_widget['id']) && $page_builder_widget['id'] == $widget_id) {
				return $page_builder_widget;
			}
		}
	}

	return false;
}

/**
 * フロント用 ウィジェットが使用されているかどうか
 */
function page_builder_has_widget($widget_id, $post_id = null) {
	if (!$post_id) $post_id = get_the_ID();
	if (!$post_id) return false;

	// ページビルダーフラグ
	if (!get_post_meta($post_id, 'use_page_builder', true)) {
		return false;
	}

	// ページビルダーデータ
	$data = get_post_meta($post_id, 'page_builder', true);
	if (empty($data)) return false;

	if (!empty($data['widget']) && is_array($data['widget'])) {
		foreach($data['widget'] as $index => $widget) {
			if (isset($widget['widget_id']) && $widget['widget_id'] === $widget_id) {
				return true;
			}
		}
	}

	return false;
}

/**
 * フロント用 記事ID指定で使用しているウィジェット配列を左上から右下の行カラムの順で返す
 *
 * @param int    $post_id          Optional. 記事ID 未指定の場合は現在の記事
 * @param string $widget_id_filter Optional. $widget_idで絞り込みを行う場合に指定
 */
function get_page_builder_post_widgets($post_id = null, $widget_id_filter = null) {
	$post_widgets = array();

	if (!$post_id) $post_id = get_the_ID();
	if (!$post_id) return false;

	if (!is_page_builder($post_id)) return false;

	// ページビルダーフラグ
	if (!get_post_meta($post_id, 'use_page_builder', true)) return false;

	// ページビルダーデータ
	$data = get_post_meta($post_id, 'page_builder', true);
	if (empty($data)) return false;

	// 行ループ
	if (!empty($data['row']['indexes'])) {
		// 表示行番号 $row_indexとは異なるので注意
		$row_num = 0;

		foreach($data['row']['indexes'] as $row_index) {
			// セル幅データが無ければ次の行へ
			if (empty($data['row'][$row_index]['cells_width'])) continue;

			$cells_width = $data['row'][$row_index]['cells_width'];
			if (is_string($cells_width)) {
				$cells_width = explode(',', $cells_width);
				$cells_width = array_filter($cells_width, 'strlen');
			}
			if (empty($cells_width)) continue;

			$row_num++;

			// カラム番号
			$cell_index = 0;

			// カラムループ
			foreach($cells_width as $cell_width) {
				$cell_index++;

				// カラム内のウィジェットインデックスデータ
				if (!empty($data['cell'][$row_index.'-'.$cell_index])) {
					$widget_indexes = $data['cell'][$row_index.'-'.$cell_index];

					// ウィジェット番号 $widget_indexとは異なるので注意
					$widget_num = 0;

					// カラム内のウィジェットループ
					foreach($widget_indexes as $widget_index) {
						// ウィジェットIDが無ければ次へ
						if (empty($data['widget'][$widget_index]['widget_id'])) continue;

						$widget_num++;

						// ウィジェットID絞り込みがある場合、一致しなければ次へ
						if ($widget_id_filter && $widget_id_filter !== $data['widget'][$widget_index]['widget_id']) continue;

						$widget_id = $data['widget'][$widget_index]['widget_id'];
						$widget = get_page_builder_widget($widget_id);
						$widget_value = $data['widget'][$widget_index];

						if ($widget) {
							$post_widgets[] = array(
								'widget_index' => $widget_index,
								'widget_id' => $widget_id,
								'widget' => $widget,
								'widget_value' => $widget_value,
								'row_num' => $row_num,
								'col_num' => $cell_index,
								'widget_num' => $widget_num,
								'css_class' => '.tcd-pb-row.row'.$row_num.' .tcd-pb-col.col'.$cell_index.' .tcd-pb-widget.widget'.$widget_num
							);
						}
					}
				}
			}
		}
	}

	return $post_widgets;
}

/**
 * 引数フォルダの全ファイル読み込み
 */
function page_builder_modules_load($dir) {
	if (!file_exists($dir) || !is_dir($dir)) return false;

	if ($handle = opendir($dir)) {
		$file_list = array();
		while (false !== ($file_name = readdir($handle))) {
			// 除外項目
			if (substr($file_name, '-4') != '.php' || $file_name == 'index.php') continue;

			if (is_file($dir.'/'.$file_name)) {
				$file_list[] = $file_name;
			}
		}
		if ($file_list) {
			sort($file_list);
			foreach($file_list as $file_name) {
				require $dir.'/'.$file_name;
			}
		}
	}
}

/**
 * modulesフォルダの全ファイル読み込み
 * /modules/includesを先に読み込む
 */
page_builder_modules_load(dirname(__FILE__).'/modules/includes');
page_builder_modules_load(dirname(__FILE__).'/modules');
do_action('page_builder_modules_loaded');

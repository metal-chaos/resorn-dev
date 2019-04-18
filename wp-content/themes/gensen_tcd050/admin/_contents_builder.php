<?php

/**
 * コンテンツビルダー コンテンツ一覧取得
 */
function cb_get_contents() {
	global $dp_options;		// $dp_optionsは保存時にWPが使用するため使えない
	if ( ! $dp_options ) $dp_options = get_desing_plus_option();

	return array(
		'introduce' => array(
			'name' => 'introduce',
			'label' => __( 'Introduce contents', 'tcd-w' ),
			'default' => array(
				'cb_display' => 0,
				'cb_headline' => '',
				'cb_headline_color' => $dp_options['pickedcolor1'],
				'cb_headline_font_size' => '42',
				'cb_headline_font_size_mobile' => '20',
				'cb_desc' => '',
				'cb_desc_font_size' => '14',
				'cb_desc_font_size_mobile' => '12',
				'cb_order' => 'date'
			),
			'cb_order_options' => array(
				'date' => __('Date', 'tcd-w'),
				'random' => __('Random', 'tcd-w')
			)
		),
		'carousel' => array(
			'name' => 'carousel',
			'label' => __( 'Carousel slider', 'tcd-w' ),
			'default' => array(
				'cb_display' => 0,
				'cb_headline' => '',
				'cb_headline_color' => $dp_options['pickedcolor1'],
				'cb_headline_font_size' => '42',
				'cb_headline_font_size_mobile' => '20',
				'cb_desc' => '',
				'cb_desc_font_size' => 14,
				'cb_desc_font_size_mobile' => 12,
				'cb_post_type' => 'post',
				'cb_post_num' => 6,
				'cb_list_type' => 'recent_post',
				'cb_introduce_term' => '',
				'cb_background_color' => '#000000'
			),
			'cb_post_num_options' => array(
				3 => 3,
				6 => 6,
				9 => 9,
				12 => 12,
				15 => 15
			),
			'cb_post_type_options' => array(
				'post' => $dp_options['blog_breadcrumb_label'],
				'introduce' => $dp_options['introduce_label']
			),
			'cb_list_type_options' => array(
				'recent_post' => __('Recent post', 'tcd-w'),
				'recommend_post' => __('Recommend post1', 'tcd-w'),
				'recommend_post2' => __('Recommend post2', 'tcd-w')
			)
		),
		'category_list' => array(
			'name' => 'category_list',
			'label' => __( 'Category list', 'tcd-w' ),
			'default' => array(
				'cb_display' => 0,
				'cb_headline' => '',
				'cb_headline_color' => $dp_options['pickedcolor1'],
				'cb_headline_font_size' => 42,
				'cb_headline_font_size_mobile' => 20,
				'cb_desc' => '',
				'cb_desc_font_size' => 14,
				'cb_desc_font_size_mobile' => 12,
				'cb_categories' => array()
			)
		),
		'blog_list' => array(
			'name' => 'blog_list',
			'label' => __( 'Latest blog', 'tcd-w' ),
			'default' => array(
				'cb_display' => 0,
				'cb_headline' => '',
				'cb_headline_color' => $dp_options['pickedcolor1'],
				'cb_headline_font_size' => 42,
				'cb_headline_font_size_mobile' => 20,
				'cb_desc' => '',
				'cb_desc_font_size' => 14,
				'cb_desc_font_size_mobile' => 12,
				'cb_post_num' => 12,
				'cb_show_archive_link' => 0,
				'cb_archive_link_text' => __( 'Blog list', 'tcd-w' )
			),
			'cb_post_num_options' => array(
				4 => 4,
				8 => 8,
				12 => 12,
				16 => 16
			)
		),
		'wysiwyg' => array(
			'name' => 'wysiwyg',
			'label' => __( 'Free space', 'tcd-w' ),
			'default' => array(
				'cb_display' => 0,
				'cb_wysiwyg_editor' => ''
			)
		)
	);
}

/**
 * コンテンツビルダー js/css
 */
function cb_admin_scripts() {
	wp_enqueue_style( 'tcd-cb', get_template_directory_uri() . '/admin/css/contents_builder.css', array(), version_num() );
	wp_enqueue_script( 'tcd-cb', get_template_directory_uri() . '/admin/js/contents_builder.js', array( 'jquery-ui-sortable' ), version_num(), true);
	wp_enqueue_style( 'editor-buttons' );
}
add_action( 'admin_print_scripts-appearance_page_theme_options', 'cb_admin_scripts' );

/**
 * コンテンツビルダー入力設定
 */
function cb_inputs() {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_desing_plus_option();
?>
	<div class="theme_option_field cf">
		<h3 class="theme_option_headline"><?php _e( 'Contents Builder', 'tcd-w' ); ?></h3>
		<div class="theme_option_message"><?php echo __( '<p>You can build contents freely with this function.</p><p>FIRST STEP: Click Add content button.<br />SECOND STEP: Select content from dropdown menu to show on each column.</p><p>You can change row by dragging MOVE button and you can delete row by clicking DELETE button.</p>', 'tcd-w' ); ?></div>

		<div id="contents_builder_wrap">
			<div id="contents_builder" data-delete-confirm="<?php _e( 'Are you sure you want to delete this content?', 'tcd-w' ); ?>">
<?php
	if ( ! empty( $dp_options['contents_builder'] ) ) :
		foreach ( $dp_options['contents_builder'] as $key => $content ) :
			$cb_index = 'cb_' . $key;
?>
				<div class="cb_row">
					<ul class="cb_button cf">
						<li><span class="cb_move"><?php echo __( 'Move', 'tcd-w' ); ?></span></li>
						<li><span class="cb_delete"><?php echo __( 'Delete', 'tcd-w' ); ?></span></li>
					</ul>
					<div class="cb_column_area cf">
						<div class="cb_column">
							<input type="hidden" value="<?php echo $cb_index; ?>" class="cb_index" />
							<?php the_cb_content_select( $cb_index, $content['cb_content_select'] ); ?>
							<?php if ( ! empty( $content['cb_content_select'] ) ) the_cb_content_setting( $cb_index, $content['cb_content_select'], $content ); ?>
						</div>
					</div><!-- END .cb_column_area -->
				</div><!-- END .cb_row -->
<?php
		endforeach;
	endif;
?>
			</div><!-- END #contents_builder -->
			<div id="cb_add_row_buttton_area">
				<input type="button" value="<?php echo __( 'Add content', 'tcd-w' ); ?>" class="button-secondary add_row">
			</div>
			<p><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></p>
		</div><!-- END #contents_builder_wrap -->

<?php
	// コンテンツビルダー追加用 非表示
	$cb_index = 'cb_cloneindex';
?>
		<div id="contents_builder-clone" class="hidden">
			<div class="cb_row">
			     <ul class="cb_button cf">
					<li><span class="cb_move"><?php echo __( 'Move', 'tcd-w' ); ?></span></li>
					<li><span class="cb_delete"><?php echo __( 'Delete', 'tcd-w' ); ?></span></li>
				</ul>
				<div class="cb_column_area cf">
					<div class="cb_column">
						<input type="hidden" class="cb_index" value="cb_cloneindex" />
						<?php the_cb_content_select( $cb_index ); ?>
					</div>
				</div><!-- END .cb_column_area -->
			</div><!-- END .cb_row -->
<?php
	foreach ( cb_get_contents() as $key => $value ) :
		the_cb_content_setting( 'cb_cloneindex', $key );
	endforeach;
?>
		</div><!-- END #contents_builder-clone.hidden -->
	</div>
<?php
}


/**
 * コンテンツビルダー用 コンテンツ選択プルダウン
 */
function the_cb_content_select( $cb_index = 'cb_cloneindex', $selected = null ) {
	$cb_contents = cb_get_contents();

	if ( $selected && isset( $cb_contents[$selected] ) ) {
		$add_class = ' hidden';
	} else {
		$add_class = '';
	}

	$out = '<select name="dp_options[contents_builder][' . esc_attr( $cb_index ) . '][cb_content_select]" class="cb_content_select' . $add_class . '">';
	$out .= '<option value="">' . __( 'Choose the content', 'tcd-w' ) . '</option>';

	foreach ( $cb_contents as $key => $value ) {
		$attr = '';
		if ( $key == $selected ) {
			$attr = ' selected="selected"';
		}
		$out .= '<option value="' . esc_attr( $key ) . '"' . $attr . '>' . esc_html( $value['label'] ) . '</option>';
	}

	$out .= '</select>';

	echo $out;
}

/**
 * コンテンツビルダー用 コンテンツ設定
 */
function the_cb_content_setting( $cb_index = 'cb_cloneindex', $cb_content_select = null, $value = array() ) {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_desing_plus_option();

	$cb_contents = cb_get_contents();

	// 不明なコンテンツの場合は終了
	if ( ! $cb_content_select || ! isset( $cb_contents[$cb_content_select] ) ) return false;

	// コンテンツデフォルト値に入力値をマージ
	if ( isset( $cb_contents[$cb_content_select]['default'] ) ) {
		$value = array_merge( (array) $cb_contents[$cb_content_select]['default'], $value );
	}
?>
	<div class="cb_content_wrap cf cb_content-<?php echo esc_attr( $cb_content_select ); ?>">
<?php
	// 紹介コンテンツ
	if ( $cb_content_select == 'introduce' ) :
?>
		<h3 class="cb_content_headline"><?php _e( 'Introduce contents', 'tcd-w' ); ?><span></span><a href="#"><?php _e( 'Open', 'tcd-w' ); ?></a></h3>
		<div class="cb_content">
			<p><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_display]" type="checkbox" value="1" <?php checked( 1, $value['cb_display'] ); ?>><?php _e( 'Display this content at top page', 'tcd-w' ); ?></label></p>
			<?php if ( preg_match( '/^cb_\d+$/', $cb_index ) ) : ?>
			<div class="theme_option_message">
				<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
				<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" value="<?php echo $cb_index; ?>"></p>
			</div>
			<?php endif; ?>
			<h4 class="theme_option_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
			<textarea name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline]" class="large-text change_content_headline" rows="2"><?php echo esc_textarea( $value['cb_headline'] ); ?></textarea>
			<ul class="headline_option">
				<li>
					<input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_color]" value="<?php echo esc_attr( $value['cb_headline_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($cb_contents[$cb_content_select]['default']['cb_headline_color']); ?>">
				</li>
				<li></label><?php _e( 'Font size', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size]" value="<?php echo esc_attr( $value['cb_headline_font_size'] ); ?>" /><span>px</span></li>
				<li><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size_mobile]" value="<?php echo esc_attr( $value['cb_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
			</ul>
			<h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
			<textarea name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc]" class="large-text" rows="4"><?php echo esc_textarea( $value['cb_desc'] ); ?></textarea>
			<ul class="headline_option">
				<li><label><?php _e( 'Font size', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size]" value="<?php echo esc_attr( $value['cb_desc_font_size'] ); ?>" /><span>px</span></li>
				<li><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size_mobile]" value="<?php echo esc_attr( $value['cb_desc_font_size_mobile'] ); ?>" /><span>px</span></li>
			</ul>
			<h4 class="theme_option_headline2"><?php _e( 'Introduce post setting', 'tcd-w' ); ?></h4>
			<p><?php _e('Please check the box to display on the top page from the post edit screen.', 'tcd-w'); ?></p>

<?php
		if ( ! empty( $cb_contents[$cb_content_select]['cb_order_options'] ) ) :
?>
			<h4 class="theme_option_headline2"><?php _e( 'Display order', 'tcd-w' ); ?></h4>
			<ul>
<?php
			foreach ( $cb_contents[$cb_content_select]['cb_order_options'] as $k => $v ) :
				if ( $value['cb_order'] == $k ) {
					$checked = 'checked="checked"';
				} else {
					$checked = '';
				}
				echo '<li><label><input type="radio" name="dp_options[contents_builder][' . $cb_index . '][cb_order]" value="' . esc_attr( $k ) . '" ' . $checked . ' /> '. esc_html( $v ) . '</label></li>';
			endforeach;
?>
			</ul>
<?php
		endif;

	// カルーセルスライダー
	elseif ( $cb_content_select == 'carousel' ) :
?>
		<h3 class="cb_content_headline"><?php _e( 'Carousel slider', 'tcd-w' ); ?><span></span><a href="#"><?php _e( 'Open', 'tcd-w' ); ?></a></h3>
		<div class="cb_content">
			<p><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_display]" type="checkbox" value="1" <?php checked( 1, $value['cb_display'] ); ?>><?php _e( 'Display this content at top page', 'tcd-w' ); ?></label></p>
			<?php if ( preg_match( '/^cb_\d+$/', $cb_index ) ) : ?>
			<div class="theme_option_message">
				<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
				<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" value="<?php echo $cb_index; ?>"></p>
			</div>
			<?php endif; ?>
			<h4 class="theme_option_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
			<textarea name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline]" class="large-text change_content_headline" rows="2"><?php echo esc_textarea( $value['cb_headline'] ); ?></textarea>
			<ul class="headline_option">
				<li>
					<input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_color]" value="<?php echo esc_attr( $value['cb_headline_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($cb_contents[$cb_content_select]['default']['cb_headline_color']); ?>">
				</li>
				<li><label><?php _e( 'Font size', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size]" value="<?php echo esc_attr( $value['cb_headline_font_size'] ); ?>" /><span>px</span></li>
				<li><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size_mobile]" value="<?php echo esc_attr( $value['cb_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
			</ul>
			<h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
			<textarea name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc]" class="large-text" rows="4"><?php echo esc_textarea( $value['cb_desc'] ); ?></textarea>
			<ul class="headline_option">
				<li><label><?php _e( 'Font size', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size]" value="<?php echo esc_attr( $value['cb_desc_font_size'] ); ?>" /><span>px</span></li>
				<li><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size_mobile]" value="<?php echo esc_attr( $value['cb_desc_font_size_mobile'] ); ?>" /><span>px</span></li>
			</ul>

			<h4 class="theme_option_headline2"><?php _e( 'Post type', 'tcd-w' ); ?></h4>
			<ul class="cb_post_type-radios">
<?php
		foreach ( $cb_contents[$cb_content_select]['cb_post_type_options'] as $k => $v ) :
			if ( $value['cb_post_type'] == $k ) {
				$checked = 'checked="checked"';
			} else {
				$checked = '';
			}
			echo '<li><label><input type="radio" name="dp_options[contents_builder][' . $cb_index . '][cb_post_type]" value="' . esc_attr( $k ) . '" ' . $checked . ' /> '. esc_html( $v ) . '</label></li>';
		endforeach;
?>
			</ul>

<?php
		if ( ! empty( $cb_contents[$cb_content_select]['cb_list_type_options'] ) ) :
?>
			<div class="cb_post_type-content-post" <?php if ( $value['cb_post_type'] != 'post' ) echo 'style="display:none;"'; ?>>
				<h4 class="theme_option_headline2"><?php _e( 'Post type', 'tcd-w' ); ?></h4>
				<ul>
<?php
			foreach ( $cb_contents[$cb_content_select]['cb_list_type_options'] as $k => $v ) :
				if ( $value['cb_list_type'] == $k ) {
					$checked = 'checked="checked"';
				} else {
					$checked = '';
				}
				echo '<li><label><input type="radio" name="dp_options[contents_builder][' . $cb_index . '][cb_list_type]" value="' . esc_attr( $k ) . '" ' . $checked . ' /> '. esc_html( $v ) . '</label></li>';
			endforeach;
?>
				</ul>
				<p class="description"><?php _e('Recommended posts can be set from post edit screen / quick edit.', 'tcd-w'); ?></p>
			</div>
<?php
		endif;
?>
			<div class="cb_post_type-content-introduce" <?php if ( $value['cb_post_type'] != 'introduce' ) echo 'style="display:none;"'; ?>>
				<h4 class="theme_option_headline2"><?php _e( 'Categories to display', 'tcd-w' ); ?></h4>
				<select name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_introduce_term]">
					<option value=""></option>
<?php
		$taxonomy_objects = get_object_taxonomies( 'introduce', 'objects' );
		if ( $taxonomy_objects ) :
			foreach ( $taxonomy_objects as $taxonomy ) :
				$dropdown = wp_dropdown_categories(array(
					'show_option_all'    => '',
					'hide_empty'         => 0,
					'selected'           => $value['cb_introduce_term'],
					'hierarchical'       => 1,
					'class'              => '',
					'taxonomy'           => $taxonomy->name,
					'value_field'        => 'term_id',
					'echo'               => 0
				));
				$dropdown = preg_replace( '#</?select.*?>#', '', $dropdown );
				$dropdown = trim( $dropdown );

				if ($dropdown) :
					echo '<optgroup label="' . esc_attr( $taxonomy->label ) . '">' . "\n";
					echo $dropdown;
					echo '</optgroup>' . "\n";
				endif;
			endforeach;
		endif;
?>
				</select>
			</div>

<?php
		if ( ! empty( $cb_contents[$cb_content_select]['cb_post_num_options'] ) ) :
?>
			<h4 class="theme_option_headline2"><?php _e('Post number', 'tcd-w'); ?></h4>
			<select name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_post_num]">
<?php
			foreach ( $cb_contents[$cb_content_select]['cb_post_num_options'] as $k => $v ) :
				if ( $value['cb_post_num'] == $k ) {
					$selected = 'selected="selected"';
				} else {
					$selected = '';
				}
				echo '<option value="' . esc_attr( $k ) . '"' . $selected . '>'. esc_html( $v ) . '</option>';
			endforeach;
?>
			</select>
<?php
		endif;
?>
			<h4 class="theme_option_headline2"><?php _e('Background color', 'tcd-w'); ?></h4>
			<input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_background_color]" value="<?php echo esc_attr( $value['cb_background_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($cb_contents[$cb_content_select]['default']['cb_background_color']); ?>">

<?php
	// カテゴリーリスト
	elseif ( $cb_content_select == 'category_list' ) :
?>
		<h3 class="cb_content_headline"><?php _e( 'Category list', 'tcd-w' ); ?><span></span><a href="#"><?php _e( 'Open', 'tcd-w' ); ?></a></h3>
		<div class="cb_content">
			<p><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_display]" type="checkbox" value="1" <?php checked( 1, $value['cb_display'] ); ?>><?php _e( 'Display this content at top page', 'tcd-w' ); ?></label></p>
			<?php if ( preg_match( '/^cb_\d+$/', $cb_index ) ) : ?>
			<div class="theme_option_message">
				<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
				<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" value="<?php echo $cb_index; ?>"></p>
			</div>
			<?php endif; ?>
			<h4 class="theme_option_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
			<textarea name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline]" class="large-text change_content_headline" rows="2"><?php echo esc_textarea( $value['cb_headline'] ); ?></textarea>
			<ul class="headline_option">
				<li>
					<input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_color]" value="<?php echo esc_attr( $value['cb_headline_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($cb_contents[$cb_content_select]['default']['cb_headline_color']); ?>">
				</li>
				<li><label><?php _e( 'Font size', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size]" value="<?php echo esc_attr( $value['cb_headline_font_size'] ); ?>" /><span>px</span></li>
				<li><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size_mobile]" value="<?php echo esc_attr( $value['cb_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
			</ul>
			<h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
			<textarea name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc]" class="large-text" rows="4"><?php echo esc_textarea( $value['cb_desc'] ); ?></textarea>
			<ul class="headline_option">
				<li><label><?php _e( 'Font size', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size]" value="<?php echo esc_attr( $value['cb_desc_font_size'] ); ?>" /><span>px</span></li>
				<li><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size_mobile]" value="<?php echo esc_attr( $value['cb_desc_font_size_mobile'] ); ?>" /><span>px</span></li>
			</ul>

			<h4 class="theme_option_headline2"><?php _e( 'Categories to display', 'tcd-w' ); ?></h4>
			<div class="categorydiv">
<?php
			$cb_taxonomies = array();
			$cb_taxonomies['category'] = $dp_options['category_label'];
			if ( $dp_options['use_category2'] ) {
				$cb_taxonomies[$dp_options['category2_slug']] = $dp_options['category2_label'];
			}
			if ( $dp_options['use_category3'] ) {
				$cb_taxonomies[$dp_options['category3_slug']] = $dp_options['category3_label'];
			}
			if ( $dp_options['use_introduce_category1'] ) {
				$cb_taxonomies[$dp_options['introduce_category1_slug']] = $dp_options['introduce_category1_label'];
			}
			if ( $dp_options['use_introduce_category2'] ) {
				$cb_taxonomies[$dp_options['introduce_category2_slug']] = $dp_options['introduce_category2_label'];
			}
			if ( $dp_options['use_introduce_category3'] ) {
				$cb_taxonomies[$dp_options['introduce_category3_slug']] = $dp_options['introduce_category3_label'];
			}

			echo '<ul class="category-tabs">';

			$is_first = true;
			foreach ( $cb_taxonomies as $k => $v ) :
				if ( $is_first ) {
					$is_first = false;
					$li_attr = ' class="tabs"';
				} else {
					$li_attr = '';
				}
				echo '<li' . $li_attr . '><a href="#categories-' . $cb_index . '-' . esc_attr( $k ) . '">' . esc_html( $v ) . '</a></li>';
			endforeach;

			echo '</ul>' . "\n";

			$is_first = true;
			foreach ( $cb_taxonomies as $k => $v ) :
				if ( $is_first ) {
					$is_first = false;
					$panel_attr = '';
				} else {
					$panel_attr = ' style="display:none;"';
				}

				echo '<div id="categories-' . $cb_index . '-' . esc_attr( $k ) . '"' . $panel_attr . ' class="tabs-panel">' . "\n";
				echo '<ul class="categorychecklist">' . "\n";

				$wp_terms_checklist = wp_terms_checklist( 0, array(
					'descendants_and_self' => 0,
					'selected_cats' => (array) $value['cb_categories'],
					'popular_cats' => false,
					'walker' => null,
					'taxonomy' => $k,
					'checked_ontop' => false,
					'echo' => false
				) );

				// name属性置換
				if ( $k == 'category' ) {
					echo str_replace( ' name="post_category[]"', ' name="dp_options[contents_builder][' . $cb_index . '][cb_categories][]"', $wp_terms_checklist );
				} else {
					echo str_replace( ' name="tax_input[' . $k . '][]"', ' name="dp_options[contents_builder][' . $cb_index . '][cb_categories][]"', $wp_terms_checklist );
				}

				echo '</ul>' . "\n";
				echo '</div>' . "\n";
			endforeach;
?>
			</div>

<?php
	// 最新ブログ記事一覧
	elseif ( $cb_content_select == 'blog_list' ) :
?>
		<h3 class="cb_content_headline"><?php _e( 'Latest blog', 'tcd-w' ); ?><span></span><a href="#"><?php _e( 'Open', 'tcd-w' ); ?></a></h3>
		<div class="cb_content">
			<p><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_display]" type="checkbox" value="1" <?php checked( 1, $value['cb_display'] ); ?>><?php _e( 'Display this content at top page', 'tcd-w' ); ?></label></p>
			<?php if ( preg_match( '/^cb_\d+$/', $cb_index ) ) : ?>
			<div class="theme_option_message">
				<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
				<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" value="<?php echo $cb_index; ?>"></p>
			</div>
			<?php endif; ?>
			<h4 class="theme_option_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
			<textarea name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline]" class="large-text change_content_headline" rows="2"><?php echo esc_textarea( $value['cb_headline'] ); ?></textarea>
			<ul class="headline_option">
				<li>
					<input type="text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_color]" value="<?php echo esc_attr( $value['cb_headline_color'] ); ?>" class="c-color-picker" data-default-color="<?php echo esc_attr($cb_contents[$cb_content_select]['default']['cb_headline_color']); ?>">
				</li>
				<li><label><?php _e( 'Font size', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size]" value="<?php echo esc_attr( $value['cb_headline_font_size'] ); ?>" /><span>px</span></li>
				<li><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_headline_font_size_mobile]" value="<?php echo esc_attr( $value['cb_headline_font_size_mobile'] ); ?>" /><span>px</span></li>
			</ul>
			<h4 class="theme_option_headline2"><?php _e( 'Description', 'tcd-w' ); ?></h4>
			<textarea name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc]" class="large-text" rows="4"><?php echo esc_textarea( $value['cb_desc'] ); ?></textarea>
			<ul class="headline_option">
				<li><label><?php _e( 'Font size', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size]" value="<?php echo esc_attr( $value['cb_desc_font_size'] ); ?>" /><span>px</span></li>
				<li><label><?php _e( 'Font size for mobile', 'tcd-w' ); ?></label><input type="text" class="font_size hankaku" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_desc_font_size_mobile]" value="<?php echo esc_attr( $value['cb_desc_font_size_mobile'] ); ?>" /><span>px</span></li>
			</ul>

<?php
		if ( ! empty( $cb_contents[$cb_content_select]['cb_post_num_options'] ) ) :
?>
			<h4 class="theme_option_headline2"><?php _e('Post number', 'tcd-w'); ?></h4>
			<select name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_post_num]">
<?php
			foreach ( $cb_contents[$cb_content_select]['cb_post_num_options'] as $k => $v ) :
				if ( $value['cb_post_num'] == $k ) {
					$selected = 'selected="selected"';
				} else {
					$selected = '';
				}
				echo '<option value="' . esc_attr( $k ) . '"' . $selected . '>'. esc_html( $v ) . '</option>';
			endforeach;
?>
			</select>
<?php
		endif;
?>
			<h4 class="theme_option_headline2"><?php _e( 'Blog archives button', 'tcd-w' ); ?></h4>
			<p><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_show_archive_link]" type="checkbox" value="1" <?php checked( 1, $value['cb_show_archive_link'] ); ?>><?php _e( 'Display blog archive button', 'tcd-w' ); ?></label></p>
			<h5 class="theme_option_headline3"><?php _e( 'Blog archive button label', 'tcd-w' ); ?></h5>
			<input type="text" class="regular-text" name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_archive_link_text]" value="<?php echo esc_attr( $value['cb_archive_link_text'] ); ?>" />

<?php
	// フリーススペース
	elseif ( $cb_content_select == 'wysiwyg' ) :
?>
		<h3 class="cb_content_headline"><?php _e( 'WYSIWYG editor', 'tcd-w' ); ?><span></span><a href="#"><?php _e( 'Open', 'tcd-w' ); ?></a></h3>
		<div class="cb_content">
			<p><label><input name="dp_options[contents_builder][<?php echo $cb_index; ?>][cb_display]" type="checkbox" value="1" <?php checked( 1, $value['cb_display'] ); ?>><?php _e( 'Display this content at top page', 'tcd-w' ); ?></label></p>
			<?php if ( preg_match( '/^cb_\d+$/', $cb_index ) ) : ?>
			<div class="theme_option_message">
				<p><?php _e( 'To make it a link to jump to this content, set a href attribute to the ID below.', 'tcd-w' ); ?></p>
				<p><?php _e( 'ID:', 'tcd-w' ); ?> <input type="text" readonly="readonly" value="<?php echo $cb_index; ?>"></p>
			</div>
			<?php endif; ?>
			<?php wp_editor( $value['cb_wysiwyg_editor'], 'cb_wysiwyg_editor-' . $cb_index, array( 'textarea_name' => 'dp_options[contents_builder][' . $cb_index . '][cb_wysiwyg_editor]', 'textarea_rows' => 10, 'editor_class' => 'change_content_headline' ) ); ?>
<?php
	else :
?>
		<h3 class="cb_content_headline"><?php echo esc_html( $cb_content_select ); ?><a href="#"><?php _e('Open', 'tcd-w'); ?></a></h3>
		<div class="cb_content">
<?php
	endif;
?>
			<ul class="cb_content_button cf">
				<li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>"></li>
				<li><a href="#" class="button-ml close-content"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
			</ul>
		</div>
	</div><!-- END .cb_content_wrap -->
<?php
}

/**
 * コンテンツビルダー用 保存整形
 */
function cb_validate( $input = array() ) {
	$cb_data = array();

	if ( ! empty( $input['contents_builder'] ) ) {
		$cb_contents = cb_get_contents();

		foreach( $input['contents_builder'] as $key => $value ) {
			// クローン用はスルー
			if ( in_array( $key, array( 'cb_cloneindex', 'cb_cloneindex2' ) ) ) continue;

			// コンテンツデフォルト値に入力値をマージ
			if ( ! empty( $value['cb_content_select'] ) && isset( $cb_contents[$value['cb_content_select']]['default'] ) ) {
				$value = array_merge( (array) $cb_contents[$value['cb_content_select']]['default'], $value );
			}

			// 紹介コンテンツ
			if ( $value['cb_content_select'] == 'introduce' ) {
				$value['cb_display'] = ( $value['cb_display'] == 1 ) ? 1 : 0;
				$value['cb_headline'] = wp_filter_nohtml_kses( $value['cb_headline'] );
				$value['cb_headline_color'] = wp_filter_nohtml_kses( $value['cb_headline_color'] );
				$value['cb_headline_font_size'] = intval( $value['cb_headline_font_size'] );
				$value['cb_headline_font_size_mobile'] = intval( $value['cb_headline_font_size_mobile'] );
				$value['cb_desc'] = wp_filter_nohtml_kses( $value['cb_desc'] );
				$value['cb_desc_font_size'] = intval( $value['cb_desc_font_size'] );
				$value['cb_desc_font_size_mobile'] = intval( $value['cb_desc_font_size_mobile'] );

				if ( ! empty( $value['cb_order'] ) && ! isset( $cb_contents[$value['cb_content_select']]['cb_order_options'][$value['cb_order']] ) ) {
					$value['cb_order'] = null;
				}
				if ( empty( $value['cb_order'] ) && isset( $cb_contents[$value['cb_content_select']]['default']['cb_order'] ) ) {
					$value['cb_order'] = $cb_contents[$value['cb_content_select']]['default']['cb_order'];
				}

				foreach ( array( 'cb_headline_font_size', 'cb_headline_font_size_mobile', 'cb_desc_font_size', 'cb_desc_font_size_mobile' ) as $a ) {
					if ( $value[$a] <= 0 ) {
						if ( isset( $cb_contents[$value['cb_content_select']]['default'][$a] ) ) {
							$value[$a] = $cb_contents[$value['cb_content_select']]['default'][$a];
						} else {
							$value[$a] = '';
						}
					}
				}

			// カルーセルスライダー
			} elseif ( $value['cb_content_select'] == 'carousel' ) {
				$value['cb_display'] = ( $value['cb_display'] == 1 ) ? 1 : 0;
				$value['cb_headline'] = wp_filter_nohtml_kses( $value['cb_headline'] );
				$value['cb_headline_color'] = wp_filter_nohtml_kses( $value['cb_headline_color'] );
				$value['cb_headline_font_size'] = intval( $value['cb_headline_font_size'] );
				$value['cb_headline_font_size_mobile'] = intval( $value['cb_headline_font_size_mobile'] );
				$value['cb_desc'] = wp_filter_nohtml_kses( $value['cb_desc'] );
				$value['cb_desc_font_size'] = intval( $value['cb_desc_font_size'] );
				$value['cb_desc_font_size_mobile'] = intval( $value['cb_desc_font_size_mobile'] );
				$value['cb_background_color'] = wp_filter_nohtml_kses( $value['cb_background_color'] );

				$value['cb_post_num'] = intval( $value['cb_post_num'] );
				if ( ! empty( $value['cb_post_num'] ) && ! isset( $cb_contents[$value['cb_content_select']]['cb_post_num_options'][$value['cb_post_num']] ) ) {
					$value['cb_post_num'] = null;
				}
				if ( empty( $value['cb_post_num'] ) && isset( $cb_contents[$value['cb_content_select']]['default']['cb_post_num'] ) ) {
					$value['cb_post_num'] = $cb_contents[$value['cb_content_select']]['default']['cb_post_num'];
				}

				if ( ! empty( $value['cb_post_type'] ) && ! isset( $cb_contents[$value['cb_content_select']]['cb_post_type_options'][$value['cb_post_type']] ) ) {
					$value['cb_post_type'] = null;
				}
				if ( empty( $value['cb_post_type'] ) && isset( $cb_contents[$value['cb_content_select']]['default']['cb_post_type'] ) ) {
					$value['cb_post_type'] = $cb_contents[$value['cb_content_select']]['default']['cb_post_type'];
				}

				if ( ! empty( $value['cb_list_type'] ) && ! isset( $cb_contents[$value['cb_content_select']]['cb_list_type_options'][$value['cb_list_type']] ) ) {
					$value['cb_list_type'] = null;
				}
				if ( empty( $value['cb_list_type'] ) && isset( $cb_contents[$value['cb_content_select']]['default']['cb_list_type'] ) ) {
					$value['cb_list_type'] = $cb_contents[$value['cb_content_select']]['default']['cb_list_type'];
				}

				foreach ( array( 'cb_headline_font_size', 'cb_headline_font_size_mobile', 'cb_desc_font_size', 'cb_desc_font_size_mobile' ) as $a ) {
					if ( $value[$a] <= 0 ) {
						if ( isset( $cb_contents[$value['cb_content_select']]['default'][$a] ) ) {
							$value[$a] = $cb_contents[$value['cb_content_select']]['default'][$a];
						} else {
							$value[$a] = '';
						}
					}
				}

			// カテゴリーリスト
			} elseif ( $value['cb_content_select'] == 'category_list' ) {
				$value['cb_display'] = ( $value['cb_display'] == 1 ) ? 1 : 0;
				$value['cb_headline'] = wp_filter_nohtml_kses( $value['cb_headline'] );
				$value['cb_headline_color'] = wp_filter_nohtml_kses( $value['cb_headline_color'] );
				$value['cb_headline_font_size'] = intval( $value['cb_headline_font_size'] );
				$value['cb_headline_font_size_mobile'] = intval( $value['cb_headline_font_size_mobile'] );
				$value['cb_desc'] = wp_filter_nohtml_kses( $value['cb_desc'] );
				$value['cb_desc_font_size'] = intval( $value['cb_desc_font_size'] );
				$value['cb_desc_font_size_mobile'] = intval( $value['cb_desc_font_size_mobile'] );
				$value['cb_categories'] = (array) $value['cb_categories'];

				foreach ( array( 'cb_headline_font_size', 'cb_headline_font_size_mobile', 'cb_desc_font_size', 'cb_desc_font_size_mobile' ) as $a ) {
					if ( $value[$a] <= 0 ) {
						if ( isset( $cb_contents[$value['cb_content_select']]['default'][$a] ) ) {
							$value[$a] = $cb_contents[$value['cb_content_select']]['default'][$a];
						} else {
							$value[$a] = '';
						}
					}
				}

			// 最新ブログ記事一覧
			} elseif ( $value['cb_content_select'] == 'blog_list' ) {
				$value['cb_display'] = ( $value['cb_display'] == 1 ) ? 1 : 0;
				$value['cb_headline'] = wp_filter_nohtml_kses( $value['cb_headline'] );
				$value['cb_headline_color'] = wp_filter_nohtml_kses( $value['cb_headline_color'] );
				$value['cb_headline_font_size'] = intval( $value['cb_headline_font_size'] );
				$value['cb_headline_font_size_mobile'] = intval( $value['cb_headline_font_size_mobile'] );
				$value['cb_desc'] = wp_filter_nohtml_kses( $value['cb_desc'] );
				$value['cb_desc_font_size'] = intval( $value['cb_desc_font_size'] );
				$value['cb_desc_font_size_mobile'] = intval( $value['cb_desc_font_size_mobile'] );
				$value['cb_show_archive_link'] = ( $value['cb_show_archive_link'] == 1 ) ? 1 : 0;
				$value['cb_archive_link_text'] = wp_filter_nohtml_kses( $value['cb_archive_link_text'] );

				$value['cb_post_num'] = intval( $value['cb_post_num'] );
				if ( ! empty( $value['cb_post_num'] ) && ! isset( $cb_contents[$value['cb_content_select']]['cb_post_num_options'][$value['cb_post_num']] ) ) {
					$value['cb_post_num'] = null;
				}
				if ( empty( $value['cb_post_num'] ) && isset( $cb_contents[$value['cb_content_select']]['default']['cb_post_num'] ) ) {
					$value['cb_post_num'] = $cb_contents[$value['cb_content_select']]['default']['cb_post_num'];
				}

				foreach ( array( 'cb_headline_font_size', 'cb_headline_font_size_mobile', 'cb_desc_font_size', 'cb_desc_font_size_mobile' ) as $a ) {
					if ( $value[$a] <= 0 ) {
						if ( isset( $cb_contents[$value['cb_content_select']]['default'][$a] ) ) {
							$value[$a] = $cb_contents[$value['cb_content_select']]['default'][$a];
						} else {
							$value[$a] = '';
						}
					}
				}

			// フリースペース
			} elseif ( $value['cb_content_select'] == 'wysiwyg' ) {
				$value['cb_display'] = ( $value['cb_display'] == 1 ) ? 1 : 0;
			}

			$cb_data[] = $value;
		}

		$input['contents_builder'] = $cb_data;
	}

	return $input;
}

/**
 * クローン用のリッチエディター化処理をしないようにする
 * クローン後のリッチエディター化はjsで行う
 */
function cb_tiny_mce_before_init( $mceInit, $editor_id ) {
	if ( strpos( $editor_id, 'cb_cloneindex' ) !== false ) {
		$mceInit['wp_skip_init'] = true;
	}
	return $mceInit;
}
add_filter( 'tiny_mce_before_init', 'cb_tiny_mce_before_init', 10, 2 );

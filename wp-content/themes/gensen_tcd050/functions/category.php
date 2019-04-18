<?php

global $dp_options;
if ( ! $dp_options ) $dp_options = get_desing_plus_option();


// カテゴリー追加用入力欄を出力 -------------------------------------------------------
function category_add_extra_category_fields() {
?>
<div class="form-field category_image-wrap">
	<label for="category_image"><?php _e( 'Category image', 'tcd-w' ); ?></label>
	<p class="description"><?php _e( 'Display by category list of top page. Recommend image size. Width:150px, Height:150px', 'tcd-w' ); ?></p>
	<div class="image_box cf">
		<div class="cf cf_media_field hide-if-no-js">
			<input type="hidden" value="<?php if ( isset( $term_meta['image'] ) ) echo esc_attr( $term_meta['image'] ); ?>" id="category_image" name="term_meta[image]" class="cf_media_id">
			<div class="preview_field"><?php if ( isset( $term_meta['image'] ) ) echo wp_get_attachment_image( $term_meta['image'], 'thumbnail'); ?></div>
			<div class="button_area">
				<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
				<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! isset( $term_meta['image'] ) ) echo 'hidden'; ?>">
			</div>
		</div>
	</div>
</div>
<?php
}
add_action( 'category_add_form_fields', 'category_add_extra_category_fields' );

// カテゴリー編集用入力欄を出力 -------------------------------------------------------
function category_edit_extra_category_fields( $tag ) {
	$term_meta = get_option( 'taxonomy_' . $tag->term_id, array() );
?>
<tr class="form-field">
	<th><label for="category_image"><?php _e( 'Category image', 'tcd-w' ); ?></label></th>
	<td>
		<p class="description"><?php _e( 'Display by category list of top page. Recommend image size. Width:150px, Height:150px', 'tcd-w' ); ?></p>
		<div class="image_box cf">
			<div class="cf cf_media_field hide-if-no-js">
				<input type="hidden" value="<?php if ( isset( $term_meta['image'] ) ) echo esc_attr( $term_meta['image'] ); ?>" id="category_image" name="term_meta[image]" class="cf_media_id">
				<div class="preview_field"><?php if ( isset( $term_meta['image'] ) ) echo wp_get_attachment_image( $term_meta['image'], 'medium'); ?></div>
				<div class="button_area">
					<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
					<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! isset( $term_meta['image'] ) ) echo 'hidden'; ?>">
				</div>
			</div>
		</div>
	</td>
</tr>
<?php
}
add_action( 'category_edit_form_fields', 'category_edit_extra_category_fields' );


// 紹介カテゴリー追加用入力欄を出力 -------------------------------------------------------
function introduce_category_add_extra_category_fields() {
?>
<div class="form-field category_image-wrap">
	<label for="category_image"><?php _e( 'Category image', 'tcd-w' ); ?></label>
	<p class="description"><?php _e( 'Recommend image size. Width:1450px, Height:440px', 'tcd-w' ); ?></p>
	<div class="image_box cf">
		<div class="cf cf_media_field hide-if-no-js">
			<input type="hidden" value="<?php if ( isset( $term_meta['image'] ) ) echo esc_attr( $term_meta['image'] ); ?>" id="category_image" name="term_meta[image]" class="cf_media_id">
			<div class="preview_field"><?php if ( isset( $term_meta['image'] ) ) echo wp_get_attachment_image( $term_meta['image'], 'medium'); ?></div>
			<div class="button_area">
				<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
				<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! isset( $term_meta['image'] ) ) echo 'hidden'; ?>">
			</div>
		</div>
	</div>
</div>
<div class="form-field category_catch-wrap">
	<label for="category_catch"><?php _e( 'Catchcopy', 'tcd-w' ); ?></label>
	<input type="text" id="category_catch" name="term_meta[catch]" value="" />
</div>
<?php
}

// 紹介カテゴリー編集用入力欄を出力 -------------------------------------------------------
function introduce_category_edit_extra_category_fields( $tag ) {
	$term_meta = get_option( 'taxonomy_' . $tag->term_id, array() );
	$term_meta = array_merge( array(
		'image' => '',
		'catch' => '',
		'catch_bg' => '#49240d',
		'catch_bg_opacity' => '0.7',
		'archive_text' => array()
	), $term_meta );
?>
<tr class="form-field">
	<th><label for="category_image"><?php _e( 'Category image', 'tcd-w' ); ?></label></th>
	<td>
		<p class="description"><?php _e( 'Recommend image size. Width:1450px, Height:440px', 'tcd-w' ); ?></p>
		<div class="image_box cf">
			<div class="cf cf_media_field hide-if-no-js">
				<input type="hidden" value="<?php if ( isset( $term_meta['image'] ) ) echo esc_attr( $term_meta['image'] ); ?>" id="category_image" name="term_meta[image]" class="cf_media_id">
				<div class="preview_field"><?php if ( isset( $term_meta['image'] ) ) echo wp_get_attachment_image( $term_meta['image'], 'medium'); ?></div>
				<div class="button_area">
					<input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
					<input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! isset( $term_meta['image'] ) ) echo 'hidden'; ?>">
				</div>
			</div>
		</div>
	</td>
</tr>
<tr class="form-field">
	<th><label for="category_catch"><?php _e( 'Catchcopy', 'tcd-w' ); ?></label></th>
	<td><input type="text" id="category_catch" name="term_meta[catch]" value="<?php echo esc_attr( $term_meta['catch'] ); ?>" /></td>
</tr>
<tr class="form-field">
	<th><label for="category_catch_bg"><?php _e( 'Catchcopy background color', 'tcd-w' ); ?></label></th>
	<td><input type="text" id="category_catch_bg" name="term_meta[catch_bg]" value="<?php echo esc_attr( $term_meta['catch_bg'] ); ?>" class="c-color-picker" data-default-color="#49240d" />
	</td>
</tr>
<tr class="form-field">
	<th><label for="category_catch_bg_opacity"><?php _e( 'Catchcopy background color opacity', 'tcd-w' ); ?></label></th>
	<td>
		<input type="text" id="category_catch_bg_opacity" name="term_meta[catch_bg_opacity]" value="<?php echo esc_attr( $term_meta['catch_bg_opacity'] ); ?>" class="hankaku" style="width:4em;" />
		<p class="description"><?php _e('Please set the opacity. (0 - 1.0, e.g. 0.7)', 'tcd-w'); ?></p>
	</td>
</tr>
<tr class="form-field">
	<th><label for="category_catch_bg_opacity"><?php _e( 'Archive page text', 'tcd-w' ); ?></label></th>
	<td>
		<input type="hidden" name="term_meta[archive_text]" value="" />
		<div class="repeater-wrapper">
			<div class="repeater sortable" data-delete-confirm="<?php _e( 'Delete?', 'tcd-w' ); ?>">
<?php
	if ( $term_meta['archive_text'] ) :
		foreach ( $term_meta['archive_text'] as $key => $value ) :
			$value = array_merge(array('headline' => '', 'desc' => ''), (array) $value);
?>
				<div class="sub_box repeater-item repeater-item-<?php echo esc_attr( $key ); ?>">
					<input type="hidden" name="term_meta[archive_text][indexes][]" value="<?php echo esc_attr( $key ); ?>" />
					<h4 class="theme_option_subbox_headline"><?php echo esc_attr( $value['headline'] ); ?></h4>
					<div class="sub_box_content">
						<table class="table-repeater">
							<tr>
								<th><label for="term_meta[archive_text][<?php echo esc_attr( $key ); ?>][headline]"><?php _e( 'Headline', 'tcd-w' ); ?></label></th>
								<td><textarea id="term_meta[archive_text][<?php echo esc_attr( $key ); ?>][headline]" name="term_meta[archive_text][<?php echo esc_attr( $key ); ?>][headline]" cols="50" rows="2" class="large-text repeater-label"><?php echo esc_textarea( $value['headline'] ); ?></textarea></td>
							</tr>
							<tr>
								<th><label for="term_meta[archive_text][<?php echo esc_attr( $key ); ?>][desc]"><?php _e( 'Description', 'tcd-w' ); ?></label></th>
								<td><textarea id="term_meta[archive_text][<?php echo esc_attr( $key ); ?>][desc]" name="term_meta[archive_text][<?php echo esc_attr( $key ); ?>][desc]" cols="50" rows="4" class="large-text"><?php echo esc_textarea( $value['desc'] ); ?></textarea></td>
							</tr>
						</table>
						<p class="delete-row right-align"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a></p>
					</div>
				</div>
<?php
		endforeach;
	endif;

	$key = 'addindex';
	$value = array('headline' => '', 'desc' => '');
	ob_start();
?>
				<div class="sub_box repeater-item repeater-item-<?php echo $key; ?>">
					<input type="hidden" name="term_meta[archive_text][indexes][]" value="<?php echo esc_attr( $key ); ?>" />
					<h4 class="theme_option_subbox_headline"><?php _e( 'New item', 'tcd-w' ); ?></h4>
					<div class="sub_box_content">
						<table class="table-repeater">
							<tr>
								<th><label for="term_meta[archive_text][<?php echo esc_attr( $key ); ?>][headline]"><?php _e( 'Headline', 'tcd-w' ); ?></label></th>
								<td><textarea id="term_meta[archive_text][<?php echo esc_attr( $key ); ?>][headline]" name="term_meta[archive_text][<?php echo esc_attr( $key ); ?>][headline]" cols="50" rows="2" class="large-text repeater-label"><?php echo esc_textarea( $value['headline'] ); ?></textarea></td>
							</tr>
							<tr>
								<th><label for="term_meta[archive_text][<?php echo esc_attr( $key ); ?>][desc]"><?php _e( 'Description', 'tcd-w' ); ?></label></th>
								<td><textarea id="term_meta[archive_text][<?php echo esc_attr( $key ); ?>][desc]" name="term_meta[archive_text][<?php echo esc_attr( $key ); ?>][desc]" cols="50" rows="4" class="large-text"><?php echo esc_textarea( $value['desc'] ); ?></textarea></td>
							</tr>
						</table>
						<p class="delete-row right-align"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a></p>
					</div>
				</div>
<?php
	$clone = ob_get_clean();
?>
			</div>
			<a href="#" class="button button-secondary button-add-row" data-clone="<?php echo esc_attr( $clone ); ?>"><?php _e( 'Add item', 'tcd-w' ); ?></a>
			<p class="description"><?php _e( 'Please click "Add new item" and set display contents. You can change the order by dragging the added items.', 'tcd-w' ); ?></p>
		</div>
	</td>
</tr>

<?php
}


// データを保存 -------------------------------------------------------
function category_save_extra_category_fileds( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$term_meta = get_option( "taxonomy_{$term_id}", array() );
		foreach (array_keys( $_POST['term_meta'] ) as $key){
			if ($key == 'archive_text') continue;
			if (isset($_POST['term_meta'][$key])){
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}

		if ( isset( $_POST['term_meta']['archive_text'] ) ) {
			$term_meta['archive_text'] = array();
		}
		if ( isset( $_POST['term_meta']['archive_text']['indexes'] ) ) {
			foreach( $_POST['term_meta']['archive_text']['indexes'] as $key ) {
				$value = array();
				if ( isset( $_POST['term_meta']['archive_text'][$key]['headline'] ) ) {
					$value['headline'] = wp_filter_nohtml_kses( trim( $_POST['term_meta']['archive_text'][$key]['headline'] ) );
				} else {
					$value['headline'] = '';
				}
				if ( isset( $_POST['term_meta']['archive_text'][$key]['desc'] ) ) {
					$value['desc'] = wp_filter_nohtml_kses( trim( $_POST['term_meta']['archive_text'][$key]['desc'] ) );
				} else {
					$value['desc'] = '';
				}
				$term_meta['archive_text'][] = $value;
			}
		}

		update_option( "taxonomy_{$term_id}", $term_meta );
	}
}
add_action( 'created_category', 'category_save_extra_category_fileds' );
add_action( 'edited_category', 'category_save_extra_category_fileds' );

for ( $i = 2;  $i <= 3;  $i++) {
	if ( $dp_options['use_category'.$i] ) {
		add_action( $dp_options['category'.$i.'_slug'] . '_add_form_fields', 'category_add_extra_category_fields' );
		add_action( $dp_options['category'.$i.'_slug'] . '_edit_form_fields', 'category_edit_extra_category_fields' );
		add_action( 'created_' . $dp_options['category'.$i.'_slug'], 'category_save_extra_category_fileds' );
		add_action( 'edited_' . $dp_options['category'.$i.'_slug'], 'category_save_extra_category_fileds' );
	}
}

for ( $i = 1;  $i <= 3;  $i++) {
	if ( $dp_options['use_introduce_category' . $i] ) {
		if ( $dp_options['use_introduce_category' . $i . '_introduce_archive'] ) {
			add_action( $dp_options['introduce_category' . $i . '_slug'] . '_add_form_fields', 'introduce_category_add_extra_category_fields');
			add_action( $dp_options['introduce_category' . $i . '_slug'] . '_edit_form_fields', 'introduce_category_edit_extra_category_fields');
		} else {
			add_action( $dp_options['introduce_category' . $i . '_slug'] . '_add_form_fields', 'category_add_extra_category_fields');
			add_action( $dp_options['introduce_category' . $i . '_slug'] . '_edit_form_fields', 'category_edit_extra_category_fields');
		}
		add_action( 'created_' . $dp_options['introduce_category' . $i . '_slug'], 'category_save_extra_category_fileds' );
		add_action( 'edited_' . $dp_options['introduce_category' . $i . '_slug'], 'category_save_extra_category_fileds' );
	}
}

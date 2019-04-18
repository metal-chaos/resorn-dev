<?php

class tcdw_icon_menu_list_widget extends WP_Widget {

	private $icons = array();

	function __construct() {
		// icon list
		$this->icons = array(
			'none' => '',
			'spa' => 'e929',
			'crown' => 'e926',
			'users' => 'e91e',
			'add_circle' => 'e147',
			'marker2' => 'e8b4',
			'loyalty' => 'e89a',
			'notifications' => 'e7f4',
			'restaurant' => 'e56c',
			'smile' => 'e813',
			'work' => 'e8f9',
			'flag2' => 'e902',
			'clock' => 'e94e',
			'chat' => 'e0b7',
			'mode_edit' => 'e254',
			'favorite' => 'e87d',
			'star' => 'f005',
			'star-o' => 'f006',
			'tag' => 'f02b',
			'lightbulb' => 'f0eb',
			'live_help' => 'e0c6',
			'spinner' => 'f110',
			'cube' => 'f1b2',
			'check' => 'f00c',
			'search-plus' => 'f00e'
		);

		parent::__construct(
			'tcdw_icon_menu_list_widget',// ID
			__( 'Icon menu list (tcd ver)', 'tcd-w' ),
			array(
				'classname' => 'tcdw_icon_menu_list_widget',
				'description' => __('Displays banner list.', 'tcd-w')
			)
		);
	}

	function widget($args, $instance) {
		extract($args);

		if (empty($instance['icon_menus']) || !is_array($instance['icon_menus'])) return;

		$title = apply_filters('widget_title', $instance['title']);

		// Before widget //
		echo $before_widget;

		// Title of widget //
		if ($title) { echo $before_title . $title . $after_title; }

		echo '<ol class="clearfix">'."\n";

		foreach($instance['icon_menus'] as $repeater_key => $repeater_value) {
			if (empty($repeater_value['label']) && empty($repeater_value['url']) && empty($repeater_value['icon'])) continue;

			$li_class = array();
			if (isset($repeater_value['width']) && $repeater_value['width'] == 'half') {
				$li_class[] = 'width-half';
			} else {
				$li_class[] = 'width-full';
			}
			if (isset($repeater_value['icon']) && isset($this->icons[$repeater_value['icon']]) && $this->icons[$repeater_value['icon']]) {
				$li_class[] = 'has-menu-icon menu-icon-'.$repeater_value['icon'];
			}

			echo ' <li class="'.esc_attr(implode(' ', $li_class)).'">';
			echo '<a href="'.esc_attr($repeater_value['url']).'">'.esc_html($repeater_value['label']).'</a>';
			echo '</li>'."\n";
		}

		echo '</ol>'."\n";

		// After widget //
		echo $after_widget;
	}

	// Update Settings //
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['icon_menus'] = $new_instance['icon_menus'];
		return $instance;
	}

	// Widget Control Panel //
	function form($instance) {
		$defaults = array( 'title' => '', 'icon_menus' => array());
		$instance = wp_parse_args( (array) $instance, $defaults );
?>
<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tcd-w'); ?></label>
	<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" class="widefat" />
</p>

<div class="widget_repeater_wrapper">
	<div class="widget_repeater" data-delete-confirm="<?php _e( 'Delete?', 'tcd-w' ); ?>">
<?php
		foreach((array) $instance['icon_menus'] as $repeater_key => $repeater_value) {
			$this->render_repeater_row($repeater_key, $repeater_value);
		}
?>
	</div>
<?php
		ob_start();
		$this->render_repeater_row('repeater_addindex', array(), __( 'New item', 'tcd-w' ));
		$clone = ob_get_clean();
?>
	<p><a href="#" class="button button-secondary button-add-row" data-clone="<?php echo esc_attr( $clone ); ?>"><?php _e( 'Add item', 'tcd-w' ); ?></a></p>
</div>
<?php
	}

	// repeater row //
	function render_repeater_row($repeater_key, $repeater_value, $repeater_label = null) {
		$repeater_value = array_merge(
			array(
				'label' => '',
				'url' => '',
				'icon' => '',
				'width' => 'full'
			),
			(array) $repeater_value
		);
?>
		<div class="widget_repeater_row">
			<h4 class="tcd_toggle_widget_headline repeater_label"><?php
				if ($repeater_value['label']) {
					echo esc_html($repeater_value['label']);
				} else {
					echo esc_html($repeater_label);
				}
			?></h4>
			<div class="tcd_toggle_widget_box">
				<div class="tcd_toggle_widget_box_inner">
					<h5><label for="<?php echo $this->get_field_id('icon_menus['.$repeater_key.'][label]'); ?>"><?php _e('Link label:', 'tcd-w'); ?></label></h5>
					<input type="text" id="<?php echo $this->get_field_id('icon_menus['.$repeater_key.'][label]'); ?>" name="<?php echo $this->get_field_name('icon_menus['.$repeater_key.'][label]'); ?>" value="<?php echo esc_attr($repeater_value['label']); ?>" class="widefat relation_repeater_label" />
				</div>
				<div class="tcd_toggle_widget_box_inner">
					<h5><label for="<?php echo $this->get_field_id('icon_menus['.$repeater_key.'][url]'); ?>"><?php _e('Link url:', 'tcd-w'); ?></label></h5>
					<input type="text" id="<?php echo $this->get_field_id('icon_menus['.$repeater_key.'][url]'); ?>" name="<?php echo $this->get_field_name('icon_menus['.$repeater_key.'][url]'); ?>" value="<?php echo esc_attr($repeater_value['url']); ?>" class="widefat" />
				</div>
				<div class="tcd_toggle_widget_box_inner">
					<h5><label for="<?php echo $this->get_field_id('icon_menus['.$repeater_key.'][width]'); ?>"><?php _e('Display width:', 'tcd-w'); ?></label></h5>
					<label><input type="radio" id="<?php echo $this->get_field_id('icon_menus['.$repeater_key.'][width]'); ?>-full" name="<?php echo $this->get_field_name('icon_menus['.$repeater_key.'][width]'); ?>" value="full" <?php checked($repeater_value['width'], 'full'); ?> /><?php _e('Full width', 'tcd-w'); ?></label>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<label><input type="radio" id="<?php echo $this->get_field_id('icon_menus['.$repeater_key.'][width]'); ?>-half" name="<?php echo $this->get_field_name('icon_menus['.$repeater_key.'][width]'); ?>" value="half" <?php checked($repeater_value['width'], 'half'); ?> /><?php _e('Half width', 'tcd-w'); ?></label>
				</div>

				<div class="tcd_toggle_widget_box_inner">
					<h5><label for="<?php echo $this->get_field_id('icon_menus['.$repeater_key.'][icon]'); ?>"><?php _e('Link icon:', 'tcd-w'); ?></label></h5>
					<div class="input-radio-icons">
<?php
		foreach($this->icons as $icon_key => $icon_value) {
?>
					<label><input type="radio" id="<?php echo $this->get_field_id('icon_menus['.$repeater_key.'][icon]'); ?>-<?php echo esc_attr($icon_key); ?>" name="<?php echo $this->get_field_name('icon_menus['.$repeater_key.'][icon]'); ?>" value="<?php echo esc_attr($icon_key); ?>" class="radio-icon" <?php checked($repeater_value['icon'], $icon_key); ?> /><span><?php if ($icon_value) echo '&#x'.esc_html($icon_value).';'; ?></span></label>
<?php
		}
?>
					</div>
				</div>
				<div class="tcd_toggle_widget_box_inner">
					<a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a>
				</div>
			</div>
		</div>
<?php
	}

}// end class


// init the widget
add_action('widgets_init', create_function('', 'return register_widget("tcdw_icon_menu_list_widget");'));

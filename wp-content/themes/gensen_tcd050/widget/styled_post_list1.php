<?php

// Start class widget //
class styled_post_list1_widget extends WP_Widget {

	public $post_types;

	// Constructor //
	function __construct() {
		$this->post_types = array(
			'recent_post' => __('Recent post', 'tcd-w'),
			'recommend_post' => __('Recommend post1', 'tcd-w'),
			'recommend_post2' => __('Recommend post2', 'tcd-w')
		);

		parent::__construct(
			'styled_post_list1_widget',// ID
			__('Styled post list (tcd ver)', 'tcd-w'),
			array(
				'classname' => 'styled_post_list1_widget',
				'description' => __('Displays styled post list.', 'tcd-w')
			)
		);
	}

	// Widget output //
	function widget($args, $instance) {
		extract($args);

		$radios = '';
		foreach($this->post_types as $post_type => $value) {
			if (empty($instance[$post_type]['show'])) continue;
			if (!$radios) {
				$checked = ' checked="checked"';
			} else {
				$checked = '';
			}
			$radios .= '<input type="radio" id="'.esc_attr($widget_id).'-'.esc_attr($post_type).'" name="'.esc_attr($widget_id).'-tab-radio" class="tab-radio tab-radio-'.esc_attr($post_type).'"'.$checked.' />';
		}
		if (!$radios) return;

		// Before widget //
		echo $before_widget;

		echo $radios."\n";

		echo '<ol class="styled_post_list1_tabs">'."\n";
		foreach($this->post_types as $post_type => $value) {
			if (empty($instance[$post_type]['show'])) continue;
			$title = apply_filters('widget_title', $instance[$post_type]['title']);
			echo ' <li class="tab-label-'.esc_attr($post_type).'"><label for="'.esc_attr($widget_id).'-'.esc_attr($post_type).'">'.esc_html($title).'</label></li>'."\n";
		}
		echo '</ol>'."\n";

		foreach($this->post_types as $post_type => $value) {
			if (empty($instance[$post_type]['show'])) continue;
			$post_num = $instance[$post_type]['post_num'];
			$post_order = $instance[$post_type]['post_order'];

			if ($post_order=='date2') {
				$order = 'ASC';
			} else {
				$order = 'DESC';
			}
			if ($post_order=='date1' || $post_order=='date2') {
				$post_order = 'date';
			}

			if ($post_type == 'recent_post') {
				$args = array('post_type' => 'post', 'posts_per_page' => $post_num, 'ignore_sticky_posts' => 1, 'orderby' => $post_order, 'order' => $order);
			} else {
				$args = array('post_type' => 'post', 'posts_per_page' => $post_num, 'ignore_sticky_posts' => 1, 'orderby' => $post_order, 'order' => $order, 'meta_key' => $post_type, 'meta_value' => 'on');
			}

			$pickup_posts = new WP_Query($args);
?>
<ol class="styled_post_list1 tab-content-<?php echo esc_attr($post_type); ?>">
<?php
			if ($pickup_posts->have_posts()) {
				while ($pickup_posts->have_posts()) :
					$pickup_posts->the_post();
?>
 <li class="clearfix">
  <a href="<?php the_permalink() ?>">
   <div class="image">
    <?php
					if (has_post_thumbnail()) {
						the_post_thumbnail('size1');
					} else {
						echo '<img src="' . get_template_directory_uri() . '/img/common/no_image1.gif" alt="" />';
					}
	?>
   </div>
   <div class="info">
    <h4 class="title"><?php echo is_mobile() ? wp_trim_words( get_the_title(), 25, '...' ) : esc_html(mb_strimwidth(get_the_title(), 0, 64, '…')); ?></h4>
   <?php if (!empty($instance[$post_type]['show_date'])) { ?><p class="date"><?php the_time('Y.m.d'); ?></p><?php } ?>
   </div>
  </a>
 </li>
<?php
				endwhile;
				wp_reset_query();
			} else {
?>
 <li class="no_post"><?php _e('There is no registered post.', 'tcd-w');	?></li>
<?php
			}
?>
</ol>
<?php
		}

		// After widget //
		echo $after_widget;

	} // end function widget

	// Update Settings //
	function update($new_instance, $old_instance) {
		foreach($this->post_types as $post_type => $value) {
			if (!empty($new_instance[$post_type]['title'])) {
				$new_instance[$post_type]['title'] = strip_tags($new_instance[$post_type]['title']);
			}
		}
		return $new_instance;
	}

	// Widget Control Panel //
	function form($instance) {
		$_instance = $instance;
		foreach($this->post_types as $post_type => $value) {
			$post_type_defaults = array(
				'show' => '0',
				'title' => $value,
				'post_num' => '5',
				'post_order' => 'date1',
				'show_date' => '1'
			);
			if (isset($instance[$post_type])) {
				$instance[$post_type] = array_merge($post_type_defaults, $instance[$post_type]);
			} else {
				$instance[$post_type] = $post_type_defaults;
			}
		}
		if (!$_instance) {
			$instance['recent_post']['show'] = '1';
		}
?>

<div class="tcd_toggle_widget_box_wrap">
	<?php // widet title dummy ?>
	<input id="<?php echo $this->get_field_id('title'); ?>" type="hidden" value="" />

<?php	foreach($this->post_types as $post_type => $value) : ?>

	<h3 class="tcd_toggle_widget_headline"><?php echo $value; ?></h3>
	<div class="tcd_toggle_widget_box">
		<p style="margin-top:0;">
			<input id="<?php echo $this->get_field_id($post_type.'[show]'); ?>" name="<?php echo $this->get_field_name($post_type.'[show]'); ?>" type="checkbox" value="1" <?php checked('1', $instance[$post_type]['show']); ?> />
			<label for="<?php echo $this->get_field_id($post_type.'[show]'); ?>"><?php printf(__('%sを表示する', 'tcd-w'), $value); ?></label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id($post_type.'[title]'); ?>"><?php _e('Title:', 'tcd-w'); ?></label>
			<input id="<?php echo $this->get_field_id($post_type.'[title]'); ?>" name="<?php echo $this->get_field_name($post_type.'[title]'); ?>" type="text" value="<?php echo esc_attr($instance[$post_type]['title']); ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id($post_type.'[post_num]'); ?>"><?php _e('Number of post:', 'tcd-w'); ?></label>
			<select id="<?php echo $this->get_field_id($post_type.'[post_num]'); ?>" name="<?php echo $this->get_field_name($post_type.'[post_num]'); ?>" class="widefat">
				<option value="1" <?php selected('1', $instance[$post_type]['post_num']); ?>>1</option>
				<option value="2" <?php selected('2', $instance[$post_type]['post_num']); ?>>2</option>
				<option value="3" <?php selected('3', $instance[$post_type]['post_num']); ?>>3</option>
				<option value="4" <?php selected('4', $instance[$post_type]['post_num']); ?>>4</option>
				<option value="5" <?php selected('5', $instance[$post_type]['post_num']); ?>>5</option>
				<option value="6" <?php selected('6', $instance[$post_type]['post_num']); ?>>6</option>
				<option value="7" <?php selected('7', $instance[$post_type]['post_num']); ?>>7</option>
				<option value="8" <?php selected('8', $instance[$post_type]['post_num']); ?>>8</option>
				<option value="9" <?php selected('9', $instance[$post_type]['post_num']); ?>>9</option>
				<option value="10" <?php selected('10', $instance[$post_type]['post_num']); ?>>10</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id($post_type.'[post_order]'); ?>"><?php _e('Post order:', 'tcd-w'); ?></label>
			<select id="<?php echo $this->get_field_id($post_type.'[post_order]'); ?>" name="<?php echo $this->get_field_name($post_type.'[post_order]'); ?>" class="widefat">
				<option value="date1" <?php selected('date1', $instance[$post_type]['post_order']); ?>><?php _e('Date (DESC)', 'tcd-w'); ?></option>
				<option value="date2" <?php selected('date2', $instance[$post_type]['post_order']); ?>><?php _e('Date (ASC)', 'tcd-w'); ?></option>
				<option value="rand" <?php selected('rand', $instance[$post_type]['post_order']); ?>><?php _e('Random', 'tcd-w'); ?></option>
			</select>
		</p>
		<p>
			<input id="<?php echo $this->get_field_id($post_type.'[show_date]'); ?>" name="<?php echo $this->get_field_name($post_type.'[show_date]'); ?>" type="checkbox" value="1" <?php checked('1', $instance[$post_type]['show_date']); ?> />
			<label for="<?php echo $this->get_field_id($post_type.'[show_date]'); ?>"><?php _e('Display date', 'tcd-w'); ?></label>
		</p>
	</div>

<?php	endforeach; ?>

 </div>

<?php
	} // end function form
}

// End class widget
add_action('widgets_init', create_function('', 'return register_widget("styled_post_list1_widget");'));
?>

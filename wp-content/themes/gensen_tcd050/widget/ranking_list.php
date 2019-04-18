<?php

class tcdw_ranking_list_widget extends WP_Widget {

	private $max_ranking = 10;

	function __construct() {
		parent::__construct(
			'tcdw_ranking_list_widget',// ID
			__( 'Ranking list (tcd ver)', 'tcd-w' ),
			array(
				'classname' => 'tcdw_ranking_list_widget',
				'description' => __('Displays banner list.', 'tcd-w')
			)
		);
	}

	function widget($args, $instance) {
		global $dp_options;
		if ( ! $dp_options ) $dp_options = get_desing_plus_option();

		extract($args);

		$instance['rank_num'] = absint($instance['rank_num']);
		if (!$instance['rank_num']) return;

		$ranking_post_count = 0;
		for ($i = 1; $i <= $instance['rank_num']; $i++) {
			$instance['rank_id'.$i] = absint($instance['rank_id'.$i]);
			if ($instance['rank_id'.$i]) {
				$instance['rank_post'.$i] = get_post($instance['rank_id'.$i]);
				if (!empty($instance['rank_post'.$i]->post_status) && $instance['rank_post'.$i]->post_status = 'publish' && in_array($instance['rank_post'.$i]->post_type, array('post', 'page', $dp_options['news_slug'], $dp_options['introduce_slug']))) {
					$ranking_post_count++;
				} else {
					$instance['rank_post'.$i] = false;
				}
			}
		}
		if (!$ranking_post_count) return;

		$title = apply_filters('widget_title', $instance['title']);

		// Before widget //
		echo $before_widget;

		// Title of widget //
		if ($title) { echo $before_title . $title . $after_title; }
?>
<ol>
<?php
		$rank = 0;
		for ($i = 1; $i <= $instance['rank_num']; $i++) {
			if (empty($instance['rank_post'.$i])) continue;

			$rank++;
			$image = null;
			$image_id = get_post_thumbnail_id($instance['rank_id'.$i]);

			if ($image_id) {
				$image = wp_get_attachment_image_src($image_id, 'full');
			}
			if (!empty($image[0])) {
				$image_src = $image[0];
			} else {
				$image_src = get_template_directory_uri().'/img/common/no_image1.gif';
			}
?>
 <li class="clearfix">
  <a href="<?php echo get_permalink($instance['rank_id'.$i]); ?>">
   <div class="image">
    <?php
			if (has_post_thumbnail($instance['rank_id'.$i])) {
				echo get_the_post_thumbnail($instance['rank_id'.$i], 'size1');
			} else {
				echo '<img src="' . get_template_directory_uri() . '/img/common/no_image1.gif" alt="" />';
			}
	?>
   </div>
   <div class="info">
    <div class="rank rank-<?php echo esc_attr($rank); ?>" style="background:<?php echo esc_attr($instance['rank_color'.$i]); ?>"><?php printf(__('No.%s', 'tcd-w'), $rank); ?></div>
    <h4 class="title"><?php echo is_mobile() ? esc_html( wp_trim_words( $instance['rank_post'.$i]->post_title, 30, '...' ) ) : esc_html(mb_strimwidth($instance['rank_post'.$i]->post_title, 0, 76, '…')); ?></h4>
   </div>
  </a>
 </li>
<?php
		}
?>
</ol>
<?php
		// After widget //
		echo $after_widget;
	}

	// Update Settings //
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if (isset($new_instance['rank_num'])) {
			$instance['rank_num'] = absint($new_instance['rank_num']);
			for ($i = 1; $i <= $instance['rank_num']; $i++) {
				$instance['rank_id'.$i] = absint($new_instance['rank_id'.$i]);
				if (!$instance['rank_id'.$i]) {
					$instance['rank_id'.$i] = '';
				}

				$instance['rank_color'.$i] = strip_tags($new_instance['rank_color'.$i]);
				if (!$instance['rank_color'.$i]) {
					if ($i == 1) {
						$instance['rank_color'.$i] = '#8c0000';
					} elseif ($i == 2) {
						$instance['rank_color'.$i] = '#336601';
					} elseif ($i == 3) {
						$instance['rank_color'.$i] = '#d96d00';
					} else {
						$instance['rank_color'.$i] = '#aaaaaa';
					}
				}
			}
		}
		return $instance;
	}

	// Widget Control Panel //
	function form($instance) {
		$defaults = array('title' => '', 'rank_num' => 3);
		for ($i = 1; $i <= $this->max_ranking; $i++) {
			$defaults['rank_id'.$i] = '';
			if ($i == 1) {
				$defaults['rank_color'.$i] = '#8c0000';
			} elseif ($i == 2) {
				$defaults['rank_color'.$i] = '#336601';
			} elseif ($i == 3) {
				$defaults['rank_color'.$i] = '#d96d00';
			} else {
				$defaults['rank_color'.$i] = '#aaaaaa';
			}
		}
		$instance = wp_parse_args((array) $instance, $defaults);
		$instance['rank_num'] = absint($instance['rank_num']);
?>
<div class="tcdw_ranking_list_widget-inputs">
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tcd-w'); ?></label>
		<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" class="widefat" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('rank_num'); ?>"><?php _e('Number of ranks:', 'tcd-w'); ?></label>
		<select id="<?php echo $this->get_field_id('rank_num'); ?>" name="<?php echo $this->get_field_name('rank_num'); ?>" class="rank_num">
<?php
		for ($i = 1; $i <= $this->max_ranking; $i++) :
			if ($instance['rank_num'] == $i) {
				$selected = ' selected="selected"';
			} else {
				$selected = '';
			}
			echo '<option value="'.esc_attr($i).'"'.$selected.'>'.esc_html($i).'</option>';
		endfor;
?>
		</select>
	</p>
<?php	for ($i = 1; $i <= $instance['rank_num']; $i++) : ?>
	<p>
		<label for="<?php echo $this->get_field_id('rank_id'.$i); ?>"><?php printf(__('Post ID of the No.%d in the rankings:', 'tcd-w'), $i); ?></label>
		<input type="number" id="<?php echo $this->get_field_id('rank_id'.$i); ?>" name="<?php echo $this->get_field_name('rank_id'.$i); ?>" value="<?php echo esc_attr($instance['rank_id'.$i]); ?>" class="widefat" min="0" />
		<span style="display:inline-block; padding-top:0.5em;">
			<?php _e('Rank color', 'tcd-w'); ?>
			<input type="text" id="<?php echo $this->get_field_id('rank_color'.$i); ?>" name="<?php echo $this->get_field_name('rank_color'.$i); ?>" value="<?php echo esc_attr($instance['rank_color'.$i]); ?>"  class="c-color-picker" data-default-color="<?php echo esc_attr($defaults['rank_color'.$i]); ?>" />
		</span>
	</p>
<?php	endfor; ?>
</div>

<?php
		// 保存後にカラーピッカーを有効化
		if (defined('DOING_AJAX') && DOING_AJAX && isset($_POST['id_base']) && $_POST['id_base'] == 'tcdw_ranking_list_widget') :
?>
<script>
<?php		for ($i = 1; $i <= $instance['rank_num']; $i++) : ?>
jQuery('#<?php echo $this->get_field_id('rank_color'.$i); ?>').wpColorPicker();
<?php		endfor; ?>
</script>
<?php
		endif;
	}
}// end class


// init the widget
add_action('widgets_init', create_function('', 'return register_widget("tcdw_ranking_list_widget");'));

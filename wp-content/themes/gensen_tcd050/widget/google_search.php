<?php

 // Start class widget //
 class google_search extends WP_Widget {

 // Constructor //
 function __construct() {
   parent::__construct(
     'google_search',// ID
     __( 'Google Custom Search (tcd-w ver)', 'tcd-w' ),
     array(
       'classname' => 'google_search',
       'description' => __('Displays Google Custom Search form.', 'tcd-w')
     )
   );
 }

 // Extract Args //
 function widget($args, $instance) {
   extract( $args );
   $title = apply_filters('widget_title', $instance['title']);
   $google_search_id = $instance['google_search_id'];

   // Before widget //
   echo $before_widget;

   // Title of widget //
   if ( $title ) { echo $before_title . $title . $after_title; }

   // Widget output //

?>
<form action="http://www.google.com/cse" method="get" id="searchform" class="searchform">
<div>
 <input id="s" type="text" value="" name="q" />
 <input id="searchsubmit" type="submit" name="sa" value="&#xe915;" />
 <input type="hidden" name="cx" value="<?php echo $google_search_id; ?>" />
 <input type="hidden" name="ie" value="UTF-8" />
</div>
</form>
<?php

   // After widget //
   echo $after_widget;

} // end function widget


 // Update Settings //
 function update($new_instance, $old_instance) {
  $instance = $old_instance;
  $instance['title'] = strip_tags($new_instance['title']);
  $instance['google_search_id'] = $new_instance['google_search_id'];
  return $instance;
 }

 // Widget Control Panel //
 function form($instance) {
  $defaults = array( 'title' => __('Search', 'tcd-w'), 'google_search_id' => '');
  $instance = wp_parse_args( (array) $instance, $defaults );
?>
<p style="margin-bottom:5px;"><?php _e('If you wan\'t to use google custom search for your wordpress, enter your google custom search ID.<br /><a href="http://www.google.com/cse/" target="_blank">Read more about Google custom search page.</a>', 'tcd-w');  ?></p>
<p>
 <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tcd-w'); ?></label>
 <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('google_search'); ?>"><?php _e('Google custom search ID', 'tcd-w');  ?></label>
  <input class="widefat" id="<?php echo $this->get_field_id('google_search_id'); ?>" name="<?php echo $this->get_field_name('google_search_id'); ?>" type="text" value="<?php echo $instance['google_search_id']; ?>" />
</p>
<?php
 } // end function form
}

// End class widget
add_action('widgets_init', create_function('', 'return register_widget("google_search");'));
?>

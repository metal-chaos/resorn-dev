<?php

 // Start class widget //
 class tcdw_archive_list_widget extends WP_Widget {

 // Constructor //
 function __construct() {
   parent::__construct(
     'tcdw_archive_list_widget',// ID
     __( 'Archive list (tcd ver)', 'tcd-w' ),
     array(
       'classname' => 'tcdw_archive_list_widget',
       'description' => __('Displays designed archive dropdown menu.', 'tcd-w')
     )
   );
 }

 // Extract Args //
 function widget($args, $instance) {
   extract( $args );

   // Before widget //
   echo $before_widget;

   // Title of widget //

   // Widget output //
?>
<select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
  <option value=""><?php echo esc_html(__('Archives')); ?></option>
  <?php wp_get_archives( 'type=monthly&format=option&show_post_count=1' ); ?>
</select>
<?php

   // After widget //
   echo $after_widget;

} // end function widget


 // Widget Control Panel //
 function form($instance) {
?>
<p><?php _e('Displays designed archive dropdown menu.','tcd-w'); ?></p>
<?php
 } // end function form
}

// End class widget
add_action('widgets_init', create_function('', 'return register_widget("tcdw_archive_list_widget");'));
?>

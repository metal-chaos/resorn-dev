<?php
	$dp_options = get_desing_plus_option();
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (function_exists('post_password_required')) {
		if ( post_password_required() ) {
			//echo '<div id="comments"><div class="password_protected"><p>';_e('This post is password protected. Enter the password to view comments.','tcd-w'); echo '</p></div></div>';
			return;
		}
	} else {
		if (!empty($post->post_password)) { // if there's a password
			if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { // and it doesn't match the cookie
				//echo '<div id="comments"><div class="password_protected"><p>';_e('This post is password protected. Enter the password to view comments.','tcd-w'); echo '</p></div></div>';
				return;
			}
		}
	}

	if (function_exists('wp_list_comments')) {
		$trackbacks = $comments_by_type['pings'];
	} else {
		$trackbacks = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->comments WHERE comment_post_ID = %d AND comment_approved = '1' AND (comment_type = 'pingback' OR comment_type = 'trackback') ORDER BY comment_date", $post->ID));
	}

	if ($comments || comments_open()) : //if there is comment and comment is open
?>

<div id="comment_header">
 <h3 id="comment_headline" class="rich_font"><span><?php _e('Comment', 'tcd-w'); ?></span></h3>

 <ul class="clearfix">
<?php
		if ( pings_open() && $dp_options['show_trackback'] ) { //if trackback is open
?>
  <li id="comment_switch" class="comment_switch_active"><a href="javascript:void(0);"><?php _e('Comments','tcd-w'); ?><?php echo (' ( ' . (count($comments)-count($trackbacks)) . ' )'); ?></a></li>
  <li id="trackback_switch"><a href="javascript:void(0);"><?php _e('Trackback','tcd-w'); ?><?php echo (' ( ' . count($trackbacks) . ' )'); ?></a></li>
<?php
		} else {
 ?>
  <li id="comment_closed"><p><?php _e('Comments', 'tcd-w'); echo (' (' . (count($comments)-count($trackbacks)) . ')'); ?></p></li>
  <li id="trackback_closed"><p><?php _e('Trackback are closed','tcd-w'); ?></p></li>
<?php
		}
?>
 </ul>

</div><!-- END #comment_header -->

<div id="comments">
 <div id="comment_area">
  <ol class="commentlist">
<?php
		if ($comments && count($comments) - count($trackbacks) > 0) {
			// for WordPress 2.7 or higher
			if (function_exists('wp_list_comments')) {
				wp_list_comments('type=comment&callback=custom_comments');
			// for WordPress 2.6.3 or lower
			} else {
				foreach ($comments as $comment) {
					if($comment->comment_type != 'pingback' && $comment->comment_type != 'trackback') {
						custom_comments($comment, null, null);
					}
				}
			}
		} else {
?>
   <li class="comment">
    <div class="comment-content"><p class="no_comment"><?php _e('No comments yet.','tcd-w'); ?></p></div>
   </li>
<?php
		}
?>
  </ol>

<?php
		if (get_option('page_comments')) {
			$comment_pages = paginate_comments_links('echo=0');
			if ($comment_pages) {
?>
  <div id="comment_pager" class="clearfix">
   <?php echo $comment_pages; ?>
  </div>
<?php
			}
		} // END comment pages
?>
 </div><!-- #comment-list END -->

 <div id="trackback_area">
<?php
		if (pings_open()) ://id trackback is open
?>

  <ol class="commentlist">
<?php
			if ($trackbacks) :
				$trackbackcount = 0;
				foreach ($trackbacks as $comment) :
?>
   <li class="comment">
    <div class="trackback_time">
     <?php echo get_comment_time(__('F jS, Y', 'tcd-w')) ?>
     <?php edit_comment_link(__('[ EDIT ]', 'tcd-w'), '', ''); ?>
    </div>
    <div class="trackback_title">
     <?php _e('Trackback from : ' , 'tcd-w'); ?><a href="<?php comment_author_url() ?>" rel="nofollow"><?php comment_author(); ?></a>
    </div>
   </li>
<?php
				endforeach;
			else :
?>
   <li class="comment"><div class="comment-content"><p class="no_comment"><?php _e('No trackbacks yet.','tcd-w'); ?></p></div></li>
<?php
			endif;
?>
  </ol>

<?php
			if ($dp_options['show_trackback']) :
?>
  <div id="trackback_url_area">
   <label for="trackback_url"><?php _e('TRACKBACK URL' , 'tcd-w'); ?></label>
   <input type="text" name="trackback_url" id="trackback_url" size="60" value="<?php trackback_url() ?>" readonly="readonly" onfocus="this.select()" />
  </div>
<?php
			endif;
		endif;
?>

 </div><!-- #trackbacklist END -->

<?php
	else : // if comment are closed and don't have any comments
?>
<div id="comments">
<?php
	endif; // END comment
?>

<?php
	if (!comments_open()) :
	elseif ( get_option('comment_registration') && !$user_ID ) : // If registration required and not logged in.
?>
 <div class="comment_form_wrapper" id="respond">
<?php
		if (function_exists('wp_login_url')) {
			$login_link = wp_login_url();
		} else {
			$login_link = get_site_url() . '/wp-login.php?redirect_to=' . urlencode(get_permalink());
		}
		printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'tcd-w'), $login_link);
?>
 </div>

<?php
	else ://if comment is open
?>
 <fieldset class="comment_form_wrapper" id="respond">
<?php
		if (function_exists('comment_reply_link')) {
?>
  <div id="cancel_comment_reply"><?php cancel_comment_reply_link() ?></div>
<?php
		}
?>
  <form action="<?php echo esc_url(site_url('/')); ?>wp-comments-post.php" method="post" id="commentform">

<?php
		if ( $user_ID ) :
?>
   <div id="comment_user_login">
    <p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.', 'tcd-w'), get_site_url() . '/wp-admin/profile.php', $user_identity); ?><span><a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'tcd-w'); ?>"><?php _e('[ Log out ]', 'tcd-w'); ?></a></span></p>
   </div><!-- #comment-user-login END -->
<?php
		else :
?>
   <div id="guest_info">
    <div id="guest_name"><label for="author"><span><?php _e('NAME','tcd-w'); ?></span><?php if ($req) _e('( required )', 'tcd-w'); ?></label><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /></div>
    <div id="guest_email"><label for="email"><span><?php _e('E-MAIL','tcd-w'); ?></span><?php if ($req) _e('( required )', 'tcd-w'); ?> <?php _e('- will not be published -','tcd-w'); ?></label><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></div>
    <div id="guest_url"><label for="url"><span><?php _e('URL','tcd-w'); ?></span></label><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /></div>
    <?php if ( function_exists('cs_print_smilies') ) { echo '<div id="custom_smilies">'; cs_print_smilies(); echo "</div>\n"; } ?>
   </div>
<?php
		endif;
?>

   <div id="comment_textarea">
    <textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea>
   </div>

<?php
		if (function_exists('show_subscription_checkbox')) {
			show_subscription_checkbox();
		}
?>

   <div id="submit_comment_wrapper">
<?php
		do_action('comment_form', $post->ID);
?>
    <input name="submit" type="submit" id="submit_comment" tabindex="5" value="<?php _e('Submit Comment', 'tcd-w'); ?>" title="<?php _e('Submit Comment', 'tcd-w'); ?>" alt="<?php _e('Submit Comment', 'tcd-w'); ?>" />
   </div>
   <div id="input_hidden_field">
<?php
		if (function_exists('comment_id_fields')) {
			comment_id_fields();
		} else {
			echo '<input type="hidden" name="comment_post_ID" value="'.$post->ID.'" />';
		}
?>
   </div>
  </form>
 </fieldset>
<?php
	endif;
?>
</div><!-- END #comments -->

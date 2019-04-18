<?php
global $dp_options;
if ( ! $dp_options ) $dp_options = get_desing_plus_option();
$url_encode = urlencode( get_permalink( $post->ID ) );
$title_encode = urlencode( get_the_title( $post->ID ) );
$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
?>
<div class="share-<?php echo esc_attr( $dp_options['sns_type_btm'] ); ?> share-btm">
<?php
// Type5
if ( $dp_options['sns_type_btm'] === 'type5' ) :
?>
	<div class="sns_default_top">
		<ul class="clearfix">
<?php
		if ( $dp_options['show_twitter_btm'] ) :
?>
			<li class="default twitter_button">
				<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
			</li>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<?php
		endif;
		if ( $dp_options['show_fblike_btm'] ) :
?>
			<li class="default <?php echo ( is_mobile() && ! is_no_responsive() ) ? 'facebook' : 'fblike'; ?>_button">
				<div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
			</li>
<?php
		endif;
		if ( $dp_options['show_fbshare_btm'] ) :
?>
			<li class="default <?php echo ( is_mobile() && ! is_no_responsive() ) ? 'facebook' : 'fbshare'; ?>_button2">
				<div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button_count"></div>
			</li>
<?php
		endif;
		if ( $dp_options['show_google_btm'] ) :
?>
			<li class="default google_button">
				<div class="socialbutton gplus-button">
					<div class="g-plusone" data-size="medium"></div>
				</div>
			</li>
			<script type="text/javascript">window.___gcfg = {lang: 'ja'};(function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();
</script>
<?php
		endif;
		if ( $dp_options['show_hatena_btm'] ) :
?>
			<li class="default hatena_button">
				<a href="http://b.hatena.ne.jp/entry/<?php the_permalink();?>" class="hatena-bookmark-button" data-hatena-bookmark-title="<?php the_title();?>" data-hatena-bookmark-layout="<?php echo ( is_mobile() && ! is_no_responsive() ) ? 'simple' : 'standard'; ?>-balloon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
			</li>
<?php
		endif;
		if ( $dp_options['show_pocket_btm'] ) :
?>
			<li class="default pocket_button">
				<div class="socialbutton pocket-button">
					<a data-pocket-label="pocket" data-pocket-count="horizontal" class="pocket-btn" data-lang="en"></a>
			</li>
			<script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js");</script>
<?php
		endif;
?>
<?php
		if ( $dp_options['show_feedly_btm'] ) :
?>
			<li class="default feedly_button">
				<a href='http://feedly.com/index.html#subscription%2Ffeed%2F<?php bloginfo('rss2_url'); ?>'<?php echo ( is_mobile() && ! is_no_responsive() ) ? '' : ' target="_blank"'; ?>><img id='feedlyFollow' src='http://s3.feedly.com/img/follows/feedly-follow-rectangle-flat-small_2x.png' alt='follow us in feedly' width='66' height='20'></a>
			</li>
<?php
		endif;
		if ( $dp_options['show_pinterest_btm'] ) :
?>
			<li class="default pinterest_button">
				<a data-pin-do="buttonPin" data-pin-color="red" data-pin-count="beside" href="https://www.pinterest.com/pin/create/button/?url=<?php echo $url_encode ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php echo $title_encode ?>"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a>
			</li>
			<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
<?php
		endif;
?>
	</ul>
</div>
<?php
// Type1, Type2, Type3, Type4
else :
	// for Mobile
	if ( is_mobile() && ! is_no_responsive() ) :
?>
	<div class="sns">
		<ul class="<?php echo esc_attr( $dp_options['sns_type_btm'] ); ?> clearfix">
<?php
		if ( $dp_options['show_twitter_btm'] ) :
?>
			<li class="twitter">
				<a href="http://twitter.com/share?text=<?php echo $title_encode ?>&url=<?php echo $url_encode ?>&via=<?php echo $dp_options['twitter_info']; ?>&tw_p=tweetbutton&related=<?php echo $dp_options['twitter_info']; ?>"><i class="icon-twitter"></i><span class="ttl">Tweet</span><span class="share-count"><?php if(function_exists('scc_get_share_twitter')) echo (scc_get_share_twitter()==0)?'':scc_get_share_twitter(); ?></span></a>
			</li>
<?php
		endif;
		if ( $dp_options['show_fbshare_btm'] ) :
?>
			<li class="facebook">
				<a href="//www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>&amp;t=<?php echo $title_encode ?>" class="facebook-btn-icon-link" target="blank" rel="nofollow"><i class="icon-facebook"></i><span class="ttl">Share</span><span class="share-count"><?php if(function_exists('scc_get_share_facebook')) echo (scc_get_share_facebook()==0)?'':scc_get_share_facebook(); ?></span></a>
			</li>
<?php
		endif;
		if ( $dp_options['show_google_btm'] ) :
?>
			<li class="googleplus">
				<a href="https://plus.google.com/share?url=<?php echo $url_encode;?>" ><i class="icon-google-plus"></i><span class="ttl">+1</span><span class="share-count"><?php if(function_exists('scc_get_share_gplus')) echo (scc_get_share_gplus()==0)?'':scc_get_share_gplus(); ?></span></a>
			</li>
<?php
		endif;
		if ( $dp_options['show_hatena_btm'] ) : ?>
			<li class="hatebu">
				<a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_encode ?>"><i class="icon-hatebu"></i><span class="ttl">Hatena</span><span class="share-count"><?php if(function_exists('scc_get_share_hatebu')) echo (scc_get_share_hatebu()==0)?'':scc_get_share_hatebu(); ?></span></a>
			</li>
<?php
		endif;
		if ( $dp_options['show_pocket_btm'] ) :
?>
			<li class="pocket">
				<a href="http://getpocket.com/edit?url=<?php echo $url_encode;?>&title=<?php echo $title_encode;?>"><i class="icon-pocket"></i><span class="ttl">Pocket</span><span class="share-count"><?php if(function_exists('scc_get_share_pocket')) echo (scc_get_share_pocket()==0)?'':scc_get_share_pocket(); ?></span></a>
			</li>
<?php
		endif;
		if ( $dp_options['show_rss_btm'] ) :
?>
			<li class="rss">
				<a href="<?php bloginfo('rss2_url'); ?>"><i class="icon-rss"></i><span class="ttl">RSS</span></a>
			</li>
<?php
		endif;
		if ( $dp_options['show_feedly_btm'] ) :
?>
			<li class="feedly">
				<a href="http://feedly.com/index.html#subscription%2Ffeed%2F<?php bloginfo('rss2_url'); ?>"><i class="icon-feedly"></i><span class="ttl">feedly</span><span class="share-count"><?php if(function_exists('scc_get_follow_feedly')) echo (scc_get_follow_feedly()==0)?'':scc_get_follow_feedly(); ?></span></a>
			</li>
<?php
		endif;
		if ( $dp_options['show_pinterest_btm'] ) :
?>
			<li class="pinterest">
				<a rel="nofollow" href="https://www.pinterest.com/pin/create/button/?url=<?php echo $url_encode; ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php echo $title_encode ?>"><i class="icon-pinterest"></i><span class="ttl">Pin&nbsp;it</span></a>
			</li>
<?php
		endif;
?>
		</ul>
	</div>
<?php
	// for PC
	else :
?>
	<div class="sns">
		<ul class="<?php echo esc_attr( $dp_options['sns_type_btm'] ); ?> clearfix">
<?php
		if ( $dp_options['show_twitter_btm'] ) :
?>
			<li class="twitter">
				<a href="http://twitter.com/share?text=<?php echo $title_encode ?>&url=<?php echo $url_encode ?>&via=<?php echo $dp_options['twitter_info']; ?>&tw_p=tweetbutton&related=<?php echo $dp_options['twitter_info']; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;"><i class="icon-twitter"></i><span class="ttl">Tweet</span><span class="share-count"><?php if(function_exists('scc_get_share_twitter')) echo (scc_get_share_twitter()==0)?'':scc_get_share_twitter(); ?></span></a>
			</li>
<?php
		endif;
		if ( $dp_options['show_fbshare_btm'] ) :
?>
			<li class="facebook">
				<a href="//www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>&amp;t=<?php echo $title_encode ?>" class="facebook-btn-icon-link" target="blank" rel="nofollow"><i class="icon-facebook"></i><span class="ttl">Share</span><span class="share-count"><?php if(function_exists('scc_get_share_facebook')) echo (scc_get_share_facebook()==0)?'':scc_get_share_facebook(); ?></span></a>
			</li>
<?php
		endif;
		if ( $dp_options['show_google_btm'] ) :
?>
			<li class="googleplus">
				<a href="https://plus.google.com/share?url=<?php echo $url_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;"><i class="icon-google-plus"></i><span class="ttl">+1</span><span class="share-count"><?php if(function_exists('scc_get_share_gplus')) echo (scc_get_share_gplus()==0)?'':scc_get_share_gplus(); ?></span></a>
			</li>
<?php
		endif;
		if ( $dp_options['show_hatena_btm'] ) :
?>
			<li class="hatebu">
				<a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_encode ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=510');return false;" ><i class="icon-hatebu"></i><span class="ttl">Hatena</span><span class="share-count"><?php if(function_exists('scc_get_share_hatebu')) echo (scc_get_share_hatebu()==0)?'':scc_get_share_hatebu(); ?></span></a>
			</li>
<?php
		endif;
?>
<?php
		if ( $dp_options['show_pocket_btm'] ) :
?>
			<li class="pocket">
				<a href="http://getpocket.com/edit?url=<?php echo $url_encode;?>&title=<?php echo $title_encode;?>" target="blank"><i class="icon-pocket"></i><span class="ttl">Pocket</span><span class="share-count"><?php if(function_exists('scc_get_share_pocket')) echo (scc_get_share_pocket()==0)?'':scc_get_share_pocket(); ?></span></a>
			</li>
<?php
		endif;
		if ( $dp_options['show_rss_btm'] ) :
?>
			<li class="rss">
				<a href="<?php bloginfo('rss2_url'); ?>" target="blank"><i class="icon-rss"></i><span class="ttl">RSS</span></a>
			</li>
<?php
		endif;
		if ( $dp_options['show_feedly_btm'] ) :
?>
			<li class="feedly">
				<a href="http://feedly.com/index.html#subscription%2Ffeed%2F<?php bloginfo('rss2_url'); ?>" target="blank"><i class="icon-feedly"></i><span class="ttl">feedly</span><span class="share-count"><?php if(function_exists('scc_get_follow_feedly')) echo (scc_get_follow_feedly()==0)?'':scc_get_follow_feedly(); ?></span></a>
			</li>
<?php
		endif;
		if ( $dp_options['show_pinterest_btm'] ) :
?>
			<li class="pinterest">
				<a rel="nofollow" target="_blank" href="https://www.pinterest.com/pin/create/button/?url=<?php echo $url_encode ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php echo $title_encode ?>"><i class="icon-pinterest"></i><span class="ttl">Pin&nbsp;it</span></a>
			</li>
<?php
		endif;
?>
		</ul>
	</div>
<?php
	endif;
endif;
?>
</div>

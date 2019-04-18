<?php

global $dp_options, $custom_search_vars;
if ( ! $dp_options ) $dp_options = get_desing_plus_option();

if ( $custom_search_vars) {
	if ( ! is_mobile() || is_no_responsive() ) {
		$sidebars = array( 'search_results_widget', 'archive_widget', 'common_widget' );
	} else {
		$sidebars = array( 'search_results_widget_mobile', 'archive_widget_mobile', 'common_widget_mobile' );
	}

} elseif ( is_post_type_archive( $dp_options['news_slug'] ) || is_singular( $dp_options['news_slug'] ) ) {
	if ( ! is_mobile() || is_no_responsive() ) {
		$sidebars = array( 'news_widget', 'common_widget' );
	} else {
		$sidebars = array( 'news_widget_mobile', 'common_widget_mobile' );
	}

} elseif ( is_post_type_archive( $dp_options['introduce_slug'] ) || is_singular( $dp_options['introduce_slug'] ) || is_tax( array( $dp_options['introduce_category1_slug'], $dp_options['introduce_category2_slug'], $dp_options['introduce_category3_slug'], $dp_options['introduce_tag_slug'] ) ) ) {
	if ( ! is_mobile() || is_no_responsive() ) {
		$sidebars = array( 'introduce_widget', 'common_widget' );
	} else {
		$sidebars = array( 'introduce_widget_mobile', 'common_widget_mobile' );
	}

} elseif ( is_archive() ) {
	if ( ! is_mobile() || is_no_responsive() ) {
		$sidebars = array( 'archive_widget', 'common_widget' );
	} else {
		$sidebars = array( 'archive_widget_mobile', 'common_widget_mobile' );
	}

} elseif ( is_page() ) {
	if ( ! is_mobile() || is_no_responsive() ) {
		$sidebars = array( 'page_widget', 'common_widget' );
	} else {
		$sidebars = array( 'page_widget_mobile', 'common_widget_mobile' );
	}

} elseif ( is_single() ) {
	if ( ! is_mobile() || is_no_responsive() ) {
		$sidebars = array( 'post_widget', 'common_widget' );
	} else {
		$sidebars = array( 'post_widget_mobile', 'common_widget_mobile' );
	}

} else {
	if ( ! is_mobile() || is_no_responsive() ) {
		$sidebars = array( 'common_widget' );
	} else {
		$sidebars = array( 'common_widget_mobile' );
	}
}

if ( ! empty( $sidebars ) ) :
	foreach( $sidebars as $sidebar ):
		if ( is_active_sidebar( $sidebar ) ) :
?>
 <div id="side_col">
  <?php dynamic_sidebar( $sidebar ); ?>
 </div>
<?php
			break;
		endif;
	endforeach;
endif;
?>
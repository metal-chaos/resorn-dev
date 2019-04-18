<?php

global $wp_rewrite;
$paginate_base = get_pagenum_link(1);
if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
	$paginate_format = '';
	$paginate_base = add_query_arg('paged', '%#%');
} else {
	$paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') .
	user_trailingslashit('page/%#%/', 'paged');
	$paginate_base .= '%_%';
}

global $wp_query, $paged;

if ($wp_query->found_posts && $wp_query->posts) :
	if ($wp_query->get('posts_per_page') == -1 || $wp_query->nopaging) {
		$posts_current_page = 1;
		$posts_start = 1;
		$posts_end = $wp_query->found_posts;
	} elseif ($paged >= 2) {
		$posts_current_page = $paged;
		$posts_start = $wp_query->get('posts_per_page') * ($paged - 1) + 1;
		$posts_end = $wp_query->get('posts_per_page') * $paged;
	} else {
		$posts_current_page = 1;
		$posts_start = 1;
		$posts_end = $wp_query->get('posts_per_page');
	}
	if ($posts_end > $wp_query->found_posts) {
		$posts_end = $wp_query->found_posts;
	}
?>
<div class="page_navi2 clearfix">
 <p><?php
	if ($wp_query->found_posts <= 1) {
		printf( __( '%d件中 %d件を表示', 'tcd-w' ), $wp_query->found_posts, $wp_query->found_posts );
	} else {
		printf( __( '%d件中 %d〜%d件を表示', 'tcd-w' ), $wp_query->found_posts, $posts_start, $posts_end ) ;
	}
	?></p>
<?php
	if ($wp_query->max_num_pages > 1) {
		$paginate_links = paginate_links( array(
			'base' => $paginate_base,
			'format' => $paginate_format,
			'total' => $wp_query->max_num_pages,
			'mid_size' => 5,
			'current' => ($paged ? $paged : 1),
			'type' => 'list',
			'prev_text' => '&#xe90f;',
			'next_text' => '&#xe910;',
		));
		if (strpos($paginate_links, '<li><a class="prev page-numbers') !== false) {
			$paginate_links = str_replace('<li><a class="prev page-numbers', '<li class="prev"><a class="prev page-numbers', $paginate_links);
		} else {
			$paginate_links = str_replace("<ul class='page-numbers'>", "<ul class='page-numbers'>\n\t<li class='prev disable'><span class='prev page-numbers'>&#xe90f;</span></li>", $paginate_links);
		}
		if (strpos($paginate_links, '<li><a class="next page-numbers') !== false) {
			$paginate_links = str_replace('<li><a class="next page-numbers', '<li class="next"><a class="next page-numbers', $paginate_links);
		} else {
			$paginate_links = str_replace("</ul>", "\t<li class='next disable'><span class='next page-numbers'>&#xe910;</span></li>\n</ul>", $paginate_links);
		}
		echo $paginate_links;


	}
?>
</div>
<?php
endif;

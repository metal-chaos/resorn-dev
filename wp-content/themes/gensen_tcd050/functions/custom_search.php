<?php

// カスタム検索フォームを表示するか
function is_show_custom_search_form( $is_front_page = false ) {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_desing_plus_option();

	if ( ! $is_front_page && ! is_front_page() && ! $dp_options['show_search_bar_subpage'] ) {
		return false;
	}

	if ( $dp_options['searcn_post_type'] == 'post' && ( ( $dp_options['show_search_form_keywords'] && $dp_options['searcn_keywords_target'] ) || $dp_options['show_search_form_category1'] || $dp_options['show_search_form_category2'] || $dp_options['show_search_form_category3'] ) ) {
		return true;
	} elseif ( $dp_options['searcn_post_type'] == 'introduce' && ( ( $dp_options['show_search_form_keywords_introduce'] && $dp_options['searcn_keywords_target'] ) || $dp_options['show_search_form_category1_introduce'] || $dp_options['show_search_form_category2_introduce'] || $dp_options['show_search_form_category3_introduce'] ) ) {
		return true;
	}

	return false;
}

// メインクエリー変更 pre_get_posts
function custom_search_pre_get_posts( $wp_query ) {
	// 管理画面は終了
	if ( is_admin() ) return;

	// メインクエリー以外は終了
	if ( ! $wp_query->is_main_query() ) return;

	// テーマオプション
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_desing_plus_option();

	// 指定アーカイブ表示以外は終了
	if ( ( $dp_options['searcn_post_type'] == 'post' && ! $wp_query->is_home() )
		|| ( $dp_options['searcn_post_type'] == 'introduce' && ! $wp_query->is_post_type_archive( $dp_options['introduce_slug'] ) )
	) return;

	// カスタム検索用グローバル変数
	global $custom_search_vars;
	$custom_search_vars = array();

	// tax query
	$tax_query = array();

	// 投稿タイプ分岐
	if ( $dp_options['searcn_post_type'] == 'post' ) {
		// post type
		$wp_query->set( 'post_type', 'post' );

		// キーワード
		if ( ! empty( $dp_options['show_search_form_keywords'] ) && ! empty( $_REQUEST['search_keywords'] ) ) {
			// 全角スペースを半角スペースに置換
			$search_keywords = trim( str_replace('　', ' ', stripslashes( $_REQUEST['search_keywords'] ) ) );
			if ( $search_keywords ) {
				$custom_search_vars['search_keywords'] = $search_keywords;

				// キーワード検索フィルター追加
				add_filter('posts_clauses', 'custom_search_posts_clauses', 11, 2);
			}
		}

		// カテゴリー1～3
		for ( $i = 1; $i <= 3; $i++ ) {
			if ( ! empty( $dp_options['show_search_form_category' . $i] ) && ! empty( $_REQUEST['search_cat' . $i] ) ) {
				if ( $dp_options['show_search_form_category' . $i] == 'category' ) {
					$tax_slug = 'category';
					$term = get_term_by( 'id', intval( $_REQUEST['search_cat' . $i] ), $tax_slug );

				} elseif ( ! empty($dp_options['use_'.$dp_options['show_search_form_category' . $i]] ) ) {
					$tax_slug = $dp_options[$dp_options['show_search_form_category' . $i].'_slug'];
					$term = get_term_by( 'id', intval( $_REQUEST['search_cat' . $i] ), $tax_slug );
				} else {
					$tax_slug = null;
					$term = null;
				}

				if ( $term && ! is_wp_error( $term ) ) {
					$custom_search_vars['search_cat' . $i] = $term;
					$tax_query[] = array(
						'taxonomy' => $term->taxonomy,
						'field' => 'term_id',
						'terms' => array( $term->term_id ),
						'operator' => 'IN',
						'include_children' => true
					);
				}
			}
		}

		// タグフィルター
		if ( ! empty( $dp_options['show_search_results_tag_filter'] ) && ! empty( $_REQUEST['filter_tag'] ) ) {
			$tag_ids = array();

			foreach ( (array) $_REQUEST['filter_tag'] as $tag_id ) {
				$tag_id = intval( $tag_id );
				if ( $tag_id > 0) {
					$tag_ids[] = $tag_id;
				}
			}

			if ($tag_ids) {
				$custom_search_vars['filter_tag'] = $tag_ids;
				$tax_query[] = array(
					'taxonomy' => 'post_tag',
					'field' => 'term_id',
					'terms' => $tag_ids,
					'operator' => 'AND',
					'include_children' => false
				);
			}
		}

	} elseif ( $dp_options['searcn_post_type'] == 'introduce' ) {
		// post type
		$wp_query->set( 'post_type', $dp_options['introduce_slug'] );

		// キーワード
		if ( ! empty( $dp_options['show_search_form_keywords_introduce'] ) && ! empty( $_REQUEST['search_keywords'] ) ) {
			// 全角スペースを半角スペースに置換
			$search_keywords = trim( preg_replace('/[　\s]+/mu', ' ', stripslashes( $_REQUEST['search_keywords'] ) ) );
			if ( $search_keywords ) {
				$custom_search_vars['search_keywords'] = $search_keywords;

				// キーワード検索フィルター追加
				add_filter('posts_clauses', 'custom_search_posts_clauses', 11, 2);
			}
		}

		// カテゴリー1～3
		for ( $i = 1; $i <= 3; $i++ ) {
			if ( ! empty( $dp_options['show_search_form_category' . $i . '_introduce'] ) && ! empty( $_REQUEST['search_cat' . $i] ) ) {
				if ( ! empty($dp_options['use_'.$dp_options['show_search_form_category' . $i . '_introduce']] ) ) {
					$tax_slug = $dp_options[$dp_options['show_search_form_category' . $i . '_introduce'].'_slug'];
					$term = get_term_by( 'id', intval( $_REQUEST['search_cat' . $i] ), $tax_slug );

					if ( $term && ! is_wp_error( $term ) ) {
						$custom_search_vars['search_cat' . $i] = $term;
						$tax_query[] = array(
							'taxonomy' => $term->taxonomy,
							'field' => 'term_id',
							'terms' => array( $term->term_id ),
							'operator' => 'IN',
							'include_children' => true
						);
					}
				}
			}
		}

		// タグフィルター
		if ( ! empty( $dp_options['show_search_results_tag_filter'] ) && ! empty( $dp_options['use_introduce_tag'] ) && ! empty( $_REQUEST['filter_tag'] ) ) {
			$tag_slug = $dp_options['introduce_tag_slug'];
			$tag_ids = array();

			foreach ( (array) $_REQUEST['filter_tag'] as $tag_id ) {
				$tag_id = intval( $tag_id );
				if ( $tag_id > 0) {
					$tag_ids[] = $tag_id;
				}
			}

			if ($tag_ids) {
				$custom_search_vars['filter_tag'] = $tag_ids;
				$tax_query[] = array(
					'taxonomy' => $dp_options['introduce_tag_slug'],
					'field' => 'term_id',
					'terms' => $tag_ids,
					'operator' => 'AND',
					'include_children' => false
				);
			}
		}
	}

	// tax query
	if ( $tax_query ) {
		if ( count( $tax_query ) > 1 ) {
			$tax_query['relation'] = 'AND';
		}
		$wp_query->set( 'tax_query', $tax_query );
	}

	// ソート
	if ( isset( $_REQUEST['sort'] ) ) {
		// 閲覧数降順
		if ( $_REQUEST['sort'] === 'views' ) {
			$wp_query->set( 'meta_key', '_view_count' );
			$wp_query->set( 'orderby', 'meta_value_num' );
			$wp_query->set( 'order', 'DESC' );

		// 日時昇順
		} elseif ( $_REQUEST['sort'] === 'date_asc' ) {
			$wp_query->set( 'orderby', 'date' );
			$wp_query->set( 'order', 'ASC' );

		// 日時降順
		} else {
			$wp_query->set( 'orderby', 'date' );
			$wp_query->set( 'order', 'DESC' );
		}
	}

}
add_action( 'pre_get_posts', 'custom_search_pre_get_posts' );

// キーワード検索
function custom_search_posts_clauses( $clauses, $wp_query ) {
	global $wpdb;;

	// 管理画面は終了
	if ( is_admin() ) return $clauses;

	// メインクエリー以外は終了
	if ( ! $wp_query->is_main_query() ) return $clauses;

	// テーマオプション
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_desing_plus_option();

	// カスタム検索用グローバル変数
	global $custom_search_vars;

	// キーワード検索あり
	if ( ! empty( $custom_search_vars['search_keywords'] ) ) {
		if ( empty( $dp_options['searcn_keywords_target'] ) ) {
			$dp_options['searcn_keywords_target'] = array();
		} elseif ( ! is_array( $dp_options['searcn_keywords_target'] ) ) {
			$dp_options['searcn_keywords_target'] = (array) $dp_options['searcn_keywords_target'];
		}

		// キーワード検索対象フラグ

		// タイトル検索
		if ( in_array( 'title', $dp_options['searcn_keywords_target'] ) ) {
			$is_search_title = true;
		} else {
			$is_search_title = false;
		}

		// 本文検索
		if ( in_array( 'content', $dp_options['searcn_keywords_target'] ) ) {
			$is_search_content = true;
		} else {
			$is_search_content = false;
		}

		// タグ検索
		$is_search_tag = false;
		if ( in_array( 'tag', $dp_options['searcn_keywords_target'] ) ) {
			if ( $dp_options['searcn_post_type'] == 'post' ) {
				$is_search_tag = 'post_tag';
			} elseif ( $dp_options['searcn_post_type'] == 'introduce' && $dp_options['use_introduce_tag'] ) {
				$is_search_tag = $dp_options['introduce_tag_slug'];
			}
			if ( $is_search_tag ) {
				// tax/term join
				$tag_slug = esc_sql( $is_search_tag );
				$clauses['join'] .= " LEFT JOIN $wpdb->term_relationships AS trel ON ($wpdb->posts.ID = trel.object_id) ";
				$clauses['join'] .= " LEFT JOIN $wpdb->term_taxonomy AS ttax ON (ttax.taxonomy = '{$tag_slug}' AND trel.term_taxonomy_id = ttax.term_taxonomy_id) ";
				$clauses['join'] .= " LEFT JOIN $wpdb->terms AS tter ON (ttax.term_id = tter.term_id) ";

				// group by
				$clauses['groupby'] = "$wpdb->posts.ID";
			}
		}

		$wheres = array();

		foreach( explode( ' ', $custom_search_vars['search_keywords'] ) as $keyword ) {
			$keyword = trim( $keyword );
			if ( ! $keyword ) continue;

			// LIKEエスケープ
			$esc_like_keyword = '%' . $wpdb->esc_like(esc_sql($keyword)) . '%';

			// タイトル検索
			if ( $is_search_title ) {
				$wheres['title'][] = "$wpdb->posts.post_title LIKE '$esc_like_keyword'";
			}

			// 本文検索
			if ( $is_search_content ) {
				$wheres['content'][] = "$wpdb->posts.post_content LIKE '$esc_like_keyword'";
			}

			// タグ検索
			if ( $is_search_tag ) {
				$wheres['tag'][] = "tter.name LIKE '$esc_like_keyword'";
			}
		}

		// OR検索
		if ( ! empty( $_REQUEST['search_keywords_operator'] ) && $_REQUEST['search_keywords_operator'] == 'or') {
			if ( count( $wheres ) == 1) {
				$clauses['where'] .= " AND (" . implode( " OR ", array_shift( $wheres ) ) . ")";
			} elseif ( count( $wheres ) > 1) {
				$wheres2 = array();
				foreach( $wheres as $key => $where ) {
					$wheres2[] = implode( " OR ", $where );
				}
				$clauses['where'] .= " AND ( (" . implode( ") OR (", $wheres2 ).") )";
			}

		// AND検索
		} else {
			if ( count( $wheres ) == 1 ) {
				$clauses['where'] .= " AND (" . implode( " AND ", array_shift( $wheres ) ) . ")";
			} elseif (count( $wheres ) > 1) {
				$wheres2 = array();
				foreach( $wheres as $key => $where ) {
					$wheres2[] = implode( " AND ", $where );
				}
				$clauses['where'] .= " AND ( (".implode(") OR (", $wheres2).") )";
			}
		}
	}

	return $clauses;
}


// テンプレートファイル差し替え
function custom_search_template_include( $template ) {
	global $dp_options;
	if ( ! $dp_options ) $dp_options = get_desing_plus_option();

	// カスタム検索用グローバル変数
	global $custom_search_vars;

	// カスタム検索の場合に、テンプレートファイル差し替え
	if ( $custom_search_vars ) {
		// カスタム検索表示用テンプレートファイル名
		$template_name = 'custom_search_results.php';

		if ( file_exists( STYLESHEETPATH . '/' . $template_name ) ) {
			return STYLESHEETPATH . '/' . $template_name;
		} elseif ( file_exists( TEMPLATEPATH . '/' . $template_name ) ) {
			return TEMPLATEPATH . '/' . $template_name;
		}
	}

	return $template;
}
add_filter( 'template_include', 'custom_search_template_include' );


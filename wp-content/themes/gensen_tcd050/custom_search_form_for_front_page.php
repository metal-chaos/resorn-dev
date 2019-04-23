<?php
global $dp_options;
if (! $dp_options) {
    $dp_options = get_desing_plus_option();
}

$search_forms = array('columns' => 0);

if ($dp_options['searcn_post_type'] == 'post') {
    // keywords
    if ($dp_options['show_search_form_keywords'] && $dp_options['searcn_keywords_target']) {
        $search_forms['search_keywords']['placeholder'] = $dp_options['search_form_keywords_placeholder'];
        $search_forms['columns']++;
    }

    // category
    for ($i = 1; $i <= 3; $i++) {
        if (!empty($dp_options['show_search_form_category'.$i])) {
            $tax_slug = '';
            $placeholder = '';
            if ($dp_options['show_search_form_category'.$i] == 'category') {
                $tax_slug = 'category';
                $placeholder = str_replace('%category_label%', $dp_options['category_label'], $dp_options['search_form_category'.$i.'_placeholder']);
            } elseif (!empty($dp_options['use_'.$dp_options['show_search_form_category'.$i]])) {
                $tax_slug = $dp_options[$dp_options['show_search_form_category'.$i].'_slug'];
                $placeholder = str_replace('%category_label%', $dp_options[$dp_options['show_search_form_category'.$i].'_label'], $dp_options['search_form_category'.$i.'_placeholder']);
            }
            if ($tax_slug && get_taxonomy($tax_slug)) {
                $search_forms['search_cat'.$i]['slug'] = $tax_slug;
                $search_forms['search_cat'.$i]['placeholder'] = $placeholder;
                $search_forms['columns']++;
            }
        }
    }

    // form action
    if (!empty($search_forms['columns'])) {
        if (get_option('show_on_front') == 'page' && get_option('page_for_posts') && get_option('permalink_structure')) {
            $search_forms['form_action'] = get_permalink(get_option('page_for_posts'));
        } else {
            $search_forms['form_action'] = home_url('/');
        }
        if (get_option('show_on_front') == 'page' && get_option('page_for_posts') && !get_option('permalink_structure')) {
            $search_forms['form_action_hidden']['page_id'] = get_option('page_for_posts');
        }
    }
} elseif ($dp_options['searcn_post_type'] == 'introduce') {
    // keywords
    if ($dp_options['show_search_form_keywords_introduce'] && $dp_options['searcn_keywords_target']) {
        $search_forms['search_keywords']['placeholder'] = $dp_options['search_form_keywords_placeholder_introduce'];
        $search_forms['columns']++;
    }

    // category
    for ($i = 1; $i <= 3; $i++) {
        if (!empty($dp_options['show_search_form_category'.$i.'_introduce'])) {
            $tax_slug = '';
            $placeholder = '';
            if (!empty($dp_options['use_'.$dp_options['show_search_form_category'.$i.'_introduce']])) {
                $tax_slug = $dp_options[$dp_options['show_search_form_category'.$i.'_introduce'].'_slug'];
                $placeholder = str_replace('%category_label%', $dp_options[$dp_options['show_search_form_category'.$i.'_introduce'].'_label'], $dp_options['search_form_category'.$i.'_placeholder_introduce']);
            }
            if ($tax_slug && get_taxonomy($tax_slug)) {
                $search_forms['search_cat'.$i]['slug'] = $tax_slug;
                $search_forms['search_cat'.$i]['placeholder'] = $placeholder;
                $search_forms['columns']++;
            }
        }
    }

    // form action
    if (!empty($search_forms['columns'])) {
        if (get_option('permalink_structure')) {
            $search_forms['form_action'] = get_post_type_archive_link($dp_options['introduce_slug']);
        } else {
            $search_forms['form_action'] = home_url('/');
        }
        if (!get_option('permalink_structure')) {
            $search_forms['form_action_hidden']['post_type'] = $dp_options['introduce_slug'];
        }
    }
}

if (!empty($search_forms['form_action']) && !empty($search_forms['columns'])) :
?>
    <p class="search-title">さぁ、検索してみましょう！</p>
    <form action="<?php echo esc_attr($search_forms['form_action']); ?>" method="get" class="columns-<?php echo esc_attr($search_forms['columns'] + 1); ?>">
<?php
    if (!empty($search_forms['form_action_hidden'])) {
        foreach ($search_forms['form_action_hidden'] as $key => $value) {
            if (is_int($key)) {
                echo $value;
            } elseif (is_string($key)) {
                echo '    <input type="hidden" name="'.esc_attr($key).'" value="'.esc_attr($value).'" />';
                ;
            }
        }
    }

    if (!empty($search_forms['search_keywords'])) :
?>
     <div class="header_search_inputs header_search_keywords">
      <input type="text" id="header_search_keywords" name="search_keywords" placeholder="<?php echo esc_attr($search_forms['search_keywords']['placeholder']); ?>" value="<?php if (!empty($_REQUEST['search_keywords'])) {
    echo esc_attr(stripslashes($_REQUEST['search_keywords']));
} ?>" />
      <input type="hidden" name="search_keywords_operator" value="<?php if (!empty($_REQUEST['search_keywords_operator']) && $_REQUEST['search_keywords_operator'] == 'or') {
    echo 'or';
} else {
    echo 'and';
} ?>" />
      <ul class="search_keywords_operator">
       <li<?php if (empty($_REQUEST['search_keywords_operator']) || $_REQUEST['search_keywords_operator'] != 'or') {
    echo ' class="active"';
} ?>>and</li>
       <li<?php if (!empty($_REQUEST['search_keywords_operator']) && $_REQUEST['search_keywords_operator'] == 'or') {
    echo ' class="active"';
} ?>>or</li>
      </ul>
     </div>
<?php
    endif;

    for ($i = 1; $i <= 3; $i++) :
        if (!empty($search_forms['search_cat'.$i]['slug'])) :
?>
     <div class="header_search_inputs">
<?php
            wp_dropdown_categories(array(
                'show_option_all'    => $search_forms['search_cat'.$i]['placeholder'],
                'hide_empty'         => 0,
                'selected'           => isset($_REQUEST['search_cat'.$i]) ? $_REQUEST['search_cat'.$i] : 0,
                'hierarchical'       => 1,
                'name'               => 'search_cat'.$i,
                'id'                 => 'header_search_cat'.$i,
                'class'              => '',
                'taxonomy'           => $search_forms['search_cat'.$i]['slug'],
                'value_field'        => 'term_id',
            ));
?>
     </div>
<?php
        endif;
    endfor;
?>
     <div class="header_search_inputs header_search_button">
      <input type="submit" id="header_search_submit" value="<?php echo esc_attr($dp_options['search_form_button_text']); ?>" />
     </div>
    </form>
<?php
endif;
?>

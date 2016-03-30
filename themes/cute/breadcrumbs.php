<a href="<?php echo home_url(); ?>">
&nbsp;TOP
</a>

<?php
if( is_page() ){ /* 固定ページ */
	echo '<span>&nbsp;</span>';
	echo get_the_title(get_post($post->ID));
} elseif ( is_category() ) { /* カテゴリー */
	echo '<span>&nbsp;</span>';
	$cat = get_queried_object();
	if ( $cat -> parent != 0 ) {
		$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
		foreach ( $ancestors as $ancestor ) {
			echo '<a href="';
			echo get_category_link($ancestor);
			echo '">';
			echo get_cat_name($ancestor);
			echo '</a>';
			echo '<span>&nbsp;</span>';
		}
	}
	echo $cat -> cat_name; // single_cat_title();
} elseif ( is_single() ) { /* 個別記事 */
	echo '<span>&nbsp;</span>';
	$categories = get_the_category($post->ID);
	$cat = $categories[0];
	if ( $cat -> parent != 0 ) {
		$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
			foreach ( $ancestors as $ancestor ) {
				echo '<a href="';
				echo get_category_link($ancestor); 
				echo '">';
				echo get_cat_name($ancestor);
				echo '</a>';
				echo '<span>&nbsp;</span>';
			}
	}
		echo '<a href="';
		echo get_category_link($cat -> cat_ID);
		echo '">';
		echo $cat-> cat_name;
		echo '</a>';
		echo '<span>&nbsp;</span>';
		echo $post -> post_title;
} elseif ( is_date() ) { /* 日付アーカイブ */
	echo '<span>&nbsp;</span>';
	if ( is_day() ) { /* 日別アーカイブ */
		echo '<a href="';
		echo get_year_link(get_query_var('year'));
		echo '">';
		echo get_query_var('year');
		echo '年</a>';
		echo '<span>&nbsp;</span>';
		echo '<a href="';
		echo get_month_link(get_query_var('year'), get_query_var('monthnum'));
		echo '">';
		echo get_query_var('monthnum');
		echo '月</a>';
		echo '<span>&nbsp;</span>';
		echo get_query_var('day');
		echo '日';
	} elseif (is_month() ) { /* 月別アーカイブ */
		echo '<a href="';
		echo get_year_link(get_query_var('year'));
		echo '">';
		echo get_query_var('year');
		echo '年</a>';
		echo '<span>&nbsp;</span>';
		echo get_query_var('monthnum');
		echo '月';
	} elseif ( is_year() ) { /* 年別アーカイブ */
		echo get_query_var('year');
		echo '年';
	}
} else { /* 上記に当てはまらないページ */
	echo '<span>&nbsp;</span>';
	wp_title('', true);
	// wp_title(' | ', true, 'right');
}
?>
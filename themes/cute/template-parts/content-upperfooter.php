<?php
get_search_form();
?>
<div class="upper-footer">
<h2>人気記事</h2>
<?php
$wpp = array (
	'range' => 'monthly', /* 集計期間の設定（daily,weekly,monthly） */
	'limit' => 5, /* 表示数はmax5記事 */
	'post_type' => 'post', /* 投稿のみ指定（固定ページを除外） */
	// 'title_length' => '10', /*タイトル文字数上限 functions.php 意味なし*/
);
wpp_get_mostpopular($wpp);
?>
<h2>最新記事</h2>
<ul class="news-list">
<?php
$postslist = get_posts('numberposts=5&orderby=post_date&order=DESC"');
//$postslistにget_postsで取得したデータを入れる
foreach ($postslist as $newpost) : setup_postdata($newpost);
$youtube = nl2br( esc_html( $newpost->youtube ) );
$youtubeId = str_replace("https://www.youtube.com/watch?v=","",$youtube);
?> 
<li><a href="<?php echo $newpost->guid; // the_permalink();?>" class="row"><?php
echo '<img src="' . get_stylesheet_directory_uri() . '/images/space.gif" width="50" height="50" style="background-image:url(http://i.ytimg.com/vi/' . $youtubeId . '/mqdefault.jpg)" class="fleft" />';
echo '<div class="fright">';
if(mb_strlen($newpost->post_title) > 30) {
	$title= mb_substr($newpost->post_title, 0, 30);
	echo $title . '...';
} else {
	echo $newpost->post_title;
}
echo '</div>';
?></a>
</li>
<?php endforeach; ?>
</ul>
<h2>週間人気記事</h2>
<?php
$wpp2 = array (
	'range' => 'weekly', /* 集計期間の設定（daily,weekly,monthly） */
	'limit' => 5, /* 表示数はmax5記事 */
	'post_type' => 'post', /* 投稿のみ指定（固定ページを除外） */
);
wpp_get_mostpopular($wpp2);
?>
<h2>TWITTER</h2>
<div class="twitter-area">
<a class="twitter-timeline"  href="https://twitter.com/cute_campus" data-widget-id="699796566912008192">@cute_campusさんのツイート</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>
<h2>FACEBOOK</h2>
<div class="facebook-area">
<div class="fb-page" data-href="https://www.facebook.com/cute.campus.ehime/" data-tabs="timeline" data-width="300" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/cute.campus.ehime/"><a href="https://www.facebook.com/cute.campus.ehime/">Cute.Campus</a></blockquote></div></div>
</div>
<?php
global $post;
$post_id = $post->ID;
// echo $post_id;
$tags_arr = get_the_tags($post_id);
if(is_single() && $tags_arr){
	// var_dump($tags_arr);
	echo '<h3 class="tags-ttl">タグ</h3>';
	echo '<ul class="tags">';
	foreach($tags_arr as $key => $val ){
		echo '<li>';
		echo '<a href="/tag/'.$val->slug.'">'.$val->name.'</a><br/>';
		// echo $val->name ; 
		echo '</li>';
	}
	echo '</ul>';
}
?>
</div><!-- .upper-footer -->
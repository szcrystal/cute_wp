<?php
//get_search_form();
?>
<div class="rank clear">
<section>
    <h2>MOST POPULAR</h2>
<?php
    $wpp = array (
        'range' => 'monthly', /* 集計期間の設定（daily,weekly,monthly） */
        'limit' => 10, /* 表示数はmax5記事 */
        'post_type' => 'post',
        'wpp_start' => '<div class="wrap-list">',
        'wpp_end' => '</div>',
        //'rating' => 1,
        //"<article>{thumb}<div class=\"fright\"><h3 class=\"entry-title\">{text_title}</h3><div class=\"entry-meta\">{date}</div><div class=\"cover-bl\"><a href=\'{url}\'>VIEW DETAIL</a></div></article>"
    );
    
    wpp_get_mostpopular($wpp);
    //print_r($obj);
    ?>
        
</section>

<?php if(! is_front_page()) : ?>

<section class="newposts">
<h2>NEW POSTS</h2>
<div class="wrap-list">
<?php
//$postslist = get_posts('numberposts=10&orderby=post_date&order=DESC"');

$newQuery = new WP_Query(
    array(
       'post_type'=> 'post',
       'posts_per_page'=> 10,
       'post_status' => 'publish',
        'orderby'=>'date ID',
        'order'=>'DESC',
    )
);
    
if ( $newQuery -> have_posts() ) : 
    while ( $newQuery->have_posts() ) : $newQuery->the_post();
        
        $yUrl = get_post_meta(get_the_ID(), 'youtube', true);
        $yId = str_replace("https://www.youtube.com/watch?v=", "", $yUrl);

//$postslistにget_postsで取得したデータを入れる
//foreach ($postslist as $newpost) : setup_postdata($newpost);
//$youtube = nl2br( esc_html( $newpost->youtube ) );
//$youtubeId = str_replace("https://www.youtube.com/watch?v=","",$youtube);
?>

<article class="index">
	<img src="http://i.ytimg.com/vi/<?php echo $yId; ?>/mqdefault.jpg" class="fleft" />
    <div class="fright">
        <h3 class="entry-title"><?php title_exc(get_the_title(), 35); ?></h3>
    </div>

    <div class="entry-meta">
        <i class="fa fa-calendar-o"></i><?php the_time('Y/n/j'); ?>
    </div>

    <div class="cover-bl">
        <a href="<?php the_permalink(); ?>" class="row"><?php //echo $newpost->guid; ?>
        	<span>view detail</span>
        	<div class="ww"></div>
            <div class="hh"></div>
        </a>
    </div>
</article>
<?php endwhile;
endif;
wp_reset_query();
?>

</div>
</section>

<section>
<h2>WEEKLY POPULAR</h2>
<?php
$wpp2 = array (
	'range' => 'weekly', /* 集計期間の設定（daily,weekly,monthly） */
	'limit' => 10,
	'post_type' => 'post', 
    'wpp_start' => '<div class="wrap-list">',
    'wpp_end' => '</div>',
);
wpp_get_mostpopular($wpp2);
?>
</section>

<section>
    <!-- <h2>SNS</h2> -->

    <div class="wrap-list sns-box">
    	<div class="clear">
            <div class="twitter-area">
            <h3>TWITTER</h3>
            <a class="twitter-timeline"  href="https://twitter.com/cute_campus" data-widget-id="699796566912008192">@cute_campusさんのツイート</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>

            <div class="facebook-area">
                <h3>FACEBOOK</h3>
                <div class="fb-page" data-href="https://www.facebook.com/cute.campus.ehime/" data-tabs="timeline" data-width="450" data-height="300" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true">
                    <div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/cute.campus.ehime/">
                        <a href="https://www.facebook.com/cute.campus.ehime/">Cute.Campus</a></blockquote>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="ban-area">
        	<?php                 
                if($banID = idBySlug('banner')) {
                	$p = get_post($banID);
   	             	echo $p-> post_content;
                }
            ?> 

        </div>

    </div>
</section>

<?php endif; ?>

</div><!-- .rank -->

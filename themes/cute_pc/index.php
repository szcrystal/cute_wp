<?php
/**
 * The main template file.
 *
 */
get_header(); ?>

<div class="wrap-cal" data-speed="2.5" data-y="50">
    <div class="cal">
    	<?php
        /* 動画更新の入力方法 ==============================================
            	フォーマット（下記をコピペしてもいいです）---------------
                
                'file-name',
                
                --------------------------------------------------
                １）' '（シングルクォーテーション）の中にファイル名を入力し、末尾に,（カンマ）を付ける
                ２）削除する場合はフォーマットごと削除する。（ファイル名のみを消して『 '', 』と残すのではなく、１行ごと全て丸々削除する）
                ３）新規に増やす場合は、末行を改行して「動画更新部分 ここまで」の上部にフォーマットごと追加する
        
        ================================================================= */
            $v = array(
                
                /* 動画更新部分 ここから *************************************** */
                'inaki', /*動画更新部分 ここの''の中にファイル名を記載 */
                'item_1',
                'item_2',
                
                /* 動画更新部分 ここまで *************************************** */
            
            );

            $selectV = $v[rand(0, count($v)-1)];
            $video = 'images/mv/'. $selectV .'.mp4';
            $image = 'images/mv/'. $selectV .'.png';
            $loader = 'images/mv/loader.gif';
        ?>

    	<video id="mainMv" loop muted="1" width="1024" height="576" poster="<?php thisUrl($image); ?>"<?php if(isAgent('tab')) echo ' controls="controls"'; ?>>
        	<?php /* autoplay loop tabindex="0" */ ?>
            <source src="<?php thisUrl($video); ?>" type='video/mp4' />
            <?php /* video/mp4; codecs="avc1.42E01E, mp4a.40.2" */ ?>

        </video>
        <?php if(! isAgent('tab')) { ?>

        <img src="<?php thisUrl($loader); ?>" class="agif">
        <?php } ?>

    </div>
</div>



<div id="content" class="site-content">

<div class="bl-belt clear">
	<div class="wrap-list">

    <?php
	$new_query = new WP_Query(
        array(
           //'cat'=>$val->cat_ID,
           'post_type'=> 'post',
           'posts_per_page'=> 6,
           'post_status' => 'publish',
            'orderby'=>'date ID',
            'order'=>'DESC',
        )
    );

    if ( $new_query -> have_posts() ) :
        while ( $new_query->have_posts() ) : $new_query->the_post();

            $yUrl = get_post_meta(get_the_ID(), 'youtube', true);
            $yId = str_replace("https://www.youtube.com/watch?v=", "", $yUrl);

            //get_template_part( 'template-parts/content', 'index' );
            ?>

            <article class="index">
                <img src="http://i.ytimg.com/vi/<?php echo $yId; ?>/mqdefault.jpg" class="fleft" />
                <div class="cover-bl">
                    <a href="<?php the_permalink(); ?>" data-text="top">
                        <div class="fright">
                        	<h3 class="entry-title"><?php title_exc(get_the_title(), 20); ?></h3>
                    	</div>
                    </a>
                </div>
            </article>

            <?php
            //<a href="' . get_the_permalink($p->id) . '" class="my-custom-title-class row" title="' . $p->title . '">';
        //    $output .= '<div class="entry-meta">' . $date . '</div>';
        //    $output .= '<div class="cover-bl"><a href="'. get_the_permalink($p->id) .'" rel="bookmark" class="entry-item row"><span>VIEW DETAIL</span></a></div>';
            //$output .= '</article>';

            //echo $output;

        endwhile;

	endif;

    wp_reset_query();
?>

	</div>
</div>

	<div id="primary" class="content-area clear">
		<main id="main" class="site-main" role="main">

        <?php

        $otherID = get_cat_ID( 'others' );

        $args = array( //for Category Arg
            'type' => 'post',
            //'exclude' => $otherID,
            'orderby' => 'ID',
            'order' => 'ASC',

        );

        $cates = get_categories( $args );
        $cates = otherSetToArrEnd($cates);

        foreach($cates as $val) {

        	$query = new WP_Query(
            	array(
                   'cat'=>$val->cat_ID,
                   'post_type'=>'post',
                   'orderby'=>'date ID',
                   'order'=>'DESC',
                   'posts_per_page'=>8,
//                  'post_status' => 'publish',
//                  'post_type' => 'post',
                )
            );


		if ( $query -> have_posts() ) :
        ?>

			<section>
            	<h2><?php echo ud($val->slug); ?></h2>
                <div class="wrap-list">

        <?php
			/* Start the Loop */
			while ( $query->have_posts() ) : $query->the_post();

				get_template_part( 'template-parts/content', 'index' ); //From Main template

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

        //wp_reset_postdata();

        ?>

        	<div class="more">
        		<a href="<?php echo get_category_link($val->cat_ID); ?>">MORE<i class="fa fa-angle-double-right"></i></a>
            </div>

            </div>
        </section>

        <?php
        	wp_reset_query();
        } //foreach

        ?>

		</main><!-- #main -->
	</div><!-- #primary -->

    <?php get_template_part( 'template-parts/content', 'rank' ); ?>

<?php
//get_sidebar();
get_footer();
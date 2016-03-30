<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		// echo get_post_meta($post->ID , 'youtube' ,true);
		// $youtube = get_post_meta($post->ID , 'youtube' ,true);
		$youtube = nl2br( esc_html( $post->youtube ) );
		global $wp_embed;
		$post_embed = $wp_embed->run_shortcode('[embed width="880"]' . $youtube . '[/embed]');
		if ($youtube) {
			echo '<div class="youtube">';
			echo $post_embed;
			echo '</div>';
		}
        
		// $youtubeId = str_replace("https://www.youtube.com/watch?v=","",$youtube);
		// echo $youtubeId;
		// echo '<img src="http://i.ytimg.com/vi/' . $youtubeId . '/mqdefault.jpg" />';
		?>





<?php //$share_url = home_url().$_SERVER['REQUEST_URI']; 
	//echo $share_url;
?>

<div class="sns-share clear">
	<ul class="clear">
		<li>
        	<a data-url="<?php the_permalink(); ?>" href="https://twitter.com/share" class="twitter-share-button" data-lang="ja" data-count="vertical" data-dnt="true" target="_blank"></a>
        </li>

		<li>
        	<div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="200" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>
        </li>
	</ul>

</div>
        
        
        <div class="inner-entry-header">
		<?php // カテゴリー表示
        //$cat = get_the_category();
        //$cat = $cat[0];
        //echo "$cat->cat_name"; ?>
        
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <div class="entry-meta">
        	<?php the_time('Y/n/j'); ?>  
        	<?php _s_entry_footer(); ?>
        </div>
    	
        <div class="author-avatar-single row">
            <?php
                $author_bio_avatar_size = apply_filters( 'twentysixteen_author_bio_avatar_size', 100 );
                echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
                echo '<div class="fright">' . get_the_author() . "</div>";
            ?>
			</div><!-- .author-avatar-single -->
		</div><!-- .inner-entry-header -->
	</header><!-- .entry-header -->

	<?php // twentysixteen_excerpt(); ?>

	<?php // twentysixteen_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //the_date(); // twentysixteen_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

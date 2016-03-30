<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php // twentysixteen_excerpt(); ?>

	
		<?php
        
			$link = get_permalink();
			$youtube = nl2br( esc_html( $post->youtube ) );
			$youtubeId = str_replace("https://www.youtube.com/watch?v=","",$youtube);
			// echo '<img src="http://i.ytimg.com/vi/' . $youtubeId . '/mqdefault.jpg" width="100" height="auto" class="fleft" />';
			if ( mb_strlen($post->post_title, 'UTF-8') > 22 ) {
				$title= mb_substr($post->post_title, 0, 22, 'UTF-8');
				// echo $title.'…';
				$title .= '...';
			} else {
				// echo $post->post_title;
				$title = $post->post_title;
			}
			echo '<a href="' . $link . '" rel="bookmark" class="entry-item row">';
			
            /* ★★　***** */
            //echo '<img src="' . get_stylesheet_directory_uri() . '/images/index-img-icon-base.png" width="90" height="70" style="background-image:url(http://i.ytimg.com/vi/' . $youtubeId . '/mqdefault.jpg)" class="fleft" />';
            
            echo '<img src="' . get_template_directory_uri() . '/images/index-img-icon-base.png" width="90" height="70" style="background-image:url(http://i.ytimg.com/vi/' . $youtubeId . '/mqdefault.jpg)" class="fleft" />';
            
			echo '<div class="fright">';
			// the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			// the_title( '<h2 class="entry-title">', '</h2>' );
			echo '<h2 class="entry-title">' . $title . '</h2>';
			the_excerpt();
			echo '</div>';
			echo '</a><!-- .entry-item -->';

			/* translators: %s: Name of current post */
			//the_content( sprintf(
			//	__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
			//	get_the_title()
			//) );

			//wp_link_pages( array(
			//	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
			//	'after'       => '</div>',
			//	'link_before' => '<span>',
			//	'link_after'  => '</span>',
			//	'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
			//	'separator'   => '<span class="screen-reader-text">, </span>',
			//) );
		?>

</article><!-- #post-## -->

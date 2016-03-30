<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */
 
//if(isNameAdmin()) echo get_the_ID();
?>

<article id="post-<?php the_ID(); ?>" class="index">
	<?php
    		$link = get_permalink();
			$youtube = nl2br( esc_html( $post->youtube ) );
			$youtubeId = str_replace("https://www.youtube.com/watch?v=","",$youtube);
			// echo '<img src="http://i.ytimg.com/vi/' . $youtubeId . '/mqdefault.jpg" width="100" height="auto" class="fleft" />';
//			if ( mb_strlen($post->post_title, 'UTF-8') > 22 ) {
//				$title= mb_substr($post->post_title, 0, 22, 'UTF-8');
//				// echo $title.'…';
//				$title .= '...';
//			} else {
				// echo $post->post_title;
				$title = $post->post_title;
			//}
			//echo '<a href="' . $link . '" rel="bookmark" class="entry-item row">';
			//echo '<img src="http://i.ytimg.com/vi/' . $youtubeId . '/mqdefault.jpg" class="fleft" />';

			//echo '</a><!-- .entry-item -->';
	?>
    
        <img src="http://i.ytimg.com/vi/<?php echo $youtubeId; ?>/mqdefault.jpg" class="fleft" />
        <div class="fright">
            <h3 class="entry-title"><?php title_exc($title, 45); ?></h3>
        </div>
        <div class="entry-meta">
            <i class="fa fa-calendar-o"></i><?php the_time('Y/n/j'); ?>
        </div>
        
        <div class="cover-bl">
        	<a href="<?php echo $link; ?>" rel="bookmark" class="entry-item row">
            	<span>view detail</span>
            	<div class="ww"></div>
        		<div class="hh"></div>
            </a>
            
        </div>   	
</article>

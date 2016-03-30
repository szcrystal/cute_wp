<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="content" class="site-content">

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				/**
				 * Avatar Image URL
				 */
				function cute_get_avatar_url($id_or_email, $size = null, $default = null, $alt = null) {
					$image = get_avatar($id_or_email, $size, $default, $alt);
					preg_match('/<img.*src\s*=\s*[\"|\'](.*?)[\"|\'].*>/i', $image, $match);
					// var_dump($match);
					// var_dump($match[1]);
					if($match) {
						if(isset($match[1])) {
							return $match[1];
						} else {
							return false;
						}
					} else {
						return false;
					}
				}
				echo '<div class="pagination-wrap" style="background-image:url(';
				// echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
				// echo cute_get_avatar_url( $post->post_author );
				echo ');">';
				echo '<style type="text/css">.nav-previous:after{content:"";background-image:url(';
				echo cute_get_avatar_url( $post->post_author );
				echo ');}</style>';
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
				echo '</div>';
			}

			// End of the loop.
		endwhile;
		?>
		<?php get_template_part( 'template-parts/content', 'upperfooter' ); // get_search_form(); ?>
	</main><!-- .site-main -->

	<?php // get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>

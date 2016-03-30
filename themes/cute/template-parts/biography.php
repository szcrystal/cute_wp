<?php
/**
 * The template part for displaying an Author biography
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<div class="author-info-single">
	<h2 class="author-bio-ttl">モデルプロフィール</h2>
	<div class="author-bio-content">
		<?php // the_author_meta( 'description' ); ?>
		<?php echo wpautop(get_the_author_meta( 'description' )); ?>
		<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
			<?php printf( __( 'View all posts by %s', 'twentysixteen' ), get_the_author() ); ?>
		</a>
	</div><!-- .author-bio -->
</div><!-- .author-info -->

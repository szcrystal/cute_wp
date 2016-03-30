<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>

	<footer id="colophon" class="site-footer" role="contentinfo">
    	
        <div class="site-info">
        
        	<?php wp_nav_menu( array( 'menu_id' => 'Footer-Page-Menu' ) ); ?>
    
			<div>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php thisUrl('images/logo.png'); ?>"></a>
                <p>あなたの身近な美人学生が地元の情報を発信する動画マガジン</p>
                <small>&copy; Cute Campus</small>
            </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
    
    </div><!-- #content -->
</div><!-- #page -->

<?php wp_footer(); ?>

<span class="top_btn"><i class="fa fa-angle-up"></i></span>
</body>
</html>

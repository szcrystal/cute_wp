<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header(); ?>


<div id="content" class="site-content">

	<div id="primary" class="content-area clear">
		<main id="main" class="site-main" role="main">

		<?php
        
		while ( have_posts() ) : the_post();
        	        
			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation(array(
                'prev_text' => '<i class="fa fa-angle-left"></i>',
                'next_text' => '<i class="fa fa-angle-right"></i>'
            ));

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
        
        wp_reset_query();
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

	
    	
    <?php get_template_part( 'template-parts/content', 'rank' ); ?>


<?php 
//get_sidebar();
get_footer();


<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<div class="wrap-cal" data-speed="2.5" data-y="50">
    <div class="cal">
    	
<?php
    if ( is_home() || is_category() ) {
        $slideID = isLocal() ? 412 : 466;
        echo do_shortcode("[metaslider id={$slideID}]");
        //echo do_shortcode("[metaslider id=466]");
    }
?>

    </div>
</div>

<div id="content" class="site-content">
<?php //echo __FILE__; ?>

	<div id="primary" class="content-area clear">
		<main id="main" class="site-main" role="main">
        	
        <?php
		if ( have_posts() ) : ?>
        
        	<h2><?php	
            	if(is_category()) { 
                	$catObj = get_category( $cat ); //$cat:cat_ID
            		echo ud($catObj->slug);
                } 
                elseif(is_tag()) {
                	echo single_tag_title('TAG : ');
                } 
                else {
                	the_archive_title();
                }
            ?></h2>

        <?php
            //the_archive_title( '<h2>', '</h2>' );
            //the_archive_description( '<div class="taxonomy-description">', '</div>' );
        ?>
                
			<div class="wrap-list clear">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				//get_template_part( 'template-parts/content', get_post_format() );
				get_template_part( 'template-parts/content', 'index' );
			endwhile;
			?>
            
            </div>
            
			<?php 
            //the_posts_navigation();
			set_pagenation(); 
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; 
        
        ?>

		</main><!-- #main -->
	</div><!-- #primary -->
    
    <?php get_template_part( 'template-parts/content', 'rank' ); ?>

<?php
//get_sidebar();
get_footer();


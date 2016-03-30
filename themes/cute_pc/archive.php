<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>

<div class="wrap-cal" data-speed="2.5" data-y="50">
    <div class="cal">
    	
<?php if ( is_home() || is_category() ) {
		if(isLocal())
	        echo do_shortcode("[metaslider id=410]");
        else
        	echo do_shortcode("[metaslider id=466]");
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
        
        	<h2>
            <?php	
            	if(is_category()) { 
                	$catObj = get_category( $cat );
            		echo $catObj->slug;
                } 
                elseif(is_tag()) {
                	echo single_tag_title('TAG : ');
                } 
                else {
                	the_archive_title();
                }
            ?>
            </h2>
            <div class="clear">
        <?php
       
//        	$query = new WP_Query(
//            	array(
//                   'cat' => $cat,
//                   'post_type'=>'post',
//                   'posts_per_page'=>16,
//                	'paged'=> get_query_var('paged') ? get_query_var('paged') : 1,
////                   'post_type' => array('shop', 'post', 'news'),
////                                    'post_status' => 'publish',
////                                    //'post_type' => 'post',
////                                    'posts_per_page' => 10,
////                                    'orderby'=>'date ID',
////                                    'order'=>'DESC',
//                )
//            );
//            
//          while ( $query->have_posts() ) : $query->the_post();
//          	get_template_part( 'template-parts/content', 'index' );
//          endwhile;
          ?>
          
        </div>
        
        <?php //set_pagenation($query);  
        
//        }
//        else {
        ?>

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


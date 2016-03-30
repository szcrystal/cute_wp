<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package _s
 */

get_header(); ?>

<div id="content" class="site-content">

	<div id="primary" class="content-area clear">
		<main id="main" class="site-main" role="main">

		<?php
        
        //echo __FILE__;
        
		if ( have_posts() && get_search_query() != '') : ?>

            <h2><?php printf( esc_html__( 'Search Results for: %s', '_s' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
			
            <div class="wrap-list clear">
			
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'index' );

			endwhile;

			//the_posts_navigation();
            set_pagenation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
        
        </div>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_template_part( 'template-parts/content', 'rank' ); ?>

<?php
//get_sidebar();
get_footer();


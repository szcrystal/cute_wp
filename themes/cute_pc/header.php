<?php
/**
 * The header for our theme.
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="<?php thisUrl('css/font-awesome.min.css'); ?>">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<?php if(! is_home()) { ?>
<div id="fb-root"></div>
<script>    
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<?php } ?>

<div id="page" class="site">

	<header id="masthead" class="site-header clear" role="banner">
		<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png"></a></h1>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
            <ul class="clear">
            	<li><a href="<?php echo home_url('/'); ?>" title="TOP" rel="home">TOP</a><span></span></li>
            <?php 
            	//main-navigation Category Menu -------------
                $args = array(
                    'type' => 'post',
                    'orderby' => 'ID',
                    'order' => 'DESC',
                );
            
                $cates = get_categories( $args );
                $n = 1;
                $count = 6;
                
                foreach($cates as $val) {
                    $format = '<li><a href="'.get_category_link($val->cat_ID).'" title="'.$val->cate_name.'">'. $val->slug . '</a><span></span></li>'."\n";
                    
                    if($n > $count) //Separate Child ul Over 8 count
                        $sMenu[] = $format;
                    else 
                        echo $format;
                    
                    $n++;
                }
                
                if(count($sMenu) > 0) {
                    $out = '<li class="tgl-on"><i class="fa fa-caret-down"></i>'."\n".'<ul>'."\n"; //<li><i class="fa fa-caret-down"></i>'."\n".
                        
                    foreach($sMenu as $val) 
                    	$out .= $val;
                    
                    $out .= '</ul>'."\n".'</li>'."\n";

                    echo $out;
                }
            	//main-navigation Category Menu END -------------
                //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) );
            ?>
        
        	</ul>            
		</nav>
        <i class="fa fa-search"></i>
	</header>
    
    
    <?php get_search_form(true); ?>
    
    

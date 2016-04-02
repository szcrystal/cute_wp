<?php
/**
* スタイルシートファイルの指定
function newStyleseet_URI () {
	$styleseet_URI = "<link rel='stylesheet' href='" . get_stylesheet_uri() . "' type='text/css' media='all' />\n";
	echo $styleseet_URI;
}
add_action('wp_head', 'newStyleseet_URI', -999);
*/



add_action( 'wp_enqueue_scripts', 'hp_add_style' );
function hp_register_style() {
	// wp_register_style('home', get_bloginfo('stylesheet_directory')."/css/home.css", array(), NULL);
	wp_register_style('single', get_bloginfo('stylesheet_directory')."/css/single.css", array(), NULL);
	wp_register_style('page', get_bloginfo('stylesheet_directory')."/css/page.css", array(), NULL);
	wp_register_style('contact', get_bloginfo('stylesheet_directory')."/css/contact.css", array(), NULL);
	wp_register_style('merry', get_bloginfo('stylesheet_directory')."/css/merry.css", array(), NULL);
}
function hp_add_style() {
	hp_register_style();
	// Theme stylesheet.
    //if(isAgent('sp'))
	wp_enqueue_style( 'twentysixteen-style', get_stylesheet_uri() );
    
    //wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    
// 	if( is_front_page() ) {
// 		wp_enqueue_style('home');
// 	}
	if( is_single() ) {
		wp_enqueue_style('single');
	}
	if( is_page() ){
		wp_enqueue_style('page');
	}
	if( is_page( 'contact' ) ){
		wp_enqueue_style('contact');
	}
	if( is_page( array('merry-index', 'merry-form', 'merry-thanks') ) ) {
		wp_enqueue_style('merry');
	}
}

if( !is_admin() ){
	function tt_register_script(){
		wp_register_script('togglemenu', get_bloginfo('stylesheet_directory').'/js/togglemenu.js');
	}
	function add_script(){
		tt_register_script();
		wp_enqueue_script('togglemenu');
	}
	add_action('wp_enqueue_scripts','add_script');
}

/**
 * Excerpt text length.
 */
function new_excerpt_mblength($length) {
	return 16; //抜粋する文字数を12文字に設定
}
add_filter('excerpt_mblength', 'new_excerpt_mblength');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );

function meta_scheme_plugin_pre_get_document_title($title = '') {
	// ホームとフロントページについてはサイト名をタイトルとする
	if(is_home() || is_front_page()){
		if ( get_bloginfo( 'description' ) != '') {
			$title = get_bloginfo( 'name' ) . ' | ' . get_bloginfo( 'description' );
		} else {
			$title = get_bloginfo( 'name' );
		}
	}
	// wp_title()時代には以下の加工もしていたが、
	// 以下の条件下におけるtitle要素生成結果にはおおむね満足なので加工をやめた。
	// ・作成者アーカイブの場合は「作成者名作成者アーカイブ」をタイトルとする
	// ・日時アーカイブの場合、YYYYの後ろに「年」を、DDの後ろに「日」をつける
// 	if( is_singular() ){ //タイトルタグカスタマイズの範囲を条件分岐で指定
// 		 $post_id = get_the_ID(); //投稿IDを取得
// // 		 $my_title = get_post_meta( $post_id, 'my_title', true ); //カスタムフィールドの値を取得
// // 		 if( $my_title ){ //カスタムフィールドに値がある時
// // 			$title['title'] = esc_html( $my_title ); //ページタイトルの部分のみ上書き
// // 			return $title;
// // 		}
// 		$title = get_the_title( $post_id ). ' | ' . get_bloginfo( 'name', 'display' );
// 	}
	return $title;
}
add_filter( 'pre_get_document_title', 'meta_scheme_plugin_pre_get_document_title', 100, 1 );

/**
 * For Admin Screen Menu.
 */
if ( ! function_exists( 'cute_setup' ) ) :
function cute_setup() {
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'twentysixteen' ),
		'social'  => __( 'Social Links Menu', 'twentysixteen' ),
		'fpagenavi'  => __( 'Footer Page Menu', 'twentysixteen' ),
	) );
}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'cute_setup' );
/**
 * Registers a widget area.
 * For Admin Screen Menu.
 */
function cute_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentysixteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'twentysixteen' ),
		'id'            => 'footer-menu',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Header Toggle Menu', 'twentysixteen' ),
		'id'            => 'toggle-menu',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cute_widgets_init' );
/**
 * youTube
 */
if ( !function_exists( 'custom_embed_param' ) ) {
	function custom_embed_param( $html, $url, $attr ) {
		if ( strpos( $html, 'feature=oembed' ) !== false ){
			// return str_replace( 'feature=oembed', 'feature=oembed&autoplay=1', $html );
			return str_replace( 'feature=oembed', 'feature=oembed&rel=0', $html );
		} else {
			return $html;
		}
	}
}
add_filter( 'embed_oembed_html', 'custom_embed_param', 10, 3 );
/* 投稿記事内の画像パスショートコード及びウィジェット内でのショートコード実行
add_shortcode( 'spimgf', 'shortcode_spimgf' );
function shortcode_spimgf( $atts, $content = '' ) {
	$img_path = get_bloginfo('stylesheet_directory') . '/images/';
	return $img_path;
}
add_shortcode( 'imgf', 'shortcode_imgf' );
function shortcode_imgf( $atts, $content = '' ) {
	$img_path = get_bloginfo('stylesheet_directory') . '/../cloudtpl_707/images/';
	return $img_path;
}
add_filter('widget_text', 'do_shortcode'); */
/*
 * Display the title and the publish date
 */
function my_custom_single_popular_post( $post_html, $p, $instance ){
// 	var_dump($post_html);
// 	echo '<br />';
// var_dump($p);
// 	echo '<br />';
// 	var_dump($instance);
// 	echo '<br />';
	$custom_field = get_post_meta($p->id, 'youtube', true);
	$youtubeId = str_replace("https://www.youtube.com/watch?v=","",$custom_field);
	if ( mb_strlen($p->title, 'UTF-8') > 30 ) {
		$title= mb_substr($p->title, 0, 30, 'UTF-8');
		$title .= '...';
	} else {
		$title = $p->title;
	}
	$output = '<li><a href="' . get_the_permalink($p->id) . '" class="my-custom-title-class row" title="' . $p->title . '">';
	// $output .= $custom_field;
	$output .= '<img src="' . get_stylesheet_directory_uri() . '/images/space.gif" width="50" height="50"';
	$output .= 'style="background-image:url(http://i.ytimg.com/vi/' . $youtubeId . '/mqdefault.jpg)" class="fleft" />';
	$output .= '<div class="fright">' . $title  . '</div></a></li>';  
	return $output;
}
if(isAgent('sp')) /* ***** */
	add_filter( 'wpp_post', 'my_custom_single_popular_post', 10, 3 );


function cateMenuList() {
	$args = array(
        'orderby' => 'ID',
        'order' => 'ASC',
    );
    //'<li class="cat-item cat-item-'.$val->cat_ID.'"><a href="'.get_category_link($val->cat_ID).'" title="'.$val->name.'">'. $val->name . '</a></li>'."\n";
    
    $format = '<li class="cat-item cat-item-%1$s"><a href="' . get_category_link('%1$s') .'" title="%2$s">%2$s</a></li>'."\n";

    $cates = get_categories( $args );
    $other = '';
    
    $wrap = '<section id="categories-4" class="widget widget_categories">'."\n";
    $wrap .= '<h2 class="widget-title">カテゴリー</h2>'."\n";		
    $wrap .= "<ul>\n";
    
    foreach($cates as $val) {
        if($val -> slug != 'others')
            $wrap .= sprintf($format, $val->cat_ID, $val->name);
        else
            $other = sprintf($format, $val->cat_ID, $val->name);
    }
    
    if($other != '')
        $wrap .= $other;
    
    $wrap .= "</ul>\n</section>\n";
    
    echo $wrap;
}




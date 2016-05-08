<?php
/**
 * _s functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! function_exists( '_s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _s_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change '_s' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( '_s', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', '_s' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', '_s' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {
	//親テーマのFunctionsと絡むので注意
    //親の不要なenqueueをdequeue フックにて要100追加で遅らせる
    wp_dequeue_script('togglemenu');
    wp_deregister_script('togglemenu');
    
    
    wp_dequeue_style('twentysixteen-style');
    wp_deregister_style('twentysixteen-style');
    wp_dequeue_style('single');
    wp_deregister_style('single');
    wp_dequeue_style('page');
    wp_deregister_style('page');
    wp_dequeue_style('contact');
    wp_deregister_style('contact');
    wp_dequeue_style('merry');
    wp_deregister_style('merry');
    
    
	if(isAgent('tab'))
	    wp_enqueue_style( 'style-tab', get_stylesheet_directory_uri() . '/style-tab.css' );
	else
    	wp_enqueue_style( 'style', get_stylesheet_uri() );
    	

	wp_enqueue_script( '', get_stylesheet_directory_uri() . '/js/script.js', array(), '20160101', false );
	
	//wp_enqueue_script( '_s-navigation', get_stylesheet_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	//wp_enqueue_script( '_s-skip-link-focus-fix', get_stylesheet_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    
}
add_action( 'wp_enqueue_scripts', '_s_scripts', 100 ); //need arg->100


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';
require get_stylesheet_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_stylesheet_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_stylesheet_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_stylesheet_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_stylesheet_directory() . '/inc/jetpack.php';


/* ********************************************************************* */

function thisUrl($arg) {
	echo get_stylesheet_directory_uri(). '/' . $arg;
}

/* Custom Excerpt */
function sz_content($char_count) {

    $more_class = '';
    $texts = get_the_content('');
    
    $continue_format = '<a %shref="%s" title="%sのページへ"> …</a>';
    $continue_format = sprintf($continue_format, $more_class, esc_url(get_permalink()), get_the_title());
    
    $texts = strip_tags($texts); //htmlタグを消す
    $texts = str_replace("\n", '', $texts); //改行コード消し
    
    if(mb_strlen($texts) > $char_count+1) {
    	$texts = mb_substr($texts, 0, $char_count);
	    $texts = $texts . $continue_format;
	}
    
    echo "<p>" . $texts . "</p>";
}

function title_exc($title, $char_count, $bool = true) {
    $texts = $title;
    
    $texts = strip_tags($texts); //htmlタグを消す
    $texts = str_replace("\n", '', $texts); //改行コード消し
    
    if(mb_strlen($texts) > $char_count+1) {
    	$texts = mb_substr($texts, 0, $char_count);
        $texts = $texts . "…";
	}
    
    if($bool)
	    echo $texts;
    else
    	return $texts;
}

/* Pagenation */
function set_pagenation($queryArg = '') {
	
    if($queryArg != '') {
		global $wp_query;
		$wp_query->max_num_pages = $queryArg->max_num_pages; //$GLOBALS['wp_query']
    }
                   		
    the_posts_pagination(
    	array(
           'mid_size' => 1,
           'prev_text' => '<i class="fa fa-angle-left"></i>',
           'next_text' => '<i class="fa fa-angle-right"></i>',
           'screen_reader_text' => __( 'Posts navigation' ),
           'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'cm' ) . ' </span>',
    	)
    );
}

//Output popular post for PC
function popular_post_for_pc( $post_html, $p, $instance ){

	$custom_field = get_post_meta($p->id, 'youtube', true);
	$youtubeId = str_replace("https://www.youtube.com/watch?v=","",$custom_field);
    
    $date = date('Y/n/j', strtotime($p->date));
    
    
	$output = '<article class="index"><span class="rank-num"></span>'."\n";
    $output .= '<img src="http://i.ytimg.com/vi/' . $youtubeId . '/mqdefault.jpg" class="fleft" />'."\n";
    //<a href="' . get_the_permalink($p->id) . '" class="my-custom-title-class row" title="' . $p->title . '">';
	
	$output .= '<div class="fright"><h3 class="entry-title">' . title_exc($p->title, 35, false)  . '</h3></div>'."\n";
    $output .= '<div class="entry-meta"><i class="fa fa-calendar-o"></i>' . $date . '</div>'."\n";
    $output .= '<div class="cover-bl"><a href="'. get_the_permalink($p->id) .'" rel="bookmark" class="entry-item row">'."\n";
    $output .= '<span>view detail</span>'."\n";
    $output .= '<div class="ww"></div><div class="hh"></div>'."\n";
    $output .= '</a>'."\n".'</div>'."\n";
    $output .= '</article>'."\n"; 
     
	return $output;
}
add_filter( 'wpp_post', 'popular_post_for_pc', 10, 3 );


//change post num on 1page 
function change_postnum($query){
 
    $post_num = 16;
 
    if ($query->is_main_query()){
        set_query_var('posts_per_page', $post_num);
    }
}
add_action('pre_get_posts','change_postnum');


/* Empty Search */
function search_empty($search, $wp_query) {
    if(! is_admin()) {
        if(isset($_GET['s']) && $_GET['s'] == '' ) {
            $wp_query-> is_search = true; //元仕様はis_homeにフラグが立つので、それを解除
            $wp_query-> is_home = false;
		}
        
        return $search;
    }    
}
add_action('posts_search','search_empty', 10, 2);

/* ID by Slug */
function idBySlug($arg) {
    $page = get_page_by_path($arg);
    
    if($page)
        return $page->ID;
    else
        NULL;
}

/* url decode */
function ud($str) {
	return urldecode($str);
}

/* Caterogy Others set to End */
function otherSetToArrEnd($cateArr) { //Use In header index template-tag.php

	//添字振り直し get_categories()で取得した時に、postを持たないcategory分のkeyに穴が空くので。 後のarray_spliceに影響
    $cateArr = array_values($cateArr); // OR array_splice($cateArr, 0, 0);

	foreach($cateArr as $key => $val) {
        if($val->slug == 'others') {
            array_splice($cateArr, $key, 1); //remove 「Others」 once
            $cateArr[] = $val;
            break;
        }
    }
    
    return $cateArr;
}


/*Attachmentのパーマリンクを変える ***** */
//function wpd_attachment_link( $link, $post_id ){
//    $post = get_post( $post_id );
//    return home_url( '/attachment/' . $post->ID);
//}
//add_filter( 'attachment_link', 'wpd_attachment_link', 20, 2 );

/*Attachmentの編集時のフック ***** */
//function insert_custom_default_caption($post, $attachment) {
//    if ( substr($post['post_mime_type'], 0, 5) == 'image' ) {
//        if ( strlen(trim($post['post_title'])) == 0 ) {
//            $post['post_title'] = preg_replace('/\.\w+$/', '', basename($post['guid']));
//            $post['errors']['post_title']['errors'][] = __('Empty Title filled from filename.');
//        }
//        // captions are saved as the post_excerpt, so we check for it before overwriting
//        // if no captions were provided by the user, we fill it with our default
//        if ( strlen(trim($post['post_excerpt'])) == 0 ) {
//            $post['post_excerpt'] = 'default caption';
//        }
//    }
//	$post['post_name'] = 'a'.$post['post_name'];
//    
//	return $post;
//}
//add_filter('attachment_fields_to_save', 'insert_custom_default_caption', 10, 2);

/*Attachment新規追加時（アップロード時）フックを変えればPostにも可 ***** */
function filter_handler( $data , $postarr ) {
	$cates = get_categories();
    
    foreach($cates as $cate) {
    	if($cate->slug == $data['post_name']) {
        	$data['post_name'] = $data['post_name'].'-atc'. strtotime($data['post_date']);
            break;
        }
    }

	return $data;
}
//add_filter( 'wp_insert_post_data', 'filter_handler', '99', 2 );
add_filter( 'wp_insert_attachment_data', 'filter_handler', '99', 2 );



// -----------------------

function isLocal() {
    return strpos($_SERVER['SERVER_NAME'], '.dev') !== false;
}


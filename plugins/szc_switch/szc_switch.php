<?php
/*
Plugin Name: SZC Switch
Plugin URI: http://szc.cu.cc
Description: スウィッチ
Version: 1.2
Author: すずくりえいと
Author URI: http://szc.cu.cc
*/

//User Agent Check
function isAgent($agent) {

    $ua_sp = array('iPhone','iPod','Mobile ','Mobile;','Windows Phone','IEMobile');
    $ua_tab = array('iPad','Kindle','Sony Tablet','Nexus 7','Android Tablet');
    $all_agent = array_merge($ua_sp, $ua_tab);
    
    switch($agent) {
        case 'sp':
            $agent = $ua_sp;
            break;
    
        case 'tab':
            $agent = $ua_tab;
            break;
        
        case 'all':
            $agent = $all_agent;
            break;
            
        default:
            //$agent = '';
            break;
    }
       
    if(is_array($agent)) {
        $agent = implode('|', $agent);
    }
    
    return preg_match('/'. $agent .'/', $_SERVER['HTTP_USER_AGENT']);    
}

/* SP Theme Change */
if(! isAgent('sp')){
       
    function change_themes($stylesheet){
        return 'cute_pc'; //←Theme Nameではなくフォルダ名
    }
    add_filter( 'stylesheet' , 'change_themes', 10, 1 );
}
else {
    function add_vary_header( $headers ) {
        if ( ! is_admin() ) {
            $headers['Vary'] = 'User-Agent';
            return $headers;
        }
    }
    add_filter( 'wp_headers', 'add_vary_header' );
}


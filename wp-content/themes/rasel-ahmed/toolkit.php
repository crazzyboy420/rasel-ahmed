<?php
/**
 * Plugin Name: Toolkit
 * Version: 1.0
 * Description: required plugins this theme.
 * Author:Rasel Ahmed
 * Author URI: http://rasel-ahmed.unaux.com
 *
 * @package Toolkit
 */
//Exit if accessed directly
if(!defined('ABSPATH')){
    exit;
}

//load plugin text domain

load_plugin_textdomain( 'wowshop_toolkit', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 


//Define

define('WOWSHOP_ACC_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__) ) . '/');
define('WOWSHOP_ACC_PATH', plugin_dir_path( __FILE__ ));


function wowshop_theme_custom_post(){ 
    register_post_type( 'slide',
            array(
                'labels' => array(
                    'name'  => esc_html__('slides','wowshop_toolkit'),
                    'singular_name' => esc_html__('slide','wowshop_toolkit'),
                ),
                'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
                'public' => false,
                'show_ui' => true,
            ), 

    );

}
add_action( 'init', 'wowshop_theme_custom_post' );

//Home page 2 slider custom post
function wowshop_theme_2_custom_post(){ 
    register_post_type( 'slide_2',
            array(
                'labels' => array(
                    'name'  => esc_html__('Home-2','wowshop_toolkit'),
                    'singular_name' => esc_html__('slide','wowshop_toolkit'),
                ),
                'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
                'public' => false,
                'show_ui' => true,
            ), 

    );

}
add_action( 'init', 'wowshop_theme_2_custom_post' ); //end custom post


function wowshop_toolkit_get_as_slide() {
   $args = wp_parse_args(array(
       'post_type'  => 'slide',
       'numberposts' => -1,
   ));
    $posts = get_posts($args);

    $post_options = array(esc_html__( '--Select slide--', 'wowshop_toolkit' ) =>'');
    
    if($posts){
        foreach($posts as $post){
            $post_options[ $post -> post_title] = $post -> ID;
        }
    }
 
    return $post_options;
}
function wowshop_toolkit_get_as_slide_2() {
   $args = wp_parse_args(array(
       'post_type'  => 'product',
       'numberposts' => -1,
       'category' =>'Music',
   ));
    $posts = get_posts($args);

    $post_options = array(esc_html__( '--Select slide--', 'wowshop_toolkit' ) =>'');
    
    if($posts){
        foreach($posts as $post){
            $post_options[ $post -> post_title] = $post -> ID;
        }
    }
 
    return $post_options;
}
function wowshop_toolkit_get_as_page() {
   $args = wp_parse_args(array(
       'post_type'  => 'page',
       'numberposts' => -1,
   ));
    $posts = get_posts($args);

    $post_options = array(esc_html__( '--Select Page--', 'wowshop_toolkit' ) =>'');
    
    if($posts){
        foreach($posts as $post){
            $post_options[ $post -> post_title] = $post -> ID;
        }
    }
 
    return $post_options;
}
//Prit Shotcodes in widgets
add_filter('widget_text', 'do_shortcode');

//Loading Vc Addons
require_once(WOWSHOP_ACC_PATH.'/vc-addon/vc-blocks-load.php');

//Loading Shortcode

require_once(WOWSHOP_ACC_PATH.'theme-shortcode/slides-shortcode.php');
require_once(WOWSHOP_ACC_PATH.'theme-shortcode/promo-box-shortcode.php');
require_once(WOWSHOP_ACC_PATH.'theme-shortcode/popular-product-carousel-shortcode.php');
require_once(WOWSHOP_ACC_PATH.'theme-shortcode/recent-product-shortcode.php');


//Shortcode depend on Visual composer
include_once(ABSPATH. 'wp-admin/includes/plugin.php');
if(is_plugin_active( 'js_composer/js_composer.php' )){
   // require_once(STOCK_ACC_PATH . 'theme-shortcodes/staff-shortcode.php');
}


//registering WOW SHOP toolkit files
function wowshop_toolkit_files(){
    wp_enqueue_style( 'owl-carousel', plugin_dir_url( __FILE__ ) . 'assets/css/owl.carousel.min.css',array(),'2.3.0','all' );
    wp_enqueue_style( 'wowshop-toolkit', plugin_dir_url( __FILE__ ) . 'assets/css/wowshop-toolkit.css', array(),'1.0', 'all');

    wp_enqueue_script( 'owl-carousel', plugin_dir_url( __FILE__ ) .'assets/js/owl.carousel.min.js',array('jquery'), '2.3.0', true);
}
add_action( 'wp_enqueue_scripts', 'wowshop_toolkit_files' );

add_action( 'woocommerce_before_single_product_summary' , 'bbloomer_add_below_prod_gallery', 5 );
 
function bbloomer_add_below_prod_gallery() {
   echo '<span>Sell your </span>';
}


function sv_add_text_above_wc_shop_image() {
    
    echo '<h4 style="text-align: center;">Some sample text</h4>';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'sv_add_text_above_wc_shop_image', 9 );
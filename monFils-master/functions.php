<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:
if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'boostrap','select2','owl-carousel','stm-font-awesome-5','fancybox','lightbox','stm-theme-animate','stm-theme-icons','perfect-scrollbar','stm-theme-default-styles','stm-theme-default-styles','stm_megamenu' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 160 );

// END ENQUEUE PARENT ACTION

$splash_inc_path = get_template_directory() . '/includes';

// Enqueue scripts and styles for theme.
require_once( $splash_inc_path . '/enqueue.php' );

function register_my_menus() {
	register_nav_menus(
	array(
	'menu-jeux' => __( 'Menu Jeux' ),
	'menu-test' => __( 'Menu Test' ),
	)
	);
   }
   add_action( 'init', 'register_my_menus' );

   add_filter( 'template_redirect', function() {
    if ( wpmem_is_blocked() && ! is_user_logged_in() ) {
        wpmem_redirect_to_login();
    }
});

function membre_connect_shortcode($atts, $content = null) {
   if (is_user_logged_in() && !is_null($content) && !is_feed()) {
   return do_shortcode($content);
   }
   return ;
}
add_shortcode('membre', 'membre_connect_shortcode');
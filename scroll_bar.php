<?php
/**
* Plugin Name: NT scrollbar plugin
* Plugin URI: https://github.com/ntamasM/NT-scrollbar-wordpress-plugin
* Description: Create beautiful scroll bar for your site.
* Version: 0.0.1
* Author: Ntamas
* Author URI: https://github.com/ntamasM
**/


/**
 * Font Awesome Kit Setup
 * 
 * This will add your Font Awesome Kit to the front-end, the admin back-end,
 * and the login screen area.
 */
add_action( 'admin_enqueue_scripts', function ( $hook ) {
	if ( 'settings_page_scrollbar-settings-page' !== $hook ) {
		return;
	}
	wp_enqueue_script( 'font-awesome-kit', 'https://kit.fontawesome.com/698bae23c6.js');
} );

require_once plugin_dir_path( __FILE__ ) . 'admin/create_scroll_bar_settings.php';
require_once plugin_dir_path( __FILE__ ) . 'public/export_scroll_bar_settings.php';


add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
function load_admin_styles() {
    wp_enqueue_style( 'admin_scroll_bar_css', plugins_url( '/admin/css/scroll_bar_settings_page.css', __FILE__ ), false, '1.0', 'all' ); // Inside a plugin
}

$scrollbarCreation = new scrollbarCreation();

add_action('wp_enqueue_scripts', 'add_my_style_to_front_end');

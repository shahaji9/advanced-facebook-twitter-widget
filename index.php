<?php
/*
  Plugin Name: Advanced Facebook Twitter Widget
  Description: A powerful Facebook and Twitter widgets and shortcode integration that allows you to display facebook (likes, timeline, events and messages), twitter follow button and twitter timeline for your wordpress website.
  Version: 1.2
  Author: Shahaji Deshmukh
  Author URI: https://profiles.wordpress.org/shahaji9
  Plugin URI: https://wordpress.org/plugins/advanced-facebook-twitter-widget
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function sdaftw_activate() {
    
}
register_activation_hook(__FILE__, 'sdaftw_activate');

function sdaftw_deactivate() {
    
}
register_deactivation_hook(__FILE__, 'sdaftw_deactivate');

if (!defined('AFTW_WIDGET_PLUGIN_URL'))
    define('AFTW_WIDGET_PLUGIN_URL', plugin_dir_url(__FILE__));

if (!defined('AFTW_WIDGET_PLUGIN_BASE_URL'))
    define('AFTW_WIDGET_PLUGIN_BASE_URL', dirname(__FILE__));

/* * *********************************************
 * Frontend scripts and styles 
 * ******************************************** */
function sdaftw_frontend_scripts() {
    
    if (!is_admin()) {
        wp_enqueue_script('fbtw-widgets', plugins_url('fbtw-widgets.js', __FILE__), array('jquery'), '', true);        
    }
}

add_action('wp_enqueue_scripts', 'sdaftw_frontend_scripts');

// Place in Option List on Appearance >> Widgets 
function sdaftw_settings_actlinks($links, $file) {
    // Static so we don't call plugin_basename on every plugin row.
    static $my_plugin;

    if (!$my_plugin) {
        $my_plugin = plugin_basename(__FILE__);
    }

    if ($file == $my_plugin) {
        $settings_link = '<a href="widgets.php">' . __('Settings') . '</a>';
        array_unshift($links, $settings_link); // before other links
    }

    return $links;
}

add_filter('plugin_action_links', 'sdaftw_settings_actlinks', 10, 2);

/**
 * Async helper function.
 *
 * http://wordpress.stackexchange.com/questions/38319/how-to-add-defer-defer-tag-in-plugin-javascripts/38335#38335
 *
 * @since 1.2
 */
add_filter( 'script_loader_tag', 'sdaftw_async_loader', 10, 2 );
function sdaftw_async_loader( $tag, $handle ) {

	if ( 'fbtw-widgets' !== $handle ) {
		return $tag;
	}

	return str_replace( ' src', ' async="async" src', $tag );
}


//Include files
require_once(AFTW_WIDGET_PLUGIN_BASE_URL . '/fbtw-widgets.php');
require_once(AFTW_WIDGET_PLUGIN_BASE_URL . '/fbtw-widgets-shortcode.php');

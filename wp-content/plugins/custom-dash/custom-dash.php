<?php
/*
Plugin Name: Sweet Custom Dashboard
Plugin URL: Hello 
Description: A nice plugin to create your custom dashboard page
Version: 0.1
Author: Prabin Grg
Author URI: Hello 
Contributors: Prabin
Text Domain: Hello
*/


/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/
// plugin folder url
if(!defined('CS_DASH_PLUGIN_URL')) {
	define('CS_DASH_PLUGIN_URL', plugin_dir_url( __FILE__ ));
}

/*
|--------------------------------------------------------------------------
| MAIN CLASS
|--------------------------------------------------------------------------
*/

class Custom_Dashboard {

	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/

	/**
	 * Initializes the plugin
	 */
	function __construct() {
		add_action('admin_menu', array( &$this,'rc_scd_register_menu') );
		add_action('load-index.php', array( &$this,'rc_scd_redirect_dashboard') );
	} // end constructor

	function rc_scd_redirect_dashboard() {

		if( is_admin() ) {
			// $screen = get_current_screen();
			
			// if( $screen->base == 'dashboard' ) {

			// 	wp_redirect( admin_url( 'index.php?page=custom-dashboard' ) );
				
			// }
		}

	}

	function rc_scd_register_menu() {
		// add_dashboard_page( 'Custom Dashboard', 'Custom Dashboard', 'read', 'custom-dashboard', array( &$this,'rc_scd_create_dashboard') );
	}

	function rc_scd_create_dashboard() {
		// include_once( 'dash.php'  );
	}
}

// instantiate plugin's class
$GLOBALS['sweet_custom_dashboard'] = new Custom_Dashboard();
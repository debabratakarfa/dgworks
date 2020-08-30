<?php

/**
 * Core plugin functionality.
 *
 * @package    DGWorks
 */

namespace DGWorks\App;

use \WP_Error as WP_Error;
use DGWorks\Core as Core;
use DGWorks\Backend as Backend;
use DGWorks\Frontend as Frontend;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Default setup routine
 *
 * @return void
 */
function setup() {
	$n = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};
	add_action( 'init', $n( 'init' ) );
	add_action( 'DGWorks_init', $n( 'DGWorks_init' ), 10 );
	do_action( 'DGWorks_loaded' );
}

/**
 * Initializes the plugin and fires an action other plugins can hook into.
 *
 * @return void
 */
function init() {
	do_action( 'DGWorks_init' );
}

/**
 * DGWorksInit Apps function
 *
 * @return void Call function on DGWorksApps init.
 */
function DGWorks_init() {
	check_composer_install();
	load_api_classes();
	load_core_classes();
	load_cli_classes();
	load_backend_classes();
	load_frontend_classes();
}

/**
 * Check if Composer installed
 * -- If Installed and vendor folder not located then run
 * -- command to install composer component
 * If not installed then through WP_Error
 *
 * @return array Check if composer installed or not, if present then perform operation to install it.
 */
function check_composer_install() {
	if ( ! empty( shell_exec( 'composer --version' ) ) ) {
		if ( ! file_exists( DGWorks_PATH . '/vendor/autoload.php' ) ) {
			shell_exec( 'cd ' . DGWorks_PATH );
			shell_exec( 'composer isntall' );
			shell_exec( 'composer dump-autoload -o' );
			return new WP_Error( 'composer-installed', __( 'Composer and components installed', 'nts' ) );
		}
	} else {
		return new WP_Error( 'composer-not-available', __( 'Composer not installed', 'nts' ) );
	}
}

/**
 * Load Core Custom classes from Classes Core folder.
 *
 * @return void Loading pre-defined classes.
 */
function load_core_classes() {
	new Core\Activator();
	new Core\Deactivator();
	new Core\I18n();
}

/**
 * Load CLI Custom classes from Classes CLI folder.
 *
 * @return void Loading pre-defined classes.
 */
function load_cli_classes() { }

/**
 * Load API Custom classes from Classes API folder.
 *
 * @return void Loading pre-defined classes.
 */
function load_api_classes() { }

/**
 * Load Backend Custom classes from Classes Backend folder.
 *
 * @return void Loading pre-defined classes.
 */
function load_backend_classes() {
	new Backend\Affiliate();
	new Backend\Customer();
	new Backend\CustomOrderStatus();
	new Backend\DeliveryManager();
	new Backend\Order_Info();
	new Backend\StockManager();
	new Backend\Reports\StockAudit();
	new Backend\Reports\Tax();
}

/**
 * Load Frontend Custom classes from Classes Fronend folder.
 *
 * @return void Loading pre-defined classes.
 */
function load_frontend_classes() {
	new Frontend\Affiliate();
	new Frontend\Coupons();
	new Frontend\Styling\CartCheckout();
	new Frontend\Styling\CustomerProfile();
	new Frontend\Styling\ProductTabs();
	new Frontend\Styling\Styling();
}

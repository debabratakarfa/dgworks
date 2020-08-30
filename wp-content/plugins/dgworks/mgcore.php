<?php

/**
 * MicroGreen Shop Core plugin for all custom development.
 *
 * -- Development of API Feature.
 * -- Development of Admin Feature.
 * -- Development of CLI Feature.
 * -- Development of Frontend Feature.
 *
 * @link              https://www.deb.im
 * @since             1.0.0
 * @package           Mgcore
 *
 * @wordpress-plugin
 * Plugin Name:       MG Core Plugin
 * Plugin URI:        https://www.microgreenshop.com/
 * Description:       MG Core Plugin, for all custom features for Frontend, Backend, CLI and API functions.
 * Version:           1.0.0
 * Author:            Debabrata Karfa
 * Author URI:        https://www.deb.im
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mgcore
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MGCORE_VERSION', '1.0.0' );
define( 'MGCORE_URL', plugin_dir_url( __FILE__ ) );
define( 'MGCORE_PATH', plugin_dir_path( __FILE__ ) );
define( 'MGCORE_INC', MGCORE_PATH . '/' );
define( 'PLUGIN_NAME', 'mg-core' );

// Require Composer autoloader if it exists.
if ( file_exists( MGCORE_PATH . '/vendor/autoload.php' ) ) {
	require_once MGCORE_PATH . 'vendor/autoload.php';
}

// Include files.
require_once MGCORE_INC . 'app/app.php';

// Bootstrap.
MGCore\App\setup();

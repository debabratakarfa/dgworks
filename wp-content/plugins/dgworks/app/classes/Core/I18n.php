<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.deb.im
 * @since      1.0.0
 *
 * @package    DGWorks
 * @subpackage DGWorks/app
 */

namespace DGWorks\Core;

use \WP_Error as WP_Error;

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    DGWorks
 * @subpackage DGWorks/app
 * @author     Debabrata Karfa <im@deb.im>
 */
class I18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'mgcore',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
}

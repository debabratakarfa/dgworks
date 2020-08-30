<?php

/**
 * Fired during plugin activation
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
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    DGWorks
 * @subpackage DGWorks/app
 * @author     Debabrata Karfa <im@deb.im>
 */
class Activator {


	/**
	 * Activation hooks trigger.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        // First load the init scripts in case any rewrite functionality is being loaded.
        flush_rewrite_rules();
    }
}

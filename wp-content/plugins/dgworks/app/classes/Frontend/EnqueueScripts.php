<?php

/**
 * Enqueue Scripts Class.
 *
 * @package DGWorks
 */

namespace dgworks\Frontend;

use \WP_Error as WP_Error;

/**
 * Enqueue Scripts.
 *
 * @since      1.0.0
 * @package    DGWorks
 * @subpackage DGWorks/app/classes/Backend
 * @author     Debabrata Karfa <im@deb.im>
 */
class EnqueueScripts {
    /**
     * __construct function, running during init of Class.
     */
    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'frontend_styles_scripts' ) );
    }

    /**
     * Load frontend Style and script.
     *
     * @since    1.0.0
     * @return void Load CSS and JS files in frontend.
     */
    public function frontend_styles_scripts(){
        wp_enqueue_style( PLUGIN_NAME, DGWORKS_URL . 'assets/css/main.css', array(), DGWORKS_VERSION, 'all' );
        wp_enqueue_script( PLUGIN_NAME, DGWORKS_URL . 'assets/js/main.js', array( 'jquery', ), DGWORKS_VERSION, true );
        wp_localize_script(
            PLUGIN_NAME,
            'dkworks_ajax_obj',
            array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) )
        );
    }

}

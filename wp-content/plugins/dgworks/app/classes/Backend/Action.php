<?php

/**
 * DGWorks Form Submit Ajax Action.
 *
 * @package DGWorks
 */

namespace dgworks\Backend;

use \WP_Error as WP_Error;

/**
 * Ajax Action.
 *
 * @since      1.0.0
 * @package    DGWorks
 * @subpackage DGWorks/app/classes/Backend
 * @author     Debabrata Karfa <im@deb.im>
 */
class Action {
    /**
     * __construct function, running during init of Class.
     */
    public function __construct() {
        add_action( 'wp_ajax_dgworks_ajax_request', array( $this, 'dgworks_ajax_request_cb' ) );
        add_action( 'wp_ajax_nopriv_dgworks_ajax_request', array( $this, 'dgworks_ajax_request_cb' ) );
    }

    /**
     * Manage Ajax request and response.
     *
     * @return array Ajax response.
     */
    public function dgworks_ajax_request_cb() {
        if (
            ! isset( $_POST['fsac_nonce_field'] )
            || ! wp_verify_nonce( $_POST['fsac_nonce_field'], 'form_submission_ajax_action' )
        ) {

            print 'Sorry, your nonce did not verify.';
            exit;

        } else {

            // process form data
        }

    }

}

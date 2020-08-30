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

        $params = array();
        parse_str($_POST['form_data'], $params);

        if (
            ! isset( $params['fsac_nonce_field'] )
            || ! wp_verify_nonce( $params['fsac_nonce_field'], 'form_submission_ajax_action' )
        ) {
            $error = array( 'success' => false, 'data' => 'Bot not allowed here!' );
            wp_send_json_error($error, '200');
            exit;
        } else {

            if (trim($params['first_name']) === '') {
                $error = array( 'success' => false, 'data' => 'Kindly Add First Name' );
                wp_send_json_error($error, '200');
                exit;
            }

            if (trim($params['email']) === '') {
                $error = array( 'success' => false, 'data' => 'Kindly Add Last Name' );
                wp_send_json_error($error, '200');
                exit;
            }

            if (trim($params['email']) === '') {
                $error = array( 'success' => false, 'data' => 'Kindly Add email id' );
                wp_send_json_error($error, '200');
                exit;
            }

            if (trim($params['tos']) === '' && !isset($params['tos'])) {
                $error = array( 'success' => false, 'data' => 'Kindly Check TOS' );
                wp_send_json_error($error, '200');
                exit;
            }

            $full_name = $params['first_name'] . ' ' . $params['last_name'];
            $new_post = array(
                'post_title'    => $full_name,
                'post_status'   => 'publish',
                'post_type' => 'forms',
                'meta_input' => array(
                    'first_name' => $params['first_name'],
                    'last_name' => $params['last_name'],
                    'email' => $params['email'],
                    'phone' => $params['phonenumber'],
                    'country' => $params['country'],
                    'date_of_birth' => $params['dob'],
                )
            );

            // show the email in meta box
            $the_post_id = wp_insert_post($new_post);

            $response = array( 'success' => true );

            if ( isset( $the_post_id ) ) {
                $response['data'] = 'Form Submitted successfully!';
            }

            wp_send_json( $response, '200' );
        }

        // Always die in functions echoing ajax content.
        die();

    }

}

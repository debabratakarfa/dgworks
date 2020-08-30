<?php

// Useful global constants.
define( 'TN_CHILD_VERSION', '1.0.0' );
define( 'TN_CHILD_TEMPLATE_URL', get_stylesheet_directory_uri() );
define( 'TN_CHILD_PATH', get_stylesheet_directory_uri() . "/assets" );

function tn_child_theme_scripts() {
    wp_enqueue_style('child-theme', TN_CHILD_PATH . '/css/main.css', array(), TN_CHILD_VERSION, 'all');
    wp_enqueue_script('child-script', TN_CHILD_PATH . '/js/main.js', array('jquery'), TN_CHILD_VERSION, true);
    wp_localize_script(
        'child-script',
        'dgworks_ajax_obj',
        array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) )
    );
    wp_enqueue_script('jquery-modal', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js', array('jquery'), TN_CHILD_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'tn_child_theme_scripts');

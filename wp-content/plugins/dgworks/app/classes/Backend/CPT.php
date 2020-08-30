<?php

/**
 * DGWorks CPT Registering
 *
 *  @package DGWorks
 */

namespace DGWorks\Backend;

use \WP_Error as WP_Error;

/**
 * Registering CPT.
 *
 * @since      0.0.1
 * @package    DGWorks
 * @subpackage DGWorks/app/classes/Backend
 * @author     Debabrata Karfa <im@deb.im>
 */
class CPT {

	/**
	 * __construct function, running during init of Class.
	 */
	public function __construct() {
		add_action( 'dgworks_init', array( $this, 'cpt_register_dgworks_articles' ), 11 );
	}

	/**
	 * Registering DGWorks Articles CPT.
	 *
	 * @return void Register CPT.
	 */
	public function cpt_register_dgworks_articles() {

		// Set UI labels for Custom Post Type.
		$labels = array(
			'name'               => _x( 'Forms', 'Post Type General Name', 'dgworks' ),
			'singular_name'      => _x( 'Form', 'Post Type Singular Name', 'dgworks' ),
			'menu_name'          => __( 'Forms', 'dgworks' ),
			'parent_item_colon'  => __( 'Parent Form', 'dgworks' ),
			'all_items'          => __( 'All Forms', 'dgworks' ),
			'view_item'          => __( 'View Form', 'dgworks' ),
			'add_new_item'       => __( 'Add New Form', 'dgworks' ),
			'add_new'            => __( 'Add New', 'dgworks' ),
			'edit_item'          => __( 'Edit Form', 'dgworks' ),
			'update_item'        => __( 'Update Form', 'dgworks' ),
			'search_items'       => __( 'Search Form', 'dgworks' ),
			'not_found'          => __( 'Not Found', 'dgworks' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'dgworks' ),
		);

		// Set other options for Custom Post Type.
		$args = array(
			'label'               => __( 'Forms', 'dgworks' ),
			'description'         => __( 'DGWorks vote for content', 'dgworks' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor.
			'supports'            => array( 'title', 'author', 'thumbnail', 'revisions' ),
			'taxonomies'          => array( '' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);

		// Registering your Custom Post Type.
		register_post_type( 'Forms', $args );
	}
}

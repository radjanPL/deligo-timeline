<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://deligo.pl
 * @since      1.0.0
 *
 * @package    Deligo_Timeline
 * @subpackage Deligo_Timeline/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Deligo_Timeline
 * @subpackage Deligo_Timeline/admin
 * @author     Radosław Jankowski / deligo.pl <radoslaw.j@deligo.pl>
 */
class Deligo_Timeline_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		// register custom post type - timeline posts
		add_action('init', array($this, 'register_custom_post_type'));
		// register custom taxonomy for the CPT above 
		add_action('init', array($this, 'register_custom_taxonomy'));


	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Deligo_Timeline_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Deligo_Timeline_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/deligo-timeline-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Deligo_Timeline_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Deligo_Timeline_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/deligo-timeline-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register custom post type
	 *
	 * @since    1.0.0
	 */
	public function register_custom_post_type() {

		// Set labels for Custom Post TYpe
		$cptLabels = array(
			'name'                => _x('Timeline Posts', 'Post Type General Name', 'deligo-timeline'),
			'singular_name'       => _x('Timeline Post', 'Post Type Singular Name', 'deligo-timeline'),
			'menu_name'           => __('Timeline Posts', 'deligo-timeline'),
			'all_items'           => __('All Timeline Posts', 'deligo-timeline'),
			'view_item'           => __('View Timeline Post', 'deligo-timeline'),
			'add_new_item'        => __('Add New Timeline Post', 'deligo-timeline'),
			'add_new'             => __('Add New', 'deligo-timeline'),
			'edit_item'           => __('Edit Timeline Post', 'deligo-timeline'),
			'update_item'         => __('Update Timeline Post', 'deligo-timeline'),
		);
		 
		// Set options for Custom Post Type  
		$cptArgs = array(
			'label'               => __('Timeline Posts', 'deligo-timeline'),
			'description'         => __('Timeline plugin posts.', 'deligo-timeline'),
			'labels'              => $cptLabels,
			'supports'            => array('title', 'editor', 'author', 'custom_fields', 'thumbnail', 'revisions'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-media-text',
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'capability_type'     => 'post',
			'show_in_rest'        => true,
		);

		register_post_type('timeline-posts', $cptArgs);

	}

	/**
	 * Register custom taxonomy for custom post type
	 *
	 * @since    1.0.0
	 */

	public function register_custom_taxonomy() {  
		register_taxonomy(  
			'timeline-category',  
			'timeline-posts',        
			array(  
				'hierarchical' => true,  
				'label' => __( 'Timeline Posts categories', 'deligo-timeline' ),
				'query_var' => true,
				'has_archive' => false,
			)  
		);  
	}  

}

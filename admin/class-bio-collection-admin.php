<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://dasun.blog
 * @since      1.0.0
 *
 * @package    Bio_Collection
 * @subpackage Bio_Collection/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bio_Collection
 * @subpackage Bio_Collection/admin
 * @author     Dasun Edirisinghe <dazunj>
 */
class Bio_Collection_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 *
	 * @param      string $plugin_name The name of this plugin.
	 * @param      string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

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
		 * defined in Bio_Collection_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bio_Collection_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bio-collection-admin.css', array(), $this->version, 'all' );

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
		 * defined in Bio_Collection_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bio_Collection_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bio-collection-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function register_bio_collection_post_type() {

		$labels = array(
			'name'                  => _x( 'Persons', 'Post Type General Name', 'bio-collection' ),
			'singular_name'         => _x( 'Person', 'Post Type Singular Name', 'bio-collection' ),
			'menu_name'             => __( 'Persons', 'bio-collection' ),
			'name_admin_bar'        => __( 'Person', 'bio-collection' ),
			'archives'              => __( 'Person Archives', 'bio-collection' ),
			'attributes'            => __( 'Person Attributes', 'bio-collection' ),
			'parent_item_colon'     => __( 'Parent Person:', 'bio-collection' ),
			'all_items'             => __( 'All Persons', 'bio-collection' ),
			'add_new_item'          => __( 'Add New Person', 'bio-collection' ),
			'add_new'               => __( 'Add New', 'bio-collection' ),
			'new_item'              => __( 'New Person', 'bio-collection' ),
			'edit_item'             => __( 'Edit Person', 'bio-collection' ),
			'update_item'           => __( 'Update Person', 'bio-collection' ),
			'view_item'             => __( 'View Person', 'bio-collection' ),
			'view_items'            => __( 'View Persons', 'bio-collection' ),
			'search_items'          => __( 'Search Person', 'bio-collection' ),
			'not_found'             => __( 'Not found', 'bio-collection' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'bio-collection' ),
			'featured_image'        => __( 'Person Image', 'bio-collection' ),
			'set_featured_image'    => __( 'Set Person image', 'bio-collection' ),
			'remove_featured_image' => __( 'Remove Person image', 'bio-collection' ),
			'use_featured_image'    => __( 'Use as person image', 'bio-collection' ),
			'insert_into_item'      => __( '\Insert into person', 'bio-collection' ),
			'uploaded_to_this_item' => __( 'Uploaded to this person', 'bio-collection' ),
			'items_list'            => __( 'Persons list', 'bio-collection' ),
			'items_list_navigation' => __( 'Persons list navigation', 'bio-collection' ),
			'filter_items_list'     => __( 'Filter Persons list', 'bio-collection' ),
		);
		$args   = array(
			'label'               => __( 'Person', 'bio-collection' ),
			'description'         => __( 'This is to collect bio of persons', 'bio-collection' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'comments', 'page-attributes', 'excerpt' ),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-money',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'show_in_rest'        => true,
		);

		register_post_type( 'person', $args );

	}

	public function register_meta_data() {

		$text_domain  = TEXT_DOMAIN;
		$meta_boxes[] = array(
			'title'      => __( 'Other Infomations', $text_domain ),
			'fields'     => array(
				array(
					'name'       => __( 'Birth', $text_domain ),
					'id'         => $text_domain . '_birth_date',
					'type'       => 'date',
					'class'      => 'widefat',
					// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
					'js_options' => array(
						'autoSize'        => true,
						'buttonText'      => __( 'Select Birth Date', $text_domain ),
						'dateFormat'      => __( 'yy-mm-dd', $text_domain ),
						'changeYear'      => true,
						'yearRange'       => "1700:2000",
						'showButtonPanel' => true,
					),
				),
				array(
					'name'       => __( 'Death Date', $text_domain ),
					'id'         => $text_domain . '_death_date',
					'type'       => 'date',
					'class'      => 'widefat',
					// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
					'js_options' => array(
						'autoSize'        => true,
						'buttonText'      => __( 'Select Date', $text_domain ),
						'dateFormat'      => __( 'yy-mm-dd', $text_domain ),
						'changeYear'      => true,
						'showButtonPanel' => true,
					),
				),
			),
			'post_types' => 'person',
		);

		return $meta_boxes;


	}

	public function plugin_dependencies() {

		$plugins = array(
			array(
				'name'             => 'Contact Form 7', // The plugin name.
				'slug'             => 'contact-form-7', // The plugin slug (typically the folder name).
				'required'         => true,
				'force_activation' => true,
			)
		);

		$config = array(
			'id'           => 'bio_collection',
			// Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',
			// Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins',
			// Menu slug.
			'parent_slug'  => 'plugins.php',
			// Parent menu slug.
			'capability'   => 'manage_options',
			// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,
			// Show admin notices or not.
			'dismissable'  => true,
			// If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',
			// If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,
			// Automatically activate plugins after installation or not.
			'message'      => '',
			// Message to output right before the plugins table.
			'strings'      => array(
				'notice_can_install_required' => _n_noop(
					'This Plugin requires the following plugin: %1$s. for the front-end post submission',
					'This Plugin requires the following plugins: %1$s.',
					'bio_collection'
				),
			)
		);

		tgmpa( $plugins, $config );
	}

	public function create_submit_form( $template, $prop ) {

		if ( 'form' == $prop ) {
			$template = $this->new_defult_form();
		}

		return apply_filters('bio_collection_form', $template , $prop );

	}

	public function new_defult_form() {
		$template = sprintf(
			'
					<label> %2$s %1$s
					    [text* your-name] </label>
					
					<label> %3$s %1$s
					    [email* your-email] </label>
					
					<label> %4$s
					    [text your-subject] </label>
					
					<label> %5$s
					    [textarea your-message] </label>
					    [submit "%6$s"]',

			__( '(required)', 'contact-form-7' ),
			__( 'Dasun Name', 'contact-form-7' ),
			__( 'Dasun Email', 'contact-form-7' ),
			__( 'Subject', 'contact-form-7' ),
			__( 'Your Message', 'contact-form-7' ),
			__( 'Send', 'contact-form-7' ) );

		return trim( $template );
	}

}

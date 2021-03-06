<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://dasun.blog
 * @since      1.0.0
 *
 * @package    Bio_Collection
 * @subpackage Bio_Collection/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Bio_Collection
 * @subpackage Bio_Collection/public
 * @author     Dasun Edirisinghe <dazunj>
 */
class Bio_Collection_Public {

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
	 * @param      string $plugin_name The name of the plugin.
	 * @param      string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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
		wp_enqueue_style( $this->plugin_name . 'date-picker', plugin_dir_url( __FILE__ ) . 'css/datepicker.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bio-collection-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name . 'date-picker', plugin_dir_url( __FILE__ ) . 'js/datepicker.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( $this->plugin_name.'-validator', plugin_dir_url( __FILE__).'js/validator.min.js',array(), $this->version, true );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bio-collection-public.js', array( 'jquery' ), $this->version, true );
		wp_localize_script( $this->plugin_name, 'bioAjax', array(
				'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
				'ajaxNonce' => wp_create_nonce( "submit_bio_nonce" )
			)
		);

	}


	public function single_page_templates( $single_page_templates ) {

		global $post;

		if ( $post->post_type == 'person' ) {

			$single_page_templates = plugin_dir_path( __FILE__ ) . 'templates/person-single.php';

		}

		return $single_page_templates;

	}

	public function bio_collection_short_codes() {

		$short_codes = array(
			'list',
			'submit',
			'search'
		);

		foreach ( $short_codes as $short_code ) {

			$function = 'bio_' . str_replace( '-', '_', $short_code );
			add_shortcode( $short_code, array( $this, $function ) );

		}

	}

	public function bio_list( $atts ) {

		$atts = shortcode_atts(
			array(
				'search' => false,
				'wrap'   => false,
				'col'    => false,
				'count'  => 1
			), $atts
		);

		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

		$args = array(
			'post_type'   => 'person',
			'post_status' => 'publish',
			'paged'       => $paged
		);

		$col_class = ( $atts['col'] ) ? 'col-' . $atts['col'] : 'col-3';

		$query = new WP_Query( $args );

		$before = '<div class="' . $col_class . '">';
		$after  = '</div>';

		ob_start();

		if ( $atts['search'] ) {
			bio_search_from();
		}

		echo '<div class="persons-wrap">';

		if ( $query->have_posts() ) {

			while ( $query->have_posts() ) {
				$query->the_post();
				echo $before;
				require plugin_dir_path( __FILE__ ) . '/partials/bio-collection-list.php';
				echo $after;
			}

			wp_reset_query();

		}

		echo $after;
		$data = ob_get_contents();
		ob_end_clean();

		return $data;


	}

	public function bio_submit( $atts ) {

		$atts = shortcode_atts(
			array(
				'wrap' => false,
				'ajax' => true
			),
			$atts
		);

		ob_start();

		require plugin_dir_path( __FILE__ ) . '/partials/bio-submit.php';

		$data = ob_get_contents();

		ob_end_clean();

		return $data;

	}

	public function submit_bio() {

		$data = $_POST['formData'];

		$args = array(
			'post_type'    => 'person',
			'post_status'  => 'publish',
			'post_title'   => $data['personName'],
			'post_content' => $data['personBio'],
			'post_author'  => $data['user']
		);

		$post_id = wp_insert_post( $args );

		if( isset( $post_id ) ){
			update_post_meta($post_id,'bio-collection_birth_date',$data['birthDate'],'');
			update_post_meta($post_id,'bio-collection_death_date',$data['deathDate'],'');
			wp_send_json_success( $post_id );

		} else{

			wp_send_json_error();
		}

	}


}

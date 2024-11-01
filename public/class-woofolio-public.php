<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://jeweltheme.com
 * @since      1.0.0
 *
 * @package    Woo_Folio
 * @subpackage Woo_Folio/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woo_Folio
 * @subpackage Woo_Folio/public
 * @author     Jewel Theme <support@jeweltheme.com>
 */
class Woo_Folio_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Woo_Folio    The ID of this plugin.
	 */
	private $Woo_Folio;

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
	 * @param      string    $Woo_Folio       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Woo_Folio, $version ) {

		$this->Woo_Folio = $Woo_Folio;
		$this->version = $version;

		require_once plugin_dir_path( __FILE__ ) . 'shortcode.php';

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
		 * defined in Woo_Folio_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woo_Folio_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( 'woofolio-font-awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', true, '1.0.0', 'all' );	
		wp_enqueue_style( 'woofolio', plugins_url('css/demo.css', __FILE__ ), true, '1.0.0', 'all' );	
		wp_enqueue_style( 'woofolio-pixelfabric-clothes', plugins_url('fonts/pixelfabric-clothes/style.css', __FILE__ ), true, '1.0.0', 'all' );	
		wp_enqueue_style( 'woofolio-flickity', plugins_url('css/flickity.css', __FILE__ ), true, '1.0.0', 'all' );	
		wp_enqueue_style( 'woofolio-component', plugins_url('css/component.css', __FILE__ ), true, '1.0.0', 'all' );	


		

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Woo_Folio_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woo_Folio_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'woofolio-isotope', plugins_url('js/isotope.pkgd.min.js', __FILE__ ), true, '1.0.0', 'all' );	
		wp_enqueue_script( 'woofolio-flickity', plugins_url('js/flickity.pkgd.min.js', __FILE__ ), true, '1.0.0', 'all' );	
		wp_enqueue_script( 'woofolio-main', plugins_url('js/main.js', __FILE__ ), true, '1.0.0', 'all' );	
	}

}

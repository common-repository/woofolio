<?php

/**
 * Fired during plugin activation
 *
 * @link       http://jeweltheme.com
 * @since      1.0.0
 *
 * @package    Woo_Folio
 * @subpackage Woo_Folio/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Woo_Folio
 * @subpackage Woo_Folio/includes
 * @author     Jewel Theme <support@jeweltheme.com>
 */
class Woo_Folio_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {


		//require_once plugin_dir_path( __FILE__ ) . 'shortcode.php';

		//include( plugin_dir_path( __FILE__ ) . 'includes/shortcode.php');


		/**
		 * Check if WooCommerce is active
		 **/
		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && ( class_exists( 'WooCommerce' ) ) ){
		    // Put your plugin code here

		} else {
			add_action('admin_notices', function(){
					global $pagenow;
					if ( $pagenow == 'plugins.php' ) {
						echo '<div class="updated">
						<p>WooCommerce Plugins isn\'t Installed. Please Install <a href="https://wordpress.org/plugins/woocommerce/" target="_blank" >WooCommerce</a> Plugin.</p>
					</div>';
				}
			});

		}

		// Load Script in frontent
		function jwt_designfolio_scripts() {
			wp_enqueue_style( 'jwt_demo', plugins_url('/assets/css/demo.css', __FILE__ ), true, '1.0.0', 'all' );	
			wp_enqueue_style( 'jwt_flickity', plugins_url('/assets/css/flickity.css', __FILE__ ), true, '1.0.0', 'all' );	
			wp_enqueue_style( 'jwt_component', plugins_url('/assets/css/component.css', __FILE__ ), true, '1.0.0', 'all' );	


			wp_enqueue_style( 'jwt_modernizr.custom', plugins_url('/assets/js/modernizr.custom.js', __FILE__ ), true, '1.0.0', 'all' );	
			wp_enqueue_style( 'jwt_isotope', plugins_url('/assets/js/isotope.pkgd.min.js', __FILE__ ), true, '1.0.0', 'all' );	
			wp_enqueue_style( 'jwt_flickity', plugins_url('/assets/js/flickity.pkgd.min.js', __FILE__ ), true, '1.0.0', 'all' );	
			wp_enqueue_style( 'jwt_main', plugins_url('/assets/js/main.js', __FILE__ ), true, '1.0.0', 'all' );	
		}

		add_action( 'wp_enqueue_scripts', 'jwt_designfolio_scripts' );


	}

}

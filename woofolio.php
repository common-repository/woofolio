<?php
/**
 * @link              http://jeweltheme.com
 * @since             1.2.0
 * @package           Designfolio - WooCommerce Filterable Products
 *
 * @wordpress-plugin
 * Plugin Name:       Designfolio
 * Plugin URI:        https://jeweltheme.com/shop/woofolio-woocommerce-filterable-product-plugin/
 * Description:       Designfolio - WooCommerce Filterable Products Showcase with Isotop Masonry Grid
 * Version:           1.2.4
 * Author:            Liton Arefin
 * Author URI: 		  https://wordpress.org/plugins/ultimate-blocks-for-gutenberg/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woofolio
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woofolio-activator.php
 */
function activate_jeweltheme_woofolio() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woofolio-activator.php';
	Woo_Folio_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woofolio-deactivator.php
 */
function deactivate_jeweltheme_woofolio() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woofolio-deactivator.php';
	Woo_Folio_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_jeweltheme_woofolio' );
register_deactivation_hook( __FILE__, 'deactivate_jeweltheme_woofolio' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woofolio.php';

require_once dirname( __FILE__ ) . '/inc/easy-blocks.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_jeweltheme_woofolio() {
	$plugin = new Woo_Folio();
	$plugin->run();
}
run_jeweltheme_woofolio();

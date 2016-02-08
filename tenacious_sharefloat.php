<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://amydalrymple.org/
 * @since             1.0.0
 * @package           Tenacious_sharefloat
 *
 * @wordpress-plugin
 * Plugin Name:       tena.cious Floating Share Bar
 * Plugin URI:        http://www.tenaciousedge.com
 * Description:       Quickly provide your website visitors several social sharing tools for a page or post on your site in a widget that floats on either side of the browser window.
 * Version:           1.0.0
 * Author:            Amy Dalrymple
 * Author URI:        http://amydalrymple.org/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tenacious_sharefloat
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tenacious_sharefloat-activator.php
 */
function activate_tenacious_sharefloat() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tenacious_sharefloat-activator.php';
	Tenacious_sharefloat_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tenacious_sharefloat-deactivator.php
 */
function deactivate_tenacious_sharefloat() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tenacious_sharefloat-deactivator.php';
	Tenacious_sharefloat_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tenacious_sharefloat' );
register_deactivation_hook( __FILE__, 'deactivate_tenacious_sharefloat' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tenacious_sharefloat.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_tenacious_sharefloat() {

	$plugin = new Tenacious_sharefloat();
	$plugin->run();

}
run_tenacious_sharefloat();

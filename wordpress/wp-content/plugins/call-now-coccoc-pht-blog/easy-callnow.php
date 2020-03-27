<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              phamhuuthanh.com
 * @since             1.0.0
 * @package           Callnow_pht
 *
 * @wordpress-plugin
 * Plugin Name:       Call Now Coccoc PHT Blog
 * Plugin URI:        phamhuuthanh.com/2019/01/call-now-coccoc-pht-blog.html
 * Description:       Free forever! Show attractive call button on website with ring ring animation. The call button immediately displays the same as the call button of Coccoc.
 * Version:           2.0
 * Author:            Pham Huu Thanh
 * Author URI:        phamhuuthanh.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       callnow-pht
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-easy-callnow-activator.php
 */
function activate_easy_callnow() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-easy-callnow-activator.php';
	Easy_Callnow_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-easy-callnow-deactivator.php
 */
function deactivate_easy_callnow() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-easy-callnow-deactivator.php';
	Easy_Callnow_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_easy_callnow' );
register_deactivation_hook( __FILE__, 'deactivate_easy_callnow' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-easy-callnow.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_easy_callnow() {

	$plugin = new Easy_Callnow();
	$plugin->run();

}
run_easy_callnow();

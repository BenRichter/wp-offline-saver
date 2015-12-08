<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/BenRichter
 * @since             1.0.0
 * @package           Offline_Saver
 *
 * @wordpress-plugin
 * Plugin Name:       Offline Saver
 * Plugin URI:        https://github.com/BenRichter/wp-offline-saver
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Ben Richter
 * Author URI:        https://github.com/BenRichter
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       offline-saver
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-offline-saver-activator.php
 */
function activate_offline_saver() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-offline-saver-activator.php';
	Offline_Saver_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-offline-saver-deactivator.php
 */
function deactivate_offline_saver() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-offline-saver-deactivator.php';
	Offline_Saver_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_offline_saver' );
register_deactivation_hook( __FILE__, 'deactivate_offline_saver' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-offline-saver.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_offline_saver() {

	$plugin = new Offline_Saver();
	$plugin->run();

}
run_offline_saver();

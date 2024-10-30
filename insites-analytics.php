<?php

/**
 * @link              https://teege.me/
 * @since             1.0.0
 * @package           Insites_Analytics
 *
 * @wordpress-plugin
 * Plugin Name:       inSites Analytics
 * Plugin URI:        https://insites.app/
 * Description:       Website statistics, privacy compliant and with built-in carbon offsetting.
 * Version:           1.0.2
 * Author:            Teege.me GmbH
 * Author URI:        https://teege.me/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       insites-analytics
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'INSITES_ANALYTICS_VERSION', '1.0.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-insites-analytics-activator.php
 */
function activate_insites_analytics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-insites-analytics-activator.php';
	Insites_Analytics_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-insites-analytics-deactivator.php
 */
function deactivate_insites_analytics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-insites-analytics-deactivator.php';
	Insites_Analytics_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_insites_analytics' );
register_deactivation_hook( __FILE__, 'deactivate_insites_analytics' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-insites-analytics.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_insites_analytics() {

	$plugin = new Insites_Analytics();
	$plugin->run();

}
run_insites_analytics();

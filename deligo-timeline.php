<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://deligo.pl
 * @since             1.0.0
 * @package           Deligo_Timeline
 *
 * @wordpress-plugin
 * Plugin Name:       Deligo Timeline
 * Description:       Plugin for timeline presentation of CPT.
 * Version:           1.0.0
 * Author:            RadJan / deligo.pl
 * Author URI:        https://deligo.pl
 * Text Domain:       deligo-timeline
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
define( 'DELIGO_TIMELINE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-deligo-timeline-activator.php
 */
function activate_deligo_timeline() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-deligo-timeline-activator.php';
	Deligo_Timeline_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-deligo-timeline-deactivator.php
 */
function deactivate_deligo_timeline() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-deligo-timeline-deactivator.php';
	Deligo_Timeline_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_deligo_timeline' );
register_deactivation_hook( __FILE__, 'deactivate_deligo_timeline' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-deligo-timeline.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_deligo_timeline() {

	$plugin = new Deligo_Timeline();
	$plugin->run();

}
run_deligo_timeline();

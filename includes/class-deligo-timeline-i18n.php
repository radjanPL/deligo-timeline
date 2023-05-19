<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://deligo.pl
 * @since      1.0.0
 *
 * @package    Deligo_Timeline
 * @subpackage Deligo_Timeline/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Deligo_Timeline
 * @subpackage Deligo_Timeline/includes
 * @author     Radosław Jankowski / deligo.pl <radoslaw.j@deligo.pl>
 */
class Deligo_Timeline_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'deligo-timeline',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

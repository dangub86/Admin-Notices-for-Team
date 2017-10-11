<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://plugwpress.com
 * @since      1.0.0
 *
 * @package    Ant_admin_notices_team
 * @subpackage Ant_admin_notices_team/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ant_admin_notices_team
 * @subpackage Ant_admin_notices_team/includes
 * @author     PlugWPress <info@plugwpress.com>
 */
class Ant_admin_notices_team_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ant_admin_notices_team',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://plugwpress.com
 * @since             1.0.0
 * @package           Ant_admin_notices_team
 *
 * @wordpress-plugin
 * Plugin Name:       Ant Admin Notices for Team
 * Plugin URI:        http://plugwpress.com/ant-notice-documentation/
 * Description:       It provides the capability for administrators and/or editors to create Notices and display it to all users, only to specific authors or by targetting custom user's groups.
 * Version:           1.0.4
 * Author:            PlugWPress
 * Author URI:        http://plugwpress.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ant_admin_notices_team
 * Domain Path:       /languages
 */

 // Create a helper function for easy SDK access.
 function anft_fs() {
     global $anft_fs;

     if ( ! isset( $anft_fs ) ) {
         // Include Freemius SDK.
         require_once dirname(__FILE__) . '/freemius/start.php';

         $anft_fs = fs_dynamic_init( array(
             'id'                  => '1454',
             'slug'                => 'admin-notices-for-team',
             'type'                => 'plugin',
             'public_key'          => 'pk_d5387c2d2b68df537c9afae0121ea',
             'is_premium'          => false,
             'has_addons'          => false,
             'has_paid_plans'      => false,
             'menu'                => array(
                 'slug'           => 'edit.php?post_type=notice',
                 'account'        => false,
                 'support'        => false,
             ),
         ) );
     }

     return $anft_fs;
 }

 // Init Freemius.
 anft_fs();
 // Signal that SDK was initiated.
 do_action( 'anft_fs_loaded' );

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ant_admin_notices_team-activator.php
 */
function activate_ant_admin_notices_team() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ant_admin_notices_team-activator.php';
	Ant_admin_notices_team_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ant_admin_notices_team-deactivator.php
 */
function deactivate_ant_admin_notices_team() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ant_admin_notices_team-deactivator.php';
	Ant_admin_notices_team_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ant_admin_notices_team' );
register_deactivation_hook( __FILE__, 'deactivate_ant_admin_notices_team' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ant_admin_notices_team.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ant_admin_notices_team() {

	$plugin = new Ant_admin_notices_team();
	$plugin->run();

}
run_ant_admin_notices_team();

<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://www.linkedin.com/in/volodymyr-dhzychko-865348171/
 * @since             1.0.0
 * @package           Test_slider_vd
 *
 * @wordpress-plugin
 * Plugin Name:       Slider Test
 * Plugin URI:        https://https://www.linkedin.com/in/volodymyr-dhzychko-865348171/
 * Description:       Plugin adds woocommerce products slider.
 * Version:           1.0.0
 * Author:            Volodymyr Dhzychko
 * Author URI:        https://https://www.linkedin.com/in/volodymyr-dhzychko-865348171//
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       test_slider_vd
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
define( 'TEST_SLIDER_VD_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-test_slider_vd-activator.php
 */
function activate_test_slider_vd() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-test_slider_vd-activator.php';
	Test_slider_vd_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-test_slider_vd-deactivator.php
 */
function deactivate_test_slider_vd() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-test_slider_vd-deactivator.php';
	Test_slider_vd_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_test_slider_vd' );
register_deactivation_hook( __FILE__, 'deactivate_test_slider_vd' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-test_slider_vd.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_test_slider_vd() {

	$plugin = new Test_slider_vd();
	$plugin->run();

}
run_test_slider_vd();

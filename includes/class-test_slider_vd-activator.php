<?php

/**
 * Fired during plugin activation
 *
 * @link       https://https://www.linkedin.com/in/volodymyr-dhzychko-865348171/
 * @since      1.0.0
 *
 * @package    Test_slider_vd
 * @subpackage Test_slider_vd/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Test_slider_vd
 * @subpackage Test_slider_vd/includes
 * @author     Volodymyr Dhzychko <dhzychko@gmail.com>
 */
class Test_slider_vd_Activator {

	/**
	 * Check if WooCommerce is active and deactivate the plugin if not.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		// Check if WooCommerce is active
		if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
			// Deactivate the plugin
			deactivate_plugins( plugin_basename( __FILE__ ) );

			// Display an admin notice
			add_action( 'admin_notices', array( __CLASS__, 'admin_notice_woocommerce_not_active' ) );
		}
	}

	/**
	 * Display an admin notice if WooCommerce is not active.
	 *
	 * @since    1.0.0
	 */
	public static function admin_notice_woocommerce_not_active() {
		?>
		<div class="notice notice-error">
			<p><?php esc_html_e( 'Test Slider VD requires WooCommerce to be installed and active.', 'test-slider-vd' ); ?></p>
		</div>
		<?php
	}
}

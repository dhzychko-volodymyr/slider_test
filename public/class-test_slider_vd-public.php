<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://https://www.linkedin.com/in/volodymyr-dhzychko-865348171/
 * @since      1.0.0
 *
 * @package    Test_slider_vd
 * @subpackage Test_slider_vd/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Test_slider_vd
 * @subpackage Test_slider_vd/public
 * @author     Volodymyr Dhzychko <dhzychko@gmail.com>
 */
class Test_slider_vd_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Test_slider_vd_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Test_slider_vd_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/test_slider_vd-public.css', array(), $this->version, 'all' );

		// Enqueue Swiper CSS
		wp_enqueue_style( 'swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Test_slider_vd_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Test_slider_vd_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/test_slider_vd-public.js', array( 'jquery' ), $this->version, false );

		// Enqueue Swiper JS
		wp_enqueue_script( 'swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true );

	}

	/**
     * Register the shortcode.
	 * 
	 * [flormar-test-slider]
     */
    public function register_slider_shortcode() {
        add_shortcode( 'test_slider_vd', array( $this, 'display_slider' ) );
    }

	/**
	 * Display Swiper Slider.
	 *
	 * @return string
	 */
	public function display_slider() {
		ob_start();

		?>
		<?php
		return ob_get_clean();
	}

}

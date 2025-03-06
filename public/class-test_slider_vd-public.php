<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.linkedin.com/in/volodymyr-dhzychko-865348171/
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

		wp_enqueue_style( $this->plugin_name . '-public', plugin_dir_url( __FILE__ ) . 'css/test_slider_vd-public.css', array(), $this->version, 'all' );

		// Enqueue Slick CSS locally
		wp_enqueue_style( $this->plugin_name . '-slick', plugin_dir_url( __FILE__ ) . 'css/slick.css', array(), $this->version, 'all' );
		// wp_enqueue_style( $this->plugin_name . '-slick-theme', plugin_dir_url( __FILE__ ) . 'css/slick-theme.css', array(), $this->version, 'all' );
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



		// Enqueue Slick JS locally
		wp_enqueue_script( $this->plugin_name . '-slick', plugin_dir_url( __FILE__ ) . 'js/slick.min.js', array( 'jquery' ), $this->version, false );

		// Enqueue custom JS
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/test_slider_vd-public.js', array( 'jquery', $this->plugin_name . '-slick' ), $this->version, false );

		// Localize script to pass image URLs
		wp_localize_script( $this->plugin_name, 'flormar_slick_slider_params', array(
			'arrow' => plugin_dir_url( __FILE__ ) . 'images/arrow.png'
		));

	}

	/**
     * Register the shortcode.
	 * 
	 * [flormar-test-slider]
     */
    public function register_slider_shortcode() {
        add_shortcode( 'flormar-test-slider', array( $this, 'display_slider' ) );
    }

	/**
	 * Display Swiper Slider.
	 *
	 * @param array $atts Shortcode attributes.
	 * @return string
	 */
	public function display_slider($atts) {
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => -1
		);

		$products = get_posts( $args );
		$maybe_filtered_products = array();

		if ( ! empty( $products ) ) {
			
			foreach ( $products as $product_post ) {
				$product = wc_get_product( $product_post->ID );
				
				if ( isset( $atts['max-price'] ) ) {
					if ( $product->get_price() > $atts['max-price'] ) {
						continue;
					}
				}
		
				if ( isset( $atts['min-price'] ) ) {
					if ( $product->get_price() < $atts['min-price'] ) {
						continue;
					}
				}

				$maybe_filtered_products[] = $product;
			}
		}

		if ( ! empty( $maybe_filtered_products ) ) {
			ob_start();
			?>
			<div class="test_slider_vd__slider-container">
				<div class="test_slider_vd__slider-wrapper">
					<div class="test_slider_vd__slider-title">המוצרים הנמכרים ביותר</div>
					<div class="test_slider_vd__slick-slider">
						<?php foreach ( $maybe_filtered_products as $product ) : ?>
							<div>
								<?php 
								$image_id = $product->get_image_id(); 
								$image_url = wp_get_attachment_image_url( $image_id, 'medium' );
								// echo $image_url;
								?>
								<img src="<?php echo $image_url; ?>">
								<hr>
								<h2><?php echo $product->get_name(); ?></h2>
								<p><?php echo wc_price( $product->get_price() ); ?></p>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<?php
			return ob_get_clean();
		}

	}

}

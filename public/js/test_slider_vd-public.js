(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	$(document).ready(function($) {
		const plugin_dir_url = '/wp-content/plugins/test_slider_vd/public/';
		const nextArrowImg = plugin_dir_url + 'images/arrow.png';
		const prevArrowImg = plugin_dir_url + 'images/arrow.png';

		$('.slick-slider').slick({
			dots: false,
			infinite: true,
			speed: 300,
			slidesToShow: 4,
			slidesToScroll: 1,
			nextArrow: '<button type="button" class="slick-next"><img src="' + nextArrowImg + '" alt="Next"></button>',
			prevArrow: '<button type="button" class="slick-prev"><img src="' + prevArrowImg + '" alt="Previous"></button>',
			responsive: [
				{
					breakpoint: 768, // Bootstrap mobile breakpoint
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				}
			]
		});
	});

})( jQuery );

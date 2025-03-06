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
	// test_slider_vd__
	// test_slider_vd__slick-slider

	$(document).ready(function() {
		$('.test_slider_vd__slick-slider').slick({
			dots: false,
			speed: 300,
			slidesToShow: 4,
			adaptiveHeight: true,
			prevArrow: '<button type="button" class="slick-prev"><img src="' + flormar_slick_slider_params.arrow + '" alt="Previous"></button>',
        	nextArrow: '<button type="button" class="slick-next"><img src="' + flormar_slick_slider_params.arrow + '" alt="Next"></button>',
			responsive: [
				{
					breakpoint: 992,
					settings: {
					  slidesToShow: 3
					}
				},
				{
				  breakpoint: 768,
				  settings: {
					slidesToShow: 2,
					arrows: false
				  }
				}
			  ]
		});
	});

})( jQuery );

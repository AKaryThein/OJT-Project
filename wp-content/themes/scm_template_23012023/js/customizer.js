/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) {
	// Site title and description.
	wp.customize('blogname', function (value) {
		value.bind(function (to) {
			$('.site-title a').text(to);
		});
	});
	wp.customize('blogdescription', function (value) {
		value.bind(function (to) {
			$('.site-description').text(to);
		});
	});

	// Header text color.
	wp.customize('header_textcolor', function (value) {
		value.bind(function (to) {
			if ('blank' === to) {
				$('.site-title, .site-description').css({
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				});
			} else {
				$('.site-title, .site-description').css({
					clip: 'auto',
					position: 'relative',
				});
				$('.site-title a, .site-description').css({
					color: to,
				});
			}
		});
	});
	// Header background color.
	wp.customize('header_bgcolor', function (value) {
		value.bind(function (newval) {
			$('header.site-header').css({
				'background-color': newval
			});
		});
	});
	// Footer background color.
	wp.customize('footer_bgcolor', function (value) {
		value.bind(function (newval) {
			$('footer.site-footer').css({
				'background-color': newval
			});
		});
	});
	// Text color.
	wp.customize('txtcolor', function (value) {
		value.bind(function (newval) {
			$('body').css({
				'color': newval
			});
		});
	});
}(jQuery));

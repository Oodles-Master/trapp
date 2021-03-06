(function($) {
	"use strict";

	UNCODE.filters = function() {
	var $isotopes = $('.isotope-system');

	$isotopes.each(function(index, val){
		var $isotope = $(this),
			$widget_trgr = $('.uncode-woocommerce-toggle-widgetized-cb__link', $isotope),
			$widgets = $('.widgetized-cb-wrapper', $isotope),
			$sorting_trgr = $('.uncode-woocommerce-sorting__link', $isotope),
			$sorting_dd = $('.uncode-woocommerce-sorting-dropdown', $isotope),
			$cats_trigger = $('.menu-smart--filter-cats_mobile-toggle-trigger', $isotope),
			$cats_filters = $('.menu-smart--filter-cats-mobile-dropdown', $isotope);

		if ($isotope.hasClass('isotope-processed')) {
			return;
		}

		$cats_trigger.on('click', function(e) {
			if ( ! $('html').hasClass('screen-sm') ) {
				// $widgets.add($sorting_dd).slideUp(400);
				e.preventDefault();
				$widgets.slideUp(400, 'easeInOutCirc');
			}
		});

		$('.filters-toggle-trigger', $isotope).on('click', function(e) {
			e.preventDefault();
			var $filters = $('.isotope-filters .menu-horizontal', $isotope);
			$filters.slideToggle(400, 'easeInOutCirc');
			$widgets.add($cats_filters).slideUp(400, 'easeInOutCirc');
		});

		$widget_trgr.on('click', function(e) {
			e.preventDefault();
			$widgets.slideToggle(400, 'easeInOutCirc');
			if (!$('html').hasClass('screen-sm')) {
				$cats_filters.slideUp(400, 'easeInOutCirc');
			}
			window.dispatchEvent(new CustomEvent('boxResized'));
		});

		$sorting_trgr.on('click', function(e) {
			e.preventDefault();
			if (!$('html').hasClass('screen-sm')) {
				$widgets.add($cats_filters).slideUp(400, 'easeInOutCirc');
			}
		});

		$isotope.addClass('isotope-processed');
	})

};


})(jQuery);

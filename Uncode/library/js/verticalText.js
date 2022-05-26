(function($) {
	"use strict";

	UNCODE.verticalText = function() {
	$(window).on('menuCanvasOpen', function(){
		$('.vertical-text--fixed').fadeOut(500);
	}).on('menuCanvasClose', function(){
		$('.vertical-text--fixed').fadeIn(500);
	});

	var hideOnBottomVerticalTexts = $('.vertical-text--vis-hide-bottom');
	var showOnTopVerticalTexts = $('.vertical-text--vis-show-top');

	if (hideOnBottomVerticalTexts.length > 0 || showOnTopVerticalTexts.length > 0) {
		window.addEventListener('scroll', function(e) {
			var totalPageHeight = document.body.scrollHeight;
			var scrollPoint = window.scrollY + window.innerHeight;

			if (window.scrollY > 0) {
				showOnTopVerticalTexts.fadeOut();
			} else {
				showOnTopVerticalTexts.fadeIn();
			}

			if (scrollPoint >= totalPageHeight) {
				hideOnBottomVerticalTexts.fadeOut();
			} else {
				hideOnBottomVerticalTexts.fadeIn();
			}
		}, false);
	}
};


})(jQuery);

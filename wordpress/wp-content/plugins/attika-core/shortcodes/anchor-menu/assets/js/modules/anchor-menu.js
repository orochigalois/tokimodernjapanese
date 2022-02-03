(function($) {
	'use strict';

	var anchorMenu = {};
	mkdf.modules.anchorMenu = anchorMenu;

	anchorMenu.mkdfAnchorMenu = mkdfAnchorMenu;


	anchorMenu.mkdfOnDocumentReady = mkdfOnDocumentReady;

	$(document).ready(mkdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function mkdfOnDocumentReady() {
		mkdfAnchorMenu();
	}

	/*
	 *  Anchor Menu relocation
	 */
	function mkdfAnchorMenu() {
		var anchorMenu = $('.mkdf-anchor-menu-outer');

		if (anchorMenu.length){
			anchorMenu.remove();
			$('.mkdf-wrapper-inner').append(anchorMenu.css('opacity',1));

			//scroll active item logic
			var anchorSections = $('div[data-mkdf-anchor]'),
				anchorMenuItems = anchorMenu.find('.mkdf-anchor-menu-item');

			if (anchorSections.length && anchorMenuItems.length) {
				anchorMenuItems.first().addClass('mkdf-active-item');
				anchorMenuItems.first().find('a').addClass('current');

				$(window).scroll(function(){
					anchorSections.each(function(i){
						var anchorSection = $(this),
							anchorSectionTop = anchorSection.offset().top,
							anchorSectionHeight = anchorSection.outerHeight(),
							offset = mkdf.windowHeight/4,
							currentItemIndex;

						if (anchorSectionTop <= mkdf.scroll + offset && anchorSectionTop + anchorSectionHeight >= mkdf.scroll + offset) {
							if (currentItemIndex !== i) {
								currentItemIndex = i;
								anchorMenuItems.removeClass('mkdf-active-item');
								anchorMenuItems.find('a').removeClass('current');
								anchorMenuItems.eq(i).addClass('mkdf-active-item');
								anchorMenuItems.eq(i).find('a').addClass('current');
							}
						}
					});
				});
			}
		}
	}

})(jQuery);




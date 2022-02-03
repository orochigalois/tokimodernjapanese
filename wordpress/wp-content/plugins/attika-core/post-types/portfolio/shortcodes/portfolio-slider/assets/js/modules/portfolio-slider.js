(function ($) {
    'use strict';

    var portfolioSlider = {};
    mkdf.modules.portfolioSlider = portfolioSlider;

    portfolioSlider.mkdfInitTabbedTitlePagination = mkdfInitTabbedTitlePagination;
    portfolioSlider.mkdfInitPortfolioSliderItemCentering = mkdfInitPortfolioSliderItemCentering;

    portfolioSlider.mkdfOnWindowLoad = mkdfOnWindowLoad;

     $(window).on('load', mkdfOnWindowLoad);

     /*
     All functions to be called on  $(window).on('load', ) should be in this function
     */
    function mkdfOnWindowLoad() {
        mkdfInitTabbedTitlePagination();
        mkdfInitPortfolioSliderItemCentering();
        mkdfInitPortfolioSliderMousewheelScroll();
    }

    /**
     * Init portfolio slider tabbed title pagination
     */
    function mkdfInitTabbedTitlePagination(){
        var portfolioSliderHolder = $('.mkdf-portfolio-slider-holder > .mkdf-tabbed-title-pagination');

        if(portfolioSliderHolder.length){
            portfolioSliderHolder.each(function(){
                var thisPortfolioSliderHolder = $(this),
                postTitles = thisPortfolioSliderHolder.find('.owl-item:not(.cloned) .mkdf-pli-title'),
                thisSliderDots = thisPortfolioSliderHolder.find('.owl-dot > span');

                // Update text of each dot with matching post title
                for (var i = 0; i < postTitles.length; i++) {
                    thisSliderDots.eq(i).text(postTitles[i].innerText);
                }
            });
        }
    }

    /**
     * Initializes portfolio slider mousewheel scroll
     */
    function mkdfInitPortfolioSliderMousewheelScroll(){
        var portSlider = $('.mkdf-portfolio-list-holder.mkdf-pl-mousewheel-enabled');

        if(portSlider.length){
            portSlider.each(function(){
				var thisPortSliderHolder = $(this),
                    thisPortSlider = thisPortSliderHolder.find('.mkdf-owl-slider'),
                    translated = true;

                thisPortSlider.on('translate.owl.carousel', function() {
                    translated = false;
                });

                thisPortSlider.on('translated.owl.carousel', function() {
                    translated = true;
                });

				thisPortSlider.on('mousewheel', '.owl-stage', function (e) {
                    if (translated) {
                        if (e.deltaY > 0) {
                            thisPortSlider.trigger('prev.owl');
                        } else {
                            thisPortSlider.trigger('next.owl');
                        }
                        e.preventDefault();
                    }
				});
            });
        }
	}

    /**
     * Portfolio slider item click centering behaviour
     * NOTE: owl slider center option must be set to true
     */
    function mkdfInitPortfolioSliderItemCentering(){
        var portfolioSliderHolder = $('.mkdf-portfolio-slider-holder > .mkdf-enable-center');

        if(portfolioSliderHolder.length){
            portfolioSliderHolder.each(function(){
                
                var thisPortSliderHolder = $(this),
                    thisPortSlider = thisPortSliderHolder.find('.mkdf-owl-slider'),
                    thisSliderData = thisPortSlider.data('owl.carousel');
                
                // Item click centering
                thisPortSlider.on('click', '.owl-item', function(e) {
                    if (($(this).hasClass('center'))) {
                        // item is centered
                    } else {
                        e.preventDefault();
                        e.stopPropagation();
                        // move item to center
                        thisSliderData.to(thisSliderData.relative($(this).index()));
                    }
                });
            });
        }
    }

})(jQuery);
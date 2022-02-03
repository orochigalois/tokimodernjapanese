(function($) {
    'use strict';

    var sectionTitle = {};
    mkdf.modules.sectionTitle = sectionTitle;

    sectionTitle.mkdfInitSectionTitle = mkdfInitSectionTitle;


    sectionTitle.mkdfOnDocumentReady = mkdfOnDocumentReady;

    $(document).ready(mkdfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function mkdfOnDocumentReady() {
        mkdfInitSectionTitle();
    }

    /*
     **	Horizontal progress bars shortcode
     */
    function mkdfInitSectionTitle() {
        var sectionTitle = $('.mkdf-section-title-holder');

        if (sectionTitle.length) {
            sectionTitle.each(function () {
                var thisTitle = $(this),
                    thisTitleLine = thisTitle.find('.mkdf-st-line'),
                    sectionContent = thisTitle.find('.mkdf-st-text');

                sectionContent.css({width: 'calc(100% - ' + thisTitleLine.outerWidth(true) + 'px)'});
            });
        }
    }

})(jQuery);
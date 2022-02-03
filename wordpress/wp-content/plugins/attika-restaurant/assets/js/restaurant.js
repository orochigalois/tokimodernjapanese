(function($) {
    'use strict';

    var menuPopUp = {};
    mkdf.modules.menuPopUp = menuPopUp;

    menuPopUp.mkdfInitPopup = mkdfInitPopup;
    menuPopUp.mkdfOnDocumentReady = mkdfOnDocumentReady;

    $(document).ready(mkdfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function mkdfOnDocumentReady() {
        mkdfInitPopup();
    }

    /**
     * Init Menu Popup
     */
    function mkdfInitPopup() {
        var popupOpener = $('a.mkdf-menu-popup-opener'),
            popupClose = $( '.mkdf-menu-popup-close' ),
            menuPopupHolder = $('.mkdf-menu-popup-holder');

        popupOpener.click( function(e) {
            return;
            e.preventDefault();

            if (mkdf.body.hasClass('mkdf-menu-popup-opened')) {
                mkdf.body.removeClass('mkdf-menu-popup-opened');
                mkdf.modules.common.mkdfEnableScroll();
            } else {
                mkdf.body.addClass('mkdf-menu-popup-opened');
                mkdf.modules.common.mkdfDisableScroll();
            }
        });

        popupClose.click( function(e) {
            e.preventDefault();
            mkdf.body.removeClass('mkdf-menu-popup-opened');
            mkdf.modules.common.mkdfEnableScroll();
        });

        //Close on escape
        $(document).keyup(function(e){
            if (e.keyCode == 27 ) { //KeyCode for ESC button is 27
                mkdf.body.removeClass('mkdf-menu-popup-opened');
                mkdf.modules.common.mkdfEnableScroll();
            }
        });

        if(menuPopupHolder.length){
            menuPopupHolder.each(function() {
                var thisHolder = $(this);
                mkdf.modules.common.mkdfInitPerfectScrollbar().init(thisHolder);
            });
        }

    }


})(jQuery);
(function($) {
    'use strict';

    var reservationPopUp = {};
    mkdf.modules.reservationPopUp = reservationPopUp;

    reservationPopUp.mkdfInitPopup = mkdfInitPopup;
    reservationPopUp.mkdfOnDocumentReady = mkdfOnDocumentReady;

    $(document).ready(mkdfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function mkdfOnDocumentReady() {
        mkdfInitPopup();
    }

    /**
     * Init Reservation Popup
     */
    function mkdfInitPopup() {
        var popupOpener = $('a.mkdf-reservation-popup-opener'),
            popupClose = $( '.mkdf-reservation-popup-close' );

        popupOpener.on('click', function (e) {
            e.preventDefault();

            if (mkdf.body.hasClass('mkdf-reservation-popup-opened')) {
                mkdf.body.removeClass('mkdf-reservation-popup-opened');
                mkdf.modules.common.mkdfEnableScroll();
            } else {
                mkdf.body.addClass('mkdf-reservation-popup-opened');
                mkdf.modules.common.mkdfDisableScroll();
            }
        });

        popupClose.on('click', function (e) {
            e.preventDefault();
            mkdf.body.removeClass('mkdf-reservation-popup-opened');
            mkdf.modules.common.mkdfEnableScroll();
        });

        //Close on escape
        $(document).keyup(function(e){
            if (e.keyCode == 27 ) { //KeyCode for ESC button is 27
                mkdf.body.removeClass('mkdf-reservation-popup-opened');
                mkdf.modules.common.mkdfEnableScroll();
            }
        });

    }


})(jQuery);
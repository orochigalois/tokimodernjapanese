(function($) {
    'use strict';

    var reservationForm = {};
    mkdf.modules.reservationForm = reservationForm;

    reservationForm.mkdfReservationDatePicker = mkdfReservationDatePicker;
    reservationForm.mkdfOnDocumentReady = mkdfOnDocumentReady;

    $(document).ready(mkdfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function mkdfOnDocumentReady() {
        mkdfReservationDatePicker();
    }

    function mkdfReservationDatePicker() {
        var datepicker = $('.mkdf-ot-date');

        if(datepicker.length) {
            datepicker.each(function() {
                $(this).datepicker({
                    prevText: '<span class="arrow_carrot-left"></span>',
                    nextText: '<span class="arrow_carrot-right"></span>'
                });
            });
        }
    }

})(jQuery);
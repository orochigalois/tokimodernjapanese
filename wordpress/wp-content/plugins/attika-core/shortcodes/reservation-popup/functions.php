<?php

if ( ! function_exists( 'attika_core_add_reservation_popup_shortcodes' ) ) {
    function attika_core_add_reservation_popup_shortcodes( $shortcodes_class_name ) {
        $shortcodes = array(
            'AttikaCore\CPT\Shortcodes\ReservationPopup\ReservationPopup'
        );

        $shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );

        return $shortcodes_class_name;
    }

    add_filter( 'attika_core_filter_add_vc_shortcode', 'attika_core_add_reservation_popup_shortcodes' );
}

if ( ! function_exists( 'attika_core_set_reservation_popup_icon_class_name_for_vc_shortcodes' ) ) {
    /**
     * Function that set custom icon class name for reservation popup shortcode to set our icon for Visual Composer shortcodes panel
     */
    function attika_core_set_reservation_popup_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
        $shortcodes_icon_class_array[] = '.icon-wpb-reservation-popup';

        return $shortcodes_icon_class_array;
    }

    add_filter( 'attika_core_filter_add_vc_shortcodes_custom_icon_class', 'attika_core_set_reservation_popup_icon_class_name_for_vc_shortcodes' );
}

if ( ! function_exists('attika_core_get_reservation_popup') ) {
    /**
     * Loads search HTML based on search type option.
     */
    function attika_core_get_reservation_popup() {

        if ( attika_mikado_has_shortcode( 'mkdf_reservation_popup' ) ) {
            attika_core_load_reservation_popup_template();
        }
    }
}

if ( ! function_exists('attika_core_load_reservation_popup_template') ) {
    /**
     * Loads HTML template with parameters
     */
    function attika_core_load_reservation_popup_template() {
        //echo attika_core_get_shortcode_module_template_part( 'templates/reservation-popup', 'reservation-popup', '', '' );
    }
}
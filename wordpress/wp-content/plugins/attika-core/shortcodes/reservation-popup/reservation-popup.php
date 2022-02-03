<?php
namespace AttikaCore\CPT\Shortcodes\ReservationPopup;

use AttikaCore\Lib;

class ReservationPopup implements Lib\ShortcodeInterface {
    private $base;

    function __construct() {
        $this->base = 'mkdf_reservation_popup';
        add_action( 'vc_before_init', array( $this, 'vcMap' ) );
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if ( function_exists( 'vc_map' ) ) {
            vc_map(
                array(
                    'name'                    => esc_html__( 'Reservation Popup', 'attika-core' ),
                    'base'                    => $this->base,
                    'category'                => esc_html__( 'by ATTIKA', 'attika-core' ),
                    'icon'                    => 'icon-wpb-reservation-popup extended-custom-icon',
                    'params'                  => array(
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'opener',
                            'heading'    => esc_html__( 'Opener Type', 'attika-core' ),
                            'value'      => array(
                                esc_html__( 'Type 1 - Icon only', 'attika-core' ) => 'simple-circle',
                                esc_html__( 'Type 2 - icon with text', 'attika-core' )    => 'rectangle-with-text'
                            )
                        ),
                        array(
                            'type'        => 'textfield',
                            'heading'     => esc_html__('OpenTable ID', 'attika-core'),
                            'param_name'  => 'open_table_id',
                            'admin_label' => true
                        )
                    )
                )
            );
        }
    }

    public function render( $atts, $content = null ) {
        $args   = array(
            'opener' => 'simple-circle',
            'open_table_id' => ''
        );
        $params = shortcode_atts( $args, $atts );

        $opener_class = '';
        if($params['opener'] === 'simple-circle') {
            $opener_class = 'mkdf-reservation-popup-opener-simple-circle';
        } else {
            $opener_class = 'mkdf-reservation-popup-opener-rectangle-with-text';
        }


        $html = ' <a target="_blank" class="mkdf-reservation-popup-opener '. esc_attr($opener_class) .'" href="https://inline.app/booking/-MpjG8m8BPz5nFrEWIFj:inline-live-2/-MpjG8zN4HHVQNAGTRcX">';

        if($params['opener'] === 'rectangle-with-text') {
            $html .= '<span class="mkdf-reservation-popup-opener-label">'. esc_html__('reservations','attika-core').'</span>';
        }

        $html .= '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="33px" height="54px" viewBox="0 0 33 54" enable-background="new 0 0 33 54" xml:space="preserve">
        <path d="M32.669,0.438c-0.317-0.285-0.783-0.333-1.154-0.123c-1.078,0.603-2.982,2.012-3.604,4.654
            c-0.541,2.284-0.854,4.579-1.158,6.797c-1.01,7.409-1.812,13.262-9.842,14.166C7.066,27.036,2.445,28.068,1.083,31.26
            c-0.197,0.462-0.1,0.976,0.257,1.336c0.244,0.249,0.569,0.381,0.902,0.381c0.164,0,0.328-0.031,0.484-0.098
            c1.294-0.531,4.013-1.103,9.629-0.802c0.653,0.036,1.294,0.067,1.922,0.09l-7.87,20.888c-0.11,0.29,0.037,0.615,0.329,0.724
            c0.064,0.024,0.132,0.038,0.198,0.038c0.227,0,0.441-0.139,0.526-0.365l2.503-6.643l7.292-5.948l7.296,5.949l2.501,6.642
            c0.086,0.227,0.3,0.365,0.528,0.365c0.066,0,0.134-0.014,0.197-0.038c0.292-0.108,0.439-0.434,0.329-0.724l-6.185-16.405
            c-0.008-0.036-0.021-0.065-0.037-0.099l-1.669-4.432c6.025-0.476,10.009-2.704,10.586-9.99c0.182-2.277,0.32-4.6,0.453-6.842
            c0.352-5.851,0.681-11.378,1.665-13.736C33.087,1.157,32.986,0.72,32.669,0.438z M10.755,44.707l2.639-6.997l2.973,2.423
            L10.755,44.707z M18.147,40.133l2.972-2.423l2.639,6.999L18.147,40.133z M19.05,32.218l1.651,4.38l-3.445,2.809l-3.443-2.809
            l1.65-4.38c0.001-0.003,0.001-0.009,0.001-0.013c1.252,0.034,2.45,0.036,3.582-0.013C19.048,32.199,19.048,32.209,19.05,32.218z
             M30.133,15.22c-0.134,2.234-0.271,4.55-0.453,6.82c-0.727,9.142-7.015,9.464-17.263,8.914c-5.828-0.313-8.718,0.309-10.118,0.886
            c-0.085,0.031-0.138-0.015-0.157-0.034c-0.046-0.049-0.032-0.084-0.023-0.103c1.135-2.658,5.714-3.618,14.917-4.652
            c8.901-1.001,9.84-7.865,10.834-15.132c0.298-2.192,0.61-4.459,1.136-6.691c0.466-1.978,1.798-3.141,2.734-3.735
            C30.793,4.156,30.485,9.305,30.133,15.22z"/>
        </svg>';
        $html .= '</a>';

        add_action('wp_footer', function () use ($params) {
            echo attika_core_get_shortcode_module_template_part( 'templates/reservation-popup', 'reservation-popup', '', $params );
        });

        return $html;
    }
}

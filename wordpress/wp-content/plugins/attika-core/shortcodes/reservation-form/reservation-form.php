<?php
namespace AttikaCore\CPT\Shortcodes\ReservationForm;

use AttikaCore\Lib;

class ReservationForm implements Lib\ShortcodeInterface {
    private $base;

    function __construct() {
        $this->base = 'mkdf_reservation_form';
        add_action( 'vc_before_init', array( $this, 'vcMap' ) );
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if ( function_exists( 'vc_map' ) ) {
            vc_map(
                array(
                    'name'                    => esc_html__( 'Reservation Form', 'attika-core' ),
                    'base'                    => $this->base,
                    'category'                => esc_html__( 'by ATTIKA', 'attika-core' ),
                    'icon'                    => 'icon-wpb-reservation-form extended-custom-icon',
                    'params'                  => array(
                        array(
                            'type'        => 'textfield',
                            'heading'     => esc_html__('OpenTable ID', 'attika-core'),
                            'param_name'  => 'open_table_id',
                            'admin_label' => true
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Form Fields Skin', 'attika-core'),
                            'param_name' => 'open_table_skin',
                            'value'      => array(
                                esc_html__( 'Default', 'attika-core' ) => '',
                                esc_html__( 'Light', 'attika-core' )    => 'light'
                            )
                        )
                    )
                )
            );
        }
    }

    public function render( $atts, $content = null ) {
        $args   = array(
            'open_table_id' => '',
            'open_table_skin' => ''
        );
        $params = shortcode_atts( $args, $atts );

        $params['holder_classes'] = $this->getHolderClasses( $params );

        return attika_core_get_shortcode_module_template_part('templates/reservation-form', 'reservation-form', '', $params);

        return $html;
    }

    private function getHolderClasses( $params ) {
        $holder_classes = array( 'mkdf-rf-holder' );

        $holder_classes[] = ! empty( $params['open_table_skin'] ) ? 'mkdf-rf-holder-light' : '';

        return implode( ' ', $holder_classes );
    }
}

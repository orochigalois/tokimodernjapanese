<?php
namespace AttikaRestaurant\Shortcodes\MenuPopup;

use AttikaRestaurant\Lib\ShortcodeInterface;

class MenuPopup implements ShortcodeInterface {
    private $base;

    function __construct() {
        $this->base = 'mkdf_menu_popup';
        add_action( 'vc_before_init', array( $this, 'vcMap' ) );
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if ( function_exists( 'vc_map' ) ) {
            vc_map(
                array(
                    'name'                    => esc_html__( 'Menu Popup', 'attika-core' ),
                    'base'                    => $this->base,
                    'category'                => esc_html__( 'by ATTIKA RESTAURANT', 'attika-core' ),
                    'icon'                    => 'icon-wpb-menu-popup extended-custom-icon',
                    'params'                  => array(
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'opener_skin',
                            'heading'    => esc_html__( 'Opener Type', 'attika-core' ),
                            'value'      => array(
                                esc_html__( 'Default', 'attika-core' ) => '',
                                esc_html__( 'Light', 'attika-core' )    => 'mkdf-menu-popup-light-opener'
                            )
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'number_of_columns',
                            'heading'     => esc_html__( 'Number of Columns', 'attika-core' ),
                            'value'       => array_flip( attika_mikado_get_number_of_columns_array( false, array('four','five','six') ) ),
                            'save_always' => true
                        ),
                        array(
                          'type'          => 'textfield',
                          'param_name'    => 'column_one_category',
                          'heading'       => esc_html__('Column One Category', 'attika-core'),
                        ),
                        array(
                            'type'          => 'textfield',
                            'param_name'    => 'column_two_category',
                            'heading'       => esc_html__('Column Two Category', 'attika-core'),
                            'dependency' => array( 'element' => 'number_of_columns', 'value' => array( 'two', 'three' ) ),
                        ),
                        array(
                            'type'          => 'textfield',
                            'param_name'    => 'column_three_category',
                            'heading'       => esc_html__('Column Three Category', 'attika-core'),
                            'dependency' => array( 'element' => 'number_of_columns', 'value' => array( 'three' ) ),
                        ),
                    )
                )
            );
        }
    }

    public function render( $atts, $content = null ) {
        $args   = array(
            'opener_skin' => '',
            'number_of_columns' => 'three',
            'column_one_category'  => '',
            'column_two_category'  => '',
            'column_three_category'  => '',
        );
        $params = shortcode_atts( $args, $atts );
        $params['holder_class'] = $this->getHolderClasses( $params, $args );

        $opener_class = '';
        if($params['opener_skin'] === 'mkdf-menu-popup-light-opener') {
            $opener_class = 'mkdf-menu-popup-light-opener';
        }

        $html = ' <a class="mkdf-menu-popup-opener '. esc_attr($opener_class).'" href="/?page_id=1231">';


        $html .= '<svg class="mkdf-menu-popup-opener-svg" version="1.1"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="55.164px"
                height="53.167px" viewBox="0 0 55.164 53.167" enable-background="new 0 0 55.164 53.167" xml:space="preserve">
            <path class="mkdf-svg-opener" d="M1.441,47.971c0.297,0,0.536-0.239,0.536-0.534c0-12.764,11.523-23.146,25.687-23.146c14.164,0,25.688,10.382,25.688,23.146
            c0,0.295,0.239,0.534,0.534,0.534s0.536-0.239,0.536-0.534c0-3.277-0.711-6.455-2.11-9.445c-1.353-2.886-3.284-5.475-5.747-7.697
            c-2.458-2.221-5.317-3.962-8.504-5.179c-3.291-1.257-6.79-1.896-10.396-1.896c-3.606,0-7.104,0.638-10.398,1.896
            c-3.185,1.217-6.045,2.958-8.503,5.179c-2.46,2.223-4.394,4.812-5.745,7.697c-1.401,2.99-2.111,6.168-2.111,9.445
            C0.907,47.731,1.146,47.971,1.441,47.971z"/>
            <path d="M53.741,49.215H1.587c-0.676,0-1.226,0.548-1.226,1.226c0,0.675,0.549,1.223,1.226,1.223h52.154
            c0.676,0,1.226-0.548,1.226-1.223C54.967,49.763,54.417,49.215,53.741,49.215z M53.741,50.592H1.587
            c-0.085,0-0.155-0.067-0.155-0.151c0-0.086,0.07-0.155,0.155-0.155h52.154c0.085,0,0.153,0.069,0.153,0.155
            C53.895,50.524,53.826,50.592,53.741,50.592z"/>
            <path class="mkdf-svg-opener" d="M27.664,23.174c1.596,0,2.896-1.299,2.896-2.895s-1.3-2.894-2.896-2.894s-2.894,1.298-2.894,2.894
            S26.068,23.174,27.664,23.174z M27.664,18.454c1.004,0,1.821,0.82,1.821,1.825c0,1.006-0.817,1.823-1.821,1.823
            c-1.006,0-1.824-0.817-1.824-1.823C25.84,19.274,26.658,18.454,27.664,18.454z"/>
            <path class="mkdf-svg-opener" d="M13.485,32.43c-3.999,3.07-6.541,7.39-7.162,12.162c-0.039,0.295,0.169,0.563,0.462,0.601
            c0.023,0.002,0.046,0.004,0.069,0.004c0.265,0,0.496-0.196,0.531-0.465c0.583-4.49,2.981-8.556,6.752-11.453
            c0.235-0.181,0.279-0.518,0.098-0.751C14.055,32.293,13.719,32.249,13.485,32.43z"/>
            <g class="mkdf-svg-smoke-1">
            <path d="M27.004,14.126c-0.087,0-0.174-0.027-0.249-0.084c-0.112-0.085-2.763-2.132-2.77-4.643
                c-0.003-1.238,0.627-2.354,1.877-3.315c1.78-1.373,2.089-2.25,2.035-2.743c-0.051-0.462-0.461-0.875-1.221-1.228
                c-0.205-0.095-0.293-0.338-0.198-0.544c0.096-0.205,0.338-0.294,0.544-0.198c1.036,0.482,1.604,1.115,1.689,1.88
                c0.114,1.036-0.655,2.175-2.35,3.482c-1.036,0.798-1.56,1.694-1.558,2.664c0.006,2.111,2.423,3.975,2.448,3.994
                c0.179,0.137,0.214,0.394,0.079,0.574C27.249,14.071,27.127,14.126,27.004,14.126z"/>
            </g>
            <g class="mkdf-svg-smoke-2">
            <path d="M30.26,13.475c-0.07,0-0.14-0.018-0.205-0.055c-0.083-0.048-2.055-1.208-2.305-3.181C27.594,9,28.145,7.751,29.395,6.526
                c0.161-0.159,0.42-0.156,0.578,0.005c0.16,0.162,0.156,0.421-0.005,0.58c-1.054,1.033-1.528,2.05-1.406,3.02
                c0.195,1.568,1.885,2.569,1.902,2.58c0.197,0.114,0.264,0.364,0.15,0.56C30.536,13.401,30.4,13.475,30.26,13.475z"/>
            </g>
            </svg>';
        $html .= '</a>';

        add_action('wp_footer', function () use ($params) {
            echo attika_restaurant_get_template_part( 'modules/shortcodes/menu-popup/templates/menu-popup', '', $params, true );
        });

        return $html;
    }

    private function getHolderClasses( $params, $args ) {
        $holderClasses = array();

        $holderClasses[] = ! empty( $params['number_of_columns'] ) ? 'mkdf-menu-popup-' . $params['number_of_columns'] . '-columns' : 'mkdf-' . $args['number_of_columns'] . '-columns';

        return implode( ' ', $holderClasses );
    }
}

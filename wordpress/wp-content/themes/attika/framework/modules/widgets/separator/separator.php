<?php

if ( class_exists( 'AttikaCoreClassWidget' ) ) {
    class AttikaMikadoClassSeparatorWidget extends AttikaCoreClassWidget {
        public function __construct() {
            parent::__construct(
                'mkdf_separator_widget',
                esc_html__( 'Attika Separator Widget', 'attika' ),
                array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'attika' ) )
            );

            $this->setParams();
        }

        protected function setParams() {
            $this->params = array(
                array(
                    'type'    => 'dropdown',
                    'name'    => 'type',
                    'title'   => esc_html__( 'Type', 'attika' ),
                    'options' => array(
                        'normal'     => esc_html__( 'Normal', 'attika' ),
                        'full-width' => esc_html__( 'Full Width', 'attika' )
                    )
                ),
                array(
                    'type'    => 'dropdown',
                    'name'    => 'position',
                    'title'   => esc_html__( 'Position', 'attika' ),
                    'options' => array(
                        'center' => esc_html__( 'Center', 'attika' ),
                        'left'   => esc_html__( 'Left', 'attika' ),
                        'right'  => esc_html__( 'Right', 'attika' )
                    )
                ),
                array(
                    'type'    => 'dropdown',
                    'name'    => 'border_style',
                    'title'   => esc_html__( 'Style', 'attika' ),
                    'options' => array(
                        'solid'  => esc_html__( 'Solid', 'attika' ),
                        'dashed' => esc_html__( 'Dashed', 'attika' ),
                        'dotted' => esc_html__( 'Dotted', 'attika' )
                    )
                ),
                array(
                    'type'  => 'colorpicker',
                    'name'  => 'color',
                    'title' => esc_html__( 'Color', 'attika' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'width',
                    'title' => esc_html__( 'Width (px or %)', 'attika' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'thickness',
                    'title' => esc_html__( 'Thickness (px)', 'attika' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'top_margin',
                    'title' => esc_html__( 'Top Margin (px or %)', 'attika' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'bottom_margin',
                    'title' => esc_html__( 'Bottom Margin (px or %)', 'attika' )
                )
            );
        }

        public function widget( $args, $instance ) {
            if ( ! is_array( $instance ) ) {
                $instance = array();
            }

            //prepare variables
            $params = '';

            //is instance empty?
            if ( is_array( $instance ) && count( $instance ) ) {
                //generate shortcode params
                foreach ( $instance as $key => $value ) {
                    $params .= " $key='$value' ";
                }
            }

            echo '<div class="widget mkdf-separator-widget">';
            echo do_shortcode( "[mkdf_separator $params]" ); // XSS OK
            echo '</div>';
        }
    }
}
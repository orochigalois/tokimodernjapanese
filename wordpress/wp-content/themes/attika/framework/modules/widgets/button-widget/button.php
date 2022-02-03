<?php

if ( class_exists( 'AttikaCoreClassWidget' ) ) {
    class AttikaMikadoClassButtonWidget extends AttikaCoreClassWidget {
        public function __construct() {
            parent::__construct(
                'mkdf_button_widget',
                esc_html__( 'Attika Button Widget', 'attika' ),
                array( 'description' => esc_html__( 'Add button element to widget areas', 'attika' ) )
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
                        'solid'   => esc_html__( 'Solid', 'attika' ),
                        'outline' => esc_html__( 'Outline', 'attika' ),
                        'simple'  => esc_html__( 'Simple', 'attika' )
                    )
                ),
                array(
                    'type'        => 'dropdown',
                    'name'        => 'size',
                    'title'       => esc_html__( 'Size', 'attika' ),
                    'options'     => array(
                        'small'  => esc_html__( 'Small', 'attika' ),
                        'medium' => esc_html__( 'Medium', 'attika' ),
                        'large'  => esc_html__( 'Large', 'attika' ),
                        'huge'   => esc_html__( 'Huge', 'attika' )
                    ),
                    'description' => esc_html__( 'This option is only available for solid and outline button type', 'attika' )
                ),
                array(
                    'type'    => 'textfield',
                    'name'    => 'text',
                    'title'   => esc_html__( 'Text', 'attika' ),
                    'default' => esc_html__( 'Button Text', 'attika' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'link',
                    'title' => esc_html__( 'Link', 'attika' )
                ),
                array(
                    'type'    => 'dropdown',
                    'name'    => 'target',
                    'title'   => esc_html__( 'Link Target', 'attika' ),
                    'options' => attika_mikado_get_link_target_array()
                ),
                array(
                    'type'  => 'colorpicker',
                    'name'  => 'color',
                    'title' => esc_html__( 'Color', 'attika' )
                ),
                array(
                    'type'  => 'colorpicker',
                    'name'  => 'hover_color',
                    'title' => esc_html__( 'Hover Color', 'attika' )
                ),
                array(
                    'type'        => 'colorpicker',
                    'name'        => 'background_color',
                    'title'       => esc_html__( 'Background Color', 'attika' ),
                    'description' => esc_html__( 'This option is only available for solid button type', 'attika' )
                ),
                array(
                    'type'        => 'colorpicker',
                    'name'        => 'hover_background_color',
                    'title'       => esc_html__( 'Hover Background Color', 'attika' ),
                    'description' => esc_html__( 'This option is only available for solid button type', 'attika' )
                ),
                array(
                    'type'        => 'colorpicker',
                    'name'        => 'border_color',
                    'title'       => esc_html__( 'Border Color', 'attika' ),
                    'description' => esc_html__( 'This option is only available for solid and outline button type', 'attika' )
                ),
                array(
                    'type'        => 'colorpicker',
                    'name'        => 'hover_border_color',
                    'title'       => esc_html__( 'Hover Border Color', 'attika' ),
                    'description' => esc_html__( 'This option is only available for solid and outline button type', 'attika' )
                ),
                array(
                    'type'        => 'textfield',
                    'name'        => 'margin',
                    'title'       => esc_html__( 'Margin', 'attika' ),
                    'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'attika' )
                )
            );
        }

        public function widget( $args, $instance ) {
            $params = '';

            if ( ! is_array( $instance ) ) {
                $instance = array();
            }

            // Filter out all empty params
            $instance = array_filter( $instance, function ( $array_value ) {
                return trim( $array_value ) != '';
            } );

            // Default values
            if ( ! isset( $instance['text'] ) ) {
                $instance['text'] = 'Button Text';
            }

            // Generate shortcode params
            foreach ( $instance as $key => $value ) {
                $params .= " $key='$value' ";
            }

            echo '<div class="widget mkdf-button-widget">';
            echo do_shortcode( "[mkdf_button $params]" ); // XSS OK
            echo '</div>';
        }
    }
}
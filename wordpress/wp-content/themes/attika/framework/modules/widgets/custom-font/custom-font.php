<?php

if ( class_exists( 'AttikaCoreClassWidget' ) ) {
    class AttikaMikadoClassCustomFontWidget extends AttikaCoreClassWidget {
        public function __construct() {
            parent::__construct(
                'mkdf_custom_font_widget',
                esc_html__( 'Attika Custom Font Widget', 'attika' ),
                array( 'description' => esc_html__( 'Add custom font element to widget areas', 'attika' ) )
            );

            $this->setParams();
        }

        protected function setParams() {
            $this->params = array(
                array(
                    'type'        => 'textfield',
                    'name'        => 'custom_class',
                    'title'       => esc_html__( 'Custom CSS Class', 'attika' ),
                    'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'attika' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'title',
                    'title' => esc_html__( 'Title Text', 'attika' )
                ),
                array(
                    'type'    => 'dropdown',
                    'name'    => 'title_tag',
                    'title'   => esc_html__( 'Title Tag', 'attika' ),
                    'options' => attika_mikado_get_title_tag( true, array( 'p' => 'p' ) )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'font_family',
                    'title' => esc_html__( 'Font Family', 'attika' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'font_size',
                    'title' => esc_html__( 'Font Size (px or em)', 'attika' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'line_height',
                    'title' => esc_html__( 'Line Height (px or em)', 'attika' )
                ),
                array(
                    'type'    => 'dropdown',
                    'name'    => 'font_weight',
                    'title'   => esc_html__( 'Font Weight', 'attika' ),
                    'options' => attika_mikado_get_font_weight_array( true )
                ),
                array(
                    'type'    => 'dropdown',
                    'name'    => 'font_style',
                    'title'   => esc_html__( 'Font Style', 'attika' ),
                    'options' => attika_mikado_get_font_style_array( true )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'letter_spacing',
                    'title' => esc_html__( 'Letter Spacing (px or em)', 'attika' )
                ),
                array(
                    'type'    => 'dropdown',
                    'name'    => 'text_transform',
                    'title'   => esc_html__( 'Text Transform', 'attika' ),
                    'options' => attika_mikado_get_text_transform_array( true )
                ),
                array(
                    'type'    => 'dropdown',
                    'name'    => 'text_decoration',
                    'title'   => esc_html__( 'Text Decoration', 'attika' ),
                    'options' => attika_mikado_get_text_decorations( true )
                ),
                array(
                    'type'  => 'colorpicker',
                    'name'  => 'color',
                    'title' => esc_html__( 'Color', 'attika' )
                ),
                array(
                    'type'    => 'dropdown',
                    'name'    => 'text_align',
                    'title'   => esc_html__( 'Text Align', 'attika' ),
                    'options' => array(
                        ''        => esc_html__( 'Default', 'attika' ),
                        'left'    => esc_html__( 'Left', 'attika' ),
                        'center'  => esc_html__( 'Center', 'attika' ),
                        'right'   => esc_html__( 'Right', 'attika' ),
                        'justify' => esc_html__( 'Justify', 'attika' )
                    )
                ),
                array(
                    'type'        => 'textfield',
                    'name'        => 'margin',
                    'title'       => esc_html__( 'Margin (px or %)', 'attika' ),
                    'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'attika' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'font_size_1280',
                    'title' => esc_html__( 'Small Laptops Font Size (px or em)', 'attika' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'line_height_1280',
                    'title' => esc_html__( 'Small Laptops Line Height (px or em)', 'attika' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'font_size_1024',
                    'title' => esc_html__( 'Tablets Landscape Font Size (px or em)', 'attika' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'line_height_1024',
                    'title' => esc_html__( 'Tablets Landscape Line Height (px or em)', 'attika' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'font_size_768',
                    'title' => esc_html__( 'Tablets Portrait Font Size (px or em)', 'attika' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'line_height_768',
                    'title' => esc_html__( 'Tablets Portrait Line Height (px or em)', 'attika' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'font_size_680',
                    'title' => esc_html__( 'Mobiles Font Size (px or em)', 'attika' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'line_height_680',
                    'title' => esc_html__( 'Mobiles Line Height (px or em)', 'attika' )
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

            // Generate shortcode params
            foreach ( $instance as $key => $value ) {
                $params .= " $key='$value' ";
            }

            echo '<div class="widget mkdf-custom-font-widget">';
            echo do_shortcode( "[mkdf_custom_font $params]" ); // XSS OK
            echo '</div>';
        }
    }
}
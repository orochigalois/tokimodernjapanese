<?php

if ( ! function_exists( 'attika_core_register_widgets' ) ) {
    function attika_core_register_widgets() {
        $widgets = apply_filters( 'attika_core_filter_register_widgets', $widgets = array() );

        foreach ( $widgets as $widget ) {
            register_widget( $widget );
        }
    }

    add_action( 'widgets_init', 'attika_core_register_widgets' );
}
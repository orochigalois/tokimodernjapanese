<?php

if ( ! function_exists( 'attika_core_load_widget_class' ) ) {
    /**
     * Loades widget class file.
     */
    function attika_core_load_widget_class() {
        include_once 'widget-class.php';
    }

    add_action( 'attika_mikado_action_before_options_map', 'attika_core_load_widget_class' );
}

if ( ! function_exists( 'attika_core_load_widgets' ) ) {
    /**
     * Loades all widgets by going through all folders that are placed directly in widgets folder
     * and loads load.php file in each. Hooks to attika_mikado_action_before_options_map action
     */
    function attika_core_load_widgets() {

        if ( attika_core_theme_installed() ) {
            foreach ( glob( MIKADO_FRAMEWORK_ROOT_DIR . '/modules/widgets/*/load.php' ) as $widget_load ) {
                include_once $widget_load;
            }
        }

        include_once 'widget-loader.php';
    }

    add_action( 'attika_mikado_action_before_options_map', 'attika_core_load_widgets' );
}
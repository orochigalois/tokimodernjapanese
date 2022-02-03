<?php

if ( ! function_exists( 'attika_mikado_include_woocommerce_shortcodes' ) ) {
	function attika_mikado_include_woocommerce_shortcodes() {
		if( attika_mikado_is_theme_registered() ) {
			foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/woocommerce/shortcodes/*/load.php' ) as $shortcode_load ) {
				include_once $shortcode_load;
			}
		}
	}
	
	if ( attika_mikado_core_plugin_installed() ) {
		add_action( 'attika_core_action_include_shortcodes_file', 'attika_mikado_include_woocommerce_shortcodes' );
	}
}

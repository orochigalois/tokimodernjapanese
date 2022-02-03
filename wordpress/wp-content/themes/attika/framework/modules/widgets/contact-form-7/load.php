<?php

if ( attika_mikado_contact_form_7_installed() ) {
	include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'attika_core_filter_register_widgets', 'attika_mikado_register_cf7_widget' );
}

if ( ! function_exists( 'attika_mikado_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function attika_mikado_register_cf7_widget( $widgets ) {
		$widgets[] = 'AttikaMikadoClassContactForm7Widget';
		
		return $widgets;
	}
}
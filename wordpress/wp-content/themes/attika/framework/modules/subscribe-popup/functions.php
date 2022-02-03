<?php

if ( ! function_exists( 'attika_mikado_get_subscribe_popup' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function attika_mikado_get_subscribe_popup() {
		
		if ( attika_mikado_options()->getOptionValue( 'enable_subscribe_popup' ) === 'yes' && ( attika_mikado_options()->getOptionValue( 'subscribe_popup_contact_form' ) !== '' || attika_mikado_options()->getOptionValue( 'subscribe_popup_title' ) !== '' ) ) {
			attika_mikado_load_subscribe_popup_template();
		}
	}
	
	//Get subscribe popup HTML
	add_action( 'attika_mikado_action_before_page_header', 'attika_mikado_get_subscribe_popup' );
}

if ( ! function_exists( 'attika_mikado_load_subscribe_popup_template' ) ) {
	/**
	 * Loads HTML template with parameters
	 */
	function attika_mikado_load_subscribe_popup_template() {
		$parameters                       = array();
		$parameters['title']              = attika_mikado_options()->getOptionValue( 'subscribe_popup_title' );
		$parameters['subtitle']           = attika_mikado_options()->getOptionValue( 'subscribe_popup_subtitle' );
		$background_image_meta            = attika_mikado_options()->getOptionValue( 'subscribe_popup_background_image' );
		$parameters['background_styles']  = ! empty( $background_image_meta ) ? 'background-image: url(' . esc_url( $background_image_meta ) . ')' : '';
		$parameters['contact_form']       = attika_mikado_options()->getOptionValue( 'subscribe_popup_contact_form' );
		$parameters['contact_form_style'] = attika_mikado_options()->getOptionValue( 'subscribe_popup_contact_form_style' );
		$parameters['enable_prevent']     = attika_mikado_options()->getOptionValue( 'enable_subscribe_popup_prevent' );
		$parameters['prevent_behavior']   = attika_mikado_options()->getOptionValue( 'subscribe_popup_prevent_behavior' );
		
		$holder_classes   = array();
		$holder_classes[] = $parameters['enable_prevent'] === 'yes' ? 'mkdf-prevent-enable' : 'mkdf-prevent-disable';
		$holder_classes[] = ! empty( $parameters['prevent_behavior'] ) ? 'mkdf-prevent-' . $parameters['prevent_behavior'] : 'mkdf-prevent-session';
		$holder_classes[] = ! empty( $background_image_meta ) ? 'mkdf-sp-has-image' : '';
		
		$parameters['holder_classes'] = implode( ' ', $holder_classes );
		
		attika_mikado_get_module_template_part( 'templates/subscribe-popup', 'subscribe-popup', '', $parameters );
	}
}
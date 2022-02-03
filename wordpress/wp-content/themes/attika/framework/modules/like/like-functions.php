<?php

if ( ! function_exists( 'attika_mikado_like' ) ) {
	/**
	 * Returns AttikaMikadoClassLike instance
	 *
	 * @return AttikaMikadoClassLike
	 */
	function attika_mikado_like() {
		return AttikaMikadoClassLike::get_instance();
	}
}

function attika_mikado_get_like() {
	
	echo wp_kses( attika_mikado_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'    => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}
<?php

include_once 'const.php';

//load lib
include_once 'lib/helpers-functions.php';
require_once 'lib/shortcode-interface.php';
require_once 'lib/shortcode-loader.php';
require_once 'lib/shortcode-functions.php';

//load post-post-types
require_once 'lib/post-type-interface.php';
require_once 'post-types/post-types-functions.php';
require_once 'post-types/post-types-register.php'; //this has to be loaded last

//load admin
if ( ! function_exists( 'attika_restaurant_load_admin' ) ) {
	function attika_restaurant_load_admin() {
		require_once 'admin/options/map.php';
	}
	
	add_action( 'attika_mikado_action_before_options_map', 'attika_restaurant_load_admin' );
}

//load custom styles
if ( ! function_exists( 'attika_restaurant_load_custom_styles' ) ) {
	function attika_restaurant_load_custom_styles() {
		require_once 'assets/custom-styles/restaurant.php';
	}
	
	add_action( 'after_setup_theme', 'attika_restaurant_load_custom_styles' );
}
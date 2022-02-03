<?php
/*
Plugin Name: Attika Restaurant
Description: Plugin that adds features to our theme
Author: Mikado Themes
Version: 1.0.2
*/

include_once 'load.php';

add_action( 'after_setup_theme', array( AttikaRestaurant\CPT\PostTypesRegister::getInstance(), 'register' ) );

if ( ! function_exists( 'attika_restaurant_load_assets' ) ) {
	function attika_restaurant_load_assets() {

        $array_deps_css            = array();
        $array_deps_css_responsive = array();
        $array_deps_js             = array();

        if ( attika_restaurant_theme_installed() ) {
            $array_deps_css[]            = 'attika-mikado-modules';
            $array_deps_css_responsive[] = 'attika-mikado-modules-responsive';
            $array_deps_js[]             = 'attika-mikado-modules';
        }

		wp_enqueue_style( 'attika-restaurant-style', plugins_url( '/assets/css/restaurant.min.css', __FILE__ ), $array_deps_css, '' );
		
		if ( function_exists( 'attika_mikado_is_responsive_on' ) && attika_mikado_is_responsive_on() ) {
			wp_enqueue_style( 'attika-restaurant-responsive-style', plugins_url( '/assets/css/restaurant-responsive.min.css', __FILE__ ), $array_deps_css_responsive, '' );
		}
		
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'attika-restaurant-script', plugins_url( '/assets/js/restaurant.min.js', __FILE__ ), $array_deps_js, '', true );
	}
	
	add_action( 'wp_enqueue_scripts', 'attika_restaurant_load_assets' );
}

if ( ! function_exists( 'attika_restaurant_style_dynamics_deps' ) ) {
	function attika_restaurant_style_dynamics_deps( $deps ) {
		$style_dynamic_deps_array = array();
		$style_dynamic_deps_array[] = 'attika-restaurant-style';
		
		if ( function_exists( 'attika_mikado_is_responsive_on' ) && attika_mikado_is_responsive_on() ) {
			$style_dynamic_deps_array[] = 'attika-restaurant-responsive-style';
		}
		
		return array_merge( $deps, $style_dynamic_deps_array );
	}
	
	add_filter( 'attika_mikado_filter_style_dynamic_deps', 'attika_restaurant_style_dynamics_deps' );
}
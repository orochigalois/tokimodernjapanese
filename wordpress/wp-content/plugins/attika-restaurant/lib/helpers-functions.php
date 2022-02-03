<?php

if ( ! function_exists( 'attika_restaurant_activation' ) ) {
	/**
	 * Triggers when plugin is activated. It calls flush_rewrite_rules
	 * and defines attika_restaurant_on_activate action
	 */
	function attika_restaurant_activation() {
		do_action( 'attika_restaurant_on_activate' );
		
		// AttikaRestaurant\PostTypesRegister::getInstance()->register();
		flush_rewrite_rules();
	}
	
	register_activation_hook( __FILE__, 'attika_restaurant_activation' );
}

if ( ! function_exists( 'attika_restaurant_text_domain' ) ) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function attika_restaurant_text_domain() {
		load_plugin_textdomain( 'attika-restaurant', false, ATTIKA_RESTAURANT_REL_PATH . '/languages' );
	}
	
	add_action( 'plugins_loaded', 'attika_restaurant_text_domain' );
}

if ( ! function_exists( 'attika_restaurant_version_class' ) ) {
	/**
	 * Adds plugins version class to body
	 *
	 * @param $classes
	 *
	 * @return array
	 */
	function attika_restaurant_version_class( $classes ) {
		$classes[] = 'mkdf-restaurant-' . ATTIKA_RESTAURANT_VERSION;
		
		return $classes;
	}
	
	add_filter( 'body_class', 'attika_restaurant_version_class' );
}

if ( ! function_exists( 'attika_restaurant_theme_installed' ) ) {
	/**
	 * Checks whether theme is installed or not
	 * @return bool
	 */
	function attika_restaurant_theme_installed() {
		return defined( 'MIKADO_ROOT' );
	}
}

if ( ! function_exists( 'attika_restaurant_get_shortcode_module_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $post_type name of the post type folder
	 * @param string $shortcode name of the shortcode folder
	 * @param string $template name of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 *
	 * @return html
	 */
	function attika_restaurant_get_shortcode_module_template_part( $post_type, $shortcode, $template, $slug = '', $params = array() ) {
		//HTML Content from template
		$html          = '';
		$template_path = ATTIKA_RESTAURANT_CPT_PATH . '/' . $post_type . '/shortcodes/' . $shortcode . '/templates';
		
		$temp = $template_path . '/' . $template;
		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}
		
		$template = '';
		
		if ( $temp !== '' ) {
			$template = $temp . '.php';
			
			if ( $slug !== '' ) {
				$template = "{$temp}-{$slug}.php";
			}
		}
		if ( $template ) {
			ob_start();
			include( $template );
			$html = ob_get_clean();
		}
		
		return $html;
	}
}

if ( ! function_exists( 'attika_restaurant_get_template_part' ) ) {
	/**
	 * Loads template part with parameters. If file with slug parameter added exists it will load that file, else it will load file without slug added.
	 * Child theme friendly function
	 *
	 * @param string $template name of the template to load without extension
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 * @param bool   $return whether to return it as a string
	 *
	 * @return mixed
	 */
	function attika_restaurant_get_template_part( $template, $slug = '', $params = array(), $return = false ) {
		//HTML Content from template
		$html          = '';
		$template_path = ATTIKA_RESTAURANT_ABS_PATH;
		
		$temp = $template_path . '/' . $template;
		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}
		
		$template = '';
		
		if ( $temp !== '' ) {
			$template = $temp . '.php';
			
			if ( $slug !== '' ) {
				$template = "{$temp}-{$slug}.php";
			}
		}
		
		if ( $template ) {
			if ( $return ) {
				ob_start();
			}
			
			include( $template );
			
			if ( $return ) {
				$html = ob_get_clean();
			}
		}
		
		if ( $return ) {
			return $html;
		}
	}
}
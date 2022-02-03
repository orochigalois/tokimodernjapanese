<?php
/*
Plugin Name: Attika Instagram Feed
Description: Plugin that adds Instagram feed functionality to our theme
Author: Mikado Themes
Version: 2.0.1
*/
define('ATTIKA_INSTAGRAM_FEED_VERSION', '2.0.1');
define('ATTIKA_INSTAGRAM_ABS_PATH', dirname(__FILE__));
define('ATTIKA_INSTAGRAM_REL_PATH', dirname(plugin_basename(__FILE__ )));
define( 'ATTIKA_INSTAGRAM_URL_PATH', plugin_dir_url( __FILE__ ) );
define( 'ATTIKA_INSTAGRAM_ASSETS_PATH', ATTIKA_INSTAGRAM_ABS_PATH . '/assets' );
define( 'ATTIKA_INSTAGRAM_ASSETS_URL_PATH', ATTIKA_INSTAGRAM_URL_PATH . 'assets' );
define( 'ATTIKA_INSTAGRAM_SHORTCODES_PATH', ATTIKA_INSTAGRAM_ABS_PATH . '/shortcodes' );
define( 'ATTIKA_INSTAGRAM_SHORTCODES_URL_PATH', ATTIKA_INSTAGRAM_URL_PATH . 'shortcodes' );

include_once 'load.php';

if ( ! function_exists( 'attika_instagram_theme_installed' ) ) {
    /**
     * Checks whether theme is installed or not
     * @return bool
     */
    function attika_instagram_theme_installed() {
        return defined( 'MIKADO_ROOT' );
    }
}

if ( ! function_exists( 'attika_instagram_feed_text_domain' ) ) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function attika_instagram_feed_text_domain() {
		load_plugin_textdomain( 'attika-instagram-feed', false, ATTIKA_INSTAGRAM_REL_PATH . '/languages' );
	}
	
	add_action( 'plugins_loaded', 'attika_instagram_feed_text_domain' );
}
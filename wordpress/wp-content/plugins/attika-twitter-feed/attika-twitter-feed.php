<?php
/*
Plugin Name: Attika Twitter Feed
Description: Plugin that adds Twitter feed functionality to our theme
Author: Mikado Themes
Version: 1.0.2
*/

define( 'ATTIKA_TWITTER_FEED_VERSION', '1.0.2' );
define( 'ATTIKA_TWITTER_ABS_PATH', dirname( __FILE__ ) );
define( 'ATTIKA_TWITTER_REL_PATH', dirname( plugin_basename( __FILE__ ) ) );
define( 'ATTIKA_TWITTER_URL_PATH', plugin_dir_url( __FILE__ ) );
define( 'ATTIKA_TWITTER_ASSETS_PATH', ATTIKA_TWITTER_ABS_PATH . '/assets' );
define( 'ATTIKA_TWITTER_ASSETS_URL_PATH', ATTIKA_TWITTER_URL_PATH . 'assets' );
define( 'ATTIKA_TWITTER_SHORTCODES_PATH', ATTIKA_TWITTER_ABS_PATH . '/shortcodes' );
define( 'ATTIKA_TWITTER_SHORTCODES_URL_PATH', ATTIKA_TWITTER_URL_PATH . 'shortcodes' );

include_once 'load.php';

if ( ! function_exists( 'attika_twitter_theme_installed' ) ) {
	/**
	 * Checks whether theme is installed or not
	 * @return bool
	 */
	function attika_twitter_theme_installed() {
		return defined( 'MIKADO_ROOT' );
	}
}

if ( ! function_exists( 'attika_twitter_feed_text_domain' ) ) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function attika_twitter_feed_text_domain() {
		load_plugin_textdomain( 'attika-twitter-feed', false, ATTIKA_TWITTER_REL_PATH . '/languages' );
	}
	
	add_action( 'plugins_loaded', 'attika_twitter_feed_text_domain' );
}
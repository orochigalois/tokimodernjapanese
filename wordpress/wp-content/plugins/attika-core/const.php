<?php

define( 'ATTIKA_CORE_VERSION', '1.3' );
define( 'ATTIKA_CORE_ABS_PATH', dirname( __FILE__ ) );
define( 'ATTIKA_CORE_REL_PATH', dirname( plugin_basename( __FILE__ ) ) );
define( 'ATTIKA_CORE_URL_PATH', plugin_dir_url( __FILE__ ) );
define( 'ATTIKA_CORE_ASSETS_PATH', ATTIKA_CORE_ABS_PATH . '/assets' );
define( 'ATTIKA_CORE_ASSETS_URL_PATH', ATTIKA_CORE_URL_PATH . 'assets' );
define( 'ATTIKA_CORE_CPT_PATH', ATTIKA_CORE_ABS_PATH . '/post-types' );
define( 'ATTIKA_CORE_CPT_URL_PATH', ATTIKA_CORE_URL_PATH . 'post-types' );
define( 'ATTIKA_CORE_SHORTCODES_PATH', ATTIKA_CORE_ABS_PATH . '/shortcodes' );
define( 'ATTIKA_CORE_SHORTCODES_URL_PATH', ATTIKA_CORE_URL_PATH . 'shortcodes' );
define( 'ATTIKA_CORE_OPTIONS_NAME', 'mkdf_options_attika' );
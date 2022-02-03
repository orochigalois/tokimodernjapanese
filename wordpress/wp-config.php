<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp' );

/** MySQL database username */
define( 'DB_USER', 'wp' );

/** MySQL database password */
define( 'DB_PASSWORD', 'secret' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
define( 'FS_METHOD', 'direct' );
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ':<:YgC~)tyu_b)zm.)bVo_*+UCmJT/;3L1-ha?Ism8;9)^6UY8}wVigSmGG$Trs=' );
define( 'SECURE_AUTH_KEY',  'J%|}K8 f]~%-#bQ$N;slL@srCgze#q.9lf=>4RTy*Z_wcg|TO5^YI(Ur$yM A@T{' );
define( 'LOGGED_IN_KEY',    'qrG|zHMB_uF7JV7w$_Jft2FeG.dCxS!Zjua{ed)QdH &u6a:W5f2+,)A1=%fOGHQ' );
define( 'NONCE_KEY',        'XIScCmt[+P nsvNsd*dhIEYmqE:Jul`%/U&Z=~$;HfzEqxL]skrx4}Im Wd&u0zx' );
define( 'AUTH_SALT',        'T5BSc[$t/?~!Dt+S_xXu5#1#_e`>OmIIa1mpB|>qBd8%f(PgP?[ei5X<K_YX uI&' );
define( 'SECURE_AUTH_SALT', 'd4Lj&LC2t-FcOXR0ssrigK,4.xB/@vHz]2|Y^5Tmd([ac<_E0yP##3GT~LF[M$}O' );
define( 'LOGGED_IN_SALT',   'BBQG37ui{6u{C!HgnGI>)c,UU&ermMeqTOME[,z)Nm<`gH:Hm+(5f|/Ua6RbY|nK' );
define( 'NONCE_SALT',       '1jJWDo6:6G@ENra5Eb^;eys 6oV_.%1@A9 1,f]ZQCn*Ul#Y=;Dx|T@$mKC*/Z}(' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

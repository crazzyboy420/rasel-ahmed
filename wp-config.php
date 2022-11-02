<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'raselahmed' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'rX`m+lJyu; 1U)Ld%8^Rv{Bq04:/X%;Zye&TmIGC!k7kZ`G=(d)YB%*tDh,&7M,7' );
define( 'SECURE_AUTH_KEY',  'YJJ46 )tws|M<9_),q,7iv;;^7l:`b0L~:2v5JPyp8P}W7Lsmfuu|>(ey../TK2c' );
define( 'LOGGED_IN_KEY',    'wM1O{%S  xG+nt:5;,+*6mg4pJb:LT*T5.Gnov_.`^}zp+{<@~~?@FNE?_Q_+2!!' );
define( 'NONCE_KEY',        ');{THyrP82.~poMFaDC+15Lkf|TY]z-NYRj^q:5RlL,+>|;XFRExN6$JG9 G~HZB' );
define( 'AUTH_SALT',        'c|5ru[,5!sRCOI8.q>4-#n a]`Pl-RJr-Q}Fc6dJu2^7#5Nn:[Pg.E58*325PdOG' );
define( 'SECURE_AUTH_SALT', 'Il/ym%):W4,/)+UB%SC_sBb#Etg*XIMh5Q GK3mdQBTLg]zN;j6m*^^bIQt@MMM0' );
define( 'LOGGED_IN_SALT',   '2&W1|0sgd{IbJFky=r`+Q.AAaJh^ggqMf]*cKK(F[w0u)ACN~zBc$ja/cQV?NI*[' );
define( 'NONCE_SALT',       'dxf$ut:0-ji]{!>U3-4,unY;,}+7C:|i ?n+)K?:A,:S,pAM}gE&z9s_oQ h Y4n' );

/**#@-*/

/**
 * WordPress database table prefix.
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
define( 'WP_DEBUG', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

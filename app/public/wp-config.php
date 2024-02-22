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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '%|cF^jCjL5FZ7U}(j0fK`?{m^qc?mY<W>eI%H2 <@24(fSO,6|2; 6ImF`^/}M=K' );
define( 'SECURE_AUTH_KEY',   'siU:iJ+x/3%FHa;MGYt`rw%CxI#FA%:Sl,b;LVE]O[a|) WCiR^od0(.>+=MQVTO' );
define( 'LOGGED_IN_KEY',     'XCw$,gc@>GzGR=dk:]aJ/=>USZIf/pHf.F_I}wJl#*9AN~6/1w( /?wB@I^:qK%D' );
define( 'NONCE_KEY',         '^E&Qsl<*du%&;y^E)/jn1A}CMWY~Y*%Ny$]cB}Ap-yxo~0hWM)1tt5UpT-QbV^XR' );
define( 'AUTH_SALT',         '/Nx K#|zW*QE=#Ge=f97!wx|[U+DjV*sv-xI}>P/^[M3H;3Y-A$2!|lURh#NO;2J' );
define( 'SECURE_AUTH_SALT',  '&C.x`MM1>%N.&}x=34<&(9I_Gmt(AB4wN%{}^{4JwYe6%:T)-b,UUnzcW8:#]aoZ' );
define( 'LOGGED_IN_SALT',    's!*S;}<wAu*Qb%Zos!4JgWqm:bfX7sZmP*oj((^5Vwjv>y0l !m-iK<kV(s-%eM|' );
define( 'NONCE_SALT',        'W-#@6 MP#pMEuO-jxu@yHpIrX?};8qc-dzLgO7_pE+5!tm@W_cd/M]WLNLag1!RH' );
define( 'WP_CACHE_KEY_SALT', ']]>:f8]7cF`y8mm! #V{r_4?u/3`Y_DYnV}waMNuI.Yor?vre,|>F:@*OZN@L)qS' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

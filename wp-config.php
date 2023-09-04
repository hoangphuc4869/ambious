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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ambious' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         '-wq0qT`~Sriy1[73R@0FPq4]1W.8@3MeiS~?^2}MJ/soK,o0L1+!MU|eg (~8rCW' );
define( 'SECURE_AUTH_KEY',  'a6tGuG4gJS]n.0r8xC&9;i[[?[~KcW,Ba#8i)M?BJry4.%d$ImT~,]=%;2:%zw1o' );
define( 'LOGGED_IN_KEY',    'w,g4$@q.!puA]5T.zYZ(b={:O*&1gTI5~y`uQmTcRg!dQNJ8y0_.F.F&<JRFTwG.' );
define( 'NONCE_KEY',        'S`i>gQ9b-[2^P+1Xm}RcA(2DTRyIFRQM#?*R1x5$JQlYWk$/Nv<(6<pYu?BQA2=2' );
define( 'AUTH_SALT',        '5VgLVtBNyng)lf6s9vt6BfOxvE-=WIK%iS;Azn:kgZI)3|jfWH]M.PN|&PcQ+Wm@' );
define( 'SECURE_AUTH_SALT', 's<Kk{nej@,B3+@13R%N7zI<{w9dgj6xR]p/=H4ERBQ^4WoLj4&*hB>Oqg}}Szz~<' );
define( 'LOGGED_IN_SALT',   ' ]v0^AN^bP`?c]IT8qRKeq[FFymd|}rwuJ=;GXvGD1o+6#+YOV`B)$%%[{Q^>sx;' );
define( 'NONCE_SALT',       '_QI7Of=N>GNx.%Sto|DeWn$[M?NKo]wj0A!)H/_adis2_Tb-M>S]1FFSZ;k7|?wL' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'scm_template' );

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
define( 'AUTH_KEY',         '?jap02BF|m.CjrizV(QBC@[/QDm^Uv*>hn|^7FE]lZ::`>bHLsQ,BmDII`4v6B6{' );
define( 'SECURE_AUTH_KEY',  '`E1}J$[IS}n>CQXz#Or~X<qy<*6_Xh8&PA(=JyHfQLm&}5v_Hn?@Vg^*ZoJ~oeX@' );
define( 'LOGGED_IN_KEY',    'a/q,58I11?nUnu`F|9v)u?z909VNGT%L~MX7>.!MbpAa&u%8u ket(9]L?*AA~4P' );
define( 'NONCE_KEY',        '[D@t0vM:LUL3b6=c6[-+m}2y[GL=;up`!`7`f7$ W6>onn1c6> YRi}u[?Lnf9F ' );
define( 'AUTH_SALT',        'mL$a|qE)X;g|+W-~^AL~Ce0Zn) ]g<d^B2[R?Yt@XdEWHd|!gVVZ6.:F:Yr1Xg5m' );
define( 'SECURE_AUTH_SALT', 'Geq%?p3O+=Mztu6E|x6kQE8w>N3^6S$;$#QyP&`P&Fv5]_eHsBXyCZ,ilnH}$Gh4' );
define( 'LOGGED_IN_SALT',   'Kjs|M&#yT}V/yAtg_E27>8k6}LM|<_t_bPy08X=!C<@l3|K)>nN|+[_+9B6v]t&5' );
define( 'NONCE_SALT',       'CFekZrZtlZ(<BLXn,BKr?poX?PDF4PQK +1dPP0`q4WNdd&K:A<|YC+QvA6dgh$8' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

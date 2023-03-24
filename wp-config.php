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
define( 'WPML_DO_NOT_RESIZE_UPLOADED_FLAGS', true );
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'citymody_dev' );

/** Database username */
define( 'DB_USER', 'citymody_dev' );

/** Database password */
define( 'DB_PASSWORD', 'd)3)j3EE7v' );

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
define( 'AUTH_KEY',         '~ac}>TA,U.8367{XH$c}YUZ:.9DOAarB#`h @i=;4VnNV33P8z>?B^rv,dnG8r!r' );
define( 'SECURE_AUTH_KEY',  'kp(e4G-b}T@6-RZ[3V;Jr>6XgsCe7^J8b#@^k|A[G,ThLsk%;.cb{$$i@*rHnxF)' );
define( 'LOGGED_IN_KEY',    'O[v!^~<RKa; ,wNEX-a]Sd:qgxgM#*_4CVPdsowMdpa1J4^gA2u*uPm(=+ZF.2`|' );
define( 'NONCE_KEY',        'Bprh1r.R#2:l$!ZP<WbhKK/]H5 gQ}H3,^z_~jM/fZ5p?d@fT|=A=KC6SiIdby#5' );
define( 'AUTH_SALT',        'fqv-mIFD1hv)v/j>v/P)#rpDA*]3|JK8n>kJ8*257Y8aI?WQ0[C]gQZ)BmYbidij' );
define( 'SECURE_AUTH_SALT', '45Do@OGk9iX1{cN~TFe9mV9n:>KZIOD?@6_57VWo+V$a(dl_=2[|kq#z8yYNVZdD' );
define( 'LOGGED_IN_SALT',   '@z27,H]K!/a5ST}rx4O5.Na%J{@pl/iX=@/;l`C.D2TdJ^rv?kTN,LzuUjeN/?~%' );
define( 'NONCE_SALT',       '_8c1sjLN}a7{X&OA_/iy,,sbq;#`Ppd!vBT[HGG~rmXM%jTJ6,w>ef^l~6_qwu^{' );

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

<?php
define( 'WP_CACHE', true );


/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vipluxuria04' );

/** Database username */
define( 'DB_USER', 'vipluxuria04' );

/** Database password */
define( 'DB_PASSWORD', 'xF2bTPOFpOFpM8xP' );

/** Database hostname */
define( 'DB_HOST', 'mysql.vipluxuriagold.net' );

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
define('AUTH_KEY',         'a+Uf_5GdwA`}>6,lW}Mz 4iFSIP_.*?rwC8a1m}NJN:0?MadoLIwKUuR w:;:l)u');
define('SECURE_AUTH_KEY',  '}PH}S&-_vZnww[^V<Qa vOx`B#Fw% $9jm-qHd.FO=FDSbuN h?#^V.tO7yB3@[w');
define('LOGGED_IN_KEY',    'EaH7&^Cx?Z-(3/E>S>GXIn^2t?E(@<Kk[{j3^s%(xR&R8Q-4Mmr3^_h0Qjq?]P|&');
define('NONCE_KEY',        'VkRRa]uS#Ga&|o?9vNVu6$6q-m>KbT2)(?YbKPIeRWmrzn&s}<H 6|ee ;-`K%Cw');
define('AUTH_SALT',        'k/_}hr^+KT d!5mO.3u^GD|Use/*$&!T;&sP--8(6M*#yhUZf+G|^e|fZR4X%StE');
define('SECURE_AUTH_SALT', 'TmHv1J-vIh1OZsj^r}J#6%Uw3G3u%}F?0x}o8DrW+lIDm@$g]aZ(}pDnhVdhNlEN');
define('LOGGED_IN_SALT',   '&q(`M{+RGP):V#F}==.3[[hBlGd}b,^-LOE-f2uy_yX1 P~d+Q>KU?$.H2HP;v+:');
define('NONCE_SALT',       'Q{$w$v(|dUeV_Gj_B=:vE+6}E[U{7b8?BBN~l_*C0lCP(=.A5siAB.ZxMc,l01u2');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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

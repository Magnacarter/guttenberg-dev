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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'guttenberg-dev' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'UCbvT[1~2w5xaw-Rx]7=I@zbCQ@&ts!l=_SrIc*%?8rLYP.V4~mmIF+C|%lBp|+v');
define('SECURE_AUTH_KEY',  '2_*P{=>->GN|K+z~.BhY`Ntq>JqIuEuuLow#/zMm7yDK HB Qb.iM.P3}S4+=H4&');
define('LOGGED_IN_KEY',    'T=>#rr*F&#7Mo I/(]l]m+vW(X|^ZShr~Cp@8Bl*-Qse:rnh`({(E__Rjvk=,DXZ');
define('NONCE_KEY',        'oxPH|yhLWWW|bMyS|e+B&q4bTKU<K[(F!)-_||>W+k0+EV-5hGJ4[9/:|vYW|d9y');
define('AUTH_SALT',        'fpLWHkjkM*Lgz<{ijpV5 (PEpo*FOKBtv)3[-<wF10FE}V|kHBB^C=iVQg4BJcxi');
define('SECURE_AUTH_SALT', '.)CEYx>z.V;6GXp_xA9Vo:KWu+j=a9IMpr3V]Q8gl)W1heR4fKR=uTbSfQqwVMGU');
define('LOGGED_IN_SALT',   'D>avkD_/4Q+YWR{^_CX-jz6OuU<=n?l7;TZJ<m}l.YPD<h(yx{j:^GnwpVv7w4we');
define('NONCE_SALT',       'M&,|{qzG7l:PtH+wD1pw=?K}t+OI+(YS-d5OevL^UtQtCLZv7AnF$dKDn3`BTz%b');

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

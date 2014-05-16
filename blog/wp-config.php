<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'chris_wp');

/** MySQL database username */
define('DB_USER', 'chris_wp');

/** MySQL database password */
define('DB_PASSWORD', 'xgk*n9RHZnyXSM5ADF!5zr7XK#MQHc');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'zDxD+}0ZEFex),(#+SNX88;>@ic}bWQ31Ml-T)$|essR^w7[CKGRiJTuuK(=0Jnc');
define('SECURE_AUTH_KEY',  '`++z+r]Y;fqwSBrTMD.#{,]XUzH Z_;.a;k`K70s[[Bsh`s)}>5+}Ih.i(a?lZd2');
define('LOGGED_IN_KEY',    'puC{D62(>L2f1[9Iio-h}z+zh0s/e,hQ+s-HiuGI,us||/>_R8nfpvf=X_*^]`|d');
define('NONCE_KEY',        'uPAVr-lYUsX#VZ3!0F/^o>d~5&%Me@KACIS.`R/?v31j6Z}DB|H#mC>hUA[H%Q7{');
define('AUTH_SALT',        '9J.(oAVdCsB.XdMROA-vR=S=Pj~N@*RL9(4Wl2]zP8uVuS_T%$$&b@Js2i&&0_U_');
define('SECURE_AUTH_SALT', 'e8X|C%$00SEB#+j-CMtk${?c|Xv9yI8w6Pjv)yp|it7(J,o-U(vc~0?Ob*saLNa.');
define('LOGGED_IN_SALT',   '>>+N,+L%4(Er8%CG|40&B5XVX>?,fwWb76|>oNHNxG-d`kC>|yia-M?k*qU<[(|;');
define('NONCE_SALT',       '|D3V(sklrOrD)6VPz Nu/ +a|>+gzU-w8l*,-K_zEX/>>=G1t|5~PT:T_]k-:0|>');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

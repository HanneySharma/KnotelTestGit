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
define('DB_NAME', 'knoteldb');

/** MySQL database username */
define('DB_USER', 'knotelUsR');

/** MySQL database password */
define('DB_PASSWORD', 'KnotelR00TPwD');

/** MySQL hostname */
define('DB_HOST', '172.31.35.226');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD','direct'); 
$_SERVER['HTTPS'] = 'ON';
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'HPjI0z+7tNwQ=.6HPDJdb AK%NY~X5|o[b_Rr9c!!xcH^)3B(B(JX.6-pa/*Y *n');
define('SECURE_AUTH_KEY',  'cL[#Cx^ep-,N?HcTpmd5B{W{/(`(S- N#%-y7`-uqh:cS[i>FSw/+~UO5;!js9x9');
define('LOGGED_IN_KEY',    'M<|@6EBV^#33kGcxZ8Zv#1~MgtRbw4AG]TB[s_]b,>*ISJ!6YnXK`2^M4gQ$!^1p');
define('NONCE_KEY',        '5X;;7Rsbf&|M5u,I_vk=IxC=c#)qiM|Y<*Ir]~sh^R8l*Mf(#CPGU*_U}$@?A*`(');
define('AUTH_SALT',        '$a0,UzU9K(WFQunT;+^$P7aY_C>4jR=aNn!TMm/k~M}U$Za6IG^C=ip8hRxPNV}H');
define('SECURE_AUTH_SALT', 's*8@a.`8|Hzg[reXj:m8x3UI=-|}*14JX.H#La uK{I;iExRU>70[}rnZ=h65Pm7');
define('LOGGED_IN_SALT',   'D0g}oF`2<:yIqf:i[z9iJX+{M5 nC[Ik&(L9IvCF5MFV:HR$g6X.>P0LN;-:L4&2');
define('NONCE_SALT',       '*COu)ulGF-h.DK#lLEHvdCNP`SI3P? $#9Z(43;Yi/~T2%Rm>yM2xPT&L8+LAj@!');
define('SETAPI_URL','https://app.knotel.com');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);


define("SALES_USERNAME", "hanney@teqmavens.com");
define("SALES_PASSWORD", "maventeq@123");
define("SALES_SECURITY_TOKEN", "G5G00dyE8Pb1fUL3c17kd9KH");

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


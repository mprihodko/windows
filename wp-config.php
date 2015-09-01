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
define('DB_NAME', 'mingo_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'o;Dc`-O:N.D={!QyjK9;Px.c+TK&L-Q8}{=dH[rcuc? k3-yVatq+^1n6Ur0F^jP');
define('SECURE_AUTH_KEY',  'aBid##]11M Id,IhY|TxO<*974-K|{YfC;L=@lZR{TU):RK7E,$XH6&|YP,1[7vO');
define('LOGGED_IN_KEY',    'n:#`*eAID;&W|Xe?H6nQ-Mn};|xqw*s@Oj[lI:gU|-3TOlny3i XUpc}o4gX$B.-');
define('NONCE_KEY',        'lzs@OJ9EO[?ILY0/h6D_,GQ1=.*g=j`@r7{$X<9OOtUm+D-1!16j6k*A-,fj3.qG');
define('AUTH_SALT',        'Df5>]=)9a-+2oyj]~n-w*(.$(o|9e1jk]`t;y^z&qX&??8+Q/WwkV6QMx6SQH$Lc');
define('SECURE_AUTH_SALT', 'a h6h +_EnUF!|[R$U+fN@oG<!}#o|E^oV;xG0,}+] 9O=c&HmJ!}ngSdY4yzym0');
define('LOGGED_IN_SALT',   '<&iPSn:a~@c%z,{(sel=YZAbrNFBoN-LP]J/9Wk3XLO-=-dvnVRUmXZ8C!mvJ;wF');
define('NONCE_SALT',       '|V}}7&Jao`-!!9n?<n|&Ac6<${-Xxg;|;Nb7,/o6kaCDX|W{C<i+Ka9Y+p+]+6)L');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

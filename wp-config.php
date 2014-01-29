<?php
/**
 * The base configurations of the WordPress
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
define('DB_NAME', 'habersizkalma');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         ';FzFXM546NwOsTwaT;X<0s0fjJ4V,ge}wDE&i/&%P|.VMutR++?OpDC({Kf^CVKC');
define('SECURE_AUTH_KEY',  'ydTbpbtrK877},C]j>[t]Ch:,$nsZv:MD&+IlTDwtox:X0W@BykDGM)g$R/:XWzg');
define('LOGGED_IN_KEY',    '=8k>l,_PL ?4R~8fl@Z0a]OlOl(xgn;_]w~?6xp1SvYEW;{#E1H@}2sNSB^NL-s`');
define('NONCE_KEY',        'ut#sd(Idf&([Z$t|lIEgE{+8Ph*(h*:/<[1+x+( 3aL_kA1<D$+Pl-Nh_|2|z/:5');
define('AUTH_SALT',        'n[+HkF060u!uK%L-w2 ^J5+|F|ByHctBz;uC1#h|dl-/{:n2!2Zc1th|kbj2l4v+');
define('SECURE_AUTH_SALT', '|VH!`l x{nQczuZth!KCym|)YF3l=mQ1-tMrOP1-E3wcT(94<XKKe:DT9k]FS`%+');
define('LOGGED_IN_SALT',   '$0OLTm_Ej5@{zQbmsP3k[%b7[g@->^b-qQ-jHT>+XeV3|rma(+Dc<-y%%BV)QuuQ');
define('NONCE_SALT',       'mzfZ6rd[PDeX=tj &|(x>U:5;#HLI m9!/(<sfJo?8V7I^^#nC[cKBYv{4>X8B+i');

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
define('WPLANG', 'tr_TR');

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

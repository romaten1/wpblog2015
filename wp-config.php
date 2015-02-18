<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host   ** //
/** The name of the database for WordPress */
define('DB_NAME', 'u184246588_wpbl');

/** MySQL database username */
define('DB_USER', 'u184246588_wpbl');

/** MySQL database password */
define('DB_PASSWORD', '8A!Y72fqir6');

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
define('AUTH_KEY',         '[OCn >d$)p|=JxFnW{9 yh!GN*+K_,/nB7/M`cNFhn9s3m5v<-Xy;RvZy4$Yg-2R');
define('SECURE_AUTH_KEY',  '*!f*+}%/`l-F-mkZqA]Fw^obt1 :s$tf|+kR`lVjcUHo|:][)yyxD]I_[stfA+LA');
define('LOGGED_IN_KEY',    '|*ITk8uh%bFL}J1HQ*Mpa->N#4s{$pXNPk/SGo[tDg;{-a^B=`mm-PBK}=H}=;_p');
define('NONCE_KEY',        'SK)V0_|f/NOFp1-iDUOek!+gMViSl:zGkV?+;G)X>/gcK|7|mpbB<hAx+?ZyD%;N');
define('AUTH_SALT',        'tC=di`N|^{l!<LDHLs/iQt?;|P[aw?e/8gThnGKsF>ac]-YY3#Mc}ilDzjF-D{*n');
define('SECURE_AUTH_SALT', '<-&V4 wyRk_QtSq:twAHe:AneTetHlf#R/DZ|]]E&7@9VsHq)J}7EA/-:M7^}<ey');
define('LOGGED_IN_SALT',   'KiD~9d+>y+}:$D;%.&rhSW}uUYxO.W&a_xOPB3 _lLuhvYsE 7=/4z<[g-Y [$QV');
define('NONCE_SALT',       '?@@DoR!2&GFyf/_N1B@c,-vrHvL=5o0q=3$Pwy--3*MoVL<|o+8~@omjy7K,.@MR');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'blog2015_';

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

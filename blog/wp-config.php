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
define('DB_NAME', 'bookingw_blog');

/** MySQL database username */
define('DB_USER', 'bookingw_blog');

/** MySQL database password */
define('DB_PASSWORD', 'blog_wings');

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
define('AUTH_KEY',         '=LaKT4O.J{N+yDnD`_.4J3yAWtm8EYwy#_CN`bIN1fAW-#>@t,x/8;B2b(uQI[m:');
define('SECURE_AUTH_KEY',  'B-E=]GtXtphh:wp4RF+.fd])tlGCD_2T4wQMP*5)Dmcs]5w<=8P]v%?z#UdH&Dsl');
define('LOGGED_IN_KEY',    'FtRX`OUHQ!G9wJBt68_!y*[>Dt21&(Os*EIraZ4)!{SDH;^wAm@xEFqIuVGA*XD]');
define('NONCE_KEY',        '#KQ)4V6MbEG5*OEc|Wfd5@24;<fm1Z.a)*KJpiU1)o|>  w@,aY@`um+OlG6sxSs');
define('AUTH_SALT',        'q+#sL=J_qN?d~QJ9S!IJlm4s0NKN)=Q~12vYA9So>6ljSO:ch1b6Iw7|YJ^q(PII');
define('SECURE_AUTH_SALT', 'nw,oT+t_2!d!_{piF$67DD{q>}BV:k[f)AoOZUiN[KS%Ob$UI_m*Afmk+:(F@3wY');
define('LOGGED_IN_SALT',   'yct<:Gb.P6>Lms5!W^i8y0/)DhdPbf~/~${(Zis|:_Zz>JFMD.<1I~@/[cz,+JEn');
define('NONCE_SALT',       ':W_FGG+}+~dkq/q2Yjl;WQYP.$Ut@!w|6a@xbHh$VIh`[~X[!];LUTg&=c`f/Y:4');

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

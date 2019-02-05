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
define('AUTH_KEY',         '`7U)Y^>,}]{?mBN#b &K kH+e=l>v+[6aF}XB9cD.sY+~ie{Sog,(%|%sRgw-;Qt');
define('SECURE_AUTH_KEY',  'T(mR+aPqSA9~r-+b%1H#0b-,Yvft{z9sekmgi91!0`n-WpJw?.s]8:{ ~zKlh*U(');
define('LOGGED_IN_KEY',    '*5NLl;}$Ar]Tw>8;yOMT/O7DO`wiFr)mZ[]K$:FQZ_*3}+7WHoCq6-cW|4|w(BJY');
define('NONCE_KEY',        '|g^w<rUoTA;uKxTX1ygEe!M&t|wpT#Hyp@/Zjnd-%UN.+>`dgijKeee0,1HL^Oog');
define('AUTH_SALT',        'v>7TXFSD:qb5Px4w?kXF..*p|S.Au#_ZHrW)j5t1Hu+_h|gKALIW-[PLxyRwj(J%');
define('SECURE_AUTH_SALT', '%#TMv+`0c|+$F|s{.fJg2@aIhZ)76lQXRo^_4/=f=570JhN8kOc-47n+x^=T~o?.');
define('LOGGED_IN_SALT',   '*4;D!V,+-^|.OKkA{`0KC,UKF74my.[MaJQ:35S);3.mMlt1V-ckAnzxBdNp)^[$');
define('NONCE_SALT',       '=_50Axc3;3?ft@79p#j_PJo<Z| *<4:WrToaJ(X.DN!0LV$j;wyu<mc65wt+u3sZ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tbl_';

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

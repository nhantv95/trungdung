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
define('DB_NAME', 'trungdung');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'QgWc1.e*6U94K|D(5*5&TppA9m Q(+16=/[IDJ?3{$MB5.cBB>(cw5iB=G?%S)*S');
define('SECURE_AUTH_KEY',  'uH@V8S.tAgb%=v2,TYnX3l)Bo]/L8z+bfpC3N$3MUggJ[[Ba6ss_b7:sZ(U4f.Kk');
define('LOGGED_IN_KEY',    '&NQQcqau9_:9~GG$vOJn|W_$E>][@-m//I:_sA1I`gAOn[K~|yOXm@#]nxN#-xqy');
define('NONCE_KEY',        'Vr#>kwK5!?wBl)fG/B/QQ2fXRwg+SWeu&S-Stflqk0R#vftLY^Te7+zo3`Zsz*rY');
define('AUTH_SALT',        'qypCf.6tZ))BjiLr5an$7Lss]Wp&e7G!@@FLT`XRqweeZS9`DL KUi5A/<h4492`');
define('SECURE_AUTH_SALT', '^|U?^C Z/2%rCZ6BJ,bu/=iust^kn-c]qgU 4E(NFK@bKI83FMc@)i!4%iz(#T{e');
define('LOGGED_IN_SALT',   'A(^X(1;FTH#dCk#lDc(.blXn!p>}0-/QPt{zGH838@n>4}DN<{K,jySXYMSM9)a5');
define('NONCE_SALT',       '`&m&%Y3ecHr!*goNo}h sPaA$Jp,k0Y-4V$?,R^F;6zL]<Pn(AWq|[3O~Bf{-US0');

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

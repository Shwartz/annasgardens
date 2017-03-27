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
define('DB_NAME', 'anna');

/** MySQL database username */
define('DB_USER', 'anna');

/** MySQL database password */
define('DB_PASSWORD', 'MsTYyzVda6vusxQX');

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
define('AUTH_KEY',         'e}$xOkTHa*z{izW0f%[].wQh)@-Ou,72ldJ=}wic{uKfc=buU|I aN}cT*Ifl+zH');
define('SECURE_AUTH_KEY',  'b=!?}yXeb&)pP3866p5M9~0Tt9lj|AA<3/5N^Stx,i8Bz+DM`6f4U=A1dFGSCB#8');
define('LOGGED_IN_KEY',    'o]_~uHG8 ,r)8WB<W^%d}u=A2fDx @y{rl;d6Ca:Ood/Xwsb#TrJdR3@KN=/8}En');
define('NONCE_KEY',        '-,A1CVPR>eqL>lw!UcKz_eKnkMk()-q0A5e|M1;1Y{C;dfp6@cmF2 WK%,HIK)so');
define('AUTH_SALT',        '>Y}oFdz9Gt{?7SEoEhgqI,MfI|?9TMje^*]dAtK#dT`D,C2<Kstc|bYM:_lBj^ND');
define('SECURE_AUTH_SALT', '^R6q(*q3Da5C%flLr5l;I9vd KQU a@=QsDd79)V=uL[8R>WBXbho] bj`Jk #ye');
define('LOGGED_IN_SALT',   'O-CP+n{Bw^} 1B: 9{3p;Q84hKQ]9~=+s&h.R,fA;H+%2LR?^`YQGI*}A#_8#jSr');
define('NONCE_SALT',       '_DTm2YwA9e}%nI]/;VX&T[q(vc0HHl#`1>}F7m@U|`0]4,&yPe[[n,:<a>wDR=(_');

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

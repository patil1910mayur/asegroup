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
define('DB_NAME', 'asegroup');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '+D2;};4=f*vx7V$X[>sgZM,|zMYRmtIX 60y_/Qdzo;5%Aj|*bm/B<rxne0+=V{9');
define('SECURE_AUTH_KEY',  '}aQqvYR,3Kt2@-#@xkZH|(>428]u0anU0y}FK5dgG8HhvBkEv)>)S#2I@RfZrX1=');
define('LOGGED_IN_KEY',    '<OoYceRXKx>2 hScR?$^f-^r b2)OS,e2(x{WM)%[nJe;{QgZ;rC e^.Rxbb%}b/');
define('NONCE_KEY',        's:,;{ld.wi>]A`96JQS<)UduSk,i` jRJcBb-hB+OXvzQA{4 %?=dW+E (^:wO3b');
define('AUTH_SALT',        'D5M1LfIi68:cUk8TYLUsM-z@%f-:j<{,MHu}jqhhL:IQ?2yEAiowgnD Rj(K>ZcD');
define('SECURE_AUTH_SALT', 'h?t[o{kGAAYD`*stOrG# N# <*4V~GAH.)a})+i;Mn:HKJa]r#wk/{L{=D,kPZyL');
define('LOGGED_IN_SALT',   '.#B&g7ZHs,UkFes?FrVKYjrGsPDm-M>Qydic(MF0Z,c:+IsRd!Aa!so?03Q O$ C');
define('NONCE_SALT',       'R,y~70`eDB4*3BQ7[t7+)yhV;XoIWeMQk:2m^RC:k_jd!AXXCs.o`~)6YZ:sG<It');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'aseg_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

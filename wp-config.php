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
define('DB_NAME', 'db642053810');

/** MySQL database username */
define('DB_USER', 'dbo642053810');

/** MySQL database password */
define('DB_PASSWORD', 'im@rk123#@');

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
define('AUTH_KEY',         'A4K0^iYUtk5 w>%;!q&$DV0Zu{Liw:p/Q%vyVM4qZWQ%w g+>-7n[Y3kArE3y-=M');
define('SECURE_AUTH_KEY',  '16;g839aXCvFvBXcinh(l$rZ_TkD-6%`x4#<txKF#5>D}I3cj169C/Js:CQ#fW.A');
define('LOGGED_IN_KEY',    'uca+]VJ,`gp9&|o!t@ @4^mw>.oh3o$/3Vswcv~^qaw$0?c-#f~qI) TH,0Gn>2j');
define('NONCE_KEY',        'x8*#D$PjatG44;.DHv<FX-*HZt#!_e.k@nl(Vrq8d-MXJ[3D0B20sSMd4,R/v!$e');
define('AUTH_SALT',        '3yV/VB*iup7=:gY |#! u&a~05?3gmPG4!^Gx/?x~Ezj%HV:N{90A+yEOpBm!Z4c');
define('SECURE_AUTH_SALT', 'Kkdz!zP]WZ<i0<FE_6fKpkl{SG7:p?iZ<BpFzBB0s+q<`IbpmN|@NNcYbw+GIiLq');
define('LOGGED_IN_SALT',   'cva,g<)ReQ].Y6wh|Pp95}]qNA?M6`Wv]n!=l!bV4>;,z:RzkYCcQSQP0 0b&VA(');
define('NONCE_SALT',       'qnPyF|*Dy]+mp9@J+ibO?<ai<vR<yjvoVKk<%Bo fpJ+;DmSs&n!2JV28mK67Yt>');

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

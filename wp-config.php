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
define('SAVEQUERIES', true);
/** The name of the database for WordPress */
define('DB_NAME', 'cvmidea');

/** MySQL database username */
define('DB_USER', 'cvmidea');

/** MySQL database password */
define('DB_PASSWORD', 'anhduc123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_DEBUG', true);
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '`kQ8~T[GdagY*V)@6KyiP0NU<_Rbgocei{ny+%-H6G@pW!KKs`:(]`5- 7-_jQc*');
define('SECURE_AUTH_KEY',  '1osp+AwvfX uXmE?kRg8*440L9$X_9>Bk]r`4zUr4{FMT[U*n)74=t!slBN,]d;o');
define('LOGGED_IN_KEY',    '8G)<3x?RaOu&tYU|]Zl!b2egNW*8h70K;5@)7ue5xjNk{yR-t`Di3u2C-QJz]Y*Q');
define('NONCE_KEY',        '|d`mE:n_>V%FpMH8jLjeag/B.{wUfTA ?ALZ ;&NbA-lH(bx);AbXFX?BxuKLuL=');
define('AUTH_SALT',        '5#kzsPKH/N;DIrYToV*#d-L4.K0V-q;_`-/[2i`&^8kx#TL &1y#iZ!`Rtr)mTkH');
define('SECURE_AUTH_SALT', '44@~<:Z=L31TYR-ZKc>so)hjVKe`R^Ov7dS%_p0GgegNLF^Yu?%%9Ox;<W>tNw({');
define('LOGGED_IN_SALT',   'nn~4N^Igt*.qofx3rj0xAON6u3E2|I*hc,PXZ#%a GBERn&(>cp;Al]ZU{Fwj@n!');
define('NONCE_SALT',       'An4M._8]H5Q/OaA5m|=!%w)Fn6GNzZEWN&_:fug-nDHWZy)-aj-G+Ue58~ARw~2E');

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

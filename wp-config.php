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
define('DB_NAME', 'pivot');

/** MySQL database username */
define('DB_USER', 'pivotdb');

/** MySQL database password */
define('DB_PASSWORD', 'pivot731');

/** MySQL hostname */
define('DB_HOST', 'aafk1u6hhyr2uy.cg3rmgk8n7ah.us-west-1.rds.amazonaws.com:3306');

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
define('AUTH_KEY',         '1v}MsfvVXtZ+jS-^|-+rDx)mFs[+5/-+_^%2@fxw-SMP%vn|-(_Vt-d9J?XP|ZPi');
define('SECURE_AUTH_KEY',  'c_P7&JH;4M(*./DHB40b,+oh7{}NBcv|&s51V/x+<-jsTuF6 Z~1^h8|zX00><AE');
define('LOGGED_IN_KEY',    'C6s;;S2j(`) EN.)S8tF*T6y|Kd|LWHgV:b:a/zKi*Lb%n*k!S@oLz.5R]dVD:z+');
define('NONCE_KEY',        'k,Q##-cF!P}D2SnLq,wrp<o(t`ft <r2ZbC}8zbk]-FK*[QRA@c!awJ<[b!9cxC5');
define('AUTH_SALT',        ';ynVcN9xFxo`}24ZJ0AHtN0kb(<Cg!rNL`u }K/SSfCT@y<eyIM|hd3<?r8Y3fr-');
define('SECURE_AUTH_SALT', '~1_&-d)P }npNUmnk=LLr98f<W~Kc|BWzH5^9cO%(_[f9oyV&G1n?i`BjcDkWl.<');
define('LOGGED_IN_SALT',   'h8(m$Nevkyvk r1CH-, zLYyp+cq4jU]5]$ ~rBx&UEJ[F8l)OD%p0hZ1x%PI<@?');
define('NONCE_SALT',       'G8S=UF.|=Th^>7EZa4_Ep~rUN ~3MVy!IZ9|X%(Nq|-68-g(TJ<?v0;ecO2xohX^');
define('FS_METHOD','direct');
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

/* Turn off auto-updates to keep site in sync with repo */
define( 'AUTOMATIC_UPDATER_DISABLED', true );
define('ALLOW_UNFILTERED_UPLOADS', true);

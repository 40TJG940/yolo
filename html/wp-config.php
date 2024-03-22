<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'finito' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'finitowordpress' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '+7P@:MO+#8756C&kx)Nh1m41e@B9_sz_|:C%mxMRGeP763H|0+*-vq(03P:j@Q2F');
define('SECURE_AUTH_KEY', 'SB8z[rW;Sno30)[Lr[%i1y!r%R2Ts_K/v0G!(bwd4:bP21+pH497y8E[2:)s18YS');
define('LOGGED_IN_KEY', 'YK5)%uxq6ux/%vj669)I6DNMmMJ0mG8_]#r5Y(C~ub-IUO8K!6()5-gh93;09gG#');
define('NONCE_KEY', 'BbV67/9KQ8jS/]4EP_5Q8894o*0gd]4!vFYV3IA2%6_+7151z%ItXO/b(!_sj7M!');
define('AUTH_SALT', '0+1si]4U/_y#7O(/Gy70@4Kk4@jq7pnO_Hf691OpdFW5ChtM3wa35KTCSU+-!z~Z');
define('SECURE_AUTH_SALT', '_v&~3L8ij(yg/R8yJ&3%hoSYzDr@m92~*Gd(q6OBX[soxbNN0eQgw3!i9p&z+jP8');
define('LOGGED_IN_SALT', 'G&9~*muhLmrr16bxt4h&]TRDP69F38[rG8)2LYG94!8A8YPH6|1N//~1N32)4IjN');
define('NONCE_SALT', '96rX6aedUTSR0:is4Y5e25PRr84885_qqrS#h1QkPQgit7#6R&:48Lu7A:T:Me!+');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

define( 'WP_HOME', 'https://jolly-kowalevski.51-75-23-148.plesk.page' );
define( 'WP_SITEURL', 'https://jolly-kowalevski.51-75-23-148.plesk.page');

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'FS_METHOD', 'direct' );
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'taslima' );

/** MySQL database password */
define( 'DB_PASSWORD', 'fawinat' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'AJJk b_Mqc0Z0~W-QNir886;I.`2+,n#hW;H 2fp6U(pRGN)p5nUkAkA:>=<w>Dv' );
define( 'SECURE_AUTH_KEY',  'T{Jt$*?%Q-DFPE:T~9[Ul}L5*e#TL]{K$w[/a%OgB1^va7qwEf)5{f#!<d3FF]|-' );
define( 'LOGGED_IN_KEY',    '7a!uR&1(jSsX2s(2o7;2<4!/>BF+Ha.B])@xKYlB;rt++SWM]7Q|~$Oe]j_k@JPx' );
define( 'NONCE_KEY',        'v%yc1MYt?d?})+<qbC%z#@?5WNdl:8.6VK!w84;sOv7=D4>}WV(ukjTo[V[_&r%U' );
define( 'AUTH_SALT',        '^O`,=m*Zg.<H_gf1y7b;Z;4UbrUZ(xZQ,h!_c}PRm5EYSdJJZ &%:B^DCsjYnFzA' );
define( 'SECURE_AUTH_SALT', '64^{aGpg,#Uq^,PDA;W}iYy0`ubVIkO&.3V19V@3cj}GCOF*X}BnUk[iI75=X%%j' );
define( 'LOGGED_IN_SALT',   'Nd0!GUx&2Sgm4[#=MpRC?~x/N4JqIUW2@?%8Ch/vV?69CpGQA(*{0 {5ShKu&R0;' );
define( 'NONCE_SALT',       '3L_0#Ey-ei@R<H&[QH9Ex*04zzb8)MAbGpl[q(Ng 6~))%qYaO;I&dDp~q#JM3Ct' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

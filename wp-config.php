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
define( 'DB_NAME', 'p' );

/** MySQL database username */
define( 'DB_USER', 'prabin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password' );

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
define( 'AUTH_KEY',         'N6?&yg/`i/=K{o,#|KQq:=kyNxdDVJ+]Gs:w%0rA4Gw9}iu)!NF}Q4PMvLLH.O>.' );
define( 'SECURE_AUTH_KEY',  'OQPj9`U65x|xQ(}EH^zL~lo2F28>O-p~+9Fj>-T-~G`Nw`2Ogw//hS8X#FaOA!_T' );
define( 'LOGGED_IN_KEY',    '!g{l}.z,0hs(bXeM*6GCc_Ba%^P9X`Jr`lkA3P/*BQtK}E0*TnLtF_H69?^O+/wN' );
define( 'NONCE_KEY',        'L)mqHC=)x|(+(4JiZLS ByST06JLBAN5DeM{R*+_i3/&Y;IRrL9:{%1>;D6dc[L5' );
define( 'AUTH_SALT',        '4YLe6OVjI24H1Y9zmUjL{jq$U-nZ1 ob7vs=i(/@XmXs.uGzt!zXc`;2 bVDf~![' );
define( 'SECURE_AUTH_SALT', '_zU5[2UKZ]d!r!y6%qe@[)tfW_[j-C9*x+xQHGAPxEr=Rjwcf?j`Sx#JDek1F9tJ' );
define( 'LOGGED_IN_SALT',   'W0qZf[<[Dn0};b;2[y4Sz^T{[o<<O@nW{M9!)Ab$B3^iRPea NCMqis>6 `Im@_;' );
define( 'NONCE_SALT',       'nY.=XF.7fO:CQ6wgI9gewa_+1RH-UH9hHfDI<-G$FKGd%W_Veu,cQ<Z/[{;,H5;g' );

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

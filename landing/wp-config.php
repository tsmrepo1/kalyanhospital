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
define( 'DB_NAME', 'thinksur_kalyan' );

/** Database username */
define( 'DB_USER', 'thinksur_kalyan' );

/** Database password */
define( 'DB_PASSWORD', 'b#yFi29O-#%6' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'B<CQ(Rv<,ivy8#=RV7.B33$Fe{S3vSqvY#^!uIo9X:y/]A+wSqsLVo| G!DkH[/W' );
define( 'SECURE_AUTH_KEY',  '1=cfPMSc?t y7SuA9m1nDgY.&CXN71Fs1gNfkpI~p=$<BPGvmyA(mP168W6RmG<f' );
define( 'LOGGED_IN_KEY',    'ih3[BK94F$hO)Nzsems6BQb{5sPQ%Lz+pkCxlr}c0)HB,,(]IG{zTFtX^_iBwZ$+' );
define( 'NONCE_KEY',        'rr~Kj@KH6w{97%9_:SV.25*U[b)r%d@mWXw{|xf!u1/?>ocYM;,nEk`1O_`dndW#' );
define( 'AUTH_SALT',        '(.v8>-Sn)SSgzq]CiIrg$Ws#}+jrh?v4b^pL?klos+eC%q3eXnLfy6#8suKwK`Dl' );
define( 'SECURE_AUTH_SALT', 'ojbCih=@~PnaD[yK( /8PPl*34.[iLK91uDE[{KyQ_}TJOgB`Tfl%2 2$>Q!9<(+' );
define( 'LOGGED_IN_SALT',   '(19;mjQ4?#m.R*,}|)a`z,@S5[GZ|E[3z>oG;DRV1#fQ<}-,_P0<o~7(Boki!<Zj' );
define( 'NONCE_SALT',       'z!$=7-tk9 $:74* C3`D9&lx}}jOD`VM{L1E]<v=MtKo<#n^TaNrH{D#0;y{x520' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

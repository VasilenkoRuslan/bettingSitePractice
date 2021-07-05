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
define( 'DB_NAME', 'betting' );

/** MySQL database username */
define( 'DB_USER', 'Ruslan' );

/** MySQL database password */
define( 'DB_PASSWORD', 'street02' );

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
define( 'AUTH_KEY',         'L>Tv.I:t?h|Rj?c6Y*X&:~Eui5E%GHCqeH5#D/+WgwY^[yB>w=^=At+icvnEe{M&' );
define( 'SECURE_AUTH_KEY',  '($Sluy*)h{O.S*i[mnmJ1KzdTkvADQ[(;6C_SN];NGAR}>INl9fTRf>I%^&;3pxy' );
define( 'LOGGED_IN_KEY',    '=Oz{}6A^qZh];xd9~3;}OKT$4$7$67K,U$kA@`f>k1+nHrqdbWst/$gtr581=:ki' );
define( 'NONCE_KEY',        'JLQ#P|JDX].206vKHitB7Gb 1n/7}mA4utx^uKSaU{;?oRt{ BU@5phel#1^Dcm~' );
define( 'AUTH_SALT',        'fj?Ci(~m|z/Pkd=rr0Zw@w`u&lyL0ul~>Wd^~+ rQ?O Wx.U`cGxqK(@sSC zM%[' );
define( 'SECURE_AUTH_SALT', ']**ujREmq@zL#Y@9V&cgK1J7Gt&FhJcfetlY=C4-fd7]<@h}GIlD. m[g`,w[(CV' );
define( 'LOGGED_IN_SALT',   'MXnIw1WXpTSLkv}mp^88nU[zuSTXl8Mvp8X0tX8zN7Hc9 C-~48AXOm)i$P?w15`' );
define( 'NONCE_SALT',       'F8l4fa{m,sc1Iw|6}4UIJab4&Q7A4PUaz1ekQ#Q,EEkp_/+hO.TNq@A=VVS@>K[[' );

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

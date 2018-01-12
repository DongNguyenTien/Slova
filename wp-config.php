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
define('DB_NAME', 'slova');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'passthepast');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


/** upload theme */
define( 'WP_MAX_MEMORY_LIMIT', '512M' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8O#zP_yVKl5O_ktiqjB)jMF[[1#aHki31AQG>CyEw~,+Vpu5v/N5u%=~D#v!(8nb');
define('SECURE_AUTH_KEY',  'ex8]VIEp1STnrx{PvF3B{jgEyzuIc}pQP{+-g]Ih8nzt@<5IMXvE:{gvHUYTLLHs');
define('LOGGED_IN_KEY',    '*4BLd1LTq){<m5p^|zy:H>0N!;F+{{LX/MRHQiX5`X^Ds,J*>IZGR8|#y[VN4v?J');
define('NONCE_KEY',        'C|cc7`gQnX.x[kvI2Zk25.U}-_/Vv3]^qo7kKQ;?r4<y0e <VA3u$R =jMAO6Sgj');
define('AUTH_SALT',        '`b2KfCiP|,?l<6e~zPTfQVw$3OcIo&E}h+sy{WC%*6j>1w>|%t@T/g@s2i;;hRWJ');
define('SECURE_AUTH_SALT', 'whOv6vcGA`K{%_6X,F4[P#x&i6QpQ@q)V4MUmj6;NA9GR4Ve_]/A</-q8:S/,Y8-');
define('LOGGED_IN_SALT',   'W#Kmo=qTmj:*|dT0Q?$L3gR):H?nV ,zB#sYuPMaOq5IBq$X|!YMU#R5O;i52<?7');
define('NONCE_SALT',       'T8z9ja xjKs2CHlH9GD1,#s]+Y.L=0s^#nZvUGg5A}EA,+J5ngoX[#q[]&by*@:g');

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
define( 'WP_ALLOW_REPAIR', true );
define( 'FS_METHOD', 'direct' );
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


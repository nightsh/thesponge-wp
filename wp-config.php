<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sponge');

/** MySQL database username */
define('DB_USER', 'bob');

/** MySQL database password */
define('DB_PASSWORD', '5P0n63');

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
define('AUTH_KEY',         'Kf4MM_^g9P,FCxaBRb;$iE*~HwC,UqZ[@Sm,ZG4;qt2}<9>b3I.e<7hrDtlHE~ $');
define('SECURE_AUTH_KEY',  '*R];|^d:7I}- R;[-WO|tFdN(r)U8ftV8GKB~i|OiUn+#{rfw,E!t0Fv7Yjgo-0Q');
define('LOGGED_IN_KEY',    '{hKxzs|OdL_Mg( 5j*d?p_BYOX2ASd%C{P6n+hB9Z%-*ju-&m[2O|7|{3<=2WmCu');
define('NONCE_KEY',        'ol8$RO=WMoKN9W7~Yxost97a+r2,/ABu}}DK+7cfeuIH+$`i4J$NNS;AjW{csHV<');
define('AUTH_SALT',        '2&84Ad]#UIw*-4+iuXjDslUZf53](}?b9b,?WX7U +)y}Jg?3A{2.)AaYDZb+fz2');
define('SECURE_AUTH_SALT', 'KD-]x[)Z[CZQ[{j|c#`#6N4P2Sp.]Xvt0[f jCP=C#HeM|3ItXA,/I&--{|)Ttv3');
define('LOGGED_IN_SALT',   '|<SbDzezNEHbAOvu+DbDH&Ny&70DvE>4[De054Fh6[ Q#5v|=H,Ge31v& G3I#E,');
define('NONCE_SALT',       '?~g:5P[Fn7T 7~j>psgrCU;$y 2`5hS]#J`WQ|&M^^zET_uMs%_TSxF.BQMXs/<z');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

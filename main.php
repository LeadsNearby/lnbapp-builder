<?php
/*
Plugin Name: LeadsNearby Mobile App Page Builder
Plugin URI: http://leadsnearby.com
Description: Ionic / WordPress Page Builder
Version: 0.0.1
Author: LeadsNearby
Author URI: http://leadsnearby.com
License: GPLv2
*/

// Define Directory Constants
define('LNBAPP_MAIN', plugin_dir_path( __FILE__ ));
define('LNBAPP_LIB', LNBAPP_MAIN . '/lib');
//define('LNBAPP_ADMIN', LNBAPP_LIB . '/admin');
//define('LNBAPP_INCLUDES', LNBAPP_LIB . '/inc');
//define('LNBAPP_SHORTCODES', LNBAPP_LIB . '/shortcodes');
define('LNBAPP_FUNCTIONS', LNBAPP_LIB . '/functions');
//define('LNBAPP_TEMPLATES', LNBAPP_LIB . '/templates');
//define('LNBAPP_INSTALLER', LNBAPP_LIB . '/installer');
//define('LNBAPP_EMAIL', LNBAPP_LIB . '/email');

// Include the TGM_Plugin_Activation class.
//require_once (LNBAPP_INSTALLER . '/class-tgm-plugin-activation.php');

// Load Admin Scripts and Css
//require_once(LNBAPP_ADMIN . '/admin-scripts.php');

// Load Plugin Scripts and Css
//require_once(LNBAPP_INCLUDES . '/plugin-scripts.php');

// Load Plugin Widgets
//require_once(LNBAPP_INCLUDES . '/widgets.php');

// Load Custom Post Type Functions
require_once(LNBAPP_FUNCTIONS . '/post-types.php');

// Load Custom META Box Functions
require_once(LNBAPP_FUNCTIONS . '/meta-box.php');

// Load Template Functions
//require_once(LNBAPP_TEMPLATES . '/template-functions.php');

// Load Theme Functions
require_once(LNBAPP_FUNCTIONS . '/functions.php');
//require_once(LNBAPP_FUNCTIONS . '/star-rating-functions.php');

// Load Custom Shortcodes
//require_once(LNBAPP_SHORTCODES . '/LNBAPP-shortcode.php');

// Load Email Functions
//require_once(LNBAPP_EMAIL . '/client/client_email.php');

// Load Admin Interface
//require_once(LNBAPP_ADMIN . '/admin-docs.php');

// Load Admin Settings
//require_once(LNBAPP_ADMIN . '/admin-settings.php');

// Load Activate Settings
//require_once(LNBAPP_ADMIN . '/admin-activate.php');

// Load Admin Functions
//require_once(LNBAPP_ADMIN . '/admin-functions.php');

// Load Admin Emails
//require_once(LNBAPP_ADMIN . '/admin-emails.php');

require_once( LNBAPP_MAIN . 'lib/updater/github-updater.php' );
new GitHubPluginUpdater( __FILE__, 'LeadsNearby', 'lnbapp-builder' );


?>
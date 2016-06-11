<?php
/*
Plugin Name: Password Policy
Version: 2.8.0
Description: Renforcer la sécurité des mots de passe - Enforce password security
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=718
Author: Eric
Author URI: http://www.infernoweb.net
*/

/* History:  PP_PATH.'Changelog.txt.php' */

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');
if (!defined('PP_PATH')) define('PP_PATH' , PHPWG_PLUGINS_PATH.basename(dirname(__FILE__)).'/');

global $conf;

include_once (PP_PATH.'include/functions.inc.php');

load_language('plugin.lang', PP_PATH);

$conf_PP = unserialize($conf['PasswordPolicy']);


// Plugin administration panel
// ---------------------------
add_event_handler('get_admin_plugin_menu_links', 'PP_admin_menu');

// Display messages on index page
// ------------------------------
add_event_handler('init', 'PP_InitPage');

// Features and controls on user connexion
// ---------------------------------------
add_event_handler('loc_begin_index', 'PP_Init');

// Check users registration
// ------------------------
add_event_handler('register_user_check', 'PP_RegistrationCheck', EVENT_HANDLER_PRIORITY_NEUTRAL, 2);

if (script_basename() == 'profile')
{
  add_event_handler('loc_begin_profile', 'PP_Profile_Init');
}

// Security option : Count of login failure and lock account after x attempt
// -------------------------------------------------------------------------
add_event_handler('login_failure', 'PP_log_fail');

?>
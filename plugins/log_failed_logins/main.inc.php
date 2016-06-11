<?php
/*
Plugin Name: Log Failed Logins
Version: 1.2
Description: Write failed login attempts into a log file (to be used by fail2ban).
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=801
Author: tomass
Author URI: http://piwigo.org/
*/

defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

define('LOG_FAILED_LOGINS_ID',      basename(dirname(__FILE__)));
define('LOG_FAILED_LOGINS_PATH' ,   PHPWG_PLUGINS_PATH . LOG_FAILED_LOGINS_ID . '/');

/**
 * this is the core of this plugin:
 * write every failed login attempt out into a logfile
 */

add_event_handler('login_failure', 'log_failed_logins_log');

function log_failed_logins_log()
{
  global $conf;

  $myFile = $conf['logFailedLoginsFilename'];

  // if a logfile parameter is defined
  if ($myFile <> "") {
    $remoteIpAddress = $_SERVER['REMOTE_ADDR'];
    $userName = $_POST['username'];
    // Example: 2015/06/14 22:32:33 ip=192.168.1.100 username=Admin
    $logline = date("Y/m/d H:i:s")." ip=".$remoteIpAddress." username=".$userName."\n";

    // try opening the file and append a new logline
    $fh = fopen($myFile, 'a');
    if ($fh) {
      fwrite($fh, $logline);
      fclose($fh);
    }
  }
}

// Hook on to an event to show the administration page.
add_event_handler('get_admin_plugin_menu_links', 'log_failed_logins_admin_menu');

// Add an entry to the 'Plugins' menu.
function log_failed_logins_admin_menu($menu) {
 array_push(
   $menu,
   array(
     'NAME'  => 'Log Failed Logins',
     'URL'   => get_admin_plugin_menu_link(dirname(__FILE__)).'/admin.php'
   )
 );
 return $menu;
}

?>

<?php
defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

if (!defined("STOP_SPAMMERS_PATH"))
{
  define('STOP_SPAMMERS_PATH', PHPWG_PLUGINS_PATH.basename(dirname(__FILE__)));
}

include_once(STOP_SPAMMERS_PATH.'/include/install.inc.php');

function plugin_install()
{
  stop_spammers_install();
  define('stop_spammers_installed', true);
}

function plugin_uninstall()
{
  global $prefixeTable;
  
  $query = 'DROP TABLE '.$prefixeTable.'stop_spammers;';
  pwg_query($query);
}

function plugin_activate()
{
  if (!defined('stop_spammers_installed')) // a plugin is activated just after its installation
  {
    stop_spammers_install();
  }
}
?>

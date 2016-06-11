<?php
defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

if (!defined("DLCOUNT_PATH"))
{
  define('DLCOUNT_PATH', PHPWG_PLUGINS_PATH.basename(dirname(__FILE__)));
}

include_once(DLCOUNT_PATH.'/include/install.inc.php');

function plugin_install()
{
  dlcount_install();
  define('dlcount_installed', true);
}

function plugin_uninstall()
{
  global $prefixeTable;
  
  $query = 'ALTER TABLE '.$prefixeTable.'images drop column download_counter;';
  pwg_query($query);
}

function plugin_activate()
{
  if (!defined('dlcount_installed')) // a plugin is activated just after its installation
  {
    dlcount_install();
  }
}
?>

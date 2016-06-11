<?php
/*
Plugin Name: Stop Spammers
Version: 2.8.a
Description: Fight against spammers
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=721
Author: plg
Author URI: http://le-gall.net/pierrick
*/

if (!defined('PHPWG_ROOT_PATH'))
{
  die('Hacking attempt!');
}

global $prefixeTable;

// +-----------------------------------------------------------------------+
// | Define plugin constants                                               |
// +-----------------------------------------------------------------------+

defined('STOP_SPAMMERS_ID') or define('STOP_SPAMMERS_ID', basename(dirname(__FILE__)));
define('STOP_SPAMMERS_PATH' , PHPWG_PLUGINS_PATH.basename(dirname(__FILE__)).'/');
define('STOP_SPAMMERS_TABLE', $prefixeTable.'stop_spammers');
define('STOP_SPAMMERS_VERSION', '2.8.a');

// init the plugin
add_event_handler('init', 'stop_spammers_init');
/**
 * plugin initialization
 *   - check for upgrades
 *   - unserialize configuration
 *   - load language
 */
function stop_spammers_init()
{
  global $conf, $user, $pwg_loaded_plugins;

  // apply upgrade if needed
  if (
    STOP_SPAMMERS_VERSION == 'auto' or
    $pwg_loaded_plugins[STOP_SPAMMERS_ID]['version'] == 'auto' or
    version_compare($pwg_loaded_plugins[STOP_SPAMMERS_ID]['version'], STOP_SPAMMERS_VERSION, '<')
  )
  {
    // call install function
    include_once(STOP_SPAMMERS_PATH.'include/install.inc.php');
    stop_spammers_install();

    // update plugin version in database
    if ( $pwg_loaded_plugins[STOP_SPAMMERS_ID]['version'] != 'auto' and STOP_SPAMMERS_VERSION != 'auto' )
    {
      $query = '
UPDATE '. PLUGINS_TABLE .'
SET version = "'. STOP_SPAMMERS_VERSION .'"
WHERE id = "'. STOP_SPAMMERS_ID .'"';
      pwg_query($query);

      $pwg_loaded_plugins[STOP_SPAMMERS_ID]['version'] = STOP_SPAMMERS_VERSION;
    }
  }
}

add_event_handler('user_comment_check', 'stop_spammers_checks', EVENT_HANDLER_PRIORITY_NEUTRAL, 2);
add_event_handler('contact_form_check', 'stop_spammers_checks', EVENT_HANDLER_PRIORITY_NEUTRAL, 2);
function stop_spammers_checks($action, $comment)
{
  global $page;
  
  if (!stop_spammers_check_stopforumspam())
  {
    $page['errors'][] = l10n('IP address rejected');
    return 'reject';
  }

  return $action;
}

function stop_spammers_check_stopforumspam()
{
  global $conf;

  if (!isset($conf['stop_spammers_sfs_threshold']))
  {
    $conf['stop_spammers_sfs_threshold'] = 50;
  }
  
  $ip = $_SERVER['REMOTE_ADDR'];

  list($dbnow) = pwg_db_fetch_row(pwg_query('SELECT NOW();'));

  $query = '
SELECT *
  FROM '.STOP_SPAMMERS_TABLE.'
  WHERE ip = \''.$ip.'\'
;';
  $blocked = pwg_db_fetch_assoc(pwg_query($query));
  if (!empty($blocked))
  {
    single_update(
      STOP_SPAMMERS_TABLE,
      array('last_update' => $dbnow, 'occurrences' => $blocked['occurrences']+1),
      array('id' => $blocked['id'])
      );

    return false;
  }

  // file_put_contents('/tmp/sfs.log', "==== ".date('c')." ".__FUNCTION__.' : '.$ip."\n", FILE_APPEND);

  include_once(PHPWG_ROOT_PATH.'admin/include/functions.php');
  
  $sfs_url = 'http://www.stopforumspam.com/api?ip='.$ip.'&f=serial&confidence';
  fetchRemote($sfs_url, $result);
  $result = unserialize($result);

  if (isset($result['ip']['confidence']))
  {
    if ($result['ip']['confidence'] > $conf['stop_spammers_sfs_threshold'])
    {
      single_insert(
        STOP_SPAMMERS_TABLE,
        array(
          'ip' => $ip,
          'blocker' => 'stopforumspam',
          'since' => $dbnow,
          'last_update' => $dbnow,
          'occurrences' => 1,
          )
        );

      return false;
    }
  }

  return true;
}
?>

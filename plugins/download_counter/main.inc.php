<?php
/*
Plugin Name: Download Counter
Version: 2.8.a
Description: Count and display number of downloads for each photo
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=705
Author: plg
Author URI: http://le-gall.net/pierrick
*/

if (!defined('PHPWG_ROOT_PATH'))
{
  die('Hacking attempt!');
}

// +-----------------------------------------------------------------------+
// | Define plugin constants                                               |
// +-----------------------------------------------------------------------+

global $prefixeTable;

defined('DLCOUNT_ID') or define('DLCOUNT_ID', basename(dirname(__FILE__)));
define('DLCOUNT_PATH' , PHPWG_PLUGINS_PATH.basename(dirname(__FILE__)).'/');
define('DLCOUNT_VERSION', '2.8.a');

// init the plugin
add_event_handler('init', 'dlcount_init');
/**
 * plugin initialization
 *   - check for upgrades
 *   - unserialize configuration
 *   - load language
 */
function dlcount_init()
{ 
  global $conf, $user, $pwg_loaded_plugins;

  // apply upgrade if needed
  if (
    DLCOUNT_VERSION == 'auto' or
    $pwg_loaded_plugins[DLCOUNT_ID]['version'] == 'auto' or
    version_compare($pwg_loaded_plugins[DLCOUNT_ID]['version'], DLCOUNT_VERSION, '<')
  )
  { 
    // call install function
    include_once(DLCOUNT_PATH.'include/install.inc.php');
    dlcount_install();

    // update plugin version in database
    if ( $pwg_loaded_plugins[DLCOUNT_ID]['version'] != 'auto' and DLCOUNT_VERSION != 'auto' )
    {
      $query = '
UPDATE '. PLUGINS_TABLE .'
SET version = "'. DLCOUNT_VERSION .'"
WHERE id = "'. DLCOUNT_ID .'"';
      pwg_query($query);

      $pwg_loaded_plugins[DLCOUNT_ID]['version'] = DLCOUNT_VERSION;
    }
  }

  load_language('plugin.lang', DLCOUNT_PATH);
  if (script_basename() == 'picture')
  {
    // "Downloads" is a key already available in admin.lang.php
    load_language('admin.lang');
  }

  if (script_basename() == 'action' and isset($_GET['download']))
  {
    if (!isset($_GET['id'])
        or !is_numeric($_GET['id'])
        or !isset($_GET['part'])
        or !in_array($_GET['part'], array('e','r') ) )
    {
      return;
    }

    $query = '
UPDATE '.IMAGES_TABLE.'
  SET download_counter = download_counter + 1
  WHERE id = '.$_GET['id'].'
;';
    pwg_query($query);
  }
}


add_event_handler('loc_end_picture', 'dlcount_picture');
function dlcount_picture()
{
  global $conf, $template, $picture;

  $template->set_prefilter('picture', 'dlcount_picture_prefilter');

  $template->assign(
    array(
      'DOWNLOAD_COUNTER' => $picture['current']['download_counter'],
      )
    );
}

function dlcount_picture_prefilter($content, &$smarty)
{
  $search = '{if $display_info.rating_score';
  
  $replace = '
	<div id="DownloadCounter" class="imageInfo">
		<dt>{\'Downloads\'|@translate}</dt>
		<dd>{$DOWNLOAD_COUNTER}</dd>
	</div>
'.$search;
  
  $content = str_replace($search, $replace, $content);

  return $content;
}

/**
 * increase counter of each photo inside a batch download
 */
add_event_handler('batchdownload_end_zip', 'dlcount_batchdownload', EVENT_HANDLER_PRIORITY_NEUTRAL, 2);
function dlcount_batchdownload($data, $images)
{
  if (count($images) > 0)
  {
    $query = '
UPDATE '.IMAGES_TABLE.'
  SET download_counter = download_counter + 1
  WHERE id IN ('.implode(',', $images).')
;';
    pwg_query($query);
  }
}
?>

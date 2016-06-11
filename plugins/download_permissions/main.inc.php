<?php 
/*
Plugin Name: Download Permissions
Version: 2.8.a
Description: Manage download permissions, filter by album.
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=774
Author: plg
Author URI: http://le-gall.net/pierrick
*/

defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

global $prefixeTable;
define('DLPERMS_PATH',    PHPWG_PLUGINS_PATH . 'download_permissions/');
define('DLPERMS_ADMIN',   get_root_url() . 'admin.php?page=plugin-download_permissions');
define('DLPERMS_VERSION', '2.8.a');

add_event_handler('init', 'dlperms_init');
add_event_handler('loc_begin_picture', 'dlperms_begin_picture');
  
if (defined('IN_ADMIN'))
{
  add_event_handler('tabsheet_before_select', 'dlperms_tab', EVENT_HANDLER_PRIORITY_NEUTRAL, 2);
}

/**
 * initialization
 */
function dlperms_init()
{
  global $user;
  // overwrite $user['enabled_high'] depending on the current album
  if ('action' == script_basename() and isset($_GET['id']) and is_numeric($_GET['id']))
  {
    if (!dlperms_is_photo_downloadable($_GET['id']))
    {
      $user['enabled_high'] = false;
    }
  }
}

/**
 * tab on albums properties page
 */
function dlperms_tab($sheets, $id)
{
  if ($id == 'cat_options')
  {
    load_language('plugin.lang', DLPERMS_PATH);
    
    $sheets['dlperms'] = array(
      'caption' => l10n('Download'),
      'url' => DLPERMS_ADMIN.'-cat_options',
      );
  }
  
  return $sheets;
}

function dlperms_begin_picture()
{
  global $user, $page;

  if (!dlperms_is_photo_downloadable($page['image_id']))
  {
    $user['enabled_high'] = false;
  }
}

function dlperms_is_photo_downloadable($image_id)
{
  // the photo is downloadable if it belongs at least to one album that is
  // downloadable

  $query = '
SELECT
    COUNT(*)
  FROM '.IMAGE_CATEGORY_TABLE.'
    INNER JOIN '.CATEGORIES_TABLE.' ON category_id = id
  WHERE image_id = '.$image_id.'
    AND downloadable = \'true\'
'.get_sql_condition_FandF
  (
    array
      (
        'forbidden_categories' => 'id',
        'visible_categories' => 'id'
      ),
    'AND'
  ).'
;';
  list($counter) = pwg_db_fetch_row(pwg_query($query));

  if (0 == $counter)
  {
    return false;
  }

  return true;
}
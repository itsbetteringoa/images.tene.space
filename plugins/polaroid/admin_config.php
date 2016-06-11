<?php
// +-----------------------------------------------------------------------+
// | Piwigo - a PHP based picture gallery                                  |
// +-----------------------------------------------------------------------+
// | Copyright(C) 2008-2011 Piwigo Team                  http://piwigo.org |
// | Copyright(C) 2003-2008 PhpWebGallery Team    http://phpwebgallery.net |
// | Copyright(C) 2002-2003 Pierrick LE GALL   http://le-gall.net/pierrick |
// +-----------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify  |
// | it under the terms of the GNU General Public License as published by  |
// | the Free Software Foundation                                          |
// |                                                                       |
// | This program is distributed in the hope that it will be useful, but   |
// | WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU      |
// | General Public License for more details.                              |
// |                                                                       |
// | You should have received a copy of the GNU General Public License     |
// | along with this program; if not, write to the Free Software           |
// | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, |
// | USA.                                                                  |
// +-----------------------------------------------------------------------+

if( !defined("PHPWG_ROOT_PATH") )
{
  die ("Hacking attempt!");
}

include_once(PHPWG_ROOT_PATH.'admin/include/functions.php');
include_once(PHPWG_ROOT_PATH.'include/functions_picture.inc.php');
load_language('plugin.lang', PFEMAIL_PATH);

$admin_base_url = get_root_url().'admin.php?page=plugin-community-config';

// +-----------------------------------------------------------------------+
// | Check Access and exit when user status is not ok                      |
// +-----------------------------------------------------------------------+

check_status(ACCESS_ADMINISTRATOR);

// +-----------------------------------------------------------------------+
// | form submission                                                       |
// +-----------------------------------------------------------------------+

if (isset($_POST['apply_to_albums']) and in_array($_POST['apply_to_albums'], array('all', 'list')))
{
  $conf['polaroid']['apply_to_albums'] = $_POST['apply_to_albums'];
  conf_update_param('polaroid', $conf['polaroid'], true);

  if ($_POST['apply_to_albums'] == 'list')
  {
    check_input_parameter('albums', $_POST, true, PATTERN_ID);

    if (empty($_POST['albums']))
    {
      $_POST['albums'][] = -1;
    }
    
    $query = '
UPDATE '.CATEGORIES_TABLE.'
  SET polaroid_active = \'false\'
  WHERE id NOT IN ('.implode(',', $_POST['albums']).')
;';
    pwg_query($query);

    $query = '
UPDATE '.CATEGORIES_TABLE.'
  SET polaroid_active = \'true\'
  WHERE id IN ('.implode(',', $_POST['albums']).')
;';
    pwg_query($query);
  }

  $page['infos'][] = l10n('Your configuration settings are saved');
}

// +-----------------------------------------------------------------------+
// | template init                                                         |
// +-----------------------------------------------------------------------+

$template->set_filename('plugin_admin_content', dirname(__FILE__).'/admin_config.tpl');

// +-----------------------------------------------------------------------+
// | form options                                                          |
// +-----------------------------------------------------------------------+

// associate to albums
$query = '
SELECT id
  FROM '.CATEGORIES_TABLE.'
  WHERE polaroid_active = \'true\'
;';
$polaroid_albums = array_from_query($query, 'id');

$query = '
SELECT id,name,uppercats,global_rank
  FROM '.CATEGORIES_TABLE.'
;';
display_select_cat_wrapper($query, $polaroid_albums, 'album_options');

$template->assign('apply_to_albums', $conf['polaroid']['apply_to_albums']);

// +-----------------------------------------------------------------------+
// | sending html code                                                     |
// +-----------------------------------------------------------------------+

$template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_admin_content');
?>
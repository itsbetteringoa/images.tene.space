<?php

// +-----------------------------------------------------------------------+
// |Most Downloaded for piwigo                                             |
// +-----------------------------------------------------------------------+
// | Copyright(C) 2016 ddtddt                    http://temmii.com/piwigo/ |
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

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

class most_downloaded_maintain extends PluginMaintain
{
  function install($plugin_version, &$errors=array())
  {
$q = pwg_query('SHOW COLUMNS FROM ' . HISTORY_TABLE . ' LIKE "section"');
  $section = pwg_db_fetch_array($q);
  $type = $section['Type'];

  if (substr_count($type, 'most_downloaded') == 0)
  {
    $type = strtr($type , array(')' => ',\'most_downloaded\')'));
  }

  pwg_query('ALTER TABLE ' . HISTORY_TABLE . ' CHANGE section section ' . $type . ' DEFAULT NULL');
  }

  function update($old_version, $new_version, &$errors=array())
  {
	$this->install($new_version, $errors);
  }

  function uninstall()
  {

  }
}

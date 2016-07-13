<?php

/*
  Preload - A Piwigo Plugin that preloads images for a more responsive browsing experience.
  Copyright (C) 2015 Philippe Troin <phil@fifi.org>

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');
if (!defined('PRELOAD_ID')) {
  define('PRELOAD_ID',       basename(dirname(__FILE__)));
}


class Preload_maintain extends PluginMaintain
{
  private $installed = false;

  private $default_conf = array(
				'imageCount' => 1,
				'squareThumbs' => true,
				);

  function __construct($plugin_id)
  {
    parent::__construct($plugin_id);
  }

  function install($plugin_version, &$errors=array())
  {
    global $conf;

    if (empty($conf[PRELOAD_ID]))
      {
	$conf[PRELOAD_ID] = serialize($this->default_conf);
	conf_update_param(PRELOAD_ID, $conf[PRELOAD_ID]);
      }
    else
      {
	$new_conf = is_string($conf[PRELOAD_ID]) ? unserialize($conf[PRELOAD_ID]) : $conf[PRELOAD_ID];

	// Update old structures
	if (!isset($new_conf['squareThumbs'])) {
	  $new_conf['squareThumbs'] = true;
	}

	$conf[PRELOAD_ID] = serialize($new_conf);
	conf_update_param(PRELOAD_ID, $conf[PRELOAD_ID]);
      }

    $this->installed = true;
  }

  function update($old_version, $new_version, &$errors=array())
  {
    // Update is same as install
    $this->install($new_version, $errors);
  }

  function activate($plugin_version, &$errors=array())
  {
    if (!$this->installed)
      {
	$this->install($plugin_version, $errors);
      }
  }

  function deactivate()
  {
  }

  function uninstall()
  {
    conf_delete_param(PRELOAD_ID);
  }
}

?>

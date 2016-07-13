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

defined('PRELOAD_PATH') or die('Hacking attempt!');

global $conf, $template, $page;
load_language('plugin.lang', PRELOAD_PATH);

if (isset($_POST['submit']))
  {
    $oldconf = $conf;
    $conf[PRELOAD_ID] = array();

    if (isset($_POST['preloadImageCount'])) {
      $conf[PRELOAD_ID]['imageCount'] = $_POST['preloadImageCount'];
    } else {
      $conf[PRELOAD_ID]['imageCount'] = $oldconf[PRELOAD_ID]['imageCount'];
    }

    $conf[PRELOAD_ID]['squareThumbs'] = isset($_POST['preloadSquareThumbs']);

    conf_update_param(PRELOAD_ID, serialize($conf[PRELOAD_ID]));
    $page['infos'][] = l10n('Information data registered in database');
  }

$template->assign(array(
			'Preload' => $conf[PRELOAD_ID],
			));

$template->set_filename('plugin_admin_content',
			realpath(PRELOAD_PATH . 'template/admin.tpl'));
$template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_admin_content');

?>

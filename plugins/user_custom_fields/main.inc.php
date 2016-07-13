<?php
/*
Plugin Name: User Custom Fields
Version: 0.0.1
Description: Add User Custom Fields
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=833
Author: ddtddt
Author URI: http://temmii.com/piwigo/
*/

// +-----------------------------------------------------------------------+
// | User Custom Fields plugin for Piwigo                                  |
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

global $prefixeTable;

define('UCF_DIR' , basename(dirname(__FILE__)));
define('UCF_PATH' , PHPWG_PLUGINS_PATH . UCF_DIR . '/');
if (!defined('UCF_TABLE')) define('UCF_TABLE', $prefixeTable.'user_custom_fields');
if (!defined('UCFD_TABLE')) define('UCFD_TABLE', $prefixeTable.'user_custom_fields_data');
define('UCF_ADMIN',get_root_url().'admin.php?page=plugin-'.UCF_DIR);

include_once(UCF_PATH . 'include/function.inc.php');

add_event_handler('loading_lang', 'user_custom_fields_loading_lang');	  
function user_custom_fields_loading_lang(){
  load_language('plugin.lang', UCF_PATH);
}

 //plugin on register
if (script_basename() == 'register')
{  
 include_once(dirname(__FILE__).'/initregister.php');
}
// Plugin on profile page
if (script_basename() == 'profile')  
{  
 include_once(dirname(__FILE__).'/initprofile.php');
}

  // Plugin for admin
if (script_basename() == 'admin')   
{
  include_once(dirname(__FILE__).'/initadmin.php');
}

?>
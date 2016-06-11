<?php
/*
Plugin Name: Most Downloaded
Version: 0.0.1
Description: Add a "Most Downloaded" link in "Specials" menu. (Plugin download counter must be activate)
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=827
Author: ddtddt
Author URI: http://temmii.com/piwigo/
*/

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

defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

define('MOSTDOWNLOADED_PATH' , PHPWG_PLUGINS_PATH . basename(dirname(__FILE__)) . '/');

add_event_handler('loading_lang', 'most_downloaded_loading_lang');	  
function most_downloaded_loading_lang(){
  load_language('plugin.lang', MOSTDOWNLOADED_PATH);
}

$desac = pwg_db_fetch_assoc(pwg_query("SELECT state FROM " . PLUGINS_TABLE . " WHERE id = 'download_counter';"));

if($desac['state'] != 'active'){
  if (script_basename() == 'admin'){
   include_once(dirname(__FILE__).'/initadmin.php');
  }
}else{

  
  add_event_handler('blockmanager_apply' , 'add_link_most_downloaded');
  add_event_handler('loc_end_section_init', 'section_init_most_downloaded');
  
  function add_link_most_downloaded($menu_ref_arr){
    global $conf;
    $menu = &$menu_ref_arr[0];
    $position = (isset($conf['most_downloaded_position']) and is_numeric($conf['most_downloaded_position'])) ? $conf['most_downloaded_position'] : 4;
    if (($block = $menu->get_block('mbSpecials')) != null){
     array_splice($block->data, $position-1, 0, array('most_downloaded' =>
      array(
        'URL' => make_index_url(array('section' => 'most_downloaded')),
        'TITLE' => l10n('displays most downloaded Photos'),
        'NAME' => l10n('Most downloaded')
        )
      )
    );
   }
  }

function section_init_most_downloaded()
{
  global $tokens, $page, $conf;
  
  if (!in_array('most_downloaded', $tokens))
  {
    return;
  }
  
  $page['section'] = 'most_downloaded';
  $page['title'] = '<a href="' . duplicate_index_url() . '">' . l10n('Most downloaded') . '</a>';
  $page['section_title'] = '<a href="'.get_gallery_home_url().'">' . l10n('Home') . '</a>'
    . $conf['level_separator'] . $page['title'];

  $query = '
SELECT DISTINCT image_id
    FROM ' . IMAGE_CATEGORY_TABLE . '
    WHERE ' .  
      get_sql_condition_FandF(
        array(
          'forbidden_categories' => 'category_id',
          'visible_categories' => 'category_id',
          'visible_images' => 'image_id',
          ),
        '', true
        )
    . '
;';

  $img = query2array($query, null, 'image_id');

  if (empty($img))
  {
    $page['items'] = array();
  }
  else
  {
    $query = 'SELECT id, download_counter FROM ' . IMAGES_TABLE . ' AS img WHERE img.id IN (' . implode(',', $img) . ') and download_counter > 0 ORDER BY download_counter DESC, img.hit DESC LIMIT ' . $conf['top_number'] . ';';
    $page['items'] = query2array($query, null, 'id');
    
  add_event_handler('loc_end_index_thumbnails', 'add_nb_most_downloaded');
}

function add_nb_most_downloaded($tpl_thumbnails_var){
  global $template, $user, $selection;

  // unsed sort order
  $template->clear_assign('image_orders');

    $query = 'SELECT id, download_counter FROM '.IMAGES_TABLE.' WHERE id IN ('.implode(',', $selection).');';
    $nb_download = query2array($query, 'id', 'download_counter');
    
    foreach ($tpl_thumbnails_var as &$row)
    {
      $row['download_counter'] = $nb_download[$row['id']];
    }
    unset($row);
  

  return $tpl_thumbnails_var;
}


}
  
}







   






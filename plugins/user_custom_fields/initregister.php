<?php
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

//add prefiter

add_event_handler('loc_end_page_header', 'ucfI', 55 );
function ucfI(){
  global $template;
  $template->set_prefilter('register', 'ucfIT');
  $template->set_filename('ucf_register_add', realpath(UCF_PATH.'ucf_register_add.tpl'));
  $template->assign_var_from_handle('UCF_REGISTER_ADD', 'ucf_register_add');
}

function ucfIT($content, &$smarty){
  $search = '/(<fieldset>).*(<\/fieldset>)/is';
  return preg_replace($search, '{$UCF_REGISTER_ADD}', $content);
}

add_event_handler('loc_end_page_header', 'ucfinit');
function ucfinit(){
  global $template;
  $PAED = pwg_db_fetch_assoc(pwg_query("SELECT state FROM " . PLUGINS_TABLE . " WHERE id = 'ExtendedDescription';"));
	if($PAED['state'] == 'active'){
		add_event_handler('AP_render_content', 'get_user_language_desc');
		$template->assign('useED',1);
    }else{
        $template->assign('useED',0);
    }
  $tab_user_register=tab_user_custom_fields_register();
  while ($info_users = pwg_db_fetch_assoc($tab_user_register)) {
	$items = array(
		'UCFID' => $info_users['id_ucf'],
		'UCFWORDING' => trigger_change('AP_render_content', $info_users['wording']),
		'UCFOBLIGATORY' => $info_users['obligatory'],
	);
	$template->append('add_uers_register', $items);
  }
}


add_event_handler('register_user_check', 'ucfT');
function ucfT($errors){
  global $prefixeTable,$conf;
  if (count($errors) == 0){
    $query = 'SELECT MAX('.$conf['user_fields']['id'].') + 1 FROM '.USERS_TABLE.';';
    list($next_id) = pwg_db_fetch_row(pwg_query($query));
  
	foreach ($_POST['data'] AS $id_ucf => $data) {
	  $query = 'INSERT ' . $prefixeTable . 'user_custom_fields_data(id_user,id_ucf,data) VALUES (' . $next_id . ',' . $id_ucf . ',"' . $data . '");';
	  pwg_query($query);
	}	
  }
  return $errors;
}

?>
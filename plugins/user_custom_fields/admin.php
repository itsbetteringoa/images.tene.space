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

if (!defined('PHPWG_ROOT_PATH'))
    die('Hacking attempt!');
global $template, $conf, $user;
include_once(PHPWG_ROOT_PATH . 'admin/include/tabsheet.class.php');
$my_base_url = get_admin_plugin_menu_link(__FILE__);

// +-----------------------------------------------------------------------+
// | Check Access and exit when user status is not ok                      |
// +-----------------------------------------------------------------------+
check_status(ACCESS_ADMINISTRATOR);

//-------------------------------------------------------- sections definitions
if (!isset($_GET['tab']))
  $page['tab'] = 'define_custom';
else
  $page['tab'] = $_GET['tab'];
  $tabsheet = new tabsheet();
  $tabsheet->add('ucf', l10n('User custom fields'), UCF_ADMIN . '-define_custom');
  if (isset($_GET['ucfiduser'])) {
    $tabsheet->add('edit_user', l10n('User').' '.$_GET['ucfusername'], UCF_ADMIN . '-edit_user');
  }
  $tabsheet->select($page['tab']);
  $tabsheet->assign();

switch ($page['tab']) {
  case 'define_custom':
	$admin_base_url = UCF_ADMIN . '-define_custom';
	$template->assign(
		'addinfotemplate', array(
		'toto' => l10n('toto'),
	));
        
    $PAED = pwg_db_fetch_assoc(pwg_query("SELECT state FROM " . PLUGINS_TABLE . " WHERE id = 'ExtendedDescription';"));
    if($PAED['state'] == 'active'){
      add_event_handler('AP_render_content', 'get_user_language_desc');
      $template->assign('useED',1);
    }else{
      $template->assign('useED',0);
    }
        
    $tab_user_custom_fields = tab_user_custom_fields();

        if (pwg_db_num_rows($tab_user_custom_fields)) {
            while ($user_custom_fields = pwg_db_fetch_assoc($tab_user_custom_fields)) {
                    $items = array(
                        'IDUCF' => $user_custom_fields['id_ucf'],
                        'UCFORDER' => $user_custom_fields['order_ucf'],
                        'UCFACTIVE' => $user_custom_fields['active'],
                        'UCFEDIT' => $user_custom_fields['edit'],
						'UCFADMINONLY' => $user_custom_fields['adminonly'],
						'UCFOBLIGATORY' => $user_custom_fields['obligatory'],
                        'U_HIDE' => $admin_base_url . '&amp;hide=' . $user_custom_fields['id_ucf'],
                        'U_SHOW' => $admin_base_url . '&amp;show=' . $user_custom_fields['id_ucf'],
						'U_ADMINONLYHIDE' => $admin_base_url . '&amp;adminonlyh=' . $user_custom_fields['id_ucf'],
                        'U_ADMINONLYSHOW' => $admin_base_url . '&amp;adminonlys=' . $user_custom_fields['id_ucf'],
						'U_OBLIGATORYHIDE' => $admin_base_url . '&amp;obligatoryh=' . $user_custom_fields['id_ucf'],
                        'U_OBLIGATORYSHOW' => $admin_base_url . '&amp;obligatorys=' . $user_custom_fields['id_ucf'],
                    );
                if($user_custom_fields['id_ucf']==1){
                    $items['UCFWORDING'] = l10n('Username');
					$items['UCFOBLO'] = 0;
                }else if($user_custom_fields['id_ucf']==2){
				    $items['UCFWORDING'] = l10n('Password');
					$items['UCFOBLO'] = 0;
                }else if($user_custom_fields['id_ucf']==3){
				    $items['UCFWORDING'] = l10n('Email address');
					$items['UCFOBLO'] = 1;
				}else if($user_custom_fields['id_ucf']==4){
				    $items['UCFWORDING'] = l10n('Send my connection settings by email');
					$items['UCFOBLO'] = 1;
                }else{
				    $items['UCFWORDING'] = trigger_change('AP_render_content',$user_custom_fields['wording']);
					$items['UCFWORDING2'] = $user_custom_fields['wording'];
					$items['UCFOBLO'] = 1;
                }        
                $template->append('user_custom_fields', $items);
            }
        }
        
        if (isset($_POST['submitManualOrderInfo'])){
            
            asort($_POST['infoOrd'], SORT_NUMERIC);
            
            $data = array();
            foreach ($_POST['infoOrd'] as $id =>$val){
            
            $data[] = array('id_ucf' => $id, 'order_ucf' => $val+1);
            }
            $fields = array('primary' => array('id_ucf'), 'update' => array('order_ucf'));
            mass_updates(UCF_TABLE, $fields, $data);

          $page['infos'][] = l10n('Custom fields manual order was saved');
          redirect($admin_base_url);
        }

        if (isset($_POST['submitUCF'])) {
            if(!isset($_POST['inseractive'])){
                $active = 1;
            }else{
			    $active = 0;
			}
			if(!isset($_POST['adminonly'])){
                $adminonly = 0;
            }else{
			    $adminonly = 1;
			}
			if(!isset($_POST['obligatory'])){
                $obligatory = 0;
            }else{
			    $obligatory = 1;
			}
            if ($_POST['invisibleID'] == 0) {
                $result = pwg_query('SELECT MAX(order_ucf) FROM '. UCF_TABLE );
                $row = pwg_db_fetch_assoc($result);
                $or = ($row['MAX(order_ucf)'] + 1);

                $q = '
                INSERT INTO ' . $prefixeTable . 'user_custom_fields(wording,order_ucf,active,edit,adminonly,obligatory)VALUES ("' . $_POST['inserwording'] . '","' . $or . '","' . $active . '",1,'.$adminonly.','.$obligatory.');';
                pwg_query($q);
                $_SESSION['page_infos'] = array(l10n('Custom fields add'));
            } else {
                $q = '
                UPDATE ' . $prefixeTable . 'user_custom_fields'
                        . ' set wording ="' . $_POST['inserwording'] . '" '
                        . ' ,active=' . $active
						. ' ,adminonly=' . $adminonly
						. ' ,obligatory=' . $obligatory
                        . ' WHERE id_ucf=' . $_POST['invisibleID'] . ';';
                pwg_query($q);
                $_SESSION['page_infos'] = array(l10n('Custom fields update'));
            }
            redirect($admin_base_url);
        }

        if (isset($_GET['delete'])) {
            check_input_parameter('delete', $_GET, false, PATTERN_ID);
            $query = 'DELETE FROM ' . UCF_TABLE . ' WHERE id_ucf = ' . $_GET['delete'] . ';';
            pwg_query($query);
            $query = 'DELETE FROM ' . UCFD_TABLE . ' WHERE id_ucf = ' . $_GET['delete'] . ';';
            pwg_query($query);

            $_SESSION['page_infos'] = array(l10n('Custom fields delete'));
            redirect($admin_base_url);
        }
        
        if (isset($_GET['hide'])) {
            check_input_parameter('hide', $_GET, false, PATTERN_ID);
            $query = 'UPDATE ' . UCF_TABLE . ' SET active = 0 , obligatory = 0 WHERE id_ucf=' . $_GET['hide'] . ';';
            pwg_query($query);
        }
        
        if (isset($_GET['show'])) {
            check_input_parameter('show', $_GET, false, PATTERN_ID);
            $query = 'UPDATE ' . UCF_TABLE . ' SET active = 1 WHERE id_ucf=' . $_GET['show'] . ';';
            pwg_query($query);
        }

		if (isset($_GET['adminonlyh'])) {
            check_input_parameter('adminonlyh', $_GET, false, PATTERN_ID);
            $query = 'UPDATE ' . UCF_TABLE . ' SET adminonly = 1 WHERE id_ucf=' . $_GET['adminonlyh'] . ';';
            pwg_query($query);
        }
		if (isset($_GET['adminonlys'])) {
            check_input_parameter('adminonlys', $_GET, false, PATTERN_ID);
            $query = 'UPDATE ' . UCF_TABLE . ' SET adminonly = 0 WHERE id_ucf=' . $_GET['adminonlys'] . ';';
            pwg_query($query);
        }
		if (isset($_GET['obligatoryh'])) {
            check_input_parameter('obligatoryh', $_GET, false, PATTERN_ID);
			if($_GET['obligatoryh']==3){
				conf_update_param('obligatory_user_mail_address', true);
			}
            $query = 'UPDATE ' . UCF_TABLE . ' SET obligatory = 1 WHERE id_ucf=' . $_GET['obligatoryh'] . ';';
            pwg_query($query);
		}
		if (isset($_GET['obligatorys'])) {
            check_input_parameter('obligatorys', $_GET, false, PATTERN_ID);
            if($_GET['obligatorys']==3){
				conf_update_param('obligatory_user_mail_address', false);
			}
			$query = 'UPDATE ' . UCF_TABLE . ' SET obligatory = 0 WHERE id_ucf=' . $_GET['obligatorys'] . ';';
            pwg_query($query);
		}
  break;
  case 'edit_user':
    if (isset($_GET['ucfiduser']) and isset($_GET['ucfusername'])) {
      check_input_parameter('ucfiduser', $_GET, false, PATTERN_ID);
	  $PAED = pwg_db_fetch_assoc(pwg_query("SELECT state FROM " . PLUGINS_TABLE . " WHERE id = 'ExtendedDescription';"));
		if($PAED['state'] == 'active'){
		  add_event_handler('AP_render_content', 'get_user_language_desc');
		  $template->assign('useED',1);
		}else{
		  $template->assign('useED',0);
		}
	  $template->assign(
		'editusertemplate', array(
		'toto' => l10n('toto'),
	  ));
	  $tab_user_custom_fields_adminlist=tab_user_custom_fields_adminlist();
      $template->assign('UCF_USERNAME',$_GET['ucfusername']);
	  $template->assign('UCF_USERID',$_GET['ucfiduser']);
	  while ($info_users = pwg_db_fetch_assoc($tab_user_custom_fields_adminlist)) {
		
		$d=data_info_user($_GET['ucfiduser'],$info_users['id_ucf']);
		$row = pwg_db_fetch_assoc($d);
		$items = array(
			'UCFID' => $info_users['id_ucf'],
			'UCFWORDING' => trigger_change('AP_render_content', $info_users['wording']),
			'UCFOBLIGATORY' => $info_users['obligatory'],
			'UCFADMINONLY' => $info_users['adminonly'],
			'UCFDATA' => $row['data'],
		);
		$template->append('tab_user_custom_fields_adminlist', $items);
	  }
    }else{
	redirect(UCF_ADMIN . '-define_custom');
	}
	
  if (isset($_POST['submitUCFa'])) {
   foreach ($_POST['data'] AS $id_ucf => $data) {
	$q = 'SELECT 1 FROM ' . UCFD_TABLE . ' WHERE id_user=' . $_POST['invisibleUSERID'] . ' AND id_ucf=' . $id_ucf;
	$test = pwg_query($q);
	$row = pwg_db_fetch_assoc($test);
	if (count($row) > 0){
	  if ($data != ''){
		$query = 'UPDATE ' . UCFD_TABLE . ' SET data="' . $data . '" WHERE id_user=' . $_POST['invisibleUSERID'] . ' AND id_ucf=' . $id_ucf;
		pwg_query($query);
	  }else{
		$query = 'DELETE FROM ' . UCFD_TABLE . ' WHERE id_user=' . $_POST['invisibleUSERID'] . ' AND id_ucf=' . $id_ucf;
		pwg_query($query);
	  }
	}else if ($data != ''){
		$query = 'INSERT ' . UCFD_TABLE . '(id_user,id_ucf,data) VALUES (' . $_POST['invisibleUSERID'] . ',' . $id_ucf . ',"' . $data . '");';
		pwg_query($query);
	}
   }
  $_SESSION['page_infos'] = array(l10n('Data custom fields update'));
  redirect(get_root_url().'admin.php?page=user_list');
  }
	
  break;
 }


$template->set_filenames(array('plugin_admin_content' => dirname(__FILE__) . '/admin.tpl'));
$template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_admin_content');
?>
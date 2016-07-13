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

defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

class user_custom_fields_maintain extends PluginMaintain
{
  private $installed = false;

  function __construct($plugin_id){
    parent::__construct($plugin_id);
  }

  function install($plugin_version, &$errors=array()){
    global $prefixeTable,$conf;
	if (!defined('UCF_TABLE')) define('UCF_TABLE', $prefixeTable.'user_custom_fields');
	  $query = "CREATE TABLE IF NOT EXISTS ". UCF_TABLE ." (
		id_ucf SMALLINT(5) UNSIGNED NOT NULL auto_increment,
		wording VARCHAR(255) NOT NULL ,
		order_ucf SMALLINT(5) UNSIGNED NOT NULL ,
		active SMALLINT(5) UNSIGNED NOT NULL ,
		edit SMALLINT(5) UNSIGNED NOT NULL ,
		adminonly SMALLINT(5) UNSIGNED NOT NULL ,
		obligatory SMALLINT(5) UNSIGNED NOT NULL ,
		PRIMARY KEY (id_ucf))DEFAULT CHARSET=utf8;";
	$result = pwg_query($query);

	if (!defined('UCFD_TABLE')) define('UCFD_TABLE', $prefixeTable.'user_custom_fields_data');
      $query = "CREATE TABLE IF NOT EXISTS ". UCFD_TABLE ." (
		id_user SMALLINT(5) UNSIGNED NOT NULL ,
		id_ucf SMALLINT(5) UNSIGNED NOT NULL ,
		data VARCHAR(255) NOT NULL ,
		PRIMARY KEY (id_user,id_ucf))DEFAULT CHARSET=utf8;";
	$result = pwg_query($query);
 
	if($conf['obligatory_user_mail_address']==true){$oblisend=1;}else{$oblisend=0;}
    
$q = 'INSERT INTO ' . UCF_TABLE . ' (id_ucf,wording,order_ucf,active,edit,adminonly,obligatory)VALUES 
  (1,"Username",1,1,0,0,1),
  (2,"password",2,1,0,0,1),
  (3,"mail_address",3,1,0,0,1),
  (4,"send_mail",4,1,0,0,'.$oblisend.')
  ;';
    pwg_query($q);
    
  }

  function activate($plugin_version, &$errors=array()){

  }

  function update($old_version, $new_version, &$errors=array()){
     
  }
  
  function deactivate(){
  }

  function uninstall(){
    global $prefixeTable;
	  $q = 'DROP TABLE ' . $prefixeTable . 'user_custom_fields;';
      pwg_query($q);
      $q = 'DROP TABLE ' . $prefixeTable . 'user_custom_fields_data;';
      pwg_query($q);
  }
}
?>

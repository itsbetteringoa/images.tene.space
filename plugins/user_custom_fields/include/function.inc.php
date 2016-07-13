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

/*public*/
function tab_user_custom_fields_register(){
  $query = 'SELECT id_ucf,wording,order_ucf,active,edit,adminonly,obligatory FROM ' . UCF_TABLE.' WHERE adminonly=0 AND active=1 ORDER BY order_ucf ASC;';
  return pwg_query($query);
}

function data_info_user($id_user=null,$id_ucf=NULL){
$query = '
    SELECT data
    FROM ' . UCFD_TABLE;
    $wa='WHERE';
    if($id_user!=null){
        $query .=' '.$wa.' id_user='.$id_user;$wa='AND';
    }
    if($id_ucf!=null){
        $query .=' '.$wa.' id_ucf='.$id_ucf;$wa='AND';
    }
$query .= ';';
return pwg_query($query);
}


/*Admin*/
function tab_user_custom_fields($id_ucf=NULL){
  $query = '
    SELECT id_ucf,wording,order_ucf,active,edit,adminonly,obligatory
    FROM ' . UCF_TABLE;
    if($id_ucf!=null){
      $query .= ' WHERE id_ucf='.$id_ucf;
    }
  $query .= ' ORDER BY order_ucf ASC
  ;';
  return pwg_query($query);
}

function tab_user_custom_fields_adminlist($id_ucf=NULL){
  $query = '
    SELECT id_ucf,wording,order_ucf,active,edit,adminonly,obligatory
    FROM ' . UCF_TABLE;
 $query .= ' WHERE edit=1'; 
   if($id_ucf!=null){
      $query .= ' AND id_ucf='.$id_ucf;
    }
  $query .= ' ORDER BY order_ucf ASC
  ;';
  return pwg_query($query);
}

?>
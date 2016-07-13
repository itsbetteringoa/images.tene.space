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

//add admin menu
add_event_handler('get_admin_plugin_menu_links', 'user_custom_fields_admin_menu');

function user_custom_fields_admin_menu($menu){
    $menu[] = array(
        'NAME' => l10n('User custom fields'),
        'URL' => UCF_ADMIN,
    );
     return $menu;
}

//ajouter filtre sur page option pour supprimer email obligatoire

add_event_handler('loc_begin_admin_page', 'ucf_add_popin');
function ucf_add_popin(){
  global $template;
  $template->set_prefilter('user_list', 'ucf_add_popin_prefilter');
  $template->set_prefilter('config', 'ucf_config_prefilter');
}
 
function ucf_add_popin_prefilter($content, &$smarty){
  $search = '#</div>\s*<div class="userPropertiesSet userPrefs">#ms';
  return preg_replace($search, '<div class="userProperty"><a href="'.UCF_ADMIN.'-edit_user&amp;ucfiduser=<%- user.id %>&amp;ucfusername=<%- user.username %>"><span class="icon-pencil"></span>{\'Edit custom fields\'|@translate}</a></div></div><div class="userPropertiesSet userPrefs">', $content);
}

function ucf_config_prefilter($content, &$smarty){
  $search = '#(<li>
        <label class="font-checkbox">
          <span class="icon-check"></span>
          <input type="checkbox" name="obligatory_user_mail_address").*Mail address is mandatory for registration\'\|translate}
        </label>
      </li>#ms';
  return preg_replace($search, '', $content);
}

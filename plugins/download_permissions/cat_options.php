<?php
// +-----------------------------------------------------------------------+
// | Piwigo - a PHP based photo gallery                                    |
// +-----------------------------------------------------------------------+
// | Copyright(C) 2008-2014 Piwigo Team                  http://piwigo.org |
// | Copyright(C) 2003-2008 PhpWebGallery Team    http://phpwebgallery.net |
// | Copyright(C) 2002-2003 Pierrick LE GALL   http://le-gall.net/pierrick |
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
{
  die ("Hacking attempt!");
}

include_once(PHPWG_ROOT_PATH.'admin/include/functions.php');
include_once(PHPWG_ROOT_PATH.'admin/include/tabsheet.class.php');

// +-----------------------------------------------------------------------+
// | Check Access and exit when user status is not ok                      |
// +-----------------------------------------------------------------------+

check_status(ACCESS_ADMINISTRATOR);

// +-----------------------------------------------------------------------+
// |                       modification registration                       |
// +-----------------------------------------------------------------------+

// print '<pre>';
// print_r($_POST);
// print '</pre>';
if (isset($_POST['falsify'])
    and isset($_POST['cat_true'])
    and count($_POST['cat_true']) > 0)
{
  $query = '
UPDATE '.CATEGORIES_TABLE.'
  SET downloadable = \'false\'
  WHERE id IN ('.implode(',', $_POST['cat_true']).')
;';
  pwg_query($query);
}
else if (isset($_POST['trueify'])
         and isset($_POST['cat_false'])
         and count($_POST['cat_false']) > 0)
{
  $query = '
UPDATE '.CATEGORIES_TABLE.'
  SET downloadable = \'true\'
  WHERE id IN ('.implode(',', $_POST['cat_false']).')
;';
  pwg_query($query);
}

// +-----------------------------------------------------------------------+
// |                             template init                             |
// +-----------------------------------------------------------------------+

$template->set_filenames(
  array(
    'double_select' => 'double_select.tpl',
    'download_permissions' => realpath(DLPERMS_PATH . 'cat_options.tpl'),
    )
  );

$template->assign(
  array(
    'F_ACTION' => '',
   )
 );

// TabSheet
$tabsheet = new tabsheet();
$tabsheet->set_id('cat_options');
$tabsheet->select('dlperms');
$tabsheet->assign();

// +-----------------------------------------------------------------------+
// |                              form display                             |
// +-----------------------------------------------------------------------+

// for each section, categories in the multiselect field can be :
//
// - true : commentable for comment section
// - false : un-commentable for comment section
// - NA : (not applicable) for virtual categories
//
// for true and false status, we associates an array of category ids,
// function display_select_categories will use the given CSS class for each
// option
$cats_true = array();
$cats_false = array();

$query_true = '
SELECT id,name,uppercats,global_rank
  FROM '.CATEGORIES_TABLE.'
  WHERE downloadable = \'true\'
;';

$query_false = '
SELECT id,name,uppercats,global_rank
  FROM '.CATEGORIES_TABLE.'
  WHERE downloadable = \'false\'
;';

$template->assign(
  array(
    'L_SECTION' => l10n('Authorize download on photos'),
    'L_CAT_OPTIONS_TRUE' => l10n('Authorized'),
    'L_CAT_OPTIONS_FALSE' => l10n('Forbidden'),
    )
  );

display_select_cat_wrapper($query_true,array(),'category_option_true');
display_select_cat_wrapper($query_false,array(),'category_option_false');

// +-----------------------------------------------------------------------+
// |                           sending html code                           |
// +-----------------------------------------------------------------------+

$template->assign_var_from_handle('DOUBLE_SELECT', 'double_select');
// $template->assign_var_from_handle('ADMIN_CONTENT', 'cat_options');
?>
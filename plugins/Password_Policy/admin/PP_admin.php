<?php

global $user, $lang, $conf, $errors;

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');
// +-----------------------------------------------------------------------+
// | Check Access and exit when user status is not ok                      |
// +-----------------------------------------------------------------------+
check_status(ACCESS_ADMINISTRATOR);

if (!defined('PP_PATH')) define('PP_PATH' , PHPWG_PLUGINS_PATH.basename(dirname(__FILE__)).'/');

//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', true);

include_once(PHPWG_ROOT_PATH.'admin/include/tabsheet.class.php');
include_once (PHPWG_ROOT_PATH.'/include/constants.php');

load_language('plugin.lang', PP_PATH);


// +-----------------------------------------------------------------------+
// |                   Variables initialization                            |
// +-----------------------------------------------------------------------+
$page['global'] = array();
$error = array();

$my_base_url = get_admin_plugin_menu_link(__FILE__);

$PP_Password_Test_Score = 0;

// +-----------------------------------------------------------------------+
// |                      Getting plugin version                           |
// +-----------------------------------------------------------------------+
$plugin =  PPInfos(PP_PATH);
$version = $plugin['version'];

// ------------------------------------------
// Template initialization for forms and data
// ------------------------------------------
$themeconf = $template->get_template_vars('themeconf');
$PP_theme = $themeconf['id'];

// +----------------------------------------------------------+
// |            FCK Editor for email text fields              |
// +----------------------------------------------------------+
$toolbar = 'Basic';
$width = '750px';
$height = '300px';
$areas = array();
array_push($areas,'PP_CustomLockMsg');

if (function_exists('set_fckeditor_instance'))
{
  $fcke_config = unserialize($conf['FCKEditor']);
  foreach($areas as $area)
  {
    if (!isset($fcke_config[$area]))
    {
      $fcke_config[$area] = false;
    }
  }
  $conf['FCKEditor'] = serialize($fcke_config);

  set_fckeditor_instance($areas, $toolbar, $width, $height);
}


// +-----------------------------------------------------------------------+
// |                            Tabssheet                                  |
// +-----------------------------------------------------------------------+
if (!isset($_GET['tab']))
	$page['tab'] = 'config';
else
 $page['tab'] = $_GET['tab'];

$tabsheet = new tabsheet();
$tabsheet->add('config',
               l10n('PP_config_tab'),
               $my_base_url.'&amp;tab=config');
$tabsheet->add('userlist',
               l10n('PP_Users_List_Tab'),
               $my_base_url.'&amp;tab=userlist');
$tabsheet->select($page['tab']);
$tabsheet->assign();


// +-----------------------------------------------------------------------+
// |                            Tabssheet select                           |
// +-----------------------------------------------------------------------+

switch ($page['tab'])
{
// *************************************************************************
// +-----------------------------------------------------------------------+
// |                           Config tab                                  |
// +-----------------------------------------------------------------------+
// *************************************************************************
  case 'config':

  if (isset($_POST['submit']) and isset($_POST['PP_Password_Enforced']) and isset($_POST['PP_AdminPassword_Enforced']) and isset($_POST['PP_PwdReset']) and isset($_POST['PP_LogFailedPassw']))
  {
    $_POST['PP_CustomLockMsg'] = str_replace('\"', '"', str_replace("\'", "'", str_replace("\\\\", "\\", $_POST['PP_CustomLockMsg'])));
    // Save global PP configuration
    // -----------------------------
    $newconf_PP['PPVersion'] = $version;
    $newconf_PP['PASSWORDENF'] = (isset($_POST['PP_Password_Enforced']) ? $_POST['PP_Password_Enforced'] : 'false');
    $newconf_PP['PASSWORD_SCORE'] = (isset($_POST['PP_Password_Score']) ? $_POST['PP_Password_Score'] : '100');
    $newconf_PP['ADMINPASSWENF'] = (isset($_POST['PP_AdminPassword_Enforced']) ? $_POST['PP_AdminPassword_Enforced'] : 'false');
    $newconf_PP['PWDRESET'] = (isset($_POST['PP_PwdReset']) ? $_POST['PP_PwdReset'] : 'false');
    $newconf_PP['LOGFAILBLOCK'] = (isset($_POST['PP_LogFailedPassw']) ? $_POST['PP_LogFailedPassw'] : 'false');
    $newconf_PP['NBLOGFAIL'] = (isset($_POST['PP_NbFailedPassw']) ? $_POST['PP_NbFailedPassw'] : '0');
    $newconf_PP['USRLOCKEDTXT'] = (isset($_POST['PP_CustomLockMsg']) ? $_POST['PP_CustomLockMsg'] : l10n('PP_User_Account_Locked_Txt'));

    $conf['PasswordPolicy'] = serialize($newconf_PP);

    conf_update_param('PasswordPolicy', pwg_db_real_escape_string($conf['PasswordPolicy'])); 

    array_push($page['infos'], l10n('PP_save_config'));
  }

  // Testing password enforcement
  // ----------------------------
  if (isset($_POST['PasswordTest']) and isset($_POST['PP_Password_Test']) and !empty($_POST['PP_Password_Test']))
  {
    $PP_Password_Test_Score = PP_testpassword($_POST['PP_Password_Test']);
  }
  else if (isset($_POST['PasswordTest']) and empty($_POST['PP_Password_Test']))
  {
    array_push($page['errors'], l10n('PP_Error_Password_Mandatory'));
  }

  $conf_PP = unserialize($conf['PasswordPolicy']);

  $template->assign(
    array(
            'PP_VERSION'                       => $version,
            'PP_PATH'                          => PP_PATH,
						'PP_PASSWORDENF_TRUE'              => $conf_PP['PASSWORDENF']=='true' ? 'checked="checked"' : '' ,
						'PP_PASSWORDENF_FALSE'             => $conf_PP['PASSWORDENF']=='false' ? 'checked="checked"' : '' ,
						'PP_PASSWORD_SCORE'                => $conf_PP['PASSWORD_SCORE'],
            'PP_ADMINPASSWENF_TRUE'            => $conf_PP['ADMINPASSWENF']=='true' ? 'checked="checked"' : '' ,
						'PP_ADMINPASSWENF_FALSE'           => $conf_PP['ADMINPASSWENF']=='false' ? 'checked="checked"' : '' ,
            'PP_PWDRESET_TRUE'                 => $conf_PP['PWDRESET']=='true' ? 'checked="checked"' : '' ,
            'PP_PWDRESET_FALSE'                => $conf_PP['PWDRESET']=='false' ? 'checked="checked"' : '' ,
						'PP_PASSWORD_TEST_SCORE'           => $PP_Password_Test_Score,
            'PP_LOGFAILEDPASSW_TRUE'           => $conf_PP['LOGFAILBLOCK']=='true' ? 'checked="checked"' : '' ,
            'PP_LOGFAILEDPASSW_FALSE'          => $conf_PP['LOGFAILBLOCK']=='false' ? 'checked="checked"' : '' ,
            'PP_NBLOGFAIL'                     => $conf_PP['NBLOGFAIL'],
            'PP_USRLOCKEDTXT'                  => $conf_PP['USRLOCKEDTXT']
    )
  );


// +-----------------------------------------------------------------------+
// |                             errors display                            |
// +-----------------------------------------------------------------------+
  if (isset ($errors) and count($errors) != 0)
  {
    $template->assign('errors',array());
    foreach ($errors as $error)
    {
      array_push($page['errors'], $error);
    }
  }  

// +-----------------------------------------------------------------------+
// |                           templates display                           |
// +-----------------------------------------------------------------------+
  $template->set_filename('plugin_admin_content', dirname(__FILE__) . '/template/PP_admin.tpl');
  $template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_admin_content');

  break;


// *************************************************************************
// +-----------------------------------------------------------------------+
// |                           Users list page                             |
// +-----------------------------------------------------------------------+
// *************************************************************************
  case 'userlist':

  $conf_PP = unserialize($conf['PasswordPolicy']);

  if ((isset($conf_PP['PWDRESET']) and $conf_PP['PWDRESET']=='true') or (isset($conf_PP['LOGFAILBLOCK']) and $conf_PP['LOGFAILBLOCK']=='true'))
  {
// +-----------------------------------------------------------------------+
// |                           initialization                              |
// +-----------------------------------------------------------------------+

    if (!defined('PHPWG_ROOT_PATH'))
    {
      die('Hacking attempt!');
    }

    include_once(PHPWG_ROOT_PATH.'admin/include/functions.php');

// +-----------------------------------------------------------------------+
// | Check Access and exit when user status is not ok                      |
// +-----------------------------------------------------------------------+
    check_status(ACCESS_ADMINISTRATOR);


// +-----------------------------------------------------------------------+
// |                               user list                               |
// +-----------------------------------------------------------------------+

    $page['filtered_users'] = pp_get_user_list();

// +-----------------------------------------------------------------------+
// |                            selected users                             |
// +-----------------------------------------------------------------------+
    if (isset($_POST['pwdreset']) or isset($_POST['unlock']))
    {
      $collection = array();

      switch ($_POST['target'])
      {
        case 'all' :
        {
          foreach($page['filtered_users'] as $local_user)
          {
            array_push($collection, $local_user['id']);
          }
          break;
        }
        case 'selection' :
        {
          if (isset($_POST['selection']))
          {
            $collection = $_POST['selection'];
          }
          break;
        }
      }

      if (count($collection) == 0)
      {
        array_push($page['errors'], l10n('Select at least one user'));
      }
    }

// +-----------------------------------------------------------------------+
// |                               Reset pwd                               |
// +-----------------------------------------------------------------------+
    if (isset($_POST['pwdreset']) and count($collection) > 0)
    {
      if (in_array($conf['guest_id'], $collection))
      {
        array_push($page['errors'], l10n('PP_Guest cannot be pwdreset'));
      }
      if (($conf['guest_id'] != $conf['default_user_id']) and
        in_array($conf['default_user_id'], $collection))
      {
        array_push($page['errors'], l10n('PP_Default user cannot be pwdreset'));
      }
      if (in_array($conf['webmaster_id'], $collection))
      {
        array_push($page['errors'], l10n('PP_Webmaster cannot be pwdreset'));
      }
      if (in_array($user['id'], $collection))
      {
        array_push($page['errors'], l10n('PP_You cannot pwdreset your account'));
      }

      // Generic accounts exclusion (including Adult_Content generic users)
      // ------------------------------------------------------------------
      $query ='
SELECT u.id
FROM '.USERS_TABLE.' AS u
INNER JOIN '.USER_INFOS_TABLE.' AS ui
  ON u.id = ui.user_id
WHERE ui.status = "generic"
;';

	    $result = pwg_query($query);

      while ($row = pwg_db_fetch_assoc($result))
      {
        if (in_array($row['id'], $collection))
        {
          array_push($page['errors'], l10n('PP_Generic cannot be pwdreset'));
        }
      }

      // Admins accounts exclusion
      // --------------------------
      $query ='
SELECT u.id
FROM '.USERS_TABLE.' AS u
INNER JOIN '.USER_INFOS_TABLE.' AS ui
  ON u.id = ui.user_id
WHERE ui.status = "admin"
;';

	    $result = pwg_query($query);

      while ($row = pwg_db_fetch_assoc($result))
      {
        if (in_array($row['id'], $collection))
        {
          array_push($page['errors'], l10n('PP_Admins cannot be pwdreset'));
        }
      }


      if (count($page['errors']) == 0)
      {
        if (isset($_POST['confirm_pwdreset']) and 1 == $_POST['confirm_pwdreset'])
        {
          foreach ($collection as $user_id)
          {
            PP_Set_PwdReset($user_id);
          }
          array_push(
            $page['infos'],
            l10n_dec(
              'PP %d user pwdreseted', 'PP %d users pwdreseted',
              count($collection)
              )
            );
          $template->append('infos', l10n_dec(
              'PP %d user pwdreseted', 'PP %d users pwdreseted',
              count($collection)));
        }
        else
        {
          array_push($page['errors'], l10n('PP_You need to confirm pwdreset'));
        }
      }
    }


// +-----------------------------------------------------------------------+
// |                         Unlock accounts                               |
// +-----------------------------------------------------------------------+
    if (isset($_POST['unlock']) and count($collection) > 0)
    {
      if (in_array($conf['guest_id'], $collection))
      {
        array_push($page['errors'], l10n('PP_Guest is not unlockable'));
      }
      if (($conf['guest_id'] != $conf['default_user_id']) and
        in_array($conf['default_user_id'], $collection))
      {
        array_push($page['errors'], l10n('PP_Default user is not unlockable'));
      }
      if (in_array($conf['webmaster_id'], $collection))
      {
        array_push($page['errors'], l10n('PP_Webmaster is not unlockable'));
      }
      if (in_array($user['id'], $collection))
      {
        array_push($page['errors'], l10n('PP_You cannot unlock your account'));
      }

      // Generic accounts exclusion (including Adult_Content generic users)
      // ------------------------------------------------------------------
      $query ='
SELECT u.id
FROM '.USERS_TABLE.' AS u
INNER JOIN '.USER_INFOS_TABLE.' AS ui
  ON u.id = ui.user_id
WHERE ui.status = "generic"
;';

	    $result = pwg_query($query);

      while ($row = pwg_db_fetch_assoc($result))
      {
        if (in_array($row['id'], $collection))
        {
          array_push($page['errors'], l10n('PP_Generic is not unlockable'));
        }
      }

      // Admins accounts exclusion
      // --------------------------
      $query ='
SELECT u.id
FROM '.USERS_TABLE.' AS u
INNER JOIN '.USER_INFOS_TABLE.' AS ui
  ON u.id = ui.user_id
WHERE ui.status = "admin"
;';

	    $result = pwg_query($query);

      while ($row = pwg_db_fetch_assoc($result))
      {
        if (in_array($row['id'], $collection))
        {
          array_push($page['errors'], l10n('PP_Admins is not unlockable'));
        }
      }


      if (count($page['errors']) == 0)
      {
        if (isset($_POST['confirm_unlock']) and 1 == $_POST['confirm_unlock'])
        {
          foreach ($collection as $user_id)
          {
            PP_unlock_user($user_id);
          }
          array_push(
            $page['infos'],
            l10n_dec(
              'PP %d user unlocked', 'PP %d users unlocked',
              count($collection)
              )
            );
          $template->append('infos', l10n_dec(
              'PP %d user unlocked', 'PP %d users unlocked',
              count($collection)));
        }
        else
        {
          array_push($page['errors'], l10n('PP_You need to confirm unlock'));
        }
      }
    }


// +-----------------------------------------------------------------------+
// |                               user list                               |
// +-----------------------------------------------------------------------+

    $visible_user_list = array();
  	foreach ($page['filtered_users'] as $num => $local_user)
  	{
      $visible_user_list[] = $local_user;
    }

    foreach ($visible_user_list as $local_user)
    {
        if (!empty($local_user))
        {
          $query = '
SELECT DISTINCT id, PP_pwdreset
  FROM '.USERS_TABLE.'
  WHERE id IN ('.$local_user['id'].')
;';
          $result = pwg_query($query);

          while ($row = pwg_db_fetch_assoc($result))
          {
            if ($row['PP_pwdreset'] == 'false')
            {
              $pwdreset = l10n('PP_PwdReset_Done');
            }
            else if ($row['PP_pwdreset'] == 'true')
            {
              $pwdreset = l10n('PP_PwdReset_Todo');
            }
            else $pwdreset = l10n('PP_PwdReset_NA');
          }


          $query = '
SELECT DISTINCT id, PP_lock
  FROM '.USERS_TABLE.'
  WHERE id IN ('.$local_user['id'].')
;';
          $result = pwg_query($query);

          while ($row = pwg_db_fetch_assoc($result))
          {
            if ($row['PP_lock'] == 'false')
            {
              $LockedUser = '<img src="'.PP_PATH.'admin/template/icons/nolock.png" title="'.l10n('PP_User Not Locked').'" alt="'.l10n('PP_User Not Locked').'"/><div style="display: none">'.l10n('PP_User Not Locked').'</div>';
            }
            else if ($row['PP_lock'] == 'true')
            {
              $LockedUser = '<img src="'.PP_PATH.'admin/template/icons/lock.png" title="'.l10n('PP_User Locked').'" alt="'.l10n('PP_User Locked').'"/><div style="display: none">'.l10n('PP_User Locked').'</div>';
            }
            else $LockedUser = '<img src="'.PP_PATH.'admin/template/icons/nolock.png" title="'.l10n('PP_User Not Locked').'" alt="'.l10n('PP_User Not Locked').'"/><div style="display: none">'.l10n('PP_User Not Locked').'</div>';
          }
        }

        // Template initialization
        // -----------------------
        $template->append(
          'users',
            array(
              'ID'            => $local_user['id'],
              'USERNAME'      => stripslashes($local_user['username'])
                                .($local_user['id'] == $conf['guest_id']
                                ? '<BR>['.l10n('guest').']' : '')
                                .($local_user['id'] == $conf['default_user_id']
                                ? '<BR>['.l10n('default values').']' : ''),
              'STATUS'        => l10n('user_status_'.$local_user['status']),
              'EMAIL'         => $local_user['email'],
              'PWD_LOCKED'    => $LockedUser,
              'PWDRESET'      => $pwdreset,
            )
        );
    }


    // Set extra template variables
    // ----------------------------
    $Conf_Pwreset = false;
    $Conf_Logfailblock = false;

    if (isset($conf_PP['PWDRESET']) and $conf_PP['PWDRESET']=='true')
    {
      $Conf_Pwreset = true;
    }

    if (isset($conf_PP['LOGFAILBLOCK']) and $conf_PP['LOGFAILBLOCK']=='true')
    {
      $Conf_Logfailblock = true;
    }

// ----------------- Debugging code -----------------
//$converted_res1 = ($Conf_Pwreset) ? 'true' : 'false';
//$converted_res2 = ($Conf_Logfailblock) ? 'true' : 'false';
//PPLog($conf_PP['PWDRESET'],$converted_res1,$conf_PP['LOGFAILBLOCK'],$converted_res2);

    // Template initialization - Extra variables
  	// -----------------------------------------
  	$template->assign(
  	   array(
        'PP_VERSION'    => $version,
      	'PP_PATH'       => PP_PATH,
        'PP_THEME'      => $PP_theme,
        'PWRESET'       => $Conf_Pwreset,
        'LOGFAILBLOCK'  => $Conf_Logfailblock,
      )
    );

// +-----------------------------------------------------------------------+
// |                             errors display                            |
// +-----------------------------------------------------------------------+
    if (isset($errors) and count($errors) != 0)
    {
      $template->assign('errors',array());
      foreach ($errors as $error)
      {
        array_push($page['errors'], $error);
      }
    }  

// +-----------------------------------------------------------------------+
// |                           templates display                           |
// +-----------------------------------------------------------------------+
    $template->set_filename('plugin_admin_content', dirname(__FILE__) . '/template/PP_userlist.tpl');
    $template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_admin_content');		
  }
	else
	{
    array_push($page['errors'], l10n('PP_Err_Userlist_Settings'));
  }

  break;
}
?>
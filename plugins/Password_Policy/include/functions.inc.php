<?php

load_language('plugin.lang', PP_PATH);

/**
 * Triggered on get_admin_plugin_menu_links
 * 
 * Plugin's administration menu 
 */
function PP_admin_menu($menu)
{
// +-----------------------------------------------------------------------+
// |                      Getting plugin name                              |
// +-----------------------------------------------------------------------+
  $plugin =  PPInfos(PP_PATH);
  $name = $plugin['name'];
  
  array_push($menu,
    array(
    		'NAME' => $name,
    		'URL' => get_root_url().'admin.php?page=plugin-'.basename(PP_PATH)
    )
  );

  return $menu;
}


/**
 * Triggered on loc_begin_index
 * 
 * Perform user logout after registration if account locked and redirection to profile page is password renewal is set
 */
function PP_Init()
{
  global $conf, $user;

  include_once(PHPWG_ROOT_PATH.'admin/include/functions.php');

  $conf_PP = unserialize($conf['PasswordPolicy']);

  // Perfoming redirection for locked accounts
  // -----------------------------------------
  if (!is_a_guest() and $user['username'] != "16" and $user['username'] != "18")
  {
    // Perform user logout if user account is locked
    if (
          (isset($conf_PP['LOGFAILBLOCK']) and $conf_PP['LOGFAILBLOCK'] == 'true')
          and PP_UsrBlock_Verif($user['username'])
          //and (isset($userlocked) and $userlocked == 'true')
          and !is_admin()
          and !is_webmaster())
    {
      invalidate_user_cache();
      logout_user();
      if ($conf['guest_access'])
      {
        redirect(make_index_url().'?PP_msg=locked', 0);
      }
      else
      {
        redirect(get_root_url().'identification.php?PP_msg=locked' , 0);
      }
    }
  }

  // Performing redirection to profile page for password reset
  // ---------------------------------------------------------
  if ((isset($conf_PP['PWDRESET']) and $conf_PP['PWDRESET'] == 'true'))
  {
    $query ='
SELECT user_id, status
FROM '.USER_INFOS_TABLE.'
WHERE user_id = '.$user['id'].'
;';
    $data = pwg_db_fetch_assoc(pwg_query($query));

    if ($data['status'] <> "webmaster" and $data['status'] <> "generic") // Exclusion of specific accounts
    {
      if (PP_check_pwdreset($user['id']))
      {
        redirect(PHPWG_ROOT_PATH.'profile.php');
      }
    }
  }


}


/**
 * Triggered on init
 * 
 * Displays messages on index page
 */
function PP_InitPage()
{
  global $conf, $template, $page, $lang, $errors;

  load_language('plugin.lang', PP_PATH);

  if( isset($_GET['PP_msg']))
  {
    PP_DisplayMsg();
  }
}


/**
 * Triggered on init
 * 
 * Display a message according to $_GET['PP_msg']
 */
function PP_DisplayMsg()
{
  if (isset($_GET['PP_msg']))
  {
    global $user, $lang, $conf, $page;
    $conf_PP = unserialize($conf['PasswordPolicy']);

    // User account locked after x failed attempts
    if (isset($conf_PP['USRLOCKEDTXT']) and !empty($conf_PP['USRLOCKEDTXT']) and $_GET['PP_msg']=="locked")
    {
      if (function_exists('get_user_language_desc'))// Extended Description [lang] feature
      {
        $custom_text = get_user_language_desc($conf_PP['USRLOCKEDTXT']);
      }
      else $custom_text = l10n($conf_PP['USRLOCKEDTXT']);

      $page["errors"][]=$custom_text;
    }
  }
}


/**
 * Triggered on login_failure in main.inc.php
 * Count of login failures and lock account after x attempt
 *
 */
function PP_log_fail($username)
{
  global $conf, $user;

  include_once(PHPWG_ROOT_PATH.'admin/include/functions.php');

  $conf_PP = unserialize($conf['PasswordPolicy']);

  if ((isset($conf_PP['NBLOGFAIL']) and $conf_PP['NBLOGFAIL'] <> 0)
    and (isset($conf_PP['LOGFAILBLOCK']) and $conf_PP['LOGFAILBLOCK'] == 'true')
    )
  {
    $query ='
SELECT ui.status
FROM '.USER_INFOS_TABLE.' AS ui
  LEFT JOIN '.USERS_TABLE.' AS u
    ON u.id = ui.user_id 
WHERE(u.username = "'.stripslashes($username).'")
;';
    $exclude = pwg_db_fetch_assoc(pwg_query($query));

    // Exclude specific accounts
    if ($exclude['status'] <> "webmaster" and $exclude['status'] <> "admin" and $exclude['status'] <> "generic")
    {
      // If login failure then increments loginfailcount value in database
      $query = '
UPDATE '.USERS_TABLE.'
SET PP_loginfailcount = PP_loginfailcount+1
WHERE username = "'.stripslashes($username).'"
LIMIT 1
;';
      pwg_query($query);

      $query = '
SELECT PP_loginfailcount
FROM '.USERS_TABLE.'
WHERE username = "'.stripslashes($username).'"
;';

      $datas = pwg_db_fetch_assoc(pwg_query($query));

      // If number of failed logon exceeds $conf_PP['NBLOGFAIL'], set the account as locked
      if (isset($datas['PP_loginfailcount']) and $datas['PP_loginfailcount'] >= $conf_PP['NBLOGFAIL'])
      {
        $query = '
UPDATE '.USERS_TABLE.'
SET PP_lock = "true"
WHERE username = "'.stripslashes($username).'"
LIMIT 1
;';
        pwg_query($query);
      }
    }
  }
}


/**
 * PP_user_list_pwdreset
 * Adds a new feature in user_list to allow password reset for selected users by admin
 * 
 */
function PP_user_list_pwdreset($visible_user_list)
{
  global $template;
  
  load_language('plugin.lang', PP_PATH);

  $user_ids = array();

  foreach ($visible_user_list as $i => $user)
  {
    $user_ids[$i] = $user['id'];
  }

  $user_nums = array_flip($user_ids);

  // Query to get information in database
  // ------------------------------------
  if (!empty($user_ids))
  {
    $query = '
SELECT DISTINCT id, PP_pwdreset
  FROM '.USERS_TABLE.'
  WHERE id IN ('.implode(',', $user_ids).')
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

		  $visible_user_list[$user_nums[$row['id']]]['plugin_columns'][] = $pwdreset; // Shows users password state in user_list
    }
  }
  return $visible_user_list;
}


/**
 * PP_user_list_locked
 * Adds a new feature in user_list to allow user unlocking by admin
 * 
 */
function PP_user_list_locked($visible_user_list)
{
  global $template;
  
  load_language('plugin.lang', PP_PATH);

  $template->append('plugin_user_list_column_titles', l10n('PP_LockedUsers'));

  $user_ids = array();

  foreach ($visible_user_list as $i => $user)
  {
    $user_ids[$i] = $user['id'];
  }

  $user_nums = array_flip($user_ids);

  // Query to get information in database
  // ------------------------------------
  if (!empty($user_ids))
  {
    $query = '
SELECT DISTINCT id, PP_lock
  FROM '.USERS_TABLE.'
  WHERE id IN ('.implode(',', $user_ids).')
;';
    $result = pwg_query($query);

    while ($row = pwg_db_fetch_assoc($result))
    {
      if ($row['PP_lock'] == 'false')
      {
        $LockedUser = '<img src="'.PP_PATH.'admin/template/icons/nolock.png" title="'.l10n('PP_User Not Locked').'" alt="'.l10n('PP_User Not Locked').'"/>';
      }
      else if ($row['PP_lock'] == 'true')
      {
        $LockedUser = '<img src="'.PP_PATH.'admin/template/icons/lock.png" title="'.l10n('PP_User Locked').'" alt="'.l10n('PP_User Locked').'"/>';
      }
      else $LockedUser = '<img src="'.PP_PATH.'admin/template/icons/nolock.png" title="'.l10n('PP_User Not Locked').'" alt="'.l10n('PP_User Not Locked').'"/>';

		  $visible_user_list[$user_nums[$row['id']]]['plugin_columns'][] = $LockedUser; // Shows users account state in user_list
    }
  }
  return $visible_user_list;
}


/**
 * Triggered on register_user_check
 * 
 * Additional controls on user registration check
 */
function PP_RegistrationCheck($errors, $user)
{
  global $conf;

  // Exclusion of Adult_Content users
  // --------------------------------
  if ($user['username'] != "16" and $user['username'] != "18")
  {
    load_language('plugin.lang', PP_PATH);

    $PasswordCheck = 0;

    $conf_PP = unserialize($conf['PasswordPolicy']);

    // Password enforcement control
    // ----------------------------
    if (isset($conf_PP['PASSWORDENF']) and $conf_PP['PASSWORDENF'] == 'true' and !empty($conf_PP['PASSWORD_SCORE']))
    {
      if (!empty($user['password']) and !is_admin())
      {
        $PasswordCheck = PP_testpassword($user['password']);

        if ($PasswordCheck < $conf_PP['PASSWORD_SCORE'])
        {
          $message = get_l10n_args('PP_Error_Password_Need_Enforcement_%s', $PasswordCheck);
          $lang['reg_err_pass'] = l10n_args($message).$conf_PP['PASSWORD_SCORE'];
          array_push($errors, $lang['reg_err_pass']);
        }
      }
      else if (!empty($user['password']) and is_admin() and isset($conf_PP['ADMINPASSWENF']) and $conf_PP['ADMINPASSWENF'] == 'true')
      {
        $PasswordCheck = PP_testpassword($user['password']);

        if ($PasswordCheck < $conf_PP['PASSWORD_SCORE'])
        {
          $message = get_l10n_args('PP_Error_Password_Need_Enforcement_%s', $PasswordCheck);
          $lang['reg_err_pass'] = l10n_args($message).$conf_PP['PASSWORD_SCORE'];
          array_push($errors, $lang['reg_err_pass']);
        }
      }
    }
    return $errors;
  }
}


/**
 * Triggered on loc_begin_profile
 */
function PP_Profile_Init()
{
  global $conf, $user, $template;
  
  load_language('plugin.lang', PP_PATH);

  $conf_PP = unserialize($conf['PasswordPolicy']);

  // Special message display for password reset
  // ------------------------------------------
  if ((isset($conf_PP['PWDRESET']) and $conf_PP['PWDRESET'] == 'true'))
  {
    if (PP_check_pwdreset($user['id']))
    {
      $template->append('errors', l10n('PP_Password_Reset_Msg'));
    }
  }

  // Controls on profile page submission
  // -----------------------------------
  if (isset($_POST['validate']) and !is_admin())
  {
    // Password reset control
    // ----------------------
    if (isset($conf_PP['PWDRESET']) and $conf_PP['PWDRESET'] == 'true' and PP_check_pwdreset($user['id']))
    {
      // if password not changed then pwdreset field = true else pwdreset field = false
      // ------------------------------------------------------------------------------
      if (!empty($_POST['use_new_pwd']))
      {
        $query = '
UPDATE '.USERS_TABLE.'
SET PP_pwdreset = "false"
WHERE id = '.$user['id'].'
LIMIT 1
;';
        pwg_query($query);
      }
    }

    if (!empty($_POST['use_new_pwd']))
    {
      // Password enforcement control
      // ----------------------------
      if (isset($conf_PP['PASSWORDENF']) and $conf_PP['PASSWORDENF'] == 'true' and !empty($conf_PP['PASSWORD_SCORE']))
      {
        $PasswordCheck = PP_testpassword($_POST['use_new_pwd']);

        if ($PasswordCheck < $conf_PP['PASSWORD_SCORE'])
        {
          $message = get_l10n_args('PP_Error_Password_Need_Enforcement_%s', $PasswordCheck);
          $template->append('errors', l10n_args($message).$conf_PP['PASSWORD_SCORE']);
          unset($_POST['use_new_pwd']);
          unset($_POST['validate']);
        }
      }
    }
  }
}


/**
 * PP_Set_PwdReset
 * Action in user_list to set a password reset for a user
 */
function PP_Set_PwdReset($uid)
{
  $query ='
UPDATE '.USERS_TABLE.'
SET PP_pwdreset = "true"
WHERE id = '.$uid.'
LIMIT 1
;';

  pwg_query($query);
}


/**
 * PP_check_pwdreset
 * checks if a user id is registered as having already
 * changed his password.
 * 
 * @uid        : the user id
 * 
 * @returns    : true or false whether the users has already changed his password
 * 
 */
function PP_check_pwdreset($uid)
{
  $query = '
SELECT PP_pwdreset
FROM '.USERS_TABLE.'
WHERE id='.$uid.'
;';

  $result = pwg_db_fetch_assoc(pwg_query($query));

  if($result['PP_pwdreset'] == 'true')
  {
    return true;
  }
  else return false; 
}


/**
 * Returns a password's score for password complexity check
 *
 * @param : password filled by user
 * 
 * @return : Score calculation
 * 
 * Thanx to MathieuGut from http://m-gut.developpez.com
 */
function PP_testpassword($password) // $password given by user
{

  // Variables initiation
  // --------------------
  $points = 0;
  $point_lowercase = 0;
  $point_uppercase = 0;
  $point_numbers = 0;
  $point_characters = 0;

  // Getting password lengh
  // ----------------------
  $length = strlen($password);

  // Loop to read password characters
  for($i = 0; $i < $length; $i++)
  {
    // Select each letters
    // $i is 0 at first turn
    // ---------------------
    $letters = $password[$i];

    if ($letters>='a' && $letters<='z')
    {
      // Adding 1 point to score for a lowercase
      // ---------------------------------------
		  		$points = $points + 1;

      // Adding bonus points for lowercase
      // ---------------------------------
		  $point_lowercase = 1;
    }
    else if ($letters>='A' && $letters <='Z')
    {
      // Adding 2 points to score for uppercase
      // --------------------------------------
      $points = $points + 2;

      // Adding bonus points for uppercase
      // ---------------------------------
      $point_uppercase = 2;
    }
    else if ($letters>='0' && $letters<='9')
    {
      // Adding 3 points to score for numbers
      // ------------------------------------
      $points = $points + 3;

      // Adding bonus points for numbers
      // -------------------------------
      $point_numbers = 3;
    }
    else
    {
      // Adding 5 points to score for special characters
      // -----------------------------------------------
      $points = $points + 5;
		
      // Adding bonus points for special characters
      // ------------------------------------------
      $point_characters = 5;
    }
  }

  // Calculating the coefficient points/length
  // -----------------------------------------
  $step1 = $points / $length;

  // Calculation of the diversity of character types...
  // --------------------------------------------------
  $step2 = $point_lowercase + $point_uppercase + $point_numbers + $point_characters;

  // Multiplying the coefficient of diversity with that of the length
  // ----------------------------------------------------------------
  $score = $step1 * $step2;

  // Multiplying the result by the length of the string
  // --------------------------------------------------
  $finalscore = $score * $length;

  return $finalscore;
}


/**
 * PP_UsrBlock_Verif
 * Check if the user's account is locked
 * 
 * @returns : True if account is locked else False
 */
function PP_UsrBlock_Verif($username)
{
  global $conf;

  $query = '
SELECT PP_Lock
FROM '.USERS_TABLE.'
WHERE username = "'.stripslashes($username).'"
;';

  $result = pwg_db_fetch_assoc(pwg_query($query));

  if($result['PP_Lock'] == 'true')
  {
    return true;
  }
  else return false;
}


/**
 * PP_unlock_user
 * Action in user_list to unlock a user
 */
function PP_unlock_user($uid)
{
  // Reset PP_loginfailcount value to 0
  $query ='
UPDATE '.USERS_TABLE.'
SET PP_loginfailcount = 0
WHERE id = '.$uid.'
LIMIT 1
;';

  pwg_query($query);
  
  // Set account as unlocked
  $query ='
UPDATE '.USERS_TABLE.'
SET PP_lock = "false"
WHERE id = '.$uid.'
LIMIT 1
;';

  pwg_query($query);
}


/**
 * Function called from PP_admin.php - Get all users to display the number of days since their last visit
 * 
 * @return : List of users
 * 
 */
function pp_get_user_list()
{
  global $conf, $page;

  $users = array();

  // Search users with exclusion of Adult_Content generic users and guest user
  // -------------------------------------------------------------------------
  $query = '
SELECT DISTINCT u.'.$conf['user_fields']['id'].' AS id,
                u.'.$conf['user_fields']['username'].' AS username,
                u.'.$conf['user_fields']['email'].' AS email,
                ui.status
FROM '.USERS_TABLE.' AS u
  INNER JOIN '.USER_INFOS_TABLE.' AS ui
    ON u.'.$conf['user_fields']['id'].' = ui.user_id
WHERE u.username NOT LIKE "16"
  AND u.username NOT LIKE "18"
;';

  $result = pwg_query($query);
      
  while ($row = pwg_db_fetch_assoc($result))
  {
    $user = $row;
    array_push($users, $user);
  }

  $user_ids = array();
  foreach ($users as $i => $user)
  {
    $user_ids[$i] = $user['id'];
  }

  return $users;
}


/**
 * Function called from PP_admin.php to get the plugin version and name
 *
 * @param : plugin directory
 * 
 * @return : plugin's version and name
 * 
 */
function PPInfos($dir)
{
  $path = $dir;

  $plg_data = implode( '', file($path.'main.inc.php') );
  if ( preg_match("|Plugin Name: (.*)|", $plg_data, $val) )
  {
    $plugin['name'] = trim( $val[1] );
  }
  if (preg_match("|Version: (.*)|", $plg_data, $val))
  {
    $plugin['version'] = trim($val[1]);
  }
  if ( preg_match("|Plugin URI: (.*)|", $plg_data, $val) )
  {
    $plugin['uri'] = trim($val[1]);
  }
  if ($desc = load_language('description.txt', $path.'/', array('return' => true)))
  {
    $plugin['description'] = trim($desc);
  }
  elseif ( preg_match("|Description: (.*)|", $plg_data, $val) )
  {
    $plugin['description'] = trim($val[1]);
  }
  if ( preg_match("|Author: (.*)|", $plg_data, $val) )
  {
    $plugin['author'] = trim($val[1]);
  }
  if ( preg_match("|Author URI: (.*)|", $plg_data, $val) )
  {
    $plugin['author uri'] = trim($val[1]);
  }
  if (!empty($plugin['uri']) and strpos($plugin['uri'] , 'extension_view.php?eid='))
  {
    list( , $extension) = explode('extension_view.php?eid=', $plugin['uri']);
    if (is_numeric($extension)) $plugin['extension'] = $extension;
  }
// IMPORTANT SECURITY !
// --------------------
  $plugin = array_map('htmlspecialchars', $plugin);

  return $plugin ;
}


/**
 * Useful for debugging - 4 vars can be set
 * Output result to log.txt file
 *
 */
function PPLog($var1, $var2, $var3, $var4)
{
   $fo=fopen (PP_PATH.'log.txt','a') ;
   fwrite($fo,"======================\n") ;
   fwrite($fo,'le ' . date('D, d M Y H:i:s') . "\r\n");
   fwrite($fo,$var1 ."\r\n") ;
   fwrite($fo,$var2 ."\r\n") ;
   fwrite($fo,$var3 ."\r\n") ;
   fwrite($fo,$var4 ."\r\n") ;
   fclose($fo) ;
}
?>
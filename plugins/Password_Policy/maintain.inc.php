<?php

if(!defined('PP_PATH'))
{
  define('PP_PATH' , PHPWG_PLUGINS_PATH.basename(dirname(__FILE__)).'/');
}

include_once (PP_PATH.'include/functions.inc.php');

load_language('plugin.lang', PP_PATH);


function plugin_install($id, $version, &$errors)
{
	global $conf;

  // Set current plugin version in config table
  // ------------------------------------------
  $plugin =  PPInfos(PP_PATH);
  $version = $plugin['version'];

/* ****************************************************************** */
/* **************** BEGIN - Data preparation in vars **************** */
/* ****************************************************************** */

  // Default global parameters for PasswordPolicy conf
  // -------------------------------------------------
  $defaultPP = array(
    'PPVersion'                   => $version, // PasswordPolicy History version
    'PASSWORDENF'                 => 'false',
    'PASSWORD_SCORE'              => '100',
    'ADMINPASSWENF'               => 'false',
    'PWDRESET'                    => 'false',
    'LOGFAILBLOCK'                => 'false',
    'NBLOGFAIL'                   => '0',
    'USRLOCKEDTXT'                => l10n('PP_User_Account_Locked_Txt')
  );

/* **************************************************************** */
/* **************** END - Data preparation in vars **************** */
/* **************************************************************** */


/* ***************************************************************************** */
/* **************** BEGIN - Database actions and initialization **************** */
/* ***************************************************************************** */

  // Create PasswordPolicy conf if not already exists
  // ------------------------------------------------
	$query = '
SELECT param
  FROM '.CONFIG_TABLE.'
WHERE param = "PasswordPolicy"
;';
  $count = pwg_db_num_rows(pwg_query($query));
  
  if ($count == 0)
  {
    $q = '
INSERT INTO '.CONFIG_TABLE.' (param, value, comment)
VALUES ("PasswordPolicy","'.pwg_db_real_escape_string(serialize($defaultPP)).'","Password Policy parameters")
  ;';
    pwg_query($q);
  }

  // Piwigo's native tables modifications for password reset function - Add pwdreset column if not already exists
  // ------------------------------------------------------------------------------------------------------------
  $query = '
SHOW COLUMNS FROM '.USERS_TABLE.'
LIKE "PP_pwdreset"
;';
  
  $result = pwg_query($query);

  if(!pwg_db_fetch_row($result))
  {
    $q = '
ALTER TABLE '.USERS_TABLE.'
ADD PP_pwdreset enum("true","false") 
;';
    pwg_query($q);
  }

  // Piwigo's native tables modifications for failed login attempts count
  // --------------------------------------------------------------------
  $query = '
SHOW COLUMNS FROM '.USERS_TABLE.'
LIKE "PP_loginfailcount"
;';
  
  $result = pwg_query($query);

  if(!pwg_db_fetch_row($result))
  {
    $q = '
ALTER TABLE '.USERS_TABLE.'
ADD PP_loginfailcount INT NOT NULL DEFAULT "0"
;';
    pwg_query($q);
  }

  // Piwigo's native tables modifications for locked accounts
  // --------------------------------------------------------
  $query = '
SHOW COLUMNS FROM '.USERS_TABLE.'
LIKE "PP_lock"
;';
  
  $result = pwg_query($query);

  if(!pwg_db_fetch_row($result))
  {
    $q = '
ALTER TABLE '.USERS_TABLE.'
ADD PP_lock enum("true","false")
;';
    pwg_query($q);
  }
/* *************************************************************************** */
/* **************** END - Database actions and initialization **************** */
/* *************************************************************************** */
}


function plugin_uninstall($id, $version, &$errors)
{
  global $conf;

  if (isset($conf['PasswordPolicy']))
  {
    $q = '
DELETE FROM '.CONFIG_TABLE.'
WHERE param="PasswordPolicy"
;';

    pwg_query($q);
  }

  $q = '
ALTER TABLE '.USERS_TABLE.'
DROP PP_pwdreset 
;';
  pwg_query($q);

  $q = '
ALTER TABLE '.USERS_TABLE.'
DROP PP_loginfailcount 
;';
  pwg_query($q);

  $q = '
ALTER TABLE '.USERS_TABLE.'
DROP PP_lock 
;';
  pwg_query($q);
}
?>
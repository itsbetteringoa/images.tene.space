<?php
/*
Plugin Name: Easy Captcha
Version: 1.2.0
Description: A fun antibot system for comments, registration, ContactForm and GuestBook.
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=711
Author: Mistic
Author URI: http://www.strangeplanet.fr
*/

defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

// TODO : captcha on mobile
if (mobile_theme())
{
  return;
}

define('EASYCAPTCHA_ID',      basename(dirname(__FILE__)));
define('EASYCAPTCHA_PATH' ,   PHPWG_PLUGINS_PATH . EASYCAPTCHA_ID . '/');
define('EASYCAPTCHA_ADMIN',   get_root_url() . 'admin.php?page=plugin-' . EASYCAPTCHA_ID);


add_event_handler('init', 'easycaptcha_init');

if (defined('IN_ADMIN'))
{
  add_event_handler('get_admin_plugin_menu_links', 'easycaptcha_plugin_admin_menu');
}
else
{
  add_event_handler('loc_end_section_init', 'easycaptcha_document_init', EVENT_HANDLER_PRIORITY_NEUTRAL+30);
  add_event_handler('loc_begin_register', 'easycaptcha_register_init', EVENT_HANDLER_PRIORITY_NEUTRAL+30);
}


// plugin init
function easycaptcha_init()
{
  global $conf;
  $conf['EasyCaptcha'] = safe_unserialize($conf['EasyCaptcha']);

  load_language('plugin.lang', EASYCAPTCHA_PATH);
}


// modules
function easycaptcha_document_init()
{
  global $conf, $pwg_loaded_plugins, $page;

  if (!is_a_guest() && $conf['EasyCaptcha']['guest_only'])
  {
    return;
  }

  if (script_basename() == 'picture' && $conf['EasyCaptcha']['activate_on']['picture'])
  {
    include(EASYCAPTCHA_PATH . 'include/picture.inc.php');
  }
  else if (isset($page['section']))
  {
    if (
      script_basename() == 'index' &&
      $page['section'] == 'categories' && isset($page['category']) &&
      isset($pwg_loaded_plugins['Comments_on_Albums']) &&
      $conf['EasyCaptcha']['activate_on']['category']
      )
    {
      include(EASYCAPTCHA_PATH . 'include/category.inc.php');
    }
    else if ($page['section'] == 'contact' && $conf['EasyCaptcha']['activate_on']['contactform'])
    {
      include(EASYCAPTCHA_PATH . 'include/contactform.inc.php');
    }
    else if ($page['section'] == 'guestbook' && $conf['EasyCaptcha']['activate_on']['guestbook'])
    {
      include(EASYCAPTCHA_PATH . 'include/guestbook.inc.php');
    }
  }
}
function easycaptcha_register_init()
{
  global $conf;

  if ($conf['EasyCaptcha']['activate_on']['register'])
  {
    include(EASYCAPTCHA_PATH . 'include/register.inc.php');
  }
}


// admin
function easycaptcha_plugin_admin_menu($menu)
{
  $menu[] = array(
    'NAME' => 'Easy Captcha',
    'URL' => EASYCAPTCHA_ADMIN,
    );
  return $menu;
}
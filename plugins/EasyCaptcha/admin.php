<?php
defined('EASYCAPTCHA_ID') or die('Hacking attempt!');

global $pwg_loaded_plugins;
$loaded = array(
  'contactform' => isset($pwg_loaded_plugins['ContactForm']),
  'category' => isset($pwg_loaded_plugins['Comments_on_Albums']),
  'guestbook' => isset($pwg_loaded_plugins['GuestBook']),
  'cryptocaptcha' => isset($pwg_loaded_plugins['CryptograPHP']),
  );

if ($loaded['cryptocaptcha'])
{
  $page['warnings'][] = l10n('We detected that Crypto Captcha plugin is available on your gallery. Both plugins can be used at the same time, but you should not under any circumstances activate both of them on the same page.');
}

if (isset($_POST['submit']))
{
  if (!isset($_POST['activate_on'])) $_POST['activate_on'] = array();

  $conf['EasyCaptcha'] = array(
    'activate_on' => array(
      'picture'     => in_array('picture', $_POST['activate_on']),
      'category'    => in_array('category', $_POST['activate_on']) || !$loaded['category'],
      'register'    => in_array('register', $_POST['activate_on']),
      'contactform' => in_array('contactform', $_POST['activate_on']) || !$loaded['contactform'],
      'guestbook'   => in_array('guestbook', $_POST['activate_on']) || !$loaded['guestbook'],
      ),
    'comments_action' => $_POST['comments_action'],
    'guest_only' => isset($_POST['guest_only']),
    'challenge' => $_POST['challenge'],
    'drag' => array(
      'theme' => $_POST['drag']['theme'],
      'size'  => (int)$_POST['drag']['size'],
      'nb'    => (int)$_POST['drag']['nb'],
      'bg1'   => check_color($_POST['drag']['bg1']),
      'bg2'   => check_color($_POST['drag']['bg2']),
      'obj'   => check_color($_POST['drag']['obj']),
      'sel'   => check_color($_POST['drag']['sel']),
      'bd1'   => check_color($_POST['drag']['bd1']),
      'bd2'   => check_color($_POST['drag']['bd2']),
      'txt'   => check_color($_POST['drag']['txt']),
      ),
    'tictac' => array(
      'size'  => (int)$_POST['tictac']['size'],
      'bg1'   => check_color($_POST['tictac']['bg1']),
      'bg2'   => check_color($_POST['tictac']['bg2']),
      'bd'    => check_color($_POST['tictac']['bd']),
      'obj'   => check_color($_POST['tictac']['obj']),
      'sel'   => check_color($_POST['tictac']['sel']),
      ),
    'lastmod' => time(),
    );

  conf_update_param('EasyCaptcha', $conf['EasyCaptcha']);
  $page['infos'][] = l10n('Information data registered in database');
}

function list_themes($dir)
{
  $dir = rtrim($dir, '/');
  $dh = opendir($dir);
  $themes = array();

  while (($item = readdir($dh)) !== false )
  {
    if ($item!=='.' && $item!=='..' &&
        is_dir($dir.'/'.$item) && file_exists($dir.'/'.$item.'/conf.inc.php')
      )
    {
      $drag_images = include($dir.'/'.$item.'/conf.inc.php');
      $themes[$item] = array(
        'image' => key($drag_images),
        'count' => count($drag_images),
        );
    }
  }

  closedir($dh);
  return $themes;
}

$template->assign(array(
  'easycaptcha' => $conf['EasyCaptcha'],
  'loaded' => $loaded,
  'THEMES' => list_themes(EASYCAPTCHA_PATH . 'drag'),
  'EASYCAPTCHA_PATH' => EASYCAPTCHA_PATH,
  'EASYCAPTCHA_ABS_PATH' => realpath(EASYCAPTCHA_PATH) . '/',
  'DRAG_CSS' => file_get_contents(EASYCAPTCHA_PATH . 'template/drag.css'),
  ));

$template->set_filename('plugin_admin_content', realpath(EASYCAPTCHA_PATH . 'template/admin.tpl'));
$template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_admin_content');


function check_color($hex)
{
  global $page;

  $hex = ltrim($hex, '#');

  if (strlen($hex) == 3)
  {
    $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
  }
  else if (strlen($hex) != 6 || !ctype_xdigit($hex))
  {
    $page['errors'][] = l10n('Invalid color code <i>%s</i>', '#'.$hex);
    $hex = '000000';
  }

  return '#'.$hex;
}
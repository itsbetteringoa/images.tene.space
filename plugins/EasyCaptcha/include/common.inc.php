<?php
defined('EASYCAPTCHA_ID') or die('Hacking attempt!');

include_once(EASYCAPTCHA_PATH . 'drag/functions_drag.inc.php');

global $template;

// choose random challenge
if ($conf['EasyCaptcha']['challenge'] == 'random')
{
  $challenges = array('tictac', 'drag');
  $conf['EasyCaptcha']['challenge'] = $challenges[ rand(0,1) ];
}

// Drag & drop
if ($conf['EasyCaptcha']['challenge'] == 'drag')
{
  load_language($conf['EasyCaptcha']['drag']['theme'].'.lang', EASYCAPTCHA_PATH);

  $drag_images = include(EASYCAPTCHA_PATH.'drag/'.$conf['EasyCaptcha']['drag']['theme'].'/conf.inc.php');
  $conf['EasyCaptcha']['drag']['nb'] = min($conf['EasyCaptcha']['drag']['nb'], count($drag_images));

  foreach (array_rand($drag_images, $conf['EasyCaptcha']['drag']['nb']) as $row)
  {
    $conf['EasyCaptcha']['drag']['selection'][ $row ] = easycaptcha_encode_image_url($row);
  }

  $conf['EasyCaptcha']['drag']['selected'] = array_rand($conf['EasyCaptcha']['drag']['selection']);
  $conf['EasyCaptcha']['drag']['text'] = l10n($drag_images[ $conf['EasyCaptcha']['drag']['selected'] ]);
  $conf['EasyCaptcha']['key'] = $conf['EasyCaptcha']['challenge'] .'-'. pwg_password_hash($conf['secret_key'] . $conf['EasyCaptcha']['drag']['selected']);
}
// Tic-tac-toe
else if ($conf['EasyCaptcha']['challenge'] == 'tictac')
{
  $conf['EasyCaptcha']['key'] = $conf['EasyCaptcha']['challenge'] .'-0';
}
else
{
  return;
}

load_language('plugin.lang', EASYCAPTCHA_PATH);

$template->assign(array(
  'EASYCAPTCHA' => $conf['EasyCaptcha'],
  'EASYCAPTCHA_PATH' => EASYCAPTCHA_PATH,
  'EASYCAPTCHA_ABS_PATH' => realpath(EASYCAPTCHA_PATH).'/',
  ));

$template->set_filename('EasyCaptcha', realpath(EASYCAPTCHA_PATH.'template/'.$conf['EasyCaptcha']['template'].'.tpl'));
$template->append('EASYCAPTCHA', array('parsed_content' => $template->parse('EasyCaptcha', true)), true);


function easycaptcha_check()
{
  global $conf;

  if (empty($_POST['easycaptcha_key']) || empty($_POST['easycaptcha']))
  {
    return false;
  }

  list($challenge, $key) = explode('-', $_POST['easycaptcha_key']);

  if ($challenge == 'drag')
  {
    $check = easycaptcha_decode_image_url($_POST['easycaptcha']);
    return pwg_password_verify($conf['secret_key'] . $check, $key);
  }
  else if ($challenge == 'tictac')
  {
    return $_POST['easycaptcha'] == pwg_get_session_var('easycaptcha', '33');
  }
  else
  {
    return false;
  }
}
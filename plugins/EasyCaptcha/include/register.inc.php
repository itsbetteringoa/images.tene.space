<?php
defined('EASYCAPTCHA_ID') or die('Hacking attempt!');

$conf['EasyCaptcha']['template'] = 'register';
include(EASYCAPTCHA_PATH.'include/common.inc.php');

add_event_handler('loc_end_page_header', 'add_easycaptcha');
add_event_handler('register_user_check', 'check_easycaptcha');

function add_easycaptcha()
{
  global $template;
  $template->set_prefilter('register', 'prefilter_easycaptcha');
}

function prefilter_easycaptcha($content, $smarty)
{
  $search = '<input type="checkbox" name="send_password_by_mail" id="send_password_by_mail" value="1" checked="checked">';
  return str_replace($search, $search."\n{\$EASYCAPTCHA.parsed_content}", $content);
}

function check_easycaptcha($errors)
{
  if (!easycaptcha_check())
  {
    $errors[] = l10n('Invalid answer');
  }

  return $errors;
}
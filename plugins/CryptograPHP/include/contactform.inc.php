<?php
defined('CRYPTO_ID') or die('Hacking attempt!');

$conf['cryptographp']['template'] = 'contactform';
include(CRYPTO_PATH.'include/common.inc.php');

add_event_handler('contact_form_check', 'check_crypto', EVENT_HANDLER_PRIORITY_NEUTRAL, 2);

function check_crypto($action, $comment)
{
  global $conf, $page;
  
  include_once(CRYPTO_PATH.'securimage/securimage.php');
  $securimage = new Securimage();

  if ($securimage->check($_POST['captcha_code']) == false)
  {
    $page['errors'][] = l10n('Invalid Captcha');
    return 'reject';
  }

  return $action;
}
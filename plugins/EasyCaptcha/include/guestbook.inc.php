<?php
defined('EASYCAPTCHA_ID') or die('Hacking attempt!');

$conf['EasyCaptcha']['template'] = 'guestbook';
include(EASYCAPTCHA_PATH.'include/common.inc.php');

add_event_handler('user_comment_check', 'check_easycaptcha', EVENT_HANDLER_PRIORITY_NEUTRAL, 2);

function check_easycaptcha($action, $comment)
{
  global $conf, $page;

  if (!easycaptcha_check())
  {
    $page['errors'][] = l10n('Invalid answer');
    return 'reject';
  }

  return $action;
}
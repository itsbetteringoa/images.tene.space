<?php
function akismet_user_comment_check($action, $comment, $where)
{
  global $conf;

	if (!isset($_SESSION['csi']))
		$_POST['cr'][] = 'csi';

  if ('reject'==$action or $conf['akismet_spam_action']==$action)
    return $action; // already rejecting
  if ( empty($conf['akismet_api_key']) )
    return $action; // need to config it
  /*if ( !is_a_guest() )
    return $action;*/

  include_once( dirname(__FILE__).'/akismet.class.php' );

  set_make_full_url();
  switch($where)
  {
    case 'guestbook':
      $url = defined('GUESTBOOK_URL') ? GUESTBOOK_URL : get_absolute_root_url();
      break;
    case 'album':
      // build category url with minimum data (only id is always known)
      $url = duplicate_index_url( array(
        'section'=>'categories',
        'category'=>array('id'=>$comment['category_id'], 'name'=>'', 'permalink'=>'')
        ) );
      break;
    default:
      $url = duplicate_picture_url( array('image_id'=>$comment['image_id']) );
  }
  unset_make_full_url();

  $aki_comm = array(
    'author' => $comment['author'],
    'body' => $comment['content'],
    'comment_author_url' => @$comment['website_url'],
    'comment_author_email' => $comment['email'],
    'permalink' => $url,
    'referrer' => isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '',
  );
  /*if (isset($_POST['url']) && strlen($_POST['url']))
    $aki_comm['comment_author_url'] = $_POST['url'];*/

  $akismet = new Akismet(get_absolute_root_url(), $conf['akismet_api_key'], $aki_comm);

  if( !$akismet->errorsExist() )
  {
    $counters = explode('/', $conf['akismet_counters']);
    if ( $akismet->isSpam() )
    {
      $action = $conf['akismet_spam_action'];
      if ('reject'==$action && !is_a_guest() && isset($_SESSION['csi']) && (!isset($_POST['url']) || strlen($_POST['url'])==0))
        $action='moderate';
      $counters[0]++;
      $_POST['cr'][] = 'aki';
			if ('reject'!=$action)
				set_status_header(403);
    }
    else
    {
      $_POST['cr'][] = 'aki-ok';
      if (!isset($_SESSION['csi']) /*&& isset($_POST['url']) && strlen($_POST['url']) */)
      {
        $action = $conf['akismet_spam_action'];
      }
    }
    $counters[1]++;
    $conf['akismet_counters'] = implode('/', $counters);
    $query = 'UPDATE '.CONFIG_TABLE.' SET value="'.$conf['akismet_counters'].'" WHERE param="akismet_counters" LIMIT 1';
    pwg_query($query);
  }
  else {
    $_POST['cr'][] = 'aki-FAIL';
    if (is_admin())
      var_export( $akismet->getErrors() );
  }

  return $action;
}

?>
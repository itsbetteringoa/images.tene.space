<?php
/* Code adapted from include/picture_comment.inc.php and picture.php */
defined('COA_ID') or die('Hacking attempt!');

global $template, $page, $conf, $pwg_loaded_plugins, $user;

// +-----------------------------------------------------------------------+
// |                            category infos                             |
// +-----------------------------------------------------------------------+
$category = $page['category'];

$url_self = duplicate_index_url(array(
  'category' => array(
    'id' => $category['id'],
    'name' => $category['name'],
    'permalink' => $category['permalink']
    ),
  array('start')
  ));


// +-----------------------------------------------------------------------+
// |                                actions                                |
// +-----------------------------------------------------------------------+
if (isset($_GET['action']))
{
  switch ($_GET['action'])
  {
    case 'edit_comment' :
    {
      include_once(COA_PATH.'include/functions_comment.inc.php');
      check_input_parameter('comment_to_edit', $_GET, false, PATTERN_ID);
      $author_id = get_comment_author_id_albums($_GET['comment_to_edit']);

      if (can_manage_comment('edit', $author_id))
      {
        if (!empty($_POST['content']))
        {
          check_pwg_token();
          $comment_action = update_user_comment_albums(
            array(
              'comment_id' => $_GET['comment_to_edit'],
              'category_id' => $category['id'],
              'content' => $_POST['content'],
              'website_url' => @$_POST['website_url'],
              ),
            $_POST['key']
            );

          $perform_redirect = false;
          switch ($comment_action)
          {
            case 'moderate':
              $_SESSION['page_infos'][] = l10n('An administrator must authorize your comment before it is visible.');
            case 'validate':
              $_SESSION['page_infos'][] = l10n('Your comment has been registered');
              $perform_redirect = true;
              break;
            case 'reject':
              $_SESSION['page_errors'][] = l10n('Your comment has NOT been registered because it did not pass the validation rules');
              $perform_redirect = true;
              break;
            default:
              trigger_error('Invalid comment action '.$comment_action, E_USER_WARNING);
          }

          if ($perform_redirect)
          {
            redirect($url_self);
          }
          unset($_POST['content']);
        }
        else
        {
          $edit_comment = $_GET['comment_to_edit'];
        }

        $template->assign('DISPLAY_COMMENTS_BLOCK', true);
        break;
      }
    }
    case 'delete_comment' :
    {
      check_pwg_token();

      include_once(COA_PATH.'include/functions_comment.inc.php');

      check_input_parameter('comment_to_delete', $_GET, false, PATTERN_ID);

      $author_id = get_comment_author_id_albums($_GET['comment_to_delete']);

      if (can_manage_comment('delete', $author_id))
      {
        delete_user_comment_albums($_GET['comment_to_delete']);
      }

      redirect($url_self);
    }
    case 'validate_comment' :
    {
      check_pwg_token();

      include_once(COA_PATH.'include/functions_comment.inc.php');

      check_input_parameter('comment_to_validate', $_GET, false, PATTERN_ID);

      $author_id = get_comment_author_id_albums($_GET['comment_to_validate']);

      if (can_manage_comment('validate', $author_id))
      {
        validate_user_comment_albums($_GET['comment_to_validate']);
      }

      redirect($url_self);
    }
  }
}


// +-----------------------------------------------------------------------+
// |                            insert comment                             |
// +-----------------------------------------------------------------------+
if ($category['commentable'] and isset($_POST['content']))
{
  if (is_a_guest() and !$conf['comments_forall'])
  {
    die('Session expired');
  }

  $comm = array(
    'author' => trim( @$_POST['author'] ),
    'content' => trim( $_POST['content'] ),
    'website_url' => trim( $_POST['website_url'] ),
    'email' => trim( @$_POST['email'] ),
    'category_id' => $category['id'],
   );

  include_once(COA_PATH.'include/functions_comment.inc.php');

  $comment_action = insert_user_comment_albums($comm, @$_POST['key'], $page['errors']);

  switch ($comment_action)
  {
    case 'moderate':
      $page['infos'][] = l10n('An administrator must authorize your comment before it is visible.');
    case 'validate':
      $page['infos'][] = l10n('Your comment has been registered');
      break;
    case 'reject':
      set_status_header(403);
      $page['errors'][] = l10n('Your comment has NOT been registered because it did not pass the validation rules');
      break;
    default:
      trigger_error('Invalid comment action '.$comment_action, E_USER_WARNING);
  }

  // allow plugins to notify what's going on
  trigger_notify('user_comment_insertion',
      array_merge($comm, array('action'=>$comment_action) ),
      'album'
    );

  $template->assign('DISPLAY_COMMENTS_BLOCK', true);
}
else if (isset($_POST['content']))
{
  set_status_header(403);
  die('ugly spammer');
}


// +-----------------------------------------------------------------------+
// |                           display comments                            |
// +-----------------------------------------------------------------------+
if ($category['commentable'])
{
  if (isset($_GET['coa_open']))
  {
    $template->assign('DISPLAY_COMMENTS_BLOCK', true);
  }

  if (!is_admin())
  {
    $validated_clause = " AND validated = 'true'";
  }
  else
  {
    $validated_clause = null;
  }

  // number of comments for this category
  $query = '
SELECT
    COUNT(*) AS nb_comments
  FROM '.COA_TABLE.'
  WHERE category_id = '.$category['id']
  .$validated_clause.'
;';
  $row = pwg_db_fetch_assoc(pwg_query($query));

  // navigation bar creation
  // can't use $_GET['start'] because used by thumbnails navigation bar
  if (isset($_GET['start_comments']))
  {
    $page['start_comments'] = $_GET['start_comments'];
  }
  else
  {
    $page['start_comments'] = 0;
  }

  $navigation_bar = create_navigation_bar(
    add_url_params(duplicate_index_url(array(), array('start_comments')), array('coa_open'=>null)),
    $row['nb_comments'],
    $page['start_comments'],
    $conf['nb_comment_page'],
    false,
    'start_comments'
    );

  $template->assign(
    array(
      'COMMENT_COUNT' => $row['nb_comments'],
      'comment_navbar' => $navigation_bar,
      )
    );

  if ($row['nb_comments'] > 0)
  {
    // comments order (get, session, conf)
    if (!empty($_GET['comments_order']) && in_array(strtoupper($_GET['comments_order']), array('ASC', 'DESC')))
    {
      pwg_set_session_var('comments_order', $_GET['comments_order']);
    }
    $comments_order = pwg_get_session_var('comments_order', $conf['comments_order']);

    $template->assign(array(
      'COMMENTS_ORDER_URL' => add_url_params(duplicate_index_url(), array('comments_order'=> ($comments_order == 'ASC' ? 'DESC' : 'ASC'), 'coa_open'=>null ) ),
      'COMMENTS_ORDER_TITLE' => $comments_order == 'ASC' ? l10n('Show latest comments first') : l10n('Show oldest comments first'),
      ));

    // get comments
    $query = '
SELECT
    com.id,
    com.author,
    com.author_id,
    u.'.$conf['user_fields']['email'].' AS user_email,
    com.date,
    com.category_id,
    com.website_url,
    com.email,
    com.content,
    com.validated
  FROM '.COA_TABLE.' AS com
  LEFT JOIN '.USERS_TABLE.' AS u
    ON u.'.$conf['user_fields']['id'].' = author_id
  WHERE category_id = '.$category['id'].'
    '.$validated_clause.'
  ORDER BY date '.$comments_order.'
  LIMIT '.$conf['nb_comment_page'].' OFFSET '.$page['start_comments'].'
;';
    $result = pwg_query($query);

    while ($row = pwg_db_fetch_assoc($result))
    {
      if ($row['author'] == 'guest')
      {
        $row['author'] = l10n('guest');
      }

      $email = null;
      if (!empty($row['user_email']))
      {
        $email = $row['user_email'];
      }
      else if (!empty($row['email']))
      {
        $email = $row['email'];
      }

      // comment content
      $tpl_comment = array(
        'ID' => $row['id'],
        'AUTHOR' => trigger_change('render_comment_author', $row['author']),
        'DATE' => trigger_change($row['date'], true),
        'CONTENT' => trigger_change('render_comment_content', $row['content'], 'album'),
        'WEBSITE_URL' => $row['website_url'],
        );

      // rights
      if (can_manage_comment('delete', $row['author_id']))
      {
        $tpl_comment['U_DELETE'] = add_url_params(
          $url_self,
          array(
            'action' => 'delete_comment',
            'comment_to_delete' => $row['id'],
            'pwg_token' => get_pwg_token(),
            )
          );
      }
      if (can_manage_comment('edit', $row['author_id']))
      {
        $tpl_comment['U_EDIT'] = add_url_params(
          $url_self,
          array(
            'action' => 'edit_comment',
            'comment_to_edit' => $row['id'],
            )
          );
        if (isset($edit_comment) and ($row['id'] == $edit_comment))
        {
          $tpl_comment['IN_EDIT'] = true;
          $key = get_ephemeral_key(2, $category['id']);
          $tpl_comment['KEY'] = $key;
          $tpl_comment['CONTENT'] = $row['content'];
          $tpl_comment['PWG_TOKEN'] = get_pwg_token();
          $tpl_comment['U_CANCEL'] = $url_self;
        }
      }
      if (is_admin())
      {
        $tpl_comment['EMAIL'] = $email;

        if ($row['validated'] != 'true')
        {
          $tpl_comment['U_VALIDATE'] = add_url_params(
            $url_self,
            array(
              'action' => 'validate_comment',
              'comment_to_validate' => $row['id'],
              'pwg_token' => get_pwg_token(),
              )
            );
        }
      }

      $template->append('comments', $tpl_comment);
    }
  }

  // comment form
  $show_add_comment_form = true;
  if (isset($edit_comment))
  {
    $show_add_comment_form = false;
  }
  if (is_a_guest() and !$conf['comments_forall'])
  {
    $show_add_comment_form = false;
  }

  if ($show_add_comment_form)
  {
    $key = get_ephemeral_key(3, $category['id']);

    $tpl_var = array(
        'F_ACTION' =>         $url_self,
        'KEY' =>              $key,
        'CONTENT' =>          '',
        'SHOW_AUTHOR' =>      !is_classic_user(),
        'AUTHOR_MANDATORY' => $conf['comments_author_mandatory'],
        'AUTHOR' =>           '',
        'WEBSITE_URL' =>      '',
        'SHOW_EMAIL' =>       !is_classic_user() or empty($user['email']),
        'EMAIL_MANDATORY' =>  $conf['comments_email_mandatory'],
        'EMAIL' =>            '',
        );

    if ('reject'==@$comment_action)
    {
      foreach (array('content', 'author', 'website_url', 'email') as $k)
      {
        $tpl_var[strtoupper($k)] = htmlspecialchars( stripslashes(@$_POST[$k]) );
      }
    }
    $template->assign('comment_add', $tpl_var);
  }

  // template
  $template->assign(array(
    'COA_PATH' => COA_PATH,
    'COA_ABSOLUTE_PATH' => realpath(COA_PATH) . '/',
    ));

  $template->set_filename('comments_on_albums', realpath(COA_PATH . 'template/albums.tpl'));

  trigger_notify('loc_end_coa');

  if (isset($pwg_loaded_plugins['rv_tscroller']) and count($page['navigation_bar']) != 0)
  {
    $template->assign('COMMENTS_ON_TOP', true);
    $template->concat('PLUGIN_INDEX_CONTENT_BEGIN', $template->parse('comments_on_albums', true));
  }
  else
  {
    $template->concat('PLUGIN_INDEX_CONTENT_END', $template->parse('comments_on_albums', true));
  }
}
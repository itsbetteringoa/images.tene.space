<?php

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');
include_once(COA_PATH.'include/functions_comment.inc.php');

global $user, $conf;

// +-----------------------------------------------------------------------+
// |                         comments management                           |
// +-----------------------------------------------------------------------+

$comment_id = null;
$action = null;

$actions = array('delete_comment_album', 'validate_comment_album', 'edit_comment_album');
foreach ($actions as $loop_action)
{
  if (isset($_GET[$loop_action]))
  {
    $action = $loop_action;
    check_input_parameter($action, $_GET, false, PATTERN_ID);
    $comment_id = $_GET[$action];
    break;
  }
}

if (isset($action))
{
  check_pwg_token();

  $comment_author_id = get_comment_author_id_albums($comment_id);
  $action = str_replace('_comment_album', '', $action);

  if (can_manage_comment($action, $comment_author_id))
  {
    $perform_redirect = false;

    if ('delete' == $action)
    {
      delete_user_comment_albums($comment_id);
      $perform_redirect = true;
    }

    if ('validate' == $action)
    {
      validate_user_comment_albums($comment_id);
      $perform_redirect = true;
    }

    if ('edit' == $action)
    {
      if (!empty($_POST['content']))
      {
        update_user_comment_albums(
          array(
            'comment_id' => $_GET['edit_comment_album'],
            'category_id' => $_POST['image_id'],
            'content' => $_POST['content']
            ),
          $_POST['key']
          );

        $perform_redirect = true;
      }
      else
      {
        $edit_comment = $_GET['edit_comment_album'];
      }
    }

    if ($perform_redirect)
    {
      $redirect_url =
        PHPWG_ROOT_PATH
        .'index.php'
        .get_query_string_diff(array('delete_comment_album','validate_comment_album','edit_comment_album','pwg_token'));

      redirect(rtrim($redirect_url, '='));
    }
  }
}

// +-----------------------------------------------------------------------+
// |                        last comments display                          |
// +-----------------------------------------------------------------------+
if ( !is_admin() )
{
  $page['where_clauses'][] = 'validated=\'true\'';
}

$page['where_clauses'][] = get_sql_condition_FandF
  (
    array
      (
        'forbidden_categories' => 'category_id',
        'visible_categories' => 'category_id',
      ),
    '', true
  );

$comments = array();
$element_ids = array();
$category_ids = array();

$query = '
SELECT com.id AS comment_id,
       com.category_id,
       com.author,
       com.author_id,
       com.date,
       com.content,
       com.validated
  FROM '.COA_TABLE.' AS com
    LEFT JOIN '.USERS_TABLE.' AS u
    ON u.'.$conf['user_fields']['id'].' = com.author_id
  WHERE '.implode('
    AND ', $page['where_clauses']).'
  GROUP BY comment_id,
       com.category_id,
       com.author,
       com.author_id,
       com.date,
       com.content,
       com.validated
  ORDER BY date DESC
  LIMIT 0, ' . $datas[0] . ';';

$query.= '
;';
$result = pwg_query($query);
while ($row = pwg_db_fetch_assoc($result))
{
  $comments[] = $row;
  $element_ids[] = $row['category_id'];
}

if (count($comments) > 0)
{
  $block['TEMPLATE'] = 'stuffs_lastcoms.tpl';
  $block['TITLE_URL'] = 'comments.php?display_mode=albums';
  $block['comments'] = array();
  $block['MAX_WIDTH'] = $datas[3];
  $block['MAX_HEIGHT'] = $datas[4];
  switch ($datas[2])
  {
    case 1 :
      $block['NB_COMMENTS_LINE'] = '99%';
      break;
    case 2 :
      $block['NB_COMMENTS_LINE'] = '49%';
      break;
    case 3 :
      $block['NB_COMMENTS_LINE'] = '32.4%';
      break;
  }

  // retrieving category informations
  $query = '
SELECT
    cat.id,
    cat.name,
    cat.permalink,
    cat.uppercats,
    com.id as comment_id,
    img.id AS image_id,
    img.path
  FROM '.CATEGORIES_TABLE.' AS cat
    LEFT JOIN '.COA_TABLE.' AS com
      ON com.category_id = cat.id
    LEFT JOIN '.USER_CACHE_CATEGORIES_TABLE.' AS ucc
      ON ucc.cat_id = cat.id AND ucc.user_id = '.$user['id'].'
    LEFT JOIN '.IMAGES_TABLE.' AS img
      ON img.id = ucc.user_representative_picture_id
  '.get_sql_condition_FandF(
    array(
      'forbidden_categories' => 'cat.id',
      'visible_categories' => 'cat.id'
      ),
    'WHERE'
    ).'
    AND cat.id IN ('.implode(',', $element_ids).')
;';
  $categories = hash_from_query($query, 'comment_id');

  foreach ($comments as $comment)
  {
    // category url
    $comment['cat_url'] = duplicate_index_url(
      array(
        'category' => $categories[$comment['comment_id']],
        array('start')
        )
      );

    // source of the thumbnail picture
    $src_image = new SrcImage(array(
      'id' => $categories[$comment['comment_id']]['image_id'],
      'path' => $categories[$comment['comment_id']]['path'],
      ));

    // author
    if (empty($comment['author']))
    {
      $comment['author'] = l10n('guest');
    }

    $tpl_comment = array(
      'ID' => $comment['comment_id'],
      'U_PICTURE' => $comment['cat_url'],
      'src_image' => $src_image,
      'ALT' => trigger_change('render_category_name', $categories[$comment['comment_id']]['name']),
      'AUTHOR' => trigger_change('render_comment_author', $comment['author']),
      'DATE'=> format_date($comment['date'], true),
      'CONTENT'=> trigger_change('render_comment_content',$comment['content'], 'album'),
      'WIDTH' => $datas[3],
      'HEIGHT' => $datas[4],
      );

    if ($datas[1] == 'on')
    {
      $url =
        get_root_url()
        .'index.php'
        .get_query_string_diff(array('edit_comment_album', 'delete_comment_album','validate_comment_album', 'pwg_token'));

      if (can_manage_comment('delete', $comment['author_id']))
      {
        $tpl_comment['U_DELETE'] = add_url_params(
          $url,
          array(
            'delete_comment_album' => $comment['comment_id'],
            'pwg_token' => get_pwg_token(),
            )
          );
      }

      if (can_manage_comment('edit', $comment['author_id']))
      {
        $tpl_comment['U_EDIT'] = add_url_params(
          $url,
          array(
            'edit_comment_album' => $comment['comment_id'],
            'pwg_token' => get_pwg_token(),
            )
          );

        if (isset($edit_comment) and ($comment['comment_id'] == $edit_comment))
        {
          $tpl_comment['IN_EDIT'] = true;
          $key = get_ephemeral_key(2, $comment['category_id']);
          $tpl_comment['KEY'] = $key;
          $tpl_comment['IMAGE_ID'] = $comment['category_id'];
          $tpl_comment['CONTENT'] = $comment['content'];
          $tpl_comment['PWG_TOKEN'] = get_pwg_token();
        }
      }

      if (can_manage_comment('validate', $comment['author_id']))
      {
        if ('true' != $comment['validated'])
        {
          $tpl_comment['U_VALIDATE'] = add_url_params(
            $url,
            array(
              'validate_comment_album'=> $comment['comment_id'],
              'pwg_token' => get_pwg_token(),
              )
            );
        }
      }
    }

    $block['comments'][] = $tpl_comment;
  }
  $block['derivative_params'] = ImageStdParams::get_by_type(IMG_THUMB);
}

?>
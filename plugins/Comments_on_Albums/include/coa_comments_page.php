<?php
/* inspired by comments.php */
defined('COA_ID') or die('Hacking attempt!');

global $template, $page, $conf, $user;

// +-----------------------------------------------------------------------+
// |                    add a button for switch page                       |
// +-----------------------------------------------------------------------+
$template->assign('COA_MODE', (isset($_GET['display_mode']) and $_GET['display_mode'] == 'albums') ? 'albums' : 'photos');
$template->set_prefilter('comments', 'coa_add_button');

function coa_add_button($content, &$smarty)
{
  $search ='<form class="filter" action="{$F_ACTION}" method="get">';

  $add = '
<fieldset>
  <legend>{\'Display comments on\'|@translate}</legend>
  <span style="font-size:1.1em;"><a href="comments.php" {if $COA_MODE=="photos"}style="font-weight:bold;"{/if}>{\'Photos\'|@translate}</a> |
  <a href="comments.php?display_mode=albums" {if $COA_MODE=="albums"}style="font-weight:bold;"{/if}>{\'Albums\'|@translate}</a></span>
</fieldset>';

  return str_replace($search, $add.$search, $content);
}


// +-----------------------------------------------------------------------+
//                        comments on albums page                          |
// +-----------------------------------------------------------------------+
if (!isset($_GET['display_mode']) or $_GET['display_mode'] != 'albums')
{
  return;
}

$url_self = PHPWG_ROOT_PATH.'comments.php'
  .get_query_string_diff(array('edit_albums','delete_albums','validate_albums','pwg_token'));

// reset some template vars
$template->clear_assign(array('comments', 'navbar', 'sort_by_options'));

// sort_by : database fields proposed for sorting comments list
global $sort_by;
$sort_by = array(
  'date' => l10n('comment date'),
  'category_id' => l10n('Album')
  );
$template->assign('sort_by_options', $sort_by);

// clean where_clauses from unknown column
foreach ($page['where_clauses'] as &$cond)
{
  if (strpos($cond, 'ic.image_id') !== false)
  {
    $cond = get_sql_condition_FandF(
      array(
        'forbidden_categories' => 'category_id',
        'visible_categories' => 'category_id'
        ),
      '', true
      );
  }
}
unset($cond);

// +-----------------------------------------------------------------------+
// |                         comments management                           |
// +-----------------------------------------------------------------------+

$comment_id = null;
$action = null;

$actions = array('delete_albums', 'validate_albums', 'edit_albums');
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
  include_once(COA_PATH.'include/functions_comment.inc.php');

  $comment_author_id = get_comment_author_id_albums($comment_id);

  if (can_manage_comment(str_replace('_albums', null, $action), $comment_author_id))
  {
    $perform_redirect = false;

    if ('delete_albums' == $action)
    {
      check_pwg_token();
      delete_user_comment_albums($comment_id);
      $perform_redirect = true;
    }
    if ('validate_albums' == $action)
    {
      check_pwg_token();
      validate_user_comment_albums($comment_id);
      $perform_redirect = true;
    }
    if ('edit_albums' == $action)
    {
      if (!empty($_POST['content']))
      {
        check_pwg_token();
        $comment_action = update_user_comment_albums(
          array(
            'comment_id' => $_GET['edit_albums'],
            'category_id' => $_POST['image_id'],
            'content' => $_POST['content'],
            'website_url' => @$_POST['website_url'],
            ),
          $_POST['key']
          );

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
            break;
          default:
            trigger_error('Invalid comment action '.$comment_action, E_USER_WARNING);
        }
      }
      else
      {
        $edit_comment = $_GET['edit_albums'];
      }
    }
    if ($perform_redirect)
    {
      redirect($url_self);
    }
  }
}

// +-----------------------------------------------------------------------+
// |                            navigation bar                             |
// +-----------------------------------------------------------------------+

if (isset($_GET['start']) and is_numeric($_GET['start']))
{
  $start = $_GET['start'];
}
else
{
  $start = 0;
}

$query = '
SELECT COUNT(DISTINCT(com.id))
  FROM '.CATEGORIES_TABLE.' AS cat
  INNER JOIN '.COA_TABLE.' AS com
    ON cat.id = com.category_id
  LEFT JOIN '.USERS_TABLE.' AS u
    ON u.'.$conf['user_fields']['id'].' = com.author_id
  WHERE '.implode('
    AND ', $page['where_clauses']).'
;';
list($counter) = pwg_db_fetch_row(pwg_query($query));

$url = PHPWG_ROOT_PATH.'comments.php'
  .get_query_string_diff(array('start','delete_albums','validate_albums','edit_albums','pwg_token'));

$navbar = create_navigation_bar(
  $url,
  $counter,
  $start,
  $page['items_number'],
  ''
  );

$template->assign('navbar', $navbar);

// +-----------------------------------------------------------------------+
// |                        last comments display                          |
// +-----------------------------------------------------------------------+

$comments = array();
$element_ids = array();
$category_ids = array();

$query = '
SELECT
    com.id AS comment_id,
    com.category_id,
    com.author,
    com.author_id,
    u.'.$conf['user_fields']['username'].' AS username,
    u.'.$conf['user_fields']['email'].' AS user_email,
    com.email,
    com.date,
    com.website_url,
    com.content,
    com.validated
  FROM '.CATEGORIES_TABLE.' AS cat
    INNER JOIN '.COA_TABLE.' AS com
      ON cat.id = com.category_id
    LEFT JOIN '.USERS_TABLE.' As u
      ON u.'.$conf['user_fields']['id'].' = com.author_id
  WHERE '.implode('
    AND ', $page['where_clauses']).'
  GROUP BY
    comment_id,
    com.category_id,
    com.author,
    com.author_id,
    com.date,
    com.content,
    com.validated
  ORDER BY '.$page['sort_by'].' '.$page['sort_order'];
  if ('all' != $page['items_number'])
  {
    $query.= '
    LIMIT '.$page['items_number'].' OFFSET '.$start;
  }
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
    // source of the thumbnail picture
    $comment['src_image'] = new SrcImage($categories[$comment['comment_id']]);

    // category url
    $comment['cat_url'] = make_index_url(
      array(
        'section' => 'categories',
        'category' => $categories[$comment['comment_id']],
        )
      );

    $email = null;
    if (!empty($comment['user_email']))
    {
      $email = $comment['user_email'];
    }
    else if (!empty($comment['email']))
    {
      $email = $comment['email'];
    }

    // comment content
    $tpl_comment = array(
      'ID' => $comment['comment_id'],
      'U_PICTURE' => $comment['cat_url'],
      'src_image' => $comment['src_image'],
      'ALT' => trigger_change('render_category_name', $categories[$comment['comment_id']]['name']),
      'AUTHOR' => trigger_change('render_comment_author', $comment['author']),
      'WEBSITE_URL' => $comment['website_url'],
      'DATE' => format_date($comment['date'], true),
      'CONTENT' => trigger_change('render_comment_content', $comment['content'], 'album'),
      );

    if (is_admin())
    {
      $tpl_comment['EMAIL'] = $email;
    }

    // rights
    if (can_manage_comment('delete', $comment['author_id']))
    {
      $tpl_comment['U_DELETE'] = add_url_params(
        $url_self,
        array(
          'delete_albums' => $comment['comment_id'],
          'pwg_token' => get_pwg_token(),
          )
        );
    }
    if (can_manage_comment('edit', $comment['author_id']))
    {
      $tpl_comment['U_EDIT'] = add_url_params(
        $url_self,
        array(
          'edit_albums' => $comment['comment_id'],
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
        $tpl_comment['U_CANCEL'] = $url_self;
      }
    }
    if (can_manage_comment('validate', $comment['author_id']))
    {
      if ('true' != $comment['validated'])
      {
        $tpl_comment['U_VALIDATE'] = add_url_params(
          $url_self,
          array(
            'validate_albums'=> $comment['comment_id'],
            'pwg_token' => get_pwg_token(),
            )
          );
      }
    }

    $template->append('comments', $tpl_comment);
  }
}

// +-----------------------------------------------------------------------+
// |                            template                                   |
// +-----------------------------------------------------------------------+
// add a line to display category name
$template->set_prefilter('comments', 'coa_change_comments_list');

function coa_change_comments_list($content)
{
  $search[0] = '<a href="{$comment.U_PICTURE}">';
  $replacement[0] = $search[0].'{$comment.ALT}<br>';
  $search[1] = '<input type="submit"';
  $replacement[1] = '<input type=hidden name=display_mode value=albums>'.$search[1];
  return str_replace($search, $replacement, $content);
}
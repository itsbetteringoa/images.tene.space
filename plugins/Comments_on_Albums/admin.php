<?php
/* Code adapted from admin/comments.php */
defined('COA_ID') or die('Hacking attempt!');

$page['active_menu'] = get_active_menu('comments');

include_once(PHPWG_ROOT_PATH.'admin/include/functions.php');

if (isset($_GET['start']) and is_numeric($_GET['start']))
{
  $page['start'] = $_GET['start'];
}
else
{
  $page['start'] = 0;
}

// +-----------------------------------------------------------------------+
// | Check Access and exit when user status is not ok                      |
// +-----------------------------------------------------------------------+

check_status(ACCESS_ADMINISTRATOR);

// +-----------------------------------------------------------------------+
// |                                actions                                |
// +-----------------------------------------------------------------------+
if (!empty($_POST))
{
  if (empty($_POST['comments']))
  {
    $page['errors'][] = l10n('Select at least one comment');
  }
  else
  {
    include_once(COA_PATH.'include/functions_comment.inc.php');
    check_input_parameter('comments', $_POST, true, PATTERN_ID);

    if (isset($_POST['validate']))
    {
      validate_user_comment_albums($_POST['comments']);

      $page['infos'][] = l10n_dec(
        '%d user comment validated', '%d user comments validated',
        count($_POST['comments'])
        );
    }

    if (isset($_POST['reject']))
    {
      delete_user_comment_albums($_POST['comments']);

      $page['infos'][] = l10n_dec(
        '%d user comment rejected', '%d user comments rejected',
        count($_POST['comments'])
        );
    }
  }
}

// +-----------------------------------------------------------------------+
// |                             template init                             |
// +-----------------------------------------------------------------------+

$template->set_filename('comments', 'comments.tpl');
$template->set_prefilter('comments', 'coa_admin_add_category_name');

$template->assign('F_ACTION', COA_ADMIN);

// +-----------------------------------------------------------------------+
// | Tabs                                                                  |
// +-----------------------------------------------------------------------+

include_once(PHPWG_ROOT_PATH.'admin/include/tabsheet.class.php');

$tabsheet = new tabsheet();
$tabsheet->set_id('comments');
$tabsheet->select('albums');
$tabsheet->assign();

// +-----------------------------------------------------------------------+
// |                           comments display                            |
// +-----------------------------------------------------------------------+

$nb_total = 0;
$nb_pending = 0;

$query = '
SELECT
    COUNT(*) AS counter,
    validated
  FROM '.COA_TABLE.'
  GROUP BY validated
;';
$result = pwg_query($query);
while ($row = pwg_db_fetch_assoc($result))
{
  $nb_total+= $row['counter'];

  if ('false' == $row['validated'])
  {
    $nb_pending = $row['counter'];
  }
}

if (!isset($_GET['filter']) and $nb_pending > 0)
{
  $page['filter'] = 'pending';
}
else
{
  $page['filter'] = 'all';
}

if (isset($_GET['filter']) and 'pending' == $_GET['filter'])
{
  $page['filter'] = 'pending';
}

$template->assign(
  array(
    'nb_total' => $nb_total,
    'nb_pending' => $nb_pending,
    'filter' => $page['filter'],
    )
  );

$where_clauses = array('1=1');

if ('pending' == $page['filter'])
{
  $where_clauses[] = 'validated=\'false\'';
}

$query = '
SELECT
    com.id,
    com.category_id,
    com.date,
    com.author,
    u.'.$conf['user_fields']['username'].' AS username,
    com.content,
    cat.name,
    img.id AS image_id,
    img.path,
    com.validated
  FROM '.COA_TABLE.' AS com
    LEFT JOIN '.CATEGORIES_TABLE.' AS cat
      ON cat.id = com.category_id
    LEFT JOIN '.USERS_TABLE.' AS u
      ON u.'.$conf['user_fields']['id'].' = com.author_id
    LEFT JOIN '.USER_CACHE_CATEGORIES_TABLE.' AS ucc
      ON ucc.cat_id = com.category_id AND ucc.user_id = '.$user['id'].'
    LEFT JOIN '.IMAGES_TABLE.' AS img
      ON img.id = ucc.user_representative_picture_id
  WHERE '.implode(' AND ', $where_clauses).'
  ORDER BY com.date DESC
  LIMIT '.$page['start'].', '.$conf['comments_page_nb_comments'].'
;';
$result = pwg_query($query);

while ($row = pwg_db_fetch_assoc($result))
{
  $thumb = DerivativeImage::thumb_url(
    array(
      'id'=>$row['image_id'],
      'path'=>$row['path'],
      )
   );

  if (empty($row['author_id']))
  {
    $author_name = $row['author'];
  }
  else
  {
    $author_name = stripslashes($row['username']);
  }

  $template->append(
    'comments',
    array(
      'ID' => $row['id'],
      'U_PICTURE' => get_root_url().'admin.php?page=album-'.$row['category_id'],
      'CATEGORY_NAME' => trigger_change('render_category_name', $row['name']),
      'TN_SRC' => $thumb,
      'AUTHOR' => trigger_change('render_comment_author', $author_name),
      'DATE' => format_date($row['date'], true),
      'CONTENT' => trigger_change('render_comment_content', $row['content'], 'album'),
      'IS_PENDING' => ('false' == $row['validated']),
      )
    );
}

// +-----------------------------------------------------------------------+
// |                            navigation bar                             |
// +-----------------------------------------------------------------------+

$navbar = create_navigation_bar(
  get_root_url().'admin.php'.get_query_string_diff(array('start')),
  ('pending' == $page['filter'] ? $nb_pending : $nb_total),
  $page['start'],
  $conf['comments_page_nb_comments']
  );

$template->assign('navbar', $navbar);

// +-----------------------------------------------------------------------+
// |                           sending html code                           |
// +-----------------------------------------------------------------------+

$template->assign_var_from_handle('ADMIN_CONTENT', 'comments');


function coa_admin_add_category_name($content)
{
  $search = '<img src="{$comment.TN_SRC}">';
  $add = '<br>{$comment.CATEGORY_NAME}';
  return str_replace($search, $search.$add, $content);
}

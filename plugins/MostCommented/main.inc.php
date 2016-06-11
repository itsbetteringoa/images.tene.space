<?php
/*
Plugin Name: Most Commented
Version: 2.7.a
Description: Add a "Most Commented" link in "Specials" menu.
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=145
Author: P@t
Author URI: http://www.gauchon.com
*/

defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

define('MOSTCOMMENTED_PATH' , PHPWG_PLUGINS_PATH . basename(dirname(__FILE__)) . '/');


add_event_handler('init', 'init_mostcommented');


function init_mostcommented()
{
  global $conf;
  
  if ($conf['activate_comments'])
  {
    load_language('plugin.lang', MOSTCOMMENTED_PATH);

    add_event_handler('blockmanager_apply' , 'add_link_mostcommented');
    add_event_handler('loc_end_section_init', 'section_init_mostcommented');
  }
}

function add_link_mostcommented($menu_ref_arr)
{
  global $conf;

  $menu = &$menu_ref_arr[0];
  $position = (isset($conf['mostcommented_position']) and is_numeric($conf['mostcommented_position'])) ? $conf['mostcommented_position'] : 3;
  
  if (($block = $menu->get_block('mbSpecials')) != null)
  {
    array_splice($block->data, $position-1, 0, array('most_commented' =>
      array(
        'URL' => make_index_url(array('section' => 'most_commented')),
        'TITLE' => l10n('displays most commented pictures'),
        'NAME' => l10n('Most commented')
        )
      )
    );
  }
}

function section_init_mostcommented()
{
  global $tokens, $page, $conf;
  
  if (!in_array('most_commented', $tokens))
  {
    return;
  }
  
  $page['section'] = 'most_commented';
  $page['title'] = '<a href="' . duplicate_index_url() . '">' . l10n('Most commented') . '</a>';
  $page['section_title'] = '<a href="'.get_gallery_home_url().'">' . l10n('Home') . '</a>'
    . $conf['level_separator'] . $page['title'];

  $query = '
SELECT DISTINCT image_id
    FROM ' . IMAGE_CATEGORY_TABLE . '
    WHERE ' .  
      get_sql_condition_FandF(
        array(
          'forbidden_categories' => 'category_id',
          'visible_categories' => 'category_id',
          'visible_images' => 'image_id',
          ),
        '', true
        )
    . '
;';

  $img = query2array($query, null, 'image_id');

  if (empty($img))
  {
    $page['items'] = array();
  }
  else
  {
    $query = '
SELECT
    img.id,
    COUNT(*) AS count
  FROM ' . IMAGES_TABLE . ' AS img
    INNER JOIN ' . COMMENTS_TABLE . ' AS com
    ON com.image_id = img.id
  WHERE
    img.id IN (' . implode(',', $img) . ')
    AND com.validated = "true"
  GROUP BY img.id
  ORDER BY count DESC, img.hit DESC
  LIMIT ' . $conf['top_number'] . '
;';
    $page['items'] = query2array($query, null, 'id');
  }
  
  add_event_handler('loc_end_index_thumbnails', 'add_nb_comments_mostcommented');
}

function add_nb_comments_mostcommented($tpl_thumbnails_var)
{
  global $template, $user, $selection;

  // unsed sort order
  $template->clear_assign('image_orders');

  // display nb comments if hidden by user
  if (!$user['show_nb_comments'])
  {
    $query = '
SELECT image_id, COUNT(*) AS nb_comments
  FROM '.COMMENTS_TABLE.'
  WHERE validated = \'true\'
    AND image_id IN ('.implode(',', $selection).')
  GROUP BY image_id
;';
    $nb_comments_of = query2array($query, 'image_id', 'nb_comments');
    
    foreach ($tpl_thumbnails_var as &$row)
    {
      $row['NB_COMMENTS'] = $nb_comments_of[$row['id']];
    }
    unset($row);
  }

  return $tpl_thumbnails_var;
}
